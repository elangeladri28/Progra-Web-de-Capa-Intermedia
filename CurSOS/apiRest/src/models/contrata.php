<?php

    class ContrataModel {
        private $id_contrata;
        private $usuarioid;
        private $cursoid;
        private $calificacioncurso;
        private $contadorLecciones;
        private $progreso;

        public function __construct($id_contrata, $usuarioid, $cursoid, $calificacioncurso, $contadorLecciones,$progreso) {
            $this->id_contrata = $id_contrata;
            $this->usuarioid = $usuarioid;
            $this->cursoid = $cursoid;
            $this->calificacioncurso = $calificacioncurso;
            $this->contadorLecciones = $contadorLecciones;
            $this->progreso = $progreso;
        }
       
        public function setid_contrata($id_contrata) {
            $this->id_contrata = $id_contrata;
        }

        public function getid_contrata() {
            return $this->id_contrata;
        }

        public function setusuarioid($usuarioid) {
            $this->usuarioid = $usuarioid;
        }

        public function getusuarioid() {
            return $this->usuarioid;
        }
        
        public function setcursoid($cursoid) {
            $this->cursoid = $cursoid;
        }

        public function getcursoid() {
            return $this->cursoid;
        }

        public function setcalificacioncurso($calificacioncurso) {
            $this->calificacioncurso = $calificacioncurso;
        }

        public function getcalificacioncurso() {
            return $this->calificacioncurso;
        }

        public function setcontadorLecciones($contadorLecciones) {
            $this->contadorLecciones = $contadorLecciones;
        }

        public function getcontadorLecciones() {
            return $this->contadorLecciones;
        }

        public function setprogreso($progreso) {
            $this->progreso = $progreso;
        }

        public function getprogreso() {
            return $this->progreso;
        }

    }

?>