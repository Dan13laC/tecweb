<?php
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    //$producto = file_get_contents('php://input');
    $data = array(
        'status'  => 'error',
        'message' => 'No se encontró el producto'
    );

    
    if(isset($_POST['nombre'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $marca  = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $precio = $_POST['precio'];
        $detalles = $_POST['detalles'];
        $unidades = $_POST['unidades'];
        $imagen   = $_POST['imagen'];
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        $jsonOBJ = json_decode(json_encode($_POST));
        //echo json_encode($jsonOBJ, JSON_PRETTY_PRINT);
        // SE ASUME QUE LOS DATOS YA FUERON VALIDADOS ANTES DE ENVIARSE
/*        $sql = "UPDATE productos SET nombre='$nombre', modelo='$modelo', marca='$marca', precio=$precio, detalles='$detalles', unidades=$unidades, imagen='$imagen' WHERE id=$id";
        
        $conexion->set_charset("utf8");
            if($conexion->query($sql)){
                $data['status'] =  "success";
                $data['message'] =  "Producto agregado";
            } else {
                $data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($conexion);
            }

*/
            $jsonOBJ = json_decode(json_encode($_POST));
            //echo json_encode($jsonOBJ, JSON_PRETTY_PRINT);
            // SE ASUME QUE LOS DATOS YA FUERON VALIDADOS ANTES DE ENVIARSE
                $conexion->set_charset("utf8");
                $sql = "UPDATE productos set nombre='$jsonOBJ->nombre', marca='$jsonOBJ->marca', modelo='$jsonOBJ->modelo', precio=$jsonOBJ->precio, detalles='$jsonOBJ->detalles', unidades=$jsonOBJ->unidades, imagen='$jsonOBJ->imagen' where id=$jsonOBJ->id ";
                ///*
                if($conexion->query($sql)){
                    $data['status'] =  "success";
                    $data['message'] =  "Producto modificado";
                } else {
                    $data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($conexion);
                }

        // Cierra la conexion
        $conexion->close();
    }

    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);