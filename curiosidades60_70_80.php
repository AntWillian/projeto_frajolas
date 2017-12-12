<?php
require_once ('cms/modulo.php'); //inclusao do arquivo na pagina atual

Conexao_database(); // chama a funcao para conectar no banco de dados
 ?>







<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CURIOSIDADES</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/stylecuriosidades.css" type="text/css">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
      $(function () {
        $('.thumbs img').click(function () {
          var foto_principal = $('#foto_principal img');
          var thumbs = $(this).attr('src');

          if (foto_principal.attr('src')!== thumbs) {
              foto_principal.fadeTo('200','0', function (){
              foto_principal.attr('src', thumbs);
              foto_principal.fadeTo('150','1');
            });

            $('.thumbs img').removeClass('active');
            $(this).addClass('active')
          }

        })

      })
    </script>

    <script>


			function ShowMenu(){
				var idElement = document.getElementById("product_images").dataset.id;

				if(idElement==0){
					document.getElementById("product_images").style.display = "block";
					document.getElementById("product_images").dataset.id = '1';
          document.getElementById("teste").style.width="880px";
          document.getElementById("teste2").style.width="1000px";

				}else{
					document.getElementById("product_images").style.display = "none";
					document.getElementById("product_images").dataset.id = '0';
				}
			}

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

<!--########################## Conteudo ########################################-->
    <section id="conteudo_curiosidades">
        <div class="titulo_curiosidades"> <!--########## DIV PRINCIPAL DE CONTEUDOS##############-->
            <h1>Saiba mais sobre os anos 60, 70 e 80</h1>
        </div>

        <div class="conteudo_principal_curiosidades">

            <?php

                $sql="select c.tituloAno,c.descricaoAno,c.imagenCuriosidade,c.descricaoImagen,a.Ano from tbl_curiosidade as c ,tblano as a where c.idAno=a.idAno and c.ativar=1 and a.idAno=1";

                  $select=mysql_query($sql);

                  if ($rs=mysql_fetch_array($select)) {

             ?>

            <div class="imagen_titulo">
              <img src="cms/<?php echo ($rs['imagenCuriosidade']) ?>" alt="<?php echo ($rs['descricaoImagen']) ?>">

            </div>

            <div class="Titulo_principal_cabeçalho"> <!--########################## Div flutuante com hover ########################################-->


              <h3 class="Titulo_principal_anos" ><?php echo ($rs['tituloAno']) ?></h3>

            </div>



            <div class="detalhes_anos" >
                <p><?php echo ($rs['descricaoAno']) ?></p>
            </div>

            <?php
                }
             ?>


            <div class="lista_de_curiosidades">
              <div class="titulo_anos">
                  <h2>Curiosidades anos 80</h2>
              </div>
              <div class="detalhes_curiosidades"><!--TABELA CURIOSIDADES-->
                  <div class="curiosidade">
                      <p>Musica</p>
                  </div>

                  <div class="detalhes_curiosidade">

                      <ul>
                        <?php
                          $sql="select m.tituloMusica,m.linkVideoClip,a.ano from tbl_musica as m, tblano as a where a.idAno=m.idAno and a.idAno=1;";

                            $select=mysql_query($sql);

                            while ($rs=mysql_fetch_array($select)) {
                         ?>
                        <li><a href="#"><?php echo ($rs['tituloMusica']) ?></a>
                              <ul class="abrir">
                                <li><div class="video">
                                    <?php echo($rs['linkVideoClip']) ?>
                                </div></li>
                              </ul>
                        </li>
                        <?php
                          }
                         ?>
                      </ul>
                  </div>

              </div><!--FIM sTABELA CURIOSIDADES-->

              <div class="detalhes_curiosidades"><!--TABELA CURIOSIDADES-->
                  <div class="curiosidade">
                      <p>Cultura</p>
                  </div>

                  <div class="detalhes_curiosidade">
                      <ul>
                        <?php
                          $sql="select c.tituloCultura,c.imagenCultura,a.ano from tbl_cultura as c, tblano as a where a.idAno=c.idAno and a.idAno=1;";

                            $select=mysql_query($sql);

                            while ($rs=mysql_fetch_array($select)) {
                         ?>
                        <li><a href="#"><?php echo ($rs['tituloCultura']) ?></a>
                              <ul class="abrir">
                                <li><div class="video">
                                  <img src="cms/<?php echo($rs['imagenCultura']) ?>" alt="<?php echo($rs['imagenCultura']) ?>">
                                </div></li>
                              </ul>
                        </li>
                        <?php
                          }
                         ?>



                      </ul>
                  </div>

              </div><!--FIM sTABELA CURIOSIDADES-->

              <div class="detalhes_curiosidades"><!--TABELA CURIOSIDADES-->
                  <div class="curiosidade">
                      <p>Cinema</p>
                  </div>

                  <div class="detalhes_curiosidade">
                      <ul>

                        <?php
                          $sql="select c.tituloFilme,c.linkTralheFilme,a.ano from tbl_cinema as c, tblano as a where a.idAno=c.idAno and a.idAno=1;";

                            $select=mysql_query($sql);

                            while ($rs=mysql_fetch_array($select)) {
                         ?>
                        <li><a href="#"><?php echo ($rs['tituloFilme']) ?></a>
                              <ul class="abrir">
                                <li>
                                  <div class="video">
                                    <iframe width="490" height="315" src="<?php echo ($rs['linkTralheFilme']) ?>" allowfullscreen></iframe>
                                  </div>
                                </li>


                              </ul>
                        </li>
                        <?php
                          }
                         ?>


                      </ul>
                  </div>

              </div><!--FIM sTABELA CURIOSIDADES-->

              <div class="detalhes_curiosidades"><!--TABELA CURIOSIDADES-->
                  <div class="curiosidade">
                      <p>Televisao</p>
                  </div>

                  <div class="detalhes_curiosidade">
                      <ul>
                        <?php
                          $sql="select t.tituloPrograma,t.imagenPrograma,a.ano from tbl_televisao as t, tblano as a where a.idAno=t.idAno and a.idAno=1;";

                            $select=mysql_query($sql);

                            while ($rs=mysql_fetch_array($select)) {
                         ?>
                        <li><a href="#"><?php echo ($rs['tituloPrograma']) ?></a>
                              <ul class="abrir">
                                <li><div class="video">
                                  <img src="cms/<?php echo($rs['imagenPrograma']) ?>" alt="imagen <?php echo($rs['tituloPrograma']) ?>">
                                </div></li>
                              </ul>
                        </li>
                        <?php
                          }
                         ?>



                      </ul>
                  </div>

              </div><!--FIM sTABELA CURIOSIDADES-->

              <div class="detalhes_curiosidades"><!--TABELA CURIOSIDADES-->
                  <div class="curiosidade">
                      <p>Politica</p>
                  </div>

                  <div class="detalhes_curiosidade">
                      <ul>
                        <?php
                        $sql="select p.tituloPolitica,p.imagenPolitica,a.ano from tbl_politica as p, tblano as a where a.idAno=p.idAno and a.idAno=1;";

                            $select=mysql_query($sql);

                            while ($rs=mysql_fetch_array($select)) {
                         ?>
                        <li><a href="#"><?php echo ($rs['tituloPolitica']) ?></a>
                              <ul class="abrir">
                                <li><div class="video">
                                  <img src="cms/<?php echo($rs['imagenPolitica']) ?>" alt="imagen <?php echo($rs['tituloPolitica']) ?>">
                                </div></li>
                              </ul>
                        </li>
                        <?php
                          }
                         ?>






                      </ul>
                  </div>

              </div><!--FIM sTABELA CURIOSIDADES-->







            </div>
        </div>


        <!--########################## DIV DE CURIOSIDADES##################################-->

          <!-- ANOS 70 -->


          <div class="conteudo_principal_curiosidades">

              <?php

                  $sql="select c.tituloAno,c.descricaoAno,c.imagenCuriosidade,c.descricaoImagen,a.Ano from tbl_curiosidade as c ,tblano as a where c.idAno=a.idAno and c.ativar=1 and a.idAno=2";

                    $select=mysql_query($sql);

                    if ($rs=mysql_fetch_array($select)) {

               ?>

              <div class="imagen_titulo">
                <img src="cms/<?php echo ($rs['imagenCuriosidade']) ?>" alt="<?php echo ($rs['descricaoImagen']) ?>">

              </div>

              <div class="Titulo_principal_cabeçalho"> <!--########################## Div flutuante com hover ########################################-->


                <h3 class="Titulo_principal_anos" ><?php echo ($rs['tituloAno']) ?></h3>

              </div>



              <div class="detalhes_anos" >
                  <p><?php echo ($rs['descricaoAno']) ?></p>
              </div>



              <?php
                  }
               ?>


              <div class="lista_de_curiosidades">
                <div class="titulo_anos">
                    <h2>Curiosidades anos 80</h2>
                </div>
                <div class="detalhes_curiosidades"><!--TABELA CURIOSIDADES-->
                    <div class="curiosidade">
                        <p>Musica</p>
                    </div>

                    <div class="detalhes_curiosidade">

                        <ul>
                          <?php
                            $sql="select m.tituloMusica,m.linkVideoClip,a.ano from tbl_musica as m, tblano as a where a.idAno=m.idAno and a.idAno=2;";

                              $select=mysql_query($sql);

                              while ($rs=mysql_fetch_array($select)) {
                           ?>
                          <li><a href="#"><?php echo ($rs['tituloMusica']) ?></a>
                                <ul class="abrir">
                                  <li><div class="video">
                                      <?php echo($rs['linkVideoClip']) ?>
                                  </div></li>
                                </ul>
                          </li>
                          <?php
                            }
                           ?>
                        </ul>
                    </div>

                </div><!--FIM sTABELA CURIOSIDADES-->

                <div class="detalhes_curiosidades"><!--TABELA CURIOSIDADES-->
                    <div class="curiosidade">
                        <p>Cultura</p>
                    </div>

                    <div class="detalhes_curiosidade">
                        <ul>
                          <?php
                            $sql="select c.tituloCultura,c.imagenCultura,a.ano from tbl_cultura as c, tblano as a where a.idAno=c.idAno and a.idAno=2;";

                              $select=mysql_query($sql);

                              while ($rs=mysql_fetch_array($select)) {
                           ?>
                          <li><a href="#"><?php echo ($rs['tituloCultura']) ?></a>
                                <ul class="abrir">
                                  <li><div class="video">
                                    <img src="cms/<?php echo($rs['imagenCultura']) ?>" alt="<?php echo($rs['imagenCultura']) ?>">
                                  </div></li>
                                </ul>
                          </li>
                          <?php
                            }
                           ?>



                        </ul>
                    </div>

                </div><!--FIM sTABELA CURIOSIDADES-->

                <div class="detalhes_curiosidades"><!--TABELA CURIOSIDADES-->
                    <div class="curiosidade">
                        <p>Cinema</p>
                    </div>

                    <div class="detalhes_curiosidade">
                        <ul>

                          <?php
                            $sql="select c.tituloFilme,c.linkTralheFilme,a.ano from tbl_cinema as c, tblano as a where a.idAno=c.idAno and a.idAno=2;";

                              $select=mysql_query($sql);

                              while ($rs=mysql_fetch_array($select)) {
                           ?>
                          <li><a href="#"><?php echo ($rs['tituloFilme']) ?></a>
                                <ul class="abrir">
                                  <li>
                                    <div class="video">
                                      <iframe width="490" height="315" src="<?php echo ($rs['linkTralheFilme']) ?>" allowfullscreen></iframe>
                                    </div>
                                  </li>


                                </ul>
                          </li>
                          <?php
                            }
                           ?>


                        </ul>
                    </div>

                </div><!--FIM sTABELA CURIOSIDADES-->

                <div class="detalhes_curiosidades"><!--TABELA CURIOSIDADES-->
                    <div class="curiosidade">
                        <p>Televisao</p>
                    </div>

                    <div class="detalhes_curiosidade">
                        <ul>
                          <?php
                            $sql="select t.tituloPrograma,t.imagenPrograma,a.ano from tbl_televisao as t, tblano as a where a.idAno=t.idAno and a.idAno=2;";

                              $select=mysql_query($sql);

                              while ($rs=mysql_fetch_array($select)) {
                           ?>
                          <li><a href="#"><?php echo ($rs['tituloPrograma']) ?></a>
                                <ul class="abrir">
                                  <li><div class="video">
                                    <img src="cms/<?php echo($rs['imagenPrograma']) ?>" alt="imagen <?php echo($rs['tituloPrograma']) ?>">
                                  </div></li>
                                </ul>
                          </li>
                          <?php
                            }
                           ?>



                        </ul>
                    </div>

                </div><!--FIM sTABELA CURIOSIDADES-->

                <div class="detalhes_curiosidades"><!--TABELA CURIOSIDADES-->
                    <div class="curiosidade">
                        <p>Politica</p>
                    </div>

                    <div class="detalhes_curiosidade">
                        <ul>
                          <?php
                          $sql="select p.tituloPolitica,p.imagenPolitica,a.ano from tbl_politica as p, tblano as a where a.idAno=p.idAno and a.idAno=2;";

                              $select=mysql_query($sql);

                              while ($rs=mysql_fetch_array($select)) {
                           ?>
                          <li><a href="#"><?php echo ($rs['tituloPolitica']) ?></a>
                                <ul class="abrir">
                                  <li><div class="video">
                                    <img src="cms/<?php echo($rs['imagenPolitica']) ?>" alt="imagen <?php echo($rs['tituloPolitica']) ?>">
                                  </div></li>
                                </ul>
                          </li>
                          <?php
                            }
                           ?>






                        </ul>
                    </div>

                </div><!--FIM sTABELA CURIOSIDADES-->









              </div>
          </div>
          <!-- ANOS 60 -->


          <div class="conteudo_principal_curiosidades">

              <?php


              $sql="select c.tituloAno,c.descricaoAno,c.imagenCuriosidade,c.descricaoImagen,a.Ano from tbl_curiosidade as c ,tblano as a where c.idAno=a.idAno and c.ativar=1 and a.idAno=3";
                    $select=mysql_query($sql);

                    if ($rs=mysql_fetch_array($select)) {

               ?>

              <div class="imagen_titulo">
                <img src="cms/<?php echo ($rs['imagenCuriosidade']) ?>" alt="<?php echo ($rs['descricaoImagen']) ?>">

              </div>

              <div class="Titulo_principal_cabeçalho"> <!--########################## Div flutuante com hover ########################################-->


                <h3 class="Titulo_principal_anos" ><?php echo ($rs['tituloAno']) ?></h3>

              </div>



              <div class="detalhes_anos" >
                  <p><?php echo ($rs['descricaoAno']) ?></p>
              </div>

              <?php
                  }
               ?>


              <div class="lista_de_curiosidades">
                <div class="titulo_anos">
                    <h2>Curiosidades anos 80</h2>
                </div>
                <div class="detalhes_curiosidades"><!--TABELA CURIOSIDADES-->
                    <div class="curiosidade">
                        <p>Musica</p>
                    </div>

                    <div class="detalhes_curiosidade">

                        <ul>
                          <?php
                            $sql="select m.tituloMusica,m.linkVideoClip,a.ano from tbl_musica as m, tblano as a where a.idAno=m.idAno and a.idAno=3;";

                              $select=mysql_query($sql);

                              while ($rs=mysql_fetch_array($select)) {
                           ?>
                          <li><a href="#"><?php echo ($rs['tituloMusica']) ?></a>
                                <ul class="abrir">
                                  <li><div class="video">
                                      <?php echo($rs['linkVideoClip']) ?>
                                  </div></li>
                                </ul>
                          </li>
                          <?php
                            }
                           ?>
                        </ul>
                    </div>

                </div><!--FIM sTABELA CURIOSIDADES-->

                <div class="detalhes_curiosidades"><!--TABELA CURIOSIDADES-->
                    <div class="curiosidade">
                        <p>Cultura</p>
                    </div>

                    <div class="detalhes_curiosidade">
                        <ul>
                          <?php
                            $sql="select c.tituloCultura,c.imagenCultura,a.ano from tbl_cultura as c, tblano as a where a.idAno=c.idAno and a.idAno=3;";

                              $select=mysql_query($sql);

                              while ($rs=mysql_fetch_array($select)) {
                           ?>
                          <li><a href="#"><?php echo ($rs['tituloCultura']) ?></a>
                                <ul class="abrir">
                                  <li><div class="video">
                                    <img src="cms/<?php echo($rs['imagenCultura']) ?>" alt="<?php echo($rs['imagenCultura']) ?>">
                                  </div></li>
                                </ul>
                          </li>
                          <?php
                            }
                           ?>



                        </ul>
                    </div>

                </div><!--FIM sTABELA CURIOSIDADES-->

                <div class="detalhes_curiosidades"><!--TABELA CURIOSIDADES-->
                    <div class="curiosidade">
                        <p>Cinema</p>
                    </div>

                    <div class="detalhes_curiosidade">
                        <ul>

                          <?php
                            $sql="select c.tituloFilme,c.linkTralheFilme,a.ano from tbl_cinema as c, tblano as a where a.idAno=c.idAno and a.idAno=3;";

                              $select=mysql_query($sql);

                              while ($rs=mysql_fetch_array($select)) {
                           ?>
                          <li><a href="#"><?php echo ($rs['tituloFilme']) ?></a>
                                <ul class="abrir">
                                  <li>
                                    <div class="video">
                                      <iframe width="490" height="315" src="<?php echo ($rs['linkTralheFilme']) ?>" allowfullscreen></iframe>
                                    </div>
                                  </li>


                                </ul>
                          </li>
                          <?php
                            }
                           ?>


                        </ul>
                    </div>

                </div><!--FIM sTABELA CURIOSIDADES-->

                <div class="detalhes_curiosidades"><!--TABELA CURIOSIDADES-->
                    <div class="curiosidade">
                        <p>Televisao</p>
                    </div>

                    <div class="detalhes_curiosidade">
                        <ul>
                          <?php
                            $sql="select t.tituloPrograma,t.imagenPrograma,a.ano from tbl_televisao as t, tblano as a where a.idAno=t.idAno and a.idAno=3;";

                              $select=mysql_query($sql);

                              while ($rs=mysql_fetch_array($select)) {
                           ?>
                          <li><a href="#"><?php echo ($rs['tituloPrograma']) ?></a>
                                <ul class="abrir">
                                  <li><div class="video">
                                    <img src="cms/<?php echo($rs['imagenPrograma']) ?>" alt="imagen <?php echo($rs['tituloPrograma']) ?>">
                                  </div></li>
                                </ul>
                          </li>
                          <?php
                            }
                           ?>



                        </ul>
                    </div>

                </div><!--FIM sTABELA CURIOSIDADES-->

                <div class="detalhes_curiosidades"><!--TABELA CURIOSIDADES-->
                    <div class="curiosidade">
                        <p>Politica</p>
                    </div>

                    <div class="detalhes_curiosidade">
                        <ul>
                          <?php
                          $sql="select p.tituloPolitica,p.imagenPolitica,a.ano from tbl_politica as p, tblano as a where a.idAno=p.idAno and a.idAno=3;";

                              $select=mysql_query($sql);

                              while ($rs=mysql_fetch_array($select)) {
                           ?>
                          <li><a href="#"><?php echo ($rs['tituloPolitica']) ?></a>
                                <ul class="abrir">
                                  <li><div class="video">
                                    <img src="cms/<?php echo($rs['imagenPolitica']) ?>" alt="imagen <?php echo($rs['tituloPolitica']) ?>">
                                  </div></li>
                                </ul>
                          </li>
                          <?php
                            }
                           ?>






                        </ul>
                    </div>

                </div><!--FIM sTABELA CURIOSIDADES-->







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
