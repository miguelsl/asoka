<?php 

require 'include/MDB2Functions.php';
require 'include/DBConnection.php';
 
?>

<html>
<head>
<title>GENARO <?php echo $version = (is_string($conf->getVersion()) ? 'v.'.$conf->getVersion() : '');?> - Generador de Código gvHIDRA</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type='text/javascript' src='js/Genaro.js'></script>
<style>
#formPatronTabularRegistro  { display:none; }
#formPatronMaestroNDetalles { display:none; }
#formEliminaModulo { display:none; }
</style>

</head>
<body onload="onLoadPagina();">
<div id="pagina">
    <div id="cabecera">
        <h1>GENARO <span style="font-size: 16px;">
        	<?php echo $version = (is_string($conf->getVersion()) ? 'v.'.$conf->getVersion() : '');?></span>
        </h1>        
    </div>
<hr/>
	<h2 class="frase">Generador de Codigo gvHIDRA
	<br>
	<a style="font-size:12px;text-decoration:none;color:#a26636" href="doc/manual/html/index.html">Manual de referencia</a></h2>
        <div id="panelGenaro">
            <?php include('panelGenaro.php'); ?>
        </div>
        
        <div id="cierre">
        	&nbsp;
        </div>
</div>
</body>
</html>