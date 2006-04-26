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
 * @package   lang
 * @author    Nigel McNie <nigel@geshi.org>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005 Nigel McNie
 * @version   $Id$
 * 
 */


/// NOTE: This class is no longer used by CSS, and will probably be removed.
/// The functionality it brings can be handled by the code parser anyway

/**
 * The GeSHiCSSInlineMediaContext class
 * 
 * @package lang
 * @author  Nigel McNie <nigel@geshi.org>
 * @since   1.1.0
 * @version $Revision$
 * @see     GeSHiContext
 */
class GeSHiCSSInlineMediaContext extends GeSHiContext
{
    /**
     * Overrides {@link GeSHiContext::_addParseDataStart()} to
     * highlight the start of the inline media context correctly
     * 
     * @param string The code that is part of the start of this context
     * @access private
     */
    function _addParseDataStart ($code)
    {
        $this->_styler->addParseData('@media', $this->_contextName . '/starter', $this->_getExtraParseData(),
            $this->_complexFlag);
        $this->_styler->addParseDataStart(substr($code, 6), $this->_contextName, 'start',
            $this->_complexFlag);
    }
}

?>
