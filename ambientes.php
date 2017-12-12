<?php
require_once ('cms/modulo.php'); //inclusao do arquivo na pagina atual

Conexao_database();

 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ONDE ESTAMOS</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/Style_onde_estamos.css" type="text/css">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
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
        <div class="principal_ondeEstamos">
            <section class="conteudo_ondeestamos">
                <div class="titulo_ondeestamos">
                    <h1>Confira nossas localidades</h1>
                  </div>

              <div class="texto">
                <p>Nao passe fome descubra agora ode fica a pizzaria Frajola's <sup>®</sup></p>
              </div>
              <div class="mapa">
                  <iframe class="mapa_visualizar" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.148645254727!2d-46.656571185442445!3d-23.56310428468203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce59c8da0aa315%3A0xd59f9431f2c9776a!2sAv.+Paulista%2C+S%C3%A3o+Paulo+-+SP!5e0!3m2!1spt-BR!2sbr!4v1505605145148" style="border:0" allowfullscreen></iframe>
              </div>


                <?php
                $sql="select a.*,e.* from tbl_ambiente as a , tblestado as e where a.idEstado=e.idEstado and a.ativarAmbiente=1 order  by idAmbiente desc;";


                  $select=mysql_query($sql);

                  while ($rs=mysql_fetch_array($select)) {


                 ?>
              <div class="endereco">
                    <p>Rua: <?php echo ($rs['rua']) ?></p>
                    <p>numero : <?php echo ($rs['numero']) ?></p>
                    <p>estado: <?php echo ($rs['nome']) ?></p>
                    <p>bairro: <?php echo ($rs['bairro']) ?></p>
                    <p>cidade: <?php echo ($rs['cidade']) ?></p>
              </div>

                <?php
              }
                 ?>

            </section>

        </div>


  <!--########################## rodape ########################################-->

          <?php
            include("rodape.php");

          ?>

      </div>
    </form>

  </body>
</html>
