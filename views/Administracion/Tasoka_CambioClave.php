<?php
    $comportamientoVentana= new IgepPantalla();

    $panel = new IgepPanel('Tasoka_CambioClave',"smty_datosFicha");
  //  $panel->activarModo("fil","estado_fil");
    $panel->activarModo("edi","estado_edi");
    $comportamientoVentana->agregarPanel($panel);

    $s->display('Administracion/p_Tasoka_cambioclave.tpl');
?>