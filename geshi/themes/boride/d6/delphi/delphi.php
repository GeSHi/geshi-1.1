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
 * @package   theme
 * @author    Benny Baumann <BenBE@benbe.omorphia.de>, Nigel McNie <nigel@geshi.org>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005 Nigel McNie
 * @version   $Id$
 *
 */

/*
 * Delphi styles for boring Borland IDE theme
 */
$this->setStyle('single_string', 'color:#000;');
$this->setStyle('single_string/esc', 'color:#000;');

$this->setStyle('multi_comment', 'color:#000080;font-style:italic;');
$this->setStyle('single_comment', 'color:#000080;font-style:italic;');

$this->setStyle('preprocessor', 'color:#008000;font-style:italic;');
$this->setStyle('preprocessor/switch', 'color:#008000;font-style:italic;font-weight:bold;');
$this->setStyle('preprocessor/num/int', 'color:#008000;');
$this->setStyle('preprocessor/single_string', 'color:#008000;');

$this->setStyle('keyword', 'color:#000;font-weight:bold;');

$this->setStyle('asm', 'color:#000;');
$this->setStyle('asm/start', 'color:#000;font-weight:bold;');
$this->setStyle('asm/end', 'color:#000;font-weight:bold;');
$this->setStyle('asm/keyword', 'color:#000;font-weight:bold;');
$this->setStyle('asm/keyop', 'color:#000;font-weight:bold;');
$this->setStyle('asm/control', 'color:#000;font-weight:bold;');
$this->setStyle('asm/register', 'color:#000;');
$this->setStyle('asm/instr/*', 'color:#000;font-weight:bold;');

?>
