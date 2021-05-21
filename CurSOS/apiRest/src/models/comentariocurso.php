<?php

    class ComentarioCursoModel {
        private $id_comencurs;
        private $cursoid;
        private $comentario;
        private $usuid;


        public function __construct($id_comencurs, $cursoid, $comentario, $usuid) {
            $this->id_comencurs = $id_comencurs;
            $this->cursoid = $cursoid;
            $this->comentario = $comentario;
            $this->usuid = $usuid;
        }
       
        public function setid_comencurs($id_comencurs) {
            $this->id_comencurs = $id_comencurs;
        }

        public function getid_comencurs() {
            return $this->id_comencurs;
        }

        public function setcursoid($cursoid) {
            $this->cursoid = $cursoid;
        }

        public function getcursoid() {
            return $this->cursoid;
        }
        
        public function setcomentario($comentario) {
            $this->comentario = $comentario;
        }

        public function getcomentario() {
            return $this->comentario;
        }

        public function setusuid($usuid) {
            $this->usuid = $usuid;
        }

        public function getusuid() {
            return $this->usuid;
        }

    }

?>