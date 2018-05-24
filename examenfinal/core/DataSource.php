<?php
    class DataSource{
        private $driver;
        private $host;
        private $user;
        private $pass;
        private $dbname;
        private $charset;

        public function __construct(){
            $datos = require_once 'config/database.php';
            $this->driver = $datos['driver'];
            $this->host = $datos['host'];
            $this->user = $datos['user'];
            $this->pass = $datos['pass'];
            $this->dbname = $datos['dbname'];
            $this->charset = $datos['charset'];
        }

        public function conectar(){
            if($this->driver == "mysql"){
                $dat = "mysql:host={$this->host}; dbname={$this->dbname}; charset={$this->charset}";
                $con = new PDO($dat, $this->user, $this->pass);

                return $con;
            }else{
                return null;
            }
        }

    }
?>