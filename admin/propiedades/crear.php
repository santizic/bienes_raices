<?php

require '../../includes/funciones.php';

$auth = estaAutenticado();

if(!$auth) {
    header('Location: /');
}

// Base de Datos
require '../../includes/config/database.php';
$db = conectarDB();

// Consultar para obtener los vendedores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

// Arreglo con mensajes de errores
$errores = [];



$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedorId = '';





// Ejecutar el codigo despues de que el usuario envie el formulario
if($_SERVER['REQUEST_METHOD'] === 'POST') {

    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    // echo "<pre>";
    // var_dump($_FILES);
    // echo "</pre>";

    $titulo = mysqli_real_escape_string( $db, $_POST['titulo'] );
    $precio = mysqli_real_escape_string( $db, $_POST['precio'] );
    $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion'] );
    $habitaciones = mysqli_real_escape_string( $db, $_POST['habitaciones'] );
    $wc = mysqli_real_escape_string ($db, $_POST['wc'] );
    $estacionamiento = mysqli_real_escape_string( $db, $_POST['estacionamiento'] );
    $vendedorId = mysqli_real_escape_string( $db, $_POST['vendedor'] );
    $creado = mysqli_real_escape_string( $db, date('Y/m/d') );

    // Asignar files hacia una variable
    $imagen = $_FILES['imagen'];

    // var_dump($imagen['name']);

    if(!$titulo) {
        $errores[] = 'Debes añadir un Título';
    }

    if(!$precio) {
        $errores[] = 'Debes añadir un precio';
    }

    if($precio > 99999999) {
        $errores[] = 'El precio ingresado es un valor demasiado alto';
    }

    if( strlen($descripcion) < 50 ) {
        $errores[] = 'La descripcion es obligatoria y debe tener al menos 50 caracteres';
    }

    if(!$habitaciones) {
        $errores[] = 'Debes añadir un numero de habitaciones';
    }

    if(!$wc) {
        $errores[] = 'Debes añadir un numero de baños';
    }

    if(!$estacionamiento) {
        $errores[] = 'Debes añadir un numero de plazas de estacionamiento';
    }

    if(!$vendedorId) {
        $errores[] = 'Debes seleccionar un vendedor';
    }
    
    if(!$imagen['name'] || $imagen['error']) {
        $errores[] = 'La imagen es obligatoria'; 
    }

    // Validar por medida (1mb maximo)
    $medida = 1000 * 1000;

    if($imagen['size'] > $medida) {
        $errores[] = 'La imagen es muy pesada';
    }

    //echo "<pre>";
    //var_dump($errores);
    //echo "</pre>";

    // Revisar que el arreglo de errores este vacio
    if(empty($errores)) {

        /**  SUBIDA DE ARCHIVOS **/

        // Crear carpeta
        $carpetaImagenes = '../../imagenes/';

        if(!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }

        // Generar un nombre unico
        $nombreImagen = md5( uniqid( rand(), true) ) . ".jpg";

        // Subir la imagen
        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);

        // Insertar en la base de datos
        $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedorId)
        VALUES ( '$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedorId')";

        //echo $query;

        $resultado = mysqli_query($db, $query);

        if($resultado) {

            // Redireccionar al usuario
            header('Location: /admin?resultado=1');
        }

    }
}


incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Crear</h1>

    <a href="/admin/index.php" class="boton boton-verde">Volver</a>

    <?php foreach($errores as $error): ?>
    <div class="alerta error">
        <?php echo $error; ?>
    </div>
    <?php endforeach; ?>


    <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Título:</label>
            <input type="text" name="titulo" placeholder="Titulo de Propiedad" id="titulo" value="<?php echo $titulo; ?>">

            <label for="precio">Precio:</label>
            <input type="number" name="precio" placeholder="Precio de Propiedad" id="precio" value="<?php echo $precio; ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="10"><?php echo $descripcion; ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Información de la Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" name="habitaciones" placeholder="Ej: 3" id="habitaciones" min="1" value="<?php echo $habitaciones; ?>">

            <label for="wc">Baños:</label>
            <input type="number" name="wc" placeholder="Ej: 1" id="wc" min="1" value="<?php echo $wc; ?>">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" name="estacionamiento" placeholder="Ej: 2" id="estacionamiento" min="0" value="<?php echo $estacionamiento; ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedor" id="vendedor">
                <option value="">-- seleccione --</option>
                <?php while($row = mysqli_fetch_assoc($resultado)): ?>
                    <option <?php echo $vendedorId === $row['id'] ? 'selected' : ''; ?> value="<?php echo $row['id']; ?>"><?php echo $row['nombre'] . ' ' . $row['apellido']; ?></option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>

</main>

<?php
incluirTemplate('footer');
?>