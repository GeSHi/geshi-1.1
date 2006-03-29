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
 * @author    
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2006
 * @version   $Id$
 *
 */

/** Get the shared tokens lists */
include GESHI_CONTEXTS_ROOT.'c'.GESHI_DIR_SEPARATOR.'common_keywords.php';
/** Get some helper functions all prefixed by geshic_ bar geshi_parent_context*/
require_once GESHI_CONTEXTS_ROOT.'c'.GESHI_DIR_SEPARATOR.'helper_functions.php';

$this->_childContexts = array(
    new GeSHiContext('c', $DIALECT, 'preprocessor/multi_comment'),
    new GeSHiContext('c', $DIALECT, 'preprocessor/single_comment'),
);

$this->_contextDelimiters = array(
    array(
        // $this->_CincludePPdirectives comes from common_keywords.php
        geshic_make_ppdir_regexps($this->_CincludePPdirectives),
        array('REGEX#(?<!\\\)\n#'),
        true
    ),
);

/**
 * @note A header file need not be specified directly as <file> or "file" - it
 * could be specified indirectly as a macro expanding to one of those two forms.
 */
$this->_contextKeywords = array(
    array(
        $this->_CstandardHeaders[0], // from common_keywords.php
        $CONTEXT.'/stdheader',
        true,
        $this->_CstandardHeaders[1] // from common_keywords.php
    ),
    array(
        $this->_CstandardMacrosAndObjects[0], // from common_keywords.php
        geshi_parent_context($CONTEXT).'/stdmacroorobject',
        true,
        $this->_CstandardMacrosAndObjects[1], // from common_keywords.php
    )
);

$this->_contextSymbols  = array(
    array(
        array(
            '<', '>'
        ),
        geshi_parent_context($CONTEXT) . '/symbol/std_include'
    ),
    array(
        array(
            '"'
        ),
        geshi_parent_context($CONTEXT) . '/symbol/impl_include'
    ),
);

$this->_delimiterParseData = GESHI_CHILD_PARSE_LEFT;
$this->_complexFlag = GESHI_COMPLEX_TOKENISE;

?>
