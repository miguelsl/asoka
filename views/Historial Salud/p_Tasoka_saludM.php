<?php

//MAESTRO
$comportamientoVentana= new IgepPantalla();
$panelMaestro = new IgepPanel('Tasoka_saludM',"smty_datosFichaM");
$panelMaestro->activarModo("fil","estado_fil");
$panelMaestro->activarModo("edi","estado_edi");
$datosPanel = $comportamientoVentana->agregarPanel($panelMaestro);

//DETALLES
//$panelDetalle = new IgepPanel("Tasoka_salud_analiticaD","smty_datosTablaTasoka_salud_analiticaD","smty_datosFichaTasoka_salud_analiticaD");
$panelDetalle = new IgepPanel("Tasoka_salud_analiticaD","smty_datosTasoka_salud_analiticaD");
//$panelDetalle->activarModo("lis","estado_lisDetalle");
$panelDetalle->activarModo("edi","estado_ediDetalle");
$botones = array('insertar','eliminar');
$s->assign("smty_botones",$botones);
 
$datosPanelDetalle = $comportamientoVentana->agregarPanelDependiente($panelDetalle,"Tasoka_saludM");

$panelDetalle = new IgepPanel('Tasoka_salud_vacunaD',"smty_datosTasoka_salud_vacunaD");
$panelDetalle->activarModo("lis","estado_lis");
$datosPanelDetalle = $comportamientoVentana->agregarPanelDependiente($panelDetalle,"Tasoka_saludM");

$panelDetalle = new IgepPanel('Tasoka_salud_desaparasitacionD',"smty_datosTasoka_salud_desaparasitacionD");
$panelDetalle->activarModo("lis","estado_lis");
$datosPanelDetalle = $comportamientoVentana->agregarPanelDependiente($panelDetalle,"Tasoka_saludM");

$detalles = array (
							array (
				"panelActivo" =>"Tasoka_salud_analiticaD",
				"titDetalle" =>"Anal&iacute;ticas"
				)
				,							array (
				"panelActivo" =>"Tasoka_salud_vacunaD",
				"titDetalle" =>"Vacunas"
				)
				,							array (
				"panelActivo" =>"Tasoka_salud_desaparasitacionD",
				"titDetalle" =>"Desparasitaci&oacute;n"
				)
				);				        
$panelActivo = IgepSession::dameVariable('Tasoka_saludM','panelDetalleActivo');

$modo=IgepSession::dameModulo('acceso');
if($modo['valor']==='total'){
   $s->assign('smty_acceso','total'); 
}
else $s->assign('smty_acceso','lectura');

$s->assign('smty_detalles',$detalles);
$s->assign('smty_panelActivo',$panelActivo);

$s->display('Historial Salud/p_Tasoka_saludM.tpl');
?>
