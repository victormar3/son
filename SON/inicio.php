<?php include("template/cabecera.php")?>
<?php 



if(isset($_SESSION['usuarioUsu'])){
        $usuarioUsu=$_SESSION['usuarioUsu'];
        

}else{
    header('Location:index.php');
}   

?>

<main class="text-center container" >
<h1 class="display-3 text-center text-warning">Bienvenidos a Sons Of North</h1>
<br><br><br><br>
        <div id="myCarousel" class="carousel slide text-center" data-bs-ride="carousel" >
            <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">                   
                
                <div class="row">
                        <div class="col"><img src="img/PROXIMAMENTE.png" width="100%" height="100%"></div>

                    </div>  
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Descubre mas sobre nuestra gran comunidad.</h1>
                            <p>Pulsa en el boton y podras informarte de quienes somos y cual es el objetivo de nuesto proyecto.</p>
                            <p><a class="btn btn-lg btn-warning" href="#">Pulsa</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col"><img src="img/1.jpg" width="100%" height="100%"></div>
                        <div class="col"><img src="img/2.jpg" width="100%" height="100%"></div>
                        <div class="col"><img src="img/3.jpg" width="100%" height="100%"></div>
                    </div>                    
                    <div class="container">
                    
                        <div class="carousel-caption text-warning">
                            <p><a class="btn btn-lg btn-warning" href="peliculas.php">Nuevas Peliculas</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col"><img src="img/4.jpg" width="100%" height="100%"></div>
                        <div class="col"><img src="img/5.jpg" width="100%" height="100%"></div>
                        <div class="col"><img src="img/6.jpg" width="100%" height="100%"></div>
                    </div>                    
                    <div class="container">
                        <div class="carousel-caption">
                            <p><a class="btn btn-lg btn-warning" href="series.php">Nuevas Series</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
            
</main>

<?php include("template/pie.php")?>