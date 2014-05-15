<?php
/**
 * This file implements the index.
 * 
 * PHP versions 4 and 5
 *
 * LICENSE:
 * 
 * This file is part of PhotoShow.
 *
 * PhotoShow is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * PhotoShow is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with PhotoShow.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @category  Website
 * @package   Photoshow
 * @author    Thibaud Rohmer <thibaud.rohmer@gmail.com>
 * @copyright 2011 Thibaud Rohmer
 * @license   http://www.gnu.org/licenses/
 * @link      http://github.com/thibaud-rohmer/PhotoShow-v2
 */

/// Start session
//session_start();
chdir('../..');

// inicialización framework
include_once('igep/include_class.php');
IgepSession::session_start();

$configuration = ConfigFramework::getConfig();
$custom = $configuration->getCustomDirName();


 if(isset($_REQUEST['db_usuario']))
	$valorUsuario = $_REQUEST['db_usuario'];
 else
	$valorUsuario = '';

 if(isset($_REQUEST['db_aplicacion']))
	$valorAplicacion = $_REQUEST['db_aplicacion'];
 else{
	$valorAplicacion = $configuration->getApplicationName();
 }
 

 if(isset($_REQUEST["db_tipo"]))
	$valorTipo = $_REQUEST["db_tipo"];
 else
	$valorTipo = 5; 
//print_r($_SESSION['_auth_'.$valorAplicacion]);
//echo "Nombre: ".$_SESSION['_auth_'.$valorAplicacion]['data']['nombre']."<br/>";
//echo "Usuario: ".$_SESSION['_auth_'.$valorAplicacion]['username']."<br/>";
//echo "Rol: ".$_SESSION['_auth_'.$valorAplicacion]['data']['rol']."<br/>";
//echo "Multimedia: ".$_SESSION['_auth_'.$valorAplicacion]['data']['multimedia']."<br/>";
//die;
$usuario['login']=$_SESSION['_auth_'.$valorAplicacion]['username'];
$usuario['nombre']=$_SESSION['_auth_'.$valorAplicacion]['data']['nombre'];
$usuario['rol']=$_SESSION['_auth_'.$valorAplicacion]['data']['rol'];
$usuario['activo']=$_SESSION['_auth_'.$valorAplicacion]['data']['activo'];
$usuario['modulos']=$_SESSION[$valorAplicacion]['modulos'];
$usuario['multimedia']=$_SESSION['_auth_'.$valorAplicacion]['data']['multimedia'];
//print_r($_SESSION[$valorAplicacion]['modulos']);
//die;	
	
	//echo "Usuario: ".$valorUsuario." App: ".$valorAplicacion." Tipo: ".$valorTipo;
	/*
	$dsn_con = $configuration->getDSN('g_my');
	if (empty($dsn_con)) {
		echo 'No existe el dsn para el Log';
	} else {
		//$dsn_log['username']='usu';
		$conexion = new IgepConexion($dsn_con);
		$db_pear = $conexion->getPEARConnection();
		if (PEAR::isError($db_pear)) {
			echo 'Error de conexión al debug: '.$db_pear->userinfo;
		} else {
		     $id    = $_REQUEST ['id'];
             $query = "SELECT foto FROM tasoka_animales  WHERE id = $id";
		     $resultDatos = $conexion->consultar($query);
		     if(is_array($resultDatos) && count($resultDatos)===1){
		          header("Content-type: jpg");
		              
                  echo $resultDatos[0]['foto'];
		     }
		    
		}
	}
*/
/*
/// Because we don't care about notices
if(function_exists("error_reporting")){
	error_reporting(E_ERROR | E_WARNING);
}
*/
/// Autoload classes
function my_autoload($class){
	if(file_exists(dirname(__FILE__)."/src/classes/$class.php")){
		require(dirname(__FILE__)."/src/classes/$class.php");
	}else{
		return FALSE;
	}
}

spl_autoload_register("my_autoload");

/// Take care of nasty exceptions
function exception_handler($exception) {
  echo "<div class='exception'>" , $exception->getMessage(), "</div>\n";
}
set_exception_handler('exception_handler');

ini_set('upload_max_filesize','10M');

function protect_user_send_var($var){
	if(is_array($var))
		return array_map('protect_user_send_var', $var);
	else 
		return addslashes($var);
}


if (!get_magic_quotes_gpc()){
	$_POST = protect_user_send_var($_POST);
	$_COOKIE = protect_user_send_var($_COOKIE);
	$_GET = protect_user_send_var($_GET);
}

if(isset($_SERVER['CONTENT_TYPE']) && $_SERVER['CONTENT_TYPE'] == 'text/xml'){
	new API();
}else{

	new Index($usuario);
}
?>
