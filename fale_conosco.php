<?php
require_once ('cms/modulo.php'); //inclusao do arquivo na pagina atual

Conexao_database(); // chama a funcao para conectar no banco de dados


  if (isset($_POST["btOk"])) {
    $nome=$_POST["txtnome"];
    $telefone=$_POST["txttelefone"];
    $celular=$_POST["txtcelular"];
    $email=$_POST["txtEmail"];
    $profissao=$_POST["txtprofisao"];
    $sexo=$_POST["rdosexo"];
    $linkface=$_POST["txtlinkface"];
    $linkhome=$_POST["txtHP"];
    $txtSugestao=$_POST["txtSugestao"];
    $txtproduto=$_POST["txtproduto"];


    //Monta o Script para enviar para o BD
    $sql="insert into tblcomentario (nome,telefone,celular,email,profissao,sexo,linkFace,homePage,sugestao,informacaoProduto)
        values('".$nome."','".$telefone."','".$celular."','".$email."','".$profissao."',
               '".$sexo."','".$linkface."','".$linkhome."','".$txtSugestao."','".$txtproduto."')";


               //Executa o script no BD
          mysql_query($sql);
              //echo $sql;

  }

 ?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href='images/logoFrajola.png' rel='icon' type='image/x-icon'/>

    <title>Fale Conosco</title>
    <link rel="stylesheet" href="css/style_faleConosco.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

  </head>
  <body>




    <!--########################## MENU ########################################-->
    <?php
      include("menu.php");

    ?>





    <div id="principal">


        <?php
          include 'redes.php';
         ?>

            <!--################# Conteudo ##########################################-->
            <form class="frmFormulario" action="fale_conosco.php" method="post">



                <section id="conteudo_principal">
                  <div id="fale_conosco">
                    <div id="titulo_formulario">
                          <h1 id="titulo_formulario_principal">Mande a sua Sugestão, Critica ou Opinião</h1>

                    </div>

                    <div id="formulario">
                      <fieldset>
                        <legend>dados pessoais</legend>
                        <div class="entrada_de_dados">
                          <div class="imagen"><img src="images/user-icon.png" alt="nome"></div><input  placeholder="Nome" maxlength="100" required class="caixa_entarda"  type="text" name="txtnome" value="">
                        </div>
<br>
                        <div class="entrada_de_dados">
                            <div class="imagen"><img src="images/Phone-Alt-icon.png" alt="telefone"></div> <input class="caixa_entarda" maxlength="16" type="text" name="txttelefone" value="" placeholder="Telefone">

                        </div>
<br>
                        <div class="entrada_de_dados">
                          <div class="imagen"><img src="images/cellphone_79786.png" alt="celular"></div><input  placeholder="Celular" maxlength="16" required class="caixa_entarda"  type="text" name="txtcelular" value="">
                        </div>
<br>
                        <div class="entrada_de_dados">
                          <div class="imagen"><img src="images/email-icon.png" alt="email"></div><input  placeholder="E-mail" maxlength="100" required class="caixa_entarda"  type="text" name="txtEmail" value="">
                        </div>
<br>
                        <div class="entrada_de_dados">
                          <div class="imagen"><img src="images/female-male_icon-icons.com_58032.png" alt="sexo"></div>
                            <input class="sexo" type="radio" name="rdosexo" value="F">Feminino
                            <input  class="sexo" type="radio" name="rdosexo" value="M">Masculino
                        </div>
<br>
                        <div class="entrada_de_dados">
                          <div class="imagen"><img src="images/icon99-300x300.png" alt="profissao"></div><input  placeholder="Profissão" maxlength="100" required class="caixa_entarda"  type="text" name="txtprofisao" value=""><br><br>
                        </div>

                      </fieldset>

                      Home Page <br><input class="txtproduto" maxlength="100" type="url" name="txtHP" value=""><br><br>
                      Link Facebook <br><input class="caixa_entarda" maxlength="100" type="url" name="txtlinkface" value=""><br><br>
                      Sugestão/critica <br><textarea name="txtSugestao" maxlength="200" rows="8" cols="80"></textarea><br><br>
                      informaçaoes produtos <br><input class="txtproduto" maxlength="100" type="text" name="txtproduto" value=""><br><br>

                      <input  id="enviar_dados_formulario" type="submit" name="btOk" value="Enviar">

                    </div>

                  </div>

                </section>

            </form>
  <!--########################## rodape ########################################-->
          <?php
            include("rodape.php");

          ?>
      </div>


  </body>
</html>
