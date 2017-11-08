<?php
require_once ('modulo.php'); //inclusao do arquivo na pagina atual

Conexao_database();

$modo=null;
if (isset($_GET['modo'])) {
  $modo=$_GET['modo'];
  $pegarid=$_GET["pegarid"];

}

// ativar/desativar pizza na Home
if ($modo == "ativar") {
  // $pegarid=$_GET["pegarid"];

  $sql="update tbl_produto set ativarProduto = '1' where idProduto=".$pegarid;

   mysql_query($sql);

}else if($modo == "Desativar"){
  // $pegarid=$_GET["pegarid"];

  $sql="update tbl_produto set ativarProduto = '0' where idProduto=".$pegarid;

   mysql_query($sql);

   // ativar/desativar pizza Promocao
}elseif ($modo == "DesativarPromocao") {
  $sql="update tbl_produto set produtoEmPromocao = '0' where idProduto=".$pegarid;

  mysql_query($sql);

}elseif ($modo == "ativarPromocao") {
  $sql="update tbl_produto set produtoEmPromocao = '1' where idProduto=".$pegarid;
  mysql_query($sql);


// ativar/desativar pizza do mes
}elseif ($modo == 'DesativarPizzaMes') {
  $sql="update tbl_produto set pizzaDoMes = '0' where idProduto=".$pegarid.";";
  mysql_query($sql);

}elseif ($modo == 'ativarPizzaMes') {
  $sql="update tbl_produto set pizzaDoMes = '0'";
  mysql_query($sql);

  $sql="update tbl_produto set pizzaDoMes = '1' where idProduto=".$pegarid;
  mysql_query($sql);


}elseif ($modo == 'deletarProduto') {
  $sql="delete from tbl_produto where idProduto=".$pegarid;
  mysql_query($sql);
  header('location:Admin_produtos.php');
}elseif ($modo == 'deletarPromocao') {
  $sql="delete from tbl_promocao where idPromocao=".$pegarid;
  mysql_query($sql);
  header('location:Admin_produtos.php');
}

 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administrar Produtos</title>
    <link rel="stylesheet" href="css/style_home_cms.css">
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

              <p>Administrar conteudo</p>

            </div>

            <div class="logo">
              <img src="imagens/Icone_Materias.png" alt="administrador conteudos">
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

              <form class="frmSair" action="home_cms.php" method="post">
                      <input class="botao" type="submit" name="btnsair" value="SAIR">
              </form>

            </div>

          </nav>

        <div class="conteudo_principal">
          <!-- TABELA PRODUTOS-->
              <div class="tabela_principal_produtos">
                  <div class="titulo_tabela">
                    <h1>Produtos</h1>
                  </div>

                  <div class="conteudo_tabela_titulo_cabecalho">
                    <ul>
                      <li> <strong>Nome pizza</strong></li>
                      <li><strong>Preco</strong></li>
                      <li><strong>Modo</strong></li>
                      <li><strong>Status</strong></li>
                      <li><strong>Produto em promocao</strong></li>
                      <li><strong>Pizza do mes</strong></li>

                    </ul>
                  </div>

                  <div class="tabela_conteudos">
                        <?php
                        $sql="select * from tbl_produto order  by idProduto desc;";

                            // $select=mysqli_query($conexao,$sql);
                              //echo $sql;
                            $select=mysql_query($sql);


                            // while ($rs=mysqli_fetch_array($select,MYSQLI_BOTH)) {
                            $cont=0;
                             while ($rs=mysql_fetch_array($select)) {
                               if ($cont%2==0) {
                                 $cor='cor1';
                               }else {
                                 $cor='cor2';

                               }


                         ?>
                         <div class="conteudos_tabela_cabecalho <?php echo ($cor) ?>" >

                             <ul>
                                <li><?php echo ($rs['nomeProduto']) ?></li>
                                <li><?php echo ("R$ ".$rs['preco']) ?></li>
                                <li>
                                  <a class="ver" href="#" onclick="Modal(<?php echo ($rs['idProduto'])?>,'tbl_Produto')">
                                      <img class="modo " src="imagens/Zoom-icon.png" alt="consultar" title="Visualizar registro">
                                  </a>

                                  <a onclick="return confirm('deseja excluir o registro?');" href="Admin_produtos.php?modo=deletarProduto&pegarid=<?php echo($rs['idProduto'])?> " >
                                      <img class="modo" src="imagens/delete-icon.png" alt="deletar" title="Deletar registro">
                                  </a>

                                  <a  href="cadastrarProduto.php?modo=editarProduto&pegarid=<?php echo($rs['idProduto'])?>">
                                      <img class="modo" src="imagens/editar.png" alt="editar" title="editar registro">
                                  </a>

                                </li>

                                <li class="status">
                                  <?php
                                        if ($rs['ativarProduto'] ==1) {

                                   ?>
                                    <!-- <button class=" btnativar" type="submit" name="btnAtivar"></button> -->
                                <a  href="Admin_produtos.php?modo=Desativar&pegarid=<?php echo ($rs['idProduto']) ?>">
                                    <img class="modo" src="imagens/ligar.png" alt="ativar" title="desativar">
                                </a>

                                <?php
                              }else{
                                 ?>

                                 <!-- <button class=" btnDesligar" type="submit" name="btnAtivar"></button> -->

                                 <a  href="Admin_produtos.php?modo=ativar&pegarid=<?php echo ($rs['idProduto']) ?>">
                                     <img class="modo" src="imagens/desligar.png" alt="desativar" title="ativar">
                                 </a>

                                 <?php
                               }
                                  ?>

                                </li>


                                <!-- Produto em promocao -->

                                <li class="status">
                                  <?php
                                        if ($rs['produtoEmPromocao'] ==1) {

                                   ?>
                                <a  href="Admin_produtos.php?modo=DesativarPromocao&pegarid=<?php echo ($rs['idProduto']) ?>">
                                    <img class="modo" src="imagens/ligar.png" alt="ativar" title="desativar">
                                </a>

                                <?php
                              }else{
                                 ?>


                                 <a  href="Admin_produtos.php?modo=ativarPromocao&pegarid=<?php echo ($rs['idProduto']) ?>">
                                     <img class="modo" src="imagens/desligar.png" alt="desativar" title="ativar">
                                 </a>

                                 <?php
                               }
                                  ?>

                                </li>

                                <!-- Pizza do mes -->

                                <li class="status">
                                  <?php
                                        if ($rs['pizzaDoMes'] ==1) {

                                   ?>
                                <a  href="Admin_produtos.php?modo=DesativarPizzaMes&pegarid=<?php echo ($rs['idProduto']) ?>">
                                    <img class="modo" src="imagens/ligar.png" alt="ativar" title="desativar">
                                </a>

                                <?php
                              }else{
                                 ?>


                                 <a  href="Admin_produtos.php?modo=ativarPizzaMes&pegarid=<?php echo ($rs['idProduto']) ?>">
                                     <img class="modo" src="imagens/desligar.png" alt="desativar" title="ativar">
                                 </a>

                                 <?php
                               }
                                  ?>

                                </li>
                            </ul>
                          </div>

                        <?php
                        $cont=$cont+1;
                      }
                         ?>

                  </div>


                  <div class="botoes">
                    <a href="cadastrarCabecalho.php">
                      <input   class="botao_novo" type="submit" name="btnNovoUser" value="Nova Politica">
                    </a>
                  </div>

              </div>


          <!-- FIM NOVA TABELA -->

          <!-- TABELA CAbecalho-->
              <div class="tabela_principal">
                  <div class="titulo_tabela">
                    <h1>Promocoes</h1>
                  </div>

                  <div class="conteudo_tabela_titulo_cabecalho">
                    <ul>
                      <li><strong>Titulo Promocao</strong></li>
                      <li><strong>Modo</strong></li>
                      <li><strong>Status</strong></li>
                    </ul>
                  </div>

                  <div class="tabela_conteudos">
                        <?php
                        $sql="select * from tbl_promocao";
                            // $select=mysqli_query($conexao,$sql);
                              //echo $sql;

                            $select=mysql_query($sql);


                            // while ($rs=mysqli_fetch_array($select,MYSQLI_BOTH)) {
                            $cont=0;
                             while ($rs=mysql_fetch_array($select)) {
                               if ($cont%2==0) {
                                 $cor='cor1';
                               }else {
                                 $cor='cor2';

                               }


                         ?>
                         <div class="conteudos_tabela_cabecalho <?php echo ($cor) ?>" >

                             <ul>
                                <li><?php echo ($rs['tituloPromocao']) ?></li>
                                <li>
                                  <a class="ver" href="#" onclick="Modal(<?php echo ($rs['idPromocao'])?>,'tbl_promocao')">
                                      <img class="modo " src="imagens/Zoom-icon.png" alt="consultar" title="Visualizar registro">
                                  </a>

                                  <a onclick="return confirm('deseja excluir o registro?');" href="Admin_promocao.php?modo=deletarPromocao&pegarid=<?php echo($rs['idPromocao'])?> " >
                                      <img class="modo" src="imagens/delete-icon.png" alt="deletar" title="Deletar registro">
                                  </a>

                                  <a  href="cadastro_de_promocao.php?modo=editarpromocao&pegarid=<?php echo($rs['idPromocao'])?>">
                                      <img class="modo" src="imagens/editar.png" alt="editar" title="editar registro">
                                  </a>

                                </li>

                                <li id="status">
                                  <?php
                                        if ($rs['ativarPromocao'] ==1) {

                                   ?>
                                    <!-- <button class=" btnativar" type="submit" name="btnAtivar"></button> -->
                                <a  href="Admin_produtos.php?modo=DesativarPromocao&pegarid=<?php echo ($rs['idPromocao']) ?>">
                                    <img class="modo" src="imagens/ligar.png" alt="ativar" title="desativar">
                                </a>

                                <?php
                              }else{
                                 ?>

                               <a  href="Admin_produtos.php?modo=ativarPromocao&pegarid=<?php echo ($rs['idPromocao']) ?>">
                                     <img class="modo" src="imagens/desligar.png" alt="desativar" title="ativar">
                                 </a>

                                 <?php
                               }
                                  ?>

                                </li>
                            </ul>
                          </div>

                        <?php
                        $cont=$cont+1;
                      }
                         ?>

                  </div>


                  <div class="botoes">
                    <a href="cadastro_de_promocao.php">
                      <input   class="botao_novo" type="submit" name="btnNovoUser" value="Nova Promocao">
                    </a>
                  </div>

              </div>


          <!-- FIM NOVA TABELA -->

        </div>



          <footer>
              <p>Site desenvolvido por: Antonio Willian</p>
          </footer>

        </div>
  </body>
</html>
