<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * 
 * For information on how to use GeSHi, please consult the documentation
 * found in the docs/ directory, or online at http://geshi.org/docs/
 * 
 *  This file is part of GeSHi.
 *
 *  GeSHi is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  GeSHi is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with GeSHi; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * You can view a copy of the GNU GPL in the COPYING file that comes
 * with GeSHi, in the docs/ directory.
 *
 * @package   core
 * @author    Nigel McNie <nigel@geshi.org>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2004, 2005 Nigel McNie
 * @version   $Id$
 * 
 */

/** Set the correct directory separator */
define('GESHI_DIR_SEPARATOR', ('WIN' != substr(PHP_OS, 0, 3)) ? '/' : '\\');

// Define the root directory for the GeSHi code tree
if (!defined('GESHI_ROOT')) {
    /** The root directory for GeSHi */
    define('GESHI_ROOT', dirname(__FILE__) . GESHI_DIR_SEPARATOR);
}
/**#@+
 * @access private
 */
/** The data directory for GeSHi */
define('GESHI_DATA_ROOT', GESHI_ROOT . 'geshi' . GESHI_DIR_SEPARATOR);
/** The classes directory for GeSHi */
define('GESHI_CLASSES_ROOT', GESHI_DATA_ROOT . 'classes' . GESHI_DIR_SEPARATOR);
/** The languages directory for GeSHi */
define('GESHI_LANGUAGES_ROOT', GESHI_DATA_ROOT . 'languages' . GESHI_DIR_SEPARATOR);
/** The context files directory for GeSHi */
define('GESHI_CONTEXTS_ROOT', GESHI_DATA_ROOT . 'contexts' . GESHI_DIR_SEPARATOR);
/** The theme files directory for GeSHi */
define('GESHI_THEMES_ROOT', GESHI_DATA_ROOT . 'themes' . GESHI_DIR_SEPARATOR);
/**#@-*/

/** Get required functions */
require GESHI_DATA_ROOT . 'functions.geshi.php';

/** Get styler class */
require GESHI_CLASSES_ROOT . 'class.geshistyler.php';

/** Get context class */
require GESHI_CLASSES_ROOT . 'class.geshicontext.php';


//
// Constants
//

// Debugging constants. These will disappear in stable builds. Specify
// as a bitfield, e.g. GESHI_DBG_API | GESHI_DBG_PARSE, by defining the
// GESHI_DBG context before including this file
/** No debugging */
define('GESHI_DBG_NONE', 0);
/** Debug the API */
define('GESHI_DBG_API', 1);
/** Debug actual parsing */
define('GESHI_DBG_PARSE', 2);
/** Debug error handling */
define('GESHI_DBG_ERR', 4);
/** Maximum debug level */
define('GESHI_DBG_ALL', GESHI_DBG_API | GESHI_DBG_PARSE | GESHI_DBG_ERR);

// Set efault debug level
if (!defined('GESHI_DBG')) {
    /** Default debug level */
    define('GESHI_DBG', GESHI_DBG_NONE);
}

// These provide BACKWARD COMPATIBILITY ONLY
// Use New Method setStyles(mixed identifiers, string styles);
// e.g. setStyles('html/tag', 'styles');
//      setStyles(array('html/tag', 'html/css-delimiters'), 'style');
/** Used to mark a context as having no equivalence in 1.0.X */
define('GESHI_STYLE_NONE', 0);
/** Used to mark a context as being like a number in 1.0.X */
define('GESHI_STYLE_NUMBERS', 1);
/** Used to mark a context as being like a comment in 1.0.X */
define('GESHI_STYLE_COMMENTS', 2);
/** Used to mark a context as being like a string in 1.0.X */
define('GESHI_STYLE_STRINGS', 3);
/** Used to mark a context as being like a symbol in 1.0.X */
define('GESHI_STYLE_SYMBOLS', 4);
/** Used to mark a context as being like a method in 1.0.X */
define('GESHI_STYLE_METHODS', 5);

/**#@+
 * @access private
 */

// Error related constants, not needed by users of GeSHi
/** No error has occured */
define('GESHI_ERROR_NONE', 0);
/** There is no source code to highlight */
define('GESHI_ERROR_NO_INPUT', 1);
/** You don't have a language file for the specified language */
define('GESHI_ERROR_NO_SUCH_LANG', 2);
/** The language name contained illegal characters */
define('GESHI_ERROR_LANG_NAME_ILLEGAL_CHARS', 4);
/** The path specified is not readable */
//define('GESHI_ERROR_ILLEGAL_PATH', 5);
/** The theme specified does not exist */
//define('GESHI_ERROR_NO_SUCH_THEME', 6);
/** Parsing is in strict mode, but the root context does not have a specific opener */
//define('GESHI_ERROR_STRICT_MODE_NO_OPENER', 7);
/** getTime($type) was called with an invalid type */
define('GESHI_ERROR_INVALID_TIME_TYPE', 8);
/** A file that was requested for loading data is not available */
define('GESHI_ERROR_FILE_UNAVAILABLE', 9);

// Constants for specifying who (out of the parent or child) highlights the delimiter
// between the parent and the child. Note that if you view the numbers as two bit binary,
// a 1 indicates where the child parses and a 0 indicates where the parent should parse.
// The default is GESHI_CHILD_PARSE_BOTH
/** The child should parse neither delimiter (parent parses both) */
define('GESHI_CHILD_PARSE_NONE', 0);
/** The child should parse the right (end) delimiter, the parent should parse the left delimiter */
define('GESHI_CHILD_PARSE_RIGHT', 1);
/** The child should parse the left (beginning) delimiter, the parent should parse the right delimiter */
define('GESHI_CHILD_PARSE_LEFT', 2);
/** The child should parse both delimiters (default) */
define('GESHI_CHILD_PARSE_BOTH', 3);

// The name of integer/double number contexts
define('GESHI_NUM_INT', 'num/int');
define('GESHI_NUM_DBL', 'num/dbl');

/** Default file extension */
define('GESHI_DEFAULT_FILE_EXTENSION', '.php');

/**#@-*/


/**
 * The GeSHi class
 *
 * @package core 
 * @author  Nigel McNie <nigel@geshi.org>
 * @since   1.0.0
 */
class GeSHi
{
    /**#@+
     * @access private
     * @var string
     */

    /**
     * The source code to parse
     */
    var $_source;

    /**
     * The name of the language to use when parsing the source
     */
    var $language;

    /**
     * The humanised version of the language name
     */
    var $humanLanguageName;

    /**
     * The error code of any error that has occured
     */
    var $_error;

    /**#@-*/
    /**#@+
     * @access private
     */

    /**
     * The root context to use for parsing the source
     * 
     * @var GeSHiContext
     */
    var $_rootContext;
    
    /**
     * Whether this object should be prepared as if it will be used
     * many times
     */
    var $_cacheRootContext;
    
    /**
     * The cached root context, if caching of context trees is enabled
     */
    var $_cachedRootContext;

    /**#@-*/
    
    /**
     * Sets the source and language name of the source to parse
     *
     * Also sets up other defaults, such as the default encoding
     * 
     * <b>USAGE:</b>
     * 
     * <pre>$geshi =& new GeSHi($source, $language);
     * if (false !== ($msg = $geshi->error())) {
     *     // Handle error here: error message in $msg
     * }
     * $code = $geshi->parseCode();</pre>
     *
     * @param string The source code to highlight
     * @param string The language to highlight the source with
     * @param string The path to the GeSHi data files. <b>This is no longer used!</b> The path is detected
     *               automatically by GeSHi, this paramters is only included for backward compatibility. If
     *               you want to set the path to the GeSHi data directories yourself, you should define the
     *               GESHI_ROOT constant before including class.geshi.php.
     * @since 1.0.0
     */
    function GeSHi ($source, $language_name, $path = '')
    {
        geshi_dbg('GeSHi::GeSHi (language='.$language_name.')', GESHI_DBG_API);

        // Initialise timing
        $initial_times = array(0 => '0 0', 1 => '0 0');
        $this->_times = array(
            'pre'   => $initial_times,
            'parse' => $initial_times,
            'post'  => $initial_times
        );
        
        $this->_styler =& new GeSHiStyler;

        // @todo Make third parameter an option array thing        
        
        $this->setFileExtension(GESHI_DEFAULT_FILE_EXTENSION);
        //$this->setOutputFormat(GESHI_OUTPUT_HTML);
        //$this->setEncoding(GESHI_DEFAULT_ENCODING);

        // Set the initial source/language
        $this->setSource($source);
        $this->setLanguage($language_name);
    }

    /**
     * Returns an error message if there has been an error. Useful for debugging,
     * but not recommended for use on a live site.
     * 
     * The last error that occured is returned by this method
     * @todo Documentation: has this changed from 1.0.X?
     *
     * @return false|string A message if there is an error, else false
     * @since  1.0.0
     */
    function error ()
    {
        geshi_dbg('GeSHi::error()', GESHI_DBG_ERR | GESHI_DBG_API);
        if ($this->_error) {
            $msg = $this->_getErrorMessage();
            geshi_dbg('  ERR: ' . $this->_error . ': ' . $msg, GESHI_DBG_API | GESHI_DBG_ERR);
            return sprintf('<br /><strong>GeSHi Error:</strong> %s (code #%s)<br />"',
                    '<a href="http://geshi.org/developers/error-codes/">{$this->_error}</a>',
                    $this->_error);
        }
        geshi_dbg('  No error', GESHI_DBG_ERR | GESHI_DBG_API);
        return false;
    }

    /**
     * Sets the source code to highlight
     *
     * @param string The source code to highlight
     * @since 1.0.0
     */
    function setSource ($source)
    {
        geshi_dbg('GeSHi::setSource(' . substr($source, 0, 15) . '...)', GESHI_DBG_API);
        $this->_source = $source;
        if (!$this->_sourceValid()) {
            geshi_dbg('@e  Source code is not valid!', GESHI_DBG_API | GESHI_DBG_ERR);
        }
    }

    /**
     * Sets the source code to highlight. This method is deprecated, and will be
     * removed in 1.4/2.0.
     *
     * @param string The source code to highlight
     * @since 1.0.0
     * @deprecated In favour of {@link setSource()}
     */
    function set_source ($source)
    {
        $this->setSource($source);
    }

    /**
     * Sets the language to use for highlighting
     *
     * @param string The language to use for highlighting
     * @since 1.0.0
     */
    function setLanguage ($language_name)
    {
        $this->_times['pre'][0] = microtime();
        geshi_dbg('GeSHi::setLanguage('.$language_name.')', GESHI_DBG_API);
        $this->_language = strtolower($language_name);
        
        // Make a legal language name
        if (false === strpos($this->_language, '/')) {
            $this->_language .= '/'.$this->_language;
            geshi_dbg('  Language name converted to '.$this->_language, GESHI_DBG_API);
        }

        if ($this->_languageNameValid()) {
            // load language now
            geshi_dbg('@o  Language name fine, loading data', GESHI_DBG_API);
            $this->_parsePreProcess();
        } else {
            geshi_dbg('@e  Language name not OK! (code '.$this->_error.')', GESHI_DBG_API | GESHI_DBG_ERR);
        }

        $this->_times['pre'][1] = microtime();
        geshi_dbg('  Language data loaded in ' . number_format($this->getTime('pre'), 3) . ' seconds', GESHI_DBG_API);
    }

    /**
     * Sets the language to use for highlighting. This method is deprecated, and
     * will be removed in 1.4/2.0.
     *
     * @param string The language to use for highlighting
     * @since 1.0.0
     * @deprecated In favour of {@link setLanguage()}
     */
    function set_language($language_name)
    {
        $this->setLanguage($language_name);
    }
    
    /**
     * Sets whether this object should cache the root context as loaded. Use
     * this if you're going to use the same language in this object to parse
     * multiple source codes.
     *
     * @param boolean true if caching of context data should be used 
     */
    function cacheRootContext ($flag = true)
    {
        geshi_dbg('GeSHi::cacheRootContext(' . $flag . ')', GESHI_DBG_API);
        $this->_cacheRootContext = ($flag) ? true : false;
        $this->_cachedRootContext = ($this->_cacheRootContext) ? $this->_rootContext : null;
        geshi_dbg('  Set caching to ' . $flag . ', cached root context size = ' . count($this->_cachedRootContext), GESHI_DBG_API);
    }
    
    /**
     * Sets the file extension to use when getting external php files
     * 
     * @param string The file extension for PHP files. Can be specified with or without the leading "."
     */
    function setFileExtension ($extension)
    {
        $this->_styler->fileExtension = ('.' == substr($extension, 0, 1)) ? $extension : '.' . $extension;
        geshi_dbg('GeSHi::setFileExtension(' . $this->_styler->fileExtension . ')', GESHI_DBG_API);
    }

    /**
     * Returns various timings related to this object.
     *
     * For example, how long it took to load a specific context,
     * or parse the source code.
     *
     * @todo Better documentation here
     *
     * @param string What time you want to access
     * @return false|double The time if there is a time, else false if there was an error
     */
    function getTime ($type = 'total')
    {
        geshi_dbg('GeSHi::getTime(' . $type . ')', GESHI_DBG_API);
        if (isset($this->_times[$type])) {
            geshi_dbg('@o  Valid type', GESHI_DBG_API);
            $start = explode(' ', $this->_times[$type][0]);
            $end   = explode(' ', $this->_times[$type][1]);
            return $end[0] + $end[1] - $start[0] - $start[1];
        } elseif ('total' == $type) {
            return $this->getTime('pre') + $this->getTime('parse') + $this->getTime('post');
        }
        geshi_dbg('@w  Type passed to getTime is invalid', GESHI_DBG_API | GESHI_DBG_ERR);
        $this->_error = GESHI_ERROR_INVALID_TIME_TYPE;
        return false;
    }
    
    /**
     * Sets styles of contexts in the source code
     * 
     * @param string The selector to use, this is the style name of a context. Example: php/php
     * @param string The CSS styles to apply to the context
     */
     function setStyles ($selector, $styles)
     {
        geshi_dbg('GeSHi::setStyles(' . $selector . ', ' . $styles . ')', GESHI_DBG_API);
        $this->_styler->setStyle($selector, $styles);
     }

    /**
     * Syntax-highlights the source code
     * 
     * @return string The source code, highlighted
     */
    function parseCode ()
    {
        $this->_times['parse'][0] = microtime();
        geshi_dbg('GeSHi::parseCode()', GESHI_DBG_API | GESHI_DBG_PARSE);

        if ($this->_error) {
            // Bail out
            geshi_dbg('@e  Error occured!!', GESHI_DBG_PARSE);
            $this->_times['parse'][1] = $this->_times['post'][0] = microtime();
            $result = $this->_parsePostProcess();
            $this->_times['post'][1] = microtime(); 
            return $result;
        }

        // Kill the cached root context, replacing with
        // the new root context if needed
        if ($this->_cacheRootContext) {
            $this->_rootContext = $this->_cachedRootContext;
        }
        
        //@todo does this space still need to be added?
        $code = ' ' . $this->_source;
        // Runtime setup of context tree/styler info
        // Reset the parse data to nothing 
        $this->_styler->resetParseData();
        // Remove contexts from the parse tree that aren't interesting
        $this->_rootContext->trimUselessChildren($code);
        // The important bit - parse the code
        $this->_rootContext->parseCode($code);


        $this->_times['parse'][1] = $this->_times['post'][0] = microtime();
        $result = $this->_parsePostProcess();
        $this->_times['post'][1] = microtime();
        
        return $result;
    }

    //
    // Private Methods
    //

    /**#@+
     * @access private
     */
    /**
     * Get the error message relating to the current error code
     * 
     * @return string The error message relating to the current error code
     */
    function _getErrorMessage ()
    {
        if ($this->_error) {
            $messages = array (
                // @todo Move out of here
                GESHI_ERROR_NO_SUCH_LANG => 'GeSHi could not find the language {LANGUAGE} (using path {LANGPATH})',
                GESHI_ERROR_NO_INPUT => 'No source code passed to GeSHi to highlight',
                GESHI_ERROR_LANG_NAME_ILLEGAL_CHARS => 'The language name {LANGUAGE} contains illegal characters',
            //GESHI_ERROR_ILLEGAL_PATH => 'The path {PATH} is not a readable directory',
            //GESHI_ERROR_NO_SUCH_THEME => 'GeSHi could not find the theme {THEME} (using path {THEMEPATH})',
            //GESHI_ERROR_STRICT_MODE_NO_OPENER => 'Strict mode is enabled but there is no opener for the root context',
                GESHI_ERROR_INVALID_TIME_TYPE => 'Call getTime with the only parameter set to one of "pre", "parse", "post" or "total"',
                GESHI_ERROR_FILE_UNAVAILABLE => 'A file that GeSHi requires to parse using the language ' . $this->_language . ' is unavailable'
            );

            $variable_substitutes = array (
                '{LANGUAGE}' => $this->_language,
                '{PATH}' => GESHI_ROOT,
                '{LANGPATH}' => GESHI_LANGUAGES_ROOT,
                //'{THEMEPATH}' => GESHI_THEMES_ROOT,
                //'{THEME}'     => $this->_styler->themeName
            );

            $message = $messages[$this->_error];
            foreach ($variable_substitutes as $string => $replacement) {
                $message = str_replace($string, $replacement, $message);
            }
            $message = htmlspecialchars($message, ENT_COMPAT, $this->_styler->charset);
            return $message;
        }
        return '';
    }

    /**
     * Check that the language name to be used is valid
     * 
     * @return boolean true if the language name is valid, else false
     */
    function _languageNameValid ()
    {
        geshi_dbg('GeSHi::_languageNameValid('.$this->_language.')', GESHI_DBG_API);

        // Check if the language contains illegal characters. If language names do
        // not match this regular expression, they are not valid. This is a useful
        // security check as well, if people blindly use a post/get variable as the
        // language name... 
        if (!preg_match('#[a-z][a-z0-9]*(/[a-z][a-z0-9]*)+#', $this->_language)) {
            geshi_dbg('@e  Language name contains illegal characters', GESHI_DBG_API | GESHI_DBG_ERR);
            $this->_error = GESHI_ERROR_LANG_NAME_ILLEGAL_CHARS;
            return false;
        }

        // Check that the language file for this language exists
        $language_file = $this->_getLanguageDataFile();
        geshi_dbg('  Language file to use: ' . $language_file, GESHI_DBG_API);
        
        if (!geshi_can_include($language_file)) {
            geshi_dbg('@e  Language does not exist on filesystem', GESHI_DBG_API | GESHI_DBG_ERR);
            $this->_error = GESHI_ERROR_NO_SUCH_LANG;
            return false;
        }

        geshi_dbg('@o  Language name is fine', GESHI_DBG_API);
        return true;
    }

    /**
     * Checks to make sure that the source code inputted is valid
     * 
     * The source is valid when:
     * 
     * <ul>
     *   <li>it is not empty</li>
     * </ul>
     * 
     * @return true if the source code is valid, else false
     */
    function _sourceValid ()
    {
        geshi_dbg('GeSHi::_sourceValid()', GESHI_DBG_API);
        // Is source empty?
        if ('' == trim($this->_source)) {
            geshi_dbg('@e  No source code inputted', GESHI_DBG_API | GESHI_DBG_ERR);
            $this->_error = GESHI_ERROR_NO_INPUT;
            return false;
        }
        geshi_dbg('@o  Source code OK', GESHI_DBG_API);
        return true;
        // @todo Other things can go in here - checks against max and min length etc
    }

    /**
     * Prepare the source code for parsing
     */
    function _parsePreProcess ()
    {
        geshi_dbg('GeSHi::parsePreProcess()', GESHI_DBG_API);

        // Strip newlines to common form
        $this->_source = str_replace("\r\n", "\n", $this->_source);
        $this->_source = str_replace("\r", "\n", $this->_source);

        // Load all the data needed for parsing this language
        $language_file = $this->_getLanguageDataFile();
        geshi_dbg('  Loading language data from ' . GESHI_LANGUAGES_ROOT . $language_file, GESHI_DBG_API);
        require $language_file;

        if ($error_data = $this->_rootContext->load($this->_styler)) {
            geshi_dbg('@e  Could not load the context data tree: code(' . $error_data['code'] . ') in context ' . $error_data['name'], GESHI_DBG_API | GESHI_DBG_ERR);
            $this->_error = $error_data['code'];
        }

        // Inform the context tree that all contexts have been loaded, so it is OK to search through
        // the tree for default styles as needed.        
        $this->_rootContext->loadStyleData(); 
        
        // Save a copy of the root context if we are caching 
        $this->_cachedRootContext = ($this->_cacheRootContext) ? $this->_rootContext : null;
        
        geshi_dbg('Finished preprocessing', GESHI_DBG_API);       
    }

    /**
     * Builds the result string to return, by looking at the context data array
     * 
     * This is to be moved into a new class: GeSHi_Highlighter, which will extend GeSHi to
     * do this job. The GeSHi class will still be able to highlight source code, but this
     * behaviour is deprecated and will be removed in the next major release.
     * 
     * @return The code, post-processed.
     */
    function _parsePostProcess ()
    {
        if ($this->_error) {
            // If there was an error, the source will be in string form
            return '<pre style="background-color:#fcc;border:1px solid #c99;">' . htmlspecialchars($this->_source) .'</pre>';
        }
        
        // $this->_data should hold an array(
        //   0 => array(0=>string of code, 1=> context name identifier
        $result = '';
        $data = $this->_styler->getParseData();
        // TO BE REMOVED from stable release
        if (GESHI_DBG & GESHI_DBG_PARSE) {
            $result .= '<pre style="background-color:#ffc;border:1px solid #cc9;">';
	        foreach ($data as $token) {
	        	if (!isset($check)) {
	        		$token[0] = substr($token[0], 1); // remove padding
	        		$check = 0;
	        	}
	            $result .= '[' . $token[1] . ']: ' . htmlspecialchars($token[0]) . "\n";
	        }
	        unset($check);
	        $result .= '</pre>';
        }

        $result .= '<pre style="background-color:#ffc;border:1px solid #cc9;">';
        foreach ($data as $token) {
        	if (!isset($check)) {
        		$token[0] = substr($token[0], 1); // remove padding (slow?)
        		$check = 0;
        	}
            if ($token[2]) {
                $result .= '<a href="' . $token[2] . '">';
            }
            $result .= '<span style="' . $this->_styler->getStyle($token[1]) . '" ';
            $result .= 'class="' . str_replace(array('/', '_'), '-', $token[1]) . '" ';
            $result .= 'title="' . $token[1] . '">' . htmlspecialchars($token[0]) . '</span>';
            if ($token[2]) {
                // there's a URL associated with this token
                $result .= '</a>';
            }
        }
        $result .= '</pre>';
        
        // @todo [blocking 1.1.1] Evaluate feasability and get working if possible the functionality below...
        $result = preg_replace('#([^"])(((https?)|(ftp))://[a-z0-9\-]+\.([a-z0-9\-\.]+)+/?([a-zA-Z0-9\.\-_%]+/?)*\??([a-zA-Z0-9=&\[\];%]+)?(\#[a-zA-Z0-9\-_]+)?)#', '\\1<a href="\\2">\\2</a>', $result);
        $result = preg_replace('#([a-z0-9\._\-]+@[[a-z0-9\-\.]+[a-z]+)#si', '<a href="mailto:\\1">\\1</a>', $result);
                
        return $result;        
    }
    
    
    /**
     * Helper function to convert a language name to the file name where its data will reside
     * 
     * @return The absolute path of the language file where the current language data will be sourced
     */
    function _getLanguageDataFile ()
    {
        geshi_dbg('GeSHi::_getLanguageDataFile()', GESHI_DBG_API);
        if ('/' == GESHI_DIR_SEPARATOR) {
            $language_file = $this->_language . $this->_styler->fileExtension;
        } else {
            $language_file = explode('/', $this->_language);
            $language_file = implode(GESHI_DIR_SEPARATOR, $language_file) . $this->_styler->fileExtension;
        }
        geshi_dbg('Language file is ' . $language_file, GESHI_DBG_API);
        return GESHI_LANGUAGES_ROOT . $language_file;
    }
    /**#@-*/    
}
?>

