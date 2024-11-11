<?php
    namespace MYAPI\Update;
    require_once __DIR__ . '/../DataBase.php';
    use MYAPI\DataBase;

    class Update extends DataBase{
        public function __construct($db){
            parent::__construct($db);
        }
        
        public function edit($producto){
            $data = array(
                'status'  => 'error',
                'message' => 'No se encontró el producto'
            );
        
            if(isset($producto['nombre'])) {
                // SE TRANSFORMA EL STRING DEL JSON A OBJETO
                //print_r($producto);
                $jsonOBJ = json_decode(json_encode($producto));
                //$jsonOBJ = $producto;
                // SE ASUME QUE LOS DATOS YA FUERON VALIDADOS ANTES DE ENVIARSE
                $this->conexion->set_charset("utf8");
                $sql = "UPDATE productos set nombre='$jsonOBJ->nombre', marca='$jsonOBJ->marca', modelo='$jsonOBJ->modelo', precio=$jsonOBJ->precio, detalles='$jsonOBJ->detalles', unidades=$jsonOBJ->unidades, imagen='$jsonOBJ->imagen' where id=$jsonOBJ->id ";
                ///*
                if($this->conexion->query($sql)){
                    $data ['status'] =  "success";
                    $data ['message'] =  "Producto modificado";
                } else {
                    $data ['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
                }
                //*/
                // Cierra la this->conexion
                $this->conexion->close();
            }
            $this->data = json_encode($data, JSON_PRETTY_PRINT);
        }
    }
?>