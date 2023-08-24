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
    
    
                

                    $idPeli=(isset($_POST['idPeli']))?$_POST['idPeli']:"";;
                    $tituloPeli=(isset($_POST['tituloPeli']))?$_POST['tituloPeli']:"";
                    $imagenPeli=(isset($_FILES['imagenPeli']['name']))?$_FILES['imagenPeli']['name']:"";
                    $tituloOriginalPeli=(isset($_POST['tituloOriginalPeli']))?$_POST['tituloOriginalPeli']:"";
                    $anioPeli=(isset($_POST['anioPeli']))?$_POST['anioPeli']:"";
                    $duracionPeli=(isset($_POST['duracionPeli']))?$_POST['duracionPeli']:"";
                    $clasificacionEdadPeli=(isset($_POST['clasificacionEdadPeli']))?$_POST['clasificacionEdadPeli']:"";
                    $paisPeli=(isset($_POST['paisPeli']))?$_POST['paisPeli']:"";
                    $generosPeli=(isset($_POST['generosPeli']))?$_POST['generosPeli']:"";
                    $presupuestoPeli=(isset($_POST['presupuestoPeli']))?$_POST['presupuestoPeli']:"";
                    $ingresosPeli=(isset($_POST['ingresosPeli']))?$_POST['ingresosPeli']:"";
                    $sinopsisPeli=(isset($_POST['sinopsisPeli']))?$_POST['sinopsisPeli']:"";
                    $repartoPeli=(isset($_POST['repartoPeli']))?$_POST['repartoPeli']:"";
                    $direccionPeli=(isset($_POST['direccionPeli']))?$_POST['direccionPeli']:"";
                    $escrituraPeli=(isset($_POST['escrituraPeli']))?$_POST['escrituraPeli']:"";
                    $camaraPeli=(isset($_POST['camaraPeli']))?$_POST['camaraPeli']:"";
                    $sonidoPeli=(isset($_POST['sonidoPeli']))?$_POST['sonidoPeli']:"";
                    $produccionPeli=(isset($_POST['produccionPeli']))?$_POST['produccionPeli']:"";
                    $edicionPeli=(isset($_POST['edicionPeli']))?$_POST['edicionPeli']:"";
                    $artePeli=(isset($_POST['artePeli']))?$_POST['artePeli']:"";
                    $efectosVisualesPeli=(isset($_POST['efectosVisualesPeli']))?$_POST['efectosVisualesPeli']:"";
                    $notaPeli=(isset($_POST['notaPeli']))?$_POST['notaPeli']:"";
                    $equipoPeli=(isset($_POST['equipoPeli']))?$_POST['equipoPeli']:"";
                    $estadoPeli="Activo";
                    $accion=(isset($_POST['accion']))?$_POST['accion']:"";
                    
                    include('../config/bd.php');

                    switch($accion){

                        case "Agregar":
                    //INSERT INTO `libros` (`id`, `nombre`, `imagen`) VALUES (NULL, 'jjjj', 'jjjj.jpg');
                    //$sentenciaSQL= $conexion->prepare("INSERT INTO peliculas (idPeli,tituloPeli,tituloOriginalPeli,anioPeli,duracionPeli,clasificacionEdadPeli,paisPeli,generosPeli,presupuestoPeli,ingresosPeli,sinopsisPeli,repartoPeli,direccionPeli,escrituraPeli,camaraPeli,sonidoPeli,produccionPeli,edicionPeli,artePeli,efectosVisualesPeli,equipoPeli,imagenPeli,notaPeli,estadoPeli) VALUES (NULL,':tituloPeli',':tituloOriginalPeli',':anioPeli',':duracionPeli',':clasificacionEdadPeli',':paisPeli',':generosPeli',':presupuestoPeli',':ingresosPeli',':sinopsisPeli',':repartoPeli',':direccionPeli',':escrituraPeli',':camaraPeli',':sonidoPeli',':produccionPeli',':edicionPeli',':artePeli',':efectosVisualesPeli',':equipoPeli',':imagenPeli',':notaPeli',':estadoPeli');");

                               
                                $fecha= new DateTime();
                                $nombreArchivo=($imagenPeli!="")?$fecha->getTimestamp()."_".$_FILES["imagenPeli"]["name"]:"imagen.jpg";
                                $tmpImagen=$_FILES["imagenPeli"]["tmp_name"];
        
                                 if($tmpImagen!=""){
                                    move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);
                                }
                                $sentenciaSQL= $conexion->prepare("INSERT INTO peliculas (idPeli,tituloPeli,tituloOriginalPeli,anioPeli,duracionPeli,clasificacionEdadPeli,paisPeli,generosPeli,presupuestoPeli,ingresosPeli,sinopsisPeli,repartoPeli,direccionPeli,escrituraPeli,camaraPeli,sonidoPeli,produccionPeli,edicionPeli,artePeli,efectosVisualesPeli,equipoPeli,imagenPeli,notaPeli,estadoPeli) VALUES (NULL,'$tituloPeli','$tituloOriginalPeli','$anioPeli','$duracionPeli','$clasificacionEdadPeli','$paisPeli','$generosPeli','$presupuestoPeli','$ingresosPeli','$sinopsisPeli','$repartoPeli','$direccionPeli','$escrituraPeli','$camaraPeli','$sonidoPeli','$produccionPeli','$edicionPeli','$artePeli','$efectosVisualesPeli','$equipoPeli','$nombreArchivo','$notaPeli','$estadoPeli');");

                                $sentenciaSQL->execute();

                                header("Location:peliculas.php");
                                break;
                        case "Modificar":
                            
                            if($imagenPeli!=""){       // Validamos si tiene algo
                                                    // Renombramos los nuevos archivos
                                $fecha= new DateTime();
                                $nombreArchivo=($imagenPeli!="")?$fecha->getTimestamp()."_".$_FILES["imagenPeli"]["name"]:"imagen.jpg";
                                $tmpImagen=$_FILES["imagenPeli"]["tmp_name"];
                                                    // Movemos los archivos a la carpeta
                                move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);
                                                    //Elminamos los archivos antiguos en la carppeta y en la base
                                $sentenciaSQL= $conexion->prepare("SELECT imagenPeli FROM peliculas WHERE idPeli = $idPeli");
                                $sentenciaSQL->execute();
                                                        // a $pelicula se le añade la sentencia con la funcion que recoge nombre de campo y valor
                                $pelicula=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
                                
                                if(isset($pelicula["imagenPeli"]) &&($pelicula["imagenPeli"]!="imagen.jpg") ){

                                    if(file_exists("../../img/".$pelicula["imagenPeli"])){

                                        unlink("../../img/".$pelicula["imagenPeli"]);
                                    }
                                }
                                                // Actualizamos nuevos archivos
                                $sentenciaSQL= $conexion->prepare("UPDATE peliculas SET tituloPeli = '$tituloPeli', tituloOriginalPeli = '$tituloOriginalPeli', anioPeli = '$anioPeli', duracionPeli = '$duracionPeli', clasificacionEdadPeli = '$clasificacionEdadPeli', paisPeli = '$paisPeli', generosPeli = '$generosPeli', presupuestoPeli = '$presupuestoPeli', ingresosPeli = '$ingresosPeli', sinopsisPeli = '$sinopsisPeli',repartoPeli = '$repartoPeli',direccionPeli = '$direccionPeli',escrituraPeli = '$escrituraPeli',camaraPeli = '$camaraPeli',sonidoPeli = '$sonidoPeli',produccionPeli = '$produccionPeli', edicionPeli = '$edicionPeli', artePeli = '$artePeli', efectosVisualesPeli = '$efectosVisualesPeli', equipoPeli = '$equipoPeli', imagenPeli = '$nombreArchivo', notaPeli = '$notaPeli', estadoPeli = '$estadoPeli' WHERE idPeli = $idPeli");

                                $sentenciaSQL->execute();
                            }
                            header("Location:peliculas.php");
                            break;
                        case "Cancelar":
                            header("Location:peliculas.php");
                            break;
                        case "Seleccionar":
                            $sentenciaSQL= $conexion->prepare("SELECT* FROM peliculas WHERE idPeli = $idPeli");
                            $sentenciaSQL->execute();
                            $pelicula=$sentenciaSQL->fetch(PDO::FETCH_LAZY);               //fetch(PDO::FETCH_LAZY) Carga datos 1 por 1 y permite rellenarlos 
                            
                            $tituloPeli=$pelicula['nombrePeli'];
                            $imagenPeli=$pelicula['imagenPeli'];
                            $tituloOriginalPeli= $pelicula['tituloOriginalPeli'];
                            $anioPeli= $pelicula['anioPeli'];
                            $duracionPeli= $pelicula['duracionPeli'];
                            $clasificacionEdadPeli= $pelicula['clasificacionEdadPeli'];
                            $paisPeli= $pelicula['paisPeli'];
                            $generosPeli= $pelicula['generosPeli'];
                            $presupuestoPeli= $pelicula['presupuestoPeli'];
                            $ingresosPeli= $pelicula['ingresosPeli'];
                            $sinopsisPeli= $pelicula['sinopsisPeli'];
                            $repartoPeli= $pelicula['repartoPeli'];
                            $direccionPeli= $pelicula['direccionPeli'];
                            $escrituraPeli= $pelicula['escrituraPeli'];
                            $camaraPeli= $pelicula['camaraPeli'];
                            $sonidoPeli= $pelicula['sonidoPeli'];
                            $produccionPeli= $pelicula['produccionPeli'];
                            $edicionPeli= $pelicula['edicionPeli'];
                            $artePeli= $pelicula['artePeli'];
                            $efectosVisualesPeli= $pelicula['efectosVisualesPeli'];
                            $notaPeli= $pelicula['notaPeli'];
                            $equipoPeli= $pelicula['equipoPeli'];
                            $estadoPeli= $pelicula['estadoPeli'];
                            
                            
                            break;
                        case "Borrar":
                            $sentenciaSQL= $conexion->prepare("SELECT imagenPeli FROM peliculas WHERE idPeli= $idPeli");
                            $sentenciaSQL->execute();
                            $pelicula=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

                            if(isset($pelicula["imagenPeli"]) &&($pelicula["imagenPeli"]!="imagen.jpg") ){

                                if(file_exists("../../img/".$pelicula["imagenPeli"])){

                                    unlink("../../img/".$pelicula["imagenPeli"]);
                                }
                            }


                            $sentenciaSQL= $conexion->prepare("DELETE FROM peliculas WHERE idPeli= $idPeli");

                            $sentenciaSQL->execute();
                            header("Location:peliculas.php");
                            break;
                    }

                            $sentenciaSQL= $conexion->prepare("SELECT* FROM peliculas");
                            $sentenciaSQL->execute();
                            $listaPeliculas=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
                

                            
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
                                    <label for="idPeli">ID:</label>
                                    <input type="text" required readonly class="form-control" value="<?php echo $idPeli;?>" name="idPeli" id="idPeli" placeholder="ID">
                                </div>
                                <div class = "form-group">
                                    <label for="tituloPeli">Titulo:</label>
                                    <input type="text" required class="form-control" value="<?php echo $tituloPeli;?>" name="tituloPeli" id="tituloPeli" placeholder="Titulo">
                                </div>
                                <div class = "form-group">
                                    <label for="tituloOriginalPeli">Titulo Original:</label>
                                    <input type="text" required class="form-control" value="<?php echo $tituloOriginalPeli;?>" name="tituloOriginalPeli" id="tituloOriginalPeli" placeholder="Titulo Original">
                                </div>
                                <div class = "form-group">
                                    <label for="anioPeli">Año:</label>
                                    <input type="text" required class="form-control" value="<?php echo $anioPeli;?>" name="anioPeli" id="anioPeli" placeholder="Año">
                                </div>
                                <div class = "form-group">
                                    <label for="duracionPeli">Duracion:</label>
                                    <input type="text" required class="form-control" value="<?php echo $duracionPeli;?>" name="duracionPeli" id="duracionPeli" placeholder="Duracion:">
                                </div>
                                <div class = "form-group">
                                    <label for="clasificacionEdadPeli">Clasificacion Edad:</label>
                                    <input type="text" required class="form-control" value="<?php echo $clasificacionEdadPeli;?>" name="clasificacionEdadPeli" id="clasificacionEdadPeli" placeholder="Clasificacion Edad">
                                </div>
                                <div class = "form-group">
                                    <label for="paisPeli">Pais:</label>
                                    <input type="text" required class="form-control" value="<?php echo $paisPeli;?>" name="paisPeli" id="paisPeli" placeholder="Pais">
                                </div>
                                <div class = "form-group">
                                    <label for="generosPeli">Generos:</label>
                                    <input type="text" required class="form-control" value="<?php echo $generosPeli;?>" name="generosPeli" id="generosPeli" placeholder="Generos">
                                </div>
                                <div class = "form-group">
                                    <label for="presupuestoPeli">Presupuesto:</label>
                                    <input type="text" required class="form-control" value="<?php echo $presupuestoPeli;?>" name="presupuestoPeli" id="presupuestoPeli" placeholder="Presupuesto">
                                </div>
                                <div class = "form-group">
                                    <label for="ingresosPeli">Ingresos:</label>
                                    <input type="text" required class="form-control" value="<?php echo $ingresosPeli;?>" name="ingresosPeli" id="ingresosPeli" placeholder="Ingresos">
                                </div>
                                <div class = "form-group">
                                    <label for="sinopsisPeli">Sinopsis:</label>
                                    <input type="text" required class="form-control" value="<?php echo $sinopsisPeli;?>" name="sinopsisPeli" id="sinopsisPeli" placeholder="Sinopsis">
                                </div>
                                <div class = "form-group">
                                    <label for="repartoPeli">Reparto:</label>
                                    <input type="text" required class="form-control" value="<?php echo $repartoPeli;?>" name="repartoPeli" id="repartoPeli" placeholder="Reparto">
                                </div>
                                <div class = "form-group">
                                    <label for="direccionPeli">Direccion:</label>
                                    <input type="text" required class="form-control" value="<?php echo $direccionPeli;?>" name="direccionPeli" id="direccionPeli" placeholder="Direccion">
                                </div>
                                <div class = "form-group">
                                    <label for="escrituraPeli">Escritura:</label>
                                    <input type="text" required class="form-control" value="<?php echo $escrituraPeli;?>" name="escrituraPeli" id="escrituraPeli" placeholder="Escritura">
                                </div>
                                <div class = "form-group">
                                    <label for="camaraPeli">Camara:</label>
                                    <input type="text" required class="form-control" value="<?php echo $camaraPeli;?>" name="camaraPeli" id="camaraPeli" placeholder="Camara">
                                </div>
                                <div class = "form-group">
                                    <label for="sonidoPeli">Sonido:</label>
                                    <input type="text" required class="form-control" value="<?php echo $sonidoPeli;?>" name="sonidoPeli" id="sonidoPeli" placeholder="Sonido">
                                </div>
                                <div class = "form-group">
                                    <label for="produccionPeli">Produccion:</label>
                                    <input type="text" required class="form-control" value="<?php echo $produccionPeli;?>" name="produccionPeli" id="produccionPeli" placeholder="Produccion">
                                </div>

                                <div class = "form-group">
                                    <label for="edicionPeli">Edicion:</label>
                                    <input type="text" required class="form-control" value="<?php echo $edicionPeli;?>" name="edicionPeli" id="edicionPeli" placeholder="Edicion">
                                </div>
                                <div class = "form-group">
                                    <label for="artePeli">Arte:</label>
                                    <input type="text" required class="form-control" value="<?php echo $artePeli;?>" name="artePeli" id="artePeli" placeholder="Arte">
                                </div>
                                <div class = "form-group">
                                    <label for="efectosVisualesPeli">Efectos Visuales:</label>
                                    <input type="text" required class="form-control" value="<?php echo $efectosVisualesPeli;?>" name="efectosVisualesPeli" id="efectosVisualesPeli" placeholder="Efectos Visuales">
                                </div>
                                <div class = "form-group">
                                    <label for="equipoPeli">Equipo:</label>
                                    <input type="text" required class="form-control" value="<?php echo $equipoPeli;?>" name="equipoPeli" id="equipoPeli" placeholder="Equipo">
                                </div>
                                <div class = "form-group">
                                    <label for="imagenPeli">Imagen:</label>
                                    <br/>
                                        <?php
                                            if($imagenPeli!=""){  
                                        ?>
                                    <img class="img-thumbnail rounded" src="../../img/<?php echo $imagenPeli;?>" width="50" alt="" srcset="">
                                        <?php  }  ?>  
                                    <input type="file" required class="form-control" name="imagenPeli" id="imagenPeli" placeholder="Imagen">
                                </div>
                                <div class = "form-group">
                                    <label for="notaPeli">Nota:</label>
                                    <input type="text" required class="form-control" value="<?php echo $notaPeli;?>" name="notaPeli" id="notaPeli" placeholder="Nota">
                                </div>
                                <div class = "form-group">
                                    <label for="estadoPeli">Estado:</label>
                                    <input type="text" required class="form-control" value="<?php echo $estadoPeli;?>" name="estadoPeli" id="estadoPeli" placeholder="Estado">
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
                                <th >Presupuesto:</th>
                                <th >Ingresos:</th>
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
                            <?php foreach ($listaPeliculas as $pelicula){ ?>
                            <tr>
                                <td><?php echo $pelicula['idPeli'];?></td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="idPeli" id="idPeli" value="<?php echo $pelicula['idPeli'];?>"/>
                                        <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>
                                        <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>
                                    </form>
                                </td>
                                <td><?php echo $pelicula['tituloPeli'];?></td>
                                <td>
                                    <img src="../../img/<?php echo $pelicula['imagenPeli'];?>" width="100" alt="" srcset="">
                                </td>
                                <td><?php echo $pelicula['tituloOriginalPeli'];?></td>
                                <td><?php echo $pelicula['anioPeli'];?></td>
                                <td><?php echo $pelicula['duracionPeli'];?></td>
                                <td><?php echo $pelicula['clasificacionEdadPeli'];?></td>
                                <td><?php echo $pelicula['paisPeli'];?></td>
                                <td><?php echo $pelicula['generosPeli'];?></td>
                                <td><?php echo $pelicula['presupuestoPeli'];?></td>
                                <td><?php echo $pelicula['ingresosPeli'];?></td>
                                <td><?php echo $pelicula['sinopsisPeli'];?></td>
                                <td><?php echo $pelicula['repartoPeli'];?></td>
                                <td><?php echo $pelicula['direccionPeli'];?></td>
                                <td><?php echo $pelicula['escrituraPeli'];?></td>
                                <td><?php echo $pelicula['camaraPeli'];?></td>
                                <td><?php echo $pelicula['sonidoPeli'];?></td>
                                <td><?php echo $pelicula['produccionPeli'];?></td>
                                <td><?php echo $pelicula['edicionPeli'];?></td>
                                <td><?php echo $pelicula['artePeli'];?></td>
                                <td><?php echo $pelicula['efectosVisualesPeli'];?></td>
                                <td><?php echo $pelicula['equipoPeli'];?></td>
                                <td><?php echo $pelicula['notaPeli'];?></td>
                                <td><?php echo $pelicula['estadoPeli'];?></td>
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