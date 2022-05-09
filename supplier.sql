/*
 Navicat Premium Data Transfer

 Source Server         : 本地连接
 Source Server Type    : MySQL
 Source Server Version : 80026
 Source Host           : localhost:3306
 Source Schema         : supplier_test

 Target Server Type    : MySQL
 Target Server Version : 80026
 File Encoding         : 65001

 Date: 08/05/2022 19:05:39
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `code` char(3) CHARACTER SET ascii COLLATE ascii_general_ci DEFAULT NULL,
  `t_status` enum('ok','hold') CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL DEFAULT 'ok',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of supplier
-- ----------------------------
BEGIN;
INSERT INTO `supplier` VALUES (1, 's01', 'A01', 'ok');
INSERT INTO `supplier` VALUES (2, 's02', 'A02', 'ok');
INSERT INTO `supplier` VALUES (3, 's03', 'c03', 'ok');
INSERT INTO `supplier` VALUES (4, 's04', 'c04', 'ok');
INSERT INTO `supplier` VALUES (5, 's05', 'c05', 'ok');
INSERT INTO `supplier` VALUES (6, 's06', 'c06', 'ok');
INSERT INTO `supplier` VALUES (7, 's07', 'c07', 'ok');
INSERT INTO `supplier` VALUES (8, 's08', 'c08', 'ok');
INSERT INTO `supplier` VALUES (9, 's09', 'c09', 'ok');
INSERT INTO `supplier` VALUES (10, 's10', 'c10', 'hold');
INSERT INTO `supplier` VALUES (11, 's11', 'c11', 'ok');
INSERT INTO `supplier` VALUES (12, 's12', 'c12', 'ok');
INSERT INTO `supplier` VALUES (13, 's13', 'c13', 'ok');
INSERT INTO `supplier` VALUES (14, 's14', 'c14', 'ok');
INSERT INTO `supplier` VALUES (15, 's15', 'c15', 'ok');
INSERT INTO `supplier` VALUES (16, 's16', 'c16', 'ok');
INSERT INTO `supplier` VALUES (17, 's17', 'c17', 'ok');
INSERT INTO `supplier` VALUES (18, 's18', 'c18', 'ok');
INSERT INTO `supplier` VALUES (19, 's19', 'c19', 'ok');
INSERT INTO `supplier` VALUES (20, 's20', 'c20', 'hold');
INSERT INTO `supplier` VALUES (21, 's21', 'c21', 'ok');
INSERT INTO `supplier` VALUES (22, 's22', 'c22', 'ok');
INSERT INTO `supplier` VALUES (23, 's23', 'c23', 'ok');
INSERT INTO `supplier` VALUES (24, 's24', 'c24', 'ok');
INSERT INTO `supplier` VALUES (25, 's25', 'c25', 'ok');
INSERT INTO `supplier` VALUES (26, 's26', 'c26', 'ok');
INSERT INTO `supplier` VALUES (27, 's27', 'c27', 'ok');
INSERT INTO `supplier` VALUES (28, 's28', 'c28', 'ok');
INSERT INTO `supplier` VALUES (29, 's29', 'c29', 'ok');
INSERT INTO `supplier` VALUES (30, 's30', 'c30', 'ok');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
