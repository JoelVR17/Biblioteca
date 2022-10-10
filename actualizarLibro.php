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

// Verificar el id
$id =  $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: ./index.php');
}

// Obtener el libro
$consulta = "SELECT * FROM libros WHERE id_libro = ${id}";
$resultado = mysqli_query($db, $consulta);
$libro = mysqli_fetch_assoc($resultado);

$titulo = $libro['titulo'];
$autor = $libro['autor'];
$categoria = $libro['categoria'];
$fecha = $libro['fecha_publicacion'];
$descripcion = $libro['descripcion'];
$estado = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //  se obtienen los datos del formulario
    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $autor = mysqli_real_escape_string($db, $_POST['autor']);
    $categoria = mysqli_real_escape_string($db, $_POST['categoria']);
    $fecha = mysqli_real_escape_string($db, $_POST['fecha']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $estadoC = mysqli_real_escape_string($db, $_POST['estado']);

    if ($estadoC == 1) {
        $estado = 'En Biblioteca';
    } else if ($estadoC == 2) {
        $estado = 'Prestado';
    }
}

$query = "UPDATE libros SET titulo = '${titulo}', autor = '${autor}', categoria = '${categoria}', fecha_publicacion = '${fecha}', descripcion = '${descripcion}', estado = '${estado}' WHERE id_libro = '${id}' ";

$resultado = mysqli_query($db, $query) or die(mysqli_error($db));

if (isset($_POST['titulo'])) {
    header('location: index.php');
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
                <h1>Actualizar Libro</h1>
            </div>
            <form method="POST" class="row g-3" style="height: auto !important;" id="formRegistro">
                <div class="fonticon col-6 marginB ssm ssm">
                    <label for="agregarTitulo" class="form-label">Título</label>
                    <input type="text" name="titulo" class="form-control" id="agregarTitulo" required value="<?php echo $titulo ?>">
                </div>
                <div class="fonticon col-6 marginB ssm">
                    <label for="agregarAutor" class="form-label">Autor</label>
                    <input type="text" name="autor" class="form-control" id="agregarAutor" required value="<?php echo $autor ?>">
                </div>
                <div class="fonticon col-6 marginB ssm">
                    <label for="agregarCategoria" class="form-label">Categoría</label>
                    <input type="text" name="categoria" class="form-control" id="agregarCategoria" required value="<?php echo $categoria ?>">
                </div>
                <div class="fonticon col-6 marginB ssm">
                    <label for="agregarFecha" class="form-label">Fecha Publicación</label>
                    <input type="text" name="fecha" class="form-control" id="agregarFecha" required value="<?php echo $fecha ?>">
                </div>
                <div class="fonticon col-12 marginB ssm">
                    <label for="agregarDescripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control marginB" id="agregarDescripcion" required><?php echo $descripcion ?></textarea>
                </div>
                <div class="fonticon col-6 marginB marginT ssm">
                    <label for="agregarDescripcion" class="form-label">Estado &nbsp; &nbsp; &nbsp;</label>
                    <select required name="estado" class="form-select" aria-label="Default select example">
                        <option selected>--Seleccione--</option>
                        <option value="1">En Biblioteca</option>
                        <option value="2">Prestado</option>
                    </select>
                </div>
                <div class="col-12 marginB centrarVertical" id="x">
                    <a href="./index.php" class="boton btn-negro xxl">Atrás</a>
                </div>
                <div class="col-12 marginB" id="x">
                    <input type="submit" class="boton btn-verde xxl" id="agregarLibro" value="Actualizar" readonly>
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