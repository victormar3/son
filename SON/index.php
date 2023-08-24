<?php include("template/cabecera.php")?>

<?php
        // VALIDACION USUARIOS EN ADMINISTRADOR
        
$conexion = mysqli_connect('localhost', 'root', '', 'sitio');
if(isset($_POST['login'])){
  if(
    strlen($_POST['usuarioUsu']) >=1 &&
    strlen($_POST['contraseniaUsu']) >=1   
    ){
      $usuarioUsu = trim($_POST['usuarioUsu']);
      $contraseniaUsu = trim($_POST['contraseniaUsu']);
      $consulta1 ="SELECT* FROM usuarios WHERE usuarioUsu='$usuarioUsu' AND contraseniaUsu='$contraseniaUsu'";
      $resultado1 = mysqli_query($conexion, $consulta1);
      if(mysqli_num_rows($resultado1) < 1){
          $mensaje = "No existe El usuario";
      } else{
        while ($array = mysqli_fetch_row($resultado1)) {
          $idUsu = $array[0];
          $nombreUsu = $array[1];
          $correoUsu = $array[4];
          $rolUsu = $array[5];
          $estadoUsu = $array[6];
          
        }
        $_SESSION['idUsu'] = "$idUsu";
        $_SESSION['nombreUsu'] = "$nombreUsu";
        $_SESSION['correoUsu'] = "$correoUsu";
        $_SESSION['usuarioUsu'] = "$usuarioUsu";
        $_SESSION['rolUsu'] = "$rolUsu";
        $_SESSION['estadoUsu'] = "$estadoUsu";
        $_SESSION['contraseniaUsu'] = "$contraseniaUsu";
        
        
    
          if($resultado1){

            if(($_SESSION['estadoUsu']) == 'Activo'){

                if(($_SESSION['rolUsu']) == 'Administrador'){

                  header('Location:administrador/index.php');
                  $mensaje = $_SESSION['nombreUsu'];

                }elseif(($_SESSION['rolUsu']) == 'Miembro'){
                  
                    echo "<script>window.location='inicio.php'</script>";
                    $mensaje = "Tu registro se a completado";

                }else{

                  $mensaje = "No tienes rol";

                }
            }else{
              $mensaje = "Esta cuenta no esta activa, ponte en contacto con nuesto servicio técnico";
            }
          } else {
            $mensaje = "Ocurrio un error";
          }
      }
      
  } else {
    $mensaje = "Llena todos los campos";
  }

 
}
?>
        <main class="form-registro text-center" >
          <form method="post">
            <h2>Entra a esta gran comunidad</h2>
            <img class="mb-4" src="img/logop.png" alt="" width="72" height="57">
            <p>Inicia tu login</p>

            <?php if(isset($mensaje)){ ?>
            <div class="alert alert-danger" role="alert">
            <?php echo $mensaje;?>
            </div>
            <?php } ?>

            <div class="input-wrapper">
                <input type="text" name="usuarioUsu" placeholder="Nombre de Usuario">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle input-icon" viewBox="0 0 16 16"><path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/><path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/></svg>
            </div>
            <div class="input-wrapper">
                <input type="password" name="contraseniaUsu" placeholder="Contraseña">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock input-icon" viewBox="0 0 16 16"><path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/></svg>  
            </div>
            
            <input class="btn btn-warning" type="submit" name="login" value="Enviar">
            <br>
            <a href="registrar.php">Crear una cuenta</a>
          </form>
        </main>

<?php include("template/pie.php")?>