<?php
    define( 'DS', DIRECTORY_SEPARATOR );
    define( 'BASE_DIR', dirname(dirname( __FILE__ )) . DS );
    require_once BASE_DIR . sd_app . DS . 'config' . DS . 'conn.php';
    require_once BASE_DIR . sd_app . DS . 'bean' . DS . 'bean.php';
    require_once BASE_DIR . sd_app . DS . 'dao' . DS . 'usuarioDAO.php';

    class solicitacoesController{

        public $msg, $class;

        private $usuario, $usuarioDAO;

        function solicitacoesController(){


        }

        function validarDados(){
            $res = $this->usuarioDAO->recuperarUsuario($this->usuario->getEmail());
            return (mysql_num_rows($res)>0);
        }

        function validarCampos(){
            if($_POST['nome'] == ""){
                $this->msg = "<div class='well msg'>Digite seu nome!</div>";
                return false;
            }else if($_POST['email'] == ""){
                $this->msg = "<div class='well msg'>Digite seu email!</div>";
                return false;
            }else if($_POST['senha'] == ""){
                $this->msg = "<div class='well msg'>Digite sua senha!</div>";
                return false;
            }
            return true;
        }

        function verificarCadastro()
        {
            if(!isset($_SESSION['email'])){
                $redirect = "http://192.168.0.108/SD/sd_app/login.php";
                header("location:$redirect");
            }else if($this->validarDados()){
                $redirect = "http://192.168.0.108/SD/sd_app/";
                header("location:$redirect");
            }
        }

        function cadastrar(){
            if($this->usuario->getSenha() != $this->usuario->getConfSenha()){
                $this->msg = "<div class='well msg'>Senha não confere</div>";
            }else if(!$this->validarDados()){
                $query = $this->usuarioDAO->cadastrar($this->usuario);
                if(!$query){
                    $this->msg = "<div class='well msg'>Erro ao cadastrar!</div>";
                }else{
                    $redirect = "http://192.168.0.108/SD/sd_app/";
                    header("location:$redirect");
                }
            }else{
                $this->msg = "<div class='well msg'>Email já existente!</div>";
            }
        }
    }
?>

