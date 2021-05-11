<?php
    class db{
        private $dbHost = 'localhost';
        private $dbUser = 'root';
        private $dbPass = 'root';
        private $dbName = 'cursos';
        //conexion

        public function connectionDB() {
            $mysqli = new mysqli($this->dbHost, $this->dbUser, $this->dbPass, $this->dbName);
            if ($mysqli->connect_errno) {
                echo "Problema con la conexion a la base de datos";
            }
            return $mysqli;
        }
                
        public function disconnect() {
            $mysqli = new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
            mysqli_close($mysqli);
        }
    }