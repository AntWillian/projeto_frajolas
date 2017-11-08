-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: dbpizzaria
-- ------------------------------------------------------
-- Server version	5.0.67-community-nt

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Not dumping tablespaces as no INFORMATION_SCHEMA.FILES table on this server
--

--
-- Table structure for table `tbl_ambiente`
--

DROP TABLE IF EXISTS `tbl_ambiente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_ambiente` (
  `idAmbiente` int(11) NOT NULL auto_increment,
  `idEstado` int(11) default NULL,
  `rua` varchar(45) default NULL,
  `numero` varchar(45) default NULL,
  `ativarAmbiente` tinyint(4) default NULL,
  `bairro` varchar(45) default NULL,
  `cidade` varchar(45) default NULL,
  PRIMARY KEY  (`idAmbiente`),
  KEY `fk_estadoAmbiente_idx` (`idEstado`),
  CONSTRAINT `fk_estadoAmbiente` FOREIGN KEY (`idEstado`) REFERENCES `tblestado` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ambiente`
--

LOCK TABLES `tbl_ambiente` WRITE;
/*!40000 ALTER TABLE `tbl_ambiente` DISABLE KEYS */;
INSERT INTO `tbl_ambiente` VALUES (1,45,'testte','22',1,'teste','teste'),(2,46,'wwww','www',0,'teste','teste'),(3,32,'teste','teste',1,'teste','estado'),(5,53,'morreu','666',1,'jd morte certa','carapicuiba');
/*!40000 ALTER TABLE `tbl_ambiente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_anbientes`
--

DROP TABLE IF EXISTS `tbl_anbientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_anbientes` (
  `idAnbientes` int(11) NOT NULL auto_increment,
  `idEndereco` int(11) default NULL,
  `idEstado` int(11) default NULL,
  PRIMARY KEY  (`idAnbientes`),
  KEY `fk_ambiente_pr_endereco_idx` (`idEndereco`),
  KEY `fk_ambiente_pr_estado_idx` (`idEstado`),
  CONSTRAINT `fk_ambiente_pr_endereco` FOREIGN KEY (`idEndereco`) REFERENCES `tblendereco` (`idendereco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ambiente_pr_estado` FOREIGN KEY (`idEstado`) REFERENCES `tblestado` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_anbientes`
--

LOCK TABLES `tbl_anbientes` WRITE;
/*!40000 ALTER TABLE `tbl_anbientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_anbientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cinema`
--

DROP TABLE IF EXISTS `tbl_cinema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_cinema` (
  `idCinema` int(11) NOT NULL auto_increment,
  `idAno` int(11) default NULL,
  `tituloFilme` varchar(45) default NULL,
  `linkTralheFilme` varchar(45) default NULL,
  PRIMARY KEY  (`idCinema`),
  KEY `fk_cinema_pr_ano_idx` (`idAno`),
  CONSTRAINT `fk_cinema_pr_ano` FOREIGN KEY (`idAno`) REFERENCES `tblano` (`idAno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cinema`
--

LOCK TABLES `tbl_cinema` WRITE;
/*!40000 ALTER TABLE `tbl_cinema` DISABLE KEYS */;
INSERT INTO `tbl_cinema` VALUES (1,2,'teste de Insert','https://www.youtube.com/embed/Q0CbN8sfihY'),(2,2,'teste de funcoes','https://www.youtube.com/embed/cl-IgBOUcEc'),(3,1,'marcel 22222','https://www.youtube.com/embed/hGi9drk_RI4');
/*!40000 ALTER TABLE `tbl_cinema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cultura`
--

DROP TABLE IF EXISTS `tbl_cultura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_cultura` (
  `idCultura` int(11) NOT NULL auto_increment,
  `idAno` int(11) default NULL,
  `tituloCultura` varchar(45) default NULL,
  `imagenCultura` varchar(45) default NULL,
  PRIMARY KEY  (`idCultura`),
  KEY `fk_cultura_pr_ano_idx` (`idAno`),
  CONSTRAINT `fk_cultura_pr_ano` FOREIGN KEY (`idAno`) REFERENCES `tblano` (`idAno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cultura`
--

LOCK TABLES `tbl_cultura` WRITE;
/*!40000 ALTER TABLE `tbl_cultura` DISABLE KEYS */;
INSERT INTO `tbl_cultura` VALUES (1,2,'teste modal ','imagenCuriosidades/1.2.jpg'),(2,2,'Novo teste ','imagenCuriosidades/4.jpg'),(3,2,'teste 1 ','imagenCuriosidades/anterior.png'),(4,1,'gttttt=====  ','imagenCuriosidades/logoFrajola.png'),(5,3,'teste  ','imagenCuriosidades/7.png'),(6,1,'teste marcel','imagenCuriosidades/images.jpg');
/*!40000 ALTER TABLE `tbl_cultura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_curiosidade`
--

DROP TABLE IF EXISTS `tbl_curiosidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_curiosidade` (
  `idCuriosidade` int(11) NOT NULL auto_increment,
  `idAno` int(11) default NULL,
  `descricaoAno` varchar(3000) default NULL,
  `imagenCuriosidade` varchar(1000) default NULL,
  `descricaoImagen` varchar(45) default NULL,
  `ativar` tinyint(4) default NULL,
  `tituloAno` varchar(45) default NULL,
  PRIMARY KEY  (`idCuriosidade`),
  KEY `fk_curiosidade_pr_ano_idx` (`idAno`),
  CONSTRAINT `fk_curiosidade_pr_ano` FOREIGN KEY (`idAno`) REFERENCES `tblano` (`idAno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_curiosidade`
--

LOCK TABLES `tbl_curiosidade` WRITE;
/*!40000 ALTER TABLE `tbl_curiosidade` DISABLE KEYS */;
INSERT INTO `tbl_curiosidade` VALUES (2,1,'teste 2','imagensCabecalho/carpe-diem-lounge-3-g4-group.jpg','teste 2',1,NULL),(3,2,'teste','imagensCabecalho/logoFrajola.png','teste',1,'TESTE');
/*!40000 ALTER TABLE `tbl_curiosidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_historia`
--

DROP TABLE IF EXISTS `tbl_historia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_historia` (
  `idHistoria` int(11) NOT NULL auto_increment,
  `titulo1` varchar(100) default NULL,
  `titulo2` varchar(100) default NULL,
  `paragrafoTitulo1` varchar(2000) default NULL,
  `paragrafoTitulo2` varchar(2000) default NULL,
  `paragrafoTitulo3` varchar(2000) default NULL,
  `paragrafoTitulo4` varchar(2000) default NULL,
  `ativarHistoria` tinyint(4) default NULL,
  PRIMARY KEY  (`idHistoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_historia`
--

LOCK TABLES `tbl_historia` WRITE;
/*!40000 ALTER TABLE `tbl_historia` DISABLE KEYS */;
INSERT INTO `tbl_historia` VALUES (3,'A tradiÃ§Ã£o da pizzaria Frajola','Um pouco da historia Frajola','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci. Aenean nec lorem. In porttitor. Donec laoreet nonummy augue. Suspendisse dui purus, scelerisque at, vulputate vitae, pretium mattis, nunc. Mauris eget neque at sem venenatis eleifend. Ut nonummy. Fusce aliquet pede non pede. Suspendisse dapibus lorem pellentesque magna. Integer nulla. Donec blandit feugiat ligula. Donec hendrerit, felis et imperdiet euismod, purus ipsum pretium metus, in lacinia nulla nisl eget sapien. Donec ut est in lectus consequat consequat. Etiam eget dui. Aliquam erat volutpat. Sed at lorem in nunc porta tristique. Proin nec augue. Quisque aliquam tempor magna. Pellen','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci. Aenean nec lorem. In porttitor. Donec laoreet nonummy augue. Suspendisse dui purus, scelerisque at, vulputate vitae, pretium mattis, nunc. Mauris eget neque at sem venenatis eleifend. Ut nonummy. Fusce aliquet pede non pede. Suspendisse dapibus lorem pellentesque magna. Integer nulla. Donec blandit feugiat ligula. Donec hendrerit, felis et imperdiet euismod, purus ipsum pretium metus, in lacinia nulla nisl eget sapien. Donec ut est in lectus consequat consequat. Etiam eget dui. Aliquam erat volutpat. Sed at lorem in nunc porta tristique. Proin nec augue. Quisque aliquam tempor magna. Pellen','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci. Aenean nec lorem. In porttitor. Donec laoreet nonummy augue. Suspendisse dui purus, scelerisque at, vulputate vitae, pretium mattis, nunc. Mauris eget neque at sem venenatis eleifend. Ut nonummy. Fusce aliquet pede non pede. Suspendisse dapibus lorem pellentesque magna. Integer nulla. Donec blandit feugiat ligula. Donec hendrerit, felis et imperdiet euismod, purus ipsum pretium metus, in lacinia nulla nisl eget sapien. Donec ut est in lectus consequat consequat. Etiam eget dui. Aliquam erat volutpat. Sed at lorem in nunc porta tristique. Proin nec augue. Quisque aliquam tempor magna. Pellen','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci. Aenean nec lorem. In porttitor. Donec laoreet nonummy augue. Suspendisse dui purus, scelerisque at, vulputate vitae, pretium mattis, nunc. Mauris eget neque at sem venenatis eleifend. Ut nonummy. Fusce aliquet pede non pede. Suspendisse dapibus lorem pellentesque magna. Integer nulla. Donec blandit feugiat ligula. Donec hendrerit, felis et imperdiet euismod, purus ipsum pretium metus, in lacinia nulla nisl eget sapien. Donec ut est in lectus consequat consequat. Etiam eget dui. Aliquam erat volutpat. Sed at lorem in nunc porta tristique. Proin nec augue. Quisque aliquam tempor magna. Pellen',0),(4,'Minha historia','Alguma coisa','Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.','Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.','Pellentesque habitant Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.','Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.',1);
/*!40000 ALTER TABLE `tbl_historia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_imagem`
--

DROP TABLE IF EXISTS `tbl_imagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_imagem` (
  `idImagem` int(11) NOT NULL auto_increment,
  `ativaImagen` varchar(45) default NULL,
  `imagen` varchar(45) default NULL,
  `descricao` varchar(45) default NULL,
  PRIMARY KEY  (`idImagem`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_imagem`
--

LOCK TABLES `tbl_imagem` WRITE;
/*!40000 ALTER TABLE `tbl_imagem` DISABLE KEYS */;
INSERT INTO `tbl_imagem` VALUES (2,'1','imagensSlider/2.jpg','teste'),(3,'1','imagensSlider/a-paper-clip-icon-94914.png','teste 3'),(4,'1','imagensSlider/4.jpg','fdfsdfds');
/*!40000 ALTER TABLE `tbl_imagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_ingredientes`
--

DROP TABLE IF EXISTS `tbl_ingredientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_ingredientes` (
  `idIngredientes` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`idIngredientes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ingredientes`
--

LOCK TABLES `tbl_ingredientes` WRITE;
/*!40000 ALTER TABLE `tbl_ingredientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_ingredientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_musica`
--

DROP TABLE IF EXISTS `tbl_musica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_musica` (
  `idMusica` int(11) NOT NULL auto_increment,
  `idAno` int(11) default NULL,
  `tituloMusica` varchar(100) default NULL,
  `linkVideoClip` varchar(1000) default NULL,
  PRIMARY KEY  (`idMusica`),
  KEY `fk_musica_pr_ano_idx` (`idAno`),
  CONSTRAINT `fk_musica_pr_ano` FOREIGN KEY (`idAno`) REFERENCES `tblano` (`idAno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_musica`
--

LOCK TABLES `tbl_musica` WRITE;
/*!40000 ALTER TABLE `tbl_musica` DISABLE KEYS */;
INSERT INTO `tbl_musica` VALUES (1,2,'Musica teste','https://www.youtube.com/embed/Zi_XLOBDo_Y'),(3,1,'teste','http://10.107.144.74/projeto_frajolas/cms/cadastrarMusica.php'),(4,1,'teste','http://10.107.144.74/projeto_frajolas/cms/cadastrarMusica.php'),(5,1,'teste','http://10.107.144.74/projeto_frajolas/cms/cadastrarMusica.php'),(6,1,'teste','http://10.107.144.74/projeto_frajolas/cms/cadastrarMusica.php'),(7,1,'teste','http://10.107.144.74/projeto_frajolas/cms/cadastrarMusica.php'),(8,1,'teste','http://10.107.144.74/projeto_frajolas/cms/cadastrarMusica.php');
/*!40000 ALTER TABLE `tbl_musica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_nivel`
--

DROP TABLE IF EXISTS `tbl_nivel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_nivel` (
  `idNivel` int(11) NOT NULL auto_increment,
  `nivel` varchar(45) default NULL,
  `descricao` varchar(45) default NULL,
  PRIMARY KEY  (`idNivel`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_nivel`
--

LOCK TABLES `tbl_nivel` WRITE;
/*!40000 ALTER TABLE `tbl_nivel` DISABLE KEYS */;
INSERT INTO `tbl_nivel` VALUES (1,'administrador de produto','cadastra,edita e exclui produtos'),(2,'administrador de usuario','cadastra,edita e exclui usuario'),(3,'administrador de curiosidades','cadastra,edita e exclui curiosidade'),(5,'meu nivel123','meu nivel 2');
/*!40000 ALTER TABLE `tbl_nivel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_politica`
--

DROP TABLE IF EXISTS `tbl_politica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_politica` (
  `idPolitica` int(11) NOT NULL auto_increment,
  `idAno` int(11) default NULL,
  `tituloPolitica` varchar(45) default NULL,
  `imagenPolitica` varchar(45) default NULL,
  PRIMARY KEY  (`idPolitica`),
  KEY `fk_politica_pr_ano_idx` (`idAno`),
  CONSTRAINT `fk_politica_pr_ano` FOREIGN KEY (`idAno`) REFERENCES `tblano` (`idAno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_politica`
--

LOCK TABLES `tbl_politica` WRITE;
/*!40000 ALTER TABLE `tbl_politica` DISABLE KEYS */;
INSERT INTO `tbl_politica` VALUES (2,2,'teste de edicao sem imagen','imagenPolitica/logoFrajola.png'),(3,1,'meu teste','imagenPolitica/images.png');
/*!40000 ALTER TABLE `tbl_politica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_produto`
--

DROP TABLE IF EXISTS `tbl_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_produto` (
  `idProduto` int(11) NOT NULL auto_increment,
  `descricaoProduto` varchar(1000) default NULL,
  `preco` float default NULL,
  `nomeProduto` varchar(45) default NULL,
  `imagen1` varchar(45) default NULL,
  `imagen2` varchar(45) default NULL,
  `imagen3` varchar(45) default NULL,
  `imagen4` varchar(45) default NULL,
  `produtoEmPromocao` tinyint(1) default NULL,
  `valorProdutoEmPromocao` float default NULL,
  `idingredientes` int(11) default NULL,
  `pizzaDoMes` tinyint(1) default NULL,
  `ativarProduto` tinyint(4) default NULL,
  PRIMARY KEY  (`idProduto`),
  KEY `fk_produto_pr_ingredientes_idx` (`idingredientes`),
  CONSTRAINT `fk_produto_pr_ingredientes` FOREIGN KEY (`idingredientes`) REFERENCES `tbl_ingredientes` (`idIngredientes`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_produto`
--

LOCK TABLES `tbl_produto` WRITE;
/*!40000 ALTER TABLE `tbl_produto` DISABLE KEYS */;
INSERT INTO `tbl_produto` VALUES (1,'Carne seca desfiada, mussarela, catupiry, cebola, tomate e azeitonas.',43.5,'Carne seca','imagensProdutos/imagen1.jpg','imagensProdutos/imagen2.png','imagensProdutos/imagen3.jpg','imagensProdutos/imagen4.jpg',1,35,NULL,0,1),(2,' Mussarela, peperoni, cebola, tomate, manjericão e azeitonas.',40,'Peperoni','imagensProdutos/imagen5.jpg','imagensProdutos/imagen6.jpg','imagensProdutos/imagen7.png','imagensProdutos/imagen8.jpg',0,30,NULL,1,1),(3,'Mussarela, champignon, palmito, peperoni, tomate e azeitonas.',45.9,'Tarantela','imagensProdutos/imagen10.jpg','imagensProdutos/imagen11.jpg','imagensProdutos/imagen12.jpg','imagensProdutos/imagen13.jpg',1,38.99,NULL,0,1);
/*!40000 ALTER TABLE `tbl_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_promocao`
--

DROP TABLE IF EXISTS `tbl_promocao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_promocao` (
  `idPromocao` int(11) NOT NULL auto_increment,
  `tituloPromocao` varchar(45) default NULL,
  `imagenPromocao` varchar(45) default NULL,
  `descricao` varchar(45) default NULL,
  `ativarPromocao` tinyint(1) default NULL,
  PRIMARY KEY  (`idPromocao`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_promocao`
--

LOCK TABLES `tbl_promocao` WRITE;
/*!40000 ALTER TABLE `tbl_promocao` DISABLE KEYS */;
INSERT INTO `tbl_promocao` VALUES (1,'teset','','dgdgd',NULL),(2,'55555555','','dgdgd',NULL),(3,'teset54545','','dgdgd',NULL);
/*!40000 ALTER TABLE `tbl_promocao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_televisao`
--

DROP TABLE IF EXISTS `tbl_televisao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_televisao` (
  `idTelevisao` int(11) NOT NULL auto_increment,
  `idAno` int(11) default NULL,
  `tituloPrograma` varchar(90) default NULL,
  `imagenPrograma` varchar(2000) default NULL,
  PRIMARY KEY  (`idTelevisao`),
  KEY `fk_televisao_pr_ano_idx` (`idAno`),
  CONSTRAINT `fk_televisao_pr_ano` FOREIGN KEY (`idAno`) REFERENCES `tblano` (`idAno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_televisao`
--

LOCK TABLES `tbl_televisao` WRITE;
/*!40000 ALTER TABLE `tbl_televisao` DISABLE KEYS */;
INSERT INTO `tbl_televisao` VALUES (2,2,'Ultimo Teste','imagensTelevisao/4.jpg'),(3,3,'teste de imagen','imagensTelevisao/exit.png'),(4,2,'teste sem imagen','imagensTelevisao/worker-512.png'),(5,1,'marcel 222222','imagensTelevisao/hqdefault.jpg');
/*!40000 ALTER TABLE `tbl_televisao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblano`
--

DROP TABLE IF EXISTS `tblano`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblano` (
  `idAno` int(11) NOT NULL auto_increment,
  `ano` varchar(45) default NULL,
  PRIMARY KEY  (`idAno`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblano`
--

LOCK TABLES `tblano` WRITE;
/*!40000 ALTER TABLE `tblano` DISABLE KEYS */;
INSERT INTO `tblano` VALUES (1,'1980'),(2,'1970'),(3,'1960');
/*!40000 ALTER TABLE `tblano` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcadastro_usuario`
--

DROP TABLE IF EXISTS `tblcadastro_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblcadastro_usuario` (
  `idusuario` int(11) NOT NULL auto_increment,
  `nomeuser` varchar(45) default NULL,
  `telefone` varchar(45) default NULL,
  `celular` varchar(45) default NULL,
  `dtNasc` varchar(45) default NULL,
  `cpf` varchar(45) default NULL,
  `rg` varchar(45) default NULL,
  `email` varchar(45) default NULL,
  `idestado` int(11) default NULL,
  `idendereco` int(11) default NULL,
  `sexo` char(1) default NULL,
  `foto` varchar(45) default NULL,
  `usuario` varchar(45) default NULL,
  `senha` varchar(45) default NULL,
  `idestadocivil` int(11) default NULL,
  `idNivel` int(11) default NULL,
  PRIMARY KEY  (`idusuario`),
  KEY `fkestado` (`idestado`),
  KEY `fkendereco` (`idendereco`),
  KEY `idestadocivil` (`idestadocivil`),
  KEY `fk_nivel_idx` (`idNivel`),
  CONSTRAINT `fkendereco` FOREIGN KEY (`idendereco`) REFERENCES `tblendereco` (`idendereco`),
  CONSTRAINT `fkestado` FOREIGN KEY (`idestado`) REFERENCES `tblestado` (`idestado`),
  CONSTRAINT `fk_nivel` FOREIGN KEY (`idNivel`) REFERENCES `tbl_nivel` (`idNivel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tblcadastro_usuario_ibfk_1` FOREIGN KEY (`idestadocivil`) REFERENCES `tblestado_civil` (`idestadocivil`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcadastro_usuario`
--

LOCK TABLES `tblcadastro_usuario` WRITE;
/*!40000 ALTER TABLE `tblcadastro_usuario` DISABLE KEYS */;
INSERT INTO `tblcadastro_usuario` VALUES (3,'willianafas','7646574','45454cxvc5','15/05/2000','1sfsfs','6363636sddd','dfgant@oul.com',36,28,'F','imagensUser/instagram.png','willi','123',5,1),(4,'antonio','586767','950604833','11/09/2000','03356435310','54322345','tgertyestr@gmail.com',30,29,'F','imagensUser/3.png','antonio','123456',5,1),(5,'marcelnt666','1234567898','97845454','10/10/2000','1234567','123456789','marcel@gmail.com',29,30,'F','imagensUser/hqdefault.jpg','marcelnt','123456',5,1);
/*!40000 ALTER TABLE `tblcadastro_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcomentario`
--

DROP TABLE IF EXISTS `tblcomentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblcomentario` (
  `idcomentario` int(11) NOT NULL auto_increment,
  `nome` varchar(1000) default NULL,
  `telefone` varchar(1000) default NULL,
  `celular` varchar(1000) default NULL,
  `email` varchar(1000) default NULL,
  `profissao` varchar(1000) default NULL,
  `sexo` char(1) default NULL,
  `linkFace` varchar(1000) default NULL,
  `homePage` varchar(1000) default NULL,
  `sugestao` varchar(1000) default NULL,
  `informacaoProduto` varchar(1000) default NULL,
  PRIMARY KEY  (`idcomentario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcomentario`
--

LOCK TABLES `tblcomentario` WRITE;
/*!40000 ALTER TABLE `tblcomentario` DISABLE KEYS */;
INSERT INTO `tblcomentario` VALUES (2,'Antonio','45454545','454545','antwillian2014@gmail.com','progamador','M','https://www.youtube.com/watch?v=2ohmiztZs_k','https://www.youtube.com/watch?v=2ohmiztZs_k','hgdfgedafbadvbadvds','bvbvbvbv');
/*!40000 ALTER TABLE `tblcomentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblendereco`
--

DROP TABLE IF EXISTS `tblendereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblendereco` (
  `idendereco` int(11) NOT NULL auto_increment,
  `rua` varchar(45) default NULL,
  `cidade` varchar(45) default NULL,
  `cep` varchar(45) default NULL,
  PRIMARY KEY  (`idendereco`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblendereco`
--

LOCK TABLES `tblendereco` WRITE;
/*!40000 ALTER TABLE `tblendereco` DISABLE KEYS */;
INSERT INTO `tblendereco` VALUES (25,'ttttttt','rtrtrtrtr','564565'),(26,'ttttttt','rtrtrtrtr','564565'),(27,'ttttttt','rtrtrtrtr','564565'),(28,'ttttttt','rtrtrtrtr','564565'),(29,'senai','jandira','36536'),(30,'Rua do Inferno, 666','teste','12345-678');
/*!40000 ALTER TABLE `tblendereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblestado`
--

DROP TABLE IF EXISTS `tblestado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblestado` (
  `idestado` int(11) NOT NULL auto_increment,
  `sigla` varchar(45) default NULL,
  `nome` varchar(45) default NULL,
  PRIMARY KEY  (`idestado`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblestado`
--

LOCK TABLES `tblestado` WRITE;
/*!40000 ALTER TABLE `tblestado` DISABLE KEYS */;
INSERT INTO `tblestado` VALUES (29,'AC','Acre'),(30,'AL','Alagoas'),(31,'AP','Amapá'),(32,'AM','Amazonas'),(33,'BA','Bahia'),(34,'CE','Ceará'),(35,'DF','Distrito Federal'),(36,'ES','Espírito Santo'),(37,'GO','Goiás'),(38,'MA','Maranhão'),(39,'MT','Mato Grosso'),(40,'MS','Mato Grosso do Sul'),(41,'MG','Minas Gerais'),(42,'PA','Pará'),(43,'PB','Paraíba'),(44,'PR','Paraná'),(45,'PE','Pernambuco'),(46,'PI','Piauí'),(47,'RJ','Rio de Janeiro'),(48,'RN','Rio Grande do Norte'),(49,'RS','Rio Grande do Sul'),(50,'RO','Rondônia'),(51,'RR','Roraima'),(52,'SC','Santa Catarina'),(53,'SP','São Paulo'),(54,'SE','Sergipe'),(55,'TO','Tocantins');
/*!40000 ALTER TABLE `tblestado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblestado_civil`
--

DROP TABLE IF EXISTS `tblestado_civil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblestado_civil` (
  `idestadocivil` int(11) NOT NULL auto_increment,
  `estadoCivil` varchar(45) default NULL,
  PRIMARY KEY  (`idestadocivil`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblestado_civil`
--

LOCK TABLES `tblestado_civil` WRITE;
/*!40000 ALTER TABLE `tblestado_civil` DISABLE KEYS */;
INSERT INTO `tblestado_civil` VALUES (5,'solteiro(a)'),(6,'casado(a)'),(7,'divorciado(a)'),(8,'viuvo(a)');
/*!40000 ALTER TABLE `tblestado_civil` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-08 10:05:44
