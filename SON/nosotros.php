<?php include("template/cabecera.php")?>
<?php 



if(isset($_SESSION['usuarioUsu'])){
        $usuarioUsu=$_SESSION['usuarioUsu'];
        

}else{
    header('Location:index.php');
}   

?>

<div class="container">
        <section>
            <h2>Sons Of North</h2>
            <p>Bienvenido a nuestra web dedicada a películas y series. Nos apasiona el entretenimiento en todas sus formas, y hemos creado esta plataforma para ofrecerte una experiencia completa y diversa.</p>
            <p>En nuestra web, podrás encontrar una amplia selección de películas y series, con información detallada sobre cada título, como sinopsis, reparto, duración y clasificación.</p>
            <p>Estamos emocionados por anunciar que próximamente expandiremos nuestra plataforma para incluir videojuegos. Podrás descubrir nuevos títulos, leer reseñas, ver avances y tener acceso a información relevante sobre tus videojuegos favoritos.</p>
            <p>Además, seguiremos ofreciendo la función especial que te permite crear y gestionar tu lista personalizada de películas, series y videojuegos vistos. Así podrás llevar un registro de todo el contenido que has disfrutado y conocer el tiempo total que has dedicado a tu entretenimiento.</p>
            <p>Nuestro objetivo es brindarte una plataforma completa donde puedas explorar diferentes formas de entretenimiento, organizar tu historial de visualización y descubrir nuevas experiencias emocionantes.</p>
            <p>¡Esperamos que disfrutes de nuestra web y que encuentres películas, series y próximamente videojuegos increíbles para disfrutar!</p>
        </section>

        <section>
            <h2>Próximamente: Videojuegos</h2>
            <p>Estamos trabajando arduamente para expandir nuestra web y agregar una nueva sección dedicada a los videojuegos. Próximamente, podrás explorar una amplia variedad de títulos, desde los clásicos hasta los lanzamientos más recientes.</p>
            <p>En esta nueva sección, encontrarás información detallada sobre cada videojuego, como género, plataformas compatibles, requisitos del sistema y reseñas de otros usuarios. También podrás agregar videojuegos a tu lista personalizada y llevar un seguimiento de tu tiempo de juego.</p>
            <p>Estamos entusiasmados por brindarte una experiencia completa de entretenimiento en nuestra web y esperamos que la inclusión de videojuegos enriquezca aún más tu experiencia.</p>
        </section>
    </div>


<?php include("template/pie.php")?>