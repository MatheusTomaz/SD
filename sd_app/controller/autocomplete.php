<?php
		$data = file_get_contents("php://input");

 		// Cria um stdClass
		$objData = json_decode($data);

		// Como objData passa a ser um objeto, vamos capturar apenas o parametro que queremos
		$search = $objData->data;

	    // Conecta no banco
	    $con = new mysqli("localhost", "root", "graomestre10", "SD");

	    // Prepara o select. Limito para 3 resultado, para não encher a tela de autoajuda
	    $query = 'SELECT id, nome FROM usuarios WHERE nome LIKE "'.$search.'%" LIMIT 0,3';

	    if ($result = $con->query($query)) {

	        /* percorre os resultados */
	        while ($obj = $result->fetch_object()) {
	            $json[] = array('id' => $obj->id, 'nome' => $obj->nome);
	        }

	        $result->close();

	        echo json_encode($json);
	    }

	    /* Fecha conexão */
	    $con->close();
	?>
