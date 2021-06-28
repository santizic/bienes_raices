<?php

require 'includes/funciones.php';


incluirTemplate('header', $inicio = true);
 
?>

    <main class="contenedor seccion">
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
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Apartamentos en Venta</h2>

        <?php 

            $limite = 3;
            include 'includes/templates/anuncios.php';
        ?>

        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la Casa de tus Sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondra en contacto contigo a la brevedad</p>
        <a href="contacto.php" class="boton-amarillo">Contáctanos</a>

    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img src="build/img/blog1.jpg" alt="Texto Entrada Blog">

                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php"><h4>Terraza en el techo de tu casa</h4></a>
                    <p class="informacion-meta">Escrito el: <span>10/6/2021</span> por: <span>Admin</span></p>

                    <p>
                        Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero
                    </p>
                </div>
            </article>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img src="build/img/blog2.jpg" alt="Texto Entrada Blog">

                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php"><h4>Guía para la decoración para tu hogar</h4></a>
                    <p class="informacion-meta">Escrito el: <span>10/6/2021</span> por: <span>Admin</span></p>

                    <p>
                        Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio
                    </p>
                </div>
            </article>
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>

            <div class="testimonial">
                <blockquote>
                    El personal se comporto de una excelente forma, muy buena atencion y la casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>
                <p>-Santiago Arzuaga</p>
            </div>
        </section>
    </div>

<?php 

incluirTemplate('footer');

?>