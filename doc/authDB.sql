

/*Table structure for table `as_user_types` */

CREATE TABLE `as_user_types` (
  `user_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

/*Data for the table `as_user_type` */

LOCK TABLES `as_user_types` WRITE;

insert  into `as_user_types`(`user_type_id`,`user_type`) values 
(100,'Client Admin'),
(101,'Support'),
(102,'Sales Admin'),
(103,'Sales User'),
(104,'Support Admin');

UNLOCK TABLES;



/*Table structure for table `as_clients` */

CREATE TABLE `as_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resellerId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `hash` varchar(50) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contactName` varchar(255) NOT NULL COMMENT 'Primary contact name',
  `contactPhone` varchar(100) NOT NULL,
  `contactEmail` varchar(255) NOT NULL,
  `accountNumber` varchar(50) NOT NULL COMMENT 'Reseller account number',
  `advantageProgramStatus` enum('no','yes') NOT NULL,
  `geography` enum('US','CAN') NOT NULL,
  `branchNumber` varchar(50) NOT NULL,
  `branchName` varchar(255) NOT NULL,
  `territory` varchar(255) NOT NULL,
  `salesRepContactName` varchar(100) NOT NULL,
  `salesRepContactEmail` varchar(100) NOT NULL,
  `dateInvitationSent` datetime DEFAULT NULL,
  `accountStatus` tinyint(4) NOT NULL DEFAULT '1',
  `accountStatusDate` datetime NOT NULL,
  `clientSourceTypeId` tinyint(4) unsigned NOT NULL DEFAULT '1',
  `demo` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'Account using for demo',
  `typeOfPractice` int(10) unsigned NOT NULL DEFAULT '1',
  `parentId` int(11) DEFAULT NULL,
  `billingCycle` enum('monthly','annually') NOT NULL DEFAULT 'monthly',
  `typeOfBilling` enum('central','location') DEFAULT 'location',
  PRIMARY KEY (`id`),
  UNIQUE KEY `hash` (`hash`),
  UNIQUE KEY `accountNumber` (`accountNumber`),
  KEY `resellerId` (`resellerId`),
  KEY `fk_ParentId` (`parentId`),
  CONSTRAINT `fk_ParentId` FOREIGN KEY (`parentId`) REFERENCES `as_clients` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1067 DEFAULT CHARSET=latin1 COMMENT='AutoSDS clients';


/*Data for the table `as_clients` */

LOCK TABLES `as_clients` WRITE;

insert  into `as_clients`(`id`,`resellerId`,`name`,`hash`,`createdDate`,`modifiedDate`,`contactName`,`contactPhone`,`contactEmail`,`accountNumber`,`advantageProgramStatus`,`geography`,`branchNumber`,`branchName`,`territory`,`salesRepContactName`,`salesRepContactEmail`,`dateInvitationSent`,`accountStatus`,`accountStatusDate`,`clientSourceTypeId`,`demo`,`typeOfPractice`,`parentId`,`billingCycle`,`typeOfBilling`) values 
(1,1,'Test Client Inc','RVM1G5621DGYHI','2015-01-06 09:42:55','2015-01-06 09:42:55','Test users','+109871231','vl.kol@testtest.com','RB109142','no','US','LB14','LABORA','CANADA','John Belly','vl.kol@testtest.com','2016-07-06 10:32:21',1,'2015-03-16 22:36:54',1,0,1,NULL,'monthly','central'),
(11,1,'Test Client 2','AVF1G5621DG34D','2015-01-06 09:42:55','2015-01-06 09:42:55','Jim MacGregor','678-640-2772','jim@testtest.com','TY123456','yes','US','','','','','','2015-03-19 14:12:27',0,'2015-04-24 06:47:27',1,0,1,NULL,'monthly','central'),
(22,1,'Test Client 3','BDV111D4E33F','2015-01-15 09:42:55','2015-01-15 09:42:55','','','ar.may@testtest.com','ACCNUMBER01','yes','US','','','','','','2015-03-19 14:12:27',1,'2015-03-03 20:58:33',1,0,1,NULL,'monthly','central'),
(33,1,'Metro-St Louis Pk-EQ-ADPI','240408957','2015-02-17 13:17:05','0000-00-00 00:00:00','Genusertest3','5128999','genusertest3@or.com','240408957','no','US','240','MINNESOTA','80','Pamela R Dubay','Pamela.Dubay@testtest.comm','2015-03-17 17:16:05',1,'2015-04-20 12:03:14',1,0,1,NULL,'monthly','central');

UNLOCK TABLES;




/*Table structure for table `as_users` */

CREATE TABLE `as_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clientId` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(64) NOT NULL COMMENT 'password',
  `salt` varchar(32) NOT NULL COMMENT 'salt',
  `invitationDate` datetime DEFAULT NULL COMMENT 'Date when invitation mail sent',
  `active` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'User finished registration process',
  `accountAdmin` int(1) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL COMMENT 'name of user',
  `acceptedToU` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Acceptance of Terms of Use',
  `user_type_id` int(10) unsigned NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ClientID_Email` (`clientId`,`email`),
  KEY `as_user_ibfk_2` (`user_type_id`),
  KEY `clientId` (`clientId`),
  CONSTRAINT `as_user_ibfk_2` FOREIGN KEY (`user_type_id`) REFERENCES `as_user_types` (`user_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1335 DEFAULT CHARSET=latin1 COMMENT='AutoSDS client users';

/*Data for the table `as_users` */

LOCK TABLES `as_users` WRITE;

insert  into `as_users`(`id`,`clientId`,`email`,`pwd`,`salt`,`invitationDate`,`active`,`accountAdmin`,`name`,`acceptedToU`,`user_type_id`) values 
(2,1,'vl.kol@testtest.com','560ff539ffc0685d43ab06a82ac1d986','1438120159','2016-07-06 20:09:51',1,1,'Test users',1,101),
(4,22,'ar.av@testtest.com','71e9d04f159154d5f7b1a6ca8c564326','1423210438','2015-03-19 14:12:27',0,1,'Client User',0,100),
(6,1,'ar.mil@testtest.com','bbe94d07bf492c19716417b9bf61a3d4','1467813239','2016-07-06 19:52:58',1,0,'Temp User',1,100),
(10,1,'as@a.com','68d110142f82cadab74676cc97ff6317','1422104986','2016-07-06 19:53:08',0,0,'Ku Ki',0,100),
(11,1,'a@a.com','d959caadac9b13dcb3e609440135cf54','12345678','2016-07-06 20:05:28',1,0,'Test',1,100),
(12,1,'k@k.com','','','2015-01-30 11:16:59',0,0,'ki',0,100),
(13,1,'l@l.com','75b7611fbe35212e3a3529fc27bcfd56','1425051344','2015-02-27 15:33:45',0,0,'l',0,100),
(29,33,'genusertest3@mailinator.com','10079','26028','2015-03-17 17:16:05',1,1,'Genusertest3',0,100),
(90,11,'vl.koov@testtest.com','','',NULL,1,0,'Vlad K',0,100),
(111,0,'adi.kol@testtest.com','','','2015-04-20 14:48:05',1,0,'Vlad K',0,103),
(116,0,'test@gsmsds.com','','','2015-03-04 14:21:43',1,0,'Test 1',0,101),
(188,0,'sales1@mail.com','88312213c3492c4cd89d297f16cb0fc4','','2015-04-16 19:24:35',1,0,'Sales Man 1',0,103),
(192,0,'sales13@mail.com','88312213c3492c4cd89d297f16cb0fc4','',NULL,1,0,'Sales Man 5',0,104),
(209,0,'Test@testesttest.com','','',NULL,1,0,'Ar tes',0,102);

UNLOCK TABLES;



/*Table structure for table `users` */

CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_type_id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_email` varchar(80) NOT NULL DEFAULT '',
  `user_password` varchar(64) NOT NULL DEFAULT '',
  `user_first_name` varchar(80) NOT NULL DEFAULT '',
  `user_last_name` varchar(80) NOT NULL DEFAULT '',
  `user_phone` varchar(80) NOT NULL DEFAULT '',
  `user_status_flag` tinyint(1) NOT NULL DEFAULT '1',
  `user_screen_lock_flag` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  KEY `client_id` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=540 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

LOCK TABLES `users` WRITE;

insert  into `users`(`user_id`,`client_id`,`user_type_id`,`user_email`,`user_password`,`user_first_name`,`user_last_name`,`user_phone`,`user_status_flag`,`user_screen_lock_flag`) values 
(1,1,7,'superuser@globalstest.com','msN22nrDN7Z/w','Super','User','111-333-3333',1,1),
(2,1,6,'jim@testnet.com','mssZSE4Q3OBhg','Jim','Admin','111-640-2772',1,0),
(4,1,6,'Jul@testnet.com','mshXE9G0Amp3Y','Jul','Admin','111-718-8148',1,0);

