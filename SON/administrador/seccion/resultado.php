<?php 
session_start();
include('../config/bd.php');


?>

<?php
var_dump($_POST);

//$idSeri=  $_SESSION['idSeri'];
$idSeri =  $_SESSION['idSeri'];
var_dump($idSeri);
for ($i=0; $i < count($_POST)-1; $i++) { 
 for ($j=1; $j <= $_POST[$i]; $j++) { 
     $sentenciaSQL= $conexion->prepare("INSERT INTO temporadas (idSeri, descripcionTemporada, numeroCapitulo) VALUES ($idSeri, $i, $j)");
     $sentenciaSQL->execute();
     header("Location:series.php");
 }
}
?>