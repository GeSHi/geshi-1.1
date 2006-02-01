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
        	'abstract', 'assert', 'boolean', 'break', 'byte', 'case', 'catch',
        	'char', 'class', 'const', 'continue', 'default', 'do', 'double',
        	'else', 'enum', 'extends', 'final', 'finally', 'for',
        	'goto', 'if', 'implements', 'import', 'instanceof',
        	'interface', 'native', 'new', 'package', 'private',
        	'protected', 'public', 'return', 'static', 'strictfp',
        	'super', 'switch', 'synchronized', 'this', 'throw', 'throws',
        	'transient', 'try', 'volatile', 'while' 
        ),
        $CONTEXT . '/keyword',
        false,
        ''
    ),
    
   	array(
    	//java.applet
    	array('Applet', 'AppletContext', 'AppletStub', 'AudioClip'),
		$CONTEXT . '/java/applet',
        true,
        ''					
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
			'Toolkit', 'Transparency', 'Window', 	
  		),
		$CONTEXT . '/java/awt',
        true,
        ''
  	),
  	
  	array(
		//java.awt.color
    	array(
			'CMMException', 'ColorSpace', 'ICC_ColorSpace', 
			'ICC_Profile', 'ICC_ProfileGray', 'ICC_ProfileRGB', 
			'ProfileDataException'   		
		),
    	$CONTEXT . '/java/awt/color',
        true,
        ''	  	
  	),
  	
  	array(
	    //java.awt.datatransfer
    	array(
			'Clipboard', 'ClipboardOwner', 'DataFlavor', 
			'FlavorEvent', 'FlavorListener', 'FlavorMap', 
			'FlavorTable', 'MimeTypeParseException', 'StringSelection', 
			'SystemFlavorMap', 'Transferable', 'UnsupportedFlavorException'					
		),
    	$CONTEXT . '/java/awt/datatransfer',
        true,
        ''	  	
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
			'InvalidDnDOperationException', 'MouseDragGestureRecognizer'				
		),
    	$CONTEXT . '/java/awt/dnd',
        true,
        ''	  	
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
			'WindowStateListener'  	  	  			
  		),
		$CONTEXT . '/java/awt/event',
        true,
        ''	  	
	),	
  	
	array(
	    //java.awt.font
		array(
			'FontRenderContext', 'GlyphJustificationInfo', 'GlyphMetrics', 
			'GlyphVector', 'GraphicAttribute', 'ImageGraphicAttribute', 
			'LineBreakMeasurer', 'LineMetrics', 'MultipleMaster', 
			'NumericShaper', 'OpenType', 'ShapeGraphicAttribute', 
			'TextAttribute', 'TextHitInfo', 'TextLayout', 
			'TextLayout.CaretPolicy', 'TextMeasurer', 'TransformAttribute'
        ),
		$CONTEXT . '/java/awt/font',
		true,
		''
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
		true,
		''
	),

	array(
	//java.awt.im 
		array(
			'InputContext', 'InputMethodHighlight', 'InputMethodRequests', 
			'InputSubset'),

		$CONTEXT . '/java/awt/im',
		true,
		''

	),

	array(
	//java.awt.im.spi 
		array(
			'InputMethod', 'InputMethodContext', 'InputMethodDescriptor'),

		$CONTEXT . '/java/awt/im/spi',
		true,
		''

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
		true,
		''

	),

	array(
	//java.awt.image.renderable
		array(
			'ContextualRenderedImageFactory', 'ParameterBlock', 'RenderContext', 
			'RenderableImage', 'RenderableImageOp', 'RenderableImageProducer', 
			'RenderedImageFactory'),

		$CONTEXT . '/java/awt/image/renderable',
		true,
		''

	),

	array(
	//java.awt.print 
		array(
			'Book', 'PageFormat', 'Pageable', 
			'Paper', 'Printable', 'PrinterAbortException', 
			'PrinterException', 'PrinterGraphics', 'PrinterIOException', 
			'PrinterJob'),

		$CONTEXT . '/java/awt/print',
		true,
		''

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
		true,
		''

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
		true,
		''

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
		true,
		''

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
		true,
		''

	),

	array(
	//java.lang.annotation
		array(
			'Annotation', 'Annotation Types', 'AnnotationFormatError', 
			'AnnotationTypeMismatchException', 'Documented', 'ElementType', 
			'IncompleteAnnotationException', 'Inherited', 'Retention', 
			'RetentionPolicy', 'Target'),

		$CONTEXT . '/java/lang/annotation',
		true,
		''

	),

	array(
	//java.lang.instrument
		array(
			'ClassDefinition', 'ClassFileTransformer', 'IllegalClassFormatException', 
			'Instrumentation', 'UnmodifiableClassException'),

		$CONTEXT . '/java/lang/instrument',
		true,
		''

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
		true,
		''

	),

	array(
	//java.lang.ref 
		array(
			'PhantomReference', 'Reference', 'ReferenceQueue', 
			'SoftReference', 'WeakReference'),

		$CONTEXT . '/java/lang/ref',
		true,
		''

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
		true,
		''

	),

	array(
	//java.math
		array(
			'BigDecimal', 'BigInteger', 'MathContext', 
			'RoundingMode'),

		$CONTEXT . '/java/math',
		true,
		''

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
		true,
		''

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
		true,
		''

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
		true,
		''

	),

	array(
	//java.nio.channels.spi 
		array(
			'AbstractInterruptibleChannel', 'AbstractSelectableChannel', 'AbstractSelectionKey', 
			'AbstractSelector', 'SelectorProvider'),

		$CONTEXT . '/java/nio/channels/spi',
		true,
		''

	),

	array(
	//java.nio.charset
		array(
			'CharacterCodingException', 'Charset', 'CharsetDecoder', 
			'CharsetEncoder', 'CoderMalfunctionError', 'CoderResult', 
			'CodingErrorAction', 'IllegalCharsetNameException', 'MalformedInputException', 
			'UnmappableCharacterException', 'UnsupportedCharsetException'),

		$CONTEXT . '/java/nio/charset',
		true,
		''

	),

	array(
	//java.nio.charset.spi 
		array(
			'CharsetProvider'),

		$CONTEXT . '/java/nio/charset/spi',
		true,
		''

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
		true,
		''

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
		true,
		''

	),

	array(
	//java.rmi.dgc 
		array(
			'DGC', 'Lease', 'VMID'),

		$CONTEXT . '/java/rmi/dgc',
		true,
		''

	),

	array(
	//java.rmi.registry 
		array(
			'LocateRegistry', 'Registry', 'RegistryHandler'),

		$CONTEXT . '/java/rmi/registry',
		true,
		''

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
		true,
		''

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
		true,
		''

	),

	array(
	//java.security.acl 
		array(
			'Acl', 'AclEntry', 'AclNotFoundException', 
			'Group', 'LastOwnerException', 'NotOwnerException', 
			'Owner', 'Permission'),

		$CONTEXT . '/java/security/acl',
		true,
		''

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
		true,
		''

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
		true,
		''

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
		true,
		''

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
		true,
		''

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
		true,
		''

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
		true,
		''

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
		true,
		''

	),

	array(
	//java.util.concurrent.atomic 
		array(
			'AtomicBoolean', 'AtomicInteger', 'AtomicIntegerArray', 
			'AtomicIntegerFieldUpdater', 'AtomicLong', 'AtomicLongArray', 
			'AtomicLongFieldUpdater', 'AtomicMarkableReference', 'AtomicReference', 
			'AtomicReferenceArray', 'AtomicReferenceFieldUpdater', 'AtomicStampedReference'),

		$CONTEXT . '/java/util/concurrent/atomic',
		true,
		''

	),

	array(
	//java.util.concurrent.locks 
		array(
			'AbstractQueuedSynchronizer', 'Condition', 'Lock', 
			'LockSupport', 'ReadWriteLock', 'ReentrantLock', 
			'ReentrantReadWriteLock', 'ReentrantReadWriteLock.ReadLock', 'ReentrantReadWriteLock.WriteLock'),

		$CONTEXT . '/java/util/concurrent/locks',
		true,
		''

	),

	array(
	//java.util.jar 
		array(
			'Attributes', 'Attributes.Name', 'JarEntry', 
			'JarException', 'JarFile', 'JarInputStream', 
			'JarOutputStream', 'Manifest', 'Pack200', 
			'Pack200.Packer', 'Pack200.Unpacker'),

		$CONTEXT . '/java/util/jar',
		true,
		''

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
		true,
		''

	),

	array(
	//java.util.prefs 
		array(
			'AbstractPreferences', 'BackingStoreException', 'InvalidPreferencesFormatException', 
			'NodeChangeEvent', 'NodeChangeListener', 'PreferenceChangeEvent', 
			'PreferenceChangeListener', 'Preferences', 'PreferencesFactory'),

		$CONTEXT . '/java/util/prefs',
		true,
		''

	),

	array(
	//java.util.regex 
		array(
			'MatchResult', 'Matcher', 'Pattern', 
			'PatternSyntaxException'),

		$CONTEXT . '/java/util/regex',
		true,
		''

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
		true,
		''

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
		true,
		''

	),

	array(
	//javax.activity 
		array(
			'ActivityCompletedException', 'ActivityRequiredException', 'InvalidActivityException'),

		$CONTEXT . '/javax/activity',
		true,
		''

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
		true,
		''

	),

	array(
	//javax.crypto.interfaces
		array(
			'DHKey', 'DHPrivateKey', 'DHPublicKey', 
			'PBEKey'),

		$CONTEXT . '/javax/crypto/interfaces',
		true,
		''

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
		true,
		''

	),

	array(
	//javax.imageio 
		array(
			'IIOException', 'IIOImage', 'IIOParam', 
			'IIOParamController', 'ImageIO', 'ImageReadParam', 
			'ImageReader', 'ImageTranscoder', 'ImageTypeSpecifier', 
			'ImageWriteParam', 'ImageWriter'),

		$CONTEXT . '/javax/imageio',
		true,
		''

	),

	array(
	//javax.imageio.event 
		array(
			'IIOReadProgressListener', 'IIOReadUpdateListener', 'IIOReadWarningListener', 
			'IIOWriteProgressListener', 'IIOWriteWarningListener'),

		$CONTEXT . '/javax/imageio/event',
		true,
		''

	),

	array(
	//javax.imageio.metadata   
		array(
			'IIOInvalidTreeException', 'IIOMetadata', 'IIOMetadataController', 
			'IIOMetadataFormat', 'IIOMetadataFormatImpl', 'IIOMetadataNode'),

		$CONTEXT . '/javax/imageio/metadata',
		true,
		''

	),

	array(
	//javax.imageio.plugins.bmp   
		array(
			'BMPImageWriteParam'),

		$CONTEXT . '/javax/imageio/plugins/bmp',
		true,
		''

	),

	array(
	//javax.imageio.plugins.jpeg   
		array(
			'JPEGHuffmanTable', 'JPEGImageReadParam', 'JPEGImageWriteParam', 
			'JPEGQTable'),

		$CONTEXT . '/javax/imageio/plugins/jpeg',
		true,
		''

	),

	array(
	//javax.imageio.spi 
		array(
			'IIORegistry', 'IIOServiceProvider', 'ImageInputStreamSpi', 
			'ImageOutputStreamSpi', 'ImageReaderSpi', 'ImageReaderWriterSpi', 
			'ImageTranscoderSpi', 'ImageWriterSpi', 'RegisterableService', 
			'ServiceRegistry', 'ServiceRegistry.Filter'),

		$CONTEXT . '/javax/imageio/spi',
		true,
		''

	),

	array(
	//javax.imageio.stream   
		array(
			'FileCacheImageInputStream', 'FileCacheImageOutputStream', 'FileImageInputStream', 
			'FileImageOutputStream', 'IIOByteBuffer', 'ImageInputStream', 
			'ImageInputStreamImpl', 'ImageOutputStream', 'ImageOutputStreamImpl', 
			'MemoryCacheImageInputStream', 'MemoryCacheImageOutputStream'),

		$CONTEXT . '/javax/imageio/stream',
		true,
		''

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
		true,
		''

	),

	array(
	//javax.management.loading   
		array(
			'ClassLoaderRepository', 'DefaultLoaderRepository', 'MLet', 
			'MLetMBean', 'PrivateClassLoader', 'PrivateMLet'),

		$CONTEXT . '/javax/management/loading',
		true,
		''

	),

	array(
	//javax.management.modelmbean   
		array(
			'DescriptorSupport', 'InvalidTargetObjectTypeException', 'ModelMBean', 
			'ModelMBeanAttributeInfo', 'ModelMBeanConstructorInfo', 'ModelMBeanInfo', 
			'ModelMBeanInfoSupport', 'ModelMBeanNotificationBroadcaster', 'ModelMBeanNotificationInfo', 
			'ModelMBeanOperationInfo', 'RequiredModelMBean', 'XMLParseException'),

		$CONTEXT . '/javax/management/modelmbean',
		true,
		''

	),

	array(
	//javax.management.monitor   
		array(
			'CounterMonitor', 'CounterMonitorMBean', 'GaugeMonitor', 
			'GaugeMonitorMBean', 'Monitor', 'MonitorMBean', 
			'MonitorNotification', 'MonitorSettingException', 'StringMonitor', 
			'StringMonitorMBean'),

		$CONTEXT . '/javax/management/monitor',
		true,
		''

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
		true,
		''

	),

	array(
	//javax.management.relation   
		array(
			'Relation', 'RelationServiceMBean', 'RelationSupportMBean', 
			'RelationType'),

		$CONTEXT . '/javax/management/relation',
		true,
		''

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
		true,
		''

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
		true,
		''

	),

	array(
	//javax.management.remote.rmi   
		array(
			'RMIConnection', 'RMIConnectionImpl', 'RMIConnectionImpl_Stub', 
			'RMIConnector', 'RMIConnectorServer', 'RMIIIOPServerImpl', 
			'RMIJRMPServerImpl', 'RMIServer', 'RMIServerImpl', 
			'RMIServerImpl_Stub'),

		$CONTEXT . '/javax/management/remote/rmi',
		true,
		''

	),

	array(
	//javax.management.timer  
		array(
			'Timer', 'TimerAlarmClockNotification', 'TimerMBean', 
			'TimerNotification'),

		$CONTEXT . '/javax/management/timer',
		true,
		''

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
		true,
		''

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
		true,
		''

	),

	array(
	//javax.naming.event 
		array(
			'EventContext', 'EventDirContext', 'NamespaceChangeListener', 
			'NamingEvent', 'NamingExceptionEvent', 'NamingListener', 
			'ObjectChangeListener'),

		$CONTEXT . '/javax/naming/event',
		true,
		''

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
		true,
		''

	),

	array(
	//javax.naming.spi  
		array(
			'DirObjectFactory', 'DirStateFactory', 'DirStateFactory.Result', 
			'DirectoryManager', 'InitialContextFactory', 'InitialContextFactoryBuilder', 
			'NamingManager', 'ObjectFactory', 'ObjectFactoryBuilder', 
			'ResolveResult', 'Resolver', 'StateFactory'),

		$CONTEXT . '/javax/naming/spi',
		true,
		''

	),

	array(
	//javax.net   
		array(
			'ServerSocketFactory', 'SocketFactory'),

		$CONTEXT . '/javax/net',
		true,
		''

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
		true,
		''

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
			'URIException'
        ),
		$CONTEXT . '/javax/print',
		true,
		''

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
			'URISyntax', 'UnmodifiableSetException'
        ),
		$CONTEXT . '/javax/print/attribute',
		true,
		''

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
			'SheetCollate', 'Sides'
        ),
		$CONTEXT . '/javax/print/attribute/standard',
		true,
		''

	),

	array(
	//javax.print.event  
		array(
			'PrintEvent', 'PrintJobAdapter', 'PrintJobAttributeEvent', 
			'PrintJobAttributeListener', 'PrintJobEvent', 'PrintJobListener', 
			'PrintServiceAttributeEvent', 'PrintServiceAttributeListener'
        ),
		$CONTEXT . '/javax/print/event',
		true,
		''

	),

	array(
	//javax.rmi
		array(
			'PortableRemoteObject'
        ),
		$CONTEXT . '/javax/rmi',
		true,
		''

	),

	array(
	//javax.rmi.CORBA  
		array(
			'ClassDesc', 'PortableRemoteObjectDelegate', 'Stub', 
			'StubDelegate', 'Tie', 'Util', 
			'UtilDelegate', 'ValueHandler', 'ValueHandlerMultiFormat'
        ),
		$CONTEXT . '/javax/rmi/CORBA',
		true,
		''

	),

	array(
	//javax.rmi.ssl   
		array(
			'SslRMIClientSocketFactory', 'SslRMIServerSocketFactory'
        ),
		$CONTEXT . '/javax/rmi/ssl',
		true,
		''

	),

	array(
	//javax.security.auth   
		array(
			'AuthPermission', 'DestroyFailedException', 'Destroyable', 
			'Policy', 'PrivateCredentialPermission', 'RefreshFailedException', 
			'Refreshable', 'Subject', 'SubjectDomainCombiner'
        ),
		$CONTEXT . '/javax/security/auth',
		true,
		''

	),

	array(
	//javax.security.auth.callback   
		array(
			'Callback', 'CallbackHandler', 'ChoiceCallback', 
			'ConfirmationCallback', 'LanguageCallback', 'NameCallback', 
			'PasswordCallback', 'TextInputCallback', 'TextOutputCallback', 
			'UnsupportedCallbackException'
        ),
		$CONTEXT . '/javax/security/auth/callback',
		true,
		''

	),

	array(
	//javax.security.auth.kerberos   
		array(
			'DelegationPermission', 'KerberosKey', 'KerberosPrincipal', 
			'KerberosTicket', 'ServicePermission'
        ),
		$CONTEXT . '/javax/security/auth/kerberos',
		true,
		''

	),

	array(
	//javax.security.auth.login   
		array(
			'AccountException', 'AccountExpiredException', 'AccountLockedException', 
			'AccountNotFoundException', 'AppConfigurationEntry', 'AppConfigurationEntry.LoginModuleControlFlag', 
			'Configuration', 'CredentialException', 'CredentialExpiredException', 
			'CredentialNotFoundException', 'FailedLoginException', 'LoginContext', 
			'LoginException'
        ),
		$CONTEXT . '/javax/security/auth/login',
		true,
		''

	),

	array(
	//javax.security.auth.spi  
		array(
			'LoginModule'
        ),
		$CONTEXT . '/javax/security/auth/spi',
		true,
		''

	),

	array(
	//javax.security.auth.x500   
		array(
			'X500Principal', 'X500PrivateCredential'
        ),
		$CONTEXT . '/javax/security/auth/x500',
		true,
		''

	),

	array(
	//javax.security.cert  
		array(
			'Certificate', 'CertificateEncodingException', 'CertificateException', 
			'CertificateExpiredException', 'CertificateNotYetValidException', 'CertificateParsingException', 
			'X509Certificate'
        ),
		$CONTEXT . '/javax/security/cert',
		true,
		''

	),

	array(
	//javax.security.sasl   
		array(
			'AuthenticationException', 'AuthorizeCallback', 'RealmCallback', 
			'RealmChoiceCallback', 'Sasl', 'SaslClient', 
			'SaslClientFactory', 'SaslException', 'SaslServer', 
			'SaslServerFactory'
        ),
		$CONTEXT . '/javax/security/sasl',
		true,
		''

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
			'Transmitter', 'VoiceStatus'
        ),
		$CONTEXT . '/javax/sound/midi',
		true,
		''

	),

	array(
	//javax.sound.midi.spi  
		array(
			'MidiDeviceProvider', 'MidiFileReader', 'MidiFileWriter', 
			'SoundbankReader'
        ),
		$CONTEXT . '/javax/sound/midi/spi',
		true,
		''

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
			'UnsupportedAudioFileException'
        ),
		$CONTEXT . '/javax/sound/sampled',
		true,
		''

	),

	array(
	//javax.sound.sampled.spi   
		array(
			'AudioFileReader', 'AudioFileWriter', 'FormatConversionProvider', 
			'MixerProvider'
        ),
		$CONTEXT . '/javax/sound/sampled/spi',
		true,
		''

	),

	array(
	//javax.sql  
		array(
			'ConnectionEvent', 'ConnectionEventListener', 'ConnectionPoolDataSource', 
			'DataSource', 'PooledConnection', 'RowSet', 
			'RowSetEvent', 'RowSetInternal', 'RowSetListener', 
			'RowSetMetaData', 'RowSetReader', 'RowSetWriter', 
			'XAConnection', 'XADataSource'
        ),
		$CONTEXT . '/javax/sql',
		true,
		''

	),

	array(
	//javax.sql.rowset   
		array(
			'BaseRowSet', 'CachedRowSet', 'FilteredRowSet', 
			'JdbcRowSet', 'JoinRowSet', 'Joinable', 
			'Predicate', 'RowSetMetaDataImpl', 'RowSetWarning', 
			'WebRowSet'
        ),
		$CONTEXT . '/javax/sql/rowset',
		true,
		''

	),

	array(
	//javax.sql.rowset.serial   
		array(
			'SQLInputImpl', 'SQLOutputImpl', 'SerialArray', 
			'SerialBlob', 'SerialClob', 'SerialDatalink', 
			'SerialException', 'SerialJavaObject', 'SerialRef', 
			'SerialStruct'
        ),
		$CONTEXT . '/javax/sql/rowset/serial',
		true,
		''

	),

	array(
	//javax.sql.rowset.spi   
		array(
			'SyncFactory', 'SyncFactoryException', 'SyncProvider', 
			'SyncProviderException', 'SyncResolver', 'TransactionalWriter', 
			'XmlReader', 'XmlWriter'
        ),
		$CONTEXT . '/javax/sql/rowset/spi',
		true,
		''

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
			'WindowConstants'
        ),
		$CONTEXT . '/javax/swing',
		true,
		''

	),

	array(
	//javax.swing.border   
		array(
			'AbstractBorder', 'BevelBorder', 'Border', 
			'CompoundBorder', 'EmptyBorder', 'EtchedBorder', 
			'LineBorder', 'MatteBorder', 'SoftBevelBorder', 
			'TitledBorder'
        ),
		$CONTEXT . '/javax/swing/border',
		true,
		''

	),

	array(
	//javax.swing.colorchooser   
		array(
			'AbstractColorChooserPanel', 'ColorChooserComponentFactory', 'ColorSelectionModel', 
			'DefaultColorSelectionModel'
        ),
		$CONTEXT . '/javax/swing/colorchooser',
		true,
		''

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
			'UndoableEditListener'
        ),
		$CONTEXT . '/javax/swing/event',
		true,
		''

	),

	array(
	//javax.swing.filechooser   
		array(
			'FileFilter', 'FileSystemView', 'FileView'
        ),
		$CONTEXT . '/javax/swing/filechooser',
		true,
		''

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
			'TreeUI', 'UIResource', 'ViewportUI'
        ),
		$CONTEXT . '/javax/swing/plaf',
		true,
		''

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
			'BasicViewportUI', 'ComboPopup', 'DefaultMenuLayout'
        ),
		$CONTEXT . '/javax/swing/plaf/basic',
		true,
		''

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
			'MetalTreeUI', 'OceanTheme'
        ),
		$CONTEXT . '/javax/swing/plaf/metal',
		true,
		''

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
			'MultiViewportUI'
        ),
		$CONTEXT . '/javax/swing/plaf/multi',
		true,
		''

	),

	array(
	//javax.swing.plaf.synth   
		array(
			'ColorType', 'Region', 'SynthConstants', 
			'SynthContext', 'SynthGraphicsUtils', 'SynthLookAndFeel', 
			'SynthPainter', 'SynthStyle', 'SynthStyleFactory'
        ),
		$CONTEXT . '/javax/swing/plaf/synth',
		true,
		''

	),

	array(
	//javax.swing.table
		array(
			'AbstractTableModel', 'DefaultTableCellRenderer', 'DefaultTableCellRenderer.UIResource', 
			'DefaultTableColumnModel', 'DefaultTableModel', 'JTableHeader', 
			'TableCellEditor', 'TableCellRenderer', 'TableColumn', 
			'TableColumnModel', 'TableModel'
        ),
		$CONTEXT . '/javax/swing/table',
		true,
		''

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
			'ViewFactory', 'WrappedPlainView', 'ZoneView'
        ),
		$CONTEXT . '/javax/swing/text',
		true,
		''

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
			'StyleSheet.ListPainter'
        ),
		$CONTEXT . '/javax/swing/text/html',
		true,
		''

	),

	array(
	//javax.swing.text.html.parser   
		array(
			'AttributeList', 'ContentModel', 'DTD', 
			'DTDConstants', 'DocumentParser', 'Element', 
			'Entity', 'Parser', 'ParserDelegator', 
			'TagElement'
        ),
		$CONTEXT . '/javax/swing/text/html/parser',
		true,
		''

	),

	array(
	//javax.swing.text.rtf   
		array(
			'RTFEditorKit'
        ),
		$CONTEXT . '/javax/swing/text/rtf',
		true,
		''

	),

	array(
	//javax.swing.tree   
		array(
			'AbstractLayoutCache', 'AbstractLayoutCache.NodeDimensions', 'DefaultMutableTreeNode', 
			'DefaultTreeCellEditor', 'DefaultTreeCellRenderer', 'DefaultTreeModel', 
			'DefaultTreeSelectionModel', 'ExpandVetoException', 'FixedHeightLayoutCache', 
			'MutableTreeNode', 'RowMapper', 'TreeCellEditor', 
			'TreeCellRenderer', 'TreeModel', 'TreeNode', 
			'TreePath', 'TreeSelectionModel', 'VariableHeightLayoutCache'
        ),
		$CONTEXT . '/javax/swing/tree',
		true,
		''

	),

	array(
	//javax.swing.undo
		array(
			'AbstractUndoableEdit', 'CannotRedoException', 'CannotUndoException', 
			'CompoundEdit', 'StateEdit', 'StateEditable', 
			'UndoManager', 'UndoableEdit', 'UndoableEditSupport'
        ),
		$CONTEXT . '/javax/swing/undo',
		true,
		''

	),

	array(
	//javax.transaction
		array(
			'InvalidTransactionException', 'TransactionRequiredException', 'TransactionRolledbackException'
        ),
		$CONTEXT . '/javax/transaction',
		true,
		''

	),

	array(
	//javax.transaction.xa   
		array(
			'XAException', 'XAResource', 'Xid'
        ),
		$CONTEXT . '/javax/transaction/xa',
		true,
		''

	),

	array(
	//javax.xml   
		array(
			'XMLConstants'
        ),
		$CONTEXT . '/javax/xml',
		true,
		''

	),

	array(
	//javax.xml.datatype   
		array(
			'DatatypeConfigurationException', 'DatatypeConstants', 'DatatypeConstants.Field', 
			'DatatypeFactory', 'Duration', 'NamespaceContext', 
			'QName', 'XMLGregorianCalendar', 'javax.xml.namespace'
        ),
		$CONTEXT . '/javax/xml/datatype',
		true,
		''

	),

	array(
	//javax.xml.parsers  
		array(
			'DocumentBuilder', 'DocumentBuilderFactory', 'FactoryConfigurationError', 
			'ParserConfigurationException', 'SAXParser', 'SAXParserFactory'
        ),
		$CONTEXT . '/javax/xml/parsers',
		true,
		''

	),

	array(
	//javax.xml.transform   
		array(
			'ErrorListener', 'OutputKeys', 'Result', 
			'Source', 'SourceLocator', 'Templates', 
			'Transformer', 'TransformerConfigurationException', 'TransformerException', 
			'TransformerFactory', 'TransformerFactoryConfigurationError', 'URIResolver'
        ),
		$CONTEXT . '/javax/xml/transform',
		true,
		''

	),

	array(
	//javax.xml.transform.dom 
		array(
			'DOMLocator', 'DOMResult', 'DOMSource'
        ),
		$CONTEXT . '/javax/xml/transform/dom',
		true,
		''

	),

	array(
	//javax.xml.transform.sax   
		array(
			'SAXResult', 'SAXSource', 'SAXTransformerFactory', 
			'TemplatesHandler', 'TransformerHandler'
        ),
		$CONTEXT . '/javax/xml/transform/sax',
		true,
		''

	),

	array(
	//javax.xml.transform.stream   
		array(
			'StreamResult', 'StreamSource'
        ),
		$CONTEXT . '/javax/xml/transform/stream',
		true,
		''

	),

	array(
	//javax.xml.validation   
		array(
			'Schema', 'SchemaFactory', 'SchemaFactoryLoader', 
			'TypeInfoProvider', 'Validator', 'ValidatorHandler'
        ),
		$CONTEXT . '/javax/xml/validation',
		true,
		''

	),

	array(
	//javax.xml.xpath   
		array(
			'XPath', 'XPathConstants', 'XPathException', 
			'XPathExpression', 'XPathExpressionException', 'XPathFactory', 
			'XPathFactoryConfigurationException', 'XPathFunction', 'XPathFunctionException', 
			'XPathFunctionResolver', 'XPathVariableResolver'
        ),
		$CONTEXT . '/javax/xml/xpath',
		true,
		''

	),

	array(
	//org.ietf.jgss
		array(
			'ChannelBinding', 'GSSContext', 'GSSCredential', 
			'GSSException', 'GSSManager', 'GSSName', 
			'MessageProp', 'Oid'
        ),
		$CONTEXT . '/org/ietf/jgss',
		true,
		''

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
			'_IDLTypeStub', '_PolicyStub'
        ),
		$CONTEXT . '/org/omg/CORBA',
		true,
		''

	),

	array(
	//org.omg.CORBA_2_3   
		array(
			'ORB'
        ),
		$CONTEXT . '/org/omg/CORBA_2_3',
		true,
		''

	),

	array(
	//org.omg.CORBA_2_3.portable   
		array(
			'Delegate', 'InputStream', 'ObjectImpl', 
			'OutputStream'
        ),
		$CONTEXT . '/org/omg/CORBA_2_3/portable',
		true,
		''

	),

	array(
	//org.omg.CORBA.DynAnyPackage
		array(
			'Invalid', 'InvalidSeq', 'InvalidValue', 
			'TypeMismatch'
        ),
		$CONTEXT . '/org/omg/CORBA/DynAnyPackage',
		true,
		''

	),

	array(
	//org.omg.CORBA.ORBPackage
		array(
			'InconsistentTypeCode', 'InvalidName'
        ),
		$CONTEXT . '/org/omg/CORBA/ORBPackage',
		true,
		''

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
			'ValueInputStream', 'ValueOutputStream'
        ),
		$CONTEXT . '/org/omg/CORBA/portable',
		true,
		''

	),

	array(
	//org.omg.CORBA.TypeCodePackage
		array(
			'BadKind', 'Bounds'
        ),
		$CONTEXT . '/org/omg/CORBA/TypeCodePackage',
		true,
		''

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
			'_NamingContextStub'
        ),
		$CONTEXT . '/org/omg/CosNaming',
		true,
		''

	),

	array(
	//org.omg.CosNaming.NamingContextExtPackage 
		array(
			'AddressHelper', 'InvalidAddress', 'InvalidAddressHelper', 
			'InvalidAddressHolder', 'StringNameHelper', 'URLStringHelper'
        ),
		$CONTEXT . '/org/omg/CosNaming/NamingContextExtPackage',
		true,
		''

	),

	array(
	//org.omg.CosNaming.NamingContextPackage  
		array(
			'AlreadyBound', 'AlreadyBoundHelper', 'AlreadyBoundHolder', 
			'CannotProceed', 'CannotProceedHelper', 'CannotProceedHolder', 
			'InvalidName', 'InvalidNameHelper', 'InvalidNameHolder', 
			'NotEmpty', 'NotEmptyHelper', 'NotEmptyHolder', 
			'NotFound', 'NotFoundHelper', 'NotFoundHolder', 
			'NotFoundReason', 'NotFoundReasonHelper', 'NotFoundReasonHolder'
        ),
		$CONTEXT . '/org/omg/CosNaming/NamingContextPackage',
		true,
		''

	),

	array(
	//org.omg.Dynamic 
		array(
			'Parameter'
        ),
		$CONTEXT . '/org/omg/Dynamic',
		true,
		''

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
			'_DynValueStub'
        ),
		$CONTEXT . '/org/omg/DynamicAny',
		true,
		''

	),

	array(
	//org.omg.DynamicAny.DynAnyFactoryPackage 
		array(
			'InconsistentTypeCode', 'InconsistentTypeCodeHelper'
        ),
		$CONTEXT . '/org/omg/DynamicAny/DynAnyFactoryPackage',
		true,
		''

	),

	array(
	//org.omg.DynamicAny.DynAnyPackage   
		array(
			'InvalidValue', 'InvalidValueHelper', 'TypeMismatch', 
			'TypeMismatchHelper'
        ),
		$CONTEXT . '/org/omg/DynamicAny/DynAnyPackage',
		true,
		''

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
			'TaggedProfileHolder', 'TransactionService'
        ),
		$CONTEXT . '/org/omg/IOP',
		true,
		''

	),

	array(
	//org.omg.IOP.CodecFactoryPackage   
		array(
			'UnknownEncoding', 'UnknownEncodingHelper'
        ),
		$CONTEXT . '/org/omg/IOP/CodecFactoryPackage',
		true,
		''

	),

	array(
	//org.omg.IOP.CodecPackage 
		array(
			'FormatMismatch', 'FormatMismatchHelper', 'InvalidTypeForEncoding', 
			'InvalidTypeForEncodingHelper', 'TypeMismatch', 'TypeMismatchHelper'
        ),
		$CONTEXT . '/org/omg/IOP/CodecPackage',
		true,
		''

	),

	array(
	//org.omg.Messaging
		array(
			'SYNC_WITH_TRANSPORT', 'SyncScopeHelper'
        ),
		$CONTEXT . '/org/omg/Messaging',
		true,
		''

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
			'USER_EXCEPTION'
        ),
		$CONTEXT . '/org/omg/PortableInterceptor',
		true,
		''

	),

	array(
	//org.omg.PortableInterceptor.ORBInitInfoPackage   
		array(
			'DuplicateName', 'DuplicateNameHelper', 'InvalidName', 
			'InvalidNameHelper', 'ObjectIdHelper'
        ),
		$CONTEXT . '/org/omg/PortableInterceptor/ORBInitInfoPackage',
		true,
		''
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
			'ThreadPolicyValue', '_ServantActivatorStub', '_ServantLocatorStub'
        ),
		$CONTEXT . '/org/omg/PortableServer',
		true,
		''

	),

	array(
	//org.omg.PortableServer.CurrentPackage
		array(
			'NoContext', 'NoContextHelper'
        ),
		$CONTEXT . '/org/omg/PortableServer/CurrentPackage',
		true,
		''

	),

	array(
	//org.omg.PortableServer.POAManagerPackage 
		array(
			'AdapterInactive', 'AdapterInactiveHelper', 'State'
        ),
		$CONTEXT . '/org/omg/PortableServer/POAManagerPackage',
		true,
		''

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
			'WrongPolicy', 'WrongPolicyHelper'
        ),
		$CONTEXT . '/org/omg/PortableServer/POAPackage',
		true,
		''

	),

	array(
	//org.omg.PortableServer.portable   
		array(
			'Delegate'
        ),
		$CONTEXT . '/org/omg/PortableServer/portable',
		true,
		''
	),

	array(
	//org.omg.PortableServer.ServantLocatorPackage
		array(
			'CookieHolder'
        ),
		$CONTEXT . '/org/omg/PortableServer/ServantLocatorPackage',
		true,
		''
	),

	array(
	//org.omg.SendingContext   
		array(
			'RunTime', 'RunTimeOperations'
        ),
		$CONTEXT . '/org/omg/SendingContext',
		true,
		''
	),

	array(
	//org.omg.stub.java.rmi   
		array(
			'_Remote_Stub'
        ),
		$CONTEXT . '/org/omg/stub/java/rmi',
		true,
		''
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
			'UserDataHandler'
        ),
		$CONTEXT . '/org/w3c/dom',
		true,
		''
	),

	array(
	//org.w3c.dom.bootstrap   
		array(
			'DOMImplementationRegistry'
        ),
		$CONTEXT . '/org/w3c/dom/bootstrap',
		true,
		''
	),

	array(
	//org.w3c.dom.events   
		array(
			'DocumentEvent', 'Event', 'EventException', 
			'EventListener', 'EventTarget', 'MouseEvent', 
			'MutationEvent', 'UIEvent'
        ),
		$CONTEXT . '/org/w3c/dom/events',
		true,
		''
	),

	array(
	//org.w3c.dom.ls   
		array(
			'DOMImplementationLS', 'LSException', 'LSInput', 
			'LSLoadEvent', 'LSOutput', 'LSParser', 
			'LSParserFilter', 'LSProgressEvent', 'LSResourceResolver', 
			'LSSerializer', 'LSSerializerFilter'
        ),
		$CONTEXT . '/org/w3c/dom/ls',
		true,
		''
	),

	array(
	//org.xml.sax   
		array(
			'AttributeList', 'Attributes', 'ContentHandler', 
			'DTDHandler', 'DocumentHandler', 'EntityResolver', 
			'ErrorHandler', 'HandlerBase', 'InputSource', 
			'Locator', 'Parser', 'SAXException', 
			'SAXNotRecognizedException', 'SAXNotSupportedException', 'SAXParseException', 
			'XMLFilter', 'XMLReader'
        ),
		$CONTEXT . '/org/xml/sax',
		true,
		''
	),

	array(
	//org.xml.sax.ext
		array(
			'Attributes2', 'Attributes2Impl', 'DeclHandler', 
			'DefaultHandler2', 'EntityResolver2', 'LexicalHandler', 
			'Locator2', 'Locator2Impl'
        ),
		$CONTEXT . '/org/xml/sax/ext',
		true,
		''
	),


	
    array(
    	//data types
    	array(
    		'byte', 'short', 'int', 'long', 'float', 'double',
			'char', 'boolean', 'void'
		),
    	$CONTEXT . '/dtype',
        true,
        ''	
    ),
    
    array(
        //  const values
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
