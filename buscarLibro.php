<?php

//  VALIDA LA SESSION
require './database/validar.php';
validarSesion();

if (!validarSesion()) {
    header('location: login.php');
}

//  CONEXION CON LA BD
require './database/config.php';
$db = conectarBD();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //  se obtienen los datos del formulario
    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);

    $query = "SELECT * FROM libros WHERE titulo LIKE '%${titulo}%'";
    $resultado = mysqli_query($db, $query);
}

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
        <div class="container">
            <div class="contenedor_crear sm columnTipo">
                <div class="cont-titulo">
                    <h1>Buscar Libro</h1>
                </div>
                <form method="POST" class="row g-3" style="height: auto !important;" id="formRegistro">
                    <div class="fonticon col-12 marginB ssm ssm">
                        <label for="agregarTitulo" class="form-label">Título</label>
                        <input type="text" name="titulo" class="form-control" id="agregarTitulo" require>
                    </div>
                    <br><br><br>
                    <div class="col-12 marginB centrarVertical" id="x">
                        <a href="./index.php" class="boton btn-negro xxl">Atrás</a>
                    </div>
                    <div class="col-12 marginB" id="x">
                        <input style="margin-top: 20px;" type="submit" class="boton btn-verde xxl" id="agregarLibro" value="Buscar" readonly>
                    </div>
                </form>
            </div>
        </div>

        <div class="container" style="margin-bottom: 40px;">
            <div class="card-group">
                <?php if (isset($resultado)) : ?>
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
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
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
<script src=""></script>

</html>
<!--fin.html-->