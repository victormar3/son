<?php 
session_start();
?>
<!doctype html>
<html lang="es">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar bg-warning fixed-top " >

            <?php $url="http://".$_SERVER['HTTP_HOST']."/Proyecto-Junio/SON/administrador"?>

            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#MenuNavegacion">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="MenuNavegacion" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link nav-text" href="#"><img src="../../img/logop.png" width="50" height="40"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $url;?>/index.php">Incio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $url;?>/seccion/peliculas.php">Ad.Peliculas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $url;?>/seccion/series.php">Ad.Series</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $url;?>/seccion/nosotros.php">Ad.Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $url;?>/administrador/seccion/cerrar.php">Cerrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $url;?>/../index.php">Inicio sesion</a>
                    </li>
                </ul>
            </div>

        </nav>
    </header>
    <br><br><br><br>
 



