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
 * @author    Tim Wright <tim.w@clear.net.nz>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005 Nigel McNie
 * @version   $Id$
 * 
 */
 
/** Get the GeSHiStringContext class */
require_once GESHI_CLASSES_ROOT . 'class.geshistringcontext.php';
/** Get the GeSHiSingleCharContext class */
require_once GESHI_CLASSES_ROOT . 'class.geshisinglecharcontext.php';
 
$this->_childContexts = array(
    new GeSHiSingleCharContext('java',  $DIALECT, 'single_string'),
    new GeSHiStringContext('java', $DIALECT, 'double_string'),
    new GeSHiContext('java', $DIALECT, 'single_comment'),
    new GeSHiContext('java', $DIALECT, 'multi_comment'),
    new GeshiContext('java', $DIALECT, 'doxygen')
);
 
$this->_contextKeywords = array(
    array(
    	//keywords
        array(
        	'abstract', 'assert', 'break', 'case', 'catch',
        	'class', 'const', 'continue', 'default', 'do',
        	'else', 'enum', 'extends', 'final', 'finally', 'for',
        	'goto', 'if', 'implements', 'import', 'instanceof',
        	'interface', 'native', 'new', 'package', 'private',
        	'protected', 'public', 'return', 'static', 'strictfp',
        	'super', 'switch', 'synchronized', 'this', 'throw', 'throws',
        	'transient', 'try', 'volatile', 'while' 
        ),
        $CONTEXT . '/keyword',
        false,
        'http://java.sun.com/docs/books/tutorial/java/nutsandbolts/_keywords.html'
    ),
    
	array(
	//java.applet
		array(
			'Applet', 'AppletContext', 'AppletStub', 
			'AudioClip'),

		$CONTEXT . '/java/applet',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/applet/package-frame.html'

	),

	array(
	//java.awt
		array(
			'AWTError', 'AWTEvent', 'AWTEventMulticaster', 
			'AWTException', 'AWTKeyStroke', 'AWTPermission', 
			'ActiveEvent', 'Adjustable', 'AlphaComposite', 
			'BasicStroke', 'BorderLayout', 'BufferCapabilities', 
			'BufferCapabilities.FlipContents', 'Button', 'Canvas', 
			'CardLayout', 'Checkbox', 'CheckboxGroup', 
			'CheckboxMenuItem', 'Choice', 'Color', 
			'Component', 'ComponentOrientation', 'Composite', 
			'CompositeContext', 'Container', 'ContainerOrderFocusTraversalPolicy', 
			'Cursor', 'DefaultFocusTraversalPolicy', 'DefaultKeyboardFocusManager', 
			'Dialog', 'Dimension', 'DisplayMode', 
			'Event', 'EventQueue', 'FileDialog', 
			'FlowLayout', 'FocusTraversalPolicy', 'Font', 
			'FontFormatException', 'FontMetrics', 'Frame', 
			'GradientPaint', 'Graphics', 'Graphics2D', 
			'GraphicsConfigTemplate', 'GraphicsConfiguration', 'GraphicsDevice', 
			'GraphicsEnvironment', 'GridBagConstraints', 'GridBagLayout', 
			'GridLayout', 'HeadlessException', 'IllegalComponentStateException', 
			'Image', 'ImageCapabilities', 'Insets', 
			'ItemSelectable', 'JobAttributes', 'JobAttributes.DefaultSelectionType', 
			'JobAttributes.DestinationType', 'JobAttributes.DialogType', 'JobAttributes.MultipleDocumentHandlingType', 
			'JobAttributes.SidesType', 'KeyEventDispatcher', 'KeyEventPostProcessor', 
			'KeyboardFocusManager', 'Label', 'LayoutManager', 
			'LayoutManager2', 'List', 'MediaTracker', 
			'Menu', 'MenuBar', 'MenuComponent', 
			'MenuContainer', 'MenuItem', 'MenuShortcut', 
			'MouseInfo', 'PageAttributes', 'PageAttributes.ColorType', 
			'PageAttributes.MediaType', 'PageAttributes.OrientationRequestedType', 'PageAttributes.OriginType', 
			'PageAttributes.PrintQualityType', 'Paint', 'PaintContext', 
			'Panel', 'Point', 'PointerInfo', 
			'Polygon', 'PopupMenu', 'PrintGraphics', 
			'PrintJob', 'Rectangle', 'RenderingHints', 
			'RenderingHints.Key', 'Robot', 'ScrollPane', 
			'ScrollPaneAdjustable', 'Scrollbar', 'Shape', 
			'Stroke', 'SystemColor', 'TextArea', 
			'TextComponent', 'TextField', 'TexturePaint', 
			'Toolkit', 'Transparency', 'Window'),

		$CONTEXT . '/java/awt',
		'color:#444;font-weight:bold;',
		false,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/awt/package-frame.html'

	),

	array(
	//java.awt.color
		array(
			'CMMException', 'ColorSpace', 'ICC_ColorSpace', 
			'ICC_Profile', 'ICC_ProfileGray', 'ICC_ProfileRGB', 
			'ProfileDataException'),

		$CONTEXT . '/java/awt/color',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/awt/color/package-frame.html'

	),

	array(
	//java.awt.datatransfer
		array(
			'Clipboard', 'ClipboardOwner', 'DataFlavor', 
			'FlavorEvent', 'FlavorListener', 'FlavorMap', 
			'FlavorTable', 'MimeTypeParseException', 'StringSelection', 
			'SystemFlavorMap', 'Transferable', 'UnsupportedFlavorException'),

		$CONTEXT . '/java/awt/datatransfer',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/awt/datatransfer/package-frame.html'

	),

	array(
	//java.awt.dnd
		array(
			'Autoscroll', 'DnDConstants', 'DragGestureEvent', 
			'DragGestureListener', 'DragGestureRecognizer', 'DragSource', 
			'DragSourceAdapter', 'DragSourceContext', 'DragSourceDragEvent', 
			'DragSourceDropEvent', 'DragSourceEvent', 'DragSourceListener', 
			'DragSourceMotionListener', 'DropTarget', 'DropTarget.DropTargetAutoScroller', 
			'DropTargetAdapter', 'DropTargetContext', 'DropTargetDragEvent', 
			'DropTargetDropEvent', 'DropTargetEvent', 'DropTargetListener', 
			'InvalidDnDOperationException', 'MouseDragGestureRecognizer'),

		$CONTEXT . '/java/awt/dnd',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/awt/dnd/package-frame.html'

	),

	array(
	//java.awt.event
		array(
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

		$CONTEXT . '/java/awt/event',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/awt/event/package-frame.html'

	),

	array(
	//java.awt.font 
		array(
			'FontRenderContext', 'GlyphJustificationInfo', 'GlyphMetrics', 
			'GlyphVector', 'GraphicAttribute', 'ImageGraphicAttribute', 
			'LineBreakMeasurer', 'LineMetrics', 'MultipleMaster', 
			'NumericShaper', 'OpenType', 'ShapeGraphicAttribute', 
			'TextAttribute', 'TextHitInfo', 'TextLayout', 
			'TextLayout.CaretPolicy', 'TextMeasurer', 'TransformAttribute'),

		$CONTEXT . '/java/awt/font',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/awt/font/package-frame.html'

	),

	array(
	//java.awt.geom 
		array(
			'AffineTransform', 'Arc2D', 'Arc2D.Double', 
			'Arc2D.Float', 'Area', 'CubicCurve2D', 
			'CubicCurve2D.Double', 'CubicCurve2D.Float', 'Dimension2D', 
			'Ellipse2D', 'Ellipse2D.Double', 'Ellipse2D.Float', 
			'FlatteningPathIterator', 'GeneralPath', 'IllegalPathStateException', 
			'Line2D', 'Line2D.Double', 'Line2D.Float', 
			'NoninvertibleTransformException', 'PathIterator', 'Point2D', 
			'Point2D.Double', 'Point2D.Float', 'QuadCurve2D', 
			'QuadCurve2D.Double', 'QuadCurve2D.Float', 'Rectangle2D', 
			'Rectangle2D.Double', 'Rectangle2D.Float', 'RectangularShape', 
			'RoundRectangle2D', 'RoundRectangle2D.Double', 'RoundRectangle2D.Float'),

		$CONTEXT . '/java/awt/geom',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/awt/geom/package-frame.html'

	),

	array(
	//java.awt.im 
		array(
			'InputContext', 'InputMethodHighlight', 'InputMethodRequests', 
			'InputSubset'),

		$CONTEXT . '/java/awt/im',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/awt/im/package-frame.html'

	),

	array(
	//java.awt.im.spi 
		array(
			'InputMethod', 'InputMethodContext', 'InputMethodDescriptor'),

		$CONTEXT . '/java/awt/im/spi',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/awt/im/spi/package-frame.html'

	),

	array(
	//java.awt.image 
		array(
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

		$CONTEXT . '/java/awt/image',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/awt/image/package-frame.html'

	),

	array(
	//java.awt.image.renderable
		array(
			'ContextualRenderedImageFactory', 'ParameterBlock', 'RenderContext', 
			'RenderableImage', 'RenderableImageOp', 'RenderableImageProducer', 
			'RenderedImageFactory'),

		$CONTEXT . '/java/awt/image/renderable',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/awt/image/renderable/package-frame.html'

	),

	array(
	//java.awt.print 
		array(
			'Book', 'PageFormat', 'Pageable', 
			'Paper', 'Printable', 'PrinterAbortException', 
			'PrinterException', 'PrinterGraphics', 'PrinterIOException', 
			'PrinterJob'),

		$CONTEXT . '/java/awt/print',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/awt/print/package-frame.html'

	),

	array(
	//java.beans 
		array(
			'AppletInitializer', 'BeanDescriptor', 'BeanInfo', 
			'Beans', 'Customizer', 'DefaultPersistenceDelegate', 
			'DesignMode', 'Encoder', 'EventHandler', 
			'EventSetDescriptor', 'ExceptionListener', 'Expression', 
			'FeatureDescriptor', 'IndexedPropertyChangeEvent', 'IndexedPropertyDescriptor', 
			'IntrospectionException', 'Introspector', 'MethodDescriptor', 
			'ParameterDescriptor', 'PersistenceDelegate', 'PropertyChangeEvent', 
			'PropertyChangeListener', 'PropertyChangeListenerProxy', 'PropertyChangeSupport', 
			'PropertyDescriptor', 'PropertyEditor', 'PropertyEditorManager', 
			'PropertyEditorSupport', 'PropertyVetoException', 'SimpleBeanInfo', 
			'Statement', 'VetoableChangeListener', 'VetoableChangeListenerProxy', 
			'VetoableChangeSupport', 'Visibility', 'XMLDecoder', 
			'XMLEncoder'),

		$CONTEXT . '/java/beans',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/beans/package-frame.html'

	),

	array(
	//java.beans.beancontext
		array(
			'BeanContext', 'BeanContextChild', 'BeanContextChildComponentProxy', 
			'BeanContextChildSupport', 'BeanContextContainerProxy', 'BeanContextEvent', 
			'BeanContextMembershipEvent', 'BeanContextMembershipListener', 'BeanContextProxy', 
			'BeanContextServiceAvailableEvent', 'BeanContextServiceProvider', 'BeanContextServiceProviderBeanInfo', 
			'BeanContextServiceRevokedEvent', 'BeanContextServiceRevokedListener', 'BeanContextServices', 
			'BeanContextServicesListener', 'BeanContextServicesSupport', 'BeanContextServicesSupport.BCSSServiceProvider', 
			'BeanContextSupport', 'BeanContextSupport.BCSIterator'),

		$CONTEXT . '/java/beans/beancontext',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/beans/beancontext/package-frame.html'

	),

	array(
	//java.io 
		array(
			'BufferedInputStream', 'BufferedOutputStream', 'BufferedReader', 
			'BufferedWriter', 'ByteArrayInputStream', 'ByteArrayOutputStream', 
			'CharArrayReader', 'CharArrayWriter', 'CharConversionException', 
			'Closeable', 'DataInput', 'DataInputStream', 
			'DataOutput', 'DataOutputStream', 'EOFException', 
			'Externalizable', 'File', 'FileDescriptor', 
			'FileFilter', 'FileInputStream', 'FileNotFoundException', 
			'FileOutputStream', 'FilePermission', 'FileReader', 
			'FileWriter', 'FilenameFilter', 'FilterInputStream', 
			'FilterOutputStream', 'FilterReader', 'FilterWriter', 
			'Flushable', 'IOException', 'InputStream', 
			'InputStreamReader', 'InterruptedIOException', 'InvalidClassException', 
			'InvalidObjectException', 'LineNumberInputStream', 'LineNumberReader', 
			'NotActiveException', 'NotSerializableException', 'ObjectInput', 
			'ObjectInputStream', 'ObjectInputStream.GetField', 'ObjectInputValidation', 
			'ObjectOutput', 'ObjectOutputStream', 'ObjectOutputStream.PutField', 
			'ObjectStreamClass', 'ObjectStreamConstants', 'ObjectStreamException', 
			'ObjectStreamField', 'OptionalDataException', 'OutputStream', 
			'OutputStreamWriter', 'PipedInputStream', 'PipedOutputStream', 
			'PipedReader', 'PipedWriter', 'PrintStream', 
			'PrintWriter', 'PushbackInputStream', 'PushbackReader', 
			'RandomAccessFile', 'Reader', 'SequenceInputStream', 
			'Serializable', 'SerializablePermission', 'StreamCorruptedException', 
			'StreamTokenizer', 'StringBufferInputStream', 'StringReader', 
			'StringWriter', 'SyncFailedException', 'UTFDataFormatException', 
			'UnsupportedEncodingException', 'WriteAbortedException', 'Writer'),

		$CONTEXT . '/java/io',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/io/package-frame.html'

	),

	array(
	//java.lang 
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
			'VerifyError', 'VirtualMachineError', 'Void'),

		$CONTEXT . '/java/lang',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/lang/package-frame.html'

	),

	array(
	//java.lang.annotation
		array(
			'Annotation', 'Annotation Types', 'AnnotationFormatError', 
			'AnnotationTypeMismatchException', 'Documented', 'ElementType', 
			'IncompleteAnnotationException', 'Inherited', 'Retention', 
			'RetentionPolicy', 'Target'),

		$CONTEXT . '/java/lang/annotation',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/lang/annotation/package-frame.html'

	),

	array(
	//java.lang.instrument
		array(
			'ClassDefinition', 'ClassFileTransformer', 'IllegalClassFormatException', 
			'Instrumentation', 'UnmodifiableClassException'),

		$CONTEXT . '/java/lang/instrument',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/lang/instrument/package-frame.html'

	),

	array(
	//java.lang.management 
		array(
			'ClassLoadingMXBean', 'CompilationMXBean', 'GarbageCollectorMXBean', 
			'ManagementFactory', 'ManagementPermission', 'MemoryMXBean', 
			'MemoryManagerMXBean', 'MemoryNotificationInfo', 'MemoryPoolMXBean', 
			'MemoryType', 'MemoryUsage', 'OperatingSystemMXBean', 
			'RuntimeMXBean', 'ThreadInfo', 'ThreadMXBean'),

		$CONTEXT . '/java/lang/management',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/lang/management/package-frame.html'

	),

	array(
	//java.lang.ref 
		array(
			'PhantomReference', 'Reference', 'ReferenceQueue', 
			'SoftReference', 'WeakReference'),

		$CONTEXT . '/java/lang/ref',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/lang/ref/package-frame.html'

	),

	array(
	//java.lang.reflect 
		array(
			'AccessibleObject', 'AnnotatedElement', 'Array', 
			'Constructor', 'Field', 'GenericArrayType', 
			'GenericDeclaration', 'GenericSignatureFormatError', 'InvocationHandler', 
			'InvocationTargetException', 'MalformedParameterizedTypeException', 'Member', 
			'Method', 'Modifier', 'ParameterizedType', 
			'Proxy', 'ReflectPermission', 'Type', 
			'TypeVariable', 'UndeclaredThrowableException', 'WildcardType'),

		$CONTEXT . '/java/lang/reflect',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/lang/reflect/package-frame.html'

	),

	array(
	//java.math
		array(
			'BigDecimal', 'BigInteger', 'MathContext', 
			'RoundingMode'),

		$CONTEXT . '/java/math',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/math/package-frame.html'

	),

	array(
	//java.net 
		array(
			'Authenticator', 'Authenticator.RequestorType', 'BindException', 
			'CacheRequest', 'CacheResponse', 'ConnectException', 
			'ContentHandler', 'ContentHandlerFactory', 'CookieHandler', 
			'DatagramPacket', 'DatagramSocket', 'DatagramSocketImpl', 
			'DatagramSocketImplFactory', 'FileNameMap', 'HttpRetryException', 
			'HttpURLConnection', 'Inet4Address', 'Inet6Address', 
			'InetAddress', 'InetSocketAddress', 'JarURLConnection', 
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

		$CONTEXT . '/java/net',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/net/package-frame.html'

	),

	array(
	//java.nio 
		array(
			'Buffer', 'BufferOverflowException', 'BufferUnderflowException', 
			'ByteBuffer', 'ByteOrder', 'CharBuffer', 
			'DoubleBuffer', 'FloatBuffer', 'IntBuffer', 
			'InvalidMarkException', 'LongBuffer', 'MappedByteBuffer', 
			'ReadOnlyBufferException', 'ShortBuffer'),

		$CONTEXT . '/java/nio',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/nio/package-frame.html'

	),

	array(
	//java.nio.channels 
		array(
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

		$CONTEXT . '/java/nio/channels',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/nio/channels/package-frame.html'

	),

	array(
	//java.nio.channels.spi 
		array(
			'AbstractInterruptibleChannel', 'AbstractSelectableChannel', 'AbstractSelectionKey', 
			'AbstractSelector', 'SelectorProvider'),

		$CONTEXT . '/java/nio/channels/spi',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/nio/channels/spi/package-frame.html'

	),

	array(
	//java.nio.charset
		array(
			'CharacterCodingException', 'Charset', 'CharsetDecoder', 
			'CharsetEncoder', 'CoderMalfunctionError', 'CoderResult', 
			'CodingErrorAction', 'IllegalCharsetNameException', 'MalformedInputException', 
			'UnmappableCharacterException', 'UnsupportedCharsetException'),

		$CONTEXT . '/java/nio/charset',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/nio/charset/package-frame.html'

	),

	array(
	//java.nio.charset.spi 
		array(
			'CharsetProvider'),

		$CONTEXT . '/java/nio/charset/spi',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/nio/charset/spi/package-frame.html'

	),

	array(
	//java.rmi 
		array(
			'AccessException', 'AlreadyBoundException', 'ConnectException', 
			'ConnectIOException', 'MarshalException', 'MarshalledObject', 
			'Naming', 'NoSuchObjectException', 'NotBoundException', 
			'RMISecurityException', 'RMISecurityManager', 'Remote', 
			'RemoteException', 'ServerError', 'ServerException', 
			'ServerRuntimeException', 'StubNotFoundException', 'UnexpectedException', 
			'UnknownHostException', 'UnmarshalException'),

		$CONTEXT . '/java/rmi',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/rmi/package-frame.html'

	),

	array(
	//java.rmi.activation 
		array(
			'Activatable', 'ActivateFailedException', 'ActivationDesc', 
			'ActivationException', 'ActivationGroup', 'ActivationGroupDesc', 
			'ActivationGroupDesc.CommandEnvironment', 'ActivationGroupID', 'ActivationGroup_Stub', 
			'ActivationID', 'ActivationInstantiator', 'ActivationMonitor', 
			'ActivationSystem', 'Activator', 'UnknownGroupException', 
			'UnknownObjectException'),

		$CONTEXT . '/java/rmi/activation',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/rmi/activation/package-frame.html'

	),

	array(
	//java.rmi.dgc 
		array(
			'DGC', 'Lease', 'VMID'),

		$CONTEXT . '/java/rmi/dgc',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/rmi/dgc/package-frame.html'

	),

	array(
	//java.rmi.registry 
		array(
			'LocateRegistry', 'Registry', 'RegistryHandler'),

		$CONTEXT . '/java/rmi/registry',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/rmi/registry/package-frame.html'

	),

	array(
	//java.rmi.server 
		array(
			'ExportException', 'LoaderHandler', 'LogStream', 
			'ObjID', 'Operation', 'RMIClassLoader', 
			'RMIClassLoaderSpi', 'RMIClientSocketFactory', 'RMIFailureHandler', 
			'RMIServerSocketFactory', 'RMISocketFactory', 'RemoteCall', 
			'RemoteObject', 'RemoteObjectInvocationHandler', 'RemoteRef', 
			'RemoteServer', 'RemoteStub', 'ServerCloneException', 
			'ServerNotActiveException', 'ServerRef', 'Skeleton', 
			'SkeletonMismatchException', 'SkeletonNotFoundException', 'SocketSecurityException', 
			'UID', 'UnicastRemoteObject', 'Unreferenced'),

		$CONTEXT . '/java/rmi/server',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/rmi/server/package-frame.html'

	),

	array(
	//java.security
		array(
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
			'Policy', 'Principal', 'PrivateKey', 
			'PrivilegedAction', 'PrivilegedActionException', 'PrivilegedExceptionAction', 
			'ProtectionDomain', 'Provider', 'Provider.Service', 
			'ProviderException', 'PublicKey', 'SecureClassLoader', 
			'SecureRandom', 'SecureRandomSpi', 'Security', 
			'SecurityPermission', 'Signature', 'SignatureException', 
			'SignatureSpi', 'SignedObject', 'Signer', 
			'Timestamp', 'UnrecoverableEntryException', 'UnrecoverableKeyException', 
			'UnresolvedPermission'),

		$CONTEXT . '/java/security',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/security/package-frame.html'

	),

	array(
	//java.security.acl 
		array(
			'Acl', 'AclEntry', 'AclNotFoundException', 
			'Group', 'LastOwnerException', 'NotOwnerException', 
			'Owner', 'Permission'),

		$CONTEXT . '/java/security/acl',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/security/acl/package-frame.html'

	),

	array(
	//java.security.cert 
		array(
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

		$CONTEXT . '/java/security/cert',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/security/cert/package-frame.html'

	),

	array(
	//java.security.interfaces
		array(
			'DSAKey', 'DSAKeyPairGenerator', 'DSAParams', 
			'DSAPrivateKey', 'DSAPublicKey', 'ECKey', 
			'ECPrivateKey', 'ECPublicKey', 'RSAKey', 
			'RSAMultiPrimePrivateCrtKey', 'RSAPrivateCrtKey', 'RSAPrivateKey', 
			'RSAPublicKey'),

		$CONTEXT . '/java/security/interfaces',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/security/interfaces/package-frame.html'

	),

	array(
	//java.security.spec 
		array(
			'AlgorithmParameterSpec', 'DSAParameterSpec', 'DSAPrivateKeySpec', 
			'DSAPublicKeySpec', 'ECField', 'ECFieldF2m', 
			'ECFieldFp', 'ECGenParameterSpec', 'ECParameterSpec', 
			'ECPoint', 'ECPrivateKeySpec', 'ECPublicKeySpec', 
			'EllipticCurve', 'EncodedKeySpec', 'InvalidKeySpecException', 
			'InvalidParameterSpecException', 'KeySpec', 'MGF1ParameterSpec', 
			'PKCS8EncodedKeySpec', 'PSSParameterSpec', 'RSAKeyGenParameterSpec', 
			'RSAMultiPrimePrivateCrtKeySpec', 'RSAOtherPrimeInfo', 'RSAPrivateCrtKeySpec', 
			'RSAPrivateKeySpec', 'RSAPublicKeySpec', 'X509EncodedKeySpec'),

		$CONTEXT . '/java/security/spec',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/security/spec/package-frame.html'

	),

	array(
	//java.sql 
		array(
			'Array', 'BatchUpdateException', 'Blob', 
			'CallableStatement', 'Clob', 'Connection', 
			'DataTruncation', 'DatabaseMetaData', 'Date', 
			'Driver', 'DriverManager', 'DriverPropertyInfo', 
			'ParameterMetaData', 'PreparedStatement', 'Ref', 
			'ResultSet', 'ResultSetMetaData', 'SQLData', 
			'SQLException', 'SQLInput', 'SQLOutput', 
			'SQLPermission', 'SQLWarning', 'Savepoint', 
			'Statement', 'Struct', 'Time', 
			'Timestamp', 'Types'),

		$CONTEXT . '/java/sql',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/sql/package-frame.html'

	),

	array(
	//java.text 
		array(
			'Annotation', 'AttributedCharacterIterator', 'AttributedCharacterIterator.Attribute', 
			'AttributedString', 'Bidi', 'BreakIterator', 
			'CharacterIterator', 'ChoiceFormat', 'CollationElementIterator', 
			'CollationKey', 'Collator', 'DateFormat', 
			'DateFormat.Field', 'DateFormatSymbols', 'DecimalFormat', 
			'DecimalFormatSymbols', 'FieldPosition', 'Format', 
			'Format.Field', 'MessageFormat', 'MessageFormat.Field', 
			'NumberFormat', 'NumberFormat.Field', 'ParseException', 
			'ParsePosition', 'RuleBasedCollator', 'SimpleDateFormat', 
			'StringCharacterIterator'),

		$CONTEXT . '/java/text',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/text/package-frame.html'

	),

	array(
	//java.util 
		array(
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
			'Vector', 'WeakHashMap'),

		$CONTEXT . '/java/util',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/util/package-frame.html'

	),

	array(
	//java.util.concurrent 
		array(
			'AbstractExecutorService', 'ArrayBlockingQueue', 'BlockingQueue', 
			'BrokenBarrierException', 'Callable', 'CancellationException', 
			'CompletionService', 'ConcurrentHashMap', 'ConcurrentLinkedQueue', 
			'ConcurrentMap', 'CopyOnWriteArrayList', 'CopyOnWriteArraySet', 
			'CountDownLatch', 'CyclicBarrier', 'DelayQueue', 
			'Delayed', 'Exchanger', 'ExecutionException', 
			'Executor', 'ExecutorCompletionService', 'ExecutorService', 
			'Executors', 'Future', 'FutureTask', 
			'LinkedBlockingQueue', 'PriorityBlockingQueue', 'RejectedExecutionException', 
			'RejectedExecutionHandler', 'ScheduledExecutorService', 'ScheduledFuture', 
			'ScheduledThreadPoolExecutor', 'Semaphore', 'SynchronousQueue', 
			'ThreadFactory', 'ThreadPoolExecutor', 'ThreadPoolExecutor.AbortPolicy', 
			'ThreadPoolExecutor.CallerRunsPolicy', 'ThreadPoolExecutor.DiscardOldestPolicy', 'ThreadPoolExecutor.DiscardPolicy', 
			'TimeUnit', 'TimeoutException'),

		$CONTEXT . '/java/util/concurrent',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/util/concurrent/package-frame.html'

	),

	array(
	//java.util.concurrent.atomic 
		array(
			'AtomicBoolean', 'AtomicInteger', 'AtomicIntegerArray', 
			'AtomicIntegerFieldUpdater', 'AtomicLong', 'AtomicLongArray', 
			'AtomicLongFieldUpdater', 'AtomicMarkableReference', 'AtomicReference', 
			'AtomicReferenceArray', 'AtomicReferenceFieldUpdater', 'AtomicStampedReference'),

		$CONTEXT . '/java/util/concurrent/atomic',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/util/concurrent/atomic/package-frame.html'

	),

	array(
	//java.util.concurrent.locks 
		array(
			'AbstractQueuedSynchronizer', 'Condition', 'Lock', 
			'LockSupport', 'ReadWriteLock', 'ReentrantLock', 
			'ReentrantReadWriteLock', 'ReentrantReadWriteLock.ReadLock', 'ReentrantReadWriteLock.WriteLock'),

		$CONTEXT . '/java/util/concurrent/locks',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/util/concurrent/locks/package-frame.html'

	),

	array(
	//java.util.jar 
		array(
			'Attributes', 'Attributes.Name', 'JarEntry', 
			'JarException', 'JarFile', 'JarInputStream', 
			'JarOutputStream', 'Manifest', 'Pack200', 
			'Pack200.Packer', 'Pack200.Unpacker'),

		$CONTEXT . '/java/util/jar',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/util/jar/package-frame.html'

	),

	array(
	//java.util.logging 
		array(
			'ConsoleHandler', 'ErrorManager', 'FileHandler', 
			'Filter', 'Formatter', 'Handler', 
			'Level', 'LogManager', 'LogRecord', 
			'Logger', 'LoggingMXBean', 'LoggingPermission', 
			'MemoryHandler', 'SimpleFormatter', 'SocketHandler', 
			'StreamHandler', 'XMLFormatter'),

		$CONTEXT . '/java/util/logging',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/util/logging/package-frame.html'

	),

	array(
	//java.util.prefs 
		array(
			'AbstractPreferences', 'BackingStoreException', 'InvalidPreferencesFormatException', 
			'NodeChangeEvent', 'NodeChangeListener', 'PreferenceChangeEvent', 
			'PreferenceChangeListener', 'Preferences', 'PreferencesFactory'),

		$CONTEXT . '/java/util/prefs',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/util/prefs/package-frame.html'

	),

	array(
	//java.util.regex 
		array(
			'MatchResult', 'Matcher', 'Pattern', 
			'PatternSyntaxException'),

		$CONTEXT . '/java/util/regex',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/util/regex/package-frame.html'

	),

	array(
	//java.util.zip 
		array(
			'Adler32', 'CRC32', 'CheckedInputStream', 
			'CheckedOutputStream', 'Checksum', 'DataFormatException', 
			'Deflater', 'DeflaterOutputStream', 'GZIPInputStream', 
			'GZIPOutputStream', 'Inflater', 'InflaterInputStream', 
			'ZipEntry', 'ZipException', 'ZipFile', 
			'ZipInputStream', 'ZipOutputStream'),

		$CONTEXT . '/java/util/zip',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/java/util/zip/package-frame.html'

	),

	array(
	//javax.accessibility 
		array(
			'Accessible', 'AccessibleAction', 'AccessibleAttributeSequence', 
			'AccessibleBundle', 'AccessibleComponent', 'AccessibleContext', 
			'AccessibleEditableText', 'AccessibleExtendedComponent', 'AccessibleExtendedTable', 
			'AccessibleExtendedText', 'AccessibleHyperlink', 'AccessibleHypertext', 
			'AccessibleIcon', 'AccessibleKeyBinding', 'AccessibleRelation', 
			'AccessibleRelationSet', 'AccessibleResourceBundle', 'AccessibleRole', 
			'AccessibleSelection', 'AccessibleState', 'AccessibleStateSet', 
			'AccessibleStreamable', 'AccessibleTable', 'AccessibleTableModelChange', 
			'AccessibleText', 'AccessibleTextSequence', 'AccessibleValue'),

		$CONTEXT . '/javax/accessibility',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/accessibility/package-frame.html'

	),

	array(
	//javax.activity 
		array(
			'ActivityCompletedException', 'ActivityRequiredException', 'InvalidActivityException'),

		$CONTEXT . '/javax/activity',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/activity/package-frame.html'

	),

	array(
	//javax.crypto 
		array(
			'BadPaddingException', 'Cipher', 'CipherInputStream', 
			'CipherOutputStream', 'CipherSpi', 'EncryptedPrivateKeyInfo', 
			'ExemptionMechanism', 'ExemptionMechanismException', 'ExemptionMechanismSpi', 
			'IllegalBlockSizeException', 'KeyAgreement', 'KeyAgreementSpi', 
			'KeyGenerator', 'KeyGeneratorSpi', 'Mac', 
			'MacSpi', 'NoSuchPaddingException', 'NullCipher', 
			'SealedObject', 'SecretKey', 'SecretKeyFactory', 
			'SecretKeyFactorySpi', 'ShortBufferException'),

		$CONTEXT . '/javax/crypto',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/crypto/package-frame.html'

	),

	array(
	//javax.crypto.interfaces
		array(
			'DHKey', 'DHPrivateKey', 'DHPublicKey', 
			'PBEKey'),

		$CONTEXT . '/javax/crypto/interfaces',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/crypto/interfaces/package-frame.html'

	),

	array(
	//javax.crypto.spec 
		array(
			'DESKeySpec', 'DESedeKeySpec', 'DHGenParameterSpec', 
			'DHParameterSpec', 'DHPrivateKeySpec', 'DHPublicKeySpec', 
			'IvParameterSpec', 'OAEPParameterSpec', 'PBEKeySpec', 
			'PBEParameterSpec', 'PSource', 'PSource.PSpecified', 
			'RC2ParameterSpec', 'RC5ParameterSpec', 'SecretKeySpec'),

		$CONTEXT . '/javax/crypto/spec',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/crypto/spec/package-frame.html'

	),

	array(
	//javax.imageio 
		array(
			'IIOException', 'IIOImage', 'IIOParam', 
			'IIOParamController', 'ImageIO', 'ImageReadParam', 
			'ImageReader', 'ImageTranscoder', 'ImageTypeSpecifier', 
			'ImageWriteParam', 'ImageWriter'),

		$CONTEXT . '/javax/imageio',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/imageio/package-frame.html'

	),

	array(
	//javax.imageio.event 
		array(
			'IIOReadProgressListener', 'IIOReadUpdateListener', 'IIOReadWarningListener', 
			'IIOWriteProgressListener', 'IIOWriteWarningListener'),

		$CONTEXT . '/javax/imageio/event',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/imageio/event/package-frame.html'

	),

	array(
	//javax.imageio.metadata   
		array(
			'IIOInvalidTreeException', 'IIOMetadata', 'IIOMetadataController', 
			'IIOMetadataFormat', 'IIOMetadataFormatImpl', 'IIOMetadataNode'),

		$CONTEXT . '/javax/imageio/metadata',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/imageio/metadata/package-frame.html'

	),

	array(
	//javax.imageio.plugins.bmp   
		array(
			'BMPImageWriteParam'),

		$CONTEXT . '/javax/imageio/plugins/bmp',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/imageio/plugins/bmp/package-frame.html'

	),

	array(
	//javax.imageio.plugins.jpeg   
		array(
			'JPEGHuffmanTable', 'JPEGImageReadParam', 'JPEGImageWriteParam', 
			'JPEGQTable'),

		$CONTEXT . '/javax/imageio/plugins/jpeg',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/imageio/plugins/jpeg/package-frame.html'

	),

	array(
	//javax.imageio.spi 
		array(
			'IIORegistry', 'IIOServiceProvider', 'ImageInputStreamSpi', 
			'ImageOutputStreamSpi', 'ImageReaderSpi', 'ImageReaderWriterSpi', 
			'ImageTranscoderSpi', 'ImageWriterSpi', 'RegisterableService', 
			'ServiceRegistry', 'ServiceRegistry.Filter'),

		$CONTEXT . '/javax/imageio/spi',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/imageio/spi/package-frame.html'

	),

	array(
	//javax.imageio.stream   
		array(
			'FileCacheImageInputStream', 'FileCacheImageOutputStream', 'FileImageInputStream', 
			'FileImageOutputStream', 'IIOByteBuffer', 'ImageInputStream', 
			'ImageInputStreamImpl', 'ImageOutputStream', 'ImageOutputStreamImpl', 
			'MemoryCacheImageInputStream', 'MemoryCacheImageOutputStream'),

		$CONTEXT . '/javax/imageio/stream',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/imageio/stream/package-frame.html'

	),

	array(
	//javax.management  
		array(
			'Attribute', 'AttributeChangeNotification', 'AttributeChangeNotificationFilter', 
			'AttributeList', 'AttributeNotFoundException', 'AttributeValueExp', 
			'BadAttributeValueExpException', 'BadBinaryOpValueExpException', 'BadStringOperationException', 
			'DefaultLoaderRepository', 'Descriptor', 'DescriptorAccess', 
			'DynamicMBean', 'InstanceAlreadyExistsException', 'InstanceNotFoundException', 
			'IntrospectionException', 'InvalidApplicationException', 'InvalidAttributeValueException', 
			'JMException', 'JMRuntimeException', 'ListenerNotFoundException', 
			'MBeanAttributeInfo', 'MBeanConstructorInfo', 'MBeanException', 
			'MBeanFeatureInfo', 'MBeanInfo', 'MBeanNotificationInfo', 
			'MBeanOperationInfo', 'MBeanParameterInfo', 'MBeanPermission', 
			'MBeanRegistration', 'MBeanRegistrationException', 'MBeanServer', 
			'MBeanServerBuilder', 'MBeanServerConnection', 'MBeanServerDelegate', 
			'MBeanServerDelegateMBean', 'MBeanServerFactory', 'MBeanServerInvocationHandler', 
			'MBeanServerNotification', 'MBeanServerPermission', 'MBeanTrustPermission', 
			'MalformedObjectNameException', 'NotCompliantMBeanException', 'Notification', 
			'NotificationBroadcaster', 'NotificationBroadcasterSupport', 'NotificationEmitter', 
			'NotificationFilter', 'NotificationFilterSupport', 'NotificationListener', 
			'ObjectInstance', 'ObjectName', 'OperationsException', 
			'PersistentMBean', 'Query', 'QueryEval', 
			'QueryExp', 'ReflectionException', 'RuntimeErrorException', 
			'RuntimeMBeanException', 'RuntimeOperationsException', 'ServiceNotFoundException', 
			'StandardMBean', 'StringValueExp', 'ValueExp'),

		$CONTEXT . '/javax/management',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/management/package-frame.html'

	),

	array(
	//javax.management.loading   
		array(
			'ClassLoaderRepository', 'DefaultLoaderRepository', 'MLet', 
			'MLetMBean', 'PrivateClassLoader', 'PrivateMLet'),

		$CONTEXT . '/javax/management/loading',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/management/loading/package-frame.html'

	),

	array(
	//javax.management.modelmbean   
		array(
			'DescriptorSupport', 'InvalidTargetObjectTypeException', 'ModelMBean', 
			'ModelMBeanAttributeInfo', 'ModelMBeanConstructorInfo', 'ModelMBeanInfo', 
			'ModelMBeanInfoSupport', 'ModelMBeanNotificationBroadcaster', 'ModelMBeanNotificationInfo', 
			'ModelMBeanOperationInfo', 'RequiredModelMBean', 'XMLParseException'),

		$CONTEXT . '/javax/management/modelmbean',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/management/modelmbean/package-frame.html'

	),

	array(
	//javax.management.monitor   
		array(
			'CounterMonitor', 'CounterMonitorMBean', 'GaugeMonitor', 
			'GaugeMonitorMBean', 'Monitor', 'MonitorMBean', 
			'MonitorNotification', 'MonitorSettingException', 'StringMonitor', 
			'StringMonitorMBean'),

		$CONTEXT . '/javax/management/monitor',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/management/monitor/package-frame.html'

	),

	array(
	//javax.management.openmbean   
		array(
			'ArrayType', 'CompositeData', 'CompositeDataSupport', 
			'CompositeType', 'InvalidKeyException', 'InvalidOpenTypeException', 
			'KeyAlreadyExistsException', 'OpenDataException', 'OpenMBeanAttributeInfo', 
			'OpenMBeanAttributeInfoSupport', 'OpenMBeanConstructorInfo', 'OpenMBeanConstructorInfoSupport', 
			'OpenMBeanInfo', 'OpenMBeanInfoSupport', 'OpenMBeanOperationInfo', 
			'OpenMBeanOperationInfoSupport', 'OpenMBeanParameterInfo', 'OpenMBeanParameterInfoSupport', 
			'OpenType', 'SimpleType', 'TabularData', 
			'TabularDataSupport', 'TabularType'),

		$CONTEXT . '/javax/management/openmbean',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/management/openmbean/package-frame.html'

	),

	array(
	//javax.management.relation   
		array(
			'Relation', 'RelationServiceMBean', 'RelationSupportMBean', 
			'RelationType'),

		$CONTEXT . '/javax/management/relation',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/management/relation/package-frame.html'

	),

	array(
	//MBeanServerNotificationFilter
		array(
			'InvalidRelationIdException', 'InvalidRelationServiceException', 'InvalidRelationTypeException', 
			'InvalidRoleInfoException', 'InvalidRoleValueException', 'RelationException', 
			'RelationNotFoundException', 'RelationNotification', 'RelationService', 
			'RelationServiceNotRegisteredException', 'RelationSupport', 'RelationTypeNotFoundException', 
			'RelationTypeSupport', 'Role', 'RoleInfo', 
			'RoleInfoNotFoundException', 'RoleList', 'RoleNotFoundException', 
			'RoleResult', 'RoleStatus', 'RoleUnresolved', 
			'RoleUnresolvedList'),

		$CONTEXT . '/MBeanServerNotificationFilter',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/MBeanServerNotificationFilter/package-frame.html'

	),

	array(
	//javax.management.remote   
		array(
			'JMXAuthenticator', 'JMXConnectionNotification', 'JMXConnector', 
			'JMXConnectorFactory', 'JMXConnectorProvider', 'JMXConnectorServer', 
			'JMXConnectorServerFactory', 'JMXConnectorServerMBean', 'JMXConnectorServerProvider', 
			'JMXPrincipal', 'JMXProviderException', 'JMXServerErrorException', 
			'JMXServiceURL', 'MBeanServerForwarder', 'NotificationResult', 
			'SubjectDelegationPermission', 'TargetedNotification'),

		$CONTEXT . '/javax/management/remote',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/management/remote/package-frame.html'

	),

	array(
	//javax.management.remote.rmi   
		array(
			'RMIConnection', 'RMIConnectionImpl', 'RMIConnectionImpl_Stub', 
			'RMIConnector', 'RMIConnectorServer', 'RMIIIOPServerImpl', 
			'RMIJRMPServerImpl', 'RMIServer', 'RMIServerImpl', 
			'RMIServerImpl_Stub'),

		$CONTEXT . '/javax/management/remote/rmi',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/management/remote/rmi/package-frame.html'

	),

	array(
	//javax.management.timer  
		array(
			'Timer', 'TimerAlarmClockNotification', 'TimerMBean', 
			'TimerNotification'),

		$CONTEXT . '/javax/management/timer',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/management/timer/package-frame.html'

	),

	array(
	//javax.naming  
		array(
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

		$CONTEXT . '/javax/naming',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/naming/package-frame.html'

	),

	array(
	//javax.naming.directory   
		array(
			'Attribute', 'AttributeInUseException', 'AttributeModificationException', 
			'Attributes', 'BasicAttribute', 'BasicAttributes', 
			'DirContext', 'InitialDirContext', 'InvalidAttributeIdentifierException', 
			'InvalidAttributeValueException', 'InvalidAttributesException', 'InvalidSearchControlsException', 
			'InvalidSearchFilterException', 'ModificationItem', 'NoSuchAttributeException', 
			'SchemaViolationException', 'SearchControls', 'SearchResult'),

		$CONTEXT . '/javax/naming/directory',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/naming/directory/package-frame.html'

	),

	array(
	//javax.naming.event 
		array(
			'EventContext', 'EventDirContext', 'NamespaceChangeListener', 
			'NamingEvent', 'NamingExceptionEvent', 'NamingListener', 
			'ObjectChangeListener'),

		$CONTEXT . '/javax/naming/event',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/naming/event/package-frame.html'

	),

	array(
	//javax.naming.ldap  
		array(
			'BasicControl', 'Control', 'ControlFactory', 
			'ExtendedRequest', 'ExtendedResponse', 'HasControls', 
			'InitialLdapContext', 'LdapContext', 'LdapName', 
			'LdapReferralException', 'ManageReferralControl', 'PagedResultsControl', 
			'PagedResultsResponseControl', 'Rdn', 'SortControl', 
			'SortKey', 'SortResponseControl', 'StartTlsRequest', 
			'StartTlsResponse', 'UnsolicitedNotification', 'UnsolicitedNotificationEvent', 
			'UnsolicitedNotificationListener'),

		$CONTEXT . '/javax/naming/ldap',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/naming/ldap/package-frame.html'

	),

	array(
	//javax.naming.spi  
		array(
			'DirObjectFactory', 'DirStateFactory', 'DirStateFactory.Result', 
			'DirectoryManager', 'InitialContextFactory', 'InitialContextFactoryBuilder', 
			'NamingManager', 'ObjectFactory', 'ObjectFactoryBuilder', 
			'ResolveResult', 'Resolver', 'StateFactory'),

		$CONTEXT . '/javax/naming/spi',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/naming/spi/package-frame.html'

	),

	array(
	//javax.net   
		array(
			'ServerSocketFactory', 'SocketFactory'),

		$CONTEXT . '/javax/net',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/net/package-frame.html'

	),

	array(
	//javax.net.ssl   
		array(
			'CertPathTrustManagerParameters', 'HandshakeCompletedEvent', 'HandshakeCompletedListener', 
			'HostnameVerifier', 'HttpsURLConnection', 'KeyManager', 
			'KeyManagerFactory', 'KeyManagerFactorySpi', 'KeyStoreBuilderParameters', 
			'ManagerFactoryParameters', 'SSLContext', 'SSLContextSpi', 
			'SSLEngine', 'SSLEngineResult', 'SSLEngineResult.HandshakeStatus', 
			'SSLEngineResult.Status', 'SSLException', 'SSLHandshakeException', 
			'SSLKeyException', 'SSLPeerUnverifiedException', 'SSLPermission', 
			'SSLProtocolException', 'SSLServerSocket', 'SSLServerSocketFactory', 
			'SSLSession', 'SSLSessionBindingEvent', 'SSLSessionBindingListener', 
			'SSLSessionContext', 'SSLSocket', 'SSLSocketFactory', 
			'TrustManager', 'TrustManagerFactory', 'TrustManagerFactorySpi', 
			'X509ExtendedKeyManager', 'X509KeyManager', 'X509TrustManager'),

		$CONTEXT . '/javax/net/ssl',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/net/ssl/package-frame.html'

	),

	array(
	//javax.print
		array(
			'AttributeException', 'CancelablePrintJob', 'Doc', 
			'DocFlavor', 'DocFlavor.BYTE_ARRAY', 'DocFlavor.CHAR_ARRAY', 
			'DocFlavor.INPUT_STREAM', 'DocFlavor.READER', 'DocFlavor.SERVICE_FORMATTED', 
			'DocFlavor.STRING', 'DocFlavor.URL', 'DocPrintJob', 
			'FlavorException', 'MultiDoc', 'MultiDocPrintJob', 
			'MultiDocPrintService', 'PrintException', 'PrintService', 
			'PrintServiceLookup', 'ServiceUI', 'ServiceUIFactory', 
			'SimpleDoc', 'StreamPrintService', 'StreamPrintServiceFactory', 
			'URIException'),

		$CONTEXT . '/javax/print',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/print/package-frame.html'

	),

	array(
	//javax.print.attribute   
		array(
			'Attribute', 'AttributeSet', 'AttributeSetUtilities', 
			'DateTimeSyntax', 'DocAttribute', 'DocAttributeSet', 
			'EnumSyntax', 'HashAttributeSet', 'HashDocAttributeSet', 
			'HashPrintJobAttributeSet', 'HashPrintRequestAttributeSet', 'HashPrintServiceAttributeSet', 
			'IntegerSyntax', 'PrintJobAttribute', 'PrintJobAttributeSet', 
			'PrintRequestAttribute', 'PrintRequestAttributeSet', 'PrintServiceAttribute', 
			'PrintServiceAttributeSet', 'ResolutionSyntax', 'SetOfIntegerSyntax', 
			'Size2DSyntax', 'SupportedValuesAttribute', 'TextSyntax', 
			'URISyntax', 'UnmodifiableSetException'),

		$CONTEXT . '/javax/print/attribute',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/print/attribute/package-frame.html'

	),

	array(
	//javax.print.attribute.standard  
		array(
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

		$CONTEXT . '/javax/print/attribute/standard',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/print/attribute/standard/package-frame.html'

	),

	array(
	//javax.print.event  
		array(
			'PrintEvent', 'PrintJobAdapter', 'PrintJobAttributeEvent', 
			'PrintJobAttributeListener', 'PrintJobEvent', 'PrintJobListener', 
			'PrintServiceAttributeEvent', 'PrintServiceAttributeListener'),

		$CONTEXT . '/javax/print/event',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/print/event/package-frame.html'

	),

	array(
	//javax.rmi
		array(
			'PortableRemoteObject'),

		$CONTEXT . '/javax/rmi',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/rmi/package-frame.html'

	),

	array(
	//javax.rmi.CORBA  
		array(
			'ClassDesc', 'PortableRemoteObjectDelegate', 'Stub', 
			'StubDelegate', 'Tie', 'Util', 
			'UtilDelegate', 'ValueHandler', 'ValueHandlerMultiFormat'),

		$CONTEXT . '/javax/rmi/CORBA',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/rmi/CORBA/package-frame.html'

	),

	array(
	//javax.rmi.ssl   
		array(
			'SslRMIClientSocketFactory', 'SslRMIServerSocketFactory'),

		$CONTEXT . '/javax/rmi/ssl',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/rmi/ssl/package-frame.html'

	),

	array(
	//javax.security.auth   
		array(
			'AuthPermission', 'DestroyFailedException', 'Destroyable', 
			'Policy', 'PrivateCredentialPermission', 'RefreshFailedException', 
			'Refreshable', 'Subject', 'SubjectDomainCombiner'),

		$CONTEXT . '/javax/security/auth',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/security/auth/package-frame.html'

	),

	array(
	//javax.security.auth.callback   
		array(
			'Callback', 'CallbackHandler', 'ChoiceCallback', 
			'ConfirmationCallback', 'LanguageCallback', 'NameCallback', 
			'PasswordCallback', 'TextInputCallback', 'TextOutputCallback', 
			'UnsupportedCallbackException'),

		$CONTEXT . '/javax/security/auth/callback',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/security/auth/callback/package-frame.html'

	),

	array(
	//javax.security.auth.kerberos   
		array(
			'DelegationPermission', 'KerberosKey', 'KerberosPrincipal', 
			'KerberosTicket', 'ServicePermission'),

		$CONTEXT . '/javax/security/auth/kerberos',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/security/auth/kerberos/package-frame.html'

	),

	array(
	//javax.security.auth.login   
		array(
			'AccountException', 'AccountExpiredException', 'AccountLockedException', 
			'AccountNotFoundException', 'AppConfigurationEntry', 'AppConfigurationEntry.LoginModuleControlFlag', 
			'Configuration', 'CredentialException', 'CredentialExpiredException', 
			'CredentialNotFoundException', 'FailedLoginException', 'LoginContext', 
			'LoginException'),

		$CONTEXT . '/javax/security/auth/login',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/security/auth/login/package-frame.html'

	),

	array(
	//javax.security.auth.spi  
		array(
			'LoginModule'),

		$CONTEXT . '/javax/security/auth/spi',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/security/auth/spi/package-frame.html'

	),

	array(
	//javax.security.auth.x500   
		array(
			'X500Principal', 'X500PrivateCredential'),

		$CONTEXT . '/javax/security/auth/x500',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/security/auth/x500/package-frame.html'

	),

	array(
	//javax.security.cert  
		array(
			'Certificate', 'CertificateEncodingException', 'CertificateException', 
			'CertificateExpiredException', 'CertificateNotYetValidException', 'CertificateParsingException', 
			'X509Certificate'),

		$CONTEXT . '/javax/security/cert',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/security/cert/package-frame.html'

	),

	array(
	//javax.security.sasl   
		array(
			'AuthenticationException', 'AuthorizeCallback', 'RealmCallback', 
			'RealmChoiceCallback', 'Sasl', 'SaslClient', 
			'SaslClientFactory', 'SaslException', 'SaslServer', 
			'SaslServerFactory'),

		$CONTEXT . '/javax/security/sasl',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/security/sasl/package-frame.html'

	),

	array(
	//javax.sound.midi   
		array(
			'ControllerEventListener', 'Instrument', 'InvalidMidiDataException', 
			'MetaEventListener', 'MetaMessage', 'MidiChannel', 
			'MidiDevice', 'MidiDevice.Info', 'MidiEvent', 
			'MidiFileFormat', 'MidiMessage', 'MidiSystem', 
			'MidiUnavailableException', 'Patch', 'Receiver', 
			'Sequence', 'Sequencer', 'Sequencer.SyncMode', 
			'ShortMessage', 'Soundbank', 'SoundbankResource', 
			'Synthesizer', 'SysexMessage', 'Track', 
			'Transmitter', 'VoiceStatus'),

		$CONTEXT . '/javax/sound/midi',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/sound/midi/package-frame.html'

	),

	array(
	//javax.sound.midi.spi  
		array(
			'MidiDeviceProvider', 'MidiFileReader', 'MidiFileWriter', 
			'SoundbankReader'),

		$CONTEXT . '/javax/sound/midi/spi',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/sound/midi/spi/package-frame.html'

	),

	array(
	//javax.sound.sampled   
		array(
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

		$CONTEXT . '/javax/sound/sampled',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/sound/sampled/package-frame.html'

	),

	array(
	//javax.sound.sampled.spi   
		array(
			'AudioFileReader', 'AudioFileWriter', 'FormatConversionProvider', 
			'MixerProvider'),

		$CONTEXT . '/javax/sound/sampled/spi',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/sound/sampled/spi/package-frame.html'

	),

	array(
	//javax.sql  
		array(
			'ConnectionEvent', 'ConnectionEventListener', 'ConnectionPoolDataSource', 
			'DataSource', 'PooledConnection', 'RowSet', 
			'RowSetEvent', 'RowSetInternal', 'RowSetListener', 
			'RowSetMetaData', 'RowSetReader', 'RowSetWriter', 
			'XAConnection', 'XADataSource'),

		$CONTEXT . '/javax/sql',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/sql/package-frame.html'

	),

	array(
	//javax.sql.rowset   
		array(
			'BaseRowSet', 'CachedRowSet', 'FilteredRowSet', 
			'JdbcRowSet', 'JoinRowSet', 'Joinable', 
			'Predicate', 'RowSetMetaDataImpl', 'RowSetWarning', 
			'WebRowSet'),

		$CONTEXT . '/javax/sql/rowset',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/sql/rowset/package-frame.html'

	),

	array(
	//javax.sql.rowset.serial   
		array(
			'SQLInputImpl', 'SQLOutputImpl', 'SerialArray', 
			'SerialBlob', 'SerialClob', 'SerialDatalink', 
			'SerialException', 'SerialJavaObject', 'SerialRef', 
			'SerialStruct'),

		$CONTEXT . '/javax/sql/rowset/serial',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/sql/rowset/serial/package-frame.html'

	),

	array(
	//javax.sql.rowset.spi   
		array(
			'SyncFactory', 'SyncFactoryException', 'SyncProvider', 
			'SyncProviderException', 'SyncResolver', 'TransactionalWriter', 
			'XmlReader', 'XmlWriter'),

		$CONTEXT . '/javax/sql/rowset/spi',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/sql/rowset/spi/package-frame.html'

	),

	array(
	//javax.swing  
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
			'WindowConstants'),

		$CONTEXT . '/javax/swing',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/package-frame.html'

	),

	array(
	//javax.swing.border   
		array(
			'AbstractBorder', 'BevelBorder', 'Border', 
			'CompoundBorder', 'EmptyBorder', 'EtchedBorder', 
			'LineBorder', 'MatteBorder', 'SoftBevelBorder', 
			'TitledBorder'),

		$CONTEXT . '/javax/swing/border',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/border/package-frame.html'

	),

	array(
	//javax.swing.colorchooser   
		array(
			'AbstractColorChooserPanel', 'ColorChooserComponentFactory', 'ColorSelectionModel', 
			'DefaultColorSelectionModel'),

		$CONTEXT . '/javax/swing/colorchooser',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/colorchooser/package-frame.html'

	),

	array(
	//javax.swing.event   
		array(
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
			'PopupMenuEvent', 'PopupMenuListener', 'SwingPropertyChangeSupport', 
			'TableColumnModelEvent', 'TableColumnModelListener', 'TableModelEvent', 
			'TableModelListener', 'TreeExpansionEvent', 'TreeExpansionListener', 
			'TreeModelEvent', 'TreeModelListener', 'TreeSelectionEvent', 
			'TreeSelectionListener', 'TreeWillExpandListener', 'UndoableEditEvent', 
			'UndoableEditListener'),

		$CONTEXT . '/javax/swing/event',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/event/package-frame.html'

	),

	array(
	//javax.swing.filechooser   
		array(
			'FileFilter', 'FileSystemView', 'FileView'),

		$CONTEXT . '/javax/swing/filechooser',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/filechooser/package-frame.html'

	),

	array(
	//javax.swing.plaf   
		array(
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

		$CONTEXT . '/javax/swing/plaf',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/plaf/package-frame.html'

	),

	array(
	//javax.swing.plaf.basic   
		array(
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

		$CONTEXT . '/javax/swing/plaf/basic',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/plaf/basic/package-frame.html'

	),

	array(
	//javax.swing.plaf.metal  
		array(
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

		$CONTEXT . '/javax/swing/plaf/metal',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/plaf/metal/package-frame.html'

	),

	array(
	//javax.swing.plaf.multi   
		array(
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

		$CONTEXT . '/javax/swing/plaf/multi',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/plaf/multi/package-frame.html'

	),

	array(
	//javax.swing.plaf.synth   
		array(
			'ColorType', 'Region', 'SynthConstants', 
			'SynthContext', 'SynthGraphicsUtils', 'SynthLookAndFeel', 
			'SynthPainter', 'SynthStyle', 'SynthStyleFactory'),

		$CONTEXT . '/javax/swing/plaf/synth',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/plaf/synth/package-frame.html'

	),

	array(
	//javax.swing.table
		array(
			'AbstractTableModel', 'DefaultTableCellRenderer', 'DefaultTableCellRenderer.UIResource', 
			'DefaultTableColumnModel', 'DefaultTableModel', 'JTableHeader', 
			'TableCellEditor', 'TableCellRenderer', 'TableColumn', 
			'TableColumnModel', 'TableModel'),

		$CONTEXT . '/javax/swing/table',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/table/package-frame.html'

	),

	array(
	//javax.swing.text   
		array(
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
			'JTextComponent.KeyBinding', 'Keymap', 'LabelView', 
			'LayeredHighlighter', 'LayeredHighlighter.LayerPainter', 'LayoutQueue', 
			'MaskFormatter', 'MutableAttributeSet', 'NavigationFilter', 
			'NavigationFilter.FilterBypass', 'NumberFormatter', 'ParagraphView', 
			'PasswordView', 'PlainDocument', 'PlainView', 
			'Position', 'Position.Bias', 'Segment', 
			'SimpleAttributeSet', 'StringContent', 'Style', 
			'StyleConstants', 'StyleConstants.CharacterConstants', 'StyleConstants.ColorConstants', 
			'StyleConstants.FontConstants', 'StyleConstants.ParagraphConstants', 'StyleContext', 
			'StyledDocument', 'StyledEditorKit', 'StyledEditorKit.AlignmentAction', 
			'StyledEditorKit.BoldAction', 'StyledEditorKit.FontFamilyAction', 'StyledEditorKit.FontSizeAction', 
			'StyledEditorKit.ForegroundAction', 'StyledEditorKit.ItalicAction', 'StyledEditorKit.StyledTextAction', 
			'StyledEditorKit.UnderlineAction', 'TabExpander', 'TabSet', 
			'TabStop', 'TabableView', 'TableView', 
			'TextAction', 'Utilities', 'View', 
			'ViewFactory', 'WrappedPlainView', 'ZoneView'),

		$CONTEXT . '/javax/swing/text',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/text/package-frame.html'

	),

	array(
	//javax.swing.text.html   
		array(
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

		$CONTEXT . '/javax/swing/text/html',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/text/html/package-frame.html'

	),

	array(
	//javax.swing.text.html.parser   
		array(
			'AttributeList', 'ContentModel', 'DTD', 
			'DTDConstants', 'DocumentParser', 'Element', 
			'Entity', 'Parser', 'ParserDelegator', 
			'TagElement'),

		$CONTEXT . '/javax/swing/text/html/parser',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/text/html/parser/package-frame.html'

	),

	array(
	//javax.swing.text.rtf   
		array(
			'RTFEditorKit'),

		$CONTEXT . '/javax/swing/text/rtf',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/text/rtf/package-frame.html'

	),

	array(
	//javax.swing.tree   
		array(
			'AbstractLayoutCache', 'AbstractLayoutCache.NodeDimensions', 'DefaultMutableTreeNode', 
			'DefaultTreeCellEditor', 'DefaultTreeCellRenderer', 'DefaultTreeModel', 
			'DefaultTreeSelectionModel', 'ExpandVetoException', 'FixedHeightLayoutCache', 
			'MutableTreeNode', 'RowMapper', 'TreeCellEditor', 
			'TreeCellRenderer', 'TreeModel', 'TreeNode', 
			'TreePath', 'TreeSelectionModel', 'VariableHeightLayoutCache'),

		$CONTEXT . '/javax/swing/tree',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/tree/package-frame.html'

	),

	array(
	//javax.swing.undo
		array(
			'AbstractUndoableEdit', 'CannotRedoException', 'CannotUndoException', 
			'CompoundEdit', 'StateEdit', 'StateEditable', 
			'UndoManager', 'UndoableEdit', 'UndoableEditSupport'),

		$CONTEXT . '/javax/swing/undo',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/undo/package-frame.html'

	),

	array(
	//javax.transaction
		array(
			'InvalidTransactionException', 'TransactionRequiredException', 'TransactionRolledbackException'),

		$CONTEXT . '/javax/transaction',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/transaction/package-frame.html'

	),

	array(
	//javax.transaction.xa   
		array(
			'XAException', 'XAResource', 'Xid'),

		$CONTEXT . '/javax/transaction/xa',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/transaction/xa/package-frame.html'

	),

	array(
	//javax.xml   
		array(
			'XMLConstants'),

		$CONTEXT . '/javax/xml',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/xml/package-frame.html'

	),

	array(
	//javax.xml.datatype   
		array(
			'DatatypeConfigurationException', 'DatatypeConstants', 'DatatypeConstants.Field', 
			'DatatypeFactory', 'Duration', 'NamespaceContext', 
			'QName', 'XMLGregorianCalendar', 'javax.xml.namespace'),

		$CONTEXT . '/javax/xml/datatype',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/xml/datatype/package-frame.html'

	),

	array(
	//javax.xml.parsers  
		array(
			'DocumentBuilder', 'DocumentBuilderFactory', 'FactoryConfigurationError', 
			'ParserConfigurationException', 'SAXParser', 'SAXParserFactory'),

		$CONTEXT . '/javax/xml/parsers',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/xml/parsers/package-frame.html'

	),

	array(
	//javax.xml.transform   
		array(
			'ErrorListener', 'OutputKeys', 'Result', 
			'Source', 'SourceLocator', 'Templates', 
			'Transformer', 'TransformerConfigurationException', 'TransformerException', 
			'TransformerFactory', 'TransformerFactoryConfigurationError', 'URIResolver'),

		$CONTEXT . '/javax/xml/transform',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/xml/transform/package-frame.html'

	),

	array(
	//javax.xml.transform.dom 
		array(
			'DOMLocator', 'DOMResult', 'DOMSource'),

		$CONTEXT . '/javax/xml/transform/dom',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/xml/transform/dom/package-frame.html'

	),

	array(
	//javax.xml.transform.sax   
		array(
			'SAXResult', 'SAXSource', 'SAXTransformerFactory', 
			'TemplatesHandler', 'TransformerHandler'),

		$CONTEXT . '/javax/xml/transform/sax',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/xml/transform/sax/package-frame.html'

	),

	array(
	//javax.xml.transform.stream   
		array(
			'StreamResult', 'StreamSource'),

		$CONTEXT . '/javax/xml/transform/stream',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/xml/transform/stream/package-frame.html'

	),

	array(
	//javax.xml.validation   
		array(
			'Schema', 'SchemaFactory', 'SchemaFactoryLoader', 
			'TypeInfoProvider', 'Validator', 'ValidatorHandler'),

		$CONTEXT . '/javax/xml/validation',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/xml/validation/package-frame.html'

	),

	array(
	//javax.xml.xpath   
		array(
			'XPath', 'XPathConstants', 'XPathException', 
			'XPathExpression', 'XPathExpressionException', 'XPathFactory', 
			'XPathFactoryConfigurationException', 'XPathFunction', 'XPathFunctionException', 
			'XPathFunctionResolver', 'XPathVariableResolver'),

		$CONTEXT . '/javax/xml/xpath',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/javax/xml/xpath/package-frame.html'

	),

	array(
	//org.ietf.jgss
		array(
			'ChannelBinding', 'GSSContext', 'GSSCredential', 
			'GSSException', 'GSSManager', 'GSSName', 
			'MessageProp', 'Oid'),

		$CONTEXT . '/org/ietf/jgss',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/ietf/jgss/package-frame.html'

	),

	array(
	//org.omg.CORBA   
		array(
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

		$CONTEXT . '/org/omg/CORBA',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/CORBA/package-frame.html'

	),

	array(
	//org.omg.CORBA_2_3   
		array(
			'ORB'),

		$CONTEXT . '/org/omg/CORBA_2_3',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/CORBA_2_3/package-frame.html'

	),

	array(
	//org.omg.CORBA_2_3.portable   
		array(
			'Delegate', 'InputStream', 'ObjectImpl', 
			'OutputStream'),

		$CONTEXT . '/org/omg/CORBA_2_3/portable',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/CORBA_2_3/portable/package-frame.html'

	),

	array(
	//org.omg.CORBA.DynAnyPackage
		array(
			'Invalid', 'InvalidSeq', 'InvalidValue', 
			'TypeMismatch'),

		$CONTEXT . '/org/omg/CORBA/DynAnyPackage',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/CORBA/DynAnyPackage/package-frame.html'

	),

	array(
	//org.omg.CORBA.ORBPackage
		array(
			'InconsistentTypeCode', 'InvalidName'),

		$CONTEXT . '/org/omg/CORBA/ORBPackage',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/CORBA/ORBPackage/package-frame.html'

	),

	array(
	//org.omg.CORBA.portable   
		array(
			'ApplicationException', 'BoxedValueHelper', 'CustomValue', 
			'Delegate', 'IDLEntity', 'IndirectionException', 
			'InputStream', 'InvokeHandler', 'ObjectImpl', 
			'OutputStream', 'RemarshalException', 'ResponseHandler', 
			'ServantObject', 'Streamable', 'StreamableValue', 
			'UnknownException', 'ValueBase', 'ValueFactory', 
			'ValueInputStream', 'ValueOutputStream'),

		$CONTEXT . '/org/omg/CORBA/portable',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/CORBA/portable/package-frame.html'

	),

	array(
	//org.omg.CORBA.TypeCodePackage
		array(
			'BadKind', 'Bounds'),

		$CONTEXT . '/org/omg/CORBA/TypeCodePackage',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/CORBA/TypeCodePackage/package-frame.html'

	),

	array(
	//org.omg.CosNaming  
		array(
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

		$CONTEXT . '/org/omg/CosNaming',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/CosNaming/package-frame.html'

	),

	array(
	//org.omg.CosNaming.NamingContextExtPackage 
		array(
			'AddressHelper', 'InvalidAddress', 'InvalidAddressHelper', 
			'InvalidAddressHolder', 'StringNameHelper', 'URLStringHelper'),

		$CONTEXT . '/org/omg/CosNaming/NamingContextExtPackage',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/CosNaming/NamingContextExtPackage/package-frame.html'

	),

	array(
	//org.omg.CosNaming.NamingContextPackage  
		array(
			'AlreadyBound', 'AlreadyBoundHelper', 'AlreadyBoundHolder', 
			'CannotProceed', 'CannotProceedHelper', 'CannotProceedHolder', 
			'InvalidName', 'InvalidNameHelper', 'InvalidNameHolder', 
			'NotEmpty', 'NotEmptyHelper', 'NotEmptyHolder', 
			'NotFound', 'NotFoundHelper', 'NotFoundHolder', 
			'NotFoundReason', 'NotFoundReasonHelper', 'NotFoundReasonHolder'),

		$CONTEXT . '/org/omg/CosNaming/NamingContextPackage',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/CosNaming/NamingContextPackage/package-frame.html'

	),

	array(
	//org.omg.Dynamic 
		array(
			'Parameter'),

		$CONTEXT . '/org/omg/Dynamic',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/Dynamic/package-frame.html'

	),

	array(
	//org.omg.DynamicAny   
		array(
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

		$CONTEXT . '/org/omg/DynamicAny',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/DynamicAny/package-frame.html'

	),

	array(
	//org.omg.DynamicAny.DynAnyFactoryPackage 
		array(
			'InconsistentTypeCode', 'InconsistentTypeCodeHelper'),

		$CONTEXT . '/org/omg/DynamicAny/DynAnyFactoryPackage',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/DynamicAny/DynAnyFactoryPackage/package-frame.html'

	),

	array(
	//org.omg.DynamicAny.DynAnyPackage   
		array(
			'InvalidValue', 'InvalidValueHelper', 'TypeMismatch', 
			'TypeMismatchHelper'),

		$CONTEXT . '/org/omg/DynamicAny/DynAnyPackage',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/DynamicAny/DynAnyPackage/package-frame.html'

	),

	array(
	//org.omg.IOP  
		array(
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

		$CONTEXT . '/org/omg/IOP',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/IOP/package-frame.html'

	),

	array(
	//org.omg.IOP.CodecFactoryPackage   
		array(
			'UnknownEncoding', 'UnknownEncodingHelper'),

		$CONTEXT . '/org/omg/IOP/CodecFactoryPackage',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/IOP/CodecFactoryPackage/package-frame.html'

	),

	array(
	//org.omg.IOP.CodecPackage 
		array(
			'FormatMismatch', 'FormatMismatchHelper', 'InvalidTypeForEncoding', 
			'InvalidTypeForEncodingHelper', 'TypeMismatch', 'TypeMismatchHelper'),

		$CONTEXT . '/org/omg/IOP/CodecPackage',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/IOP/CodecPackage/package-frame.html'

	),

	array(
	//org.omg.Messaging
		array(
			'SYNC_WITH_TRANSPORT', 'SyncScopeHelper'),

		$CONTEXT . '/org/omg/Messaging',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/Messaging/package-frame.html'

	),

	array(
	//org.omg.PortableInterceptor   
		array(
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

		$CONTEXT . '/org/omg/PortableInterceptor',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/PortableInterceptor/package-frame.html'

	),

	array(
	//org.omg.PortableInterceptor.ORBInitInfoPackage   
		array(
			'DuplicateName', 'DuplicateNameHelper', 'InvalidName', 
			'InvalidNameHelper', 'ObjectIdHelper'),

		$CONTEXT . '/org/omg/PortableInterceptor/ORBInitInfoPackage',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/PortableInterceptor/ORBInitInfoPackage/package-frame.html'

	),

	array(
	//org.omg.PortableServer  
		array(
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

		$CONTEXT . '/org/omg/PortableServer',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/PortableServer/package-frame.html'

	),

	array(
	//org.omg.PortableServer.CurrentPackage
		array(
			'NoContext', 'NoContextHelper'),

		$CONTEXT . '/org/omg/PortableServer/CurrentPackage',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/PortableServer/CurrentPackage/package-frame.html'

	),

	array(
	//org.omg.PortableServer.POAManagerPackage 
		array(
			'AdapterInactive', 'AdapterInactiveHelper', 'State'),

		$CONTEXT . '/org/omg/PortableServer/POAManagerPackage',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/PortableServer/POAManagerPackage/package-frame.html'

	),

	array(
	//org.omg.PortableServer.POAPackage   
		array(
			'AdapterAlreadyExists', 'AdapterAlreadyExistsHelper', 'AdapterNonExistent', 
			'AdapterNonExistentHelper', 'InvalidPolicy', 'InvalidPolicyHelper', 
			'NoServant', 'NoServantHelper', 'ObjectAlreadyActive', 
			'ObjectAlreadyActiveHelper', 'ObjectNotActive', 'ObjectNotActiveHelper', 
			'ServantAlreadyActive', 'ServantAlreadyActiveHelper', 'ServantNotActive', 
			'ServantNotActiveHelper', 'WrongAdapter', 'WrongAdapterHelper', 
			'WrongPolicy', 'WrongPolicyHelper'),

		$CONTEXT . '/org/omg/PortableServer/POAPackage',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/PortableServer/POAPackage/package-frame.html'

	),

	array(
	//org.omg.PortableServer.portable   
		array(
			'Delegate'),

		$CONTEXT . '/org/omg/PortableServer/portable',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/PortableServer/portable/package-frame.html'

	),

	array(
	//org.omg.PortableServer.ServantLocatorPackage
		array(
			'CookieHolder'),

		$CONTEXT . '/org/omg/PortableServer/ServantLocatorPackage',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/PortableServer/ServantLocatorPackage/package-frame.html'

	),

	array(
	//org.omg.SendingContext   
		array(
			'RunTime', 'RunTimeOperations'),

		$CONTEXT . '/org/omg/SendingContext',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/SendingContext/package-frame.html'

	),

	array(
	//org.omg.stub.java.rmi   
		array(
			'_Remote_Stub'),

		$CONTEXT . '/org/omg/stub/java/rmi',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/stub/java/rmi/package-frame.html'

	),

	array(
	//org.w3c.dom   
		array(
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

		$CONTEXT . '/org/w3c/dom',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/w3c/dom/package-frame.html'

	),

	array(
	//org.w3c.dom.bootstrap   
		array(
			'DOMImplementationRegistry'),

		$CONTEXT . '/org/w3c/dom/bootstrap',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/w3c/dom/bootstrap/package-frame.html'

	),

	array(
	//org.w3c.dom.events   
		array(
			'DocumentEvent', 'Event', 'EventException', 
			'EventListener', 'EventTarget', 'MouseEvent', 
			'MutationEvent', 'UIEvent'),

		$CONTEXT . '/org/w3c/dom/events',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/w3c/dom/events/package-frame.html'

	),

	array(
	//org.w3c.dom.ls   
		array(
			'DOMImplementationLS', 'LSException', 'LSInput', 
			'LSLoadEvent', 'LSOutput', 'LSParser', 
			'LSParserFilter', 'LSProgressEvent', 'LSResourceResolver', 
			'LSSerializer', 'LSSerializerFilter'),

		$CONTEXT . '/org/w3c/dom/ls',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/w3c/dom/ls/package-frame.html'

	),

	array(
	//org.xml.sax   
		array(
			'AttributeList', 'Attributes', 'ContentHandler', 
			'DTDHandler', 'DocumentHandler', 'EntityResolver', 
			'ErrorHandler', 'HandlerBase', 'InputSource', 
			'Locator', 'Parser', 'SAXException', 
			'SAXNotRecognizedException', 'SAXNotSupportedException', 'SAXParseException', 
			'XMLFilter', 'XMLReader'),

		$CONTEXT . '/org/xml/sax',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/xml/sax/package-frame.html'

	),

	array(
	//org.xml.sax.ext
		array(
			'Attributes2', 'Attributes2Impl', 'DeclHandler', 
			'DefaultHandler2', 'EntityResolver2', 'LexicalHandler', 
			'Locator2', 'Locator2Impl'),

		$CONTEXT . '/org/xml/sax/ext',
		'color:#444;font-weight:bold;',
		true,
		'http://java.sun.com/j2se/1.5.0/docs/api/org/xml/sax/ext/package-frame.html'

	),


	
    array(
    	//data types
    	array(
    		'byte', 'short', 'int', 'long', 'float', 'double',
			'char', 'boolean', 'void'
		),
    	$CONTEXT . '/dtype',
        true,
        'http://java.sun.com/docs/books/tutorial/java/nutsandbolts/datatypes.html'	
    ),
    
    array(
        //const values
        array(
            'false', 'null', 'true'
        ),
        $CONTEXT . '/const',
        true,
        ''
    )
);

$this->_contextCharactersDisallowedBeforeKeywords = array("'");
$this->_contextCharactersDisallowedAfterKeywords  = array("'");

$this->_contextSymbols  = array(
    array(
        array(
            '(', ')', ',', ';', ':', '[', ']',
            '+', '-', '*', '%', '/', '&', '|', '!', '?', 
			'<', '>', '{', '}', '=', '.', '@'
            ),
        $CONTEXT . '/symbol',
        'color:#008000;'
    )
);

$this->_contextRegexps = array(
    geshi_use_doubles($CONTEXT),
    geshi_use_integers($CONTEXT)
);
$this->_objectSplitters = array(
    array(
        array('.'),
        $CONTEXT . '/ootoken',
        false
    )
);

$this->_complexFlag = GESHI_COMPLEX_TOKENISE;

?>
