<?php
    use ACTIVIDADES\PRODUCTOS\Products as Products;
    require_once __DIR__.'/myapi/Products.php';

    $prod = new Products('marketzone');
    $prod-> single($_POST);
    echo $prod->getData();

    /*
    include_once __DIR__.'/database.php';


    $id = $_POST['id'];
    $sql = "SELECT * FROM productos WHERE id = $id";
    $result = $conexion -> query( $sql);
    if (!$result){
        die('Query failed');
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        // SE CONVIERTE A JSON
        $json[] = array(
            'id' => $id,
            'nombre' => $row['nombre'],
            'precio' => $row['precio'],
            'unidades' => $row['unidades'],
            'modelo' => $row['modelo'],
            'marca' => $row['marca'],
            'detalles' => $row['detalles'],
            'imagen' => $row['imagen']
        );
    }
    
    $result->free();
	$conexion->close();

    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    //$jsonstring = json_encode($json[0]);
    //echo $jsonstring;
    
    echo json_encode($json[0], JSON_PRETTY_PRINT);
    */
?>