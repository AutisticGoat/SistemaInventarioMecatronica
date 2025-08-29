# Dependencias: 
XAMPP 8.2.12 (https://sourceforge.net/projects/xampp/files/)

# Instalación
- Descargar e instalar XAMPP
- Dirigirse a la ruta C:\xampp\htdocs
- Colocar la carpeta del repositorio dentro de htdocs
- Nover el archivo IniciarApp.bat al escritorio (opcional)

Una vez realizado, no se deben repetir los pasos

# Configuración de XAMPP
- Abrir el panel de control de XAMPP
- Entrar a la opción de configuración de Apache
- Abrir httpd.conf
- Bajar hasta encontrar la línea que pone "Listen 80"
- Cambiar "Listen 80" por "Listen 1234"
- Guardar el archivo
- Reiniciar el servicio de Apache

Una vez realizado, no se deben repetir los pasos

# Instalación de la base de datos
- Abrir "localhost:1234/phpmyadmin" en tu navegador
- En el panel izquierdo hacer click en Nueva
- En el recuardro "Crear base de datos", nombre la base de datos como "sistemamecatronica" y luego haga click en crear
- En el panel izquierdo seleccione la base de datos
- En la parte de arriba haga click en IMPORTAR
- En el recuadro Archivo a importar, haga click en examinar
- Seleccione el archivo sistemamecatronica.sql
- Diríjase hacia abajo del todo y haga click en IMPORTAR

Una vez realizado, no se deben repetir los pasos


# Ejecución
- Hacer doble click en el archivo IniciarApp.bat
- Esperar a que aparezcan las ventanas de CMD
- Una vez que se haya abierto la aplicación en el navegador, cierre las ventanas de CMD
