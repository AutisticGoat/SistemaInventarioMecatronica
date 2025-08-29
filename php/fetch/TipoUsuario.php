<?php
require_once("conn.php");
session_start();

$UserSession =  $_SESSION['NombreUsuario'];

$QueryString = "SELECT TipoUsuario from usuario where NombreUsuario = '$UserSession'";
$Querycheck = mysqli_query($conn, $QueryString);

$Rows = mysqli_fetch_assoc($Querycheck);
$TipoUsuario = $Rows['TipoUsuario'];

// Esto es solo una función de ayuda para desplegar el nombre del usuario
echo json_encode(array(
    "TipoUsuario" => $TipoUsuario,
));
?>