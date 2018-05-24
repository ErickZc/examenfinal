<?php

require_once "Carrera.php";

class CarreraModel extends Carrera
{

    private $tabla;

    public function __construct($datasource)
    {
        $this->tabla = "carreras";
        parent::__construct($datasource);
    }

    public function agregar()
    {
        $query = "INSERT INTO {$this->tabla} (nombre, duracion) VALUES (:nombre, :duracion)";
        $stmt = $this->datasource->prepare($query);
        $stmt->execute(array(":nombre" => $this->nombre, ":duracion" => $this->duracion));
    }

    public function update()
    {
        $query = "UPDATE {$this->tabla} SET nombre = :nombre, duracion = :duracion WHERE id = :id";
        $stmt = $this->datasource->prepare($query);
        $stmt->execute(array(":nombre" => $this->nombre, ":duracion" => $this->duracion, ":id" => $this->id));
    }

    public function ver()
    {
        $carreras = array();
        $query = "SELECT * FROM {$this->tabla}";
        $stmt = $this->datasource->prepare($query);
        $stmt->execute();
        while ($Carrera = $stmt->fetch(PDO::FETCH_OBJ)) {
            array_push($carreras, $Carrera);
        }
        return $carreras;
    }
    public function verUno($id)
    {
        $query ="SELECT * FROM {$this->tabla} WHERE id =:id";
        $stmt  = $this->datasource->prepare($query);
        $stmt->execute(array(":id" => $id));
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function delete($id)
    {
        $query = "DELETE FROM {$this->tabla} WHERE id = :id";
        $stmt = $this->datasource->prepare($query);
        $stmt->execute(array(":id" => $id));
    }
}