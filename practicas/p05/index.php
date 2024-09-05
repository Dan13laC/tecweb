<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
    <head>
        <title> Práctica 5 </title>
    </head>

    <body>
        <h3>Ejercicio 1</h3>
            <?php
                $_myvar = '$_myvar es una variable porque empieza con $ y contiene carácteres válidos';
                $_7myvar = '$_7myvar es una variable porque empieza con $ y contiene carácteres válidos';
                //myvar No es una variable porque no empieza con $
                $myvar = '$myvar es una variable porque empieza con $ y contiene carácteres válidos';
                $var7 = '$var7 es una variable porque empieza con $ y contiene carácteres válidos';
                $_element1 = '$_element1 es una variable porque empieza con $ y contiene carácteres válidos';
                //$house*5 No es una variable porque el * es un caracter no admitido
                echo $_myvar.'<br>';
                echo $_7myvar.'<br>';
                echo 'myvar no es una variable válida porque no comienza con $<br>';
                echo $myvar.'<br>';
                echo $var7.'<br>';
                echo $_element1.'<br>';
                echo '$house*5 no es una variable válida porque el * es un caracter no admitido<br>';
            ?>
        <h3>Ejercicio 2</h3>
            <?php
                echo 'Con primer bloque de asignacion<br>';
                $a = "ManejadorSQL";
                $b = 'MySQL';
                $c = &$a;
                echo $a.'<br>';
                echo $b.'<br>';
                echo $c.'<br><br>';

                echo 'Con segundo bloque de asignacion<br>';
                $a = "PHP server";
                $b = &$a;
                echo $a.'<br>';
                echo $b.'<br>';
                echo $c.'<br>';

                echo '<p>Aunque solo se modificaron los valores de a y b directamente, al ser c definido por referencia a <i>a</i>, su valor también se modificó </p>';
                unset($a);
                unset($b);
                unset($c);
            ?>

    </body>    
</html>