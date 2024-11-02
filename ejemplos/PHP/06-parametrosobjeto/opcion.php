<?php
    class Opcion{
        private $enlace;
        private $titulo;
        private $colorFondo;

        public function __construct($title,$link,$bcolor){
            $this->titulo = $title;
            $this->enlace = $link;
            $this->colorFondo = $bcolor;
        }

        public function graficar(){
            $estilo = 'background-color: '.$this->colorFondo;
            echo '<a style="'.$estilo.
            '" href="'.$this->enlace.
            '">'.$this->titulo.'</a>';
        }
    }
?>