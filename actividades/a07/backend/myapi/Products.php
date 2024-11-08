<?php
    namespace ACTIVIDADES\PRODUCTOS;
    require_once __DIR__ . '/DataBase.php';

    class Products extends DataBase{
        private $data;

        public function __construct($db) {
            $this->data =  array();
            parent::__construct($db);
        }

        public function add($producto){
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

        public function list(){
            // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
            $data = array();

            // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
            if ( $result = $this->conexion->query("SELECT * FROM productos WHERE eliminado = 0") ) {
                // SE OBTIENEN LOS RESULTADOS
                $rows = $result->fetch_all(MYSQLI_ASSOC);

                if(!is_null($rows)) {
                    // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                    foreach($rows as $num => $row) {
                        foreach($row as $key => $value) {
                            $data[$num][$key] = utf8_encode($value);
                        }
                    }
                }
                $result->free();
            } else {
                die('Query Error: '.mysqli_error($this->conexion));
            }
            $this->conexion->close();
            $this->data = json_encode($data, JSON_PRETTY_PRINT);
        }

        public function search($producto){
            $data = array();
            // SE VERIFICA HABER RECIBIDO EL ID
            if( isset($producto['search']) ) {
                $search = $producto['search'];
                // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
                $sql = "SELECT * FROM productos WHERE (id = '{$search}' OR nombre LIKE '%{$search}%' OR marca LIKE '%{$search}%' OR detalles LIKE '%{$search}%') AND eliminado = 0";
                if ( $result = $this->conexion->query($sql) ) {
                    // SE OBTIENEN LOS RESULTADOS
                    $rows = $result->fetch_all(MYSQLI_ASSOC);

                    if(!is_null($rows)) {
                        // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                        foreach($rows as $num => $row) {
                            foreach($row as $key => $value) {
                                $data[$num][$key] = utf8_encode($value);
                            }
                        }
                    }
                    $result->free();
                } else {
                    die('Query Error: '.mysqli_error($this->conexion));
                }
                $this->conexion->close();
            }
            // SE HACE LA CONVERSIÓN DE ARRAY A JSON
            $this->data = json_encode($data, JSON_PRETTY_PRINT);
        }

        public function single($producto){
            $id = $producto['id'];
            $sql = "SELECT * FROM productos WHERE id = $id";
            $result = $this->conexion -> query( $sql);
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
            $this->conexion->close();

            // SE HACE LA CONVERSIÓN DE ARRAY A JSON
            $this->data=json_encode($json[0], JSON_PRETTY_PRINT);
        }

        public function singleByName($producto){
            // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
            $data = array();
            // SE VERIFICA HABER RECIBIDO EL ID
            if( isset($producto['nombre']) ) {
                $nombre = $producto['nombre'];
                // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
                $sql = "SELECT * FROM productos WHERE nombre LIKE '{$nombre}' and eliminado = 0";
                if ( $result = $this->conexion->query($sql) ) {
                    // SE OBTIENEN LOS RESULTADOS
                    $rows = $result->fetch_all(MYSQLI_ASSOC);

                    if(!is_null($rows)) {
                        // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                        foreach($rows as $num => $row) {
                            foreach($row as $key => $value) {
                                $data[$num][$key] = utf8_encode($value);
                            }
                        }
                    }
                    $result->free();
                } else {
                    die('Query Error: '.mysqli_error($this->conexion));
                }
                $this->conexion->close();
            }

            // SE HACE LA CONVERSIÓN DE ARRAY A JSON
            $this->data = json_encode($data, JSON_PRETTY_PRINT);
        }

        public function getData(){
            return $this->data;

        }
    }
?>