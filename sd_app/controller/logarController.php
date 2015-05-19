<?php
    define( 'DS', DIRECTORY_SEPARATOR );
    define( 'BASE_DIR', dirname( dirname( __FILE__ ) ) . DS );

    require_once BASE_DIR . 'sd_app' . DS . 'config' . DS . 'conn.php';
    require_once BASE_DIR . 'sd_app' . DS . 'bean' . DS . 'bean.php';
    require_once BASE_DIR . 'sd_app' . DS . 'dao' . DS . 'usuarioDAO.php';

    class loginController{

        public $msg, $nome, $grupo, $id;
        private $login, $usuario, $usuarioDAO;

        function loginController(){

            $this->login = new Login();

            $this->usuarioDAO = new UsuarioDAO;

            $this->usuario = new usuario();
            $this->usuario->setLogin($_POST['email']);
            $this->usuario->setSenha($_POST['senha']);

            if(isset($_POST['email'])){
                $this->autenticar();
            }

            $this->recuperarUsuario();

            $logout = $_GET['logout'];
            $this->logout($logout);

            $this->id = $this->login->getID();
        }

        function autenticar(){
            if ($this->login->logar($this->usuario->getLogin(), $this->usuario->getSenha())){
                header("Location:usuario/principal.php");
            }else{
                $this->msg = "Login/Senha Inválidos!";
            }
        }

        function recuperarUsuario(){
            $res = $this->usuarioDAO->recuperarUsuario($this->login->getLogin(), nao);
            $row = mysql_fetch_array($res);
            $this->nome = $row["nome"];
            $this->grupo = $row["grupo"];
        }

        function logout($logout){
            if($logout==1){
                $this->login->logout('../index.php');
            }
        }
    }
?>
