
-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'tbl_users'
-- 
-- ---

DROP TABLE IF EXISTS `tbl_users`;
		
CREATE TABLE `tbl_users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(15) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `activation_key` VARCHAR(255) NULL DEFAULT NULL,
  `status` TINYINT(2) NOT NULL DEFAULT 0 COMMENT '0 - not activated, 1 - not moderated, 2 - activated and mode',
  `registered_date` TIMESTAMP NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'tbl_products'
-- 
-- ---

DROP TABLE IF EXISTS `tbl_products`;
		
CREATE TABLE `tbl_products` (
  `id` INT(15) NOT NULL AUTO_INCREMENT,
  `sku` VARCHAR(16) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `price` DECIMAL(15) NOT NULL,
  `description` MEDIUMTEXT NULL DEFAULT NULL,
  `image` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'tbl_cheques'
-- 
-- ---

DROP TABLE IF EXISTS `tbl_cheques`;
		
CREATE TABLE `tbl_cheques` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `user_id` INT(10) NOT NULL,
  `product_id` INT(15) NOT NULL,
  `store_title` VARCHAR(255) NOT NULL,
  `store_address` MEDIUMTEXT NULL DEFAULT NULL,
  `phone` VARCHAR(255) NOT NULL,
  `image` VARCHAR(255) NOT NULL,
  `status` TINYINT(2) NOT NULL DEFAULT 0 COMMENT '0-not moderated, 1-moderated, not accepted, 2-moderated, acc',
  `registered_date` TIMESTAMP NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'tbl_feedback'
-- 
-- ---

DROP TABLE IF EXISTS `tbl_feedback`;
		
CREATE TABLE `tbl_feedback` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `user_id` INT(10) NULL DEFAULT NULL,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `status` TINYINT(2) NOT NULL DEFAULT 0 COMMENT '0 - not processed, 1 - processed',
  `created_date` TIMESTAMP NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `tbl_cheques` ADD FOREIGN KEY (user_id) REFERENCES `tbl_users` (`id`);
ALTER TABLE `tbl_cheques` ADD FOREIGN KEY (product_id) REFERENCES `tbl_products` (`id`);
ALTER TABLE `tbl_feedback` ADD FOREIGN KEY (user_id) REFERENCES `tbl_users` (`id`);

-- ---
-- Table Properties
-- ---

-- ALTER TABLE `tbl_users` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `tbl_products` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `tbl_cheques` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `tbl_feedback` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `tbl_users` (`id`,`name`,`email`,`phone`,`password`,`activation_key`,`status`,`registered_date`) VALUES
-- ('','','','','','','','');
-- INSERT INTO `tbl_products` (`id`,`sku`,`title`,`price`,`description`,`image`) VALUES
-- ('','','','','','');
-- INSERT INTO `tbl_cheques` (`id`,`user_id`,`product_id`,`store_title`,`store_address`,`phone`,`image`,`status`,`registered_date`) VALUES
-- ('','','','','','','','','');
-- INSERT INTO `tbl_feedback` (`id`,`user_id`,`name`,`email`,`status`,`created_date`) VALUES
-- ('','','','','','');
