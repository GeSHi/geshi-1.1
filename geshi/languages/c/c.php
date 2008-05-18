<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * <pre>
 *   File:   geshi/languages/c/c.php
 *   Author: Netocrat
 *   E-mail: N/A
 * </pre>
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
 * @package    geshi
 * @subpackage lang
 * @author     http://clc-wiki.net/wiki/User:Netocrat
 * @link       http://clc-wiki.net/wiki/Development:GeSHi_C Bug reports
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2006 Netocrat
 * @version    $Id$
 *
 */

/**#@+
 * @access private
 */

/**
 * A single include file for all data including keyword listings; also
 * accessed by class.geshiccodeparser.php.
 */
require_once GESHI_LANGUAGES_ROOT.'c'.GESHI_DIR_SEP.'common.php';

function geshi_c_c (&$context)
{
    $context->addChild('multi_comment');
    $context->addChild('single_comment');
    $context->addChild('string_literal', 'string');
    $context->addChild('character_constant', 'singlechar');
    $context->addChild('preprocessor', 'code');
    
    $context->addKeywordGroup(geshi_c_get_ctlflow_keywords(),
      'ctlflow-keyword', true, geshi_c_get_ctlflow_keywords_url());

    $context->addKeywordGroup(geshi_c_get_declarator_keywords(),
      'declarator-keyword', true, geshi_c_get_declarator_keywords_url());
    
    $context->addKeywordGroup(geshi_c_get_types_and_qualifiers(),
      'typeorqualifier', true, geshi_c_get_types_and_qualifiers_url());
    
    $context->addKeywordGroup(geshi_c_get_standard_functions(),
      'stdfunction', true, geshi_c_get_standard_functions_url());
    
    $context->addKeywordGroup(geshi_c_get_standard_macros_and_objects(),
      'stdmacroorobject', true, geshi_c_get_standard_macros_and_objects_url());
    
    $context->addSymbolGroup(geshi_c_get_standard_symbols(), 'symbol');
    
    $context->useStandardIntegers();
    $context->useStandardDoubles(array('chars_after_number' => array('f','l')));
    
    $context->addObjectSplitter(geshi_c_get_structure_access_symbols(),
      'member', 'symbol');
    $context->setComplexFlag(GESHI_COMPLEX_TOKENISE);
    
}

function geshi_c_c_multi_comment (&$context)
{
    $context->addDelimiters('/*', '*/');
}

function geshi_c_c_single_comment (&$context)
{
    $context->addDelimiters('//', 'REGEX#(?<!\\\)\n#');
    $context->setComplexFlag(GESHI_COMPLEX_PASSALL);
    // without this, detection of a following preprocessor directive is
    // inhibited [due to changes this might no longer apply]
    $context->parseDelimiters(GESHI_CHILD_PARSE_LEFT);
}

function geshi_c_c_string_literal (&$context)
{
    /*
     * A string literal may be continued to the next line with a trailing \ but
     * otherwise multiline strings are illegal; we don't attempt to mark that
     * error here though.
     */
    $context->addDelimiters('"', '"');

    $context->setEscapeCharacters('\\');
    /** @todo string literals and character constants may be immediately
      * preceded by a capital L to indicate a wide-character constant and it
      * would be nice to include that in the highlighting.
      */
    $context->setCharactersToEscape(array("'", '?', 'a', 'b', 'f',
        'v', 'n', 'r', 't', 'REGEX#[0-7]{1,3}#',
        'REGEX#x[0-9a-f]{1,}#i', '\\', '"'));
}

function geshi_c_c_character_constant (&$context)
{
    $context->addDelimiters("'", "'");

    $context->setEscapeCharacters('\\');

    /** @todo same todo as for geshi_c_c_string_literal(). */
    $context->setCharactersToEscape(array("'", '?', 'a', 'b', 'f',
        'v', 'n', 'r', 't', 'REGEX#[0-7]{1,3}#',
        'REGEX#x[0-9a-f]{1,}#i', '\\', '"'));
}

/**
 * Duplicate these functions for the preprocessor simply so that they can have
 * a different highlighting context.
 */
function geshi_c_c_preprocessor_multi_comment (&$context)
{
    geshi_c_c_multi_comment ($context);
}
function geshi_c_c_preprocessor_single_comment (&$context)
{
    geshi_c_c_single_comment ($context);
}
function geshi_c_c_preprocessor_string_literal (&$context)
{
    geshi_c_c_string_literal($context);
}
function geshi_c_c_preprocessor_character_constant (&$context)
{
    geshi_c_c_character_constant ($context);
}

function geshi_c_c_preprocessor (&$context)
{
    /**
     * A preprocessing directive beginning with a # must occur at the start
     * of a line, but may optionally be preceded by whitespace.  The hash may
     * optionally be followed by whitespace in the same manner, after which
     * the actual directive keyword is specified.  Finally though, a hash
     * without a following directive is allowed as a 'null directive'.
     *
     * There is also a single preprocessing directive (_Pragma) that follows
     * the same rules but is not preceded by a hash
     *
     * The list of non-newline whitespace characters recognised by C and
     * used in the r.e. below is: [ \t\f\v]
     *
     * The rule that lines may be continued by appending a trailing \ character
     * is no longer handled here because it added too much of a performance
     * penalty and because after disabling child preprocessor contexts (now a
     * permanent change) if we assume well-formed code it's unnecessary to
     * detect here.  The handling of line-continuation by trailing \ was in any
     * case incomplete - it didn't deal with e.g. a preprocessor directive
     * split in the middle.  The parseToken() member function of
     * GeSHiCCodeParser would need adjustment to handle that properly but
     * before implementing it specifically for C highlighting there may be some
     * generic functionality that we can implement to deal with it - see
     * bug #81.
     *
     * Currently the main problem with highlighting due to line-continuation by
     * backslash that can occur in well-formed code is when _Pragma is split -
     * the regex below will then miss it.  We could deal with that by
     * complicating the regex below but the performance implications would need
     * testing first.
     *
     * The lesser problem is that individual directives are not detected
     * within the parser when they have been split, meaning that the special-
     * case handling for the directive is not initiated.  As written above, that
     * could be handled by some logic in parseToken, but it may be preferable
     * for GeSHi's core to implement the generic preprocessing handling of
     * bug #81 instead.
     */
    $context->addDelimiters(array(
        'REGEX#((^|\n)([ \t\f\v]*)(?=(\#|_Pragma(\b))))#',
    ), 'REGEX#(?<!\\\)\n#',  true);

    $context->addChild('c/c/preprocessor/multi_comment');
    $context->addChild('c/c/preprocessor/single_comment');
    /**
     * @todo string literal escaping should be disabled in the parser for
     * double-quote quoted text that is interpreted directly as a filename,
     * namely <code>#include "filename.h"</code> and
     * <code>#line 123 "filename.c"</code>
     * It's tolerable that as a minor glitch escape-highlighting of such text
     * occurs when the parser is disabled.
     */
    $context->addChild('c/c/preprocessor/string_literal', 'string');
    $context->addChild('c/c/preprocessor/character_constant', 'singlechar');

    $context->addKeywordGroup(geshi_c_get_ctlflow_keywords(),
      'c/c/preprocessor/ctlflow-keyword', true,
      geshi_c_get_ctlflow_keywords_url());

    /**
     * @note It might seem questionable at first whether declarator/type/
     * qualifier keywords, standard functions and standard macros or objects
     * will ever occur, thus requiring highlighting, within some preprocessor
     * directives - namely #(el)if, #ifdef, #ifndef and #undef.  They can and do
     * occur in practice though because these directives can be used to test
     * whether at preprocessor level the keyword, type or function in question
     * has been subverted (or for a function, whether it's been legitimately
     * defined as a macro), and/or to undo or change that subversion; for
     * #if/#elif, sizeof should be highlighted in any case - it's been
     * categorised as a standard function for GeSHi's purposes.
     *
     * For #(el)if, a type might also appear as the subject of sizeof.
     *
     * It's also debatable whether such tokens should be highlighted within
     * #error and #pragma directives - it seems most appropriate that they are
     * not, since within those directives their occurrence can be likened to
     * their appearance within a comment.  This glitch can be resolved in the
     * parser; it's tolerable for it to appear when the parser is disabled.
     * @todo implement in the parser what's described in the above paragraph.
     *
     * It's less debatable that within a #include filename, these keywords
     * should not be highlighted.  That can be handled in the parser for <>
     * includes - quoted includes will already be protected by the
     * string_literal context.  It's borderline tolerable that this incorrect
     * highlighting will appear when the parser is disabled.
     * @todo implement in the parser what's described in the above paragraph.
     *
     * Within a #include where the filename is specified by a macro, the only
     * keywords that should be highlighted out of the list at the top of this
     * comment block are: standard macros (since they might be used in a
     * stringising macro "call"), any standard functions that are implementable
     * as macros (for the same reason), "sizeof" (since it might be used to
     * generate an argument for a macro "call") and types (but not qualifiers)
     * where they appear as the subject of sizeof.  The rest have no meaning in
     * preprocessor macro-"call" context.  Separating out "implementable-as-a-
     * macro" from the rest of the standard functions is a longer-term future
     * task to complete alongside comprehensively filling out what's missing
     * from the keyword lists.  Separating qualifiers from types is another task
     * to consider.  To start with, the parser should be used to disable
     * highlighting for the context 'declarator-keyword' within #include's
     * where the filename is specified by a macro, and /all/ highlighting
     * should be disabled for the macro name itself (with the possible
     * exception of any standard macros that resolve to a quoted string
     * constant - if any such macros even exist) - i.e. highlighting should
     * only apply to macro arguments.
     * @todo implement in the parser what's described in the above paragraph.
     *
     * The same reasoning of the above paragraph can be applied to the filename
     * of a #line.
     * @todo implement in the parser what's described in the above paragraph for
     * a #line directive.
     */
    $context->addKeywordGroup(geshi_c_get_declarator_keywords(),
      'c/c/preprocessor/declarator-keyword', true,
      geshi_c_get_declarator_keywords_url());
    $context->addKeywordGroup(geshi_c_get_types_and_qualifiers(),
      'c/c/preprocessor/typeorqualifier', true,
      geshi_c_get_types_and_qualifiers_url());
    $context->addKeywordGroup(geshi_c_get_standard_functions_url(),
      'c/c/preprocessor/stdfunction', true,
      geshi_c_get_standard_functions_url());
    $context->addKeywordGroup(geshi_c_get_standard_macros_and_objects(),
      'c/c/preprocessor/stdmacroorobject', true,
      geshi_c_get_standard_macros_and_objects_url());

    /**
     * @note not all of these symbols have meaning for all preprocessor
     * directives and in fact in some they are illegal, but we assume well-
     * formed code so illegal occurrences need not concern us.
     *
     * In #(el)if directives, any symbol except the semicolon can legally occur.
     * At first it might seem that & has no place either since at preprocessing
     * stage no objects exist to take an address of, but & can also act as a
     * bitwise operator or be part of the logical && operator.  Due to the lack
     * of objects it might also at first seem that [] has no use, however it
     * can be applied to string literals for esoteric uses in a preprocessor
     * constant such as this expression equating to 1:
     * <code>"abcd"[1] == 'b'</code>.
     * A semicolon though is only used to end single statements in code -
     * this can't apply to a constant preprocessor expression.
     *
     * In #include and #line directives, the header filename and new effective
     * source file name (respectively) may be specified by a macro.  A macro
     * may take a constant preprocessor expression as an argument, so by this
     * reasoning we see that within #include and #line directives the same set
     * of symbols can occur as within an #(el)if directive - namely, anything
     * except a semicolon.
     *
     * In a #define, even a semicolon can occur since the macro can substitute
     * for code.
     *
     * #ifdef, #ifndef, #undef, #endif and #else do not allow any symbol except
     * by proxy for comments and line continuation slashes.
     *
     * Likewise for #error and #pragma except that any symbol could occur as
     * part of the following (unquoted) freeform text.  Really, these should
     * not be highlighted, and when the parser is enabled we should remove this
     * highlighting; the minor glitch is tolerable when the parser is disabled.
     * @todo implement in the parser what's described in the above paragraph.
     */
    $context->addSymbolGroup(geshi_c_get_standard_symbols(),
      'c/c/preprocessor/symbol');

    $context->addSymbolGroup(geshi_c_get_preprocessor_symbols(),
      'c/c/preprocessor/directive');

    // This can't be enabled here because it causes filenames with dots in them
    // in #include statements to be highlighted as though they were structure
    // member accesses and when the parser is disabled that can't be fixed.
//    $context->addObjectSplitter(geshi_c_get_structure_access_symbols(),
//      'c/c/preprocessor/member', 'symbol');

    $context->useStandardIntegers();
    $context->useStandardDoubles(array('chars_after_number' => array('f','l')));

    $context->setComplexFlag(GESHI_COMPLEX_TOKENISE);
}

/**#@-*/

?>