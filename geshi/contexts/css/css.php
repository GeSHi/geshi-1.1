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

// If someone wanted to style the selectors, they would have to make
// this context and inline_media into GeSHiCodeContexts, or make a new
// context and make this and inline_media be overridden by it

$this->_contextDelimiters = array();

$this->_childContexts = array(
    new GeSHiContext('css/inline_media'),
    new GeSHiCodeContext('css/rule', 'rule')
);

$this->_styler->setStyle($this->_styleName, 'color:#000;');
$this->_contextStyleType = GESHI_STYLE_NONE;
// irrelevant if no delimiters...
$this->_delimiterParseData = GESHI_CHILD_PARSE_BOTH;


?>
