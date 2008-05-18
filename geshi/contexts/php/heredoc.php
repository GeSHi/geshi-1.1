<?php
/**
 * GeSHi - Generic Syntax Highlighter
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * You can view a copy of the GNU GPL in the LICENSE file that comes
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
		0 => array("REGEX#<<<\s*([a-z][a-z0-9]*)\n#i"),
		1 => array("REGEX#\n!!!1;?\n#i"),
		2 => false
	)
);

$this->_childContexts = array();

$this->_styler->setStyle($this->_styleName, 'color:#f00;');
$this->_styler->setStartStyle($this->_styleName, 'color:#006;font-weight:bold;');
$this->_styler->setEndStyle($this->_styleName, 'color:#006;font-weight:bold;');
$this->_contextStyleType = GESHI_STYLE_STRINGS;
$this->_delimiterParseData = GESHI_CHILD_PARSE_BOTH;

//HEREDOC doesn't seem to have anything to escape - just the variable interpolation
// String only stuff
$this->_escapeCharacters = array('\\');
// Escapes can be defined by regular expressions. 
$this->_charsToEscape = array('n', 'r', 't', 'REGEX#[0-7]{1,3}#', 'REGEX#x[0-9a-f]{1,2}#i', '\\', '"');
$this->_styler->setStyle($this->_styleName . '/esc', 'color:#006;font-weight:bold;');

// GeSHiPHPDoubleStringContext stuff
$this->_styler->setStyle($this->_styleName . '/var', 'color:#22f;');
$this->_styler->setStyle($this->_styleName . '/sym0', 'color:#008000;');
$this->_styler->setStyle($this->_styleName . '/oodynamic', 'color:#933;');

?>
