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
 * @author    Nigel McNie <nigel@geshi.org>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005 Nigel McNie
 * @version   $Id$
 * 
 */

$GLOBALS['geshi_dbg_level'] = 0;
function geshi_dbg_level ($level) {
    $GLOBALS['geshi_dbg_level'] = $level;
}

/**
 * Handles debugging by printing a message according to current debug level,
 * mask of context and other things.
 * 
 * @param string The message to print out
 * @param int The context in which this message is to be printed out in - see
 *            the GESHI_DBG_* constants
 * @param boolean Whether to add a newline to the message
 * @param boolean Whether to return the count of errors or not
 */
function geshi_dbg ($message, $context, $add_nl = true, $return_counts = false)
{
    //echo "DBG: " . (GESHI_DBG & $context) . "  " . $context . "  " . "<br />";
    if (((GESHI_DBG & $context)) || ($GLOBALS['geshi_dbg_level'] & $context)) {
        //
        // Message can have the following symbols at start
        //
        // @b: bold
        // @i: italic
        // @o: ok (green colour)
        // @w: warn (yellow colour)
        // @e: err (red colour)
        $test  = substr($message, 0, 2);
        $start = '';
        $end   = '</span>';
        switch ($test) {
            case '@b':
                $start = '<span style="font-weight:bold;">';
                break;
            
            case '@i':
                $start = '<span style="font-style:italic;">';
                break;
                
            case '@o':
                $start = '<span style="color:green;background-color:#efe;border:1px solid #393;">';
                break;
            
            case '@w':
                $start = '<span style="color:#660;background-color:#ffe;border:1px solid #993;">';
                break;

            case '@e':
                $start = '<span style="color:red;background-color:#fee;border:1px solid #933;">';
                break;
                
            default:
                $end = '';
        }
        
        if (preg_match('#(.*?)::(.*?)\((.*?)\)#si', $message)) {
            $start = '<span style="font-weight:bold;">';
            $end   = '</span>';
        }
        
        if (preg_match('#^@[a-z]#', $message)) {
            $message = substr($message, 2);
        }
        echo $start . htmlspecialchars(str_replace("\n", '', $message)) . $end;
        if ($add_nl) echo "\n";
    } 
}

/**
 * Checks whether a file name is able to be read by GeSHi
 * 
 * The file must be within the GESHI_ROOT directory
 * 
 * @param string The absolute pathname of the file to check
 * @return boolean Whether the file is readable by GeSHi
 * @todo [blocking 1.1.5] Check that path does not contain links etc (bug 15)
 */
function geshi_can_include ($file_name)
{
    return (GESHI_ROOT == substr($file_name, 0, strlen(GESHI_ROOT)) &&
        is_file($file_name) && is_readable($file_name));
}


/**
 * Drop-in replacement for strpos and stripos. Also can handle regular expression
 * string positions.
 * 
 * @param string The string in which to search for the $needle
 * @param string The string to search for. If this string starts with "REGEX" then
 *               a regular expression search is performed.
 * @param int    The offset in the string in which to start searching
 * @param boolean Whether the search is case sensitive or not
 * @param boolean Whether the match table is needed (almost never, and it makes things slower)
 * @return array An array of data:
 * <pre> 'pos' => position in string of needle,
 * 'len' => length of match
 * 'tab' => a table of the stuff matched in brackets for a regular expression</pre>
 */
function geshi_get_position ($haystack, $needle, $offset = 0, $case_sensitive = false, $need_table = false)
{
    //geshi_dbg('Checking haystack: ' . $haystack . ' against needle ' . $needle . ' (' . $offset . ')',GESHI_DBG_PARSE, false);
    if ('REGEX' != substr($needle, 0, 5)) {
        if (!$case_sensitive) {
            return array('pos' => stripos($haystack, $needle, $offset), 'len' => strlen($needle));
        } else {
            return array('pos' => strpos($haystack, $needle, $offset), 'len' => strlen($needle));
        }
    }
    
    $regex = substr($needle, 5);

    // Get the location of the first match of the regular expression    
    $foo = microtime();
    $foo_len = strlen($foo);
    $len = strlen($haystack);
    $str = preg_replace($regex, $foo, $haystack, 1);
    $length = $len - (strlen($str) - $foo_len);

    // Return match table if requested 
    if ($need_table) {
        $matches = array();
        preg_match_all($regex, $haystack, $matches);
        $i = 0;
        $table = array();
        foreach ( $matches as $match ) {
            $table[$i++] = (isset($match[0])) ? $match[0] : null;
        }
    } else {
        $table = array();
    }
    return array('pos' => strpos($str, $foo), 'len' => $length, 'tab' => $table);
}

/**
 * Returns the regexp for integer numbers, for use with GeSHiCodeContexts
 * 
 * @param string The prefix to use for the name of this number match
 * @return array
 * @todo [blocking 1.1.5] Octal/hexadecimal numbers are common, so should have functions
 *       for those, and make sure that integers/doubles do not collide
 */
function geshi_use_integers ($prefix)
{
    return array(
        array(
            '#([^a-zA-Z_0-9\.]|^)([-]?[0-9]+)(?=[^a-zA-Z_0-9]|$)#'
        ),
        '',
        array(
            1 => true, // catch banned stuff for highlighting by the code context that it is in
            2 => array(
                $prefix . '/' . GESHI_NUM_INT,
                false
                ),
            3 => true
        )
    );
}

/**
 * Returns the regexp for double numbers, for use with GeSHiCodeContexts
 * 
 * @param string The prefix to use for the name of this number match
 * @param boolean Whether a number is required in front of the decimal point or not.
 * @return array
 */
function geshi_use_doubles ($prefix, $require_leading_number = false)
{
    $banned = '[^a-zA-Z_0-9]';
    $plus_minus = '[\-\+]?';
    $leading_number_symbol = ($require_leading_number) ? '+' : '*';

    return array(
        array(
             // double precision with e, e.g. 3.5e7 or -.45e2
            "#(^|$banned)?({$plus_minus}[0-9]$leading_number_symbol\.[0-9]+[eE]{$plus_minus}[0-9]+)($banned|\$)?#",
            // double precision with e and no decimal place, e.g. 5e2
            "#(^|$banned)?({$plus_minus}[0-9]+[eE]{$plus_minus}[0-9]+)($banned|\$)?#",
            // double precision (.123 or 34.342 for example)
            // There are some cases where the - sign will not be highlighted for various reasons,
            // but I'm happy that it's done where it can be. Maybe it might be worth looking at
            // later if there are any real problems, else I'll ignore it
            "#(^|$banned)?({$plus_minus}[0-9]$leading_number_symbol\.[0-9]+)($banned|\$)?#"
        ),
        '.', //doubles must have a dot
        array(
            1 => true, // as above, catch for normal stuff
            2 => array(
                0 => $prefix . '/' . GESHI_NUM_DBL,
                1 => false // Don't attempt to highlight numbers as code
            ),
            true
        )
    );
}

function geshi_is_whitespace ($token)
{
    return !preg_match('/[^\s]/', $token);
}

// @todo [blocking 1.1.9] fix this up
// +----------------------------------------------------------------------+
// | PHP Version 4                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2004 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 3.0 of the PHP license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available at through the world-wide-web at                           |
// | http://www.php.net/license/3_0.txt.                                  |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Authors: Aidan Lister <aidan@php.net>                                |
// +----------------------------------------------------------------------+
//
/**
 * Replace stripos()
 * 
 * This function lifted from the PHP_Compat PEAR package, and optimised
 * 
 * @author      Aidan Lister <aidan@php.net>, Nigel McNie <nigel@geshi.org>
 * @version     $Revision$
 */
if (!function_exists('stripos')) {
	function stripos ( $haystack, $needle, $offset = null )
	{
		// Manipulate the string if there is an offset
		$fix = 0;
		if (!is_null($offset)) {
			if ($offset > 0) {
				$haystack = substr($haystack, $offset);
				$fix = $offset;
			}
		}
		$segments = explode(strtolower($needle), strtolower($haystack), 2);

		// Check there was a match
		if (count($segments) == 1) {
			return false;
		}

		return strlen($segments[0]) + $fix;
	}
}

?>
