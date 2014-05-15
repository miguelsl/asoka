<?php
/**
 * Validacion de usuarios: configuracion personalizable por el usuario
 * Hace uso del PEAR::Auth
 *
 * @package gvHIDRA
 */

include_once 'gvhBaseAuth.php';

class AuthBasic extends gvhBaseAuth
{
	var $response = null;
	
    function __construct()
    {
		parent::__construct();
		$this->datos=array(
			'bd'=>'bd-usuario',	// servidor bd
			'server'=>'http',		// servidor web
		);
    }


    function fetchData($username, $password, $isChallengeResponse=false)
    {
        // Check If valid etc
        if($username=='invitado' and md5('salto-pre'.$password.'salto-post')=='19fda1814a6fc1c51c6ceb14ea92fba7') {
            // Perform Some Actions
            return true;
        }
        return false;
    }
    
    function getDatos()
    {
    	return $this->datos;
    }

	function getResponse() 
	{
		return $this->response;
	}
    
    /**
     * Inicializa variables en la sesion que recibe.
     * Se ejecuta la primera vez que accede a la aplicacion
     */
    function postLogin($sess, $aut=null)
    {
    	$sess['usuario']['nombre']='Usuario Invitado';
		$sess['rolusuar'] = 'perfil_por_definir';
		$sess['modulos'] = array();
		$sess['daplicacion'] = 'Aplicación de ejemplo con gvHIDRA';
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
		if (isset($_GET['logout']))
			$aut->logout();
		$aut->start();

		$resp = $auth_container->getResponse();

		if ($aut->checkAuth()) {
			$aut->setAuthData('response',$resp);
			$auth_container->open('igep/include/valida/validacion.php');
			return '';
		} else {
			if (isset($resp))
				return $resp->getMessage();
			else
				return ''; // ocurre cuando no hay usuario/password
		}
	}

}
function loginFunction($username = null, $status = null, &$auth = null) {
		$status_desc = '';
	    if (!empty($status) && $status == AUTH_EXPIRED) {
            $status_desc = '<i>Tu sesión ha expirado. Por favor conectate de nuevo!</i>'."\n";
        } else if (!empty($status) && $status == AUTH_IDLED) {
            $status_desc = '<i>Has estado inactivo mucho tiempo. Por favor conectate de nuevo!</i>'."\n";
        } else if (!empty ($status) && $status == AUTH_WRONG_LOGIN) {
            $status_desc = '<i>Credenciales incorrectas!</i>'."\n";
        } else if (!empty ($status) && $status == AUTH_SECURITY_BREACH) {
            $status_desc = '<i>Problema de seguridad detectado. </i>'."\n";
        }
        $custom = ConfigFramework::getCustomDirName();
        $aplDesc = ConfigFramework::getCustomTitle();
        $aplName = ConfigFramework::getApplicationName();
        $aplVersion = ConfigFramework::getAppVersion();
	
		echo <<<EOF
<html>
<head>
<title>Acceso personalizado a aplicaciones</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel='icon' type='image/ico' href='igep/custom/$custom/images/favicon.ico'/>
<link rel='stylesheet' href='igep/custom/$custom/css/aplicacion.css' type='text/css' />
<link rel='stylesheet' href='igep/custom/$custom/css/layersmenu-cit.css' type='text/css' />
<script>
  document.onkeypress = processKey;

  function processKey(e)
  {
    if (null == e)
      e = window.event ;
    if (e.keyCode == 13)  {
      document.forms[0].submit();
    }
  }
</script>
</head>
<body>
<br/><br/>
<div id="login">
		<div id='aplLogin'>
			<div id='title'>$aplName</div>
			<div id='descrTitle'>$aplDesc</div>
			<div id='version'>Versión $aplVersion</div>
		</div>
		<br>
		<div class='tabularLineHead'>&nbsp;</div>
		<div style='clear:both;'></div>
		<div id='titleLogin'>VALIDACIÓN DE ACCESO</div>
		<div id='formLogin'>
			<br>
			<form method="post" action="" AUTOCOMPLETE="OFF">
				<div id='textLogin'>Usuario:</div>
				<div id='inputLogin'><input type="text" name="username" size=15 class="text edit" value="$username"></div>
				<br>
				<div id='textLogin'>Contraseña:</div>
				<div id='inputLogin'><input type="password" name="password" size=15 class="text edit"></div>
				<br><br>
				<button style='display:inline;' id='validar' name='validar' value="Validar" type='button' class='button' onmouseover="this.className='button_on';" onmouseout="this.className='button';" onClick="javascript:this.form.submit();">
					<img src='igep/custom/$custom/images/acciones/08.gif' style='border-style:none;' alt='Validar' title='Validar' /> Validar
				</button>
			</form>
		</div>
		<div id='titleLogin'>$status_desc</div>
		<div style='clear:both;'></div>
		<div id='footLogin'>
			<img src="igep/custom/$custom/images/logos/logo.gif">
		</div>
</div>

</body>
</html>
EOF;
}
?>