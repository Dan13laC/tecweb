<?php
    namespace MYAPI\Create;
    require_once __DIR__ . '/../DataBase.php';
    use MYAPI\DataBase;

    class Create extends DataBase{
        public function __construct($db){
            parent::__construct($db);
        }
        
        public function add($producto){//Object
            $data = array(
                'status'  => 'error',
                'message' => 'Ya existe un producto con ese nombre'
            );
            
            $jsonOBJ = json_decode(json_encode($producto, JSON_FORCE_OBJECT));
            //$jsonOBJ = $producto;
            // SE ASUME QUE LOS DATOS YA FUERON VALIDADOS ANTES DE ENVIARSE
            $sql = "SELECT * FROM productos WHERE nombre = '{$jsonOBJ->nombre}' AND eliminado = 0";
            $result = $this->conexion->query($sql);
            
            if ($result->num_rows == 0) {
                $this->conexion->set_charset("utf8");
            $sql = "INSERT INTO productos VALUES (null, '{$jsonOBJ->nombre}', '{$jsonOBJ->marca}', '{$jsonOBJ->modelo}', {$jsonOBJ->precio}, '{$jsonOBJ->detalles}', {$jsonOBJ->unidades}, '{$jsonOBJ->imagen}', 0)";
                ///*
                if($this->conexion->query($sql)){
                    $data['status'] =  "success";
                    $data['message'] =  "Producto agregado";
                } else {
                    $data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
                }
                
            }
            $result->free();
            $this->conexion->close();
            $this->data = json_encode($data, JSON_PRETTY_PRINT);
        }
    }
?>