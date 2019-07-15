-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jul 2019 pada 08.33
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii2test`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `account`
--

CREATE TABLE `account` (
  `username` varchar(45) NOT NULL,
  `password` varchar(250) NOT NULL,
  `name` varchar(45) NOT NULL,
  `role` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`username`, `password`, `name`, `role`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin'),
('author', '02bd92faa38aaa6cc0ea75e59937a1ef', 'author', 'author');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `idpost` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `username` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`idpost`, `title`, `content`, `date`, `username`) VALUES
(5, 'Soal Test', '<ol>\r\n<li>Menu :\r\n<ul>\r\n<li>Beranda</li>\r\n<li>Post : CRUD Post</li>\r\n<li>Akun : CRUD Akun</li>\r\n<li>Login / Logout</li>\r\n</ul>\r\n</li>\r\n<li>Terdapat 2 Role :\r\n<ul>\r\n<li>Admin dapat membuat Akun baru dan Post baru (CRUD)</li>\r\n<li>Author&nbsp; hanya dapat membuat post baru (CRUD)</li>\r\n</ul>\r\n</li>\r\n<li>User dummy untuk login melihat CRUD&nbsp;:\r\n<ul>\r\n<li>admin admin</li>\r\n<li>author author</li>\r\n</ul>\r\n</li>\r\n<li>Upload source code hasilnya pada repositori publik&nbsp;(misal github, bitbucket dsb)</li>\r\n</ol>', '2019-07-11 09:45:37', 'admin'),
(6, 'Database', '<p><code>CREATE TABLE IF NOT EXISTS `account` (<br />\r\n&nbsp; `username` VARCHAR(45) NOT NULL,<br />\r\n&nbsp; `password` VARCHAR(250) NOT NULL,<br />\r\n&nbsp; `name` VARCHAR(45) NOT NULL,<br />\r\n&nbsp; `role` VARCHAR(45) NOT NULL,<br />\r\n&nbsp; PRIMARY KEY (`username`))<br />\r\nENGINE = InnoDB;</code></p>\r\n<p><code>CREATE TABLE IF NOT EXISTS `post` (<br />\r\n&nbsp; `idpost` INT NOT NULL AUTO_INCREMENT,<br />\r\n&nbsp; `title` TEXT NOT NULL,<br />\r\n&nbsp; `content` TEXT NOT NULL,<br />\r\n&nbsp; `date` DATETIME NOT NULL,<br />\r\n&nbsp; `username` VARCHAR(45) NOT NULL,<br />\r\n&nbsp; PRIMARY KEY (`idpost`),<br />\r\n&nbsp; INDEX `fk_post_account_idx` (`username` ASC),<br />\r\n&nbsp; CONSTRAINT `fk_post_account`<br />\r\n&nbsp; &nbsp; FOREIGN KEY (`username`)<br />\r\n&nbsp; &nbsp; REFERENCES `account` (`username`)<br />\r\n&nbsp; &nbsp; ON DELETE NO ACTION<br />\r\n&nbsp; &nbsp; ON UPDATE NO ACTION)<br />\r\nENGINE = InnoDB;</code></p>', '2019-07-11 09:44:30', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komen`
--

CREATE TABLE `tb_komen` (
  `idkomen` int(11) NOT NULL,
  `idpost` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `isikomen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_komen`
--

INSERT INTO `tb_komen` (`idkomen`, `idpost`, `username`, `isikomen`) VALUES
(6, 5, 'author', 'komen soal test'),
(7, 5, 'author', 'komentar 2'),
(8, 6, 'author', 'database komen');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idpost`),
  ADD KEY `fk_post_account_idx` (`username`);

--
-- Indeks untuk tabel `tb_komen`
--
ALTER TABLE `tb_komen`
  ADD PRIMARY KEY (`idkomen`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `post`
--
ALTER TABLE `post`
  MODIFY `idpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_komen`
--
ALTER TABLE `tb_komen`
  MODIFY `idkomen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_account` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
