<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * <pre>
 *   File:   geshi/classes/class.geshistringcontext.php
 *   Author: Nigel McNie
 *   E-mail: nigel@geshi.org
 * </pre>
 * 
 * For information on how to use GeSHi, please consult the documentation
 * found in the docs/ directory, or online at http://geshi.org/docs/
 * 
 * This program is part of GeSHi.
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 * 
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301 USA
 *
 * @package    geshi
 * @subpackage core
 * @author     Nigel McNie <nigel@geshi.org>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2004 - 2006 Nigel McNie
 * @version    $Id$
 * 
 */

/**
 * The GeSHiStringContext class. This class extends GeSHiContext to handle
 * the concept of escape characters that strings often use.
 *  
 * @package    geshi
 * @subpackage core
 * @author     Nigel McNie <nigel@geshi.org>
 * @since      1.1.0
 * @version    $Revision$
 * @see        GeSHiContext
 */
class GeSHiStringContext extends GeSHiContext
{
    /**#@-
     * @access private
     */
    var $_escapeCharacters = array();
    
    // Characters that should be escaped
    var $_charsToEscape = array();
    
    /**#@-*/
    
    // {{{ setEscapeCharacters()
    
    /**
     * Sets the characters that are used to escape other characters in a string
     */
    function setEscapeCharacters ($chars)
    {
        $this->_escapeCharacters = (array) $chars;
    }
    
    // }}}
    // {{{ setCharactersToEscape()
    
    function setCharactersToEscape ($chars)
    {
        $this->_charsToEscape = (array) $chars;
    }
    
    // }}}
    
    /**
     * GetContextEndData
     */
    function _getContextEndData ($code, $context_open_key, $context_opener)
    {
        geshi_dbg('GeSHiStringContext::_getContextEndData(' . $this->_contextName . ', ' . $context_open_key . ', ' . $context_opener . ')');
        $this->_lastOpener = $context_opener;
        $ender_data = array();
        
        foreach ($this->_contextDelimiters[$context_open_key][1] as $ender) {
            geshi_dbg('  Checking ender: ' . $ender);

            // Prepare ender regexes if needed
            $ender = $this->_substitutePlaceholders($ender);
            geshi_dbg('  ender after substitution: ' . $ender);

            $pos = 0;
            while (true) {
                $pos = geshi_get_position($code, $ender, $pos);
                if (false === $pos) {
                    break;
                }
                $len = $pos['len']; 
                $pos = $pos['pos'];
                
                $possible_string = substr($code, 0, $pos);            
                geshi_dbg('  String might be: ' . $possible_string);
                
                $not_escaped = true;
                if ($this->_escapeCharacters) {
                    foreach ($this->_escapeCharacters as $escape_char) {
                        // remove escaped escape characters
                        $possible_string = str_replace($escape_char . $escape_char, '', $possible_string);
                    }
                    
                    geshi_dbg('  String with double escapes removed: ' . $possible_string);

                    foreach ($this->_escapeCharacters as $escape_char) {
                        if (substr($possible_string, -1) == $escape_char) {
                            $not_escaped = false;
                            break;
                        }
                        
                        if ($escape_char == $ender
                            && substr($code, $pos + 1, 1) == $escape_char) {
                            // We have encountered the case where a string
                            // has its own ender as a delimiter and as an
                            // escape character
                            $not_escaped = false;
                            break;
                        }
                    }
                }
                
                if ($not_escaped) {
                    // We may have found the correct ender. If we haven't, then this string
                    // never ends and we will set the end position to the length of the code
                    // substr($code, $pos, 1) == $ender
                    $endpos = geshi_get_position($code, $ender, $pos);
                    geshi_dbg('  position of ender: ' . $endpos['pos']);
                    $pos = (false !== $pos && $endpos['pos'] === $pos) ? $pos : strlen($code);
                    if (!$ender_data || $ender_data['pos'] > $pos) {
                        $ender_data = array('pos' => $pos, 'len' => $len, 'dlm' => $ender);
                    }
                    break;
                }
                
                // else, start further up
                ++$pos;
            }
        }
        geshi_dbg('Ender data: ' . print_r($ender_data, true));
        return ($ender_data) ? $ender_data : false;
    }
    
    /**
     * Overrides addParseData to add escape characters also
     */
     function _addParseData ($code, $first_char_of_next_context = '')
     {
        geshi_dbg('GeSHiStringContext::_addParseData(' . substr($code, 0, 15) . '...)');
        
        $length = strlen($code);
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $char = substr($code, $i, 1);
            geshi_dbg('Char: ' . $char);
            $skip = false;
            
            foreach ($this->_escapeCharacters as $escape_char) {
                $len = 1;
                if ($char == $escape_char && (false !== ($len = $this->_shouldBeEscaped(substr($code, $i + 1))))) {
                    geshi_dbg('Match: len = ' . $len);
                    if ($string) {
                        $this->_styler->addParseData($string, $this->_contextName,
                            $this->_getExtraParseData(), $this->_complexFlag);
                        $string = '';
                    }
                    // Needs a better name than /esc
                    $this->_styler->addParseData($escape_char . substr($code, $i + 1, $len), $this->_contextName . '/esc',
                        $this->_getExtraParseData(), $this->_complexFlag);
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
            $this->_styler->addParseData($string, $this->_contextName, $this->_getExtraParseData(),
                $this->_complexFlag);
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
        geshi_dbg('Checking: ' . substr($code, 0, 15));
        foreach ($this->_charsToEscape as $match) {
            if ('REGEX' != substr($match, 0, 5)) {
                geshi_dbg('Test: ' . $match);
                if (substr($code, 0, 1) == $match) {
                    return 1;
                }
            } else {
                geshi_dbg('  Testing via regex: ' . $match . '... ', false);
                $data = geshi_get_position($code, $match, 0);
                if (0 === $data['pos']) {
                    geshi_dbg('match, data = ' . print_r($data, true));
                    return $data['len'];
                }
                geshi_dbg('no match');
            }
        }
        // No matches...
        return false;
    }
}

?>
