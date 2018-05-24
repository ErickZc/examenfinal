<?php 
    class Estudiante{
        private $id;
        private $id_carreras;
        private $nombres;
        private $apellidos;
        private $pago_mes;
        private $datasource;

        public function __set($name, $value){
            $this->$name = $value;
        }

        public function __get($name){
            return $this->$name;
        }

        public function __construct($datasource){
            $this->datasource = $datasource;
        }


    }
?>