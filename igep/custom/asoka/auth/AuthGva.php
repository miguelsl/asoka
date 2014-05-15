<?php
/**
 * Validacion de usuarios: configuracion personalizable por el usuario
 * Hace uso del PEAR::Auth
 *
 * @package gvHIDRA
 */

include_once 'igep/include/valida/gvhBaseAuth.php';


$options_gva = array('host'=>'imap.gva.es', 'port'=>'143',);
$options = array('dsn'         => 'mysql://ae_asoka:aeasoka@localhost/asoka',
		 		 'table'	=> 'acceso',
                 'usernamecol' => 'login',
                 'passwordcol' => 'password',
				 'cryptType'   => 'MD5',
				 'db_fields'   => array('nombre','rol','activo'),
                 'db_options'  => array('portability' => MDB2_PORTABILITY_ALL ^ MDB2_PORTABILITY_FIX_CASE)
                );
class AuthGva extends gvhBaseAuth
{
/*
    function __construct()
    {
		parent::__construct();
		$this->datos=array(
			'bd'=>'GUS',	// servidor bd
			'server'=>'http://localhost',		// servidor web
		);
    }


    function fetchData($username, $password)
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
    */
    /**
     * Inicializa variables en la sesión que recibe.
     * Se ejecuta la primera vez que accede a la aplicación
     */
function postLogin($sess, $aut=null)
    {   
        $sess['usuario']['nombre']='Usuario: '.$sess['usuario']['nombre'];
        if ($sess['usuario']['rol'] == 'admin')
            $sess['rolusuar'] = 'admin';
        else
            $sess['rolusuar'] = 'user';
        $sess['modulos'] = array('ciudad'=>array('descrip'=>'ciudad del usuario',
                                                 'valor'=>'Valencia',),
                                );
        $sess['daplicacion'] = 'Aplicación de Gestion de Albergue';
        return $sess;
    }

/*
    function postLogin($sess)
    {
    	$sess['usuario']['nombre']='Usuario Invitado';
		$sess['rolusuar'] = 'perfil_por_definir';
		$sess['modulos'] = array();
		$sess['daplicacion'] = 'Aplicación de Gestion de USuarios';
    	return $sess;
    }
*/
	/**
	 * Metodo para llamar desde aplicaciones, en la autenticacion inicial
	 * 
	 * Devuelve cadena vacia si todo va bien, o texto si error
	 */

 static function autenticate($p_apli)
    {
        global $options_gva;
global $options;
	IgepSession::session_start($p_apli, false);
//$options_gva = array('host'=>'pop3.gva.es', 'port'=>'143',);
        //$aut = new Auth('IMAP',$options_gva);
        $aut = new Auth('MDB2', $options, 'loginFunctionfff');
       
		$aut->setSessionName($p_apli);
        if (isset($_GET['logout']) )
            $aut->logout();

        $aut->start();
        
        if ($aut->checkAuth()) {
            $auth_container = new self();
            $auth_container->open('igep/custom/asoka/auth/validacionGva.php');
        }

        return '';
    }


/*
	static function autenticate($p_apli)
	{
		$auth_container = new self($p_apli);

		IgepSession::session_start($p_apli, false);
		$aut = new Auth($auth_container);
		$aut->setSessionName($p_apli);
		if (isset($_GET['logout']))
			$aut->logout();
		$aut->start();
		
		if ($aut->checkAuth()) {
			$auth_container->open('igep/include/valida/validacion.php');
		}
		return '';
	}
*/

}

?>
