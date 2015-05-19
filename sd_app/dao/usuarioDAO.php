<?php
    class usuarioDAO{

        public function usuarioDAO(){

        }

        public function recuperarUsuario($email){
            $query = mysql_query("SELECT * FROM usuarios WHERE email = '$email'");
            return $query;
        }

        public function cadastrar($usuario){
            $nome = utf8_encode($usuario->getNome());
            $query = mysql_query("INSERT INTO usuarios VALUES (null,
            '$nome',
            '{$usuario->getSenha()}',
            '{$usuario->getEmail()}',
            '{$usuario->getPhoto()}')");

            return $query;
        }

        public function buscarUsuario($nome){
            $query = mysql_query("SELECT * FROM usuarios WHERE nome REGEXP '$nome'");
            return $query;
        }



    }
?>
