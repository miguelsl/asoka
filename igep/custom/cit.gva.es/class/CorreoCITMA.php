<?php
/* gvHIDRA. Herramienta Integral de Desarrollo Rápido de Aplicaciones de la Generalitat Valenciana
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
*  Av. Blasco Ibáñez, 50
*  46010 VALENCIA
*  SPAIN
*  +34 96386 24 83
*  gvhidra@gva.es
*  www.gvpontis.gva.es
*
*/
/**
 * correo es una clase que permite enviar un correo, con o sin anexos, a una lista de usuarios  
 * 
 * @version	$Id: IgepCorreo.php,v 1.30 2010-02-23 16:46:00 gaspar Exp $ 
 * @author Esther: <forcano_est@gva.es> 
 * @package	gvHIDRA
 */
include_once('Mail.php');
include_once('Mail/mime.php');

define("COL_EMAIL", "dircorreo");

class CorreoCITMA extends IgepCorreo {
	
	/**
	* Función que devuelve la dirección de correo de un usuario
	*/
	static public function correoUsuario($usuario)  
	{
		$respondera = array();
		if (empty($usuario))
			return $respondera;
		$conf = ConfigFramework::getConfig();
		$dsn = $conf->getDSN('gvh_dsn_ora');
		if (empty($dsn))
			return $respondera;
		$conexion = new IgepConexion($dsn);
		$responder = $conexion->consultar("select u.dcorreoint as \"".COL_EMAIL."\" from tcom_usuarios u where u.usuario = '$usuario'");

		if (count($responder)>0) $respondera[0]=$responder[0][COL_EMAIL];

		return $respondera;
	}

    /**
    * Función que devuelve la dirección de correo de un nregpgv
    */
    static public function correoNREGPGV($nregpgv)  
    {
    	$lista = array();
		if (empty($nregpgv))
			return $lista;
        
        if(is_array($nregpgv))            
            $str_nregpgv= implode("','",$nregpgv);
        else
            $str_nregpgv= $nregpgv;
        
        return self::correoLista("select u.dcorreoint as \"".COL_EMAIL."\"
									from tcom_usuarios u where (u.tipousu='N' or u.tipousu='S') and u.estado='A' and u.nrp in ('$str_nregpgv')
									group by u.dcorreoint");

    }
	
	/** Función que devuelve la lista de usuarios a quien enviar el correo según la aplicación
	  * y el módulo
	  */ 
	static public function correoListaUsuariosModulo($aplicacion,$modulo) {
		
		return self::correoLista("select u.dcorreoint as \"".COL_EMAIL."\"
									from tcom_usuarios u, vcom_modulos_usuarios m where u.usuario = m.usuario and (u.tipousu='N' or u.tipousu='S') and u.dcorreoint is not null and m.modulo = '$modulo' AND m.aplicacion = '$aplicacion'
									group by u.dcorreoint");
 
	}

	/** Función que devuelve la lista de todos los usuarios de la aplicación a quien enviar
	  * el correo según el tipo.
	  * 1- todos excluyendo usuarios de tipo role y sólo aquellos de tipo N (normal) o S (sólo listas)
      */	 
	static public function correoListaUsuariosAplicacion($aplicacion,$tipo=1) {
		
		if ($tipo==1)
			return self::correoLista("select u.dcorreoint as \"".COL_EMAIL."\"
										from tcom_aplusu a, tcom_usuarios u where a.usuario=u.USUARIO and a.estadousu<>'R' and (u.tipousu='N' or u.tipousu='S') and u.dcorreoint is not null and a.aplicacion = '$aplicacion'
										group by u.dcorreoint");
	}
	
	/** Función que devuelve la lista de usuarios a quien enviar el correo
	  */
	static public function correoLista($selec) {
    	$lista = array();
		if (empty($selec))
			return $lista;
		$conf = ConfigFramework::getConfig();
		$dsn = $conf->getDSN('gvh_dsn_ora');
		if (empty($dsn))
			return $lista;
        $conexion = new IgepConexion($dsn);

		$direcciones = $conexion->consultar($selec);
		
		$destinatarios=array();	
		foreach ($direcciones as $usupetici)
			$destinatarios[]=$usupetici[COL_EMAIL];
		
		return $destinatarios;
	}
	
	/**
	 * Función para enviar correos sin ficheros anexados
	 * @param string 	$from			Dirección de correo del usuario que envia
	 * @param string	$to				Contiene un array con los destinatarios
	 * @param string 	$subject		Asunto del mensaje.
	 * @param string 	$body			Cuerpo (texto) del mensaje.
	 * @param string	$responder_a	Contiene la dirección de correo del usuario a responder
	 * @param string	$poner_dest		(Por defecto false) Indica si queremos que en el correo aparezcan todos los destinatarios que reciben el correo. En desarrollo no tiene efecto.
	*/
	static public function sinAnexo($from,$to,$subject,$body,$responder_a,$poner_dest=FALSE)
	{
		IgepDebug::setDebug(DEBUG_IGEP, 'Enviando correo a '.count($to).' usuario(s)');
		$usus = implode('; ', $to);
		
		//Si estamos en desarrollo, enviamos el correo al usuario que se valida 
		//y no a los destinatarios reales
		if (CustomMainWindow::getHost()=='gardel') {
			$datosusuario=IgepSession::dameDatosUsuario();
			if (isset($datosusuario['correo'])) {
				if (count($to)>0)
					//Concatenamos al mensaje los destinatarios reales
					$body .= SALTO_LINEA.'Destinatarios de correo reales:'.SALTO_LINEA.$usus;
			 	$to = array($datosusuario['correo']);
			}
		} else {
			if ($poner_dest)
				$body = SALTO_LINEA.'Destinatarios del correo:'.SALTO_LINEA.$usus.SALTO_LINEA.SALTO_LINEA.$body;
		}

		//Formamos las cabeceras:
		$headers['From']    = $from;
		$headers['Reply-to'] = $responder_a;
		$headers['Subject'] = $subject;
		
		// Registramos metodo para enviar cola, cuando finalice la peticion 
		if (empty(parent::$mailQueue))
			register_shutdown_function(array('IgepCorreo', 'sendMailsInQueue'), getcwd());
				
		foreach ($to as $email) {
		 	$headers['To']=$email;
			parent::$mailQueue[] = array($email,$headers,$body);
		}
		return true;
	}

	/**Función para enviar correos con ficheros anexados
	* from		 	--> Contiene la dirección de correo del usuario que envia
	* to        	--> Contiene un array con los destinatarios
	* subject   	--> Asunto del mensaje.
	* msg       	--> Texto del mensaje.
	* responder_a 	--> Contiene la dirección de correo del usuario a responder
	* tmp_fich  	--> Nombre del fichero temporal anexo a enviar en el mensaje.
	* tipofich  	--> Tipo de fichero
	* nom_fich  	--> Nombre del fichero anexo a enviar en el mensaje
	* poner_dest    --> Indica si queremos que en el correo aparezcan todos los
	* 					destinatarios que reciben el correo. En desarrollo no tiene efecto.
	*/

	/*Se usa el paquete mail_mime (http://pear.php.net/package-info.php?pacid=21):
	*  - mime.php: Create mime email, with html, attachments, embedded images etc.
	*  - mimePart.php: Advanced method of creating mime messages.
	*  - mimeDecode.php - Decodes mime messages to a usable structure.
	*  - xmail.dtd: An XML DTD to acompany the getXML() method of the decoding class.
	*  - xmail.xsl: An XSLT stylesheet to transform the output of the getXML() method back to an email
	*/
	static public function conAnexo($from,$to,$subject,$msg,$responder_a,$tmp_fich,$tipo_fich,$nom_fich,$poner_dest=FALSE)
	{
		////////////////////// NO ESTÁ PROBADA ////////////////////////////
		IgepDebug::setDebug(DEBUG_IGEP, 'Enviando correo con anexo a '.count($to).' usuario(s)');		
		$usus = implode('; ', $to);
		
		//Si estamos en desarrollo, enviamos el correo al usuario que se valida 
		//y no a los destinatarios reales
		if (CustomMainWindow::getHost()=='gardel') {
			$datosusuario=IgepSession::dameDatosUsuario();
			if (isset($datosusuario['correo'])) {
				if (count($to)>0)
					//Concatenamos al mensaje los destinatarios reales
					$msg = $msg.SALTO_LINEA."Destinatarios de correo reales:".SALTO_LINEA.$usus;
			 	$to = array($datosusuario['correo']);
			}
		} else {
			if ($poner_dest)
				$msg = SALTO_LINEA."Destinatarios del correo:".SALTO_LINEA.$usus.SALTO_LINEA.SALTO_LINEA.$msg;
		}
		
	    //Cabeceras:
	    $hdrs = array('From'=>$from,'Subject' => $subject,'Reply-to'=> $responder_a);
	
	    //Creamos el objeto de tipo Mail_mime:
	    $mime = new Mail_mime(SALTO_LINEA);
	
	    if (!$mime->addAttachment($tmp_fich,$tipo_fich,$nom_fich)) $msg.= SALTO_LINEA." No ha podido anexarse el fichero";
		$mime->setTXTBody($msg);
	    $body = $mime->get();
	    $hdrs = $mime->headers($hdrs);
		
		//Por defecto en la CITMA siempre será smtp.gva.es
		$params['host'] = 'smtp.gva.es';
	    
	    // Creamos el objeto mail usando el método Mail::factory
	    $mail_object =& Mail::factory('smtp', $params);
	    
	    //Mandamos el mensaje a cada destinatario:
		$resultado=TRUE;
		while (list($clave, $valor)=each($to)) {
			$result = $mail_object->send($valor, $hdrs, $body);
			if (!$result || !($result === TRUE))
				$resultado=FALSE;
		}
		return $resultado;
	}

}	 //Fin de la Clase CITMAcorreo
?>