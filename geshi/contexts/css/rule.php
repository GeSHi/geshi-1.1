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
        0 => array('{'),
        1 => array('}'),
        2 => false
    )
);

$this->_childContexts = array(
    // HTML strings have no escape characters, so the don't need to be GeSHiStringContexts
    new GeSHiContext('common/single_string', 'single_string')
);

$this->_styler->setStyle($this->_styleName, '');
$this->_styler->setStartStyle($this->_styleName, 'font-weight:bold;color:#000;');
$this->_styler->setEndStyle($this->_styleName, 'font-weight:bold;color:#000;');
$this->_contextStyleType = GESHI_STYLE_NONE;
$this->_delimiterParseData = GESHI_CHILD_PARSE_BOTH;


$this->_contextKeywords = array(
    0 => array(
        // keywords
        0 => array(
            'font', 'font-weight', 'font-style', 'border', 'margin', 'padding', 'background'
            ),
        // name
        1 => $this->_styleName . '/attrs',
        // style
        2 => 'color:#000;font-weight:bold;',
        // case sensitive
        3 => false,
        // url
        4 => ''
        ),
    1 => array(
        0 => array('url'),
        1 => $this->_styleName . '/values',
        2 => 'color:#933;',
        3 => false,
        4 => ''
        )
);

$this->_contextCharactersDisallowedBeforeKeywords = array();
$this->_contextCharactersDisallowedAfterKeywords  = array();

$this->_contextSymbols  = array(
    0 => array(
        0 => array(
            ':', ';', '(', ')'
            ),
        // name (should names have / in them like normal contexts? YES
        1 => $this->_styleName . '/sym',
        // style
        2 => 'color:#008000;'
        )
);

$this->_contextRegexps  = array(
    0 => array(
        0 => array(
            '#(0)#',
            '#([-+]?[0-9]((em)|(ex)|(px)|(in)|(cm)|(mm)|(pt)|(pc)))#'
        ),
        1 => '',
        2 => array(
            1 => array($this->_styleName . '/measurement', 'color: #933;')
        )
    )
);

?>
