<?php
require_once ('modulo.php'); //inclusao do arquivo na pagina atual

Conexao_database();


session_start();
$Nivel=null;
$Descricao=null;
$botao='Salvar Nivel';

if (isset($_GET['btnsalvar'])) {
  $Nivel=$_GET['txtNivel'];
  $Descricao=$_GET['txtDescricao'];
  $operacao=$_GET['btnsalvar'];

  if ($operacao == "Salvar Nivel") {
    $sql="insert into tbl_nivel (nivel,descricao)
            values('".$Nivel."','".$Descricao."')";

  }elseif ($operacao=="Salvar Edicao") {
    $sql="update tbl_nivel set nivel='".$Nivel."',descricao='".$Descricao."' where idNivel=".$_SESSION["id"];

  }
  mysql_query($sql);
  echo $sql;
  //header("location:cadastro_de_nivel.php");

}

if (isset($_GET['modo'])) {
  $modo=$_GET['modo'];

  if ($modo == 'editarNivel') {
    $_SESSION['id']=$_GET['pegarid'];

    $sql="select * from tbl_nivel where idNivel=".$_SESSION['id'];

    $select=mysql_query($sql);

    $consulta=mysql_fetch_array($select);

    $Nivel=$consulta['nivel'];
    $Descricao=$consulta['descricao'];
    $botao='Salvar Edicao';
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
              <form class="frmNivel" action="cadastro_de_nivel.php" method="get">
                <div class="cadastro_de_musica">
                  <div class="linha">
                    <div class="entrada_de_dados">
                        Nivel <span >*</span><br><input required class="dados_entrada" type="text" name="txtNivel" value="<?php echo ($Nivel) ?>">
                    </div>

                    <div class="entrada_de_dados">
                        Descricao <span >*</span><br><input required class="dados_entrada" type="text" name="txtDescricao" value="<?php echo ($Descricao) ?>" >
                    </div>


                        </div>

                        <div class="voltar">
                          <a href="ADM_usuario.php">
                            <img src="imagens/arrow-back-1-icon.png" alt="voltar" title="Voltar">
                          </a>
                        </div>

                        <div class="botoes">
                          <a href="cadastro_de_nivel.php">
                            <br>
                            <input   class="botao_novo" type="submit" name="btnsalvar" value="<?php echo ($botao) ?>">

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
