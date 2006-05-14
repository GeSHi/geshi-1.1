<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * <pre>
 *   File:   geshi/languages/java/java.php
 *   Author: Tim Wright
 *   E-mail: tim.w@clear.net.nz
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
 * @author     Tim Wright <tim.w@clear.net.nz>
 * @copyright  (C) 2005 - 2006 Tim Wright, Nigel McNie
 * @version    $Id$
 *
 */
 
function geshi_java_java (&$context)
{
    //$name = $context->name();
    
    // Children of java context
    $context->addChild('double_string', 'string');
    $context->addChild('single_string', 'singlechar');
    $context->addChild('single_comment');
    $context->addChild('multi_comment');
    // Doxygen is used for highlighting javadoc comments
    $context->addChildLanguage('doxygen/doxygen', '/**', '*/');
    
    // Keyword groups
    // @todo [blocking 1.1.1] Get Tim to do his magic auto-populate thing on this file
    
    // Keywords
    $context->addKeywordGroup(array(
            'abstract', 'assert', 'break', 'case', 'catch',
            'class', 'const', 'continue', 'default', 'do',
            'else', 'enum', 'extends', 'final', 'finally', 'for',
            'goto', 'if', 'implements', 'import', 'instanceof',
            'interface', 'native', 'new', 'package', 'private',
            'protected', 'public', 'return', 'static', 'strictfp',
            'super', 'switch', 'synchronized', 'this', 'throw', 'throws',
            'transient', 'try', 'volatile', 'while' 
    ), 'keyword', true);
    
    // Data Types
    $context->addKeywordGroup(array(
            'byte', 'short', 'int', 'long', 'float', 'double',
            'char', 'boolean', 'void'
    ), 'dtype', true);
    
    // Package java.util
    $context->addKeywordGroup(array(
            'AbstractCollection', 'AbstractList', 'AbstractMap', 
            'AbstractQueue', 'AbstractSequentialList', 'AbstractSet', 
            'ArrayList', 'Arrays', 'BitSet', 
            'Calendar', 'Collection', 'Collections', 
            'Comparator', 'ConcurrentModificationException', 'Currency', 
            'Date', 'Dictionary', 'DuplicateFormatFlagsException', 
            'EmptyStackException', 'EnumMap', 'EnumSet', 
            'Enumeration', 'EventListener', 'EventListenerProxy', 
            'EventObject', 'FormatFlagsConversionMismatchException', 'Formattable', 
            'FormattableFlags', 'Formatter', 'Formatter.BigDecimalLayoutForm', 
            'FormatterClosedException', 'GregorianCalendar', 'HashMap', 
            'HashSet', 'Hashtable', 'IdentityHashMap', 
            'IllegalFormatCodePointException', 'IllegalFormatConversionException', 'IllegalFormatException', 
            'IllegalFormatFlagsException', 'IllegalFormatPrecisionException', 'IllegalFormatWidthException', 
            'InputMismatchException', 'InvalidPropertiesFormatException', 'Iterator', 
            'LinkedHashMap', 'LinkedHashSet', 'LinkedList', 
            'List', 'ListIterator', 'ListResourceBundle', 
            'Locale', 'Map', 'Map.Entry', 
            'MissingFormatArgumentException', 'MissingFormatWidthException', 'MissingResourceException', 
            'NoSuchElementException', 'Observable', 'Observer', 
            'PriorityQueue', 'Properties', 'PropertyPermission', 
            'PropertyResourceBundle', 'Queue', 'Random', 
            'RandomAccess', 'ResourceBundle', 'Scanner', 
            'Set', 'SimpleTimeZone', 'SortedMap', 
            'SortedSet', 'Stack', 'StringTokenizer', 
            'TimeZone', 'Timer', 'TimerTask', 
            'TooManyListenersException', 'TreeMap', 'TreeSet', 
            'UUID', 'UnknownFormatConversionException', 'UnknownFormatFlagsException', 
            'Vector', 'WeakHashMap'
    ), 'java/java/java/util', true, 'http://java.sun.com/j2se/1.5.0/docs/api/java/util/{FNAME}.html');
    
    // Package java.lang
    $context->addKeywordGroup(
        array(
            'AbstractMethodError', 'Annotation Types', 'Appendable', 
            'ArithmeticException', 'ArrayIndexOutOfBoundsException', 'ArrayStoreException', 
            'AssertionError', 'Boolean', 'Byte', 
            'CharSequence', 'Character', 'Character.Subset', 
            'Character.UnicodeBlock', 'Class', 'ClassCastException', 
            'ClassCircularityError', 'ClassFormatError', 'ClassLoader', 
            'ClassNotFoundException', 'CloneNotSupportedException', 'Cloneable', 
            'Comparable', 'Compiler', 'Deprecated', 
            'Double', 'Enum', 'EnumConstantNotPresentException', 
            'Error', 'Exception', 'ExceptionInInitializerError', 
            'Float', 'IllegalAccessError', 'IllegalAccessException', 
            'IllegalArgumentException', 'IllegalMonitorStateException', 'IllegalStateException', 
            'IllegalThreadStateException', 'IncompatibleClassChangeError', 'IndexOutOfBoundsException', 
            'InheritableThreadLocal', 'InstantiationError', 'InstantiationException', 
            'Integer', 'InternalError', 'InterruptedException', 
            'Iterable', 'LinkageError', 'Long', 
            'Math', 'NegativeArraySizeException', 'NoClassDefFoundError', 
            'NoSuchFieldError', 'NoSuchFieldException', 'NoSuchMethodError', 
            'NoSuchMethodException', 'NullPointerException', 'Number', 
            'NumberFormatException', 'Object', 'OutOfMemoryError', 
            'Override', 'Package', 'Process', 
            'ProcessBuilder', 'Readable', 'Runnable', 
            'Runtime', 'RuntimeException', 'RuntimePermission', 
            'SecurityException', 'SecurityManager', 'Short', 
            'StackOverflowError', 'StackTraceElement', 'StrictMath', 
            'String', 'StringBuffer', 'StringBuilder', 
            'StringIndexOutOfBoundsException', 'SuppressWarnings', 'System', 
            'Thread', 'Thread.State', 'Thread.UncaughtExceptionHandler', 
            'ThreadDeath', 'ThreadGroup', 'ThreadLocal', 
            'Throwable', 'TypeNotPresentException', 'UnknownError', 
            'UnsatisfiedLinkError', 'UnsupportedClassVersionError', 'UnsupportedOperationException', 
            'VerifyError', 'VirtualMachineError', 'Void'
    ), 'java/java/java/lang', false, 'http://java.sun.com/j2se/1.5.0/docs/api/java/lang/{FNAME}.html');
    
    // Package javax.swing
    $context->addKeywordGroup(
        array(
            'AbstractAction', 'AbstractButton', 'AbstractCellEditor', 
            'AbstractListModel', 'AbstractSpinnerModel', 'Action', 
            'ActionMap', 'BorderFactory', 'BoundedRangeModel', 
            'Box', 'Box.Filler', 'BoxLayout', 
            'ButtonGroup', 'ButtonModel', 'CellEditor', 
            'CellRendererPane', 'ComboBoxEditor', 'ComboBoxModel', 
            'ComponentInputMap', 'DebugGraphics', 'DefaultBoundedRangeModel', 
            'DefaultButtonModel', 'DefaultCellEditor', 'DefaultComboBoxModel', 
            'DefaultDesktopManager', 'DefaultFocusManager', 'DefaultListCellRenderer', 
            'DefaultListCellRenderer.UIResource', 'DefaultListModel', 'DefaultListSelectionModel', 
            'DefaultSingleSelectionModel', 'DesktopManager', 'FocusManager', 
            'GrayFilter', 'Icon', 'ImageIcon', 
            'InputMap', 'InputVerifier', 'InternalFrameFocusTraversalPolicy', 
            'JApplet', 'JButton', 'JCheckBox', 
            'JCheckBoxMenuItem', 'JColorChooser', 'JComboBox', 
            'JComboBox.KeySelectionManager', 'JComponent', 'JDesktopPane', 
            'JDialog', 'JEditorPane', 'JFileChooser', 
            'JFormattedTextField', 'JFormattedTextField.AbstractFormatter', 'JFormattedTextField.AbstractFormatterFactory', 
            'JFrame', 'JInternalFrame', 'JInternalFrame.JDesktopIcon', 
            'JLabel', 'JLayeredPane', 'JList', 
            'JMenu', 'JMenuBar', 'JMenuItem', 
            'JOptionPane', 'JPanel', 'JPasswordField', 
            'JPopupMenu', 'JPopupMenu.Separator', 'JProgressBar', 
            'JRadioButton', 'JRadioButtonMenuItem', 'JRootPane', 
            'JScrollBar', 'JScrollPane', 'JSeparator', 
            'JSlider', 'JSpinner', 'JSpinner.DateEditor', 
            'JSpinner.DefaultEditor', 'JSpinner.ListEditor', 'JSpinner.NumberEditor', 
            'JSplitPane', 'JTabbedPane', 'JTable', 
            'JTable.PrintMode', 'JTextArea', 'JTextField', 
            'JTextPane', 'JToggleButton', 'JToggleButton.ToggleButtonModel', 
            'JToolBar', 'JToolBar.Separator', 'JToolTip', 
            'JTree', 'JTree.DynamicUtilTreeNode', 'JTree.EmptySelectionModel', 
            'JViewport', 'JWindow', 'KeyStroke', 
            'LayoutFocusTraversalPolicy', 'ListCellRenderer', 'ListModel', 
            'ListSelectionModel', 'LookAndFeel', 'MenuElement', 
            'MenuSelectionManager', 'MutableComboBoxModel', 'OverlayLayout', 
            'Popup', 'PopupFactory', 'ProgressMonitor', 
            'ProgressMonitorInputStream', 'Renderer', 'RepaintManager', 
            'RootPaneContainer', 'ScrollPaneConstants', 'ScrollPaneLayout', 
            'ScrollPaneLayout.UIResource', 'Scrollable', 'SingleSelectionModel', 
            'SizeRequirements', 'SizeSequence', 'SortingFocusTraversalPolicy', 
            'SpinnerDateModel', 'SpinnerListModel', 'SpinnerModel', 
            'SpinnerNumberModel', 'Spring', 'SpringLayout', 
            'SpringLayout.Constraints', 'SwingConstants', 'SwingUtilities', 
            'Timer', 'ToolTipManager', 'TransferHandler', 
            'UIDefaults', 'UIDefaults.ActiveValue', 'UIDefaults.LazyInputMap', 
            'UIDefaults.LazyValue', 'UIDefaults.ProxyLazyValue', 'UIManager', 
            'UIManager.LookAndFeelInfo', 'UnsupportedLookAndFeelException', 'ViewportLayout', 
            'WindowConstants'
    ), 'java/java/javax/swing', true, 'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/{FNAME}.html');
    
    // Constants
    $context->addKeywordGroup(array(
            'false', 'null', 'true'
    ), 'const', true);
    
    $context->setCharactersDisallowedBeforeKeywords("'");
    $context->setCharactersDisallowedAfterKeywords("'");
    
    // Symbols
    $context->addSymbolGroup(array(
        '(', ')', ',', ';', ':', '[', ']',
        '+', '-', '*', '%', '/', '&', '|', '!', '?', 
        '<', '>', '{', '}', '=', '.', '@'
    ), 'symbol');

    // Numbers
    $context->useStandardIntegers();
    $context->useStandardDoubles();

    // Objects
    $context->addObjectSplitter('.', 'ootoken', 'symbol');

    $context->setComplexFlag(GESHI_COMPLEX_TOKENISE);    
}

function geshi_java_java_single_string (&$context)
{
    $context->addDelimiters("'", "'");
    $context->setEscapeCharacters('\\');
    $context->setCharactersToEscape(array('\\', "'"));
    $context->setComplexFlag(GESHI_COMPLEX_PASSALL);
    //$context->_contextStyleType = GESHI_STYLE_STRINGS;
}

function geshi_java_java_double_string (&$context)
{
    $context->addDelimiters('"', array('"', "\n"));
    $context->setEscapeCharacters('\\');
    $context->setCharactersToEscape(array('n', 'r', 't', '\\', '"', "\n"));
    // @todo may be able to do this a better way (not using constants), and not so many calls?
    $context->setComplexFlag(GESHI_COMPLEX_PASSALL);
    // @todo dunno about this one yet    
    //$context->_contextStyleType = GESHI_STYLE_STRINGS;
}

function geshi_java_java_single_comment (&$context)
{
    $context->addDelimiters('//', "\n");
    $context->setComplexFlag(GESHI_COMPLEX_PASSALL);
    //$this->_contextStyleType = GESHI_STYLE_COMMENTS;
}

function geshi_java_java_multi_comment (&$context)
{
    $context->addDelimiters('/*', '*/');
    $context->setComplexFlag(GESHI_COMPLEX_PASSALL);
    //$this->_contextStyleType = GESHI_STYLE_COMMENTS;
}

?>