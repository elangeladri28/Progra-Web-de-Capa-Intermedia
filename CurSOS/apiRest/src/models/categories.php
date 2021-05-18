<?php

    class CategoriesModel {
        private $id_categoria;
        private $categoria;
        private $descripcion;
        private $activo;

        public function __construct($id_categoria, $categoria, $descripcion, $activo) {
            $this->id_categoria = $id_categoria;
            $this->categoria = $categoria;
            $this->descripcion = $descripcion;
            $this->activo = $activo;
        }
       
        public function setid_categoria($id_categoria) {
            $this->id_categoria = $id_categoria;
        }

        public function getid_categoria() {
            return $this->id_categoria;
        }

        public function setcategoria($categoria) {
            $this->categoria = $categoria;
        }

        public function getcategoria() {
            return $this->categoria;
        }

        public function setdescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }

        public function getdescripcion() {
            return $this->descripcion;
        }
        
        public function setactivo($activo) {
            $this->activo = $activo;
        }

        public function getactivo() {
            return $this->activo;
        }

    }

?>