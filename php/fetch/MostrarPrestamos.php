<?php
// Mostrar errores (solo para depuración, luego quitar)
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('conn.php');

// Verificar conexión
if ($conn->connect_error) {
    die(json_encode(["error" => "Error de conexión: " . $conn->connect_error]));
}

// Configurar la respuesta como JSON
header('Content-Type: application/json');

// Consulta SQL
$sql = "SELECT IDPréstamo, TipoHerramienta, IDHerramienta, AprobadorPréstamo FROM prestamo";
$resultado = $conn->query($sql);

$solicitudes = [];

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $solicitudes[] = $fila;
    }
}

// Cerrar conexión
$conn->close();

// Imprimir JSON limpio sin espacios extra
echo json_encode($solicitudes);
