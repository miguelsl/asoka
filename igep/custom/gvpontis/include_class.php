<?php
//Clase para la pantalla inicial
include_once('igep/custom/gvpontis/actions/CustomMainWindow.php');

// Clases que solo se cargan si es necesario
$al = GVHAutoLoad::singleton();
$al->registerClass('typeNIF', 'igep/custom/gvpontis/types/typeNIF.php');
?>