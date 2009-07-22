<?php
/**
 * GeSHi - Generic Syntax Highlighter
 */

/**
 * The GeSHiRendererDebug class.
 * Outputs format codes; useful for debugging
 *
 * @package    geshi
 * @subpackage renderer
 * @author     Christian Weiske <cweiske@php.net>
 * @since      1.1.1
 * @version    $Revision: 910 $
 * @see        GeSHiRenderer
 */
class GeSHiRendererDebug extends GeSHiRenderer
{
    protected $outputTokens = false;



    // {{{ parseToken()

    /**
     * Implements parseToken to output tokens
     *
     * @param string $token        The token to output
     * @param string $context_name The name of the context that the tag is in
     * @param array  $data         Miscellaneous data about the context
     *
     * @return string Debug string
     */
    function parseToken($token, $context_name, $data)
    {
        static $counter = 0;

        $flags = '';

        if ($token == '') {
            $flags .= 'E';//empty
        } else if (geshi_is_whitespace($token)) {
            $flags .= 'W';//whitespace
        } else {
            $flags .= '-';
        }

        $nSlashes = substr_count($context_name, '/');
        $nPos = strrpos($context_name, '/');
        if ($nPos === false) {
            $contextTail = $context_name;
        } else {
            $contextTail = substr($context_name, $nPos + 1);
        }
        $context = str_repeat(' ', $nSlashes) . $contextTail;

        return sprintf("%8d %1s %4d %-40s - %s\n",
            $counter++,
            $flags,
            strlen($token),
            $context_name,
            ($this->outputTokens ? addcslashes($token, "\0..\37") : ''));
    }

    // }}}
    // {{{ getHeader()

    /**
     * Returns the header for the code. Currently just a boring preset.
     *
     * @return string
     */
    function getHeader()
    {
        return '';
    }

    // }}}
    // {{{ getFooter()

    /**
     * Returns the footer for the code. Currently just a boring preset.
     *
     * @return string
     */
    function getFooter()
    {
        return '';
    }

    // }}}

}

?>