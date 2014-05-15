<?php
/**
 * Ficheros a incluir
 * $Revision: 1.2 $
 */

$al = GVHAutoLoad::singleton();

$al->registerClass('AppMainWindow', 'actions/principal/AppMainWindow.php');

// Registramos las clases que tengamos 
// $al->registerClass('NomClase','ruta a la clase');

$al->registerClass('Tasoka_especie','actions/Especies/Tasoka_especie.php');
$al->registerClass('Tasoka_bacteria','actions/Bacterias/Tasoka_bacteria.php');
$al->registerClass('Tasoka_clinicas','actions/Clinicas/Tasoka_clinicas.php');
$al->registerClass('Tasoka_razas','actions/Razas/Tasoka_razas.php');
$al->registerClass('Tasoka_vacunas','actions/Vacunas/Tasoka_vacunas.php');
$al->registerClass('Tasoka_adopcionM','actions/Adopciones/Tasoka_adopcionM.php');

$al->registerClass('Tasoka_adopcionD','actions/Adopciones/Tasoka_adopcionD.php');
$al->registerClass('Tasoka_saludM','actions/Historial Salud/Tasoka_saludM.php');
$al->registerClass('Tasoka_salud_analiticaD','actions/Historial Salud/Tasoka_salud_analiticaD.php');
$al->registerClass('Tasoka_salud_vacunaD','actions/Historial Salud/Tasoka_salud_vacunaD.php');
$al->registerClass('Tasoka_salud_desaparasitacionD','actions/Historial Salud/Tasoka_salud_desaparasitacionD.php');
$al->registerClass('Tasoka_animales','actions/Asoketes/Tasoka_animales.php');
$al->registerClass('Tasoka_AdminUsers','actions/Administracion/Tasoka_AdminUsers.php');
$al->registerClass('Tasoka_CambioClave','actions/Administracion/Tasoka_CambioClave.php');

//
$al->registerClass('Tasoka_salud_analitica2D','actions/Asoketes2/Tasoka_salud_analitica2D.php');
$al->registerClass('Tasoka_salud_biopsia2D','actions/Asoketes2/Tasoka_salud_biopsia2D.php');
$al->registerClass('Tasoka_salud_vacuna2D','actions/Asoketes2/Tasoka_salud_vacuna2D.php');
$al->registerClass('Tasoka_salud_desaparasitacion2D','actions/Asoketes2/Tasoka_salud_desaparasitacion2D.php');
$al->registerClass('Tasoka_animales2','actions/Asoketes2/Tasoka_animales2.php');
$al->registerClass('Tasoka_adopcion2D','actions/Asoketes2/Tasoka_adopcion2D.php');

//Listados
$al->registerClass('Tasoka_listadoGeneral','actions/listados/Tasoka_listadoGeneral.php');
