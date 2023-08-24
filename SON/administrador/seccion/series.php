<?php include("../template/cabecera.php");?>
<main class=container>

    <div class="row">
<center>
    <div class="row">
    
        <form method="POST" enctype="multipart/form-data">

        <a class="btn btn-success" href="peliculas.php" role="button">Peliculas</a>
    <a class="btn btn-warning" href="series.php" role="button">Series</a>
    <a class="btn btn-primary" href="usuarios.php" role="button">Usuarios</a>

        </form>
                

    </div>
</center>
<br><br>   
    <?php 
    
    
                

                    $idSeri=(isset($_POST['idSeri']))?$_POST['idSeri']:"";
                    
                    $tituloSeri=(isset($_POST['tituloSeri']))?$_POST['tituloSeri']:"";
                    $imagenSeri=(isset($_FILES['imagenSeri']['name']))?$_FILES['imagenSeri']['name']:"";
                    $tituloOriginalSeri=(isset($_POST['tituloOriginalSeri']))?$_POST['tituloOriginalSeri']:"";
                    $anioSeri=(isset($_POST['anioSeri']))?$_POST['anioSeri']:"";
                    $duracionSeri=(isset($_POST['duracionSeri']))?$_POST['duracionSeri']:"";
                    $temporadasTotalesSeri=(isset($_POST['temporadasTotalesSeri']))?$_POST['temporadasTotalesSeri']:"";
                    $_SESSION['temporadasTotalesSeri']= $temporadasTotalesSeri;
                    $clasificacionEdadSeri=(isset($_POST['clasificacionEdadSeri']))?$_POST['clasificacionEdadSeri']:"";
                    $paisSeri=(isset($_POST['paisSeri']))?$_POST['paisSeri']:"";
                    $generosSeri=(isset($_POST['generosSeri']))?$_POST['generosSeri']:"";
                    $sinopsisSeri=(isset($_POST['sinopsisSeri']))?$_POST['sinopsisSeri']:"";
                    $repartoSeri=(isset($_POST['repartoSeri']))?$_POST['repartoSeri']:"";
                    $direccionSeri=(isset($_POST['direccionSeri']))?$_POST['direccionSeri']:"";
                    $escrituraSeri=(isset($_POST['escrituraSeri']))?$_POST['escrituraSeri']:"";
                    $camaraSeri=(isset($_POST['camaraSeri']))?$_POST['camaraSeri']:"";
                    $sonidoSeri=(isset($_POST['sonidoSeri']))?$_POST['sonidoSeri']:"";
                    $produccionSeri=(isset($_POST['produccionSeri']))?$_POST['produccionSeri']:"";
                    $edicionSeri=(isset($_POST['edicionSeri']))?$_POST['edicionSeri']:"";
                    $arteSeri=(isset($_POST['arteSeri']))?$_POST['arteSeri']:"";
                    $efectosVisualesSeri=(isset($_POST['efectosVisualesSeri']))?$_POST['efectosVisualesSeri']:"";
                    $notaSeri=(isset($_POST['notaSeri']))?$_POST['notaSeri']:"";
                    $equipoSeri=(isset($_POST['equipoSeri']))?$_POST['equipoSeri']:"";
                    $estadoSeri="Activo";
                    $accion=(isset($_POST['accion']))?$_POST['accion']:"";
                    $_SESSION['accion'] = $accion;
                    include('../config/bd.php');

                    switch($accion){

                        case "Agregar":

                                $fecha = new DateTime();
                                $nombreArchivo = ($imagenSeri!="")?$fecha->getTimestamp()."_".$_FILES["imagenSeri"]["name"]:"imagen.jpg";
                                $tmpImagen = $_FILES["imagenSeri"]["tmp_name"];
        
                                 if($tmpImagen!=""){

                                    move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);

                                }

                                $sentenciaSQL= $conexion->prepare("INSERT INTO series (tituloSeri, tituloOriginalSeri, anioSeri, duracionSeri, temporadasTotalesSeri, clasificacionEdadSeri, paisSeri, generosSeri, sinopsisSeri, repartoSeri, direccionSeri, escrituraSeri, camaraSeri, sonidoSeri, produccionSeri, edicionSeri, arteSeri, efectosVisualesSeri, equipoSeri, imagenSeri, notaSeri, estadoSeri) 
                                
                                VALUES ('$tituloSeri', '$tituloOriginalSeri', '$anioSeri', $duracionSeri, $temporadasTotalesSeri, '$clasificacionEdadSeri', '$paisSeri', '$generosSeri', '$sinopsisSeri', '$repartoSeri', '$direccionSeri', '$escrituraSeri', '$camaraSeri', '$sonidoSeri', '$produccionSeri', '$edicionSeri', '$arteSeri', '$efectosVisualesSeri', '$equipoSeri', '$nombreArchivo', '$notaSeri', '$estadoSeri');");
                                
                                $sentenciaSQL -> execute();
                                
                                $sentencia = $conexion->prepare("SELECT idSeri FROM series ORDER BY idSeri DESC LIMIT 1;");
                                
                                $sentencia -> execute();
                                
                                $serie = $sentencia->fetch(PDO::FETCH_LAZY);
                               
                                if(isset($serie["idSeri"]) ){

                                    $_SESSION['idSeri']= $serie["idSeri"];

                                }
                                
                                header("Location:formulario.php");
                                break;
                        case "Modificar":
                            
                            if($imagenSeri!=""){       // Validamos si tiene algo
                                                    // Renombramos los nuevos archivos
                                $fecha= new DateTime();
                                $nombreArchivo=($imagenSeri!="")?$fecha->getTimestamp()."_".$_FILES["imagenSeri"]["name"]:"imagen.jpg";
                                $tmpImagen=$_FILES["imagenSeri"]["tmp_name"];
                            
                                                    // Movemos los archivos a la carpeta
                                move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);
                                                    //Elminamos los archivos antiguos en la carppeta y en la base
                                $sentenciaSQL= $conexion->prepare("SELECT imagenSeri FROM series WHERE idSeri = $idSeri");
                                $sentenciaSQL->execute();
                                                        // a $pelicula se le añade la sentencia con la funcion que recoge nombre de campo y valor
                                $serie=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
                                
                                if(isset($serie["imagenSeri"]) &&($serie["imagenSeri"]!="imagen.jpg") ){

                                    if(file_exists("../../img/".$serie["imagenSeri"])){

                                        unlink("../../img/".$serie["imagenSeri"]);
                                    }
                                }
                                                // Actualizamos nuevos archivos
                                                
                                
                                $sentenciaSQL= $conexion->prepare("UPDATE series SET tituloSeri = '$tituloSeri', tituloOriginalSeri = '$tituloOriginalSeri', anioSeri = $anioSeri, duracionSeri = $duracionSeri, temporadasTotalesSeri = $temporadasTotalesSeri, clasificacionEdadSeri = $clasificacionEdadSeri, paisSeri = '$paisSeri', generosSeri = '$generosSeri', sinopsisSeri = '$sinopsisSeri', repartoSeri = '$repartoSeri', direccionSeri = '$direccionSeri', escrituraSeri = '$escrituraSeri', camaraSeri = '$camaraSeri', sonidoSeri = '$sonidoSeri', produccionSeri = '$produccionSeri', edicionSeri = '$edicionSeri', arteSeri = '$arteSeri', efectosVisualesSeri = '$efectosVisualesSeri', equipoSeri = '$equipoSeri', imagenSeri = '$nombreArchivo', notaSeri = $notaSeri, estadoSeri = '$estadoSeri' WHERE idSeri = $idSeri");

                                $sentenciaSQL->execute();
                            }
                            header("Location:series.php");
                            break;
                        case "Cancelar":
                            header("Location:series.php");
                            break;
                        case "Seleccionar":
                            $sentenciaSQL= $conexion->prepare("SELECT* FROM series WHERE idSeri = $idSeri");
                            $sentenciaSQL->execute();
                            $serie=$sentenciaSQL->fetch(PDO::FETCH_LAZY); 

                            $sentenciaCaps = $conexion->prepare("SELECT* FROM temporadas WHERE idSeri = $idSeri");
                            $sentenciaSQL->execute();
                            $capitulo=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
                                          //fetch(PDO::FETCH_LAZY) Carga datos 1 por 1 y permite rellenarlos 
                            
                            $tituloSeri=$serie['tituloSeri'];
                            $imagenSeri=$serie['imagenSeri'];
                            $tituloOriginalSeri= $serie['tituloOriginalSeri'];
                            $anioSeri= $serie['anioSeri'];
                            $duracionSeri= $serie['duracionSeri'];
                            $clasificacionEdadSeri= $serie['clasificacionEdadSeri'];
                            $paisSeri= $serie['paisSeri'];
                            $generosSeri= $serie['generosSeri'];
                            $temporadasTotalesSeri= $serie['temporadasTotalesSeri'];
                            
                            $sinopsisSeri= $serie['sinopsisSeri'];
                            $repartoSeri= $serie['repartoSeri'];
                            $direccionSeri= $serie['direccionSeri'];
                            $escrituraSeri= $serie['escrituraSeri'];
                            $camaraSeri= $serie['camaraSeri'];
                            $sonidoSeri= $serie['sonidoSeri'];
                            $produccionSeri= $serie['produccionSeri'];
                            $edicionSeri= $serie['edicionSeri'];
                            $arteSeri= $serie['arteSeri'];
                            $efectosVisualesSeri= $serie['efectosVisualesSeri'];
                            $notaSeri= $serie['notaSeri'];
                            $equipoSeri= $serie['equipoSeri'];
                            $estadoSeri= $serie['estadoSeri'];
                            
                            
                            break;
                        case "Borrar":
                            $sentenciaSQL= $conexion->prepare("SELECT imagenSeri FROM series WHERE idSeri= $idSeri");
                            $sentenciaSQL->execute();
                            $serie=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

                            if(isset($serie["imagenSeri"]) &&($serie["imagenSeri"]!="imagen.jpg") ){

                                if(file_exists("../../img/".$serie["imagenSeri"])){

                                    unlink("../../img/".$serie["imagenSeri"]);
                                }
                            }


                            $sentenciaSQL= $conexion->prepare("DELETE FROM series WHERE idSeri= $idSeri");

                            $sentenciaSQL->execute();
                            header("Location:series.php");
                            break;
                    }

                            $sentenciaSQL= $conexion->prepare("SELECT* FROM series");
                            $sentenciaSQL->execute();
                            $listaSeries=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
                

                            
            ?>
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                        <form method="POST" enctype="multipart/form-data">

                            
                        </div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class = "form-group">
                                    <label for="idSeri">ID:</label>
                                    <input type="text" required readonly class="form-control" value="<?php echo $idSeri;?>" name="idSeri" id="idSeri" placeholder="ID">
                                </div>
                                <div class = "form-group">
                                    <label for="tituloSeri">Titulo:</label>
                                    <input type="text" required class="form-control" value="<?php echo $tituloSeri;?>" name="tituloSeri" id="tituloSeri" placeholder="Titulo">
                                </div>
                                <div class = "form-group">
                                    <label for="tituloOriginalSeri">Titulo Original:</label>
                                    <input type="text" required class="form-control" value="<?php echo $tituloOriginalSeri;?>" name="tituloOriginalSeri" id="tituloOriginalSeri" placeholder="Titulo Original">
                                </div>
                                <div class = "form-group">
                                    <label for="anioSeri">Año:</label>
                                    <input type="text" required class="form-control" value="<?php echo $anioSeri;?>" name="anioSeri" id="anioSeri" placeholder="Año">
                                </div>
                                <div class = "form-group">
                                    <label for="duracionSeri">Duracion:</label>
                                    <input type="text" required class="form-control" value="<?php echo $duracionSeri;?>" name="duracionSeri" id="duracionSeri" placeholder="Duracion:">
                                </div>
                                <div class = "form-group">
                                    <label for="duracionSeri">Total de temporadas:</label>
                                    <input type="text" required class="form-control" value="<?php echo $temporadasTotalesSeri;?>" name="temporadasTotalesSeri" id="temporadasTotalesSeri" placeholder="Total de temporadas:">
                                </div>
                                <div class = "form-group">
                                    <label for="clasificacionEdadSeri">Clasificacion Edad:</label>
                                    <input type="text" required class="form-control" value="<?php echo $clasificacionEdadSeri;?>" name="clasificacionEdadSeri" id="clasificacionEdadPeli" placeholder="Clasificacion Edad">
                                </div>
                                <div class = "form-group">
                                    <label for="paisSeri">Pais:</label>
                                    <input type="text" required class="form-control" value="<?php echo $paisSeri;?>" name="paisSeri" id="paisSeri" placeholder="Pais">
                                </div>
                                <div class = "form-group">
                                    <label for="generosSeri">Generos:</label>
                                    <input type="text" required class="form-control" value="<?php echo $generosSeri;?>" name="generosSeri" id="generosSeri" placeholder="Generos">
                                </div>
                                <div class = "form-group">
                                    <label for="sinopsisSeri">Sinopsis:</label>
                                    <input type="text" required class="form-control" value="<?php echo $sinopsisSeri;?>" name="sinopsisSeri" id="sinopsisSeri" placeholder="Sinopsis">
                                </div>
                                <div class = "form-group">
                                    <label for="repartoSeri">Reparto:</label>
                                    <input type="text" required class="form-control" value="<?php echo $repartoSeri;?>" name="repartoSeri" id="repartoSeri" placeholder="Reparto">
                                </div>
                                <div class = "form-group">
                                    <label for="direccionSeri">Direccion:</label>
                                    <input type="text" required class="form-control" value="<?php echo $direccionSeri;?>" name="direccionSeri" id="direccionSeri" placeholder="Direccion">
                                </div>
                                <div class = "form-group">
                                    <label for="escrituraSeri">Escritura:</label>
                                    <input type="text" required class="form-control" value="<?php echo $escrituraSeri;?>" name="escrituraSeri" id="escrituraSeri" placeholder="Escritura">
                                </div>
                                <div class = "form-group">
                                    <label for="camaraSeri">Camara:</label>
                                    <input type="text" required class="form-control" value="<?php echo $camaraSeri;?>" name="camaraSeri" id="camaraSeri" placeholder="Camara">
                                </div>
                                <div class = "form-group">
                                    <label for="sonidoSeri">Sonido:</label>
                                    <input type="text" required class="form-control" value="<?php echo $sonidoSeri;?>" name="sonidoSeri" id="sonidoSeri" placeholder="Sonido">
                                </div>
                                <div class = "form-group">
                                    <label for="produccionSeri">Produccion:</label>
                                    <input type="text" required class="form-control" value="<?php echo $produccionSeri;?>" name="produccionSeri" id="produccionSeri" placeholder="Produccion">
                                </div>

                                <div class = "form-group">
                                    <label for="edicionSeri">Edicion:</label>
                                    <input type="text" required class="form-control" value="<?php echo $edicionSeri;?>" name="edicionSeri" id="edicionSeri" placeholder="Edicion">
                                </div>
                                <div class = "form-group">
                                    <label for="arteSeri">Arte:</label>
                                    <input type="text" required class="form-control" value="<?php echo $arteSeri;?>" name="arteSeri" id="arteSeri" placeholder="Arte">
                                </div>
                                <div class = "form-group">
                                    <label for="efectosVisualesSeri">Efectos Visuales:</label>
                                    <input type="text" required class="form-control" value="<?php echo $efectosVisualesSeri;?>" name="efectosVisualesSeri" id="efectosVisualesPeli" placeholder="Efectos Visuales">
                                </div>
                                <div class = "form-group">
                                    <label for="equipoSeri">Equipo:</label>
                                    <input type="text" required class="form-control" value="<?php echo $equipoSeri;?>" name="equipoSeri" id="equipoSeri" placeholder="Equipo">
                                </div>
                                <div class = "form-group">
                                    <label for="imagenSeri">Imagen:</label>
                                    <br/>
                                        <?php
                                            if($imagenSeri!=""){  
                                        ?>
                                    <img class="img-thumbnail rounded" src="../../img/<?php echo $imagenSeri;?>" width="50" alt="" srcset="">
                                        <?php  }  ?>  
                                    <input type="file" required class="form-control" name="imagenSeri" id="imagenSeri" placeholder="Imagen">
                                </div>
                                <div class = "form-group">
                                    <label for="notaSeri">Nota:</label>
                                    <input type="text" required class="form-control" value="<?php echo $notaSeri;?>" name="notaSeri" id="notaSeri" placeholder="Nota">
                                </div>
                                <div class = "form-group">
                                    <label for="estadoSeri">Estado:</label>
                                    <input type="text" required class="form-control" value="<?php echo $estadoSeri;?>" name="estadoSeri" id="estadoSeri" placeholder="Estado">
                                </div>
                                
                                <br>
                                <div class="btn-group" role="group" aria-label="">

                                    <button type="submit" name="accion" <?php echo($accion=="Seleccionar")?"disabled":"";?> value="Agregar" class="btn btn-success">Agregar</button>
                                    <button type="submit" name="accion" <?php echo($accion!="Seleccionar")?"disabled":"";?> value="Modificar" class="btn btn-warning">Modificar</button>
                                    <button type="submit" name="accion" <?php echo($accion!="Seleccionar")?"disabled":"";?> value="Cancelar" class="btn btn-primary">Cancelar</button>

                                </div>

                            </form>
                        </div>
                        
                    </div>
                </div>


                <div class="col-md-7">
                    <table class="table table-bordered" id="tabla">
                        <thead>
                            <tr>

                            
                                <th >ID:</th>
                                <th>Acciones</th>
                                <th >Titulo:</th>
                                <th >Imagen:</th>
                                <th >Titulo Original:</th>
                                <th >Año:</th>
                                <th >Duracion:</th>
                                <th >Clasificacion Edad:</th>
                                <th >Pais:</th>
                                <th >Generos:</th>
                                <th >Temporadas Totales:</th>
                                <th >Capitulos:</th>
                                <th >Sinopsis:</th>
                                <th >Reparto:</th>
                                <th >Direccion:</th>
                                <th >Escritura:</th>
                                <th >Camara:</th>
                                <th >Sonido:</th>
                                <th >Produccion:</th>
                                <th >Edicion:</th>
                                <th >Arte:</th>
                                <th >Efectos Visuales:</th>
                                <th >Equipo:</th>
                                
                                <th >Nota:</th>
                                <th >Estado:</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listaSeries as $serie){ ?>
                            <tr>
                                <td><?php echo $serie['idSeri'];?></td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="idSeri" id="idSeri" value="<?php echo $serie['idSeri'];?>"/>
                                        <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>
                                        <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>
                                    </form>
                                </td>
                                <td><?php echo $serie['tituloSeri'];?></td>
                                <td>
                                    <img src="../../img/<?php echo $serie['imagenSeri'];?>" width="100" alt="" srcset="">
                                </td>
                                <td><?php echo $serie['tituloOriginalSeri'];?></td>
                                <td><?php echo $serie['anioSeri'];?></td>
                                <td><?php echo $serie['duracionSeri'];?></td>
                                <td><?php echo $serie['clasificacionEdadSeri'];?></td>
                                <td><?php echo $serie['paisSeri'];?></td>
                                <td><?php echo $serie['generosSeri'];?></td>
                                <td><?php echo $serie['temporadasTotalesSeri'];?></td>
                                <td><?php echo $serie['ingresosPeli'];?></td>
                                <td><?php echo $serie['sinopsisSeri'];?></td>
                                <td><?php echo $serie['repartoSeri'];?></td>
                                <td><?php echo $serie['direccionSeri'];?></td>
                                <td><?php echo $serie['escrituraSeri'];?></td>
                                <td><?php echo $serie['camaraSeri'];?></td>
                                <td><?php echo $serie['sonidoSeri'];?></td>
                                <td><?php echo $serie['produccionSeri'];?></td>
                                <td><?php echo $serie['edicionSeri'];?></td>
                                <td><?php echo $serie['arteSeri'];?></td>
                                <td><?php echo $serie['efectosVisualesSeri'];?></td>
                                <td><?php echo $serie['equipoSeri'];?></td>
                                <td><?php echo $serie['notaSeri'];?></td>
                                <td><?php echo $serie['estadoSeri'];?></td>
                            </tr>
                            <?php } ?>
                        </tbody> 
                    </table>
                </div>
            </div>
            </div>
</main> 
<script>

    var tabla= document.querySelector("#tabla");

    var dataTable = new DataTable(tabla,{
        perPage:6,
        perPageSelect:[3,6,9,12]
    });

</script>
<?php include("../template/pie.php")?>