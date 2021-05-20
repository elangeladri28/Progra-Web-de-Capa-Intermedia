<?php

    class LeccionModel {
        private $id_leccion;
        private $cursoid;
        private $nivel;
        private $archivo;
        private $foto;
        private $video;
        private $extra;
        private $activo;
        private $fechaCreado;

        public function __construct($id_leccion,$nombre, $cursoid, $nivel, $archivo, $foto, $video, $extra, $activo, $fechaCreado) {
            $this->id_leccion = $id_leccion;
            $this->nombre = $nombre;
            $this->cursoid = $cursoid;
            $this->nivel = $nivel;
            $this->archivo = $archivo;
            $this->foto = $foto;
            $this->video = $video;
            $this->extra = $extra;
            $this->activo = $activo;
            $this->fechaCreado = $fechaCreado;
        }
       
        public function setid_leccion($id_leccion) {
            $this->id_leccion = $id_leccion;
        }

        public function getid_leccion() {
            return $this->id_leccion;
        }

        public function setnombre($nombre) {
            $this->nombre = $nombre;
        }

        public function getnombre() {
            return $this->nombre;
        }

        public function setcursoid($cursoid) {
            $this->cursoid = $cursoid;
        }

        public function getcursoid() {
            return $this->cursoid;
        }

        public function setnivel($nivel) {
            $this->nivel = $nivel;
        }

        public function getnivel() {
            return $this->nivel;
        }
        
        public function setarchivo($archivo) {
            $this->archivo = $archivo;
        }

        public function getarchivo() {
            return $this->archivo;
        }
        
        public function setfoto($foto) {
            $this->foto = $foto;
        }

        public function getfoto() {
            return $this->foto;
        }
        
        public function setvideo($video) {
            $this->video = $video;
        }

        public function getvideo() {
            return $this->video;
        }
        
        public function setextra($extra) {
            $this->extra = $extra;
        }

        public function getextra() {
            return $this->extra;
        }
        
        public function setactivo($activo) {
            $this->activo = $activo;
        }

        public function getactivo() {
            return $this->activo;
        }
        
        public function setfechaCreado($fechaCreado) {
            $this->fechaCreado = $fechaCreado;
        }

        public function getfechaCreado() {
            return $this->fechaCreado;
        }

    }

?>