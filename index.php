<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmobiliaria - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma-rtl.min.css">
    <script src="https://kit.fontawesome.com/15181efa86.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="estilos/estilo.css">
</head>

<body>

    <section class="container">

        <div class="columns is-multiline">

            <div class="column is-8 is-offset-2 register">

                <div class="columns">

                    <div class="column left">
                        <h1 class="title is-1">Inmobiliaria X</h1>
                        <h2 class="subtitle colored is-4">Lorem ipsum dolor sit amet.</h2>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis ex deleniti aliquam
                            tempora libero excepturi vero soluta odio optio sed.</p>
                    </div>

                    <div class="column right has-text-centered">

                        <h1 class="title is-4">Login</h1>
                        <p class="description">Ingresa tu usuario y tu contraseña para iniciar sesión</p>

                        <form method="post" action="index.php">

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

                            <button class="button is-block is-info is-fullwidth is-medium" type="submit"
                                value="Ingresar" name="login">Loguearme</button>
                            <br />

                            <small><em>¿No tienes una cuenta? <a href="vistas/registro.php">Registrate</a></em></small>
                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

</body>

</html>

<?php 

ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 

include('conexion.php');

session_start();
if(isset($_SESSION['correo'])) {
    header("Location: vistas/inicio.php");
}

if(isset($_POST['login'])) {
	
    $correo = strtolower($_POST["correo"]);
    $contraseña = $_POST["contraseña"];

    $query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '".$correo."' AND password = '".$contraseña."'");
    $contador_resultado = mysqli_num_rows($query);

    if($contador_resultado == 1){
        $_SESSION['correo'] = $correo;
        header("Location: vistas/inicio.php");
    } else if($contador_resultado == 0) {
        echo
        "<script> 
        Swal.fire({
        title: '¡ERROR!',
        text: 'El usuario ".$correo." no está registrado o la contraseña no es correcta. Intentalo de nuevo.',
        type: 'error'
        });
        </script>";
    }
    mysqli_close($conexion);
} 

?>
