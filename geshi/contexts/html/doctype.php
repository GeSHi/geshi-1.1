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
        0 => array('<!DOCTYPE '),
        1 => array('>'),
        2 => false
    )
);

$this->_childContexts = array(
    // HTML strings have no escape characters, so the don't need to be GeSHiStringContexts
    new GeSHiContext('html/string', 'string')
);

$this->_styler->setStyle($this->_styleName, 'font-weight:bold;color:#933;');
$this->_contextStyleType = GESHI_STYLE_NONE;
$this->_delimiterParseData = GESHI_CHILD_PARSE_BOTH;

?>
