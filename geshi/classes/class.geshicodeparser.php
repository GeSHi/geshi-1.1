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

/**
 * The GeSHiCodeParser class. An abstract implementation
 * of a class that can receive tokens, modify them and
 * send them back.
 * 
 * A language might use this to improve highlighting by
 * detecting things that the context tree cannot detect
 * by itself.
 * 
 * @package core
 * @author  Nigel McNie <nigel@geshi.org>
 * @since   1.1.1
 * @version $Revision$
 * @abstract
 */
class GeSHiCodeParser
{
    // {{{ properties
    
    /**
     * The GeSHiStyler being used to highlight the code
     * 
     * @var GeSHiStyler
     * @access private
     */
    var $_styler;
    
    /**
     * The language/dialect that is being highlighted
     * 
     * @var string
     * @access private
     */
    var $_language;
    
    // }}}
    // {{{ GeSHiCodeParser()
    
    /**
     * Constructor. Assigns the GeSHiStyler object to use
     * 
     * @param GeSHiStyler The styler oject to use
     */
    function GeSHiCodeParser(&$styler, $language)
    {
        $this->_styler =& $styler;
        $this->_language = $language;
    }
    
    // }}}
    // {{{ parseToken()
    
    /**
     * Recieves tokens and returns them, possibly modified
     * 
     * @param string The token recieved
     * @param string The name of the context the token is in
     * @param string Any extra data associated with the context
     * @return mixed Either <code>false</code>, an array($token, $context_name, $data)
     *               or an array of arrays like this.
     * @abstract
     */
    function parseToken ($token, $context_name, $data) {}
    
    // }}}
    // {{{ flush()
    
    /**
     * If the code parser uses a stack, this method should empty and return it.
     * 
     * @return array The contents of the stack
     */
    function flush() {}
    
    // }}}
    
}

?>
