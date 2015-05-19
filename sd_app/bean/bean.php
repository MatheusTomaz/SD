<?php
    class usuario{

        private $id, $nome, $urlFoto, $senha, $confSenha, $email, $telefone;


        public function setId($id) {
            $this->id = $id;
        }
        public function getId() {
            return $this->id;
        }
        public function setPhoto($urlFoto) {
            $this->urlFoto = $urlFoto;
        }
        public function getPhoto() {
            return $this->urlFoto;
        }
        public function setNome($nome) {
            $this->nome = $nome;
        }
        public function getNome() {
            return $this->nome;
        }
        public function setSenha($senha) {
            $this->senha = $senha;
        }
        public function getSenha() {
            return $this->senha;
        }
        public function setConfSenha($confSenha) {
            $this->confSenha = $confSenha;
        }
        public function getConfSenha() {
            return $this->confSenha;
        }
        public function setEmail($email) {
            $this->email = $email;
        }
        public function getEmail() {
            return $this->email;
        }
    }
?>
