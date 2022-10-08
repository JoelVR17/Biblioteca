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
    <!--  -->
    <!-- TITLE -->
    <title>Biblioteca Joel Vargas</title>
</head>
<!--fin.Head-->

<!-- BODY -->

<body>

    <!-- HEADER -->
    <?php
    require './plantillas/header.php';
    ?>

    <!-- CONTENEDOR DEL TEXTO -->
    <div class="contenedor_texto">
        <div class="texto">
            <p>En caso de duda, ve a la biblioteca</p>
        </div>
    </div>
    <div class="contendor_imagen">
        <img src="./img/img2.webp" class="d-block w-100" alt="img">
    </div>

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