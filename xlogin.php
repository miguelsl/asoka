<?php
/**
 * Hace uso de la validacion basica
 *
 * @package gvHIDRA
 */

include_once('igep/include_class.php');
include_once 'igep/include/valida/AuthBasic.php';
//include_once 'igep/custom/asoka/auth/AuthGva.php';
$msg = AuthBasic::autenticate(ConfigFramework::getConfig()->getApplicationName());
//$msg = AuthGva::autenticate(ConfigFramework::getApplicationName());
if ($msg) {
	echo $msg;
}

?>
