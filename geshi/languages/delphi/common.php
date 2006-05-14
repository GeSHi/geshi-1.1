<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * <pre>
 *   File:   geshi/languages/delphi/common.php
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
 * @version    $Id$
 *
 */

function geshi_delphi_common(&$context)
{
    $context->addChild('single_comment');
    $context->addChild('multi_comment');
    $context->addChild('single_string', 'string');

}

function geshi_delphi_chars(&$context)
{
    // Characters
    $context->addRegexGroup('/(#[0-9]+)/', '#', array(
        1 => array('char', false)
    ));
    $context->addRegexGroup('/(#\$[0-9a-fA-F]+)/', '#', array(
        1 => array('charhex', false)
    ));
}

function geshi_delphi_integers(&$context)
{
    // Integers
    $context->useStandardIntegers();
    $context->addRegexGroup('/(\$[0-9a-fA-F]+)/', '$', array(
        1 => array('hex', false)
    ));
}

function geshi_delphi_keytype(&$context)
{
    // Keytypes
    $context->addKeywordGroup(array(
        'AnsiChar', 'AnsiString', 'Bool', 'Boolean', 'Byte', 'ByteBool', 'Cardinal', 'Char',
        'Comp', 'Currency', 'DWORD', 'Double', 'Extended', 'Int64', 'Integer', 'IUnknown',
        'LongBool', 'LongInt', 'LongWord', 'PAnsiChar', 'PAnsiString', 'PBool', 'PBoolean', 'PByte',
        'PByteArray', 'PCardinal', 'PChar', 'PComp', 'PCurrency', 'PDWORD', 'PDate', 'PDateTime',
        'PDouble', 'PExtended', 'PInt64', 'PInteger', 'PLongInt', 'PLongWord', 'Pointer', 'PPointer',
        'PShortInt', 'PShortString', 'PSingle', 'PSmallInt', 'PString', 'PHandle', 'PVariant', 'PWord',
        'PWordArray', 'PWordBool', 'PWideChar', 'PWideString', 'Real', 'Real48', 'ShortInt', 'ShortString',
        'Single', 'SmallInt', 'String', 'TClass', 'TDate', 'TDateTime', 'TextFile', 'THandle',
        'TObject', 'TTime', 'Variant', 'WideChar', 'WideString', 'Word', 'WordBool'
    ), 'keytype');
}

function geshi_delphi_keyident_noself(&$context)
{
    // Keyidents
    $context->addKeywordGroup(array(
        'false', 'nil', 'true'
    ), 'keyident');
}

function geshi_delphi_keyident_self(&$context)
{
    // Keyidents
    $context->addKeywordGroup(array(
        'false', 'nil', 'self', 'true'
    ), 'keyident');
}

function geshi_delphi_single_comment (&$context)
{
    $context->addDelimiters('//', "\n");
    $context->setComplexFlag(GESHI_COMPLEX_PASSALL);
}

function geshi_delphi_multi_comment (&$context)
{
    $context->addDelimiters('REGEX#\{(?!\$)#im', '}');
    $context->addDelimiters('REGEX#\(\*(?!\$)#im', '*)');
    $context->setComplexFlag(GESHI_COMPLEX_PASSALL);
}

function geshi_delphi_single_string (&$context)
{
    $context->addDelimiters("'", array("'", "\n"));
    $context->setEscapeCharacters(array("'"));
    $context->setCharactersToEscape(array("'"));
}

function geshi_delphi_preprocessor (&$context)
{
    $context->addDelimiters('REGEX#\{(?=\$)#im', '}');
    $context->addDelimiters('REGEX#\(\*(?=\$)#im', '*)');
//    $context->addDelimiters('{$', '}');
//    $context->addDelimiters('(*$', '*)');

    $context->useStandardIntegers();
    $context->addChild('single_string', 'string');

    $context->addKeywordGroup(array(
        '$A-', '$A+', '$A1', '$A2', '$A4',
        '$A8',                  //Delphi 7 up, named here for completenes
        '$B-', '$B+',
        '$C-', '$C+',
        '$D-', '$D+',
        '$E',
        '$G-', '$G+',
        '$H-', '$H+',
        '$I', '$I-', '$I+',
        '$J-', '$J+',
        '$L', '$L-', '$L+',
        '$M',                   //Plattform dependend, see below
        '$O-', '$O+',
        '$P-', '$P+',
        '$Q-', '$Q+',
        '$R', '$R-', '$R+',
        '$T-', '$T+',
        '$U-', '$U+',
        '$V-', '$V+',
        '$W-', '$W+',
        '$X-', '$X+',
        '$Y-', '$Y+', '$YD',
        '$Z1', '$Z2', '$Z4',

        '$ALIGN',               //alias $A
        '$APPTYPE',
        '$ASSERTIONS',          //alias $C
        '$BOOLEVAL',            //alias $B
        '$DEBUGINFO',           //alias $D
        '$DEFINE',
        '$DEFINITIONINFO',      //alias $YD
        '$DENYPACKAGEUNIT',
        '$DESCRIPTION',
        '$DESIGNONLY',
        '$ELSE',
        '$ELSEIF',              //Delphi 7 up, named here for completenes
        '$ENDIF',
        '$EXTENDEDSYNTAX',      //alias $X
        '$EXTENSION',           //alias $E
        '$EXTERNALSYM',
        '$HINTS',
        '$HPPEMIT',
        '$IF',                  //Delphi 7 up, named here for completenes
        '$IFDEF',
        '$IFNDEF',
        '$IFNOPT',
        '$IFOPT',
        '$IMAGEBASE',
        '$IMPLICITBUILD',
        '$IMPORTEDDATA',        //alias $G
        '$INCLUDE',             //alias $I
        '$IOCHECKS',            //alias $I
        '$LIBSUFFIX',
        '$LIBVERSION',
        '$LINK',                //alias $L
        '$LOCALSYMBOLS',        //alias $L
        '$LONGSTRINGS',         //alias $H
        '$MAXSTACKSIZE',        //alias $M (Windows only)
        '$MESSAGE',
        '$MINENUMSIZE',         //alias $Z1, $Z2 und $Z4
        '$MINSTACKSIZE',        //alias $M (Windows only)
        '$NODEFINE',
        '$NOINCLUDE',
        '$OBJEXPORTALL',
        '$OPENSTRINGS',         //alias $P
        '$OPTIMIZATION',        //alias $O
        '$OVERFLOWCHECKS',      //alias $Q
        '$RANGECHECKS',         //alias $R
        '$REALCOMPATIBILITY',
        '$REFERENCEINFO',       //alias $Y
        '$RESOURCE',            //alias $R
        '$RESOURCERESERVE',     //alias $M (Linux only)
        '$RUNONLY',
        '$SAFEDIVID',           //alias $U
        '$SOPREFIX',
        '$SOSUFFIX',
        '$SOVERSION',
        '$STACKCHECKS',
        '$STACKFRAMES',         //alias $W
        '$TYPEDADDRESS',        //alias $T
        '$TYPEINFO',            //alias $M
        '$UNDEF',
        '$VARSTRINGCHECKS',     //alias $V
        '$WARN',
        '$WARNINGS',
        '$WEAKPACKAGEUNIT',
        '$WRITEABLECONST',      //alias $J
    ), 'switch');
}

?>
