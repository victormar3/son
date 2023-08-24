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
    
    
                

                    $idUsu=(isset($_POST['idUsu']))?$_POST['idUsu']:"";;
                    $nombreUsu=(isset($_POST['nombreUsu']))?$_POST['nombreUsu']:"";
                    $imagenPeli=(isset($_FILES['imagenPeli']['name']))?$_FILES['imagenPeli']['name']:"";
                    $usuarioUsu=(isset($_POST['usuarioUsu']))?$_POST['usuarioUsu']:"";
                    $contraseniaUsu=(isset($_POST['contraseniaUsu']))?$_POST['contraseniaUsu']:"";
                    $correoUsu=(isset($_POST['correoUsu']))?$_POST['correoUsu']:"";
                    $rolUsu=(isset($_POST['rolUsu']))?$_POST['rolUsu']:"";
                    $estadoUsu=(isset($_POST['estadoUsu']))?$_POST['estadoUsu']:"";
                    $accion=(isset($_POST['accion']))?$_POST['accion']:"";
                    
                    include('../config/bdA.php');

                    switch($accion){

                        case "Agregar":
                               
                            
                                    

                                        if ($estadoUsu == "Inactivo" || $estadoUsu == "Activo") {
                                            if ($rolUsu == "Administrador" || $rolUsu == "Miembro") {

                                                $consulta1 = "SELECT * FROM usuarios WHERE usuarioUsu='$usuarioUsu'";
                                                $resultado1 = mysqli_query($conec, $consulta1);
                                                if(mysqli_num_rows($resultado1) > 0){
                                                    $mensaje = "Ya existe el usuario, prueba con otro";
                                                } else{
                                                    $sentenciaSQL= $conexion->prepare("INSERT INTO usuarios (nombreUsu, usuarioUsu, contraseniaUsu, correoUsu, rolUsu, estadoUsu)
                                                    VALUES ('$nombreUsu', '$usuarioUsu', '$contraseniaUsu', '$correoUsu', '$rolUsu', '$estadoUsu');");

                            
                                                    $sentenciaSQL->execute();
                                                    header("Location:usuarios.php");
 
                                            }
                                            } else{
                                                $mensaje = "el Rol solo puede ser Administrador o Miembro";
                                            }
                                            

                                        
                                        }else{$mensaje = "El estado solo puede ser Activo o Inactivo ";}
                                        
                                        break;
                            
                        case "Modificar":
                            
                                // Validamos si tiene algo
                                                    // Renombramos los nuevos archivos
                             
                                $sentenciaSQL= $conexion->prepare("UPDATE usuarios SET nombreUsu =  '$nombreUsu', usuarioUsu =  '$usuarioUsu', contraseniaUsu = '$contraseniaUsu', correoUsu = '$correoUsu', rolUsu =  '$rolUsu', estadoUsu = '$estadoUsu' WHERE idUsu = $idUsu");

                                $sentenciaSQL->execute();
                            
                            header("Location:usuarios.php");
                            break;
                        case "Cancelar":
                            header("Location:usuarios.php");
                            break;
                        case "Seleccionar":
                            $sentenciaSQL= $conexion->prepare("SELECT* FROM usuarios WHERE idUsu = $idUsu");
                            $sentenciaSQL->execute();
                            $usuario=$sentenciaSQL->fetch(PDO::FETCH_LAZY);               //fetch(PDO::FETCH_LAZY) Carga datos 1 por 1 y permite rellenarlos 
                            
                            $idUsu =$usuario['idUsu'];
                            $nombreUsu =$usuario['nombreUsu'];
                            $usuarioUsu = $usuario['usuarioUsu'];
                            $contraseniaUsu = $usuario['contraseniaUsu'];
                            $correoUsu = $usuario['correoUsu'];
                            $rolUsu = $usuario['rolUsu'];
                            $estadoUsu= $usuario['estadoUsu'];
                            
                            
                            
                            break;
                        case "Borrar":
                           
                            $sentenciaSQL= $conexion->prepare("DELETE FROM usuarios WHERE idUsu = $idUsu");

                            $sentenciaSQL->execute();
                            header("Location:usuarios.php");
                            break;
                    }

                            $sentenciaSQL= $conexion->prepare("SELECT* FROM usuarios");
                            $sentenciaSQL->execute();
                            $listaUsuarios=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
                

                            
            ?>
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                        <form method="POST" enctype="multipart/form-data">
                                         <?php if(isset($mensaje)){ ?>
            
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $mensaje;?>
                                        </div>
                                        
                                        <?php } ?>
                            
                        </div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class = "form-group">
                                    <label for="idUsu">ID:</label>
                                    <input type="text" required readonly class="form-control" value="<?php echo $idUsu;?>" name="idUsu" id="idUsu" placeholder="ID">
                                </div>
                                <div class = "form-group">
                                    <label for="nombreUsu">Nombre:</label>
                                    <input type="text" required class="form-control" value="<?php echo $nombreUsu;?>" name="nombreUsu" id="nombreUsu" placeholder="Nombre">
                                </div>
                                <div class = "form-group">
                                    <label for="usuarioUsu">Usuario:</label>
                                    <input type="text" required class="form-control" value="<?php echo $usuarioUsu;?>" name="usuarioUsu" id="usuarioUsu" placeholder="Usuario">
                                </div>
                                <div class = "form-group">
                                    <label for="contraseniaUsu">Contraseña:</label>
                                    <input type="text" required class="form-control" value="<?php echo $contraseniaUsu;?>" name="contraseniaUsu" id="contraseniaUsu" placeholder="Contraseña">
                                </div>
                                <div class = "form-group">
                                    <label for="correoUsu">Correo:</label>
                                    <input type="text" required class="form-control" value="<?php echo $correoUsu;?>" name="correoUsu" id="correoUsu" placeholder="Correo:">
                                </div>
                                <div class = "form-group">
                                    <label for="rolUsu">Rol:</label>
                                    <input type="text" required class="form-control" value="<?php echo $rolUsu;?>" name="rolUsu" id="rolUsu" placeholder="Rol">
                                </div>
                                <div class = "form-group">
                                    <label for="estadoUsu">Estado:</label>
                                    <input type="text" required class="form-control" value="<?php echo $estadoUsu;?>" name="estadoUsu" id="estadoUsu" placeholder="Estado">
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
                                <th >Nombre:</th>
                                <th >Usuario:</th>
                                <th >Contraseña:</th>
                                <th >Correo:</th>
                                <th >Rol:</th>
                                <th >Estado:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listaUsuarios as $usuario){ ?>
                            <tr>
                                <td><?php echo $usuario['idUsu'];?></td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="idUsu" id="idUsu" value="<?php echo $usuario['idUsu'];?>"/>
                                        <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>
                                        <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>
                                    </form>
                                </td>
                                

                                <td><?php echo $usuario['nombreUsu'];?></td>
                                <td><?php echo $usuario['usuarioUsu'];?></td>
                                <td><?php echo $usuario['contraseniaUsu'];?></td>
                                <td><?php echo $usuario['correoUsu'];?></td>
                                <td><?php echo $usuario['rolUsu'];?></td>
                                <td><?php echo $usuario['estadoUsu'];?></td>
                                
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