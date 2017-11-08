<?php

require_once ('modulo.php'); //inclusao do arquivo na pagina atual

Conexao_database(); // chama a funcao para conectar no banco de dados

session_start();
$senha=Null;
$usuaio=Null;
$cep=Null;
$estado=Null;
$cidade=Null;
$rua=Null;
$estadocivil=Null;
$sexo=Null;
$email=Null;
$rg=Null;
$cpf=Null;
$dtNasc=Null;
$celular=Null;
$telefone=Null;
$nome=Null;
$nivel=Null;

$idNivel=0;
$idestadocivil=0;
$diretorio_completo=Null;
$botao="Salvar Usuario";
$diretorio_imagen=Null;
$MovUpload=false;
$imagem_file=Null;

if (isset($_POST["btnsalvar"])) {



  $senha=$_POST["txtsenha"];
  $usuaio=$_POST["txtusuaio"];
  $cep=$_POST["txtcep"];
  $estado=$_POST["slcestado"];
  $cidade=$_POST["txtcidade"];
  $rua=$_POST["txtrua"];
  $estadocivil=$_POST["slcestadocivil"];
  $sexo=$_POST["rdosexo"];
  $email=$_POST["txtemail"];
  $rg=$_POST["txtrg"];
  $cpf=$_POST["txtcpf"];
  $dtNasc=$_POST["txtdtNasc"];
  $celular=$_POST["txtcelular"];
  $telefone=$_POST["txttelefone"];
  $nome=$_POST["txtnome"];
  $nivel=$_POST["slcNivel"];
  $operacao=$_POST["btnsalvar"];
  //pegando a foto

    if (!empty($_FILES['flImagen']['name'])) {

      $imagem_file = true;
      $diretorio_completo=salvarFoto($_FILES['flImagen'],'imagensUser');

      if ($diretorio_completo == "Erro") {

          echo "<script>
              alert('arquivo nao movido');
              window.history.go(-1);

              </script>";
            $MovUpload=false;
      }else {
        $MovUpload=true;
      }
    }else {
      $imagem_file = false;
    }

    if ($operacao == "Salvar Usuario") {

        //montando insert da primeira tabela endereco
        $sql="insert into tblendereco(rua,cidade,cep) values('".$rua."','".$cidade."','".$cep."') ";
        mysql_query($sql);

        echo $sql;
        $sql="select idendereco from tblendereco order by idendereco desc limit 1;";
        $select=mysql_query($sql);
      //echo $sql;
        if ($rs=mysql_fetch_array($select)) {
          $rs=$rs['idendereco'];

        }
        $sql="insert into tblcadastro_usuario(nomeuser,telefone,celular,dtNasc,cpf,rg,email,idestado,idendereco,sexo,foto,usuario,senha,idestadocivil,idNivel)
              values('".$nome."','".$telefone."','".$celular."','".$dtNasc."',
              '".$cpf."','".$rg."','".$email."','".$estado."','".$rs."','".$sexo."',
              '".$diretorio_completo."','".$usuaio."','".$senha."','".$estadocivil."','".$nivel."')";


            mysql_query($sql);
            echo $sql;
            header("location:cadastro_user.php");

    }elseif ($operacao == "Salvar Edicao") {
      if ($imagem_file == true && $MovUpload==true) {
        $sql="update tblendereco set rua='".$rua."',cidade='".$cidade."',cep='".$cep."' where idendereco=".$_SESSION['idendereco'];

        $sql="select idendereco from tblendereco order by idendereco desc limit 1;";
        $select=mysql_query($sql);
      //echo $sql;
        if ($rs=mysql_fetch_array($select)) {
          $rs=$rs['idendereco'];

        }
        $sql="update set tblcadastro_usuario nomeuser='".$nome."',telefone='".$telefone."',celular='".$celular."',
                  dtNasc='".$dtNasc."',cpf='".$cpf."',rg='".$rg."',email='".$email."',idestado='".$estado."',idendereco='".$rs."',sexo='".$sexo."',foto='".$diretorio_completo."',
                      usuario='".$usuaio."',senha='".$senha."',idestadocivil='".$estadocivil."',idNivel='".$nivel."' where idusuario=".$_SESSION['id'];


      }else {
        $sql="update tblendereco set rua='".$rua."',cidade='".$cidade."',cep='".$cep."' where idendereco=".$_SESSION['idendereco'];

        $sql="select idendereco from tblendereco order by idendereco desc limit 1;";
        $select=mysql_query($sql);
      //echo $sql;
        if ($rs=mysql_fetch_array($select)) {
          $rs=$rs['idendereco'];

        }
        $sql="update tblcadastro_usuario set nomeuser='".$nome."',telefone='".$telefone."',celular='".$celular."',
                  dtNasc='".$dtNasc."',cpf='".$cpf."',rg='".$rg."',email='".$email."',idestado='".$estado."',idendereco='".$rs."',sexo='".$sexo."',
                      usuario='".$usuaio."',senha='".$senha."',idestadocivil='".$estadocivil."',idNivel='".$nivel."' where idusuario=".$_SESSION['id'];


      }
      mysql_query($sql);
     header("location:cadastro_user.php");
      echo $sql;

    }
}

if (isset($_GET['modo'])) {
  $modo=$_GET['modo'];

  if ($modo == 'editarUsuario') {
    $_SESSION['id']=$_GET['pegarid'];
    $_SESSION['idendereco']=$_GET['pegaridEndereco'];



      $sql='select u.* , e.* from tblcadastro_usuario as u , tblendereco as e where u.idendereco=e.idendereco and idusuario='.$_SESSION['id'];

      $select=mysql_query($sql);

      $consulta=mysql_fetch_array($select);

      $senha=$consulta['senha'];
      $usuaio=$consulta['usuario'];
      $cep=$consulta['cep'];
      $estado=$consulta['idestado'];
      $cidade=$consulta['cidade'];
      $rua=$consulta['rua'];
      $estadocivil=$consulta['idestadocivil'];
      $sexo=$consulta['sexo'];
      $email=$consulta['email'];
      $rg=$consulta['rg'];
      $cpf=$consulta['cpf'];
      $dtNasc=$consulta['dtNasc'];
      $celular=$consulta['celular'];
      $telefone=$consulta['telefone'];
      $nome=$consulta['nomeuser'];
      $nivel=$consulta['idNivel'];
      $diretorio_completo=$consulta['foto'];

      $botao="Salvar Edicao";


      $idNivel=0;
      $idestadocivil=0;


  }
}


 ?>




<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CMS-USUARIOs</title>
    <link rel="stylesheet" href="css/style_home_cms.css">
    <link rel="stylesheet" href="css/style_cadastro_usuario_cms.css">
  </head>
  <body>
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

            <form class="frmSair" action="home_cms.html" method="post">
                    <input class="botao" type="submit" name="btnsair" value="SAIR">
            </form>

          </div>

        </nav>
          <div class="conteudo_principal">
              <form class="frmcadastro" action="cadastro_user.php" method="post" enctype="multipart/form-data">
                <div class="titulo_form">
                  <h1>Cadastro de Usuarios</h1>
                </div>

                <div class="formulario_de_cadastro">
                <fieldset>
                  <legend>Dados do Usuario</legend>

                  <div class="linha">
                    <div class="entrada_de_dados">
                        Nome <span >*</span><br><input required class="dados_entrada" type="text" name="txtnome" value="<?php echo($nome) ?>">
                    </div>

                    <div class="entrada_de_dados">
                        Telefone <span >*</span><br><input required class="dados_entrada" type="text" name="txttelefone" value="<?php echo($telefone) ?>">
                    </div>

                    <div class="entrada_de_dados">
                        Celular <span >*</span><br><input required class="dados_entrada" type="text" name="txtcelular" value="<?php echo($celular) ?>">
                    </div>

                    <div class="entrada_de_dados">
                        Data de Nascimento <span >*</span><br><input required class="dados_entrada" type="text" name="txtdtNasc" value="<?php echo($dtNasc) ?>">
                    </div>
                  </div>

                  <div class="linha">
                    <div class="entrada_de_dados">
                        CPF <span >*</span><br><input required class="dados_entrada" type="text" name="txtcpf" value="<?php echo($cpf) ?>">
                    </div>

                    <div class="entrada_de_dados">
                        RG <span >*</span><br><input required class="dados_entrada" type="text" name="txtrg" value="<?php echo($rg) ?>">
                    </div>

                    <div class="entrada_de_dados">
                        E-mail <span >*</span><br><input required class="dados_entrada" type="text" name="txtemail" value="<?php echo($email) ?>">
                    </div>

                    <div class="entrada_de_dados">
                        Sexo <span >*</span> <br>

                        <?php
                        $masculino=Null;
                        $feminino=Null;
                            if ($sexo == "M") {
                              $masculino = "checked";
                              echo ($sexo);
                            }elseif ($sexo == "F") {
                              $feminino = "checked";
                              echo ($sexo);
                            }
                         ?>
                      <input <?php echo($masculino) ?> class="sexo" type="radio" name="rdosexo" value="F">Feminino
                      <input <?php echo($feminino) ?> class="sexo" type="radio" name="rdosexo" value="M">Masculino
                    </div>


                  </div>
                  <div class="linha">
                    <div class="entrada_de_dados3">
                        Estado Civil<span >*</span><br>
                        <select class="dados_combo" name="slcestadocivil">

                          <?php
                          $sql='select * from tblestado_civil;';
                          echo $sql;

                          $select = mysql_query($sql);

                          while($rs = mysql_fetch_array($select)){
                           ?>
                           <option value='<?php echo $rs['idestadocivil'] ?>'> <?php echo $rs['estadoCivil'] ?></option>

                           <?php
                            }
                            ?>
                          </select>
                        </div>


                        <div class="entrada_de_dados3">
                            Nivel <span >*</span><br>
                            <select class="dados_combo" name="slcNivel">

                              <?php
                              $sql='select * from tbl_nivel;';
                              echo $sql;

                              $select = mysql_query($sql);

                              while($rs = mysql_fetch_array($select)){
                               ?>
                               <option value='<?php echo $rs['idNivel'] ?>'> <?php echo $rs['nivel'] ?></option>

                               <?php
                                }
                                ?>
                              </select>
                            </div>

                  </div>

                </fieldset>


                <fieldset >
                  <legend>Localizaçao</legend>

                  <div class="linha1">
                    <div class="entrada_de_dados">
                        Rua <span >*</span><br><input required class="dados_entrada" type="text" name="txtrua" value="<?php echo($rua) ?>">
                    </div>

                    <div class="entrada_de_dados">
                        cidade <span >*</span><br><input required class="dados_entrada" type="text" name="txtcidade" value="<?php echo($cidade) ?>">
                    </div>



                    <div class="entrada_de_dados3">
                        Estado <span >*</span><br>
                        <select class="dados_combo" name="slcestado">

                          <?php
                          $sql='select * from tblestado;';
                          echo $sql;

                          $select = mysql_query($sql);

                          while($rs = mysql_fetch_array($select)){
                           ?>
                           <option value='<?php echo $rs['idestado'] ?>'> <?php echo $rs['sigla'] ?></option>

                           <?php
                            }
                            ?>
                          </select>
                        </div>

                        <div class="entrada_de_dados">
                            CEP <span >*</span><br><input required class="dados_entrada" type="text" name="txtcep" value="<?php echo($cep) ?>">
                        </div>


                  </div>
                </fieldset>


                  <div class="dadosUser">
                      <fieldset>
                        <legend>Dados de Entrada</legend>

                        <input  class="enviarfoto" type="file" name="flImagen" >


                        <div class="entrada_de_dados">
                            Usuario <span >*</span><br><input required class="dados_entrada" type="text" name="txtusuaio" value="<?php echo($usuaio) ?>">
                        </div>

                        <div class="entrada_de_dados">
                            Senha <span >*</span><br><input required class="dados_entrada" type="text" name="txtsenha" value="<?php echo($senha) ?>">
                        </div>
                      </fieldset>

                  </div>

                  <div class="voltar">
                    <a href="ADM_usuario.php">
                      <img src="imagens/arrow-back-1-icon.png" alt="voltar" title="Voltar">
                    </a>
                  </div>
                  <div class="botoes">
                    <a href="cadastro_user.php">
                      <br>
                      <input   class="botao_novo" type="submit" name="btnsalvar" value="<?php echo($botao) ?>">

                    </a>
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
