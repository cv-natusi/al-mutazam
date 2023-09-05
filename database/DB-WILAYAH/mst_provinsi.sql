/*
 Navicat Premium Data Transfer

 Source Server         : mylocal
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : lbm-smk

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 31/08/2023 22:52:28
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for mst_provinsi
-- ----------------------------
DROP TABLE IF EXISTS `mst_provinsi`;
CREATE TABLE `mst_provinsi`  (
  `id` char(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of mst_provinsi
-- ----------------------------
INSERT INTO `mst_provinsi` VALUES ('11', 'ACEH');
INSERT INTO `mst_provinsi` VALUES ('12', 'SUMATERA UTARA');
INSERT INTO `mst_provinsi` VALUES ('13', 'SUMATERA BARAT');
INSERT INTO `mst_provinsi` VALUES ('14', 'RIAU');
INSERT INTO `mst_provinsi` VALUES ('15', 'JAMBI');
INSERT INTO `mst_provinsi` VALUES ('16', 'SUMATERA SELATAN');
INSERT INTO `mst_provinsi` VALUES ('17', 'BENGKULU');
INSERT INTO `mst_provinsi` VALUES ('18', 'LAMPUNG');
INSERT INTO `mst_provinsi` VALUES ('19', 'KEPULAUAN BANGKA BELITUNG');
INSERT INTO `mst_provinsi` VALUES ('21', 'KEPULAUAN RIAU');
INSERT INTO `mst_provinsi` VALUES ('31', 'DKI JAKARTA');
INSERT INTO `mst_provinsi` VALUES ('32', 'JAWA BARAT');
INSERT INTO `mst_provinsi` VALUES ('33', 'JAWA TENGAH');
INSERT INTO `mst_provinsi` VALUES ('34', 'DAERAH ISTIMEWA YOGYAKARTA');
INSERT INTO `mst_provinsi` VALUES ('35', 'JAWA TIMUR');
INSERT INTO `mst_provinsi` VALUES ('36', 'BANTEN');
INSERT INTO `mst_provinsi` VALUES ('51', 'BALI');
INSERT INTO `mst_provinsi` VALUES ('52', 'NUSA TENGGARA BARAT');
INSERT INTO `mst_provinsi` VALUES ('53', 'NUSA TENGGARA TIMUR');
INSERT INTO `mst_provinsi` VALUES ('61', 'KALIMANTAN BARAT');
INSERT INTO `mst_provinsi` VALUES ('62', 'KALIMANTAN TENGAH');
INSERT INTO `mst_provinsi` VALUES ('63', 'KALIMANTAN SELATAN');
INSERT INTO `mst_provinsi` VALUES ('64', 'KALIMANTAN TIMUR');
INSERT INTO `mst_provinsi` VALUES ('65', 'KALIMANTAN UTARA');
INSERT INTO `mst_provinsi` VALUES ('71', 'SULAWESI UTARA');
INSERT INTO `mst_provinsi` VALUES ('72', 'SULAWESI TENGAH');
INSERT INTO `mst_provinsi` VALUES ('73', 'SULAWESI SELATAN');
INSERT INTO `mst_provinsi` VALUES ('74', 'SULAWESI TENGGARA');
INSERT INTO `mst_provinsi` VALUES ('75', 'GORONTALO');
INSERT INTO `mst_provinsi` VALUES ('76', 'SULAWESI BARAT');
INSERT INTO `mst_provinsi` VALUES ('81', 'MALUKU');
INSERT INTO `mst_provinsi` VALUES ('82', 'MALUKU UTARA');
INSERT INTO `mst_provinsi` VALUES ('91', 'PAPUA');
INSERT INTO `mst_provinsi` VALUES ('92', 'PAPUA BARAT');

SET FOREIGN_KEY_CHECKS = 1;
