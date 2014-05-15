<?php

//Creamos una pantalla
$comportamientoVentana= new IgepPantalla();

//Creamos un panel
$panel1 = new IgepPanel('Tasoka_AdminUsers',"smty_datosTabla","smty_datosFicha");
//Activamos las pesta�as que necesitamos
$panel1->activarModo("edi","estado_edi");
$panel1->activarModo("lis","estado_lis");
$panel1->activarModo("fil","estado_fil");



//Agregamos el panel a la ventana
$comportamientoVentana->agregarPanel($panel1);
//Realizamos el display
$s->display('Administracion/p_Tasoka_adminusers.tpl');
?>