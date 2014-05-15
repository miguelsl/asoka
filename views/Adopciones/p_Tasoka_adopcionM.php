<?php

//Tasoka_adopcionM
$comportamientoVentana= new IgepPantalla();

$panelMaestro = new IgepPanel('Tasoka_adopcionM',"smty_datosFichaM");
$panelMaestro->activarModo("fil","estado_fil");
$panelMaestro->activarModo("edi","estado_edi");
$comportamientoVentana->agregarPanel($panelMaestro);

//Tasoka_adopcionD
if(count(IgepSession::dameUltimaConsulta("Tasoka_adopcionM"))>0){
	$panelDetalle = new IgepPanel('Tasoka_adopcionD',"smty_datosTablaD","smty_datosFichaD");
	$panelDetalle->activarModo("lis","estado_lisDetalle");
	$panelDetalle->activarModo("edi","estado_ediDetalle");
	$comportamientoVentana->agregarPanelDependiente($panelDetalle,"Tasoka_adopcionM");
}
$modo=IgepSession::dameModulo('acceso');
if($modo['valor']==='total'){
   $s->assign('smty_acceso','total'); 
}
else $s->assign('smty_acceso','lectura');
$s->display('Adopciones/p_Tasoka_adopcionM.tpl');

?>