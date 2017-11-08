<?php
require_once ('modulo.php'); //inclusao do arquivo na pagina atual

Conexao_database(); // chama a funcao para conectar no banco de dados$modo=null;
if (isset($_GET['modo'])) {
  $modo=$_GET['modo'];
}

if ($modo=="ativar") {
  $pegarid=$_GET["pegarid"];

  $sql="UPDATE tbl_imagem SET ativaImagen = '1' WHERE idImagem =".$pegarid;
  mysqli_query($conexao,$sql);
  //echo $sql;

}else if ($modo=="Desativar"){
  $pegarid=$_GET["pegarid"];

  $sql="UPDATE tbl_imagem SET ativaImagen = '0' WHERE idImagem =".$pegarid;
  mysqli_query($conexao,$sql);
  //echo $sql;
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

              <p>Administrar conteudo/ Curiosiade</p>

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

          <div class="conteudo_principal_curiosidade">




                    <!-- TABELA -->


                        <div class="tabela_curiosidade">
                          <div class="titulo_tabela">
                              <h1>Imagens</h1>
                          </div>

                          <div class="titulos">
                            <ul>
                              <li>imagen</li>
                              <li>modo</li>
                            </ul>
                          </div>

                          <div class="titulos conteudos">


                            <ul>
                              <?php
                                  $sql="SELECT * FROM tbl_imagem;";
                                  $select=mysqli_query($conexao,$sql);

                                  while ($rs=mysqli_fetch_array($select,MYSQLI_BOTH)) {
                               ?>

                             <li>
                               <img src="<?php echo($rs['imagen']) ?>" alt="<?php echo($rs['descricao']) ?>">
                             </li>
                              <li>
                                <a  href="">
                                    <img class="modo" src="imagens/Zoom-icon.png" alt="deletar">
                                </a>

                                <a  href="">
                                    <img class="modo" src="imagens/delete-icon.png" alt="deletar">
                                </a>
                                  <?php
                                        if ($rs['ativaImagen'] ==1) {

                                   ?>
                                    <!-- <button class=" btnativar" type="submit" name="btnAtivar"></button> -->
                                <a  href="Admin_slider_home.php?modo=Desativar&pegarid=<?php echo ($rs['idImagem']) ?>">
                                    <img class="modo" src="imagens/ligar.png" alt="ativar" title="desativar">
                                </a>

                                <?php
                              }else{
                                 ?>

                                 <!-- <button class=" btnDesligar" type="submit" name="btnAtivar"></button> -->

                                 <a  href="Admin_slider_home.php?modo=ativar&pegarid=<?php echo ($rs['idImagem']) ?>">
                                     <img class="modo" src="imagens/desligar.png" alt="desativar" title="ativar">
                                 </a>

                                 <?php
                               }
                                  ?>

                              </li>

                              <?php
                            }
                               ?>
                            </ul>
                          </div>
                    <div class="botoes">
                      <a href="cadastrarImagens_slider.php">
                        <input   class="botao_novo" type="submit" name="btnNovoUser" value="Nova imagen">

                      </a>
                    </div>
                  </div>



              </div>

          </div>

          <footer>
              <p>Site desenvolvido por: Antonio Willian</p>
          </footer>

        </div>
  </body>
</html>
