<?php
/**
 * GeSHi - Generic Syntax Highlighter
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * You can view a copy of the GNU GPL in the LICENSE file that comes
 * with GeSHi, in the docs/ directory.
 *
 * @package   core
 * @author    Nigel McNie <nigel@geshi.org>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005 Nigel McNie
 * @version   $Id$
 * 
 */

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
    //static $warn_count, $err_count;
    //if (!$warn_count) $warn_count = 0;
    //if (!$err_count) $err_count = 0;
    
    //if (!$return_counts) {
        if (GESHI_DBG & $context) {
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
                    //++$warn_count;
                    break;
    
                case '@e':
                    $start = '<span style="color:red;background-color:#fee;border:1px solid #933;">';
                    //++$err_count;
                    break;
                    
                default:
                    $end = '';
            }
            
            if(preg_match('#(.*?)::(.*?)\((.*?)\)#si', $message)) {
                $start = '<span style="font-weight:bold;">';
                $end   = '</span>';
            }
            
            if (preg_match('#^@[a-z]#', $message)) {
                $message = substr($message, 2);
            }
            echo $start . htmlspecialchars(str_replace("\n", '', $message)) . $end;
            if ($add_nl) echo "\n";
        } 
    //} else {
    //        return array('w' => $warn_count, 'e' => $err_count);
    //}
}


/**
 * Checks whether a file name is able to be read by GeSHi
 * 
 * The file must be within the GESHI_ROOT directory
 * 
 * @param string The absolute pathname of the file to check
 * @return boolean Whether the file is readable by GeSHi
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
 * @return array An array of data:
 * <pre> 'pos' => position in string of needle,
 * 'len' => length of match
 * 'tab' => a table of the stuff matched in brackets for a regular expression</pre>
 */
function geshi_get_position ($haystack, $needle, $offset, $case_sensitive = false)
{
    if ('REGEX' != substr($needle, 0, 5)) {
        if (!$case_sensitive) {
            return array('pos' => stripos($haystack, $needle, $offset), 'len' => strlen($needle));
        } else {
            return array('pos' => strpos($haystack, $needle, $offset), 'len' => strlen($needle));
        }
    }
    
    // geshi_preg_match_pos

    $regex = substr($needle, 5);
    $string = $haystack;
    
    $foo = microtime();
    $foo_len = strlen($foo);
    //if ( DEBUG ) echo "    md5: $foo\n";
    $len = strlen($string);
    //if ( DEBUG ) echo "    length of \$string: $len\n";
    $str = preg_replace($regex, $foo, $string, 1);
    //if ( DEBUG ) echo "    new replaced string: " . htmlspecialchars($str) . "\n";
    $length = $len - (strlen($str) - $foo_len);
    //if ( DEBUG ) echo "    length of replaced string: $length, pos of replace string: " . strpos($str, $foo) . "\n";

    // ADD SOME MORE: Return matching table (?)
    // @todo Don't generate table if not needed
    preg_match_all($regex, $string, $matches);
    //$table = $matches;
    $i = 0;
    $table = array();
    foreach ( $matches as $match ) {
  /*      if ( 0 == $i ) {
            ++$i;
            continue;
        }
    commented out to catch the whole thing*/    $table[$i++] = (isset($match[0])) ? $match[0] : null;
    }
//     echo htmlspecialchars(print_r($table, true));
//     exit;

    //return strpos($str, $foo);
    //return array('pos' => strpos($str, $foo), 'len' => $length);
    return array('pos' => strpos($str, $foo), 'len' => $length, 'tab' => $table);
    
}

/**
 * Returns the regexp for integer numbers, for use with GeSHiCodeContexts
 * 
 * @param string The prefix to use for the name of this number match
 * @return array
 */
function geshi_use_integers ($prefix)
{
    //$banned = '[^a-zA-Z_0-9]';
    //$plus_minus = '[\-\+]?';

    return array(
        0 => array(
            // the regexps
            //"#($banned|^)({$plus_minus}[0-9]+)($banned)?#"  // basic integers
            '#([^a-zA-Z_])([-]?[0-9]+)#'
            ),
        1 => '',
        2 => array(
            1 => true, // catch banned stuff for highlighting by the code context that it is in
            2 => array(
                0 => $prefix . '/' . GESHI_NUM_INT,
                1 => 'color:#11e;'
                )/*,
            3 => array(0=>'',1=>'')*/
            )
        );
}

/// And the same for doubles
function geshi_use_doubles ( $prefix )
{
    $banned = '[^a-zA-Z_0-9]';
    $plus_minus = '[\-\+]?';

    return array(
        0 => array(
            "#($banned|^)({$plus_minus}[0-9]*\.[0-9]+)($banned)?#" // double precision (.123 or 34.342 for example)
            ),
        1 => '.', //doubles must have a dot
        2 => array(
            1 => true, // as above, catch for normal stuff
            2 => array(
                0 => $prefix . '/' . GESHI_NUM_DBL,
                1 => 'color:#d3d;'
                )
            ),
            3 => true
        );
}


// @todo fix this up
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
// $Id$
/**
 * Replace stripos()
 * @category    PHP
 * @link        http://php.net/function.stripos
 * @author      Aidan Lister <aidan@php.net>
  * @version     $Revision$
  * @since       PHP 5
  * @require     PHP 4.0.1 (trigger_error)
  */
if ( !function_exists('stripos') )
{
	function stripos ( $haystack, $needle, $offset = null )
	{
		/*if ( !is_scalar($haystack) )
		{
			trigger_error('stripos() expects parameter 1 to be string, ' . gettype($haystack) . ' given', E_USER_WARNING);
			return false;
			}
		if ( !is_scalar($needle) )
		{
			trigger_error('stripos() needle is not a string or an integer.', E_USER_WARNING);
			return false;
		}
		if ( !is_int($offset) && !is_bool($offset) && !is_null($offset) )
		{
			trigger_error('stripos() expects parameter 3 to be long, ' . gettype($offset) . ' given', E_USER_WARNING);
			return false;
		}*/

		// Manipulate the string if there is an offset
		$fix = 0;
		if ( !is_null($offset) )
		{
			if ( $offset > 0 )
			{
				$haystack = substr($haystack, $offset/*, strlen($haystack) - $offset*/);
				$fix = $offset;
			}
		}
		$segments = explode(strtolower($needle), strtolower($haystack), 2);

		// Check there was a match
		if ( count($segments) == 1 )
		{
			return false;
		}

		$position = strlen($segments[0]) + $fix;
		return $position;
	}

}
?>
