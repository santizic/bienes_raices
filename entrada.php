<?php

require 'includes/funciones.php';


incluirTemplate('header');
 
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guia para la decoración de tu Hogar</h1>

        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="imagen de la propiedad">
        </picture>
        
        <p class="informacion-meta">Escrito el: <span>14/6/2021</span> por: Admin</p>


        <div class="resumen-propiedad">
            

            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse maxime, commodi tenetur in ipsum similique aperiam totam quisquam debitis voluptatem beatae odio. Reprehenderit beatae optio expedita corporis cumque consectetur voluptate? Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci quis fuga ex rem asperiores mollitia, laboriosam, quibusdam vel pariatur hic nostrum. Voluptatibus eaque molestiae modi? At eos suscipit reprehenderit debitis.
            </p>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse maxime, commodi tenetur in ipsum similique aperiam totam quisquam debitis voluptatem beatae odio. Reprehenderit beatae optio expedita corporis cumque consectetur voluptate? Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci quis fuga ex rem asperiores mollitia, laboriosam, quibusdam vel pariatur hic nostrum. Voluptatibus eaque molestiae modi? At eos suscipit reprehenderit debitis.
            </p>
        </div>
    </main>
    

<?php 

incluirTemplate('footer');

?>