<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * ----------------------------------
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

$this->_childContexts = array(
    new GeSHiContext('qbasic',  $DIALECT, 'string'),
    new GeSHiContext('qbasic',  $DIALECT, 'comment')
);

$this->_contextKeywords = array(
    0 => array(
        0 => array('and', 'as', 'call', 'dim', 'end', 'goto', 'if', 'integer', 'print', 'sub', 'then'),
        1 => $CONTEXT . '/kw0',
        2 => 'color: #006;',
        3 => false,
        4 => 'http://qboho.qbasicnews.com/qboho/qck{FNAME}.html'
    )
);

$this->_contextSymbols  = array(
    0 => array(
        0 => array(
            '(', ')', ',', ':', ';', '=', '<', '>'
            ),
        // name (should names have / in them like normal contexts? YES
        1 => $CONTEXT . '/sym0',
        // style
        2 => 'color:#008000;'
    )
);
$this->_contextRegexps  = array(
    0 => geshi_use_doubles($CONTEXT),
    1 => geshi_use_integers($CONTEXT)
);
// @todo [blocking 1.1.5] languages should be able to set the styles of their numbers

?>
