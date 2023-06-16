/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.28-MariaDB : Database - post_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`post_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `post_db`;

/*Table structure for table `conversations` */

DROP TABLE IF EXISTS `conversations`;

CREATE TABLE `conversations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) DEFAULT NULL,
  `to_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `conversations` */

insert  into `conversations`(`id`,`from_id`,`to_id`,`created`) values 
(1,31,33,'2023-06-15 09:33:14'),
(2,31,34,'2023-06-15 09:33:17'),
(4,33,34,'2023-06-15 09:25:09');

/*Table structure for table `messages` */

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'message_id',
  `convo_id` int(11) DEFAULT NULL COMMENT 'recepient_id FK',
  `sender_id` int(11) DEFAULT NULL COMMENT 'user_id',
  `message` text DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `messages` */

insert  into `messages`(`id`,`convo_id`,`sender_id`,`message`,`created`) values 
(1,1,31,'hello! kamusta ka? ','2023-06-14 14:34:39'),
(2,1,33,'ok manla ikaw? kamusta kaman? ','2023-06-14 14:37:06'),
(3,1,31,'anu it ganap yana? ','2023-06-14 14:37:08'),
(4,1,31,'adi man ngni ak yana ha cebu','2023-06-14 14:43:14'),
(5,2,34,'hello anu na padi kamusta na?','2023-06-14 16:14:47'),
(6,2,31,'ok manla padi as usual waray mangud bag.o','2023-06-14 16:15:10'),
(7,1,31,'test','2023-06-15 09:14:08'),
(8,1,31,'anu na? ','2023-06-15 09:17:13'),
(9,1,33,'anu na? sori na bc kc ak. haha.. ','2023-06-15 09:18:11'),
(10,1,31,'haha nag iinanu kaman? bc ka yana? ','2023-06-15 09:18:42'),
(11,1,33,'waray adi cge la it coding. haha.. ','2023-06-15 09:22:12'),
(12,1,31,'aman ikaw anu it lingaw dida? ','2023-06-15 09:22:32'),
(13,1,33,'waray haha.. kada lakaat! haha','2023-06-15 09:23:25'),
(14,1,31,'na huhubya man ak hn pag linakat haha.. ','2023-06-15 09:23:56'),
(15,1,31,'manlilibre ka lugod? haha magawas ak haha.. ','2023-06-15 09:24:07'),
(16,4,33,'hoy! hain kana?','2023-06-15 09:25:09'),
(17,4,33,'adi na kami ni milbert nag huhulat haim.','2023-06-15 09:25:51'),
(18,1,33,'haha tara sakto sahod man yana. ','2023-06-15 09:34:22'),
(19,1,31,'agay! axa pa! nga iniglish! hahaha','2023-06-15 09:34:56'),
(20,2,31,'hoy! hain kana? kanna ka paman diri nag rrply! hahah, ','2023-06-15 09:38:52'),
(21,1,33,'hain ka naman ngyan yana? nag huhulat naak haim','2023-06-15 09:40:37'),
(22,1,33,'adi ngyan ak dapit ha may IT park','2023-06-15 09:41:49'),
(23,2,34,'uy! anu na? yana laak nag OL hahaha. hain na kamu? ','2023-06-15 09:44:18'),
(24,4,34,'uy sori soir. na busy ak. anu na hain kita? ','2023-06-15 09:45:53'),
(25,1,33,'waray adi cge la it coding.','2023-06-15 10:57:02'),
(26,1,33,'adman kunta dda anu it bag.o? haha','2023-06-15 10:57:09'),
(27,1,33,'anu nala at diri na axa ak pag message haha.. ','2023-06-15 10:58:06'),
(28,1,33,'sdfsdf','2023-06-15 10:59:37'),
(29,1,33,'hoy!','2023-06-15 11:08:48'),
(30,1,31,'anu na! ahhahaa','2023-06-15 11:09:03');

/*Table structure for table `posts` */

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT 'User FK',
  `title` varchar(50) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `posts` */

insert  into `posts`(`id`,`user_id`,`title`,`body`,`created`,`modified`) values 
(1,NULL,'The title','This is the post body.','2023-06-07 13:02:40','2023-06-08 08:50:27'),
(2,NULL,'A title once again','And the post body follows.','2023-06-07 13:02:40',NULL),
(3,NULL,'Title strikes back','This is really exciting! Not.','2023-06-07 13:02:40','2023-06-08 05:57:03'),
(5,NULL,'Coding Blog #1','day 4 testing if working ang akoang coding diri sa FDCI','2023-06-08 05:00:04','2023-06-08 05:00:04'),
(6,NULL,'Coding Blog #2','im at my day 4 and im still trying to figure out how to do pagination.','2023-06-08 05:49:06','2023-06-08 05:49:06'),
(7,NULL,'Coding Blog #3','Update katapos lang kmain. currently searching for pagination query for mysql','2023-06-08 06:39:29','2023-06-08 06:39:29'),
(8,NULL,'Coding Blog #4','trying new concept for adding additional fields to post.','2023-06-08 07:06:38','2023-06-08 07:06:38'),
(9,NULL,'Coding Blog #5','Mjo nakukuha na ung gusto na result pero may kulang pa din. pero malapit na to promise!','2023-06-08 08:34:57','2023-06-08 08:34:57'),
(10,NULL,'Coding Blog #6','Next is to implement Authentication for user login..\r\n','2023-06-08 08:51:21','2023-06-08 08:51:21'),
(11,NULL,'sdfsfd','sdfsfsdf','2023-06-08 09:57:53','2023-06-08 09:57:53'),
(12,NULL,'Coding Blog #7','working on users management for account creation','2023-06-08 10:16:09','2023-06-08 10:16:09'),
(13,NULL,'Coding Blog #8','trying to finish first user maintenance before proceeding to authentication','2023-06-09 05:12:37','2023-06-09 05:12:37'),
(14,NULL,'test','test','2023-06-09 10:18:59','2023-06-09 10:18:59'),
(15,NULL,'test','test','2023-06-12 09:55:57','2023-06-12 09:55:57'),
(16,NULL,'test','Hello world its already 3:56PM','2023-06-12 09:56:19','2023-06-12 09:56:19'),
(17,NULL,'test','testing another post at 3:57PM','2023-06-12 09:57:57','2023-06-12 09:57:57'),
(19,26,'testing another one','hello world at 4:01PM','2023-06-12 10:01:39','2023-06-12 10:01:39'),
(20,27,'test','test again at 4:03','2023-06-12 10:04:01','2023-06-12 10:04:01'),
(21,NULL,'test','123','2023-06-13 05:58:43','2023-06-13 05:58:43'),
(25,NULL,'Post for today! alert 101sss','just finished all the crude files. now is to add authentication for formsss','2023-06-13 10:24:40','2023-06-13 10:54:27'),
(26,NULL,'test','test','2023-06-13 11:24:55','2023-06-13 11:24:55'),
(27,NULL,'tests','tests','2023-06-13 11:25:28','2023-06-13 11:29:02');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(200) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `hobby` text DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `file` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`code`,`firstname`,`middlename`,`lastname`,`position`,`email`,`location`,`website`,`hobby`,`username`,`password`,`role`,`created`,`modified`,`file`) values 
(31,NULL,'Al','Buenafe','Mausisa',NULL,NULL,NULL,NULL,NULL,'fdc.almausisa@gmail.com','$2a$10$OMKx.qVnY8p1J.JmbD/pU.wIWjnFPUqLt71w3zbuXVRjl6stdNE1q','0','2023-06-14 03:56:11','2023-06-14 03:56:11',NULL),
(33,NULL,'Milbert','Apar','Apura',NULL,NULL,NULL,NULL,NULL,'milbert123','$2a$10$ZwxNYQhiBZ42An3Ckw7fzu3l3a6w6JK.ygOjwta5fQvIuKnf3gDt.','0','2023-06-14 05:07:48','2023-06-14 05:07:48',NULL),
(34,NULL,'Joel','Badillo','Almejas',NULL,NULL,NULL,NULL,NULL,'joel123','$2a$10$ozl/czaO0868fDAeSrwi3etEJU5pHF6AHtcx6/nFSFomv/lFzqbO2','0','2023-06-14 05:08:25','2023-06-14 05:08:25',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
