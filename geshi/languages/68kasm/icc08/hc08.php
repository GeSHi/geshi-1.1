<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * <pre>
 *   File:   geshi/languages/68kasm/common.php
 *   Author: Benny Baumann
 *   E-mail: BenBE@benbe.omorphia.de
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
 * @author     Benny Baumann <BenBE@benbe.omorphia.de>, Nigel McNie <nigel@geshi.org>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2005 - 2006 Benny Baumann, Nigel McNie
 * @version    $Id: common.php 828 2006-09-11 23:25:17Z oracleshinoda $
 *
 */

/**#@+
 * @access private
 */

/**
 * A single include file for all data including keyword listings
 */
require_once GESHI_LANGUAGES_ROOT.'68kasm'.GESHI_DIR_SEP.'common.php';

function geshi_68kasm_common(&$context)
{
    geshi_68kasm_common($context);
}

?>
