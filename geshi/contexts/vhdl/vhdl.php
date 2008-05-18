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
 * The comments above are nigel's crap, this is the real thing
 * @package   lang
 * @author    Lingzi Xue <bluewonder@paradise.net.nz>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005 Lingzi Xue
 * @version   $Id$
 * 
 */

/** Get the GeSHiStringContext class */
require_once GESHI_CLASSES_ROOT . 'class.geshistringcontext.php';
/** Get the GeSHiSingleCharContext class */
require_once GESHI_CLASSES_ROOT . 'class.geshisinglecharcontext.php';

$this->_childContexts = array(
    new GeSHiSingleCharContext('vhdl',  $DIALECT, 'single_string'),
    new GeSHiStringContext('vhdl', $DIALECT, 'double_string'),
    new GeshiContext('vhdl', $DIALECT,'comment'),
);

$this->_contextKeywords = array(
    // Basic keywords
    array(
        array(
            'abs','access','after','alias','all','and','architecture','array','assert','attribute',
            'begin','block','body','buffer','bus','case','component','configuration','constant',
            'disconnent','downto','else','elsif','end','end block','end case','end component',
            'end for','end generate','end if','end loop','end process','end record','end units',
            'entity','exit','file','for','function','generate','generic','generic map','group',
            'guarded','if','impure','in','inertial','inout','is','label','library','linkage',
            'literal','loop','map','mod','nand','new','next','nor','null','of','on','open','or',
            'others','out','package','package body','port','port map','postponed','procedure',
            'process','pure','range','record','register','reject','rem','report','return','rol',
            'ror','select','severity','signal','sla','sll','sra','srl','subtype','then','to',
            'transport','type','unaffected','units','until','use','variable','wait','when','while',
            'with','xnor','xor'
        ),
        $CONTEXT . '/keyword',
        false,
        ''
    )
);

$this->_contextCharactersDisallowedBeforeKeywords = array("'");
$this->_contextCharactersDisallowedAfterKeywords  = array("'");

$this->_contextSymbols  = array(
    array(
        array(
            '(', ')', ',', ';', ':', '[', ']',
            '+', '-', '*', '/', '&', '|', '!', '<', '>',
            '{', '}', '=', '@', '.'
        ),
        $CONTEXT . '/symbol'
    )
);

$this->_contextRegexps  = array(
    geshi_use_doubles($CONTEXT),
    geshi_use_integers($CONTEXT)
);

?>
