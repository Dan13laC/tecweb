<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title> Ejercicio 6 </title>
    </head>
    <body>
        <?php
            $auto1 = [ "marca" => "VOLKSWAGEN", "modelo" => "2021", "tipo" => "hachback" ];
            $auto2 = [ "marca" => "AUDI", "modelo" => "2024", "tipo" => "sedan" ];
            $auto3 = [ "marca" => "NISSAN", "modelo" => "2003", "tipo" => "hachback" ];
            $auto4 = [ "marca" => "FORD", "modelo" => "2018", "tipo" => "camioneta" ];
            $auto5 = [ "marca" => "CHEVROLET", "modelo" => "2016", "tipo" => "sedan" ];
            $auto6 = [ "marca" => "VOLKSWAGEN", "modelo" => "1999", "tipo" => "camioneta" ];
            $autos = [$auto1,$auto2,$auto3,$auto4,$auto5,$auto6];

            $propietario1 = ["nombre" => "Daniela Camacho García", "ciudad"=>"Atlixco, Pue.", "direccion"=>"4 norte 1407"];
            $propietario2 = ["nombre" => "Luis Ernesto Aparicio Gutiérrez", "ciudad"=>"Atlixco, Pue.", "direccion"=>"Av.Independencia 402"];
            $propietario3 = ["nombre" => "Juana Vargas Ortega", "ciudad"=>"Atlixco, Pue.", "direccion"=>"3 Sur 605"];
            $propietario4 = ["nombre" => "Jorge Pérez Juárez", "ciudad"=>"Atlixco, Pue.", "direccion"=>"Prados Sur 1712"];
            $propietario5 = ["nombre" => "Axel Muñoz Jiménez", "ciudad"=>"Atlixco, Pue.", "direccion"=>"Col. Centro 506"];
            $propietario6 = ["nombre" => "Abby López Cruz", "ciudad"=>"Atlixco, Pue.", "direccion"=>"8 poniente 303"];
            $propietario7 = ["nombre" => "Humberto Rosas Ramírez", "ciudad"=>"Atlixco, Pue.", "direccion"=>"5 Oriente 846"];
            $propietario8 = ["nombre" => "Aleyda Juárez Muñoz", "ciudad"=>"Atlixco, Pue.", "direccion"=>"14 Poniente 201"];
            $propietario9 = ["nombre" => "Eduardo Sedeño Hernández", "ciudad"=>"Atlixco, Pue.", "direccion"=>"Solares chicos 1302"];
            $propietario10 = ["nombre" => "Karen Cortés Zuñiga", "ciudad"=>"Atlixco, Pue.", "direccion"=>"Av. Libertad 308"];
            $propietarios = [$propietario1, $propietario2, $propietario3, $propietario4, $propietario5, $propietario6, $propietario7, $propietario8, $propietario9, $propietario10];
            //print_r($auto1);

            $asociaciones = [
                ["Auto" => $auto1, "Propietario" => $propietario1], ["Auto"=> $auto2, "Propietario" =>$propietario2],
                ["Auto" => $auto3, "Propietario" =>$propietario3], ["Auto" => $auto4, "Propietario" =>$propietario4],
                ["Auto" => $auto5, "Propietario" =>$propietario5], ["Auto" => $auto6, "Propietario" =>$propietario6],
                ["Auto" => $auto3, "Propietario" =>$propietario7], ["Auto" => $auto4, "Propietario" =>$propietario8],
                ["Auto" => $auto1, "Propietario" =>$propietario9], ["Auto" => $auto2, "Propietario" =>$propietario10],
                ["Auto" => $auto1, "Propietario" =>$propietario5], ["Auto" => $auto4, "Propietario" =>$propietario10],
                ["Auto" => $auto5, "Propietario" =>$propietario1], ["Auto" => $auto6, "Propietario" =>$propietario2],
                ["Auto" => $auto3, "Propietario" =>$propietario3]
            ];

            $vehicular = ["UAJ9910"=>$asociaciones[0],"BAC9990"=>$asociaciones[1],"LKJ8216"=>$asociaciones[2],
                "JIM6633"=>$asociaciones[3],"OIE8816"=>$asociaciones[4],"GSA7823"=>$asociaciones[5],
                "HUA2271"=>$asociaciones[6],"WOD2334"=>$asociaciones[7],"IIE3241"=>$asociaciones[8],
                "LOM8732"=>$asociaciones[9],"LIL9072"=>$asociaciones[10],"BBN4569"=>$asociaciones[11],
                "PPD5439"=>$asociaciones[12],"KOP8623"=>$asociaciones[13],"JEV7732"=>$asociaciones[14],
            ];

            //print_r($vehicular);

        ?>
        <h2> Resultados de consulta </h2>
        <?php
            if($_POST['metodo'] == "matricula"){
                $matricula =$_POST['matselec'];
                if(empty($matricula)){
                    echo "<i>No se ingresó una matrícula</i>";
                } else { 
                    echo "<p>Matrícula ingresada: <b>$matricula</b></p>";
                    if(array_key_exists($matricula, $vehicular)){
                        echo "<p>Información del auto</p>";
                        print_r($vehicular[$matricula ]["Auto"]);
                        echo "<p>Información del propietario</p>";
                        print_r($vehicular[$matricula ]["Propietario"]);
                    } else {
                        echo "<p>La matrícula ingresada <b>no existe</b></p>";
                    }

                }

            } else if($_POST['metodo'] == "todos"){
                foreach($vehicular as $key => $value){
                    echo "<p>Matrícula: <b>$key</b></p>";
                    echo "<p>Información del auto</p>";
                    print_r($vehicular[$key ]["Auto"]);
                    echo "<p>Información del propietario</p>";
                    print_r($vehicular[$key ]["Propietario"]);
                }

            } else {
                echo "<i>Opción no válida</i>";
            }
        ?>
    </body>
</html>