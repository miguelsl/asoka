<?php


/**
 * Validacion de usuarios
 * Hace uso de la validacion cit a traves del Web Service en wscmn
 * Hace uso del PEAR::Auth
 *
 * @package gvHIDRA
 */

include_once 'igep/include/valida/gvhBaseAuth.php';

class AuthWS extends gvhBaseAuth 
{
	private $response;
	private $apl;

	function __construct($p_apli) 
	{
		parent::__construct();
		$this->apl = $p_apli;
	}

	function fetchData($username, $password) 
	{
		include_once('igep/include/igep_ws/IgepWS_Client.php');
		$opciones = array (
			"exceptions" => 0,
			//'trace' => 1,
			//	'soap_version'=>SOAP_1_2,
			'encoding' => 'ISO-8859-1',
		);
		//IgepWS_Client::disableCache();
		$soapClient = IgepWS_Client::getClient('igep/custom/cit.gva.es/auth/WSAuth.wsdl', $opciones);
		$this->response = $soapClient->valida(array (
					'login' => 'wsauth',
					'password' => 'xx42valid'
				), $username, $password, $this->apl);
		// Check If valid etc
		if (is_soap_fault($this->response)) {
			return false;
		}
		return true;
	}

	function getDatos() 
	{
		return array (
			'bd' => $this->response->bd, // servidor bd
			'server' => $_SERVER['SERVER_NAME'], // servidor web
			'aplicacion' => '?'
			);
	}

	function getResponse() 
	{
		return $this->response;
	}

	/**
	 * Inicializa variables en la sesión que recibe.
	 * Se ejecuta la primera vez que accede a la aplicación
	 * 
	 * 
	 * Información usada por gvHidra (se puede modificar la ubicación aunque habria que
	 * cambiar el método correspondiente en la clase igep/include/ComunSession.php):
	 *
	 * $_SESSION['LINT']['daplicacion'] --> nombre de la aplicación
	 * 
	 * $_SESSION['LINT']['modulos'] --> matriz de módulos asignados al usuario con las siguientes columnas:
	 *      $_SESSION['LINT']['modulos']['P_MODIFICA']['valor'] --> valor del módulo
	 *      $_SESSION['LINT']['modulos']['P_MODIFICA']['descrip']--> descripción del módulo
	 *
	 * $_SESSION['LINT']['rolusuar'] --> role del usuario
	 * 
	 * (siendo, 'LINT' y 'P_MODIFICA' ejemplos de aplicación y módulo, respectivamente)
	 * 
	 */
	function postLogin($sess, $aut=null) 
	{
		if (!is_null($aut)) {
			$resp = $aut->getAuthData('response');
			if ($resp) {
				$this->response = $resp;
				foreach ($resp as $prop => $value)
					if ($prop == 'modulos') {
						foreach ($resp->modulos as $mod)
							$sess['modulos'][$mod->modulo] = array('valor'=>$mod->valor, 'descrip'=>$mod->descrip);
					} elseif ($prop=='usuario' or $prop=='nombre') {
						$sess['usuario'][$prop]=$value;					
					} else
						$sess[$prop]=$value;
			}
		}
		return $sess;
	}

	/**
	 * Metodo para llamar desde aplicaciones, en la autenticacion inicial
	 * 
	 * Devuelve cadena vacia si todo va bien, o texto si error
	 */
	static function autenticate($p_apli)
	{
		$auth_container = new self($p_apli);

		IgepSession::session_start($p_apli, false);
		$aut = new Auth($auth_container,'','loginFunction');
		$aut->setSessionName($p_apli);
		if ($_GET['logout'])
			$aut->logout();
		$aut->start();

		$resp = $auth_container->getResponse();
		if ($aut->checkAuth()) {
			$aut->setAuthData('response',$resp);
			$auth_container->open('igep/custom/cit.gva.es/auth/validacion_ws.php');
			return '';
		} else {
			if (isset($resp))
				return $resp->getMessage();
			else
				return ''; // ocurre cuando no hay usuario/password
		}
	}

}

function loginFunction($username = null, $status = null, &$auth = null)
{
    echo <<<EOF
<html>
<head>
<title>Accés personalitzat a aplicacions</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>

<table width="97%" border="0" cellspacing="0" cellpadding="0">
<tbody>
  <tr align="center"> 
   <td>
	<form method="post" action="" AUTOCOMPLETE="OFF">

        <table border="0" cellpadding="3">
          <tr> 
            <td align="left">
              <p><b>Introdu&iuml;sca l&#39;usuari i la clau que utilitza en la seua aplicació</b></p>
            </td>
          </tr>
          <tr><td align=center> 
               <p>Usuari:<br>
    			<input type="text" name="username">
    		   </p>
               <p>Clau:<br>
		    	<input type="password" name="password">
    		   </p>
    		<input type="submit" value="acceptar">

			</td></tr>
    	</table>

    </form>
   </td>
  </tr>
</tbody>
</table>

</body>
</html>
EOF;
}

?>
