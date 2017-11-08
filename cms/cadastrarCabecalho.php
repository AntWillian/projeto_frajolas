<?php
require_once ('modulo.php'); //inclusao do arquivo na pagina atual

Conexao_database(); // chama a funcao para conectar no banco de dados

session_start();
$TituloCabecalho=null;
$anos=null;
$descricaoFoto=null;
$descricaoAno=null;
$diretorio_completo=Null;
$diretorio_imagen=Null;
$MovUpload=false;
$idAno=0;
$imagem_file=Null;
$botao="Salvar Cabecalho";

if (isset($_POST['btnsalvar'])) {
  $TituloCabecalho=$_POST['txtTituloCabecalho'];
  $anos=$_POST['slcanos'];
  $descricaoFoto=$_POST['txtDescricaoFoto'];
  $descricaoAno=$_POST['txtDescricaoAno'];
  $operacao=$_POST['btnsalvar'];

  //var_dump($_FILES['flImagen']['name']);
  if (!empty($_FILES['flImagen']['name'])){
  //  echo "ta aqui xxxxxxxxxxxxxxxxxxxxxxx";
      $imagem_file = true;
      $diretorio_completo=salvarFoto($_FILES['flImagen'],'imagensCabecalho');

      if ($diretorio_completo == "Erro") {

          echo "<script>
              alert('arquivo nao movido');
              window.history.go(-1);

              </script>";

          //echo "erro na imagen";
            $MovUpload=false;
            //header("location:cadastrarCultura.php");
      }else{
            $MovUpload=true;
      }

  }else {
      $imagem_file = false;

  }


  if ($operacao == "Salvar Cabecalho") {
    if ($imagem_file == true && $MovUpload==true)
      {
        $sql="insert into tbl_curiosidade (idAno,tituloAno,descricaoAno,imagenCuriosidade,descricaoImagen)
                values('".$anos."','".$TituloCabecalho."','".$descricaoAno."','".$diretorio_completo."','".$descricaoFoto."')";

                mysql_query($sql);

                header("location:cadastrarCabecalho.php");
      }
    }elseif ($operacao=="Salvar Edicao") {


      if ($imagem_file == true && $MovUpload==true) {

        $sql="update tbl_curiosidade set idAno='".$anos."',tituloAno='".$TituloCabecalho."',descricaoAno='".$descricaoAno."',imagenCuriosidade='".$diretorio_completo."',descricaoImagen='".$descricaoFoto."' where idCuriosidade=".$_SESSION["id"];

      }else{

        $sql="update tbl_curiosidade set idAno='".$anos."',tituloAno='".$TituloCabecalho."',descricaoAno='".$descricaoAno."',descricaoImagen='".$descricaoFoto."' where idCuriosidade=".$_SESSION["id"];

      }
      //echo($sql);



  }

  mysql_query($sql);
   //echo $sql;
  header("location:cadastrarCultura.php");
}



if (isset($_GET['modo'])) {

    $modo=$_GET['modo'];

    if ($modo=='editarCabecalho') {
      $_SESSION['id']=$_GET['pegarid'];

      $sql="select c.idCuriosidade,c.ativar,c.idAno,c.tituloAno,
            c.descricaoAno,c.imagenCuriosidade, c.descricaoImagen,
                a.ano,a.idAno from tbl_curiosidade as c ,tblano as a
                where a.idAno=c.idAno  and c.idCuriosidade=".$_SESSION["id"];


      $select=mysql_query($sql);
        //echo $sql;
      $consulta=mysql_fetch_array($select);

      $TituloCabecalho=$consulta['tituloAno'];
      $anos=$consulta['ano'];
      $descricaoFoto=$consulta['descricaoImagen'];
      $descricaoAno=$consulta['descricaoAno'];
      $diretorio_completo=$consulta['imagenCuriosidade'];
      //$MovUpload=false;
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
              <form class="frmCultura" action="cadastrarCabecalho.php" method="post" enctype="multipart/form-data">
                <div class="cadastro_de_musica">
                  <div class="linha">
                    <div class="entrada_de_dados">
                        Titulo Cabecalho <span >*</span><br><input required class="dados_entrada" type="text" name="txtTituloCabecalho" value="<?php echo ($TituloCabecalho) ?>" maxLength='90'>
                    </div>

                    <div class="entrada_de_dados">
                        Foto cabecalho <span >*</span><br>
                        <input <?php if (isset($_GET['modo'])) {

                            $modo=$_GET['modo'];

                            if ($modo == 'editarCabecalho' ) {
                              echo "";
                            }
                            }else {
                              echo "required";
                          }

                        ?> class="dados_entrada" type="file" name="flImagen" >
                    </div>

                    <div class="entrada_de_dados">
                        Descricao Imagen <span >*</span><br><input required class="dados_entrada" type="text" name="txtDescricaoFoto" value="<?php echo ($descricaoFoto) ?>">
                    </div>

                    <div class="entrada_de_dados">
                      Descricao do Ano <span >*</span><br><textarea class="dados_entrada"   required name="txtDescricaoAno" rows="8" cols="80"><?php echo ($descricaoAno) ?></textarea>

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
                          <a href="cadastrarCabecalho.php">
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
