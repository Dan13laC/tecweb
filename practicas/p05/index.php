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
        <h3>Ejercicio 3</h3>
            <?php
                
                $a = "PHP5";
                echo $a.'<br>';
                $z[] = &$a;
                print_r($z);
                $b = "5a version de PHP";
                echo '<br>'.$b;
                $c = $b*10;
                print_r($c);
                $a .= $b;
                echo '<br>';
                print_r($a);
                $b *= $c;
                print_r($b);
                echo '<br>';
                $z[0] = "MySQL";
                print_r($z);
            ?>
        <h3>Ejercicio 4</h3>
            <?php
                echo 'Impresion de variables globales<br>';
                global $a;
                global $z;
                global $b;
                global $c;
                echo '$a =>'.$a.'<br>';
                
                echo '$b => '.$b.'<br>';
                echo '$c => '.$c.'<br>';
                echo '$z => ';
                print_r($z);       
                unset($a);
                unset($b);
                unset($c);
            ?>
        <h3>Ejercicio 5</h3>
            <?php
                echo 'Impresión de variables después de cada asignación<br>';
                $a = "7 personas";
                echo $a.'<br>'; 
                $b = (integer) $a;
                echo $b.'<br>';
                $a = "9E3";
                echo $a.'<br>';
                $c = (double) $a;
                echo $c.'<br>';
                
                unset($a);
                unset($b);
                unset($c);
            ?>
        <h3>Ejercicio 6</h3> 
            <?php 
                $a = "0";
                $b = "TRUE";
                $c = FALSE;
                $d = ($a OR $b);
                $e = ($a AND $c);
                $f = ($a XOR $b);

                var_dump($a, $b, $c, $d, $e, $f);
                echo '<br>Sin funcion para imprimir $c y $e<br>';
                echo "$a<br>$b<br>$c<br>$d<br>$e<br>$f<br>";
                echo '<br>Con funcion var_export para imprimir $c y $e<br>';
                echo "$a<br>$b<br>";
                echo var_export($c);
                echo "<br>$d<br>";
                echo var_export($e);
                echo "<br>$f<br>";
                echo '<br>var_export($variable) regresa el valor de una variable como un string<br>';
                unset($a);
                unset($b);
                unset($c);
                unset($d);
                unset($e);
                unset($f);
            ?>
    </body>    
</html>