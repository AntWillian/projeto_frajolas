<?php

// Variavel de sessao para edição
session_start();
$rua="";
$numero="";
$estado="";
$cidade="";
$bairro="";
$botao="Salvar Ambiente";
$idEstado=0;

require_once ('modulo.php'); //inclusao do arquivo na pagina atual

Conexao_database(); // chama a funcao para conectar no banco de dados

if (isset($_GET['btnsalvar'])) {
  $rua=$_GET['txtRua'];
  $cidade=$_GET['txtCidade'];
  $bairro=$_GET['txtBairro'];
  $numero=$_GET['txtNumero'];
  $estado=$_GET['slcestado'];
  $operacao=$_GET['btnsalvar'];

      if ($operacao=='Salvar Ambiente') {
        $sql="insert into tbl_ambiente (idEstado,rua,numero,bairro,cidade)
                values('".$estado."','".$rua."','".$numero."','".$bairro."','".$cidade."')";

          }elseif ($operacao=='Salvar Edicao') {
            $sql="update tbl_ambiente set idEstado='".$estado."',rua='".$rua."',numero='".$numero."',bairro='".$bairro."',cidade='".$cidade."'  where idAmbiente=".$_SESSION["id"];

  }

  mysql_query( $sql);

  header("location:cadastrar_ambiente.php");

}

if (isset($_GET['modo'])) {

  $modo=$_GET['modo'];

  if ($modo=="editarAmbiente") {
    $_SESSION['id']=$_GET['pegarid'];

    $sql="select a.* ,e.* from tbl_ambiente as a , tblestado as e where a.idEstado=e.idEstado and idAmbiente=".$_SESSION["id"];

    $select=mysql_query($sql);

    $consulta=mysql_fetch_array($select);


    $rua=$consulta['rua'];
    $numero=$consulta['numero'];
    $estado=$consulta['nome'];
    $botao="Salvar Edicao";
    $idEstado=$consulta['idestado'];
    $cidade=$consulta['cidade'];
    $bairro=$consulta['bairro'];

  }

}


 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CMS-FRAJOLA'S®</title>
    <link rel="stylesheet" href="css/style_home_cms.css">
    <link rel="stylesheet" href="css/styleAdmConteudos.css">

  </head>
  <body>
        <div class="principal">

          <div class="cabecalho">

            <div class="title">

              <p>Administrar conteudo/ Curiosidade</p>

            </div>

            <div class="logo">
              <img src="imagens/curiosidade.png" alt="">
            </div>

          </div>

          <nav class="menuNav">

            <div class="menu_navegacao">
              <div class="item_menu">
                <div class="imagen">
                  <img src="imagens/Icone_Materias.png" alt="administrador conteudos">
                </div>

                <div class="legenda_ativa">
                  <p> <a href="adiministrar_conteudo.php">Adm Conteudos</a> </p>
                </div>

              </div>

              <div class="item_menu">
                <div class="imagen">
                  <img src="imagens/icon_faleconosco.png" alt="administrador conteudos">
                </div>

                <div class="legenda">
                  <p><a href="adm_faleconosco_cms.php">Adm Fale Conosco</a></p>
                </div>

              </div>

              <div class="item_menu">
                <div class="imagen">
                  <img src="imagens/icon-controle-de-estoqu.png" alt="administrador conteudos">
                </div>

                <div class="legenda">
                  <p>Adm Produtos</p>
                </div>

              </div>

              <div class="item_menu">
                <div class="imagen">
                  <img src="imagens/worker-512.png" alt="administrador conteudos">
                </div>

                <div class="legenda">
                  <p><a href="ADM_usuario.php">Adm Usuarios</a></p>
                </div>

              </div>


            </div>


            <div class="user">

              <p>Bem vindo, User</p>

              <form class="frmSair" action="home_cms.html" method="post">
                      <input class="botao" type="submit" name="btnsair" value="SAIR">
              </form>

            </div>

          </nav>

          <div class="conteudo_principal">
              <form class="frmAmbiente" action="cadastrar_ambiente.php" method="get">
                <div class="cadastro_de_musica">
                  <div class="linha">

                    <div class="entrada_de_dados">
                        Cidade <span >*</span><br><input required class="dados_entrada" type="text" name="txtCidade" value="<?php echo($cidade) ?>" maxLength='90'>
                    </div>

                    <div class="entrada_de_dados">
                        Bairro <span >*</span><br><input required class="dados_entrada" type="text" name="txtBairro" value="<?php echo($bairro) ?>" maxLength='90'>
                    </div>


                    <div class="entrada_de_dados">
                        Rua <span >*</span><br><input required class="dados_entrada" type="text" name="txtRua" value="<?php echo($rua) ?>" maxLength='90'>
                    </div>

                    <div class="entrada_de_dados">
                        Numero <span >*</span><br><input required class="dados_entrada" type="text" name="txtNumero" value="<?php echo($numero) ?>" maxLength='90' >
                    </div>

                    <div class="entrada_de_dados">
                        estado<span >*</span><br>
                        <select class="dados_combo" name="slcestado">
                          <?php
                            if ($idEstado!=''){
                              ?>
                                <option value="<?php echo($idEstado) ?>" checked> <?php echo($estado) ?> </option>
                              <?php
                            }else {
                              ?>
                                <option value="" checked> selecione um Item </option>
                              <?php
                            }

                          ?>

                          <?php
                          $sql='select * from tblestado where idestado <>'.$idEstado;
                          //echo $sql;

                          $select = mysql_query( $sql);

                          while($rs = mysql_fetch_array($select)){
                           ?>
                           <option value='<?php echo $rs['idestado'] ?>'> <?php echo $rs['sigla'] ?></option>

                           <?php
                            }
                            ?>
                          </select>
                        </div>
                        <div class="voltar">
                          <a href="adm_ambiente.php">
                            <img src="imagens/arrow-back-1-icon.png" alt="voltar" title="Voltar">
                          </a>
                        </div>
                        <div class="botoes">

                          <a href="cadastrar_ambiente.php">
                            <br>
                            <input   class="botao_novo" type="submit" name="btnsalvar" value="<?php echo($botao) ?>">

                          </a>
                        </div>
                  </div>
                </div>
              </form>


          </div>

          <footer>
              <p>Site desenvolvido por: Antonio Willian</p>
          </footer>

        </div>
  </body>
</html>
