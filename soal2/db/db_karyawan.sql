/*
 Navicat Premium Data Transfer

 Source Server         : master data
 Source Server Type    : MySQL
 Source Server Version : 50650
 Source Host           : localhost:3306
 Source Schema         : db_karyawan

 Target Server Type    : MySQL
 Target Server Version : 50650
 File Encoding         : 65001

 Date: 25/03/2021 14:40:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for m_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `m_jabatan`;
CREATE TABLE `m_jabatan` (
  `KD_JABATAN` varchar(255) NOT NULL,
  `DESC` varchar(255) DEFAULT NULL,
  `RANK` int(11) DEFAULT NULL,
  PRIMARY KEY (`KD_JABATAN`) USING BTREE,
  KEY `PK1` (`KD_JABATAN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_jabatan
-- ----------------------------
BEGIN;
INSERT INTO `m_jabatan` VALUES ('50002161', 'General Manager', 1);
INSERT INTO `m_jabatan` VALUES ('50002162', 'Staf Utama I', 2);
INSERT INTO `m_jabatan` VALUES ('50002163', 'Staf Utama II', 3);
INSERT INTO `m_jabatan` VALUES ('50002164', 'Manager', 4);
INSERT INTO `m_jabatan` VALUES ('50002165', 'Staf Madya I', 5);
INSERT INTO `m_jabatan` VALUES ('50002166', 'Staf Madya II', 6);
INSERT INTO `m_jabatan` VALUES ('50002167', 'Superintendent', 7);
INSERT INTO `m_jabatan` VALUES ('50002168', 'Staf Muda I', 9);
INSERT INTO `m_jabatan` VALUES ('50002169', 'Staf Muda II', 10);
INSERT INTO `m_jabatan` VALUES ('50002170', 'Supervisor', 11);
INSERT INTO `m_jabatan` VALUES ('50002171', 'Staf Pratama I', 12);
INSERT INTO `m_jabatan` VALUES ('50002173', 'Staf Pratama II', 13);
INSERT INTO `m_jabatan` VALUES ('50002175', 'Staf Pratama III', 14);
INSERT INTO `m_jabatan` VALUES ('50002176', 'Pelaksana Utama', 15);
INSERT INTO `m_jabatan` VALUES ('50002177', 'Pelaksana Madya', 16);
INSERT INTO `m_jabatan` VALUES ('50002178', 'Pelaksana Muda', 17);
INSERT INTO `m_jabatan` VALUES ('50002179', 'Pelaksana Pratama', 18);
INSERT INTO `m_jabatan` VALUES ('50004426', 'Ass. Superintendent', 8);
COMMIT;

-- ----------------------------
-- Table structure for m_karyawan
-- ----------------------------
DROP TABLE IF EXISTS `m_karyawan`;
CREATE TABLE `m_karyawan` (
  `NO_BADGE` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA` varchar(255) DEFAULT NULL,
  `SALUTATION` varchar(255) DEFAULT NULL,
  `TEMPAT_LAHIR` varchar(255) DEFAULT NULL,
  `DATE_OF_BIRTH` date DEFAULT NULL,
  `JK` varchar(255) DEFAULT 'Male',
  `STATUS_KAWIN` varchar(255) DEFAULT 'Nikah',
  `UNIT_KERJA` varchar(255) DEFAULT NULL,
  `KD_JABATAN` varchar(255) DEFAULT NULL,
  `STATUS` varchar(30) DEFAULT 'aktif',
  PRIMARY KEY (`NO_BADGE`),
  KEY `no_badge` (`NO_BADGE`)
) ENGINE=InnoDB AUTO_INCREMENT=3022122 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_karyawan
-- ----------------------------
BEGIN;
INSERT INTO `m_karyawan` VALUES (3022111, 'Ronny Sarkasih', 'Bapak', 'Bandung', '1980-01-08', 'Male', 'Nikah', 'Bagian Rendal Produksi NPK 2', '50002167', 'aktif');
INSERT INTO `m_karyawan` VALUES (3022112, 'Aditya Gunawan', 'Bapak', 'Karawang', '1992-01-10', 'Male', 'Nikah', 'Bagian Produksi K1 A', '50002161', 'aktif');
INSERT INTO `m_karyawan` VALUES (3022113, 'Aditya Firman', 'Bapak', 'Bekasi', '1972-02-20', 'Male', 'Nikah', 'Bagian Teknologi Informasi', '50002166', 'aktif');
INSERT INTO `m_karyawan` VALUES (3022114, 'Dendi Nugraha', 'Bapak', 'Purwakarta', '1989-03-01', 'Male', 'Nikah', 'Bagian Akuntansi', '50002163', 'aktif');
INSERT INTO `m_karyawan` VALUES (3022115, 'Reksi Firmansyah', 'Bapak', 'Purwokerto', '1980-08-17', 'Male', 'Nikah', 'Bagian Keuangan', '50002164', 'aktif');
INSERT INTO `m_karyawan` VALUES (3022116, 'Dinda Ainun', 'Ibu', 'Karawang', '1984-09-01', 'Female', 'Nikah', 'Bagian Keuangan', '50002163', 'aktif');
INSERT INTO `m_karyawan` VALUES (3022117, 'Putri Nurul ', 'ibu', 'Karawang', '1993-01-02', 'Female', 'Nikah', 'Bagian Keuangan', '50002171', 'aktif');
INSERT INTO `m_karyawan` VALUES (3022118, 'Ferdiansyah', 'Bapak', 'Purwakarta', '1992-02-01', 'Male', 'Nikah', 'Bagian Akuntansi', '50002170', 'aktif');
INSERT INTO `m_karyawan` VALUES (3022119, 'Siti Syarifah', 'Ibu', 'Karawang', '1990-10-02', 'Female', 'Nikah', 'Bagian K3', '50002164', 'aktif');
INSERT INTO `m_karyawan` VALUES (3022120, 'Saipul Jamil', 'Bapak', 'Bekasi', '1993-11-01', 'Male', 'Nikah', 'Bagian Teknologi Informasi', '50002164', 'aktif');
INSERT INTO `m_karyawan` VALUES (3022121, 'Aliando Rizki', 'Bapak', 'Karawang', '1997-09-07', 'Male', 'Nikah', 'Bagian Teknologi Informasi', '50002171', 'aktif');
COMMIT;

-- ----------------------------
-- Table structure for m_keluarga
-- ----------------------------
DROP TABLE IF EXISTS `m_keluarga`;
CREATE TABLE `m_keluarga` (
  `FAMILY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NO_BADGE` varchar(255) DEFAULT NULL,
  `RELATIVE_ID` varchar(255) DEFAULT NULL,
  `RELATIVE` varchar(255) DEFAULT NULL,
  `NAMA` varchar(255) DEFAULT NULL,
  `GENDER` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`FAMILY_ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_keluarga
-- ----------------------------
BEGIN;
INSERT INTO `m_keluarga` VALUES (1, '3022111', '1', 'Pasangan', 'Siti Nurul', 'Female');
INSERT INTO `m_keluarga` VALUES (2, '3022111', '2', 'Anak', 'Dendi Roni', 'Male');
INSERT INTO `m_keluarga` VALUES (3, '3022111', '2', 'Anak', 'Rian', 'Male');
INSERT INTO `m_keluarga` VALUES (4, '3022112', '1', 'Pasangan', 'Fitri Nur', 'Female');
INSERT INTO `m_keluarga` VALUES (5, '3022113', '1', 'Pasangan', 'Nurul Suci', 'Female');
INSERT INTO `m_keluarga` VALUES (6, '3022113', '2', 'Anak', 'Roni Firmansyah', 'Male');
INSERT INTO `m_keluarga` VALUES (7, '3022113', '2', 'Anak', 'Jihan Nurul', 'Female');
INSERT INTO `m_keluarga` VALUES (8, '3022113', '2', 'Anak', 'Ferdian', 'Male');
INSERT INTO `m_keluarga` VALUES (9, '3022114', '1', 'Pasangan', 'Ayu Azhari', 'Female');
INSERT INTO `m_keluarga` VALUES (10, '3022114', '2', 'Anak', 'Jihan Azhari', 'Female');
INSERT INTO `m_keluarga` VALUES (11, '3022115', '1', 'Pasangan', 'Nita Harlita', 'Female');
INSERT INTO `m_keluarga` VALUES (12, '3022116', '1', 'Pasangan', 'M. Rizki Putra', 'Male');
INSERT INTO `m_keluarga` VALUES (13, '3022116', '2', 'Anak', 'Asep Nur Rizki', 'Male');
INSERT INTO `m_keluarga` VALUES (14, '3022117', '1', 'Pasangan', 'Maman Abdul', 'Male');
INSERT INTO `m_keluarga` VALUES (15, '3022117', '2', 'Anak', 'Rizki Nur Maman', 'Male');
INSERT INTO `m_keluarga` VALUES (16, '3022118', '1', 'Pasangan', 'Fitria Nur Apipah', 'Female');
INSERT INTO `m_keluarga` VALUES (17, '3022119', '1', 'Pasangan', 'Dendi Surendi', 'Male');
INSERT INTO `m_keluarga` VALUES (18, '3022119', '2', 'Anak', 'Priska Surendi', 'Female');
INSERT INTO `m_keluarga` VALUES (19, '3022120', '1', 'Pasangan', 'Ayu Ting Ting', 'Female');
INSERT INTO `m_keluarga` VALUES (20, '3022120', '2', 'Anak', 'Nazar', 'Male');
INSERT INTO `m_keluarga` VALUES (21, '3022121', '1', 'Pasangan', 'Prily Nur Apriani', 'Female');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
