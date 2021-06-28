<?php

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /');
    }

    // importar la conexion
    require 'includes/config/database.php';
    $db = conectarDB();

    // consultar propiedades
    $query = "SELECT * FROM propiedades WHERE id = ${id}";

    // obtener los resultados
    $resultado = mysqli_query($db, $query);

    if(!$resultado->num_rows) {
        header('Location: /');  
    }

    $propiedad = mysqli_fetch_assoc($resultado);






require 'includes/funciones.php';

incluirTemplate('header');
 
?>

    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo']; ?></h1>

        
        <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="imagen de la propiedad">
        

        <div class="resumen-propiedad">
            <div class="caracteristicas">
                <p class="precio">U$D <?php echo $propiedad['precio']; ?></p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                        <p><?php echo $propiedad['wc']; ?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                        <p><?php echo $propiedad['estacionamiento']; ?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                        <p><?php echo $propiedad['habitaciones']; ?></p>
                    </li>
                </ul>
            </div>
            

            <p>
            <?php echo $propiedad['descripcion']; ?>
            </p>
    </main>
    

<?php 

// cerrar la conexion
mysqli_close($db);

incluirTemplate('footer');

?>