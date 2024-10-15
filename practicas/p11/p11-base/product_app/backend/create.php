<?php
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    if(!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        $jsonOBJ = json_decode($producto);
        /**
         * SUSTITUYE LA SIGUIENTE LÍNEA POR EL CÓDIGO QUE REALICE
         * LA INSERCIÓN A LA BASE DE DATOS. COMO RESPUESTA REGRESA
         * UN MENSAJE DE ÉXITO O DE ERROR, SEGÚN SEA EL CASO.
         */
        //echo '[SERVIDOR] Nombre: '.$jsonOBJ->nombre;

        //@$conexion = new mysqli('localhost', 'root', 'Luca20*', 'marketzone');	

        /** comprobar la conexión */
        if ($conexion->connect_errno) 
        {
            die('Falló la conexión: '.$conexion->connect_error.'<br/>');
            /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
        }
        //Verificación de existencia de nombre con campo eliminado en 0
        $sqlverif = "SELECT * from productos WHERE nombre='$jsonOBJ->nombre' && eliminado=0";
        $resqn = $conexion->query($sqlverif); 
        $resultado = $resqn->fetch_all(MYSQLI_ASSOC);
        $verificado = true;
        if (  !empty($resultado))  { //
            //echo '<p>El nombre del producto existe en la base de datos, no se puede continuar insertando</P>';
            $verificado = false;
        } 
    
        #$sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}', '{$eliminado}' )";
        
        $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) 
            VALUES ('$jsonOBJ->nombre', '$jsonOBJ->marca', '$jsonOBJ->modelo', $jsonOBJ->precio, '$jsonOBJ->detalles', $jsonOBJ->unidades, '$jsonOBJ->imagen' )";
        //echo "<p>Los datos a insertar son $sql</p>";
        
        if( $verificado){
            
            if ( $conexion->query($sql) ) {
                echo 'Producto insertado';
                //echo 'Producto insertado con ID: '.$conexion->insert_id;
            } else {
                echo 'El Producto no pudo ser insertado =(';
            }
        } else {
            echo 'El producto ya existe en la base de datos';
            //echo '<p>El producto no pudo insertarse porque hay 1 o más campos repetidos en la tabla <i>productos</i> de <b>marketzone</b></p>';
        }
        
        $conexion->close();
    }
?>