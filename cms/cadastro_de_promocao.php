<?php
require_once ('modulo.php'); //inclusao do arquivo na pagina atual

Conexao_database();


session_start();
$Descricao=null;
$DescricaoPromo=null;
$TituloPromocao=null;
$diretorio_completo=Null;
$diretorio_imagen=Null;
$MovUpload=false;
$imagem_file=Null;

$botao='Salvar Promocao';

if (isset($_POST['btnsalvar'])) {
  $Descricao=$_POST['txtDescricao'];
  $operacao=$_POST['btnsalvar'];
  $TituloPromocao=$_POST['txtTitulo'];

  echo $operacao;

  if (!empty($_FILES['flImagen']['name'])){
  echo("teste");
      $imagem_file = true;
      $diretorio_completo=salvarFoto($_FILES['flImagen'],'imagenPromocao');

      if ($diretorio_completo == "Erro") {

          echo "<script>
              alert('arquivo nao movido');
              window.history.go(-1);

              </script>";
            $MovUpload=false;
            //header("location:cadastrarCultura.php");
      }else{
            $MovUpload=true;
      }

  }else {
      $imagem_file = false;

  }

    if ($operacao=="Salvar Promocao") {

          $sql="insert into tbl_promocao (tituloPromocao,descricao,imagenPromocao)
                  values('".$TituloPromocao."','".$Descricao."','".$diretorio_completo."')";

                  mysql_query($sql);
                    echo $sql;
                  header("location:cadastro_de_promocao.php");

    }elseif ($operacao == "Salvar Edicao") {
      if ($imagem_file == true && $MovUpload==true) {
        $sql="update tbl_promocao set tituloPromocao='".$TituloPromocao."',descricao='".$Descricao."',imagenPromocao='".$diretorio_completo."' where idPromocao=".$_SESSION["id"];

      }else{
        $sql="update tbl_promocao set tituloPromocao='".$TituloPromocao."',descricao='".$Descricao."' where idPromocao=".$_SESSION["id"];

      }

      mysql_query($sql);
      echo $sql;
      header("location:cadastro_de_promocao.php");



  }
}




if (isset($_GET['modo'])) {
  $modo=$_GET['modo'];

  if ($modo == 'editarpromocao') {
    $_SESSION['id']=$_GET['pegarid'];

    $sql="select * from tbl_promocao where idPromocao=".$_SESSION['id'];

    $select=mysql_query($sql);

    $consulta=mysql_fetch_array($select);

    $Descricao=$consulta['descricao'];
    $diretorio_completo=$consulta['imagenPromocao'];

    $botao="Salvar Edicao";
    $TituloPromocao=$consulta['tituloPromocao'];
  }
}




 ?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CMS-FRAJOLA'S®</title>
    <link rel="stylesheet" href="css/style_home_cms.css">
    <link rel="stylesheet" href="css/styleAdmConteudos.css">

  </head>
  <body>
        <div class="principal">

          <div class="cabecalho">

            <div class="title">

              <p>Administrar conteudo/ Curiosidade</p>

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

              <form class="frmSair" action="home_cms.html" method="post">
                      <input class="botao" type="submit" name="btnsair" value="SAIR">
              </form>

            </div>

          </nav>

          <div class="conteudo_principal">
              <form class="frmPromocao" action="cadastro_de_promocao.php" method="post" enctype="multipart/form-data">
                <div class="cadastro_de_musica">
                  <div class="linha">
                    <div class="entrada_de_dados">
                        Foto da Promocao <span >*</span><br><input
                        <?php if (isset($_GET['modo'])) {

                            $modo=$_GET['modo'];

                            if ($modo == 'editarPromocao' ) {
                              echo "";
                            }
                            }else {
                              echo "required";
                          }

                        ?> class="dados_entrada" type="file" name="flImagen" maxLength='2000'>
                    </div>



                    <div class="entrada_de_dados">
                        Titulo Promocao<span >*</span><br><input required class="dados_entrada" type="text" name="txtTitulo" value="<?php echo ($TituloPromocao) ?>" >
                    </div>


                    <div class="entrada_de_dados">
                        Descricao Promocao <span >*</span><br><input required class="dados_entrada" type="text" name="txtDescricao" value="<?php echo ($Descricao) ?>" >
                    </div>


                        </div>

                        <div class="voltar">
                          <a href="Admin_produtos.php">
                            <img src="imagens/arrow-back-1-icon.png" alt="voltar" title="Voltar">
                          </a>
                        </div>

                        <div class="botoes">
                          <a href="cadastro_de_promocao.php">
                            <br>
                            <input   class="botao_novo" type="submit" name="btnsalvar" value="<?php echo ($botao) ?>">

                          </a>
                        </div>
                  </div>
                </div>
              </form>


          </div>

          <footer>
              <p>Site desenvolvido por: Antonio Willian</p>
          </footer>

        </div>
  </body>
</html>
