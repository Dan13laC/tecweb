<?php
    function ej1($num1){

//        echo '<p>El numero recibido es: </p>'.$num1;
        if($num1 % 7 == 0){
            if($num1 % 5 == 0){
                echo "<p>$num1 es divisible por 5 y 7</p>";
            } else {
                echo "<p>$num1 no es divisible por 5</p>"; 
            }
        } else {
            if($num1 % 5 == 0){

            } else {
                echo "<p>$num1 no es divisible por 5</p>"; 
            }
            echo "<p>$num1 no es divisible por 7</p>";
        }
    }

    function ejercicio2(){
        $encontrado = false;
        $cont = 0;
        while ($encontrado != true){
            $arreglo = [rand(1,1000), rand(1,1000), rand(1,1000)];
            echo $arreglo[0].', '.$arreglo[1].', '.$arreglo[2].'<br>';
            $matriz[$cont] = $arreglo;
            if($arreglo[0]%2 == 1 && $arreglo[1]%2 == 0 && $arreglo[2]%2 == 1){
                $encontrado = true;
            } 
            $cont = $cont + 1;
        }
        echo $cont*3;
        echo ' números en '.$cont.' iteraciones<br>';
    }

    function ej3($num3){
        $encontrado = false;
        echo '<p>Con ciclo while</p>';
        while($encontrado != true){
            $numRand = rand(1,1000);
            echo $numRand.'<br>';
            if($numRand % $num3 == 0){
                echo "$numRand es el primer número aleatorio encontrado que es múltiplo de $num3<br>";
                $encontrado= true;
            }

        }
        echo '<br><p>Con ciclo do-while</p>';
        do{
            $fin = false;
            $numRand = rand(1,1000);
            echo $numRand.'<br>';
            if($numRand % $num3 == 0){
                echo "$numRand es el primer número aleatorio encontrado que es múltiplo de $num3<br>";
                $fin= true;
            }
        }while($fin!=true);
    }

    function ej4(){
        for ($i = 97 ; $i <= 122; $i++ ) {
            $abc [$i] = chr($i);
        }
        echo '<table border="1">';
        echo '<tr>
                <th>Código ASCII</th>
                <th>Letra</th>
            </tr>';
        foreach($abc as $key => $value){
            echo "<tr>
                <th>$key</th>
                <th>$value</th>
            </tr>";

        }
        echo '</table>';
    }

?>