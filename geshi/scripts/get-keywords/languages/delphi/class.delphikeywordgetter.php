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
 * @package   scripts
 * @author    Nigel McNie <nigel@geshi.org>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005 Nigel McNie
 * @version   $Id$
 * 
 */

/**
 * Implementation of KeywordGetterStrategy for the Delphi language.
 * 
 * @package scripts
 * @author  Nigel McNie <nigel@geshi.org>
 * @since   0.1.2
 * @version $Revision$
 * @see     KeywordGetterStrategy
 */
class delphiKeywordGetterStrategy extends KeywordGetterStrategy
{
    /**
     * Creates a new delphi Keyword Getter Strategy. Defines allowed
     * keyword groups for delphi.
     */
    function delphiKeywordGetterStrategy ()
    {
        $this->_language = 'Delphi';
        $this->_validKeywordGroups = array(
            'keywords', 'keytypes', 'keyidents', 'stdprocs/system', 'stdprocs/sysutils',
            'stdprocs/classes', 'stdprocs/math', 'asm/keywords', 'asm/control',
            'asm/instr_i386', 'asm/instr_i387', 'asm/instr/mmx', 'asm/instr/sse',
            'asm/instr/3Dnow', 'asm/instr/3Dnow2'
        );
        $this->_missedKeywords = array(
            'keywords' => array(
                'Abstract', 'And', 'Array', 'As', 'Asm', 'At', 'Begin', 'Case', 'Class',
                'Const', 'Constructor', 'Contains', 'Destructor', 'DispInterface', 'Div',
                'Do', 'DownTo', 'Else', 'End', 'Except', 'File', 'Finalization',
                'Finally', 'For', 'Function', 'Goto', 'If', 'Implementation', 'In',
                'Inherited', 'Initialization', 'Inline', 'Interface', 'Is', 'Label',
                'Mod', 'Not', 'Object', 'Of', 'On', 'Or', 'Overload', 'Override',
                'Package', 'Packed', 'Private', 'Procedure', 'Program', 'Property',
                'Protected', 'Public', 'Published', 'Raise', 'Record', 'Repeat',
                'Requires', 'Resourcestring', 'Set', 'Shl', 'Shr', 'Then', 'ThreadVar',
                'To', 'Try', 'Type', 'Unit', 'Until', 'Uses', 'Var', 'Virtual', 'While',
                'With', 'Xor', 'assembler', 'cdecl', 'far', 'near', 'pascal', 'register',
                'safecall', 'stdcall', 'varargs'
            ),
            'keytypes' => array(
                'AnsiChar', 'AnsiString', 'Bool', 'Boolean', 'Byte', 'ByteBool', 'Cardinal', 'Char',
                'Comp', 'Currency', 'DWORD', 'Double', 'Extended', 'Int64', 'Integer', 'IUnknown',
                'LongBool', 'LongInt', 'LongWord', 'PAnsiChar', 'PAnsiString', 'PBool', 'PBoolean', 'PByte',
                'PByteArray', 'PCardinal', 'PChar', 'PComp', 'PCurrency', 'PDWORD', 'PDate', 'PDateTime',
                'PDouble', 'PExtended', 'PInt64', 'PInteger', 'PLongInt', 'PLongWord', 'Pointer', 'PPointer',
                'PShortInt', 'PShortString', 'PSingle', 'PSmallInt', 'PString', 'PHandle', 'PVariant', 'PWord',
                'PWordArray', 'PWordBool', 'PWideChar', 'PWideString', 'Real', 'Real48', 'ShortInt', 'ShortString',
                'Single', 'SmallInt', 'String', 'TClass', 'TDate', 'TDateTime', 'TextFile', 'THandle',
                'TObject', 'TTime', 'Variant', 'WideChar', 'WideString', 'Word', 'WordBool'
            ),
            'keyidents' => array(
                'false', 'nil', 'true'
            ),
            'stdprocs/system' => array(
                'Abs', 'AcquireExceptionObject', 'Addr', 'AnsiToUtf8', 'Append', 'ArcTan',
                'Assert', 'AssignFile', 'Assigned', 'BeginThread', 'BlockRead',
                'BlockWrite', 'Break', 'ChDir', 'Chr', 'Close', 'CloseFile',
                'CompToCurrency', 'CompToDouble', 'Concat', 'Continue', 'Copy', 'Cos',
                'Dec', 'Delete', 'Dispose', 'DoubleToComp', 'EndThread', 'EnumModules',
                'EnumResourceModules', 'Eof', 'Eoln', 'Erase', 'ExceptAddr',
                'ExceptObject', 'Exclude', 'Exit', 'Exp', 'FilePos', 'FileSize',
                'FillChar', 'Finalize', 'FindClassHInstance', 'FindHInstance',
                'FindResourceHInstance', 'Flush', 'Frac', 'FreeMem', 'Get8087CW',
                'GetDir', 'GetLastError', 'GetMem', 'GetMemoryManager',
                'GetModuleFileName', 'GetVariantManager', 'Halt', 'Hi', 'High',
                'IOResult', 'Inc', 'Include', 'Initialize', 'Insert', 'Int',
                'IsMemoryManagerSet', 'IsVariantManagerSet', 'Length', 'Ln', 'Lo', 'Low',
                'MkDir', 'Move', 'New', 'Odd', 'OleStrToStrVar', 'OleStrToString', 'Ord',
                'PUCS4Chars', 'ParamCount', 'ParamStr', 'Pi', 'Pos', 'Pred', 'Ptr',
                'Random', 'Randomize', 'Read', 'ReadLn', 'ReallocMem',
                'ReleaseExceptionObject', 'Rename', 'Reset', 'Rewrite', 'RmDir', 'Round',
                'RunError', 'Seek', 'SeekEof', 'SeekEoln', 'Set8087CW', 'SetLength',
                'SetLineBreakStyle', 'SetMemoryManager', 'SetString', 'SetTextBuf',
                'SetVariantManager', 'Sin', 'SizeOf', 'Slice', 'Sqr', 'Sqrt', 'Str',
                'StringOfChar', 'StringToOleStr', 'StringToWideChar', 'Succ', 'Swap',
                'Trunc', 'Truncate', 'TypeInfo', 'UCS4StringToWideString', 'UTF8Decode',
                'UTF8Encode', 'UnicodeToUtf8', 'UniqueString', 'UpCase', 'Utf8ToAnsi',
                'Utf8ToUnicode', 'Val', 'VarArrayRedim', 'VarClear',
                'WideCharLenToStrVar', 'WideCharLenToString', 'WideCharToStrVar',
                'WideCharToString', 'WideStringToUCS4String', 'Write', 'WriteLn'
            ),
            'stdprocs/sysutils' => array(
                'Abort', 'AddExitProc', 'AddTerminateProc', 'AdjustLineBreaks', 'AllocMem',
                'AnsiCompareFileName', 'AnsiCompareStr', 'AnsiCompareText',
                'AnsiDequotedStr', 'AnsiExtractQuotedStr', 'AnsiLastChar',
                'AnsiLowerCase', 'AnsiLowerCaseFileName', 'AnsiPos', 'AnsiQuotedStr',
                'AnsiSameStr', 'AnsiSameText', 'AnsiStrComp', 'AnsiStrIComp',
                'AnsiStrLComp', 'AnsiStrLIComp', 'AnsiStrLastChar', 'AnsiStrLower',
                'AnsiStrPos', 'AnsiStrRScan', 'AnsiStrScan', 'AnsiStrUpper',
                'AnsiUpperCase', 'AnsiUpperCaseFileName', 'AppendStr', 'AssignStr',
                'Beep', 'BoolToStr', 'ByteToCharIndex', 'ByteToCharLen', 'ByteType',
                'CallTerminateProcs', 'ChangeFileExt', 'CharLength', 'CharToByteIndex',
                'CharToByteLen', 'CompareMem', 'CompareStr', 'CompareText', 'CreateDir',
                'CreateGUID', 'CurrToStr', 'CurrToStrF', 'CurrentYear', 'Date',
                'DateTimeToFileDate', 'DateTimeToStr', 'DateTimeToString',
                'DateTimeToSystemTime', 'DateTimeToTimeStamp', 'DateToStr', 'DayOfWeek',
                'DecodeDate', 'DecodeDateFully', 'DecodeTime', 'DeleteFile',
                'DirectoryExists', 'DiskFree', 'DiskSize', 'DisposeStr', 'EncodeDate',
                'EncodeTime', 'ExceptionErrorMessage', 'ExcludeTrailingBackslash',
                'ExcludeTrailingPathDelimiter', 'ExpandFileName', 'ExpandFileNameCase',
                'ExpandUNCFileName', 'ExtractFileDir', 'ExtractFileDrive',
                'ExtractFileExt', 'ExtractFileName', 'ExtractFilePath',
                'ExtractRelativePath', 'ExtractShortPathName', 'FileAge', 'FileClose',
                'FileCreate', 'FileDateToDateTime', 'FileExists', 'FileGetAttr',
                'FileGetDate', 'FileIsReadOnly', 'FileOpen', 'FileRead', 'FileSearch',
                'FileSeek', 'FileSetAttr', 'FileSetDate', 'FileSetReadOnly', 'FileWrite',
                'FinalizePackage', 'FindClose', 'FindCmdLineSwitch', 'FindFirst',
                'FindNext', 'FloatToCurr', 'FloatToDateTime', 'FloatToDecimal',
                'FloatToStr', 'FloatToStrF', 'FloatToText', 'FloatToTextFmt',
                'FmtLoadStr', 'FmtStr', 'ForceDirectories', 'Format', 'FormatBuf',
                'FormatCurr', 'FormatDateTime', 'FormatFloat', 'FreeAndNil',
                'GUIDToString', 'GetCurrentDir', 'GetEnvironmentVariable',
                'GetFileVersion', 'GetFormatSettings', 'GetLocaleFormatSettings',
                'GetModuleName', 'GetPackageDescription', 'GetPackageInfo', 'GetTime',
                'IncAMonth', 'IncMonth', 'IncludeTrailingBackslash',
                'IncludeTrailingPathDelimiter', 'InitializePackage', 'IntToHex',
                'IntToStr', 'InterlockedDecrement', 'InterlockedExchange',
                'InterlockedExchangeAdd', 'InterlockedIncrement', 'IsDelimiter',
                'IsEqualGUID', 'IsLeapYear', 'IsPathDelimiter', 'IsValidIdent',
                'Languages', 'LastDelimiter', 'LoadPackage', 'LoadStr', 'LowerCase',
                'MSecsToTimeStamp', 'NewStr', 'NextCharIndex', 'Now', 'OutOfMemoryError',
                'QuotedStr', 'RaiseLastOSError', 'RaiseLastWin32Error', 'RemoveDir',
                'RenameFile', 'ReplaceDate', 'ReplaceTime', 'SafeLoadLibrary',
                'SameFileName', 'SameText', 'SetCurrentDir', 'ShowException', 'Sleep',
                'StrAlloc', 'StrBufSize', 'StrByteType', 'StrCat', 'StrCharLength',
                'StrComp', 'StrCopy', 'StrDispose', 'StrECopy', 'StrEnd', 'StrFmt',
                'StrIComp', 'StrLCat', 'StrLComp', 'StrLCopy', 'StrLFmt', 'StrLIComp',
                'StrLen', 'StrLower', 'StrMove', 'StrNew', 'StrNextChar', 'StrPCopy',
                'StrPLCopy', 'StrPas', 'StrPos', 'StrRScan', 'StrScan', 'StrToBool',
                'StrToBoolDef', 'StrToCurr', 'StrToCurrDef', 'StrToDate', 'StrToDateDef',
                'StrToDateTime', 'StrToDateTimeDef', 'StrToFloat', 'StrToFloatDef',
                'StrToInt', 'StrToInt64', 'StrToInt64Def', 'StrToIntDef', 'StrToTime',
                'StrToTimeDef', 'StrUpper', 'StringReplace', 'StringToGUID', 'Supports',
                'SysErrorMessage', 'SystemTimeToDateTime', 'TextToFloat', 'Time',
                'TimeStampToDateTime', 'TimeStampToMSecs', 'TimeToStr', 'Trim',
                'TrimLeft', 'TrimRight', 'TryEncodeDate', 'TryEncodeTime',
                'TryFloatToCurr', 'TryFloatToDateTime', 'TryStrToBool', 'TryStrToCurr',
                'TryStrToDate', 'TryStrToDateTime', 'TryStrToFloat', 'TryStrToInt',
                'TryStrToInt64', 'TryStrToTime', 'UnloadPackage', 'UpperCase',
                'WideCompareStr', 'WideCompareText', 'WideFmtStr', 'WideFormat',
                'WideFormatBuf', 'WideLowerCase', 'WideSameStr', 'WideSameText',
                'WideUpperCase', 'Win32Check', 'WrapText'
            ),
            'stdprocs/classes' => array(
                'ActivateClassGroup', 'AllocateHwnd', 'BinToHex', 'CheckSynchronize',
                'CollectionsEqual', 'CountGenerations', 'DeallocateHwnd', 'EqualRect',
                'ExtractStrings', 'FindClass', 'FindGlobalComponent', 'GetClass',
                'GroupDescendantsWith', 'HexToBin', 'IdentToInt',
                'InitInheritedComponent', 'IntToIdent', 'InvalidPoint',
                'IsUniqueGlobalComponentName', 'LineStart', 'ObjectBinaryToText',
                'ObjectResourceToText', 'ObjectTextToBinary', 'ObjectTextToResource',
                'PointsEqual', 'ReadComponentRes', 'ReadComponentResEx',
                'ReadComponentResFile', 'Rect', 'RegisterClass', 'RegisterClassAlias',
                'RegisterClasses', 'RegisterComponents', 'RegisterIntegerConsts',
                'RegisterNoIcon', 'RegisterNonActiveX', 'SmallPoint', 'StartClassGroup',
                'TestStreamFormat', 'UnregisterClass', 'UnregisterClasses',
                'UnregisterIntegerConsts', 'UnregisterModuleClasses',
                'WriteComponentResFile'
            ),
            'stdprocs/math' => array(
                'ArcCos', 'ArcCosh', 'ArcCot', 'ArcCotH', 'ArcCsc', 'ArcCscH', 'ArcSec',
                'ArcSecH', 'ArcSin', 'ArcSinh', 'ArcTan2', 'ArcTanh', 'Ceil',
                'CompareValue', 'Cosecant', 'Cosh', 'Cot', 'CotH', 'Cotan', 'Csc', 'CscH',
                'CycleToDeg', 'CycleToGrad', 'CycleToRad', 'DegToCycle', 'DegToGrad',
                'DegToRad', 'DivMod', 'DoubleDecliningBalance', 'EnsureRange', 'Floor',
                'Frexp', 'FutureValue', 'GetExceptionMask', 'GetPrecisionMode',
                'GetRoundMode', 'GradToCycle', 'GradToDeg', 'GradToRad', 'Hypot',
                'InRange', 'IntPower', 'InterestPayment', 'InterestRate',
                'InternalRateOfReturn', 'IsInfinite', 'IsNan', 'IsZero', 'Ldexp', 'LnXP1',
                'Log10', 'Log2', 'LogN', 'Max', 'MaxIntValue', 'MaxValue', 'Mean',
                'MeanAndStdDev', 'Min', 'MinIntValue', 'MinValue', 'MomentSkewKurtosis',
                'NetPresentValue', 'Norm', 'NumberOfPeriods', 'Payment', 'PeriodPayment',
                'Poly', 'PopnStdDev', 'PopnVariance', 'Power', 'PresentValue',
                'RadToCycle', 'RadToDeg', 'RadToGrad', 'RandG', 'RandomRange', 'RoundTo',
                'SLNDepreciation', 'SYDDepreciation', 'SameValue', 'Sec', 'SecH',
                'Secant', 'SetExceptionMask', 'SetPrecisionMode', 'SetRoundMode', 'Sign',
                'SimpleRoundTo', 'SinCos', 'Sinh', 'StdDev', 'Sum', 'SumInt',
                'SumOfSquares', 'SumsAndSquares', 'Tan', 'Tanh', 'TotalVariance',
                'Variance'
            ),
            'asm/keywords' => array(
                'db', 'dd', 'dw'
            ),
            'asm/control' => array(
                'byte', 'dmtindex', 'dword', 'large', 'offset', 'ptr', 'qword', 'small',
                'tbyte', 'vmtoffset', 'word'
            ),
            'asm/instr_i386' => array(
                'AAA', 'AAD', 'AAM', 'AAS', 'ADC', 'ADD', 'AND', 'ARPL', 'BOUND', 'BSF',
                'BSR', 'BSWAP', 'BT', 'BTC', 'BTR', 'BTS', 'CALL', 'CBW', 'CDQ', 'CLC',
                'CLD', 'CLI', 'CLTS', 'CMC', 'cmova', 'cmovae', 'cmovb', 'cmovbe',
                'cmovc', 'cmovcxz', 'cmove', 'cmovg', 'cmovge', 'cmovl', 'cmovle',
                'cmovna', 'cmovnae', 'cmovnb', 'cmovnbe', 'cmovnc', 'cmovne', 'cmovng',
                'cmovnge', 'cmovnl', 'cmovnle', 'cmovno', 'cmovnp', 'cmovns', 'cmovnz',
                'cmovo', 'cmovp', 'cmovpe', 'cmovpo', 'cmovs', 'cmovz', 'CMP', 'CMPSB',
                'CMPSD', 'CMPSW', 'CMPXCHG', 'CMPXCHG8B', 'CMPXCHG486', 'CPUID', 'CWD',
                'CWDE', 'DAA', 'DAS', 'DEC', 'DIV', 'EMMS', 'ENTER', 'HLT', 'IBTS',
                'ICEBP', 'IDIV', 'IMUL', 'IN', 'INC', 'INSB', 'INSD', 'INSW', 'INT',
                'INT01', 'INT03', 'INT1', 'INT3', 'INTO', 'INVD', 'INVLPG', 'IRET',
                'IRETD', 'IRETW', 'ja', 'jae', 'jb', 'jbe', 'jc', 'jcxz', 'JCXZ', 'je',
                'JECXZ', 'jg', 'jge', 'jl', 'jle', 'JMP', 'jna', 'jnae', 'jnb', 'jnbe',
                'jnc', 'jne', 'jng', 'jnge', 'jnl', 'jnle', 'jno', 'jnp', 'jns', 'jnz',
                'jo', 'jp', 'jpe', 'jpo', 'js', 'jz', 'LAHF', 'LAR', 'LCALL', 'LDS',
                'LEA', 'LEAVE', 'LES', 'LFS', 'LGDT', 'LGS', 'LIDT', 'LJMP', 'LLDT',
                'LMSW', 'LOADALL', 'LOADALL286', 'LOCK', 'LODSB', 'LODSD', 'LODSW',
                'LOOP', 'LOOPE', 'LOOPNE', 'LOOPNZ', 'LOOPZ', 'LSL', 'LSS', 'LTR', 'MOV',
                'MOVD', 'MOVQ', 'MOVSB', 'MOVSD', 'MOVSW', 'MOVSX', 'MOVZX', 'MUL', 'NEG',
                'NOP', 'NOT', 'OR', 'OUT', 'OUTSB', 'OUTSD', 'OUTSW', 'POP', 'POPA',
                'POPAD', 'POPAW', 'POPF', 'POPFD', 'POPFW', 'PUSH', 'PUSHA', 'PUSHAD',
                'PUSHAW', 'PUSHF', 'PUSHFD', 'PUSHFW', 'RCL', 'RCR', 'RDMSR', 'RDPMC',
                'RDSHR', 'RDTSC', 'REP', 'REPE', 'REPNE', 'REPNZ', 'REPZ', 'RET', 'RETF',
                'RETN', 'ROL', 'ROR', 'RSDC', 'RSLDT', 'RSM', 'SAHF', 'SAL', 'SALC',
                'SAR', 'SBB', 'SCASB', 'SCASD', 'SCASW', 'seta', 'setae', 'setb', 'setbe',
                'setc', 'setcxz', 'sete', 'setg', 'setge', 'setl', 'setle', 'setna',
                'setnae', 'setnb', 'setnbe', 'setnc', 'setne', 'setng', 'setnge', 'setnl',
                'setnle', 'setno', 'setnp', 'setns', 'setnz', 'seto', 'setp', 'setpe',
                'setpo', 'sets', 'setz', 'SGDT', 'SHL', 'SHLD', 'SHR', 'SHRD', 'SIDT',
                'SLDT', 'SMI', 'SMINT', 'SMINTOLD', 'SMSW', 'STC', 'STD', 'STI', 'STOSB',
                'STOSD', 'STOSW', 'STR', 'SUB', 'SVDC', 'SVLDT', 'SVTS', 'SYSCALL',
                'SYSENTER', 'SYSEXIT', 'SYSRET', 'TEST', 'UD1', 'UD2', 'UMOV', 'VERR',
                'VERW', 'WAIT', 'WBINVD', 'WRMSR', 'WRSHR', 'XADD', 'XBTS', 'XCHG',
                'XLAT', 'XLATB', 'XOR'
            ),
            'asm/instr_i387' => array(
                'F2XM1', 'FABS', 'FADD', 'FADDP', 'FBLD', 'FBSTP', 'FCHS', 'FCLEX',
                'FCMOVB', 'FCMOVBE', 'FCMOVE', 'FCMOVNB', 'FCMOVNBE', 'FCMOVNE',
                'FCMOVNU', 'FCMOVU', 'FCOM', 'FCOMI', 'FCOMIP', 'FCOMP', 'FCOMPP', 'FCOS',
                'FDECSTP', 'FDISI', 'FDIV', 'FDIVP', 'FDIVR', 'FDIVRP', 'FEMMS', 'FENI',
                'FFREE', 'FIADD', 'FICOM', 'FICOMP', 'FIDIV', 'FIDIVR', 'FILD', 'FIMUL',
                'FINCSTP', 'FINIT', 'FIST', 'FISTP', 'FISUB', 'FISUBR', 'FLD', 'FLD1',
                'FLDCW', 'FLDENV', 'FLDL2E', 'FLDL2T', 'FLDLG2', 'FLDLN2', 'FLDPI',
                'FLDZ', 'FMUL', 'FMULP', 'FNCLEX', 'FNDISI', 'FNENI', 'FNINIT', 'FNOP',
                'FNSAVE', 'FNSTCW', 'FNSTENV', 'FNSTSW', 'FPATAN', 'FPREM', 'FPREM1',
                'FPTAN', 'FRNDINT', 'FRSTOR', 'FSAVE', 'FSCALE', 'FSETPM', 'FSIN',
                'FSINCOS', 'FSQRT', 'FST', 'FSTCW', 'FSTENV', 'FSTP', 'FSTSW', 'FSUB',
                'FSUBP', 'FSUBR', 'FSUBRP', 'FTST', 'FUCOM', 'FUCOMI', 'FUCOMIP',
                'FUCOMP', 'FUCOMPP', 'FWAIT', 'FXAM', 'FXCH', 'FXTRACT', 'FYL2X',
                'FYL2XP1'
            ),
            'asm/instr/mmx' => array(
                'FFREEP', 'FXRSTOR', 'FXSAVE', 'MASKMOVQ', 'MOVNTQ', 'PACKSSDW',
                'PACKSSWB', 'PACKUSWB', 'PADDB', 'PADDD', 'PADDSB', 'PADDSIW', 'PADDSW',
                'PADDUSB', 'PADDUSW', 'PADDW', 'PAND', 'PANDN', 'PAVEB', 'PAVGB', 'PAVGW',
                'PCMPEQB', 'PCMPEQD', 'PCMPEQW', 'PCMPGTB', 'PCMPGTD', 'PCMPGTW',
                'PDISTIB', 'PEXTRW', 'PFCMPEQ', 'PFCMPGE', 'PFCMPGT', 'PINSRW',
                'PMACHRIW', 'PMADDWD', 'PMAGW', 'PMAXSW', 'PMAXUB', 'PMINSW', 'PMINUB',
                'PMOVMSKB', 'PMULHUW', 'PMVGEZB', 'PMVLZB', 'PMVNZB', 'PMVZB', 'POR',
                'PREFETCHNTA', 'PREFETCHT0', 'PREFETCHT1', 'PREFETCHT2', 'PSADBW',
                'PSHUFW', 'PSLLD', 'PSLLQ', 'PSLLW', 'PSRAD', 'PSRAW', 'PSRLD', 'PSRLQ',
                'PSRLW', 'PSUBB', 'PSUBD', 'PSUBSB', 'PSUBSIW', 'PSUBSW', 'PSUBUSB',
                'PSUBUSW', 'PSUBW', 'PUNPCKHBW', 'PUNPCKHDQ', 'PUNPCKHWD', 'PUNPCKLBW',
                'PUNPCKLDQ', 'PUNPCKLWD', 'PXOR', 'SFENCE'
            ),
            'asm/instr/sse' => array(
                'ADDPS', 'ADDSS', 'ANDNPS', 'ANDPS', 'CMPEQPS', 'CMPEQSS', 'CMPLEPS',
                'CMPLESS', 'CMPLTPS', 'CMPLTSS', 'CMPNEQPS', 'CMPNEQSS', 'CMPNLEPS',
                'CMPNLESS', 'CMPNLTPS', 'CMPNLTSS', 'CMPORDPS', 'CMPORDSS', 'CMPPS',
                'CMPSS', 'CMPUNORDPS', 'CMPUNORDSS', 'COMISS', 'CVTPI2PS', 'CVTPS2PI',
                'CVTSI2SS', 'CVTSS2SI', 'CVTTPS2PI', 'CVTTSS2SI', 'DIVPS', 'DIVSS',
                'LDMXCSR', 'MAXPS', 'MAXSS', 'MINPS', 'MINSS', 'MOVAPS', 'MOVHLPS',
                'MOVHPS', 'MOVLHPS', 'MOVLPS', 'MOVMSKPS', 'MOVNTPS', 'MOVSS', 'MOVUPS',
                'MULPS', 'MULSS', 'ORPS', 'RCPPS', 'RCPSS', 'RSQRTPS', 'RSQRTSS',
                'SHUFPS', 'SQRTPS', 'SQRTSS', 'STMXCSR', 'SUBPS', 'SUBSS', 'UCOMISS',
                'UNPCKHPS', 'UNPCKLPS', 'XORPS'
            ),
            'asm/instr/3Dnow' => array(
                'PAVGUSB', 'PF2ID', 'PFACC', 'PFADD', 'PFMAX', 'PFMIN', 'PFMUL', 'PFRCP',
                'PFRCPIT1', 'PFRCPIT2', 'PFRSQIT1', 'PFRSQRT', 'PFSUB', 'PFSUBR', 'PI2FD',
                'PMULHRIW', 'PMULHRWA', 'PMULHRWC', 'PMULHW', 'PMULLW', 'PREFETCH',
                'PREFETCHW'
            ),
            'asm/instr/3Dnow2' => array(
                'PF2IW', 'PFNACC', 'PFPNACC', 'PI2FW', 'PSWAPD'
            )
        );
    }
        
    /**
     * Implementation of abstract method {@link KeywordGetterStrategy::getKeywords()}
     * to get keywords for delphi
     * 
     * @param  string The keyword group to get keywords for. If not a valid keyword
     *                 group an error is returned
     * @return array  The keywords for delphi for the specified keyword group
     * @throws KeywordGetterError
     */
    function &getKeywords ($keyword_group)
    {
        // Check that keyword group listed is valid
        $group_valid = $this->keywordGroupIsValid($keyword_group);
        if (KeywordGetter::isError($group_valid)) {
            return $group_valid;
        }
        
        $keywords =& $this->tidy(array(), $keyword_group);
        return $keywords;
    }
}

?>
