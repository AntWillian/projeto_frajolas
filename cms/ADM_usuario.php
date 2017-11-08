
<?php
require_once ('modulo.php'); //inclusao do arquivo na pagina atual

Conexao_database();

$modo=null;

if (isset($_GET['modo'])) {
  $modo=$_GET['modo'];
  $pegarid=$_GET["pegarid"];
}


// codigo de deletar Usuario
if ($modo == "deletarUsuario") {
  $sql="delete from tblcadastro_usuario where idusuario=".$pegarid;
  mysql_query($sql);
  header('location:ADM_usuario.php');
}elseif ($modo == "deletarNivel") {
  $sql="delete from tbl_nivel where idNivel=".$pegarid;
  mysql_query($sql);
  header('location:ADM_usuario.php');

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

            <!-- TABELA CULTURA-->
                <div class="tabela_principal">
                    <div class="titulo_tabela">
                      <h1>Usuario</h1>
                    </div>

                    <div class="conteudo_tabela_titulo">
                      <ul>
                        <li><strong>Nome</strong></li>
                        <li><strong>Usuario</strong></li>
                        <li><strong>senha</strong></li>
                        <li><strong>modo</strong></li>
                      </ul>
                    </div>

                    <div class="tabela_conteudos">
                          <?php
                                $sql="select * from tblcadastro_usuario order by idusuario desc";

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
                                 <li><?php echo ($rs['nomeuser']) ?></li>
                                 <li><?php echo ($rs['usuario']) ?></li>
                                 <li><?php echo ($rs['senha'])?></li>
                                  <li>
                                    <a class="ver" href="#" onclick="Modal(<?php echo ($rs['idusuario'])?>,'tbl_User')">
                                        <img class="modo " src="imagens/Zoom-icon.png" alt="consultar" title="Visualizar registro">
                                    </a>

                                      <a onclick="return confirm('deseja excluir o registro?');" href="ADM_usuario.php?modo=deletarUsuario&pegarid=<?php echo($rs['idusuario'])?> ">

                                        <img class="modo" src="imagens/delete-icon.png" alt="deletar" title="Deletar registro">
                                    </a>

                                    <a  href="cadastro_user.php?modo=editarUsuario&pegarid=<?php echo($rs['idusuario'])?>&pegaridEndereco=<?php echo($rs['idendereco'])?>">
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
                      <a href="cadastro_user.php">
                        <input   class="botao_novo" type="submit" name="btnNovoUser" value="Novo User">

                      </a>
                    </div>

                </div>


            <!-- FIM NOVA TABELA -->


            <!-- TABELA CULTURA-->
                <div class="tabela_principal">
                    <div class="titulo_tabela">
                      <h1>Niveis</h1>
                    </div>

                    <div class="conteudo_tabela_titulo">
                      <ul>
                        <li><strong>Nome</strong></li>
                        <li><strong>Modo</strong></li>


                      </ul>
                    </div>

                    <div class="tabela_conteudos">
                          <?php
                                $sql="select * from tbl_nivel order by idNivel desc";

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
                                 <li><?php echo ($rs['nivel']) ?></li>

                                  <li>

                                    <a class="ver" href="#" onclick="Modal(<?php echo ($rs['idNivel'])?>,'tbl_nivel')">
                                        <img class="modo " src="imagens/Zoom-icon.png" alt="consultar" title="Visualizar registro">
                                    </a>

                                      <a onclick="return confirm('deseja excluir o registro?');" href="ADM_usuario.php?modo=deletarNivel&pegarid=<?php echo($rs['idNivel'])?> ">

                                        <img class="modo" src="imagens/delete-icon.png" alt="deletar" title="Deletar registro">
                                    </a>

                                    <a  href="cadastro_de_nivel.php?modo=editarNivel&pegarid=<?php echo($rs['idNivel'])?>">
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
                      <a href="cadastro_de_nivel.php">
                        <input   class="botao_novo" type="submit" name="btnNovoUser" value="Novo Nivel">

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
