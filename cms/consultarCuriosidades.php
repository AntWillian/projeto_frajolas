<?php
require_once ('modulo.php'); //inclusao do arquivo na pagina atual

Conexao_database(); // chama a funcao para conectar no banco de dados


$modo=null;
if (isset($_GET['modo'])) {
  $modo=$_GET['modo'];
  $pegarid=$_GET["pegarid"];
}

if ($modo=="ativar") {


  $sql="UPDATE tbl_curiosidade SET ativar = '1' WHERE idCuriosidade =".$pegarid;
  // mysqli_query($conexao,$sql);
  //echo $sql;

   mysql_query($sql);

}else if ($modo=="Desativar"){


  $sql="UPDATE tbl_curiosidade SET ativar = '0' WHERE idCuriosidade =".$pegarid;
  // mysqli_query($conexao,$sql);
  //echo $sql;

  mysql_query($sql);


  // Codigo de deletar dados das tabelas

  // ###### MUSICA ########
}elseif ($modo=="deletarMusica") {

  $sql="delete from tbl_musica where idMusica=".$pegarid;
  // mysqli_query($conexao,$sql);

  mysql_query($sql);


// ###### CULTURA ########

}elseif ($modo=="deletarCultura") {
  $pegarid=$_GET["pegaridC"];
  $sql="delete from tbl_cultura where idCultura=".$pegarid;
  // mysqli_query($conexao,$sql);
  //echo $sql;

  mysql_query($sql);

  header("location:consultarCuriosidades.php");


// ###### CINEMA ########

}elseif ($modo=="deletarCinema") {

  $sql="delete from tbl_cinema where idCinema=".$pegarid;
  // mysqli_query($conexao,$sql);

  mysql_query($sql);
  header("location:consultarCuriosidades.php");


// ###### TELEVISAO ########

}elseif ($modo=="deletarTelevisao") {

  $sql="delete from tbl_televisao where idTelevisao=".$pegarid;
  // mysqli_query($conexao,$sql);

  mysql_query($sql);
  header("location:consultarCuriosidades.php");


// ###### POLITICA ########

}elseif ($modo=="deletarPolitica") {

  $sql="delete from tbl_politica where idPolitica=".$pegarid;
  // mysqli_query($conexao,$sql);

  mysql_query($sql);
  header("location:consultarCuriosidades.php");


// ###### CABECALHO ########

}elseif ($modo=="deletarCabecalho") {
  $sql="delete from tbl_curiosidade where idCuriosidade=".$pegarid;
  // mysqli_query($conexao,$sql);

  mysql_query($sql);
  header("location:consultarCuriosidades.php");


}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CMS-FRAJOLA'S®</title>
    <link rel="stylesheet" href="css/style_home_cms.css">
    <link rel="stylesheet" href="css/styleAdmConteudos.css">
    <script type="text/javascript" src="js/jquery.js"></script>

    <script>
    $(document).ready(function() {

        $(".ver").click(function() {
          $(".modalContainer").slideToggle(1000);
        //slideToggle
        //toggle
        //FadeIn
        });
        });


        function Modal(idIten,tabela){
          $.ajax({
            type: "POST",
            url: "modal.php",
            data: {id:idIten, nomeTabela:tabela},
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

              <form class="frmSair" action="home_cms.php" method="post">
                      <input class="botao" type="submit" name="btnsair" value="SAIR">
              </form>

            </div>

          </nav>

          <div class="conteudo_principal_curiosidade">
                <!-- TESTE NOVA TABELA MUSICA -->
                    <div class="tabela_principal">
                        <div class="titulo_tabela">
                          <h1>Musica</h1>
                        </div>

                        <div class="conteudo_tabela_titulo">
                          <ul>
                            <li> <strong>Musica</strong></li>
                            <li><strong>Ano</strong></li>
                            <li><strong>Modo</strong></li>
                          </ul>
                        </div>

                        <div class="tabela_conteudos">
                              <?php
                                $sql="select m.idMusica,m.tituloMusica,m.linkVideoClip,a.ano from tbl_musica as m, tblano as a where a.idAno=m.idAno order by idMusica desc";

                                  // $select=mysqli_query($conexao,$sql);

                                  $select=mysql_query($sql);


                                  // while ($rs=mysqli_fetch_array($select,MYSQLI_BOTH)) {
                                  $cont=0;
                                   while ($rs=mysql_fetch_array($select)) {
                                     if ($cont%2==0) {
                                       $cor='cor1';
                                     }else {
                                       $cor='cor2';

                                     }


                               ?>
                               <div class="conteudos_tabela <?php echo ($cor) ?>" >

                                   <ul>
                                      <li><?php echo ($rs['tituloMusica']) ?></li>
                                      <li><?php echo ($rs['ano']) ?></li>
                                      <li>
                                        <a class="ver" href="#" onclick="Modal(<?php echo ($rs['idMusica'])?>,'tbl_musica')">
                                            <img class="modo " src="imagens/Zoom-icon.png" alt="consultar" title="Visualizar registro">
                                        </a>

                                        <a onclick="return confirm('deseja excluir o registro?');" href="consultarCuriosidades.php?modo=deletarMusica&pegarid=<?php echo($rs['idMusica'])?>">
                                            <img class="modo" src="imagens/delete-icon.png" alt="deletar" title="Deletar registro" >
                                        </a>

                                        <a  href="cadastrarMusica.php?modo=editarMusica&pegarid=<?php echo($rs['idMusica'])?>">
                                            <img class="modo" src="imagens/editar.png" alt="editar" title="editar registro">
                                        </a>

                                      </li>
                                  </ul>
                                </div>

                              <?php
                              $cont=$cont+1;
                            }
                               ?>

                        </div>


                             <div class="botoes">
                               <a href="cadastrarMusica.php">
                                 <input   class="botao_novo" type="submit" name="btnNovoUser" value="Nova musica">

                               </a>
                             </div>

                    </div>


                <!-- FIM NOVA TABELA -->

                <!-- TABELA CULTURA-->
                    <div class="tabela_principal">
                        <div class="titulo_tabela">
                          <h1>Cultura</h1>
                        </div>

                        <div class="conteudo_tabela_titulo">
                          <ul>
                            <li> <strong>Cultura</strong></li>
                            <li><strong>Ano</strong></li>
                            <li><strong>Modo</strong></li>
                          </ul>
                        </div>

                        <div class="tabela_conteudos">
                              <?php
                                  $sql="select c.idCultura,c.tituloCultura,c.imagenCultura,a.ano,a.idAno from tbl_cultura as c, tblano as a where a.idAno=c.idAno order by idCultura desc;";

                                  // $select=mysqli_query($conexao,$sql);

                                  $select=mysql_query($sql);


                                  // while ($rs=mysqli_fetch_array($select,MYSQLI_BOTH)) {
                                  $cont=0;
                                   while ($rs=mysql_fetch_array($select)) {
                                     if ($cont%2==0) {
                                       $cor='cor1';
                                     }else {
                                       $cor='cor2';

                                     }


                               ?>
                               <div class="conteudos_tabela <?php echo ($cor) ?>" >

                                   <ul>
                                      <li><?php echo ($rs['tituloCultura']) ?></li>
                                      <li><?php echo ($rs['ano']) ?></li>
                                      <li>
                                        <a class="ver" href="#" onclick="Modal(<?php echo ($rs['idCultura'])?>,'tbl_cultura')">
                                            <img class="modo " src="imagens/Zoom-icon.png" alt="consultar" title="Visualizar registro">
                                        </a>

                                        <a onclick="return confirm('deseja excluir o registro?');" href="consultarCuriosidades.php?modo=deletarCultura&pegaridC=<?php echo($rs['idCultura'])?> " >
                                            <img class="modo" src="imagens/delete-icon.png" alt="deletar" title="Deletar registro">
                                        </a>

                                        <a  href="cadastrarCultura.php?modo=editarCultura&pegarid=<?php echo($rs['idCultura'])?>">
                                            <img class="modo" src="imagens/editar.png" alt="editar" title="editar registro">
                                        </a>

                                      </li>
                                  </ul>
                                </div>

                              <?php
                              $cont=$cont+1;
                            }
                               ?>

                        </div>


                        <div class="botoes">
                          <a href="cadastrarCultura.php">
                            <input   class="botao_novo" type="submit" name="btnNovoUser" value="Nova cultura">

                          </a>
                        </div>

                    </div>


                <!-- FIM NOVA TABELA -->

                <!-- TABELA CINEMA-->
                    <div class="tabela_principal">
                        <div class="titulo_tabela">
                          <h1>Cinema</h1>
                        </div>

                        <div class="conteudo_tabela_titulo">
                          <ul>
                            <li> <strong>Cinema</strong></li>
                            <li><strong>Ano</strong></li>
                            <li><strong>Modo</strong></li>
                          </ul>
                        </div>

                        <div class="tabela_conteudos">
                              <?php
                              $sql="select c.idCinema,c.tituloFilme,c.linkTralheFilme,a.ano,a.idAno from tbl_cinema as c, tblano as a where a.idAno=c.idAno order by idCinema desc;";

                                  // $select=mysqli_query($conexao,$sql);

                                  $select=mysql_query($sql);


                                  // while ($rs=mysqli_fetch_array($select,MYSQLI_BOTH)) {
                                  $cont=0;
                                   while ($rs=mysql_fetch_array($select)) {
                                     if ($cont%2==0) {
                                       $cor='cor1';
                                     }else {
                                       $cor='cor2';

                                     }


                               ?>
                               <div class="conteudos_tabela <?php echo ($cor) ?>" >

                                   <ul>
                                      <li><?php echo ($rs['tituloFilme']) ?></li>
                                      <li><?php echo ($rs['ano']) ?></li>
                                      <li>
                                        <a class="ver" href="#" onclick="Modal(<?php echo ($rs['idCinema'])?>,'tbl_cinema')">
                                            <img class="modo " src="imagens/Zoom-icon.png" alt="consultar" title="Visualizar registro">
                                        </a>

                                        <a onclick="return confirm('deseja excluir o registro?');" href="consultarCuriosidades.php?modo=deletarCinema&pegarid=<?php echo($rs['idCinema'])?> " >
                                            <img class="modo" src="imagens/delete-icon.png" alt="deletar" title="Deletar registro">
                                        </a>

                                        <a  href="cadastrarCinema.php?modo=editarCinema&pegarid=<?php echo($rs['idCinema'])?>">
                                            <img class="modo" src="imagens/editar.png" alt="editar" title="editar registro">
                                        </a>

                                      </li>
                                  </ul>
                                </div>

                              <?php
                              $cont=$cont+1;
                            }
                               ?>

                        </div>


                        <div class="botoes">
                          <a href="cadastrarCinema.php">
                            <input   class="botao_novo" type="submit" name="btnNovoUser" value="Novo Cinema">

                          </a>
                        </div>

                    </div>


                <!-- FIM NOVA TABELA -->


                <!-- TABELA Televisao-->
                    <div class="tabela_principal">
                        <div class="titulo_tabela">
                          <h1>Televisao</h1>
                        </div>

                        <div class="conteudo_tabela_titulo">
                          <ul>
                            <li> <strong>Televisao</strong></li>
                            <li><strong>Ano</strong></li>
                            <li><strong>Modo</strong></li>
                          </ul>
                        </div>

                        <div class="tabela_conteudos">
                              <?php
                              $sql="select t.idTelevisao,t.tituloPrograma,t.imagenPrograma,a.ano from tbl_televisao as t, tblano as a where a.idAno=t.idAno order by idTelevisao desc;";

                                  // $select=mysqli_query($conexao,$sql);

                                  $select=mysql_query($sql);


                                  // while ($rs=mysqli_fetch_array($select,MYSQLI_BOTH)) {
                                  $cont=0;
                                   while ($rs=mysql_fetch_array($select)) {
                                     if ($cont%2==0) {
                                       $cor='cor1';
                                     }else {
                                       $cor='cor2';

                                     }


                               ?>
                               <div class="conteudos_tabela <?php echo ($cor) ?>" >

                                   <ul>
                                      <li><?php echo ($rs['tituloPrograma']) ?></li>
                                      <li><?php echo ($rs['ano']) ?></li>
                                      <li>
                                        <a class="ver" href="#" onclick="Modal(<?php echo ($rs['idTelevisao'])?>,'tbl_televisao')">
                                            <img class="modo " src="imagens/Zoom-icon.png" alt="consultar" title="Visualizar registro">
                                        </a>

                                        <a onclick="return confirm('deseja excluir o registro?');" href="consultarCuriosidades.php?modo=deletarTelevisao&pegarid=<?php echo($rs['idTelevisao'])?> " >
                                            <img class="modo" src="imagens/delete-icon.png" alt="deletar" title="Deletar registro">
                                        </a>

                                        <a  href="cadastrarTelevisao.php?modo=editarTelevisao&pegarid=<?php echo($rs['idTelevisao'])?>">
                                            <img class="modo" src="imagens/editar.png" alt="editar" title="editar registro">
                                        </a>

                                      </li>
                                  </ul>
                                </div>

                              <?php
                              $cont=$cont+1;
                            }
                               ?>

                        </div>


                        <div class="botoes">
                          <a href="cadastrarTelevisao.php">
                            <input   class="botao_novo" type="submit" name="btnNovoUser" value="Nova Televisao">
                          </a>
                        </div>

                    </div>


                <!-- FIM NOVA TABELA -->


                <!-- TABELA POLITICA-->
                    <div class="tabela_principal">
                        <div class="titulo_tabela">
                          <h1>Politica</h1>
                        </div>

                        <div class="conteudo_tabela_titulo">
                          <ul>
                            <li> <strong>Politica</strong></li>
                            <li><strong>Ano</strong></li>
                            <li><strong>Modo</strong></li>
                          </ul>
                        </div>

                        <div class="tabela_conteudos">
                              <?php
                              $sql="select p.idPolitica,p.tituloPolitica,p.imagenPolitica,a.ano from tbl_politica as p, tblano as a where a.idAno=p.idAno order by idPolitica desc;";

                                  // $select=mysqli_query($conexao,$sql);

                                  $select=mysql_query($sql);


                                  // while ($rs=mysqli_fetch_array($select,MYSQLI_BOTH)) {
                                  $cont=0;
                                   while ($rs=mysql_fetch_array($select)) {
                                     if ($cont%2==0) {
                                       $cor='cor1';
                                     }else {
                                       $cor='cor2';

                                     }


                               ?>
                               <div class="conteudos_tabela <?php echo ($cor) ?>" >

                                   <ul>
                                      <li><?php echo ($rs['tituloPolitica']) ?></li>
                                      <li><?php echo ($rs['ano']) ?></li>
                                      <li>
                                        <a class="ver" href="#" onclick="Modal(<?php echo ($rs['idPolitica'])?>,'tbl_politica')">
                                            <img class="modo " src="imagens/Zoom-icon.png" alt="consultar" title="Visualizar registro">
                                        </a>

                                        <a onclick="return confirm('deseja excluir o registro?');" href="consultarCuriosidades.php?modo=deletarPolitica&pegarid=<?php echo($rs['idPolitica'])?> " >
                                            <img class="modo" src="imagens/delete-icon.png" alt="deletar" title="Deletar registro">
                                        </a>

                                        <a  href="cadastrarPolitica.php?modo=editarPolitica&pegarid=<?php echo($rs['idPolitica'])?>">
                                            <img class="modo" src="imagens/editar.png" alt="editar" title="editar registro">
                                        </a>

                                      </li>
                                  </ul>
                                </div>

                              <?php
                              $cont=$cont+1;
                            }
                               ?>

                        </div>


                        <div class="botoes">
                          <a href="cadastrarPolitica.php">
                            <input   class="botao_novo" type="submit" name="btnNovoUser" value="Nova Politica">
                          </a>
                        </div>

                    </div>


                <!-- FIM NOVA TABELA -->


                <!-- TABELA CAbecalho-->
                    <div class="tabela_principal">
                        <div class="titulo_tabela">
                          <h1>Cabecalho Anos</h1>
                        </div>

                        <div class="conteudo_tabela_titulo_cabecalho">
                          <ul>
                            <li> <strong>Cabecalho Anos</strong></li>
                            <li><strong>Ano</strong></li>
                            <li><strong>Modo</strong></li>
                            <li><strong>Status</strong></li>
                          </ul>
                        </div>

                        <div class="tabela_conteudos">
                              <?php
                              $sql="select c.idCuriosidade,c.ativar,c.tituloAno,c.descricaoAno,c.imagenCuriosidade,c.idAno,
                                        c.descricaoImagen,a.ano,a.idAno from tbl_curiosidade as c ,tblano
                                              as a where  a.idAno=c.idAno order  by idCuriosidade desc;";

                                  // $select=mysqli_query($conexao,$sql);
                                    //echo $sql;
                                  $select=mysql_query($sql);


                                  // while ($rs=mysqli_fetch_array($select,MYSQLI_BOTH)) {
                                  $cont=0;
                                   while ($rs=mysql_fetch_array($select)) {
                                     if ($cont%2==0) {
                                       $cor='cor1';
                                     }else {
                                       $cor='cor2';

                                     }


                               ?>
                               <div class="conteudos_tabela_cabecalho <?php echo ($cor) ?>" >

                                   <ul>
                                      <li><?php echo ($rs['tituloAno']) ?></li>
                                      <li><?php echo ($rs['ano']) ?></li>
                                      <li>
                                        <a class="ver" href="#" onclick="Modal(<?php echo ($rs['idCuriosidade'])?>,'tbl_curiosidade')">
                                            <img class="modo " src="imagens/Zoom-icon.png" alt="consultar" title="Visualizar registro">
                                        </a>

                                        <a onclick="return confirm('deseja excluir o registro?');" href="consultarCuriosidades.php?modo=deletarCabecalho&pegarid=<?php echo($rs['idCuriosidade'])?> " >
                                            <img class="modo" src="imagens/delete-icon.png" alt="deletar" title="Deletar registro">
                                        </a>

                                        <a  href="cadastrarCabecalho.php?modo=editarCabecalho&pegarid=<?php echo($rs['idCuriosidade'])?>">
                                            <img class="modo" src="imagens/editar.png" alt="editar" title="editar registro">
                                        </a>

                                      </li>

                                      <li id="status">
                                        <?php
                                              if ($rs['ativar'] ==1) {

                                         ?>
                                          <!-- <button class=" btnativar" type="submit" name="btnAtivar"></button> -->
                                      <a  href="consultarCuriosidades.php?modo=Desativar&pegarid=<?php echo ($rs['idCuriosidade']) ?>">
                                          <img class="modo" src="imagens/ligar.png" alt="ativar" title="desativar">
                                      </a>

                                      <?php
                                    }else{
                                       ?>

                                       <!-- <button class=" btnDesligar" type="submit" name="btnAtivar"></button> -->

                                       <a  href="consultarCuriosidades.php?modo=ativar&pegarid=<?php echo ($rs['idCuriosidade']) ?>">
                                           <img class="modo" src="imagens/desligar.png" alt="desativar" title="ativar">
                                       </a>

                                       <?php
                                     }
                                        ?>

                                      </li>
                                  </ul>
                                </div>

                              <?php
                              $cont=$cont+1;
                            }
                               ?>

                        </div>


                        <div class="botoes">
                          <a href="cadastrarCabecalho.php">
                            <input   class="botao_novo" type="submit" name="btnNovoUser" value="Nova Politica">
                          </a>
                        </div>

                    </div>


                <!-- FIM NOVA TABELA -->





          </div>

          <footer>
              <p>Site desenvolvido por: Antonio Willian</p>
          </footer>

        </div>
  </body>
</html>
