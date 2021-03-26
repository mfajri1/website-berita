-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Mar 2021 pada 00.44
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berita2`
--
CREATE DATABASE IF NOT EXISTS `berita2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `berita2`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_about`
--

DROP TABLE IF EXISTS `t_about`;
CREATE TABLE IF NOT EXISTS `t_about` (
  `idAbout` int(11) NOT NULL AUTO_INCREMENT,
  `fotoAbout` varchar(200) NOT NULL,
  `judulAbout` varchar(255) NOT NULL,
  `isiAbout` text NOT NULL,
  `judulVisi` varchar(255) NOT NULL,
  `isiVisi` text NOT NULL,
  `judulMisi` varchar(255) NOT NULL,
  `isiMisi` text NOT NULL,
  `judulTujuan` varchar(255) NOT NULL,
  `isiTujuan` text NOT NULL,
  `tanggalPost` varchar(11) NOT NULL,
  PRIMARY KEY (`idAbout`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_about`
--

INSERT INTO `t_about` (`idAbout`, `fotoAbout`, `judulAbout`, `isiAbout`, `judulVisi`, `isiVisi`, `judulMisi`, `isiMisi`, `judulTujuan`, `isiTujuan`, `tanggalPost`) VALUES
(1, 'ff9b28614c3aae9d441c8de22dee8dfd.jpg', 'Fajri Blog', '&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, ipsam. Error praesentium nam sapiente reiciendis unde minima, nulla corporis accusantium atque molestias commodi iusto magni adipisci amet id ad pariatur labore dolorem accusamus nesciunt. Beatae nostrum repellat deleniti, tempora minima distinctio pariatur repellendus iste nam aperiam eius provident omnis laboriosam repudiandae neque dolorum exercitationem, numquam! Accusamus et aperiam facilis odit! Suscipit libero blanditiis iste harum obcaecati assumenda eos illo neque cupiditate fugiat esse saepe, facere ab dicta, vel exercitationem accusamus, eius non tenetur mollitia quod. Corrupti, temporibus quae odit dolor nostrum quas voluptatibus aperiam sit quisquam doloribus. Delectus, saepe, animi.&lt;/p&gt;&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, ipsam. Error praesentium nam sapiente reiciendis unde minima, nulla corporis accusantium atque molestias commodi iusto magni adipisci amet id ad pariatur labore dolorem accusamus nesciunt. Beatae nostrum repellat deleniti, tempora minima distinctio pariatur repellendus iste nam aperiam eius provident omnis laboriosam repudiandae neque dolorum exercitationem, numquam! Accusamus et aperiam facilis odit! Suscipit libero blanditiis iste harum obcaecati assumenda eos illo neque cupiditate fugiat esse saepe, facere ab dicta, vel exercitationem accusamus, eius non tenetur mollitia quod. Corrupti, temporibus quae odit dolor nostrum quas voluptatibus aperiam sit quisquam doloribus. Delectus, saepe, animi.&lt;/p&gt;&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, ipsam. Error praesentium nam sapiente reiciendis unde minima, nulla corporis accusantium atque molestias commodi iusto magni adipisci amet id ad pariatur labore dolorem accusamus nesciunt. Beatae nostrum repellat deleniti, tempora minima distinctio pariatur repellendus iste nam aperiam eius provident omnis laboriosam repudiandae neque dolorum exercitationem, numquam! Accusamus et aperiam facilis odit! Suscipit libero blanditiis iste harum obcaecati assumenda eos illo neque cupiditate fugiat esse saepe, facere ab dicta, vel exercitationem accusamus, eius non tenetur mollitia quod. Corrupti, temporibus quae odit dolor nostrum quas voluptatibus aperiam sit quisquam doloribus. Delectus, saepe, animi.&lt;/p&gt;', 'Visi', '&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, ipsam. Error praesentium nam sapiente reiciendis unde minima, nulla corporis accusantium atque molestias commodi iusto magni adipisci amet id ad pariatur labore dolorem accusamus nesciunt. Beatae nostrum repellat deleniti, tempora minima distinctio pariatur repellendus iste nam aperiam eius provident omnis laboriosam repudiandae neque dolorum exercitationem, numquam! Accusamus et aperiam facilis odit! Suscipit libero blanditiis iste harum obcaecati assumenda eos illo neque cupiditate fugiat esse saepe, facere ab dicta, vel exercitationem accusamus, eius non tenetur mollitia quod. Corrupti, temporibus quae odit dolor nostrum quas voluptatibus aperiam sit quisquam doloribus. Delectus, saepe, animi.&lt;/p&gt;', 'Misi', '&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, ipsam. Error praesentium nam sapiente reiciendis unde minima, nulla corporis accusantium atque molestias commodi iusto magni adipisci amet id ad pariatur labore dolorem accusamus nesciunt. Beatae nostrum repellat deleniti, tempora minima distinctio pariatur repellendus iste nam aperiam eius provident omnis laboriosam repudiandae neque dolorum exercitationem, numquam! Accusamus et aperiam facilis odit! Suscipit libero blanditiis iste harum obcaecati assumenda eos illo neque cupiditate fugiat esse saepe, facere ab dicta, vel exercitationem accusamus, eius non tenetur mollitia quod. Corrupti, temporibus quae odit dolor nostrum quas voluptatibus aperiam sit quisquam doloribus. Delectus, saepe, animi.&lt;/p&gt;', 'Tujuan', '&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, ipsam. Error praesentium nam sapiente reiciendis unde minima, nulla corporis accusantium atque molestias commodi iusto magni adipisci amet id ad pariatur labore dolorem accusamus nesciunt. Beatae nostrum repellat deleniti, tempora minima distinctio pariatur repellendus iste nam aperiam eius provident omnis laboriosam repudiandae neque dolorum exercitationem, numquam! Accusamus et aperiam facilis odit! Suscipit libero blanditiis iste harum obcaecati assumenda eos illo neque cupiditate fugiat esse saepe, facere ab dicta, vel exercitationem accusamus, eius non tenetur mollitia quod. Corrupti, temporibus quae odit dolor nostrum quas voluptatibus aperiam sit quisquam doloribus. Delectus, saepe, animi.&lt;/p&gt;', '1605797200');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_access`
--

DROP TABLE IF EXISTS `t_access`;
CREATE TABLE IF NOT EXISTS `t_access` (
  `idAccess` int(11) NOT NULL AUTO_INCREMENT,
  `roleAccess` varchar(200) NOT NULL,
  `menuNama` varchar(11) NOT NULL,
  PRIMARY KEY (`idAccess`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_access`
--

INSERT INTO `t_access` (`idAccess`, `roleAccess`, `menuNama`) VALUES
(1, 'admin', 'admin'),
(2, 'admin', 'operator'),
(3, 'operator', 'operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_berita`
--

DROP TABLE IF EXISTS `t_berita`;
CREATE TABLE IF NOT EXISTS `t_berita` (
  `idBerita` int(11) NOT NULL AUTO_INCREMENT,
  `namaPengarang` varchar(100) NOT NULL,
  `judulBerita` varchar(300) NOT NULL,
  `headlineBerita` varchar(300) NOT NULL,
  `isiBerita` text NOT NULL,
  `gambarBerita` varchar(255) DEFAULT NULL,
  `tanggalPost` varchar(233) DEFAULT NULL,
  `ratingBerita` varchar(100) NOT NULL,
  `tanggalUpdate` varchar(233) NOT NULL,
  `idKategori` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idBerita`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_berita`
--

INSERT INTO `t_berita` (`idBerita`, `namaPengarang`, `judulBerita`, `headlineBerita`, `isiBerita`, `gambarBerita`, `tanggalPost`, `ratingBerita`, `tanggalUpdate`, `idKategori`, `idUser`) VALUES
(1, 'fajri', 'keselamatan', 'keselamatan', '&lt;p&gt;Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip Ex Ea Commodo Consequat. Duis Aute Irure Dolor In Reprehenderit In Voluptate Velit Esse Cillum Dolore Eu Fugiat Nulla Pariatur. Excepteur Sint Occaecat Cupidatat Non Proident, Sunt In Culpa Qui Officia Deserunt Mollit Anim Id Est Laborum. Sed Ut Perspiciatis Unde Omnis Iste Natus Error Sit Aperiam.&lt;/p&gt;&lt;p&gt;Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip Ex Ea Commodo Consequat. Duis Aute Irure Dolor In Reprehenderit In Voluptate Velit Esse Cillum Dolore Eu Fugiat Nulla Pariatur. Excepteur Sint Occaecat Cupidatat Non Proident, Sunt In Culpa Qui Officia Deserunt Mollit Anim Id Est Laborum. Sed Ut Perspiciatis Unde Omnis Iste Natus Error Sit Aperiam.&lt;/p&gt;&lt;p&gt;Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip Ex Ea Commodo Consequat. Duis Aute Irure Dolor In Reprehenderit In Voluptate Velit Esse Cillum Dolore Eu Fugiat Nulla Pariatur. Excepteur Sint Occaecat Cupidatat Non Proident, Sunt In Culpa Qui Officia Deserunt Mollit Anim Id Est Laborum. Sed Ut Perspiciatis Unde Omnis Iste Natus Error Sit Aperiam.&lt;/p&gt;', 'ebf7a7fa66d854c651a2d52068632a26.PNG', '1605622196', '5', '1605622196', 2, 12),
(2, 'fajri', 'harga diri', 'harga-diri', '&lt;p&gt;Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip Ex Ea Commodo Consequat. Duis Aute Irure Dolor In Reprehenderit In Voluptate Velit Esse Cillum Dolore Eu Fugiat Nulla Pariatur. Excepteur Sint Occaecat Cupidatat Non Proident, Sunt In Culpa Qui Officia Deserunt Mollit Anim Id Est Laborum. Sed Ut Perspiciatis Unde Omnis Iste Natus Error Sit Aperiam.&lt;/p&gt;&lt;p&gt;Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip Ex Ea Commodo Consequat. Duis Aute Irure Dolor In Reprehenderit In Voluptate Velit Esse Cillum Dolore Eu Fugiat Nulla Pariatur. Excepteur Sint Occaecat Cupidatat Non Proident, Sunt In Culpa Qui Officia Deserunt Mollit Anim Id Est Laborum. Sed Ut Perspiciatis Unde Omnis Iste Natus Error Sit Aperiam.&lt;/p&gt;&lt;p&gt;Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip Ex Ea Commodo Consequat. Duis Aute Irure Dolor In Reprehenderit In Voluptate Velit Esse Cillum Dolore Eu Fugiat Nulla Pariatur. Excepteur Sint Occaecat Cupidatat Non Proident, Sunt In Culpa Qui Officia Deserunt Mollit Anim Id Est Laborum. Sed Ut Perspiciatis Unde Omnis Iste Natus Error Sit Aperiam.&lt;/p&gt;&lt;p&gt;Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip Ex Ea Commodo Consequat. Duis Aute Irure Dolor In Reprehenderit In Voluptate Velit Esse Cillum Dolore Eu Fugiat Nulla Pariatur. Excepteur Sint Occaecat Cupidatat Non Proident, Sunt In Culpa Qui Officia Deserunt Mollit Anim Id Est Laborum. Sed Ut Perspiciatis Unde Omnis Iste Natus Error Sit Aperiam.&lt;/p&gt;&lt;p&gt;Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip Ex Ea Commodo Consequat. Duis Aute Irure Dolor In Reprehenderit In Voluptate Velit Esse Cillum Dolore Eu Fugiat Nulla Pariatur. Excepteur Sint Occaecat Cupidatat Non Proident, Sunt In Culpa Qui Officia Deserunt Mollit Anim Id Est Laborum. Sed Ut Perspiciatis Unde Omnis Iste Natus Error Sit Aperiam.&lt;/p&gt;', '84f9cd160f41ddff2e47199dd564a4ce.jpg', '1605544243', '5', '1605544592', 3, 12),
(3, 'fajri', 'asdasd', 'asdasd', '&lt;p&gt;asdlorawjiojadsiojdioashdihauishdas&lt;/p&gt;&lt;p&gt;asfd&lt;/p&gt;&lt;p&gt;asf&lt;/p&gt;&lt;p&gt;sad&lt;/p&gt;&lt;p&gt;fsd&lt;/p&gt;&lt;p&gt;fsdgsdf&lt;/p&gt;&lt;p&gt;g&lt;/p&gt;', 'f6cf4385e6f9137ddb4ca8d74965ebc4.png', '1605622196', '5', '1605622196', 3, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_gambar`
--

DROP TABLE IF EXISTS `t_gambar`;
CREATE TABLE IF NOT EXISTS `t_gambar` (
  `idGambar` int(11) NOT NULL AUTO_INCREMENT,
  `namaGambar` varchar(255) NOT NULL,
  `idBerita` int(11) NOT NULL,
  PRIMARY KEY (`idGambar`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_gambar`
--

INSERT INTO `t_gambar` (`idGambar`, `namaGambar`, `idBerita`) VALUES
(1, 'd51ea15a9ccadf84abaff74a9c5d6b07.png', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kategori_berita`
--

DROP TABLE IF EXISTS `t_kategori_berita`;
CREATE TABLE IF NOT EXISTS `t_kategori_berita` (
  `idKategoriBerita` int(11) NOT NULL AUTO_INCREMENT,
  `namaKategoriBerita` varchar(200) NOT NULL,
  `searchBerita` varchar(200) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`idKategoriBerita`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_kategori_berita`
--

INSERT INTO `t_kategori_berita` (`idKategoriBerita`, `namaKategoriBerita`, `searchBerita`, `status`) VALUES
(1, 'kriminal', 'kriminal', 'aktif'),
(2, 'olahraga', 'olahraga', 'aktif'),
(3, 'kecantikan', 'kecantikan', 'aktif'),
(4, 'traveller', 'traveller', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_komentar`
--

DROP TABLE IF EXISTS `t_komentar`;
CREATE TABLE IF NOT EXISTS `t_komentar` (
  `idKomentar` int(11) NOT NULL AUTO_INCREMENT,
  `judulKomentar` varchar(200) NOT NULL,
  `isiKomentar` text NOT NULL,
  `tanggalPost` varchar(255) NOT NULL,
  `tanggalUpdate` varchar(255) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idBerita` int(11) NOT NULL,
  PRIMARY KEY (`idKomentar`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_komentar`
--

INSERT INTO `t_komentar` (`idKomentar`, `judulKomentar`, `isiKomentar`, `tanggalPost`, `tanggalUpdate`, `idUser`, `idBerita`) VALUES
(1, 'asdasd', 'asdfsadfds', '1605622196', '1605622196', 12, 3),
(2, 'berita', 'sdfsdf', '1605700296', '1605700296', 10, 3),
(3, 'berita', 'dfdfghj.,mklnkaonsdhasuihduy8sahu8ydhasy8hdy7sahdusaidj\r\nasdjisahduhsauid', '1605700322', '1605700322', 10, 3),
(12, 'berita', 'dasdsa', '1605712442', '1605712442', 10, 3),
(13, 'berita', 'asdsad', '1605712476', '1605712476', 10, 3),
(26, 'berita', 'dgdf', '1605722253', '1605722253', 10, 1),
(27, 'berita', 'hgvhughjg', '1605723360', '1605723360', 10, 1),
(28, 'berita', 'dsasda', '1605723415', '1605723415', 10, 1),
(29, 'berita', 'gdfgdf', '1605723579', '1605723579', 10, 1),
(30, 'berita', 'sdfsdf', '1605723595', '1605723595', 10, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_konfigurasi_user`
--

DROP TABLE IF EXISTS `t_konfigurasi_user`;
CREATE TABLE IF NOT EXISTS `t_konfigurasi_user` (
  `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT,
  `namaWeb` varchar(100) NOT NULL,
  `imgLogo` varchar(200) DEFAULT NULL,
  `imgIcon` varchar(255) DEFAULT NULL,
  `imgJumbo` varchar(255) DEFAULT NULL,
  `metaText` varchar(100) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `noHp` varchar(100) NOT NULL,
  `blog` varchar(100) NOT NULL,
  `twiter` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `sumber` varchar(100) NOT NULL,
  `idUser` int(11) NOT NULL,
  `tglUpdate` varchar(200) NOT NULL,
  `tglPost` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_konfigurasi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_konfigurasi_user`
--

INSERT INTO `t_konfigurasi_user` (`id_konfigurasi`, `namaWeb`, `imgLogo`, `imgIcon`, `imgJumbo`, `metaText`, `keyword`, `description`, `instagram`, `facebook`, `noHp`, `blog`, `twiter`, `alamat`, `sumber`, `idUser`, `tglUpdate`, `tglPost`) VALUES
(1, 'Blog Fajri', 'd7a55674d16f628a8551a87cb8c5cbab.png', '26a45b5740b491abfa6b8fe7b14e396e.jpg', '68fd053d25000ece5582759ab3d74b29.png', 'blog', 'Blog Fajri, fajri, fajri blog, Fajri Blog', 'Website Blog Fajri', 'fajri_wilsher', 'anaksiguih', '082287770982', 'fajri10@blogspot.com', 'fajri07032922', 'jln. Aru Indah No 25 Koto Gadang kab. Agam Prov. Sumatera Barat', 'Fajri Codeweb', 9, '1604858577', 1604768622);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_login`
--

DROP TABLE IF EXISTS `t_login`;
CREATE TABLE IF NOT EXISTS `t_login` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `namaUser` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `emailUser` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `jenisKelamin` enum('pria','wanita') DEFAULT NULL,
  `noTelp` varchar(255) DEFAULT NULL,
  `alamat` text,
  `tanggalDaftar` varchar(255) DEFAULT NULL,
  `tanggalUpdate` varchar(255) DEFAULT NULL,
  `fotoUser` varchar(255) DEFAULT NULL,
  `levelUser` enum('admin','operator','user') DEFAULT NULL,
  `statusUser` enum('aktif','nonaktif') DEFAULT NULL,
  `passSalah` int(11) DEFAULT NULL,
  `lastLogin` varchar(100) DEFAULT NULL,
  `blokirAkun` enum('ya','tidak') DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_login`
--

INSERT INTO `t_login` (`idUser`, `namaUser`, `username`, `emailUser`, `password`, `jenisKelamin`, `noTelp`, `alamat`, `tanggalDaftar`, `tanggalUpdate`, `fotoUser`, `levelUser`, `statusUser`, `passSalah`, `lastLogin`, `blokirAkun`) VALUES
(9, 'Admin fajri', 'admin', 'Admin@gmail.com', 'bc1fffd11594a657f4b9c4ec6e82aa418f4f906c18aa5674bddde60eeb12cf7cb25a26fcbd2d114a0fd900ac9ea35aede9d904807701b1bbd523be226b9633a9', 'pria', '082287770991', 'koto baru kubang putiah sdf', '1600771297', '1604594567', '76b67e8838d701d1628f57e577536b9c.png', 'admin', 'aktif', 0, '1616780230', 'tidak'),
(10, 'fajri', 'fajri10', 'fajri10@gmail.com', '355e490ea34139f206366ed01d17f603ad93ba8c388fd35c1da33f4442a0f5572c1a867baa0a9d14c7132993873c46eeda77e0d0c0f7ce2ce851c41a98595e8b', NULL, NULL, NULL, '1600771528', '1600771528', 'default.jpg', 'user', 'aktif', 0, '1606152236', 'tidak'),
(11, 'Operator farhan', 'operator', 'operator@gmail.com', 'bc1fffd11594a657f4b9c4ec6e82aa418f4f906c18aa5674bddde60eeb12cf7cb25a26fcbd2d114a0fd900ac9ea35aede9d904807701b1bbd523be226b9633a9', 'pria', '085359264616', 'koto baru', '1600954878', '1602345948', 'a93c52aa86e6a24c4378b433164d80c0.jpg', 'operator', 'aktif', 0, '1605633075', 'tidak'),
(12, 'fiki', 'fiki20', 'fiki20@gmail.com', 'bc1fffd11594a657f4b9c4ec6e82aa418f4f906c18aa5674bddde60eeb12cf7cb25a26fcbd2d114a0fd900ac9ea35aede9d904807701b1bbd523be226b9633a9', 'pria', NULL, NULL, '1601036306', '1601036306', 'default.jpg', 'user', 'aktif', 0, '0', 'tidak'),
(18, 'fajri', 'fajriwilsher10', 'fajriwilsher30@gmail.com', 'bc1fffd11594a657f4b9c4ec6e82aa418f4f906c18aa5674bddde60eeb12cf7cb25a26fcbd2d114a0fd900ac9ea35aede9d904807701b1bbd523be226b9633a9', NULL, NULL, NULL, '1606196819', '1606196819', 'default.jpg', 'user', 'aktif', 0, '0', 'tidak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_member`
--

DROP TABLE IF EXISTS `t_member`;
CREATE TABLE IF NOT EXISTS `t_member` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `levelUser` varchar(200) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_member`
--

INSERT INTO `t_member` (`idUser`, `levelUser`) VALUES
(1, 'admin'),
(2, 'operator'),
(3, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_menu_backend`
--

DROP TABLE IF EXISTS `t_menu_backend`;
CREATE TABLE IF NOT EXISTS `t_menu_backend` (
  `idMenu` int(11) NOT NULL AUTO_INCREMENT,
  `namaMenu` varchar(200) NOT NULL,
  `targetDropdown` varchar(200) NOT NULL,
  `nameHeadSubMenu` varchar(200) NOT NULL,
  `iconMenu` varchar(200) NOT NULL,
  `statusMenu` enum('aktif','nonaktif') NOT NULL,
  `noUrut` int(11) NOT NULL,
  `memberLevel` varchar(250) NOT NULL,
  PRIMARY KEY (`idMenu`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_menu_backend`
--

INSERT INTO `t_menu_backend` (`idMenu`, `namaMenu`, `targetDropdown`, `nameHeadSubMenu`, `iconMenu`, `statusMenu`, `noUrut`, `memberLevel`) VALUES
(1, 'Berita', 'tarBerita', 'Pilih Berita :', 'far fa-fw fa-newspaper', 'aktif', 1, 'operator'),
(2, 'User', 'tarUser', 'Pilih Pengguna :', 'far fa-fw fa-user', 'aktif', 2, 'operator'),
(3, 'Manage Menu Backend', 'manageMenu', 'Pilih Menu Backend :', 'fa fa-fw fa-book', 'aktif', 3, 'admin'),
(6, 'Management Frontend', 'frontend', 'Pilih Manage Frontend :', 'fa fa-fw fa-book', 'aktif', 5, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_menu_front`
--

DROP TABLE IF EXISTS `t_menu_front`;
CREATE TABLE IF NOT EXISTS `t_menu_front` (
  `idMenuFront` int(11) NOT NULL AUTO_INCREMENT,
  `urlMenuFront` varchar(255) NOT NULL,
  `namaMenuFront` varchar(255) NOT NULL,
  `statusMenuFront` enum('aktif','nonaktif') NOT NULL,
  `noUrutFront` int(11) NOT NULL,
  `memberLevel` varchar(200) NOT NULL,
  PRIMARY KEY (`idMenuFront`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_menu_front`
--

INSERT INTO `t_menu_front` (`idMenuFront`, `urlMenuFront`, `namaMenuFront`, `statusMenuFront`, `noUrutFront`, `memberLevel`) VALUES
(3, 'sdfdfg', 'fajri', 'aktif', 1, 'operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_saran`
--

DROP TABLE IF EXISTS `t_saran`;
CREATE TABLE IF NOT EXISTS `t_saran` (
  `idSaran` int(11) NOT NULL AUTO_INCREMENT,
  `emailUser` varchar(250) NOT NULL,
  `saran` text NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`idSaran`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_saran`
--

INSERT INTO `t_saran` (`idSaran`, `emailUser`, `saran`, `idUser`) VALUES
(1, 'fajri10@gmail.comm', 'uhasdiuhsauidhui', 0),
(2, 'fajri10@gmail.comm', 'dfsdfsdgdfhdfsdfsd', 0),
(3, 'fajri10@gmail.comm', 'dfgdfhsdfsdfzxcx', 10),
(4, 'fajri@kjjaklsjdkl.com', 'asdsafaskdjfhajskhfjksahjkfhsajkdhfkjsdbfb sdnmbcsbdhcfgsdfgkjs gshdgfjsdg igsdfj sgdf jhsg jfsdgjfg sdjgfjsd gj', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_submenu_backend`
--

DROP TABLE IF EXISTS `t_submenu_backend`;
CREATE TABLE IF NOT EXISTS `t_submenu_backend` (
  `idSubMenu` int(11) NOT NULL AUTO_INCREMENT,
  `urlSubMenu` varchar(200) NOT NULL,
  `judulSubMenu` varchar(200) NOT NULL,
  `menuId` int(11) NOT NULL,
  `statusSubmenu` enum('aktif','nonaktif') DEFAULT NULL,
  PRIMARY KEY (`idSubMenu`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_submenu_backend`
--

INSERT INTO `t_submenu_backend` (`idSubMenu`, `urlSubMenu`, `judulSubMenu`, `menuId`, `statusSubmenu`) VALUES
(1, 'admin/tampilBerita', 'Tabel Berita', 1, 'aktif'),
(2, 'kategori', 'Tabel Kategori Berita', 1, 'aktif'),
(3, 'komentar/', 'Tabel Komentar', 1, 'aktif'),
(4, 'pengguna/profile/', 'Profile', 2, 'aktif'),
(5, 'pengguna/pengaturan/', 'Pengaturan', 2, 'aktif'),
(6, 'managementMenu/tampil_menu', 'Tampil Menu', 3, 'aktif'),
(7, 'managementSubmenu/tampilSubmenu', 'Tampil Submenu', 3, 'aktif'),
(13, 'konfigurasi/tampil_konfigurasi', 'Tampil Konfigurasi', 6, 'aktif'),
(14, 'user/manageMenuFront', 'Management menu FrontEnd', 6, 'aktif');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
