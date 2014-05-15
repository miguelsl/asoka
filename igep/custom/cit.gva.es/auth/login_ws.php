<?php
/**
 * Hace uso de la validacion cit a traves del Web Service en wscmn
 *
 * @package gvHIDRA
 */

include_once('igep/include_class.php');
include_once 'igep/custom/cit.gva.es/auth/AuthWS.php';

$msg = AuthWS::autenticate(ConfigFramework::getApplicationName());
if ($msg) {
	echo $msg;
}

?>
