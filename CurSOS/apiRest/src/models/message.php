<?php

    class MessageModel {
        private $id_cp;
        private $idusuario;
        private $idusuario2;
        private $mensaje;


        public function __construct($id_cp, $idusuario, $idusuario2, $mensaje) {
            $this->id_cp = $id_cp;
            $this->idusuario = $idusuario;
            $this->idusuario2 = $idusuario2;
            $this->mensaje = $mensaje;
        }
       
        public function setid_cp($id_cp) {
            $this->id_cp = $id_cp;
        }

        public function getid_cp() {
            return $this->id_cp;
        }

        public function setidusuario($idusuario) {
            $this->idusuario = $idusuario;
        }

        public function getidusuario() {
            return $this->idusuario;
        }
        
        public function setidusuario2($idusuario2) {
            $this->idusuario2 = $idusuario2;
        }

        public function getidusuario2() {
            return $this->idusuario2;
        }

        public function setmensaje($mensaje) {
            $this->mensaje = $mensaje;
        }

        public function getmensaje(){
            return $this->mensaje;
        }

    }

?>