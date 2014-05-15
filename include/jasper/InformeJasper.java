 /*
 * Created on 30-oct-2006
 *
 * TODO To change the template for this generated file go to
 * Window - Preferences - Java - Code Style - Code Templates
 */

/**
 * @author fjmaestre
 *
 * TODO To change the template for this generated type comment go to
 * Window - Preferences - Java - Code Style - Code Templates
 */

import java.sql.Connection;
import java.sql.DriverManager;
import java.text.ParsePosition;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.HashMap;
import org.w3c.dom.*;
import javax.xml.parsers.*;
import java.io.File;
import java.io.PrintWriter;
import java.io.StringWriter;
import java.lang.reflect.Constructor;
import java.lang.reflect.InvocationTargetException;

//import net.sf.jasperreports.engine.JasperCompileManager;
import net.sf.jasperreports.engine.JasperExportManager;
import net.sf.jasperreports.engine.JasperFillManager;
import net.sf.jasperreports.engine.JasperPrint;
import net.sf.jasperreports.engine.JasperReport;
import net.sf.jasperreports.engine.JRException;
import net.sf.jasperreports.engine.data.JRXmlDataSource;
import net.sf.jasperreports.engine.export.JRRtfExporter;

import net.sf.jasperreports.engine.export.JRCsvExporter;

import net.sf.jasperreports.engine.export.oasis.JROdtExporter;
import net.sf.jasperreports.engine.JRExporterParameter;

public class InformeJasper {
	private boolean mbDriverOk = false;
	private boolean mbConexionOk = false;
	private boolean mbFuenteXMLOk=false;
	//private boolean mbNombreInformeOk = false;
	//private boolean mbHayParams = false;
	private String mStrInforme;
	private String mStrResultFile;
	private String mstrResultFileType = new String("pdf");
	private boolean mbParamsOk = false;
	private HashMap<String,Object> mParameters;
	private JasperReport moInforme;
	private String mstrDirServidorBD;
	private String mstrNombreBD;
	private String mstrUsername;
	private String mstrPassword;
	private String mStrPuertoServidorBD;
	private String mstrClaseDriverDefecto;
	private String mstrClaseDriverActual;
	private String mstrDriverActual;
	private String mstrCadenaDriverTotal;
	private Connection moConex;
	private JasperPrint moPrint;
	//private boolean mbFicheroEntradaPreCompilado = false;
	private String mstrCadenaJDBC;
	private StringWriter miStrW;
	private PrintWriter miPrtW;
	private String mstrFichFuenteXML = new String("");
	private JRXmlDataSource moFteXml = null;
	private String mstrSelectXPathFuenteXML = new String("");
	
	/**
	 * 
	 */
	public InformeJasper() {
		super();
		mstrClaseDriverDefecto = "org.postgresql.Driver";
		mstrClaseDriverActual = mstrClaseDriverDefecto;
		miStrW = new StringWriter();
		miPrtW = new PrintWriter(miStrW);
	}
	
	public int setDriverBaseDeDatos(String claseDriverBD) {
		//	String driverBD) {
		mstrClaseDriverActual=claseDriverBD;
		//mstrDriverActual=driverBD;
		try{
        	Class.forName(mstrClaseDriverActual).newInstance();
        	mbDriverOk = true;
        } catch(Exception e)  {
        	mbDriverOk = false;
			e.printStackTrace(miPrtW);
	    }
        if (mbDriverOk) return 0;
        	else return -1;
	}
	
	public boolean getDriverBDDisponible() {
		return mbDriverOk;
	}
	
	// Si se utiliza el método setDB ya no se utilizará el método setLocalizacionBD
	public void setDB(String CadenaJDBC) 
	{
		//	La cadena JDBC debe tener el siguiente aspecto:
		// "jdbc:postgresql://host:port/db"
		mstrCadenaJDBC=CadenaJDBC;
	}
	
	public String getDB() 
	{
		return mstrCadenaJDBC;
	}
	
	public void connectFuenteXML() {
		File lofile = null;
		if (mstrFichFuenteXML.length()>0) {
			try {
				lofile = new File(mstrFichFuenteXML);
				if (mstrSelectXPathFuenteXML.length()>0) {
					moFteXml = new JRXmlDataSource(lofile,mstrSelectXPathFuenteXML);
				} else {
					moFteXml = new JRXmlDataSource(lofile);
				}
				mbFuenteXMLOk = true;
			} catch(JRException e1) {
				e1.printStackTrace(miPrtW);
				mbFuenteXMLOk = false;
			}
        }
	}
	
	public void setSelectXPathFuenteXML(String cadenaXPath) {
		//	La cadena XPath debe tener el siguiente aspecto: "/llamadaJasper/jasperDataSource/jasperXMLData/resultSet/dataRow/dataCol"
		mstrSelectXPathFuenteXML=cadenaXPath;
	}
	
	public String getSelectXPathFuenteXML() {
		return mstrSelectXPathFuenteXML;
	}
	
//	 Si se utiliza el método setLocalizacionBD ya no se utilizará el método setDB
	public void setLocalizacionBD(String sgbd, String servidorBD,int PuertoServidorBD,String nombreBD) {
		Integer IntAux;
		String lsprefijoJdbc="";
		
		// La cadena JDBC debe tener el siguiente aspecto:
		// "jdbc:postgresql://gardel.coput.gva.es:5432/marte"
		//	Connstruimos la parte inicial
		// 	"jdbc:postgresql://
		
		if (sgbd.equals("postgres")) {
			lsprefijoJdbc = "jdbc:postgresql://";	
		} else {
			if (sgbd.equals("oracle")) {
				lsprefijoJdbc = "jdbc:oracle:thin@";
			} else {
				if (sgbd.equals("mysql")) {
					lsprefijoJdbc ="jdbc:mysql://";
				}
			}
		}
		
		// Localizacion del servidor de la BD
		//gardel.coput.gva.es
		mstrDirServidorBD = servidorBD;
		
		// Puerto del Servidor
		// en el ejemplo: 5432
		IntAux = new Integer(PuertoServidorBD);
		mStrPuertoServidorBD = IntAux.toString();
		
		// Nombre de la BD
		// en el ejemplo: marte
		mstrNombreBD = nombreBD;
		
		// Resultado Final
		mstrCadenaJDBC = lsprefijoJdbc + mstrDirServidorBD + ":" + mStrPuertoServidorBD + "/" + mstrNombreBD;;
		
	}
	
	public boolean getDBDisponible() {
		boolean lbRellenada;
		
		lbRellenada = (mstrCadenaJDBC.length() == 0);
		
		return lbRellenada;
	}
	
	public void setUsuarioBaseDeDatos(String usuario,String clave) {
		mstrUsername = usuario;
		mstrPassword = clave;
	}

	public void connectDB() {
		// Si no nos han pasado una clase Driver de Java
		// pero nos han dado la cadena de conexion
		// suponemos que se utiliza la clase Driver por defecto
		if (this.getDBDisponible() && (!this.getDriverBDDisponible()) ) {
			this.setDriverBaseDeDatos(mstrClaseDriverActual);
		}
        if (!this.getDriverBDDisponible()) return;
		try {
			//moConex = DriverManager.getConnection("jdbc:postgresql://gardel.coput.gva.es:5432/marte","ddm_ae","ddmae");
			moConex = DriverManager.getConnection(mstrCadenaJDBC,mstrUsername,mstrPassword);
			mbConexionOk = true;
		} catch(Exception e2) {
			mbConexionOk = false;
			e2.printStackTrace(miPrtW);
		}
	}
	
	public boolean getConexionDBDisponible() {
		
		return mbConexionOk;
	}
	
	public boolean getFuenteXMLDisponible() {
		
		return mbFuenteXMLOk;
		
	}
	
	// Este método se debe rellenar con el nombre del fichero .jasper que
	// se desea rellenar y presentar al usuario
	public void setJasperFile(String jasperFileName) {
		mStrInforme = jasperFileName;
	}
	
	public String getJasperFile() {
		return mStrInforme;
	}
	
	public String getFicheroFuenteXML() {
		return mstrFichFuenteXML;
	}
	
	public void setFicheroFuenteXML(String fichFuenteXML) {
		mstrFichFuenteXML = fichFuenteXML;
	}
	
	private void iniciaParams() {
		mParameters = null;
		mParameters = new HashMap<String,Object>();
		mbParamsOk = true;
	}
	
	// Devuelve el objeto al estado inicial para volverlo a reutilizar
	public void reiniciaConfig() {
		this.iniciaParams();
		moPrint = null;
		moConex = null;
		mbDriverOk = false;
		mbConexionOk = false;
		mstrClaseDriverActual=mstrClaseDriverDefecto;
		mstrCadenaJDBC = "";
		mStrInforme = "";
		mstrSelectXPathFuenteXML = "";
	}
	
	//Si se utiliza el método setParams ya no se utilizará el método setParam
	//El método setParamas se ejecuta una única vez y se le pasa como
	// parámetro toda la matriz asociativa con todos los parametros
	public void setParams(HashMap<String, Object> params) {
		mParameters=params;
	}
	
	//Si se utiliza el método setParam ya no se utilizará el método setParams
	//El método setParama se ejecuta una vez por cada parámetro que se pase
	public void setParam(String paramName, Object paramValue) {
		if (! mbParamsOk) {
			this.iniciaParams();
			if (! mbParamsOk) return;
		}
		mParameters.put(paramName,paramValue);
	}
	
	
	public void setResultFileType(String resultFileType) {
		mstrResultFileType = resultFileType;
	}
	
	public String getResultFileType(String resultFileType) {
		return mstrResultFileType;
	}
	// Se le pasa el nombre del fichero PDF al que se desea
	// exportar el resultado del informer
	public int createResultFile(String resultFile){
		JRCsvExporter lobjExportCsv;
		JROdtExporter lobjExportOdt;
		JRRtfExporter lobjExportRtf;
		
		mStrResultFile = resultFile;
		int liResult=0;
		try { 
			if (!this.getConexionDBDisponible()) {
				if (this.getFuenteXMLDisponible()) {
					moPrint = JasperFillManager.fillReport(mStrInforme,mParameters,moFteXml);
				} else {
					moPrint = JasperFillManager.fillReport(mStrInforme,mParameters);
				}
			} else {
					moPrint = JasperFillManager.fillReport(mStrInforme,mParameters,moConex);
   			}
			
		} catch(JRException e1) {
			e1.printStackTrace(miPrtW);
			liResult = -1;
			//lresult = e1.getStackTrace().toString();
		}
		
		if (liResult==0) {
			
			if (mstrResultFileType.equals("csv") || mstrResultFileType.equals("txt")) {
				// OPCION DE GENERAR FICHERO CSV
				lobjExportCsv = new JRCsvExporter();
				lobjExportCsv.setParameter(JRExporterParameter.JASPER_PRINT,moPrint);
				lobjExportCsv.setParameter(JRExporterParameter.OUTPUT_FILE_NAME,mStrResultFile);
				try {
					lobjExportCsv.exportReport();
				} catch (JRException e3) {
					// TODO Auto-generated catch block
					e3.printStackTrace(miPrtW);
				}
			}else{
			
				if (mstrResultFileType.equals("odf") || mstrResultFileType.equals("odt")) {
					// OPCION DE GENERAR FICHERO OPEN OFFICE
					lobjExportOdt = new JROdtExporter();
					lobjExportOdt.setParameter(JRExporterParameter.JASPER_PRINT,moPrint);
					lobjExportOdt.setParameter(JRExporterParameter.OUTPUT_FILE_NAME,mStrResultFile);
					try {
						lobjExportOdt.exportReport();
					} catch (JRException e3) {
						// TODO Auto-generated catch block
						e3.printStackTrace(miPrtW);
					}
				} else {
					// OPCION DE GENERAR FICHERO RTF
					if (mstrResultFileType.equals("rtf")) {
						lobjExportRtf = new JRRtfExporter();
						lobjExportRtf.setParameter(JRExporterParameter.JASPER_PRINT,moPrint);
						lobjExportRtf.setParameter(JRExporterParameter.OUTPUT_FILE_NAME,mStrResultFile);
						try {
							lobjExportRtf.exportReport();
						} catch (JRException e3) {
							// TODO Auto-generated catch block
							e3.printStackTrace(miPrtW);
						}
					} else {
							// OPCION POR DEFECTO: GENERAR FICHEROS PDF, ETC.
							try { 
								JasperExportManager.exportReportToPdfFile(moPrint,mStrResultFile);
							} catch(JRException e2) {
								//lresult = e2.getStackTrace().toString();
								e2.printStackTrace(miPrtW);
							}
						
					}
				}
			}
			
		}
		if (liResult==0) return 0;
		else return -1;
	}
	
	public static void main(String[] args) {
		InformeJasper loJasp;
		int liResult;
		String lsErrores="";
		
		loJasp = new InformeJasper();
		
		if (args.length>0) {
			liResult = loJasp.cargaFichDatosEntrada(args[0]);
		} else 
		{
			liResult = loJasp.cargaFichDatosEntrada("./ejemplos/InformeBDParams/llamadaJasper001.xml");
		}
		if (liResult!=0) {
			lsErrores = loJasp.getMensajesError();
			System.out.println(lsErrores);
		}
	}
	
	public String getMensajesError() {
		return miStrW.getBuffer().toString();
	}
	
	public void ReiniciaErrores() {
		miPrtW.flush();
	}
	
	// método que interpreta un fichero xml
	// con toda la información para lanzar un listado
	protected int cargaFichDatosEntrada(String NombreFichero) {
		Document doc = null;
		File lofile = null;
		File lofile2 = null;
		File lofile3 = null;
		DocumentBuilder docBuilder = null;
		boolean lbFileOk;
		boolean lbDOMOk;
		Element loElto;
		NodeList loListaNodos;
		NodeList loListaSubNodos;
		NodeList loListaSubNodos2;
		NodeList loListaRaiz;
		NodeList loListaRaiz2;
		NamedNodeMap loNNMap;
		NamedNodeMap loNNMapRaiz;
		Node loNodoRaiz = null;
		Node loNodo;
		Node loNodo2;
		Node loSubNodo;
		Node loNodoAux;
		Node loNodoAux2;
		Element loElement;
		String lsjdbcString = "";
		String lsjasperFile = "";
		String lsNameReportParams = "";
		String lsValueReportParams = "";
		String lsTypeReportParam = "";
		String lsresultFileName = "";
		String lsresultFileNameTemp = "";
		String lsresultFileType = "";
		String lsCadenaValueParam;
		String lsSeparador = "";
		String lsNombreClaseCompleta;
		String lsNombreTag = "";
		Object loParam = null;
		Class loClase;
		Object loObjRes;
		Constructor loConst;
		int loCantEltos;
		int loCont;
		int loCont1;
		int loCantEltos1;
		int loCantEltos2;
		int loCont2;
		
		HashMap<String, Object> lmisParams;
		String lsHost = "";
		String lsPort = "";
		String lsDatabase = "";
		String lsUser = "";
		String lsPassword = "";
		String lsClaseDriver = "";
		String lsCadenaDriverTotal = "";  
		String lsSgbd = "";
		String lsXPathFuenteXML = "";
		boolean lbUsaConex = false;
		int liResultAux=0;
		
		
		// PROCESAMIENTO DEL FICHERO XML CON LAS INSTRUCCIONES
		// ===================================================
		lofile = new File(NombreFichero);
		if (lofile.canRead()) {
			lbFileOk = true;
		} else {
			lbFileOk = false;
		}
		if (!lbFileOk) return -1;
		DocumentBuilderFactory docBuilderFactory = DocumentBuilderFactory.newInstance();
		try {
			docBuilder = docBuilderFactory.newDocumentBuilder();
			lbDOMOk = true;
		} catch (ParserConfigurationException spe) {
			lbDOMOk = false;
			spe.printStackTrace(miPrtW);
		}
		if (!lbDOMOk) return -1;
		try {
			doc = docBuilder.parse(lofile);
		} catch (Exception e) {
			lbDOMOk = false;
			e.printStackTrace(miPrtW);
		}
		if (!lbDOMOk) return -1;
		//  doc.getElementsByTagName("");
		/*
		loListaNodos = doc.getElementsByTagName("jasperDBOptions");
		if (loListaNodos.getLength()>0 ) {
			if (loListaNodos.item(0).hasAttributes()) {
				loNNMap = loListaNodos.item(0).getAttributes();
				loNodo = loNNMap.getNamedItem("value");
				lsjdbcString = loNodo.getNodeValue();
			}
		}
		*/
		
		// OBTENEMOS EL FICHERO JASPER
		// ===========================
		loListaNodos = doc.getElementsByTagName("jasperFile");
		if (!(loListaNodos.getLength()>0)) return -1;
		//Opcion para cuando los valores se coloquen anidados dentro de los tags 
		//lsjasperFile = loListaNodos.item(0).getNodeValue(); 
		//Opcion para cuando el valor se coloque como atributo 
		if (! loListaNodos.item(0).hasAttributes()) return -1;
		loNNMap = loListaNodos.item(0).getAttributes();
		loNodo = loNNMap.getNamedItem("fileName");
		if ( loNodo != null ) lsjasperFile = loNodo.getNodeValue();
		
		

		// OBTENEMOS EL NOMBRE DEL FICHERO A GENERAR
		// =========================================
		loListaNodos = doc.getElementsByTagName("resultFileName");
		if (!(loListaNodos.getLength()>0)) return -1;
		if (!loListaNodos.item(0).hasAttributes()) return -1;
		loNNMap = loListaNodos.item(0).getAttributes();
		loNodo = loNNMap.getNamedItem("fileName");
		if ( loNodo != null ) lsresultFileName = loNodo.getNodeValue();
		//mStrResultFile = lsresultFileName;
		loNodo = loNNMap.getNamedItem("fileType");
		if ( loNodo != null ) lsresultFileType = loNodo.getNodeValue();
		
		// OBTENEMOS LOS PARAMS DEL FICHERO JASPER
		// =======================================
		loListaNodos = doc.getElementsByTagName("jParam");
		loCantEltos = loListaNodos.getLength();
		lmisParams = new HashMap<String, Object>();

		for (loCont=0;loCont<loCantEltos;loCont++) {
			loNodo = loListaNodos.item(loCont);
			if (! loNodo.hasChildNodes()) continue;
			   lsValueReportParams = loNodo.getChildNodes().item(0).getNodeValue().trim();
			 		
			if (! loNodo.hasAttributes()) continue;
			loNNMap = loNodo.getAttributes();
			loNodo2 = loNNMap.getNamedItem("name");
			lsNameReportParams = loNodo2.getNodeValue();
			loNodo2 = loNNMap.getNamedItem("type");
			if ( loNodo2 != null ) {
				lsTypeReportParam = loNodo2.getNodeValue();
				lsTypeReportParam = lsTypeReportParam.trim();
			}
			
			if (lsTypeReportParam.trim().toLowerCase().equals("date")) {
				//	Parámetros de tipo Date
				//  =======================
				//lsNombreClaseCompleta = "java.util.Date";
				SimpleDateFormat formatter;
				//formatter = new SimpleDateFormat("dd/MM/yy",currentLocale);
				formatter = new SimpleDateFormat("dd/MM/yy");
				String miFechaCadena = lsValueReportParams;
				Date miFechaDate;
				//output = formatter.format(miFechaCadena);
				ParsePosition pp = new ParsePosition(0);
				miFechaDate = formatter.parse(miFechaCadena,pp);
				
				lmisParams.put(lsNameReportParams, miFechaDate);
				
			} else {
				if (lsTypeReportParam.trim().toLowerCase().startsWith("time")) {
					lsNombreClaseCompleta = "java.sql." + lsTypeReportParam;
				} else {
					lsNombreClaseCompleta = "java.lang." + lsTypeReportParam;
					
				}
		        // Creación de los tipos de parámetros más habituales
				// ==================================================
				// Creacion en tiempo de ejecucion
				// de una instancia inicializada

				try {
//					 Obtiene la referencia al metodo constructor
					// que permita crear una instancia
					// pasandole una cadena String  ( que contendra el valor 
					// que debe ser susceptible de ser convertido al tipo que corresponda )
					// Carga la clase
					loClase = Class.forName(lsNombreClaseCompleta);
					try {
						// Los tipos básicos como
						// java.lang.Int
						// java.lang.Long
						// java.lang.Double
						// java.lang.Boolean
						// java.lang.String
						// pueden ser creados e incializados recibiendo
						// un parámetro como tipo String
						Class[] listaparams = {String.class};
						Object[] loValores = {lsValueReportParams};
						loConst=loClase.getConstructor(listaparams);
							try {
								// CREA EL OBJETO PARAMETRO PARA JASPER
								// Crea la instancia de la clase 
								// incializandola con un valor
								loObjRes = loConst.newInstance(loValores);
								//System.out.println(loObjRes.toString());
								// INSERTA EL PARAMETRO JASPER EN EL HASHMAP 
								// QUE SE ENTREGARA A JASPER
								lmisParams.put(lsNameReportParams, loObjRes);
							} catch (IllegalArgumentException e2) {
								// TODO Auto-generated catch block
								e2.printStackTrace(miPrtW);
							} catch (InstantiationException e2) {
								// TODO Auto-generated catch block
								e2.printStackTrace(miPrtW);
							} catch (IllegalAccessException e2) {
								// TODO Auto-generated catch block
								e2.printStackTrace(miPrtW);
							} catch (InvocationTargetException e2) {
								// TODO Auto-generated catch block
								e2.printStackTrace(miPrtW);
							}	
						} catch (SecurityException e) {
							// TODO Auto-generated catch block
							e.printStackTrace(miPrtW);
						} catch (NoSuchMethodException e) {
							// TODO Auto-generated catch block
							e.printStackTrace(miPrtW);
						}
						
				} catch (ClassNotFoundException e1) {
					e1.printStackTrace(miPrtW);
				}
			}
		}
		
		// OBTENEMOS LOS DATOS DE LA CONEXION A BD
		// =======================================
		// jasperDataSource type="sgbd/xml/none"
		
		// Leer el param 
		// <jasperDataSource type="sgbd" >
		// para comprobar que se utiliza una conexion
		
		loListaRaiz = doc.getElementsByTagName("jasperDataSource");
		loNodoRaiz = loListaRaiz.item(0);
		if (loNodoRaiz.hasAttributes()) {
			loNNMapRaiz = loNodoRaiz.getAttributes();
			loNodoAux = loNNMapRaiz.getNamedItem("type");
			lsSgbd = loNodoAux.getNodeValue();
			//loNodo2 = loNNMap.getNamedItem("driver");
			// = loNodo2.getNodeValue();
			//loNodo2 = loNNMap.getNamedItem("sgbd");
			//lsSgbd = loNodo2.getNodeValue();
		}

		
//		loListaNodos = doc.getElementsByTagName("jasperDBOptions");
//		//if (!(loListaNodos.getLength()>0)) return -1;
//		loNodo = loListaNodos.item(0);
//		if (loNodo.hasAttributes()) {
//			loNNMap = loNodo.getAttributes();
//			loNodo2 = loNNMap.getNamedItem("jdbc");
//			lsCadenaDriverTotal = loNodo2.getNodeValue();
//		}
		
		if (lsSgbd.equals("xml")) {
			// NO SE UTILIZA UNA CONEXION A BD
			lbUsaConex = false;
			loListaRaiz = doc.getElementsByTagName("jasperXMLData");
			if (loListaRaiz.getLength()>0) {
				// De momento sólo se permite leer los datos XML
				// a partir del propio fichero de intrucciones
				mstrFichFuenteXML = NombreFichero;
				loNodoRaiz = loListaRaiz.item(0);
				if (loNodoRaiz.hasAttributes()) {
					loNNMap = loNodoRaiz.getAttributes();
					loNodo2 = loNNMap.getNamedItem("baseXpath");
					lsXPathFuenteXML = loNodo2.getNodeValue();
				}
			} else {
				mstrFichFuenteXML = new String("");
			}
			
		} else {
			lbUsaConex = true;
			mstrFichFuenteXML = new String("");
			// SE UTILIZA UNA CONEXION A BD
			
			if (loNodoRaiz.hasChildNodes()) {
			loListaRaiz2 = loNodoRaiz.getChildNodes();
			loCantEltos1 = loListaRaiz2.getLength();
			// ¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡
			// ¡ ¡ Sólo debería haber uno valido !!
			// ¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡
			for (loCont1 = 0; loCont1<loCantEltos1; loCont1++) {
				loNodoAux2 = loListaRaiz2.item(loCont1);
				if (loNodoAux2.getNodeType() == Node.ELEMENT_NODE && loNodoAux2.getNodeName()=="jasperDBOptions") {
			
					if (loNodoAux2.hasAttributes()) {
						loNNMap = loNodoAux2.getAttributes();
						loNodo2 = loNNMap.getNamedItem("jdbc");
						lsCadenaDriverTotal = loNodo2.getNodeValue();
					}
					
					HashMap<String, Integer> tagsBD;
					tagsBD = new HashMap<String, Integer>();
					tagsBD.put("dbType",new Integer(1));
					tagsBD.put("dbHost",new Integer(2));
					tagsBD.put("dbPort",new Integer(3));
					tagsBD.put("dbDatabase",new Integer(4));
					tagsBD.put("dbUser",new Integer(5));
					tagsBD.put("dbPassword",new Integer(6));
					Integer liposInteger;
					
					if (loNodoAux2.hasChildNodes()) {
						loListaSubNodos = loNodoAux2.getChildNodes();
						loCantEltos2 = loListaSubNodos.getLength();
						for (loCont2 = 0; loCont2<loCantEltos2; loCont2++) {
							if (loListaSubNodos.item(loCont2).getNodeType() == Node.ELEMENT_NODE) {
								loSubNodo = loListaSubNodos.item(loCont2);
								lsNombreTag = loSubNodo.getNodeName();
								liposInteger = (Integer)tagsBD.get(lsNombreTag);
								switch(liposInteger.intValue()) {
								case 1: //"dbType"
										if (loSubNodo.hasAttributes()) {
											loNNMap = loSubNodo.getAttributes();
											loNodo2 = loNNMap.getNamedItem("java");
											if ( loNodo2 != null ) {
												// Debería contener una cadena como:
												// "org.postgresql.Driver"
												lsClaseDriver = loNodo2.getNodeValue();
											}
										}
										break;
			//					case 2: //"dbHost"
			//							if (! loSubNodo.hasChildNodes()) continue;
			//							lsHost = loSubNodo.getChildNodes().item(0).getNodeValue().trim();
			//							break;
			//					case 3: //"dbPort"
			//						    if (! loSubNodo.hasChildNodes()) continue;
			//						    lsPort = loSubNodo.getChildNodes().item(0).getNodeValue().trim();
			//							break;
			//					case 4: //"dbDatabase"
			//							if (! loSubNodo.hasChildNodes()) continue;
			//							lsDatabase = loSubNodo.getChildNodes().item(0).getNodeValue().trim();
			//							break;
								case 5: //"dbUser"
										if (! loSubNodo.hasChildNodes()) continue;
										lsUser = loSubNodo.getChildNodes().item(0).getNodeValue().trim();
										break;
								case 6: //"dbPassword"
										if (! loSubNodo.hasChildNodes()) continue;
										lsPassword = loSubNodo.getChildNodes().item(0).getNodeValue().trim();
										break;
								}
							}
						}
					}
				}
			}
		  }
		}
		
		// UTILIZACION DE JASPER REPORTS
		// SEGUN LAS INSTRUCCIONES DEL FICHERO XML ANTERIOR
		// ================================================
		this.reiniciaConfig();
		this.setJasperFile(lsjasperFile);
		// Notar: Pueden existir informes que NO utilicen una conexion a BD
		// por lo que el fichero XML de entrada tendra que especificar si utiliza conexion a BD
		// además de proporcionar todos los datos de la conexion
		if (lbUsaConex) {
			this.setDriverBaseDeDatos(lsClaseDriver);
			this.setDB(lsCadenaDriverTotal);
			this.setUsuarioBaseDeDatos(lsUser,lsPassword);
			this.connectDB();
		} else {
			if (mstrFichFuenteXML.length()>0) {
				// Los informes de GvHidra por defecto 
				// introducen los datos en el propio fichero
				// y el Xpath para extraerlos es:
				// llamadaJasper/jasperDataSource/jasperXMLData/resultSet/dataRow/dataCol
				if (lsXPathFuenteXML.length() == 0) {
				//if (mstrSelectXPathFuenteXML.length()==0) {
					this.setSelectXPathFuenteXML("/llamadaJasper/jasperDataSource/jasperXMLData/resultSet/dataRow");
				} else {
					this.setSelectXPathFuenteXML(lsXPathFuenteXML);
				}
				this.connectFuenteXML();
			}
        }
		this.setParams(lmisParams);
		this.setResultFileType(lsresultFileType);
		liResultAux = this.createResultFile(lsresultFileName);
		
//		liResultAux = this.createResultFile(lsresultFileNameTemp);
//		lofile2 = new File(lsresultFileNameTemp);
//		if (lofile2.exists()) {
//			lofile3 = new File(lsresultFileName);
//			lofile2.renameTo(lofile3);
//		}
		
		if (liResultAux==0) {
			try {
				// Intentará borrar el fichero xml con las indicaciones
				// para crear el informe, 
				// porque ya se han realizado las tareas correctamente 
				lofile.delete();
			} catch (SecurityException se1) {
				se1.printStackTrace(miPrtW);
				// Si no se consigue eliminar el fichero de entrada
				// no es un error grave pero se debe avisar
				// para no llenar el servidor de ficheros-basura
				return -2;
			}
		} else {
			return liResultAux;
		}
		return 0;
	} // FIN DEL METODO cargaFichDatosEntrada
 
} // FIN DE LA CLASE
