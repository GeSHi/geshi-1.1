<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * <pre>
 *   File:   geshi/themes/boride/d8/csharp/csharp.php
 *   Author: Knut A. Wikström
 *   E-mail: knut@wikstrom.dk
 *   Author: Benny Baumann
 *   E-mail: BenBE@omorphia.de
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
 * @author     Knut A. Wikström <knut@wikstrom.dk>
 * @author     Benny Baumann <BenBE@omorphia.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2006-2007 Knut A. Wikström, Benny Baumann
 * @version    $Id$
 *
 */

// Comments...
$this->setStyle('single_comment',        '#008000; font-style: italic;'        );
$this->setStyle('multi_comment',         '#008000; font-style: italic;'        );
$this->setStyle('doc_comment/start',     '#808080; font-style: italic;'        );
// Doc comments contain XML
//$this->setStyle('xml/xml',               '#808080; font-style: bold'           );
$this->setStyle('doc_comment',           '#008000; font-style: italic;'        );

// Types
$this->setStyle('type',                  '#2b91af',                            );

// Modifiers
$this->setStyle('modifier',              '',                                   );

// General keywords
$this->setStyle('keyword',               '#0000ff',                            );

// Strings...
$this->setStyle('single_string',         '#a31515',                            );
$this->setStyle('double_string',         '#a31515',                            );

// Using directives...
$this->setStyle('using/start',           '',                                   );
$this->setStyle('using',                 '',                                   );
$this->setStyle('using/end',             '',                                   );
?>