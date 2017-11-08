<?php
require_once ('modulo.php'); //inclusao do arquivo na pagina atual

Conexao_database(); // chama a funcao para conectar no banco de dados

session_start();
$Titulo1=Null;
$Titulo2=Null;
$Paragrafo1=Null;
$Paragrafo2=Null;
$Paragrafo3=Null;
$Paragrafo4=Null;
$botao="Salvar Historia";

if (isset($_GET['btnsalvar'])) {
  $Titulo1=$_GET['txtTitulo1'];
  $Titulo2=$_GET['txtTitulo2'];
  $Paragrafo1=$_GET['txtParagrafo1'];
  $Paragrafo2=$_GET['txtParagrafo2'];
  $Paragrafo3=$_GET['txtParagrafo3'];
  $Paragrafo4=$_GET['txtParagrafo4'];
  $operacao=$_GET['btnsalvar'];

  if ($operacao == "Salvar Historia") {
    $sql="insert into tbl_historia (titulo1,titulo2,paragrafoTitulo1,paragrafoTitulo2,paragrafoTitulo3,paragrafoTitulo4)
            values('".$Titulo1."','".$Titulo2."','".$Paragrafo1."','".$Paragrafo2."','".$Paragrafo3."','".$Paragrafo4."')";


  }elseif ($operacao=="Salvar Edicao") {
    $sql="update tbl_historia set titulo1='".$Titulo1."',titulo2='".$Titulo2."',paragrafoTitulo1='".$Paragrafo1."',
          paragrafoTitulo2='".$Paragrafo2."',paragrafoTitulo3='".$Paragrafo3."',paragrafoTitulo4='".$Paragrafo3."' where idHistoria=".$_SESSION["id"];



  }

  mysql_query($sql);
  echo $sql;
  header("location:cadastro_de_historia.php");

}

if (isset($_GET['modo'])) {



  $modo=$_GET['modo'];

  if ($modo == "editarHistoria") {


    $_SESSION['id']=$_GET['pegarid'];

    $sql="select * from tbl_historia where idHistoria=".$_SESSION['id'];
    echo $sql;
    $select=mysql_query($sql);

    $consulta=mysql_fetch_array($select);

    $Titulo1=$consulta['titulo1'];
    $Titulo2=$consulta['titulo2'];
    $Paragrafo1=$consulta['paragrafoTitulo1'];
    $Paragrafo2=$consulta['paragrafoTitulo2'];
    $Paragrafo3=$consulta['paragrafoTitulo3'];
    $Paragrafo4=$consulta['paragrafoTitulo4'];
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
              <form class="frmHistoria" action="cadastro_de_historia.php" method="get">
                <div class="cadastro_de_musica">
                  <div class="linha">
                    <div class="entrada_de_dados">
                        Titulo 1 <span >*</span><br><input required class="dados_entrada" type="text" name="txtTitulo1" value="<?php echo ($Titulo1) ?>" maxLength='90'>
                    </div>

                    <div class="entrada_de_dados">
                        Paragrafo titulo 1 <span >*</span><br><input required class="dados_entrada" type="text" name="txtParagrafo1" value="<?php echo ($Paragrafo1) ?>" maxLength='1000'>
                    </div>

                    <div class="entrada_de_dados">
                        Titulo 2 <span >*</span><br><input required class="dados_entrada" type="text" name="txtTitulo2" value="<?php echo ($Titulo2) ?>" maxLength='90'>
                    </div>

                    <div class="entrada_de_dados">
                        Paragrafo 1 titulo 2 <span >*</span><br><input required class="dados_entrada" type="text" name="txtParagrafo2" value="<?php echo ($Paragrafo2) ?>" maxLength='1000'>
                    </div>

                    <div class="entrada_de_dados">
                        Paragrafo 2 titulo 2 <span >*</span><br><input required class="dados_entrada" type="text" name="txtParagrafo3" value="<?php echo ($Paragrafo3) ?>" maxLength='1000'>
                    </div>

                    <div class="entrada_de_dados">
                        Paragrafo 3 titulo 2 <span >*</span><br><input required class="dados_entrada" type="text" name="txtParagrafo4" value="<?php echo ($Paragrafo4) ?>" maxLength='1000'>
                    </div>

                  </div>

                        <div class="voltar">
                          <a href="consultar_historia.php">
                            <img src="imagens/arrow-back-1-icon.png" alt="voltar" title="Voltar">
                          </a>
                        </div>

                        <div class="botoes">
                          <a href="cadastro_de_historia.php">
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
