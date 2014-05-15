<?php
/**
 * Mensajes particulares a la aplicación
 * Variables globales:
 * - vector $g_mensajesParticulares
 * $Revision: 1.2 $
 */

//Variable de mensajes particulares de la aplicación.
global $g_mensajesParticulares;
$g_mensajesParticulares = array(
	'APL-1'=>array('descCorta'=>'ATENCIÓN: APLICACIÓN EN PRUEBAS.','descLarga'=>'Acabas de entrar en una aplicación en pruebas. Está basada en la versión inestable de gvHIDRA, por lo que puede contener errores. <br/><br/>El equipo gvHIDRA','tipo'=>'ALERTA'),
	'APL-2'=>array('descCorta'=>'No se puede realizar la operaci&oacute;n.','descLarga'=>'No puede eliminar una adopción si existe una devolución','tipo'=>'ERROR'),
	'APL-11'=>array('descCorta'=>'No se puede realizar la operaci&oacute;n.','descLarga'=>'No se puede realizar la operaci&oacute;n, el documento debe ser odt, doc, docx o pdf','tipo'=>'ERROR'),
	'APL-12'=>array('descCorta'=>'No se puede realizar la operaci&oacute;n.','descLarga'=>'No se puede realizar la operaci&oacute;n, error al actualizar la base de datos','tipo'=>'ERROR'),
	'APL-13'=>array('descCorta'=>'Operaci&oacute;n realizada con &eacute;xito.','descLarga'=>'Operaci&oacute;n realizada con exito.<br>Se cambi&oacute; la contraseña, salga de la aplicaci&oacute;n y vuelva a entra.','tipo'=>'AVISO'),
	'APL-14'=>array('descCorta'=>'No se puede realizar la operaci&oacute;n.','descLarga'=>'No se ha podido realizar la operaci&oacute;n. Las contraseñas no son iguales.','tipo'=>'ERROR'),
	'APL-15'=>array('descCorta'=>'Atenci&oacute;n!','descLarga'=>'Vas a cambiar tu contraseña, deseas continuar?','tipo'=>'ALERTA'),
 	'APL-44'=>array('descCorta'=>'Error al obtener el documento.','descLarga'=>'No se dispone de documento de entrada o hubo un error al obtenerlo.','tipo'=>'ERROR'),
  	'APL-46'=>array('descCorta'=>'Error al actualizar el informe de entrada.','descLarga'=>'No se pudo actualizar el informe de entrada.','tipo'=>'ERROR'),
 	'APL-48'=>array('descCorta'=>'Error al eliminar el informe.','descLarga'=>'No se pudo eliminar el informe de %0%.','tipo'=>'ERROR'),
    'APL-49'=>array('descCorta'=>'Informe eliminado con &eacute;xito.','descLarga'=>'El informe de %0% fue eliminado con &eacute;xito.<br/>Vuelva a editar el registro para continuar haciendo cambios.','tipo'=>'AVISO'),
	'APL-52'=>array('descCorta'=>'El documento no existe.','descLarga'=>'No se pudo realizar la operaci&oacute;n porque no existe documento de %0% asociado','tipo'=>'AVISO'),

);

?>