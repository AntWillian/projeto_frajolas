<?php
require_once ('cms/modulo.php'); //inclusao do arquivo na pagina atual

Conexao_database();

    $id = $_POST['id'];

    $sql="insert into tbl_click set idProduto='".$id."',click=1,data=CURRENT_TIMESTAMP()";

    mysql_query($sql);

 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Produto</title>
    <link rel="stylesheet" href="css/styleProduto.css" type="text/css">


  </head>

  <script>
  $(document).ready(function() {

      $(".fechar").click(function() {
        //$(".modalContainer").fadeOut();
      $(".modalContainer").slideToggle(1000);
      });
      });
  </script>

  <body>
    <div class="fechar">  <a href="#" ><p>x</p></a></div>

    <?php
    $sql="select TRUNCATE(SUM(a.avaliacao) / COUNT(a.idProduto), 2) as percentual,TRUNCATE(COUNT(a.idAvaliacao), 0) as total_pessoas,p.*,TRUNCATE((p.preco-(p.percentualDesconto*preco)/100),2) as desconto,s.*,c.*,a.* from tbl_produto as p inner join tbl_subcategoria as s on p.idSubCategoria=s.idSubCategoria
                inner join tbl_categorias as c on c.idCategoria=s.idCategoria  inner join tbl_avaliacao as a on p.idProduto=a.idProduto  where  a.idProduto=".$id;


                $select = mysql_query($sql);

    				if($rs = mysql_fetch_array($select)){

     ?>
     <div class="dadosCultura">
           <div class="titulo1">
               <div class="titulo">
                 <h1><?php echo ($rs['nomeProduto']) ?></h1>
               </div>

           </div>

         <div class="dadosGerais">
           <div class="imagenDados_produto">
             <div class="img_produto">
               <img  src="cms/<?php echo $rs["imagen1"] ?>" alt="imagen"> <br>
             </div>

             <div class="img_produto">
               <img  src="cms/<?php echo $rs["imagen2"] ?>" alt="imagen"><br>
             </div>

             <div class="img_produto">
               <img src="cms/<?php echo $rs["imagen3"] ?>" alt="imagen"><br>
             </div>

             <div class="img_produto">
               <img src="cms/<?php echo $rs["imagen4"] ?>" alt="imagen">
             </div>


           </div>

           <div class="dados1">
               <p>	Nome do Produto : <?php echo $rs["nomeProduto"] ?></p>
           </div>

           <div class="dados1">
              <p> Descricao produto : <?php echo $rs["descricaoProduto"] ?></p>
          </div>

          <div class="preco">
              <span class="valor_preco">Por: <strong>
                <?php
                if ($rs['produtoEmPromocao'] == 1) {
                    echo ("R$ ".$rs['desconto']." - ".$rs['percentualDesconto'])."%";
              }else {

                echo ("R$ ".$rs['preco']);

              }
              ?> </strong></span>
          </div>
        </div>

     <?php
          }
      ?>


  </body>
</html>
