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

$this->_contextDelimiters = array(
    0 => array(
        0 => array('asm'),
        1 => array('end'),
        2 => false
    )
);

$this->_childContexts = array(
    new GeSHiContext('delphi', $DIALECT, 'preprocessor'),
    new GeSHiContext('delphi', $DIALECT, 'common/single_comment')
);

$this->_styler->setStyle($CONTEXT, 'color:#00f;');
$this->_styler->setStyle($CONTEXT_START, 'color:#f00;font-weight:bold;');
$this->_styler->setStyle($CONTEXT_END, 'color:#f00;font-weight:bold;');

$this->_contextKeywords = array(
    //Assembler Directives
    0 => array(
        0 => array(
            'db','dd','dw'
        ),
        1 => $CONTEXT . '/keywords',
        2 => 'color:#00f; font-weight:bold;',
        3 => false,
        4 => ''
    ),

    1 => array(
        0 => array(
            'large', 'small',
            'offset','vmtoffset','dmtindex',
            'byte', 'word', 'dword', 'qword', 'tbyte', 'ptr'
        ),
        1 => $CONTEXT . '/control',
        2 => 'color:#00f; font-weight: bold;',
        3 => false,
        4 => ''
    ),

    //CPU i386 instructions
    2 => array(
        0 => array(
/*
            // @todo order the i386 instruction set

            'aaa','aad','aam','aas','adc','add','and','call','cbw','clc','cld','cli','cmc','cmp',
            'cmps','cmpsb','cmpsw','cwd','daa','das','dec','div','esc','hlt','idiv','imul','in','inc',
            'int','into','iret','ja','jae','jb','jbe','jc','jcxz','je','jg','jge','jl','jle','jmp',
            'jna','jnae','jnb','jnbe','jnc','jne','jng','jnge','jnl','jnle','jno','jnp','jns','jnz',
            'jo','jp','jpe','jpo','js','jz','lahf','lds','lea','les','lods','lodsb','lodsw','loop',
            'loope','loopew','loopne','loopnew','loopnz','loopnzw','loopw','loopz','loopzw','mov',
            'movs','movsb','movsw','mul','neg','nop','not','or','out','pop','popf','push','pushf',
            'rcl','rcr','ret','retf','retn','rol','ror','sahf','sal','sar','sbb','scas','scasb','scasw',
            'shl','shr','stc','std','sti','stos','stosb','stosw','sub','test','wait','xchg','xlat',
            'xlatb','xor','bound','enter','ins','insb','insw','leave','outs','outsb','outsw','popa','pusha','pushw',
            'arpl','lar','lsl','sgdt','sidt','sldt','smsw','str','verr','verw','clts','lgdt','lidt','lldt','lmsw','ltr',
            'bsf','bsr','bt','btc','btr','bts','cdq','cmpsd','cwde','insd','iretd','iretdf','iretf',
            'jecxz','lfs','lgs','lodsd','loopd','looped','loopned','loopnzd','loopzd','lss','movsd',
            'movsx','movzx','outsd','popad','popfd','pushad','pushd','pushfd','scasd','seta','setae',
            'setb','setbe','setc','sete','setg','setge','setl','setle','setna','setnae','setnb','setnbe',
            'setnc','setne','setng','setnge','setnl','setnle','setno','setnp','setns','setnz','seto','setp',
            'setpe','setpo','sets','setz','shld','shrd','stosd','bswap','cmpxchg','invd','invlpg',
            'wbinvd','xadd','lock','rep','repe','repne','repnz','repz'
*/
            'AAA','AAD','AAM','AAS','ADC','ADD','AND','ARPL','BOUND','BSF','BSR','BSWAP','BT','BTC','BTR',
            'BTS','CALL','CBW','CDQ','CLC','CLD','CLI','CLTS','CMC','CMP','CMPSB','CMPSD','CMPSW',
            'CMPXCHG','CMPXCHG486','CMPXCHG8B','CPUID','CWD','CWDE',
            'cmova','cmovae','cmovb','cmovbe','cmovc','cmovcxz','cmove','cmovg','cmovge','cmovl','cmovle',
            'cmovna','cmovnae','cmovnb','cmovnbe','cmovnc','cmovne','cmovng','cmovnge','cmovnl','cmovnle',
            'cmovno','cmovnp','cmovns','cmovnz','cmovo','cmovp','cmovpe','cmovpo','cmovs','cmovz',
            'DAA','DAS','DEC','DIV','EMMS','ENTER','HLT','IBTS','ICEBP','IDIV','IMUL','IN','INC','INSB',
            'INSD','INSW','INT','INT01','INT1','INT03','INT3','INTO','INVD','INVLPG','IRET','IRETD','IRETW',
            'JCXZ','JECXZ','JMP','ja','jae','jb','jbe','jc','jcxz','je','jg','jge','jl','jle','jna','jnae',
            'jnb','jnbe','jnc','jne','jng','jnge','jnl','jnle','jno','jnp','jns','jnz','jo','jp','jpe',
            'jpo','js','jz','LAHF','LAR','LCALL','LDS','LEA','LEAVE','LES','LFS','LGDT','LGS','LIDT',
            'LJMP','LLDT','LMSW','LOADALL','LOADALL286','LOCK','LODSB','LODSD','LODSW','LOOP','LOOPE',
            'LOOPNE','LOOPNZ','LOOPZ','LSL','LSS','LTR','MOV','MOVD','MOVQ','MOVSB','MOVSD','MOVSW','MOVSX',
            'MOVZX','MUL','NEG','NOP','NOT','OR','OUT','OUTSB','OUTSD','OUTSW','POP','POPA','POPAD','POPAW',
            'POPF','POPFD','POPFW','PUSH','PUSHA','PUSHAD','PUSHAW','PUSHF','PUSHFD','PUSHFW','RCL','RCR',
            'RDSHR','RDMSR','RDPMC','RDTSC','REP','REPE','REPNE','REPNZ','REPZ','RET','RETF','RETN','ROL',
            'ROR','RSDC','RSLDT','RSM','SAHF','SAL','SALC','SAR','SBB','SCASB','SCASD','SCASW','SGDT',
            'seta','setae','setb','setbe','setc','setcxz','sete','setg','setge','setl','setle','setna',
            'setnae','setnb','setnbe','setnc','setne','setng','setnge','setnl','setnle','setno','setnp',
            'setns','setnz','seto','setp','setpe','setpo','sets','setz',
            'SHL','SHLD','SHR','SHRD','SIDT','SLDT','SMI','SMINT','SMINTOLD','SMSW','STC','STD','STI','STOSB',
            'STOSD','STOSW','STR','SUB','SVDC','SVLDT','SVTS','SYSCALL','SYSENTER','SYSEXIT','SYSRET','TEST',
            'UD1','UD2','UMOV','VERR','VERW','WAIT','WBINVD','WRSHR','WRMSR','XADD','XBTS','XCHG','XLAT',
            'XLATB','XOR'
        ),
        1 => $CONTEXT . '/instr_i386',
        2 => 'color:#00f; font-weight:bold;',
        3 => false,
        4 => ''
    ),

    //FPU i387 instructions
    3 => array(
        0 => array(
        /*
             // @todo order the i387 instruction set
            'f2xm1','fabs','fadd','faddp','fbld','fbstp','fchs','fclex','fcom','fcomp','fcompp','fdecstp',
            'fdisi','fdiv','fdivp','fdivr','fdivrp','feni','ffree','fiadd','ficom','ficomp','fidiv',
            'fidivr','fild','fimul','fincstp','finit','fist','fistp','fisub','fisubr','fld','fld1',
            'fldcw','fldenv','fldenvw','fldl2e','fldl2t','fldlg2','fldln2','fldpi','fldz','fmul',
            'fmulp','fnclex','fndisi','fneni','fninit','fnop','fnsave','fnsavew','fnstcw','fnstenv',
            'fnstenvw','fnstsw','fpatan','fprem','fptan','frndint','frstor','frstorw','fsave',
            'fsavew','fscale','fsqrt','fst','fstcw','fstenv','fstenvw','fstp','fstsw','fsub','fsubp',
            'fsubr','fsubrp','ftst','fwait','fxam','fxch','fxtract','fyl2x','fyl2xp1',
            'fsetpm','fcos','fldenvd','fnsaved','fnstenvd','fprem1','frstord','fsaved','fsin','fsincos',
            'fstenvd','fucom','fucomp','fucompp'
        */
            'F2XM1','FABS','FADD','FADDP','FBLD','FBSTP','FCHS','FCLEX','FCMOVB','FCMOVBE','FCMOVE','FCMOVNB',
            'FCMOVNBE','FCMOVNE','FCMOVNU','FCMOVU','FCOM','FCOMI','FCOMIP','FCOMP','FCOMPP','FCOS','FDECSTP',
            'FDISI','FDIV','FDIVP','FDIVR','FDIVRP','FEMMS','FENI','FFREE','FIADD','FICOM','FICOMP','FIDIV',
            'FIDIVR','FILD','FIMUL','FINCSTP','FINIT','FIST','FISTP','FISUB','FISUBR','FLD','FLD1','FLDCW',
            'FLDENV','FLDL2E','FLDL2T','FLDLG2','FLDLN2','FLDPI','FLDZ','FMUL','FMULP','FNCLEX','FNDISI',
            'FNENI','FNINIT','FNOP','FNSAVE','FNSTCW','FNSTENV','FNSTSW','FPATAN','FPREM','FPREM1','FPTAN',
            'FRNDINT','FRSTOR','FSAVE','FSCALE','FSETPM','FSIN','FSINCOS','FSQRT','FST','FSTCW','FSTENV',
            'FSTP','FSTSW','FSUB','FSUBP','FSUBR','FSUBRP','FTST','FUCOM','FUCOMI','FUCOMIP','FUCOMP',
            'FUCOMPP','FWAIT','FXAM','FXCH','FXTRACT','FYL2X','FYL2XP1'
        ),
        1 => $CONTEXT . '/instr_i387',
        2 => 'color:#00f; font-weight:bold;',
        3 => false,
        4 => ''
    ),

    //MMX instruction set
    4 => array(
        0 => array(
            // @todo order the mmx instruction set

            'FFREEP','FXRSTOR','FXSAVE','PREFETCHNTA','PREFETCHT0','PREFETCHT1','PREFETCHT2','SFENCE',
            'MASKMOVQ','MOVNTQ','PAVGB','PAVGW','PEXTRW','PINSRW','PMAXSW','PMAXUB','PMINSW','PMINUB',
            'PMOVMSKB','PMULHUW','PSADBW','PSHUFW',

            'PACKSSDW','PACKSSWB','PACKUSWB','PADDB','PADDD','PADDSB','PADDSIW','PADDSW','PADDUSB','PADDUSW',
            'PADDW','PAND','PANDN','PAVEB','PCMPEQB','PCMPEQD','PCMPEQW','PCMPGTB','PCMPGTD',
            'PCMPGTW','PDISTIB','PFCMPEQ','PFCMPGE','PFCMPGT','PMACHRIW','PMADDWD',
            'PMAGW','PMVGEZB','PMVLZB','PMVNZB','PMVZB',
            'POR','PSLLD','PSLLQ','PSLLW','PSRAD','PSRAW','PSRLD','PSRLQ','PSRLW',
            'PSUBB','PSUBD','PSUBSB','PSUBSIW','PSUBSW','PSUBUSB','PSUBUSW','PSUBW','PUNPCKHBW','PUNPCKHDQ',
            'PUNPCKHWD','PUNPCKLBW','PUNPCKLDQ','PUNPCKLWD','PXOR'
        ),
        1 => $CONTEXT . '/instr/mmx',
        2 => 'color:#00f; font-weight:bold;',
        3 => false,
        4 => ''
    ),

    //SSE instruction set
    5 => array(
        0 => array(
            // @todo order the SSE instruction set
            'ADDPS','ADDSS','ANDNPS','ANDPS','CMPEQPS','CMPEQSS','CMPLEPS','CMPLESS','CMPLTPS','CMPLTSS',
            'CMPNEQPS','CMPNEQSS','CMPNLEPS','CMPNLESS','CMPNLTPS','CMPNLTSS','CMPORDPS','CMPORDSS',
            'CMPUNORDPS','CMPUNORDSS','CMPPS','CMPSS','COMISS','CVTPI2PS','CVTPS2PI','CVTSI2SS','CVTSS2SI',
            'CVTTPS2PI','CVTTSS2SI','DIVPS','DIVSS','LDMXCSR','MAXPS','MAXSS','MINPS','MINSS','MOVAPS',
            'MOVHPS','MOVLHPS','MOVLPS','MOVHLPS','MOVMSKPS','MOVNTPS','MOVSS','MOVUPS','MULPS','MULSS',
            'ORPS','RCPPS','RCPSS','RSQRTPS','RSQRTSS','SHUFPS','SQRTPS','SQRTSS','STMXCSR','SUBPS',
            'SUBSS','UCOMISS','UNPCKHPS','UNPCKLPS','XORPS'
        ),
        1 => $CONTEXT . '/instr/sse',
        2 => 'color:#00f; font-weight:bold;',
        3 => false,
        4 => ''
    ),

    //3DNow instruction set
    6 => array(
        0 => array(
            // @todo order the 3Dnow! instruction set
            'PAVGUSB','PF2ID','PFACC','PFADD','PFMUL','PFRCP','PFRCPIT1','PFRCPIT2','PFRSQIT1','PFRSQRT',
            'PFSUB','PFSUBR','PFMAX','PFMIN','PI2FD','PMULHRIW','PMULHRWA','PMULHRWC','PMULHW','PMULLW',
            'PREFETCH','PREFETCHW'
        ),
        1 => $CONTEXT . '/instr/3Dnow',
        2 => 'color:#00f; font-weight:bold;',
        3 => false,
        4 => ''
    ),

    //3DNowExt instruction set
    7 => array(
        0 => array(
            // @todo order the 3Dnow! Ext instruction set
            'PFNACC','PFPNACC','PI2FW','PF2IW','PSWAPD'
        ),
        1 => $CONTEXT . '/instr/3Dnow2',
        2 => 'color:#00f; font-weight:bold;',
        3 => false,
        4 => ''
    )
);

$this->_contextSymbols  = array(
    0 => array(
        0 => array(
            ',', ';', '[', ']', '.'
            ),
        1 => $CONTEXT . '/sym',
        2 => 'color:#008000;'
        )
);

$this->_contextRegexps  = array(
    0 => array(
        0 => array('#([a-zA-Z]+:)#'),
        1 => ':',
        2 => array(
            1 => array($CONTEXT . '/label', 'color:#933;', false)
        )
    ),
    1 => array(
        0 => array(
            '/(\$[0-9a-fA-F_]+)/'
        ),
        1 => '$',
        2 => array(
            1 => array($CONTEXT . '/hex', 'color: #2bf;', false)
        )
    ),
    2 => geshi_use_integers($CONTEXT)
);

$this->_objectSplitters = array(
    0 => array(
        0 => array('.'),
        1 => $CONTEXT . '/oodynamic',
        2 => 'color:#559;',
        3 => false // If true, check that matched method isn't a keyword first
    )
);

?>
