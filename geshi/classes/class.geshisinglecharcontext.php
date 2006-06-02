<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * <pre>
 *   File:   geshi/classes/class.geshisinglecharcontext.php
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
 * The GeSHiSingleCharContext class. This class extends GeSHiContext to handle
 * "single character" strings - strings that are only one character long, like
 * in java.
 * 
 * Note that this functionality assumes that the delimiters for single character
 * contexts are just one character long (a sensible assumption made for speed
 * reasons). If required in the future this class could support longer delimiters.
 *  
 * @package    geshi
 * @subpackage core
 * @author     Nigel McNie <nigel@geshi.org>
 * @since      1.1.1
 * @version    $Revision$
 * @see        GeSHiContext
 */
class GeSHiSingleCharContext extends GeSHiContext
{
    
    // {{{ properties
    
    /**#@-
     * @access private
     */
    var $_escapeCharacters;
    
    // Characters that should be escaped
    var $_charsToEscape;
        
    /**#@-*/
    
    // }}}
    // {{{ setEscapeCharacters()
    
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
    // {{{ getContextStartData()
    /**
     * GetContextStartData
     * 
     * Overridden to check if this context should even start. If we can't find
     * a valid end-of-string character in the correct place this context should
     * not even start.
     * 
     * @param string $code
     * @param string $start_of_context
     */
    function getContextStartData ($code, $start_of_context)
    {
        geshi_dbg('GeSHiSingleCharContext::getContextStartData(' . $this->_contextName . ', ' . $start_of_context . ')');
        
        $offset = 0;
        while (true) {
            $data = parent::getContextStartData($code, $start_of_context);
            
            // First, if no match then bail
            if (-1 === $data['pos']) {
                return $data;
            }
            
            $first_position = $data['pos'];
            $first_length   = $data['len'];
            $first_key      = $data['key'];
            $first_dlm      = $data['dlm'];
            
            // Check for empty character
            // WARN: claim here that delimiters are only one char long!
            if (in_array(substr($code, $first_position + 1, 1), $this->_contextDelimiters[$first_key][1])) {
                // Nothing wrong with this
                $data['pos'] += $offset;
                return $data;
            }
            
            // Check for single alone character
            $final_char_offset = (in_array(substr($code, $first_position + 1, 1), $this->_escapeCharacters))
                ? 3 : 2;
            if (in_array(substr($code, $first_position + $final_char_offset, 1),
                $this->_contextDelimiters[$first_key][1])) {
                $data['pos'] += $offset;
                return $data;
            }
            
            
            // End: strip to just past where the character failed to start and try again
            $code = substr($code, $first_position + 1);
            $offset += $first_position + 1;
        }
        
        return array('pos' => $first_position, 'len' => $first_length,
                     'key' => $first_key, 'dlm' => $first_dlm);
    }
    
    // }}}
    // {{{ _getContextEndData()
    
    /**
     * In this case we don't need to worry about much because we have made sure in
     * _getContextStartData that we are starting in the right place.
     */
    function _getContextEndData ($code, $context_open_key, $context_opener, $beginning_of_context)
    {
        $pos = 1;
        $first_char = substr($code, 0, 1);
        if (in_array($first_char, $this->_escapeCharacters)) {
            $pos = 2;
        } elseif (in_array($first_char, $this->_contextDelimiters[$context_open_key][1])) {
            $pos = 0;
        }
        return array('pos' => $pos, 'len' => 1 /*see WARN above*/, 'dlm' => '');
    }
    
    // }}}
    // {{{ _addParseData()
    
    /**
     * Overrides _addParseData to add escape characters also
     */
    function _addParseData ($code, $first_char_of_next_context = '')
    {
        geshi_dbg('GeSHiSingleCharContext::_addParseData(' . substr($code, 0, 15) . '...)');       
        if (in_array(substr($code, 0, 1), $this->_escapeCharacters)) {
            $this->_styler->addParseData($code, $this->_contextName . '/esc',
                $this->_getExtraParseData(), $this->_complexFlag);
        } else {
            parent::_addParseData($code, $first_char_of_next_context);
        }
    }
    
    // }}}

}

?>
