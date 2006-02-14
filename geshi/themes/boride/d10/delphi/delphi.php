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
$this->setStyle('multi_comment', 'color:#008000;font-style:italic;');
$this->setStyle('single_comment', 'color:#008000;font-style:italic;');
$this->setStyle('single_string', 'color:#0000FF;');
$this->setStyle('single_string/esc', 'color:#0000FF;');

$this->setStyle('preprocessor', 'color:#008080;font-style:italic;');

$this->setStyle('asm', 'color:#000;');
$this->setStyle('asm/start', 'color:#000080;font-weight:bold;');
$this->setStyle('asm/end', 'color:#000080;font-weight:bold;');
$this->setStyle('asm/keyword', 'color:#000080;font-weight:bold;');
$this->setStyle('asm/keyop', 'color:#000080;font-weight:bold;');
$this->setStyle('asm/control', 'color:#000;font-weight: bold;');
$this->setStyle('asm/register', 'color:#000;');
$this->setStyle('asm/instr/i386', 'color:#000;font-weight:bold;');
$this->setStyle('asm/instr/i387', 'color:#000;font-weight:bold;');
$this->setStyle('asm/instr/mmx', 'color:#000;font-weight:bold;');
$this->setStyle('asm/instr/sse', 'color:#000;font-weight:bold;');
$this->setStyle('asm/instr/3Dnow', 'color:#000;font-weight:bold;');
$this->setStyle('asm/instr/3Dnow2', 'color:#000;font-weight:bold;');

$this->setStyle('asm/symbol', 'color:#000000;');
$this->setStyle('asm/label', 'color:#000;');
$this->setStyle('asm/num/int', 'color:#000;');
$this->setStyle('asm/num/dbl', 'color:#000;');
$this->setStyle('asm/hex', 'color: #000;');

$this->setStyle('asm/oodynamic', 'color:#000;');

$this->setStyle('keyword', 'color:#000080;font-weight:bold;');
$this->setStyle('keytype', 'color:#000;font-weight:bold;');
$this->setStyle('keyident', 'color:#000;font-weight:bold;');

$this->setStyle('symbol', 'color:#000000;');
$this->setStyle('ctrlsym', 'color:#000000;');
$this->setStyle('oopsym', 'color:#008000;');
$this->setStyle('brksym', 'color:#000000;');
$this->setStyle('mathsym', 'color:#000000;');
$this->setStyle('cmpsym', 'color:#000000;');

$this->setStyle('char', 'color:#0000FF;');
$this->setStyle('charhex', 'color:#0000FF;');
$this->setStyle('hex', 'color: #0000FF;');

$this->setStyle('oodynamic', 'color:#559;');

$this->setStyle('stdprocs/system', 'color:#444;');
$this->setStyle('stdprocs/sysutil', 'color:#444;');
$this->setStyle('stdprocs/class', 'color:#444;');
$this->setStyle('stdprocs/math', 'color:#444;');

$this->setStyle('num/int', 'color:#0000FF;');
$this->setStyle('num/dbl', 'color:#0000FF;');

?>
