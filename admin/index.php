<?php

    require '../includes/funciones.php';    

    $auth = estaAutenticado();

    if(!$auth) {
        header('Location: /');
    }

    

    // Establecer la conexion
    require '../includes/config/database.php';
    $db = conectarDB();

    // Escribir el query
    $query = "SELECT * FROM propiedades";

    // Consultar la DB
    $resultadoConsulta = mysqli_query($db, $query);

    // Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null;

    

    


    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        //Eliminar el archivo
        $query = "SELECT imagen FROM propiedades WHERE id=${id}";

        $resultado = mysqli_query($db, $query);
        $propiedad = mysqli_fetch_assoc($resultado);

        unlink('../imagenes/' . $propiedad['imagen']);

        


        // Eliminar la propiedad
        if($id) {
            $query = "DELETE FROM propiedades WHERE id = ${id}";

            $resultado = mysqli_query($db, $query);

            if($resultado) {
                header('Location: /admin?resultado=3');
            }
        }
    };

    

    // Incluye un template

    incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>


    <!-- ALERTAS creado, actualizado, y eliminado -->
    <?php if( intval( $resultado ) === 1): ?>
        <p class="alerta exito">Anuncio Creado Correctamente</p>
    <?php elseif(intval( $resultado ) === 2): ?>
        <p class="alerta upadte">Anuncio Actualizado Correctamente</p>
    <?php elseif(intval( $resultado ) === 3): ?>
        <p class="alerta error">Anuncio Eliminado Correctamente</p>
    <?php endif; ?>

    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> <!-- Mostrara los resultados -->
            <?php while($row = mysqli_fetch_assoc($resultadoConsulta)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['titulo']; ?></td>
                <td><img src="/imagenes/<?php echo $row['imagen']; ?>" class="imagen-tabla"></td>
                <td>$<?php echo $row['precio']; ?></td>
                <td>
                    <a href="/admin/propiedades/actualizar.php?id=<?php echo $row['id']; ?>" class="boton-amarillo-block">Actualizar</a>
                    
                    <form action="" method="POST" class="w-100">

                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                        <input type="submit" class="boton-rojo-block" value="Eliminar" >
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
            
        </tbody>




    </table>
</main>

<?php

// Cerrar la conexion
mysqli_close($db);

incluirTemplate('footer');
?>