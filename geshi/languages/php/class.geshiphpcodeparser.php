<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * <pre>
 *   File:   geshi/languages/php/class.geshiphpcodeparser.php
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
 * @subpackage lang
 * @author     Nigel McNie <nigel@geshi.org>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2004 - 2006 Nigel McNie
 * @version    $Id$
 * 
 */

/**
 * The GeSHiPHPCodeParser class
 * 
 * @package    geshi
 * @subpackage lang
 * @author     Nigel McNie <nigel@geshi.org>
 * @since      1.1.1
 * @version    $Revision$
 */
class GeSHiPHPCodeParser extends GeSHiCodeParser
{
    
    // {{{ properties
    
    /**
     * A flag that can be used for the "state" of parsing
     * 
     * @var string
     * @access private
     */
    var $_state = '';
    
    /**
     * A list of class names detected in the source
     * 
     * @var array
     * @access private
     */
    var $_classNames = array();
    
    // }}}
    // {{{ parseToken()
    
    /**
     * This method can either return an array like
     * this one is doing, or nothing (false), or an
     * array of arrays. This way, it can hold onto
     * data it needs for parsing
     * 
     * @todo [blocking 1.1.2] Use this to put class names into a
     * different context, and highlight them where they occur differently.
     * 
     * @todo [blocking 1.1.5] Use this to highlight function
     * names, e.g. function Foo means that Foo is php/php/function_names
     * and anywhere else Foo is encountered it is converted. This
     * will have to take into account:
     * 
     * - the name and dialect of the language currently being used (may
     *   have to alter GeSHiStyler for this
     * - the & symbol that might be before the function
     * - the function token is actually in the right context (e.g. php/$DIALECT)
     * - the function isn't actually a method (can highlight those too, of course)
     */
    function parseToken ($token, $context_name, $data)
    {
        if ('class' == $this->_state && !geshi_is_whitespace($token)) {
            // We just read the keyword "class", so this token 
            $this->_state = '';
            $context_name = $this->_language . '/classname';
            $this->_classNames[] = $token;
        } elseif (('class' == $token || 'extends' == $token) && $this->_language . '/keyword' == $context_name) {
            // We are about to read a class name
            $this->_state = 'class';
        } elseif (in_array($token, $this->_classNames) && $this->_language == $context_name) {
            // Detected use of class name we have already detected
            $context_name = $this->_language . '/classname';
        }
        
        return array($token, $context_name, $data);
    }
    
    // }}}
    
}

?>
