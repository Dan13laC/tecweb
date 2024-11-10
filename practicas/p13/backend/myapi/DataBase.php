<?php
    namespace ACTIVIDADES\PRODUCTOS;
    abstract class DataBase {
        protected $conexion;

        public function __construct($db, $user='root', $pass='Luca20*' ) {
            $this->conexion = @mysqli_connect(
                'localhost',
                $user,
                $pass,
                $db
            );
        }
    }
?>