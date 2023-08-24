<?php include("template/cabecera.php")?>
<?php 
include("administrador/config/bd.php");
require 'administrador/config/config.php';


$idPeli = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';



if(isset($_SESSION['usuarioUsu'])){
    
    if($idPeli == '' || $token == '') {
        echo 'Error al procesar la petición';
        exit;
    }else{
        $token_tmp = hash_hmac('sha1', $idPeli, KEY_TOKEN);

        if ($token == $token_tmp){
            $sentenciaSQL= $conexion->prepare("SELECT count(idPeli) FROM peliculas WHERE idPeli=?");
            $sentenciaSQL->execute([$idPeli]);
            if($sentenciaSQL->fetchColumn() > 0) {
                $sentenciaSQL= $conexion->prepare("SELECT idPeli,tituloPeli,tituloOriginalPeli,anioPeli,duracionPeli,clasificacionEdadPeli,paisPeli,generosPeli,presupuestoPeli,ingresosPeli,sinopsisPeli,repartoPeli,direccionPeli,escrituraPeli,camaraPeli,sonidoPeli,produccionPeli,edicionPeli,artePeli,efectosVisualesPeli,equipoPeli,imagenPeli,notaPeli,estadoPeli FROM peliculas WHERE idPeli=?");
                $sentenciaSQL->execute([$idPeli]);
                $pelicula = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);
                $nombre=$pelicula['tituloPeli'];
                $imagen=$pelicula['imagenPeli'];
                $_SESSION['idPeli'] = $pelicula['idPeli'];
                $query = "SELECT * FROM pelisvistas WHERE idUsu = :idUsu AND idPeli = :idPeli";
                $stmt = $conexion->prepare($query);
                $stmt->bindParam(':idUsu', $idUsu);
                $stmt->bindParam(':idPeli', $idPeli);
                $stmt->execute();
                $isChecked = $stmt->rowCount() > 0;
                
            }
            
        }else{
            echo 'Error al procesar la petición';
            exit;
        }

    }
    
} else{
    header('Location:index.php');
}

// Consulta para mostrar todos los libros


?>
<main class=container>
    <div class="row">
        <div class="col-md-8 text-warning">
            <h1><?php echo $pelicula['tituloPeli'];?></h1>
            
        </div>
        
        <div class="col-md-1 text-warning">
        <h1><?php echo $pelicula['notaPeli'];?></h1>
        
        </div>
        <div class="col-md-1 text-warning">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="checkbox1" onclick="enviar()" <?php echo $isChecked ? 'checked' : ''; ?>>
                <label class="form-check-label" for="checkbox1">
                Película vista
                </label>
            </div>
        </div>
        
    </div>
    <script>

function enviar() {

       var xmlhttp = new XMLHttpRequest();

       xmlhttp.onreadystatechange = function() {

              if ((xmlhttp.status == 200) && (xmlhttp.readyState == 4))

                     alert(xmlhttp.responseText);

       }

       xmlhttp.open("POST", "grabarpeliculavista.php");

       xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

       xmlhttp.send("checkbox=" + checkbox1.value );

}

</script>
        
   
    <div class="row">
        <div class="col-md-4 text-warning">
            <!--Titulo-->
            
            <!--Bonton visto-->
            
            <br>
            <!--Imagen-->
            <img src="img/<?php echo $pelicula['imagenPeli'];?>" width="300" height="500">
        </div>
        
        <div class="col-md-8">
            <br><br><br><br><br><br><br><br>
            <div class="row text-center ">
                
                
                <div class="col-md-2">
                    <th>Titulo Original<br><spam class="text-warning"><?php echo $pelicula['tituloOriginalPeli'];?></spam></th>
                </div>
                <div class="col-md-2">
                    <th>Año<br><spam class="text-warning"><?php echo $pelicula['anioPeli'];?></spam></th>
                </div>
                <div class="col-md-2">
                    <th>Duracion<br><spam class="text-warning"><?php echo $pelicula['duracionPeli'];?></spam></th>
                </div>
                <div class="col-md-2">
                    <th>Clasificacion por edad<br><spam class="text-warning"><?php echo $pelicula['clasificacionEdadPeli'];?></spam></th>
                </div>
                <div class="col-md-2">
                    <th>Pais<br><spam class="text-warning"><?php echo $pelicula['paisPeli'];?></spam></th>
                </div>
                
            </div>

            <br><br>

            <div class="row text-center">
                
                
                <div class="col-md-2">
                    <th >Generos<br><spam class="text-warning"><?php echo $pelicula['tituloOriginalPeli'];?></spam></th>
                </div>
                <div class="col-md-2">
                    <th >Presupuesto<br><spam class="text-warning"><?php echo $pelicula['anioPeli'];?></spam></th>
                </div>
                <div class="col-md-2">
                    <th >Ingresos<br><spam class="text-warning"><?php echo $pelicula['duracionPeli'];?></spam></th>
                </div>
                <div class="col-md-2">
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Ver Pelicula
                        </button>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="https://www.netflix.com/es/login">Netflix</a></li>
                        <li><a class="dropdown-item" href="https://www.amazon.es/ap/signin?openid.pape.max_auth_age=0&openid.return_to=https%3A%2F%2Feu.primevideo.com%2Fauth%2Freturn%2Fref%3Dav_auth_ap%3F_t%3Dsg8AvVhs3pcjWqHr9vRaxPWR_m6XHrw7NbrwP5MUW_BEPAAAAAQAAAABkfRVMcmF3AAAAAPgWC9WfHH8iB-olH_E9xQ%26location%3D%2Fdetail%2F0IE7JDFEES6URO4ENF94923JDK%3Fjic%253D8%25257CEgRzdm9k%2526ref_%253Datv_tv_hom_c_C9Fktd_brws_6_57%2526tag%253Dplaymaxmx-21&openid.identity=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&accountStatusPolicy=P1&openid.assoc_handle=amzn_prime_video_sso_es&openid.mode=checkid_setup&siteState=262-8287768-1746968&language=es_ES&openid.claimed_id=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.ns=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0">Prime Video</a></li>
                        <li><a class="dropdown-item" href="https://play.hbomax.com/page/urn:hbo:page:hbo">HBO</a></li>
                        <li><a class="dropdown-item" href="https://ver.movistarplus.es/">Movistar+</a></li>
                        </ul>
                    </div>
                    </div> 
                </div>
                <div class="col-md-2">
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Comprar Pelicula
                            </button>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="https://rakuten.tv/es">Rakuten</a></li>
                            <li><a class="dropdown-item" href="https://www.primevideo.com/offers/nonprimehomepage/ref=atv_dp_mv_c_9zZ8D2_1_0?tag=playmaxmx-21">Prime Video</a></li>
                            <li><a class="dropdown-item" href="https://play.google.com/store/movies">Google Play</a></li>
                            <li><a class="dropdown-item" href="https://tv.apple.com/">Apple TV</a></li>
                            </ul>
                        </div>
                    </div> 
                </div>
                
            </div>

            <br><br>
            
            <p class="text-center">Sinopsis</p>
            <p class="text-warning"><?php echo $pelicula['sinopsisPeli'];?></p>
            
            <br><br>

            <div class="row">
                <div class="col-md-2">
                    <th>Reparto<br><spam class="text-warning"><?php echo $pelicula['repartoPeli'];?></spam></th>
                </div>
                <div class="col-md-2">
                    <th>Año<br><spam class="text-warning"><?php echo $pelicula['direccionPeli'];?></spam></th>
                </div>
                <div class="col-md-2">
                    <th>Direccion<br><spam class="text-warning"><?php echo $pelicula['escrituraPeli'];?></spam></th>
                </div>
                <div class="col-md-2">
                    <th>Camara<br><spam class="text-warning"><?php echo $pelicula['camaraPeli'];?></spam></th>
                </div>
                <div class="col-md-2">
                    <th>Sonido<br><spam class="text-warning"><?php echo $pelicula['sonidoPeli'];?></spam></th>
                </div>
                
            </div>

            <br><br>

            <div class="row">
                <div class="col-md-2">
                    <th>produccionPeli<br><spam class="text-warning"><?php echo $pelicula['produccionPeli'];?></spam></th>
                </div>
                <div class="col-md-2">
                    <th>edicionPeli<br><spam class="text-warning"><?php echo $pelicula['edicionPeli'];?></spam></th>
                </div>
                <div class="col-md-2">
                    <th>Arte<br><spam class="text-warning"><?php echo $pelicula['artePeli'];?></spam></th>
                </div>
                <div class="col-md-2">
                    <th>Clasificacion por edad<br><spam class="text-warning"><?php echo $pelicula['camaraPeli'];?></spam></th>
                </div>
                <div class="col-md-2">
                    <th>Pais<br><spam class="text-warning"><?php echo $pelicula['sonidoPeli'];?></spam></th>
                </div>
                
            </div>
        </div>
    </div>
</main>

<?php include("template/pie.php")?>