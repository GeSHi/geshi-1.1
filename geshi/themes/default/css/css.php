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
 * CSS styles for default theme
 */
$this->setStyle('css/css/string', 'color:#f00;');
$this->setStyle('css/css/string/esc', 'color:#006;font-weight:bold;');

$this->setStyle('css/css/comment', 'color:#888;font-style:italic;');

$this->setStyle('css/css/psuedoclass', 'color:#33f;');
$this->setStyle('css/css/symbol', 'color:#008000;');
$this->setStyle('css/css/class', 'color:#c9c;');
$this->setStyle('css/css/id', 'color:#c9c;font-weight:bold;');

$this->setStyle('css/css/rule/start', 'font-weight:bold;color:#000;');
$this->setStyle('css/css/rule/end', 'font-weight:bold;color:#000;');
$this->setStyle('css/css/rule/attribute', 'font-weight:bold;color:#000;');
$this->setStyle('css/css/rule/paren', 'color:#933;');
$this->setStyle('css/css/rule/color', 'color:#933;');
$this->setStyle('css/css/rule/type', 'color:#933;');
$this->setStyle('css/css/rule/symbol', 'color:#008000;');
$this->setStyle('css/css/rule/value', 'color:#933;');

$this->setStyle('css/css/attribute_selector', 'color:#008000;');

$this->setStyle('css/css/at_rule/start', 'color:#c9c;font-weight:bold;');
$this->setStyle('css/css/at_rule/end', 'color:#008000;');
$this->setStyle('css/css/at_rule/paren', 'color:#933;');
$this->setStyle('css/css/at_rule/symbol', 'color:#008000;');

$this->setStyle('css/css/inline_media', 'color:#b1b100;');
$this->setStyle('css/css/inline_media/starter', 'color:#c9c;font-weight:bold;');
$this->setStyle('css/css/inline_media/start', 'color:#000;font-weight:bold;');
$this->setStyle('css/css/inline_media/end', 'color:#000;font-weight:bold;');

?>
