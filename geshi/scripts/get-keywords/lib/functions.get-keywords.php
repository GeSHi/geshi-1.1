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
 * @package   scripts
 * @author    Nigel McNie <nigel@geshi.org>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005 Nigel McNie
 * @version   $Id$
 * 
 */

/**
 * Shows help text for get-keywords script and exits
 * 
 * @since 0.1.0
 */
function show_help ()
{
    global $argv;
    print <<<EOF
Usage: php $argv[0] language keyword-group
Language is a language supported by GeSHi and
that also has a katepart language file or similar.

Options:
    -h  --help           Show this help text
    -v  --version        Show version information
    --list-groups [lang] List keyword groups for language [lang]
    --list-langs         List supported languages

EOF;
    exit;
}

/**
 * Shows the version number of get-keywords and exits
 * 
 * @since 0.1.0
 */
function show_version ()
{
    print GESHI_GET_KEYWORDS_VERSION . 
        "\n\$Date$\n";
    exit;
}

/**
 * Checks whether the specified options were passed on the command
 * line, and returns the value of the option if specified.
 * 
 * @param string|array The options to check for
 * @param array The arguments as parsed by Console_Getopt::getopt()
 * @return True if the argument exists, the value of the argument if there is a value, else false
 * @since 0.1.0
 * @todo [blocking 1.1.5] Move this into console_getopt class
 * @todo [blocking 1.1.5] Check about what is returned when option does exist
 */
function get_option ($options, $args)
{
    $options = (array) $options;
    $args = $args[0];
    foreach ($args as $arg) {
        foreach ($options as $option) {
            if ($option == $arg[0] || '--' . $option == $arg[0]) {
                return ($arg[1]) ? $arg[1] : true;
            }
        }
    }
    return false;
}

?>
