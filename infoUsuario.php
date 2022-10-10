<?php

//  VALIDA LA SESSION
require './database/validar.php';
validarSesion();

if (!validarSesion()) {
    header('location: login.php');
}

$usuario = $_SESSION['usuario'];
$nombre = $_SESSION['nombre'];
$cedula = $_SESSION['cedula'];
$id = $_SESSION['id'];

// CONEXION CON LA BD
require './database/config.php';
$db = conectarBD();


$query = "SELECT * FROM libros WHERE id_usuario = '${id}'";
$resultado = mysqli_query($db, $query);

?>

<!-- HTML5 -->
<!DOCTYPE html>

<!-- HTML -->
<html lang="en">

<?php
require './plantillas/head.php'
?>

<!-- BODY -->

<body>
    <!-- HEADER -->
    <?php
    require './plantillas/header.php';
    ?>
    <!-- CONTAINER -->
    <div class="contenedor">
        <div class="container columnTipo">

            <!-- INFO DEL USUARIO -->
            <div class="cont-titulo">
                <h1>Información del Usuario</h1>
            </div>
            <form method="POST" class="row g-3" style="height: auto !important;" id="formRegistro">
                <div class="fonticon col-6 marginB ssm ssm">
                    <label for="agregarTitulo" class="form-label">Nombre</label>
                    <input type="text" name="titulo" class="form-control" id="agregarTitulo" readonly value="<?php echo $nombre ?>">
                </div>
                <div class="fonticon col-6 marginB ssm">
                    <label for="agregarAutor" class="form-label">Cédula</label>
                    <input type="text" name="autor" class="form-control" id="agregarAutor" readonly value="<?php echo $cedula ?>">
                </div>
                <div class="fonticon col-12 marginB ssm">
                    <label for="agregarCategoria" class="form-label">Usuario</label>
                    <input type="text" name="categoria" class="form-control" id="agregarCategoria" readonly value="<?php echo $usuario ?>">
                </div>
                <div class="col-12 marginB centrarVertical" id="x">
                    <a href="./index.php" class="boton btn-negro xxl">Atrás</a>
                </div>
                <div class="col-12 marginB centrarVertical" id="x">
                    <a href="./cambiarPassword.php" style="text-transform: none !important;" class="boton btn-rojo xxl">Cambiar Password</a>
                </div>
                <a id="mostrar" style="margin-top: 10px !important;" class="cursor boton btn-verde botonG xl">Ver Libros Creados</a>
            </form>

            <!-- LIBROS DEL USUARIO -->
            <div class="contenedor_libross ocultar" id="contenedorLibrosMostrar">
                <div class="cont-titulo">
                    <h1>Libros Agregados por el Usuario</h1>
                </div>
                <div class="card-group">
                    <?php while ($libro = mysqli_fetch_assoc($resultado)) : ?>
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body ">
                                <h5 class="card-title tituloCard"><?php echo $libro['titulo']; ?></h5>
                                <h6 class="card-title autorCard"><?php echo $libro['autor']; ?></h6>
                                <hr>
                                <h6 class="card-title categoriaCard">Categoría: &nbsp;<?php echo $libro['categoria']; ?></h6>
                                <hr>
                                <p class="card-text descripcionCard"><?php echo $libro['descripcion']; ?></p>
                            </div>

                            <div class="card-footer fechaCard">
                                <small class="text-muted"><?php echo $libro['fecha_publicacion']; ?></small>
                            </div>
                            <a style="margin-top: 10px !important;" href="./actualizarLibro.php?id=<?php echo $libro['id_libro']; ?>" class="boton btn-verde botonG xl">Actualizar</a>
                            <br><br><br>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="separacion"></div>
    <!-- FOOTER -->
    <?php
    require './plantillas/footer.php';
    ?>

</body>
<!--fin.body-->

<!-- JAVASCRIPT -->
<script src="./js/funcionesInterfaz.js"></script>

</html>
<!--fin.html-->