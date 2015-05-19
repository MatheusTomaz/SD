<?php
    $host="localhost";
    $dbname="SD";
    $usuario="root";
    $password="graomestre10";
    $conexao = mysql_connect($host, $usuario, $password) or die ("Não foi possível conectar-se com o banco de dados");
    mysql_select_db($dbname) or die ("Não foi possível conectar-se com o banco de dados");
    mysql_query("SET NAMES utf8",$conexao);
    function __autoload($class)
    {
        require_once(dirname(__FILE__) . "/../config/Login.class.php");
    }
?>
