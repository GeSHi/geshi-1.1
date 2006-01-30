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
 * @author    Tim Wright <tim.w@clear.net.nz>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005 Nigel McNie
 * @version   $Id$
 * 
 */
 
/** Get the GeSHiCodeParser class */
require_once GESHI_CLASSES_ROOT . 'class.geshicodeparser.php';
 
class GeSHiJavaCodeParser extends GeSHiCodeParser
{ 
 
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
 
   
    /**
     * This will probably disappear from here as theming support
     * arrives
     */
    function GeSHiJavaCodeParser (&$styler, $language)
    {
        $this->GeSHiCodeParser($styler, $language);
        $this->_styler->setStyle('class_name', 'color:red;');
    }
 
   /**
     * This method can either return an array like
     * this one is doing, or nothing (false), or an
     * array of arrays. This way, it can hold onto
     * data it needs for parsing
     * 
     * @todo [blocking 1.1.1] Use this to put class names into a
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
     * - the function token is actually in the right context (e.g. java/$DIALECT)
     * - the function isn't actually a method (can highlight those too, of course)
     */
    function parseToken ($token, $context_name, $data)
    {echo htmlspecialchars("$token $context_name ");//print_r($this->_styler);exit;
        if ('class' == $this->_state && !geshi_is_whitespace($token)) {
            // We just read the keyword "class", so this token 
            $this->_state = '';
            $context_name = $this->_language . '/class_name';
            $this->_classNames[] = $token;
        } elseif (('class' == $token || 'extends' == $token || 'new' == $token) && $this->_language . '/keyword' == $context_name) {
            // We are about to read a class name
            $this->_state = 'class';
        } elseif (in_array($token, $this->_classNames) && $this->_language == $context_name) {
            // Detected use of class name we have already detected
            $context_name = $this->_language . '/class_name';
        }
        
        if (substr($context_name, -11) == '/class_name' || false /*$context_name is a built in class */) {
            $this->_state = 1;
        }
        if ($this->_state == 1) {
            if ($token == '<' && $context_name == $this->_language . '/symbol') {
                $this->_state = 2;
            } else {
                $this->_state = null;
            }
        }
        if ($this->_state == 2 && $context_name == $this->_language) {
            $this->_classNames[] = $token;
            $context_name .= '/class_name';
        }
        if ($this->_state == 2 && $token == '>' && $context_name == $this->_language . '/symbol') {
            $this->_state = null;
        }
        
        echo "$context_name $this->_state<br />\n";
        return array($token, $context_name, $data);
    }
 
}

?>
