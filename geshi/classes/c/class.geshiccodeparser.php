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
 * @author    
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2006
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
    }

    function parseToken($token, $context_name, $data)
    {
        /**
         * Demarcate non-standard preprocessor directives; don't allow
         * subsequent tokens matching a standard include directive to highlight
         * as a child preprocessor context.  Unfortunately this doesn't prevent
         * such tokens from being linked since the context nevertheless changes
         * - see comments in preprocessor.php.
         */
        if ($context_name == $this->_language.'/preprocessor/start' ||
          $context_name == $this->_language.'/preprocessor/end') {
            $this->_state = 0;
        } else if ($context_name == $this->_language.'/preprocessor' &&
          $this->_state == 0) {
            $this->_state = 1;
        }
        if ($this->_state == 1) {
            $context_name = $this->_language.'/preprocessor/nonstd';
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
