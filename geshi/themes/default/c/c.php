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
 * @package    geshi
 * @subpackage theme
 * @author     http://clc-wiki.net/wiki/User:Netocrat
 * @link       http://clc-wiki.net/wiki/Development:GeSHi_C Bug reports
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2006 Netocrat
 * @version    $Id$
 *
 */

// normal code context

// could format the next 2 differently
$this->setStyle('ctlflow-keyword', 'color:#080;');
$this->setStyle('symbol', 'color:#080;');
$this->setStyle('member', 'font-weight:bold;');
// declarator-keyword and typeorqualifier tokens appear in the same context so
// identical formatting makes sense
$this->setStyle('declarator-keyword', 'color:#a1a100;');
$this->setStyle('typeorqualifier', 'color:#a1a100;');
$this->setStyle('stdfunction', 'color:#b06cc8;');
$this->setStyle('stdmacroorobject', 'color:purple;');
$this->setStyle('multi_comment', 'color:#888;font-style:italic;');
$this->setStyle('single_comment', 'color:#888;font-style:italic;');
$this->setStyle('num/dbl', 'color:#5eafff;');
// a character constant is an int, so identical formatting makes sense
$this->setStyle('num/int', 'color:#33f;');
$this->setStyle('character_constant', 'color:#33f;');
$this->setStyle('character_constant/esc', 'color: black; font-weight:bold;');
$this->setStyle('string_literal', 'color:#cd3333;');
$this->setStyle('string_literal/esc', 'color: black; font-weight:bold;');

// preprocessor context - preprocessor-specific

// any preprocessor token that doesn't fit something more specific below is
// styled in this context i.e. it's equivalent to the root context for code
$this->setStyle('preprocessor', 'font-style:italic; color:black;');
// this currently only applies to whitespace including newlines, so it's not
// currently effective
$this->setStyle('preprocessor/start',
  'font-style:italic; font-weight:bold; color:black;');
// this styles any preprocessor directive preceded by a hash (as well as _Pragma
// where equivalent), all # symbols (even when used as a # or ## operator), and
// the "defined" preprocessor keyword within #if and #elif directives
$this->setStyle('preprocessor/directive',
  'font-style:italic; font-weight:bold; color:black;');
// this styles everything after the # for non-standard directives (including
// the directive itself) to allow marking for portability awareness
$this->setStyle('preprocessor/nonstd', 'font-style:italic; color:#444;');
// matches only any standard header name in a #include directive
$this->setStyle('preprocessor/include/stdheader',
  'font-style:italic; color:#b06cc8;');
// commented out because these are currently contextualised as
// preprocessor/symbol
// the enclosing <> symbols
//$this->setStyle('preprocessor/symbol/std_include',
//  'font-style:italic; font-weight:bold; color:black;');
// commented out because these are currently contextualised as part of a string
// literal
// the enclosing "" symbols
//$this->setStyle('preprocessor/symbol/impl_include',
//  'font-style:italic; color:#080;');

// preprocessor context - counterparts to normal code context

$this->setStyle('preprocessor/ctlflow-keyword',
  'font-style:italic; color:#080;');
$this->setStyle('preprocessor/symbol', 'font-style:italic; color:#080;');
$this->setStyle('preprocessor/member', 'font-style:italic; font-weight:bold;');
$this->setStyle('preprocessor/declarator-keyword',
  'font-style:italic; color:#a1a100;');
$this->setStyle('preprocessor/typeorqualifier',
  'font-style:italic; color:#a1a100;');
$this->setStyle('preprocessor/stdfunction',
  'font-style:italic; color:#006; font-style:italic;');
$this->setStyle('preprocessor/stdmacroorobject',
  'font-style:italic; color:purple;');
$this->setStyle('preprocessor/multi_comment', 'color:#888; font-style:italic;');
$this->setStyle('preprocessor/single_comment', 'color:#888;font-style:italic;');
$this->setStyle('preprocessor/num/dbl', 'color:#5eafff; font-style:italic;');
$this->setStyle('preprocessor/num/int', 'color:#33f; font-style:italic;');
$this->setStyle('preprocessor/character_constant',
 'color:#33f; font-style:italic;');
$this->setStyle('preprocessor/character_constant/esc',
  'color: black; font-weight:bold; font-style:italic;');
$this->setStyle('preprocessor/string_literal',
  'color:#cd3333; font-style:italic;');
$this->setStyle('preprocessor/string_literal/esc',
  'color: black; font-weight:bold; font-style:italic;');

?>
