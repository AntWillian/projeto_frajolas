<?php
require_once ('modulo.php'); //inclusao do arquivo na pagina atual

Conexao_database(); // chama a funcao para conectar no banco de dados

session_start();
$TituloPrograma=Null;
$anos=Null;
$diretorio_completo=Null;
$MovUpload=false;
$idAno=0;
$imagem_file=Null;
$diretorio_imagen=Null;
$botao="Salvar Televisao";


if (isset($_POST['btnsalvar'])) {
  $TituloPrograma=$_POST['txtTituloPrograma'];
  $anos=$_POST['slcanos'];
  $operacao=$_POST['btnsalvar'];


  // chamando funçao de imagenCultura
  if (!empty($_FILES['flImagen']['name'])){
    $imagem_file = true;
    $diretorio_completo=salvarFoto($_FILES['flImagen'],'imagensTelevisao');

    if ($diretorio_completo == "Erro") {
      echo "<script>
          alert('arquivo nao movido');
          window.history.go(-1);

          </script>";
        $MovUpload=false;
    }else{
          $MovUpload=true;
    }

  }else {
      $imagem_file = false;

  }
  // ################### Cadastro #####################
      if ($operacao == "Salvar Televisao") {
        $sql="insert into tbl_televisao (idAno,tituloPrograma,imagenPrograma)
                values('".$anos."','".$TituloPrograma."','".$diretorio_completo."')";

              mysql_query($sql);
              //echo $sql;
              header("location:cadastrarTelevisao.php");

      // ################### Atualizaçao #####################

    }elseif ($operacao == "Salvar Edicao") {
        if ($imagem_file == true && $MovUpload==true) {
          $sql="update  tbl_televisao set idAno='".$anos."',tituloPrograma='".$TituloPrograma."',imagenPrograma='".$diretorio_completo."'
                    where idTelevisao=".$_SESSION['id'];
        }else{
          $sql="update  tbl_televisao set idAno='".$anos."',tituloPrograma='".$TituloPrograma."'
                    where idTelevisao=".$_SESSION['id'];
        }

        mysql_query($sql);
        //echo $sql;
        header("location:cadastrarTelevisao.php");

  }
}

if (isset($_GET['modo'])) {
  $modo=$_GET['modo'];

  if ($modo == 'editarTelevisao') {
    $_SESSION['id']=$_GET['pegarid'];

    $sql="select a.idAno,t.idTelevisao,t.tituloPrograma,t.imagenPrograma,a.ano
              from tbl_televisao as t, tblano as a where a.idAno=t.idAno
                and t.idTelevisao=".$_SESSION['id'];

    $select=mysql_query($sql);

    $consulta=mysql_fetch_array($select);

    $TituloPrograma=$consulta['tituloPrograma'];
    $anos=$consulta['ano'];
    $diretorio_completo=$consulta['imagenPrograma'];
    $idAno=$consulta['idAno'];
    $botao="Salvar Edicao";

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
              <form class="frmTelevisao" action="cadastrarTelevisao.php" method="post" enctype="multipart/form-data">
                <div class="cadastro_de_musica">
                  <div class="linha">
                    <div class="entrada_de_dados">
                        Titulo Programa <span >*</span><br><input required class="dados_entrada" type="text" name="txtTituloPrograma" value="<?php echo ($TituloPrograma) ?>" maxLength='90'>
                    </div>

                    <div class="entrada_de_dados">
                        Foto Programa <span >*</span><br><input

                        <?php if (isset($_GET['modo'])) {

                            $modo=$_GET['modo'];

                            if ($modo == 'editarCultura' ) {
                              echo "";
                            }
                            }else {
                              echo "required";
                          }

                        ?>

                         class="dados_entrada" type="file" name="flImagen" maxLength='2000' >
                    </div>

                    <div class="entrada_de_dados">
                        Ano<span >*</span><br>
                        <select class="dados_combo" name="slcanos">

                          <?php
                            if ($anos!='')
                            {
                              ?>
                                <option value="<?php echo($idAno) ?>" checked> <?php echo($anos) ?> </option>
                              <?php
                            }else {
                              ?>
                                <option value="" checked> selecione um Item </option>
                              <?php
                            }

                          ?>

                          <?php
                          $sql='select * from tblano where idAno <>'.$idAno;

                          $select = mysql_query($sql);

                          while($rs = mysql_fetch_array($select)){
                           ?>
                           <option value='<?php echo $rs['idAno'] ?>'> <?php echo $rs['ano'] ?></option>

                           <?php
                            }
                            ?>
                          </select>
                        </div>

                        <div class="voltar">
                          <a href="consultarCuriosidades.php">
                            <img src="imagens/arrow-back-1-icon.png" alt="voltar" title="Voltar">
                          </a>
                        </div>

                        <div class="botoes">
                          <a href="cadastrarTelevisao.php">
                            <br>
                            <input   class="botao_novo" type="submit" name="btnsalvar" value="<?php echo ($botao) ?>">

                          </a>
                        </div>
                  </div>

                  <div class="imagenEdit">
                    <img src="<?php echo($diretorio_completo) ?>" alt="">
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
