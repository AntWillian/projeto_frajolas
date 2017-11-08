<?php
require_once ('modulo.php'); //inclusao do arquivo na pagina atual

Conexao_database(); // chama a funcao para conectar no banco de dados

session_start();
$TituloCinema=Null;
$tralher=Null;
$anos=Null;
$idAno=0;
$botao="Salvar Cinema";

if (isset($_GET['btnsalvar'])) {
  $TituloCinema=$_GET['txtTituloCinema'];
  $tralher=$_GET['txtTralher'];
  $anos=$_GET['slcanos'];
  $operacao=$_GET['btnsalvar'];

  if ($operacao == "Salvar Cinema") {
    $sql="insert into tbl_cinema (idAno,tituloFilme,linkTralheFilme)
            values('".$anos."','".$TituloCinema."','".$tralher."')";


  }elseif ($operacao=="Salvar Edicao") {
    $sql="update tbl_cinema set idAno='".$anos."',tituloFilme='".$TituloCinema."',linkTralheFilme='".$tralher."' where idCinema=".$_SESSION["id"];

  }

  mysql_query($sql);
  //echo $sql;
  header("location:cadastrarCinema.php");

}

if (isset($_GET['modo'])) {



  $modo=$_GET['modo'];

  if ($modo == "editarCinema") {

    echo "entrou no editar";

    $_SESSION['id']=$_GET['pegarid'];

    $sql="select c.idCinema,c.tituloFilme,c.linkTralheFilme,a.ano,a.idAno from tbl_cinema as c, tblano as a where a.idAno=c.idAno and c.idCinema=".$_SESSION['id'];

    $select=mysql_query($sql);

    $consulta=mysql_fetch_array($select);

    $TituloCinema=$consulta['tituloFilme'];
    $tralher=$consulta['linkTralheFilme'];
    $anos=$consulta['ano'];
    $botao='Salvar Edicao';
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
              <form class="frmCinema" action="cadastrarCinema.php" method="get">
                <div class="cadastro_de_musica">
                  <div class="linha">
                    <div class="entrada_de_dados">
                        Titulo Filme <span >*</span><br><input required class="dados_entrada" type="text" name="txtTituloCinema" value="<?php echo ($TituloCinema) ?>">
                    </div>

                    <div class="entrada_de_dados">
                        link Do Tralher/link comporativo <span >*</span><br><input required class="dados_entrada" type="text" name="txtTralher" value="<?php echo ($TituloCinema) ?>" placeholder="Link corporativo do youtube">
                    </div>

                    <div class="entrada_de_dados">
                        Ano<span >*</span><br>
                        <select class="dados_combo" name="slcanos">

                          <?php
                            if ($anos!=''){
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
                          $sql='select * from tblano where idAno <> '.$idAno;

                          $select = mysql_query( $sql);

                          while($rs = mysql_fetch_array($select )){
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
                          <a href="cadastrarCinema.php">
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
