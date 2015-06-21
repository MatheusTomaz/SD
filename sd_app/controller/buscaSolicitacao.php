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
    $query = "SELECT
                    amigos.id_solicitacao, usuarios.nome, amigos.idAcc, usuarios.urlFotoPerfil
                FROM
                    usuarios, amigos
                WHERE
                    usuarios.id = amigos.idAcc
                AND
                    amigos.idAdd = '$objData->idAdd'
                AND
                    amigos.solicitacao = '0'
                UNION
                (SELECT
                    amigos.id_solicitacao,usuarios.nome, amigos.idAdd, usuarios.urlFotoPerfil
                FROM
                    usuarios, amigos
                WHERE
                    usuarios.id = amigos.idAdd
                AND
                    amigos.idAcc = '$objData->idAdd'
                AND
                    amigos.solicitacao = '0')";

    $query = mysql_query($query);
    $num = mysql_num_rows($query);

    if ($num>0) {


        /* percorre os resultados */
        while ($obj = mysql_fetch_array($query)) {
            $json[] = array('id_solicitacao' => $obj['id_solicitacao'], 'nome' => $obj['nome'], 'foto' => $obj['urlFotoPerfil'], 'id_amigo' => $obj['id_amigo'], 'num' => $num);
        }


        echo json_encode($json);
    }
?>

