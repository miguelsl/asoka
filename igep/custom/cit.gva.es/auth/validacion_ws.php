<?php
/**
 * Validacion de usuarios: comprueba en cada acceso si el usuario puede entrar
 * 
 * Es una clase estática. 
 *
 * @package	gvHIDRA
 */

require_once 'AuthWS.php';

class validacion 
{

   /**
    * Validación normal, con todas las comprobaciones
    * Se invoca al inicio de la aplicacion y carga la informacion del usuario en la sesion
    *
    * @access public
    */
	static function valida($apli, $sesion=TRUE) 
	{	
		$auth_container = new AuthWS($apli);
		$aut = new Auth($auth_container,'','',false);
		$aut->setSessionName($apli);
		$aut->start();
		if (!$aut->checkAuth())
			exit('No estás validado; Vuelve a la pantalla de conexión.');

		if (!isset($_SESSION[$apli]['usuario'])){
			if (!isset($_SESSION[$apli]))
				$_SESSION[$apli] = array();
			$_SESSION[$apli] = $auth_container->postLogin($_SESSION[$apli],$aut);
			
			$datos = $auth_container->getDatos();
			$datos['aplicacion'] = $apli;
			$_SESSION['validacion'] = $datos;

			$auth_container->checkData($_SESSION, $apli);
		}
	}

}

?>