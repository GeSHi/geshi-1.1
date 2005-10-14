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
 * @copyright (C) 2005 Nigel McNie
 * @version   $Id$
 * 
 */

/** Get the GeSHiCodeParser class */
require_once GESHI_CLASSES_ROOT . 'class.geshicodeparser.php';

/**
 * The GeSHiPHPCodeParser class
 * 
 * @package core
 * @author  Nigel McNie <nigel@geshi.org>
 * @since   1.1.1
 * @version $Revision$
 */
class GeSHiPHPCodeParser extends GeSHiCodeParser
{
    // {{{ properties
    
    /**
     * A flag that can be used for the "state" of parsing
     * @var string
     * @access private
     */
    var $_state = '';
    
    // }}}
    // {{{ parseToken()
    
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
     * - the function token is actually in the right context (e.g. php/$DIALECT)
     * - the function isn't actually a method (can highlight those too, of course)
     */
    function parseToken ($token, $context_name, $url)
    {
        if ($this->_state == 'class') {
            $this->_state = '';
            $context_name = 'php/php4/class_name';
        }
        
        if ($token == 'class') {
            $this->_state = 'class';
        }
        
        return array($token, $context_name, $url);
    }
    
    // }}}
}

?>
