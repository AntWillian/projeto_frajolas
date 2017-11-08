<?php
require_once ('modulo.php'); //inclusao do arquivo na pagina atual

Conexao_database(); // chama a funcao para conectar no banco de dados

if (isset($_GET['pegarid'])) {
  $pegarid=$_GET['pegarid'];

  $sql="select n.*, u.nomeuser,u.telefone,u.celular,u.dtNasc,u.cpf,u.rg,u.email,u.sexo,u.foto,u.usuario,u.senha ,e.rua,e.cidade,e.cep,es.nome,c.estadoCivil
		from tbl_nivel as n, tblcadastro_usuario as u, tblendereco as e, tblestado as es,tblestado_civil
        as c where u.idendereco=e.idendereco and
		u.idestado=es.idestado and u.idestadocivil=c.idestadocivil n.idNivel=u.idNivel and u.idusuario=".$pegarid;

  $select=mysqli_query($conexao,$sql);

  //echo $sql;

}else {
  echo ("ID INVALIDO");
}



 ?>




<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CMS-ADM FALE CONOSCO</title>
    <link rel="stylesheet" href="css/style_home_cms.css">
      <link rel="stylesheet" href="css/style_faleconosco_cms.css">
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

          <div class="cabecalho">

            <div class="title">

              <p>CMS-ADM FALE CONOSCO</p>

            </div>

            <div class="logo">
                <img src="imagens/icon_faleconosco.png" alt="logo">
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

                <div class="legenda_ativa">
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
            <?php
            if ($rs=mysqli_fetch_array($select,MYSQLI_BOTH)) {


             ?>
            nome  <?php echo ($rs['nomeuser']) ?> <br>
            telefone <?php echo ($rs['telefone']) ?> <br>
            celular <?php echo ($rs['celular']) ?> <br>
            email <?php echo ($rs['email']) ?> <br>
            cpf <?php echo ($rs['cpf']) ?> <br>
            rg <?php echo ($rs['rg']) ?> <br>
            dtNasc  <?php echo ($rs['dtNasc']) ?><br>
            sexo <?php echo ($rs['sexo']) ?> <br>
            estado civil  <?php echo ($rs['estadoCivil']) ?><br>



            rua <?php echo ($rs['rua']) ?> <br>
            cidade <?php echo ($rs['cidade']) ?> <br>
            estado <?php echo ($rs['nome']) ?> <br>
            cep <?php echo ($rs['cep']) ?> <br>
            usuario <?php echo ($rs['usuario']) ?> <br>
            senha <?php echo ($rs['senha']) ?> <br>
            foto <img src="<?php echo ($rs['foto']) ?>" alt="foto usuario <?php echo ($rs['nomeuser']) ?>">  <br>




            <?php
          }
             ?>
          <footer>
              <p>Site desenvolvido por: Antonio Willian</p>
          </footer>

        </div>
  </body>
</html>
