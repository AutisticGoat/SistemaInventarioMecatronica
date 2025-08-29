<?php
    require_once("conn.php");
    require_once("functions.php");
    session_start();

    // Este es el tipo de herramienta tomada del elemento Select en Préstamo.html
    $Herramienta = $_POST["Herramientas"];
    $IDHerramientaHTML = $_POST["ID"];
    $QueryHerramienta = HerramientaNombreEnTabla(($Herramienta));

    // Si se selecciona una herramienta inválida, termina la ejecución del código
    if ($QueryHerramienta == "") {
        echo "Ha ocurrido un error en la selección de herramienta";
        return;
    }

    // Si se ingresa un ID inválido, termina la ejecución del código
    if ($IDHerramientaHTML == "0") {
        echo "Ingrese un ID válido";
        return;
    }

    $sql = "SELECT * FROM $QueryHerramienta WHERE ID = '$IDHerramientaHTML'";
    $resultado = $conn->query(query: $sql);
    $fila =  $resultado->fetch_assoc();
    $Disponible = $fila["Disponible"];

    // Si la cantidad de herramientas es menor a uno (o sea, 0), termina la ejecución del código
    if ($resultado->num_rows < 1) {
        echo "No hay herramientas";
        return;
    }

    // Si la herramienta no se encuentra prestada, mostrar un mensaje y terminar la ejecución del código
    if ($Disponible != 0) {
        echo "La herramienta no se encuentra prestada";
        return;
    }

    // Actualiza el estado del la herramienta devuelta a 'Disponible'
    $updateQuery = "UPDATE $QueryHerramienta SET Disponible = 1 WHERE ID = '$IDHerramientaHTML'";
    $result = $conn->query($updateQuery);
    $User = $_SESSION['Usuario'];

    // Inserta en la tabla devolución una nueva entrada, tomando el Tipo de Herramienta, el ID de la herramienta y quien aprobó el préstamo
    $PréstamoQuery = "INSERT INTO devolucion (TipoHerramienta, IDHerramienta, AprobadorDevolución) 
    VALUES
    ('$Herramienta', '$IDHerramientaHTML', '$User')";
    $Préstamoresult = $conn->query($PréstamoQuery);

    // Muestra un mensaje para reflejar la devolución exitosa de la herramienta
    echo $Herramienta . " Numero " . $IDHerramientaHTML . " devuelto/a exitosamente, autorizado por el usuario " . $_SESSION['NombreUsuario'];
?>