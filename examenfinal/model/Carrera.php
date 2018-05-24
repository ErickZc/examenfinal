<?php

class Carrera
{

    private $id;
    private $nombre;
    private $duration;
    private $datasource;

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __construct($datasource)
    {
        $this->datasource = $datasource;
    }
}
