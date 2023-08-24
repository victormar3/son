<?php include("template/cabecera.php")?>
<?php 
include("administrador/config/bd.php");
require 'administrador/config/config.php';

            // Consulta para mostrar todos los libros
            
        if(isset($_SESSION['usuarioUsu'])){
$sentenciaSQL= $conexion->prepare("SELECT* FROM series");
$sentenciaSQL->execute();
$listaSeries=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
}else{
    header('Location:index.php');
}
?>
<main class="container center" >
<div class="row">
<?php foreach( $listaSeries as $serie ){?>
<div class="col-md-2">

    <div class="card">

    <img class="card-img-top" src="./img/<?php echo $serie['imagenSeri'];?>" alt="">

    <div class="card-body">
        <h4 class="card-title"><?php echo $serie['tituloSeri'];?></h4>
        <a name="" id="<?php echo $serie['idSeri'];?>" class="btn btn-primary" href="detailsSerie.php?id=<?php echo $serie['idSeri'];?>&token=<?php echo hash_hmac('sha1',$serie['idSeri'], KEY_TOKEN);?>" role="button"> Ver más </a>
    </div>

    </div>

</div>
        
<?php }?>
</div>
</main>
<?php include("template/pie.php")?>