-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: loja_locadora
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

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
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `cpf` int(11) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `rua` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `numero` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'douglas thames de araujo',2147483647,'7110eda4d09e062aa5e4a390b0a572ac0d2c0220','douglasthamesaraujo@gmail.com','110','arnaldo estevao',110,'ADMINISTRADOR','67 8193-306'),(2,'oi',1231231,'7110eda4d09e062aa5e4a390b0a572ac0d2c0220','douglas.araujo@ifms.edu.br','dasda','adssad',116,'NORMAL','67 8193-306'),(3,'douglas2',1312313,'7110eda4d09e062aa5e4a390b0a572ac0d2c0220','teste@gmail.com','arnaldo','aaa',115,'NORMAL','67 8193-306'),(4,'douglas2',1231231,'7110eda4d09e062aa5e4a390b0a572ac0d2c0220','teste@gmail.com','1234','aaa',116,'NORMAL','67 8193-306'),(5,'douglas2',1231231,'7110eda4d09e062aa5e4a390b0a572ac0d2c0220','teste@gmail.com','1234','aaa',116,'NORMAL','67 8193-306'),(6,'joazinho2',111111111,'7110eda4d09e062aa5e4a390b0a572ac0d2c0220','joao_silva@gmail.com','125','adssad',1245,'NORMAL',''),(8,'mariazinha',1231231,'7110eda4d09e062aa5e4a390b0a572ac0d2c0220','maria@gmail.com','1154','arnaldo estevao',115,'NORMAL',''),(9,'douglas234',36088,'7110eda4d09e062aa5e4a390b0a572ac0d2c0220','douglas.araujo2@ifms.edu.br','1212','1233123',123132,'NORMAL','1233123'),(10,'au',5645645,'40bd001563085fc35165329ea1ff5c5ecbdbbeef','viper120000@gmail.com','123','au',1047,'NORMAL','645646'),(11,'Ah ta banido',5645645,'7b52009b64fd0a2a49e6d8a939753077792b0554','a@gmail.com','123','au',1047,'NORMAL','6732317818'),(12,'Ah ta banido! KeyDrop.com',3467,'86f7e437faa5a7fce15d1ddcb9eaeaea377667b8','AdrianCosta1215@gmail.com','rua','asdf',1047,'NORMAL','6732317818'),(13,'a vo bani',457,'86f7e437faa5a7fce15d1ddcb9eaeaea377667b8','avobani@gmail.com','rua','asdf',1047,'NORMAL','2346'),(14,'Ah ta ',3467,'356a192b7913b04c54574d18c28d46e6395428ab','AdrianCosta1215@gmail.com','rua','asdf',1047,'NORMAL','6732317818');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-21  5:46:18
