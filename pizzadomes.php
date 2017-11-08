<?php
require_once ('cms/modulo.php'); //inclusao do arquivo na pagina atual

Conexao_database(); // chama a funcao para conectar no banco de dados
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pizza Do Mês</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/stylePizzadomes.css" type="text/css">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
      $(function () {
        $('.thumbs img').click(function () {
          var foto_pizza = $('#foto_pizza img');
          var thumbs = $(this).attr('src');

          if (foto_pizza.attr('src')!== thumbs) {
            foto_pizza.fadeTo('200','0', function (){
              foto_pizza.attr('src', thumbs);
              foto_pizza.fadeTo('150','1');
            });

            $('.thumbs img').removeClass('active');
            $(this).addClass('active')
          }

        })

      })
    </script>

  </head>
  <body>
    <form class="frmProjeto" action="home.php" method="post">
      <!--########################## MENU ########################################-->
      <?php
        include("menu.php");

      ?>



      <div id="principal">

        <?php
            include 'redes.php';
         ?>

        <div id="principal_pizza">
          <nav id="menu_outros_produtos">
            <div class="titulo_pizza">
              <h3>Confira</h3>
            </div>
            <div id="confira_produtos">
                <ul>
                  <li><a href="#">nome Do Produto</a>
                      <ul>
                        <li>
                          <img class="img_outros"  src='images/1.1.jpg' alt="test">
                        </li>
                      </ul>
                  </li>
                </ul>
            </div>
          </nav>
          <section id="conteudo_pizza">


            <div class="titulo_pizza">
              <h1>Pizza do Mês</h1>
            </div>

              <?php

                  $sql="select * from tbl_produto where pizzaDoMes=1";

                  $select=mysql_query($sql);

                  if ($rs=mysql_fetch_array($select)) {

               ?>
            <article class="product_images">
              <div id="nome_pizza">
                <h2><?php echo ($rs['nomeProduto']) ?></h2>
              </div>

                <div id="foto_pizza">
                    <img class="img1" src='cms/<?php echo ($rs['imagen1']) ?>' alt="test">
                </div>

                <div class="thumbs">
                  <img  class="active" src='cms/<?php echo ($rs['imagen1']) ?>' alt="test">
                  <img class="img1"  src='cms/<?php echo ($rs['imagen2']) ?>' alt="test">
                  <img class="img1" src='cms/<?php echo ($rs['imagen3']) ?>' alt="test">
                  <img class="img1" src='cms/<?php echo ($rs['imagen4']) ?>' alt="test">

                </div>
            </article>
            <div id="dados_pizza">


                <div id="detalhes_pizza">
                    <div class="classificacao_pizza">

                      <div class="titulo_classificaco">
                          <span><strong>Descrição</strong></span>
                      </div>
                        <div class="classificacao">
                            <ul>
                              <li><img class="img1" src='images/star34px.png' alt="test"></li>
                              <li><img class="img1" src='images/star34px.png' alt="test"></li>
                              <li><img class="img1" src='images/star34px.png' alt="test"></li>
                              <li><img class="img1" src='images/star34px.png' alt="test"></li>
                              <li><img class="img1" src='images/starHalf34px.png' alt="test"></li>

                            </ul>
                        </div>
                        <div class="nota">
                          <span>4.5</span>
                        </div>
                    </div>

                    <div class="descricao_pizza">


                        <div class="descricao">
                            <p> <?php echo ($rs['descricaoProduto']) ?></p>
                        </div>
                    </div>



                    <div class="descricao_pizza">
                        <div class="titulo_descricao">
                            <span><strong>Preço:</strong></span>
                        </div>

                        <div class="descricao">
                          <div class="preco_promocao_pizza">
                            <span class="valor_preco_antigo_pizza">
                              De: <strong> <?php echo ("R$ ".$rs['preco']) ?></strong>
                            </span>

                              <span class="valor_preco_pizza">
                                Por: <strong> <strong><?php echo ("R$ ".$rs['valorProdutoEmPromocao']) ?></strong>
                              </span>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
              <?php
            }
               ?>

          </section>
          <!--########################## rodape ########################################-->

          <?php
            include("rodape.php");

          ?>
        </div>
        </div>

    </form>
  </body>
</html>
