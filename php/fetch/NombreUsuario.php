<?php
require_once("conn.php");
session_start();

// Esto es solo una función de ayuda para desplegar el nombre del usuario
echo json_encode(array(
    "NombreTrab" => $_SESSION['NombreUsuario'],
    "NumTrab" => $_SESSION['Usuario'],
));
?>