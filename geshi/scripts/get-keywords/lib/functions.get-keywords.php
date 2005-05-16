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
 * with project_name, in the docs/ directory.
 *
 * @package   scripts
 * @author    Nigel McNie <nigel@geshi.org>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005 Nigel McNie
 * @version   $Id$
 * 
 */

function show_help ()
{
    global $argv;
    print <<<EOF
Usage: php $argv[0] language keyword-group
Language is a language supported by GeSHi and
that also has a katepart language file or similar.

Options:
    -h  --help       Show this help text
    -v  --version    Show version information

@todo Get stuff from anywhere - the net mainly
@todo show version
@todo list-supported-languages

EOF;
    exit;
}

function show_version ()
{
    print "$Id$\n";
    exit;
}
?>
