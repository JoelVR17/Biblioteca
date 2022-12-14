<?php
    require_once './database/validar.php';
?>

<!-- HEADER -->
<header id="header">
    <!-- TITLE -->
    <ul class="menu" id="logo">
        <li>
            <a href="./index.php">
                <span class="log" id="titulo">La LibroTeca</span>
                <span>
                    <i class="fa-solid fa-book libro"></i>
                </span>
            </a>
        </li>
    </ul>

    <!-- LINKS -->
    <nav id="nav">
        <ul id="list">
            <li>
                <a href="./buscarLibro.php" id="myInput" class="link">Buscar Libro</a>
            </li>
            <li>
                <a href="./infoUsuario.php" class="link">Información del Usuario</a>
            </li>
            <li>
                <a href="./bienvenida.php" class="link"><i class="fa-solid fa-right-from-bracket"></i></a>
            </li>
        </ul>
    </nav>
</header>
<!-- finish.header -->