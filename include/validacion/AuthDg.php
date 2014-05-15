<?php
/**
 * Validacion de usuarios: configuracion personalizable por el usuario
 * Hace uso del PEAR::Auth
 *
 * @package gvHIDRA
 */

include_once 'igep/include/valida/gvhBaseAuth.php';


class AuthDg extends gvhBaseAuth
{
    static $captcha;
   
    
    
     function __construct()
    {
		parent::__construct();
		$this->datos=array(
			'bd'=>'ASOKA',	// servidor bd
			'server'=>'http://localhost',		// servidor web
		);
		$this->nombre="";
		$this->rol="";
		$this->activo="";
		$this->multimedia="";
		$this->solo_lectura="";
    }
    
    function getDatos()
    {
        return $this->datos;
    }
    
    function getNombre()
    {

        return $this->nombre;
    }
    
    function getRol()
    {
    	return $this->rol;
    }
    
    function getActivo()
    {
    	return $this->activo;
    }
    
    function getMultimedia(){
        
        return $this->multimedia;
        
    }

    function getSoloLectura(){
        
        return $this->solo_lectura;
        
    }
    
    
    public function fetchData($username, $password, $isChallengeResponse=false) {


		//CAPTCHA
		//Validamos que el texto introducido coincide con el captcha generado. Hacemos antes decript porque hemos cifrado para evitar ataques con robots
		$string = self::$captcha;
		$key = 'ejemplo';

		$result = '';
		$string = rawurldecode($string);
		for($i=0; $i<strlen($string); $i++) {
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			$char = chr(ord($char)-ord($keychar));
			$result.=$char;
		}
		$texto_captcha = $result;
        
    	if (strtoupper($_REQUEST['captcha']) != $texto_captcha)
			return false;

        //Validamos usuario y contraseña
        //Para Autenticar con acceso a una tabla:
        
		$conf = ConfigFramework::getConfig();


 		$dsn = $conf->getDSN('g_my');

    	// simulamos Auth MDB2
    	$g_error = new IgepError();
    	$conexion = new IgepConexion($dsn);
	
    	//IMPORTANTE: ESCAPAR ENTRADA PARA EVITAR SQL INJECTION
    	$conexion->prepararOperacion($username,TIPO_CARACTER);
    	$res = $conexion->obj_conexion->query('SELECT * FROM acceso where login'."='$username' and password='".md5($password)."'");
 	
	if (PEAR::isError($res))   {
    		 print_r("Error al comprobar usuario. Consulte con el administrador");
    		 die;
    	}
 
        if($res->numRows()==1){
        //if($username=='invitado' and md5('salto-pre'.$password.'salto-post')=='19fda1814a6fc1c51c6ceb14ea92fba7') {
            // Perform Some Actions
        	$row=$res->fetchRow( DB_FETCHMODE_ASSOC);
        	
        	$this->nombre=$row['nombre'];
        	$this->rol=$row['rol'];
        	$this->activo=$row['activo'];
            $this->multimedia=$row['multimedia'];
            $this->solo_lectura=$row['solo_lectura'];
            return true;
        }
	return false;
    }
    

    /**
     * Inicializa variables en la sesión que recibe.
     * Se ejecuta la primera vez que accede a la aplicación
     */
    public function postLogin($sess, $auth=null) {

    	//Para Autorizar con acceso a tablas:
        /*
		$conf = ConfigFramework::getConfig();
 		$dsn = $conf->getDSN('g_dsn');
    	
    	$usuario = $sess['usuario']['usuario'];
		
		...
		
		*/
    	
    	//print_r("Rol: ".$auth->getAuthData('rol'));
        //die;	
    	$sess['usuario']['nombre']='Usuario: '.$auth->getAuthData('nombre');
       // if ($sess['usuario']['rol'] == 'admin')
        if ($auth->getAuthData('rol') === 'admin')
    	    $sess['rolusuar'] = 'admin';
    	elseif ($auth->getAuthData('rol') === 'informatico')
    	    $sess['rolusuar'] = 'informatico';    
        else
            $sess['rolusuar'] = 'user';
            
        if($auth->getAuthData('solo_lectura') === 'N')    {
        $sess['modulos'] = array('acceso'=>array('descrip'=>'permiso de acceso',
                                                 'valor'=>'total',),
                                );
        }
        else{
        $sess['modulos'] = array('acceso'=>array('descrip'=>'permiso de acceso',
                                                 'valor'=>'lectura',),
                                );
        }
        
        $sess['daplicacion'] = 'Aplicación de Gestion de Albergue';
        return $sess;
    }

	/**
	 * Metodo para llamar desde aplicaciones, en la autenticacion inicial
	 * 
	 * Devuelve cadena vacia si todo va bien, o texto si error
	 */
	static function autenticate($p_apli)
	{global $options;
		$auth_container = new self($p_apli);
		IgepSession::session_start($p_apli, false);
		$aut = new Auth($auth_container,'','loginFunction');
		
		$aut->setAdvancedSecurity ( array(
    			AUTH_ADV_USERAGENT => true,
    			AUTH_ADV_IPCHECK   => true,
    			AUTH_ADV_CHALLENGE => true
		));
		$aut->setSessionName($p_apli);
		//Almacenamos el valor de la cadena generada
		self::$captcha = $aut->getAuthData('captcha');
		
		if (isset($_GET['logout']))
			$aut->logout();
		
		
		$aut->start();
		
		$nombre=$auth_container->getNombre();
		
		//print_r("NOM: ".$nombre);
		//die;
		if ($aut->checkAuth()) {		
		    $aut->setAuthData('nombre',$auth_container->getNombre());
		    $aut->setAuthData('rol',$auth_container->getRol());	
		    $aut->setAuthData('activo',$auth_container->getActivo());		
		    $aut->setAuthData('multimedia',$auth_container->getMultimedia());		
		    $aut->setAuthData('solo_lectura',$auth_container->getSoloLectura());	
			$auth_container->open('include/validacion/validacionDg.php');
		}
		return '';
	}

}

function randomText($length) {
    $pattern = "123456789abcdefghijklmnpqrstuvwxyz";
    $pattern = strtoupper($pattern);
    $key = '';
    for($i=0; $i<$length; $i++) {
      $key .= $pattern{rand(0,33)};
    }
    return $key;
}


function loginFunction($username = null, $status = null, &$auth = null) {
		$status_desc = '';
		
		if(!empty($status)) {
			sleep(3);
		}
		
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

		//Encriptacion
        $string = randomText(4);
        $key = 'ejemplo';
        //echo $texto_captcha;
		$result = '';
		for($i=0; $i<strlen($string); $i++) {
	    	$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			$char = chr(ord($char)+ord($keychar));
			$result.=$char;
		}
		$texto_captcha = rawurlencode($result);
        
        $auth->setAuthData('captcha',$texto_captcha);
        
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
				<br/>
				<div id='inputLogin'><img src="include/validacion/image.php?text=$texto_captcha"></div>
				<br/>
				<div id='textLogin'>Texto de la imagen:</div>
				<div id='inputLogin'><input type="text" name="captcha" size=5 class="text edit"></div>				
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
