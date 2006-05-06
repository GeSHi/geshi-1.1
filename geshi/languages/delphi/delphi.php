<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * <pre>
 *   File:   geshi/languages/delphi/delphi.php
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

/*
 * This implementation of delphi uses it's own version of ASM. It might
 * be the case in the future that another version of ASM is similar enough
 * for it to be used instead of the current delphi-specific one.
 * 
 * NOTES ABOUT NEW FORMAT:
 * 
 * Instead of "two stage" loading - whereby the context tree is created
 * and then traversed to load information - the new format allows just
 * one stage, where the context is initialised the moment it is created.
 * 
 * The initialisation for a context is done by a function call, passing
 * itself as an argument.
 * 
 * For example, when the delphi/delphi context is created, the function
 * geshi_delphi_delphi(&$context) is called. This function should be
 * defined in the language file, and can call various public API methods
 * on the $context object to tell the context what its properties are.
 * 
 * Major methods are:
 * 
 *   * addChild(name, type)
 *   * addDelimiters(open, close)
 *   * addKeywordGroup(keywords, name)
 *   * addRegexGroup(regex, symbol, data)
 *   * addSymbolGroup(symbols, name)
 * 
 * There are other methods - check the GeSHiContext, GeSHiCodeContext and
 * GeSHiStringContext for more information.
 * 
 * When addChild is called, you pass it a name for a new context. That
 * name could be "relative" or "absolute". Example:
 * 
 * $context->addChild('single_comment'): "relative", creates a new context
 * called {$current_context_name}/single_comment. So if you are in the
 * geshi_delphi_delphi function, the new context will be delphi/delphi/single_comment,
 * and the function geshi_delphi_delphi_single_comment will be called to
 * initialise the context.
 * 
 * $context->addChild('delphi/delphi/single_comment'): "absolute", creates
 * a new context with that name. So the context will be a delphi/delphi/single_comment
 * regardless of whether the current context is "delphi/delphi" or "delphi/delphi/foo/bar",
 * and the geshi_delphi_delphi_single_comment will always be used to initialise
 * the context.
 * 
 * 
 * BTW, all of the functions for initialising contexts should go in this
 * file, except any function you think would be common to several "dialects" of
 * delphi, which should go in a "common.php" file. The context files are not
 * used at all now, and it is likely I will remove them completely as the new
 * format comes into use for all languages.
 * 
 * NOTES ABOUT NEW FORMAT AND DELPHI:
 * 
 *   - "extern" and "property" are not aliased to the root context anymore,
 *     though I think that extern and property need to be thought about more
 *     before working out a solution 
 *   - There's plenty of duplication in here that can be moved to a separate
 *     file/function. See the PHP/PHP4/PHP5 implementations for an example -
 *     the geshi_php_common function is a great example of the kind of savings
 *     that can be made.
 *   - Because addObjectSplitter() allows you to specify the name for the
 *     "splitter" (e.g. "oopsym"), it may be that the "." can be removed from
 *     other symbol arrays.
 *   - Any thoughts on method namings would be most appreciated
 *   - geshi_delphi_delphi_single_string: is \ an escape character? If not
 *     then the call to setEscapeCharacter should be removed. And note the
 *     todo listed in that function
 * 
 * WHAT YOU SHOULD DO:
 * 
 *   - Have a look through this file, and the PHP language files to get
 *     a feel for how the new format works.
 *   - Comment out some of this stuff to see how it all works.
 *   - Then, try and build delphi support back up to the level it was by
 *     using this new format. I suggest you remove asm, extern and
 *     property (just comment them out), and try and get what's left back
 *     up to previous standards (remembering that the code parser may not
 *     like the new format so you have to be aware of that too). When you
 *     have that working, see if you can refactor some of the "common" stuff
 *     into functions to save you maintaining several lists of stuff (like
 *     the regexes for characters for example). Then try re-adding asm
 *     support, and then extern and property. Perhaps extern and property
 *     could be done by the code parser now?
 * 
 *  It is most likely that the new format may be a little buggy, or maybe
 *  it doesn't allow you to do something that you require to get delphi
 *  support back up to where it "was". If so, file bugs etc. etc., and I
 *  will fix asap.
 * 
 * NOTE: if you have a look at java highlighting, see how complete it is
 * now with the code parser. You might be able to make delphi more complete
 * by using the code parser also - but I suggest this as something you
 * *might* want to do only *after* support is back up to scratch :) - Nigel
 */

require_once("common.php");

function geshi_delphi_delphi (&$context)
{
    geshi_delphi_common($context);

    $context->addChild('preprocessor', 'code');
    $context->addChild('asm', 'code');
    $context->addChild('extern', 'code'); // NOTE: to be aliased as delphi/delphi
    $context->addChild('property', 'code');
    
    // Keywords
    $context->addKeywordGroup(array(
        'Absolute', 'Abstract', 'And', 'Array', 'As', 'Asm', 'At', 'Begin', 'Case', 'Class',
        'Const', 'Constructor', 'Contains', 'Destructor', 'DispInterface', 'Div',
        'Do', 'DownTo', 'Else', 'End', 'Except', 'File', 'Finalization',
        'Finally', 'For', 'Function', 'Goto', 'If', 'Implementation', 'In',
        'Inherited', 'Initialization', 'Inline', 'Interface', 'Is', 'Label',
        'Mod', 'Not', 'Object', 'Of', 'On', 'Or', 'Overload', 'Override',
        'Package', 'Packed', 'Private', 'Procedure', 'Program', 'Property',
        'Protected', 'Public', 'Published', 'Raise', 'Record', 'Repeat',
        'Requires', 'Resourcestring', 'Set', 'Shl', 'Shr', 'Then', 'ThreadVar',
        'To', 'Try', 'Type', 'Unit', 'Until', 'Uses', 'Var', 'Virtual', 'While',
        'With', 'Xor', 'assembler', 'cdecl', 'far', 'near', 'pascal',
        //'register', // requires special handling
        'safecall', 'stdcall', 'varargs'
    ), 'keyword');
    
    geshi_delphi_keytype($context);
    geshi_delphi_keyident_self($context);

    // Symbols
    $context->addSymbolGroup(array(
        '+', '-', '*', '/'
    ), 'mathsym');
    $context->addSymbolGroup(array(
        ':', ';', ','
    ), 'ctrlsym');
    $context->addSymbolGroup(array(
        '<', '=', '>'
    ), 'cmpsym');
    $context->addSymbolGroup(array(
        '(', ')', '[', ']'
    ), 'brksym');
    
    $context->addSymbolGroup(array(
        '@', '^'
    ), 'oopsym');

    geshi_delphi_chars($context);
    geshi_delphi_integers($context);

    // Floats
    $context->useStandardDoubles('mathsym', true);

    // Ranges
    $context->addRegexGroup('/(\.\.)/', '.', array(
        1 => array('ctrlsym', false)
    ));

    $context->addObjectSplitter('.', '/oodynamic', 'oopsym');

    $context->setComplexFlag(GESHI_COMPLEX_TOKENISE);

    // Standard functions of Unit System
    $context->addKeywordGroup(array(
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
    ), 'stdprocs/system');

    // Standard functions of Unit SysUtils
    $context->addKeywordGroup(array(
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
    ), 'stdprocs/sysutil');

    // Standard functions of Unit Classes
    $context->addKeywordGroup(array(
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
    ), 'stdprocs/class');

    // Standard functions of Unit Math
    $context->addKeywordGroup(array(
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
    ), 'stdprocs/math');

}
    
// This feature is yet to be implemented in the new language file format
//$this->_styler->useThemes('boride');

function geshi_delphi_delphi_single_string(&$context)
{
    geshi_delphi_single_string($context);
}

function geshi_delphi_delphi_single_comment(&$context)
{
    geshi_delphi_single_comment($context);
}

function geshi_delphi_delphi_multi_comment(&$context)
{
    geshi_delphi_multi_comment($context);
}

function geshi_delphi_delphi_preprocessor(&$context)
{
    geshi_delphi_preprocessor($context);
}

function geshi_delphi_delphi_preprocessor_single_string(&$context)
{
    geshi_delphi_single_string($context);
}

function geshi_delphi_delphi_asm (&$context)
{
    $context->addDelimiters('REGEX#(^|(?=\b))asm((?=\b)|$)#im',
         'REGEX#(^|(?=\b))end((?=\b)|$)#im');
    $context->setComplexFlag(GESHI_COMPLEX_TOKENISE);

    $context->addChild('delphi/delphi/preprocessor', 'code');
    $context->addChild('delphi/delphi/single_comment');
    $context->addChild('delphi/delphi/multi_comment');

    //Assembler Directives
    $context->addKeywordGroup(array(
        'db','dd','dw'
    ), 'keyword');

    // Keyops
    $context->addKeywordGroup(array(
        'high', 'low', 'mod'
        //@done: Make ASM detect 'and', 'not', 'or', 'shl', 'shr', 'xor' if not used as instructions
        //The mentioned operators are now handled by the CodeParser and appear here for reference only.
    ), 'keyop');

    // Control
    $context->addKeywordGroup(array(
        'byte', 'dmtindex', 'dword', 'large', 'offset', 'ptr', 'qword', 'small',
        'tbyte', 'type', 'vmtoffset', 'word'
    ), 'control');

    // Registers
    $context->addKeywordGroup(array(
        'ah', 'al', 'bh', 'bl', 'ch', 'cl', 'dh', 'dl',
        'ax', 'bx', 'cx', 'dx', 'sp', 'bp', 'di', 'si',

        'eax', 'ebx', 'ecx', 'edx', 'esp', 'ebp', 'edi', 'esi',

        'mm0', 'mm1', 'mm2', 'mm3', 'mm4', 'mm5', 'mm6', 'mm7',
        'xmm0', 'xmm1', 'xmm2', 'xmm3', 'xmm4', 'xmm5', 'xmm6', 'xmm7',

        'st0', 'st1', 'st2', 'st3', 'st4', 'st5', 'st6', 'st7',

        'cs', 'ds', 'es', 'fs', 'gs', 'ss',
        'cr0', 'cr1', 'cr2', 'cr3', 'cr4',
        'dr0', 'dr1', 'dr2', 'dr3', 'dr4', 'dr5', 'dr6', 'dr7'
    ), 'register');
    $context->addRegexGroup('/(?=\b)(st\([0-7]\))/im', '', array(
        1 => array('register', false)
    ));

    // CPU i386 instructions
    $context->addKeywordGroup(array(
         // @todo order the i386 instruction set
         // @todo divide the i386 instruction set into i386\i486\i586\i686 instructions
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
    ), 'instr/i386');

    // FPU i387 instructions
    $context->addKeywordGroup(array(
         // @todo order the i387 instruction set
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
    ), 'instr/i387');

    // MMX instruction set
    $context->addKeywordGroup(array(
        // @todo order the mmx instruction set
        // @todo divide into MMX and XMM instruction sets
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
    ), 'instr/mmx');

    // SSE instruction set
    $context->addKeywordGroup(array(
        // @todo order the SSE instruction set
        // @todo divide between SSE\SSE2\SSE3 instruction sets
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
    ), 'instr/sse');

    // 3DNow instruction set
    $context->addKeywordGroup(array(
        // @todo order the 3Dnow! instruction set
        'PAVGUSB', 'PF2ID', 'PFACC', 'PFADD', 'PFMAX', 'PFMIN', 'PFMUL', 'PFRCP',
        'PFRCPIT1', 'PFRCPIT2', 'PFRSQIT1', 'PFRSQRT', 'PFSUB', 'PFSUBR', 'PI2FD',
        'PMULHRIW', 'PMULHRWA', 'PMULHRWC', 'PMULHW', 'PMULLW', 'PREFETCH',
        'PREFETCHW'
    ), 'instr/3Dnow');

    // 3DNowExt instruction set
    $context->addKeywordGroup(array(
        // @todo order the 3Dnow! Ext instruction set
        'PF2IW', 'PFNACC', 'PFPNACC', 'PI2FW', 'PSWAPD'
    ), 'instr/3Dnow2');

    // @todo Split into the same subgroups like for delphi/delphi
    $context->addSymbolGroup(array(
        ',', ';', '[', ']', '(', ')', '.', '&', '+', '-', '/', '*'
    ), 'symbol');

    $context->addObjectSplitter('.', 'oodynamic', 'symbol');

    $context->addRegexGroup('#([@a-zA-Z_][@a-zA-Z0-9_]+:)#', ':', array(
        1 => array('label', false)
    ));
    $context->addRegexGroup('/(\$[0-9a-fA-F_]+)/', '$', array(
        1 => array('hex', false)
    ));

    $context->useStandardIntegers();
    $context->useStandardDoubles('mathsym', true);
}

function geshi_delphi_delphi_extern (&$context)
{
    $context->addDelimiters('REGEX#(^|(?=\b))exports((?=\b)|$)#im', ';');
    $context->addDelimiters('REGEX#(^|(?=\b))external((?=\b)|$)#im', ';');

    $context->addChild('delphi/delphi/preprocessor', 'code');
    $context->addChild('delphi/delphi/multi_comment');
    $context->addChild('delphi/delphi/single_comment');
    $context->addChild('delphi/delphi/single_string', 'string');
    $context->addChild('delphi/delphi/exports_brackets', 'code');

    //$this->_startName = 'keyword';
    //$this->_endName   = 'ctrlsym';

    $context->addKeywordGroup(array(
        'name','index','resident'
    ), 'keyword');

    $context->addSymbolGroup(array(
        ','
    ), 'symbol');
    $context->addSymbolGroup(array(
        '(', ')', '[', ']'
    ), 'brksym');

    $context->addRegexGroup('/(#[0-9]+)/', '#', array(
        1 => array('char', false)
    ));
    $context->addRegexGroup('/(#\$[0-9a-fA-F]+)/', '#', array(
        1 => array('charhex', false)
    ));
    $context->addRegexGroup('/(\$[0-9a-fA-F]+)/', '$', array(
        1 => array('hex', false)
    ));
    
    $context->useStandardIntegers();

    $context->addObjectSplitter('.', 'oodynamic', 'oopsym');

    // @todo This might be subject to change, depending on how I will handle this context.
    // It might be that I'll have to split this context a bit ...
    $context->setComplexFlag(GESHI_COMPLEX_PASSALL);
}

function geshi_delphi_delphi_exports_brackets (&$context)
{
    $context->addDelimiters('(', ')');

    $context->addChild('delphi/delphi/preprocessor', 'code');
    $context->addChild('delphi/delphi/single_comment');
    $context->addChild('delphi/delphi/multi_comment');

    //$this->_startName = 'brksym'; // highlight starter as if it was a brksym
    //$this->_endName   = 'brksym';  // highlight ender as if it was a brksym

    // Keywords
    $context->addKeywordGroup(array(
        'var', 'out', 'const', 'array'
    ), 'keyword');
    
    geshi_delphi_keytype($context);

    geshi_delphi_keyident_noself($context);

    $context->addSymbolGroup(array(
        ':', ';', ',', '='
    ), 'ctrlsym');

    $context->addRegexGroup('/(#[0-9]+)/', '#', array(
        1 => array('char', false)
    ));
    $context->addRegexGroup('/(#\$[0-9a-fA-F]+)/', '#', array(
        1 => array('charhex', false)
    ));
    $context->addRegexGroup('/(\$[0-9a-fA-F]+)/', '$', array(
        1 => array('hex', false)
    ));
    
    $context->useStandardIntegers();
    $context->useStandardDoubles('mathsym', true);

    $context->addObjectSplitter('.', '/oodynamic', 'oopsym');

    $context->setComplexFlag(GESHI_COMPLEX_PASSALL);
}

function geshi_delphi_delphi_property (&$context)
{
    $context->addDelimiters('property', ';');
    
    $context->addChild('delphi/delphi/preprocessor', 'code');
    $context->addChild('delphi/delphi/single_comment');
    $context->addChild('delphi/delphi/multi_comment');
    $context->addChild('property_index', 'code');
    
    //$this->_startName = 'keyword'; // highlight starter as if it was a keyword
    //$this->_endName   = 'ctrlsym';  // highlight ender as if it was a ctrlsym
    
    $context->addKeywordGroup(array(
        'read','write','index','stored','default','nodefault','implements',
        'dispid','readonly','writeonly'
    ), 'keyword');
    
    geshi_delphi_keytype($context);

    geshi_delphi_keyident_noself($context);
    
    $context->addKeywordGroup(':', 'ctrlsym');
    
    $context->addRegexGroup('/(#[0-9]+)/', '#', array(
        1 => array('char', false)
    ));
    $context->addRegexGroup('/(#\$[0-9a-fA-F]+)/', '#', array(
        1 => array('charhex', false)
    ));
    $context->addRegexGroup('/(\$[0-9a-fA-F]+)/', '$', array(
        1 => array('hex', false)
    ));
    
    $context->useStandardIntegers();
    
    $context->addObjectSplitter('.', 'oodynamic', 'oopsym');
    
    // @todo: This might require some changes later on to fix some bugs ...
    $context->setComplexFlag(GESHI_COMPLEX_PASSALL);
}

function geshi_delphi_delphi_property_property_index(&$context)
{
    $context->addDelimiters('[', ']');

    $context->addChild('delphi/delphi/preprocessor', 'code');
    $context->addChild('delphi/delphi/single_comment');
    $context->addChild('delphi/delphi/multi_comment');

    //$this->_startName = 'brksym'; // highlight starter as if it was a keyword
    //$this->_endName   = 'brksym';  // highlight ender as if it was a ctrlsym

    geshi_delphi_keytype($context);

    $context->addSymbolGroup(array(
        ':', ';', ','
    ), 'ctrlsym');

    $context->addRegexGroup('/(#[0-9]+)/', '#', array(
        1 => array('char', false)
    ));
    $context->addRegexGroup('/(#\$[0-9a-fA-F]+)/', '#', array(
        1 => array('charhex', false)
    ));
    $context->addRegexGroup('/(\$[0-9a-fA-F]+)/', '$', array(
        1 => array('hex', false)
    ));

    $context->useStandardIntegers();

    $context->addObjectSplitter('.', 'oopdynamic', 'oopsym');

    // @todo: This might require some changes later on to fix some bugs ...
    $context->setComplexFlag(GESHI_COMPLEX_PASSALL);
}

?>
