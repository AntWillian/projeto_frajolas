                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <?php
require_once ('cms/modulo.php'); //inclusao do arquivo na pagina atual

Conexao_database(); // chama a funcao para conectar no banco de dados
// include_once('cms/session.php');

$modo="";
if (isset($_GET['modo'])) {
  $modo=$_GET['modo'];
  $pegarid=$_GET["pegarid"];
}


if (isset($_POST['btDetalhes'])) {
  ?>

  <?php

  $sql="insert into tbl_click set idProduto='".$pegarid."',click=1,data=CURRENT_TIMESTAMP()";

         mysql_query($sql);
         echo $sql;

         echo "<script> alert(".$sql.") ;</script>";
}

 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>FRAJOLA'S®</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/styleProduto.css" type="text/css">

    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/coin-slider.min.js"></script>
    <script>
    $(document).ready(function() {

        $(".ver").click(function() {
          $(".modalContainer").slideToggle(1000);
          //slideToggle
          //toggle
          //FadeIn
          });


        $(".cardapio").click(function () {
          //$("#menu_lateral").slideToggle(2000);
          $("#menu_lateral").css({"margin-left" : "0px","transition":"2s"});
          //alert('fdsfdsf');
        });



        $(".fechar_cardapio").click(function () {
            $("#menu_lateral").css({"margin-left" : "200px","transition":"2s"});
        });






        });

        function Modal(idIten){
          $.ajax({
            type: "POST",
            url: "mostrar_Produto.php",
            data: {id:idIten},
            success: function(dados){
              $('.modal').html(dados);
            }
          });
          }

    </script>
  </head>
  <body>
    <div class="modalContainer">
      <div class="modal">

      </div>
    </div>

    <form class="frmProjeto" id="frmProjeto" action="index.php" method="post">



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
                  $sql='select * from tbl_imagem where ativaImagen=1;';

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

              <div class="imagenMobile">
                <img src="images/4.jpg" alt="teste">
              </div>
            </div>

<!--########################## Conteudo ########################################-->


            <div id="conteudos">
                <div class="cardapio">





                <div id="menu_lateral">
                  <div class="fechar_cardapio">

                  </div>

                  <?php
                      $sql="select * from tbl_categorias; ";



                      $select=mysql_query($sql);

                      while ($rs=mysql_fetch_array($select)) {
                            $idCategoria=$rs['idCategoria'];
                   ?>
                    <div class="menu_cate">
                      <div class="menu_sub_cate"> <a href="#"><?php echo ($rs['categoria']) ?></a>

                        <?php
                          $sql2="select * from tbl_subcategoria where
                          idCategoria=".$idCategoria;



                          $select2=mysql_query($sql2);

                          while ($rs2=mysql_fetch_array($select2)) {
                       ?>

                      <div class="sub">
                        <div class="item_sub">
                          <a href="index.php?modo=mostrar&pegarid=<?php echo($rs2['idSubCategoria'])?>"><?php echo ($rs2['subCategoria']) ?></a>
                        </div>
                      </div>

                      <?php
                    }
                       ?>

                      </div>



                    </div>

                    <?php
                  }
                     ?>
                </div>
                  </div>

                <div id="conteudo_principal_produtos">

                  <div id="titulo_principal">
                      <h1>Escolha sua Pizza</h1>
                  </div>

                  <form class="frmPesquisa" action="index.php" method="post">

                      <div class="pesquisa">

                            <div class="btnDiv">


                              <div class="psDiv">
                                <input class="ps"  type="text" name="txtPesquisa" value="" maxLength="100" placeholder="Digite o Nome do produto">

                              </div>
                              <input class="btn" type="submit" name="btnPesquisa" value="">

                            </div>



                      </div>

                  </form>

                  <div id="produtos">

                    <div class="sesao_de_produto">

                      <?php

                      if ($modo == "mostrar") {
                        $sql="select TRUNCATE(SUM(a.avaliacao) / COUNT(a.idProduto), 2) as percentual,
                                  TRUNCATE(COUNT(a.idAvaliacao), 0) as total_pessoas,p.*,
                                      TRUNCATE((p.preco-(p.percentualDesconto*preco)/100),2) as desconto,
                                          s.*,c.*,a.* from tbl_produto as p inner join tbl_subcategoria as s
                                           on p.idSubCategoria=s.idSubCategoria
                                              inner join tbl_categorias as c on c.idCategoria=s.idCategoria
                                               inner join tbl_avaliacao as a on p.idProduto=a.idProduto  where
                                                  ativarProduto=1 and s.idSubCategoria=".$pegarid." order by RAND();";

                        echo $sql;
                      }
                      elseif (isset($_POST['btnPesquisa'])) {
                        $Pesquisa=$_POST['txtPesquisa'];

                        $sql="select TRUNCATE((p.preco-(p.percentualDesconto*preco)/100),2) as desconto,p.*
                          from tbl_produto as p where nomeProduto  like '%".$Pesquisa."%' and ativarProduto=1";

                      }else{

                        $sql="select TRUNCATE((p.preco-(p.percentualDesconto*preco)/100),2) as desconto,p.*
                              from tbl_produto as p where ativarProduto=1 order by RAND();";

                      }

                        $select=mysql_query($sql);
                        $Status=false;


                        while ($rs=mysql_fetch_array($select)) {
                            $Status = true;

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
                                    echo ("R$ ".$rs['desconto']." - ".$rs['percentualDesconto'])."%";
                              }else {

                                echo ("R$ ".$rs['preco']);

                              }
                              ?> </strong></span>
                          </div>

                          <div class="botao_detalhes">
                            <a class="ver"  href="#" onclick="Modal(<?php echo($rs['idProduto'])?>)">
                              <input  class="ver_detalhes" type="submit" name="btDetalhes" value="Detalhes">
                            </a>

                          </div>
                        </div>
                      </div><!--fim-->

                    <?php
                  }

                  if ($Status == false) {
                    echo "<div class='erro titulo_principal'>
                      <p>Nada encontrado</p>
                    </div>";
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
