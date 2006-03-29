<?php
/**
 * GeSHi - Generic Syntax Highlighter
 *
 * For information on how to use GeSHi, please consult the documentation
 * found in the docs/ directory, or online at http://geshi.org/docs/
 *
 *
 * These functions are used in several places in the C context files; this
 * file avoids redundancy.
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
 * @package   lang
 * @author    
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2006
 * @version   $Id$
 *
 */

/**
 * Returns the parent context of the $context parameter.
 */
function geshi_parent_context($context)
{
    preg_match('/(.*)\/.*/', $context, $matches);
    return $matches[1];
}

/**
 * Returns an array of regexps for starting child preprocessor contexts based
 * on the string array of directives in the $directives parameter.
 */
function geshic_make_ppdir_regexps($directives)
{
    $regexps = array();
    foreach ($directives as $directive) {
        $regexps[] = 'REGEX#(?<=\b'.$directive.'\b)#';
    }
    return $regexps;
}

?>
