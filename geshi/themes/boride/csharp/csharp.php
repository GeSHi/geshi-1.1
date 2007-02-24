<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * <pre>
 *   File:   geshi/themes/default/csharp/csharp.php
 *   Author: Knut A. Wikström
 *   E-mail: knut@wikstrom.dk
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
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2006 Knut A. Wikström
 * @version    $Id$
 *
 */

// Comments...
$this->setStyle('single_comment',        'color:#008000;font-style:italic;'    );
$this->setStyle('multi_comment',         'color:#008000;font-style:italic;'    );
$this->setStyle('doc_comment/start',     'color:#008000;font-style:italic;'    );
$this->setStyle('doc_comment/end',       'color:#008000;font-style:italic;'    );
// Doc comments contain XML
//$this->setStyle('xml/xml',               '#808080; font-style: bold'           );
$this->setStyle('doc_comment',           'color:#008000;font-style:italic;'    );

// Types
$this->setStyle('type',                  'color:#000000;'                      );

// Modifiers
$this->setStyle('modifier',              'color:#000080;font-weight:bold;'     );

// General keywords
$this->setStyle('keyword',               'color:#000080;font-weight:bold;'     );

// Strings...
$this->setStyle('single_string',         'color:#0000FF;'                      );
$this->setStyle('double_string',         'color:#0000FF;'                      );

// Using directives...
$this->setStyle('using/start',           'color:#000080;font-weight:bold;'     );
$this->setStyle('using',                 ''                                    );
$this->setStyle('using/end',             ''                                    );
?>