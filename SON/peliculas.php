<?php include("template/cabecera.php")?>
<?php 
include("administrador/config/bd.php");
require 'administrador/config/config.php';

            // Consulta para mostrar todos los libros
            
        if(isset($_SESSION['usuarioUsu'])){
$sentenciaSQL= $conexion->prepare("SELECT* FROM peliculas");
$sentenciaSQL->execute();
$listaPeliculas=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
}else{
    header('Location:index.php');
}
?>

<main class="container center" >
<div class="row">
<?php foreach( $listaPeliculas as $pelicula ){?>
    
    <div class="col-md-2">

    <div class="card">

    <img class="card-img-top" src="./img/<?php echo $pelicula['imagenPeli'];?>" alt="">

    <div class="card-body">
        <h4 class="card-title"><?php echo $pelicula['tituloPeli'];?></h4>
        <a name="" id="<?php echo $pelicula['idPeli'];?>" class="btn btn-warning" href="detailsPelicula.php?id=<?php echo $pelicula['idPeli'];?>&token=<?php echo hash_hmac('sha1',$pelicula['idPeli'], KEY_TOKEN);?>" role="button"> Ver más </a>
    </div>

    </div>

    </div>
<?php }?>

</div>
</main>
<?php include("template/pie.php")?>