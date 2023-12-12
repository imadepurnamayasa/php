/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100428
 Source Host           : localhost:3306
 Source Schema         : admin

 Target Server Type    : MySQL
 Target Server Version : 100428
 File Encoding         : 65001

 Date: 12/12/2023 15:54:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for m_menu
-- ----------------------------
DROP TABLE IF EXISTS `m_menu`;
CREATE TABLE `m_menu`  (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NAMA` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `M_MENU_ID` int NULL DEFAULT NULL,
  `M_MODUL_ID` int NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_menu
-- ----------------------------
INSERT INTO `m_menu` VALUES (1, 'Sistem', NULL, NULL);
INSERT INTO `m_menu` VALUES (2, 'Menu', 1, 1);
INSERT INTO `m_menu` VALUES (3, 'Aplikasi', 1, 2);
INSERT INTO `m_menu` VALUES (4, 'Hak Akses', 1, 3);
INSERT INTO `m_menu` VALUES (5, 'Pengguna', 1, 4);

-- ----------------------------
-- Table structure for m_modul
-- ----------------------------
DROP TABLE IF EXISTS `m_modul`;
CREATE TABLE `m_modul`  (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NAMA` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `LOKASI` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_modul
-- ----------------------------
INSERT INTO `m_modul` VALUES (1, 'Menu', 'sistem/menu/menu.php');
INSERT INTO `m_modul` VALUES (2, 'Aplikasi', 'sistem/aplikasi/aplikasi.php');
INSERT INTO `m_modul` VALUES (3, 'Hak Akses', 'sistem/hak_akses/hak_akses.php');
INSERT INTO `m_modul` VALUES (4, 'Pengguna', 'sistem/pengguna/pengguna.php');

SET FOREIGN_KEY_CHECKS = 1;
