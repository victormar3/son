<?php 

if($_SESSION['rolUsu'] == 'Administrador'){
$host="localhost";
$bd="sitio";
$usuario="Administrador";
$contrasenia="Administrador";
$conec = mysqli_connect('localhost', 'Administrador', 'Administrador', 'sitio');
try {

    $conexion=new PDO("mysql:host=$host;dbname=$bd",$usuario,$contrasenia);
    

} catch ( Exception $ex) {
    echo $ex->getMessage();
}

}else{
    $host="localhost";
$bd="sitio";
$usuario="Miembro";
$contrasenia="Miembro";

try {

    $conexion=new PDO("mysql:host=$host;dbname=$bd",$usuario,$contrasenia);
    

} catch ( Exception $ex) {
    echo $ex->getMessage();
}
}
?>