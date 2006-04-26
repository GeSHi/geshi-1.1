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
require_once GESHI_CLASSES_ROOT . 'css' . GESHI_DIR_SEP . 'class.geshicssinlinemediacontext.php';

$this->_childContexts = array(
    new GeSHiCSSInlineMediaContext('css', $DIALECT, 'inline_media'),
    new GeSHiCodeContext('css',  $DIALECT, 'rule'),
    new GeSHiContext('css',  $DIALECT, 'comment'),
    new GeSHiContext('css',  $DIALECT, 'attribute_selector'),
    new GeSHiCodeContext('css', $DIALECT, 'at_rule')
);

$this->_contextKeywords = array(
    array(
        array(
            '@font-face'
        ),
        $CONTEXT . '/at_rule/start',
        false,
        ''
    ),
    
    // Psuedoclasses
    array(
        array(
            'hover', 'link', 'visited', 'active', 'focus', 'first-child', 'first-letter',
            'first-line', 'before', 'after'
         ),
         $CONTEXT . '/psuedoclass',
         false,
         ''
     )
);

$this->_contextSymbols  = array(
    array(
        array(
            ',', '*', '>', '+'
        ),
        $CONTEXT . '/symbol',
    )
);

$this->_contextRegexps  = array(
    array(
        array(
            '#(\.[a-zA-Z][a-zA-Z0-9\-_]*)#'
        ),
        '.',
        array(
            1 => array($CONTEXT . '/class', false)
        )
    ),
    array(
        array(
            '/(#[a-zA-Z][a-zA-Z0-9\-_]*)/'
        ),
        '#',
        array(
            1 => array($CONTEXT . '/id', false)
        )
    )
);

?>
