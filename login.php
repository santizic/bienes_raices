<?php

    // Conexion
    require 'includes/config/database.php';
    $db = conectarDB();




    // Autenticar el Usuario

    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if(!$email) {
            $errores[] = 'El email ingresado no es válido';
        }
    
        if(!$password) {
            $errores[] = 'La contraseña es obligatoria';
        }
    
        if(empty($errores)) {
            // Revisar si el usuario existe
            $query = "SELECT * FROM usuarios WHERE email = '${email}' ";
            $resultado = mysqli_query($db, $query);
            
    
            if($resultado->num_rows) {
                //revisar si el password es correcto
                $usuario = mysqli_fetch_assoc($resultado);
    
                $auth = password_verify($password, $usuario['password']);
    
                if($auth) {
                    // Elusuario esta autenticado
                    session_start();
    
                    // Llenar el arreglo de la sesion
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;

                    header('Location: /admin');
    
    
                } else {
                    $errores[] = 'La contraseña es incorrecta';
                }
    
            } else {
                $errores[] = 'El Usuario no existe';
            }
        }

    }

    


    // Incluye el header 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>

    <?php endforeach; ?>

    <form method="POST" action="" class="formulario" novalidate>
        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Tu email" id="email" >

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Tu contraseña" id="password" >

        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    
    </form>
</main>

<?php
    incluirTemplate('footer');
?>