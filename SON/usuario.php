
<?php include("template/cabecera.php")?>
<?php 
include("administrador/config/bd.php");





if(isset($_SESSION['usuarioUsu'])){
    $usuarioUsu = $_SESSION['usuarioUsu'];
    $sentenciaSQL= $conexion->prepare("SELECT * FROM usuarios WHERE usuarioUsu = '$usuarioUsu';");

     $sentenciaSQL->execute();
     $usuario = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);
     $idUsu = $usuario['idUsu'];
     $nombreUsu=$usuario['nombreUsu'];
     $contraseniaUsu = $usuario['contraseniaUsu'];	

     $query = "SELECT SUM(peliculas.duracionPeli) AS duracion_total
     FROM pelisvistas
     JOIN usuarios ON pelisvistas.idUsu = usuarios.idUsu
     JOIN peliculas ON pelisvistas.idPeli = peliculas.idPeli
     WHERE usuarios.idUsu = :idUsu";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':idUsu', $idUsu);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    $duracionTotal = $resultado['duracion_total'];
    
    
}else{
    header('Location:index.php');
}

// Consulta para mostrar todos los libros


?>
<main class=container>
    <div class="row">
        <div class="col-md-8 text-warning">
        <h1>Bienvenido <?php echo $nombreUsu;?></h1>
        </div>
        
    </div>
    <div class="row">
        
        
        <div class="col-md-8">
            <br><br><br><br><br><br><br><br>
            <div class="row text-center ">
                
                
                <div class="col-md-2">
                    <th>Tiempo invertido en ver peliculas<br><spam class="text-warning"><?php echo $duracionTotal;?></spam></th>
                </div>
                <div class="col-md-2">
                    <th>Año<br><spam ><?php echo $pelicula['anioPeli'];?></spam></th>
                </div>
                <div class="col-md-2">
                    <th>Duracion<br><spam ><?php echo $pelicula['duracionPeli'];?></spam></th>
                </div>
                <div class="col-md-2">
                    <th>Clasificacion por edad<br><spam ><?php echo $pelicula['clasificacionEdadPeli'];?></spam></th>
                </div>
                <div class="col-md-2">
                    <th>Pais<br><spam ><?php echo $pelicula['paisPeli'];?></spam></th>
                </div>
                
            </div>

            <br><br>

            
            <br><br>
            
            <p class="text-center">Sinopsis</p>
            <p class="text-warning"><?php echo $pelicula['sinopsisPeli'];?></p>
            
        </div>
    </div>
</main>

<?php include("template/pie.php")?>