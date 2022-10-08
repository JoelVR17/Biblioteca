<?php

//  FUNCION PARA CONECTAR A LA BD
function conectarBD(): mysqli {
    $db = mysqli_connect('localhost', 'root', 'JoelVR17/*/', 'Biblioteca');

    if (!$db) {
        echo "Error: No se pudo conectar a MySQL.";
        echo "errno de depuración: " . mysqli_connect_errno();
        echo "error de depuración: " . mysqli_connect_error();
        exit;
    }

    return $db;
}