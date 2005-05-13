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
 * @author    Nigel McNie <oracle.shinoda@gmail.com>
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

$this->_styler->setStyle($this->_styleName, 'color:#f00;');
//$this->_styler->setStartStyle($this->_styleName, '');
//$this->_styler->setEndStyle($this->_styleName, '');
$this->_contextStyleType = GESHI_STYLE_STRINGS;
$this->_delimiterParseData = GESHI_CHILD_PARSE_BOTH;

// String only stuff
$this->_escapeCharacters = array('\\');
$this->_charsToEscape = array('n', 'r', 't', '\\', '"');
$this->_styler->setStyle($this->_styleName . '/esc', 'color:#006;font-weight:bold;');

?>
