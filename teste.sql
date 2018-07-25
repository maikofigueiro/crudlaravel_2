/*
MySQL Backup
Source Server Version: 5.7.22
Source Database: autogestor
Date: 25/07/2018 02:53:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
--  Table structure for `perfil`
-- ----------------------------
DROP TABLE IF EXISTS `perfil`;
CREATE TABLE `perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(128) NOT NULL,
  `remember_token` varchar(128) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Table structure for `user_perfil`
-- ----------------------------
DROP TABLE IF EXISTS `user_perfil`;
CREATE TABLE `user_perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_user` (`user_id`),
  KEY `fk_perfil` (`perfil_id`),
  CONSTRAINT `fk_perfil` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`),
  CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `perfil` VALUES ('1','Admin','2018-07-24 09:21:38','2018-07-24 09:21:38'), ('2','Produtos','2018-07-25 01:09:23','2018-07-24 22:09:34'), ('3','Categorias','2018-07-25 01:30:59','2018-07-25 01:30:59'), ('4','Marcas','2018-07-25 01:31:09','2018-07-25 01:31:09');
INSERT INTO `users` VALUES ('1','Admin','admin@teste.com','$2y$10$WQ9Yhud8PqU7sERLe1R4leicIbLmxdTiROTJvE/MHYUzdFwXFeizC','BkOvhrSR9dUz45KYkcOH1fYFbdsUg9IFS2CXyLBrC0OpqZAQke7wytW2ZQFx','2018-07-24 08:36:10','2018-07-25 02:41:48',NULL), ('13','Produtos','produtos@teste.com','$2y$10$WQ9Yhud8PqU7sERLe1R4leicIbLmxdTiROTJvE/MHYUzdFwXFeizC',NULL,'2018-07-25 05:40:39','2018-07-25 02:41:16','2018-07-25 02:40:39'), ('14','Categorias','categorias@teste.com','$2y$10$WQ9Yhud8PqU7sERLe1R4leicIbLmxdTiROTJvE/MHYUzdFwXFeizC',NULL,'2018-07-25 05:40:53','2018-07-25 02:41:17','2018-07-25 02:40:53'), ('15','Marcas','marcas@teste.com','$2y$10$WQ9Yhud8PqU7sERLe1R4leicIbLmxdTiROTJvE/MHYUzdFwXFeizC',NULL,'2018-07-25 05:41:10','2018-07-25 02:41:17','2018-07-25 02:41:10'), ('16','Todos','todos@teste.com','$2y$10$WQ9Yhud8PqU7sERLe1R4leicIbLmxdTiROTJvE/MHYUzdFwXFeizC','9GpqJCjgZkrSuzrvMnbQ7mN9EXRU1kXSolV21eTsTDfSzl0Ec1TwCShKUeEb','2018-07-25 05:41:35','2018-07-25 02:41:59','2018-07-25 02:41:35');
INSERT INTO `user_perfil` VALUES ('1','1','1','2018-07-24 09:31:40','2018-07-24 09:31:40'), ('18','13','2','2018-07-25 02:40:39','2018-07-25 02:40:39'), ('19','14','3','2018-07-25 02:40:53','2018-07-25 02:40:53'), ('20','15','4','2018-07-25 02:41:10','2018-07-25 02:41:10'), ('21','16','2','2018-07-25 02:41:35','2018-07-25 02:41:35'), ('22','16','3','2018-07-25 02:41:35','2018-07-25 02:41:35'), ('23','16','4','2018-07-25 02:41:35','2018-07-25 02:41:35');
