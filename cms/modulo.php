<?php

 function Conexao_database()
{
 mysql_connect('localhost','root','bcd127');
  mysql_select_db('dbpizzaria');

}

function salvarFoto($file,$caminho){

  $erro="Erro";

    $diretorio_imagen=$caminho."/";//caminho

    $nome_do_arquivo= basename($file ['name']);

    //checando extensao

    if (strstr($nome_do_arquivo,'.jpg') || strstr($nome_do_arquivo,'.png') || strstr($nome_do_arquivo,'.jpeg')) {
      $diretorio_completo=$diretorio_imagen.$nome_do_arquivo;//caminho guardado na pasta
    //  echo $diretorio_completo;

      if (move_uploaded_file($file ['tmp_name'],$diretorio_completo)) {

          return $diretorio_completo;

      }else{
        return $erro;
      }
    }else{
      return $erro;
    }
}


 ?>
