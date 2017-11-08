<?php
require_once ('modulo.php'); //inclusao do arquivo na pagina atual

Conexao_database(); // chama a funcao para conectar no banco de dados

	$id = $_POST['id'];
	$tabela=$_POST['nomeTabela'];
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Modal</title>
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



    <div class="dados">

			<!-- Mostrar Regidtor tbl_musica -->
      <?php
			if ($tabela=='tbl_musica') {
				$sql="select m.idMusica,m.tituloMusica,m.linkVideoClip,a.ano from tbl_musica as m, tblano as a where a.idAno=m.idAno and m.idMusica=".$id;

				//	echo $sql;
						$select = mysql_query($sql);

				if($rs = mysql_fetch_array($select)){


			 ?>

			 <div class="dadosCultura">
						 <div class="titulo1">
								 <div class="titulo">
									 <h1> DADOS DO REGISTRO NUMERO <?php echo ($id) ?> </h1>
								 </div>
							 <div class="fechar">  <a href="#" ><p>x</p></a></div>

						 </div>

					 <div class="dadosGerais">
						 <div class="imagenDados">
								 <iframe  src="<?php echo ($rs['linkVideoClip']) ?>" allowfullscreen></iframe>

						 </div>

						 <div class="dados1">
								 <p>	Titulo: <?php echo $rs["tituloMusica"] ?></p>
						 </div>

						 <div class="dados1">
								 <p>	Ano: <?php echo $rs["ano"] ?></p>
						 </div>

					 </div>

			 </div>


				<?php
					}
				}elseif ($tabela=='tbl_cultura') {

					$sql="select c.idCultura,c.tituloCultura,c.imagenCultura,a.ano from tbl_cultura as c, tblano as a where a.idAno=c.idAno and c.idCultura=".$id;

					//	echo $sql;
							$select = mysql_query($sql);

					if($rs = mysql_fetch_array($select)){
			 	?>
				<div class="dadosCultura">
							<div class="titulo1">
									<div class="titulo">
										<h1> DADOS DO REGISTRO NUMERO <?php echo ($id) ?></h1>
									</div>
								<div class="fechar">  <a href="#" ><p>x</p></a></div>

							</div>

						<div class="dadosGerais">
							<div class="imagenDados">
									<img src="<?php echo $rs["imagenCultura"] ?>" alt="imagen">
							</div>

							<div class="dados1">
									<p>	Titulo: <?php echo $rs["tituloCultura"] ?></p>
							</div>

							<div class="dados1">
									<p>	Ano: <?php echo $rs["ano"] ?></p>
							</div>

						</div>

				</div>



				<?php
						}
					}elseif ($tabela=='tbl_cinema') {

						$sql="select c.idCinema,c.tituloFilme,c.linkTralheFilme,a.ano,a.idAno from tbl_cinema as c, tblano as a where a.idAno=c.idAno and c.idCinema=".$id;

						//	echo $sql;
								$select = mysql_query($sql);

						if($rs = mysql_fetch_array($select)){
				 	?>
					<div class="dadosCultura">
								<div class="titulo1">
										<div class="titulo">
											<h1> DADOS DO REGISTRO NUMERO <?php echo ($id) ?></h1>
										</div>
									<div class="fechar">  <a href="#" ><p>x</p></a></div>

								</div>

							<div class="dadosGerais">
								<div class="imagenDados">
									<iframe  src="<?php echo ($rs['linkTralheFilme']) ?>" allowfullscreen></iframe>
								</div>

								<div class="dados1">
										<p>	Titulo: <?php echo $rs["tituloFilme"] ?></p>
								</div>

								<div class="dados1">
										<p>	Ano: <?php echo $rs["ano"] ?></p>
								</div>

							</div>

					</div>

				<?php
			}
		}elseif ($tabela=='tbl_televisao') {

					$sql="select t.idTelevisao,t.tituloPrograma,t.imagenPrograma,a.ano
										from tbl_televisao as t, tblano as a where a.idAno=t.idAno and t.idTelevisao=".$id;

					    //echo $sql;
							$select = mysql_query($sql);

					if($rs = mysql_fetch_array($select)){
				 ?>

				 <div class="dadosCultura">
							 <div class="titulo1">
									 <div class="titulo">
										 <h1> DADOS DO REGISTRO NUMERO <?php echo ($id) ?></h1>
									 </div>
								 <div class="fechar">  <a href="#" ><p>x</p></a></div>

							 </div>

						 <div class="dadosGerais">
							 <div class="imagenDados">
								 <img src="<?php echo $rs["imagenPrograma"] ?>" alt="imagen">
							 </div>

							 <div class="dados1">
									 <p>	Titulo: <?php echo $rs["tituloPrograma"] ?></p>
							 </div>

							 <div class="dados1">
									 <p>	Ano: <?php echo $rs["ano"] ?></p>
							 </div>

						 </div>

				 </div>


				 <?php
			 }
		 }elseif ($tabela=='tbl_politica') {

			$sql="select p.idPolitica,p.tituloPolitica,p.imagenPolitica,a.ano from tbl_politica as p,
								tblano as a where a.idAno=p.idAno and idPolitica=".$id;


 					    //echo $sql;
 							$select = mysql_query($sql);

 					if($rs = mysql_fetch_array($select)){
 				 ?>

 				 <div class="dadosCultura">
 							 <div class="titulo1">
 									 <div class="titulo">
 										 <h1> DADOS DO REGISTRO NUMERO <?php echo ($id) ?></h1>
 									 </div>
 								 <div class="fechar">  <a href="#" ><p>x</p></a></div>

 							 </div>

 						 <div class="dadosGerais">
 							 <div class="imagenDados">
 								 <img src="<?php echo $rs["imagenPolitica"] ?>" alt="imagen">
 							 </div>

 							 <div class="dados1">
 									 <p>	Titulo: <?php echo $rs["tituloPolitica"] ?></p>
 							 </div>

 							 <div class="dados1">
 									 <p>	Ano: <?php echo $rs["ano"] ?></p>
 							 </div>

 						 </div>

 				 </div>

				 <?php
			 		}



				}elseif ($tabela=='tbl_curiosidade') {


					$sql="select c.idCuriosidade,c.ativar,c.tituloAno,c.descricaoAno,c.imagenCuriosidade,c.idAno,
										c.descricaoImagen,a.ano,a.idAno from tbl_curiosidade as c ,tblano
													as a where  a.idAno=c.idAno and idCuriosidade=".$id;


	  					    //echo $sql;
	  							$select = mysql_query($sql);

	  					if($rs = mysql_fetch_array($select)){
	  				 ?>

	  				 <div class="dadosCultura">
	  							 <div class="titulo1">
	  									 <div class="titulo">
	  										 <h1> DADOS DO REGISTRO NUMERO <?php echo ($id) ?></h1>
	  									 </div>
	  								 <div class="fechar">  <a href="#" ><p>x</p></a></div>

	  							 </div>

	  						 <div class="dadosGerais">
	  							 <div class="imagenDados">
	  								 <img src="<?php echo $rs["imagenCuriosidade"] ?>" alt="imagen">
	  							 </div>

	  							 <div class="dados1">
	  									 <p>	Titulo Principal : <?php echo $rs["tituloAno"] ?></p>
	  							 </div>

									 <div class="dados1">
											<p> Descricao principal : <?php echo $rs["descricaoAno"] ?></p>
									</div>

									<div class="dados1">
										 <p> Descricao imagen : <?php echo $rs["descricaoImagen"] ?></p>
								 </div>

	  							 <div class="dados1">
	  									 <p>	Ano: <?php echo $rs["ano"] ?></p>
	  							 </div>

	  						 </div>

	  				 </div>

	 				 <?php
	 			 		}
	 				}elseif ($tabela=='tbl_Produto') {


						$sql="select * from tbl_produto where idProduto=".$id;


		  					    //echo $sql;
		  							$select = mysql_query($sql);

		  					if($rs = mysql_fetch_array($select)){
		  				 ?>

		  				 <div class="dadosCultura">
		  							 <div class="titulo1">
		  									 <div class="titulo">
		  										 <h1> DADOS DO REGISTRO NUMERO <?php echo ($id) ?></h1>
		  									 </div>
		  								 <div class="fechar">  <a href="#" ><p>x</p></a></div>

		  							 </div>

		  						 <div class="dadosGerais">
		  							 <div class="imagenDados_produto">
		  								 <img class="img_produto" src="<?php echo $rs["imagen1"] ?>" alt="imagen"> <br>
											 <img class="img_produto" src="<?php echo $rs["imagen2"] ?>" alt="imagen"><br>
											 <img class="img_produto" src="<?php echo $rs["imagen3"] ?>" alt="imagen"><br>
											 <img class="img_produto" src="<?php echo $rs["imagen4"] ?>" alt="imagen">

		  							 </div>

		  							 <div class="dados1">
		  									 <p>	Nome do Produto : <?php echo $rs["nomeProduto"] ?></p>
		  							 </div>

										 <div class="dados1">
												<p> Descricao produto : <?php echo $rs["descricaoProduto"] ?></p>
										</div>


		  							 <div class="dados1">
		  									 <p>	Preco: <?php echo $rs["preco"] ?></p>
		  							 </div>

										 <div class="dados1">
		  									 <p>	Preco Promocional: <?php echo $rs["valorProdutoEmPromocao"] ?></p>
		  							 </div>

										 <div class="dados1">
		  									 <p>	Produto como Pizza do mes:
													 <?php if ($rs['pizzaDoMes'] == 1) {
		  									 	echo "Produto Ativo como pizza do mes";
												}else{
													echo "Produto não Ativo como pizza do mes";

												}

												?>

											</p>
		  							 </div>

										 <div class="dados1">
												<p>	Produto esta Ativo:
													<?php if ($rs['ativarProduto'] == 1) {
												 echo "Produto Ativo ";
											 }else{
												 echo "Produto não Ativo ";

											 }

											 ?>

										 </p>
										</div>

										<div class="dados1">
											 <p>	Produto em Promocao:
												 <?php if ($rs['produtoEmPromocao'] == 1) {
												echo "Sim";
											}else{
												echo "Não";

											}

											?>

										</p>
									 </div>

		  						 </div>

		  				 </div>

		 				 <?php
		 			 		}
		 				}elseif ($tabela=='tbl_User') {


							 $sql="select n.*, u.nomeuser,u.telefone,u.celular,u.dtNasc,
							 u.cpf,u.rg,u.email,u.sexo,u.foto,u.usuario,u.senha ,e.rua,e.cidade,
							 e.cep,es.nome,c.estadoCivil from tbl_nivel as n, tblcadastro_usuario as u,
							  tblendereco as e, tblestado as es,tblestado_civil as c where u.idendereco=e.idendereco
								and u.idestado=es.idestado and u.idestadocivil=c.idestadocivil and n.idNivel=u.idNivel and u.idusuario=".$id;


			  					  //echo $sql;
			  							$select = mysql_query($sql);

			  					if($rs = mysql_fetch_array($select)){
			  				 ?>

			  				 <div class="dadosCultura">
			  							 <div class="titulo1">
			  									 <div class="titulo">
			  										 <h1> DADOS DO REGISTRO NUMERO <?php echo ($id) ?></h1>
			  									 </div>
			  								 <div class="fechar">  <a href="#" ><p>x</p></a></div>

			  							 </div>

			  						 <div class="dadosGerais">
			  							 <div class="imagenDados">
			  								 <img src="<?php echo $rs["foto"] ?>" alt="imagen">
			  							 </div>

			  							 <div class="dados1">
												<p>nome : <?php echo ($rs['nomeuser']) ?> </p> <br>
												<p>telefone: <?php echo ($rs['telefone']) ?></p>  <br>
												<p>celular: <?php echo ($rs['celular']) ?></p>  <br>
												<p>email :<?php echo ($rs['email']) ?></p>  <br>
												<p>cpf: <?php echo ($rs['cpf']) ?></p>  <br>
												<p>dtNasc:  <?php echo ($rs['dtNasc']) ?></p> <br>
												<p>sexo: <?php echo ($rs['sexo']) ?></p>  <br>
												<p>estado civil : <?php echo ($rs['estadoCivil']) ?></p> <br>



												<p>rua :<?php echo ($rs['rua']) ?> </p><br>
												<p>cidade: <?php echo ($rs['cidade']) ?> </p><br>
												<p> estado :<?php echo ($rs['nome']) ?> </p><br>
												<p>cep: <?php echo ($rs['cep']) ?> </p><br>
												<p>usuario :<?php echo ($rs['usuario']) ?> </p><br>
												<p>senha: <?php echo ($rs['senha']) ?> </p><br>
												<p></p> nivel: <?php echo ($rs['nivel']) ?> <br>

			  							 </div>



			  						 </div>

			  				 </div>

			 				 <?php
			 			 		}
			 				}elseif ($tabela=='tbl_nivel') {


								$sql="select * from tbl_nivel where idNivel=".$id;


				  					    //echo $sql;
				  							$select = mysql_query($sql);

				  					if($rs = mysql_fetch_array($select)){
				  				 ?>

				  				 <div class="dadosCultura">
				  							 <div class="titulo1">
				  									 <div class="titulo">
				  										 <h1> DADOS DO REGISTRO NUMERO <?php echo ($id) ?></h1>
				  									 </div>
				  								 <div class="fechar">  <a href="#" ><p>x</p></a></div>

				  							 </div>

				  						 <div class="dadosGerais">

				  							 <div class="dados1">
				  									 <p>	Nome do nivel : <?php echo $rs["nivel"] ?></p>
				  							 </div>

												 <div class="dados1">
														<p> Descricao  : <?php echo $rs["descricao"] ?></p>
												</div>



				  						 </div>

				  				 </div>

				 				 <?php
				 			 		}
				 				}elseif ($tabela=='tbl_historia') {


									$sql="select * from tbl_historia where idHistoria=".$id;


					  					    //echo $sql;
					  							$select = mysql_query($sql);

					  					if($rs = mysql_fetch_array($select)){
					  				 ?>

					  				 <div class="dadosCultura">
					  							 <div class="titulo1">
					  									 <div class="titulo">
					  										 <h1> DADOS DO REGISTRO NUMERO <?php echo ($id) ?></h1>
					  									 </div>
					  								 <div class="fechar">  <a href="#" ><p>x</p></a></div>

					  							 </div>

					  						 <div class="dadosGerais">

					  							 <div class="dados2">
					  									 <p>	titulo 1 : <?php echo $rs["titulo1"] ?></p>
					  							 </div>

													 <div class="dados2">
															<p> paragrafo 1  : <?php echo $rs["paragrafoTitulo1"] ?></p>
													</div>

													<div class="dados2">
															<p>	titulo 2 : <?php echo $rs["titulo2"] ?></p>
													</div>

													<div class="dados2">
														 <p> paragrafo 2  : <?php echo $rs["paragrafoTitulo2"] ?></p>
												 </div>

												 <div class="dados2">
														<p> paragrafo 3  : <?php echo $rs["paragrafoTitulo3"] ?></p>
												</div>

												<div class="dados2">
													 <p> paragrafo 4  : <?php echo $rs["paragrafoTitulo4"] ?></p>
											 </div>



					  						 </div>

					  				 </div>

					 				 <?php
					 			 		}
					 				}elseif ($tabela=='tbl_ambiente') {


										$sql="select * from tbl_historia where idHistoria=".$id;
										$sql="select a.*,e.* from tbl_ambiente as a ,
										tblestado as e where a.idEstado=e.idEstado and idAmbiente= ".$id;



						  					    //echo $sql;
						  							$select = mysql_query($sql);

						  					if($rs = mysql_fetch_array($select)){
						  				 ?>

						  				 <div class="dadosCultura">
						  							 <div class="titulo1">
						  									 <div class="titulo">
						  										 <h1> DADOS DO REGISTRO NUMERO <?php echo ($id) ?></h1>
						  									 </div>
						  								 <div class="fechar">  <a href="#" ><p>x</p></a></div>

						  							 </div>

						  						 <div class="dadosGerais">

														 <p>Rua: <?php echo ($rs['rua']) ?></p>
				                     <p>numero : <?php echo ($rs['numero']) ?></p>
				                     <p>estado: <?php echo ($rs['nome']) ?></p>
				                     <p>bairro: <?php echo ($rs['bairro']) ?></p>
				                     <p>cidade: <?php echo ($rs['cidade']) ?></p>


						  						 </div>

						  				 </div>

						 				 <?php
						 			 		}
						 				}

									?>



    </div>
  </body>
</html>
