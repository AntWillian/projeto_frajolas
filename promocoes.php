<?php
require_once ('cms/modulo.php'); //inclusao do arquivo na pagina atual

Conexao_database(); // chama a funcao para conectar no banco de dados


 ?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PROMOÇÕES</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/style_promocoes.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/stylecarrossel.css" />

    <!--HTML5-->
         <!--<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
-->
  </head>
  <body>
    <form class="frmProjeto" action="home.php" method="post">



      <!--########################## MENU ########################################-->
      <?php
        include("menu.php");

      ?>





      <div id="principal">

        <div id="redes_sociais">

            <div class="redes">

              <div class="conteudo_redes">
                <img class="image_redes" src="images/facebook.png" >
              </div>

            </div>



            <div class="redes">

              <div class="conteudo_redes">
                <img class="image_redes" src="images/twitter.png" >
              </div>

            </div>

            <div class="redes">

              <div class="conteudo_redes">
                <img class="image_redes" src="images/snapchat.png" >
              </div>

            </div>

          </div>


      <div id="principal_promocoes">


<!--########################## Conteudo ########################################-->


            <div id="conteudos_promocoes"><!--################ inicio promocoe produtos #######################-->
                <div id="conteudo_principal_promocoes">

                  <div id="titulo_principal_promocoes">
                      <h1>Confira nossas promoções</h1>
                  </div>


                  <div id="galeria_promocoes">

                    <div class="passar">

                      <div id="navegar1">
                          <a href="#" class="prev" title="Anterior"><img src="images/anterior.png" alt=""></a>
                      </div>

                    </div>
                    <div class="carrosel_produtos">
                      <!--#############################################################-->

                     <div id="content"><!--Começo carrosel-->
                         <div id="carrossel">
                             <ul>
                               <?php

                                      $sql="select * from tbl_produto where produtoEmPromocao=1;";

                                      $select=mysql_query($sql);

                                      while ($rs=mysql_fetch_array($select)) {

                                ?>
                                 <li>

                                   <div class="apresetacao_produto_em_promocoes"><!--inicio-->

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
                                       <div class="preco_promocao">
                                         <span class="valor_preco_antigo">
                                           De: <strong><?php echo ("R$ ".$rs['preco']) ?></strong>
                                         </span>

                                           <span class="valor_preco">
                                             Por: <strong><?php echo ("R$ ".$rs['valorProdutoEmPromocao']) ?></strong>
                                           </span>
                                       </div>
                                       <div class="botao_detalhes">
                                         <input  class="ver_detalhes" type="submit" name="btDetalhes" value="Detalhes">
                                       </div>
                                     </div>
                                   </div><!--fim-->

                                 </li>
                                 <?php
                               }
                                  ?>

                             </ul>
                         </div>

                     </div><!--Fim carrossel-->

                      <!--#############################################################-->
                      <!--JS-->
                      <script src="js/jquery.min.js"></script>
                      <script type="text/javascript" src="js/jcarousellite.js"></script>
                      <script type="text/javascript" src="js/carrossel.js"></script>

                      <!--#############################################################-->
                    </div>
                    <div class="passar">
                      <div id="navegar2">
                         <a href="#" class="next" title="Próximo"> <img src="images/proximo.png" alt=""></a>
                      </div>
                    </div>

                  </div>
                  <div id="titulo_secundario_promocoes">
                      <h2>Tambem Confira </h2>
                  </div>

                    <div class="outras_promocoes">
                      <div class="titulo_da_promocoes">
                          <p>Nome da promoção</p>
                      </div>
                      <div class="titulo_outras_promocoes">

                      </div>
                      <div class="detalhes_outras_promocoes">

                        <div class="imagem_promocoes">
                            <img src="images/vivasenior_posts_1031_C_site.png" alt="">
                        </div>

                        <div class="detalhes_promocoes">
                              <p>    Foi a época em que aconteceu a crise do petróleo, o que levou os Estados Unidos, o Brasil, a Suécia e o Reino Unido à recessão, ao mesmo tempo que economias de países como o Japão e Alemanha, na época Alemanha Ocidental começavam a crescer. Nesta época também surgia a defesa do meio ambiente, e houve também um crescimento das revoluções comportamentais da década anterior. Muitos a consideram a "era do individualismo". Eclodiam nesta época os movimentos músicos das discotecas e também do experimentalismo na música erudita.</p>
                        </div>
                      </div>

                      <div class="detalhes_outras_promocoes">

                        <div class="imagem_promocoes">
                            <img src="images/vivasenior_posts_1031_C_site.png" alt="">
                        </div>

                        <div class="detalhes_promocoes">
                              <p>    Foi a época em que aconteceu a crise do petróleo, o que levou os Estados Unidos, o Brasil, a Suécia e o Reino Unido à recessão, ao mesmo tempo que economias de países como o Japão e Alemanha, na época Alemanha Ocidental começavam a crescer. Nesta época também surgia a defesa do meio ambiente, e houve também um crescimento das revoluções comportamentais da década anterior. Muitos a consideram a "era do individualismo". Eclodiam nesta época os movimentos músicos das discotecas e também do experimentalismo na música erudita.</p>
                        </div>
                      </div>

                    </div>




                    </div>

                  </div>

                  <!--########################## rodape ########################################-->

                  <?php
                    include("rodape.php");

                  ?>

                </div>









    </form>

  </body>
</html>
