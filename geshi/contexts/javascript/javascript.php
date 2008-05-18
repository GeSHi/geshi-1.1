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

require_once GESHI_CLASSES_ROOT . 'class.geshistringcontext.php';

$this->_contextDelimiters = array();

$this->_childContexts = array(
    new GeSHiContext('common/multi_comment', 'multi_comment'),
    new GeSHiContext('common/single_comment', 'single_comment'),
    new GeSHiStringContext('common/single_string', 'single_string'),
    new GeSHiStringContext('common/double_string','double_string')
);

$this->_styler->setStyle($this->_styleName, '');
//$this->_styler->setStartStyle($this->_styleName, 'font-weight:bold;');
//$this->_styler->setEndStyle($this->_styleName, 'font-weight:bold;');
$this->_contextStyleType = GESHI_STYLE_NONE;
// irrelevant if no delimiters...
$this->_delimiterParseData = GESHI_CHILD_PARSE_BOTH;

$this->_contextKeywords = array(
    0 => array(
        0 => array(
            'function', 'new', 'this', 'return', 'true', 'false', 'var'
        ),
        1 => $this->_styleName . '/kw1',
        2 => 'color:#000;font-weight:bold;',
        3 => true,
        4 => ''
    )
);

$this->_contextCharactersDisallowedBeforeKeywords = array();
$this->_contextCharactersDisallowedAfterKeywords  = array();
$this->_contextSymbols  = array(
        0 => array(
            0 => array(
                '(', ')', ',', ';', ':', '[', ']'
                ),
            // name (should names have / in them like normal contexts? YES
            1 => $this->_styleName . '/sym0',
            // style
            2 => 'color:#008000;'
            ),
        1 => array(
            0 => array(
                '+', '-', '*', '/', '&', '|', '!', '<', '>'
                ),
            1 => $this->_styleName . '/sym1',
            2 => 'color:#008000;'
            ),
        2 => array(
            0 => array(
                '{', '}', '=', '@'
                ),
            1 => $this->_styleName . '/sym2',
            2 => 'color:#008000;'
            )
);
$this->_contextRegexps  = array(
    0 => geshi_use_doubles($this->_styleName),
    1 => geshi_use_integers($this->_styleName)
);
$this->_objectSplitters = array(
    0 => array(
        0 => array('.'),
        1 => $this->_styleName . '/oodynamic',
        2 => 'color: green;'
    )
);
?>
