<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * <pre>
 *   File:   geshi/languages/eiffel/eiffel.php
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
 * @copyright  (C) 2006 Julian Tschannen, Nigel McNie
 * @version    $Id$
 *
 */

/**#@+
 * @access private
 */

/** Get common functions for Eiffel */
require_once GESHI_LANGUAGES_ROOT . 'eiffel' . GESHI_DIR_SEP . 'common.php';

function geshi_eiffel_eiffel (&$context)
{

    geshi_eiffel_common($context);

}



/**#@-*/

?>