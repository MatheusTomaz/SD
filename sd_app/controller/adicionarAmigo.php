<?php
	$data = file_get_contents("php://input");

	$objData = json_decode($data);

    $conexao = mysql_connect("localhost", "root", "graomestre10", "SD") or die ("Não foi possível conectar-se com o banco de dados");
    mysql_select_db("SD") or die ("Não foi possível conectar-se com o banco de dados");
    mysql_query("SET NAMES utf8",$conexao);

    $query = "SELECT * FROM amigos WHERE idAdd = '$objData->idAdd' AND idAcc = '$objData->idAcc'";
    $query = mysql_query($query);
    if(mysql_num_rows($query)>0){
        $amigos = mysql_fetch_array($query);
        if($amigos['solicitacao']==1){
            echo '{"erro":"1","value":"Vocês já são amigos!"}';
        }else if($amigos['solicitacao']==0){
            echo '{"erro":"1","value":"Solicitação de amizade já enviada!"}';
        }
    }else{
        $query = "INSERT INTO amigos VALUES (NULL,'$objData->idAdd','$objData->idAcc',false)";
        if(mysql_query($query)){
            echo '{"erro":"0","value":"Solicitação de amizade enviada!"}';
        }else{
            echo '{"erro":"2","value":"Não foi possível adicionar amigo!"}';
        }
    }

?>
