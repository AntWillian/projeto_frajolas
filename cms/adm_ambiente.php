<?php
require_once ('modulo.php'); //inclusao do arquivo na pagina atual

Conexao_database();

$modo=null;
if (isset($_GET['modo'])) {
  $modo=$_GET['modo'];
  $pegarid=$_GET["pegarid"];
}

if ($modo=="deletarAmbiente") {

  $sql="delete from tbl_ambiente where idAmbiente=".$pegarid;
  // mysqli_query($conexao,$sql);

  mysql_query($sql);
}


if ($modo=="ativar") {


  $sql="update tbl_ambiente set ativarAmbiente = '1' WHERE idAmbiente =".$pegarid;
  // mysqli_query($conexao,$sql);
  //echo $sql;

   mysql_query($sql);
   header("location:adm_ambiente.php");

}else if ($modo=="Desativar"){


  $sql="update tbl_ambiente set ativarAmbiente = '0' WHERE idAmbiente =".$pegarid;
  // mysqli_query($conexao,$sql);
  //echo $sql;

  mysql_query($sql);


  // Codigo de deletar dados das tabelas

  // ###### MUSICA ########
}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CMS-USUARIOs</title>
    <link rel="stylesheet" href="css/style_home_cms.css">
    <link rel="stylesheet" href="css/style_cadastro_usuario_cms.css">
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
      <div class="principal">

        <div class="cabecalho">

          <div class="title">

            <p>CMS-USUARIOS</p>

          </div>

          <div class="logo">
              <img src="imagens/worker-512.png" alt="administrador conteudos">
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

              <div class="legenda_ativa">
                <p>Adm Usuarios</p>
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
          <div class="conteudo_principal">

            <!-- TABELA Historia-->
                <div class="tabela_principal">
                    <div class="titulo_tabela">
                      <h1>Ambientes</h1>
                    </div>

                    <div class="conteudo_tabela_titulo_cabecalho">
                      <ul>
                        <li> <strong>Rua</strong></li>
                        <li><strong>Numero</strong></li>
                        <li><strong>Modo</strong></li>
                        <li><strong>Status</strong></li>
                      </ul>
                    </div>

                    <div class="tabela_conteudos">
                          <?php
                          $sql="select a.*,e.* from tbl_ambiente as a , tblestado as e where a.idEstado=e.idEstado order  by idAmbiente desc;";

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
                                  <li><?php echo ($rs['rua']) ?></li>
                                  <li><?php echo ($rs['numero']) ?></li>
                                  <li>
                                    <a class="ver" href="#" onclick="Modal(<?php echo ($rs['idAmbiente'])?>,'tbl_ambiente')">
                                        <img class="modo " src="imagens/Zoom-icon.png" alt="consultar" title="Visualizar registro">
                                    </a>

                                    <a onclick="return confirm('deseja excluir o registro?');" href="adm_ambiente.php?modo=deletarAmbiente&pegarid=<?php echo($rs['idAmbiente'])?> " >
                                        <img class="modo" src="imagens/delete-icon.png" alt="deletar" title="Deletar registro">
                                    </a>

                                    <a  href="cadastrar_ambiente.php?modo=editarAmbiente&pegarid=<?php echo($rs['idAmbiente'])?>">
                                        <img class="modo" src="imagens/editar.png" alt="editar" title="editar registro">
                                    </a>

                                  </li>

                                  <li id="status">
                                    <?php
                                          if ($rs['ativarAmbiente'] ==1) {

                                     ?>
                                      <!-- <button class=" btnativar" type="submit" name="btnAtivar"></button> -->
                                  <a  href="adm_ambiente.php?modo=Desativar&pegarid=<?php echo ($rs['idAmbiente']) ?>">
                                      <img class="modo" src="imagens/ligar.png" alt="ativar" title="desativar">
                                  </a>

                                  <?php
                                }else{
                                   ?>

                                   <!-- <button class=" btnDesligar" type="submit" name="btnAtivar"></button> -->

                                   <a  href="adm_ambiente.php?modo=ativar&pegarid=<?php echo ($rs['idAmbiente']) ?>">
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
                      <a href="cadastrar_ambiente.php">
                        <input   class="botao_novo" type="submit" name="btnNovoUser" value="Nova Historia">
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
