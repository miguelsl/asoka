<?php

// Clase para la pantalla inicial
include_once('igep/custom/cit.gva.es/actions/CustomMainWindow.php');

// Clases que solo se cargan si es necesario
$al = GVHAutoLoad::singleton();
$al->registerClass('typeNIF', 'igep/custom/cit.gva.es/types/typeNIF.php');
$al->registerClass('CorreoCITMA', 'igep/custom/cit.gva.es/class/CorreoCITMA.php');
?>
