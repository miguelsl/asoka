<?php


//MAESTRO
$comportamientoVentana= new IgepPantalla();
$panelMaestro = new IgepPanel('Tasoka_animales2',"smty_datosFicha");
$panelMaestro->activarModo("fil","estado_fil");

$panelMaestro->activarModo("edi","estado_edi");
$datosPanel = $comportamientoVentana->agregarPanel($panelMaestro);

//DETALLES
//$panelDetalle = new IgepPanel("Tasoka_salud_analiticaD","smty_datosTablaTasoka_salud_analiticaD","smty_datosFichaTasoka_salud_analiticaD");

if(count(IgepSession::dameUltimaConsulta("Tasoka_animales2"))>0){
    
$panelDetalle = new IgepPanel("Tasoka_salud_analitica2D","smty_datosTasoka_salud_analitica2D");
$panelDetalle->activarModo("edi","estado_ediDetalle");
$botones = array('insertar','eliminar');
$s->assign("smty_botones",$botones);
$datosPanelDetalle = $comportamientoVentana->agregarPanelDependiente($panelDetalle,"Tasoka_animales2");


$panelDetalle = new IgepPanel("Tasoka_salud_biopsia2D","smty_datosTasoka_salud_biopsia2D");
$panelDetalle->activarModo("edi","estado_ediDetalle");
$botones = array('insertar','eliminar');
$s->assign("smty_botones",$botones);
$datosPanelDetalle = $comportamientoVentana->agregarPanelDependiente($panelDetalle,"Tasoka_animales2");


$panelDetalle = new IgepPanel('Tasoka_salud_vacuna2D',"smty_datosTasoka_salud_vacuna2D");
$panelDetalle->activarModo("lis","estado_lis");
$datosPanelDetalle = $comportamientoVentana->agregarPanelDependiente($panelDetalle,"Tasoka_animales2");

$panelDetalle = new IgepPanel('Tasoka_salud_desaparasitacion2D',"smty_datosTasoka_salud_desaparasitacion2D");
$panelDetalle->activarModo("lis","estado_lis");
$datosPanelDetalle = $comportamientoVentana->agregarPanelDependiente($panelDetalle,"Tasoka_animales2");




$panelDetalle = new IgepPanel('Tasoka_adopcion2D',"smty_datosTablaD","smty_datosFichaD");
$panelDetalle->activarModo("lis","estado_lisDetalle");
$panelDetalle->activarModo("edi","estado_ediDetalle");
$comportamientoVentana->agregarPanelDependiente($panelDetalle,"Tasoka_animales2");


$detalles = array (
							array (
				"panelActivo" =>"Tasoka_salud_analitica2D",
				"titDetalle" =>"Anal&iacute;ticas"
				)
				,		array (
				"panelActivo" =>"Tasoka_salud_biopsia2D",
				"titDetalle" =>"Biopsias"
				)
				,		array (
				"panelActivo" =>"Tasoka_salud_vacuna2D",
				"titDetalle" =>"Vacunas"
				)
				,			array (
				"panelActivo" =>"Tasoka_salud_desaparasitacion2D",
				"titDetalle" =>"Desparasitaci&oacute;n"
				)
				,			array (
				"panelActivo" =>"Tasoka_adopcion2D",
				"titDetalle" =>"Adopciones"
				)
				
				);				        
$panelActivo = IgepSession::dameVariable('Tasoka_animales2','panelDetalleActivo');


 
$s->assign('smty_detalles',$detalles);
$s->assign('smty_panelActivo',$panelActivo);
}
$modo=IgepSession::dameModulo('acceso');
if($modo['valor']==='total'){
   $s->assign('smty_acceso','total'); 
}
else $s->assign('smty_acceso','lectura');
  
$s->display('Asoketes2/p_Tasoka_animales2.tpl');

?>
