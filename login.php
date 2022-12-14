<?php

//  CONEXION CON LA BD
require './database/config.php';
$db = conectarBD();

$error = 0;

//  SE ESUCHA POR UNA PETICION POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //  se obtienen los datos del formulario
    $usuario = mysqli_real_escape_string($db, $_POST['usuario']);
    $password = mysqli_real_escape_string($db, $_POST['passwd']);

    // revisar si el usuario existe
    $query = "SELECT * FROM usuarios WHERE usuario = '${usuario}' ";
    $resultado = mysqli_query($db, $query);

    //  SI EL USUARIO EXISTE    
    if ($resultado->num_rows) {
        // Revisar si el password esta bien
        $usuario = mysqli_fetch_assoc($resultado);

        // Password a revisar y el de la BD.
        if (password_verify($password, $usuario['pwd'])) {
            $auth = true;
        } else {
            $auth = false;
        }

        if ($auth) {
            session_start();
            $idS = $usuario['id_usuario'];
            $usuarioS = $usuario['usuario'];
            $cedulaS = $usuario['cedula'];
            $nombreS = $usuario['nombre'];

            $_SESSION['id'] = $idS;
            $_SESSION['nombre'] = $nombreS;
            $_SESSION['usuario'] = $usuarioS;
            $_SESSION['cedula'] = $cedulaS;
            $_SESSION['login'] = 1;

            header('location: ./index.php');
        } else {
            $error = 1;
        }
    } else {
        $error = 2;
    }
}

?>

<!-- HTML5 -->
<!DOCTYPE html>

<!-- HTML -->
<html lang="en">

<!-- HEAD -->

<head>
    <!-- META -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- LINKS -->
    <link rel="stylesheet" href="./css/styles.css">
    <!-- NORMALIZE -->
    <link rel="stylesheet" href="./css/normalize.css">
    <!-- FONT-AWESOME -->
    <script src="https://kit.fontawesome.com/fe4e860efc.js" crossorigin="anonymous"></script>
    <!-- FONTS -->
    <style>
        /* Monserrat */
        @import url('https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@500&family=Permanent+Marker&display=swap');
        /* Roboto */
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap');
        /* Open Sans */
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap');
        /* Michroma */
        @import url('https://fonts.googleapis.com/css2?family=Michroma&display=swap');
    </style>
    <!-- TITLE -->
    <title>Login</title>
</head>
<!--fin.Head-->

<!-- BODY -->

<body class="body">
    <!-- MAIN -->
    <main class="container-fluid todo">
        <div class="row">
            <!-- COLUMNA DEL LOGO -->
            <div class="col col-1">
                <div class="container">
                    <a class="logo" href="bienvenida.php"><img class="img-fluid" src="./img/icon.jpg" alt=""></a>
                </div>
                <div class="container-titulo">
                    <p class="merca">Libro<br><span class="super">Teca</span></p>
                </div>
            </div>
            <!-- COLUMNA DEL FORMULARIO -->
            <div class="col col-2">
                <div class="cont-form">
                    <div class="cont-form-cont">
                        <div class="cont-titulo">
                            <h1>??Inicia Sesi??n!</h1>
                        </div>
                        <form method="POST" class="row g-3" id="formRegistro">
                            <div class="fonticon col-12">
                                <label for="registerUser" class="form-label">Usuario</label>
                                <input type="text" name="usuario" class="form-control" id="registerUsuario">
                            </div>
                            <div class="fonticon col-12">
                                <label for="registerPass" class="form-label">Contrase??a</label>
                                <input type="password" name="passwd" class="form-control" id="registerPass">
                            </div>
                            <div class="col-12" id="x">
                                <input type="submit" class="btn" id="entrarSistema" value="Ingresar" readonly>
                            </div>
                            <div class="registrate">
                                <p class="registro">??No tienes cuenta? -
                                    <a class="registroA" href="registro.php">Reg??strate</a>
                                </p>
                                <p class="registro">??Olvidaste la contrase??a? -
                                    <a class="registroA" href="./cambiarPassword.php">Recup??rala</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                if ($error == 1) {
                    echo '<div class="contenedor_error"><p class="anuncio">Contrase??a Incorrecta</p></div>';
                } else if ($error == 2){
                    echo '<div class="contenedor_error"><p class="anuncio">El Usuario no Existe</p></div>';
                }?>
            </div>
        </div>
    </main>
    <!--fin.main-->
</body>
<!--fin.body-->

<!-- JAVASCRIPT -->
<script src=""></script>

</html>
<!--fin.html-->