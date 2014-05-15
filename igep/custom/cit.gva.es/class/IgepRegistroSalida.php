<?php
/* LINT. Registro
*
* Copyright (C) 2006 Generalitat Valenciana.
*
* This program is free software; you can redistribute it and/or
* modify it under the terms of the GNU General Public License
* as published by the Free Software Foundation; either version 2
* of the License, or (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307,USA.
*
* For more information, contact:
*
*  Generalitat Valenciana
*  Conselleria d'Infraestructures i Transport
*  Av. Blasco Ib��ez, 50
*  46010 VALENCIA
*  SPAIN
*  +34 96386 24 83
*  gvhidra@gva.es
*  www.gvpontis.gva.es
*
*/

/**
 * IgepRegistroSalida: Clase que encapsula el acceso al registro de salida
 * 
 * La clase accede a la API de Oracle hasta que exista un WS
 * 
 * @author David Pascual <pascual_dav@gva.es> 
 */

class IgepRegistroSalida
{
	/**
	* Conexi�n contra Oracle
	* @access private
	* @var object
	*/
	private $_conOracle;
	
	/**
	* Descripci�n del error. Gesti�n de errores interna.
	* @access private
	* @var string
	*/
	private $_error;		
		
	/**
	* Corresponde al campo 'a�o' del registro de salida
	* @access private
	* @var string
	*/
	private $_anyo;
	
	/**
	* Corresponde al campo 'asunto' del registro
	* @access private
	* @var string
	*/
	private $_asunto;
	
	/**
	* Corresponde al campo 'nombre destinatario' del registro de salida
	* @access private
	* @var string
	*/
	private $_nombreDest;	
	
	/**
	* Corresponde al c�digo de provincia del destinatario (codpro)
	* @access private
	* @var string
	*/
	private $_codPro;
	
	/**
	* Corresponde al c�digo de municipio del destinatario (codmun)
	* @access private
	* @var string
	*/
	private $_codMun;
	
	/**
	* Corresponde a la direcci�n del destinatario
	* @access private
	* @var string
	*/
	private $_direccionDest;
	
	/**
	* Corresponde al c�digo postal del destinatario
	* @access private
	* @var string
	*/
	private $_CPDest;
	
	
	/**
	* Corresponde al c�digo de la unidad origen que solicita la anotaci�n registral
	* @access private
	* @var string
	*/
	private $_codUnidadOrigen;
	
	/**
	* Corresponde al c�digo de la Conselleria origen que solicita la anotaci�n registral
	* @access private
	* @var string
	*/
	private $_codConselleriaOrigen;
	
	/**
	* Corresponde al c�digo de la unidad registral 
	* @access private
	* @var string
	*/
	private $_codUnidadRegistral;
	
	/**
	* Corresponde al c�digo del Organismo origen que solicita la anotaci�n registral
	* @access private
	* @var string
	*/
	private $_codOrganismoOrigen;
	
	
	
	/**
	 * Registro::Recibe un array de conexiones activas (obligatoria la de oracle)
	 *  
	 * @param array $vConBD conexi�n de oracle [oracle]	 
	 */
	public function __construct($vConBD, $vParams = null, $vIndexMatch = null)
	{
		if (isset($vConBD))
			$this->_conOracle = $vConBD;
		else
			throw new InvalidArgumentException ("Registro::__construct La conexi�n pasada al constructor no es v�lida");
			
		$this->_anyo = null;
		$this->_asunto = null;
		$this->_codMun = null;
		$this->_codPro = null;
		$this->_CPDest = null;
		$this->_direccionDest = null;
		$this->_nombreDest = null;
		$this->_codUnidadOrigen = null;
		$this->_codConselleriaOrigen = null;
		$this->_codUnidadRegistral = null;
		$this->_codOrganismoOrigen = null;
				
		
		if (($vParams != null) && (is_array($vParams)))
		{
			$this->setValuesRegistro($vParams, $vIndexMatch);
		}
		
	}//registrarSalida
	
	
	
	/**
	 * Registro:setValuesRegistro Recibe un array asociativo de par�mteros (opcionalemnte un array asocitivo de �ndices) y fija los atributos del registro
	 * 
	 * @param Array $vParams Vector asociativo con los p�rametros de invocaci�n [anyo|asunto|nombreDest|codpro|codmun|direccionDest|CPDest] 
	 * @param Array $vIndexMatch Opcional. Vector asociativo con �ndices del array de par�metros [anyo|asunto|nombreDest|codpro|codmun|direccionDest|CPDest]
	 * @return int	Devuelve el n�mero de registro obtenido 
	 */
	public function setValuesRegistro($vParams, $vIndexMatch = null)
	{
		$indAnyo = 'anyo';		
		$indAsunto = 'asunto';
		$indNombreDest = 'nombreDest';
		$indCodpro = 'codpro';
		$indCodMun = 'codmun';
		$indDireccionDest = 'direccionDest';
		$indCPDest = 'CPDest';
		$indCodUnidadOrigen = 'codUnidadOrigen';
		$indCodConselleriaOrigen = 'codConselleriaOrigen';
		$indCodUnidadRegistral = 'codUnidadRegistral';
		$indCodOrganismoOrigen = 'codOrganismoOrigen';
		
		if (is_array($vIndexMatch))
		{
			if (isset($vIndexMatch['anyo'])) $indAnyo = $vIndexMatch['anyo'];
			if (isset($vIndexMatch['asunto'])) $indAsunto = $vIndexMatch['asunto'];
			if (isset($vIndexMatch['nombreDest'])) $indNombreDest = $vIndexMatch['nombreDest'];
			if (isset($vIndexMatch['codpro'])) $indCodpro = $vIndexMatch['codpro'];
			if (isset($vIndexMatch['codmun'])) $indCodMun = $vIndexMatch['codmun'];
			if (isset($vIndexMatch['direccionDest'])) $indDireccionDest = $vIndexMatch['direccionDest'];
			if (isset($vIndexMatch['CPDest'])) $indCPDest = $vIndexMatch['CPDest'];			
			if (isset($vIndexMatch['codUnidadOrigen'])) $indCodUnidadOrigen = $vIndexMatch['codUnidadOrigen'];
			if (isset($vIndexMatch['codConselleriaOrigen'])) $indCodConselleriaOrigen = $vIndexMatch['codConselleriaOrigen'];
			if (isset($vIndexMatch['codUnidadRegistral'])) $indCodUnidadRegistral = $vIndexMatch['codUnidadRegistral'];
			if (isset($vIndexMatch['codOrganismoOrigen'])) $indCodOrganismoOrigen = $vIndexMatch['codOrganismoOrigen'];
			
		}
		
		if (isset($vParams[$indAnyo]))	
			$this->_anyo = $vParams[$indAnyo];
			
		if (isset($vParams[$indAsunto]))	
			$this->_asunto = $vParams[$indAsunto];
			
		if (isset($vParams[$indNombreDest]))	
			$this->_nombreDest = $vParams[$indNombreDest];
			
		if (isset($vParams[$indCodpro]))	
			$this->_codPro = $vParams[$indCodpro];
			
		if (isset($vParams[$indCodMun]))	
			$this->_codMun = $vParams[$indCodMun];
		
		if (isset($vParams[$indDireccionDest]))	
			$this->_direccionDest = $vParams[$indDireccionDest];
		
		if (isset($vParams[$indCPDest]))	
			$this->_CPDest = $vParams[$indCPDest];
			
		if (isset($vParams[$indCodUnidadOrigen]))	
			$this->_codUnidadOrigen = $vParams[$indCodUnidadOrigen];
			
		if (isset($vParams[$indCodConselleriaOrigen]))	
			$this->_codConselleriaOrigen = $vParams[$indCodConselleriaOrigen];
			
		if (isset($vParams[$indCodUnidadRegistral]))	
			$this->_codUnidadRegistral = $vParams[$indCodUnidadRegistral];
			
		if (isset($vParams[$indCodOrganismoOrigen]))	
			$this->_codOrganismoOrigen = $vParams[$indCodOrganismoOrigen];
			
		
	}//Fin setValuesRegistro
	
	
	
	/**
	 * Registro::setAnyo Establece el anyo del registro del que se abrir� una instancia
	 * 
	 * @param string anyo del registro del que se abrir� una instancia
	 */
	public function setAnyo($valor)
	{
		$this->_anyo= $valor;
	}//Fin setAnyo
	
	
	
	/**
	 * Registro::setAsunto Establece el asunto de la orden de registro
	 * 
	 * @param string Asunto de la orden de registro
	 */
	public function setAsunto($valor)
	{
		$this->_asunto = $valor;
	}//Fin setAsunto
	
	
	
	/**
	 * Registro::setCodMun Establece el c�digo de municipio (codmun)
	 * 
	 * @param string c�digo del municipio en COMUN
	 */
	public function setCodMun($valor)
	{
		$this->_codMun = $valor;
	}//Fin setCodMun
	
	
	
	/**
	 * Registro::setCodPro Establece el c�digo de la provincia (codpro)
	 * 
	 * @param string c�digo de la provincia (codpro) en COMUN
	 */
	public function setCodPro($valor)
	{
		$this->_codPro = $valor;
	}//Fin setCodPro
	
	
	
	/**
	 * Registro::setCP Establece el c�digo postal del destinatario
	 * 
	 * @param string c�digo postal del destinatario
	 */
	public function setCP($valor)
	{
		$this->_CPDest = $valor;
	}//Fin setCP
	
	
	
	/**
	 * Registro::setNombreDestinatario Establece el nombre completo del destinatario
	 * 
	 * @param string nombre completo del destinatario
	 */
	public function setNombreDestinatario($valor)
	{
		$this->_nombreDest = $valor;
	}//Fin setNombreDestinatario
	
	
	
	/**
	 * Registro::setDireccionDestinatario Establece la direcci�n del destinatario 
	 * 
	 * @param string direcci�n del destinatario 
	 */
	public function setDireccionDestinatario($valor)
	{
		$this->_direccionDest = $valor;
	}//Fin setDireccionDestinatario
	
	/**
	 * Registro::setUnidadRegistral Establece la unidad registral 
	 * 
	 * @param string c�digo de la unidad registral 
	 */
	public function setUnidadRegistral($valor)
	{
		$this->_unidadRegistral = $valor;
	}//Fin setUnidadRegistral
	
	
	/**
	 * Registro::_validar valida que los atributos est�n informados
	 * 
	 * @return boolean devuelkve true si el registro es valido o false en caso contrario 
	 */
	private function _validar()
	{
		$this->_error = null;
		$correcto = true;
		
		if (is_null($this->_anyo)) 
		{
			$this->_error = "Falta informar el atributo 'a�o'";
			$correcto = false;
		}
		
		if (is_null($this->_asunto))
		{
			$this->_error = "Falta informar el atributo 'asunto'";
			$correcto = false;
		}
		
		if (is_null($this->_codMun))
		{
			$this->_error = "Falta informar el atributo 'c�digo municipio'";
			$correcto = false;
		}
			
		if (is_null($this->_codPro))
		{
			$this->_error = "Falta informar el atributo 'c�digo provincia'";
			$correcto = false;
		}
		
		if (is_null($this->_CPDest))
		{
			$this->_error = "Falta informar el atributo 'CP'";
			$correcto = false;
		}
		
		if (is_null($this->_direccionDest))
		{
			$this->_error = "Falta informar el atributo 'Direcci�n del destinatario'";
			$correcto = false;
		}
		
		if (is_null($this->_nombreDest))
		{
			$this->_error = "Falta informar el atributo 'Nombre completo del destinatario'";
			$correcto = false;
		}
		
		if (is_null($this->_codUnidadOrigen))
		{
			$this->_error = "Falta informar el atributo 'C�digo de la Unidad Origen'";
			$correcto = false;
		}
		
		if (is_null($this->_codConselleriaOrigen))
		{
			$this->_error = "Falta informar el atributo 'C�digo de la Conselleria Origen'";
			$correcto = false;
		}	
		
		if (is_null($this->_codUnidadRegistral))
		{
			$this->_error = "Falta informar el atributo 'C�digo de la unidad Registral'";
			$correcto = false;
		}
		
		
		if (is_null($this->_codOrganismoOrigen))
		{
			$this->_error = "Falta informar el atributo 'C�digo del organismo Origen'";
			$correcto = false;
		}

		return $correcto;
	}//Fin _validar
	
	
	
	
	/**
	 * Registro:registrarSalida Realiza el apunte en el registro de salida y devuelve el n�mero de registro asignado a la acci�n registral
	 *
	 * La funci�n invoca un procedimeinto almacenado de Oracle (RS_API.API_REGISTROSALIDA_PHP) basado en la funci�n Oracle
	 * RS_API.API_REGISTROSALIDA. De momento s�lo se fijan algunos de los posibles par�metros a falta de incluirlos todos.
	 * 
	 * 
	 * 
	 * @return array	Devuelve una array asociativo con la salida [numRegistro|infoRegistro|mensajeApi|resultadoSQL] 
	 */
	public function registrarSalida()
	{
		// ORACLE API_CREAREGISTROSALIDA_PHP
		
		if (!$this->_validar())		
		{			
			throw new InvalidArgumentException ("Registro::registrarSalida ".$this->_error);
		}

		//Par�metros de entrada
		$anyox = $this->_anyo;//VRS_ANYO
		$asuntox = $this->_asunto;//VRS_ASUNTO
		$acuseRecibox = null;//VRS_ACUSE_RECIBO
		$idDestTipoDocCod = null;//VRS_AM_TP_CODIGO
		$idDestNumDocCod = null; //VRS_AM_NUMERO_DOC
		$idDestIndDuplNumDoc = null;//VRS_AM_IND_DUP_DNI
		$ape1Dest = null; //VRS_NOMSEP_APELL1
		$ape2Dest = null; //VRS_NOMSEP_APELL2
		$nomSepDest = null; //VRS_NOMSEP_NOMBRE
		$nombreCompletoDest = $this->_nombreDest;//VRS_NOMBRE_DEST
		$codProDest = $this->_codPro; //VRS_CODPRO_DEST
		$codMunDest = $this->_codMun; //VRS_CODMUN_DEST
		$nomMunDest = null; //VRS_NOMMUN_DEST
		$codPobDest = null; //VRS_CODPOB_DEST		
		$direccionDestinatario = $this->_direccionDest;//VRS_DIRECCION_DEST
		$codPostDestinatario = $this->_CPDest; //VRS_CODPOS_DEST
		$paisDestinatario = null; //VRS_PAIS_DEST		
		$numeroDeSalidaUnidad = null; //VRS_NUMERO_SALIDA_UNIDAD		
		$codUnidadOrigen = $this->_codUnidadOrigen; //VRS_UNI_CODIGO_ES_REMITIDO_POR		
		$numeroRegistroEntrada = null;//VRS_RE_NUM_REGISTRO
		$anyoRegistroEntrada = null; //VRS_RE_ANYO_REGISTRO
		$codExpedienteAsociado = null; //VRS_EA_COD_EXPE_USER
		$codUnidadDestino = null; //VRS_UNI_CODIGO_ES_ENVIADO_A
		$codConselleriaOrigen= $this->_codConselleriaOrigen;  //VRS_CONSEJERIA
		$codUnidadRegistral = $this->_codUnidadRegistral; //VRS_UNIDAD_REGISTRAL
		$codAdministracionDestino = null;//VRS_AD_UNI_CODIGO_ES_ENVIADO_A
		$codOrganismoDestino = null;//VRS_OR_UNI_CODIGO_ES_ENVIADO_A		
		$codOrganismoOrigen = $this->_codOrganismoOrigen;//VRS_OR_UNI_CODIGO_ES_REMITIDO organismoOrigen
		$fecDocsRegSal = null;//VRS_FECHA_DOCUMENTOS
		$fecPresentDocsRegSal = null;//VRS_FECHA_PRESENT
		//Par�metros de salida
		$out_numRegistro = null; //VRS_NUMERO
		$out_numRegistroCompleto = null; //VNUMERO_REGISTRO
		$out_mensajeAPI = null; //VMsg
		$out_resultado = null; //X

		//select * from rs_regsal where
		
		//Recogemos el objeto nativo de la conexi�n oracle
		$connOci8 = $this->_conOracle->getPEARConnection()->getConnection();
		
		$cadenaInvocacion = <<<storeProcedure
begin API_CreaRegistroSalida_PHP
(
   :anyox,
   :asuntox,
   :acuserecibox,
   :iddesttipodoccodx,
   :iddestnumdoccodx,
   :iddestindduplnumdocx,
   :ape1destx,
   :ape2destx,
   :nomsepdestx,
   :nombrecompletodestx,
   :codprodestx,
   :codmundestx,
   :nomundestx,
   :codpobdestx,
   :direcciondestinatariox,
   :codpostdestinatariox,
   :paisdestinatariox,
   :numerodesalidaunidadx,
   :codunidadorigenx,
   :numeroregistroentradax,
   :anyoregistroentradax,
   :codexpedienteasociadox,
   :codunidaddestinox,
   :codconselleriaorigenx,
   :codunidadregistralx,
   :codadministraciondestinox,
   :codorganismodestinox,
   :codorganismoorigenx,
   :fecdocsregsalx,
   :fecpresentdocsregsalx,
   :numregistro,
   :numregistrocompleto,
   :mensajeapi,
   :resultado
);
end;

storeProcedure;

		$stmt = oci_parse($connOci8, $cadenaInvocacion);
		
		// Preparamos los par�metros de la invocaci�n.
		// Deben tener el tama�o exacto para el que est�n definidas en el procedimiento o funci�n
		// OCIBindByName($sentencia, ':nombreParam', valor, tama�o);
		oci_bind_by_name($stmt, ':anyox', $anyox, 4);
		oci_bind_by_name($stmt, ':asuntox', $asuntox, 250);
		oci_bind_by_name($stmt, ':acuserecibox', $acuseRecibox, 1);
		oci_bind_by_name($stmt, ':iddesttipodoccodx', $idDestTipoDocCod, 3);
		oci_bind_by_name($stmt, ':iddestnumdoccodx', $idDestNumDocCod, 30);
		oci_bind_by_name($stmt, ':iddestindduplnumdocx', $idDestIndDuplNumDoc, 1);
		oci_bind_by_name($stmt, ':ape1destx', $ape1Dest, 25);
		oci_bind_by_name($stmt, ':ape2destx', $ape2Dest, 25);
		oci_bind_by_name($stmt, ':nomsepdestx', $nomSepDest, 25);		
		oci_bind_by_name($stmt, ':nombrecompletodestx', $nombreCompletoDest, 50);
		oci_bind_by_name($stmt, ':codprodestx', $codProDest, 2);
		oci_bind_by_name($stmt, ':codmundestx', $codMunDest, 3);
		oci_bind_by_name($stmt, ':nomundestx', $nomMunDest, 50);
		oci_bind_by_name($stmt, ':codpobdestx', $codPobDest, 2);
		oci_bind_by_name($stmt, ':direcciondestinatariox', $direccionDestinatario, 50);
		oci_bind_by_name($stmt, ':codpostdestinatariox', $codPostDestinatario, 5);
		oci_bind_by_name($stmt, ':paisdestinatariox', $paisDestinatario, 40);
		oci_bind_by_name($stmt, ':numerodesalidaunidadx', $numeroDeSalidaUnidad, 6);
		oci_bind_by_name($stmt, ':codunidadorigenx', $codUnidadOrigen, 5);
		oci_bind_by_name($stmt, ':numeroregistroentradax', $numeroRegistroEntrada, 8);
		oci_bind_by_name($stmt, ':anyoregistroentradax', $anyoRegistroEntrada, 4);
		oci_bind_by_name($stmt, ':codexpedienteasociadox', $codExpedienteAsociado, 20);
		oci_bind_by_name($stmt, ':codunidaddestinox', $codUnidadDestino, 5);
		oci_bind_by_name($stmt, ':codconselleriaorigenx', $codConselleriaOrigen, 2);
		oci_bind_by_name($stmt, ':codunidadregistralx', $codUnidadRegistral, 3);
		oci_bind_by_name($stmt, ':codadministraciondestinox', $codAdministracionDestino, 2);
		oci_bind_by_name($stmt, ':codorganismodestinox', $codOrganismoDestino, 2);
		oci_bind_by_name($stmt, ':codorganismoorigenx', $codOrganismoOrigen, 2);
		oci_bind_by_name($stmt, ':fecdocsregsalx', $fecDocsRegSal, 10);
		oci_bind_by_name($stmt, ':fecpresentdocsregsalx', $fecPresentDocsRegSal, 10);
		
		//Par�metros de salida
		oci_bind_by_name($stmt, ':numregistro', $out_numRegistro, 6);
		oci_bind_by_name($stmt, ':numregistrocompleto', $out_numRegistroCompleto, 50);
		oci_bind_by_name($stmt, ':mensajeapi', $out_mensajeAPI, 250);
		oci_bind_by_name($stmt, ':resultado', $out_resultado, 10);
		$resultadoOk = oci_execute($stmt, OCI_DEFAULT);//TODO: A partir de PHP 5.3.2 cambiar OCI_DEFAULT por OCI_NO_AUTO_COMMIT
		
		oci_free_statement($stmt);
		ocilogoff($connOci8);
		
		$resultado = array();
		if ($resultadoOk)
		{
			$vResultado = array
			(
				'numRegistro'=> $out_numRegistro,
				'infoRegistro'=> $out_numRegistroCompleto,
				'mensajeApi'=> $out_mensajeAPI,
				'resultadoSQL'=> $out_resultado
			);
		}
		else
		{		
			throw new InvalidArgumentException ('Registro::registrarSalida Error al ejecutar el procedimiento almacenado ');
		}
		
		
		return $vResultado;
	}//registrarSalida
	

}//Fin IgepRegistroSalida



?>