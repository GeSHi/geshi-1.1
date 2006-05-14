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
    var $_state = 0;

    function GeSHiCCodeParser(&$styler, $language)
    {
        $this->GeSHiCodeParser($styler, $language);
        /** for geshi_c_get_non_std_preproc_directives_url() */
        require_once GESHI_LANGUAGES_ROOT.'c'.GESHI_DIR_SEP.'common.php';
    }

    function parseToken($token, $context_name, $data)
    {
        /**
         * Demarcate non-standard preprocessor directives and link them to a
         * hard-coded url; don't allow subsequent tokens matching a standard
         * include directive to highlight as a child preprocessor context or to
         * generate a link.
         */
        $nonstd_ppdir_linked = false;
        if ($context_name == $this->_language.'/preprocessor/start' ||
          $context_name == $this->_language.'/preprocessor/end') {
            $this->_state = 0;
        } else if ($context_name == $this->_language.'/preprocessor' &&
          $this->_state == 0) {
            $this->_state = 1;
            $data['url'] = geshi_c_get_non_std_preproc_directives_url();
            $nonstd_ppdir_linked = true;
        }
        if ($this->_state == 1) {
            $context_name = $this->_language.'/preprocessor/nonstd';
            if (!$nonstd_ppdir_linked) $data['url'] = null;
        }

        /**
         * Now simplify theming by aggregating common contexts
         */
        if ($context_name == $this->_language.'/preprocessor/include' ||
          $context_name == $this->_language.'/preprocessor/ifelif' ||
          $context_name == $this->_language.'/preprocessor/general') {
            $context_name = $this->_language.'/preprocessor';
        }
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
        return array($token, $context_name, $data);
    }
}

?>
