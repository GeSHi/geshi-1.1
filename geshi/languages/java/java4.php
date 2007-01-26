<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * <pre>
 *   File:   geshi/languages/java/java4.php
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

function geshi_java_java4 (&$context)
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

		 'java/java4/java/applet',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/applet/{FNAME}.html'

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
			'PageAttributes', 'PageAttributes.ColorType', 'PageAttributes.MediaType', 
			'PageAttributes.OrientationRequestedType', 'PageAttributes.OriginType', 'PageAttributes.PrintQualityType', 
			'Paint', 'PaintContext', 'Panel', 
			'Point', 'Polygon', 'PopupMenu', 
			'PrintGraphics', 'PrintJob', 'Rectangle', 
			'RenderingHints', 'RenderingHints.Key', 'Robot', 
			'ScrollPane', 'ScrollPaneAdjustable', 'Scrollbar', 
			'Shape', 'Stroke', 'SystemColor', 
			'TextArea', 'TextComponent', 'TextField', 
			'TexturePaint', 'Toolkit', 'Transparency', 
			'Window'),

		 'java/java4/java/awt',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/awt/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.awt.color
			'CMMException', 'ColorSpace', 'ICC_ColorSpace', 
			'ICC_Profile', 'ICC_ProfileGray', 'ICC_ProfileRGB', 
			'ProfileDataException'),

		 'java/java4/java/awt/color',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/awt/color/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.awt.datatransfer
			'Clipboard', 'ClipboardOwner', 'DataFlavor', 
			'FlavorMap', 'FlavorTable', 'MimeTypeParseException', 
			'StringSelection', 'SystemFlavorMap', 'Transferable', 
			'UnsupportedFlavorException'),

		 'java/java4/java/awt/datatransfer',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/awt/datatransfer/{FNAME}.html'

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

		 'java/java4/java/awt/dnd',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/awt/dnd/{FNAME}.html'

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

		 'java/java4/java/awt/event',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/awt/event/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.awt.font
			'FontRenderContext', 'GlyphJustificationInfo', 'GlyphMetrics', 
			'GlyphVector', 'GraphicAttribute', 'ImageGraphicAttribute', 
			'LineBreakMeasurer', 'LineMetrics', 'MultipleMaster', 
			'NumericShaper', 'OpenType', 'ShapeGraphicAttribute', 
			'TextAttribute', 'TextHitInfo', 'TextLayout', 
			'TextLayout.CaretPolicy', 'TextMeasurer', 'TransformAttribute'),

		 'java/java4/java/awt/font',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/awt/font/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.awt.geom
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

		 'java/java4/java/awt/geom',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/awt/geom/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.awt.im
			'InputContext', 'InputMethodHighlight', 'InputMethodRequests', 
			'InputSubset'),

		 'java/java4/java/awt/im',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/awt/im/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.awt.im.spi
			'InputMethod', 'InputMethodContext', 'InputMethodDescriptor'),

		 'java/java4/java/awt/im/spi',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/awt/im/spi/{FNAME}.html'

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

		 'java/java4/java/awt/image',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/awt/image/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.awt.image.renderable
			'ContextualRenderedImageFactory', 'ParameterBlock', 'RenderContext', 
			'RenderableImage', 'RenderableImageOp', 'RenderableImageProducer', 
			'RenderedImageFactory'),

		 'java/java4/java/awt/image/renderable',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/awt/image/renderable/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.awt.print
			'Book', 'PageFormat', 'Pageable', 
			'Paper', 'Printable', 'PrinterAbortException', 
			'PrinterException', 'PrinterGraphics', 'PrinterIOException', 
			'PrinterJob'),

		 'java/java4/java/awt/print',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/awt/print/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.beans
			'AppletInitializer', 'BeanDescriptor', 'BeanInfo', 
			'Beans', 'Customizer', 'DefaultPersistenceDelegate', 
			'DesignMode', 'Encoder', 'EventHandler', 
			'EventSetDescriptor', 'ExceptionListener', 'Expression', 
			'FeatureDescriptor', 'IndexedPropertyDescriptor', 'IntrospectionException', 
			'Introspector', 'MethodDescriptor', 'ParameterDescriptor', 
			'PersistenceDelegate', 'PropertyChangeEvent', 'PropertyChangeListener', 
			'PropertyChangeListenerProxy', 'PropertyChangeSupport', 'PropertyDescriptor', 
			'PropertyEditor', 'PropertyEditorManager', 'PropertyEditorSupport', 
			'PropertyVetoException', 'SimpleBeanInfo', 'Statement', 
			'VetoableChangeListener', 'VetoableChangeListenerProxy', 'VetoableChangeSupport', 
			'Visibility', 'XMLDecoder', 'XMLEncoder'),

		 'java/java4/java/beans',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/beans/{FNAME}.html'

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

		 'java/java4/java/beans/beancontext',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/beans/beancontext/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.io
			'BufferedInputStream', 'BufferedOutputStream', 'BufferedReader', 
			'BufferedWriter', 'ByteArrayInputStream', 'ByteArrayOutputStream', 
			'CharArrayReader', 'CharArrayWriter', 'CharConversionException', 
			'DataInput', 'DataInputStream', 'DataOutput', 
			'DataOutputStream', 'EOFException', 'Externalizable', 
			'File', 'FileDescriptor', 'FileFilter', 
			'FileInputStream', 'FileNotFoundException', 'FileOutputStream', 
			'FilePermission', 'FileReader', 'FileWriter', 
			'FilenameFilter', 'FilterInputStream', 'FilterOutputStream', 
			'FilterReader', 'FilterWriter', 'IOException', 
			'InputStream', 'InputStreamReader', 'InterruptedIOException', 
			'InvalidClassException', 'InvalidObjectException', 'LineNumberInputStream', 
			'LineNumberReader', 'NotActiveException', 'NotSerializableException', 
			'ObjectInput', 'ObjectInputStream', 'ObjectInputStream.GetField', 
			'ObjectInputValidation', 'ObjectOutput', 'ObjectOutputStream', 
			'ObjectOutputStream.PutField', 'ObjectStreamClass', 'ObjectStreamConstants', 
			'ObjectStreamException', 'ObjectStreamField', 'OptionalDataException', 
			'OutputStream', 'OutputStreamWriter', 'PipedInputStream', 
			'PipedOutputStream', 'PipedReader', 'PipedWriter', 
			'PrintStream', 'PrintWriter', 'PushbackInputStream', 
			'PushbackReader', 'RandomAccessFile', 'Reader', 
			'SequenceInputStream', 'Serializable', 'SerializablePermission', 
			'StreamCorruptedException', 'StreamTokenizer', 'StringBufferInputStream', 
			'StringReader', 'StringWriter', 'SyncFailedException', 
			'UTFDataFormatException', 'UnsupportedEncodingException', 'WriteAbortedException', 
			'Writer'),

		 'java/java4/java/io',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/io/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.lang
			'AbstractMethodError', 'ArithmeticException', 'ArrayIndexOutOfBoundsException', 
			'ArrayStoreException', 'AssertionError', 'Boolean', 
			'Byte', 'CharSequence', 'Character', 
			'Character.Subset', 'Character.UnicodeBlock', 'Class', 
			'ClassCastException', 'ClassCircularityError', 'ClassFormatError', 
			'ClassLoader', 'ClassNotFoundException', 'CloneNotSupportedException', 
			'Cloneable', 'Comparable', 'Compiler', 
			'Double', 'Error', 'ExceptionInInitializerError', 
			'Float', 'IllegalAccessError', 'IllegalAccessException', 
			'IllegalArgumentException', 'IllegalMonitorStateException', 'IllegalStateException', 
			'IllegalThreadStateException', 'IncompatibleClassChangeError', 'IndexOutOfBoundsException', 
			'InheritableThreadLocal', 'InstantiationError', 'InstantiationException', 
			'Integer', 'InternalError', 'InterruptedException', 
			'LinkageError', 'Long', 'Math', 
			'NegativeArraySizeException', 'NoClassDefFoundError', 'NoSuchFieldError', 
			'NoSuchFieldException', 'NoSuchMethodError', 'NoSuchMethodException', 
			'NullPointerException', 'Number', 'NumberFormatException', 
			'Object', 'OutOfMemoryError', 'Package', 
			'Process', 'Runnable', 'Runtime', 
			'RuntimeException', 'RuntimePermission', 'SecurityException', 
			'SecurityManager', 'Short', 'StackOverflowError', 
			'StackTraceElement', 'StrictMath', 'String', 
			'StringBuffer', 'StringIndexOutOfBoundsException', 'System', 
			'Thread', 'ThreadDeath', 'ThreadGroup', 
			'ThreadLocal', 'Throwable', 'UnknownError', 
			'UnsatisfiedLinkError', 'UnsupportedClassVersionError', 'UnsupportedOperationException', 
			'VerifyError', 'VirtualMachineError', 'Void'),

		 'java/java4/java/lang',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/lang/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.lang.ref
			'PhantomReference', 'Reference', 'ReferenceQueue', 
			'SoftReference', 'WeakReference'),

		 'java/java4/java/lang/ref',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/lang/ref/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.lang.reflect
			'AccessibleObject', 'Array', 'Constructor', 
			'Field', 'InvocationHandler', 'InvocationTargetException', 
			'Member', 'Method', 'Modifier', 
			'Proxy', 'ReflectPermission', 'UndeclaredThrowableException'),

		 'java/java4/java/lang/reflect',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/lang/reflect/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.math
			'BigDecimal', 'BigInteger'),

		 'java/java4/java/math',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/math/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.net
			'Authenticator', 'BindException', 'ConnectException', 
			'ContentHandler', 'ContentHandlerFactory', 'DatagramPacket', 
			'DatagramSocket', 'DatagramSocketImpl', 'DatagramSocketImplFactory', 
			'FileNameMap', 'HttpURLConnection', 'Inet4Address', 
			'Inet6Address', 'InetAddress', 'InetSocketAddress', 
			'JarURLConnection', 'MalformedURLException', 'MulticastSocket', 
			'NetPermission', 'NetworkInterface', 'NoRouteToHostException', 
			'PasswordAuthentication', 'PortUnreachableException', 'ProtocolException', 
			'ServerSocket', 'Socket', 'SocketAddress', 
			'SocketException', 'SocketImpl', 'SocketImplFactory', 
			'SocketOptions', 'SocketPermission', 'SocketTimeoutException', 
			'URI', 'URISyntaxException', 'URL', 
			'URLClassLoader', 'URLConnection', 'URLDecoder', 
			'URLEncoder', 'URLStreamHandler', 'URLStreamHandlerFactory', 
			'UnknownHostException', 'UnknownServiceException'),

		 'java/java4/java/net',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/net/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.nio
			'Buffer', 'BufferOverflowException', 'BufferUnderflowException', 
			'ByteBuffer', 'ByteOrder', 'CharBuffer', 
			'DoubleBuffer', 'FloatBuffer', 'IntBuffer', 
			'InvalidMarkException', 'LongBuffer', 'MappedByteBuffer', 
			'ReadOnlyBufferException', 'ShortBuffer'),

		 'java/java4/java/nio',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/nio/{FNAME}.html'

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

		 'java/java4/java/nio/channels',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/nio/channels/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.nio.channels.spi
			'AbstractInterruptibleChannel', 'AbstractSelectableChannel', 'AbstractSelectionKey', 
			'AbstractSelector', 'SelectorProvider'),

		 'java/java4/java/nio/channels/spi',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/nio/channels/spi/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.nio.charset
			'CharacterCodingException', 'Charset', 'CharsetDecoder', 
			'CharsetEncoder', 'CoderMalfunctionError', 'CoderResult', 
			'CodingErrorAction', 'IllegalCharsetNameException', 'MalformedInputException', 
			'UnmappableCharacterException', 'UnsupportedCharsetException'),

		 'java/java4/java/nio/charset',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/nio/charset/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.nio.charset.spi
			'CharsetProvider'),

		 'java/java4/java/nio/charset/spi',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/nio/charset/spi/{FNAME}.html'

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

		 'java/java4/java/rmi',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/rmi/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.rmi.activation
			'Activatable', 'ActivateFailedException', 'ActivationDesc', 
			'ActivationException', 'ActivationGroup', 'ActivationGroupDesc', 
			'ActivationGroupDesc.CommandEnvironment', 'ActivationGroupID', 'ActivationGroup_Stub', 
			'ActivationID', 'ActivationInstantiator', 'ActivationMonitor', 
			'ActivationSystem', 'Activator', 'UnknownGroupException', 
			'UnknownObjectException'),

		 'java/java4/java/rmi/activation',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/rmi/activation/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.rmi.dgc
			'DGC', 'Lease', 'VMID'),

		 'java/java4/java/rmi/dgc',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/rmi/dgc/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.rmi.registry
			'LocateRegistry', 'Registry', 'RegistryHandler'),

		 'java/java4/java/rmi/registry',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/rmi/registry/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.rmi.server
			'ExportException', 'LoaderHandler', 'LogStream', 
			'ObjID', 'Operation', 'RMIClassLoader', 
			'RMIClassLoaderSpi', 'RMIClientSocketFactory', 'RMIFailureHandler', 
			'RMIServerSocketFactory', 'RMISocketFactory', 'RemoteCall', 
			'RemoteObject', 'RemoteRef', 'RemoteServer', 
			'RemoteStub', 'ServerCloneException', 'ServerNotActiveException', 
			'ServerRef', 'Skeleton', 'SkeletonMismatchException', 
			'SkeletonNotFoundException', 'SocketSecurityException', 'UID', 
			'UnicastRemoteObject', 'Unreferenced'),

		 'java/java4/java/rmi/server',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/rmi/server/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.security
			'AccessControlContext', 'AccessControlException', 'AccessController', 
			'AlgorithmParameterGenerator', 'AlgorithmParameterGeneratorSpi', 'AlgorithmParameters', 
			'AlgorithmParametersSpi', 'AllPermission', 'BasicPermission', 
			'Certificate', 'CodeSource', 'DigestException', 
			'DigestInputStream', 'DigestOutputStream', 'DomainCombiner', 
			'GeneralSecurityException', 'Guard', 'GuardedObject', 
			'Identity', 'IdentityScope', 'InvalidAlgorithmParameterException', 
			'InvalidKeyException', 'InvalidParameterException', 'Key', 
			'KeyException', 'KeyFactory', 'KeyFactorySpi', 
			'KeyManagementException', 'KeyPair', 'KeyPairGenerator', 
			'KeyPairGeneratorSpi', 'KeyStore', 'KeyStoreException', 
			'KeyStoreSpi', 'MessageDigest', 'MessageDigestSpi', 
			'NoSuchAlgorithmException', 'NoSuchProviderException', 'Permission', 
			'PermissionCollection', 'Permissions', 'Policy', 
			'Principal', 'PrivateKey', 'PrivilegedAction', 
			'PrivilegedActionException', 'PrivilegedExceptionAction', 'ProtectionDomain', 
			'Provider', 'ProviderException', 'PublicKey', 
			'SecureClassLoader', 'SecureRandom', 'SecureRandomSpi', 
			'Security', 'SecurityPermission', 'Signature', 
			'SignatureException', 'SignatureSpi', 'SignedObject', 
			'Signer', 'UnrecoverableKeyException', 'UnresolvedPermission'),

		 'java/java4/java/security',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/security/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.security.acl
			'Acl', 'AclEntry', 'AclNotFoundException', 
			'Group', 'LastOwnerException', 'NotOwnerException', 
			'Owner', 'Permission'),

		 'java/java4/java/security/acl',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/security/acl/{FNAME}.html'

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

		 'java/java4/java/security/cert',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/security/cert/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.security.interfaces
			'DSAKey', 'DSAKeyPairGenerator', 'DSAParams', 
			'DSAPrivateKey', 'DSAPublicKey', 'RSAKey', 
			'RSAMultiPrimePrivateCrtKey', 'RSAPrivateCrtKey', 'RSAPrivateKey', 
			'RSAPublicKey'),

		 'java/java4/java/security/interfaces',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/security/interfaces/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.security.spec
			'AlgorithmParameterSpec', 'DSAParameterSpec', 'DSAPrivateKeySpec', 
			'DSAPublicKeySpec', 'EncodedKeySpec', 'InvalidKeySpecException', 
			'InvalidParameterSpecException', 'KeySpec', 'PKCS8EncodedKeySpec', 
			'PSSParameterSpec', 'RSAKeyGenParameterSpec', 'RSAMultiPrimePrivateCrtKeySpec', 
			'RSAOtherPrimeInfo', 'RSAPrivateCrtKeySpec', 'RSAPrivateKeySpec', 
			'RSAPublicKeySpec', 'X509EncodedKeySpec'),

		 'java/java4/java/security/spec',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/security/spec/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.sql
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

		 'java/java4/java/sql',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/sql/{FNAME}.html'

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
			'NumberFormat', 'NumberFormat.Field', 'ParseException', 
			'ParsePosition', 'RuleBasedCollator', 'SimpleDateFormat', 
			'StringCharacterIterator'),

		 'java/java4/java/text',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/text/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.util
			'AbstractCollection', 'AbstractList', 'AbstractMap', 
			'AbstractSequentialList', 'AbstractSet', 'ArrayList', 
			'Arrays', 'BitSet', 'Calendar', 
			'Collection', 'Collections', 'Comparator', 
			'ConcurrentModificationException', 'Currency', 'Date', 
			'Dictionary', 'EmptyStackException', 'Enumeration', 
			'EventListener', 'EventListenerProxy', 'EventObject', 
			'GregorianCalendar', 'HashMap', 'HashSet', 
			'Hashtable', 'IdentityHashMap', 'Iterator', 
			'LinkedHashMap', 'LinkedHashSet', 'LinkedList', 
			'List', 'ListIterator', 'ListResourceBundle', 
			'Locale', 'Map', 'Map.Entry', 
			'MissingResourceException', 'NoSuchElementException', 'Observable', 
			'Observer', 'Properties', 'PropertyPermission', 
			'PropertyResourceBundle', 'Random', 'RandomAccess', 
			'ResourceBundle', 'Set', 'SimpleTimeZone', 
			'SortedMap', 'SortedSet', 'Stack', 
			'StringTokenizer', 'TimeZone', 'Timer', 
			'TimerTask', 'TooManyListenersException', 'TreeMap', 
			'TreeSet', 'Vector', 'WeakHashMap'),

		 'java/java4/java/util',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/util/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.util.jar
			'Attributes', 'Attributes.Name', 'JarEntry', 
			'JarException', 'JarFile', 'JarInputStream', 
			'JarOutputStream', 'Manifest'),

		 'java/java4/java/util/jar',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/util/jar/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.util.logging
			'ConsoleHandler', 'ErrorManager', 'FileHandler', 
			'Filter', 'Formatter', 'Handler', 
			'Level', 'LogManager', 'LogRecord', 
			'Logger', 'LoggingPermission', 'MemoryHandler', 
			'SimpleFormatter', 'SocketHandler', 'StreamHandler', 
			'XMLFormatter'),

		 'java/java4/java/util/logging',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/util/logging/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.util.prefs
			'AbstractPreferences', 'BackingStoreException', 'InvalidPreferencesFormatException', 
			'NodeChangeEvent', 'NodeChangeListener', 'PreferenceChangeEvent', 
			'PreferenceChangeListener', 'Preferences', 'PreferencesFactory'),

		 'java/java4/java/util/prefs',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/util/prefs/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.util.regex
			'Matcher', 'Pattern', 'PatternSyntaxException'),

		 'java/java4/java/util/regex',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/util/regex/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//java.util.zip
			'Adler32', 'CRC32', 'CheckedInputStream', 
			'CheckedOutputStream', 'Checksum', 'DataFormatException', 
			'Deflater', 'DeflaterOutputStream', 'GZIPInputStream', 
			'GZIPOutputStream', 'Inflater', 'InflaterInputStream', 
			'ZipEntry', 'ZipException', 'ZipFile', 
			'ZipInputStream', 'ZipOutputStream'),

		 'java/java4/java/util/zip',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/java/util/zip/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.accessibility
			'Accessible', 'AccessibleAction', 'AccessibleBundle', 
			'AccessibleComponent', 'AccessibleContext', 'AccessibleEditableText', 
			'AccessibleExtendedComponent', 'AccessibleExtendedTable', 'AccessibleHyperlink', 
			'AccessibleHypertext', 'AccessibleIcon', 'AccessibleKeyBinding', 
			'AccessibleRelation', 'AccessibleRelationSet', 'AccessibleResourceBundle', 
			'AccessibleRole', 'AccessibleSelection', 'AccessibleState', 
			'AccessibleStateSet', 'AccessibleTable', 'AccessibleTableModelChange', 
			'AccessibleText', 'AccessibleValue'),

		 'java/java4/javax/accessibility',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/accessibility/{FNAME}.html'

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

		 'java/java4/javax/crypto',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/crypto/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.crypto.interfaces
			'DHKey', 'DHPrivateKey', 'DHPublicKey', 
			'PBEKey'),

		 'java/java4/javax/crypto/interfaces',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/crypto/interfaces/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.crypto.spec
			'DESKeySpec', 'DESedeKeySpec', 'DHGenParameterSpec', 
			'DHParameterSpec', 'DHPrivateKeySpec', 'DHPublicKeySpec', 
			'IvParameterSpec', 'PBEKeySpec', 'PBEParameterSpec', 
			'RC2ParameterSpec', 'RC5ParameterSpec', 'SecretKeySpec'),

		 'java/java4/javax/crypto/spec',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/crypto/spec/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.imageio
			'IIOException', 'IIOImage', 'IIOParam', 
			'IIOParamController', 'ImageIO', 'ImageReadParam', 
			'ImageReader', 'ImageTranscoder', 'ImageTypeSpecifier', 
			'ImageWriteParam', 'ImageWriter'),

		 'java/java4/javax/imageio',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/imageio/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.imageio.event
			'IIOReadProgressListener', 'IIOReadUpdateListener', 'IIOReadWarningListener', 
			'IIOWriteProgressListener', 'IIOWriteWarningListener'),

		 'java/java4/javax/imageio/event',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/imageio/event/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.imageio.metadata
			'IIOInvalidTreeException', 'IIOMetadata', 'IIOMetadataController', 
			'IIOMetadataFormat', 'IIOMetadataFormatImpl', 'IIOMetadataNode'),

		 'java/java4/javax/imageio/metadata',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/imageio/metadata/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.imageio.plugins.jpeg
			'JPEGHuffmanTable', 'JPEGImageReadParam', 'JPEGImageWriteParam', 
			'JPEGQTable'),

		 'java/java4/javax/imageio/plugins/jpeg',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/imageio/plugins/jpeg/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.imageio.spi
			'IIORegistry', 'IIOServiceProvider', 'ImageInputStreamSpi', 
			'ImageOutputStreamSpi', 'ImageReaderSpi', 'ImageReaderWriterSpi', 
			'ImageTranscoderSpi', 'ImageWriterSpi', 'RegisterableService', 
			'ServiceRegistry', 'ServiceRegistry.Filter'),

		 'java/java4/javax/imageio/spi',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/imageio/spi/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.imageio.stream
			'FileCacheImageInputStream', 'FileCacheImageOutputStream', 'FileImageInputStream', 
			'FileImageOutputStream', 'IIOByteBuffer', 'ImageInputStream', 
			'ImageInputStreamImpl', 'ImageOutputStream', 'ImageOutputStreamImpl', 
			'MemoryCacheImageInputStream', 'MemoryCacheImageOutputStream'),

		 'java/java4/javax/imageio/stream',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/imageio/stream/{FNAME}.html'

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

		 'java/java4/javax/naming',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/naming/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.naming.directory
			'Attribute', 'AttributeInUseException', 'AttributeModificationException', 
			'Attributes', 'BasicAttribute', 'BasicAttributes', 
			'DirContext', 'InitialDirContext', 'InvalidAttributeIdentifierException', 
			'InvalidAttributeValueException', 'InvalidAttributesException', 'InvalidSearchControlsException', 
			'InvalidSearchFilterException', 'ModificationItem', 'NoSuchAttributeException', 
			'SchemaViolationException', 'SearchControls', 'SearchResult'),

		 'java/java4/javax/naming/directory',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/naming/directory/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.naming.event
			'EventContext', 'EventDirContext', 'NamespaceChangeListener', 
			'NamingEvent', 'NamingExceptionEvent', 'NamingListener', 
			'ObjectChangeListener'),

		 'java/java4/javax/naming/event',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/naming/event/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.naming.ldap
			'Control', 'ControlFactory', 'ExtendedRequest', 
			'ExtendedResponse', 'HasControls', 'InitialLdapContext', 
			'LdapContext', 'LdapReferralException', 'StartTlsRequest', 
			'StartTlsResponse', 'UnsolicitedNotification', 'UnsolicitedNotificationEvent', 
			'UnsolicitedNotificationListener'),

		 'java/java4/javax/naming/ldap',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/naming/ldap/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.naming.spi
			'DirObjectFactory', 'DirStateFactory', 'DirStateFactory.Result', 
			'DirectoryManager', 'InitialContextFactory', 'InitialContextFactoryBuilder', 
			'NamingManager', 'ObjectFactory', 'ObjectFactoryBuilder', 
			'ResolveResult', 'Resolver', 'StateFactory'),

		 'java/java4/javax/naming/spi',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/naming/spi/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.net
			'ServerSocketFactory', 'SocketFactory'),

		 'java/java4/javax/net',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/net/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.net.ssl
			'HandshakeCompletedEvent', 'HandshakeCompletedListener', 'HostnameVerifier', 
			'HttpsURLConnection', 'KeyManager', 'KeyManagerFactory', 
			'KeyManagerFactorySpi', 'ManagerFactoryParameters', 'SSLContext', 
			'SSLContextSpi', 'SSLException', 'SSLHandshakeException', 
			'SSLKeyException', 'SSLPeerUnverifiedException', 'SSLPermission', 
			'SSLProtocolException', 'SSLServerSocket', 'SSLServerSocketFactory', 
			'SSLSession', 'SSLSessionBindingEvent', 'SSLSessionBindingListener', 
			'SSLSessionContext', 'SSLSocket', 'SSLSocketFactory', 
			'TrustManager', 'TrustManagerFactory', 'TrustManagerFactorySpi', 
			'X509KeyManager', 'X509TrustManager'),

		 'java/java4/javax/net/ssl',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/net/ssl/{FNAME}.html'

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

		 'java/java4/javax/print',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/print/{FNAME}.html'

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

		 'java/java4/javax/print/attribute',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/print/attribute/{FNAME}.html'

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

		 'java/java4/javax/print/attribute/standard',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/print/attribute/standard/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.print.event
			'PrintEvent', 'PrintJobAdapter', 'PrintJobAttributeEvent', 
			'PrintJobAttributeListener', 'PrintJobEvent', 'PrintJobListener', 
			'PrintServiceAttributeEvent', 'PrintServiceAttributeListener'),

		 'java/java4/javax/print/event',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/print/event/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.rmi
			'PortableRemoteObject'),

		 'java/java4/javax/rmi',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/rmi/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.rmi.CORBA
			'ClassDesc', 'PortableRemoteObjectDelegate', 'Stub', 
			'StubDelegate', 'Tie', 'Util', 
			'UtilDelegate', 'ValueHandler'),

		 'java/java4/javax/rmi/CORBA',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/rmi/CORBA/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.security.auth
			'AuthPermission', 'DestroyFailedException', 'Destroyable', 
			'Policy', 'PrivateCredentialPermission', 'RefreshFailedException', 
			'Refreshable', 'Subject', 'SubjectDomainCombiner'),

		 'java/java4/javax/security/auth',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/security/auth/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.security.auth.callback
			'Callback', 'CallbackHandler', 'ChoiceCallback', 
			'ConfirmationCallback', 'LanguageCallback', 'NameCallback', 
			'PasswordCallback', 'TextInputCallback', 'TextOutputCallback', 
			'UnsupportedCallbackException'),

		 'java/java4/javax/security/auth/callback',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/security/auth/callback/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.security.auth.kerberos
			'DelegationPermission', 'KerberosKey', 'KerberosPrincipal', 
			'KerberosTicket', 'ServicePermission'),

		 'java/java4/javax/security/auth/kerberos',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/security/auth/kerberos/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.security.auth.login
			'AccountExpiredException', 'AppConfigurationEntry', 'AppConfigurationEntry.LoginModuleControlFlag', 
			'Configuration', 'CredentialExpiredException', 'FailedLoginException', 
			'LoginContext', 'LoginException'),

		 'java/java4/javax/security/auth/login',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/security/auth/login/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.security.auth.spi
			'LoginModule'),

		 'java/java4/javax/security/auth/spi',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/security/auth/spi/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.security.auth.x500
			'X500Principal', 'X500PrivateCredential'),

		 'java/java4/javax/security/auth/x500',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/security/auth/x500/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.security.cert
			'Certificate', 'CertificateEncodingException', 'CertificateException', 
			'CertificateExpiredException', 'CertificateNotYetValidException', 'CertificateParsingException', 
			'X509Certificate'),

		 'java/java4/javax/security/cert',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/security/cert/{FNAME}.html'

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

		 'java/java4/javax/sound/midi',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/sound/midi/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.sound.midi.spi
			'MidiDeviceProvider', 'MidiFileReader', 'MidiFileWriter', 
			'SoundbankReader'),

		 'java/java4/javax/sound/midi/spi',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/sound/midi/spi/{FNAME}.html'

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

		 'java/java4/javax/sound/sampled',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/sound/sampled/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.sound.sampled.spi
			'AudioFileReader', 'AudioFileWriter', 'FormatConversionProvider', 
			'MixerProvider'),

		 'java/java4/javax/sound/sampled/spi',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/sound/sampled/spi/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.sql
			'ConnectionEvent', 'ConnectionEventListener', 'ConnectionPoolDataSource', 
			'DataSource', 'PooledConnection', 'RowSet', 
			'RowSetEvent', 'RowSetInternal', 'RowSetListener', 
			'RowSetMetaData', 'RowSetReader', 'RowSetWriter', 
			'XAConnection', 'XADataSource'),

		 'java/java4/javax/sql',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/sql/{FNAME}.html'

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
			'JTextArea', 'JTextField', 'JTextPane', 
			'JToggleButton', 'JToggleButton.ToggleButtonModel', 'JToolBar', 
			'JToolBar.Separator', 'JToolTip', 'JTree', 
			'JTree.DynamicUtilTreeNode', 'JTree.EmptySelectionModel', 'JViewport', 
			'JWindow', 'KeyStroke', 'LayoutFocusTraversalPolicy', 
			'ListCellRenderer', 'ListModel', 'ListSelectionModel', 
			'LookAndFeel', 'MenuElement', 'MenuSelectionManager', 
			'MutableComboBoxModel', 'OverlayLayout', 'Popup', 
			'PopupFactory', 'ProgressMonitor', 'ProgressMonitorInputStream', 
			'Renderer', 'RepaintManager', 'RootPaneContainer', 
			'ScrollPaneConstants', 'ScrollPaneLayout', 'ScrollPaneLayout.UIResource', 
			'Scrollable', 'SingleSelectionModel', 'SizeRequirements', 
			'SizeSequence', 'SortingFocusTraversalPolicy', 'SpinnerDateModel', 
			'SpinnerListModel', 'SpinnerModel', 'SpinnerNumberModel', 
			'Spring', 'SpringLayout', 'SpringLayout.Constraints', 
			'SwingConstants', 'SwingUtilities', 'Timer', 
			'ToolTipManager', 'TransferHandler', 'UIDefaults', 
			'UIDefaults.ActiveValue', 'UIDefaults.LazyInputMap', 'UIDefaults.LazyValue', 
			'UIDefaults.ProxyLazyValue', 'UIManager', 'UIManager.LookAndFeelInfo', 
			'UnsupportedLookAndFeelException', 'ViewportLayout', 'WindowConstants'),

		 'java/java4/javax/swing',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.swing.border
			'AbstractBorder', 'BevelBorder', 'Border', 
			'CompoundBorder', 'EmptyBorder', 'EtchedBorder', 
			'LineBorder', 'MatteBorder', 'SoftBevelBorder', 
			'TitledBorder'),

		 'java/java4/javax/swing/border',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/border/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.swing.colorchooser
			'AbstractColorChooserPanel', 'ColorChooserComponentFactory', 'ColorSelectionModel', 
			'DefaultColorSelectionModel'),

		 'java/java4/javax/swing/colorchooser',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/colorchooser/{FNAME}.html'

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
			'PopupMenuEvent', 'PopupMenuListener', 'SwingPropertyChangeSupport', 
			'TableColumnModelEvent', 'TableColumnModelListener', 'TableModelEvent', 
			'TableModelListener', 'TreeExpansionEvent', 'TreeExpansionListener', 
			'TreeModelEvent', 'TreeModelListener', 'TreeSelectionEvent', 
			'TreeSelectionListener', 'TreeWillExpandListener', 'UndoableEditEvent', 
			'UndoableEditListener'),

		 'java/java4/javax/swing/event',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/event/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.swing.filechooser
			'FileFilter', 'FileSystemView', 'FileView'),

		 'java/java4/javax/swing/filechooser',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/filechooser/{FNAME}.html'

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

		 'java/java4/javax/swing/plaf',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/plaf/{FNAME}.html'

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

		 'java/java4/javax/swing/plaf/basic',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/plaf/basic/{FNAME}.html'

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
			'MetalLookAndFeel', 'MetalPopupMenuSeparatorUI', 'MetalProgressBarUI', 
			'MetalRadioButtonUI', 'MetalRootPaneUI', 'MetalScrollBarUI', 
			'MetalScrollButton', 'MetalScrollPaneUI', 'MetalSeparatorUI', 
			'MetalSliderUI', 'MetalSplitPaneUI', 'MetalTabbedPaneUI', 
			'MetalTextFieldUI', 'MetalTheme', 'MetalToggleButtonUI', 
			'MetalToolBarUI', 'MetalToolTipUI', 'MetalTreeUI'),

		 'java/java4/javax/swing/plaf/metal',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/plaf/metal/{FNAME}.html'

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

		 'java/java4/javax/swing/plaf/multi',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/plaf/multi/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.swing.table
			'AbstractTableModel', 'DefaultTableCellRenderer', 'DefaultTableCellRenderer.UIResource', 
			'DefaultTableColumnModel', 'DefaultTableModel', 'JTableHeader', 
			'TableCellEditor', 'TableCellRenderer', 'TableColumn', 
			'TableColumnModel', 'TableModel'),

		 'java/java4/javax/swing/table',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/table/{FNAME}.html'

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

		 'java/java4/javax/swing/text',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/text/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.swing.text.html
			'BlockView', 'CSS', 'CSS.Attribute', 
			'FormView', 'HTML', 'HTML.Attribute', 
			'HTML.Tag', 'HTML.UnknownTag', 'HTMLDocument', 
			'HTMLDocument.Iterator', 'HTMLEditorKit', 'HTMLEditorKit.HTMLFactory', 
			'HTMLEditorKit.HTMLTextAction', 'HTMLEditorKit.InsertHTMLTextAction', 'HTMLEditorKit.LinkController', 
			'HTMLEditorKit.Parser', 'HTMLEditorKit.ParserCallback', 'HTMLFrameHyperlinkEvent', 
			'HTMLWriter', 'ImageView', 'InlineView', 
			'ListView', 'MinimalHTMLWriter', 'ObjectView', 
			'Option', 'ParagraphView', 'StyleSheet', 
			'StyleSheet.BoxPainter', 'StyleSheet.ListPainter'),

		 'java/java4/javax/swing/text/html',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/text/html/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.swing.text.html.parser
			'AttributeList', 'ContentModel', 'DTD', 
			'DTDConstants', 'DocumentParser', 'Element', 
			'Entity', 'Parser', 'ParserDelegator', 
			'TagElement'),

		 'java/java4/javax/swing/text/html/parser',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/text/html/parser/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.swing.text.rtf
			'RTFEditorKit'),

		 'java/java4/javax/swing/text/rtf',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/text/rtf/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.swing.tree
			'AbstractLayoutCache', 'AbstractLayoutCache.NodeDimensions', 'DefaultMutableTreeNode', 
			'DefaultTreeCellEditor', 'DefaultTreeCellRenderer', 'DefaultTreeModel', 
			'DefaultTreeSelectionModel', 'ExpandVetoException', 'FixedHeightLayoutCache', 
			'MutableTreeNode', 'RowMapper', 'TreeCellEditor', 
			'TreeCellRenderer', 'TreeModel', 'TreeNode', 
			'TreePath', 'TreeSelectionModel', 'VariableHeightLayoutCache'),

		 'java/java4/javax/swing/tree',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/tree/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.swing.undo
			'AbstractUndoableEdit', 'CannotRedoException', 'CannotUndoException', 
			'CompoundEdit', 'StateEdit', 'StateEditable', 
			'UndoManager', 'UndoableEdit', 'UndoableEditSupport'),

		 'java/java4/javax/swing/undo',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/swing/undo/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.transaction
			'InvalidTransactionException', 'TransactionRequiredException', 'TransactionRolledbackException'),

		 'java/java4/javax/transaction',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/transaction/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.transaction.xa
			'XAException', 'XAResource', 'Xid'),

		 'java/java4/javax/transaction/xa',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/transaction/xa/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.parsers
			'DocumentBuilder', 'DocumentBuilderFactory', 'FactoryConfigurationError', 
			'ParserConfigurationException', 'SAXParser', 'SAXParserFactory'),

		 'java/java4/javax/xml/parsers',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/xml/parsers/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.transform
			'ErrorListener', 'OutputKeys', 'Result', 
			'Source', 'SourceLocator', 'Templates', 
			'Transformer', 'TransformerConfigurationException', 'TransformerException', 
			'TransformerFactory', 'TransformerFactoryConfigurationError', 'URIResolver'),

		 'java/java4/javax/xml/transform',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/xml/transform/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.transform.dom
			'DOMLocator', 'DOMResult', 'DOMSource'),

		 'java/java4/javax/xml/transform/dom',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/xml/transform/dom/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.transform.sax
			'SAXResult', 'SAXSource', 'SAXTransformerFactory', 
			'TemplatesHandler', 'TransformerHandler'),

		 'java/java4/javax/xml/transform/sax',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/xml/transform/sax/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//javax.xml.transform.stream
			'StreamResult', 'StreamSource'),

		 'java/java4/javax/xml/transform/stream',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/javax/xml/transform/stream/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.ietf.jgss
			'ChannelBinding', 'GSSContext', 'GSSCredential', 
			'GSSException', 'GSSManager', 'GSSName', 
			'MessageProp', 'Oid'),

		 'java/java4/org/ietf/jgss',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/ietf/jgss/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.CORBA
			'ARG_IN', 'ARG_INOUT', 'ARG_OUT', 
			'Any', 'AnyHolder', 'AnySeqHelper', 
			'AnySeqHolder', 'BAD_CONTEXT', 'BAD_INV_ORDER', 
			'BAD_OPERATION', 'BAD_PARAM', 'BAD_POLICY', 
			'BAD_POLICY_TYPE', 'BAD_POLICY_VALUE', 'BAD_TYPECODE', 
			'BooleanHolder', 'BooleanSeqHelper', 'BooleanSeqHolder', 
			'Bounds', 'ByteHolder', 'COMM_FAILURE', 
			'CTX_RESTRICT_SCOPE', 'CharHolder', 'CharSeqHelper', 
			'CharSeqHolder', 'CompletionStatus', 'CompletionStatusHelper', 
			'Context', 'ContextList', 'Current', 
			'CurrentHelper', 'CurrentHolder', 'CurrentOperations', 
			'CustomMarshal', 'DATA_CONVERSION', 'DataInputStream', 
			'DataOutputStream', 'DefinitionKind', 'DefinitionKindHelper', 
			'DomainManager', 'DomainManagerOperations', 'DoubleHolder', 
			'DoubleSeqHelper', 'DoubleSeqHolder', 'DynAny', 
			'DynArray', 'DynEnum', 'DynFixed', 
			'DynSequence', 'DynStruct', 'DynUnion', 
			'DynValue', 'DynamicImplementation', 'Environment', 
			'ExceptionList', 'FREE_MEM', 'FieldNameHelper', 
			'FixedHolder', 'FloatHolder', 'FloatSeqHelper', 
			'FloatSeqHolder', 'IDLType', 'IDLTypeHelper', 
			'IDLTypeOperations', 'IMP_LIMIT', 'INITIALIZE', 
			'INTERNAL', 'INTF_REPOS', 'INVALID_TRANSACTION', 
			'INV_FLAG', 'INV_IDENT', 'INV_OBJREF', 
			'INV_POLICY', 'IRObject', 'IRObjectOperations', 
			'IdentifierHelper', 'IntHolder', 'LocalObject', 
			'LongHolder', 'LongLongSeqHelper', 'LongLongSeqHolder', 
			'LongSeqHelper', 'LongSeqHolder', 'MARSHAL', 
			'NO_IMPLEMENT', 'NO_MEMORY', 'NO_PERMISSION', 
			'NO_RESOURCES', 'NO_RESPONSE', 'NVList', 
			'NameValuePair', 'NameValuePairHelper', 'NamedValue', 
			'OBJECT_NOT_EXIST', 'OBJ_ADAPTER', 'OMGVMCID', 
			'ORB', 'Object', 'ObjectHelper', 
			'ObjectHolder', 'OctetSeqHelper', 'OctetSeqHolder', 
			'PERSIST_STORE', 'PRIVATE_MEMBER', 'PUBLIC_MEMBER', 
			'ParameterMode', 'ParameterModeHelper', 'ParameterModeHolder', 
			'Policy', 'PolicyError', 'PolicyErrorCodeHelper', 
			'PolicyErrorHelper', 'PolicyErrorHolder', 'PolicyHelper', 
			'PolicyHolder', 'PolicyListHelper', 'PolicyListHolder', 
			'PolicyOperations', 'PolicyTypeHelper', 'Principal', 
			'PrincipalHolder', 'RepositoryIdHelper', 'Request', 
			'ServerRequest', 'ServiceDetail', 'ServiceDetailHelper', 
			'ServiceInformation', 'ServiceInformationHelper', 'ServiceInformationHolder', 
			'SetOverrideType', 'SetOverrideTypeHelper', 'ShortHolder', 
			'ShortSeqHelper', 'ShortSeqHolder', 'StringHolder', 
			'StringSeqHelper', 'StringSeqHolder', 'StringValueHelper', 
			'StructMember', 'StructMemberHelper', 'SystemException', 
			'TCKind', 'TRANSACTION_REQUIRED', 'TRANSACTION_ROLLEDBACK', 
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

		 'java/java4/org/omg/CORBA',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/CORBA/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.CORBA_2_3
			'ORB'),

		 'java/java4/org/omg/CORBA_2_3',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/CORBA_2_3/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.CORBA_2_3.portable
			'Delegate', 'InputStream', 'ObjectImpl', 
			'OutputStream'),

		 'java/java4/org/omg/CORBA_2_3/portable',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/CORBA_2_3/portable/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.CORBA.DynAnyPackage
			'Invalid', 'InvalidSeq', 'InvalidValue', 
			'TypeMismatch'),

		 'java/java4/org/omg/CORBA/DynAnyPackage',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/CORBA/DynAnyPackage/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.CORBA.ORBPackage
			'InconsistentTypeCode', 'InvalidName'),

		 'java/java4/org/omg/CORBA/ORBPackage',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/CORBA/ORBPackage/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.CORBA.portable
			'ApplicationException', 'BoxedValueHelper', 'CustomValue', 
			'Delegate', 'IDLEntity', 'IndirectionException', 
			'InputStream', 'InvokeHandler', 'ObjectImpl', 
			'OutputStream', 'RemarshalException', 'ResponseHandler', 
			'ServantObject', 'Streamable', 'StreamableValue', 
			'UnknownException', 'ValueBase', 'ValueFactory'),

		 'java/java4/org/omg/CORBA/portable',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/CORBA/portable/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.CORBA.TypeCodePackage
			'BadKind', 'Bounds'),

		 'java/java4/org/omg/CORBA/TypeCodePackage',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/CORBA/TypeCodePackage/{FNAME}.html'

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

		 'java/java4/org/omg/CosNaming',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/CosNaming/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.CosNaming.NamingContextExtPackage
			'AddressHelper', 'InvalidAddress', 'InvalidAddressHelper', 
			'InvalidAddressHolder', 'StringNameHelper', 'URLStringHelper'),

		 'java/java4/org/omg/CosNaming/NamingContextExtPackage',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/CosNaming/NamingContextExtPackage/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.CosNaming.NamingContextPackage
			'AlreadyBound', 'AlreadyBoundHelper', 'AlreadyBoundHolder', 
			'CannotProceed', 'CannotProceedHelper', 'CannotProceedHolder', 
			'InvalidName', 'InvalidNameHelper', 'InvalidNameHolder', 
			'NotEmpty', 'NotEmptyHelper', 'NotEmptyHolder', 
			'NotFound', 'NotFoundHelper', 'NotFoundHolder', 
			'NotFoundReason', 'NotFoundReasonHelper', 'NotFoundReasonHolder'),

		 'java/java4/org/omg/CosNaming/NamingContextPackage',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/CosNaming/NamingContextPackage/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.Dynamic
			'Parameter'),

		 'java/java4/org/omg/Dynamic',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/Dynamic/{FNAME}.html'

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

		 'java/java4/org/omg/DynamicAny',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/DynamicAny/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.DynamicAny.DynAnyFactoryPackage
			'InconsistentTypeCode', 'InconsistentTypeCodeHelper'),

		 'java/java4/org/omg/DynamicAny/DynAnyFactoryPackage',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/DynamicAny/DynAnyFactoryPackage/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.DynamicAny.DynAnyPackage
			'InvalidValue', 'InvalidValueHelper', 'TypeMismatch', 
			'TypeMismatchHelper'),

		 'java/java4/org/omg/DynamicAny/DynAnyPackage',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/DynamicAny/DynAnyPackage/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.IOP
			'CodeSets', 'Codec', 'CodecFactory', 
			'CodecFactoryHelper', 'CodecFactoryOperations', 'CodecOperations', 
			'ComponentIdHelper', 'ENCODING_CDR_ENCAPS', 'Encoding', 
			'IOR', 'IORHelper', 'IORHolder', 
			'MultipleComponentProfileHelper', 'MultipleComponentProfileHolder', 'ProfileIdHelper', 
			'ServiceContext', 'ServiceContextHelper', 'ServiceContextHolder', 
			'ServiceContextListHelper', 'ServiceContextListHolder', 'ServiceIdHelper', 
			'TAG_ALTERNATE_IIOP_ADDRESS', 'TAG_CODE_SETS', 'TAG_INTERNET_IOP', 
			'TAG_JAVA_CODEBASE', 'TAG_MULTIPLE_COMPONENTS', 'TAG_ORB_TYPE', 
			'TAG_POLICIES', 'TaggedComponent', 'TaggedComponentHelper', 
			'TaggedComponentHolder', 'TaggedProfile', 'TaggedProfileHelper', 
			'TaggedProfileHolder', 'TransactionService'),

		 'java/java4/org/omg/IOP',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/IOP/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.IOP.CodecFactoryPackage
			'UnknownEncoding', 'UnknownEncodingHelper'),

		 'java/java4/org/omg/IOP/CodecFactoryPackage',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/IOP/CodecFactoryPackage/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.IOP.CodecPackage
			'FormatMismatch', 'FormatMismatchHelper', 'InvalidTypeForEncoding', 
			'InvalidTypeForEncodingHelper', 'TypeMismatch', 'TypeMismatchHelper'),

		 'java/java4/org/omg/IOP/CodecPackage',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/IOP/CodecPackage/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.Messaging
			'SYNC_WITH_TRANSPORT', 'SyncScopeHelper'),

		 'java/java4/org/omg/Messaging',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/Messaging/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.PortableInterceptor
			'ClientRequestInfo', 'ClientRequestInfoOperations', 'ClientRequestInterceptor', 
			'ClientRequestInterceptorOperations', 'Current', 'CurrentHelper', 
			'CurrentOperations', 'ForwardRequest', 'ForwardRequestHelper', 
			'IORInfo', 'IORInfoOperations', 'IORInterceptor', 
			'IORInterceptorOperations', 'Interceptor', 'InterceptorOperations', 
			'InvalidSlot', 'InvalidSlotHelper', 'LOCATION_FORWARD', 
			'ORBInitInfo', 'ORBInitInfoOperations', 'ORBInitializer', 
			'ORBInitializerOperations', 'PolicyFactory', 'PolicyFactoryOperations', 
			'RequestInfo', 'RequestInfoOperations', 'SUCCESSFUL', 
			'SYSTEM_EXCEPTION', 'ServerRequestInfo', 'ServerRequestInfoOperations', 
			'ServerRequestInterceptor', 'ServerRequestInterceptorOperations', 'TRANSPORT_RETRY', 
			'USER_EXCEPTION'),

		 'java/java4/org/omg/PortableInterceptor',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/PortableInterceptor/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.PortableInterceptor.ORBInitInfoPackage
			'DuplicateName', 'DuplicateNameHelper', 'InvalidName', 
			'InvalidNameHelper', 'ObjectIdHelper'),

		 'java/java4/org/omg/PortableInterceptor/ORBInitInfoPackage',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/PortableInterceptor/ORBInitInfoPackage/{FNAME}.html'

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

		 'java/java4/org/omg/PortableServer',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/PortableServer/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.PortableServer.CurrentPackage
			'NoContext', 'NoContextHelper'),

		 'java/java4/org/omg/PortableServer/CurrentPackage',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/PortableServer/CurrentPackage/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.PortableServer.POAManagerPackage
			'AdapterInactive', 'AdapterInactiveHelper', 'State'),

		 'java/java4/org/omg/PortableServer/POAManagerPackage',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/PortableServer/POAManagerPackage/{FNAME}.html'

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

		 'java/java4/org/omg/PortableServer/POAPackage',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/PortableServer/POAPackage/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.PortableServer.portable
			'Delegate'),

		 'java/java4/org/omg/PortableServer/portable',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/PortableServer/portable/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.PortableServer.ServantLocatorPackage
			'CookieHolder'),

		 'java/java4/org/omg/PortableServer/ServantLocatorPackage',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/PortableServer/ServantLocatorPackage/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.SendingContext
			'RunTime', 'RunTimeOperations'),

		 'java/java4/org/omg/SendingContext',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/SendingContext/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.omg.stub.java.rmi
			'_Remote_Stub'),

		 'java/java4/org/omg/stub/java/rmi',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/omg/stub/java/rmi/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.w3c.dom
			'Attr', 'CDATASection', 'CharacterData', 
			'Comment', 'DOMException', 'DOMImplementation', 
			'Document', 'DocumentFragment', 'DocumentType', 
			'Element', 'Entity', 'EntityReference', 
			'NamedNodeMap', 'Node', 'NodeList', 
			'Notation', 'ProcessingInstruction', 'Text'),

		 'java/java4/org/w3c/dom',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/w3c/dom/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.xml.sax
			'AttributeList', 'Attributes', 'ContentHandler', 
			'DTDHandler', 'DocumentHandler', 'EntityResolver', 
			'ErrorHandler', 'HandlerBase', 'InputSource', 
			'Locator', 'Parser', 'SAXException', 
			'SAXNotRecognizedException', 'SAXNotSupportedException', 'SAXParseException', 
			'XMLFilter', 'XMLReader'),

		 'java/java4/org/xml/sax',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/xml/sax/{FNAME}.html'

	);

	$context->addKeywordGroup(array(
	//org.xml.sax.ext
			'DeclHandler', 'LexicalHandler'),

		 'java/java4/org/xml/sax/ext',
		 true,
		 'http://java.sun.com/j2se/1.5.0/docs/api/org/xml/sax/ext/{FNAME}.html'

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

function geshi_java_java4_single_string (&$context)
{
    $context->addDelimiters("'", "'");
    $context->setEscapeCharacters('\\');
    $context->setCharactersToEscape(array('\\', "'"));
    $context->setComplexFlag(GESHI_COMPLEX_PASSALL);
    //$context->_contextStyleType = GESHI_STYLE_STRINGS;
}

function geshi_java_java4_double_string (&$context)
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

function geshi_java_java4_single_comment (&$context)
{
    $context->addDelimiters('//', "\n");
    $context->setComplexFlag(GESHI_COMPLEX_PASSALL);
    //$this->_contextStyleType = GESHI_STYLE_COMMENTS;
}

function geshi_java_java4_multi_comment (&$context)
{
    $context->addDelimiters('/*', '*/');
    $context->setComplexFlag(GESHI_COMPLEX_PASSALL);
    //$this->_contextStyleType = GESHI_STYLE_COMMENTS;
}

/**#@-*/

?>

