
<?php
    // Quiero creer que el codigo de este script es lo suficientemente claro como para no necesitar comentarios explicativos
    require_once("conn.php");

    $IDUsuario = $_POST["IDUsuario"];

    if(!isset($_POST['IngresarUsuario'])){
        echo 'No existe el formulario';
        return;
    }

    if(empty($IDUsuario)) {
        echo 'Por favor Ingrese un usuario válido';
        return;
    }

    $ExistCheck = "SELECT * FROM usuario WHERE IdUsuario = '$IDUsuario'";
    $Querycheck = mysqli_query($conn, $ExistCheck);

    $Rows = mysqli_fetch_assoc($Querycheck);
    $NombreUsuario = $Rows['NombreUsuario'];

    if (mysqli_num_rows($Querycheck) <= 0) {
        echo 'Usuario no existente';
        return;
    }

    $BorrarQuery = "DELETE FROM usuario WHERE IdUsuario = '$IDUsuario'";
    $Préstamoresult = $conn->query($BorrarQuery);

    echo "Usuario/a " . $NombreUsuario . " eliminado exitosamente";

    exit;
?>