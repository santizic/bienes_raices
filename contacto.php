<?php

require 'includes/funciones.php';


incluirTemplate('header');
 
?>

    <main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="imagen contacto">
        </picture>

        <h2>Llene el formulario de contacto</h2>

        <form action="" class="formulario">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu Nombre" id="nombre">

                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu email" id="email">

                <label for="telefono">Télefono</label>
                <input type="tel" placeholder="Tu telefono" id="telefono">

                <label for="mensaje">Mensaje</label>
                <textarea name="" id="mensaje" cols="30" rows="10"></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion sobre la propiedad</legend>
                
                <label for="opciones">Vende o Compra:</label>
                <select name="" id="opciones">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="compra">Compra</option>
                    <option value="vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto">
            </fieldset>

            <fieldset>
                <legend>Informacion sobre la propiedad</legend>

                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

                    <label for="contactar-email">Email</label>
                    <input name="contacto" type="radio" value="email" id="contactar-email">
                </div>

                <p>Si eligio telefono, elija la fecha y la hora para ser contactado</p>

                <label for="fecha">Fecha</label>
                <input type="date" id="fecha">

                <label for="hora">Hora</label>
                <input type="time" id="hora" min="09:00" max="18:00">
            </fieldset>

            <div class="enviar">
                <input type="submit" value="enviar" class="boton-verde">
            </div>

        </form>
    </main>

<?php 

incluirTemplate('footer');

?>