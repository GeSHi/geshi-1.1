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
		0 => array('"'),
		1 => array('"'),
		2 => false
	)
);

$this->_childContexts = array();

$this->_styler->setStyle($this->_contextName, 'color:#f00;');
//$this->_styler->setStartStyle($this->_contextName, '');
//$this->_styler->setEndStyle($this->_contextName, '');
$this->_contextStyleType = GESHI_STYLE_STRINGS;
$this->_delimiterParseData = GESHI_CHILD_PARSE_BOTH;

// String only stuff
$this->_escapeCharacters = array('\\');
// Escapes can be defined by regular expressions. 
$this->_charsToEscape = array('n', 'r', 't', 'REGEX#[0-7]{1,3}#', 'REGEX#x[0-9a-f]{1,2}#i', '\\', '"', '$');
$this->_styler->setStyle($this->_contextName . '/esc', 'color:#006;font-weight:bold;');

// GeSHiPHPDoubleStringContext stuff
$this->_styler->setStyle($this->_contextName . '/var', 'color:#22f;');
$this->_styler->setStyle($this->_contextName . '/sym0', 'color:#008000;');
$this->_styler->setStyle($this->_contextName . '/oodynamic', 'color:#933;');

?>
