<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * <pre>
 *   File:   geshi/languages/68kasm/common.php
 *   Author: Benny Baumann
 *   E-mail: BenBE@benbe.omorphia.de
 * </pre>
 *
 * For information on how to use GeSHi, please consult the documentation
 * found in the docs/ directory, or online at http://geshi.org/docs/
 *
 * This program is part of GeSHi.
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301 USA
 *
 * @package    geshi
 * @subpackage lang
 * @author     Benny Baumann <BenBE@benbe.omorphia.de>, Nigel McNie <nigel@geshi.org>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2005 - 2006 Benny Baumann, Nigel McNie
 * @version    $Id: common.php 828 2006-09-11 23:25:17Z oracleshinoda $
 *
 */

/**#@+
 * @access private
 */

function geshi_68kasm_common(&$context)
{
    $context->addChild('single_comment');
    $context->addChild('multi_comment');
    $context->addChild('single_string', 'string');
}

function geshi_68kasm_chars(&$context)
{
    // Characters
    $context->addRegexGroup('/(#[0-9]+)/', '#', array(
        1 => array('char', false)
    ));
    $context->addRegexGroup('/(#\$[0-9a-fA-F]+)/', '#', array(
        1 => array('charhex', false)
    ));
}

function geshi_68kasm_integers(&$context)
{
    // Integers
    $context->addRegexGroup('/(\$[0-9a-fA-F]+)/', '$', array(
        1 => array('hex', false)
    ));
    $context->useStandardIntegers();
}

function geshi_68kasm_single_comment (&$context)
{
    $context->addDelimiters('//', "\n");
    $context->setComplexFlag(GESHI_COMPLEX_PASSALL);
}

function geshi_68kasm_multi_comment (&$context)
{
    $context->addDelimiters('REGEX#\{(?!\$)#im', '}');
    $context->addDelimiters('REGEX#\(\*(?!\$)#im', '*)');
    $context->setComplexFlag(GESHI_COMPLEX_PASSALL);
}

function geshi_68kasm_single_string (&$context)
{
    $context->addDelimiters("'", array("'", "\n"));
    $context->addEscapeGroup("'");
}

?>