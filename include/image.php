<?php

if(isset($_REQUEST['id']))
{
 

$mysqli = new mysqli("localhost", "ae_asoka", "aeasoka", "asoka");

/* verificar la conexión */
if (mysqli_connect_errno()) {
    printf("Conexion fallida: %s\n", mysqli_connect_error());
    exit();
}

  $id    = $_REQUEST ['id'];
  $query = "SELECT nombre,foto FROM tasoka_animales where id=$id  ";
$result = $mysqli->query($query);
 

/* array asociativo */
$row = $result->fetch_array(MYSQLI_ASSOC);
printf ("%s", $row["foto"]);


/* liberar la serie de resultados */
$result->free();

/* cerrar la conexión */
$mysqli->close();
}
?>