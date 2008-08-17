<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * <pre>
 *   File:   geshi/languages/php/php5.php
 *   Author: Nigel McNie
 *   E-mail: nigel@geshi.org
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
 * @author     Nigel McNie <nigel@geshi.org>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2004 - 2006 Nigel McNie
 * @version    $Id$
 *
 */

/**#@+
 * @access private
 */

/** Get common functions for PHP */
require_once GESHI_LANGUAGES_ROOT . 'php' . GESHI_DIR_SEP . 'common.php';

function geshi_php_php5 (GeSHiContext $context)
{
    geshi_php_common($context);

    // Standard PHP5 keywords
    $context->addKeywordGroup(array(
            'declare', 'abstract', 'catch', 'class', 'default',
            'final', 'implements', 'interface',
            'private', 'protected', 'public', 'self', 'throw',
            'try',
        ), 'keyword'
    );

    // Constants
    $context->addKeywordGroup(array(
            'E_STRICT', '__METHOD__'
        ), 'constant'
    );

    // PHP is embedded within HTML
    $context = $context->embedInside('html/html');
}

/**#@-*/

?>
