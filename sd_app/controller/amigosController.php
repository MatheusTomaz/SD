<?php
    define( 'DS', DIRECTORY_SEPARATOR );
    define( 'BASE_DIR', dirname(dirname( __FILE__ )) . DS );
    require_once BASE_DIR . sd_app . DS . 'config' . DS . 'conn.php';
    require_once BASE_DIR . sd_app . DS . 'bean' . DS . 'bean.php';
    require_once BASE_DIR . sd_app . DS . 'dao' . DS . 'usuarioDAO.php';

    class amigosController{

        public $msg, $class;

        private $usuario, $usuarioDAO;

        function amigosController(){


        }

    }
?>

