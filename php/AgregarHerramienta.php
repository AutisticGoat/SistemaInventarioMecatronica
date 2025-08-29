<?php
    // Quiero creer que el codigo de este script es lo suficientemente claro como para no necesitar comentarios explicativos
    require_once("conn.php");
    require_once("functions.php");
    session_start();

    $TipoHerramienta = HerramientaNombreEnTabla($_POST["TipoHerramienta"]);
    $IDHerramienta = $_POST["IDHerramienta"];

    echo $TipoHerramienta;

    if(!isset($_POST['IngresarUsuario'])){
        echo 'No existe el formulario';
        return;
    }

    if(empty($IDHerramienta) or $IDHerramienta == "0") {
        echo 'Ingrese un ID de herramienta válido';
        return;
    }

    $ExistCheck = "SELECT * FROM $TipoHerramienta WHERE ID = '$IDHerramienta'";
    $Querycheck = mysqli_query($conn, $ExistCheck);

    if (mysqli_num_rows($Querycheck) > 0) {
        echo 'Herramienta ya existente';
        return;
    }

    $AgregarUsuarioQuery = "INSERT INTO $TipoHerramienta VALUES ('$IDHerramienta', 'Activo', '1')";
    $Préstamoresult = $conn->query($AgregarUsuarioQuery);

    echo "Herramienta agregado exitosamente";

    exit;
?>