<?php

    class CarritoModel {
        private $id_carrito;
        private $cursoid;
        private $usuarioid;


        public function __construct($id_carrito, $cursoid, $usuarioid) {
            $this->id_carrito = $id_carrito;
            $this->cursoid = $cursoid;
            $this->usuarioid = $usuarioid;
        }
       
        public function setid_carrito($id_carrito) {
            $this->id_carrito = $id_carrito;
        }

        public function getid_carrito() {
            return $this->id_carrito;
        }

        public function setcursoid($cursoid) {
            $this->cursoid = $cursoid;
        }

        public function getcursoid() {
            return $this->cursoid;
        }
        
        public function setusuarioid($usuarioid) {
            $this->usuarioid = $usuarioid;
        }

        public function getusuarioid() {
            return $this->usuarioid;
        }

    }

?>