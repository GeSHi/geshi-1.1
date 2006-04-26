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
require GESHI_CONTEXTS_ROOT . 'c' . GESHI_DIR_SEP . 'common_keywords.php';
/** Get some helper functions all prefixed by geshic_ bar geshi_parent_context*/
require_once GESHI_CONTEXTS_ROOT . 'c' . GESHI_DIR_SEP . 'helper_functions.php';

$this->_childContexts = array(
    new GeSHiContext('c', $DIALECT, 'preprocessor/multi_comment'),
    new GeSHiContext('c', $DIALECT, 'preprocessor/single_comment'),
    new GeSHiStringContext('c', $DIALECT, 'preprocessor/string_literal'),
    new GeSHiStringContext('c', $DIALECT, 'preprocessor/character_constant'),
);

$this->_contextDelimiters = array(
    array(
        // $this->_CgeneralPPdirectives comes from common_keywords.php
        geshic_make_ppdir_regexps($this->_CgeneralPPdirectives),
        array('REGEX#(?<!\\\)\n#'),
        true
    ),
);

$this->_contextKeywords = array(
    array(
        $this->_CcontrolFlowKeywords[0], // from common_keywords.php
        geshi_parent_context($CONTEXT).'/ctlflow-keyword',
        true,
        $this->_CcontrolFlowKeywords[1] // from common_keywords.php
    ),
    array(
        $this->_CdeclaratorKeywords[0], // from common_keywords.php
        geshi_parent_context($CONTEXT).'/declarator-keyword',
        true,
        $this->_CdeclaratorKeywords[1] // from common_keywords.php
    ),
    array(
        $this->_CtypesAndQualifiers[0], // from common_keywords.php
        geshi_parent_context($CONTEXT).'/typeorqualifier',
        true,
        $this->_CtypesAndQualifiers[1] // from common_keywords.php
    ),
    array(
        $this->_CstandardFunctions[0], // from common_keywords.php
        geshi_parent_context($CONTEXT).'/stdfunction',
        true,
        $this->_CstandardFunctions[1] // from common_keywords.php
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
        $this->_CstandardSymbols, // from common_keywords.php
        geshi_parent_context($CONTEXT).'/symbol',
    )
);

$this->_contextRegexps  = array(
    geshi_use_doubles($CONTEXT),
    geshi_use_integers($CONTEXT),
);

$this->_objectSplitters = array(
    array(
        $this->_CobjectSplitters, // from common_keywords.php
        geshi_parent_context($CONTEXT).'/member',
        false
    ),
);

$this->_delimiterParseData = GESHI_CHILD_PARSE_LEFT;
$this->_complexFlag = GESHI_COMPLEX_TOKENISE;

?>
