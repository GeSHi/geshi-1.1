<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * <pre>
 *   File:   geshi/themes/default/eiffel/eiffel.php
 *   Author: Julian Tschannen
 *   E-mail: julian@tschannen.net
 * </pre>
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
 * @package    geshi
 * @subpackage theme
 * @author     Julian Tschannen <julian@tschannen.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2006 Julian Tschannen, Nigel McNie
 * @version    $Id$
 *
 */

/*
 * Eiffel styles for default theme
 */

$this->setStyle('keyword', 'font-weight: bold;color:#0600FF;');
$this->setStyle('symbol', 'font-weight: normal;color:#FF0000;');
$this->setStyle('special', 'font-weight: normal;color:#8000FF;');

$this->setStyle('tagname', 'font-weight: normal; font-style: italic; color: #444444;');
$this->setStyle('classname', 'font-weight: normal; color:#0600FF;');
$this->setStyle('featurename', 'font-weight: normal; color:#000000;');
$this->setStyle('featurecall', 'font-weight: normal; color:#006000;');

$this->setStyle('integer', 'font-weight: normal;color:#8000FF;');

$this->setStyle('comment', 'font-weight: normal;color:#008000;');
$this->setStyle('comment/featurename', 'font-weight: normal;color:#002000;');
$this->setStyle('comment/classname', 'font-weight: normal;color:#000080;');

$this->setStyle('character', 'font-weight: normal;color:#008080;');
$this->setStyle('character/esc', 'font-weight: normal;color:#000000;');
$this->setStyle('string', 'font-weight: normal;color:#008080;');
$this->setStyle('string/esc', 'font-weight: normal;color:#000000;');

?>