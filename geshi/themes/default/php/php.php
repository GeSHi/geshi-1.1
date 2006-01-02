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
 * @author    Nigel McNie <nigel@geshi.org>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005 Nigel McNie
 * @version   $Id$
 *
 */

/*
 * PHP styles for default theme
 */
$this->setStyle('start', 'font-weight:bold;color:#000;');
$this->setStyle('end', 'font-weight:bold;color:#000;');

$this->setStyle('cstructure', 'color:#a1a100;');
$this->setStyle('keyword', 'font-weight:bold;color:#000;');
$this->setStyle('function', 'color:#006;');

$this->setStyle('symbol', 'color:#008000;');
$this->setStyle('var', 'color:#33f;');

$this->setStyle('num/int', 'color:#11e;');
$this->setStyle('num/dbl', 'color:#fdf;');

$this->setStyle('oodynamic', 'color:#933;');
$this->setStyle('oostatic', 'color:#933;font-weight:bold;');

$this->setStyle('single_string', 'color:#f00;');
$this->setStyle('single_string/esc', 'color:#006;font-weight:bold;');
$this->setStyle('double_string', 'color:#f00;');
$this->setStyle('double_string/esc', 'color:#006;font-weight:bold;');

$this->setStyle('double_string/var', 'color:#22f;');
$this->setStyle('double_string/symbol', 'color:#008000;');
$this->setStyle('double_string/oodynamic', 'color:#933;');

$this->setStyle('heredoc', 'color:#f00;');
$this->setStyle('heredoc/start', 'color:#006;font-weight:bold;');
$this->setStyle('heredoc/end', 'color:#006;font-weight:bold;');
$this->setStyle('heredoc/var', 'color:#22f;');
$this->setStyle('heredoc/symbol', 'color:#008000;');
$this->setStyle('heredoc/oodynamic', 'color:#933;');

$this->setStyle('single_comment', 'color:#888;font-style:italic;');
$this->setStyle('multi_comment', 'color:#888;font-style:italic;');

$this->setStyle('classname', 'color:#933;');

$this->loadStyles('html/html');
$this->loadStyles('doxygen/doxygen');

?>
