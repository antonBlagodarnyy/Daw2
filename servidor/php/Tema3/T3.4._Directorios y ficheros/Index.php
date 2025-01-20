<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Directorios y ficheros</title>
</head>

<body>
    <form method="POST">
        <form method="POST">
            <input type="submit" name="ej1" value="Ejercicio 1">
            <label for="ej1">Muestra por pantalla el directorio actual.</label><br>

            <input type="submit" name="ej2" value="Ejercicio 2">
            <label for="ej2">Verifica si tienes permisos para crear un directorio.</label><br>

            <input type="submit" name="ej3" value="Ejercicio 3">
            <label for="ej3">Crea un directorio nuevo llamado 'test'.</label><br>

            <input type="submit" name="ej4" value="Ejercicio 4">
            <label for="ej4">Accede al nuevo directorio 'test'.</label><br>

            <input type="submit" name="ej5" value="Ejercicio 5">
            <label for="ej5">Crea un fichero con la cadena "Hola DWES" usando el modo 'w'.</label><br>

            <input type="submit" name="ej6" value="Ejercicio 6">
            <label for="ej6">Abre el fichero anterior y añade una nueva línea usando el modo 'a'.</label><br>

            <input type="submit" name="ej7" value="Ejercicio 7">
            <label for="ej7">Lee e imprime por pantalla el contenido del fichero usando el modo 'r'.</label><br>

            <input type="submit" name="ej8" value="Ejercicio 8">
            <label for="ej8">Copia el fichero con otro nombre.</label><br>

            <input type="submit" name="ej9" value="Ejercicio 9">
            <label for="ej9">Lista los ficheros del directorio actual.</label><br>

            <input type="submit" name="ej10" value="Ejercicio 10">
            <label for="ej10">Elimina todos los contenidos creados y borra el directorio 'test'.</label><br>
        </form>

    </form>


</body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    switch (true) {
        case isset($_POST["ej1"]):
            //1. Muestra por pantalla el directorio actual
            echo "<p>Directorio actual: " . getcwd() . "<br></p>";
            break;

        case isset($_POST["ej2"]):
            //2.-Verifica si tienes permisos para crear un directorio.
            echo is_writable(getcwd()) ?
                "<p>Tiene persmisos para crear un directorio</p>"
                :
                "<p>No tiene permisos para </p>";
            break;

        case isset($_POST["ej3"]):
            //3.-Crea un directorio nuevo llamado 'test'.
            if (file_exists("test")) {
                echo "<p>El archivo ya existe</p>";
            } else {
                echo mkdir("test") ?
                    "<p>Archivo creado</p>" : "<p>Archivo no creado</p>";
            }
            break;

        case isset($_POST["ej4"]):
            //4.-Accede al nuevo directorio
            if (file_exists("test")) {
                chdir("./test");
            }
            echo "<p>Directorio actual:" . getcwd() . "</p>";
            break;

        case isset($_POST["ej5"]):
            //5.-Crea un fichero que contenga la cadena "Hola DWES". Modo w:write
            $archivo = fopen("ej5", "w");
            if (fwrite($archivo, "Hola DWES."))
                echo "Archivo creado";
            fclose($archivo);
            break;

        case isset($_POST["ej6"]):
            //6.-Abre el fichero anterior y añade una nueva línea. Modo a:append
            $archivo = fopen("ej5", "a");
            echo fwrite($archivo, "Nueva linea.") ? "<p>Linea añadida.</p>" : "No se ha podido añadir la linea";
            break;

        case isset($_POST["ej7"]):
            //7.-Lee e imprime por pantalla el fichero de texto. Modo r:read
            $archivo = fopen("ej5", "r");

            echo $archivo ? "<p>Contenido del archivo: " . fread($archivo, filesize("ej5")) . "</p>" : "<p>No se ha podido leer el archivo";
            break;

        case isset($_POST["ej8"]):
            //8.-Copiamos el fichero con otro nombre.
            $archivo = 'ej5';
            $nuevoNombre = 'ej7';
            echo copy($archivo, $nuevoNombre) ? "<p>Archivo copiado</p>" : "<p>No se ha podido copiar el archivo</p>";
            break;

        case isset($_POST["ej9"]):
            //9.-Lista los ficheros del directorio
            $directorios = scandir("./");
            foreach ($directorios as $directorio) {
                echo "<p>$directorio</p>";
            }
            break;

        case isset($_POST["ej10"]):
        /*  10.-Elimino todo el contenido creado
            Primero eliminar ficheros creados, para vaciar directorios.
            Seguidamente, eliminar el directorio creado. */
            function deleteFolders()
            {
                $deleted = false;
                if (file_exists("ej5")) {
                    unlink("ej5");
                    $deleted = true;
                }

                if (file_exists("ej7")) {
                    unlink("ej7");
                    $deleted = true;
                }

                if (is_dir("test")) {
                    rmdir("test");
                    $deleted = true;
                }
                return $deleted;
            }

            echo deleteFolders() ? "<p>Archivos borrados</p>" : "<p>No se han borrado archivos</p>";

            break;

        default:
            break;
    }
}
?>


</html>