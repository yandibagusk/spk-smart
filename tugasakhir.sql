/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.3.16-MariaDB : Database - tugasakhir
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tugasakhir` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `tugasakhir`;

/*Table structure for table `detail_perhitungan` */

DROP TABLE IF EXISTS `detail_perhitungan`;

CREATE TABLE `detail_perhitungan` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_perhitungan` int(11) DEFAULT NULL,
  `id_kamera` varchar(10) DEFAULT NULL,
  `skor_akhir` float DEFAULT NULL,
  PRIMARY KEY (`id_detail`),
  KEY `id_perhitungan` (`id_perhitungan`),
  KEY `id_kamera` (`id_kamera`),
  CONSTRAINT `detail_perhitungan_ibfk_1` FOREIGN KEY (`id_perhitungan`) REFERENCES `perhitungan` (`id_perhitungan`),
  CONSTRAINT `detail_perhitungan_ibfk_2` FOREIGN KEY (`id_kamera`) REFERENCES `kamera` (`id_kamera`)
) ENGINE=InnoDB AUTO_INCREMENT=1685 DEFAULT CHARSET=latin1;

/*Data for the table `detail_perhitungan` */

insert  into `detail_perhitungan`(`id_detail`,`id_perhitungan`,`id_kamera`,`skor_akhir`) values 
(1669,561,'CM002',0.538462),
(1670,561,'CM012',0.5),
(1671,561,'CM026',0.461538),
(1672,561,'CM044',0.512821),
(1673,562,'CM002',0.5),
(1674,562,'CM012',0.5),
(1675,562,'CM026',0.409091),
(1676,562,'CM044',0.545455),
(1677,563,'CM002',0.5),
(1678,563,'CM012',0.5),
(1679,563,'CM026',0.409091),
(1680,563,'CM044',0.545455),
(1681,564,'CM002',0.5),
(1682,564,'CM012',0.5),
(1683,564,'CM026',0.409091),
(1684,564,'CM044',0.545455);

/*Table structure for table `kamera` */

DROP TABLE IF EXISTS `kamera`;

CREATE TABLE `kamera` (
  `id_kamera` varchar(10) NOT NULL,
  `merk_kamera` varchar(10) DEFAULT NULL,
  `seri_kamera` varchar(20) DEFAULT NULL,
  `iso_max` varchar(10) DEFAULT NULL,
  `shutterspeed_max` varchar(10) DEFAULT NULL,
  `video_res` varchar(10) DEFAULT NULL,
  `megapixel` varchar(10) DEFAULT NULL,
  `jum_titikfokus` varchar(20) DEFAULT NULL,
  `battery_life` varchar(10) DEFAULT NULL,
  `harga` varchar(20) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_kamera`),
  KEY `id_kamera` (`merk_kamera`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kamera` */

insert  into `kamera`(`id_kamera`,`merk_kamera`,`seri_kamera`,`iso_max`,`shutterspeed_max`,`video_res`,`megapixel`,`jum_titikfokus`,`battery_life`,`harga`,`foto`) values 
('CM001','Canon','EOS M100','25600','4000','1080','24','49','295','5499000 ','Canon EOS M100.png'),
('CM002','Canon','EOS M200','25600','4000','2160','24','143','315','7975000   ','Canon EOS M200.png'),
('CM003','Canon','EOS M5','25600','4000','1080','24','49','295','12200000 ','Canon EOS M5.png'),
('CM004','Canon','EOS M50','51200','4000','2160','24','143','235','10735000 ','Canon EOS M50.png'),
('CM005','Canon','EOS M6','25600','4000','1080','22','49','295','6915000 ','Canon EOS M6.png'),
('CM006','Canon','EOS M6 II','25600','4000','2160','32','548','305','14245000      ','Canon EOS M6 Mark II.png'),
('CM007','Canon','EOS M10','12800','4000','1920','18','49','255','5250000 ','Canon EOS M10.png'),
('CM008','Canon','EOS M3','12800','4000','1920','22','49','250','5250000 ','Canon EOS M3.png'),
('CM009','Canon','EOS RP','40000','4000','2160','26','477','250','35046000 ','Canon EOS RP.png'),
('CM010','Canon','EOS R','40000','4000','2160','30','565','370','48425000 ','Canon EOS R.png'),
('CM011','Sony','A5100','25600','4000','1080','24','179','400','6499000 ','Sony A5100.png'),
('CM012','Sony','A6000','25600','4000','1080','24','179','360','7499000 ','Sony A6000.png'),
('CM013','Sony ','A6400','32000','4000','2160','24','425','410','13999000 ','Sony A6400.png'),
('CM014','Sony','A6300','25600','4000','2160','24','169','400','13999000 ','Sony A6300.png'),
('CM015','Sony','A6600','32000','4000','2160','24','425','810','48498000     ','Sony A6600.png'),
('CM016','Sony','A6500','25600','4000','2160','24','425','350','21999000  ','Sony A6500.png'),
('CM017','Sony','A7','25600','8000','1080','24','117','340','11110000   ','Sony A7.png'),
('CM018','Sony','A7 II','25600','8000','1080','24','117','340','15999000    ','Sony A7 Mark II.png'),
('CM019','Sony ','A7 III','51200','8000','2160','24','693','610','29999000    ','Sony A7 Mark III.png'),
('CM020','Sony ','A7S ','102400','8000','1080','12','25','380','26999000   ','Sony A7S.png'),
('CM021','Sony ','A7S II','102400','8000','2160','12','169','370','34999000    ','Sony A7S Mark II.png'),
('CM022','Sony ','A7R II','25600','8000','2160','42','399','290','23999000    ','Sony A7R Mark II.png'),
('CM023','Sony','A7R III','32000','8000','2160','42','399','530','33999000    ','Sony A7R Mark III.png'),
('CM024','Sony','A7R M IV','32000','8000','2160','61','567','670','49999000   ','Sony A7R Mark IV.png'),
('CM025','Sony','A9','51200','32000','2160','24','693','480','56999000  ','Sony A9.png'),
('CM026','Fujifilm','XA5','12800','4000','2160','24','91','450','6499000    ','Fujifilm XA5.png'),
('CM027','Fujifilm','XA7','12800','4000','2160','24','117','270','10499000  ','Fujifilm XA7.png'),
('CM028','Fujifilm','XT100','12800','4000','2160','24','91','430','11499000  ','Fujifilm XT100.png'),
('CM029','Fujifilm','XT20','12800','4000','2160','24','91','350','13999000   ','Fujifilm XT20.png'),
('CM030','Fujifilm','XT3','12800','8000','2160','26','117','390','22499000  ','Fujifilm XT3.png'),
('CM031','Fujifilm','XT30','12800','4000','2160','26','425','380','15999000    ','Fujififilm XT30.png'),
('CM032','Fujifilm','XA20','12800','4000','1080','16','49','410','4799000  ','Fujifilm XA20.png'),
('CM033','Fujifilm','XA10','12800','4000','1080','16','49','410','4699000  ','Fujifilm XA10.png'),
('CM034','Fujifilm','X100F','12800','4000','1080','24','91','270','17999000    ','Fujifilm X100F.png'),
('CM035','Fujifilm','XF10','12800','4000','2160','24','91','330','6699000  ','Fujifilm XF10.png'),
('CM036','Fujifilm','X Pro 2','12800','8000','2160','24','77','350','27299000  ','Fujifilm X Pro 2.png'),
('CM037','Fujifilm','XH1','12800','8000','2160','24','91','310','15999000   ','Fujifilm XH1.png'),
('CM038','Fujifilm','XT2','12800','8000','2160','24','91','340','21999000  ','Fujifilm XT2.png'),
('CM039','Fujifilm','GFX50S','12800','4000','1080','51','117','400','88999000  ','Fujifilm GFX50S.png'),
('CM040','Fujifilm','GFX100','12800','4000','2160','102','117','800','154999000  ','Fujifilm GFX100.png'),
('CM041','Nikon','Z7','25600','8000','2160','45','493','330','47999000  ','Nikon Z7.png'),
('CM042','Nikon','Z6','51200','8000','2160','24','273','310','35999000  ','Nikon Z6.png'),
('CM043','Nikon ','Z50','51200','4000','2160','20','209','300','13999000  ','Nikon Z50.png'),
('CM044','Nikon','J5','12800','6000','2160','20','171','230','4899000   ','Nikon J1.png'),
('CM045','Sony','A6100','32000','4000','2160','24','425','420','12120000 ','Sony A6100.png'),
('CM046','Fujifilm','XE 3','12800','4000','2160','24','91','350','12499000','Fujifilm XE 3.png'),
('CM047','Fujifilm','GFX 50R','12800','4000','1080','51','117','400','69999000','Fujifilm GFX 50 R.png'),
('CM048','Fujifilm','X Pro 3','12800','8000','2160','26','425','370','27999000','Fujifilm X Pro 3.png'),
('CM049','Sony','A9 II','51200','8000','2160','24','693','690','63499000 ','Sony A9 Mark II.png');

/*Table structure for table `kriteria` */

DROP TABLE IF EXISTS `kriteria`;

CREATE TABLE `kriteria` (
  `id_kriteria` varchar(10) NOT NULL,
  `kriteria` varchar(30) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kriteria` */

insert  into `kriteria`(`id_kriteria`,`kriteria`,`deskripsi`) values 
('KR001','ISO Maksimum','Apakah anda membutuhkan kamera mirrorless yang dapat memotret dalam keadaan low light?'),
('KR002','Shutter Speed Maksimum','Apakah anda membutuhkan kamera mirrorless yang dapat memotret objek dalam keadaan cepat?'),
('KR003','Resolusi Video','Apakah anda membutuhkan kamera mirrorless yang dapat merekam video dengan kualitas yang bagus?'),
('KR004','Megapixel','Apakah anda membutuhkan kamera mirrorless yang dapat memotret dengan hasil yang tidak pecah?'),
('KR005','Jumlah Titik Fokus','Apakah anda membutuhkan kamera mirrorless yang dapat mencari fokus lebih cepat dan akurat?'),
('KR006','Ketahanan Baterai','Apakah anda membutuhkan kamera mirrorless yang dapat memotret dengan frame yang sangat banyak?'),
('KR007','Harga','Apakah anda membutuhkan kamera mirrorless dengan harga yang terjangkau?');

/*Table structure for table `normalisasi` */

DROP TABLE IF EXISTS `normalisasi`;

CREATE TABLE `normalisasi` (
  `id_normalisasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_detail` int(11) DEFAULT NULL,
  `normalisasi` float DEFAULT NULL,
  `utility_score` float DEFAULT NULL,
  PRIMARY KEY (`id_normalisasi`),
  KEY `id_detail` (`id_detail`),
  CONSTRAINT `id_detail` FOREIGN KEY (`id_detail`) REFERENCES `detail_perhitungan` (`id_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=11747 DEFAULT CHARSET=latin1;

/*Data for the table `normalisasi` */

insert  into `normalisasi`(`id_normalisasi`,`id_detail`,`normalisasi`,`utility_score`) values 
(11635,1669,0.153846,1),
(11636,1669,0.153846,0.5),
(11637,1669,0.153846,0.5),
(11638,1669,0.153846,0.5),
(11639,1669,0.0769231,0.5),
(11640,1669,0.230769,0.5),
(11641,1669,0.0769231,0),
(11642,1670,0.153846,1),
(11643,1670,0.153846,0.5),
(11644,1670,0.153846,0),
(11645,1670,0.153846,0.5),
(11646,1670,0.0769231,1),
(11647,1670,0.230769,0.5),
(11648,1670,0.0769231,0),
(11649,1671,0.153846,0),
(11650,1671,0.153846,0.5),
(11651,1671,0.153846,0.5),
(11652,1671,0.153846,0.5),
(11653,1671,0.0769231,0),
(11654,1671,0.230769,1),
(11655,1671,0.0769231,0),
(11656,1672,0.153846,0.333333),
(11657,1672,0.153846,1),
(11658,1672,0.153846,0.666667),
(11659,1672,0.153846,0.333333),
(11660,1672,0.0769231,1),
(11661,1672,0.230769,0.333333),
(11662,1672,0.0769231,0),
(11663,1673,0.0909091,1),
(11664,1673,0.0909091,0.5),
(11665,1673,0.181818,0.5),
(11666,1673,0.181818,0.5),
(11667,1673,0.181818,0.5),
(11668,1673,0.181818,0.5),
(11669,1673,0.0909091,0),
(11670,1674,0.0909091,1),
(11671,1674,0.0909091,0.5),
(11672,1674,0.181818,0),
(11673,1674,0.181818,0.5),
(11674,1674,0.181818,1),
(11675,1674,0.181818,0.5),
(11676,1674,0.0909091,0),
(11677,1675,0.0909091,0),
(11678,1675,0.0909091,0.5),
(11679,1675,0.181818,0.5),
(11680,1675,0.181818,0.5),
(11681,1675,0.181818,0),
(11682,1675,0.181818,1),
(11683,1675,0.0909091,0),
(11684,1676,0.0909091,0.333333),
(11685,1676,0.0909091,1),
(11686,1676,0.181818,0.666667),
(11687,1676,0.181818,0.333333),
(11688,1676,0.181818,1),
(11689,1676,0.181818,0.333333),
(11690,1676,0.0909091,0),
(11691,1677,0.0909091,1),
(11692,1677,0.0909091,0.5),
(11693,1677,0.181818,0.5),
(11694,1677,0.181818,0.5),
(11695,1677,0.181818,0.5),
(11696,1677,0.181818,0.5),
(11697,1677,0.0909091,0),
(11698,1678,0.0909091,1),
(11699,1678,0.0909091,0.5),
(11700,1678,0.181818,0),
(11701,1678,0.181818,0.5),
(11702,1678,0.181818,1),
(11703,1678,0.181818,0.5),
(11704,1678,0.0909091,0),
(11705,1679,0.0909091,0),
(11706,1679,0.0909091,0.5),
(11707,1679,0.181818,0.5),
(11708,1679,0.181818,0.5),
(11709,1679,0.181818,0),
(11710,1679,0.181818,1),
(11711,1679,0.0909091,0),
(11712,1680,0.0909091,0.333333),
(11713,1680,0.0909091,1),
(11714,1680,0.181818,0.666667),
(11715,1680,0.181818,0.333333),
(11716,1680,0.181818,1),
(11717,1680,0.181818,0.333333),
(11718,1680,0.0909091,0),
(11719,1681,0.0909091,1),
(11720,1681,0.0909091,0.5),
(11721,1681,0.181818,0.5),
(11722,1681,0.181818,0.5),
(11723,1681,0.181818,0.5),
(11724,1681,0.181818,0.5),
(11725,1681,0.0909091,0),
(11726,1682,0.0909091,1),
(11727,1682,0.0909091,0.5),
(11728,1682,0.181818,0),
(11729,1682,0.181818,0.5),
(11730,1682,0.181818,1),
(11731,1682,0.181818,0.5),
(11732,1682,0.0909091,0),
(11733,1683,0.0909091,0),
(11734,1683,0.0909091,0.5),
(11735,1683,0.181818,0.5),
(11736,1683,0.181818,0.5),
(11737,1683,0.181818,0),
(11738,1683,0.181818,1),
(11739,1683,0.0909091,0),
(11740,1684,0.0909091,0.333333),
(11741,1684,0.0909091,1),
(11742,1684,0.181818,0.666667),
(11743,1684,0.181818,0.333333),
(11744,1684,0.181818,1),
(11745,1684,0.181818,0.333333),
(11746,1684,0.0909091,0);

/*Table structure for table `perhitungan` */

DROP TABLE IF EXISTS `perhitungan`;

CREATE TABLE `perhitungan` (
  `id_perhitungan` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_perhitungan`)
) ENGINE=InnoDB AUTO_INCREMENT=565 DEFAULT CHARSET=latin1;

/*Data for the table `perhitungan` */

insert  into `perhitungan`(`id_perhitungan`,`tanggal`) values 
(561,'2020-01-19 20:18:20'),
(562,'2020-01-19 20:23:15'),
(563,'2020-01-19 20:28:34'),
(564,'2020-01-20 15:15:55');

/*Table structure for table `pertanyaan` */

DROP TABLE IF EXISTS `pertanyaan`;

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` varchar(10) NOT NULL,
  `id_kriteria` varchar(10) DEFAULT NULL,
  `pertanyaan` text DEFAULT NULL,
  PRIMARY KEY (`id_pertanyaan`),
  KEY `id_kriteria` (`id_kriteria`),
  CONSTRAINT `id_kriteria` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pertanyaan` */

insert  into `pertanyaan`(`id_pertanyaan`,`id_kriteria`,`pertanyaan`) values 
('P001','KR001','Apakah anda membutukan kamera mirrorless yang dapat memotret dalam keadaan low light?'),
('P002','KR002','Apakah anda membutuhkan kamera mirrorless yang dapat memotret objek dalam keadaan cepat?'),
('P003','KR003','Apakah anda membutuhkan kamera mirrorless yang dapat merekam video dengan kualitas yang bagus?'),
('P004','KR004','Apakah anda membutuhkan kamera mirrorless yang dapat memotret dengan hasil yang tidak pecah?'),
('P005','KR005','Apakah anda membutuhkan kamera mirrorless yang dapat mencari fokus lebih cepat dan akurat?'),
('P006','KR006','Apakah anda membutuhkan kamera mirrorless yang dapat memotret dengan frame yang banyak?'),
('P007','KR007','Apakah anda membutuhkan kamera mirrorless dengan harga yang terjangkau?'),
('P008','KR001','Apakah anda membutuhkan tambahan pencahayaan yang lebih pada saat memotret?'),
('P009','KR002','Apakah anda membutuhkan kamera mirrorless untuk memotret tanpa hasil yang blur?'),
('P010','KR003','Apakah nantinya kamera mirrorless akan digunakan hanya untuk video?'),
('P011','KR004','Apakah nantinya kamera mirrorless akan digunakan hanya untuk memotret?'),
('P012','KR005','Apakah anda membutuhkan kamera mirrorless yang memiliki area fokus yang luas?'),
('P013','KR006','Apakah nantinya kamera mirrorless akan digunakan sebagai kamera harian?'),
('P014','KR007','Apakah anda seorang professional fotografer?');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`,`username`,`password`) values 
('U001','admin','admin'),
('U002','yandi','yandi2019');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
