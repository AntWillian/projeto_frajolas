<?php
require_once ('cms/modulo.php'); //inclusao do arquivo na pagina atual

Conexao_database();
 ?>

<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>SOBRE NÓS</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/style_sobre.css" type="text/css">

    <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="coin-slider.min.js"></script>
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








  <!--########################## Conteudo ########################################-->
          <div class="principal_sobre">
              <section class="conteudo_sobre">

                <?php
                      $sql="select * from tbl_historia where ativarHistoria=1 ;";

                      $select=mysql_query($sql);

                      if ($rs=mysql_fetch_array($select)) {

                 ?>
                  <div class="titulo_sobre">
                      <h1><?php echo($rs['titulo1']) ?></h1>
                    </div>

                <div class="texto">
                  <p><?php echo($rs['paragrafoTitulo1']) ?></p>
                </div>
                <div class="titulo_sobre">
                    <h2><?php echo($rs['titulo2']) ?></h2>
                  </div>
                  <div class="texto">
                    <p><?php echo($rs['paragrafoTitulo2']) ?></p>
                  </div>

                  <div class="texto">
                    <p><?php echo($rs['paragrafoTitulo3']) ?></p>
                  </div>

                  <div class="texto">
                    <p><?php echo($rs['paragrafoTitulo4']) ?></p>
                  </div>

                    <?php
                  }
                     ?>

              </section>

              <div class="imagen_pizzaria">
                  <img src="images/PhotoGrid_1505686807660.jpg" alt="">
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
