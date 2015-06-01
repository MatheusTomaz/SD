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
    $query = 'SELECT id, nome FROM usuarios WHERE nome LIKE "'.$search.'%"';
    // die($query);
    $query = mysql_query($query);


    if (mysql_num_rows($query)>0) {

        /* percorre os resultados */
        while ($obj = mysql_fetch_array($query)) {
            $buscaAmigo = mysql_query("SELECT * FROM amigos WHERE idAdd = '$objData->idAdd' AND idAcc = '{$obj['id']}'");
            $amigo = mysql_fetch_array($buscaAmigo);
            if(mysql_num_rows($buscaAmigo)>0){
                if($amigo['solicitacao']==1){
                    $json[] = array('id' => $obj['id'], 'nome' => $obj['nome'], 'amigos' => 'Amigos', 'fa' => 'check');
                }else if($amigo['solicitacao']==0){
                    $json[] = array('id' => $obj['id'], 'nome' => $obj['nome'], 'amigos' => 'Solicitação enviada', 'fa' => 'check');
                }
            }else{
                $json[] = array('id' => $obj['id'], 'nome' => $obj['nome'], 'amigos' => 'Adicionar', 'fa' => 'plus');
            }
        }


        echo json_encode($json);
    }


?>
