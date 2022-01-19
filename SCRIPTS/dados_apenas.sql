-- MariaDB dump 10.17  Distrib 10.4.14-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: loja_pizzaria
-- ------------------------------------------------------
-- Server version	10.4.14-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (50,2,'2021-01-21 14:29:37','FINALIZADO',95.26),(51,2,'2021-01-21 15:39:28','CANCELADO',40.5),(52,2,'2021-01-21 17:26:47','CANCELADO',89.76),(53,2,'2021-01-22 14:45:31','CANCELADO',30),(54,2,'2021-01-27 15:22:06','CANCELADO',20.5),(55,2,'2021-01-27 15:23:12','EM ANDAMENTO',87.94),(56,2,'2021-01-27 19:42:41','EM ANDAMENTO',138.44);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pedido_filme`
--

LOCK TABLES `pedido_filme` WRITE;
/*!40000 ALTER TABLE `pedido_filme` DISABLE KEYS */;
INSERT INTO `pedido_filme` VALUES (50,1,3),(50,5,4),(51,1,1),(51,2,1),(51,4,1),(52,1,1),(52,2,3),(52,5,4),(53,2,1),(53,3,5),(53,4,3),(54,2,1),(54,4,3),(54,7,1),(55,1,1),(55,2,4),(55,5,1),(56,1,3),(56,2,4),(56,5,1),(56,7,1);
/*!40000 ALTER TABLE `pedido_filme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `filme`
--


LOCK TABLES `filme` WRITE;
/*!40000 ALTER TABLE `prato` DISABLE KEYS */;
INSERT INTO `filme` VALUES (1,'Uncut Gems','filme Uncut Gems',20,'135','crime'),(2,'The Lighthouse','filme The Lighthouse',20,'109','horror'),(3,'Parasite','filme Parasite',20,'132','horror'),(4,'1917','filme 1917',18,'119','action'),(5,'A Quiet Place 2','filme A Quiet Place 2',15,'97','horror'),(6,'Tenet','filme Tenet',20,'150','action'),(7,'Top Gun','filme Top Gun',19,'100','action'),(8,'Soul','filme Soul',10,'101','animation');
/*!40000 ALTER TABLE `prato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'douglas thames de araujo',2147483647,'7110eda4d09e062aa5e4a390b0a572ac0d2c0220','douglasthamesaraujo@gmail.com','110','arnaldo estevao',110,'ADMINISTRADOR','67 8193-306'),(2,'oi',1231231,'7110eda4d09e062aa5e4a390b0a572ac0d2c0220','douglas.araujo@ifms.edu.br','dasda','adssad',116,'NORMAL','67 8193-306'),(3,'douglas2',1312313,'7110eda4d09e062aa5e4a390b0a572ac0d2c0220','teste@gmail.com','arnaldo','aaa',115,'NORMAL','67 8193-306'),(4,'douglas2',1231231,'7110eda4d09e062aa5e4a390b0a572ac0d2c0220','teste@gmail.com','1234','aaa',116,'NORMAL','67 8193-306'),(5,'douglas2',1231231,'7110eda4d09e062aa5e4a390b0a572ac0d2c0220','teste@gmail.com','1234','aaa',116,'NORMAL','67 8193-306'),(6,'joazinho2',111111111,'7110eda4d09e062aa5e4a390b0a572ac0d2c0220','joao_silva@gmail.com','125','adssad',1245,'NORMAL',''),(8,'mariazinha',1231231,'7110eda4d09e062aa5e4a390b0a572ac0d2c0220','maria@gmail.com','1154','arnaldo estevao',115,'NORMAL',''),(9,'douglas234',36088,'7110eda4d09e062aa5e4a390b0a572ac0d2c0220','douglas.araujo2@ifms.edu.br','1212','1233123',123132,'NORMAL','1233123');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-28 20:39:58
