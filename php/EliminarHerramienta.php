<?php
    // Quiero creer que el codigo de este script es lo suficientemente claro como para no necesitar comentarios explicativos
    require_once("conn.php");
    require_once("functions.php");

    $IDHerramienta = $_POST["IDHerramienta"];
    $TipoHerramienta = HerramientaNombreEnTabla($_POST["TipoHerramienta"]);

    if(empty($IDHerramienta)) {
        echo 'Por favor Ingrese un ID válido';
        return;
    }

    $ExistCheck = "SELECT * FROM $TipoHerramienta WHERE ID = '$IDHerramienta'";
    $Querycheck = mysqli_query($conn, $ExistCheck);

    if (mysqli_num_rows($Querycheck) <= 0) {
        echo 'Herramienta no existente';
        return;
    }

    $BorrarQuery = "DELETE FROM $TipoHerramienta WHERE ID = '$IDHerramienta'";
    $Préstamoresult = $conn->query($BorrarQuery);

    echo "Herraimenta eliminada exitosamente";

    exit;
?>