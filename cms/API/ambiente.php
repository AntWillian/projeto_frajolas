<?php
require_once ('../modulo.php');

Conexao_database();

    $sql="select a.*,e.* from tbl_ambiente as a inner join tblestado as e on a.idEstado=e.idEstado;";

    $select=mysql_query($sql);

    $telefone=array();


    while ($tel = mysql_fetch_assoc($select)) {

        $telefone[]=$tel ;

    }
    //var_dump($lstProdutos);
    echo(json_encode($telefone));

 ?>
