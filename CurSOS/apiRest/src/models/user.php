<?php

    class UserModel {
        private $id_usuario;
        private $rol;
        private $usuario;
        private $nombre;
        private $apellidos;
        private $correo;
        private $contra;
        private $avatar;
        private $activo;

        public function __construct($id_usuario, $rol, $usuario, $nombre, $apellidos, $correo, $contra, $avatar,$activo) {
            $this->id_usuario = $id_usuario;
            $this->rol = $rol;
            $this->usuario = $usuario;
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->correo = $correo;
            $this->contra = $contra;
            $this->avatar = $avatar;
            $this->activo = $activo;
        }
       
        public function setId($id_usuario) {
            $this->id_usuario = $id_usuario;
        }

        public function getId() {
            return $this->id_usuario;
        }

        public function setRol($rol) {
            $this->rol = $rol;
        }

        public function getRol() {
            return $this->rol;
        }
        
        public function setUsuario($usuario) {
            $this->usuario = $usuario;
        }

        public function getUsuario() {
            return $this->usuario;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function setApellidos($apellidos) {
            $this->apellidos = $apellidos;
        }

        public function getApellidos() {
            return $this->apellidos;
        }

        public function setCorreo($correo) {
            $this->correo = $correo;
        }

        public function getCorreo() {
            return $this->correo;
        }

        public function setContra($contra) {
            $this->contra = $contra;
        }

        public function getContra() {
            return $this->contra;
        }

        public function setAvatar($avatar) {
            $this->avatar = $avatar;
        }

        public function getAvatar() {
            return $this->avatar;
        }

        public function setActivo($activo) {
            $this->activo = $activo;
        }

        public function getActivo() {
            return $this->activo;
        }

    }

?>