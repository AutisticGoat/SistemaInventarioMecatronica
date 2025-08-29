@echo off
REM ================================
REM Verificar si XAMPP está instalado
REM ================================
if exist "C:\xampp\" (
    echo XAMPP detectado en C:\xampp
    
    REM ================================
    REM Iniciar servicios Apache y MySQL
    REM ================================
    echo Iniciando Apache...
    start "" "C:\xampp\apache_start.bat"
    timeout /t 3 /nobreak >nul

    echo Iniciando MySQL...
    start "" "C:\xampp\mysql_start.bat"
    timeout /t 3 /nobreak >nul

    REM ================================
    REM Abrir navegador en el sistema
    REM ================================
    echo Abriendo navegador en http://localhost:1234/SistemaInventarioMeca
    start http://localhost:1234/SistemaInventarioMeca
) else (
    echo No se encontró XAMPP en C:\xampp
    echo Por favor instala XAMPP o ajusta la ruta en este archivo .bat
    pause
)
