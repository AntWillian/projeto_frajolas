<?php
require_once ('cms/modulo.php'); //inclusao do arquivo na pagina atual

Conexao_database(); // chama a funcao para conectar no banco de dados
include_once('cms/session.php');
 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>FRAJOLA'S®</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/coin-slider.min.js"></script>
  </head>
  <body>
    <form class="frmProjeto" action="home.php" method="post">



      <!--########################## MENU ########################################-->
      <?php
        include("menu.php");

      ?>


      <div id="principal">

        <?php
          include("redes.php");

        ?>


      <!--########################## slider ########################################-->

          <section id="conteudo_principal">

            <div id="slider">
              <div id='coin-slider'>
                <?php
                  $sql='SELECT * FROM tbl_imagem where ativaImagen=1;';

                  $select=mysql_query($sql);

                  while ($rs=mysql_fetch_array($select)) {


                 ?>
                <a href="#" target="_blank">
                  <img src='cms/<?php echo ($rs['imagen'])?>' alt="test">
                </a>

                              <?php
                            }
                               ?>
              </div>


              <script type="text/javascript">
              	$(document).ready(function() {
              		$('#coin-slider').coinslider({width:1200,height: 470,navigation: true, delay: 5000 });
              	});
              </script>


            </div>

<!--########################## Conteudo ########################################-->


            <div id="conteudos">

                <nav id="menu_lateral">
                    <ul>
                      <li>pizza 1</li>
                      <li>pizza 2</li>

                    </ul>
                </nav>

                <div id="conteudo_principal_produtos">

                  <div id="titulo_principal">
                      <h1>Escolha sua Pizza</h1>
                  </div>

                  <div id="produtos">

                    <div class="sesao_de_produto">

                      <?php
                        $sql="select * from tbl_produto where ativarProduto=1 order by idProduto desc;";

                        $select=mysql_query($sql);

                        while ($rs=mysql_fetch_array($select)) {


                       ?>


                      <div class="apresetacao_produto"><!--inicio-->
                        <div class="titulo_produto">
                            <h2><?php echo ($rs['nomeProduto']) ?></h2>
                        </div>
                        <div class="clips">
                          <img class="img_clips" src='images/a-paper-clip-icon-94914.png' alt="test">
                            <?php
                                if ($rs['produtoEmPromocao'] == 1) {

                             ?>
                          <img class="img_clips" src='images/tag-sale-icon.png' alt="test">
                            <?php
                          }
                             ?>
                        </div>
                        <div class="box1">
                            <img class="img1" src='cms/<?php echo ($rs['imagen1']) ?>' alt="<?php echo ($rs['nomeProduto']) ?>">
                        </div>

                        <div class="detalhes">
                          <div class="descricao">
                              <strong>
                                <?php echo ($rs['descricaoProduto']) ?>
                              </strong>
                          </div>
                          <div class="preco">
                              <span class="valor_preco">Por: <strong>
                                <?php
                                if ($rs['produtoEmPromocao'] == 1) {
                                    echo ("R$ ".$rs['valorProdutoEmPromocao']);
                              }else {

                                echo ("R$ ".$rs['preco']);

                              }
                              ?> </strong></span>
                          </div>
                          <div class="botao_detalhes">
                            <input  class="ver_detalhes" type="submit" name="btDetalhes" value="Detalhes">
                          </div>
                        </div>
                      </div><!--fim-->

                    <?php
                  }
                     ?>


                    </div>
                  </div>

                </div>



            </div>



          </section>

  <!--########################## rodape ########################################-->

        <?php
            include("rodape.php");
         ?>
      </div>
    </form>

  </body>
</html>
