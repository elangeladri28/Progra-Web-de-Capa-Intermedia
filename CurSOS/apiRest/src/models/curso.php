<?php

    class CursoModel {
        private $id_curso;
        private $nombre;
        private $descripcion;
        private $costo;
        private $foto;
        private $video;
        private $categoriaid;
        private $activo;
        private $fechaCreado;
        private $usuid;

        public function __construct($id_curso, $nombre, $descripcion, $costo, $foto, $video, $categoriaid, $activo, $fechaCreado, $usuid) {
            $this->id_curso = $id_curso;
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
            $this->costo = $costo;
            $this->foto = $foto;
            $this->video = $video;
            $this->categoriaid = $categoriaid;
            $this->activo = $activo;
            $this->fechaCreado = $fechaCreado;
            $this->usuid = $usuid;
        }
       
        public function setid_curso($id_curso) {
            $this->id_curso = $id_curso;
        }

        public function getid_curso() {
            return $this->id_curso;
        }

        public function setnombre($nombre) {
            $this->nombre = $nombre;
        }

        public function getnombre() {
            return $this->nombre;
        }

        public function setdescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }

        public function getdescripcion() {
            return $this->descripcion;
        }
        
        public function setcosto($costo) {
            $this->costo = $costo;
        }

        public function getcosto() {
            return $this->costo;
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
        
        public function setcategoriaid($categoriaid) {
            $this->categoriaid = $categoriaid;
        }

        public function getcategoriaid() {
            return $this->categoriaid;
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
        public function setusuid($usuid) {
            $this->usuid = $usuid;
        }

        public function getusuid() {
            return $this->usuid;
        }

    }

?>