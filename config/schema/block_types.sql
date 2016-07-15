/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50542
 Source Host           : localhost
 Source Database       : backoffice

 Target Server Type    : MySQL
 Target Server Version : 50542
 File Encoding         : utf-8

 Date: 07/13/2016 14:37:29 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `block_types`
-- ----------------------------
DROP TABLE IF EXISTS `block_types`;
CREATE TABLE `block_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `block_types`
-- ----------------------------
BEGIN;
INSERT INTO `block_types` VALUES ('1', 'Text', ''), ('2', 'Image', ''), ('3', 'Slider', '');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
