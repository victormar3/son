<?php include("template/cabecera.php")?>
<?php

include("administrador/config/bdM.php");

    if(isset($_POST['register'])){
        if(
            strlen($_POST['nombreUsu']) >=1 &&
            strlen($_POST['usuarioUsu']) >=1 &&
            strlen($_POST['contraseniaUsu']) >=1 &&
            strlen($_POST['confirmarContrasenia']) >=1  
            ){
                if(($_POST['contraseniaUsu']) !== ($_POST['confirmarContrasenia'])){
                    $mensaje = "Las contraseñas no coinciden";
                } else{
                $nombreUsu = trim($_POST['nombreUsu']);
                $usuarioUsu = trim($_POST['usuarioUsu']);
                $contraseniaUsu = trim($_POST['contraseniaUsu']);
                $correoUsu = trim($_POST['correoUsu']);
                $consulta1 ="SELECT* FROM usuarios WHERE usuarioUsu='$usuarioUsu'";
                $resultado1 = mysqli_query($conexion, $consulta1);
                if(mysqli_num_rows($resultado1) > 0){
                    $mensaje = "Ya existe el usuario, prueba con otro";
                } else{
                    $consulta2 = "INSERT INTO usuarios (nombreUsu, usuarioUsu, contraseniaUsu, correoUsu, rolUsu, estadoUsu) VALUES ('$nombreUsu', '$usuarioUsu', '$contraseniaUsu', '$correoUsu', 'Miembro', 'Activo');";
                    $resultado2 = mysqli_query($conexion, $consulta2);
                    if($resultado2){
                        echo "<script>window.location='index.php'</script>";
                        //header('Location:index.php');
                        $mensaje = "Tu registro se a completado";
                    } else {
                        $mensaje = "Ocurrio un error";
                    }
                }}
                
            } else {
                $mensaje = "Llena todos los campos";
                
            }
    }

?>
    <main class="form-registro text-center" >
        <form method="post">
        
         
            <h2>Únete a esta gran comunidad</h2>
            <img class="mb-4" src="img/logop.png" alt="" width="72" height="57">

            <?php if(isset($mensaje)){ ?>
            
            <div class="alert alert-danger" role="alert">
                <?php echo $mensaje;?>
            </div>
            
            <?php } ?>
            
           
            <p>Inicia tu registro</p>
            
            
            <div class="input-wrapper">
                <input type="text" name="nombreUsu" placeholder="Nombre">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle input-icon" viewBox="0 0 16 16"><path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/><path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/></svg>
            </div>
            <div class="input-wrapper">
                <input type="text" name="usuarioUsu" placeholder="Nombre de Usuario">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person input-icon" viewBox="0 0 16 16"><path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/></svg>
            </div>
            <div class="input-wrapper">
                <input type="password" name="contraseniaUsu" placeholder="Contraseña">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock input-icon" viewBox="0 0 16 16"><path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/></svg>  
            </div>
            <div class="input-wrapper">
                <input type="password" name="confirmarContrasenia" placeholder="Confirma Contraseña">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock input-icon" viewBox="0 0 16 16"><path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/></svg>  
            </div>
            <div class="input-wrapper">
                <input type="text" name="correoUsu" placeholder="Correo">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope input-icon" viewBox="0 0 16 16"><path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/></svg>        
            </div>
            <input class="btn btn-warning" type="submit" name="register" value="Registrarse">
            <br>
            <a href="index.php">Inicia Sesion</a>
        </form>
    </main>

   

    <?php include("template/pie.php")?>