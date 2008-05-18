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
 * @version   $Id$
 * 
 */

/** Get the GeSHiCSSInlineMediaContext class */
require_once GESHI_CLASSES_ROOT . 'css' . GESHI_DIR_SEPARATOR . 'class.geshicssinlinemediacontext.php';

$this->_childContexts = array(
    new GeSHiCSSInlineMediaContext('css', $DIALECT, 'inline_media'),
    new GeSHiCodeContext('css',  $DIALECT, 'rule'),
    new GeSHiContext('css',  $DIALECT, 'common/multi_comment'),
    new GeSHiContext('css',  $DIALECT, 'attribute_selector'),
    new GeSHiCodeContext('css', $DIALECT, 'at_rule')
);

$this->_styler->setStyle($CONTEXT, 'color:#000;');

$this->_contextKeywords = array(
    0 => array(
        0 => array(
            '@font-face'
        ),
        1 => $CONTEXT . '/atrules',
        2 => 'color:#c9c;font-weight:bold;',
        3 => false,
        4 => ''
    ),
    1 => array(
        0 => array(
            'hover', 'link', 'visited', 'active', 'focus', 'first-child', 'first-letter',
            'first-line', 'before', 'after'
         ),
         1 => $CONTEXT . '/psuedoclasses',
         2 => 'color:#33f;',
         3 => false,
         4 => ''
     )
);

$this->_contextSymbols  = array(
    0 => array(
        0 => array(
            ',', '*', '>', '+'
            ),
        // name (should names have / in them like normal contexts? YES
        1 => $CONTEXT . '/sym',
        // style
        2 => 'color:#008000;'
        )
);

$this->_contextRegexps  = array(
    0 => array(
        0 => array(
            '#(\.[a-zA-Z][a-zA-Z0-9\-_]*)#'
        ),
        1 => '.',
        2 => array(
            1 => array($CONTEXT . '/class', 'color:#c9c;', false)// Don't check whether the match is actually a keyword
        )
    ),
    1 => array(
        0 => array(
            '/(#[a-zA-Z][a-zA-Z0-9\-_]*)/'
        ),
        1 => '#',
        2 => array(
            1 => array($CONTEXT . '/id', 'color:#c9c;font-weight:bold;', false)
        )
    )
);

?>
