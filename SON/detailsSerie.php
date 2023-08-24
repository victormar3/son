<?php include("template/cabecera.php")?>
<?php 
include("administrador/config/bd.php");
require 'administrador/config/config.php';


$idSeri = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';
session_start();


if(isset($_SESSION['usuarioUsu'])){
    if($idSeri == '' || $token == '') {
        echo 'Error al procesar la petición';
        exit;
    }else{
        $token_tmp = hash_hmac('sha1', $idSeri, KEY_TOKEN);

        if ($token == $token_tmp){
            $sentenciaSQL= $conexion->prepare("SELECT count(idSeri) FROM series WHERE idSeri=?");
            $sentenciaSQL->execute([$idSeri]);
            if($sentenciaSQL->fetchColumn() > 0) {
                $sentenciaSQL= $conexion->prepare("SELECT tituloOriginalSeri, imagenSeri FROM series WHERE idSeri=?");
                $sentenciaSQL->execute([$idSeri]);
                $serie = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);
                $nombre=$serie['tituloOriginalSeri'];
                $imagenSeri=$serie['imagenSeri'];

            }
            
        }else{
            echo 'Error al procesar la petición';
            exit;
        }

    }
}else{
    header('Location:index.php');
}


// Consulta para mostrar todos los libros


?>
<main class=container>

<div class="row">

<div class="col-sm-4">
   <img src="img/<?php echo $serie['imagenSeri'];?>" width="250" height="500">
   <p><?php echo $serie['tituloOriginalSeri'];?> </p>
</div>
<div class="col-sm-8">
    
    <table class="table table-bordered text-center" id="tabla">
        <tr>
        
            <th><?php echo $serie['tituloOriginalSeri'];?></th>
            <th><?php echo $serie['tituloOriginalSeri'];?></th>
            <th><?php echo $serie['tituloOriginalSeri'];?></th>
            <th><?php echo $serie['tituloOriginalSeri'];?></th>
            <th><?php echo $serie['tituloOriginalSeri'];?></th>

        </tr>
    </table>

    
</div>
</div>
</main>

<?php include("template/pie.php")?>