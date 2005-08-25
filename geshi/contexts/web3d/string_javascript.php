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
 * @version   1.1.0alpha5
 * 
 */

$this->_contextDelimiters = array(
    0 => array(
		// Why doesn't this work correctly?
//        0 => array('REGEX#[java|vrml|ecma]script:#'),

		// yet this works (three valid names for the same VRML scripting)
        0 => array('REGEX#javascript:#', 'REGEX#ecmascript:#', 'REGEX#vrmlscript:#'),
        1 => array('"'),
        2 => false
    )
);

$this->_delimiterParseData = GESHI_CHILD_PARSE_LEFT;

$this->_overridingChildContext = new GeSHiCodeContext('javascript');

?>
