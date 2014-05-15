<?php

global $g_aplicacion;
global $g_rutaCocoon;

if (IgepSession::existeVariable("Tasoka_listadoGeneral","lanzarInforme"))
 {

    
    if (IgepSession::existeVariable("Tasoka_listadoGeneral","infJasper_listadoGeneralJasper"))
    {
        $informeJ = & IgepSession::dameVariable("Tasoka_listadoGeneral","infJasper_listadoGeneralJasper");
        //print_r($informeJ);die;
        if (IgepSession::existeVariable("Tasoka_listadoGeneral","tipoListado"))
            $informeJ->createResultFile(IgepSession::dameVariable("Tasoka_listadoGeneral","tipoListado"));
        else
        
            $informeJ->createResultFile('pdf');
       // $informeJ->createResultFile('pdf');
        IgepSession::borraVariable("Tasoka_listadoGeneral","infJasper_listadoGeneralJasper");
    }
    /*
    if (IgepSession::existeVariable("TcomintListadoComunicaciones","infJasper_listadoComunicacionesReducidoJasper"))
    {
        $informeJ = & IgepSession::dameVariable("TcomintListadoComunicaciones","infJasper_listadoComunicacionesReducidoJasper");
        //print_r($informeJ);die;
        $informeJ->createResultFile('pdf');
        IgepSession::borraVariable("TcomintListadoComunicaciones","infJasper_listadoComunicacionesReducidoJasper");
    }
    */
    IgepSession::borraVariable("Tasoka_listadoGeneral","lanzarInforme");
}
else
{


///////////////77
    $comportamientoVentana= new IgepPantalla();

    $panel = new IgepPanel('Tasoka_listadoGeneral',"smty_datosTabla","smty_datosFicha");
    $panel->activarModo("fil","estado_fil");
    $comportamientoVentana->agregarPanel($panel);
    
    $s->display('listados/p_Tasoka_listadoGeneral.tpl');

}
    ?>