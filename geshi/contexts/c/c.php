<?php
/**
 * GeSHi - Generic Syntax Highlighter
 *
 * For information on how to use GeSHi, please consult the documentation
 * found in the docs/ directory, or online at http://geshi.org/docs/
 *
 *
 * This highlighting context has been designed for C as defined by the
 * ANSI/ISO Standard (C99 and earlier).  In particular it doesn't provide for:
 *  => K&R C or earlier, although most if not all of the highlighting of those
 *     dialects is forward-compatible with ANSI/ISO C
 *  => C++
 *  => typical extensions provided by e.g. gcc, Microsoft and others
 *
 * It's been designed on the principle that the highlighting and linking need
 * only have meaningful results for valid code.  A future version may try to do
 * some sensible syntax error highlighting.
 *
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
 * @todo separate out the C89/C90, C94/C95 and C99 dialects
 * @todo highlighting of format specifiers in strings for printf, scanf, etc
 * @todo highlighting of digraphs/trigraphs + related and rarely-used stuff -
 *       i.e. <: :> <% %> %: %:%: etc.
 * @todo would be nice to highlight the ellipsis of vararg parameters (...) so
 *       that it can be linked to a vararg article
 * @todo fill in items missing from the lists in common_keywords.php
 *
 * @package   lang
 * @author    
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2006
 * @version   $Id$
 *
 */

/** Get the GeSHiStringContext class */
require_once GESHI_CLASSES_ROOT.'class.geshistringcontext.php';
/** Get the shared tokens lists */
include GESHI_CONTEXTS_ROOT.'c'.GESHI_DIR_SEPARATOR.'common_keywords.php';

$this->_childContexts = array(
    new GeSHiContext('c', $DIALECT, 'multi_comment'),
    new GeSHiContext('c', $DIALECT, 'single_comment'),
    new GeSHiStringContext('c', $DIALECT, 'string_literal'),
    new GeSHiStringContext('c', $DIALECT, 'character_constant'),
    new GeSHiCodeContext('c', $DIALECT, 'preprocessor')
);

$this->_contextKeywords = array(
    array(
        $this->_CcontrolFlowKeywords[0], // from common_keywords.php
        $CONTEXT.'/ctlflow-keyword',
        true,
        $this->_CcontrolFlowKeywords[1] // from common_keywords.php
    ),
    array(
        $this->_CdeclaratorKeywords[0], // from common_keywords.php
        $CONTEXT.'/declarator-keyword',
        true,
        $this->_CdeclaratorKeywords[1] // from common_keywords.php
    ),
    array(
        $this->_CtypesAndQualifiers[0], // from common_keywords.php
        $CONTEXT.'/typeorqualifier',
        true,
        $this->_CtypesAndQualifiers[1] // from common_keywords.php
    ),
    array(
        $this->_CstandardFunctions[0], // from common_keywords.php
        $CONTEXT.'/stdfunction',
        true,
        $this->_CstandardFunctions[1] // from common_keywords.php
    ),
    array(
        $this->_CstandardMacrosAndObjects[0], // from common_keywords.php
        $CONTEXT.'/stdmacroorobject',
        true,
        $this->_CstandardMacrosAndObjects[1], // from common_keywords.php
    ),
);

$this->_contextSymbols  = array(
    array(
        $this->_CstandardSymbols, // from common_keywords.php
        $CONTEXT.'/symbol',
    )
);

$this->_contextRegexps  = array(
    geshi_use_doubles($CONTEXT),
    geshi_use_integers($CONTEXT)
);

$this->_objectSplitters = array(
    array(
        $this->_CobjectSplitters, // from common_keywords.php
        $CONTEXT.'/member',
        false
    ),
);

$this->_complexFlag = GESHI_COMPLEX_TOKENISE;

?>
