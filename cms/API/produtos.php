<?php
    require_once ('../modulo.php');

    Conexao_database();

    $sql="select TRUNCATE(SUM(a.avaliacao) / COUNT(a.idProduto), 2) as percentual,TRUNCATE(COUNT(a.idAvaliacao), 0) as total_pessoas,p.*,(p.preco-(p.percentualDesconto*preco)/100) as desconto,s.*,c.*,a.* from tbl_produto as p inner join tbl_subcategoria as s on p.idSubCategoria=s.idSubCategoria
                inner join tbl_categorias as c on c.idCategoria=s.idCategoria  inner join tbl_avaliacao as a on p.idProduto=a.idProduto  where  ativarProduto=1 group by a.idProduto order by RAND()    ;
                  ";



    $select=mysql_query($sql);

    $lstProdutos=array();

    while ($produtos = mysql_fetch_assoc($select)) {

        $lstProdutos[]=$produtos ;

    }
    //var_dump($lstProdutos);
    echo(json_encode($lstProdutos));


?>
