<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda por tope</title>
</head>
<body>
    <?php
    $nombre = $_POST['nombrep'];
    $marca  = $_POST['marcap'];
    $modelo = $_POST['modelop'];
    $precio = $_POST['preciop'];
    $detalles = $_POST['detallesp'];
    $unidades = $_POST['unidadesp'];
    $imagen   = $_POST['imagenp'];

    ?>
    <h2>Verificación de envío de datos</h2>
    <p>Información del producto:</p>
    <div>
        <ul>
            <li>Nombre: <?php echo $nombre; ?></li>
            <li>Marca: <?php echo $marca; ?></li>
            <li>Modelo: <?php echo $modelo; ?></li>
            <li>Precio: <?php echo $precio; ?></li>
            <li>Detalles: <?php echo $detalles; ?></li>
            <li>Unidades: <?php echo $unidades; ?></li>
            <li>Imagen: <?php echo $imagen; ?></li>
        </ul>
    </div>
    <?php

    /** SE CREA EL OBJETO DE CONEXION */
    @$link = new mysqli('localhost', 'root', 'Luca20*', 'marketzone');	

    /** comprobar la conexión */
    if ($link->connect_errno) 
    {
        die('Falló la conexión: '.$link->connect_error.'<br/>');
        /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
    }

    /** Crear una tabla que no devuelve un conjunto de resultados */
    //Verificación de existencia de nombre, marca y modelo
    $sqlverif1 = "SELECT * from productos WHERE nombre='$nombre'";
    $resqn1 = $link->query($sqlverif1); 
    $resultado1 = $resqn1->fetch_all(MYSQLI_ASSOC);
    $verificado = true;
    if (  !empty($resultado1))  { //
        echo '<p>El nombre del producto existe en la base de datos, no se puede continuar insertando</P>';
        $verificado = false;
    } else {
        $sqlverif2 = "SELECT * from productos WHERE marca='$marca'";
        $resqn2 = $link->query($sqlverif2); 
        $resultado2 = $resqn2->fetch_all(MYSQLI_ASSOC);
        if (  !empty($resultado2))  { //?
            echo '<p>La marca del producto existe en la base de datos, no se puede continuar insertando</p>';
            $verificado = false;
        } else {
            $sqlverif3 = "SELECT * from productos WHERE modelo='$modelo'";
            $resqn3 = $link->query($sqlverif3); 
            $resultado3 = $resqn3->fetch_all(MYSQLI_ASSOC);
            if (  !empty($resultado3) )  { //?
                echo '<p>El modelo del producto existe en la base de datos, no se puede continuar insertando</p>';
                $verificado = false;
            }
        }
    }
    
    #$sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}', '{$eliminado}' )";
    $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) 
        VALUES ('$nombre', '$marca', '$modelo', $precio, '$detalles', $unidades, '$imagen' )";
    //echo "<p>Los datos a insertar son $sql</p>";
    
    if( $verificado){
        if ( $link->query($sql) ) {
            echo 'Producto insertado con ID: '.$link->insert_id;
        } else {
            echo 'El Producto no pudo ser insertado =(';
        }
    } else {
        echo '<p>El producto no pudo insertarse porque hay 1 o más campos repetidos en la tabla <i>productos</i> de <b>marketzone</b></p>';
    }
    
    $link->close();

    ?>

</body>