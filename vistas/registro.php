<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmobiliaria X - Registro</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma-rtl.min.css">
    <script src="https://kit.fontawesome.com/15181efa86.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../estilos/estilo.css">
</head>

<body>

    <section class="container">

        <div class="columns is-multiline">

            <div class="column is-8 is-offset-2 register">

                <div class="columns">

                    <div class="column left">
                        <h1 class="title is-1">Inmobiliaria Builo</h1>
                        <h2 class="subtitle colored is-4">Estás a un paso de registrarte en la plataforma</h2>
                        <img src="../imagenes/bienvenido.png" alt="" draggable="false">
                    </div>

                    <div class="column right has-text-centered">

                        <h1 class="title is-4">Registrate</h1>
                        <p class="description">Ingresa tu usuario y tu contraseña para iniciar sesión</p>

                        <form method="post" action="registro.php">

                            <div class="field">
                                <div class="control">
                                    <input class="input is-medium" type="text" placeholder="Ingresa tus nombres"
                                        name="nombres" required>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input is-medium" type="text" placeholder="Ingresa tus apellidos"
                                        name="apellidos" required>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input is-medium" type="email" placeholder="Ingresa tu correo"
                                        name="correo" required>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input is-medium" type="password" placeholder="Ingresa tu contraseña"
                                        name="contraseña" required>
                                </div>
                            </div>

                            <button class="button is-block is-success is-fullwidth is-medium" type="submit"
                                value="Ingresar" name="registro">Registrarme</button>
                            <br />

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

</body>

</html>

<?php

// ini_set('display_errors', 0);
// error_reporting(E_ERROR | E_WARNING | E_PARSE); 

include('../conexion.php');

if(isset($_POST['registro'])) {

    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $correo = strtolower($_POST["correo"]);
    $contraseña = $_POST["contraseña"];

    $queryInserccion = "INSERT INTO usuarios(nombres, apellidos, correo, password) values ('$nombres','$apellidos', '$correo', '$contraseña')";

    $resultado = mysqli_query($conexion, $queryInserccion);

    if($resultado) {

        $_SESSION['correo'] = $correo;

        echo "<script> 
            Swal.fire({
            icon: 'success',
            title: '¡Bien!',
            text: 'El usuario ha sido registrado con éxito.😎',
            type: 'success',
            confirmButtonText: '¡Vale!'
            }).then((res) => { 
                if(res.isConfirmed) { 
                    window.location = 'inicio.php';
                } 
            });
        </script>";

        
    } else {
        // echo "error". $queryInserccion. "<br>";
        // echo "hola". mysqli_errno($conexion);

        if(mysqli_errno($conexion) == 1062){
            echo "<script> Swal.fire({
                icon: 'error',
                title: '¡ERROR!',
                text: 'El correo ".$correo." ya está registrado en la plataforma, escribe otro y intentalo de nuevo. 😰',
                type: 'error'
                });
            </script>";
        }

    }

    mysqli_close($conexion);

}

?>