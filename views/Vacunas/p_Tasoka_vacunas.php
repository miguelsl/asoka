<?php
    $comportamientoVentana= new IgepPantalla();

    $panel = new IgepPanel('Tasoka_vacunas',"smty_datosTabla","smty_datosFicha");
    $panel->activarModo("fil","estado_fil");
    $panel->activarModo("lis","estado_lis");
    $comportamientoVentana->agregarPanel($panel);
    
    $modo=IgepSession::dameModulo('acceso');
    if($modo['valor']==='total'){
       $s->assign('smty_acceso','total'); 
    }
    else $s->assign('smty_acceso','lectura');

    $s->display('Vacunas/p_Tasoka_vacunas.tpl');
?>