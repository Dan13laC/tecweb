<?php
    class Persona{ #Tipo de atributo
        private $nombre;
        
        public function inicializar($name){
            $this->nombre = $name;
        }

        public function mostrar(){
            echo '<p>'.$this->nombre.'</p>';
        }
    }
?>