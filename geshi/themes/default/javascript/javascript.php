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
 * Javascript styles for default theme
 */
$this->setStyle('javascript/javascript/multi_comment', 'color:#888;font-style:italic;');
$this->setStyle('javascript/javascript/single_comment', 'color:#888;font-style:italic;');

$this->setStyle('javascript/javascript/single_string', 'color:#f00;');
$this->setStyle('javascript/javascript/single_string/esc', 'color:#006;font-weight:bold;');
$this->setStyle('javascript/javascript/double_string', 'color:#f00;');
$this->setStyle('javascript/javascript/double_string/esc', 'color:#006;font-weight:bold;');

$this->setStyle('javascript/javascript/keyword', 'color:#000;font-weight:bold;');
$this->setStyle('javascript/javascript/function', 'color:#006;');
$this->setStyle('javascript/javascript/object', 'color:#393;font-weight:bold;');
$this->setStyle('javascript/javascript/math', 'color:#fd0;');
$this->setStyle('javascript/javascript/event', 'color:#fdb;');
$this->setStyle('javascript/javascript/method', 'color:#933;');
$this->setStyle('javascript/javascript/symbol', 'color:#008000;');

$this->setStyle('javascript/javascript/oodynamic', 'color:#559;');


?>
