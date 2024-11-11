<?php
    namespace MYAPI\Delete;
    require_once __DIR__ . '/../DataBase.php';
    use MYAPI\DataBase;
    
    class Delete extends DataBase{
        public function __construct($db){
            parent::__construct($db);
        }
        
        public function delete($producto){
            $data = array(
                'status'  => 'error',
                'message' => 'La consulta falló'
            );
            // SE VERIFICA HABER RECIBIDO EL ID
            if( isset($producto['id']) ) {
                $id = $producto['id'];
                //echo 'id '.$id;
                // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
                $sql = "UPDATE productos SET eliminado=1 WHERE id = $id";
                //echo $sql;
                if ( $this->conexion->query($sql) ) {
                    $data['status'] =  "success";
                    $data['message'] =  "Producto con id $id eliminado";
                } else {
                    $data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
                }
                $this->conexion->close();
            }
            $this->data = json_encode($data, JSON_PRETTY_PRINT);
        }
    }
?>