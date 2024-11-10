<?php
    use ACTIVIDADES\PRODUCTOS\Products as Products;
    require_once __DIR__.'/myapi/Products.php';

    $prod = new Products('marketzone');
    $prod-> edit($_POST);
    //$prod-> edit(json_decode(json_encode($_POST, JSON_FORCE_OBJECT)));
    
    echo $prod->getData();
/*
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    //$producto = file_get_contents('php://input');
    $data = array(
        'status'  => 'error',
        'message' => 'No se encontró el producto'
    );

    if(isset($_POST['nombre'])) {
        // SE TRANSFORMA EL STRING DEL JSON A OBJETO
        $jsonOBJ = json_decode(json_encode($_POST));
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
    */

?>