<?php

function validarSesion()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }    

    if (isset($_SESSION['usuario'])) {
        return true;
    } else {
        return false;
    }
}

