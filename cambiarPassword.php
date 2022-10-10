<?php

//  CONEXION CON LA BD
require './database/config.php';
$db = conectarBD();

//  SE ESUCHA POR UNA PETICION POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //  se obtienen los datos del formulario
    $cedula = mysqli_real_escape_string($db, $_POST['cedula']);
    $usuario = mysqli_real_escape_string($db, $_POST['usuario']);
    $password = mysqli_real_escape_string($db, $_POST['passwd']);

    //  se hashea el password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    //  se inserta usuario
    $query = "UPDATE usuarios SET pwd = '${passwordHash}' WHERE cedula = '${cedula}' and usuario = '${usuario}'";

    $resultado = mysqli_query($db, $query) or die(mysqli_error($db));

    if ($resultado) {
        header('location: ./login.php');
    } else {
        echo '<p>La Cédula o Usuario no coinciden</p>';
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
    <title>Registro</title>
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
                            <h1>Cambiar Contraseña</h1>
                        </div>
                        <form method="POST" class="row g-3" id="formRegistro">
                            <div class="fonticon col-6">
                                <label for="cambiarCedula" class="form-label">Cedula</label>
                                <input type="text" name="cedula" class="form-control" id="cambiarCedula">
                            </div>
                            <div class="fonticon col-6">
                                <label for="cambiarUser" class="form-label">Usuario</label>
                                <input type="text" name="usuario" class="form-control" id="cambiarUsuario">
                            </div>
                            <div class="fonticon col-12">
                                <label for="cambiarPass" class="form-label">Contraseña</label>
                                <input type="password" name="passwd" class="form-control" id="cambiarPass">
                            </div>
                            <div class="col-12" id="x">
                                <input type="submit" class="btn" id="entrarSistema" value="Actualizar" readonly>
                            </div>
                            <div class="registrate">
                                <p class="registro">
                                    <a class="registroA" href="./login.php"><i class="fa-solid fa-backward"></i></a>
                                </p>
                            </div>
                            <p id="para"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--fin.main-->
</body>
<!--fin.body-->

<!-- JAVASCRIPT -->
<script src="./js/registro.js"></script>

</html>
<!--fin.html-->