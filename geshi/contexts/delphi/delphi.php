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

// @todo [blocking 1.1.1] Rename OCCs with parent's name in front for theming
$this->_childContexts = array(
    new GeSHiContext('delphi',  $DIALECT, 'multi_comment'),
    new GeSHiContext('delphi', $DIALECT, 'common/single_comment'),
    new GeSHiContext('delphi', $DIALECT, 'common/single_string_eol'),
    new GeSHiContext('delphi', $DIALECT, 'preprocessor'),
    new GeSHiCodeContext('delphi', $DIALECT, 'asm'),
    new GeSHiCodeContext('delphi', $DIALECT, 'extern'),
    new GeSHiCodeContext('delphi', $DIALECT, 'property', 'delphi/' . $DIALECT)
);

//$this->_styler->setStyle($CONTEXT, 'color:#000;');

$this->_contextKeywords = array(
    0 => array(
        0 => array(
            //@todo get keywords normal way
            //@todo handle special keyword cases for exports, read, write, index, default, stored, nodefault, message ...
            'And',
            'Array',
            'As',
            'Asm',
            'At',
            'Begin',
            'Case',
            'Class',
            'Const',
            'Constructor',
            'Contains',
            'Destructor',
            'DispInterface',
            'Div',
            'Do',
            'DownTo',
            'Else',
            'End',
            'Except',
            'File',
            'Finalization',
            'Finally',
            'For',
            'Function',
            'Goto',
            'If',
            'Implementation',
            'In',
            'Inherited',
            'Initialization',
            'Interface',
            'Is',
            'Label',
            'Mod',
            'Not',
            'Object',
            'Of',
            'On',
            'Or',
            'Packed',
            'Package',
            'Procedure',
            'Program',
            'Property',
            'Raise',
            'Record',
            'Requires',
            'Repeat',
            'Set',
            'Shl',
            'Shr',
            'Then',
            'ThreadVar',
            'To',
            'Try',
            'Type',
            'Unit',
            'Until',
            'Uses',
            'Var',
            'While',
            'With',
            'Xor',

            'Private', 'Protected', 'Public', 'Published',

            'Virtual', 'Abstract', 'Override', 'Overload',

            'cdecl', 'stdcall', 'register', 'pascal', 'safecall', 'near', 'far', 'varargs',

            'assembler'
        ),
        1 => $CONTEXT . '/keywords',
        2 => 'color:#f00; font-weight:bold;',
        3 => false,
        4 => ''
    ),
    1 => array(
        0 => array(
            //@todo get keywords normal way
            'Boolean', 'ByteBool', 'LongBool', 'WordBool', 'Bool',

            'Byte',  'SmallInt',
            'ShortInt', 'Word',
            'Integer', 'Cardinal',
            'LongInt', 'DWORD',
            'Int64',

            'Single', 'Double', 'Extended',
            'Real48', 'Real', 'Comp', 'Currency',

            'Pointer',

            'Char', 'AnsiChar', 'WideChar',
            'PChar', 'PAnsiChar', 'PWideChar',
            'String', 'AnsiString', 'WideString',

            'THandle'
        ),
        1 => $CONTEXT . '/keytypes',
        2 => 'color:#000; font-weight:bold;',
        3 => false,
        4 => ''
    ),
    
    2 => array(
        0 => array(
            //@todo get keywords normal way
            'nil',
            'false', 'true'
        ),
        1 => $CONTEXT . '/keyidents',
        2 => 'color:#000; font-weight:bold;',
        3 => false,
        4 => ''
    ),

    //Standard functions of Unit System
    3 => array(
        0 => array(
            //@todo get keywords normal way
            'Abs','AcquireExceptionObject','Addr','AnsiToUtf8','Append','ArcTan','Assert','Assigned','AssignFile',
            'BeginThread','BlockRead','BlockWrite','Break','ChDir','Chr','Close','CloseFile','CompToCurrency',
            'CompToDouble','Concat','Continue','Copy','Cos','Dec','Delete','Dispose','DoubleToComp','EndThread',
            'EnumModules','EnumResourceModules','Eof','Eoln','Erase','ExceptAddr','ExceptObject','Exclude','Exit',
            'Exp','FilePos','FileSize','FillChar','Finalize','FindClassHInstance','FindHInstance','FindResourceHInstance',
            'Flush','Frac','FreeMem','Get8087CW','GetDir','GetLastError','GetMem','GetMemoryManager',
            'GetModuleFileName','GetVariantManager','Halt','Hi','High','Inc','Include','Initialize','Insert',
            'Int','IOResult','IsMemoryManagerSet','IsVariantManagerSet','Length','Ln','Lo','Low','MkDir','Move',
            'New','Odd','OleStrToString','OleStrToStrVar','Ord','ParamCount','ParamStr','Pi','Pos','Pred','Ptr',
            'PUCS4Chars','Random','Randomize','Read','ReadLn','ReallocMem','ReleaseExceptionObject','Rename',
            'Reset','Rewrite','RmDir','Round','RunError','Seek','SeekEof','SeekEoln','Set8087CW','SetLength',
            'SetLineBreakStyle','SetMemoryManager','SetString','SetTextBuf','SetVariantManager','Sin','SizeOf',
            'Slice','Sqr','Sqrt','Str','StringOfChar','StringToOleStr','StringToWideChar','Succ','Swap','Trunc',
            'Truncate','TypeInfo','UCS4StringToWideString','UnicodeToUtf8','UniqueString','UpCase','UTF8Decode',
            'UTF8Encode','Utf8ToAnsi','Utf8ToUnicode','Val','VarArrayRedim','VarClear','WideCharLenToString',
            'WideCharLenToStrVar','WideCharToString','WideCharToStrVar','WideStringToUCS4String','Write','WriteLn'
        ),
        1 => $CONTEXT . '/stdprocs/system',
        2 => 'color:#444;',
        3 => false,
        4 => ''
    ),

    //Standard functions of Unit SysUtils
    4 => array(
        0 => array(
            //@todo get keywords normal way
            'Abort','AddExitProc','AddTerminateProc','AdjustLineBreaks','AllocMem','AnsiCompareFileName',
            'AnsiCompareStr','AnsiCompareText','AnsiDequotedStr','AnsiExtractQuotedStr','AnsiLastChar',
            'AnsiLowerCase','AnsiLowerCaseFileName','AnsiPos','AnsiQuotedStr','AnsiSameStr','AnsiSameText',
            'AnsiStrComp','AnsiStrIComp','AnsiStrLastChar','AnsiStrLComp','AnsiStrLIComp','AnsiStrLower',
            'AnsiStrPos','AnsiStrRScan','AnsiStrScan','AnsiStrUpper','AnsiUpperCase','AnsiUpperCaseFileName',
            'AppendStr','AssignStr','Beep','BoolToStr','ByteToCharIndex','ByteToCharLen','ByteType',
            'CallTerminateProcs','ChangeFileExt','CharLength','CharToByteIndex','CharToByteLen','CompareMem',
            'CompareStr','CompareText','CreateDir','CreateGUID','CurrentYear','CurrToStr','CurrToStrF','Date',
            'DateTimeToFileDate','DateTimeToStr','DateTimeToString','DateTimeToSystemTime','DateTimeToTimeStamp',
            'DateToStr','DayOfWeek','DecodeDate','DecodeDateFully','DecodeTime','DeleteFile','DirectoryExists',
            'DiskFree','DiskSize','DisposeStr','EncodeDate','EncodeTime','ExceptionErrorMessage',
            'ExcludeTrailingBackslash','ExcludeTrailingPathDelimiter','ExpandFileName','ExpandFileNameCase',
            'ExpandUNCFileName','ExtractFileDir','ExtractFileDrive','ExtractFileExt','ExtractFileName',
            'ExtractFilePath','ExtractRelativePath','ExtractShortPathName','FileAge','FileClose','FileCreate',
            'FileDateToDateTime','FileExists','FileGetAttr','FileGetDate','FileIsReadOnly','FileOpen','FileRead',
            'FileSearch','FileSeek','FileSetAttr','FileSetDate','FileSetReadOnly','FileWrite','FinalizePackage',
            'FindClose','FindCmdLineSwitch','FindFirst','FindNext','FloatToCurr','FloatToDateTime',
            'FloatToDecimal','FloatToStr','FloatToStrF','FloatToText','FloatToTextFmt','FmtLoadStr','FmtStr',
            'ForceDirectories','Format','FormatBuf','FormatCurr','FormatDateTime','FormatFloat','FreeAndNil',
            'GetCurrentDir','GetEnvironmentVariable','GetFileVersion','GetFormatSettings',
            'GetLocaleFormatSettings','GetModuleName','GetPackageDescription','GetPackageInfo','GUIDToString',
            'IncAMonth','IncludeTrailingBackslash','IncludeTrailingPathDelimiter','IncMonth','InitializePackage',
            'InterlockedDecrement','InterlockedExchange','InterlockedExchangeAdd','InterlockedIncrement',
            'IntToHex','IntToStr','IsDelimiter','IsEqualGUID','IsLeapYear','IsPathDelimiter','IsValidIdent',
            'Languages','LastDelimiter','LoadPackage','LoadStr','LowerCase','MSecsToTimeStamp','NewStr',
            'NextCharIndex','Now','OutOfMemoryError','QuotedStr','RaiseLastOSError','RaiseLastWin32Error',
            'RemoveDir','RenameFile','ReplaceDate','ReplaceTime','SafeLoadLibrary','SameFileName','SameText',
            'SetCurrentDir','ShowException','Sleep','StrAlloc','StrBufSize','StrByteType','StrCat',
            'StrCharLength','StrComp','StrCopy','StrDispose','StrECopy','StrEnd','StrFmt','StrIComp',
            'StringReplace','StringToGUID','StrLCat','StrLComp','StrLCopy','StrLen','StrLFmt','StrLIComp',
            'StrLower','StrMove','StrNew','StrNextChar','StrPas','StrPCopy','StrPLCopy','StrPos','StrRScan',
            'StrScan','StrToBool','StrToBoolDef','StrToCurr','StrToCurrDef','StrToDate','StrToDateDef',
            'StrToDateTime','StrToDateTimeDef','StrToFloat','StrToFloatDef','StrToInt','StrToInt64',
            'StrToInt64Def','StrToIntDef','StrToTime','StrToTimeDef','StrUpper','Supports','SysErrorMessage',
            'SystemTimeToDateTime','TextToFloat','Time','GetTime','TimeStampToDateTime','TimeStampToMSecs',
            'TimeToStr','Trim','TrimLeft','TrimRight','TryEncodeDate','TryEncodeTime','TryFloatToCurr',
            'TryFloatToDateTime','TryStrToBool','TryStrToCurr','TryStrToDate','TryStrToDateTime','TryStrToFloat',
            'TryStrToInt','TryStrToInt64','TryStrToTime','UnloadPackage','UpperCase','WideCompareStr',
            'WideCompareText','WideFmtStr','WideFormat','WideFormatBuf','WideLowerCase','WideSameStr',
            'WideSameText','WideUpperCase','Win32Check','WrapText'
        ),
        1 => $CONTEXT . '/stdprocs/sysutils',
        2 => 'color:#444;',
        3 => false,
        4 => ''
    ),

    //Standard functions of Unit Classes
    5 => array(
        0 => array(
            //@todo get keywords normal way
            'ActivateClassGroup','AllocateHwnd','BinToHex','CheckSynchronize','CollectionsEqual','CountGenerations',
            'DeallocateHwnd','EqualRect','ExtractStrings','FindClass','FindGlobalComponent','GetClass',
            'GroupDescendantsWith','HexToBin','IdentToInt','InitInheritedComponent','IntToIdent','InvalidPoint',
            'IsUniqueGlobalComponentName','LineStart','ObjectBinaryToText','ObjectResourceToText',
            'ObjectTextToBinary','ObjectTextToResource','PointsEqual','ReadComponentRes','ReadComponentResEx',
            'ReadComponentResFile','Rect','RegisterClass','RegisterClassAlias','RegisterClasses',
            'RegisterComponents','RegisterIntegerConsts','RegisterNoIcon','RegisterNonActiveX','SmallPoint',
            'StartClassGroup','TestStreamFormat','UnregisterClass','UnregisterClasses','UnregisterIntegerConsts',
            'UnregisterModuleClasses','WriteComponentResFile'
        ),
        1 => $CONTEXT . '/stdprocs/classes',
        2 => 'color:#444;',
        3 => false,
        4 => ''
    ),

    //Standard functions of Unit Math
    6 => array(
        0 => array(
            //@todo get keywords normal way
            'ArcCos', 'ArcCosh', 'ArcCot', 'ArcCotH', 'ArcCsc', 'ArcCscH', 'ArcSec', 'ArcSecH', 'ArcSin',
            'ArcSinh', 'ArcTan2', 'ArcTanh', 'Ceil', 'CompareValue', 'Cosecant', 'Cosh', 'Cot', 'Cotan',
            'CotH', 'Csc', 'CscH', 'CycleToDeg', 'CycleToGrad', 'CycleToRad', 'DegToCycle', 'DegToGrad',
            'DegToRad', 'DivMod', 'DoubleDecliningBalance', 'EnsureRange', 'Floor', 'Frexp', 'FutureValue',
            'GetExceptionMask', 'GetPrecisionMode', 'GetRoundMode', 'GradToCycle', 'GradToDeg', 'GradToRad',
            'Hypot', 'InRange', 'InterestPayment', 'InterestRate', 'InternalRateOfReturn', 'IntPower',
            'IsInfinite', 'IsNan', 'IsZero', 'Ldexp', 'LnXP1', 'Log10', 'Log2', 'LogN', 'Max', 'MaxIntValue',
            'MaxValue', 'Mean', 'MeanAndStdDev', 'Min', 'MinIntValue', 'MinValue', 'MomentSkewKurtosis',
            'NetPresentValue', 'Norm', 'NumberOfPeriods', 'Payment', 'PeriodPayment', 'Poly', 'PopnStdDev',
            'PopnVariance', 'Power', 'PresentValue', 'RadToCycle', 'RadToDeg', 'RadToGrad', 'RandG', 'RandomRange',
            'RoundTo', 'SameValue', 'Sec', 'Secant', 'SecH', 'SetExceptionMask', 'SetPrecisionMode', 'SetRoundMode',
            'Sign', 'SimpleRoundTo', 'SinCos', 'Sinh', 'SLNDepreciation', 'StdDev', 'Sum', 'SumInt', 'SumOfSquares',
            'SumsAndSquares', 'SYDDepreciation', 'Tan', 'Tanh', 'TotalVariance', 'Variance'
        ),
        1 => $CONTEXT . '/stdprocs/math',
        2 => 'color:#444;',
        3 => false,
        4 => ''
    ),
);

$this->_contextCharactersDisallowedBeforeKeywords = array('_');
$this->_contextCharactersDisallowedAfterKeywords = array('_');

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
//                        '|', '=', '!', ':', '(', ')', ',', '<', '>', '&', '$', '+', '-', '*', '/',
//                '{', '}', ';', '[', ']', '~', '?'
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
    4 => geshi_use_doubles($CONTEXT),
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