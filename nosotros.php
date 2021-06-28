<?php

require 'includes/funciones.php';


incluirTemplate('header');
 
?>

    <main class="contenedor seccion">
        <h1>Conoce sobre nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros">
                </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>
                    25 Años de experiencia
                </blockquote>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse maxime, commodi tenetur in ipsum similique aperiam totam quisquam debitis voluptatem beatae odio. Reprehenderit beatae optio expedita corporis cumque consectetur voluptate? Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci quis fuga ex rem asperiores mollitia, laboriosam, quibusdam vel pariatur hic nostrum. Voluptatibus eaque molestiae modi? At eos suscipit reprehenderit debitis.
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ex maxime veniam blanditiis, fugiat autem eos dignissimos itaque esse beatae earum. Sit, vel officiis velit pariatur dignissimos ducimus cupiditate. Nulla, neque.
                </p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Mas sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis neque fuga eveniet aperiam facere! Animi quas corrupti deserunt, voluptatum soluta pariatur tenetur debitis, iste unde eaque, voluptates voluptate commodi repellat.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis neque fuga eveniet aperiam facere! Animi quas corrupti deserunt, voluptatum soluta pariatur tenetur debitis, iste unde eaque, voluptates voluptate commodi repellat.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="icono tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis neque fuga eveniet aperiam facere! Animi quas corrupti deserunt, voluptatum soluta pariatur tenetur debitis, iste unde eaque, voluptates voluptate commodi repellat.</p>
            </div>
        </div>
    </section>
    

<?php 

incluirTemplate('footer');

?>