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
        0 => array('/**'),
        1 => array('*/'),
        2 => false
    )
);

// This stuff is irrelevant if there is an overriding child context
$this->_childContexts = array();

//$this->_styler->setStyle($this->_styleName, 'color:#200;');
//$this->_styler->setStartStyle($this->_styleName, 'font-style:italic;');
//$this->_styler->setEndStyle($this->_styleName, 'font-weight:bold;');
$this->_contextStyleType = GESHI_STYLE_NONE;
// This applies to what the OCC parses!! So if GESHI_CHILD_PARSE_NONE for
// example, then the occ won't parse the delimiters
// or if GESHI_CHILD_PARSE_LEFT, the occ will parse the start one only
$this->_delimiterParseData = GESHI_CHILD_PARSE_BOTH;

$this->_overridingChildContext = new GeSHiContext('doxygen', $this->_styleName . '/doxygen');
?>
