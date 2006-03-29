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

/** @note we could create child contexts for else, endif to catch syntax errors
  * but if we start down that path it could be a pretty long journey...
  */
$this->_childContexts = array(
    new GeSHiCodeContext('c', $DIALECT, 'preprocessor/ifelif'),
    new GeSHiCodeContext('c', $DIALECT, 'preprocessor/include'),
    new GeSHiCodeContext('c', $DIALECT, 'preprocessor/general'),
);

$this->_contextDelimiters = array(
    array(
        /**
         * A preprocessing directive beginning with a # must occur at the start
         * of a line, but may optionally be preceded by whitespace, and any line
         * may be continued by appending a trailing \ character. So we account
         * for a hash preceded by a continued line of whitespace.  The hash may
         * optionally be followed by whitespace in the same manner, after which
         * the actual directive keyword is specified.  Finally though, a hash
         * without a following directive is allowed as a 'null directive'.
         *
         * There is also a single preprocessing directive (_Pragma) that follows
         * the same rules but is not preceded by a hash
         *
         * Be CAREFUL with the slashes below - the escaping is not intuitive
         *
         * The list of non-newline whitespace characters recognised by C and
         * used in the r.e. below is: [ \t\f\v]
         */
        array('REGEX#(((^|\n)([ \t\f\v]*)\\\)*(^|\n)([ \t\f\v]*)\#'.
                 '([ \t\f\v]*)((([ \t\f\v]*)\\\\\n)*([ \t\f\v]*)'.
                 '(?=(([^ \t\f\v]*?([ \t\f\v]*))*[^\n\\\\]\n|\n))))#',
              'REGEX#(((^|\n)([ \t\f\v]*)\\\)*(^|\n)([ \t\f\v]*)(?=_Pragma))#'),
        array('REGEX#(?<!\\\)\n#'),
        true
    ),
);

/**
 * We use child contexts partly to avoid any of the directive tokens in the
 * array below from being highlighted/linked-to a second time after their
 * initial appearance. i.e. for the contrived:
 * <code>
 * #define AMACRO(X) (X = my->define)
 * </code>
 * the first "define" - in #define - is linked and highlighted in the
 * 'preprocessor/directive' context and immediately afterwards the child
 * 'preprocessor/general' context kicks in so that the "define" of my->define
 * is no longer in the current 'preprocessor' context and won't be linked.
 *
 * Unfortunately this approach fails for non-standard directives i.e. if
 * #define were instead #makemacro in the above code, a link would be generated
 * for it (although due to code in GeSHiCCodeParser->parseToken it would not be
 * highlighted differently - the entire line would be marked non-standard).
 * Given that we're not catering for non-standard stuff this seems acceptable
 * for the moment, though not desirable.
 */
$this->_contextKeywords = array(
    array(
        $this->_CstartoflinePPdirectives_Hash[0],
        $CONTEXT.'/directive',
        true,
        $this->_CstartoflinePPdirectives_Hash[1]
    ),
    array(
        $this->_CstartoflinePPdirectives_NoHash[0],
        $CONTEXT.'/directive',
        true,
        $this->_CstartoflinePPdirectives_NoHash[1]
    ),
);

$this->_delimiterParseData = GESHI_CHILD_PARSE_BOTH;
$this->_complexFlag = GESHI_COMPLEX_TOKENISE;

?>
