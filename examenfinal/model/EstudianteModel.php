<?php 
    require_once 'Estudiante.php';

    class EstudianteModel extends Estudiante{
        private $table;

        public function __construct($datasource){
            $this->table = "estudiantes";
            parent::__construct($datasource);
        }

        public function add(){
            $sql = "INSERT INTO {$this->table}(id_carreras, nombres, apellidos, pago_mes) VALUES (:id_carreras, :nombres, :apellidos, :pago_mes)";
            $consulta = $this->datasource->prepare($sql);
            $consulta->execute(array(':id_carreras' => $this->id_carreras, ':nombres' => $this->nombres, ':apellidos' => $this->apellidos, ':pago_mes' => $this->pago_mes));
            
        }

        public function delete($id){
            $sql = "DELETE FROM {$this->table} where id = :id";
            $consulta = $this->datasource->prepare($sql);
            $consulta->execute(array(':id' => $id));
        }

        public function update(){
            $sql = "UPDATE {$this->table} set id_carreras = :id_carrera, nombres = :nombres, apellidos = :apellidos, pago_mes = :pago_mes where id = :id";
            $consulta = $this->datasource->prepare($sql);
            $consulta->execute(array(':id' => $this->id, ':id_carrera' => $this->id_carreras, ':nombres' => $this->nombres, ':apellidos' => $this->apellidos, ':pago_mes' => $this->pago_mes));
        }

        public function ver(){
            $estudiantes = array();
            $sql = "SELECT * FROM {$this->table}";
            $consulta = $this->datasource->prepare($sql);
            $consulta->execute();
            while($estudiante = $consulta->fetch(PDO::FETCH_OBJ)){
                array_push($estudiantes, $estudiante);
            }
            return $estudiantes;
        }

        public function verUno($id){
            $estudiantes = array();
            $sql = "SELECT * FROM {$this->table} where id = :id";
            $consulta = $this->datasource->prepare($sql);
            $consulta->execute(array(':id' => $id));
            return $consulta->fetch(PDO::FETCH_OBJ);
        }

    }

?>