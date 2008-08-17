<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * <pre>
 *   File:   geshi/languages/eiffel/class.geshieiffelcodeparser.php
 *   Author: Julian Tschannen
 *   E-mail: julian@tschannen.net
 * </pre>
 *
 * For information on how to use GeSHi, please consult the documentation
 * found in the docs/ directory, or online at http://geshi.org/docs/
 *
 * This program is part of GeSHi.
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301 USA
 *
 * @package    geshi
 * @subpackage lang
 * @author     Julian Tschannen <julian@tschannen.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2004 - 2006 Julian Tschannen, Nigel McNie
 * @version    $Id$
 *
 */

define('GESHI_EIFFEL_UNKNOWN', 0);
// context where strings before a colon denote a tag name (note, indexing, require, ensure, invariant, check)
define('GESHI_EIFFEL_TAG_BEFORE_COLON', 1);
// context where strings before a colon denote a feature name (feature-clauses)
define('GESHI_EIFFEL_FEATURE_BEFORE_COLON', 2);

/**
 * The GeSHiEiffelCodeParser class.
 *
 *
 * @package    geshi
 * @subpackage lang
 * @author     Julian Tschannen <julian@tschannen.net>
 * @since      1.1.1
 * @version    $Revision$
 */
class GeSHiEiffelCodeParser extends GeSHiCodeParser
{

    // {{{ properties

    /**#@+
     * @access private
     */

     /**
      * The current parse context which helps categorize tokens
      */
     var $_parse_context = GESHI_EIFFEL_UNKNOWN;

     /**
      * The content of the last token. The last token is always token 0 on the stack.
      */
     var $_last_token = NULL;

    /**#@-*/

    // }}}
    // {{{ sourcePreProcess()

    /**
     * Is given the entire source code before parsing begins so that various information
     * about the source can be stored.
     *
     * This method is completely optional. Note that there is no postprocess method - the
     * information gathered by this method should be exploited by {@link parseToken()}
     *
     * @param  string The source code
     * @return string The source code modified as necessary
     */
    function sourcePreProcess ($code)
    {
        // todo: maybe preprocess text to look for feature, class and
        // generic names for better highlighting
        return $code;
    }

    // }}}
    // {{{ parseToken()

    function parseToken ($token, $context_name, $data)
    {
        if (geshi_is_whitespace ($token)) {
            if ($this->_last_token) {
                $this->push ($token, $context_name, $data);
                return array();
            } else {
                return array ($token, $context_name, $data);
            }
        }

        $result = false;

        if ($this->_last_token) {
            // we have a previous token which we couldnt figure out. maybe now we have enough information
            if ($token==':') {
                // after a token we look at the parse context to see if we are in a 'tag' section
                $result = $this->flush();
                switch($this->_parse_context) {
                    case GESHI_EIFFEL_TAG_BEFORE_COLON:
                        $result[0][1] .='/tagname';
                        break;
                    case GESHI_EIFFEL_FEATURE_BEFORE_COLON:
                    case GESHI_EIFFEL_UNKNOWN:
                        $result[0][1] .='/featurename';
                        break;
                }
                $result[] = array($token, $context_name, $data);
            } else {
                // here we can still have an attribute name, feature name or a feature call.
                // we default to feature name
                $result = $this->flush();
                $result[0][1] .='/featurename';
                $result[] = array($token, $context_name, $data);
            }
            $this->_last_token = NULL;
        } else {
            // no token on the stack. check if current token is properly categorized
            if ($context_name=='eiffel/eiffel') {
                // token has no specific context. we need to figure out one
                if (preg_match('#^[A-Z_]+$#', $token)) {
                    // maybe its a class name
                    // this works as long as the highlighted code follows standard naming conventions
                    // but it could also be a generic parameter which would be nice
                    // to format differently (this needs a stateful parser)
                    $context_name = $context_name.'/classname';
                    $result = array ($token, $context_name, $data);
                } else {
                    // we save the token and see if we can decide better when we see the next token
                    $this->push($token, $context_name, $data);
                    $this->_last_token = $token;
                    $result = false;
                }
            } elseif ($context_name=='eiffel/eiffel/comment/classname') {
                // we have a classname in a comment. maybe we can provide a link
                // todo: check against default class names and add link data
                $result = array ($token, $context_name, $data);
            } elseif ($context_name=='eiffel/eiffel/keyword') {
                // we check if the parse context changes because of the keyword
                switch ($token) {
                    case 'indexing':
                    case 'note':
                    case 'require':
                    case 'ensure':
                    case 'invariant':
                    case 'check':
                        $this->_parse_context = GESHI_EIFFEL_TAG_BEFORE_COLON;
                        break;
                    case 'local':
                    case 'agent':
                    case 'create':
                    case 'feature':
                        $this->_parse_context = GESHI_EIFFEL_FEATURE_BEFORE_COLON;
                        break;
                    case 'end':
                    case 'do':
                    case 'once':
                        $this->_parse_context = GESHI_EIFFEL_UNKNOWN;
                        break;
                }
                $result = array ($token, $context_name, $data);
            } else {
                // normal token
                $result = array ($token, $context_name, $data);
            }
        }
        if ($result === false) {
            return array();
        }
        return $result;
    }

    // }}}

    /**#@+
     * @access private
     */

    /**#@-*/

}

?>