<?php

/**
 * Esta constante indica el valor por defecto del modo debug
 * Desde la version 3_0_0_1 del proyecto, existen métodos públicos
 * para establecer el modo DEBUG sin necesidad de editar este fichero.
*/
define('DEBUG', false);

/*
	La siguiente constante DEBE conicidir con la versión
	del motor jasper del directorio "jars"
*/
define('_SUFIXJASPERVERSION_', '4.5.1');//4.6.0 no compatible con JRE 1.5.1
define('_JASPERVERSION_', 'jasperreports-'._SUFIXJASPERVERSION_);


/**
 * Clase para manejar desde PHP informes de Jasper reports
 *fon
 * @author   David Pascual <pascual_dav@gva.es>
 * @version  $Revision: 1.105 $
 * @package  InformeJasper
 * @category Archive
*/
class InformeJasper
{
	
	/* Atributos relativos a la conexión de BD */
	
	/**
	 * Especifica el tipo de fuente de datos:
	 * -> 'sgbd' para indicar que vendrán de una BD
	 * -> 'xml' para indicar que estarán expresados en XML
	 * -> 'none' para indocar que el reprot no accede a datos (es "estático")
	 * @access private
	 * @var string 'sgbd, 'xml, 'none'
	 */
	var $_dataSourceType;

	/**
	 * Especifica la expresión XPATH a utilizar cuando la fuente de datos es XML
	 * @access private
	 * @var string
	 */
	var $_baseXpath;

	/**
	 * Tipo de conexión SGBD: 'pgsql', 'mysql', 'oci', 'oracle-thin'...
	 * @access private
	 * @var string
	 */
	var $_dbType;
	
	/**
	 * Driver de Java en función del SGBD
	 * @access private
	 * @var string
	 */
	var $_dbTypeJavaDriver;
	
	/**
	 * Dirección IP o nombre del host donde está el SGBD
	 * @access private
	 * @var string
	 */
	var $_dbHost;
	
	/**
	 * Puerto de escucha del SGBD, sino se dice nada, asume el puerto por defecto de cada SGBD
	 * @access private
	 * @var integer
	 */
	var $_dbPort;
	
	/**
	 * Nombre de la Base de Datos
	 * @access private
	 * @var string
	 */
	var $_dbDatabase;
	
	/**
	 * Usuario de conexión a la BD
	 * @access private
	 * @var string
	 */
	var $_dbUser;
	
	/**
	 * Password de conexión
	 * @access private
	 * @var string
	 */
	var $_dbPassword;
	
	/**
	 * Indica el número de matrices asociativas incluidas como datos
	 * @access private
	 * @var integer Número de resultSets si la fuente de datos es XML
	*/
	var $_numResultSets;
	
	/**
	 * Array de matrices asociativas de datos a ocnvertir en XML
	 * @access private
	 * @var Array
	 */
	var $_resultSetCollection;
	
	/**
	 * Ruta y nombre de la plantilla jasper (extension .jasper)
	 * @access private
	 * @var string Nombre de la Plantilla Jasper
	*/
	var $_jasperFile;
	
	/**
	 * Ruta y nombre del fichero generado el uso es interno para poder
	 * lanzarlo hacia el navegador
	 * @access private
	 * @var string Nombre Fichero Generado
	*/
	var $_resultFile;
	
	/**
	 * Vector/matriz de la forma v[parametro] = (valor, tipo) almecena los
	 * parametros del report si existen
	 * @access private
	 * @var string Nombre de la Plantilla Jasper
	*/
	var $_v_parametros;
	
	/**
	 * Gestiona el XML de las llamadas
	 * @access private
	 * @var DOM Objeto DOM con el XML generado
	*/
	var $_docXML;
	
	/**
	 * Prefijo en el nombre del fichero generado
	 * @access private
	 * @var string Prefijo fichero generado
	*/
	var $_resultFileNamePrefix;
	
	/**
	 * Extensión del fichero generado es INDEPENDIENTE de su formato interno
	 * @access private
	 * @var string extensión del informe generado
	*/
	var $_resultFileExtension;
	
	/**
	 * Path del projecto, para ajustar rutas si es preciso, por defecto el directorio actual
	 * @access private
	 * @var string Ruta para ubicar las librerías del proyecto JasperCit
	*/
	var $_projectPath;
	
	/**
	 * Path al directorio donde están los ficheros relativos al report que queremos generar
	 * @access private
	 * @var string Ruta al directorio con las librerías del informe que queremos generar.
	*/
	var $_reportPath;

	/**
	 * Disposición del informe que se genera (inline|anexo) o ('inline'|'attachment')
	 * @access private
	 * @var string ('incrustado'|'anexo') o ('inline'|'attachment')
	*/
	var $_reportDisposition;
	
	/**
	 * Registra si el modo DEBUG está activo o no
	 * @access private
	 * @var boolean
	*/
	var $_debugMode;

	/**
	 * ruta para los temporales
	 */
	var $_temp;
	
	/**
	 * ruta (opcional) para invocar a java con jasper en caso de fijar opciones de seguridad
	 */
	var $_securityPath;
	
	/**
	 * ruta (opcional) para invocar a java con jasper
	 */
	var $_vFontsJar;
	
	/**
	 * Array con las características (jars) anuladas (por defecto se cargan todas).
	 */
	var $_dontSupport;
	
	/**
	 * Cadena donde se guarda la ruta al entorno JRE (JAVA_HOME)
	 */
	var $_javaHome;
	
	/**
	 * Cadena que fija un lenguaje de ejecución concreto para la JVM
	 */
	var $_langsOptions;
	
	
	
/* --- METODOS PÚBLICOS --- */

	/**
	 * InformeJasper::__construct() Constructor de la clase PHP5
	 * @access public
	*/
	function __construct ($_jasperFile='')
    {
    	$this->informeJasper($_jasperFile);
    } //Fin __construct()
    
    
    /**
	 * InformeJasper::informeJasper() Constructor de la clase
	 * @access public
	*/
	function informeJasper ($_jasperFile='')
    {
    	$this->_jasperFile = null;
    	$this->_projectPath = realpath('include/jasper/modulosPHP/');
    	$this->_reportPath = null;
    	$this->_v_parametros = array();
    	$this->_vFontsJar = array();
    	$this->_dontSupport = array();
    	    	
    	$this->_langsOptions = '';
    	$this->_javaHome = '';
		
		
    	
    	//Valor por defecto para el prefijo
    	if ($_jasperFile != '')
    		$this->_resultFileNamePrefix = basename($_jasperFile);
    	else
    		$this->_resultFileNamePrefix ='';
    	$this->_numResultSets = 0;
    	$this->_baseXpath = "/llamadaJasper/jasperDataSource/jasperXMLData/resultSet/dataRow";
    	$this->_debugMode = DEBUG;
    	//Si estamos en PHP5...
		if (version_compare(phpversion(), '5.0', '>='))
	    	$this->_temp = "/home/portera".sys_get_temp_dir();
	    else
	    	$this->_temp = '/home/portera/tmp';
    	$this->_securityPath = null;

    	/*
			Las siguientes versiones hacen referencia a las imágenes corporativas
			de la CIT. Cambiando las mismas y generando una nueva versión, podríamos
			actualizar la iconografía corporativa dentro de los listados
		*/
    	//Logo horizontal en Blanco y Negro
		$this->addParam('CIT_logo_horiz_BN', realpath('include/jasper/images/logo_horiz_BN.jpg'), 'String');
		//Logo horizontal Bicolor
		$this->addParam('CIT_logo_horiz_bicolor', realpath('include/jasper/images/logo_horiz_bicolor.jpg'), 'String');
//		//Logo centrado 1 línea
//		$this->addParam('CIT_con_centrado_1linea', realpath('include/jasper/images/con_centrado_1linea.jpg'), 'String');
//    	//Logo centrado 2 líneas
//		$this->addParam('CIT_con_centrado_2lineas', realpath('include/jasper/images/con_centrado_2lineas.jpg'), 'String');
	} //Fin informeJasper()
    
	
	 /**
	 * InformeJasper::setDebugMode() Activa o desactiva el modo de depuración
	 *
	 * Con el modo de depuración activado, no se crea el informe, pero se ofrece
	 * por pantalla información relativa al mismo. Puede ser útil en distintos
	 * momentos (valor de parámetros, fuentes de datos XML, etc...)
	 *
	 * @access public
	 * @param boolean $enable Con true o false se activa o desactiva el modo debug
	*/
	function setDebugMode ($enable)
    {
    	$this->_debugMode = $enable;
    } //Fin setDebugMode()
    
    
    
    /**
	 * InformeJasper::getDebugMode() Indica si el modo de depuración está o no activo
	 *
	 * @access public
	 * @return boolean
	*/
	function getDebugMode()
    {
    	return($this->_debugMode);
    } //Fin setDebugMode()
	
    
    /**
	 * InformeJasper::setDataSourceType() Establece el tipo de la fuente de datos
	 *
	 * Fija el tipo de fuente de datos, bien una BD relacional (sgbd), bien una fuente XML (xml)
	 * o bien ninguna, cuando se trate de reports estáticos.
	 *
	 * @access public
	 * @param string $str_dataSource Cadena que indica el origen de datos ('none'|'sgbd'|'xml')
	*/
	function setDataSourceType ($str_dataSource)
    {
    	$str_dataSource = strtolower($str_dataSource);
    	switch ($str_dataSource)
    	{
    		case 'none':
    		case 'sgbd':
    		case 'xml':
    			// La expresión XPATH: "/llamadaJasper/jasperDataSource/jasperXMLData/resultSet/dataRow"
    			$this->_dataSourceType = $str_dataSource;
    		break;
    		default:
    			//TODO: Gestión de errores
    			die('informeJasper.php: Tipo de Fuente de Datos no soportado');
    		break;
    	}//Fin switch
    }//Fin setDataSourceType()
    
    
    /**
	 * InformeJasper::setDisposition() Fija el tratamiento del informe generado por el navegador
	 *
	 * Fija la disposición del informe en el navegador. Si se elegimos anexo (opción por
	 * defecto) se mostrará el menu para abrir el informe con la aplicación asociada. Si
	 * elegimos inline se intentará inscrustar el informe en la ventana del navegador
	 * (aunque el resultado final dependerá de la configuración del navegador para el tipo
	 * de archivo asociado)
	 *
	 * @access public
	 * @param string $disposition (incrustado|anexo) o (inline|attachment)
	*/
	function setDisposition ($disposition)
    {
    	$disposition = strtolower (trim($disposition));
    	switch ($disposition)
    	{
    		case 'inline':
    		case 'incrustado':
    			$this->_reportDisposition='inline';
    		break;
    		case 'attachment':
    		case 'anexo':
    		break;
    			$this->_reportDisposition='attachment';
    		default:
    			$this->_reportDisposition='attachment';
    	}//Fin switch
    }//Fin setDataSourceType()
    
    
	
	/**
	 * InformeJasper::addDBResultSet() Añade un vector asociativo como fuente de datos del informe
	 *
	 * Recibe una matriz asociativa de datos, y genera una estructura XML que sirve como fuente
	 * de datos para un informe Jasper. Con esta opción, podemos generar informes de datos con
	 * fuentes heterogéneas obtenidas a través de matrices asociativas que el programador debe
	 * construir como quiera.
	 *
	 * @static
	 * @access public
	 * @param Array $dbResultSet	Matriz de registros (vectores asociativos)
	 * @param Array $v_options	Matriz asociativa de opciones para la conversión a XML (idResultSet, trim, sourceDataEncode)
    */
	function addDBResultSet($dbResultSet, $v_options=null)
	{
		$numFilas = count($dbResultSet);//Número de registros
		if ($numFilas == 0) return (true);//Si el vector está vacío, finalizamos
		
		$numCols = count($dbResultSet[0]);//Número de columnas
		if ($numCols == 0) return (true);//Si no hay campos, finalizamos
		
		//Incrementamos el número de ResultSet
		//TODO: Posibilidad de que exista mas de un resultset?
		
		$this->_numResultSets++;
		
		//Si hay array de opciones...
		$idResultSet = "RS_".$this->_numResultSets;
		
		//TODO: implementar las opciones
		if (is_array($v_options))
		{
			if (isset($v_options['idResultSet']))
				$idResultSet = trim($v_options['idResultSet']);
			
			if (isset($v_options['trim']))
				$trim = trim($v_options['trim']);
			
			//Si los datos vienen en latin-1 habrá que convertirlos?
			if (isset($v_options['sourceDataEncode']))
				$trim = trim($v_options['trim']);
		}//Fin opciones
		
		//Almacenamos la matriz en el interior del objeto
		$rsCollection = & $this->_resultSetCollection;
		$rsCollection[$idResultSet] = $dbResultSet;
		//Reasignamos el atributo
		$this->_resultSetCollection = & $rsCollection;
	}// Fin addDBResultSet


	/**
	 * InformeJasper::setBaseXpath() Establece (cambia) la expresión XPath asociada a los datos XML
	 *
	 * Dada una fuente de datos XML, establece la expresión XPath que utilizará jasperReports para
	 * acceder a los datos.
	 *
	 * @access public
	 * @param String $exprXpath	Expresión XPATH
    */
	function setBaseXpath($exprXpath)
	{
		$this->_baseXpath = $exprXpath;
	}// Fin addDBResultSet


    
    /**
	 * InformeJasper::setDBType() Establece el tipo SW de SGBD subyacente: pgsql, mysql, oci, thin (oracle)
	 *
	 * Una vez establecido el tipo de fuente de datos como 'sgbd', podemos conectarnos a distintos sistemas
	 * relacionales (subyade el jdbc). Actualmente están los drivers para conectarse a: postgreSQL (pgsl),
	 * oracle (oci, thin, oracle) y mysql (mysql).
	 * @access public
	 * @param string $str_phptype Cadena que indica el tipo de conexión ('pgsql', 'oci' o 'thin', 'mysql'...)
	*/
	function setDBType ($str_phptype)
    {
    	//Si se invoca este método se sobreentiende el tipo 'sgbd'
		$this->_dataSourceType ='sgbd';
    	switch (strtolower(trim($str_phptype)))
    	{
    		case 'postgres':
    		case 'pgsql':
    			$this->_dbTypeJavaDriver = 'org.postgresql.Driver';
    			//Si el puerto no está especificado, lo establecemos al valor por defecto para Postgres
    			if (trim($this->_dbPort)=='')
    				$this->_dbPort = '5432';
    			$this->_dbType = 'pgsql';
    		break;
    		//Oracle con driver OCI8. Propio del PHP
    		case 'oci8':
    		case 'oci7':
    		case 'oci':
    		case 'oracle':
    			//Si la conexión es OCI NECESITAMOS TNSNames correctamente ocnfigurado en el servidor
    			$this->_dbTypeJavaDriver = 'oracle.jdbc.driver.OracleDriver';
    			$this->_dbType = 'oci';
    		break;
    		case 'thin':
    		case 'oracle-thin':
    			$this->_dbTypeJavaDriver = 'oracle.jdbc.driver.OracleDriver';
    			//Si el puerto no está especificado, lo establecemos al valor por defecto para Oracle
    			if (trim($this->_dbPort)=='')
    				$this->_dbPort = '1521';
    			$this->_dbType = 'oracle-thin';
    		break;
    		case 'mysqli':
    		case 'mysql':
    			$this->_dbTypeJavaDriver = 'com.mysql.jdbc.Driver';
    			//Si el puerto no está especificado, lo establecemos al valor por defecto para MySQL
    			if (trim($this->_dbPort)=='')
    				$this->_dbPort = '3306';
    			$this->_dbType = 'mysql';
    		break;
    		default;
    			//TODO: Gestión de errores
    			$this->_dbType = null;
    			die('informeJasper.php: Tipo de SGBD no soportado');
    		break;
    	}
    } //Fin setDBType()

    
    /**
	 * InformeJasper::setDBHost() Fija el host (Dir IP o nombre de máquina) del SGBD
	 * @access public
	 * @param string $str_host nombre del host
	*/
	function setDBHost ($str_host)
    {
    	//Si se invoca este método se sobreentiende el tipo 'sgbd'
		$this->_dataSourceType ='sgbd';
    	$this->_dbHost = $str_host;
    } //Fin setDBHost()

    
    /**
	 * InformeJasper::setDBPort() Fija el puerto de escucha del sgbd
	 * @access public
	 * @param string $str_port Puerto de escucha del SGBD
	 *
	 * La función debe invocarse cuando el SGBD no esté ejecutándose en el puerto
	 * de escucha "estándar" que tenga definido. Si no se hace uso de la fución se
	 * entenderá que intentamos conectar en el purto habitual.
	*/
	function setDBPort ($str_port)
    {
    	//Si se invoca este método se sobreentiende el tipo 'sgbd'
		$this->_dataSourceType ='sgbd';
    	$this->_dbPort = $str_port;
    } //Fin setDBPort()
    
    
    /**
	 * InformeJasper::setDBDatabase() Fija la BD/esquema dentro del SGBD a la que nos conectamos
	 *
	 * @access public
	 * @param string $str_dbname Nombre de la BD o del Schema
	*/
	function setDBDatabase ($str_dbname)
    {
    	//Si se invoca este método se sobreentiende el tipo 'sgbd'
    	$this->_dataSourceType ='sgbd';
    	$this->_dbDatabase = $str_dbname;
    } //Fin setDBDatabase()
        
    
    /**
	 * InformeJasper::setDBUser() Fija el usuario de conexión a la BD
	 * @access public
	 * @param string $str_dbUser Usuario de BD
	*/
	function setDBUser ($str_dbUser)
    {
    	//Si se invoca este método se sobreentiende el tipo 'sgbd'
		$this->_dataSourceType ='sgbd';
    	$this->_dbUser = $str_dbUser;
    } //Fin setDBUser()
    
    
    /**
	 * InformeJasper::setDBPassword() Fija el password de conexión a la BD
	 * @access public
	 * @param string $str_dbPassword Contraseña de acceso a la BD
	*/
	function setDBPassword ($str_dbPassword)
    {
    	//Si se invoca este método se sobreentiende el tipo 'sgbd'
		$this->_dataSourceType ='sgbd';
    	$this->_dbPassword = $str_dbPassword;
    } //Fin setDBPassword()
        
    
    /**
	 * InformeJasper::importPearDSN() Importa los datos de conexión al SGBD a partir de un DSN PEAR
	 * @access public
	 * @param Array $dsn Vector asociativo con los parámetros de conexión (vease PEAR DSN)
	 *
	 * Dado que la API se invoca desde PHP, si nuestro informe debe conectarse a la BD
	 * con las mismas condiciones que utilizamos para la aplicación, podemos optar por
	 * importar los datos de conexión del informe a partir de una conexión PEAR:DB
	 * PHP siempre untiliza OCI para la invocacíon, para poder distinguir si ej Java
	 * formamos una conexión THIN o un conexión OCI, nos basamos en que esté o no esté
	 * fijado el parámetro DBDatabase
	*/
	function importPearDSN ($dsn)
    {
    	//Si se invoca este método se sobreentiende el tipo 'sgbd'
		$this->_dataSourceType ='sgbd';

		//Comprobamos que estén presentes los parámetro MINIMOS que necesitamos
		if (!isset($dsn['phptype']))
			die("informeJasper.php:: InformeJasper::importPearDSN(): tipo de DSN no establecido");
		
		if (!isset($dsn['hostspec']))
			die("informeJasper.php:: InformeJasper::importPearDSN(): Host no establecido");

		if
		(
			(!isset($dsn['username'])) ||
			(!isset($dsn['password']))
		)
		{
			//TODO: Gestíon de errores
			die("informeJasper.php:: InformeJasper::importPearDSN(): Usuario y contraseña NO establecida");
		}
		
		//Tipo de BD
		$tipoConexionPEAR = strtolower(trim($dsn['phptype']));

		
		if ($tipoConexionPEAR == 'oci8')//La conexión es contra Oracle
		{
			$vDSN_Oci = explode("(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=", $dsn['hostspec']);
			if (count($vDSN_Oci) > 1) //Si llega una cadena OCI completa desde PHP...
			{
				/* Ej cadena OCI:
					(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=maquina)(PORT=1521))(CONNECT_DATA=(SID=basededatos)))
				*/
				$vDSN_Oci = explode(')(PORT=', $vDSN_Oci[1]);
				$dsn['hostspec'] = $vDSN_Oci[0];//Máquina
				
				$vDSN_Oci = explode('))(CONNECT_DATA=(SID=', $vDSN_Oci[1]);
				$auxPort = $vDSN_Oci[0];//Puerto si existe
				if (!empty($auxPort)) $dsn['hostspec'].=':'.$auxPort;
				
				$vDSN_Oci = explode(')))', $vDSN_Oci[1]);
				$dsn['database'] = $vDSN_Oci[0];
				
				$this->setDBType('oracle-thin');
			}
			else if (empty($dsn['database'])) //Llega una conexión OCI "al uso"
			{
				/*
					Las conexiones PHP contra oracle de tipo OCI sin toda la cadena TNS
					[phptype] => oci8
    				[username] => user
					[password] => sesamo
					[hostspec] => alias.host
					[port] =>
					[database] =>
				*/
				$this->setDBType('oci');
				$this->setDBHost($dsn['hostspec']);
			}
			else //Llega una conexión oracle-thin
			{
				$this->setDBType('oracle-thin');
			}
		}
		else //Cualquier otro SGBD (PostgreSQL, MySQL...)
			$this->setDBType($tipoConexionPEAR);
				
		//Llegados a este punto...
		if (($this->_dbType != 'oci'))//Cualquier conexión COMPLETA (oracle-thin, mysql, postgres)
		{
			//Host y puerto
			$v_hostpec = explode(':', $dsn['hostspec']);
			$this->setDBHost($v_hostpec[0]);
			if (count($v_hostpec)>1) //Si se ha especificado puerto...
			{
				$this->setDBPort($v_hostpec[1]);
			}
			else if ( (array_key_exists('port', $dsn))  && (!empty($dsn['port'])))//Puede tener 'port' en lugar de venir todo en 'hostpec'
			{
				$this->setDBPort($dsn['port']);
			}
			
			//Base de datos
			$this->setDBDatabase($dsn['database']);
		}
				
		//Usuario
		$this->setDBUser($dsn['username']);
		//Password
		$this->setDBPassword($dsn['password']);
    } //Fin importPearDSN()


    /**
	 * InformeJasper::setProjectPath() Fija el path del proyecto
	 *
	 * Especifica el PATH dodne se ubica el proyecto. es útil para
	 * trabajar con rutas relativas a partir de la ruta global del proyecto
	 * @access public
	 * @param string $str_path Ruta
	*/
	function setProjectPath ($str_path)
    {
    	//DEBUG: Comprobar la barra final, etc...

    	$this->_projectPath = realpath($str_path);
    }//Fin setProjectPath()


     /**
	 * InformeJasper::setReportPath() Fija el path del report
	 * @access public
	 * @param string $str_path Ruta
	*/
	function setReportPath ($str_path)
    {
    	//DEBUG: Comprobar la barra final, etc...
    	$this->_reportPath = realpath($str_path);
    }//Fin setProjectPath()
    


    /**
	 * InformeJasper::setJasperFile() Fija el fichero Jasper que define el informe
	 *
	 * Establece el fichero del informe compilado que debemos invocar para generar
	 * un informe final
	 * @access public
	 * @param string $ficheroJasper nombre del fichero jrxml
	*/
    function setJasperFile($ficheroJasper)
    {
    	$this->_jasperFile = realpath($ficheroJasper);
    	
    	//TODO: Control de errores
    	if (!$this->_jasperFile) die ('informeJasper.php: El fichero Jasper '.$ficheroJasper.' NO existe');
    	
    	//Si no tenemos la ruta a los ficheros java necesarios asumimos que están junto con el fichero Jasper
    	$this->_reportPath = dirname($this->_jasperFile);
    	
    	//Si no tenemos un prefijo para el fichero resultado, utilizamos el del fichero jasper
    	if ($this->_resultFileNamePrefix == '')
    	{
    		$this->_resultFileNamePrefix = basename($ficheroJasper);
    	}
    } //Fin setJasperFile()
    
    
    /**
	 * InformeJasper::setResultFileName() Fija el nombre del informe generado y la extensión del mismo
	 *
	 * Si no se expecifica la extensón, se elegirá acorde con el tipo
	 * por ejemplo .doc con salida rtf, por defecto es PDF...
	 * @access public
	 * @param string $_resultFileName Nombre del fichero generado
	 * @param string $extension Extensión del informe generado se cual sea su formato interno
	*/
    function setResultFileName($prefijoFichero, $extension='')
    {
    	$this->_resultFileNamePrefix = $prefijoFichero;
    	$this->_resultFileExtension = $extension;
    } //Fin setResultFileName()
    
    
    /**
	 * InformeJasper::addParam() Fija el fichero de extensión Jasper que define el informe
	 * @access public
	 * @param string $parametro Nombre del parámetro
	 * @param mixed $valor Contneido del parámetro
	 * @param mixed $tipo Tipo/Clase del parámetro en Java (paquetes lang,sql,Date,Math)
	*/
    function addParam($parametro, $valor, $tipo)
    {
    	$tipo = strtolower(trim($tipo));
    	$tiposJava = array
    	(
    		//Clases del paquete java.lang
			'string' => 'String',
			'object' => 'Object',
			'boolean' => 'Boolean',
			'byte' => 'Byte',
			'double' => 'Double',
			'float' => 'Float',
			'integer' => 'Integer',
			'long'=>'Long',
			'short'=>'Short',
			//Clases del paquete java.util.Date
			'date'=>'Date',
			'time' => 'Time',
			'timestamp' => 'TimeStamp'
    	);
    	
    	if (isset($tiposJava[$tipo]))
    	{
    		$this->_v_parametros[$parametro] = array($valor, $tiposJava[$tipo]);
    	}
    } //Fin addParam()
   
    
    /**
	 * InformeJasper::createResultFile() Fija el informe y lo devuelve
	 * @access public
	*/
    function createResultFile($tipo='pdf')
    {
    	//TODO: control de errores
    	if ($this->_jasperFile == '') die ('informeJasper.php: Especifique un fichero jasper');
    	
    	//Si no tenemos la extensión del resultado, la ponemos acorde con el tipo
    	if ($this->_resultFileExtension == '')
    		$this->_resultFileExtension = '.'.$tipo;
		
    	//Generamos la estructura XML
    	$this->_generateXML($tipo);
		//Ejecutamos la clase java pasando como parámetros el fichero XML
		$nombreFicheroXML = tempnam($this->_temp, 'llamadaJasper_');
		unlink($nombreFicheroXML);
		$nombreFicheroXML.=".xml";

		//Creamos el fichero
		$this->_saveXMLFile($nombreFicheroXML, false, true);
				
		//Con el fichero creado, invocamos la clase java
		if ($this->_javaCall($nombreFicheroXML))
		{
			//TODO: Control de errores
			if (!file_exists($this->_resultFile))
				die('informeJasper.php: No se generó el fichero '.$tipo.':'.$this->_resultFile);
									
			//Leemos el contenido del fichero....
			$fileDescriptor = fopen($this->_resultFile, "rb");
			$contenido = '';
			while (!feof($fileDescriptor))
			{
				$contenido .= fread($fileDescriptor, 1024);
			}
			fclose($fileDescriptor);
			
			if ($this->getDebugMode()==true) //En debug sólo enseñamos el XML
			{
				print("<pre>".$this->_showXML()."</pre>");
			}
			else //No estamos en modo depuración
			{
				//Borramos el fichero resultado sin extension
				unlink(substr($this->_resultFile, 0, -1*strlen($this->_resultFileExtension)));
				//Borramos el fichero resultado
				unlink ($this->_resultFile);
				//Lanzamos el contenido del PDF hacia el navegador...
				ob_end_clean();
				ob_start();
				print($contenido);
				//Indicamos en el header que se trata de un...
				switch ($tipo)
				{
					case 'pdf':
					case 'PDF':
					case 'Pdf':
						header("Content-Type: application/pdf");
					break;
					case 'rtf':
						header("Content-Type: application/rtf");
					break;
					case 'doc':
						header("Content-Type: application/msword");
					break;
					case 'doc':
						header("Content-Type: application/msword");
					break;
					case 'odt':
					case 'ods':
					case 'odf':
					case 'csv':
						header("Content-Type: application/soffice");
					break;
				}//Fin switch
				
				
				header("Content-Disposition: ".$this->_reportDisposition."; filename=".basename($this->_resultFileNamePrefix).".".$tipo);
				header('Expires: 0');
	   			header('Pragma: cache');
	   			header('Cache-Control: private');
				ob_end_flush ();
			}//Fin if-else debug
			
		}//fin if
    } //Fin createResultFile()
        
    /**
	 * InformeJasper::setSecurityMode() fija la ubicación del binario que invoca java con jasper
	 * @access public
	*/
	function setSecurityMode($path)
	{
		if (empty($path))
			die('informeJasper.php: Error en la configuracion de la seguridad');
		$path = trim($path);
		if (substr($path,-1) != DIRECTORY_SEPARATOR)
			$path = $path.DIRECTORY_SEPARATOR;
	//	if (!file_exists($path))  //afecta el open_basedir
		//	die('informeJasper.php: Ruta inexistente para la seguridad: '.$path);
		$this->_securityPath = $path;
	}

    /**
	 * InformeJasper::setTempDir() fija la ubicación del la carpeta temporal
	 * @access public
	*/
	function setTempDir($path)
	{
		if (empty($path))
			die('informeJasper.php: Error en la configuracion de directorio temporal');
		$path = trim($path);
		if (substr($path,-1) != DIRECTORY_SEPARATOR)
			$path = $path.DIRECTORY_SEPARATOR;
		$this->_temp = $path;
	}
	
	
	/**
	 * InformeJasper::disableSupport() Deshabilita el soporte a determinadas carácterísticas
	 * @access public
	 * @param string $referenciaJar [chart-themes|mysql-connector|groovy-all|codebars]
	*/
	function disableSupport($referenciaJar)
	{
		$referenciaJar = trim(strtolower($referenciaJar));
		switch ($referenciaJar)
		{
			case 'chart':
			case 'chart-themes':
			case 'jasperreports-chart-themes':
				$this->_dontSupport[] = 'chart-themes';
			break;
			
			
			case 'mysql':
			case 'mysql-connector':
				$this->_dontSupport[] = 'mysql-connector';
			break;
			
			case 'groovy':
			case 'groovy-all':
				$this->_dontSupport[] = 'groovy-all';
			break;
			
			case 'codebar':
			case 'codebars':
			case 'barcodes':
			case 'barcode':
			case 'barbecue':
			case 'barcode4j':
				$this->_dontSupport[] = 'codebars';
			break;
			
		};
	}//disableSupport
	
	/**
	 * InformeJasper::enableSupport() Habilita el soporte a determinadas carácterísticas
	 * @access public
	 * @param string $referenciaJar [chart-themes|mysql-connector|groovy-all|codebars]
	*/
	function enableSupport($referenciaJar)
	{
		$referenciaJar = trim(strtolower($referenciaJar));
		$pos = false;
		
		switch ($referenciaJar)
		{
			case 'chart':
			case 'chart-themes':
			case 'jasperreports-chart-themes':
				$pos = array_search('chart-themes', $this->_dontSupport);
			break;
			
			case 'mysql':
			case 'mysql-connector':
				$pos = array_search('mysql-connector', $this->_dontSupport);
			break;
			
			case 'groovy':
			case 'groovy-all':
				$pos = array_search('groovy-all', $this->_dontSupport);
			break;
			
			case 'codebar':
			case 'codebars':
			case 'barcodes':
			case 'barcode':
			case 'barbecue':
			case 'barcode4j':
				$pos = array_search('codebars', $this->_dontSupport);
			break;
		}//Fin switch
		
		
		if ($pos === false) return;
		
		unset($this->_dontSupport[$pos]);
		return;
	}//enableSupport

	
	/**
	 * InformeJasper::setJavaHome() Fija un JAVA_HOME concreto
	 * @access public
	 * @param string $str_path Ruta al JRE
	*/
	function setJavaHome ($str_path)
    {
    	$this->_javaHome = realpath($str_path);
    }//Fin setJavaHome()
    
	
	/**
	 * InformeJasper::forceLangUserOptions() Invoca a la JVM con opciones fijas de lenguaje.	 *
	 * @access public
	 * @param string $userLang Lenguaje para la JVM [es, en, ...]
	 * @param string $userCountry Pais del lenguaje para la JVM [ES, UK, ...]
	 * @param string $userVariant Variante del lenguaje posible [ES, AR, ...]
	*/
	
	function forceLangUserOptions($userLang, $userCountry, $userVariant='')
	{
		$this->_langsOptions = " -Duser.language=$userLang -Duser.country=$userCountry ";
		if (!empty($userVariant))
			$this->_langsOptions .= "-Duser.variant=$userVariant ";
	}//enableSupport
	
	
	
	
/* ------------------------------------------------------------------ */
/* ------------------------ Métodos privados ------------------------ */
/* ------------------------------------------------------------------ */


	/**
	 * InformeJasper::_javaCall() Realiza la invocación JAVA que crea el report o informe final
	 *
	 * @access private
	 * @param String $nombreFicheroXML Nombre del fichero XML con los datos
	*/
	function _javaCall($nombreFicheroXML)
	{
		
		if (empty($this->_javaHome))
			//$this->_javaHome = getenv('JAVA_HOME');
		$this->_javaHome ="/System/Library/Frameworks/JavaVM.framework/HomeÒ;
		$javaHome = $this->_javaHome;

		
		//TODO: Gestión de errores
		if (empty($javaHome))
			die('informeJasper.php: Error en la configuracion PHP-JAVA: La variable JAVA_HOME no está definida');
		
	
		//Opciones de entorno Win/Unix
		$sepCPTH = ':';



	
			$java = "$javaHome/bin/java ";
	
		$jarPath = realpath($this->_projectPath."/../jars");

		
		/* ------------------------------------------------------------------------ */
		/* ----------------------  CARGA DE LIBRERÍAS / JARS ---------------------- */
		/* ------------------------------------------------------------------------ */

		$classpath = '';
		// -------------------------------
		// ------ CORE JAVA
		// -------------------------------
		$classpath.= "$javaHome/bin$sepCPTH";
		$classpath.= "$javaHome/lib$sepCPTH";
		
		
		// -----------------------------------------------
		// ------ Soporte a colecciones y utilidades Java
		// -----------------------------------------------
		$classpath.= "$javaHome/bin$sepCPTH";
		$classpath.= "$javaHome/lib$sepCPTH";
		$classpath.= "$jarPath/commons-beanutils-1.8.2.jar$sepCPTH";
		$classpath.= "$jarPath/commons-collections-3.2.1.jar$sepCPTH";
		$classpath.= "$jarPath/commons-digester-2.1.jar$sepCPTH";
		$classpath.= "$jarPath/commons-javaflow-20060411.jar$sepCPTH";
		$classpath.= "$jarPath/commons-logging-1.1.jar$sepCPTH";
		$classpath.= "$jarPath/commons-math-1.0.jar$sepCPTH";
		$classpath.= "$jarPath/dom4j-1.6.jar$sepCPTH";
		
		
		// -------------------------------
		// ------ CORE JASPER
		// -------------------------------
		$classpath.= "$jarPath/jasperreports-extensions-3.5.3.jar$sepCPTH";
		$classpath.= "$jarPath/jasperreports-fonts-4.5.0.jar$sepCPTH";
		//TODO Descomentar cuando se suba de versión
		//$classpath.= "$jarPath/jasperreports-fonts-4.6.0.jar$sepCPTH";
		//$classpath.= "$jarPath/jasperreports-javaflow-4.6.0$sepCPTH";
		$classpath.= "$jarPath/jcommon-1.0.15.jar$sepCPTH";
		$classpath.= "$jarPath/spring.jar$sepCPTH"; //Necesario a partir de la v4.0.1 de jasperreports
		$classpath.= "$jarPath/iText-2.1.7.jar$sepCPTH";
		$classpath.= "$jarPath/"._JASPERVERSION_.".jar$sepCPTH";
		
		
		// -------------------------------
		// ------ Códigos de barra
		// -------------------------------
		$classpath.= "$javaHome/bin$sepCPTH";
		$classpath.= "$javaHome/lib$sepCPTH";
		if (!in_array('codebars', $this->_dontSupport))
		{
			//Soporte a códigos de barras
			$classpath.= "$jarPath/barbecue-1.5-beta1.jar$sepCPTH";
			$classpath.= "$jarPath/barcode4j-2.0.jar$sepCPTH";
		}
		
		// -------------------------------------
		// ------ Soporte a expresiones Groovy
		// -------------------------------------
		if (!in_array('groovy-all', $this->_dontSupport))
		{
			$classpath.= "$jarPath/groovy-all-1.7.5.jar$sepCPTH";
		}
		
		// ---------------------------------------------
		// ------ Sopoerte a gráficos (barras, etc..)
		// ---------------------------------------------
		if (!in_array('chart-themes', $this->_dontSupport))
		{
			$classpath.= "$jarPath/jasperreports-chart-themes-4.5.0$sepCPTH";
			$classpath.= "$jarPath/jfreechart-1.0.12.jar$sepCPTH";
		}
		
		
		// -------------------------------
		// ------ Fuentes de datos XML
		// -------------------------------
		$classpath.= "$jarPath/xalan.jar$sepCPTH";
		
		
		// -------------------------------
		// ------ Clientes BD
		// -------------------------------
		$classpath.= "$jarPath/postgresql-8.3-603.jdbc3.jar$sepCPTH";//PostgreSQL
		$classpath.= "$jarPath/classes12.jar$sepCPTH"; //Oracle
		$classpath.= "$jarPath/ojdbc14.jar$sepCPTH"; //Oracle JDBC
		if (!in_array('mysql-connector', $this->_dontSupport))
		{
			$classpath.= "$jarPath/mysql-connector-java-5.1.6-bin.jar$sepCPTH";//MySQL
		}
		

		// -------------------------------
		// ------ Fuentes TTF/JAR
		// -------------------------------
		$this->readFontsJars($jarPath.'/fonts/');
		if (is_array($this->_vFontsJar))
		{
			$vFicheros = $this->_vFontsJar;
			foreach ($vFicheros as $fichero)
			{
				$classpath.= $jarPath.'/fonts/'.$fichero.$sepCPTH;
			}
		}//Fin fonts a cargar
		
		// -----------------------------------------------
		// ------ Report y proyecto
		// -----------------------------------------------
		$classpath.= $this->_reportPath.$sepCPTH;
		$classpath.= realpath($this->_projectPath.'/../').$sepCPTH;
		
		//Exportamos varaibles de entorno
		putenv("CLASSPATH=$classpath");//Fijamos el classpath
		
		//Si se trabaja con Oracle, según que versión es necesario que la variable NLS_LANG esté fijada
		if ($this->_dbType == 'oci8')
		{
			if (getenv('NLS_LANG')===false)
				putenv("NLS_LANG=SPANISH_SPAIN.WE8ISO8859P15");
		}
		
		
		//Inicializamos la variable de salida
		$resultadoEjecucion = array();
		
		if ($this->getDebugMode()==true)
		{
			ini_set('display_errors','1');
			error_reporting(E_ALL);
		}
		
		//Contruimos el comando
		if ($this->_securityPath)
		{
			$comando = $this->_securityPath.'jasper_exec_dir.sh ';
			$comando.=$nombreFicheroXML.' '.$this->_langsOptions;
			$comando.=" 2>&1";
		}
		else
		{
			$comando = $java;
			$comando.=" -Djava.awt.headless=true ";
			$comando.=$this->_langsOptions;
			$comando.=" InformeJasper ";
			$comando.=$nombreFicheroXML;
			$comando.=" 2>&1";
		}

		exec($comando, $resultadoEjecucion);
		
		if ($this->getDebugMode() == true)
		{
			$ret = "\n<br/>Resultado Ejecución: \n<br/>";
			foreach($resultadoEjecucion as $salida)
			{
				$salida = htmlentities($salida);
				$ret .= "$salida\n<br>";
			}
			$ret .= "-\n<br/>";
			
			print("\n<br/>CLASSPATH=".getenv('CLASSPATH')."\n<br/>");
			if (count($this->_dontSupport)>0)
			{
				print("\n<br/>Deshabilitado el soporte de:\n<br/>");
				print_r($this->_dontSupport);
				print("\n<br/>");
			}
			print("\n<br/> Comando: $comando \n<br/>");
			print ($ret."\n<br/>");
			print("\n<br/>\n<br>Fichero XML de invocación\n<br/><pre>".$this->_showXML()."</pre>\n<br/>\n<br>\n<br>");
		}
		
		//TODO: Gestion de errores
		if (!file_exists($this->_resultFile))
		{
			print("informeJasper.php: Error. No se generó el fichero resultado: $this->_resultFile \n<br/>");
			die();
		}
		
		return true;
	}//Fin _javaCall

	

    /**
     * InformeJasper::_showXML Devuelve un string que expresa el documento XML de datos
     *
     * La función devuelve el XML que se pasa a la clase java para generar el informe
     * la función es útil en tareas de depuración mientras se construye el XML
	 * Tiene dos párametros opcionales que hacen referencia al formato de salida
	 * @access private
	 * @param boolean $convertirEntidades Convertir etiquetas en entidades HTML
	 * @param boolean $darFormato Formatear salida (identación)
    */
    function _showXML($convertirEntidades=true, $darFormato=true)
	{
		//Si estamos en PHP5...
		if (version_compare(phpversion(), '5.0', '>='))
		{
			$this->_docXML->formatOutput = $darFormato;
			if ($convertirEntidades)
				return(htmlentities(utf8_decode($this->_docXML->saveXML())));
			else
				return($this->_docXML->saveXML());
		}
		else //PHP4
		{
			$docXML = &$this->_docXML;
			if ($convertirEntidades)
				return(htmlentities(utf8_decode($docXML->dump_mem($darFormato, 'UTF-8'))));
			else
				return($docXML->dump_mem($darFormato, 'UTF-8'));
		}
	} //Fin _showXML()
    
	
	/**
     * InformeJasper::_saveXMLFile Vuelca el documento XML a un fichero para que se procese por Java
     *
	 * @access private
	 * @param string $nombreFicheroXML Nombre del fichero a crear contenedor de la información XML
	 * @param boolean $darFormato Formatear salida (identación)
    */
    function _saveXMLFile($nombreFicheroXML)
	{
		//Si estamos en PHP5...
		if (version_compare(phpversion(), '5.0', '>='))
		{

			$this->_docXML->save($nombreFicheroXML);
		
		}
		else //PHP4
		{
			$docXML = &$this->_docXML;
			$docXML->dump_file($nombreFicheroXML, false, true);
			$this->_docXML->dump_file($nombreFicheroXML, false, true);
		}
		
	} //Fin _saveXMLFile()
	
	
	/**
	 * InformeJasper::_generateXML() Genera el el fichero XML
	 *
	 * Genera el fichero XML que se pasa como parámetros en la invocación
	 * de la clase Java, para ello utiliza la API de PHP4 o la API PHP5
	 * @access private
	 * @param string $tipo Tipo de informe a generar (pdf, rtf...)
	*/
	function _generateXML($tipo)
	{
		//Si estamos en PHP5...
		if (version_compare(phpversion(), '5.0', '>='))
		{
			ini_set('zend.ze1_compatibility_mode', 'off');
			$this->_generateXMLPHP5($tipo);
		}
		else //PHP4
		{
			$this->_generateXMLPHP4($tipo);
		}
	}// Fin _generateXML


    
    /////////////////////////////////////////////////////////////////////////////////
	/* --- Métodos privados PHP4 --- */
	
	
	
    
    /**
	 * InformeJasper::_generateXMLPHP4() Genera el el fichero XML con DOM XML (PHP4)
	 *
	 * Genera el fichero XML que se pasa como parámetros en la invocación
	 * de la clase Java, para ello utiliza la API de PHP4
	 * @access private
	 * @param string $tipo Tipo de informe a generar (pdf, rtf...)
	*/
    function _generateXMLPHP4($tipo)
    {
    	if (version_compare(phpversion(), '5.0', '>='))
    		die('informeJasper.php: Error de version PHP');
    		
		$_xmlError = array();
		//Usamos una plantilla pq en php4 no se pueden incluir DTDs de otra forma
		$docXML = domxml_open_file(realpath($this->_projectPath.'/llamadaJasperInDTD.xml'),
			DOMXML_LOAD_PARSING + //0
			DOMXML_LOAD_VALIDATING +
			DOMXML_LOAD_COMPLETE_ATTRS + //8
			DOMXML_LOAD_SUBSTITUTE_ENTITIES + //4
			DOMXML_LOAD_DONT_KEEP_BLANKS,  //16
			$_xmlError
		);
		$this->_docXML = & $docXML;
		$raiz = $docXML->document_element();
		//Eliminamos el nodo comentario sobre el "truco" de la plantilla
		if ($raiz->has_child_nodes());
		{
			$posiblesHijos = $raiz->child_nodes();
			foreach ($posiblesHijos as $hijo)
			{
				$raiz->remove_child($hijo);
			}
		}//fin eliminar comentarios
					
			
		//Fijamos un id para el fichero basado en el report invocado
		$raiz->set_attribute ('id',basename($this->_jasperFile));
			
		//Elemento JasperFile
		$elemento = $docXML->create_element('jasperFile');
		$elemento->set_attribute ('fileName', $this->_jasperFile);
		$raiz->append_child($elemento);
			
		//elemento JasperDataSource
		$elemento = $docXML->create_element('jasperDataSource');
		$elemento->set_attribute ('type', $this->_dataSourceType);
			
		//Si el informe accede a algún SGBD
		if ($this->_dataSourceType =='sgbd')
		{
			$subelemento = & $this->_generateXMLPHP4_sgbd();
			$elemento->append_child($subelemento);
		}
		else if ($this->_dataSourceType =='xml')
		{
			$subelemento = & $this->_generateXMLPHP4_xml();
			$elemento->append_child($subelemento);
		}
		else
		{
			//Tipo estático o 'none''
		}
		$raiz->append_child($elemento);
		
		//Elemento resultFileName (fichero de salida a crear)
		$nombreInforme =  tempnam($this->_temp, $this->_resultFileNamePrefix.'_').$this->_resultFileExtension;
		$elemento = $docXML->create_element('resultFileName');
		$elemento->set_attribute ('fileName', $nombreInforme);
		$elemento->set_attribute ('fileType', $tipo);
		$raiz->append_child($elemento);
		$this->_resultFile = $nombreInforme;
			
		//Elemento jasperParams
		$numParams = count($this->_v_parametros);
		if ($numParams>0)
		{
			//Elemento jasperDBOptions
			unset($elemento);
			$elemento = $docXML->create_element('jasperParams');
			$elemento->set_attribute ('numparams', $numParams);
			foreach ($this->_v_parametros as $clave=>$valor)
			{
				//Subelemento jParam
				$subElemento = $docXML->create_element('jParam');
				$subElemento->set_attribute ('name', $clave);
				$subElemento->set_attribute ('type', $valor[1]);
				$subElemento->append_child($docXML->create_text_node (utf8_encode($valor[0])));
				$elemento->append_child($subElemento);
			}
			$raiz->append_child($elemento);
		}
    } //Fin _generateXMLPHP4()

    
    
    /**
	 * InformeJasper::_generateXMLPHP4_sgbd() Genera el subarbol XML del acceso a datos de SGBD
	 * @access private
	*/
    function _generateXMLPHP4_sgbd()
    {
    	$docXML = &$this->_docXML;
    	
    	//Elemento jasperDBOptions
		$elemento = $docXML->create_element('jasperDBOptions');
		$elemento->set_attribute ('driver', $this->_dbTypeJavaDriver);

		$str_JDBC = '';
		switch ($this->_dbType)
		{
			case 'pgsql':
				// jdbc:postgresql://<HOST>:<PORT>/<DB>
				$str_JDBC = 'jdbc:postgresql://'.$this->_dbHost.':'.$this->_dbPort.'/'.$this->_dbDatabase;
			break;
			case 'oracle-thin':
				// jdbc:oracle:thin:@<HOST>[:<PORT>]:<DB>
				$str_JDBC = 'jdbc:oracle:thin:@'.$this->_dbHost.':'.$this->_dbPort.':'.$this->_dbDatabase;
			break;
			case 'oci':
				//jdbc:oracle:oci8:@<SID>
				$str_JDBC = 'jdbc:oracle:oci8:@'.$this->_dbHost;
			break;
			case 'mysql':
			case 'mysqli':
				// jdbc:mysql://<HOST>:<PORT>/<DB>
				$str_JDBC = 'jdbc:mysql://'.$this->_dbHost.':'.$this->_dbPort.'/'.$this->_dbDatabase;
			break;
			default:
				$str_JDBC = 'pendiente';
			break;
		}
		$elemento->set_attribute ('jdbc', $str_JDBC);
		
		//Subelemento dbType
		$subElemento = $docXML->create_element('dbType');
		$subElemento->set_attribute ('php', $this->_dbType);
		$subElemento->set_attribute ('java', $this->_dbTypeJavaDriver);
		$elemento->append_child($subElemento);
		
		//Subelemento dbHost
		$subElemento = $docXML->create_element('dbHost');
		$subElemento->append_child($docXML->create_text_node (utf8_encode($this->_dbHost)));
		$elemento->append_child($subElemento);
		//Subelemento dbPort
		$subElemento = $docXML->create_element('dbPort');
		$subElemento->append_child($docXML->create_text_node (utf8_encode($this->_dbPort)));
		$elemento->append_child($subElemento);
		//Subelemento dbDatabase
		$subElemento = $docXML->create_element('dbDatabase');
		$subElemento->append_child($docXML->create_text_node (utf8_encode($this->_dbDatabase)));
		$elemento->append_child($subElemento);
		//Subelemento dbUser
		$subElemento = $docXML->create_element('dbUser');
		$subElemento->append_child($docXML->create_text_node (utf8_encode($this->_dbUser)));
		$elemento->append_child($subElemento);
		//Subelemento dbPassword
		$subElemento = $docXML->create_element('dbPassword');
		$subElemento->append_child($docXML->create_text_node (utf8_encode($this->_dbPassword)));
		$elemento->append_child($subElemento);
		return ($elemento);
    }//FIn _generateXMLPHP4_sgbd
    
    
    
    /**
	 * InformeJasper::_generateXMLPHP4_xml() Genera el subarbol XML del acceso a datos con XML
	 *
	 * A partir de las distintas matrices asociativas que se hayan incluido en el objeto
	 * la función genera un subárbol XML con los datos.
	 * @access private
	*/
    function _generateXMLPHP4_xml()
    {
    	$docXML = &$this->_docXML;
    	//Elemento jasperXMLData
		$elemento = $docXML->create_element('jasperXMLData');
		$numRS = $this->_numResultSets;
		$v_RS = &$this->_resultSetCollection;
		foreach($v_RS as $idRS => $rsData)
		{
			$rsXML = & $this->_generateXMLPHP4_xmlResultSet($idRS, $rsData);
			$elemento->append_child($rsXML);
		}//Fin for
		return($elemento);
    }//Fin _generateXMLPHP4_xml
    
    
    /**
	 * InformeJasper::_generateXMLPHP4_xmlResultSet() Genera el subarbol XML de un resultSet
	 * @access private
	*/
    function _generateXMLPHP4_xmlResultSet($idRS, $v_datos)
    {
    	$docXML = &$this->_docXML;
    	$rsXML = $docXML->create_element('resultSet');
		$rsXML->set_attribute ('id', $idRS);
		$numRows = count($v_datos);//Nº Filas
		$numCols = count($v_datos[0]);//Nº Columnas
		$rsXML->set_attribute ('numrows', $numRows);
		$rsXML->set_attribute ('numcols', $numCols);
				
		for ($i=0; $i<$numRows; $i++)//Para cada fila
		{
			$v_fila = &$v_datos[$i];
			$rowXML = $docXML->create_element('dataRow');
			$rowXML->set_attribute ('number',$i);
			foreach($v_fila as $nomCol => $dataCol)
			{
				$colXML = $docXML->create_element('dataCol');
				$colXML->set_attribute ('name', $nomCol);
				$colXML->append_child($docXML->create_text_node(utf8_encode($dataCol)));
				$rowXML->append_child($colXML);
			}//Fin for j
			$rsXML->append_child($rowXML);
		}//Fin for i
		return($rsXML);
    }//Fin _generateXMLPHP4_xmlResultSet
     
    
    /////////////////////////////////////////////////////////////////////////////////
    /* -------------------------- Métodos privados PHP5 -------------------------- */
    /////////////////////////////////////////////////////////////////////////////////
    
    
    /**
	 * InformeJasper::_generateXMLPHP5() Genera el el fichero XML con DOM XML (PHP4)
	 *
	 * Genera el fichero XML que se pasa como parámetros en la invocación
	 * de la clase Java, para ello utiliza la API de PHP4
	 * @access private
	 * @param string $tipo Tipo de informe a generar (pdf, rtf...)
	*/
    function _generateXMLPHP5($tipo)
    {
    	$_xmlError = array();
		$docXML = new DOMDocument();
		$docXML->validateOnParse = true;
		$docXML->substituteEntities=true;
		$docXML->load(realpath($this->_projectPath.'/llamadaJasperInDTD.xml'));
		$raiz = $docXML->documentElement;
		$this->_docXML = $docXML;

		//Eliminamos el nodo comentario sobre el "truco" de la plantilla
		if ($raiz->hasChildNodes());
		{
			$posiblesHijos = $raiz->childNodes;
			foreach ($posiblesHijos as $hijo)
			{
				$raiz->removeChild($hijo);
			}
		}//fin eliminar comentarios
					
			
		//Fijamos un id para el fichero basado en el report invocado
		$raiz->setAttribute ('id',basename($this->_jasperFile));
			
		//Elemento JasperFile
		$elemento = $docXML->createElement('jasperFile');
		$elemento->setAttribute ('fileName', $this->_jasperFile);
		$raiz->appendChild($elemento);
			
		//elemento JasperDataSource
		$elemento = $docXML->createElement('jasperDataSource');
		$elemento->setAttribute ('type', $this->_dataSourceType);
			
		//Si el informe accede a algún SGBD
		if ($this->_dataSourceType =='sgbd')
		{
			$subelemento = & $this->_generateXMLPHP5_sgbd();
			$elemento->appendChild($subelemento);
		}
		else if ($this->_dataSourceType =='xml')
		{
			$subelemento = & $this->_generateXMLPHP5_xml();
			$elemento->appendChild($subelemento);
		}
		
		$raiz->appendChild($elemento);

		//Elemento resultFileName (fichero de salida a crear) El FICHERO PDF
		$nombreInforme =  tempnam($this->_temp, $this->_resultFileNamePrefix.'_').$this->_resultFileExtension;
		$elemento = $docXML->createElement('resultFileName');
		$elemento->setAttribute ('fileName', $nombreInforme);
		$elemento->setAttribute ('fileType', $tipo);
		$raiz->appendChild($elemento);
		$this->_resultFile = $nombreInforme;
		
		//Elemento jasperParams
		$numParams = count($this->_v_parametros);
		if ($numParams>0)
		{
			//Elemento jasperDBOptions
			unset($elemento);
			$elemento = $docXML->createElement('jasperParams');
			$elemento->setAttribute ('numparams', $numParams);
			foreach ($this->_v_parametros as $clave=>$valor)
			{
				//Subelemento jParam
				$subElemento = $docXML->createElement('jParam');
				$subElemento->setAttribute ('name', $clave);
				$subElemento->setAttribute ('type', $valor[1]);
				$subElemento->appendChild($docXML->CreateTextNode (utf8_encode($valor[0])));
				$elemento->appendChild($subElemento);
			}
			$raiz->appendChild($elemento);
		}
    } //Fin _generateXMLPHP5()

    
    
    /**
	 * InformeJasper::_generateXMLPHP4_sgbd() Genera el subarbol XML del acceso a datos de SGBD
	 * @access private
	*/
    function _generateXMLPHP5_sgbd()
    {
    	$docXML = $this->_docXML;
    	
    	//Elemento jasperDBOptions
		$elemento = $docXML->createElement('jasperDBOptions');
		$elemento->setAttribute ('driver', $this->_dbTypeJavaDriver);

		$str_JDBC = '';
    	switch ($this->_dbType)
		{
			case 'pgsql':
				// jdbc:postgresql://<HOST>:<PORT>/<DB>
				$str_JDBC = 'jdbc:postgresql://'.$this->_dbHost.':'.$this->_dbPort.'/'.$this->_dbDatabase;
			break;
			case 'oracle-thin':
				// jdbc:oracle:thin:@<HOST>:<PORT>:<SID>
				$str_JDBC = 'jdbc:oracle:thin:@'.$this->_dbHost.':'.$this->_dbPort.':'.$this->_dbDatabase;
			break;
			case 'oci':
				//jdbc:oracle:oci8:@<SID>
				$str_JDBC = 'jdbc:oracle:oci8:@'.$this->_dbHost;
			break;
			case 'mysql':
				// jdbc:mysql://<HOST>:<PORT>/<DB>
				//$str_JDBC = 'jdbc:mysql://'.$this->_dbHost.':'.$this->_dbPort.'/'.$this->_dbDatabase;
				$str_JDBC = 'jdbc:mysql://192.186.199.161:'.$this->_dbPort.'/'.$this->_dbDatabase;
			break;
			default:
				$str_JDBC = 'pendiente';
			break;
		}
		$elemento->setAttribute ('jdbc', $str_JDBC);
		
		//Subelemento dbType
		$subElemento = $docXML->createElement('dbType');
		$subElemento->setAttribute ('php', $this->_dbType);
		$subElemento->setAttribute ('java', $this->_dbTypeJavaDriver);
		$elemento->appendChild($subElemento);
		
		//Subelemento dbHost
		$subElemento = $docXML->createElement('dbHost');
		//$subElemento->appendChild($docXML->CreateTextNode (utf8_encode($this->_dbHost)));
		$subElemento->appendChild($docXML->CreateTextNode (utf8_encode("192.186.199.161")));
		$elemento->appendChild($subElemento);
		//Subelemento dbPort
		$subElemento = $docXML->createElement('dbPort');
		$subElemento->appendChild($docXML->CreateTextNode (utf8_encode($this->_dbPort)));
		$elemento->appendChild($subElemento);
		//Subelemento dbDatabase
		$subElemento = $docXML->createElement('dbDatabase');
		$subElemento->appendChild($docXML->CreateTextNode (utf8_encode($this->_dbDatabase)));
		$elemento->appendChild($subElemento);
		//Subelemento dbUser
		$subElemento = $docXML->createElement('dbUser');
		$subElemento->appendChild($docXML->CreateTextNode (utf8_encode($this->_dbUser)));
		$elemento->appendChild($subElemento);
		//Subelemento dbPassword
		$subElemento = $docXML->createElement('dbPassword');
		$subElemento->appendChild($docXML->CreateTextNode (utf8_encode($this->_dbPassword)));
		$elemento->appendChild($subElemento);
		return ($elemento);
    }//FIn _generateXMLPHP5_sgbd
    
    
    
    /**
	 * InformeJasper::_generateXMLPHP5_xml() Genera el subarbol XML del acceso a datos con XML
	 *
	 * A partir de las distintas matrices asociativas que se hayan incluido en el objeto
	 * la función genera un subárbol XML con los datos.
	 * @access private
	*/
    function _generateXMLPHP5_xml()
    {
    	$docXML = &$this->_docXML;
    	//Elemento jasperXMLData
		$elemento = $docXML->createElement('jasperXMLData');
		$elemento->setAttribute('baseXpath',$this->_baseXpath);
		$numRS = $this->_numResultSets;
		$v_RS = &$this->_resultSetCollection;
		foreach($v_RS as $idRS => $rsData)
		{
			$rsXML = & $this->_generateXMLPHP5_xmlResultSet($idRS, $rsData);
			$elemento->appendChild($rsXML);
		}//Fin for
		return($elemento);
    }//Fin _generateXMLPHP5_xml
    
    
    /**
	 * InformeJasper::_generateXMLPHP5_xmlResultSet() Genera el subarbol XML de un resultSet
	 * @access private
	*/
    function _generateXMLPHP5_xmlResultSet($idRS, $v_datos)
    {
    	$docXML = $this->_docXML;
    	$rsXML = $docXML->createElement('resultSet');
		$rsXML->setAttribute ('id', $idRS);
		$numRows = count($v_datos);//Nº Filas
		$numCols = count($v_datos[0]);//Nº Columnas
		$rsXML->setAttribute ('numrows', $numRows);
		$rsXML->setAttribute ('numcols', $numCols);
				
		for ($i=0; $i<$numRows; $i++)//Para cada fila
		{
			$v_fila = &$v_datos[$i];
			$rowXML = $docXML->createElement('dataRow');
			$rowXML->setAttribute ('number',$i);
			foreach($v_fila as $nomCol => $dataCol)
			{
				$colXML = $docXML->createElement('dataCol');
				$colXML->setAttribute ('name', $nomCol);
				$colXML->appendChild($docXML->CreateTextNode(utf8_encode($dataCol)));
				$rowXML->appendChild($colXML);
			}//Fin for j
			$rsXML->appendChild($rowXML);
		}//Fin for i
		return($rsXML);
    }//Fin _generateXMLPHP5_xmlResultSet


    /**
	 * InformeJasper::readFontsJars() Carga en todas las fuentes del directorio indicado
	 * @access private
	 * @param String $path Ruta ABSOLUTAS a los ficheros JAR
	*/
	function readFontsJars($path)
	{
		$this->_vFontsJar = array();
		if (!is_dir($path))
		{
			$this->_vFontsJar = null;
			return false;
		}
		$directorio = opendir($path);
		$i = 0;
		while ($archivo = readdir($directorio))
		{
			$ext = substr($archivo, -3);
			if (!is_dir($archivo) && ($ext=='jar'))
				$this->_vFontsJar[] = $archivo;
		}
		return ;
	}//Fin readFontsJars
    

}//Fin InformeJasper

?>
