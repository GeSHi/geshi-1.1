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
 * @package   lang
 * @author    Nigel McNie <nigel@geshi.org>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005 Nigel McNie
 * @version   $Id$
 *
 */

/*
 * PHP styles for default theme
 */
$this->setStyle('php/php/start', 'font-weight:bold;color:#000;');
$this->setStyle('php/php/end', 'font-weight:bold;color:#000;');

$this->setStyle('php/php/cstructure', 'color:#a1a100;');
$this->setStyle('php/php/keyword', 'font-weight:bold;color:#000;');
$this->setStyle('php/php/function', 'color:#006;');

$this->setStyle('php/php/symbol', 'color:#008000;');
$this->setStyle('php/php/var', 'color:#33f;');

$this->setStyle('php/php/num/int', 'color:#11e;');
$this->setStyle('php/php/num/dbl', 'color:#fdf;');

$this->setStyle('php/php/oodynamic', 'color:#933;');
$this->setStyle('php/php/oostatic', 'color:#933;font-weight:bold;');

$this->setStyle('php/php/single_string', 'color:#f00;');
$this->setStyle('php/php/single_string/esc', 'color:#006;font-weight:bold;');
$this->setStyle('php/php/double_string', 'color:#f00;');
$this->setStyle('php/php/double_string/esc', 'color:#006;font-weight:bold;');

$this->setStyle('php/php/double_string/var', 'color:#22f;');
$this->setStyle('php/php/double_string/symbol', 'color:#008000;');
$this->setStyle('php/php/double_string/oodynamic', 'color:#933;');

$this->setStyle('php/php/heredoc', 'color:#f00;');
$this->setStyle('php/php/heredoc/start', 'color:#006;font-weight:bold;');
$this->setStyle('php/php/heredoc/end', 'color:#006;font-weight:bold;');
$this->setStyle('php/php/heredoc/var', 'color:#22f;');
$this->setStyle('php/php/heredoc/symbol', 'color:#008000;');
$this->setStyle('php/php/heredoc/oodynamic', 'color:#933;');

$this->setStyle('php/php/single_comment', 'color:#888;font-style:italic;');
$this->setStyle('php/php/multi_comment', 'color:#888;font-style:italic;');

$this->setStyle('php/php/classname', 'color:#933;');

$this->loadStyles('html/html');
$this->loadStyles('doxygen/doxygen');

?>
