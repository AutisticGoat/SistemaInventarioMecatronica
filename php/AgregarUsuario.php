<?php
    // Quiero creer que el codigo de este script es lo suficientemente claro como para no necesitar comentarios explicativos
    require_once("conn.php");
    session_start();

    $IDUsuario = $_POST["IDUsuario"];
    $NomrbeUsuario = $_POST["NombreUsuario"];
    $Contraseña = $_POST["Contraseña"];
    $TipoUsuario = $_POST["TipoUsuario"];

    if(!isset($_POST['IngresarUsuario'])){
        echo 'No existe el formulario';
        return;
    }

    if(empty($IDUsuario) || empty($Contraseña) || empty($NomrbeUsuario)) {
        echo 'Por favor rellene los campos faltantes';
        return;
    }

    $ExistCheck = "SELECT * FROM usuario WHERE IdUsuario = '$IDUsuario'";
    $Querycheck = mysqli_query($conn, $ExistCheck);

    if (mysqli_num_rows($Querycheck) > 0) {
        echo 'Usuario ya existente';
        return;
    }

    $AgregarUsuarioQuery = "INSERT INTO usuario VALUES ('$IDUsuario', '$NomrbeUsuario', '$Contraseña', '$TipoUsuario')";
    $Préstamoresult = $conn->query($AgregarUsuarioQuery);

    echo "Usuario agregado exitosamente";

    exit;
?>