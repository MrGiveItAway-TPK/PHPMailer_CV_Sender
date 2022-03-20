/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100422
 Source Host           : localhost:3306
 Source Schema         : cv_email

 Target Server Type    : MySQL
 Target Server Version : 100422
 File Encoding         : 65001

 Date: 20/03/2022 05:00:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for emails_cv
-- ----------------------------
DROP TABLE IF EXISTS `emails_cv`;
CREATE TABLE `emails_cv`  (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Company_Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Company_Name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Email_Status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Email_Status_Date` date NULL DEFAULT NULL,
  `Email_Status_Time` time(0) NULL DEFAULT NULL,
  `Email_Body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
