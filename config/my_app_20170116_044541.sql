-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "acos" -------------------------------------
DROP TABLE IF EXISTS `acos` CASCADE;

CREATE TABLE `acos` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`parent_id` Int( 11 ) NULL,
	`model` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`foreign_key` Int( 11 ) NULL,
	`alias` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`lft` Int( 11 ) NULL,
	`rght` Int( 11 ) NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 140;
-- ---------------------------------------------------------


-- CREATE TABLE "aros" -------------------------------------
DROP TABLE IF EXISTS `aros` CASCADE;

CREATE TABLE `aros` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`parent_id` Int( 11 ) NULL,
	`model` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`foreign_key` Int( 11 ) NULL,
	`alias` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`lft` Int( 11 ) NULL,
	`rght` Int( 11 ) NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 11;
-- ---------------------------------------------------------


-- CREATE TABLE "aros_acos" --------------------------------
DROP TABLE IF EXISTS `aros_acos` CASCADE;

CREATE TABLE `aros_acos` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`aro_id` Int( 11 ) NOT NULL,
	`aco_id` Int( 11 ) NOT NULL,
	`_create` VarChar( 2 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
	`_read` VarChar( 2 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
	`_update` VarChar( 2 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
	`_delete` VarChar( 2 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
	PRIMARY KEY ( `id` ),
	CONSTRAINT `aro_id` UNIQUE( `aro_id`, `aco_id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 3;
-- ---------------------------------------------------------


-- CREATE TABLE "avatars" ----------------------------------
DROP TABLE IF EXISTS `avatars` CASCADE;

CREATE TABLE `avatars` ( 
	`id` Int( 5 ) AUTO_INCREMENT NOT NULL,
	`image` VarChar( 255 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- ---------------------------------------------------------


-- CREATE TABLE "buses" ------------------------------------
DROP TABLE IF EXISTS `buses` CASCADE;

CREATE TABLE `buses` ( 
	`id` Int( 5 ) AUTO_INCREMENT NOT NULL,
	`name` VarChar( 200 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
	`class` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	`plat_no` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`facilities` VarChar( 200 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	`capacity` Int( 2 ) NULL DEFAULT '0',
	`status` Enum( '1', '0' ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
	PRIMARY KEY ( `id` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
COMMENT 'table for store buses or vehicle'
ENGINE = InnoDB
AUTO_INCREMENT = 80;
-- ---------------------------------------------------------


-- CREATE TABLE "categories" -------------------------------
DROP TABLE IF EXISTS `categories` CASCADE;

CREATE TABLE `categories` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`parent_id` Int( 11 ) NULL,
	`lft` Int( 11 ) NULL,
	`rght` Int( 11 ) NULL,
	`name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`slug` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`description` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	`public` TinyInt( 1 ) NOT NULL DEFAULT '0',
	`created` DateTime NOT NULL,
	`modified` DateTime NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `slug` UNIQUE( `slug` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- ---------------------------------------------------------


-- CREATE TABLE "cities" -----------------------------------
DROP TABLE IF EXISTS `cities` CASCADE;

CREATE TABLE `cities` ( 
	`id` Int( 3 ) AUTO_INCREMENT NOT NULL,
	`city` VarChar( 200 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 24;
-- ---------------------------------------------------------


-- CREATE TABLE "customers" --------------------------------
DROP TABLE IF EXISTS `customers` CASCADE;

CREATE TABLE `customers` ( 
	`id` Int( 5 ) AUTO_INCREMENT NOT NULL,
	`user_id` Int( 5 ) NULL,
	`name` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`firstname` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	`lastname` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	`email` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	`password` Text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	`phone` VarChar( 15 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	`address` Text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 23;
-- ---------------------------------------------------------


-- CREATE TABLE "documents" --------------------------------
DROP TABLE IF EXISTS `documents` CASCADE;

CREATE TABLE `documents` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`category_id` Int( 11 ) NULL,
	`user_id` Int( 11 ) NOT NULL,
	`title` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`slug` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`body` Text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	`created` DateTime NULL,
	`modified` DateTime NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- ---------------------------------------------------------


-- CREATE TABLE "groups" -----------------------------------
DROP TABLE IF EXISTS `groups` CASCADE;

CREATE TABLE `groups` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`name` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`created` DateTime NULL,
	`modified` DateTime NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 4;
-- ---------------------------------------------------------


-- CREATE TABLE "roles" ------------------------------------
DROP TABLE IF EXISTS `roles` CASCADE;

CREATE TABLE `roles` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`group_id` Int( 11 ) NULL,
	`name` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`created` DateTime NULL,
	`modified` DateTime NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 4;
-- ---------------------------------------------------------


-- CREATE TABLE "route_destinations" -----------------------
DROP TABLE IF EXISTS `route_destinations` CASCADE;

CREATE TABLE `route_destinations` ( 
	`id` Int( 3 ) AUTO_INCREMENT NOT NULL,
	`city` Int( 3 ) NOT NULL,
	`city_name` VarChar( 200 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	`distance` Int( 11 ) NOT NULL,
	`fare` Int( 11 ) NOT NULL,
	`route_id` Int( 3 ) NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- ---------------------------------------------------------


-- CREATE TABLE "routes" -----------------------------------
DROP TABLE IF EXISTS `routes` CASCADE;

CREATE TABLE `routes` ( 
	`id` Int( 5 ) AUTO_INCREMENT NOT NULL,
	`name` VarChar( 255 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`source` VarChar( 200 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
	`destination` VarChar( 200 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	`distance` Int( 11 ) NULL,
	`fare` Int( 11 ) NULL,
	`create_at` Timestamp NULL DEFAULT CURRENT_TIMESTAMP,
	`parent_route` Int( 3 ) NULL DEFAULT '0',
	PRIMARY KEY ( `id` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
COMMENT 'List routes avalibe'
ENGINE = InnoDB
AUTO_INCREMENT = 16;
-- ---------------------------------------------------------


-- CREATE TABLE "schedules" --------------------------------
DROP TABLE IF EXISTS `schedules` CASCADE;

CREATE TABLE `schedules` ( 
	`id` Int( 5 ) AUTO_INCREMENT NOT NULL,
	`day` Int( 5 ) NOT NULL,
	`route_id` Int( 5 ) NOT NULL,
	`route_name` VarChar( 200 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`bus_id` Int( 5 ) NOT NULL,
	`departure_time` Time NOT NULL,
	`arival_time` Time NOT NULL,
	`create_at` Timestamp NULL DEFAULT CURRENT_TIMESTAMP,
	`class` VarChar( 255 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`fare` VarChar( 255 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
COMMENT 'Jadwal keberangkatan bus'
ENGINE = InnoDB
AUTO_INCREMENT = 50;
-- ---------------------------------------------------------


-- CREATE TABLE "ticket_orders" ----------------------------
DROP TABLE IF EXISTS `ticket_orders` CASCADE;

CREATE TABLE `ticket_orders` ( 
	`id` Int( 5 ) AUTO_INCREMENT NOT NULL,
	`customer_id` Int( 5 ) NOT NULL,
	`ticket_id` Int( 5 ) NOT NULL,
	`ticket_code` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`date_create_at` Date NULL,
	`time_create_at` Time NOT NULL,
	`departure_time` Time NOT NULL,
	`departure_date` Date NOT NULL,
	`arival_time` Time NOT NULL,
	`arival_date` Date NOT NULL,
	`fare` VarChar( 20 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`passegers` Int( 2 ) NULL,
	`total` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	`destination` Int( 5 ) NOT NULL,
	`sheet` VarChar( 20 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 3;
-- ---------------------------------------------------------


-- CREATE TABLE "ticket_passengers" ------------------------
DROP TABLE IF EXISTS `ticket_passengers` CASCADE;

CREATE TABLE `ticket_passengers` ( 
	`id` Int( 5 ) AUTO_INCREMENT NOT NULL,
	`name` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`gender` Enum( 'male', 'female' ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`seet_number` VarChar( 2 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	`ticket_order_id` Int( 5 ) NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- ---------------------------------------------------------


-- CREATE TABLE "tickets" ----------------------------------
DROP TABLE IF EXISTS `tickets` CASCADE;

CREATE TABLE `tickets` ( 
	`id` Int( 5 ) AUTO_INCREMENT NOT NULL,
	`schedule_id` Int( 5 ) NULL,
	`route_id` Int( 5 ) NOT NULL,
	`date_create_at` Date NULL,
	`departure_time` Time NOT NULL,
	`date` Date NOT NULL,
	`arival_time` Time NOT NULL,
	`stock` Int( 11 ) NOT NULL,
	`bus_id` Int( 3 ) NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 3;
-- ---------------------------------------------------------


-- CREATE TABLE "users" ------------------------------------
DROP TABLE IF EXISTS `users` CASCADE;

CREATE TABLE `users` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`group_id` Int( 11 ) NOT NULL,
	`role_id` Int( 11 ) NOT NULL,
	`username` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`password` Char( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`email` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`created` Timestamp NULL DEFAULT CURRENT_TIMESTAMP,
	`modified` DateTime NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `email` UNIQUE( `email` ),
	CONSTRAINT `username` UNIQUE( `username` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- ---------------------------------------------------------


-- Dump data of "acos" -------------------------------------
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '1', NULL, NULL, NULL, 'controllers', '1', '278' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '2', '1', NULL, NULL, 'Pages', '2', '5' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '3', '2', NULL, NULL, 'display', '3', '4' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '4', '1', NULL, NULL, 'Error', '6', '7' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '5', '1', NULL, NULL, 'Roles', '8', '19' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '6', '5', NULL, NULL, 'index', '9', '10' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '7', '5', NULL, NULL, 'view', '11', '12' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '8', '5', NULL, NULL, 'add', '13', '14' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '9', '5', NULL, NULL, 'edit', '15', '16' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '10', '5', NULL, NULL, 'delete', '17', '18' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '11', '1', NULL, NULL, 'Groups', '20', '31' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '12', '11', NULL, NULL, 'index', '21', '22' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '13', '11', NULL, NULL, 'view', '23', '24' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '14', '11', NULL, NULL, 'add', '25', '26' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '15', '11', NULL, NULL, 'edit', '27', '28' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '16', '11', NULL, NULL, 'delete', '29', '30' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '17', '1', NULL, NULL, 'Customers', '32', '47' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '18', '17', NULL, NULL, 'index', '33', '34' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '19', '17', NULL, NULL, 'view', '35', '36' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '20', '17', NULL, NULL, 'register', '37', '38' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '21', '17', NULL, NULL, 'edit', '39', '40' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '22', '17', NULL, NULL, 'delete', '41', '42' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '23', '17', NULL, NULL, 'login', '43', '44' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '24', '17', NULL, NULL, 'logout', '45', '46' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '25', '1', NULL, NULL, 'App', '48', '51' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '26', '25', NULL, NULL, 'isAuthorized', '49', '50' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '27', '1', NULL, NULL, 'Tickets', '52', '73' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '28', '27', NULL, NULL, 'search', '53', '54' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '29', '27', NULL, NULL, 'getTicket', '55', '56' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '30', '27', NULL, NULL, 'order', '57', '58' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '31', '27', NULL, NULL, 'payment', '59', '60' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '32', '27', NULL, NULL, 'saveOrder', '61', '62' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '33', '27', NULL, NULL, 'orderSummary', '63', '64' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '34', '27', NULL, NULL, 'view', '65', '66' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '35', '27', NULL, NULL, 'edit', '67', '68' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '36', '27', NULL, NULL, 'delete', '69', '70' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '37', '1', NULL, NULL, 'AclManager', '74', '91' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '38', '37', NULL, NULL, 'Acl', '75', '90' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '39', '38', NULL, NULL, 'index', '76', '77' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '40', '38', NULL, NULL, 'permissions', '78', '79' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '41', '38', NULL, NULL, 'updateAcos', '80', '81' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '42', '38', NULL, NULL, 'updateAros', '82', '83' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '43', '38', NULL, NULL, 'revokePerms', '84', '85' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '44', '38', NULL, NULL, 'drop', '86', '87' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '45', '38', NULL, NULL, 'defaults', '88', '89' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '46', '1', NULL, NULL, 'Dashboard', '92', '205' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '47', '46', NULL, NULL, 'Buses', '93', '104' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '48', '47', NULL, NULL, 'index', '94', '95' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '49', '47', NULL, NULL, 'view', '96', '97' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '50', '47', NULL, NULL, 'add', '98', '99' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '51', '47', NULL, NULL, 'edit', '100', '101' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '52', '47', NULL, NULL, 'delete', '102', '103' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '53', '46', NULL, NULL, 'Cities', '105', '116' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '54', '53', NULL, NULL, 'index', '106', '107' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '55', '53', NULL, NULL, 'view', '108', '109' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '56', '53', NULL, NULL, 'add', '110', '111' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '57', '53', NULL, NULL, 'edit', '112', '113' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '58', '53', NULL, NULL, 'delete', '114', '115' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '59', '46', NULL, NULL, 'Customers', '117', '128' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '60', '59', NULL, NULL, 'index', '118', '119' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '61', '59', NULL, NULL, 'view', '120', '121' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '62', '59', NULL, NULL, 'add', '122', '123' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '63', '59', NULL, NULL, 'edit', '124', '125' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '64', '59', NULL, NULL, 'delete', '126', '127' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '65', '46', NULL, NULL, 'Main', '129', '140' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '66', '65', NULL, NULL, 'index', '130', '131' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '67', '65', NULL, NULL, 'view', '132', '133' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '68', '65', NULL, NULL, 'add', '134', '135' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '69', '65', NULL, NULL, 'edit', '136', '137' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '70', '65', NULL, NULL, 'delete', '138', '139' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '71', '46', NULL, NULL, 'Reports', '141', '150' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '72', '71', NULL, NULL, 'index', '142', '143' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '73', '71', NULL, NULL, 'busEarning', '144', '145' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '74', '71', NULL, NULL, 'ticketSales', '146', '147' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '75', '46', NULL, NULL, 'Routes', '151', '162' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '76', '75', NULL, NULL, 'index', '152', '153' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '77', '75', NULL, NULL, 'view', '154', '155' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '78', '75', NULL, NULL, 'add', '156', '157' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '79', '75', NULL, NULL, 'edit', '158', '159' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '80', '75', NULL, NULL, 'delete', '160', '161' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '81', '46', NULL, NULL, 'Schedules', '163', '174' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '82', '81', NULL, NULL, 'index', '164', '165' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '83', '81', NULL, NULL, 'view', '166', '167' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '84', '81', NULL, NULL, 'add', '168', '169' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '85', '81', NULL, NULL, 'edit', '170', '171' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '86', '81', NULL, NULL, 'delete', '172', '173' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '87', '46', NULL, NULL, 'Tickets', '175', '188' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '88', '87', NULL, NULL, 'index', '176', '177' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '89', '87', NULL, NULL, 'view', '178', '179' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '90', '87', NULL, NULL, 'add', '180', '181' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '91', '87', NULL, NULL, 'create', '182', '183' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '92', '87', NULL, NULL, 'edit', '184', '185' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '93', '87', NULL, NULL, 'delete', '186', '187' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '94', '46', NULL, NULL, 'Users', '189', '204' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '95', '94', NULL, NULL, 'index', '190', '191' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '96', '94', NULL, NULL, 'view', '192', '193' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '97', '94', NULL, NULL, 'add', '194', '195' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '98', '94', NULL, NULL, 'edit', '196', '197' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '99', '94', NULL, NULL, 'delete', '198', '199' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '100', '94', NULL, NULL, 'login', '200', '201' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '101', '94', NULL, NULL, 'logout', '202', '203' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '102', '1', NULL, NULL, 'DebugKit', '206', '225' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '103', '102', NULL, NULL, 'Panels', '207', '214' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '104', '103', NULL, NULL, 'beforeRender', '208', '209' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '105', '103', NULL, NULL, 'index', '210', '211' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '106', '103', NULL, NULL, 'view', '212', '213' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '107', '102', NULL, NULL, 'Requests', '215', '220' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '108', '107', NULL, NULL, 'beforeRender', '216', '217' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '109', '107', NULL, NULL, 'view', '218', '219' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '110', '102', NULL, NULL, 'Toolbar', '221', '224' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '111', '110', NULL, NULL, 'clearCache', '222', '223' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '112', '1', NULL, NULL, 'Documents', '226', '277' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '113', '112', NULL, NULL, 'Categories', '227', '240' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '114', '113', NULL, NULL, 'index', '228', '229' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '115', '113', NULL, NULL, 'add', '230', '231' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '116', '113', NULL, NULL, 'edit', '232', '233' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '117', '113', NULL, NULL, 'delete', '234', '235' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '118', '113', NULL, NULL, 'moveUp', '236', '237' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '119', '113', NULL, NULL, 'moveDown', '238', '239' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '120', '112', NULL, NULL, 'beforeRender', '241', '242' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '121', '112', NULL, NULL, 'index', '243', '244' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '122', '112', NULL, NULL, 'view', '245', '246' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '123', '112', NULL, NULL, 'add', '247', '248' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '124', '112', NULL, NULL, 'edit', '249', '250' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '125', '112', NULL, NULL, 'delete', '251', '252' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '126', '71', NULL, NULL, 'ticketBus', '148', '149' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '127', '112', NULL, NULL, 'beforeRender', '253', '254' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '128', '112', NULL, NULL, 'index', '255', '256' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '129', '112', NULL, NULL, 'view', '257', '258' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '130', '112', NULL, NULL, 'add', '259', '260' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '131', '112', NULL, NULL, 'edit', '261', '262' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '132', '112', NULL, NULL, 'delete', '263', '264' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '133', '27', NULL, NULL, 'check', '71', '72' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '134', '112', NULL, NULL, 'beforeRender', '265', '266' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '135', '112', NULL, NULL, 'index', '267', '268' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '136', '112', NULL, NULL, 'view', '269', '270' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '137', '112', NULL, NULL, 'add', '271', '272' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '138', '112', NULL, NULL, 'edit', '273', '274' );
INSERT INTO `acos`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '139', '112', NULL, NULL, 'delete', '275', '276' );
-- ---------------------------------------------------------


-- Dump data of "aros" -------------------------------------
INSERT INTO `aros`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '1', NULL, 'Groups', '1', 'Administrator', '1', '6' );
INSERT INTO `aros`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '2', NULL, 'Groups', '2', 'Manager', '7', '12' );
INSERT INTO `aros`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '3', NULL, 'Groups', '3', 'User', '13', '20' );
INSERT INTO `aros`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '4', '1', 'Roles', '1', 'Root', '2', '5' );
INSERT INTO `aros`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '5', '2', 'Roles', '2', 'Sales', '8', '11' );
INSERT INTO `aros`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '6', '3', 'Roles', '3', 'User', '14', '19' );
INSERT INTO `aros`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '7', '4', 'Users', '1', 'dedeo.widodo@gmail.com', '3', '4' );
INSERT INTO `aros`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '8', '5', 'Users', '2', 'sales@bintangtimur.com', '9', '10' );
INSERT INTO `aros`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '9', '6', 'Users', '3', 'user@bintangtimur.com', '15', '16' );
INSERT INTO `aros`(`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES ( '10', '6', 'Users', '4', 'dedeo@gmail.com', '17', '18' );
-- ---------------------------------------------------------


-- Dump data of "aros_acos" --------------------------------
INSERT INTO `aros_acos`(`id`,`aro_id`,`aco_id`,`_create`,`_read`,`_update`,`_delete`) VALUES ( '1', '1', '1', '1', '1', '1', '1' );
INSERT INTO `aros_acos`(`id`,`aro_id`,`aco_id`,`_create`,`_read`,`_update`,`_delete`) VALUES ( '2', '4', '1', '1', '1', '1', '1' );
-- ---------------------------------------------------------


-- Dump data of "avatars" ----------------------------------
-- ---------------------------------------------------------


-- Dump data of "buses" ------------------------------------
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '44', 'DP-7879-GA', 'sleeper_seat', 'DP 7879 GA', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '18', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '45', 'DP-7879-GB', 'sleeper_seat', 'DP 7879 GB', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '18', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '46', 'DP-7879-GC', 'hight_class', 'DP 7879 GC', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '28', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '47', 'DP-7879-GD', 'hight_class', 'DP 7879 GD', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '28', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '49', 'DP-7879-GE', 'sleeper_seat', 'DP 7879 GE', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '18', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '52', 'DP-7879-GF', 'sleeper_seat', 'DP 7879 GF', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '18', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '53', 'DP-7879-GG', 'hight_class', 'DP 7879 GG', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '28', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '54', 'DP-7879-GH', 'hight_class', 'DP 7879 GH', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '28', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '55', 'DP-7879-GI', 'big_top', 'DP 7879 GI', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '21', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '56', 'DP-7879-GJ', 'big_top', 'DP 7879 GJ', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '21', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '57', 'DP-7879-GK', 'big_top', 'DP 7879 GK', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '21', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '58', 'DP-7879-GL', 'big_top', 'DP 7879 GL', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '21', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '59', 'DP-7879-GM', 'hight_class', 'DP 7879 GM', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '28', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '60', 'DP-7879-GN', 'hight_class', 'DP 7879 GN', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '28', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '61', 'DP-7879-GO', 'hight_class', 'DP 7879 GO', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '28', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '62', 'DP-7879-GP', 'hight_class', 'DP 7879 GP', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '28', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '63', 'GP-7879-GQ', 'hight_class', 'GP 7879 GQ', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '28', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '64', 'DP-7879-GR', 'hight_class', 'DP 7879 GR', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '28', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '65', 'DP-7879-GS', 'hight_class', 'DP 7879 GS', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '28', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '66', 'DP-7879-GT', 'hight_class', 'DP 7879 GT', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '28', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '67', 'DP-7879-GU', 'hight_class', 'DP 7879 GU', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '28', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '68', 'DP-7879-GV', 'hight_class', 'DP 7879 GV', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '28', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '69', 'DP-7879-GW', 'big_top', 'DP 7879 GW', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '21', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '70', 'DP-7879-GY', 'big_top', 'DP 7879 GY', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '21', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '71', 'DD-7879-MB', 'hight_class', 'DD 7879 MB', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '28', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '72', 'DD-7879-MJ', 'hight_class', 'DD 7879 MJ', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '28', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '73', 'DD-7879-AC', 'hight_class', 'DD 7879 AC', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '28', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '74', 'DD-7879-AP', 'hight_class', 'DD 7879 AP', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '28', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '75', 'DD-7879-TR', 'hight_class', 'DD 7879 TR', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '28', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '76', 'DD-7879-PL', 'hight_class', 'DD 7879 PL', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '28', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '77', 'DD-7879-AY', 'hight_class', 'DD 7879 AY', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '28', '1' );
INSERT INTO `buses`(`id`,`name`,`class`,`plat_no`,`facilities`,`capacity`,`status`) VALUES ( '79', 'DD-7879-MK', 'hight_class', 'DD 7879 MK', 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}', '28', '1' );
-- ---------------------------------------------------------


-- Dump data of "categories" -------------------------------
-- ---------------------------------------------------------


-- Dump data of "cities" -----------------------------------
INSERT INTO `cities`(`id`,`city`) VALUES ( '1', 'BATUSITANDUK' );
INSERT INTO `cities`(`id`,`city`) VALUES ( '2', 'BELOPA' );
INSERT INTO `cities`(`id`,`city`) VALUES ( '3', 'BONE-BONE' );
INSERT INTO `cities`(`id`,`city`) VALUES ( '4', 'KALAENA KIRI' );
INSERT INTO `cities`(`id`,`city`) VALUES ( '5', 'KERTO' );
INSERT INTO `cities`(`id`,`city`) VALUES ( '6', 'LAMASI' );
INSERT INTO `cities`(`id`,`city`) VALUES ( '7', 'MAKALE' );
INSERT INTO `cities`(`id`,`city`) VALUES ( '8', 'MAKASAR' );
INSERT INTO `cities`(`id`,`city`) VALUES ( '9', 'MALILI' );
INSERT INTO `cities`(`id`,`city`) VALUES ( '10', 'MAMUJU' );
INSERT INTO `cities`(`id`,`city`) VALUES ( '11', 'MANGKUTANA' );
INSERT INTO `cities`(`id`,`city`) VALUES ( '12', 'MARIO' );
INSERT INTO `cities`(`id`,`city`) VALUES ( '13', 'MASAMBA' );
INSERT INTO `cities`(`id`,`city`) VALUES ( '14', 'PALOPO' );
INSERT INTO `cities`(`id`,`city`) VALUES ( '15', 'RANTEDAMAI' );
INSERT INTO `cities`(`id`,`city`) VALUES ( '16', 'RANTEPAO' );
INSERT INTO `cities`(`id`,`city`) VALUES ( '17', 'SABBANG' );
INSERT INTO `cities`(`id`,`city`) VALUES ( '18', 'SALULEMO' );
INSERT INTO `cities`(`id`,`city`) VALUES ( '19', 'SERITI' );
INSERT INTO `cities`(`id`,`city`) VALUES ( '20', 'SOROWAKO' );
INSERT INTO `cities`(`id`,`city`) VALUES ( '21', 'SUKAMAJU' );
INSERT INTO `cities`(`id`,`city`) VALUES ( '22', 'WASUPONDA' );
INSERT INTO `cities`(`id`,`city`) VALUES ( '23', 'WAWONDULA' );
-- ---------------------------------------------------------


-- Dump data of "customers" --------------------------------
INSERT INTO `customers`(`id`,`user_id`,`name`,`firstname`,`lastname`,`email`,`password`,`phone`,`address`) VALUES ( '5', NULL, 'ronal', NULL, NULL, '', NULL, '000', NULL );
INSERT INTO `customers`(`id`,`user_id`,`name`,`firstname`,`lastname`,`email`,`password`,`phone`,`address`) VALUES ( '6', NULL, 'ronal', NULL, NULL, '', NULL, '000', NULL );
INSERT INTO `customers`(`id`,`user_id`,`name`,`firstname`,`lastname`,`email`,`password`,`phone`,`address`) VALUES ( '7', NULL, 'ronal', NULL, NULL, '', NULL, '08525807848', NULL );
INSERT INTO `customers`(`id`,`user_id`,`name`,`firstname`,`lastname`,`email`,`password`,`phone`,`address`) VALUES ( '8', NULL, 'ronal', NULL, NULL, '', NULL, '000', NULL );
INSERT INTO `customers`(`id`,`user_id`,`name`,`firstname`,`lastname`,`email`,`password`,`phone`,`address`) VALUES ( '9', NULL, 'ronal', NULL, NULL, '', NULL, '000', NULL );
INSERT INTO `customers`(`id`,`user_id`,`name`,`firstname`,`lastname`,`email`,`password`,`phone`,`address`) VALUES ( '10', NULL, 'ronal', NULL, NULL, '', NULL, '08525807848', NULL );
INSERT INTO `customers`(`id`,`user_id`,`name`,`firstname`,`lastname`,`email`,`password`,`phone`,`address`) VALUES ( '11', NULL, 'peris', NULL, NULL, '', NULL, NULL, NULL );
INSERT INTO `customers`(`id`,`user_id`,`name`,`firstname`,`lastname`,`email`,`password`,`phone`,`address`) VALUES ( '12', NULL, 'gope', NULL, NULL, '', NULL, NULL, NULL );
INSERT INTO `customers`(`id`,`user_id`,`name`,`firstname`,`lastname`,`email`,`password`,`phone`,`address`) VALUES ( '13', NULL, 'peris', NULL, NULL, '', NULL, NULL, NULL );
INSERT INTO `customers`(`id`,`user_id`,`name`,`firstname`,`lastname`,`email`,`password`,`phone`,`address`) VALUES ( '14', NULL, 'ronal', NULL, NULL, '', NULL, NULL, NULL );
INSERT INTO `customers`(`id`,`user_id`,`name`,`firstname`,`lastname`,`email`,`password`,`phone`,`address`) VALUES ( '15', NULL, 'ronal', NULL, NULL, '', NULL, NULL, NULL );
INSERT INTO `customers`(`id`,`user_id`,`name`,`firstname`,`lastname`,`email`,`password`,`phone`,`address`) VALUES ( '16', NULL, 'nama saya', NULL, NULL, '', NULL, '081900000', NULL );
INSERT INTO `customers`(`id`,`user_id`,`name`,`firstname`,`lastname`,`email`,`password`,`phone`,`address`) VALUES ( '17', NULL, 'ronal', NULL, NULL, '', NULL, '08525807848', NULL );
INSERT INTO `customers`(`id`,`user_id`,`name`,`firstname`,`lastname`,`email`,`password`,`phone`,`address`) VALUES ( '18', NULL, 'peris', NULL, NULL, '', NULL, '085396516708', NULL );
INSERT INTO `customers`(`id`,`user_id`,`name`,`firstname`,`lastname`,`email`,`password`,`phone`,`address`) VALUES ( '19', NULL, 'asdf', NULL, NULL, '', NULL, '08525807848', NULL );
INSERT INTO `customers`(`id`,`user_id`,`name`,`firstname`,`lastname`,`email`,`password`,`phone`,`address`) VALUES ( '20', NULL, 'PERIS', NULL, NULL, '', NULL, '085396516708', NULL );
INSERT INTO `customers`(`id`,`user_id`,`name`,`firstname`,`lastname`,`email`,`password`,`phone`,`address`) VALUES ( '21', NULL, 'nama saya', NULL, NULL, '', NULL, '+628111122233', NULL );
INSERT INTO `customers`(`id`,`user_id`,`name`,`firstname`,`lastname`,`email`,`password`,`phone`,`address`) VALUES ( '22', NULL, 'nama saya', NULL, NULL, '', NULL, '+628111122233', NULL );
INSERT INTO `customers`(`id`,`user_id`,`name`,`firstname`,`lastname`,`email`,`password`,`phone`,`address`) VALUES ( '23', NULL, 'Nita', NULL, NULL, 'yohanes@icubeonline.com', NULL, '+628111122233', NULL );
INSERT INTO `customers`(`id`,`user_id`,`name`,`firstname`,`lastname`,`email`,`password`,`phone`,`address`) VALUES ( '24', NULL, 'yohanes widodo', NULL, NULL, 'yohanes@icubeonline.com', NULL, '+628111122233', NULL );
INSERT INTO `customers`(`id`,`user_id`,`name`,`firstname`,`lastname`,`email`,`password`,`phone`,`address`) VALUES ( '25', NULL, 'yohanes widodo', NULL, NULL, 'yohanes@icubeonline.com', NULL, '+628111122233', NULL );
INSERT INTO `customers`(`id`,`user_id`,`name`,`firstname`,`lastname`,`email`,`password`,`phone`,`address`) VALUES ( '26', NULL, 'Nama Kamu', NULL, NULL, 'yohanes@icubeonline.com', NULL, '+628111122233', NULL );
INSERT INTO `customers`(`id`,`user_id`,`name`,`firstname`,`lastname`,`email`,`password`,`phone`,`address`) VALUES ( '27', NULL, 'yohanes widodo', NULL, NULL, 'yohanes@icubeonline.com', NULL, '+628111122233', NULL );
INSERT INTO `customers`(`id`,`user_id`,`name`,`firstname`,`lastname`,`email`,`password`,`phone`,`address`) VALUES ( '28', NULL, 'yohanes widodo', NULL, NULL, 'yohanes@icubeonline.com', NULL, '+628111122233', NULL );
INSERT INTO `customers`(`id`,`user_id`,`name`,`firstname`,`lastname`,`email`,`password`,`phone`,`address`) VALUES ( '29', NULL, 'yohanes widodo', NULL, NULL, 'yohanes@icubeonline.com', NULL, '+628111122233', NULL );
-- ---------------------------------------------------------


-- Dump data of "documents" --------------------------------
-- ---------------------------------------------------------


-- Dump data of "groups" -----------------------------------
INSERT INTO `groups`(`id`,`name`,`created`,`modified`) VALUES ( '1', 'Administrator', '2016-12-09 14:16:53', '2016-12-09 14:16:53' );
INSERT INTO `groups`(`id`,`name`,`created`,`modified`) VALUES ( '2', 'Manager', '2016-12-09 14:24:56', '2016-12-09 14:24:56' );
INSERT INTO `groups`(`id`,`name`,`created`,`modified`) VALUES ( '3', 'User', '2016-12-09 14:28:10', '2016-12-09 14:28:10' );
-- ---------------------------------------------------------


-- Dump data of "roles" ------------------------------------
INSERT INTO `roles`(`id`,`group_id`,`name`,`created`,`modified`) VALUES ( '1', '1', 'Root', '2016-12-09 14:17:13', '2016-12-09 14:17:13' );
INSERT INTO `roles`(`id`,`group_id`,`name`,`created`,`modified`) VALUES ( '2', '2', 'Sales', '2016-12-09 14:25:34', '2016-12-09 14:25:34' );
INSERT INTO `roles`(`id`,`group_id`,`name`,`created`,`modified`) VALUES ( '3', '3', 'User', '2016-12-09 14:28:23', '2016-12-09 14:28:23' );
-- ---------------------------------------------------------


-- Dump data of "route_destinations" -----------------------
-- ---------------------------------------------------------


-- Dump data of "routes" -----------------------------------
INSERT INTO `routes`(`id`,`name`,`source`,`destination`,`distance`,`fare`,`create_at`,`parent_route`) VALUES ( '1', 'MAKASAR - SOROWAKO', '8', '20', NULL, NULL, '2017-01-14 19:01:43', '0' );
INSERT INTO `routes`(`id`,`name`,`source`,`destination`,`distance`,`fare`,`create_at`,`parent_route`) VALUES ( '2', 'MAKASAR - WAWONDULA', '8', '23', NULL, NULL, '2017-01-14 19:01:10', '1' );
INSERT INTO `routes`(`id`,`name`,`source`,`destination`,`distance`,`fare`,`create_at`,`parent_route`) VALUES ( '3', 'MAKASAR - WASUPONDA', '8', '22', NULL, NULL, '2017-01-14 19:01:28', '1' );
INSERT INTO `routes`(`id`,`name`,`source`,`destination`,`distance`,`fare`,`create_at`,`parent_route`) VALUES ( '4', 'MAKASAR - MALILI', '8', '9', NULL, NULL, '2017-01-14 19:01:43', '0' );
INSERT INTO `routes`(`id`,`name`,`source`,`destination`,`distance`,`fare`,`create_at`,`parent_route`) VALUES ( '5', 'MAKASAR - MANGKUTANA', '8', '11', NULL, NULL, '2017-01-14 19:01:11', '0' );
INSERT INTO `routes`(`id`,`name`,`source`,`destination`,`distance`,`fare`,`create_at`,`parent_route`) VALUES ( '6', 'MAKASAR - MASAMBA', '8', '13', NULL, NULL, '2017-01-14 19:01:21', '5' );
INSERT INTO `routes`(`id`,`name`,`source`,`destination`,`distance`,`fare`,`create_at`,`parent_route`) VALUES ( '7', 'MAKASAR - BONE-BONE', '8', '3', NULL, NULL, '2017-01-14 19:01:33', '0' );
INSERT INTO `routes`(`id`,`name`,`source`,`destination`,`distance`,`fare`,`create_at`,`parent_route`) VALUES ( '8', 'MAKASAR - SUKAMAJU', '8', '21', NULL, NULL, '2017-01-14 19:01:49', '7' );
INSERT INTO `routes`(`id`,`name`,`source`,`destination`,`distance`,`fare`,`create_at`,`parent_route`) VALUES ( '9', 'MAKASAR - SABBANG', '8', '17', NULL, NULL, '2017-01-14 19:01:19', '7' );
INSERT INTO `routes`(`id`,`name`,`source`,`destination`,`distance`,`fare`,`create_at`,`parent_route`) VALUES ( '10', 'MAKASAR - LAMASI', '8', '6', NULL, NULL, '2017-01-14 19:01:48', '0' );
INSERT INTO `routes`(`id`,`name`,`source`,`destination`,`distance`,`fare`,`create_at`,`parent_route`) VALUES ( '11', 'MAKASAR - SERITI', '8', '19', NULL, NULL, '2017-01-14 19:01:04', '10' );
INSERT INTO `routes`(`id`,`name`,`source`,`destination`,`distance`,`fare`,`create_at`,`parent_route`) VALUES ( '12', 'MAKASAR - BATUSITANDUK', '8', '1', NULL, NULL, '2017-01-14 19:01:25', '0' );
INSERT INTO `routes`(`id`,`name`,`source`,`destination`,`distance`,`fare`,`create_at`,`parent_route`) VALUES ( '13', 'MAKASAR - RANTEDAMAI', '8', '15', NULL, NULL, '2017-01-14 19:01:39', '12' );
INSERT INTO `routes`(`id`,`name`,`source`,`destination`,`distance`,`fare`,`create_at`,`parent_route`) VALUES ( '14', 'MAKASAR - PALOPO', '8', '14', NULL, NULL, '2017-01-14 19:01:51', '0' );
INSERT INTO `routes`(`id`,`name`,`source`,`destination`,`distance`,`fare`,`create_at`,`parent_route`) VALUES ( '15', 'MAKASAR - BELOPA', '8', '2', NULL, NULL, '2017-01-14 19:01:03', '14' );
-- ---------------------------------------------------------


-- Dump data of "schedules" --------------------------------
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '1', '0', '1', 'MAKASAR - SOROWAKO', '60', '18:00:00', '19:00:00', '2017-01-14 20:04:45', 'hight_class', '210000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '2', '1', '1', 'MAKASAR - SOROWAKO', '60', '18:00:00', '19:00:00', '2017-01-14 20:04:45', 'hight_class', '210000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '3', '2', '1', 'MAKASAR - SOROWAKO', '60', '18:00:00', '19:00:00', '2017-01-14 20:04:45', 'hight_class', '210000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '4', '3', '1', 'MAKASAR - SOROWAKO', '60', '18:00:00', '19:00:00', '2017-01-14 20:04:45', 'hight_class', '210000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '5', '4', '1', 'MAKASAR - SOROWAKO', '60', '18:00:00', '19:00:00', '2017-01-14 20:04:45', 'hight_class', '210000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '6', '5', '1', 'MAKASAR - SOROWAKO', '60', '18:00:00', '19:00:00', '2017-01-14 20:04:45', 'hight_class', '210000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '7', '6', '1', 'MAKASAR - SOROWAKO', '60', '18:00:00', '19:00:00', '2017-01-14 20:04:45', 'hight_class', '210000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '8', '0', '2', 'MAKASAR - WAWONDULA', '60', '18:00:00', '19:00:00', '2017-01-14 20:07:43', 'hight_class', '210000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '9', '1', '2', 'MAKASAR - WAWONDULA', '60', '18:00:00', '19:00:00', '2017-01-14 20:07:43', 'hight_class', '210000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '10', '2', '2', 'MAKASAR - WAWONDULA', '60', '18:00:00', '19:00:00', '2017-01-14 20:07:43', 'hight_class', '210000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '11', '3', '2', 'MAKASAR - WAWONDULA', '60', '18:00:00', '19:00:00', '2017-01-14 20:07:43', 'hight_class', '210000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '12', '4', '2', 'MAKASAR - WAWONDULA', '60', '18:00:00', '19:00:00', '2017-01-14 20:07:43', 'hight_class', '210000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '13', '5', '2', 'MAKASAR - WAWONDULA', '60', '18:00:00', '19:00:00', '2017-01-14 20:07:43', 'hight_class', '210000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '14', '6', '2', 'MAKASAR - WAWONDULA', '60', '18:00:00', '19:00:00', '2017-01-14 20:07:43', 'hight_class', '210000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '15', '0', '3', 'MAKASAR - WASUPONDA', '60', '18:00:00', '19:00:00', '2017-01-14 20:08:33', 'hight_class', '210000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '16', '1', '3', 'MAKASAR - WASUPONDA', '60', '18:00:00', '19:00:00', '2017-01-14 20:08:34', 'hight_class', '210000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '17', '2', '3', 'MAKASAR - WASUPONDA', '60', '18:00:00', '19:00:00', '2017-01-14 20:08:34', 'hight_class', '210000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '18', '3', '3', 'MAKASAR - WASUPONDA', '60', '18:00:00', '19:00:00', '2017-01-14 20:08:34', 'hight_class', '210000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '19', '4', '3', 'MAKASAR - WASUPONDA', '60', '18:00:00', '19:00:00', '2017-01-14 20:08:34', 'hight_class', '210000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '20', '5', '3', 'MAKASAR - WASUPONDA', '60', '18:00:00', '19:00:00', '2017-01-14 20:08:34', 'hight_class', '210000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '21', '6', '3', 'MAKASAR - WASUPONDA', '60', '18:00:00', '19:00:00', '2017-01-14 20:08:34', 'hight_class', '210000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '22', '0', '1', 'MAKASAR - SOROWAKO', '69', '18:00:00', '19:00:00', '2017-01-14 20:10:20', 'big_top', '250000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '23', '1', '1', 'MAKASAR - SOROWAKO', '69', '18:00:00', '19:00:00', '2017-01-14 20:10:20', 'big_top', '250000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '24', '2', '1', 'MAKASAR - SOROWAKO', '69', '18:00:00', '19:00:00', '2017-01-14 20:10:20', 'big_top', '250000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '25', '3', '1', 'MAKASAR - SOROWAKO', '69', '18:00:00', '19:00:00', '2017-01-14 20:10:20', 'big_top', '250000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '26', '4', '1', 'MAKASAR - SOROWAKO', '69', '18:00:00', '19:00:00', '2017-01-14 20:10:20', 'big_top', '250000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '27', '5', '1', 'MAKASAR - SOROWAKO', '69', '18:00:00', '19:00:00', '2017-01-14 20:10:20', 'big_top', '250000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '28', '6', '1', 'MAKASAR - SOROWAKO', '69', '18:00:00', '19:00:00', '2017-01-14 20:10:20', 'big_top', '250000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '29', '0', '2', 'MAKASAR - WAWONDULA', '69', '18:00:00', '19:00:00', '2017-01-14 20:11:03', 'big_top', '250000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '30', '1', '2', 'MAKASAR - WAWONDULA', '69', '18:00:00', '19:00:00', '2017-01-14 20:11:03', 'big_top', '250000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '31', '2', '2', 'MAKASAR - WAWONDULA', '69', '18:00:00', '19:00:00', '2017-01-14 20:11:03', 'big_top', '250000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '32', '3', '2', 'MAKASAR - WAWONDULA', '69', '18:00:00', '19:00:00', '2017-01-14 20:11:03', 'big_top', '250000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '33', '4', '2', 'MAKASAR - WAWONDULA', '69', '18:00:00', '19:00:00', '2017-01-14 20:11:03', 'big_top', '250000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '34', '5', '2', 'MAKASAR - WAWONDULA', '69', '18:00:00', '19:00:00', '2017-01-14 20:11:03', 'big_top', '250000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '35', '6', '2', 'MAKASAR - WAWONDULA', '69', '18:00:00', '19:00:00', '2017-01-14 20:11:03', 'big_top', '250000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '36', '0', '3', 'MAKASAR - WASUPONDA', '69', '18:00:00', '19:00:00', '2017-01-14 20:12:10', 'big_top', '250000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '37', '1', '3', 'MAKASAR - WASUPONDA', '69', '18:00:00', '19:00:00', '2017-01-14 20:12:10', 'big_top', '250000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '38', '2', '3', 'MAKASAR - WASUPONDA', '69', '18:00:00', '19:00:00', '2017-01-14 20:12:10', 'big_top', '250000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '39', '3', '3', 'MAKASAR - WASUPONDA', '69', '18:00:00', '19:00:00', '2017-01-14 20:12:10', 'big_top', '250000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '40', '4', '3', 'MAKASAR - WASUPONDA', '69', '18:00:00', '19:00:00', '2017-01-14 20:12:10', 'big_top', '250000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '41', '5', '3', 'MAKASAR - WASUPONDA', '69', '18:00:00', '19:00:00', '2017-01-14 20:12:10', 'big_top', '250000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '42', '6', '3', 'MAKASAR - WASUPONDA', '69', '18:00:00', '19:00:00', '2017-01-14 20:12:11', 'big_top', '250000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '43', '0', '4', 'MAKASAR - MALILI', '72', '19:30:00', '20:30:00', '2017-01-14 20:13:10', 'hight_class', '190000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '44', '1', '4', 'MAKASAR - MALILI', '72', '19:30:00', '20:30:00', '2017-01-14 20:13:10', 'hight_class', '190000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '45', '2', '4', 'MAKASAR - MALILI', '72', '19:30:00', '20:30:00', '2017-01-14 20:13:10', 'hight_class', '190000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '46', '3', '4', 'MAKASAR - MALILI', '72', '19:30:00', '20:30:00', '2017-01-14 20:13:10', 'hight_class', '190000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '47', '4', '4', 'MAKASAR - MALILI', '72', '19:30:00', '20:30:00', '2017-01-14 20:13:10', 'hight_class', '190000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '48', '5', '4', 'MAKASAR - MALILI', '72', '19:30:00', '20:30:00', '2017-01-14 20:13:10', 'hight_class', '190000' );
INSERT INTO `schedules`(`id`,`day`,`route_id`,`route_name`,`bus_id`,`departure_time`,`arival_time`,`create_at`,`class`,`fare`) VALUES ( '49', '6', '4', 'MAKASAR - MALILI', '72', '19:30:00', '20:30:00', '2017-01-14 20:13:11', 'hight_class', '190000' );
-- ---------------------------------------------------------


-- Dump data of "ticket_orders" ----------------------------
INSERT INTO `ticket_orders`(`id`,`customer_id`,`ticket_id`,`ticket_code`,`date_create_at`,`time_create_at`,`departure_time`,`departure_date`,`arival_time`,`arival_date`,`fare`,`passegers`,`total`,`destination`,`sheet`) VALUES ( '2', '22', '2', 'BT0122002', '2017-01-14', '18:01:36', '18:01:00', '2017-01-16', '19:01:00', '2017-01-16', '210000', '2', '420000', '23', '2,3' );
INSERT INTO `ticket_orders`(`id`,`customer_id`,`ticket_id`,`ticket_code`,`date_create_at`,`time_create_at`,`departure_time`,`departure_date`,`arival_time`,`arival_date`,`fare`,`passegers`,`total`,`destination`,`sheet`) VALUES ( '3', '23', '2', 'BT0191625', '2017-01-15', '20:01:20', '18:00:00', '2017-01-16', '19:00:00', '2017-01-16', '210000', '3', '630000', '20', '6,9,10' );
INSERT INTO `ticket_orders`(`id`,`customer_id`,`ticket_id`,`ticket_code`,`date_create_at`,`time_create_at`,`departure_time`,`departure_date`,`arival_time`,`arival_date`,`fare`,`passegers`,`total`,`destination`,`sheet`) VALUES ( '4', '24', '2', 'BT0191837', '2017-01-15', '20:01:42', '18:00:00', '2017-01-16', '19:00:00', '2017-01-16', '210000', '3', '630000', '20', '12,14,13' );
INSERT INTO `ticket_orders`(`id`,`customer_id`,`ticket_id`,`ticket_code`,`date_create_at`,`time_create_at`,`departure_time`,`departure_date`,`arival_time`,`arival_date`,`fare`,`passegers`,`total`,`destination`,`sheet`) VALUES ( '6', '26', '3', 'BT01381043', '2017-01-15', '21:01:18', '18:00:00', '2017-01-17', '19:00:00', '2017-01-17', '250000', '3', '750000', '20', '1,6,7' );
INSERT INTO `ticket_orders`(`id`,`customer_id`,`ticket_id`,`ticket_code`,`date_create_at`,`time_create_at`,`departure_time`,`departure_date`,`arival_time`,`arival_date`,`fare`,`passegers`,`total`,`destination`,`sheet`) VALUES ( '7', '27', '5', 'BT01462417', '2017-01-15', '21:01:56', '19:30:00', '2017-01-18', '20:30:00', '2017-01-18', '190000', '2', '380000', '9', '8,10' );
INSERT INTO `ticket_orders`(`id`,`customer_id`,`ticket_id`,`ticket_code`,`date_create_at`,`time_create_at`,`departure_time`,`departure_date`,`arival_time`,`arival_date`,`fare`,`passegers`,`total`,`destination`,`sheet`) VALUES ( '8', '28', '6', 'BT01459481', '2017-01-15', '21:01:33', '19:30:00', '2017-01-17', '20:30:00', '2017-01-17', '190000', '2', '380000', '9', '3,4' );
INSERT INTO `ticket_orders`(`id`,`customer_id`,`ticket_id`,`ticket_code`,`date_create_at`,`time_create_at`,`departure_time`,`departure_date`,`arival_time`,`arival_date`,`fare`,`passegers`,`total`,`destination`,`sheet`) VALUES ( '9', '29', '6', 'BT01451032', '2017-01-15', '21:01:06', '19:30:00', '2017-01-17', '20:30:00', '2017-01-17', '190000', '2', '380000', '9', '8,26' );
-- ---------------------------------------------------------


-- Dump data of "ticket_passengers" ------------------------
-- ---------------------------------------------------------


-- Dump data of "tickets" ----------------------------------
INSERT INTO `tickets`(`id`,`schedule_id`,`route_id`,`date_create_at`,`departure_time`,`date`,`arival_time`,`stock`,`bus_id`) VALUES ( '1', '1', '1', '2017-01-14', '18:01:00', '2017-01-16', '19:01:00', '21', '69' );
INSERT INTO `tickets`(`id`,`schedule_id`,`route_id`,`date_create_at`,`departure_time`,`date`,`arival_time`,`stock`,`bus_id`) VALUES ( '2', '22', '1', '2017-01-14', '18:01:00', '2017-01-16', '19:01:00', '20', '60' );
INSERT INTO `tickets`(`id`,`schedule_id`,`route_id`,`date_create_at`,`departure_time`,`date`,`arival_time`,`stock`,`bus_id`) VALUES ( '3', NULL, '1', '2017-01-15', '18:01:00', '2017-01-17', '19:01:00', '18', '69' );
INSERT INTO `tickets`(`id`,`schedule_id`,`route_id`,`date_create_at`,`departure_time`,`date`,`arival_time`,`stock`,`bus_id`) VALUES ( '5', NULL, '4', '2017-01-15', '19:01:00', '2017-01-18', '20:01:00', '26', '72' );
INSERT INTO `tickets`(`id`,`schedule_id`,`route_id`,`date_create_at`,`departure_time`,`date`,`arival_time`,`stock`,`bus_id`) VALUES ( '6', NULL, '4', '2017-01-15', '19:01:00', '2017-01-17', '20:01:00', '24', '72' );
-- ---------------------------------------------------------


-- Dump data of "users" ------------------------------------
INSERT INTO `users`(`id`,`group_id`,`role_id`,`username`,`password`,`email`,`created`,`modified`) VALUES ( '1', '1', '1', 'admin', '$2y$10$p3anMj0b8Up4H9g/SLu7JuYGDqdXj/ybdgtfeIKIT6ydA1AdtxNLO', 'dedeo.widodo@gmail.com', '2016-12-09 00:17:34', '2016-12-09 14:17:34' );
-- ---------------------------------------------------------


-- CREATE INDEX "alias" ------------------------------------
CREATE INDEX `alias` USING BTREE ON `acos`( `alias` );
-- ---------------------------------------------------------


-- CREATE INDEX "lft" --------------------------------------
CREATE INDEX `lft` USING BTREE ON `acos`( `lft`, `rght` );
-- ---------------------------------------------------------


-- CREATE INDEX "alias" ------------------------------------
CREATE INDEX `alias` USING BTREE ON `aros`( `alias` );
-- ---------------------------------------------------------


-- CREATE INDEX "lft" --------------------------------------
CREATE INDEX `lft` USING BTREE ON `aros`( `lft`, `rght` );
-- ---------------------------------------------------------


-- CREATE INDEX "aco_id" -----------------------------------
CREATE INDEX `aco_id` USING BTREE ON `aros_acos`( `aco_id` );
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


