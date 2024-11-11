<?php
    namespace MYAPI;
    
    abstract class DataBase {
        protected $conexion;
        protected $data;

        public function __construct($db, $user='root', $pass='Luca20*' ) {
            $this->conexion = @mysqli_connect(
                'localhost',
                $user,
                $pass,
                $db
            );
            $this->data = array();
        }
        
        public function getData(){
            return $this->data;

        }
    }
?>