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

$query = "SELECT * FROM libros";
$resultado = mysqli_query($db, $query);

//  FUNCION PARA CONTAR LIBROS
function cantidadLibros($db)
{
    $query = "SELECT count(*) as cantidad FROM libros";
    $resultado = mysqli_query($db, $query);

    $result = mysqli_fetch_assoc($resultado);

    $cantidad = $result['cantidad'];

    return $cantidad;
}

//  ELIMINAR EL LIBRO
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";

    // Sanitizar número entero
    $id = $_POST['id_eliminar'];
    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

    // Eliminar
    $query = "DELETE FROM libros WHERE id_libro = '${id}'";

    $resultado = mysqli_query($db, $query) or die(mysqli_error($db));

    if ($resultado) {
        header('location: ./index.php');
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

    <!-- DATATABLE -->
    <div class="contenedor">
        <div class="container dataTable sm">

            <div class="contenedor_boton">
                <a href="./libro.php" class="boton btn-verde">Nuevo Libro</a>
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
                            <small class="text-muted"><?php echo $libro['fecha_publicacion'] ?> <?php echo ' | ' . $libro['estado']; ?></small>
                        </div>
                        <a style="margin-top: 10px !important;" href="./actualizarLibro.php?id=<?php echo $libro['id_libro']; ?>" class="boton btn-verde botonG xl">Actualizar</a>
                        <br><br><br>
                        <form method="POST">
                            <input type="hidden" name="id_eliminar" value="<?php echo $libro['id_libro']; ?>">
                            <input type="submit" href="./index.php" class="boton botonG btn-rojo" value="Borrar" />
                        </form>
                    </div>
                <?php endwhile; ?>
            </div>
            <p class="total">Total: <span class="cantidad"><?php echo cantidadLibros($db); ?></span></p>
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
<script src="./js/datatable.js"></script>

</html>
<!--fin.html-->