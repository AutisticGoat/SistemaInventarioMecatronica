<?php
    require_once("conn.php");
    require_once("functions.php");

    session_start();

    // Este es el tipo de herramienta tomada del elemento Select en Préstamo.html
    $Herramienta = $_POST["Herramientas"];
    $QueryHerramienta = HerramientaNombreEnTabla($Herramienta);

    // Pequeño fail-safe por si la herramienta no se encuentra disponible
    if ($QueryHerramienta == "") {
        echo "Ha ocurrido un error en la selección de herramienta";
        return;
    }

    $sql = "SELECT * FROM $QueryHerramienta";
    $resultado = $conn->query(query: $sql);

    // Si el número de herramientas obtenidas en el Query es menor a 1 (o sea, 0), la ejecución del código termina
    if ($resultado->num_rows < 1) {
        echo "No hay herramientas";
        return;
    }

    // Itera sobre todas las filas obtenidas en el fetch de la consulta SQL, si hay herramientas disponibles, se selecciona la primer disponible que contenga el ID más bajo, asigna dicho ID a la variable $PrimerHerramientaDisponible
    $PrimerHerramientaDisponible = "";
    while ($fila = $resultado->fetch_assoc()) {
        if ($fila["Disponible"] != 1 or $fila["Estado"] == "Averiado") { continue; } // Prefiero saltar al próximo loop usando continue en vez de anidar condiciones, lo encuentro más cómodo
        $PrimerHerramientaDisponible = $fila["ID"];
        break;
    }

    // Si no se encuentran herramientas disponibles, $PrimerHerramientaDisponible quedará vacío, se mostrará un mensaje y terminará la ejecución del código
    if ($PrimerHerramientaDisponible == "") { 
        echo "Todos/as los/as " . $Herramienta . "s se encuentran ocupados/as";
        return;
    }

    // Actualiza el estado de la herramienta seleccionada a Prestado
    $updateQuery = "UPDATE $QueryHerramienta SET Disponible = 0 WHERE ID = '$PrimerHerramientaDisponible'";
    $result = $conn->query($updateQuery);

    // Inserta en la tabla prestamo una nueva entrada, tomando el Tipo de Herramienta, el ID de la herramienta y quien aprobó el préstamo
    $User = $_SESSION["Usuario"];
    $PréstamoQuery = "INSERT INTO prestamo (TipoHerramienta, IDHerramienta, AprobadorPréstamo) 
    VALUES
    ('$Herramienta', '$PrimerHerramientaDisponible', '$User')";
    $Préstamoresult = $conn->query($PréstamoQuery);

    // Muestra un mensaje para reflejar el préstamo exitoso de la herramienta
    echo $Herramienta . " Numero " . $PrimerHerramientaDisponible . " prestado/a exitosamente por el usuario " . $_SESSION['NombreUsuario'];
?>