<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title> Ejercicio 5 </title>
    </head>
    <body>
        <h2> Validación de edad y sexo </h2>
        <?php
            $edad1 = $_POST["edad"];
            $sexo1 = $_POST["sexo"];
            echo "La edad ingresada es: $edad1<br>";
            echo "El sexo ingresado fue: $sexo1<br>";
            if($sexo1 == "femenino"&& ($edad1>=18 && $edad1<=35 )){
                echo "<p><i>Bienvenida, usted está en el rango de edad permitida</i></p>";
            } else {
                echo "<p>Error, el sexo no coincide o la edad no se encuentra en el rango</p>";
            }
        ?>
    </body>
</html>