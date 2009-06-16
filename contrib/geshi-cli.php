#!/usr/bin/env php
<?php
/**
* GeSHi command line interface.
* Allows you to run geshi from shell scripts or simply yourself via cli.
* Supports all renderers (output formats) and input formats.
*
* You will need Console_CommandLine and MIME_Type from PEAR:
* $ pear install console_commandline mime_type
*
* @author Christian Weiske <cweiske@php.net>
*/
require_once 'Console/CommandLine.php';
require_once dirname(__FILE__) . '/../class.geshi.php';

$cli = new GeSHi_Cli();
$cli->run();

class GeSHi_Cli
{
    /**
    * Maps command line "renderer" argument values
    * to GeSHi renderer class names.
    *
    * @var array
    */
    protected static $arRenderers = array(
        'ansi'  => 'GeSHiRendererANSI',
        'debug' => 'GeSHiRendererDebug',
        'html'  => 'GeSHiRendererHTML',
        'troff' => 'GeSHiRendererTroff',
        'xml'   => 'GeSHiRendererXML',
    );

    /**
    * Maps MIME types to GeSHi file formats.
    *
    * @var array
    */
    protected static $typeToFormat = array(
        //FIXME
    );



    /**
    * Runs the script and outputs highlighted code.
    *
    * @return void
    */
    public function run()
    {
        $parser = $this->createParser();
        try {
            $result   = $parser->parse();
            $file     = $result->args['infile'];
            $format   = $result->options['format'];
            $renderer = $result->options['renderer'];

            if ($format == '') {
                $format = $this->detectFormat($file);
            }

            $geshi = new GeSHi(file_get_contents($file), $format);

            if ($renderer) {
                $rendclass = self::$arRenderers[$renderer];
                require_once GESHI_CLASSES_ROOT . 'class.geshirenderer.php';
                require_once GESHI_CLASSES_ROOT
                    . 'renderers/class.' . strtolower($rendclass) . '.php';
                $geshi->setRenderer(new $rendclass());
            }
            echo $geshi->parseCode() . "\n";
        } catch (Exception $e) {
            $parser->displayError($e->getMessage());
            exit(1);
        }
    }//public function run();



    /**
    * Creates the command line parser and populates it with all allowed
    * options and parameters.
    *
    * @return Console_CommandLine CommandLine object
    */
    protected function createParser()
    {
        $parser = new Console_CommandLine();
        $parser->description = 'CLI interface to GeSHi, the generic syntax highlighter';
        $parser->version     = '0.1.0';

        /*
        $parser->addOption('outfile', array(
            'short_name'  => '-o',
            'long_name'   => '--outfile',
            'description' => 'File to save output to',
            'help_name'   => 'FILE',
            'action'      => 'StoreString'
        ));
        */
        $parser->addOption('format', array(
            'short_name'  => '-f',
            'long_name'   => '--format',
            'description' => 'Format of file to highlight (e.g. php).',
            'help_name'   => 'FORMAT',
            'action'      => 'StoreString',
            'default'     => false
        ));

        $parser->addOption('renderer', array(
            'short_name'  => '-r',
            'long_name'   => '--renderer',
            'description' => 'Renderer to use',
            'help_name'   => 'RENDERER',
            'action'      => 'StoreString',
            'default'     => 'html',
            'choices'     => array_keys(self::$arRenderers),
            'list'        => array_keys(self::$arRenderers),
            'add_list_option' => true
        ));
        $parser->addArgument('infile', array('help_name' => 'source file'));

        return $parser;
    }//protected function createParser()



    /**
    * Detects the GeSHi language format of a file.
    * It first detects the MIME type of the file and uses
    * $typeToFormat to map that to GeSHi language formats.
    *
    * @param string $filename Full or relative path of the file to detect
    *
    * @return string GeSHi language format (e.g. 'php')
    */
    protected function detectFormat($filename)
    {
        require_once 'MIME/Type.php';
        $type = MIME_Type::autoDetect($filename);

        if (!isset(self::$typeToFormat[$type])) {
            throw new Exception('No idea which format this is: ' . $type);
        }
        return self::$typeToFormat[$type];
    }//protected function detectFormat($filename)

}//class GeSHi_Cli

?>
