<?php
    $data = file_get_contents("php://input");

        // Cria um stdClass
    $objData = json_decode($data);

    // Como objData passa a ser um objeto, vamos capturar apenas o parametro que queremos
    $search = $objData->data;

    // Conecta no banco
    $conexao = mysql_connect("localhost", "root", "graomestre10", "SD") or die ("Não foi possível conectar-se com o banco de dados");
    mysql_select_db("SD") or die ("Não foi possível conectar-se com o banco de dados");
    mysql_query("SET NAMES utf8",$conexao);

    // Prepara o select. Limito para 3 resultado, para não encher a tela de autoajuda
    $query = "SELECT usuarios.nome, amigos.idAcc, usuarios.urlFotoPerfil
                FROM usuarios, amigos
                WHERE usuarios.id = amigos.idAcc
                AND amigos.idAdd = '$objData->idAdd'
                AND usuarios.nome LIKE '".$search."%'
                AND amigos.solicitacao = '1'
                UNION (

                SELECT usuarios.nome, amigos.idAdd, usuarios.urlFotoPerfil
                FROM usuarios, amigos
                WHERE usuarios.id = amigos.idAdd
                AND amigos.idAcc = '$objData->idAdd'
                AND amigos.solicitacao = '1'
                AND usuarios.nome LIKE '".$search."%'
                )
                LIMIT 0 , 30";

    $query = mysql_query($query);
    if (mysql_num_rows($query)>0) {
        /* percorre os resultados */
        while ($obj = mysql_fetch_array($query)) {
            $json[] = array('id' => $obj['idAcc'], 'nome' => $obj['nome'], 'foto' => $obj['urlFotoPerfil']);
        }

    }else{
        $json[]= array("id" => "0", 'nome' => null, 'foto' => null);
    }
    echo json_encode($json);
?>

