<?php
require_once ('modulo.php'); //inclusao do arquivo na pagina atual

Conexao_database();


if (isset($_GET['pegarid'])) {
  $pegarid=$_GET['pegarid'];

  $sql="select * from tblcomentario where idcomentario=".$pegarid;

  $select=mysql_query($sql);

}else {
  echo ("ID INVALIDO");
}



 ?>




<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CMS-ADM FALE CONOSCO</title>
    <link rel="stylesheet" href="css/style_home_cms.css">
      <link rel="stylesheet" href="css/style_faleconosco_cms.css">
  </head>
  <body>
        <div class="principal">

          <div class="cabecalho">

            <div class="title">

              <p>CMS-ADM FALE CONOSCO</p>

            </div>

            <div class="logo">
                <img src="imagens/icon_faleconosco.png" alt="logo">
            </div>

          </div>

          <nav class="menuNav">

            <div class="menu_navegacao">
              <div class="item_menu">
                <div class="imagen">
                  <img src="imagens/Icone_Materias.png" alt="administrador conteudos">
                </div>

                <div class="legenda">
                  <p>Adm Conteudos</p>
                </div>

              </div>

              <div class="item_menu">
                <div class="imagen">
                  <img src="imagens/icon_faleconosco.png" alt="administrador conteudos">
                </div>

                <div class="legenda_ativa">
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
                  <p>Adm Usuarios</p>
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
            <?php
            if ($rs=mysql_fetch_array($select)) {


             ?>
            nome  <?php echo ($rs['nome']) ?> <br>
            telefone <?php echo ($rs['telefone']) ?> <br>
            celular <?php echo ($rs['celular']) ?> <br>
            email <?php echo ($rs['email']) ?> <br>
            profissao <?php echo ($rs['profissao']) ?> <br>
            sexo <?php echo ($rs['sexo']) ?> <br>
            linkface  <?php echo ($rs['linkFace']) ?><br>
            sugestao <?php echo ($rs['sugestao']) ?> <br>
            informacaoProduto  <?php echo ($rs['informacaoProduto']) ?><br>
            homePage <?php echo ($rs['homePage']) ?> <br>
            <?php
          }
             ?>
          <footer>
              <p>Site desenvolvido por: Antonio Willian</p>
          </footer>

        </div>
  </body>
</html>
