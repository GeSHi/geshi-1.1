<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * ----------------------------------
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

$this->_contextDelimiters = array(
    0 => array(
        0 => array('REGEX#<script[^>]+>#i'),
        1 => array('</script>'),
        2 => false
    )
);

// This stuff is irrelevant if there is an overriding child context
$this->_childContexts = array();

//$this->_styler->setStyle($this->_styleName, 'color:#200;');
//$this->_styler->setStartStyle($this->_styleName, 'font-style:italic;');
//$this->_styler->setEndStyle($this->_styleName, 'font-weight:bold;');
$this->_contextStyleType = GESHI_STYLE_NONE;
// If this is set to parse any of the delimiters, the OCC swallows it up - setStartStyle and
// setEndStyle have no meaning in a context with an OCC (actually, nor does setStyle)
$this->_delimiterParseData = GESHI_CHILD_PARSE_NONE;

$this->_overridingChildContext = new GeSHiCodeContext('javascript', $this->_styleName . '/js');

?>
