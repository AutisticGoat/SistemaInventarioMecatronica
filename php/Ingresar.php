<?php
    require_once("conn.php");

    $Usuario = $_POST["Usuario"];
    $Contraseña = $_POST["Contraseña"];

    if(!isset($_POST['IngresarUsuario'])){
        echo 'No existe el formulario';
        return;
    }

    if(empty($Usuario) || empty($Contraseña)) {
        echo 'Por favor rellene los campos faltantes';
        return;
    }

    $ExistCheck = "SELECT * FROM usuario WHERE IdUsuario = '$Usuario'";
    $Querycheck = mysqli_query($conn, $ExistCheck);

    if (mysqli_num_rows($Querycheck) <= 0) {
        echo 'Usuario no existente';
        return;
    }

    $Rows = mysqli_fetch_assoc($Querycheck);
    $ContraseñaUsuario = $Rows['ContraseñaUsuario'];

    if ($Contraseña != $ContraseñaUsuario) {
        echo 'Contraseña incorrecta';
        return;
    }

    session_start();

    $_SESSION['Usuario'] = $Usuario;
    $_SESSION['NombreUsuario'] = $Rows["NombreUsuario"];

    header("Location: /SistemaInventarioMeca/Menu.html");
    exit;
?>