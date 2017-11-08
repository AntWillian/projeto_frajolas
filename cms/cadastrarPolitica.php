<?php
require_once ('modulo.php'); //inclusao do arquivo na pagina atual

Conexao_database(); // chama a funcao para conectar no banco de dados

session_start();
$TituloPolitica=Null;
$anos=Null;
$diretorio_completo=Null;
$diretorio_imagen=Null;
$botao="Salvar Politica";
$MovUpload=false;
$idAno=0;
$imagem_file=Null;

if (isset($_POST['btnsalvar'])) {
  $TituloPolitica=$_POST['txtTituloPolitica'];
  $anos=$_POST['slcanos'];
  $operacao=$_POST["btnsalvar"];
  // pegando a imagen de Politica

  if (!empty($_FILES['flImagen']['name'])){
    $imagem_file = true;
    $diretorio_completo=salvarFoto($_FILES['flImagen'],'imagenPolitica');

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

}else{
  $imagem_file = false;
}

if ($operacao == "Salvar Politica") {
  if ($imagem_file == true && $MovUpload==true) {
    $sql="insert into tbl_politica (idAno,tituloPolitica,imagenPolitica)
            values('".$anos."','".$TituloPolitica."','".$diretorio_completo."')";

          mysql_query($sql);
          //echo $sql;
          header("location:cadastrarPolitica.php");

  }
}elseif ($operacao == "Salvar Edicao") {
   if ($imagem_file == true && $MovUpload==true) {

       $sql = "update tbl_politica set idAno='".$anos."',tituloPolitica='".$TituloPolitica."',imagenPolitica='".$diretorio_completo."'
                where idPolitica=".$_SESSION["id"] ;

                mysql_query($sql);
                //echo $sql;
                header("location:cadastrarPolitica.php");
   }else{
     $sql = "update tbl_politica set idAno='".$anos."',tituloPolitica='".$TituloPolitica."''
              where idPolitica=".$_SESSION["id"] ;
   }


   mysql_query($sql);
   //echo $sql;
   header("location:cadastrarPolitica.php");


  }

}

if (isset($_GET['modo'])) {
    $modo=$_GET['modo'];

    if ($modo == 'editarPolitica') {
      $_SESSION['id']=$_GET['pegarid'];

      $sql="select p.idPolitica,p.tituloPolitica,p.imagenPolitica,
            a.ano, a.idAno from tbl_politica as p, tblano as a where
            a.idAno=p.idAno and p.idPolitica=".$_SESSION['id'];


      $select=mysql_query($sql);

      $consulta=mysql_fetch_array($select);

      $TituloPolitica=$consulta['tituloPolitica'];
      $anos=$consulta['ano'];
      $diretorio_completo=$consulta['imagenPolitica'];
      $botao="Salvar Edicao";
      $idAno=$consulta['idAno'];

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
              <form class="frmCultura" action="cadastrarPolitica.php" method="post" enctype="multipart/form-data">
                <div class="cadastro_de_musica">
                  <div class="linha">
                    <div class="entrada_de_dados">
                        Titulo Politica <span >*</span><br><input required class="dados_entrada" type="text" name="txtTituloPolitica" value="<?php echo($TituloPolitica) ?>"  maxLength='90'>
                    </div>

                    <div class="entrada_de_dados">
                        Foto Politica <span >*</span><br><input <?php if (isset($_GET['modo'])) {

                            $modo=$_GET['modo'];

                            if ($modo == 'editarCultura' ) {
                              echo "";
                            }
                            }else {
                              echo "required";
                          }

                        ?> class="dados_entrada" type="file" name="flImagen" >
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
                          //echo $sql;

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
                          <a href="cadastrarPolitica.php">
                            <br>
                            <input   class="botao_novo" type="submit" name="btnsalvar" value="<?php echo($botao) ?>">

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
