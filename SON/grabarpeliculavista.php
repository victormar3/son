<?php 
session_start();
include('administrador/config/bd.php');
if($_POST["checkbox"] == 'on'){
    (int)$idUsu = $_SESSION['idUsu'];
    $idPeli = $_SESSION['idPeli'];
  
    $sentenciaSQL= $conexion->prepare("INSERT INTO pelisvistas (idUsu, idPeli) VALUES ('$idUsu', '$idPeli');");
    $sentenciaSQL->execute();
    

}else{

}



?>