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
 * @author    Benny Baumann <BenBE@benbe.omorphia.de>, Nigel McNie <nigel@geshi.org>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005 Nigel McNie
 * @version   $Id$
 *
 */

// @todo [blocking 1.1.1] Rename OCCs with parent's name in front for theming
$this->_childContexts = array(
    new GeSHiContext('delphi',  $DIALECT, 'multi_comment'),
    new GeSHiContext('delphi', $DIALECT, 'common/single_comment'),
    new GeSHiContext('delphi', $DIALECT, 'common/single_string_eol'),
    new GeSHiContext('delphi', $DIALECT, 'preprocessor'),
    new GeSHiCodeContext('delphi', $DIALECT, 'asm'),
    new GeSHiCodeContext('delphi', $DIALECT, 'extern', 'delphi/' . $DIALECT),
    new GeSHiCodeContext('delphi', $DIALECT, 'property', 'delphi/' . $DIALECT)
);

//$this->_styler->setStyle($CONTEXT, 'color:#000;');

$this->_contextKeywords = array(
    0 => array(
        0 => array(
            //@todo [blocking 1.1.1] get keywords normal way
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
        1 => $CONTEXT . '/keywords',
        2 => 'color:#f00; font-weight:bold;',
        3 => false,
        4 => ''
    ),
    1 => array(
        0 => array(
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
        1 => $CONTEXT . '/keytypes',
        2 => 'color:#000; font-weight:bold;',
        3 => false,
        4 => ''
    ),

    2 => array(
        0 => array(
            'false', 'nil', 'self', 'true'
        ),
        1 => $CONTEXT . '/keyidents',
        2 => 'color:#000; font-weight:bold;',
        3 => false,
        4 => ''
    ),

    //Standard functions of Unit System
    3 => array(
        0 => array(
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
        1 => $CONTEXT . '/stdprocs/system',
        2 => 'color:#444;',
        3 => false,
        4 => ''
    ),

    //Standard functions of Unit SysUtils
    4 => array(
        0 => array(
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
        1 => $CONTEXT . '/stdprocs/sysutils',
        2 => 'color:#444;',
        3 => false,
        4 => ''
    ),

    //Standard functions of Unit Classes
    5 => array(
        0 => array(
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
        1 => $CONTEXT . '/stdprocs/classes',
        2 => 'color:#444;',
        3 => false,
        4 => ''
    ),

    //Standard functions of Unit Math
    6 => array(
        0 => array(
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
        1 => $CONTEXT . '/stdprocs/math',
        2 => 'color:#444;',
        3 => false,
        4 => ''
    )
);

$this->_contextSymbols  = array(
    0 => array(
        0 => array(
            '+', '-', '*', '/'
            ),
        1 => $CONTEXT . '/mathsym',
        2 => 'color:#008000;'
        ),
    1 => array(
        0 => array(
            ':', ';', ','
            ),
        1 => $CONTEXT . '/ctrlsym',
        2 => 'color:#008000;'
        ),
    2 => array(
        0 => array(
            '<', '=', '>'
            ),
        1 => $CONTEXT . '/cmpsym',
        2 => 'color:#008000;'
        ),
    3 => array(
        0 => array(
            '(', ')', '[', ']'
            ),
        1 => $CONTEXT . '/brksym',
        2 => 'color:#008000;'
        ),
    4 => array(
        0 => array(
            '.', '@', '^'
            ),
        1 => $CONTEXT . '/oopsym',
        2 => 'color:#008000;'
        )
);

$this->_contextRegexps  = array(
    0 => array(
        0 => array(
            '/(#[0-9]+)/'
        ),
        1 => '#',
        2 => array(
            1 => array($CONTEXT . '/char', 'color:#db9;', false)
        )
    ),
    1 => array(
        0 => array(
            '/(#\$[0-9a-fA-F]+)/'
        ),
        1 => '#',
        2 => array(
            1 => array($CONTEXT . '/charhex', 'color:#db9;', false)
        )
    ),
    2 => array(
        0 => array(
            '/(\$[0-9a-fA-F]+)/'
        ),
        1 => '$',
        2 => array(
            1 => array($CONTEXT . '/hex', 'color: #2bf;', false)
        )
    ),
    3 => array(
        0 => array(
            '/(\.\.)/'
        ),
        1 => '.',
        2 => array(
            1 => array($CONTEXT . '/ctrlsym', 'color: #008000;', false)
        )
    ),
    4 => geshi_use_doubles($CONTEXT, true), // second parameter says leading zero is required.
    5 => geshi_use_integers($CONTEXT)
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