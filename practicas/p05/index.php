<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
    <head>
        <title> Práctica 5 </title>
    </head>

    <body>
        <h3>Ejercicio 1</h3>
            <?php
                $_myvar = '<p>$_myvar es una variable porque empieza con $ y contiene carácteres válidos</p>';
                $_7myvar = '<p>$_7myvar es una variable porque empieza con $ y contiene carácteres válidos</p>';
                //myvar No es una variable porque no empieza con $
                $myvar = '<p>$myvar es una variable porque empieza con $ y contiene carácteres válidos</p>';
                $var7 = '<p>$var7 es una variable porque empieza con $ y contiene carácteres válidos</p>';
                $_element1 = '<p>$_element1 es una variable porque empieza con $ y contiene carácteres válidos</p>';
                //$house*5 No es una variable porque el * es un caracter no admitido
                echo $_myvar;
                echo $_7myvar;
                echo '<p>myvar no es una variable válida porque no comienza con $</p>';
                echo $myvar;
                echo $var7;
                echo $_element1;
                echo '<p>$house*5 no es una variable válida porque el * es un caracter no admitido</p>';
            ?>
        <h3>Ejercicio 2</h3>
            <?php
                echo '<p>Con primer bloque de asignacion</p>';
                $a = "ManejadorSQL";
                $b = 'MySQL';
                $c = &$a;
                echo "<p>$a</p>";
                echo "<p>$b</p>";
                echo "<p>$c</p>";

                echo '<p><br/>Con segundo bloque de asignacion</p>';
                $a = "<p>PHP server</p>";
                $b = &$a;
                echo $a;
                echo $b;
                echo $c;

                echo '<p><br/>Aunque solo se modificaron los valores de a y b directamente, al ser c definido por referencia a <i>a</i>, su valor también se modificó </p>';
                unset($a);
                unset($b);
                unset($c);
            ?>
        <h3>Ejercicio 3</h3>
            <?php
                
                $a = "PHP5 ";
                echo "<p>$a</p>";
                $z[] = &$a;
                echo "<p>";
                print_r($z);
                echo "</p>";
                $b = "5a version de PHP ";
                echo "<p>$b</p>";
                $c = intval($b)*10;
                echo "<p>";
                print_r($c);
                echo "</p>";
                $a .= $b;
                echo "<p>";
                print_r($a);
                echo "</p>";
                $b2 = intval($b);
                $b2 *= $c;
                echo "<p>";
                print_r($b2);
                echo "</p>";
                //echo '<br/>';
                $z[0] = "MySQL";
                echo "<p>";
                print_r($z);
                echo "</p>";
            ?>
        <h3>Ejercicio 4</h3>
            <?php
                echo '<p>Impresion de variables globales</p>';
                global $a;
                global $z;
                global $b;
                global $c;
                echo '<p>$a =>'.$a.'</p>';
                
                echo '<p>$b => '.$b.'</p>';
                echo '<p>$c => '.$c.'</p>';
                echo '<p>$z => '; 
                print_r($z);    
                echo '</p>';   
                unset($a);
                unset($b);
                unset($c);
            ?>
        <h3>Ejercicio 5</h3>
            <?php
                echo "<p>Impresión de variables después de cada asignación</p>";
                $a = "7 personas";
                echo "<p>$a</p>"; 
                $b = (integer) $a;
                echo "<p>$b</p>";
                $a = "9E3";
                echo "<p>$a</p>";
                $c = (double) $a;
                echo "<p>$c</p>";
                
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
                
                echo "<p> Con vardump<br/>";
                var_dump($a, $b, $c, $d, $e, $f);
                echo "</p>";
                echo '<p>Sin funcion para imprimir $c y $e</p>';
                echo "<p>$a<br/>$b<br/>$c<br/>$d<br/>$e<br/>$f<br/></p>";
                echo '<p><br/>Con funcion var_export para imprimir $c y $e<br/></p>';
                echo "<p>$a<br/>$b<br/>";
                echo var_export($c);
                echo "<br/>$d<br/>";
                echo var_export($e);
                echo "<br/>$f</p>";
                echo '<p><br/>var_export($variable) regresa el valor de una variable como un string<br/></p>';
                unset($a);
                unset($b);
                unset($c);
                unset($d);
                unset($e);
                unset($f);
            ?>
        <h3>Ejercicio 7</h3>
            <?php
                echo '<p>Obtención de valores con $_SERVER<br/></p>';
                //print_r($_SERVER);
                echo '<p>Version de Apache y PHP<br/></p>';
                echo '<p>SERVER_SOFTWARE:  '.$_SERVER['SERVER_SOFTWARE'].'</p>';
                echo '<p>Nombre sistema operativo (servidor)<br/></p>';
                echo '<p>SERVER_NAME: '.$_SERVER['SERVER_NAME'].'</p>';
                echo '<p>HTTP_SEC_CH_UA_PLATFORM:  '.$_SERVER['HTTP_SEC_CH_UA_PLATFORM'].'</p>';
                echo '<p>Idioma del navegador</p>';
                echo '<p>HTTP_ACCEPT_LANGUAGE:  '.$_SERVER['HTTP_ACCEPT_LANGUAGE'].'</p>';
            ?>
            <p>
                <a href="https://validator.w3.org/markup/check?uri=referer"><img
                src="https://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" height="31" width="88" /></a>
            </p>
    </body>    
</html>