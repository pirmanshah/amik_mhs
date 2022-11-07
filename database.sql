create database db_mahasiswa;

use db_mahasiswa;

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL auto_increment,
  `nim` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
);