<?php
// Archivo PHP mayormente orientado a albergar funciones de utilidad
    require_once("conn.php");

    /**
    * Retorna el nombre de la herramienta en la base de datos según su nombre en el selects
    * @param string $Herramienta 
    */
    function HerramientaNombreEnTabla($Herramienta) {
        $str = "";

        switch ($Herramienta) { 
            case "Osciloscopio":
                $str = "osciloscopio";
                break;
            case "Fuente":
                $str = "fuente";
                break;
            case "Fuente Dual":
                $str = "fuentedual"
                break;
            case "Multímetro":
                $str = "multimetro"
                break;
            case "Multímetro de gancho":
                $str = "multimetrogancho"
                break;
            case "Estación de soldadura":
                $str = "estacionsoldadura"
                break;
            default:
                $str = "";
                break;
        }
        return $str;
    }

    /**
     * Obtiene la hora actual en formato HH:MM:SS por defecto
     * @param string $formato - Formato personalizado (ej: 'h:i a')
     * @return string - Hora formateada
     */
    function obtenerHoraActual(string $formato = 'H:i:s'): string {
        return (new DateTime())->format($formato);
    }

    /**
     * Obtiene la fecha actual en formato YYYY-MM-DD por defecto
     * @param string $formato - Formato personalizado (ej: 'd/m/Y')
     * @return string - Fecha formateada
     */
    function obtenerFechaActual(string $formato = 'Y-m-d'): string {
        return (new DateTime())->format($formato);
    }
?>