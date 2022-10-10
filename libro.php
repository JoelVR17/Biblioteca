<?php

//  VALIDA LA SESSION
require './database/validar.php';
validarSesion();

if (!validarSesion()) {
    header('location: login.php');
}

// CONEXION CON LA BD
require './database/config.php';
$db = conectarBD();

//  SE ESUCHA POR UNA PETICION POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //  se obtienen los datos del formulario
    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $autor = mysqli_real_escape_string($db, $_POST['autor']);
    $categoria = mysqli_real_escape_string($db, $_POST['categoria']);
    $fecha_publicacion = mysqli_real_escape_string($db, $_POST['fecha']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $estadoC = mysqli_real_escape_string($db, $_POST['estado']);

    if ($estadoC == 1) {
        $estado = 'En Biblioteca';
    } else if ($estadoC == 2) {
        $estado = 'Prestado';
    }

    // IMG
    // ! PROBLEMAS
    $nombreImg = $_FILES['img']['name'];
    $archivo = $_FILES['imagen']['tmp_name'];
    $ruta = 'imagenLibros';
    $ruta = $ruta . '/' . $nombreImg;
    move_uploaded_file($archivo, $ruta);
    // ! --------------------------------------

    $id = $_SESSION['id'];

    //  se inserta libro
    $query = "INSERT INTO libros (id_usuario, titulo, autor, categoria, fecha_publicacion, descripcion, img, estado) VALUES ($id,'$titulo', '$autor', '$categoria', '$fecha_publicacion', '$descripcion', '$ruta', '$estado')";

    $resultado = mysqli_query($db, $query) or die(mysqli_error($db));

    if ($resultado) {
        header('location: ./index.php');
    } else {
        echo '<p>Error</p>';
    }
}

?>

<!-- HTML5 -->
<!DOCTYPE html>

<!-- HTML -->
<html lang="en">

<!-- HEAD -->
<?php
require './plantillas/head.php';
?>

<!-- BODY -->

<body>

    <!-- HEADER -->
    <?php
    require './plantillas/header.php';
    ?>

    <!-- CONTAINER -->
    <div class="container">
        <div class="contenedor_crear sm columnTipo">
            <div class="cont-titulo">
                <h1>Agregar Libro</h1>
            </div>
            <form method="POST" class="row g-3" style="height: auto !important;" id="formRegistro">
                <div class="fonticon col-6 marginB ssm ssm">
                    <label for="agregarTitulo" class="form-label">Título</label>
                    <input type="text" name="titulo" class="form-control" id="agregarTitulo" required>
                </div>
                <div class="fonticon col-6 marginB ssm">
                    <label for="agregarAutor" class="form-label">Autor</label>
                    <input type="text" name="autor" class="form-control" id="agregarAutor" required>
                </div>
                <div class="fonticon col-6 marginB ssm">
                    <label for="agregarCategoria" class="form-label">Categoría</label>
                    <input type="text" name="categoria" class="form-control" id="agregarCategoria" required>
                </div>
                <div class="fonticon col-6 marginB ssm">
                    <label for="agregarFecha" class="form-label">Fecha Publicación</label>
                    <input type="text" name="fecha" class="form-control" id="agregarFecha" required>
                </div>
                <div class="fonticon col-12 marginB ssm">
                    <label for="agregarDescripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control marginB" id="agregarDescripcion" required></textarea>
                </div>
                <div class="fonticon col-6 marginB marginT ssm centrar">
                    <label for="agregarDescripcion" class="form-label">Imagen &nbsp; &nbsp; &nbsp;</label>
                    <input type="file" name="img" class="marginB" id="agregarImagen" required></input>
                </div>
                <div class="fonticon col-6 marginB ssm">
                    <label for="agregarDescripcion" class="form-label">Estado &nbsp; &nbsp; &nbsp;</label>
                    <select name="estado" class="form-select" aria-label="Default select example">
                        <option selected>--Seleccione--</option>
                        <option value="1">En Biblioteca</option>
                        <option value="2">Prestado</option>
                    </select>
                </div>
                <div class="col-12 marginB centrarVertical" id="x">
                    <a href="./index.php" class="boton btn-negro xxl">Atrás</a>
                </div>
                <div class="col-12 marginB" id="x">
                    <input type="submit" class="boton btn-verde xxl" id="agregarLibro" value="Agregar" readonly>
                </div>
            </form>
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