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
 * with GeSHi, in the docs/ directory.
 *
 * @package   core
 * @author    Nigel McNie <oracle.shinoda@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005 Nigel McNie
 * @version   $Id$
 * 
 */

/**
 * The GeSHiStringContext class
 * 
 * @package core
 */
class GeSHiStringContext extends GeSHiContext
{
    /**#@-
     * @access private
     */
    var $_escapeCharacters;
    
    // Characters that should be escaped
    var $_charsToEscape;
    
    /**#@-*/
    
    /**
     * GetContextEndData
     */
    function _getContextEndData ($code, $context_open_key, $context_opener)
    {
        geshi_dbg('GeSHiContext::_getContextEndData(' . $this->_contextName . ', ' . $context_open_key . ', ' . $context_opener . ')', GESHI_DBG_API | GESHI_DBG_PARSE);
        
        
        foreach ($this->_contextDelimiters[$context_open_key][1] as $ender) {
            geshi_dbg('  Checking ender: ' . $ender, GESHI_DBG_PARSE);

            // Prepare ender regexes if needed
            $ender = $this->_substitutePlaceholders($ender);

            
            $pos = 1;
            while (true) {
                $pos = geshi_get_position($code, $ender, $pos);
                if (false === $pos) {
                    break;
                }
                $len = $pos['len']; 
                $pos = $pos['pos'];
                
                $possible_string = substr($code, 0, $pos);            
                geshi_dbg('  String might be: ' . $possible_string, GESHI_DBG_PARSE);
                
                foreach ($this->_escapeCharacters as $escape_char) {
                    // remove escaped escape characters
                    $possible_string = str_replace($escape_char . $escape_char, '', $possible_string);
                }
                
                geshi_dbg('  String with double escapes removed: ' . $possible_string, GESHI_DBG_PARSE);

                //@todo possible bug: only last escape character checked here                
                if (substr($possible_string, -1) != $escape_char) {
                    // we've found the correct ender
                    return array('pos' => $pos, 'len' => $len, 'dlm' => $ender);
                }
                // else, start further up
                ++$pos;
            }
        }
        return false;
    }
    
    /**
     * Overrides addParseData to add escape characters also
     */
     function _addParseData ($code, $first_char_of_next_context = '')
     {
        geshi_dbg('GeSHiStringContext::_addParseData(' . substr($code, 0, 15) . ')', GESHI_DBG_PARSE);
        //$this->_styler->addParseData($code, $this->_contextName);
        $length = strlen($code);
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $char = substr($code, $i, 1);
            geshi_dbg('Char: ' . $char, GESHI_DBG_PARSE);
            $skip = false;
            
            foreach ($this->_escapeCharacters as $escape_char) {
                $len = 1;
                if ($char == $escape_char && (false !== ($len = $this->_shouldBeEscaped(substr($code, $i + 1))))) {
                    geshi_dbg('Match: len = ' . $len, GESHI_DBG_PARSE);
                    if ($string) {
                        $this->_styler->addParseData($string, $this->_styleName);
                        $string = '';
                    }
                    // Needs a better name than /esc
                    $this->_styler->addParseData($escape_char . substr($code, $i + 1, $len), $this->_styleName . '/esc');
                    // FastForward
                    $i += $len;
                    $skip = true;
                    break;
                }
            }
            
            if (!$skip) {
                $string .= $char;
            }
        }
        if ($string) {
            $this->_styler->addParseData($string, $this->_styleName);
        }
     }
     
     /**
      * Checks whether the character(s) at the start of the parameter string are
      * characters that should be escaped.
      * 
      * @param string The string to check the beginning of for escape characters
      * @return int|false The length of the escape character sequence, else false
      */
      function _shouldBeEscaped ($code)
      {
        geshi_dbg('Checking: ' . substr($code, 0, 15), GESHI_DBG_PARSE);
          foreach ($this->_charsToEscape as $match) {
              if ('REGEX' != substr($match, 0, 5)) {
                geshi_dbg('Test: ' . $match, GESHI_DBG_PARSE);
                  if (substr($code, 0, 1) == $match) {
                      return 1;
                  }
              } else {
                geshi_dbg('  Testing via regex: ' . $match . '... ', GESHI_DBG_PARSE, false);
                  $data = geshi_get_position($code, $match, 0);
                  if (0 === $data['pos']) {
                    geshi_dbg('match, data = ' . print_r($data, true), GESHI_DBG_PARSE);
                      return $data['len'];
                  }
                  geshi_dbg('no match', GESHI_DBG_PARSE);
              }
          }
          // No matches...
          return false;
      }
}
?>
