<?php
require_once ('modulo.php'); //inclusao do arquivo na pagina atual

Conexao_database(); // chama a funcao para conectar no banco de dados

if (isset($_POST['btnsalvar'])) {
  $Descricao=$_POST['txtDescricao'];


  $diretorio_imagen="imagensSlider/";//caminho

  $nome_do_arquivo= basename($_FILES['flImagen']['name']);

  //checando extensao

  if (strstr($nome_do_arquivo,'.jpg') || strstr($nome_do_arquivo,'.png') || strstr($nome_do_arquivo,'.jpeg')) {
    $diretorio_completo=$diretorio_imagen.$nome_do_arquivo;//caminho guardado na pasta
  //  echo $diretorio_completo;

    if (move_uploaded_file($_FILES ['flImagen']['tmp_name'],$diretorio_completo)) {
      $sql="insert into tbl_imagem (imagen,descricao,ativaImagen)
              values('".$diretorio_completo."','".$Descricao."',0)";

            mysqli_query($conexao,$sql);
            //echo $sql;
    }
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
              <form class="frmSlider" action="cadastrarImagens_slider.php" method="post" enctype="multipart/form-data">
                <div class="cadastro_de_musica">
                  <div class="linha">
                    <div class="entrada_de_dados">
                        Descricao  <span >*</span><br><input required class="dados_entrada" type="text" name="txtDescricao" value="">
                    </div>

                    <div class="entrada_de_dados">
                        Imagen <span >*</span><br><input required class="dados_entrada" type="file" name="flImagen" >
                    </div>



                        <div class="botoes">
                          <a href="cadastrarImagens_slider.php">
                            <br>
                            <input   class="botao_novo" type="submit" name="btnsalvar" value="Salvar Imagen">

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
