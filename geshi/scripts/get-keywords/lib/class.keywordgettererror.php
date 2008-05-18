<?php
/**
 * GeSHi - Generic Syntax Highlighter
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * You can view a copy of the GNU GPL in the LICENSE file that comes
 * with project_name, in the docs/ directory.
 *
 * @package   scripts
 * @author    Nigel McNie <oracle.shinoda@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005 Nigel McNie
 * @version   $Id$
 * 
 */

class KeywordGetterError
{
    
    /**
     * The error message
     * @var string
     */
    var $_errorMessage;
    
    /**
     * Possible error messages
     * @var array
     * @static
     */
    var $_errorMessages = array(
        LANG_NOT_SUPPORTED    =>
            'The language "{LANGUAGE}" is not supported by this tool at this time
(see php $0 list-langs for a list of supported languages)',
        INVALID_STRATEGY      =>
            'The strategy object given is invalid (this is an internal error,
if you see this please send a bug report to nigel@geshi.org)',
        INVALID_KEYWORD_GROUP =>
            'The keyword group "{KEYWORD_GROUP}" given is invalid for the language "{LANGUAGE}"'
    );
    
    /**
     * Creates a new KeywordGetterError object
     * 
     * @param int The error type of this error
     * @param string The language being used
     */
    function KeywordGetterError ($error_type, $language, $other_info = array())
    {
        global $argv;
        $message = $this->_errorMessages[$error_type];
        $matches = array(
            '{LANGUAGE}' => $language,
            '$0' => $argv[0]
        );
        $matches = array_merge($matches, $other_info);
        
        $message = str_replace(array_keys($matches), $matches, $message);
        $this->_errorMessage = 'Error: ' . $message . "\n";
    }
    
    /**
     * Returns the last error
     * 
     * @return string
     */
    function lastError ()
    {
        return $this->_errorMessage;
    }
}

?>

