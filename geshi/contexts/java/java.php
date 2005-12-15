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
    new GeSHiSingleCharContext('java',  $DIALECT, 'common/single_string'),
    new GeSHiStringContext('java', $DIALECT, 'common/double_string'),
    new GeSHiContext('java', $DIALECT, 'common/single_comment'),
    new GeSHiContext('java', $DIALECT, 'common/multi_comment'),
    // Use doxygen
    new GeshiContext('java', $DIALECT, 'doxygen')
 );
 
 $this->_contextKeywords = array(
    0 => array(
    	//keywords
        0 => array(
        	'abstract', 'assert', 'boolean', 'break', 'byte', 'case', 'catch',
        	'char', 'class', 'const', 'continue', 'default', 'do', 'double',
        	'else', 'enum', 'extends', 'final', 'finally', 'for',
        	'goto', 'if', 'implements', 'import', 'instanceof',
        	'interface', 'native', 'new', 'package', 'private',
        	'protected', 'public', 'return', 'static', 'strictfp',
        	'super', 'switch', 'synchronized', 'this', 'throw', 'throws',
        	'transient', 'try', 'volatile', 'while' 
        ),
        1 => $CONTEXT . '/keyword',
        2 => 'color:#a6a600;',
        3 => false,
        4 => ''
   		),
   	1 => array(
    	//java.applet
    	0 => array('Applet', 'AppletContext', 'AppletStub', 'AudioClip'),
		1 => $CONTEXT . '/java/applet',
        2 => 'color:#999;font-weight:bold;',
        3 => true,
        4 => ''					
    	),
  	
  	2 => array(
  		//java.awt
  		0 => array(
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
			'Toolkit', 'Transparency', 'Window', 	
  		),
		1 => $CONTEXT . '/java/awt',
        2 => 'color:#999;font-weight:bold;',
        3 => true,
        4 => ''			
  	
  	),
  	
  	3 => array(
		//java.awt.color
    	0 => array(
			'CMMException', 'ColorSpace', 'ICC_ColorSpace', 
			'ICC_Profile', 'ICC_ProfileGray', 'ICC_ProfileRGB', 
			'ProfileDataException'   		
		),
    	1 => $CONTEXT . '/java/awt/color',
    	2 => 'color:#444;font-weight:bold;',
        3 => true,
        4 => ''	  	
  	
  	),
  	
  	4 => array(
	//java.awt.datatransfer
    	0 => array(
			'Clipboard', 'ClipboardOwner', 'DataFlavor', 
			'FlavorEvent', 'FlavorListener', 'FlavorMap', 
			'FlavorTable', 'MimeTypeParseException', 'StringSelection', 
			'SystemFlavorMap', 'Transferable', 'UnsupportedFlavorException'					
		),
    	1 => $CONTEXT . '/java/awt/datatransfer',
    	2 => 'color:#444;font-weight:bold;',
        3 => true,
        4 => ''	  	
  	  	
  	),
  	
  	5 => array(
	//java.awt.dnd
    	0 => array(
			'Autoscroll', 'DnDConstants', 'DragGestureEvent', 
			'DragGestureListener', 'DragGestureRecognizer', 'DragSource', 
			'DragSourceAdapter', 'DragSourceContext', 'DragSourceDragEvent', 
			'DragSourceDropEvent', 'DragSourceEvent', 'DragSourceListener', 
			'DragSourceMotionListener', 'DropTarget', 'DropTarget.DropTargetAutoScroller', 
			'DropTargetAdapter', 'DropTargetContext', 'DropTargetDragEvent', 
			'DropTargetDropEvent', 'DropTargetEvent', 'DropTargetListener', 
			'InvalidDnDOperationException', 'MouseDragGestureRecognizer'				
		),
    	1 => $CONTEXT . '/java/awt/dnd',
    	2 => 'color:#444;font-weight:bold;',
        3 => true,
        4 => ''	  	
  	  	
  	),
  	
  	6 => array(
  	//java.awt.event
  		0 => array(		
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
			'WindowStateListener'  	  	  			
  		),
		
		1 => $CONTEXT . '/java/awt/event',
    	2 => 'color:#444;font-weight:bold;',
        3 => true,
        4 => ''	  	
  	
	),		
  	
	7 => array(
	//java.awt.font
		0 => array(
			'FontRenderContext', 'GlyphJustificationInfo', 'GlyphMetrics', 
			'GlyphVector', 'GraphicAttribute', 'ImageGraphicAttribute', 
			'LineBreakMeasurer', 'LineMetrics', 'MultipleMaster', 
			'NumericShaper', 'OpenType', 'ShapeGraphicAttribute', 
			'TextAttribute', 'TextHitInfo', 'TextLayout', 
			'TextLayout.CaretPolicy', 'TextMeasurer', 'TransformAttribute'),

		1 => $CONTEXT . '/java/awt/font',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	8 => array(
	//java.awt.geom 
		0 => array(
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

		1 => $CONTEXT . '/java/awt/geom',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	9 => array(
	//java.awt.im 
		0 => array(
			'InputContext', 'InputMethodHighlight', 'InputMethodRequests', 
			'InputSubset'),

		1 => $CONTEXT . '/java/awt/im',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	10 => array(
	//java.awt.im.spi 
		0 => array(
			'InputMethod', 'InputMethodContext', 'InputMethodDescriptor'),

		1 => $CONTEXT . '/java/awt/im/spi',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	11 => array(
	//java.awt.image 
		0 => array(
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

		1 => $CONTEXT . '/java/awt/image',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	12 => array(
	//java.awt.image.renderable
		0 => array(
			'ContextualRenderedImageFactory', 'ParameterBlock', 'RenderContext', 
			'RenderableImage', 'RenderableImageOp', 'RenderableImageProducer', 
			'RenderedImageFactory'),

		1 => $CONTEXT . '/java/awt/image/renderable',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	13 => array(
	//java.awt.print 
		0 => array(
			'Book', 'PageFormat', 'Pageable', 
			'Paper', 'Printable', 'PrinterAbortException', 
			'PrinterException', 'PrinterGraphics', 'PrinterIOException', 
			'PrinterJob'),

		1 => $CONTEXT . '/java/awt/print',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	14 => array(
	//java.beans 
		0 => array(
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

		1 => $CONTEXT . '/java/beans',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	15 => array(
	//java.beans.beancontext
		0 => array(
			'BeanContext', 'BeanContextChild', 'BeanContextChildComponentProxy', 
			'BeanContextChildSupport', 'BeanContextContainerProxy', 'BeanContextEvent', 
			'BeanContextMembershipEvent', 'BeanContextMembershipListener', 'BeanContextProxy', 
			'BeanContextServiceAvailableEvent', 'BeanContextServiceProvider', 'BeanContextServiceProviderBeanInfo', 
			'BeanContextServiceRevokedEvent', 'BeanContextServiceRevokedListener', 'BeanContextServices', 
			'BeanContextServicesListener', 'BeanContextServicesSupport', 'BeanContextServicesSupport.BCSSServiceProvider', 
			'BeanContextSupport', 'BeanContextSupport.BCSIterator'),

		1 => $CONTEXT . '/java/beans/beancontext',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	16 => array(
	//java.io 
		0 => array(
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

		1 => $CONTEXT . '/java/io',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	17 => array(
	//java.lang 
		0 => array(
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

		1 => $CONTEXT . '/java/lang',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	18 => array(
	//java.lang.annotation
		0 => array(
			'Annotation', 'Annotation Types', 'AnnotationFormatError', 
			'AnnotationTypeMismatchException', 'Documented', 'ElementType', 
			'IncompleteAnnotationException', 'Inherited', 'Retention', 
			'RetentionPolicy', 'Target'),

		1 => $CONTEXT . '/java/lang/annotation',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	19 => array(
	//java.lang.instrument
		0 => array(
			'ClassDefinition', 'ClassFileTransformer', 'IllegalClassFormatException', 
			'Instrumentation', 'UnmodifiableClassException'),

		1 => $CONTEXT . '/java/lang/instrument',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	20 => array(
	//java.lang.management 
		0 => array(
			'ClassLoadingMXBean', 'CompilationMXBean', 'GarbageCollectorMXBean', 
			'ManagementFactory', 'ManagementPermission', 'MemoryMXBean', 
			'MemoryManagerMXBean', 'MemoryNotificationInfo', 'MemoryPoolMXBean', 
			'MemoryType', 'MemoryUsage', 'OperatingSystemMXBean', 
			'RuntimeMXBean', 'ThreadInfo', 'ThreadMXBean'),

		1 => $CONTEXT . '/java/lang/management',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	21 => array(
	//java.lang.ref 
		0 => array(
			'PhantomReference', 'Reference', 'ReferenceQueue', 
			'SoftReference', 'WeakReference'),

		1 => $CONTEXT . '/java/lang/ref',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	22 => array(
	//java.lang.reflect 
		0 => array(
			'AccessibleObject', 'AnnotatedElement', 'Array', 
			'Constructor', 'Field', 'GenericArrayType', 
			'GenericDeclaration', 'GenericSignatureFormatError', 'InvocationHandler', 
			'InvocationTargetException', 'MalformedParameterizedTypeException', 'Member', 
			'Method', 'Modifier', 'ParameterizedType', 
			'Proxy', 'ReflectPermission', 'Type', 
			'TypeVariable', 'UndeclaredThrowableException', 'WildcardType'),

		1 => $CONTEXT . '/java/lang/reflect',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	23 => array(
	//java.math
		0 => array(
			'BigDecimal', 'BigInteger', 'MathContext', 
			'RoundingMode'),

		1 => $CONTEXT . '/java/math',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	24 => array(
	//java.net 
		0 => array(
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

		1 => $CONTEXT . '/java/net',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	25 => array(
	//java.nio 
		0 => array(
			'Buffer', 'BufferOverflowException', 'BufferUnderflowException', 
			'ByteBuffer', 'ByteOrder', 'CharBuffer', 
			'DoubleBuffer', 'FloatBuffer', 'IntBuffer', 
			'InvalidMarkException', 'LongBuffer', 'MappedByteBuffer', 
			'ReadOnlyBufferException', 'ShortBuffer'),

		1 => $CONTEXT . '/java/nio',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	26 => array(
	//java.nio.channels 
		0 => array(
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

		1 => $CONTEXT . '/java/nio/channels',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	27 => array(
	//java.nio.channels.spi 
		0 => array(
			'AbstractInterruptibleChannel', 'AbstractSelectableChannel', 'AbstractSelectionKey', 
			'AbstractSelector', 'SelectorProvider'),

		1 => $CONTEXT . '/java/nio/channels/spi',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	28 => array(
	//java.nio.charset
		0 => array(
			'CharacterCodingException', 'Charset', 'CharsetDecoder', 
			'CharsetEncoder', 'CoderMalfunctionError', 'CoderResult', 
			'CodingErrorAction', 'IllegalCharsetNameException', 'MalformedInputException', 
			'UnmappableCharacterException', 'UnsupportedCharsetException'),

		1 => $CONTEXT . '/java/nio/charset',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	29 => array(
	//java.nio.charset.spi 
		0 => array(
			'CharsetProvider'),

		1 => $CONTEXT . '/java/nio/charset/spi',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	30 => array(
	//java.rmi 
		0 => array(
			'AccessException', 'AlreadyBoundException', 'ConnectException', 
			'ConnectIOException', 'MarshalException', 'MarshalledObject', 
			'Naming', 'NoSuchObjectException', 'NotBoundException', 
			'RMISecurityException', 'RMISecurityManager', 'Remote', 
			'RemoteException', 'ServerError', 'ServerException', 
			'ServerRuntimeException', 'StubNotFoundException', 'UnexpectedException', 
			'UnknownHostException', 'UnmarshalException'),

		1 => $CONTEXT . '/java/rmi',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	31 => array(
	//java.rmi.activation 
		0 => array(
			'Activatable', 'ActivateFailedException', 'ActivationDesc', 
			'ActivationException', 'ActivationGroup', 'ActivationGroupDesc', 
			'ActivationGroupDesc.CommandEnvironment', 'ActivationGroupID', 'ActivationGroup_Stub', 
			'ActivationID', 'ActivationInstantiator', 'ActivationMonitor', 
			'ActivationSystem', 'Activator', 'UnknownGroupException', 
			'UnknownObjectException'),

		1 => $CONTEXT . '/java/rmi/activation',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	32 => array(
	//java.rmi.dgc 
		0 => array(
			'DGC', 'Lease', 'VMID'),

		1 => $CONTEXT . '/java/rmi/dgc',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	33 => array(
	//java.rmi.registry 
		0 => array(
			'LocateRegistry', 'Registry', 'RegistryHandler'),

		1 => $CONTEXT . '/java/rmi/registry',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	34 => array(
	//java.rmi.server 
		0 => array(
			'ExportException', 'LoaderHandler', 'LogStream', 
			'ObjID', 'Operation', 'RMIClassLoader', 
			'RMIClassLoaderSpi', 'RMIClientSocketFactory', 'RMIFailureHandler', 
			'RMIServerSocketFactory', 'RMISocketFactory', 'RemoteCall', 
			'RemoteObject', 'RemoteObjectInvocationHandler', 'RemoteRef', 
			'RemoteServer', 'RemoteStub', 'ServerCloneException', 
			'ServerNotActiveException', 'ServerRef', 'Skeleton', 
			'SkeletonMismatchException', 'SkeletonNotFoundException', 'SocketSecurityException', 
			'UID', 'UnicastRemoteObject', 'Unreferenced'),

		1 => $CONTEXT . '/java/rmi/server',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	35 => array(
	//java.security
		0 => array(
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

		1 => $CONTEXT . '/java/security',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	36 => array(
	//java.security.acl 
		0 => array(
			'Acl', 'AclEntry', 'AclNotFoundException', 
			'Group', 'LastOwnerException', 'NotOwnerException', 
			'Owner', 'Permission'),

		1 => $CONTEXT . '/java/security/acl',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	37 => array(
	//java.security.cert 
		0 => array(
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

		1 => $CONTEXT . '/java/security/cert',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	38 => array(
	//java.security.interfaces
		0 => array(
			'DSAKey', 'DSAKeyPairGenerator', 'DSAParams', 
			'DSAPrivateKey', 'DSAPublicKey', 'ECKey', 
			'ECPrivateKey', 'ECPublicKey', 'RSAKey', 
			'RSAMultiPrimePrivateCrtKey', 'RSAPrivateCrtKey', 'RSAPrivateKey', 
			'RSAPublicKey'),

		1 => $CONTEXT . '/java/security/interfaces',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	39 => array(
	//java.security.spec 
		0 => array(
			'AlgorithmParameterSpec', 'DSAParameterSpec', 'DSAPrivateKeySpec', 
			'DSAPublicKeySpec', 'ECField', 'ECFieldF2m', 
			'ECFieldFp', 'ECGenParameterSpec', 'ECParameterSpec', 
			'ECPoint', 'ECPrivateKeySpec', 'ECPublicKeySpec', 
			'EllipticCurve', 'EncodedKeySpec', 'InvalidKeySpecException', 
			'InvalidParameterSpecException', 'KeySpec', 'MGF1ParameterSpec', 
			'PKCS8EncodedKeySpec', 'PSSParameterSpec', 'RSAKeyGenParameterSpec', 
			'RSAMultiPrimePrivateCrtKeySpec', 'RSAOtherPrimeInfo', 'RSAPrivateCrtKeySpec', 
			'RSAPrivateKeySpec', 'RSAPublicKeySpec', 'X509EncodedKeySpec'),

		1 => $CONTEXT . '/java/security/spec',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	40 => array(
	//java.sql 
		0 => array(
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

		1 => $CONTEXT . '/java/sql',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	41 => array(
	//java.text 
		0 => array(
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

		1 => $CONTEXT . '/java/text',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	42 => array(
	//java.util 
		0 => array(
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

		1 => $CONTEXT . '/java/util',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	43 => array(
	//java.util.concurrent 
		0 => array(
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

		1 => $CONTEXT . '/java/util/concurrent',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	44 => array(
	//java.util.concurrent.atomic 
		0 => array(
			'AtomicBoolean', 'AtomicInteger', 'AtomicIntegerArray', 
			'AtomicIntegerFieldUpdater', 'AtomicLong', 'AtomicLongArray', 
			'AtomicLongFieldUpdater', 'AtomicMarkableReference', 'AtomicReference', 
			'AtomicReferenceArray', 'AtomicReferenceFieldUpdater', 'AtomicStampedReference'),

		1 => $CONTEXT . '/java/util/concurrent/atomic',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	45 => array(
	//java.util.concurrent.locks 
		0 => array(
			'AbstractQueuedSynchronizer', 'Condition', 'Lock', 
			'LockSupport', 'ReadWriteLock', 'ReentrantLock', 
			'ReentrantReadWriteLock', 'ReentrantReadWriteLock.ReadLock', 'ReentrantReadWriteLock.WriteLock'),

		1 => $CONTEXT . '/java/util/concurrent/locks',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	46 => array(
	//java.util.jar 
		0 => array(
			'Attributes', 'Attributes.Name', 'JarEntry', 
			'JarException', 'JarFile', 'JarInputStream', 
			'JarOutputStream', 'Manifest', 'Pack200', 
			'Pack200.Packer', 'Pack200.Unpacker'),

		1 => $CONTEXT . '/java/util/jar',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	47 => array(
	//java.util.logging 
		0 => array(
			'ConsoleHandler', 'ErrorManager', 'FileHandler', 
			'Filter', 'Formatter', 'Handler', 
			'Level', 'LogManager', 'LogRecord', 
			'Logger', 'LoggingMXBean', 'LoggingPermission', 
			'MemoryHandler', 'SimpleFormatter', 'SocketHandler', 
			'StreamHandler', 'XMLFormatter'),

		1 => $CONTEXT . '/java/util/logging',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	48 => array(
	//java.util.prefs 
		0 => array(
			'AbstractPreferences', 'BackingStoreException', 'InvalidPreferencesFormatException', 
			'NodeChangeEvent', 'NodeChangeListener', 'PreferenceChangeEvent', 
			'PreferenceChangeListener', 'Preferences', 'PreferencesFactory'),

		1 => $CONTEXT . '/java/util/prefs',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	49 => array(
	//java.util.regex 
		0 => array(
			'MatchResult', 'Matcher', 'Pattern', 
			'PatternSyntaxException'),

		1 => $CONTEXT . '/java/util/regex',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	50 => array(
	//java.util.zip 
		0 => array(
			'Adler32', 'CRC32', 'CheckedInputStream', 
			'CheckedOutputStream', 'Checksum', 'DataFormatException', 
			'Deflater', 'DeflaterOutputStream', 'GZIPInputStream', 
			'GZIPOutputStream', 'Inflater', 'InflaterInputStream', 
			'ZipEntry', 'ZipException', 'ZipFile', 
			'ZipInputStream', 'ZipOutputStream'),

		1 => $CONTEXT . '/java/util/zip',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	51 => array(
	//javax.accessibility 
		0 => array(
			'Accessible', 'AccessibleAction', 'AccessibleAttributeSequence', 
			'AccessibleBundle', 'AccessibleComponent', 'AccessibleContext', 
			'AccessibleEditableText', 'AccessibleExtendedComponent', 'AccessibleExtendedTable', 
			'AccessibleExtendedText', 'AccessibleHyperlink', 'AccessibleHypertext', 
			'AccessibleIcon', 'AccessibleKeyBinding', 'AccessibleRelation', 
			'AccessibleRelationSet', 'AccessibleResourceBundle', 'AccessibleRole', 
			'AccessibleSelection', 'AccessibleState', 'AccessibleStateSet', 
			'AccessibleStreamable', 'AccessibleTable', 'AccessibleTableModelChange', 
			'AccessibleText', 'AccessibleTextSequence', 'AccessibleValue'),

		1 => $CONTEXT . '/javax/accessibility',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	52 => array(
	//javax.activity 
		0 => array(
			'ActivityCompletedException', 'ActivityRequiredException', 'InvalidActivityException'),

		1 => $CONTEXT . '/javax/activity',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	53 => array(
	//javax.crypto 
		0 => array(
			'BadPaddingException', 'Cipher', 'CipherInputStream', 
			'CipherOutputStream', 'CipherSpi', 'EncryptedPrivateKeyInfo', 
			'ExemptionMechanism', 'ExemptionMechanismException', 'ExemptionMechanismSpi', 
			'IllegalBlockSizeException', 'KeyAgreement', 'KeyAgreementSpi', 
			'KeyGenerator', 'KeyGeneratorSpi', 'Mac', 
			'MacSpi', 'NoSuchPaddingException', 'NullCipher', 
			'SealedObject', 'SecretKey', 'SecretKeyFactory', 
			'SecretKeyFactorySpi', 'ShortBufferException'),

		1 => $CONTEXT . '/javax/crypto',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	54 => array(
	//javax.crypto.interfaces
		0 => array(
			'DHKey', 'DHPrivateKey', 'DHPublicKey', 
			'PBEKey'),

		1 => $CONTEXT . '/javax/crypto/interfaces',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	55 => array(
	//javax.crypto.spec 
		0 => array(
			'DESKeySpec', 'DESedeKeySpec', 'DHGenParameterSpec', 
			'DHParameterSpec', 'DHPrivateKeySpec', 'DHPublicKeySpec', 
			'IvParameterSpec', 'OAEPParameterSpec', 'PBEKeySpec', 
			'PBEParameterSpec', 'PSource', 'PSource.PSpecified', 
			'RC2ParameterSpec', 'RC5ParameterSpec', 'SecretKeySpec'),

		1 => $CONTEXT . '/javax/crypto/spec',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	56 => array(
	//javax.imageio 
		0 => array(
			'IIOException', 'IIOImage', 'IIOParam', 
			'IIOParamController', 'ImageIO', 'ImageReadParam', 
			'ImageReader', 'ImageTranscoder', 'ImageTypeSpecifier', 
			'ImageWriteParam', 'ImageWriter'),

		1 => $CONTEXT . '/javax/imageio',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	57 => array(
	//javax.imageio.event 
		0 => array(
			'IIOReadProgressListener', 'IIOReadUpdateListener', 'IIOReadWarningListener', 
			'IIOWriteProgressListener', 'IIOWriteWarningListener'),

		1 => $CONTEXT . '/javax/imageio/event',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	58 => array(
	//javax.imageio.metadata   
		0 => array(
			'IIOInvalidTreeException', 'IIOMetadata', 'IIOMetadataController', 
			'IIOMetadataFormat', 'IIOMetadataFormatImpl', 'IIOMetadataNode'),

		1 => $CONTEXT . '/javax/imageio/metadata',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	59 => array(
	//javax.imageio.plugins.bmp   
		0 => array(
			'BMPImageWriteParam'),

		1 => $CONTEXT . '/javax/imageio/plugins/bmp',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	60 => array(
	//javax.imageio.plugins.jpeg   
		0 => array(
			'JPEGHuffmanTable', 'JPEGImageReadParam', 'JPEGImageWriteParam', 
			'JPEGQTable'),

		1 => $CONTEXT . '/javax/imageio/plugins/jpeg',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	61 => array(
	//javax.imageio.spi 
		0 => array(
			'IIORegistry', 'IIOServiceProvider', 'ImageInputStreamSpi', 
			'ImageOutputStreamSpi', 'ImageReaderSpi', 'ImageReaderWriterSpi', 
			'ImageTranscoderSpi', 'ImageWriterSpi', 'RegisterableService', 
			'ServiceRegistry', 'ServiceRegistry.Filter'),

		1 => $CONTEXT . '/javax/imageio/spi',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	62 => array(
	//javax.imageio.stream   
		0 => array(
			'FileCacheImageInputStream', 'FileCacheImageOutputStream', 'FileImageInputStream', 
			'FileImageOutputStream', 'IIOByteBuffer', 'ImageInputStream', 
			'ImageInputStreamImpl', 'ImageOutputStream', 'ImageOutputStreamImpl', 
			'MemoryCacheImageInputStream', 'MemoryCacheImageOutputStream'),

		1 => $CONTEXT . '/javax/imageio/stream',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	63 => array(
	//javax.management  
		0 => array(
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

		1 => $CONTEXT . '/javax/management',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	64 => array(
	//javax.management.loading   
		0 => array(
			'ClassLoaderRepository', 'DefaultLoaderRepository', 'MLet', 
			'MLetMBean', 'PrivateClassLoader', 'PrivateMLet'),

		1 => $CONTEXT . '/javax/management/loading',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	65 => array(
	//javax.management.modelmbean   
		0 => array(
			'DescriptorSupport', 'InvalidTargetObjectTypeException', 'ModelMBean', 
			'ModelMBeanAttributeInfo', 'ModelMBeanConstructorInfo', 'ModelMBeanInfo', 
			'ModelMBeanInfoSupport', 'ModelMBeanNotificationBroadcaster', 'ModelMBeanNotificationInfo', 
			'ModelMBeanOperationInfo', 'RequiredModelMBean', 'XMLParseException'),

		1 => $CONTEXT . '/javax/management/modelmbean',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	66 => array(
	//javax.management.monitor   
		0 => array(
			'CounterMonitor', 'CounterMonitorMBean', 'GaugeMonitor', 
			'GaugeMonitorMBean', 'Monitor', 'MonitorMBean', 
			'MonitorNotification', 'MonitorSettingException', 'StringMonitor', 
			'StringMonitorMBean'),

		1 => $CONTEXT . '/javax/management/monitor',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	67 => array(
	//javax.management.openmbean   
		0 => array(
			'ArrayType', 'CompositeData', 'CompositeDataSupport', 
			'CompositeType', 'InvalidKeyException', 'InvalidOpenTypeException', 
			'KeyAlreadyExistsException', 'OpenDataException', 'OpenMBeanAttributeInfo', 
			'OpenMBeanAttributeInfoSupport', 'OpenMBeanConstructorInfo', 'OpenMBeanConstructorInfoSupport', 
			'OpenMBeanInfo', 'OpenMBeanInfoSupport', 'OpenMBeanOperationInfo', 
			'OpenMBeanOperationInfoSupport', 'OpenMBeanParameterInfo', 'OpenMBeanParameterInfoSupport', 
			'OpenType', 'SimpleType', 'TabularData', 
			'TabularDataSupport', 'TabularType'),

		1 => $CONTEXT . '/javax/management/openmbean',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	68 => array(
	//javax.management.relation   
		0 => array(
			'Relation', 'RelationServiceMBean', 'RelationSupportMBean', 
			'RelationType'),

		1 => $CONTEXT . '/javax/management/relation',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	69 => array(
	//MBeanServerNotificationFilter
		0 => array(
			'InvalidRelationIdException', 'InvalidRelationServiceException', 'InvalidRelationTypeException', 
			'InvalidRoleInfoException', 'InvalidRoleValueException', 'RelationException', 
			'RelationNotFoundException', 'RelationNotification', 'RelationService', 
			'RelationServiceNotRegisteredException', 'RelationSupport', 'RelationTypeNotFoundException', 
			'RelationTypeSupport', 'Role', 'RoleInfo', 
			'RoleInfoNotFoundException', 'RoleList', 'RoleNotFoundException', 
			'RoleResult', 'RoleStatus', 'RoleUnresolved', 
			'RoleUnresolvedList'),

		1 => $CONTEXT . '/MBeanServerNotificationFilter',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	70 => array(
	//javax.management.remote   
		0 => array(
			'JMXAuthenticator', 'JMXConnectionNotification', 'JMXConnector', 
			'JMXConnectorFactory', 'JMXConnectorProvider', 'JMXConnectorServer', 
			'JMXConnectorServerFactory', 'JMXConnectorServerMBean', 'JMXConnectorServerProvider', 
			'JMXPrincipal', 'JMXProviderException', 'JMXServerErrorException', 
			'JMXServiceURL', 'MBeanServerForwarder', 'NotificationResult', 
			'SubjectDelegationPermission', 'TargetedNotification'),

		1 => $CONTEXT . '/javax/management/remote',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	71 => array(
	//javax.management.remote.rmi   
		0 => array(
			'RMIConnection', 'RMIConnectionImpl', 'RMIConnectionImpl_Stub', 
			'RMIConnector', 'RMIConnectorServer', 'RMIIIOPServerImpl', 
			'RMIJRMPServerImpl', 'RMIServer', 'RMIServerImpl', 
			'RMIServerImpl_Stub'),

		1 => $CONTEXT . '/javax/management/remote/rmi',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	72 => array(
	//javax.management.timer  
		0 => array(
			'Timer', 'TimerAlarmClockNotification', 'TimerMBean', 
			'TimerNotification'),

		1 => $CONTEXT . '/javax/management/timer',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	73 => array(
	//javax.naming  
		0 => array(
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

		1 => $CONTEXT . '/javax/naming',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	74 => array(
	//javax.naming.directory   
		0 => array(
			'Attribute', 'AttributeInUseException', 'AttributeModificationException', 
			'Attributes', 'BasicAttribute', 'BasicAttributes', 
			'DirContext', 'InitialDirContext', 'InvalidAttributeIdentifierException', 
			'InvalidAttributeValueException', 'InvalidAttributesException', 'InvalidSearchControlsException', 
			'InvalidSearchFilterException', 'ModificationItem', 'NoSuchAttributeException', 
			'SchemaViolationException', 'SearchControls', 'SearchResult'),

		1 => $CONTEXT . '/javax/naming/directory',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	75 => array(
	//javax.naming.event 
		0 => array(
			'EventContext', 'EventDirContext', 'NamespaceChangeListener', 
			'NamingEvent', 'NamingExceptionEvent', 'NamingListener', 
			'ObjectChangeListener'),

		1 => $CONTEXT . '/javax/naming/event',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	76 => array(
	//javax.naming.ldap  
		0 => array(
			'BasicControl', 'Control', 'ControlFactory', 
			'ExtendedRequest', 'ExtendedResponse', 'HasControls', 
			'InitialLdapContext', 'LdapContext', 'LdapName', 
			'LdapReferralException', 'ManageReferralControl', 'PagedResultsControl', 
			'PagedResultsResponseControl', 'Rdn', 'SortControl', 
			'SortKey', 'SortResponseControl', 'StartTlsRequest', 
			'StartTlsResponse', 'UnsolicitedNotification', 'UnsolicitedNotificationEvent', 
			'UnsolicitedNotificationListener'),

		1 => $CONTEXT . '/javax/naming/ldap',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	77 => array(
	//javax.naming.spi  
		0 => array(
			'DirObjectFactory', 'DirStateFactory', 'DirStateFactory.Result', 
			'DirectoryManager', 'InitialContextFactory', 'InitialContextFactoryBuilder', 
			'NamingManager', 'ObjectFactory', 'ObjectFactoryBuilder', 
			'ResolveResult', 'Resolver', 'StateFactory'),

		1 => $CONTEXT . '/javax/naming/spi',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	78 => array(
	//javax.net   
		0 => array(
			'ServerSocketFactory', 'SocketFactory'),

		1 => $CONTEXT . '/javax/net',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	79 => array(
	//javax.net.ssl   
		0 => array(
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

		1 => $CONTEXT . '/javax/net/ssl',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	80 => array(
	//javax.print
		0 => array(
			'AttributeException', 'CancelablePrintJob', 'Doc', 
			'DocFlavor', 'DocFlavor.BYTE_ARRAY', 'DocFlavor.CHAR_ARRAY', 
			'DocFlavor.INPUT_STREAM', 'DocFlavor.READER', 'DocFlavor.SERVICE_FORMATTED', 
			'DocFlavor.STRING', 'DocFlavor.URL', 'DocPrintJob', 
			'FlavorException', 'MultiDoc', 'MultiDocPrintJob', 
			'MultiDocPrintService', 'PrintException', 'PrintService', 
			'PrintServiceLookup', 'ServiceUI', 'ServiceUIFactory', 
			'SimpleDoc', 'StreamPrintService', 'StreamPrintServiceFactory', 
			'URIException'),

		1 => $CONTEXT . '/javax/print',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	81 => array(
	//javax.print.attribute   
		0 => array(
			'Attribute', 'AttributeSet', 'AttributeSetUtilities', 
			'DateTimeSyntax', 'DocAttribute', 'DocAttributeSet', 
			'EnumSyntax', 'HashAttributeSet', 'HashDocAttributeSet', 
			'HashPrintJobAttributeSet', 'HashPrintRequestAttributeSet', 'HashPrintServiceAttributeSet', 
			'IntegerSyntax', 'PrintJobAttribute', 'PrintJobAttributeSet', 
			'PrintRequestAttribute', 'PrintRequestAttributeSet', 'PrintServiceAttribute', 
			'PrintServiceAttributeSet', 'ResolutionSyntax', 'SetOfIntegerSyntax', 
			'Size2DSyntax', 'SupportedValuesAttribute', 'TextSyntax', 
			'URISyntax', 'UnmodifiableSetException'),

		1 => $CONTEXT . '/javax/print/attribute',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	82 => array(
	//javax.print.attribute.standard  
		0 => array(
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

		1 => $CONTEXT . '/javax/print/attribute/standard',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	83 => array(
	//javax.print.event  
		0 => array(
			'PrintEvent', 'PrintJobAdapter', 'PrintJobAttributeEvent', 
			'PrintJobAttributeListener', 'PrintJobEvent', 'PrintJobListener', 
			'PrintServiceAttributeEvent', 'PrintServiceAttributeListener'),

		1 => $CONTEXT . '/javax/print/event',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	84 => array(
	//javax.rmi
		0 => array(
			'PortableRemoteObject'),

		1 => $CONTEXT . '/javax/rmi',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	85 => array(
	//javax.rmi.CORBA  
		0 => array(
			'ClassDesc', 'PortableRemoteObjectDelegate', 'Stub', 
			'StubDelegate', 'Tie', 'Util', 
			'UtilDelegate', 'ValueHandler', 'ValueHandlerMultiFormat'),

		1 => $CONTEXT . '/javax/rmi/CORBA',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	86 => array(
	//javax.rmi.ssl   
		0 => array(
			'SslRMIClientSocketFactory', 'SslRMIServerSocketFactory'),

		1 => $CONTEXT . '/javax/rmi/ssl',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	87 => array(
	//javax.security.auth   
		0 => array(
			'AuthPermission', 'DestroyFailedException', 'Destroyable', 
			'Policy', 'PrivateCredentialPermission', 'RefreshFailedException', 
			'Refreshable', 'Subject', 'SubjectDomainCombiner'),

		1 => $CONTEXT . '/javax/security/auth',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	88 => array(
	//javax.security.auth.callback   
		0 => array(
			'Callback', 'CallbackHandler', 'ChoiceCallback', 
			'ConfirmationCallback', 'LanguageCallback', 'NameCallback', 
			'PasswordCallback', 'TextInputCallback', 'TextOutputCallback', 
			'UnsupportedCallbackException'),

		1 => $CONTEXT . '/javax/security/auth/callback',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	89 => array(
	//javax.security.auth.kerberos   
		0 => array(
			'DelegationPermission', 'KerberosKey', 'KerberosPrincipal', 
			'KerberosTicket', 'ServicePermission'),

		1 => $CONTEXT . '/javax/security/auth/kerberos',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	90 => array(
	//javax.security.auth.login   
		0 => array(
			'AccountException', 'AccountExpiredException', 'AccountLockedException', 
			'AccountNotFoundException', 'AppConfigurationEntry', 'AppConfigurationEntry.LoginModuleControlFlag', 
			'Configuration', 'CredentialException', 'CredentialExpiredException', 
			'CredentialNotFoundException', 'FailedLoginException', 'LoginContext', 
			'LoginException'),

		1 => $CONTEXT . '/javax/security/auth/login',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	91 => array(
	//javax.security.auth.spi  
		0 => array(
			'LoginModule'),

		1 => $CONTEXT . '/javax/security/auth/spi',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	92 => array(
	//javax.security.auth.x500   
		0 => array(
			'X500Principal', 'X500PrivateCredential'),

		1 => $CONTEXT . '/javax/security/auth/x500',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	93 => array(
	//javax.security.cert  
		0 => array(
			'Certificate', 'CertificateEncodingException', 'CertificateException', 
			'CertificateExpiredException', 'CertificateNotYetValidException', 'CertificateParsingException', 
			'X509Certificate'),

		1 => $CONTEXT . '/javax/security/cert',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	94 => array(
	//javax.security.sasl   
		0 => array(
			'AuthenticationException', 'AuthorizeCallback', 'RealmCallback', 
			'RealmChoiceCallback', 'Sasl', 'SaslClient', 
			'SaslClientFactory', 'SaslException', 'SaslServer', 
			'SaslServerFactory'),

		1 => $CONTEXT . '/javax/security/sasl',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	95 => array(
	//javax.sound.midi   
		0 => array(
			'ControllerEventListener', 'Instrument', 'InvalidMidiDataException', 
			'MetaEventListener', 'MetaMessage', 'MidiChannel', 
			'MidiDevice', 'MidiDevice.Info', 'MidiEvent', 
			'MidiFileFormat', 'MidiMessage', 'MidiSystem', 
			'MidiUnavailableException', 'Patch', 'Receiver', 
			'Sequence', 'Sequencer', 'Sequencer.SyncMode', 
			'ShortMessage', 'Soundbank', 'SoundbankResource', 
			'Synthesizer', 'SysexMessage', 'Track', 
			'Transmitter', 'VoiceStatus'),

		1 => $CONTEXT . '/javax/sound/midi',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	96 => array(
	//javax.sound.midi.spi  
		0 => array(
			'MidiDeviceProvider', 'MidiFileReader', 'MidiFileWriter', 
			'SoundbankReader'),

		1 => $CONTEXT . '/javax/sound/midi/spi',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	97 => array(
	//javax.sound.sampled   
		0 => array(
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

		1 => $CONTEXT . '/javax/sound/sampled',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	98 => array(
	//javax.sound.sampled.spi   
		0 => array(
			'AudioFileReader', 'AudioFileWriter', 'FormatConversionProvider', 
			'MixerProvider'),

		1 => $CONTEXT . '/javax/sound/sampled/spi',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	99 => array(
	//javax.sql  
		0 => array(
			'ConnectionEvent', 'ConnectionEventListener', 'ConnectionPoolDataSource', 
			'DataSource', 'PooledConnection', 'RowSet', 
			'RowSetEvent', 'RowSetInternal', 'RowSetListener', 
			'RowSetMetaData', 'RowSetReader', 'RowSetWriter', 
			'XAConnection', 'XADataSource'),

		1 => $CONTEXT . '/javax/sql',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	100 => array(
	//javax.sql.rowset   
		0 => array(
			'BaseRowSet', 'CachedRowSet', 'FilteredRowSet', 
			'JdbcRowSet', 'JoinRowSet', 'Joinable', 
			'Predicate', 'RowSetMetaDataImpl', 'RowSetWarning', 
			'WebRowSet'),

		1 => $CONTEXT . '/javax/sql/rowset',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	101 => array(
	//javax.sql.rowset.serial   
		0 => array(
			'SQLInputImpl', 'SQLOutputImpl', 'SerialArray', 
			'SerialBlob', 'SerialClob', 'SerialDatalink', 
			'SerialException', 'SerialJavaObject', 'SerialRef', 
			'SerialStruct'),

		1 => $CONTEXT . '/javax/sql/rowset/serial',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	102 => array(
	//javax.sql.rowset.spi   
		0 => array(
			'SyncFactory', 'SyncFactoryException', 'SyncProvider', 
			'SyncProviderException', 'SyncResolver', 'TransactionalWriter', 
			'XmlReader', 'XmlWriter'),

		1 => $CONTEXT . '/javax/sql/rowset/spi',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	103 => array(
	//javax.swing  
		0 => array(
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

		1 => $CONTEXT . '/javax/swing',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	104 => array(
	//javax.swing.border   
		0 => array(
			'AbstractBorder', 'BevelBorder', 'Border', 
			'CompoundBorder', 'EmptyBorder', 'EtchedBorder', 
			'LineBorder', 'MatteBorder', 'SoftBevelBorder', 
			'TitledBorder'),

		1 => $CONTEXT . '/javax/swing/border',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	105 => array(
	//javax.swing.colorchooser   
		0 => array(
			'AbstractColorChooserPanel', 'ColorChooserComponentFactory', 'ColorSelectionModel', 
			'DefaultColorSelectionModel'),

		1 => $CONTEXT . '/javax/swing/colorchooser',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	106 => array(
	//javax.swing.event   
		0 => array(
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

		1 => $CONTEXT . '/javax/swing/event',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	107 => array(
	//javax.swing.filechooser   
		0 => array(
			'FileFilter', 'FileSystemView', 'FileView'),

		1 => $CONTEXT . '/javax/swing/filechooser',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	108 => array(
	//javax.swing.plaf   
		0 => array(
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

		1 => $CONTEXT . '/javax/swing/plaf',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	109 => array(
	//javax.swing.plaf.basic   
		0 => array(
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

		1 => $CONTEXT . '/javax/swing/plaf/basic',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	110 => array(
	//javax.swing.plaf.metal  
		0 => array(
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

		1 => $CONTEXT . '/javax/swing/plaf/metal',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	111 => array(
	//javax.swing.plaf.multi   
		0 => array(
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

		1 => $CONTEXT . '/javax/swing/plaf/multi',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	112 => array(
	//javax.swing.plaf.synth   
		0 => array(
			'ColorType', 'Region', 'SynthConstants', 
			'SynthContext', 'SynthGraphicsUtils', 'SynthLookAndFeel', 
			'SynthPainter', 'SynthStyle', 'SynthStyleFactory'),

		1 => $CONTEXT . '/javax/swing/plaf/synth',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	113 => array(
	//javax.swing.table
		0 => array(
			'AbstractTableModel', 'DefaultTableCellRenderer', 'DefaultTableCellRenderer.UIResource', 
			'DefaultTableColumnModel', 'DefaultTableModel', 'JTableHeader', 
			'TableCellEditor', 'TableCellRenderer', 'TableColumn', 
			'TableColumnModel', 'TableModel'),

		1 => $CONTEXT . '/javax/swing/table',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	114 => array(
	//javax.swing.text   
		0 => array(
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

		1 => $CONTEXT . '/javax/swing/text',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	115 => array(
	//javax.swing.text.html   
		0 => array(
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

		1 => $CONTEXT . '/javax/swing/text/html',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	116 => array(
	//javax.swing.text.html.parser   
		0 => array(
			'AttributeList', 'ContentModel', 'DTD', 
			'DTDConstants', 'DocumentParser', 'Element', 
			'Entity', 'Parser', 'ParserDelegator', 
			'TagElement'),

		1 => $CONTEXT . '/javax/swing/text/html/parser',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	117 => array(
	//javax.swing.text.rtf   
		0 => array(
			'RTFEditorKit'),

		1 => $CONTEXT . '/javax/swing/text/rtf',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	118 => array(
	//javax.swing.tree   
		0 => array(
			'AbstractLayoutCache', 'AbstractLayoutCache.NodeDimensions', 'DefaultMutableTreeNode', 
			'DefaultTreeCellEditor', 'DefaultTreeCellRenderer', 'DefaultTreeModel', 
			'DefaultTreeSelectionModel', 'ExpandVetoException', 'FixedHeightLayoutCache', 
			'MutableTreeNode', 'RowMapper', 'TreeCellEditor', 
			'TreeCellRenderer', 'TreeModel', 'TreeNode', 
			'TreePath', 'TreeSelectionModel', 'VariableHeightLayoutCache'),

		1 => $CONTEXT . '/javax/swing/tree',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	119 => array(
	//javax.swing.undo
		0 => array(
			'AbstractUndoableEdit', 'CannotRedoException', 'CannotUndoException', 
			'CompoundEdit', 'StateEdit', 'StateEditable', 
			'UndoManager', 'UndoableEdit', 'UndoableEditSupport'),

		1 => $CONTEXT . '/javax/swing/undo',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	120 => array(
	//javax.transaction
		0 => array(
			'InvalidTransactionException', 'TransactionRequiredException', 'TransactionRolledbackException'),

		1 => $CONTEXT . '/javax/transaction',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	121 => array(
	//javax.transaction.xa   
		0 => array(
			'XAException', 'XAResource', 'Xid'),

		1 => $CONTEXT . '/javax/transaction/xa',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	122 => array(
	//javax.xml   
		0 => array(
			'XMLConstants'),

		1 => $CONTEXT . '/javax/xml',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	123 => array(
	//javax.xml.datatype   
		0 => array(
			'DatatypeConfigurationException', 'DatatypeConstants', 'DatatypeConstants.Field', 
			'DatatypeFactory', 'Duration', 'NamespaceContext', 
			'QName', 'XMLGregorianCalendar', 'javax.xml.namespace'),

		1 => $CONTEXT . '/javax/xml/datatype',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	124 => array(
	//javax.xml.parsers  
		0 => array(
			'DocumentBuilder', 'DocumentBuilderFactory', 'FactoryConfigurationError', 
			'ParserConfigurationException', 'SAXParser', 'SAXParserFactory'),

		1 => $CONTEXT . '/javax/xml/parsers',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	125 => array(
	//javax.xml.transform   
		0 => array(
			'ErrorListener', 'OutputKeys', 'Result', 
			'Source', 'SourceLocator', 'Templates', 
			'Transformer', 'TransformerConfigurationException', 'TransformerException', 
			'TransformerFactory', 'TransformerFactoryConfigurationError', 'URIResolver'),

		1 => $CONTEXT . '/javax/xml/transform',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	126 => array(
	//javax.xml.transform.dom 
		0 => array(
			'DOMLocator', 'DOMResult', 'DOMSource'),

		1 => $CONTEXT . '/javax/xml/transform/dom',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	127 => array(
	//javax.xml.transform.sax   
		0 => array(
			'SAXResult', 'SAXSource', 'SAXTransformerFactory', 
			'TemplatesHandler', 'TransformerHandler'),

		1 => $CONTEXT . '/javax/xml/transform/sax',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	128 => array(
	//javax.xml.transform.stream   
		0 => array(
			'StreamResult', 'StreamSource'),

		1 => $CONTEXT . '/javax/xml/transform/stream',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	129 => array(
	//javax.xml.validation   
		0 => array(
			'Schema', 'SchemaFactory', 'SchemaFactoryLoader', 
			'TypeInfoProvider', 'Validator', 'ValidatorHandler'),

		1 => $CONTEXT . '/javax/xml/validation',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	130 => array(
	//javax.xml.xpath   
		0 => array(
			'XPath', 'XPathConstants', 'XPathException', 
			'XPathExpression', 'XPathExpressionException', 'XPathFactory', 
			'XPathFactoryConfigurationException', 'XPathFunction', 'XPathFunctionException', 
			'XPathFunctionResolver', 'XPathVariableResolver'),

		1 => $CONTEXT . '/javax/xml/xpath',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	131 => array(
	//org.ietf.jgss
		0 => array(
			'ChannelBinding', 'GSSContext', 'GSSCredential', 
			'GSSException', 'GSSManager', 'GSSName', 
			'MessageProp', 'Oid'),

		1 => $CONTEXT . '/org/ietf/jgss',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	132 => array(
	//org.omg.CORBA   
		0 => array(
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

		1 => $CONTEXT . '/org/omg/CORBA',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	133 => array(
	//org.omg.CORBA_2_3   
		0 => array(
			'ORB'),

		1 => $CONTEXT . '/org/omg/CORBA_2_3',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	134 => array(
	//org.omg.CORBA_2_3.portable   
		0 => array(
			'Delegate', 'InputStream', 'ObjectImpl', 
			'OutputStream'),

		1 => $CONTEXT . '/org/omg/CORBA_2_3/portable',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	135 => array(
	//org.omg.CORBA.DynAnyPackage
		0 => array(
			'Invalid', 'InvalidSeq', 'InvalidValue', 
			'TypeMismatch'),

		1 => $CONTEXT . '/org/omg/CORBA/DynAnyPackage',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	136 => array(
	//org.omg.CORBA.ORBPackage
		0 => array(
			'InconsistentTypeCode', 'InvalidName'),

		1 => $CONTEXT . '/org/omg/CORBA/ORBPackage',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	137 => array(
	//org.omg.CORBA.portable   
		0 => array(
			'ApplicationException', 'BoxedValueHelper', 'CustomValue', 
			'Delegate', 'IDLEntity', 'IndirectionException', 
			'InputStream', 'InvokeHandler', 'ObjectImpl', 
			'OutputStream', 'RemarshalException', 'ResponseHandler', 
			'ServantObject', 'Streamable', 'StreamableValue', 
			'UnknownException', 'ValueBase', 'ValueFactory', 
			'ValueInputStream', 'ValueOutputStream'),

		1 => $CONTEXT . '/org/omg/CORBA/portable',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	138 => array(
	//org.omg.CORBA.TypeCodePackage
		0 => array(
			'BadKind', 'Bounds'),

		1 => $CONTEXT . '/org/omg/CORBA/TypeCodePackage',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	139 => array(
	//org.omg.CosNaming  
		0 => array(
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

		1 => $CONTEXT . '/org/omg/CosNaming',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	140 => array(
	//org.omg.CosNaming.NamingContextExtPackage 
		0 => array(
			'AddressHelper', 'InvalidAddress', 'InvalidAddressHelper', 
			'InvalidAddressHolder', 'StringNameHelper', 'URLStringHelper'),

		1 => $CONTEXT . '/org/omg/CosNaming/NamingContextExtPackage',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	141 => array(
	//org.omg.CosNaming.NamingContextPackage  
		0 => array(
			'AlreadyBound', 'AlreadyBoundHelper', 'AlreadyBoundHolder', 
			'CannotProceed', 'CannotProceedHelper', 'CannotProceedHolder', 
			'InvalidName', 'InvalidNameHelper', 'InvalidNameHolder', 
			'NotEmpty', 'NotEmptyHelper', 'NotEmptyHolder', 
			'NotFound', 'NotFoundHelper', 'NotFoundHolder', 
			'NotFoundReason', 'NotFoundReasonHelper', 'NotFoundReasonHolder'),

		1 => $CONTEXT . '/org/omg/CosNaming/NamingContextPackage',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	142 => array(
	//org.omg.Dynamic 
		0 => array(
			'Parameter'),

		1 => $CONTEXT . '/org/omg/Dynamic',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	143 => array(
	//org.omg.DynamicAny   
		0 => array(
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

		1 => $CONTEXT . '/org/omg/DynamicAny',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	144 => array(
	//org.omg.DynamicAny.DynAnyFactoryPackage 
		0 => array(
			'InconsistentTypeCode', 'InconsistentTypeCodeHelper'),

		1 => $CONTEXT . '/org/omg/DynamicAny/DynAnyFactoryPackage',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	145 => array(
	//org.omg.DynamicAny.DynAnyPackage   
		0 => array(
			'InvalidValue', 'InvalidValueHelper', 'TypeMismatch', 
			'TypeMismatchHelper'),

		1 => $CONTEXT . '/org/omg/DynamicAny/DynAnyPackage',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	146 => array(
	//org.omg.IOP  
		0 => array(
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

		1 => $CONTEXT . '/org/omg/IOP',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	147 => array(
	//org.omg.IOP.CodecFactoryPackage   
		0 => array(
			'UnknownEncoding', 'UnknownEncodingHelper'),

		1 => $CONTEXT . '/org/omg/IOP/CodecFactoryPackage',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	148 => array(
	//org.omg.IOP.CodecPackage 
		0 => array(
			'FormatMismatch', 'FormatMismatchHelper', 'InvalidTypeForEncoding', 
			'InvalidTypeForEncodingHelper', 'TypeMismatch', 'TypeMismatchHelper'),

		1 => $CONTEXT . '/org/omg/IOP/CodecPackage',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	149 => array(
	//org.omg.Messaging
		0 => array(
			'SYNC_WITH_TRANSPORT', 'SyncScopeHelper'),

		1 => $CONTEXT . '/org/omg/Messaging',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	150 => array(
	//org.omg.PortableInterceptor   
		0 => array(
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

		1 => $CONTEXT . '/org/omg/PortableInterceptor',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	151 => array(
	//org.omg.PortableInterceptor.ORBInitInfoPackage   
		0 => array(
			'DuplicateName', 'DuplicateNameHelper', 'InvalidName', 
			'InvalidNameHelper', 'ObjectIdHelper'),

		1 => $CONTEXT . '/org/omg/PortableInterceptor/ORBInitInfoPackage',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	152 => array(
	//org.omg.PortableServer  
		0 => array(
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

		1 => $CONTEXT . '/org/omg/PortableServer',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	153 => array(
	//org.omg.PortableServer.CurrentPackage
		0 => array(
			'NoContext', 'NoContextHelper'),

		1 => $CONTEXT . '/org/omg/PortableServer/CurrentPackage',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	154 => array(
	//org.omg.PortableServer.POAManagerPackage 
		0 => array(
			'AdapterInactive', 'AdapterInactiveHelper', 'State'),

		1 => $CONTEXT . '/org/omg/PortableServer/POAManagerPackage',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	155 => array(
	//org.omg.PortableServer.POAPackage   
		0 => array(
			'AdapterAlreadyExists', 'AdapterAlreadyExistsHelper', 'AdapterNonExistent', 
			'AdapterNonExistentHelper', 'InvalidPolicy', 'InvalidPolicyHelper', 
			'NoServant', 'NoServantHelper', 'ObjectAlreadyActive', 
			'ObjectAlreadyActiveHelper', 'ObjectNotActive', 'ObjectNotActiveHelper', 
			'ServantAlreadyActive', 'ServantAlreadyActiveHelper', 'ServantNotActive', 
			'ServantNotActiveHelper', 'WrongAdapter', 'WrongAdapterHelper', 
			'WrongPolicy', 'WrongPolicyHelper'),

		1 => $CONTEXT . '/org/omg/PortableServer/POAPackage',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	156 => array(
	//org.omg.PortableServer.portable   
		0 => array(
			'Delegate'),

		1 => $CONTEXT . '/org/omg/PortableServer/portable',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	157 => array(
	//org.omg.PortableServer.ServantLocatorPackage
		0 => array(
			'CookieHolder'),

		1 => $CONTEXT . '/org/omg/PortableServer/ServantLocatorPackage',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	158 => array(
	//org.omg.SendingContext   
		0 => array(
			'RunTime', 'RunTimeOperations'),

		1 => $CONTEXT . '/org/omg/SendingContext',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	159 => array(
	//org.omg.stub.java.rmi   
		0 => array(
			'_Remote_Stub'),

		1 => $CONTEXT . '/org/omg/stub/java/rmi',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	160 => array(
	//org.w3c.dom   
		0 => array(
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

		1 => $CONTEXT . '/org/w3c/dom',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	161 => array(
	//org.w3c.dom.bootstrap   
		0 => array(
			'DOMImplementationRegistry'),

		1 => $CONTEXT . '/org/w3c/dom/bootstrap',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	162 => array(
	//org.w3c.dom.events   
		0 => array(
			'DocumentEvent', 'Event', 'EventException', 
			'EventListener', 'EventTarget', 'MouseEvent', 
			'MutationEvent', 'UIEvent'),

		1 => $CONTEXT . '/org/w3c/dom/events',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	163 => array(
	//org.w3c.dom.ls   
		0 => array(
			'DOMImplementationLS', 'LSException', 'LSInput', 
			'LSLoadEvent', 'LSOutput', 'LSParser', 
			'LSParserFilter', 'LSProgressEvent', 'LSResourceResolver', 
			'LSSerializer', 'LSSerializerFilter'),

		1 => $CONTEXT . '/org/w3c/dom/ls',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	164 => array(
	//org.xml.sax   
		0 => array(
			'AttributeList', 'Attributes', 'ContentHandler', 
			'DTDHandler', 'DocumentHandler', 'EntityResolver', 
			'ErrorHandler', 'HandlerBase', 'InputSource', 
			'Locator', 'Parser', 'SAXException', 
			'SAXNotRecognizedException', 'SAXNotSupportedException', 'SAXParseException', 
			'XMLFilter', 'XMLReader'),

		1 => $CONTEXT . '/org/xml/sax',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),

	165 => array(
	//org.xml.sax.ext
		0 => array(
			'Attributes2', 'Attributes2Impl', 'DeclHandler', 
			'DefaultHandler2', 'EntityResolver2', 'LexicalHandler', 
			'Locator2', 'Locator2Impl'),

		1 => $CONTEXT . '/org/xml/sax/ext',
		2 => 'color:#444;font-weight:bold;',
		3 => true,
		4 => ''

	),


	
    166 => array(
    	//data types
    	0 => array(
    		'byte', 'short', 'int', 'long', 'float', 'double',
			'char', 'boolean', 'void'
		),
    	1 => $CONTEXT . '/dtype',
    	2 => 'color:#444;font-weight:bold;',
        3 => true,
        4 => ''	
    ),
    
    167 => array(
        //  const values
        0 => array(
            'false', 'null', 'true'
        ),
        1 => $CONTEXT . '/const',
        2 => 'color:#000;font-weight:bold;',
        3 => true,
        4 => ''
    )
    
);

$this->_contextCharactersDisallowedBeforeKeywords = array('\'');
$this->_contextCharactersDisallowedAfterKeywords  = array('\'');

$this->_contextSymbols  = array(
    0 => array(
        0 => array(
            '(', ')', ',', ';', ':', '[', ']',
            '+', '-', '*', '%', '/', '&', '|', '!', '?', 
			'<', '>', '{', '}', '=', '.', ''
            ),
        1 => $CONTEXT . '/symbols',
        2 => 'color:#008000;'
    )
);

$this->_contextRegexps = array(
    0 => geshi_use_doubles($CONTEXT),
    1 => geshi_use_integers($CONTEXT)
);
$this->_objectSplitters = array(
    0 => array(
        0 => array('.'),
        1 => $CONTEXT . '/ootoken',
        2 => 'color:#933;',
        3 => false
    )
);

?>
