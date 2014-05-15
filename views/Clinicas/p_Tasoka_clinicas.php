<?php
    $comportamientoVentana= new IgepPantalla();

    $panel = new IgepPanel('Tasoka_clinicas',"smty_datosTabla","smty_datosFicha");
    $panel->activarModo("fil","estado_fil");
    $panel->activarModo("lis","estado_lis");
    $panel->activarModo("edi","estado_edi");
    $comportamientoVentana->agregarPanel($panel);
    
    $modo=IgepSession::dameModulo('acceso');
    if($modo['valor']==='total'){
       $s->assign('smty_acceso','total'); 
    }
    else $s->assign('smty_acceso','lectura');

    $s->display('Clinicas/p_Tasoka_clinicas.tpl');
?>