<?php

global $g_aplicacion;
global $g_rutaCocoon;

if (IgepSession::existeVariable("Tasoka_animales2","lanzarInforme"))
 {

    
    if (IgepSession::existeVariable("Tasoka_animales2","infJasper_listadoFichaJasper"))
    {
        $informeJ = & IgepSession::dameVariable("Tasoka_animales2","infJasper_listadoFichaJasper");
        //print_r($informeJ);die;
        if (IgepSession::existeVariable("Tasoka_animales2","tipoListado"))
            $informeJ->createResultFile(IgepSession::dameVariable("Tasoka_animales2","tipoListado"));
        else
        
            $informeJ->createResultFile('pdf');
       // $informeJ->createResultFile('pdf');
        IgepSession::borraVariable("Tasoka_animales2","infJasper_listadoFichaJasper");
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
    IgepSession::borraVariable("Tasoka_animales2","lanzarInforme");
}

    ?>