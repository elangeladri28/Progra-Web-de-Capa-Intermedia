<?php
    class db{
        private $dbHost = 'localhost';
        private $dbUser = 'root';
        private $dbPass = '';
        private $dbName = 'apirest';
        //conexion
        public function conectionDB(){
            $mysqlConnect = "mysql:host=$this->dbHost;dbname=$this->dbName";
            $dbConexion = new PDO($mysqlConnect, $this->dbUser, $this->dbPass);
            $dbConexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbConexion;
        }
    }