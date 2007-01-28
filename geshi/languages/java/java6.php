<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * <pre>
 *   File:   geshi/languages/java/java6.php
 *   Author: Tim Wright
 *   E-mail: wrighttimo@gmail.com
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
 * @author     Tim Wright <wrighttimo@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2005 - 2007 Tim Wright, Nigel McNie
 * @version    $Id: java.php 882 2007-01-11 10:39:27Z oracleshinoda $
 *
 */
 
 /**#@+
 * @access private
 */
 
/** Get the GeSHiSingleCharContext class */
require_once GESHI_CLASSES_ROOT . 'class.geshisinglecharcontext.php';

function geshi_java_java6 (&$context)
{
    // Children of java context
    $context->addChild('double_string', 'string');
    $context->addChild('single_string', 'singlechar');
    $context->addChild('single_comment');
    $context->addChild('multi_comment');
    // Doxygen is used for highlighting javadoc comments
    $context->addChildLanguage('doxygen/doxygen', '/**', '*/', false, GESHI_CHILD_PARSE_BOTH);
    
    // Keyword groups
    
    // Keywords
    $context->addKeywordGroup(array(
            'abstract', 'assert', 'break', 'case', 'catch',
            'class', 'const', 'continue', 'default', 'do',
            'else', 'extends', 'final', 'finally', 'for',
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
    

	$context->addKeywordGroup(array(
	//java.applet
			'Applet', 'AppletContext', 'AppletStub', 
			'AudioClip'),

		 'java/java6/java/applet',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/applet/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.awt
			'AWTError', 'AWTEvent', 'AWTEventMulticaster', 
			'AWTException', 'AWTKeyStroke', 'AWTPermission', 
			'ActiveEvent', 'Adjustable', 'AlphaComposite', 
			'BasicStroke', 'BorderLayout', 'BufferCapabilities', 
			'BufferCapabilities.FlipContents', 'Button', 'Canvas', 
			'CardLayout', 'Checkbox', 'CheckboxGroup', 
			'CheckboxMenuItem', 'Choice', 'Color', 
			'Component', 'Component.BaselineResizeBehavior', 'ComponentOrientation', 
			'Composite', 'CompositeContext', 'Container', 
			'ContainerOrderFocusTraversalPolicy', 'Cursor', 'DefaultFocusTraversalPolicy', 
			'DefaultKeyboardFocusManager', 'Desktop', 'Desktop.Action', 
			'Dialog', 'Dialog.ModalExclusionType', 'Dialog.ModalityType', 
			'Dimension', 'DisplayMode', 'Enums', 
			'Event', 'EventQueue', 'FileDialog', 
			'FlowLayout', 'FocusTraversalPolicy', 'Font', 
			'FontFormatException', 'FontMetrics', 'Frame', 
			'GradientPaint', 'Graphics', 'Graphics2D', 
			'GraphicsConfigTemplate', 'GraphicsConfiguration', 'GraphicsDevice', 
			'GraphicsEnvironment', 'GridBagConstraints', 'GridBagLayout', 
			'GridBagLayoutInfo', 'GridLayout', 'HeadlessException', 
			'IllegalComponentStateException', 'Image', 'ImageCapabilities', 
			'Insets', 'ItemSelectable', 'JobAttributes', 
			'JobAttributes.DefaultSelectionType', 'JobAttributes.DestinationType', 'JobAttributes.DialogType', 
			'JobAttributes.MultipleDocumentHandlingType', 'JobAttributes.SidesType', 'KeyEventDispatcher', 
			'KeyEventPostProcessor', 'KeyboardFocusManager', 'Label', 
			'LayoutManager', 'LayoutManager2', 'LinearGradientPaint', 
			'List', 'MediaTracker', 'Menu', 
			'MenuBar', 'MenuComponent', 'MenuContainer', 
			'MenuItem', 'MenuShortcut', 'MouseInfo', 
			'MultipleGradientPaint', 'MultipleGradientPaint.ColorSpaceType', 'MultipleGradientPaint.CycleMethod', 
			'PageAttributes', 'PageAttributes.ColorType', 'PageAttributes.MediaType', 
			'PageAttributes.OrientationRequestedType', 'PageAttributes.OriginType', 'PageAttributes.PrintQualityType', 
			'Paint', 'PaintContext', 'Panel', 
			'Point', 'PointerInfo', 'Polygon', 
			'PopupMenu', 'PrintGraphics', 'PrintJob', 
			'RadialGradientPaint', 'Rectangle', 'RenderingHints', 
			'RenderingHints.Key', 'Robot', 'ScrollPane', 
			'ScrollPaneAdjustable', 'Scrollbar', 'Shape', 
			'SplashScreen', 'Stroke', 'SystemColor', 
			'SystemTray', 'TextArea', 'TextComponent', 
			'TextField', 'TexturePaint', 'Toolkit', 
			'Transparency', 'TrayIcon', 'TrayIcon.MessageType', 
			'Window'),

		 'java/java6/java/awt',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/awt/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.awt.color
			'CMMException', 'ColorSpace', 'ICC_ColorSpace', 
			'ICC_Profile', 'ICC_ProfileGray', 'ICC_ProfileRGB', 
			'ProfileDataException'),

		 'java/java6/java/awt/color',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/awt/color/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.awt.datatransfer
			'Clipboard', 'ClipboardOwner', 'DataFlavor', 
			'FlavorEvent', 'FlavorListener', 'FlavorMap', 
			'FlavorTable', 'MimeTypeParseException', 'StringSelection', 
			'SystemFlavorMap', 'Transferable', 'UnsupportedFlavorException'),

		 'java/java6/java/awt/datatransfer',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/awt/datatransfer/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.awt.dnd
			'Autoscroll', 'DnDConstants', 'DragGestureEvent', 
			'DragGestureListener', 'DragGestureRecognizer', 'DragSource', 
			'DragSourceAdapter', 'DragSourceContext', 'DragSourceDragEvent', 
			'DragSourceDropEvent', 'DragSourceEvent', 'DragSourceListener', 
			'DragSourceMotionListener', 'DropTarget', 'DropTarget.DropTargetAutoScroller', 
			'DropTargetAdapter', 'DropTargetContext', 'DropTargetDragEvent', 
			'DropTargetDropEvent', 'DropTargetEvent', 'DropTargetListener', 
			'InvalidDnDOperationException', 'MouseDragGestureRecognizer'),

		 'java/java6/java/awt/dnd',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/awt/dnd/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.awt.event
			'AWTEventListener', 'AWTEventListenerProxy', 'ActionEvent', 
			'ActionListener', 'AdjustmentEvent', 'AdjustmentListener', 
			'ComponentAdapter', 'ComponentEvent', 'ComponentListener', 
			'ContainerAdapter', 'ContainerEvent', 'ContainerListener', 
			'FocusAdapter', 'FocusEvent', 'FocusListener', 
			'HierarchyBoundsAdapter', 'HierarchyBoundsListener', 'HierarchyEvent', 
			'HierarchyListener', 'InputEvent', 'InputMethodEvent', 
			'InputMethodListener', 'InvocationEvent', 'ItemEvent', 
			'ItemListener', 'KeyAdapter', 'KeyEvent', 
			'KeyListener', 'MouseAdapter', 'MouseEvent', 
			'MouseListener', 'MouseMotionAdapter', 'MouseMotionListener', 
			'MouseWheelEvent', 'MouseWheelListener', 'PaintEvent', 
			'TextEvent', 'TextListener', 'WindowAdapter', 
			'WindowEvent', 'WindowFocusListener', 'WindowListener', 
			'WindowStateListener'),

		 'java/java6/java/awt/event',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/awt/event/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.awt.font
			'FontRenderContext', 'GlyphJustificationInfo', 'GlyphMetrics', 
			'GlyphVector', 'GraphicAttribute', 'ImageGraphicAttribute', 
			'LayoutPath', 'LineBreakMeasurer', 'LineMetrics', 
			'MultipleMaster', 'NumericShaper', 'OpenType', 
			'ShapeGraphicAttribute', 'TextAttribute', 'TextHitInfo', 
			'TextLayout', 'TextLayout.CaretPolicy', 'TextMeasurer', 
			'TransformAttribute'),

		 'java/java6/java/awt/font',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/awt/font/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.awt.geom
			'AffineTransform', 'Arc2D', 'Arc2D.Double', 
			'Arc2D.Float', 'Area', 'CubicCurve2D', 
			'CubicCurve2D.Double', 'CubicCurve2D.Float', 'Dimension2D', 
			'Ellipse2D', 'Ellipse2D.Double', 'Ellipse2D.Float', 
			'FlatteningPathIterator', 'GeneralPath', 'IllegalPathStateException', 
			'Line2D', 'Line2D.Double', 'Line2D.Float', 
			'NoninvertibleTransformException', 'Path2D', 'Path2D.Double', 
			'Path2D.Float', 'PathIterator', 'Point2D', 
			'Point2D.Double', 'Point2D.Float', 'QuadCurve2D', 
			'QuadCurve2D.Double', 'QuadCurve2D.Float', 'Rectangle2D', 
			'Rectangle2D.Double', 'Rectangle2D.Float', 'RectangularShape', 
			'RoundRectangle2D', 'RoundRectangle2D.Double', 'RoundRectangle2D.Float'),

		 'java/java6/java/awt/geom',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/awt/geom/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.awt.im
			'InputContext', 'InputMethodHighlight', 'InputMethodRequests', 
			'InputSubset'),

		 'java/java6/java/awt/im',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/awt/im/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.awt.im.spi
			'InputMethod', 'InputMethodContext', 'InputMethodDescriptor'),

		 'java/java6/java/awt/im/spi',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/awt/im/spi/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.awt.image
			'AffineTransformOp', 'AreaAveragingScaleFilter', 'BandCombineOp', 
			'BandedSampleModel', 'BufferStrategy', 'BufferedImage', 
			'BufferedImageFilter', 'BufferedImageOp', 'ByteLookupTable', 
			'ColorConvertOp', 'ColorModel', 'ComponentColorModel', 
			'ComponentSampleModel', 'ConvolveOp', 'CropImageFilter', 
			'DataBuffer', 'DataBufferByte', 'DataBufferDouble', 
			'DataBufferFloat', 'DataBufferInt', 'DataBufferShort', 
			'DataBufferUShort', 'DirectColorModel', 'FilteredImageSource', 
			'ImageConsumer', 'ImageFilter', 'ImageObserver', 
			'ImageProducer', 'ImagingOpException', 'IndexColorModel', 
			'Kernel', 'LookupOp', 'LookupTable', 
			'MemoryImageSource', 'MultiPixelPackedSampleModel', 'PackedColorModel', 
			'PixelGrabber', 'PixelInterleavedSampleModel', 'RGBImageFilter', 
			'Raster', 'RasterFormatException', 'RasterOp', 
			'RenderedImage', 'ReplicateScaleFilter', 'RescaleOp', 
			'SampleModel', 'ShortLookupTable', 'SinglePixelPackedSampleModel', 
			'TileObserver', 'VolatileImage', 'WritableRaster', 
			'WritableRenderedImage'),

		 'java/java6/java/awt/image',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/awt/image/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.awt.image.renderable
			'ContextualRenderedImageFactory', 'ParameterBlock', 'RenderContext', 
			'RenderableImage', 'RenderableImageOp', 'RenderableImageProducer', 
			'RenderedImageFactory'),

		 'java/java6/java/awt/image/renderable',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/awt/image/renderable/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.awt.print
			'Book', 'PageFormat', 'Pageable', 
			'Paper', 'Printable', 'PrinterAbortException', 
			'PrinterException', 'PrinterGraphics', 'PrinterIOException', 
			'PrinterJob'),

		 'java/java6/java/awt/print',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/awt/print/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.beans
			'AppletInitializer', 'BeanDescriptor', 'BeanInfo', 
			'Beans', 'ConstructorProperties', 'Customizer', 
			'DefaultPersistenceDelegate', 'DesignMode', 'Encoder', 
			'EventHandler', 'EventSetDescriptor', 'ExceptionListener', 
			'Expression', 'FeatureDescriptor', 'IndexedPropertyChangeEvent', 
			'IndexedPropertyDescriptor', 'IntrospectionException', 'Introspector', 
			'MethodDescriptor', 'ParameterDescriptor', 'PersistenceDelegate', 
			'PropertyChangeEvent', 'PropertyChangeListener', 'PropertyChangeListenerProxy', 
			'PropertyChangeSupport', 'PropertyDescriptor', 'PropertyEditor', 
			'PropertyEditorManager', 'PropertyEditorSupport', 'PropertyVetoException', 
			'SimpleBeanInfo', 'Statement', 'VetoableChangeListener', 
			'VetoableChangeListenerProxy', 'VetoableChangeSupport', 'Visibility', 
			'XMLDecoder', 'XMLEncoder'),

		 'java/java6/java/beans',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/beans/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.beans.beancontext
			'BeanContext', 'BeanContextChild', 'BeanContextChildComponentProxy', 
			'BeanContextChildSupport', 'BeanContextContainerProxy', 'BeanContextEvent', 
			'BeanContextMembershipEvent', 'BeanContextMembershipListener', 'BeanContextProxy', 
			'BeanContextServiceAvailableEvent', 'BeanContextServiceProvider', 'BeanContextServiceProviderBeanInfo', 
			'BeanContextServiceRevokedEvent', 'BeanContextServiceRevokedListener', 'BeanContextServices', 
			'BeanContextServicesListener', 'BeanContextServicesSupport', 'BeanContextServicesSupport.BCSSServiceProvider', 
			'BeanContextSupport', 'BeanContextSupport.BCSIterator'),

		 'java/java6/java/beans/beancontext',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/beans/beancontext/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.io
			'BufferedInputStream', 'BufferedOutputStream', 'BufferedReader', 
			'BufferedWriter', 'ByteArrayInputStream', 'ByteArrayOutputStream', 
			'CharArrayReader', 'CharArrayWriter', 'CharConversionException', 
			'Closeable', 'Console', 'DataInput', 
			'DataInputStream', 'DataOutput', 'DataOutputStream', 
			'EOFException', 'Externalizable', 'File', 
			'FileDescriptor', 'FileFilter', 'FileInputStream', 
			'FileNotFoundException', 'FileOutputStream', 'FilePermission', 
			'FileReader', 'FileWriter', 'FilenameFilter', 
			'FilterInputStream', 'FilterOutputStream', 'FilterReader', 
			'FilterWriter', 'Flushable', 'IOError', 
			'IOException', 'InputStream', 'InputStreamReader', 
			'InterruptedIOException', 'InvalidClassException', 'InvalidObjectException', 
			'LineNumberInputStream', 'LineNumberReader', 'NotActiveException', 
			'NotSerializableException', 'ObjectInput', 'ObjectInputStream', 
			'ObjectInputStream.GetField', 'ObjectInputValidation', 'ObjectOutput', 
			'ObjectOutputStream', 'ObjectOutputStream.PutField', 'ObjectStreamClass', 
			'ObjectStreamConstants', 'ObjectStreamException', 'ObjectStreamField', 
			'OptionalDataException', 'OutputStream', 'OutputStreamWriter', 
			'PipedInputStream', 'PipedOutputStream', 'PipedReader', 
			'PipedWriter', 'PrintStream', 'PrintWriter', 
			'PushbackInputStream', 'PushbackReader', 'RandomAccessFile', 
			'Reader', 'SequenceInputStream', 'Serializable', 
			'SerializablePermission', 'StreamCorruptedException', 'StreamTokenizer', 
			'StringBufferInputStream', 'StringReader', 'StringWriter', 
			'SyncFailedException', 'UTFDataFormatException', 'UnsupportedEncodingException', 
			'WriteAbortedException', 'Writer'),

		 'java/java6/java/io',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/io/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.lang
			'AbstractMethodError', 'Appendable', 'ArithmeticException', 
			'ArrayIndexOutOfBoundsException', 'ArrayStoreException', 'AssertionError', 
			'Boolean', 'Byte', 'CharSequence', 
			'Character', 'Character.Subset', 'Character.UnicodeBlock', 
			'Class', 'ClassCastException', 'ClassCircularityError', 
			'ClassFormatError', 'ClassLoader', 'ClassNotFoundException', 
			'CloneNotSupportedException', 'Cloneable', 'Comparable', 
			'Compiler', 'Deprecated', 'Double', 
			'Enum', 'EnumConstantNotPresentException', 'Enums', 
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
			'VerifyError', 'VirtualMachineError', 'Void'),

		 'java/java6/java/lang',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/lang/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.lang.annotation
			'Annotation', 'AnnotationFormatError', 'AnnotationTypeMismatchException', 
			'Documented', 'ElementType', 'IncompleteAnnotationException', 
			'Inherited', 'Retention', 'RetentionPolicy', 
			'Target'),

		 'java/java6/java/lang/annotation',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/lang/annotation/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.lang.instrument
			'ClassDefinition', 'ClassFileTransformer', 'IllegalClassFormatException', 
			'Instrumentation', 'UnmodifiableClassException'),

		 'java/java6/java/lang/instrument',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/lang/instrument/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.lang.management
			'ClassLoadingMXBean', 'CompilationMXBean', 'GarbageCollectorMXBean', 
			'LockInfo', 'ManagementFactory', 'ManagementPermission', 
			'MemoryMXBean', 'MemoryManagerMXBean', 'MemoryNotificationInfo', 
			'MemoryPoolMXBean', 'MemoryType', 'MemoryUsage', 
			'MonitorInfo', 'OperatingSystemMXBean', 'RuntimeMXBean', 
			'ThreadInfo', 'ThreadMXBean'),

		 'java/java6/java/lang/management',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/lang/management/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.lang.ref
			'PhantomReference', 'Reference', 'ReferenceQueue', 
			'SoftReference', 'WeakReference'),

		 'java/java6/java/lang/ref',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/lang/ref/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.lang.reflect
			'AccessibleObject', 'AnnotatedElement', 'Array', 
			'Constructor', 'Field', 'GenericArrayType', 
			'GenericDeclaration', 'GenericSignatureFormatError', 'InvocationHandler', 
			'InvocationTargetException', 'MalformedParameterizedTypeException', 'Member', 
			'Method', 'Modifier', 'ParameterizedType', 
			'Proxy', 'ReflectPermission', 'Type', 
			'TypeVariable', 'UndeclaredThrowableException', 'WildcardType'),

		 'java/java6/java/lang/reflect',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/lang/reflect/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.math
			'BigDecimal', 'BigInteger', 'MathContext', 
			'RoundingMode'),

		 'java/java6/java/math',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/math/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.net
			'Authenticator', 'Authenticator.RequestorType', 'BindException', 
			'CacheRequest', 'CacheResponse', 'ConnectException', 
			'ContentHandler', 'ContentHandlerFactory', 'CookieHandler', 
			'CookieManager', 'CookiePolicy', 'CookieStore', 
			'DatagramPacket', 'DatagramSocket', 'DatagramSocketImpl', 
			'DatagramSocketImplFactory', 'FileNameMap', 'HttpCookie', 
			'HttpRetryException', 'HttpURLConnection', 'IDN', 
			'Inet4Address', 'Inet6Address', 'InetAddress', 
			'InetSocketAddress', 'InterfaceAddress', 'JarURLConnection', 
			'MalformedURLException', 'MulticastSocket', 'NetPermission', 
			'NetworkInterface', 'NoRouteToHostException', 'PasswordAuthentication', 
			'PortUnreachableException', 'ProtocolException', 'Proxy', 
			'Proxy.Type', 'ProxySelector', 'ResponseCache', 
			'SecureCacheResponse', 'ServerSocket', 'Socket', 
			'SocketAddress', 'SocketException', 'SocketImpl', 
			'SocketImplFactory', 'SocketOptions', 'SocketPermission', 
			'SocketTimeoutException', 'URI', 'URISyntaxException', 
			'URL', 'URLClassLoader', 'URLConnection', 
			'URLDecoder', 'URLEncoder', 'URLStreamHandler', 
			'URLStreamHandlerFactory', 'UnknownHostException', 'UnknownServiceException'),

		 'java/java6/java/net',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/net/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.nio
			'Buffer', 'BufferOverflowException', 'BufferUnderflowException', 
			'ByteBuffer', 'ByteOrder', 'CharBuffer', 
			'DoubleBuffer', 'FloatBuffer', 'IntBuffer', 
			'InvalidMarkException', 'LongBuffer', 'MappedByteBuffer', 
			'ReadOnlyBufferException', 'ShortBuffer'),

		 'java/java6/java/nio',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/nio/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.nio.channels
			'AlreadyConnectedException', 'AsynchronousCloseException', 'ByteChannel', 
			'CancelledKeyException', 'Channel', 'Channels', 
			'ClosedByInterruptException', 'ClosedChannelException', 'ClosedSelectorException', 
			'ConnectionPendingException', 'DatagramChannel', 'FileChannel', 
			'FileChannel.MapMode', 'FileLock', 'FileLockInterruptionException', 
			'GatheringByteChannel', 'IllegalBlockingModeException', 'IllegalSelectorException', 
			'InterruptibleChannel', 'NoConnectionPendingException', 'NonReadableChannelException', 
			'NonWritableChannelException', 'NotYetBoundException', 'NotYetConnectedException', 
			'OverlappingFileLockException', 'Pipe', 'Pipe.SinkChannel', 
			'Pipe.SourceChannel', 'ReadableByteChannel', 'ScatteringByteChannel', 
			'SelectableChannel', 'SelectionKey', 'Selector', 
			'ServerSocketChannel', 'SocketChannel', 'UnresolvedAddressException', 
			'UnsupportedAddressTypeException', 'WritableByteChannel'),

		 'java/java6/java/nio/channels',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/nio/channels/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.nio.channels.spi
			'AbstractInterruptibleChannel', 'AbstractSelectableChannel', 'AbstractSelectionKey', 
			'AbstractSelector', 'SelectorProvider'),

		 'java/java6/java/nio/channels/spi',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/nio/channels/spi/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.nio.charset
			'CharacterCodingException', 'Charset', 'CharsetDecoder', 
			'CharsetEncoder', 'CoderMalfunctionError', 'CoderResult', 
			'CodingErrorAction', 'IllegalCharsetNameException', 'MalformedInputException', 
			'UnmappableCharacterException', 'UnsupportedCharsetException'),

		 'java/java6/java/nio/charset',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/nio/charset/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.nio.charset.spi
			'CharsetProvider'),

		 'java/java6/java/nio/charset/spi',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/nio/charset/spi/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.rmi
			'AccessException', 'AlreadyBoundException', 'ConnectException', 
			'ConnectIOException', 'MarshalException', 'MarshalledObject', 
			'Naming', 'NoSuchObjectException', 'NotBoundException', 
			'RMISecurityException', 'RMISecurityManager', 'Remote', 
			'RemoteException', 'ServerError', 'ServerException', 
			'ServerRuntimeException', 'StubNotFoundException', 'UnexpectedException', 
			'UnknownHostException', 'UnmarshalException'),

		 'java/java6/java/rmi',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/rmi/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.rmi.activation
			'Activatable', 'ActivateFailedException', 'ActivationDesc', 
			'ActivationException', 'ActivationGroup', 'ActivationGroupDesc', 
			'ActivationGroupDesc.CommandEnvironment', 'ActivationGroupID', 'ActivationGroup_Stub', 
			'ActivationID', 'ActivationInstantiator', 'ActivationMonitor', 
			'ActivationSystem', 'Activator', 'UnknownGroupException', 
			'UnknownObjectException'),

		 'java/java6/java/rmi/activation',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/rmi/activation/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.rmi.dgc
			'DGC', 'Lease', 'VMID'),

		 'java/java6/java/rmi/dgc',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/rmi/dgc/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.rmi.registry
			'LocateRegistry', 'Registry', 'RegistryHandler'),

		 'java/java6/java/rmi/registry',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/rmi/registry/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.rmi.server
			'ExportException', 'LoaderHandler', 'LogStream', 
			'ObjID', 'Operation', 'RMIClassLoader', 
			'RMIClassLoaderSpi', 'RMIClientSocketFactory', 'RMIFailureHandler', 
			'RMIServerSocketFactory', 'RMISocketFactory', 'RemoteCall', 
			'RemoteObject', 'RemoteObjectInvocationHandler', 'RemoteRef', 
			'RemoteServer', 'RemoteStub', 'ServerCloneException', 
			'ServerNotActiveException', 'ServerRef', 'Skeleton', 
			'SkeletonMismatchException', 'SkeletonNotFoundException', 'SocketSecurityException', 
			'UID', 'UnicastRemoteObject', 'Unreferenced'),

		 'java/java6/java/rmi/server',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/rmi/server/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.security
			'AccessControlContext', 'AccessControlException', 'AccessController', 
			'AlgorithmParameterGenerator', 'AlgorithmParameterGeneratorSpi', 'AlgorithmParameters', 
			'AlgorithmParametersSpi', 'AllPermission', 'AuthProvider', 
			'BasicPermission', 'Certificate', 'CodeSigner', 
			'CodeSource', 'DigestException', 'DigestInputStream', 
			'DigestOutputStream', 'DomainCombiner', 'GeneralSecurityException', 
			'Guard', 'GuardedObject', 'Identity', 
			'IdentityScope', 'InvalidAlgorithmParameterException', 'InvalidKeyException', 
			'InvalidParameterException', 'Key', 'KeyException', 
			'KeyFactory', 'KeyFactorySpi', 'KeyManagementException', 
			'KeyPair', 'KeyPairGenerator', 'KeyPairGeneratorSpi', 
			'KeyRep', 'KeyRep.Type', 'KeyStore', 
			'KeyStore.Builder', 'KeyStore.CallbackHandlerProtection', 'KeyStore.Entry', 
			'KeyStore.LoadStoreParameter', 'KeyStore.PasswordProtection', 'KeyStore.PrivateKeyEntry', 
			'KeyStore.ProtectionParameter', 'KeyStore.SecretKeyEntry', 'KeyStore.TrustedCertificateEntry', 
			'KeyStoreException', 'KeyStoreSpi', 'MessageDigest', 
			'MessageDigestSpi', 'NoSuchAlgorithmException', 'NoSuchProviderException', 
			'Permission', 'PermissionCollection', 'Permissions', 
			'Policy', 'Policy.Parameters', 'PolicySpi', 
			'Principal', 'PrivateKey', 'PrivilegedAction', 
			'PrivilegedActionException', 'PrivilegedExceptionAction', 'ProtectionDomain', 
			'Provider', 'Provider.Service', 'ProviderException', 
			'PublicKey', 'SecureClassLoader', 'SecureRandom', 
			'SecureRandomSpi', 'Security', 'SecurityPermission', 
			'Signature', 'SignatureException', 'SignatureSpi', 
			'SignedObject', 'Signer', 'Timestamp', 
			'URIParameter', 'UnrecoverableEntryException', 'UnrecoverableKeyException', 
			'UnresolvedPermission'),

		 'java/java6/java/security',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/security/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.security.acl
			'Acl', 'AclEntry', 'AclNotFoundException', 
			'Group', 'LastOwnerException', 'NotOwnerException', 
			'Owner', 'Permission'),

		 'java/java6/java/security/acl',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/security/acl/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.security.cert
			'CRL', 'CRLException', 'CRLSelector', 
			'CertPath', 'CertPath.CertPathRep', 'CertPathBuilder', 
			'CertPathBuilderException', 'CertPathBuilderResult', 'CertPathBuilderSpi', 
			'CertPathParameters', 'CertPathValidator', 'CertPathValidatorException', 
			'CertPathValidatorResult', 'CertPathValidatorSpi', 'CertSelector', 
			'CertStore', 'CertStoreException', 'CertStoreParameters', 
			'CertStoreSpi', 'Certificate', 'Certificate.CertificateRep', 
			'CertificateEncodingException', 'CertificateException', 'CertificateExpiredException', 
			'CertificateFactory', 'CertificateFactorySpi', 'CertificateNotYetValidException', 
			'CertificateParsingException', 'CollectionCertStoreParameters', 'LDAPCertStoreParameters', 
			'PKIXBuilderParameters', 'PKIXCertPathBuilderResult', 'PKIXCertPathChecker', 
			'PKIXCertPathValidatorResult', 'PKIXParameters', 'PolicyNode', 
			'PolicyQualifierInfo', 'TrustAnchor', 'X509CRL', 
			'X509CRLEntry', 'X509CRLSelector', 'X509CertSelector', 
			'X509Certificate', 'X509Extension'),

		 'java/java6/java/security/cert',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/security/cert/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.security.interfaces
			'DSAKey', 'DSAKeyPairGenerator', 'DSAParams', 
			'DSAPrivateKey', 'DSAPublicKey', 'ECKey', 
			'ECPrivateKey', 'ECPublicKey', 'RSAKey', 
			'RSAMultiPrimePrivateCrtKey', 'RSAPrivateCrtKey', 'RSAPrivateKey', 
			'RSAPublicKey'),

		 'java/java6/java/security/interfaces',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/security/interfaces/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.security.spec
			'AlgorithmParameterSpec', 'DSAParameterSpec', 'DSAPrivateKeySpec', 
			'DSAPublicKeySpec', 'ECField', 'ECFieldF2m', 
			'ECFieldFp', 'ECGenParameterSpec', 'ECParameterSpec', 
			'ECPoint', 'ECPrivateKeySpec', 'ECPublicKeySpec', 
			'EllipticCurve', 'EncodedKeySpec', 'InvalidKeySpecException', 
			'InvalidParameterSpecException', 'KeySpec', 'MGF1ParameterSpec', 
			'PKCS8EncodedKeySpec', 'PSSParameterSpec', 'RSAKeyGenParameterSpec', 
			'RSAMultiPrimePrivateCrtKeySpec', 'RSAOtherPrimeInfo', 'RSAPrivateCrtKeySpec', 
			'RSAPrivateKeySpec', 'RSAPublicKeySpec', 'X509EncodedKeySpec'),

		 'java/java6/java/security/spec',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/security/spec/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.sql
			'Array', 'BatchUpdateException', 'Blob', 
			'CallableStatement', 'ClientInfoStatus', 'Clob', 
			'Connection', 'DataTruncation', 'DatabaseMetaData', 
			'Date', 'Driver', 'DriverManager', 
			'DriverPropertyInfo', 'NClob', 'ParameterMetaData', 
			'PreparedStatement', 'Ref', 'ResultSet', 
			'ResultSetMetaData', 'RowId', 'RowIdLifetime', 
			'SQLClientInfoException', 'SQLData', 'SQLDataException', 
			'SQLException', 'SQLFeatureNotSupportedException', 'SQLInput', 
			'SQLIntegrityConstraintViolationException', 'SQLInvalidAuthorizationSpecException', 'SQLNonTransientConnectionException', 
			'SQLNonTransientException', 'SQLOutput', 'SQLPermission', 
			'SQLRecoverableException', 'SQLSyntaxErrorException', 'SQLTimeoutException', 
			'SQLTransactionRollbackException', 'SQLTransientConnectionException', 'SQLTransientException', 
			'SQLWarning', 'SQLXML', 'Savepoint', 
			'Statement', 'Struct', 'Time', 
			'Timestamp', 'Types', 'Wrapper'),

		 'java/java6/java/sql',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/sql/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.text
			'Annotation', 'AttributedCharacterIterator', 'AttributedCharacterIterator.Attribute', 
			'AttributedString', 'Bidi', 'BreakIterator', 
			'CharacterIterator', 'ChoiceFormat', 'CollationElementIterator', 
			'CollationKey', 'Collator', 'DateFormat', 
			'DateFormat.Field', 'DateFormatSymbols', 'DecimalFormat', 
			'DecimalFormatSymbols', 'FieldPosition', 'Format', 
			'Format.Field', 'MessageFormat', 'MessageFormat.Field', 
			'Normalizer', 'Normalizer.Form', 'NumberFormat', 
			'NumberFormat.Field', 'ParseException', 'ParsePosition', 
			'RuleBasedCollator', 'SimpleDateFormat', 'StringCharacterIterator'),

		 'java/java6/java/text',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/text/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.text.spi
			'BreakIteratorProvider', 'CollatorProvider', 'DateFormatProvider', 
			'DateFormatSymbolsProvider', 'DecimalFormatSymbolsProvider', 'NumberFormatProvider'),

		 'java/java6/java/text/spi',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/text/spi/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.util
			'AbstractCollection', 'AbstractList', 'AbstractMap', 
			'AbstractMap.SimpleEntry', 'AbstractMap.SimpleImmutableEntry', 'AbstractQueue', 
			'AbstractSequentialList', 'AbstractSet', 'ArrayDeque', 
			'ArrayList', 'Arrays', 'BitSet', 
			'Calendar', 'Collection', 'Collections', 
			'Comparator', 'ConcurrentModificationException', 'Currency', 
			'Date', 'Deque', 'Dictionary', 
			'DuplicateFormatFlagsException', 'EmptyStackException', 'EnumMap', 
			'EnumSet', 'Enumeration', 'EventListener', 
			'EventListenerProxy', 'EventObject', 'FormatFlagsConversionMismatchException', 
			'Formattable', 'FormattableFlags', 'Formatter', 
			'Formatter.BigDecimalLayoutForm', 'FormatterClosedException', 'GregorianCalendar', 
			'HashMap', 'HashSet', 'Hashtable', 
			'IdentityHashMap', 'IllegalFormatCodePointException', 'IllegalFormatConversionException', 
			'IllegalFormatException', 'IllegalFormatFlagsException', 'IllegalFormatPrecisionException', 
			'IllegalFormatWidthException', 'InputMismatchException', 'InvalidPropertiesFormatException', 
			'Iterator', 'LinkedHashMap', 'LinkedHashSet', 
			'LinkedList', 'List', 'ListIterator', 
			'ListResourceBundle', 'Locale', 'Map', 
			'Map.Entry', 'MissingFormatArgumentException', 'MissingFormatWidthException', 
			'MissingResourceException', 'NavigableMap', 'NavigableSet', 
			'NoSuchElementException', 'Observable', 'Observer', 
			'PriorityQueue', 'Properties', 'PropertyPermission', 
			'PropertyResourceBundle', 'Queue', 'Random', 
			'RandomAccess', 'ResourceBundle', 'ResourceBundle.Control', 
			'Scanner', 'ServiceConfigurationError', 'ServiceLoader', 
			'Set', 'SimpleTimeZone', 'SortedMap', 
			'SortedSet', 'Stack', 'StringTokenizer', 
			'TimeZone', 'Timer', 'TimerTask', 
			'TooManyListenersException', 'TreeMap', 'TreeSet', 
			'UUID', 'UnknownFormatConversionException', 'UnknownFormatFlagsException', 
			'Vector', 'WeakHashMap'),

		 'java/java6/java/util',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/util/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.util.concurrent
			'AbstractExecutorService', 'ArrayBlockingQueue', 'BlockingDeque', 
			'BlockingQueue', 'BrokenBarrierException', 'Callable', 
			'CancellationException', 'CompletionService', 'ConcurrentHashMap', 
			'ConcurrentLinkedQueue', 'ConcurrentMap', 'ConcurrentNavigableMap', 
			'ConcurrentSkipListMap', 'ConcurrentSkipListSet', 'CopyOnWriteArrayList', 
			'CopyOnWriteArraySet', 'CountDownLatch', 'CyclicBarrier', 
			'DelayQueue', 'Delayed', 'Exchanger', 
			'ExecutionException', 'Executor', 'ExecutorCompletionService', 
			'ExecutorService', 'Executors', 'Future', 
			'FutureTask', 'LinkedBlockingDeque', 'LinkedBlockingQueue', 
			'PriorityBlockingQueue', 'RejectedExecutionException', 'RejectedExecutionHandler', 
			'RunnableFuture', 'RunnableScheduledFuture', 'ScheduledExecutorService', 
			'ScheduledFuture', 'ScheduledThreadPoolExecutor', 'Semaphore', 
			'SynchronousQueue', 'ThreadFactory', 'ThreadPoolExecutor', 
			'ThreadPoolExecutor.AbortPolicy', 'ThreadPoolExecutor.CallerRunsPolicy', 'ThreadPoolExecutor.DiscardOldestPolicy', 
			'ThreadPoolExecutor.DiscardPolicy', 'TimeUnit', 'TimeoutException'),

		 'java/java6/java/util/concurrent',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/util/concurrent/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.util.concurrent.atomic
			'AtomicBoolean', 'AtomicInteger', 'AtomicIntegerArray', 
			'AtomicIntegerFieldUpdater', 'AtomicLong', 'AtomicLongArray', 
			'AtomicLongFieldUpdater', 'AtomicMarkableReference', 'AtomicReference', 
			'AtomicReferenceArray', 'AtomicReferenceFieldUpdater', 'AtomicStampedReference'),

		 'java/java6/java/util/concurrent/atomic',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/util/concurrent/atomic/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.util.concurrent.locks
			'AbstractOwnableSynchronizer', 'AbstractQueuedLongSynchronizer', 'AbstractQueuedSynchronizer', 
			'Condition', 'Lock', 'LockSupport', 
			'ReadWriteLock', 'ReentrantLock', 'ReentrantReadWriteLock', 
			'ReentrantReadWriteLock.ReadLock', 'ReentrantReadWriteLock.WriteLock'),

		 'java/java6/java/util/concurrent/locks',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/util/concurrent/locks/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.util.jar
			'Attributes', 'Attributes.Name', 'JarEntry', 
			'JarException', 'JarFile', 'JarInputStream', 
			'JarOutputStream', 'Manifest', 'Pack200', 
			'Pack200.Packer', 'Pack200.Unpacker'),

		 'java/java6/java/util/jar',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/util/jar/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.util.logging
			'ConsoleHandler', 'ErrorManager', 'FileHandler', 
			'Filter', 'Formatter', 'Handler', 
			'Level', 'LogManager', 'LogRecord', 
			'Logger', 'LoggingMXBean', 'LoggingPermission', 
			'MemoryHandler', 'SimpleFormatter', 'SocketHandler', 
			'StreamHandler', 'XMLFormatter'),

		 'java/java6/java/util/logging',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/util/logging/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.util.prefs
			'AbstractPreferences', 'BackingStoreException', 'InvalidPreferencesFormatException', 
			'NodeChangeEvent', 'NodeChangeListener', 'PreferenceChangeEvent', 
			'PreferenceChangeListener', 'Preferences', 'PreferencesFactory'),

		 'java/java6/java/util/prefs',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/util/prefs/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.util.regex
			'MatchResult', 'Matcher', 'Pattern', 
			'PatternSyntaxException'),

		 'java/java6/java/util/regex',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/util/regex/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.util.spi
			'CurrencyNameProvider', 'LocaleNameProvider', 'LocaleServiceProvider', 
			'TimeZoneNameProvider'),

		 'java/java6/java/util/spi',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/util/spi/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.util.zip
			'Adler32', 'CRC32', 'CheckedInputStream', 
			'CheckedOutputStream', 'Checksum', 'DataFormatException', 
			'Deflater', 'DeflaterInputStream', 'DeflaterOutputStream', 
			'GZIPInputStream', 'GZIPOutputStream', 'Inflater', 
			'InflaterInputStream', 'InflaterOutputStream', 'ZipEntry', 
			'ZipError', 'ZipException', 'ZipFile', 
			'ZipInputStream', 'ZipOutputStream'),

		 'java/java6/java/util/zip',
		 true,
		 'http://java.sun.com/javase/6/docs/api/java/util/zip/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.accessibility
			'Accessible', 'AccessibleAction', 'AccessibleAttributeSequence', 
			'AccessibleBundle', 'AccessibleComponent', 'AccessibleContext', 
			'AccessibleEditableText', 'AccessibleExtendedComponent', 'AccessibleExtendedTable', 
			'AccessibleExtendedText', 'AccessibleHyperlink', 'AccessibleHypertext', 
			'AccessibleIcon', 'AccessibleKeyBinding', 'AccessibleRelation', 
			'AccessibleRelationSet', 'AccessibleResourceBundle', 'AccessibleRole', 
			'AccessibleSelection', 'AccessibleState', 'AccessibleStateSet', 
			'AccessibleStreamable', 'AccessibleTable', 'AccessibleTableModelChange', 
			'AccessibleText', 'AccessibleTextSequence', 'AccessibleValue'),

		 'java/java6/javax/accessibility',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/accessibility/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.activation
			'ActivationDataFlavor', 'CommandInfo', 'CommandMap', 
			'CommandObject', 'DataContentHandler', 'DataContentHandlerFactory', 
			'DataHandler', 'DataSource', 'FileDataSource', 
			'FileTypeMap', 'MailcapCommandMap', 'MimeType', 
			'MimeTypeParameterList', 'MimeTypeParseException', 'MimetypesFileTypeMap', 
			'URLDataSource', 'UnsupportedDataTypeException'),

		 'java/java6/javax/activation',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/activation/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.activity
			'ActivityCompletedException', 'ActivityRequiredException', 'InvalidActivityException'),

		 'java/java6/javax/activity',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/activity/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.annotation
			'Generated', 'PostConstruct', 'PreDestroy', 
			'Resource', 'Resource.AuthenticationType', 'Resources'),

		 'java/java6/javax/annotation',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/annotation/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.annotation.processing
			'AbstractProcessor', 'Completion', 'Completions', 
			'Filer', 'FilerException', 'Messager', 
			'ProcessingEnvironment', 'Processor', 'RoundEnvironment', 
			'SupportedAnnotationTypes', 'SupportedOptions', 'SupportedSourceVersion'),

		 'java/java6/javax/annotation/processing',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/annotation/processing/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.crypto
			'BadPaddingException', 'Cipher', 'CipherInputStream', 
			'CipherOutputStream', 'CipherSpi', 'EncryptedPrivateKeyInfo', 
			'ExemptionMechanism', 'ExemptionMechanismException', 'ExemptionMechanismSpi', 
			'IllegalBlockSizeException', 'KeyAgreement', 'KeyAgreementSpi', 
			'KeyGenerator', 'KeyGeneratorSpi', 'Mac', 
			'MacSpi', 'NoSuchPaddingException', 'NullCipher', 
			'SealedObject', 'SecretKey', 'SecretKeyFactory', 
			'SecretKeyFactorySpi', 'ShortBufferException'),

		 'java/java6/javax/crypto',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/crypto/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.crypto.interfaces
			'DHKey', 'DHPrivateKey', 'DHPublicKey', 
			'PBEKey'),

		 'java/java6/javax/crypto/interfaces',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/crypto/interfaces/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.crypto.spec
			'DESKeySpec', 'DESedeKeySpec', 'DHGenParameterSpec', 
			'DHParameterSpec', 'DHPrivateKeySpec', 'DHPublicKeySpec', 
			'IvParameterSpec', 'OAEPParameterSpec', 'PBEKeySpec', 
			'PBEParameterSpec', 'PSource', 'PSource.PSpecified', 
			'RC2ParameterSpec', 'RC5ParameterSpec', 'SecretKeySpec'),

		 'java/java6/javax/crypto/spec',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/crypto/spec/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.imageio
			'IIOException', 'IIOImage', 'IIOParam', 
			'IIOParamController', 'ImageIO', 'ImageReadParam', 
			'ImageReader', 'ImageTranscoder', 'ImageTypeSpecifier', 
			'ImageWriteParam', 'ImageWriter'),

		 'java/java6/javax/imageio',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/imageio/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.imageio.event
			'IIOReadProgressListener', 'IIOReadUpdateListener', 'IIOReadWarningListener', 
			'IIOWriteProgressListener', 'IIOWriteWarningListener'),

		 'java/java6/javax/imageio/event',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/imageio/event/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.imageio.metadata
			'IIOInvalidTreeException', 'IIOMetadata', 'IIOMetadataController', 
			'IIOMetadataFormat', 'IIOMetadataFormatImpl', 'IIOMetadataNode'),

		 'java/java6/javax/imageio/metadata',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/imageio/metadata/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.imageio.plugins.bmp
			'BMPImageWriteParam'),

		 'java/java6/javax/imageio/plugins/bmp',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/imageio/plugins/bmp/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.imageio.plugins.jpeg
			'JPEGHuffmanTable', 'JPEGImageReadParam', 'JPEGImageWriteParam', 
			'JPEGQTable'),

		 'java/java6/javax/imageio/plugins/jpeg',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/imageio/plugins/jpeg/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.imageio.spi
			'IIORegistry', 'IIOServiceProvider', 'ImageInputStreamSpi', 
			'ImageOutputStreamSpi', 'ImageReaderSpi', 'ImageReaderWriterSpi', 
			'ImageTranscoderSpi', 'ImageWriterSpi', 'RegisterableService', 
			'ServiceRegistry', 'ServiceRegistry.Filter'),

		 'java/java6/javax/imageio/spi',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/imageio/spi/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.imageio.stream
			'FileCacheImageInputStream', 'FileCacheImageOutputStream', 'FileImageInputStream', 
			'FileImageOutputStream', 'IIOByteBuffer', 'ImageInputStream', 
			'ImageInputStreamImpl', 'ImageOutputStream', 'ImageOutputStreamImpl', 
			'MemoryCacheImageInputStream', 'MemoryCacheImageOutputStream'),

		 'java/java6/javax/imageio/stream',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/imageio/stream/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.jws
			'HandlerChain', 'Oneway', 'WebMethod', 
			'WebParam', 'WebParam.Mode', 'WebResult', 
			'WebService'),

		 'java/java6/javax/jws',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/jws/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.jws.soap
			'InitParam', 'SOAPBinding', 'SOAPBinding.ParameterStyle', 
			'SOAPBinding.Style', 'SOAPBinding.Use', 'SOAPMessageHandler', 
			'SOAPMessageHandlers'),

		 'java/java6/javax/jws/soap',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/jws/soap/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.lang.model
			'SourceVersion'),

		 'java/java6/javax/lang/model',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/lang/model/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.lang.model.element
			'AnnotationMirror', 'AnnotationValue', 'AnnotationValueVisitor', 
			'Element', 'ElementKind', 'ElementVisitor', 
			'ExecutableElement', 'Modifier', 'Name', 
			'NestingKind', 'PackageElement', 'TypeElement', 
			'TypeParameterElement', 'UnknownAnnotationValueException', 'UnknownElementException', 
			'VariableElement'),

		 'java/java6/javax/lang/model/element',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/lang/model/element/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.lang.model.type
			'ArrayType', 'DeclaredType', 'ErrorType', 
			'ExecutableType', 'MirroredTypeException', 'MirroredTypesException', 
			'NoType', 'NullType', 'PrimitiveType', 
			'ReferenceType', 'TypeKind', 'TypeMirror', 
			'TypeVariable', 'TypeVisitor', 'UnknownTypeException', 
			'WildcardType'),

		 'java/java6/javax/lang/model/type',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/lang/model/type/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.lang.model.util
			'AbstractAnnotationValueVisitor6', 'AbstractElementVisitor6', 'AbstractTypeVisitor6', 
			'ElementFilter', 'ElementKindVisitor6', 'ElementScanner6', 
			'Elements', 'SimpleAnnotationValueVisitor6', 'SimpleElementVisitor6', 
			'SimpleTypeVisitor6', 'TypeKindVisitor6', 'Types'),

		 'java/java6/javax/lang/model/util',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/lang/model/util/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.management
			'Attribute', 'AttributeChangeNotification', 'AttributeChangeNotificationFilter', 
			'AttributeList', 'AttributeNotFoundException', 'AttributeValueExp', 
			'BadAttributeValueExpException', 'BadBinaryOpValueExpException', 'BadStringOperationException', 
			'DefaultLoaderRepository', 'Descriptor', 'DescriptorAccess', 
			'DescriptorKey', 'DescriptorRead', 'DynamicMBean', 
			'ImmutableDescriptor', 'InstanceAlreadyExistsException', 'InstanceNotFoundException', 
			'IntrospectionException', 'InvalidApplicationException', 'InvalidAttributeValueException', 
			'JMException', 'JMRuntimeException', 'JMX', 
			'ListenerNotFoundException', 'MBeanAttributeInfo', 'MBeanConstructorInfo', 
			'MBeanException', 'MBeanFeatureInfo', 'MBeanInfo', 
			'MBeanNotificationInfo', 'MBeanOperationInfo', 'MBeanParameterInfo', 
			'MBeanPermission', 'MBeanRegistration', 'MBeanRegistrationException', 
			'MBeanServer', 'MBeanServerBuilder', 'MBeanServerConnection', 
			'MBeanServerDelegate', 'MBeanServerDelegateMBean', 'MBeanServerFactory', 
			'MBeanServerInvocationHandler', 'MBeanServerNotification', 'MBeanServerPermission', 
			'MBeanTrustPermission', 'MXBean', 'MalformedObjectNameException', 
			'NotCompliantMBeanException', 'Notification', 'NotificationBroadcaster', 
			'NotificationBroadcasterSupport', 'NotificationEmitter', 'NotificationFilter', 
			'NotificationFilterSupport', 'NotificationListener', 'ObjectInstance', 
			'ObjectName', 'OperationsException', 'PersistentMBean', 
			'Query', 'QueryEval', 'QueryExp', 
			'ReflectionException', 'RuntimeErrorException', 'RuntimeMBeanException', 
			'RuntimeOperationsException', 'ServiceNotFoundException', 'StandardEmitterMBean', 
			'StandardMBean', 'StringValueExp', 'ValueExp'),

		 'java/java6/javax/management',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/management/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.management.loading
			'ClassLoaderRepository', 'DefaultLoaderRepository', 'MLet', 
			'MLetContent', 'MLetMBean', 'PrivateClassLoader', 
			'PrivateMLet'),

		 'java/java6/javax/management/loading',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/management/loading/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.management.modelmbean
			'DescriptorSupport', 'InvalidTargetObjectTypeException', 'ModelMBean', 
			'ModelMBeanAttributeInfo', 'ModelMBeanConstructorInfo', 'ModelMBeanInfo', 
			'ModelMBeanInfoSupport', 'ModelMBeanNotificationBroadcaster', 'ModelMBeanNotificationInfo', 
			'ModelMBeanOperationInfo', 'RequiredModelMBean', 'XMLParseException'),

		 'java/java6/javax/management/modelmbean',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/management/modelmbean/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.management.monitor
			'CounterMonitor', 'CounterMonitorMBean', 'GaugeMonitor', 
			'GaugeMonitorMBean', 'Monitor', 'MonitorMBean', 
			'MonitorNotification', 'MonitorSettingException', 'StringMonitor', 
			'StringMonitorMBean'),

		 'java/java6/javax/management/monitor',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/management/monitor/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.management.openmbean
			'ArrayType', 'CompositeData', 'CompositeDataInvocationHandler', 
			'CompositeDataSupport', 'CompositeDataView', 'CompositeType', 
			'InvalidKeyException', 'InvalidOpenTypeException', 'KeyAlreadyExistsException', 
			'OpenDataException', 'OpenMBeanAttributeInfo', 'OpenMBeanAttributeInfoSupport', 
			'OpenMBeanConstructorInfo', 'OpenMBeanConstructorInfoSupport', 'OpenMBeanInfo', 
			'OpenMBeanInfoSupport', 'OpenMBeanOperationInfo', 'OpenMBeanOperationInfoSupport', 
			'OpenMBeanParameterInfo', 'OpenMBeanParameterInfoSupport', 'OpenType', 
			'SimpleType', 'TabularData', 'TabularDataSupport', 
			'TabularType'),

		 'java/java6/javax/management/openmbean',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/management/openmbean/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.management.relation
			'InvalidRelationIdException', 'InvalidRelationServiceException', 'InvalidRelationTypeException', 
			'InvalidRoleInfoException', 'InvalidRoleValueException', 'MBeanServerNotificationFilter', 
			'Relation', 'RelationException', 'RelationNotFoundException', 
			'RelationNotification', 'RelationService', 'RelationServiceMBean', 
			'RelationServiceNotRegisteredException', 'RelationSupport', 'RelationSupportMBean', 
			'RelationType', 'RelationTypeNotFoundException', 'RelationTypeSupport', 
			'Role', 'RoleInfo', 'RoleInfoNotFoundException', 
			'RoleList', 'RoleNotFoundException', 'RoleResult', 
			'RoleStatus', 'RoleUnresolved', 'RoleUnresolvedList'),

		 'java/java6/javax/management/relation',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/management/relation/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.management.remote
			'JMXAddressable', 'JMXAuthenticator', 'JMXConnectionNotification', 
			'JMXConnector', 'JMXConnectorFactory', 'JMXConnectorProvider', 
			'JMXConnectorServer', 'JMXConnectorServerFactory', 'JMXConnectorServerMBean', 
			'JMXConnectorServerProvider', 'JMXPrincipal', 'JMXProviderException', 
			'JMXServerErrorException', 'JMXServiceURL', 'MBeanServerForwarder', 
			'NotificationResult', 'SubjectDelegationPermission', 'TargetedNotification'),

		 'java/java6/javax/management/remote',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/management/remote/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.management.remote.rmi
			'RMIConnection', 'RMIConnectionImpl', 'RMIConnectionImpl_Stub', 
			'RMIConnector', 'RMIConnectorServer', 'RMIIIOPServerImpl', 
			'RMIJRMPServerImpl', 'RMIServer', 'RMIServerImpl', 
			'RMIServerImpl_Stub'),

		 'java/java6/javax/management/remote/rmi',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/management/remote/rmi/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.management.timer
			'Timer', 'TimerMBean', 'TimerNotification'),

		 'java/java6/javax/management/timer',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/management/timer/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.naming
			'AuthenticationException', 'AuthenticationNotSupportedException', 'BinaryRefAddr', 
			'Binding', 'CannotProceedException', 'CommunicationException', 
			'CompositeName', 'CompoundName', 'ConfigurationException', 
			'Context', 'ContextNotEmptyException', 'InitialContext', 
			'InsufficientResourcesException', 'InterruptedNamingException', 'InvalidNameException', 
			'LimitExceededException', 'LinkException', 'LinkLoopException', 
			'LinkRef', 'MalformedLinkException', 'Name', 
			'NameAlreadyBoundException', 'NameClassPair', 'NameNotFoundException', 
			'NameParser', 'NamingEnumeration', 'NamingException', 
			'NamingSecurityException', 'NoInitialContextException', 'NoPermissionException', 
			'NotContextException', 'OperationNotSupportedException', 'PartialResultException', 
			'RefAddr', 'Reference', 'Referenceable', 
			'ReferralException', 'ServiceUnavailableException', 'SizeLimitExceededException', 
			'StringRefAddr', 'TimeLimitExceededException'),

		 'java/java6/javax/naming',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/naming/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.naming.directory
			'Attribute', 'AttributeInUseException', 'AttributeModificationException', 
			'Attributes', 'BasicAttribute', 'BasicAttributes', 
			'DirContext', 'InitialDirContext', 'InvalidAttributeIdentifierException', 
			'InvalidAttributeValueException', 'InvalidAttributesException', 'InvalidSearchControlsException', 
			'InvalidSearchFilterException', 'ModificationItem', 'NoSuchAttributeException', 
			'SchemaViolationException', 'SearchControls', 'SearchResult'),

		 'java/java6/javax/naming/directory',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/naming/directory/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.naming.event
			'EventContext', 'EventDirContext', 'NamespaceChangeListener', 
			'NamingEvent', 'NamingExceptionEvent', 'NamingListener', 
			'ObjectChangeListener'),

		 'java/java6/javax/naming/event',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/naming/event/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.naming.ldap
			'BasicControl', 'Control', 'ControlFactory', 
			'ExtendedRequest', 'ExtendedResponse', 'HasControls', 
			'InitialLdapContext', 'LdapContext', 'LdapName', 
			'LdapReferralException', 'ManageReferralControl', 'PagedResultsControl', 
			'PagedResultsResponseControl', 'Rdn', 'SortControl', 
			'SortKey', 'SortResponseControl', 'StartTlsRequest', 
			'StartTlsResponse', 'UnsolicitedNotification', 'UnsolicitedNotificationEvent', 
			'UnsolicitedNotificationListener'),

		 'java/java6/javax/naming/ldap',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/naming/ldap/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.naming.spi
			'DirObjectFactory', 'DirStateFactory', 'DirStateFactory.Result', 
			'DirectoryManager', 'InitialContextFactory', 'InitialContextFactoryBuilder', 
			'NamingManager', 'ObjectFactory', 'ObjectFactoryBuilder', 
			'ResolveResult', 'Resolver', 'StateFactory'),

		 'java/java6/javax/naming/spi',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/naming/spi/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.net
			'ServerSocketFactory', 'SocketFactory'),

		 'java/java6/javax/net',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/net/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.net.ssl
			'CertPathTrustManagerParameters', 'HandshakeCompletedEvent', 'HandshakeCompletedListener', 
			'HostnameVerifier', 'HttpsURLConnection', 'KeyManager', 
			'KeyManagerFactory', 'KeyManagerFactorySpi', 'KeyStoreBuilderParameters', 
			'ManagerFactoryParameters', 'SSLContext', 'SSLContextSpi', 
			'SSLEngine', 'SSLEngineResult', 'SSLEngineResult.HandshakeStatus', 
			'SSLEngineResult.Status', 'SSLException', 'SSLHandshakeException', 
			'SSLKeyException', 'SSLParameters', 'SSLPeerUnverifiedException', 
			'SSLPermission', 'SSLProtocolException', 'SSLServerSocket', 
			'SSLServerSocketFactory', 'SSLSession', 'SSLSessionBindingEvent', 
			'SSLSessionBindingListener', 'SSLSessionContext', 'SSLSocket', 
			'SSLSocketFactory', 'TrustManager', 'TrustManagerFactory', 
			'TrustManagerFactorySpi', 'X509ExtendedKeyManager', 'X509KeyManager', 
			'X509TrustManager'),

		 'java/java6/javax/net/ssl',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/net/ssl/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.print
			'AttributeException', 'CancelablePrintJob', 'Doc', 
			'DocFlavor', 'DocFlavor.BYTE_ARRAY', 'DocFlavor.CHAR_ARRAY', 
			'DocFlavor.INPUT_STREAM', 'DocFlavor.READER', 'DocFlavor.SERVICE_FORMATTED', 
			'DocFlavor.STRING', 'DocFlavor.URL', 'DocPrintJob', 
			'FlavorException', 'MultiDoc', 'MultiDocPrintJob', 
			'MultiDocPrintService', 'PrintException', 'PrintService', 
			'PrintServiceLookup', 'ServiceUI', 'ServiceUIFactory', 
			'SimpleDoc', 'StreamPrintService', 'StreamPrintServiceFactory', 
			'URIException'),

		 'java/java6/javax/print',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/print/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.print.attribute
			'Attribute', 'AttributeSet', 'AttributeSetUtilities', 
			'DateTimeSyntax', 'DocAttribute', 'DocAttributeSet', 
			'EnumSyntax', 'HashAttributeSet', 'HashDocAttributeSet', 
			'HashPrintJobAttributeSet', 'HashPrintRequestAttributeSet', 'HashPrintServiceAttributeSet', 
			'IntegerSyntax', 'PrintJobAttribute', 'PrintJobAttributeSet', 
			'PrintRequestAttribute', 'PrintRequestAttributeSet', 'PrintServiceAttribute', 
			'PrintServiceAttributeSet', 'ResolutionSyntax', 'SetOfIntegerSyntax', 
			'Size2DSyntax', 'SupportedValuesAttribute', 'TextSyntax', 
			'URISyntax', 'UnmodifiableSetException'),

		 'java/java6/javax/print/attribute',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/print/attribute/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.print.attribute.standard
			'Chromaticity', 'ColorSupported', 'Compression', 
			'Copies', 'CopiesSupported', 'DateTimeAtCompleted', 
			'DateTimeAtCreation', 'DateTimeAtProcessing', 'Destination', 
			'DocumentName', 'Fidelity', 'Finishings', 
			'JobHoldUntil', 'JobImpressions', 'JobImpressionsCompleted', 
			'JobImpressionsSupported', 'JobKOctets', 'JobKOctetsProcessed', 
			'JobKOctetsSupported', 'JobMediaSheets', 'JobMediaSheetsCompleted', 
			'JobMediaSheetsSupported', 'JobMessageFromOperator', 'JobName', 
			'JobOriginatingUserName', 'JobPriority', 'JobPrioritySupported', 
			'JobSheets', 'JobState', 'JobStateReason', 
			'JobStateReasons', 'Media', 'MediaName', 
			'MediaPrintableArea', 'MediaSize', 'MediaSize.Engineering', 
			'MediaSize.ISO', 'MediaSize.JIS', 'MediaSize.NA', 
			'MediaSize.Other', 'MediaSizeName', 'MediaTray', 
			'MultipleDocumentHandling', 'NumberOfDocuments', 'NumberOfInterveningJobs', 
			'NumberUp', 'NumberUpSupported', 'OrientationRequested', 
			'OutputDeviceAssigned', 'PDLOverrideSupported', 'PageRanges', 
			'PagesPerMinute', 'PagesPerMinuteColor', 'PresentationDirection', 
			'PrintQuality', 'PrinterInfo', 'PrinterIsAcceptingJobs', 
			'PrinterLocation', 'PrinterMakeAndModel', 'PrinterMessageFromOperator', 
			'PrinterMoreInfo', 'PrinterMoreInfoManufacturer', 'PrinterName', 
			'PrinterResolution', 'PrinterState', 'PrinterStateReason', 
			'PrinterStateReasons', 'PrinterURI', 'QueuedJobCount', 
			'ReferenceUriSchemesSupported', 'RequestingUserName', 'Severity', 
			'SheetCollate', 'Sides'),

		 'java/java6/javax/print/attribute/standard',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/print/attribute/standard/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.print.event
			'PrintEvent', 'PrintJobAdapter', 'PrintJobAttributeEvent', 
			'PrintJobAttributeListener', 'PrintJobEvent', 'PrintJobListener', 
			'PrintServiceAttributeEvent', 'PrintServiceAttributeListener'),

		 'java/java6/javax/print/event',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/print/event/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.rmi
			'PortableRemoteObject'),

		 'java/java6/javax/rmi',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/rmi/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.rmi.CORBA
			'ClassDesc', 'PortableRemoteObjectDelegate', 'Stub', 
			'StubDelegate', 'Tie', 'Util', 
			'UtilDelegate', 'ValueHandler', 'ValueHandlerMultiFormat'),

		 'java/java6/javax/rmi/CORBA',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/rmi/CORBA/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.rmi.ssl
			'SslRMIClientSocketFactory', 'SslRMIServerSocketFactory'),

		 'java/java6/javax/rmi/ssl',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/rmi/ssl/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.script
			'AbstractScriptEngine', 'Bindings', 'Compilable', 
			'CompiledScript', 'Invocable', 'ScriptContext', 
			'ScriptEngine', 'ScriptEngineFactory', 'ScriptEngineManager', 
			'ScriptException', 'SimpleBindings', 'SimpleScriptContext'),

		 'java/java6/javax/script',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/script/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.security.auth
			'AuthPermission', 'DestroyFailedException', 'Destroyable', 
			'Policy', 'PrivateCredentialPermission', 'RefreshFailedException', 
			'Refreshable', 'Subject', 'SubjectDomainCombiner'),

		 'java/java6/javax/security/auth',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/security/auth/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.security.auth.callback
			'Callback', 'CallbackHandler', 'ChoiceCallback', 
			'ConfirmationCallback', 'LanguageCallback', 'NameCallback', 
			'PasswordCallback', 'TextInputCallback', 'TextOutputCallback', 
			'UnsupportedCallbackException'),

		 'java/java6/javax/security/auth/callback',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/security/auth/callback/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.security.auth.kerberos
			'DelegationPermission', 'KerberosKey', 'KerberosPrincipal', 
			'KerberosTicket', 'ServicePermission'),

		 'java/java6/javax/security/auth/kerberos',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/security/auth/kerberos/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.security.auth.login
			'AccountException', 'AccountExpiredException', 'AccountLockedException', 
			'AccountNotFoundException', 'AppConfigurationEntry', 'AppConfigurationEntry.LoginModuleControlFlag', 
			'Configuration', 'Configuration.Parameters', 'ConfigurationSpi', 
			'CredentialException', 'CredentialExpiredException', 'CredentialNotFoundException', 
			'FailedLoginException', 'LoginContext', 'LoginException'),

		 'java/java6/javax/security/auth/login',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/security/auth/login/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.security.auth.spi
			'LoginModule'),

		 'java/java6/javax/security/auth/spi',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/security/auth/spi/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.security.auth.x500
			'X500Principal', 'X500PrivateCredential'),

		 'java/java6/javax/security/auth/x500',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/security/auth/x500/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.security.cert
			'Certificate', 'CertificateEncodingException', 'CertificateException', 
			'CertificateExpiredException', 'CertificateNotYetValidException', 'CertificateParsingException', 
			'X509Certificate'),

		 'java/java6/javax/security/cert',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/security/cert/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.security.sasl
			'AuthenticationException', 'AuthorizeCallback', 'RealmCallback', 
			'RealmChoiceCallback', 'Sasl', 'SaslClient', 
			'SaslClientFactory', 'SaslException', 'SaslServer', 
			'SaslServerFactory'),

		 'java/java6/javax/security/sasl',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/security/sasl/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.sound.midi
			'ControllerEventListener', 'Instrument', 'InvalidMidiDataException', 
			'MetaEventListener', 'MetaMessage', 'MidiChannel', 
			'MidiDevice', 'MidiDevice.Info', 'MidiEvent', 
			'MidiFileFormat', 'MidiMessage', 'MidiSystem', 
			'MidiUnavailableException', 'Patch', 'Receiver', 
			'Sequence', 'Sequencer', 'Sequencer.SyncMode', 
			'ShortMessage', 'Soundbank', 'SoundbankResource', 
			'Synthesizer', 'SysexMessage', 'Track', 
			'Transmitter', 'VoiceStatus'),

		 'java/java6/javax/sound/midi',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/sound/midi/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.sound.midi.spi
			'MidiDeviceProvider', 'MidiFileReader', 'MidiFileWriter', 
			'SoundbankReader'),

		 'java/java6/javax/sound/midi/spi',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/sound/midi/spi/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.sound.sampled
			'AudioFileFormat', 'AudioFileFormat.Type', 'AudioFormat', 
			'AudioFormat.Encoding', 'AudioInputStream', 'AudioPermission', 
			'AudioSystem', 'BooleanControl', 'BooleanControl.Type', 
			'Clip', 'CompoundControl', 'CompoundControl.Type', 
			'Control', 'Control.Type', 'DataLine', 
			'DataLine.Info', 'EnumControl', 'EnumControl.Type', 
			'FloatControl', 'FloatControl.Type', 'Line', 
			'Line.Info', 'LineEvent', 'LineEvent.Type', 
			'LineListener', 'LineUnavailableException', 'Mixer', 
			'Mixer.Info', 'Port', 'Port.Info', 
			'ReverbType', 'SourceDataLine', 'TargetDataLine', 
			'UnsupportedAudioFileException'),

		 'java/java6/javax/sound/sampled',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/sound/sampled/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.sound.sampled.spi
			'AudioFileReader', 'AudioFileWriter', 'FormatConversionProvider', 
			'MixerProvider'),

		 'java/java6/javax/sound/sampled/spi',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/sound/sampled/spi/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.sql
			'CommonDataSource', 'ConnectionEvent', 'ConnectionEventListener', 
			'ConnectionPoolDataSource', 'DataSource', 'PooledConnection', 
			'RowSet', 'RowSetEvent', 'RowSetInternal', 
			'RowSetListener', 'RowSetMetaData', 'RowSetReader', 
			'RowSetWriter', 'StatementEvent', 'StatementEventListener', 
			'XAConnection', 'XADataSource'),

		 'java/java6/javax/sql',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/sql/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.sql.rowset
			'BaseRowSet', 'CachedRowSet', 'FilteredRowSet', 
			'JdbcRowSet', 'JoinRowSet', 'Joinable', 
			'Predicate', 'RowSetMetaDataImpl', 'RowSetWarning', 
			'WebRowSet'),

		 'java/java6/javax/sql/rowset',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/sql/rowset/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.sql.rowset.serial
			'SQLInputImpl', 'SQLOutputImpl', 'SerialArray', 
			'SerialBlob', 'SerialClob', 'SerialDatalink', 
			'SerialException', 'SerialJavaObject', 'SerialRef', 
			'SerialStruct'),

		 'java/java6/javax/sql/rowset/serial',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/sql/rowset/serial/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.sql.rowset.spi
			'SyncFactory', 'SyncFactoryException', 'SyncProvider', 
			'SyncProviderException', 'SyncResolver', 'TransactionalWriter', 
			'XmlReader', 'XmlWriter'),

		 'java/java6/javax/sql/rowset/spi',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/sql/rowset/spi/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.swing
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
			'DefaultRowSorter', 'DefaultRowSorter.ModelWrapper', 'DefaultSingleSelectionModel', 
			'DesktopManager', 'DropMode', 'FocusManager', 
			'GrayFilter', 'GroupLayout', 'GroupLayout.Alignment', 
			'Icon', 'ImageIcon', 'InputMap', 
			'InputVerifier', 'InternalFrameFocusTraversalPolicy', 'JApplet', 
			'JButton', 'JCheckBox', 'JCheckBoxMenuItem', 
			'JColorChooser', 'JComboBox', 'JComboBox.KeySelectionManager', 
			'JComponent', 'JDesktopPane', 'JDialog', 
			'JEditorPane', 'JFileChooser', 'JFormattedTextField', 
			'JFormattedTextField.AbstractFormatter', 'JFormattedTextField.AbstractFormatterFactory', 'JFrame', 
			'JInternalFrame', 'JInternalFrame.JDesktopIcon', 'JLabel', 
			'JLayeredPane', 'JList', 'JList.DropLocation', 
			'JMenu', 'JMenuBar', 'JMenuItem', 
			'JOptionPane', 'JPanel', 'JPasswordField', 
			'JPopupMenu', 'JPopupMenu.Separator', 'JProgressBar', 
			'JRadioButton', 'JRadioButtonMenuItem', 'JRootPane', 
			'JScrollBar', 'JScrollPane', 'JSeparator', 
			'JSlider', 'JSpinner', 'JSpinner.DateEditor', 
			'JSpinner.DefaultEditor', 'JSpinner.ListEditor', 'JSpinner.NumberEditor', 
			'JSplitPane', 'JTabbedPane', 'JTable', 
			'JTable.DropLocation', 'JTable.PrintMode', 'JTextArea', 
			'JTextField', 'JTextPane', 'JToggleButton', 
			'JToggleButton.ToggleButtonModel', 'JToolBar', 'JToolBar.Separator', 
			'JToolTip', 'JTree', 'JTree.DropLocation', 
			'JTree.DynamicUtilTreeNode', 'JTree.EmptySelectionModel', 'JViewport', 
			'JWindow', 'KeyStroke', 'LayoutFocusTraversalPolicy', 
			'LayoutStyle', 'LayoutStyle.ComponentPlacement', 'ListCellRenderer', 
			'ListModel', 'ListSelectionModel', 'LookAndFeel', 
			'MenuElement', 'MenuSelectionManager', 'MutableComboBoxModel', 
			'OverlayLayout', 'Popup', 'PopupFactory', 
			'ProgressMonitor', 'ProgressMonitorInputStream', 'Renderer', 
			'RepaintManager', 'RootPaneContainer', 'RowFilter', 
			'RowFilter.ComparisonType', 'RowFilter.Entry', 'RowSorter', 
			'RowSorter.SortKey', 'ScrollPaneConstants', 'ScrollPaneLayout', 
			'ScrollPaneLayout.UIResource', 'Scrollable', 'SingleSelectionModel', 
			'SizeRequirements', 'SizeSequence', 'SortOrder', 
			'SortingFocusTraversalPolicy', 'SpinnerDateModel', 'SpinnerListModel', 
			'SpinnerModel', 'SpinnerNumberModel', 'Spring', 
			'SpringLayout', 'SpringLayout.Constraints', 'SwingConstants', 
			'SwingUtilities', 'SwingWorker', 'SwingWorker.StateValue', 
			'Timer', 'ToolTipManager', 'TransferHandler', 
			'TransferHandler.DropLocation', 'TransferHandler.TransferSupport', 'UIDefaults', 
			'UIDefaults.ActiveValue', 'UIDefaults.LazyInputMap', 'UIDefaults.LazyValue', 
			'UIDefaults.ProxyLazyValue', 'UIManager', 'UIManager.LookAndFeelInfo', 
			'UnsupportedLookAndFeelException', 'ViewportLayout', 'WindowConstants'),

		 'java/java6/javax/swing',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/swing/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.swing.border
			'AbstractBorder', 'BevelBorder', 'Border', 
			'CompoundBorder', 'EmptyBorder', 'EtchedBorder', 
			'LineBorder', 'MatteBorder', 'SoftBevelBorder', 
			'TitledBorder'),

		 'java/java6/javax/swing/border',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/swing/border/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.swing.colorchooser
			'AbstractColorChooserPanel', 'ColorChooserComponentFactory', 'ColorSelectionModel', 
			'DefaultColorSelectionModel'),

		 'java/java6/javax/swing/colorchooser',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/swing/colorchooser/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.swing.event
			'AncestorEvent', 'AncestorListener', 'CaretEvent', 
			'CaretListener', 'CellEditorListener', 'ChangeEvent', 
			'ChangeListener', 'DocumentEvent', 'DocumentEvent.ElementChange', 
			'DocumentEvent.EventType', 'DocumentListener', 'EventListenerList', 
			'HyperlinkEvent', 'HyperlinkEvent.EventType', 'HyperlinkListener', 
			'InternalFrameAdapter', 'InternalFrameEvent', 'InternalFrameListener', 
			'ListDataEvent', 'ListDataListener', 'ListSelectionEvent', 
			'ListSelectionListener', 'MenuDragMouseEvent', 'MenuDragMouseListener', 
			'MenuEvent', 'MenuKeyEvent', 'MenuKeyListener', 
			'MenuListener', 'MouseInputAdapter', 'MouseInputListener', 
			'PopupMenuEvent', 'PopupMenuListener', 'RowSorterEvent', 
			'RowSorterEvent.Type', 'RowSorterListener', 'SwingPropertyChangeSupport', 
			'TableColumnModelEvent', 'TableColumnModelListener', 'TableModelEvent', 
			'TableModelListener', 'TreeExpansionEvent', 'TreeExpansionListener', 
			'TreeModelEvent', 'TreeModelListener', 'TreeSelectionEvent', 
			'TreeSelectionListener', 'TreeWillExpandListener', 'UndoableEditEvent', 
			'UndoableEditListener'),

		 'java/java6/javax/swing/event',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/swing/event/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.swing.filechooser
			'FileFilter', 'FileNameExtensionFilter', 'FileSystemView', 
			'FileView'),

		 'java/java6/javax/swing/filechooser',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/swing/filechooser/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.swing.plaf
			'ActionMapUIResource', 'BorderUIResource', 'BorderUIResource.BevelBorderUIResource', 
			'BorderUIResource.CompoundBorderUIResource', 'BorderUIResource.EmptyBorderUIResource', 'BorderUIResource.EtchedBorderUIResource', 
			'BorderUIResource.LineBorderUIResource', 'BorderUIResource.MatteBorderUIResource', 'BorderUIResource.TitledBorderUIResource', 
			'ButtonUI', 'ColorChooserUI', 'ColorUIResource', 
			'ComboBoxUI', 'ComponentInputMapUIResource', 'ComponentUI', 
			'DesktopIconUI', 'DesktopPaneUI', 'DimensionUIResource', 
			'FileChooserUI', 'FontUIResource', 'IconUIResource', 
			'InputMapUIResource', 'InsetsUIResource', 'InternalFrameUI', 
			'LabelUI', 'ListUI', 'MenuBarUI', 
			'MenuItemUI', 'OptionPaneUI', 'PanelUI', 
			'PopupMenuUI', 'ProgressBarUI', 'RootPaneUI', 
			'ScrollBarUI', 'ScrollPaneUI', 'SeparatorUI', 
			'SliderUI', 'SpinnerUI', 'SplitPaneUI', 
			'TabbedPaneUI', 'TableHeaderUI', 'TableUI', 
			'TextUI', 'ToolBarUI', 'ToolTipUI', 
			'TreeUI', 'UIResource', 'ViewportUI'),

		 'java/java6/javax/swing/plaf',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/swing/plaf/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.swing.plaf.basic
			'BasicArrowButton', 'BasicBorders', 'BasicBorders.ButtonBorder', 
			'BasicBorders.FieldBorder', 'BasicBorders.MarginBorder', 'BasicBorders.MenuBarBorder', 
			'BasicBorders.RadioButtonBorder', 'BasicBorders.RolloverButtonBorder', 'BasicBorders.SplitPaneBorder', 
			'BasicBorders.ToggleButtonBorder', 'BasicButtonListener', 'BasicButtonUI', 
			'BasicCheckBoxMenuItemUI', 'BasicCheckBoxUI', 'BasicColorChooserUI', 
			'BasicComboBoxEditor', 'BasicComboBoxEditor.UIResource', 'BasicComboBoxRenderer', 
			'BasicComboBoxRenderer.UIResource', 'BasicComboBoxUI', 'BasicComboPopup', 
			'BasicDesktopIconUI', 'BasicDesktopPaneUI', 'BasicDirectoryModel', 
			'BasicEditorPaneUI', 'BasicFileChooserUI', 'BasicFormattedTextFieldUI', 
			'BasicGraphicsUtils', 'BasicHTML', 'BasicIconFactory', 
			'BasicInternalFrameTitlePane', 'BasicInternalFrameUI', 'BasicLabelUI', 
			'BasicListUI', 'BasicLookAndFeel', 'BasicMenuBarUI', 
			'BasicMenuItemUI', 'BasicMenuUI', 'BasicOptionPaneUI', 
			'BasicOptionPaneUI.ButtonAreaLayout', 'BasicPanelUI', 'BasicPasswordFieldUI', 
			'BasicPopupMenuSeparatorUI', 'BasicPopupMenuUI', 'BasicProgressBarUI', 
			'BasicRadioButtonMenuItemUI', 'BasicRadioButtonUI', 'BasicRootPaneUI', 
			'BasicScrollBarUI', 'BasicScrollPaneUI', 'BasicSeparatorUI', 
			'BasicSliderUI', 'BasicSpinnerUI', 'BasicSplitPaneDivider', 
			'BasicSplitPaneUI', 'BasicTabbedPaneUI', 'BasicTableHeaderUI', 
			'BasicTableUI', 'BasicTextAreaUI', 'BasicTextFieldUI', 
			'BasicTextPaneUI', 'BasicTextUI', 'BasicTextUI.BasicCaret', 
			'BasicTextUI.BasicHighlighter', 'BasicToggleButtonUI', 'BasicToolBarSeparatorUI', 
			'BasicToolBarUI', 'BasicToolTipUI', 'BasicTreeUI', 
			'BasicViewportUI', 'ComboPopup', 'DefaultMenuLayout'),

		 'java/java6/javax/swing/plaf/basic',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/swing/plaf/basic/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.swing.plaf.metal
			'DefaultMetalTheme', 'MetalBorders', 'MetalBorders.ButtonBorder', 
			'MetalBorders.Flush3DBorder', 'MetalBorders.InternalFrameBorder', 'MetalBorders.MenuBarBorder', 
			'MetalBorders.MenuItemBorder', 'MetalBorders.OptionDialogBorder', 'MetalBorders.PaletteBorder', 
			'MetalBorders.PopupMenuBorder', 'MetalBorders.RolloverButtonBorder', 'MetalBorders.ScrollPaneBorder', 
			'MetalBorders.TableHeaderBorder', 'MetalBorders.TextFieldBorder', 'MetalBorders.ToggleButtonBorder', 
			'MetalBorders.ToolBarBorder', 'MetalButtonUI', 'MetalCheckBoxIcon', 
			'MetalCheckBoxUI', 'MetalComboBoxButton', 'MetalComboBoxEditor', 
			'MetalComboBoxEditor.UIResource', 'MetalComboBoxIcon', 'MetalComboBoxUI', 
			'MetalDesktopIconUI', 'MetalFileChooserUI', 'MetalIconFactory', 
			'MetalIconFactory.FileIcon16', 'MetalIconFactory.FolderIcon16', 'MetalIconFactory.PaletteCloseIcon', 
			'MetalIconFactory.TreeControlIcon', 'MetalIconFactory.TreeFolderIcon', 'MetalIconFactory.TreeLeafIcon', 
			'MetalInternalFrameTitlePane', 'MetalInternalFrameUI', 'MetalLabelUI', 
			'MetalLookAndFeel', 'MetalMenuBarUI', 'MetalPopupMenuSeparatorUI', 
			'MetalProgressBarUI', 'MetalRadioButtonUI', 'MetalRootPaneUI', 
			'MetalScrollBarUI', 'MetalScrollButton', 'MetalScrollPaneUI', 
			'MetalSeparatorUI', 'MetalSliderUI', 'MetalSplitPaneUI', 
			'MetalTabbedPaneUI', 'MetalTextFieldUI', 'MetalTheme', 
			'MetalToggleButtonUI', 'MetalToolBarUI', 'MetalToolTipUI', 
			'MetalTreeUI', 'OceanTheme'),

		 'java/java6/javax/swing/plaf/metal',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/swing/plaf/metal/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.swing.plaf.multi
			'MultiButtonUI', 'MultiColorChooserUI', 'MultiComboBoxUI', 
			'MultiDesktopIconUI', 'MultiDesktopPaneUI', 'MultiFileChooserUI', 
			'MultiInternalFrameUI', 'MultiLabelUI', 'MultiListUI', 
			'MultiLookAndFeel', 'MultiMenuBarUI', 'MultiMenuItemUI', 
			'MultiOptionPaneUI', 'MultiPanelUI', 'MultiPopupMenuUI', 
			'MultiProgressBarUI', 'MultiRootPaneUI', 'MultiScrollBarUI', 
			'MultiScrollPaneUI', 'MultiSeparatorUI', 'MultiSliderUI', 
			'MultiSpinnerUI', 'MultiSplitPaneUI', 'MultiTabbedPaneUI', 
			'MultiTableHeaderUI', 'MultiTableUI', 'MultiTextUI', 
			'MultiToolBarUI', 'MultiToolTipUI', 'MultiTreeUI', 
			'MultiViewportUI'),

		 'java/java6/javax/swing/plaf/multi',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/swing/plaf/multi/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.swing.plaf.synth
			'ColorType', 'Region', 'SynthConstants', 
			'SynthContext', 'SynthGraphicsUtils', 'SynthLookAndFeel', 
			'SynthPainter', 'SynthStyle', 'SynthStyleFactory'),

		 'java/java6/javax/swing/plaf/synth',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/swing/plaf/synth/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.swing.table
			'AbstractTableModel', 'DefaultTableCellRenderer', 'DefaultTableCellRenderer.UIResource', 
			'DefaultTableColumnModel', 'DefaultTableModel', 'JTableHeader', 
			'TableCellEditor', 'TableCellRenderer', 'TableColumn', 
			'TableColumnModel', 'TableModel', 'TableRowSorter', 
			'TableStringConverter'),

		 'java/java6/javax/swing/table',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/swing/table/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.swing.text
			'AbstractDocument', 'AbstractDocument.AttributeContext', 'AbstractDocument.Content', 
			'AbstractDocument.ElementEdit', 'AbstractWriter', 'AsyncBoxView', 
			'AttributeSet', 'AttributeSet.CharacterAttribute', 'AttributeSet.ColorAttribute', 
			'AttributeSet.FontAttribute', 'AttributeSet.ParagraphAttribute', 'BadLocationException', 
			'BoxView', 'Caret', 'ChangedCharSetException', 
			'ComponentView', 'CompositeView', 'DateFormatter', 
			'DefaultCaret', 'DefaultEditorKit', 'DefaultEditorKit.BeepAction', 
			'DefaultEditorKit.CopyAction', 'DefaultEditorKit.CutAction', 'DefaultEditorKit.DefaultKeyTypedAction', 
			'DefaultEditorKit.InsertBreakAction', 'DefaultEditorKit.InsertContentAction', 'DefaultEditorKit.InsertTabAction', 
			'DefaultEditorKit.PasteAction', 'DefaultFormatter', 'DefaultFormatterFactory', 
			'DefaultHighlighter', 'DefaultHighlighter.DefaultHighlightPainter', 'DefaultStyledDocument', 
			'DefaultStyledDocument.AttributeUndoableEdit', 'DefaultStyledDocument.ElementSpec', 'DefaultTextUI', 
			'Document', 'DocumentFilter', 'DocumentFilter.FilterBypass', 
			'EditorKit', 'Element', 'ElementIterator', 
			'FieldView', 'FlowView', 'FlowView.FlowStrategy', 
			'GapContent', 'GlyphView', 'GlyphView.GlyphPainter', 
			'Highlighter', 'Highlighter.Highlight', 'Highlighter.HighlightPainter', 
			'IconView', 'InternationalFormatter', 'JTextComponent', 
			'JTextComponent.DropLocation', 'JTextComponent.KeyBinding', 'Keymap', 
			'LabelView', 'LayeredHighlighter', 'LayeredHighlighter.LayerPainter', 
			'LayoutQueue', 'MaskFormatter', 'MutableAttributeSet', 
			'NavigationFilter', 'NavigationFilter.FilterBypass', 'NumberFormatter', 
			'ParagraphView', 'PasswordView', 'PlainDocument', 
			'PlainView', 'Position', 'Position.Bias', 
			'Segment', 'SimpleAttributeSet', 'StringContent', 
			'Style', 'StyleConstants', 'StyleConstants.CharacterConstants', 
			'StyleConstants.ColorConstants', 'StyleConstants.FontConstants', 'StyleConstants.ParagraphConstants', 
			'StyleContext', 'StyledDocument', 'StyledEditorKit', 
			'StyledEditorKit.AlignmentAction', 'StyledEditorKit.BoldAction', 'StyledEditorKit.FontFamilyAction', 
			'StyledEditorKit.FontSizeAction', 'StyledEditorKit.ForegroundAction', 'StyledEditorKit.ItalicAction', 
			'StyledEditorKit.StyledTextAction', 'StyledEditorKit.UnderlineAction', 'TabExpander', 
			'TabSet', 'TabStop', 'TabableView', 
			'TableView', 'TextAction', 'Utilities', 
			'View', 'ViewFactory', 'WrappedPlainView', 
			'ZoneView'),

		 'java/java6/javax/swing/text',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/swing/text/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.swing.text.html
			'BlockView', 'CSS', 'CSS.Attribute', 
			'FormSubmitEvent', 'FormSubmitEvent.MethodType', 'FormView', 
			'HTML', 'HTML.Attribute', 'HTML.Tag', 
			'HTML.UnknownTag', 'HTMLDocument', 'HTMLDocument.Iterator', 
			'HTMLEditorKit', 'HTMLEditorKit.HTMLFactory', 'HTMLEditorKit.HTMLTextAction', 
			'HTMLEditorKit.InsertHTMLTextAction', 'HTMLEditorKit.LinkController', 'HTMLEditorKit.Parser', 
			'HTMLEditorKit.ParserCallback', 'HTMLFrameHyperlinkEvent', 'HTMLWriter', 
			'ImageView', 'InlineView', 'ListView', 
			'MinimalHTMLWriter', 'ObjectView', 'Option', 
			'ParagraphView', 'StyleSheet', 'StyleSheet.BoxPainter', 
			'StyleSheet.ListPainter'),

		 'java/java6/javax/swing/text/html',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/swing/text/html/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.swing.text.html.parser
			'AttributeList', 'ContentModel', 'DTD', 
			'DTDConstants', 'DocumentParser', 'Element', 
			'Entity', 'Parser', 'ParserDelegator', 
			'TagElement'),

		 'java/java6/javax/swing/text/html/parser',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/swing/text/html/parser/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.swing.text.rtf
			'RTFEditorKit'),

		 'java/java6/javax/swing/text/rtf',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/swing/text/rtf/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.swing.tree
			'AbstractLayoutCache', 'AbstractLayoutCache.NodeDimensions', 'DefaultMutableTreeNode', 
			'DefaultTreeCellEditor', 'DefaultTreeCellRenderer', 'DefaultTreeModel', 
			'DefaultTreeSelectionModel', 'ExpandVetoException', 'FixedHeightLayoutCache', 
			'MutableTreeNode', 'RowMapper', 'TreeCellEditor', 
			'TreeCellRenderer', 'TreeModel', 'TreeNode', 
			'TreePath', 'TreeSelectionModel', 'VariableHeightLayoutCache'),

		 'java/java6/javax/swing/tree',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/swing/tree/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.swing.undo
			'AbstractUndoableEdit', 'CannotRedoException', 'CannotUndoException', 
			'CompoundEdit', 'StateEdit', 'StateEditable', 
			'UndoManager', 'UndoableEdit', 'UndoableEditSupport'),

		 'java/java6/javax/swing/undo',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/swing/undo/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.tools
			'Diagnostic', 'Diagnostic.Kind', 'DiagnosticCollector', 
			'DiagnosticListener', 'FileObject', 'ForwardingFileObject', 
			'ForwardingJavaFileManager', 'ForwardingJavaFileObject', 'JavaCompiler', 
			'JavaCompiler.CompilationTask', 'JavaFileManager', 'JavaFileManager.Location', 
			'JavaFileObject', 'JavaFileObject.Kind', 'OptionChecker', 
			'SimpleJavaFileObject', 'StandardJavaFileManager', 'StandardLocation', 
			'Tool', 'ToolProvider'),

		 'java/java6/javax/tools',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/tools/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.transaction
			'InvalidTransactionException', 'TransactionRequiredException', 'TransactionRolledbackException'),

		 'java/java6/javax/transaction',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/transaction/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.transaction.xa
			'XAException', 'XAResource', 'Xid'),

		 'java/java6/javax/transaction/xa',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/transaction/xa/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml
			'XMLConstants'),

		 'java/java6/javax/xml',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.bind
			'Binder', 'DatatypeConverter', 'DatatypeConverterInterface', 
			'Element', 'JAXBContext', 'JAXBElement', 
			'JAXBElement.GlobalScope', 'JAXBException', 'JAXBIntrospector', 
			'MarshalException', 'Marshaller', 'Marshaller.Listener', 
			'NotIdentifiableEvent', 'ParseConversionEvent', 'PrintConversionEvent', 
			'PropertyException', 'SchemaOutputResolver', 'TypeConstraintException', 
			'UnmarshalException', 'Unmarshaller', 'Unmarshaller.Listener', 
			'UnmarshallerHandler', 'ValidationEvent', 'ValidationEventHandler', 
			'ValidationEventLocator', 'ValidationException', 'Validator'),

		 'java/java6/javax/xml/bind',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/bind/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.bind.annotation
			'DomHandler', 'W3CDomHandler', 'XmlAccessOrder', 
			'XmlAccessType', 'XmlAccessorOrder', 'XmlAccessorType', 
			'XmlAnyAttribute', 'XmlAnyElement', 'XmlAttachmentRef', 
			'XmlAttribute', 'XmlElement', 'XmlElement.DEFAULT', 
			'XmlElementDecl', 'XmlElementDecl.GLOBAL', 'XmlElementRef', 
			'XmlElementRef.DEFAULT', 'XmlElementRefs', 'XmlElementWrapper', 
			'XmlElements', 'XmlEnum', 'XmlEnumValue', 
			'XmlID', 'XmlIDREF', 'XmlInlineBinaryData', 
			'XmlList', 'XmlMimeType', 'XmlMixed', 
			'XmlNs', 'XmlNsForm', 'XmlRegistry', 
			'XmlRootElement', 'XmlSchema', 'XmlSchemaType', 
			'XmlSchemaType.DEFAULT', 'XmlSchemaTypes', 'XmlTransient', 
			'XmlType', 'XmlType.DEFAULT', 'XmlValue'),

		 'java/java6/javax/xml/bind/annotation',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/bind/annotation/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.bind.annotation.adapters
			'CollapsedStringAdapter', 'HexBinaryAdapter', 'NormalizedStringAdapter', 
			'XmlAdapter', 'XmlJavaTypeAdapter', 'XmlJavaTypeAdapter.DEFAULT', 
			'XmlJavaTypeAdapters'),

		 'java/java6/javax/xml/bind/annotation/adapters',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/bind/annotation/adapters/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.bind.attachment
			'AttachmentMarshaller', 'AttachmentUnmarshaller'),

		 'java/java6/javax/xml/bind/attachment',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/bind/attachment/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.bind.helpers
			'AbstractMarshallerImpl', 'AbstractUnmarshallerImpl', 'DefaultValidationEventHandler', 
			'NotIdentifiableEventImpl', 'ParseConversionEventImpl', 'PrintConversionEventImpl', 
			'ValidationEventImpl', 'ValidationEventLocatorImpl'),

		 'java/java6/javax/xml/bind/helpers',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/bind/helpers/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.bind.util
			'JAXBResult', 'JAXBSource', 'ValidationEventCollector'),

		 'java/java6/javax/xml/bind/util',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/bind/util/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.crypto
			'AlgorithmMethod', 'Data', 'KeySelector', 
			'KeySelector.Purpose', 'KeySelectorException', 'KeySelectorResult', 
			'MarshalException', 'NoSuchMechanismException', 'NodeSetData', 
			'OctetStreamData', 'URIDereferencer', 'URIReference', 
			'URIReferenceException', 'XMLCryptoContext', 'XMLStructure'),

		 'java/java6/javax/xml/crypto',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/crypto/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.crypto.dom
			'DOMCryptoContext', 'DOMStructure', 'DOMURIReference'),

		 'java/java6/javax/xml/crypto/dom',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/crypto/dom/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.crypto.dsig
			'CanonicalizationMethod', 'DigestMethod', 'Manifest', 
			'Reference', 'SignatureMethod', 'SignatureProperties', 
			'SignatureProperty', 'SignedInfo', 'Transform', 
			'TransformException', 'TransformService', 'XMLObject', 
			'XMLSignContext', 'XMLSignature', 'XMLSignature.SignatureValue', 
			'XMLSignatureException', 'XMLSignatureFactory', 'XMLValidateContext'),

		 'java/java6/javax/xml/crypto/dsig',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/crypto/dsig/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.crypto.dsig.dom
			'DOMSignContext', 'DOMValidateContext'),

		 'java/java6/javax/xml/crypto/dsig/dom',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/crypto/dsig/dom/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.crypto.dsig.keyinfo
			'KeyInfo', 'KeyInfoFactory', 'KeyName', 
			'KeyValue', 'PGPData', 'RetrievalMethod', 
			'X509Data', 'X509IssuerSerial'),

		 'java/java6/javax/xml/crypto/dsig/keyinfo',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/crypto/dsig/keyinfo/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.crypto.dsig.spec
			'C14NMethodParameterSpec', 'DigestMethodParameterSpec', 'ExcC14NParameterSpec', 
			'HMACParameterSpec', 'SignatureMethodParameterSpec', 'TransformParameterSpec', 
			'XPathFilter2ParameterSpec', 'XPathFilterParameterSpec', 'XPathType', 
			'XPathType.Filter', 'XSLTTransformParameterSpec'),

		 'java/java6/javax/xml/crypto/dsig/spec',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/crypto/dsig/spec/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.datatype
			'DatatypeConfigurationException', 'DatatypeConstants', 'DatatypeConstants.Field', 
			'DatatypeFactory', 'Duration', 'XMLGregorianCalendar'),

		 'java/java6/javax/xml/datatype',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/datatype/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.namespace
			'NamespaceContext', 'QName'),

		 'java/java6/javax/xml/namespace',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/namespace/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.parsers
			'DocumentBuilder', 'DocumentBuilderFactory', 'FactoryConfigurationError', 
			'ParserConfigurationException', 'SAXParser', 'SAXParserFactory'),

		 'java/java6/javax/xml/parsers',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/parsers/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.soap
			'AttachmentPart', 'Detail', 'DetailEntry', 
			'MessageFactory', 'MimeHeader', 'MimeHeaders', 
			'Name', 'Node', 'SAAJMetaFactory', 
			'SAAJResult', 'SOAPBody', 'SOAPBodyElement', 
			'SOAPConnection', 'SOAPConnectionFactory', 'SOAPConstants', 
			'SOAPElement', 'SOAPElementFactory', 'SOAPEnvelope', 
			'SOAPException', 'SOAPFactory', 'SOAPFault', 
			'SOAPFaultElement', 'SOAPHeader', 'SOAPHeaderElement', 
			'SOAPMessage', 'SOAPPart', 'Text'),

		 'java/java6/javax/xml/soap',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/soap/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.stream
			'EventFilter', 'FactoryConfigurationError', 'Location', 
			'StreamFilter', 'XMLEventFactory', 'XMLEventReader', 
			'XMLEventWriter', 'XMLInputFactory', 'XMLOutputFactory', 
			'XMLReporter', 'XMLResolver', 'XMLStreamConstants', 
			'XMLStreamException', 'XMLStreamReader', 'XMLStreamWriter'),

		 'java/java6/javax/xml/stream',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/stream/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.stream.events
			'Attribute', 'Characters', 'Comment', 
			'DTD', 'EndDocument', 'EndElement', 
			'EntityDeclaration', 'EntityReference', 'Namespace', 
			'NotationDeclaration', 'ProcessingInstruction', 'StartDocument', 
			'StartElement', 'XMLEvent'),

		 'java/java6/javax/xml/stream/events',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/stream/events/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.stream.util
			'EventReaderDelegate', 'StreamReaderDelegate', 'XMLEventAllocator', 
			'XMLEventConsumer'),

		 'java/java6/javax/xml/stream/util',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/stream/util/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.transform
			'ErrorListener', 'OutputKeys', 'Result', 
			'Source', 'SourceLocator', 'Templates', 
			'Transformer', 'TransformerConfigurationException', 'TransformerException', 
			'TransformerFactory', 'TransformerFactoryConfigurationError', 'URIResolver'),

		 'java/java6/javax/xml/transform',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/transform/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.transform.dom
			'DOMLocator', 'DOMResult', 'DOMSource'),

		 'java/java6/javax/xml/transform/dom',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/transform/dom/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.transform.sax
			'SAXResult', 'SAXSource', 'SAXTransformerFactory', 
			'TemplatesHandler', 'TransformerHandler'),

		 'java/java6/javax/xml/transform/sax',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/transform/sax/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.transform.stax
			'StAXResult', 'StAXSource'),

		 'java/java6/javax/xml/transform/stax',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/transform/stax/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.transform.stream
			'StreamResult', 'StreamSource'),

		 'java/java6/javax/xml/transform/stream',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/transform/stream/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.validation
			'Schema', 'SchemaFactory', 'SchemaFactoryLoader', 
			'TypeInfoProvider', 'Validator', 'ValidatorHandler'),

		 'java/java6/javax/xml/validation',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/validation/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.ws
			'AsyncHandler', 'Binding', 'BindingProvider', 
			'BindingType', 'Dispatch', 'Endpoint', 
			'Holder', 'LogicalMessage', 'ProtocolException', 
			'Provider', 'RequestWrapper', 'Response', 
			'ResponseWrapper', 'Service', 'Service.Mode', 
			'ServiceMode', 'WebEndpoint', 'WebFault', 
			'WebServiceClient', 'WebServiceContext', 'WebServiceException', 
			'WebServicePermission', 'WebServiceProvider', 'WebServiceRef', 
			'WebServiceRefs'),

		 'java/java6/javax/xml/ws',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/ws/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.ws.handler
			'Handler', 'HandlerResolver', 'LogicalHandler', 
			'LogicalMessageContext', 'MessageContext', 'MessageContext.Scope', 
			'PortInfo'),

		 'java/java6/javax/xml/ws/handler',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/ws/handler/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.ws.handler.soap
			'SOAPHandler', 'SOAPMessageContext'),

		 'java/java6/javax/xml/ws/handler/soap',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/ws/handler/soap/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.ws.http
			'HTTPBinding', 'HTTPException'),

		 'java/java6/javax/xml/ws/http',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/ws/http/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.ws.soap
			'SOAPBinding', 'SOAPFaultException'),

		 'java/java6/javax/xml/ws/soap',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/ws/soap/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.ws.spi
			'Provider', 'ServiceDelegate'),

		 'java/java6/javax/xml/ws/spi',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/ws/spi/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.xpath
			'XPath', 'XPathConstants', 'XPathException', 
			'XPathExpression', 'XPathExpressionException', 'XPathFactory', 
			'XPathFactoryConfigurationException', 'XPathFunction', 'XPathFunctionException', 
			'XPathFunctionResolver', 'XPathVariableResolver'),

		 'java/java6/javax/xml/xpath',
		 true,
		 'http://java.sun.com/javase/6/docs/api/javax/xml/xpath/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.ietf.jgss
			'ChannelBinding', 'GSSContext', 'GSSCredential', 
			'GSSException', 'GSSManager', 'GSSName', 
			'MessageProp', 'Oid'),

		 'java/java6/org/ietf/jgss',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/ietf/jgss/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.CORBA
			'ACTIVITY_COMPLETED', 'ACTIVITY_REQUIRED', 'ARG_IN', 
			'ARG_INOUT', 'ARG_OUT', 'Any', 
			'AnyHolder', 'AnySeqHelper', 'AnySeqHolder', 
			'BAD_CONTEXT', 'BAD_INV_ORDER', 'BAD_OPERATION', 
			'BAD_PARAM', 'BAD_POLICY', 'BAD_POLICY_TYPE', 
			'BAD_POLICY_VALUE', 'BAD_QOS', 'BAD_TYPECODE', 
			'BooleanHolder', 'BooleanSeqHelper', 'BooleanSeqHolder', 
			'Bounds', 'ByteHolder', 'CODESET_INCOMPATIBLE', 
			'COMM_FAILURE', 'CTX_RESTRICT_SCOPE', 'CharHolder', 
			'CharSeqHelper', 'CharSeqHolder', 'CompletionStatus', 
			'CompletionStatusHelper', 'Context', 'ContextList', 
			'Current', 'CurrentHelper', 'CurrentHolder', 
			'CurrentOperations', 'CustomMarshal', 'DATA_CONVERSION', 
			'DataInputStream', 'DataOutputStream', 'DefinitionKind', 
			'DefinitionKindHelper', 'DomainManager', 'DomainManagerOperations', 
			'DoubleHolder', 'DoubleSeqHelper', 'DoubleSeqHolder', 
			'DynAny', 'DynArray', 'DynEnum', 
			'DynFixed', 'DynSequence', 'DynStruct', 
			'DynUnion', 'DynValue', 'DynamicImplementation', 
			'Environment', 'ExceptionList', 'FREE_MEM', 
			'FieldNameHelper', 'FixedHolder', 'FloatHolder', 
			'FloatSeqHelper', 'FloatSeqHolder', 'IDLType', 
			'IDLTypeHelper', 'IDLTypeOperations', 'IMP_LIMIT', 
			'INITIALIZE', 'INTERNAL', 'INTF_REPOS', 
			'INVALID_ACTIVITY', 'INVALID_TRANSACTION', 'INV_FLAG', 
			'INV_IDENT', 'INV_OBJREF', 'INV_POLICY', 
			'IRObject', 'IRObjectOperations', 'IdentifierHelper', 
			'IntHolder', 'LocalObject', 'LongHolder', 
			'LongLongSeqHelper', 'LongLongSeqHolder', 'LongSeqHelper', 
			'LongSeqHolder', 'MARSHAL', 'NO_IMPLEMENT', 
			'NO_MEMORY', 'NO_PERMISSION', 'NO_RESOURCES', 
			'NO_RESPONSE', 'NVList', 'NameValuePair', 
			'NameValuePairHelper', 'NamedValue', 'OBJECT_NOT_EXIST', 
			'OBJ_ADAPTER', 'OMGVMCID', 'ORB', 
			'Object', 'ObjectHelper', 'ObjectHolder', 
			'OctetSeqHelper', 'OctetSeqHolder', 'PERSIST_STORE', 
			'PRIVATE_MEMBER', 'PUBLIC_MEMBER', 'ParameterMode', 
			'ParameterModeHelper', 'ParameterModeHolder', 'Policy', 
			'PolicyError', 'PolicyErrorCodeHelper', 'PolicyErrorHelper', 
			'PolicyErrorHolder', 'PolicyHelper', 'PolicyHolder', 
			'PolicyListHelper', 'PolicyListHolder', 'PolicyOperations', 
			'PolicyTypeHelper', 'Principal', 'PrincipalHolder', 
			'REBIND', 'RepositoryIdHelper', 'Request', 
			'ServerRequest', 'ServiceDetail', 'ServiceDetailHelper', 
			'ServiceInformation', 'ServiceInformationHelper', 'ServiceInformationHolder', 
			'SetOverrideType', 'SetOverrideTypeHelper', 'ShortHolder', 
			'ShortSeqHelper', 'ShortSeqHolder', 'StringHolder', 
			'StringSeqHelper', 'StringSeqHolder', 'StringValueHelper', 
			'StructMember', 'StructMemberHelper', 'SystemException', 
			'TCKind', 'TIMEOUT', 'TRANSACTION_MODE', 
			'TRANSACTION_REQUIRED', 'TRANSACTION_ROLLEDBACK', 'TRANSACTION_UNAVAILABLE', 
			'TRANSIENT', 'TypeCode', 'TypeCodeHolder', 
			'ULongLongSeqHelper', 'ULongLongSeqHolder', 'ULongSeqHelper', 
			'ULongSeqHolder', 'UNKNOWN', 'UNSUPPORTED_POLICY', 
			'UNSUPPORTED_POLICY_VALUE', 'UShortSeqHelper', 'UShortSeqHolder', 
			'UnionMember', 'UnionMemberHelper', 'UnknownUserException', 
			'UnknownUserExceptionHelper', 'UnknownUserExceptionHolder', 'UserException', 
			'VM_ABSTRACT', 'VM_CUSTOM', 'VM_NONE', 
			'VM_TRUNCATABLE', 'ValueBaseHelper', 'ValueBaseHolder', 
			'ValueMember', 'ValueMemberHelper', 'VersionSpecHelper', 
			'VisibilityHelper', 'WCharSeqHelper', 'WCharSeqHolder', 
			'WStringSeqHelper', 'WStringSeqHolder', 'WStringValueHelper', 
			'WrongTransaction', 'WrongTransactionHelper', 'WrongTransactionHolder', 
			'_IDLTypeStub', '_PolicyStub'),

		 'java/java6/org/omg/CORBA',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/omg/CORBA/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.CORBA_2_3
			'ORB'),

		 'java/java6/org/omg/CORBA_2_3',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/omg/CORBA_2_3/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.CORBA_2_3.portable
			'Delegate', 'InputStream', 'ObjectImpl', 
			'OutputStream'),

		 'java/java6/org/omg/CORBA_2_3/portable',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/omg/CORBA_2_3/portable/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.CORBA.DynAnyPackage
			'Invalid', 'InvalidSeq', 'InvalidValue', 
			'TypeMismatch'),

		 'java/java6/org/omg/CORBA/DynAnyPackage',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/omg/CORBA/DynAnyPackage/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.CORBA.ORBPackage
			'InconsistentTypeCode', 'InvalidName'),

		 'java/java6/org/omg/CORBA/ORBPackage',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/omg/CORBA/ORBPackage/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.CORBA.portable
			'ApplicationException', 'BoxedValueHelper', 'CustomValue', 
			'Delegate', 'IDLEntity', 'IndirectionException', 
			'InputStream', 'InvokeHandler', 'ObjectImpl', 
			'OutputStream', 'RemarshalException', 'ResponseHandler', 
			'ServantObject', 'Streamable', 'StreamableValue', 
			'UnknownException', 'ValueBase', 'ValueFactory', 
			'ValueInputStream', 'ValueOutputStream'),

		 'java/java6/org/omg/CORBA/portable',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/omg/CORBA/portable/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.CORBA.TypeCodePackage
			'BadKind', 'Bounds'),

		 'java/java6/org/omg/CORBA/TypeCodePackage',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/omg/CORBA/TypeCodePackage/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.CosNaming
			'Binding', 'BindingHelper', 'BindingHolder', 
			'BindingIterator', 'BindingIteratorHelper', 'BindingIteratorHolder', 
			'BindingIteratorOperations', 'BindingIteratorPOA', 'BindingListHelper', 
			'BindingListHolder', 'BindingType', 'BindingTypeHelper', 
			'BindingTypeHolder', 'IstringHelper', 'NameComponent', 
			'NameComponentHelper', 'NameComponentHolder', 'NameHelper', 
			'NameHolder', 'NamingContext', 'NamingContextExt', 
			'NamingContextExtHelper', 'NamingContextExtHolder', 'NamingContextExtOperations', 
			'NamingContextExtPOA', 'NamingContextHelper', 'NamingContextHolder', 
			'NamingContextOperations', 'NamingContextPOA', '_BindingIteratorImplBase', 
			'_BindingIteratorStub', '_NamingContextExtStub', '_NamingContextImplBase', 
			'_NamingContextStub'),

		 'java/java6/org/omg/CosNaming',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/omg/CosNaming/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.CosNaming.NamingContextExtPackage
			'AddressHelper', 'InvalidAddress', 'InvalidAddressHelper', 
			'InvalidAddressHolder', 'StringNameHelper', 'URLStringHelper'),

		 'java/java6/org/omg/CosNaming/NamingContextExtPackage',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/omg/CosNaming/NamingContextExtPackage/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.CosNaming.NamingContextPackage
			'AlreadyBound', 'AlreadyBoundHelper', 'AlreadyBoundHolder', 
			'CannotProceed', 'CannotProceedHelper', 'CannotProceedHolder', 
			'InvalidName', 'InvalidNameHelper', 'InvalidNameHolder', 
			'NotEmpty', 'NotEmptyHelper', 'NotEmptyHolder', 
			'NotFound', 'NotFoundHelper', 'NotFoundHolder', 
			'NotFoundReason', 'NotFoundReasonHelper', 'NotFoundReasonHolder'),

		 'java/java6/org/omg/CosNaming/NamingContextPackage',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/omg/CosNaming/NamingContextPackage/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.Dynamic
			'Parameter'),

		 'java/java6/org/omg/Dynamic',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/omg/Dynamic/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.DynamicAny
			'AnySeqHelper', 'DynAny', 'DynAnyFactory', 
			'DynAnyFactoryHelper', 'DynAnyFactoryOperations', 'DynAnyHelper', 
			'DynAnyOperations', 'DynAnySeqHelper', 'DynArray', 
			'DynArrayHelper', 'DynArrayOperations', 'DynEnum', 
			'DynEnumHelper', 'DynEnumOperations', 'DynFixed', 
			'DynFixedHelper', 'DynFixedOperations', 'DynSequence', 
			'DynSequenceHelper', 'DynSequenceOperations', 'DynStruct', 
			'DynStructHelper', 'DynStructOperations', 'DynUnion', 
			'DynUnionHelper', 'DynUnionOperations', 'DynValue', 
			'DynValueBox', 'DynValueBoxOperations', 'DynValueCommon', 
			'DynValueCommonOperations', 'DynValueHelper', 'DynValueOperations', 
			'FieldNameHelper', 'NameDynAnyPair', 'NameDynAnyPairHelper', 
			'NameDynAnyPairSeqHelper', 'NameValuePair', 'NameValuePairHelper', 
			'NameValuePairSeqHelper', '_DynAnyFactoryStub', '_DynAnyStub', 
			'_DynArrayStub', '_DynEnumStub', '_DynFixedStub', 
			'_DynSequenceStub', '_DynStructStub', '_DynUnionStub', 
			'_DynValueStub'),

		 'java/java6/org/omg/DynamicAny',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/omg/DynamicAny/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.DynamicAny.DynAnyFactoryPackage
			'InconsistentTypeCode', 'InconsistentTypeCodeHelper'),

		 'java/java6/org/omg/DynamicAny/DynAnyFactoryPackage',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/omg/DynamicAny/DynAnyFactoryPackage/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.DynamicAny.DynAnyPackage
			'InvalidValue', 'InvalidValueHelper', 'TypeMismatch', 
			'TypeMismatchHelper'),

		 'java/java6/org/omg/DynamicAny/DynAnyPackage',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/omg/DynamicAny/DynAnyPackage/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.IOP
			'CodeSets', 'Codec', 'CodecFactory', 
			'CodecFactoryHelper', 'CodecFactoryOperations', 'CodecOperations', 
			'ComponentIdHelper', 'ENCODING_CDR_ENCAPS', 'Encoding', 
			'ExceptionDetailMessage', 'IOR', 'IORHelper', 
			'IORHolder', 'MultipleComponentProfileHelper', 'MultipleComponentProfileHolder', 
			'ProfileIdHelper', 'RMICustomMaxStreamFormat', 'ServiceContext', 
			'ServiceContextHelper', 'ServiceContextHolder', 'ServiceContextListHelper', 
			'ServiceContextListHolder', 'ServiceIdHelper', 'TAG_ALTERNATE_IIOP_ADDRESS', 
			'TAG_CODE_SETS', 'TAG_INTERNET_IOP', 'TAG_JAVA_CODEBASE', 
			'TAG_MULTIPLE_COMPONENTS', 'TAG_ORB_TYPE', 'TAG_POLICIES', 
			'TAG_RMI_CUSTOM_MAX_STREAM_FORMAT', 'TaggedComponent', 'TaggedComponentHelper', 
			'TaggedComponentHolder', 'TaggedProfile', 'TaggedProfileHelper', 
			'TaggedProfileHolder', 'TransactionService'),

		 'java/java6/org/omg/IOP',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/omg/IOP/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.IOP.CodecFactoryPackage
			'UnknownEncoding', 'UnknownEncodingHelper'),

		 'java/java6/org/omg/IOP/CodecFactoryPackage',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/omg/IOP/CodecFactoryPackage/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.IOP.CodecPackage
			'FormatMismatch', 'FormatMismatchHelper', 'InvalidTypeForEncoding', 
			'InvalidTypeForEncodingHelper', 'TypeMismatch', 'TypeMismatchHelper'),

		 'java/java6/org/omg/IOP/CodecPackage',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/omg/IOP/CodecPackage/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.Messaging
			'SYNC_WITH_TRANSPORT', 'SyncScopeHelper'),

		 'java/java6/org/omg/Messaging',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/omg/Messaging/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.PortableInterceptor
			'ACTIVE', 'AdapterManagerIdHelper', 'AdapterNameHelper', 
			'AdapterStateHelper', 'ClientRequestInfo', 'ClientRequestInfoOperations', 
			'ClientRequestInterceptor', 'ClientRequestInterceptorOperations', 'Current', 
			'CurrentHelper', 'CurrentOperations', 'DISCARDING', 
			'ForwardRequest', 'ForwardRequestHelper', 'HOLDING', 
			'INACTIVE', 'IORInfo', 'IORInfoOperations', 
			'IORInterceptor', 'IORInterceptorOperations', 'IORInterceptor_3_0', 
			'IORInterceptor_3_0Helper', 'IORInterceptor_3_0Holder', 'IORInterceptor_3_0Operations', 
			'Interceptor', 'InterceptorOperations', 'InvalidSlot', 
			'InvalidSlotHelper', 'LOCATION_FORWARD', 'NON_EXISTENT', 
			'ORBIdHelper', 'ORBInitInfo', 'ORBInitInfoOperations', 
			'ORBInitializer', 'ORBInitializerOperations', 'ObjectIdHelper', 
			'ObjectReferenceFactory', 'ObjectReferenceFactoryHelper', 'ObjectReferenceFactoryHolder', 
			'ObjectReferenceTemplate', 'ObjectReferenceTemplateHelper', 'ObjectReferenceTemplateHolder', 
			'ObjectReferenceTemplateSeqHelper', 'ObjectReferenceTemplateSeqHolder', 'PolicyFactory', 
			'PolicyFactoryOperations', 'RequestInfo', 'RequestInfoOperations', 
			'SUCCESSFUL', 'SYSTEM_EXCEPTION', 'ServerIdHelper', 
			'ServerRequestInfo', 'ServerRequestInfoOperations', 'ServerRequestInterceptor', 
			'ServerRequestInterceptorOperations', 'TRANSPORT_RETRY', 'UNKNOWN', 
			'USER_EXCEPTION'),

		 'java/java6/org/omg/PortableInterceptor',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/omg/PortableInterceptor/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.PortableInterceptor.ORBInitInfoPackage
			'DuplicateName', 'DuplicateNameHelper', 'InvalidName', 
			'InvalidNameHelper', 'ObjectIdHelper'),

		 'java/java6/org/omg/PortableInterceptor/ORBInitInfoPackage',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/omg/PortableInterceptor/ORBInitInfoPackage/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.PortableServer
			'AdapterActivator', 'AdapterActivatorOperations', 'Current', 
			'CurrentHelper', 'CurrentOperations', 'DynamicImplementation', 
			'ForwardRequest', 'ForwardRequestHelper', 'ID_ASSIGNMENT_POLICY_ID', 
			'ID_UNIQUENESS_POLICY_ID', 'IMPLICIT_ACTIVATION_POLICY_ID', 'IdAssignmentPolicy', 
			'IdAssignmentPolicyOperations', 'IdAssignmentPolicyValue', 'IdUniquenessPolicy', 
			'IdUniquenessPolicyOperations', 'IdUniquenessPolicyValue', 'ImplicitActivationPolicy', 
			'ImplicitActivationPolicyOperations', 'ImplicitActivationPolicyValue', 'LIFESPAN_POLICY_ID', 
			'LifespanPolicy', 'LifespanPolicyOperations', 'LifespanPolicyValue', 
			'POA', 'POAHelper', 'POAManager', 
			'POAManagerOperations', 'POAOperations', 'REQUEST_PROCESSING_POLICY_ID', 
			'RequestProcessingPolicy', 'RequestProcessingPolicyOperations', 'RequestProcessingPolicyValue', 
			'SERVANT_RETENTION_POLICY_ID', 'Servant', 'ServantActivator', 
			'ServantActivatorHelper', 'ServantActivatorOperations', 'ServantActivatorPOA', 
			'ServantLocator', 'ServantLocatorHelper', 'ServantLocatorOperations', 
			'ServantLocatorPOA', 'ServantManager', 'ServantManagerOperations', 
			'ServantRetentionPolicy', 'ServantRetentionPolicyOperations', 'ServantRetentionPolicyValue', 
			'THREAD_POLICY_ID', 'ThreadPolicy', 'ThreadPolicyOperations', 
			'ThreadPolicyValue', '_ServantActivatorStub', '_ServantLocatorStub'),

		 'java/java6/org/omg/PortableServer',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/omg/PortableServer/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.PortableServer.CurrentPackage
			'NoContext', 'NoContextHelper'),

		 'java/java6/org/omg/PortableServer/CurrentPackage',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/omg/PortableServer/CurrentPackage/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.PortableServer.POAManagerPackage
			'AdapterInactive', 'AdapterInactiveHelper', 'State'),

		 'java/java6/org/omg/PortableServer/POAManagerPackage',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/omg/PortableServer/POAManagerPackage/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.PortableServer.POAPackage
			'AdapterAlreadyExists', 'AdapterAlreadyExistsHelper', 'AdapterNonExistent', 
			'AdapterNonExistentHelper', 'InvalidPolicy', 'InvalidPolicyHelper', 
			'NoServant', 'NoServantHelper', 'ObjectAlreadyActive', 
			'ObjectAlreadyActiveHelper', 'ObjectNotActive', 'ObjectNotActiveHelper', 
			'ServantAlreadyActive', 'ServantAlreadyActiveHelper', 'ServantNotActive', 
			'ServantNotActiveHelper', 'WrongAdapter', 'WrongAdapterHelper', 
			'WrongPolicy', 'WrongPolicyHelper'),

		 'java/java6/org/omg/PortableServer/POAPackage',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/omg/PortableServer/POAPackage/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.PortableServer.portable
			'Delegate'),

		 'java/java6/org/omg/PortableServer/portable',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/omg/PortableServer/portable/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.PortableServer.ServantLocatorPackage
			'CookieHolder'),

		 'java/java6/org/omg/PortableServer/ServantLocatorPackage',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/omg/PortableServer/ServantLocatorPackage/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.SendingContext
			'RunTime', 'RunTimeOperations'),

		 'java/java6/org/omg/SendingContext',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/omg/SendingContext/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.stub.java.rmi
			'_Remote_Stub'),

		 'java/java6/org/omg/stub/java/rmi',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/omg/stub/java/rmi/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.w3c.dom
			'Attr', 'CDATASection', 'CharacterData', 
			'Comment', 'DOMConfiguration', 'DOMError', 
			'DOMErrorHandler', 'DOMException', 'DOMImplementation', 
			'DOMImplementationList', 'DOMImplementationSource', 'DOMLocator', 
			'DOMStringList', 'Document', 'DocumentFragment', 
			'DocumentType', 'Element', 'Entity', 
			'EntityReference', 'NameList', 'NamedNodeMap', 
			'Node', 'NodeList', 'Notation', 
			'ProcessingInstruction', 'Text', 'TypeInfo', 
			'UserDataHandler'),

		 'java/java6/org/w3c/dom',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/w3c/dom/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.w3c.dom.bootstrap
			'DOMImplementationRegistry'),

		 'java/java6/org/w3c/dom/bootstrap',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/w3c/dom/bootstrap/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.w3c.dom.events
			'DocumentEvent', 'Event', 'EventException', 
			'EventListener', 'EventTarget', 'MouseEvent', 
			'MutationEvent', 'UIEvent'),

		 'java/java6/org/w3c/dom/events',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/w3c/dom/events/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.w3c.dom.ls
			'DOMImplementationLS', 'LSException', 'LSInput', 
			'LSLoadEvent', 'LSOutput', 'LSParser', 
			'LSParserFilter', 'LSProgressEvent', 'LSResourceResolver', 
			'LSSerializer', 'LSSerializerFilter'),

		 'java/java6/org/w3c/dom/ls',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/w3c/dom/ls/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.xml.sax
			'AttributeList', 'Attributes', 'ContentHandler', 
			'DTDHandler', 'DocumentHandler', 'EntityResolver', 
			'ErrorHandler', 'HandlerBase', 'InputSource', 
			'Locator', 'Parser', 'SAXException', 
			'SAXNotRecognizedException', 'SAXNotSupportedException', 'SAXParseException', 
			'XMLFilter', 'XMLReader'),

		 'java/java6/org/xml/sax',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/xml/sax/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.xml.sax.ext
			'Attributes2', 'Attributes2Impl', 'DeclHandler', 
			'DefaultHandler2', 'EntityResolver2', 'LexicalHandler', 
			'Locator2', 'Locator2Impl'),

		 'java/java6/org/xml/sax/ext',
		 true,
		 'http://java.sun.com/javase/6/docs/api/org/xml/sax/ext/{FNAME}.html'

	);

 	    
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

function geshi_java_java6_single_string (&$context)
{
    $context->addDelimiters("'", "'");
    $context->setEscapeCharacters('\\');
    $context->setCharactersToEscape(array('\\', "'"));
    $context->setComplexFlag(GESHI_COMPLEX_PASSALL);
    //$context->_contextStyleType = GESHI_STYLE_STRINGS;
}

function geshi_java_java6_double_string (&$context)
{
    $context->addDelimiters('"', array('"', "\n"));
    //$context->setEscapeCharacters('\\');
    //$context->setCharactersToEscape(array('n', 'r', 't', '\\', '"', "\n"));
    $context->addEscapeGroup('\\', array('n', 'r', 't'/*, '"'*/, "\n"));
    // @todo may be able to do this a better way (not using constants), and not so many calls?
    $context->setComplexFlag(GESHI_COMPLEX_PASSALL);
    // @todo dunno about this one yet    
    //$context->_contextStyleType = GESHI_STYLE_STRINGS;
}

function geshi_java_java6_single_comment (&$context)
{
    $context->addDelimiters('//', "\n");
    $context->setComplexFlag(GESHI_COMPLEX_PASSALL);
    //$this->_contextStyleType = GESHI_STYLE_COMMENTS;
}

function geshi_java_java6_multi_comment (&$context)
{
    $context->addDelimiters('/*', '*/');
    $context->setComplexFlag(GESHI_COMPLEX_PASSALL);
    //$this->_contextStyleType = GESHI_STYLE_COMMENTS;
}

/**#@-*/

?>


