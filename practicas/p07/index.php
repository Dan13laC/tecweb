<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 4</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <?php
        require('src/funciones.php');
        if(isset($_GET['numero']))
        {
            $num = $_GET['numero'];
            echo "<p>El número introducido fue $num</p>";
            ej1($num);
        }
        
    ?>

    <h2>Ejercicio 2</h2>
    <p>Encontrar en 3 números aleatorios que sean impar-par-impar</p>
    <?php
        //require('src/funciones.php');
        ejercicio2();
    ?>

    <h2>Ejercicio 3</h2>
    <p>Encontrar el primer multiplo aleatorio de un número dado</p>
    <?php
        if(isset($_GET['numero3']))
        {
            $num3 = $_GET['numero3'];
            echo "<p>El número introducido fue $num3</p>";
            ej3($num3);
        }
    ?>
    <h2>Ejercicio 4</h2>
    <p>Crear e imprimir tabla ASCII de abecedario</p>
    <?php
        ej4();
    ?>
    <h2>Ejemplo de POST</h2>
    <form action="http://localhost/tecweb/practicas/p07/respf1.php" method="post">
        Sexo: <input type="text" name="sexo"><br>
        Edad: <input type="number" name="edad"><br>
        <input type="submit" name="enviar">
    </form>
    <br>
    <?php
        if(isset($_POST["sexo"]) && isset($_POST["edad"]))
        {/*
            echo $_POST["edad"];
            echo '<br>';
            echo $_POST["email"];
        */}


    ?>
</body>
</html>