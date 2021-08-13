-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 31 Des 2007 pada 21.18
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `id_guru` int(3) NOT NULL AUTO_INCREMENT,
  `nama_guru` varchar(35) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  PRIMARY KEY (`id_guru`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `alamat`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `no_hp`) VALUES
(3, 'Bondan', 'Surakarta', 'L', 'Surakarta', '2002-04-24', '0888299345'),
(4, 'Fade2Black', 'Jogjakarta', 'L', 'Jogja', '2002-05-10', '01234567889'),
(5, 'BudiDoremi', 'Ngemplak', 'L', 'Surakarta', '1997-05-16', '9876543210');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `id_jurusan` int(2) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(0, 'Semua Jurusan'),
(1, 'Akutansi'),
(2, 'Administrasi Perkantoran'),
(3, 'Usaha Perjalanan Wisata'),
(4, 'Multimedia'),
(5, 'Pemasaran'),
(6, 'BroadCasting'),
(7, 'Rekayasa Perangkat Lunak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE IF NOT EXISTS `mapel` (
  `id_mapel` int(3) NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(35) NOT NULL,
  `kelas` char(3) NOT NULL,
  `id_jurusan` int(2) NOT NULL,
  `id_guru` int(3) NOT NULL,
  PRIMARY KEY (`id_mapel`),
  KEY `nama_mapel` (`nama_mapel`),
  KEY `nama_mapel_2` (`nama_mapel`),
  KEY `nama_mapel_3` (`nama_mapel`),
  KEY `nama_mapel_4` (`nama_mapel`),
  KEY `nama_mapel_5` (`nama_mapel`),
  KEY `nama_mapel_6` (`nama_mapel`),
  KEY `kelas` (`kelas`),
  KEY `id_jurusan` (`id_jurusan`),
  KEY `id_guru` (`id_guru`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`, `kelas`, `id_jurusan`, `id_guru`) VALUES
(5, 'Fisika', 'X', 1, 3),
(6, 'Musik', 'XI', 7, 5),
(7, 'Nge Rap', 'XI', 0, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `jurusan` varchar(35) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `jenis_kelamin`, `kelas`, `jurusan`, `alamat`) VALUES
(23423, 'Munaroh', 'P', 'XII', 'PM', 'Nggrobakan'),
(54321, 'Kirito', 'L', 'XII', 'Akutansi', 'Surakarta'),
(66554, 'Kodir', 'L', 'XI', 'Multimedia', 'Karanganyar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `jenis` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `jenis`) VALUES
(2, 'Siswa', 'siswa', 'U'),
(3, 'Guru', 'guru', 'K');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD CONSTRAINT `mapel_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `mapel_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
