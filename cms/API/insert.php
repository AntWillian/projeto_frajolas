<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    require_once ('../modulo.php');

    Conexao_database();

    $estrelas=$_POST["avaliacao"];
    $idProduto=$_POST["idProduto"];



    $sql="insert into tbl_avaliacao set avaliacao='".$estrelas."',idProduto='".$idProduto."',data=CURRENT_TIMESTAMP();";

		if (mysql_query( $sql)) {

			echo json_encode(array(
					"sucesso" => true ,
					"mensagem"=> "Inserido com sucesso"));
		} else {

			echo json_encode(array(
					"sucesso" => false ,
					));
		}


	}else{

		echo json_encode(array(
		"sucesso" => false ,
		"mensagem"=> "Método não suportado"));
	}
 ?>
