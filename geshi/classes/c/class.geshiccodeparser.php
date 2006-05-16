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
 * @package   core
 * @author    http://clc-wiki.net/wiki/User:Netocrat
 * @link      http://clc-wiki.net/wiki/Development:GeSHi_C Bug reports
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2006 Netocrat
 * @version   $Id$
 *
 */

/** Get the GeSHiCodeParser class */
require_once GESHI_CLASSES_ROOT.'class.geshicodeparser.php';

/** Parsing states */
define('GESHI_C_NORMAL', 0);
define('GESHI_C_PP', 1);
define('GESHI_C_PPSTART', 2);
define('GESHI_C_PPINCLUDE', 3);
define('GESHI_C_PPHDRSTART', 4);
define('GESHI_C_PPHDRPROV', 5);

/**
 * The GeSHiCCodeParser class
 *
 * @package core
 * @author  
 * @since   
 * @version $Revision$
 */
class GeSHiCCodeParser extends GeSHiCodeParser
{
    /**
     * A flag that can be used for the "state" of parsing
     * @var string
     * @access private
     */
    var $_state = GESHI_C_NORMAL;

    /**
     * A stack for storing tokens within parseToken().
     *
     * @var array
     * @access private
     */
    var $_store = array();

    /**
     * Whether we've yet found an initial hash for a preprocessor directive.
     *
     * @var boolean
     * @access private
     */
    var $_initial_hash;

    /**
     * The incrementally-built header filename within the <> of #include
     * @var array
     * @access private
     */
    var $_provisional_hdr;

    function GeSHiCCodeParser(&$styler, $language)
    {
        $this->GeSHiCodeParser($styler, $language);
        /** for geshi_c_get_non_std_preproc_directives_url() */
        require_once GESHI_LANGUAGES_ROOT.'c'.GESHI_DIR_SEP.'common.php';
    }

    function parseToken($token, $context_name, $data)
    {
        /**
         * Keyword-highlight standard preprocessor directives and link them to a
         * url; also highlight and link standard headers.
         */
        $ret = array(&$token, &$context_name, &$data);
        if ($context_name == $this->_language.'/preprocessor') {
            if ($this->_state == GESHI_C_NORMAL) {
                $this->_state = GESHI_C_PPSTART;
                $this->_initial_hash = false;
                $dircmptok = '';
            }
            if ($this->_state == GESHI_C_PPSTART) {
                if ($token{0} == '#') {
                    $dircmptok = substr($token, 1);
                    $this->_initial_hash = true;
                } else $dircmptok = $token;
                if ($this->_initial_hash && $dircmptok == '') {
                    // skip
                } else if (in_array($dircmptok,
                  geshi_c_get_start_of_line_PP_directives_hashsym())) {
                    $data['url'] =
                      geshi_c_get_start_of_line_PP_directives_hashsym_url(
                        $dircmptok);
                    $this->_state = $dircmptok == 'include' ?
                      GESHI_C_PPINCLUDE : GESHI_C_PP;
                    $context_name = $this->_language.'/preprocessor/directive';
                } else if (in_array($dircmptok,
                  geshi_c_get_start_of_line_PP_directives_nohashsym())) {
                    $data['url'] =
                      geshi_c_get_start_of_line_PP_directives_nohashsym_url(
                        $dircmptok);
                    $context_name = $this->_language.'/preprocessor/directive';
                    $this->_state = GESHI_C_PP;
                } else if ($this->_initial_hash &&
                  !geshi_is_whitespace($dircmptok) && $dircmptok != '\\') {
                    $data['url'] = geshi_c_get_non_std_preproc_directives_url();
                    $context_name = $this->_language.'/preprocessor/directive';
                    $this->_state = GESHI_C_PP;
                }
            }
        } else if ($context_name == $this->_language.'/preprocessor/end') {
            $this->_state = GESHI_C_NORMAL;
        }
        if ($this->_state == GESHI_C_PPINCLUDE) {
            if ($token == '<') {
                $this->_state = GESHI_C_PPHDRSTART;
                $this->_provisional_hdr = '';
            }
        } else if ($this->_state == GESHI_C_PPHDRSTART) {
            $this->_provisional_hdr .= $token;
            if ($token == '>') {
                $do_flush = true;
                $this->_state = GESHI_C_PP;
            } else {
                $this->_store[] = $ret;
                $ret = false;
                if (in_array($this->_provisional_hdr,
                  geshi_c_get_standard_headers())) {
                    $this->_state = GESHI_C_PPHDRPROV;
                }
            }
        } else if ($this->_state == GESHI_C_PPHDRPROV) {
            if ($token != '>') $do_flush = true;
            else {
                // right now only the header is stored on the stack; this code
                // doesn't take account of the possibility of anything else
                $this->_store[0][0] = $this->_provisional_hdr;
                $this->_store[0][1] = $this->_language.'/preprocessor/include/'.
                  'stdheader';
                $this->_store[0][2]['url'] = geshi_c_get_standard_headers_url(
                  $this->_provisional_hdr);
                array_splice($this->_store, 1, count($this->_store));
                $do_flush = true;
                $this->_state = GESHI_C_PP;
            }
        } else $do_flush = true; // for safety only - there really shouldn't be
                                 // a stack at this point
        if ($do_flush) {
            $this->_store[] = $ret;
            $ret = $this->_store;
            $this->_store = array();
        }

        /**
         * Now simplify theming by aggregating common contexts.
         */
        if ($context_name == $this->_language.'/preprocessor/include' ||
          $context_name == $this->_language.'/preprocessor/ifelif' ||
          $context_name == $this->_language.'/preprocessor/general') {
            $context_name = $this->_language.'/preprocessor';
        }
        /**
         * @note it would be nice to be able to avoid these by being able to
         * specify the desired context as a parameter to useStandardIntegers()
         * and useStandardDoubles()
         */
        if ($context_name == $this->_language.'/preprocessor/include/num/int' ||
          $context_name == $this->_language.'/preprocessor/ifelif/num/int' ||
          $context_name == $this->_language.'/preprocessor/general/num/int') {
            $context_name = $this->_language.'/preprocessor/num/int';
        }
        if ($context_name == $this->_language.'/preprocessor/include/num/dbl' ||
          $context_name == $this->_language.'/preprocessor/ifelif/num/dbl' ||
          $context_name == $this->_language.'/preprocessor/general/num/dbl') {
            $context_name = $this->_language.'/preprocessor/num/dbl';
        }
        return $ret;
    }
}

?>
