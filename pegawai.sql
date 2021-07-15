-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Apr 2021 pada 06.41
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pegawai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `arsip_gaji_berkala`
--

CREATE TABLE `arsip_gaji_berkala` (
  `id` int(11) NOT NULL,
  `nip` varchar(25) COLLATE utf8_bin NOT NULL,
  `no_berkala` varchar(50) COLLATE utf8_bin NOT NULL,
  `arsip` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `arsip_pegawai`
--

CREATE TABLE `arsip_pegawai` (
  `id_peg` int(11) NOT NULL,
  `NIP` varchar(25) COLLATE utf8_bin NOT NULL,
  `NIK` varchar(255) COLLATE utf8_bin NOT NULL,
  `KK` varchar(255) COLLATE utf8_bin NOT NULL,
  `npwp` varchar(255) COLLATE utf8_bin NOT NULL,
  `karpeg` varchar(255) COLLATE utf8_bin NOT NULL,
  `bpjs` varchar(255) COLLATE utf8_bin NOT NULL,
  `foto` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `arsip_pegawai`
--

INSERT INTO `arsip_pegawai` (`id_peg`, `NIP`, `NIK`, `KK`, `npwp`, `karpeg`, `bpjs`, `foto`) VALUES
(1, '19650910 198611 1 001', '', '', '-', '-', '-', 'D:\\Pegawai\\arsip\\foto\\img20190828_10562670.jpg'),
(2, '19751219 199412 1 001', '', '', '-', '-', '-', 'D:\\pegawai\\arsip\\foto\\pak kadis.jpg'),
(3, '19650710 198601 1 001', '', '', '-', '-', '-', 'D:\\pegawai\\arsip\\foto\\img20190828_09482719.jpg'),
(4, '19681002 199212 2 002', '', '', '-', '-', '-', 'D:\\pegawai\\arsip\\foto\\sulastri2.jpeg'),
(5, '19621128 198508 2 002', '', '', '-', '-', '-', 'D:\\pegawai\\arsip\\foto\\suratni_foto.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diklat_struktural`
--

CREATE TABLE `diklat_struktural` (
  `id` int(11) NOT NULL,
  `pegawai_id` varchar(25) COLLATE utf8_bin NOT NULL,
  `nama` varchar(100) COLLATE utf8_bin NOT NULL,
  `no_sttpl` varchar(50) COLLATE utf8_bin NOT NULL,
  `tgl_m` date NOT NULL,
  `tgl_s` date NOT NULL,
  `penyelenggara` varchar(255) COLLATE utf8_bin NOT NULL,
  `arsip` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_kadis`
--

CREATE TABLE `dt_kadis` (
  `id` int(11) NOT NULL,
  `pegawai_id` varchar(25) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `dt_kadis`
--

INSERT INTO `dt_kadis` (`id`, `pegawai_id`) VALUES
(4, '8');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_keluarga`
--

CREATE TABLE `dt_keluarga` (
  `id` int(11) NOT NULL,
  `pegawai_id` varchar(25) COLLATE utf8_bin NOT NULL,
  `nama` varchar(100) COLLATE utf8_bin NOT NULL,
  `tgl_l` date NOT NULL,
  `status` varchar(15) COLLATE utf8_bin NOT NULL,
  `pekerjaan` varchar(25) COLLATE utf8_bin NOT NULL,
  `hub` varchar(25) COLLATE utf8_bin NOT NULL,
  `dt` varchar(2) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `dt_keluarga`
--

INSERT INTO `dt_keluarga` (`id`, `pegawai_id`, `nama`, `tgl_l`, `status`, `pekerjaan`, `hub`, `dt`, `created_at`, `updated_at`) VALUES
(22, '8', 'Reni Novianti, Am.Kep', '1975-07-29', 'kawin', 'pns', 'istri', 'TT', '2020-12-08 13:55:36', '2020-12-08 13:55:36'),
(23, '8', 'Chintia Salza Nabiella', '2001-12-11', 'belum kawin', 'pelajar', 'AK', 'DT', '2020-12-08 13:56:38', '2020-12-08 13:56:38'),
(24, '8', 'Zaim Dhiufullah Arqan', '2005-12-02', 'belum kawin', 'pelajar', 'AK', 'DT', '2020-12-08 13:58:37', '2020-12-08 13:58:37'),
(25, '9', 'Desmaini, S.Pd', '1966-12-10', 'kawin', 'pns', 'istri', 'TT', '2020-12-09 04:05:45', '2020-12-09 04:05:45'),
(26, '9', 'Muhammad Fajrin', '1994-04-07', 'belum kawin', 'swasta', 'AK', 'TT', '2020-12-09 04:10:01', '2020-12-09 04:10:01'),
(27, '9', 'Akmal Arifin', '1996-03-25', 'belum kawin', 'mahasiswa', 'AK', 'TT', '2020-12-09 04:11:02', '2020-12-09 04:11:02'),
(28, '9', 'Rafid Syarifuddin', '2000-07-30', 'belum kawin', 'polisi', 'AK', 'TT', '2020-12-09 04:31:12', '2020-12-09 04:31:12'),
(29, '10', 'Rasibah, S.Pd', '1961-12-31', 'kawin', 'pns', 'istri', 'TT', '2020-12-09 04:48:59', '2020-12-09 04:48:59'),
(30, '10', 'Ardiansyah,A', '1991-09-18', 'belum kawin', 'swasta', 'AK', 'TT', '2020-12-09 04:49:30', '2020-12-09 04:49:30'),
(31, '10', 'Rina Abrianingsih', '1994-12-16', 'belum kawin', 'honorer', 'AK', 'TT', '2020-12-09 04:51:06', '2020-12-09 04:51:06'),
(32, '11', 'Sumarni', '1976-08-17', 'kawin', 'IRT', 'istri', 'DT', '2020-12-09 04:54:51', '2020-12-09 04:54:51'),
(33, '11', 'Asna Arpan', '1993-05-29', 'belum kawin', 'swasta', 'AK', 'TT', '2020-12-09 04:55:47', '2020-12-09 04:55:47'),
(34, '11', 'Nur Asna Zuhud', '1996-05-02', 'belum kawin', 'pelajar', 'AK', 'DT', '2020-12-09 04:56:31', '2020-12-09 04:56:31'),
(35, '11', 'Mega Putri Sobri', '1999-06-25', 'belum kawin', 'pelajar', 'AK', 'DT', '2020-12-09 04:57:42', '2020-12-09 04:57:42'),
(36, '12', 'Hernita', '1979-10-07', 'kawin', 'IRT', 'istri', 'DT', '2020-12-09 06:47:15', '2020-12-09 06:47:15'),
(37, '12', 'Rina Putriana', '2000-09-24', 'belum kawin', 'pelajar', 'AK', 'DT', '2020-12-09 06:47:53', '2020-12-09 06:47:53'),
(38, '12', 'Raufa Aulia Syafitri', '2003-12-20', 'belum kawin', 'pelajar', 'AK', 'DT', '2020-12-09 06:48:19', '2020-12-09 06:48:19'),
(39, '12', 'Ratu Cantika Khoiriah', '2013-06-21', 'belum kawin', 'pelajar', 'AK', 'DT', '2020-12-09 06:48:44', '2020-12-09 06:48:44'),
(40, '14', 'JOKO ISMANTO', '1962-12-31', 'kawin', 'pns', 'suami', 'DT', '2020-12-11 02:16:48', '2020-12-11 02:16:48'),
(41, '14', 'YUDHA PRAYOGA ISMAN', '1993-08-30', 'belum kawin', 'swasta', 'AK', 'TT', '2020-12-11 02:19:37', '2020-12-11 02:19:37'),
(42, '14', 'ISMARDIYANSYAH', '1996-03-02', 'belum kawin', 'swasta', 'AK', 'TT', '2020-12-11 02:32:44', '2020-12-11 02:30:06'),
(44, '14', 'MUHAMMAD BINTANG LAKSONO', '2002-07-13', 'belum kawin', 'mahasiswa', 'AK', 'DT', '2020-12-11 02:22:34', '2020-12-11 02:22:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masakerja`
--

CREATE TABLE `masakerja` (
  `id` int(11) NOT NULL,
  `pegawai_id` int(5) NOT NULL,
  `tahun` int(11) NOT NULL,
  `bulan` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `masakerja`
--

INSERT INTO `masakerja` (`id`, `pegawai_id`, `tahun`, `bulan`, `created_at`, `updated_at`) VALUES
(1, 19650910, 0, 28, '2020-12-16 07:20:22', NULL),
(2, 19751219, 0, 26, '2020-12-16 07:20:22', NULL),
(3, 19650710, 0, 28, '2020-12-16 07:20:22', NULL),
(4, 19681002, 0, 24, '2020-12-16 07:20:22', NULL),
(5, 19621128, 0, 30, '2020-12-16 07:20:22', NULL),
(6, 2147483647, 0, 34, '2020-12-16 07:20:22', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_gol`
--

CREATE TABLE `master_gol` (
  `id` int(11) NOT NULL,
  `gol` varchar(6) COLLATE utf8_bin NOT NULL,
  `Pangkat` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `master_gol`
--

INSERT INTO `master_gol` (`id`, `gol`, `Pangkat`) VALUES
(1, 'IV/e', 'Pembina Utama'),
(2, 'IV/d', 'Pembina UtamaMady'),
(3, 'IV/c', 'Pembina Utama Muda'),
(4, 'IV/b', 'Pembina Tingkat I'),
(5, 'IV/a', 'Pembina'),
(6, 'III/d', 'Penata Tingkat I'),
(7, 'III/c', 'Penata'),
(8, 'III/b', 'Penata Muda Tingkat I'),
(9, 'III/a', 'Penata Muda'),
(10, 'II/d', 'Pengatur Tingkat I'),
(11, 'II/c', 'Pengatur'),
(12, 'II/b', 'Pengatur Muda Tingkat I'),
(13, 'II/a', 'Pengatur Muda'),
(14, 'I/d', 'Juru Tingkat I'),
(15, 'I/c', 'Juru'),
(16, 'I/b', 'Juru Muda Tingkat I'),
(17, 'I/a', 'Juru Muda');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_jabatan`
--

CREATE TABLE `master_jabatan` (
  `id` int(11) NOT NULL,
  `Nama_jab` varchar(100) COLLATE utf8_bin NOT NULL,
  `eselon` varchar(6) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `master_jabatan`
--

INSERT INTO `master_jabatan` (`id`, `Nama_jab`, `eselon`) VALUES
(1, 'Sekda/Sekwan', 'IIa'),
(2, 'Kadis', 'IIb'),
(3, 'Sekretaris/Camat', 'IIIa'),
(4, 'Kabid/Sekcam', 'IIIb'),
(5, 'Kasubag/Kasi/Lurah', 'IVa'),
(6, 'Pelaksana Kasi/Kasubag Kelurahan', 'IVb'),
(7, 'Pelaksana ', '-'),
(8, 'Kasubag Kasi Dinas Kantor Camat Kasi Kec', 'Va'),
(17, 'Kasubag Kasi Kantor Camat', 'Vb');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_j_gaji`
--

CREATE TABLE `master_j_gaji` (
  `id` int(11) NOT NULL,
  `gol` varchar(6) COLLATE utf8_bin NOT NULL,
  `tahun` varchar(3) COLLATE utf8_bin NOT NULL,
  `gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `master_j_gaji`
--

INSERT INTO `master_j_gaji` (`id`, `gol`, `tahun`, `gaji`) VALUES
(1, 'II/a', '1', 2022200),
(2, 'II/a', '2', 2054100),
(3, 'II/a', '3', 2118800),
(4, 'II/a', '5', 2185500),
(5, 'II/a', '7', 2254300),
(6, 'II/a', '9', 2325300),
(7, 'II/a', '11', 2398600),
(8, 'II/a', '13', 2474100),
(9, 'II/a', '15', 2552000),
(10, 'II/a', '17', 2632400),
(11, 'II/a', '19', 2715300),
(12, 'II/a', '21', 2800800),
(13, 'II/a', '23', 2889100),
(14, 'II/a', '25', 2980000),
(15, 'II/a', '27', 3073900),
(16, 'II/a', '29', 3170700),
(17, 'II/a', '31', 3270600),
(18, 'II/a', '33', 3373600),
(19, 'II/b', '1', 0),
(20, 'II/b', '2', 0),
(21, 'II/b', '3', 220800),
(22, 'II/b', '5', 2277900),
(23, 'II/b', '7', 2349700),
(24, 'II/b', '9', 223700),
(25, 'II/b', '11', 2500000),
(26, 'II/b', '13', 2578800),
(27, 'II/b', '15', 2660000),
(28, 'II/b', '17', 2743800),
(29, 'II/b', '19', 2830200),
(30, 'II/b', '21', 2919300),
(31, 'II/b', '23', 3011300),
(32, 'II/b', '25', 3106100),
(33, 'II/b', '27', 3203900),
(34, 'II/b', '29', 3304800),
(35, 'II/b', '31', 3408900),
(36, 'II/b', '33', 3516300),
(37, 'II/c', '1', 0),
(38, 'II/c', '2', 0),
(39, 'II/c', '3', 2301800),
(40, 'II/c', '5', 2374300),
(41, 'II/c', '7', 2449100),
(42, 'II/c', '9', 2526200),
(43, 'II/c', '11', 2605800),
(44, 'II/c', '13', 2687800),
(45, 'II/c', '15', 2772500),
(46, 'II/c', '17', 2859800),
(47, 'II/c', '19', 2949900),
(48, 'II/c', '21', 3042800),
(49, 'II/c', '23', 3138600),
(50, 'II/c', '25', 3237500),
(51, 'II/c', '27', 3339400),
(52, 'II/c', '29', 3444600),
(53, 'II/c', '31', 3553100),
(54, 'II/c', '33', 3665000),
(55, 'II/d', '1', 0),
(56, 'II/d', '2', 0),
(57, 'II/d', '3', 2399200),
(58, 'II/d', '5', 2474700),
(59, 'II/d', '7', 2552700),
(60, 'II/d', '9', 2633100),
(61, 'II/d', '11', 2716000),
(62, 'II/d', '13', 2801500),
(63, 'II/d', '15', 2889800),
(64, 'II/d', '17', 2980800),
(65, 'II/d', '19', 3074700),
(66, 'II/d', '21', 3171500),
(67, 'II/d', '23', 3271400),
(68, 'II/d', '25', 3374400),
(69, 'II/d', '27', 380700),
(70, 'II/d', '29', 3590300),
(71, 'II/d', '31', 3703400),
(72, 'II/d', '33', 3820000),
(73, 'III/a', '0', 2579400),
(74, 'III/a', '2', 2660700),
(75, 'III/a', '4', 2744500),
(76, 'III/a', '6', 2830900),
(77, 'III/a', '8', 2920100),
(78, 'III/a', '10', 3012000),
(79, 'III/a', '12', 3106900),
(80, 'III/a', '14', 3204700),
(81, 'III/a', '16', 3305700),
(82, 'III/a', '18', 3409800),
(83, 'III/a', '20', 3517200),
(84, 'III/a', '22', 3627900),
(85, 'III/a', '24', 3742200),
(86, 'III/a', '26', 3860100),
(87, 'III/a', '28', 3981600),
(88, 'III/a', '30', 4107000),
(89, 'III/a', '32', 4236400),
(90, 'III/b', '0', 2688500),
(91, 'III/b', '2', 2773200),
(92, 'III/b', '4', 2860500),
(93, 'III/b', '6', 2950600),
(94, 'III/b', '8', 3043600),
(95, 'III/b', '10', 3139400),
(96, 'III/b', '12', 3238300),
(97, 'III/b', '14', 3340300),
(98, 'III/b', '16', 3445500),
(99, 'III/b', '18', 3554000),
(100, 'III/b', '20', 3665900),
(101, 'III/b', '22', 3781400),
(102, 'III/b', '24', 3900500),
(103, 'III/b', '26', 4023300),
(104, 'III/b', '28', 4150100),
(105, 'III/b', '30', 4280800),
(106, 'III/b', '32', 4415600),
(107, 'III/c', '0', 2802300),
(108, 'III/c', '2', 2890500),
(109, 'III/c', '4', 2981500),
(110, 'III/c', '6', 3075500),
(111, 'III/c', '8', 3172300),
(112, 'III/c', '10', 3272200),
(113, 'III/c', '12', 3375300),
(114, 'III/c', '14', 3481600),
(115, 'III/c', '16', 3591200),
(116, 'III/c', '18', 3704300),
(117, 'III/c', '20', 3821000),
(118, 'III/c', '22', 3941400),
(119, 'III/c', '24', 4065500),
(120, 'III/c', '26', 4193500),
(121, 'III/c', '28', 4325600),
(122, 'III/c', '30', 4461800),
(123, 'III/c', '32', 4602400),
(124, 'III/d', '0', 2920800),
(125, 'III/d', '2', 3012800),
(126, 'III/d', '4', 3107700),
(127, 'III/d', '6', 3205500),
(128, 'III/d', '8', 3306500),
(129, 'III/d', '10', 3410600),
(130, 'III/d', '12', 3518100),
(131, 'III/d', '14', 3628900),
(132, 'III/d', '16', 3743100),
(133, 'III/d', '18', 3861000),
(134, 'III/d', '20', 3982600),
(135, 'III/d', '22', 4108100),
(136, 'III/d', '24', 4237500),
(137, 'III/d', '26', 4370900),
(138, 'III/d', '28', 4508600),
(139, 'III/d', '30', 4650600),
(140, 'III/d', '32', 4797000),
(141, 'IV/a', '0', 3044300),
(142, 'IV/a', '2', 3140200),
(143, 'IV/a', '4', 3239100),
(144, 'IV/a', '6', 3341100),
(145, 'IV/a', '8', 3446400),
(146, 'IV/a', '10', 3554900),
(147, 'IV/a', '12', 3666900),
(148, 'IV/a', '14', 3782400),
(149, 'IV/a', '16', 3901500),
(150, 'IV/a', '18', 4024400),
(151, 'IV/a', '20', 4151100),
(152, 'IV/a', '22', 4281800),
(153, 'IV/a', '24', 4416700),
(154, 'IV/a', '26', 4555800),
(155, 'IV/a', '28', 4699300),
(156, 'IV/a', '30', 4847300),
(157, 'IV/a', '32', 5000000),
(158, 'IV/b', '0', 3173100),
(159, 'IV/b', '2', 3273100),
(160, 'IV/b', '4', 3376100),
(161, 'IV/b', '6', 3482500),
(162, 'IV/b', '8', 3592100),
(163, 'IV/b', '10', 3705300),
(164, 'IV/b', '12', 3822000),
(165, 'IV/b', '14', 3942400),
(166, 'IV/b', '16', 4066500),
(167, 'IV/b', '18', 4194600),
(168, 'IV/b', '20', 4326700),
(169, 'IV/b', '22', 4463000),
(170, 'IV/b', '24', 4603500),
(171, 'IV/b', '26', 4748500),
(172, 'IV/b', '28', 4898100),
(173, 'IV/b', '30', 5052300),
(174, 'IV/b', '32', 5211500),
(175, 'IV/c', '0', 3307300),
(176, 'IV/c', '2', 3411500),
(177, 'IV/c', '4', 3518900),
(178, 'IV/c', '6', 3629800),
(179, 'IV/c', '8', 3744100),
(180, 'IV/c', '10', 3862000),
(181, 'IV/c', '12', 3983600),
(182, 'IV/c', '14', 4109100),
(183, 'IV/c', '16', 4238500),
(184, 'IV/c', '18', 4372000),
(185, 'IV/c', '20', 4509700),
(186, 'IV/c', '22', 4651800),
(187, 'IV/c', '24', 4798300),
(188, 'IV/c', '26', 4949400),
(189, 'IV/c', '28', 5105300),
(190, 'IV/c', '30', 5266100),
(191, 'IV/c', '32', 5431900),
(192, 'IV/d', '0', 3447200),
(193, 'IV/d', '2', 3555800),
(194, 'IV/d', '4', 3667800),
(195, 'IV/d', '6', 3783300),
(196, 'IV/d', '8', 3902500),
(197, 'IV/d', '10', 4025400),
(198, 'IV/d', '12', 4152200),
(199, 'IV/d', '14', 4282900),
(200, 'IV/d', '16', 4417800),
(201, 'IV/d', '18', 4557000),
(202, 'IV/d', '20', 4700500),
(203, 'IV/d', '22', 4848500),
(204, 'IV/d', '24', 5001200),
(205, 'IV/d', '26', 5158700),
(206, 'IV/d', '28', 5321200),
(207, 'IV/d', '30', 5488800),
(208, 'IV/d', '32', 5661700),
(209, 'IV/e', '0', 3593100),
(210, 'IV/e', '2', 3706200),
(211, 'IV/e', '4', 3822900),
(212, 'IV/e', '6', 3943300),
(213, 'IV/e', '8', 4067500),
(214, 'IV/e', '10', 4195700),
(215, 'IV/e', '12', 4327800),
(216, 'IV/e', '14', 4464100),
(217, 'IV/e', '16', 4604700),
(218, 'IV/e', '18', 4749700),
(219, 'IV/e', '20', 4899300),
(220, 'IV/e', '22', 5053600),
(221, 'IV/e', '24', 5212800),
(222, 'IV/e', '26', 537700),
(223, 'IV/e', '28', 5546300),
(224, 'IV/e', '30', 5721000),
(225, 'IV/e', '32', 5901200);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_pendidikan`
--

CREATE TABLE `master_pendidikan` (
  `id` int(11) NOT NULL,
  `pegawai_id` varchar(25) COLLATE utf8_bin NOT NULL,
  `tingkat` varchar(50) COLLATE utf8_bin NOT NULL,
  `nama_s` varchar(50) COLLATE utf8_bin NOT NULL,
  `jurusan` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `tahun` varchar(5) COLLATE utf8_bin NOT NULL,
  `no_Ijazah` varchar(50) COLLATE utf8_bin NOT NULL,
  `gelar` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `ijazah` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `master_pendidikan`
--

INSERT INTO `master_pendidikan` (`id`, `pegawai_id`, `tingkat`, `nama_s`, `jurusan`, `tahun`, `no_Ijazah`, `gelar`, `ijazah`, `created_at`, `updated_at`) VALUES
(1, '14', 'SD', 'SD NO 45/I KOTA JAMBI', '-', '1979', '-', '-', '', '2020-12-11 02:47:58', '2020-12-11 02:47:58'),
(2, '14', 'SMP/MTs', 'SMP NO 2  KOTA JAMBI', '-', '1982', '-', '-', '', '2020-12-11 02:52:03', '2020-12-11 02:52:03'),
(3, '14', 'SMA/MA/SMK', 'SMA DB 2 KOTA JAMBI', 'IPA', '1985', '-', '-', '', '2020-12-11 02:53:14', '2020-12-11 02:53:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_peraturan`
--

CREATE TABLE `master_peraturan` (
  `id` int(11) NOT NULL,
  `no` varchar(4) COLLATE utf8_bin NOT NULL,
  `tahun` varchar(4) COLLATE utf8_bin NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `master_peraturan`
--

INSERT INTO `master_peraturan` (`id`, `no`, `tahun`, `tgl`) VALUES
(2, '15', '2019', '2019-03-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_pns`
--

CREATE TABLE `master_pns` (
  `id` int(11) NOT NULL,
  `pegawai_id` varchar(25) COLLATE utf8_bin NOT NULL,
  `no_capeg` varchar(25) COLLATE utf8_bin NOT NULL,
  `master_gol_id` varchar(5) COLLATE utf8_bin NOT NULL,
  `tmt_capeg` date NOT NULL,
  `scan_capeg` varchar(255) COLLATE utf8_bin NOT NULL,
  `no_skumptk` varchar(25) COLLATE utf8_bin NOT NULL,
  `tmt_skumptk` date NOT NULL,
  `scan_skumptk` varchar(255) COLLATE utf8_bin NOT NULL,
  `no_pns` varchar(25) COLLATE utf8_bin NOT NULL,
  `tmt_pns` date NOT NULL,
  `scan_pns` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_teknis`
--

CREATE TABLE `master_teknis` (
  `id` int(11) NOT NULL,
  `pegawai_id` varchar(25) COLLATE utf8_bin NOT NULL,
  `nama_t` varchar(150) COLLATE utf8_bin NOT NULL,
  `lama` varchar(150) COLLATE utf8_bin NOT NULL,
  `tgl_m` date NOT NULL,
  `tgl_s` date NOT NULL,
  `no_sertifikat` varchar(150) COLLATE utf8_bin NOT NULL,
  `penyelenggara` varchar(255) COLLATE utf8_bin NOT NULL,
  `arsip` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `master_teknis`
--

INSERT INTO `master_teknis` (`id`, `pegawai_id`, `nama_t`, `lama`, `tgl_m`, `tgl_s`, `no_sertifikat`, `penyelenggara`, `arsip`, `created_at`, `updated_at`) VALUES
(1, '14', 'DIKLAT PIM iv', '40 HARI', '2020-12-11', '2020-12-11', '-', 'bksd', '', '2020-12-11 02:54:59', '2020-12-11 02:54:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `meninggal`
--

CREATE TABLE `meninggal` (
  `id` int(11) NOT NULL,
  `pegawai_id` varchar(5) COLLATE utf8_bin NOT NULL,
  `tgl` date NOT NULL,
  `lokasi` varchar(255) COLLATE utf8_bin NOT NULL,
  `arsip` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `meninggal`
--

INSERT INTO `meninggal` (`id`, `pegawai_id`, `tgl`, `lokasi`, `arsip`, `created_at`, `updated_at`) VALUES
(1, '7', '2020-12-10', '-', '1607413286_absen manual.pdf', '2020-12-08 07:41:26', '2020-12-08 07:41:26'),
(2, '7', '2020-12-10', '-', '1607413693_absen manual.pdf', '2020-12-08 07:48:13', '2020-12-08 07:48:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mutasi`
--

CREATE TABLE `mutasi` (
  `id` int(11) NOT NULL,
  `pegawai_id` varchar(5) COLLATE utf8_bin NOT NULL,
  `ke` varchar(255) COLLATE utf8_bin NOT NULL,
  `tgl_sk` date NOT NULL,
  `arsip` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `NIP` varchar(25) COLLATE utf8_bin NOT NULL,
  `NIP_lama` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `Nama` varchar(50) COLLATE utf8_bin NOT NULL,
  `NIK` varchar(20) COLLATE utf8_bin NOT NULL,
  `KK` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `tempat_L` varchar(50) COLLATE utf8_bin NOT NULL,
  `tgl_L` date NOT NULL,
  `JK` varchar(1) COLLATE utf8_bin NOT NULL,
  `Alamat` varchar(100) COLLATE utf8_bin NOT NULL,
  `hp` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `agama` varchar(15) COLLATE utf8_bin NOT NULL,
  `status` varchar(10) COLLATE utf8_bin NOT NULL,
  `master_jabatan_id` int(6) NOT NULL,
  `jab` varchar(100) COLLATE utf8_bin NOT NULL,
  `master_gol_id` int(6) NOT NULL,
  `gapok` int(8) NOT NULL,
  `NPWP` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `karpeg` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `BPJS` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `masa_kerja_t` int(11) DEFAULT NULL,
  `masa_kerja_b` int(11) NOT NULL,
  `asal_ins` varchar(255) COLLATE utf8_bin NOT NULL,
  `aktif` varchar(10) COLLATE utf8_bin NOT NULL,
  `foto` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `NIP`, `NIP_lama`, `Nama`, `NIK`, `KK`, `tempat_L`, `tgl_L`, `JK`, `Alamat`, `hp`, `email`, `agama`, `status`, `master_jabatan_id`, `jab`, `master_gol_id`, `gapok`, `NPWP`, `karpeg`, `BPJS`, `masa_kerja_t`, `masa_kerja_b`, `asal_ins`, `aktif`, `foto`, `created_at`, `Updated_at`) VALUES
(8, '19751219 199412 1 001', '-', 'Aminullah, AP., ME', '-', '-', 'Jambi', '1975-12-19', 'L', 'RT 05 Desa Benteng Rendah Kec. Mersam', '0___-____-____', '-', 'islam', 'menikah', 2, 'Kepala Dinas Perhubungan', 3, 4949400, '-', '-', '-', 0, 0, 'DPR KAB. BATANG HARI', 'aktif', 'no-photo.png', '2020-12-16 08:16:35', '2020-12-11 01:44:16'),
(9, '19650710 198601 1 001', '-', 'Dwi Wasto Asmi, S.IP', '-', '-', 'Lubuk Basung', '1965-07-10', 'L', 'Jln. Gajah Mada Lrg. SDLB RT 08/RW 02 Kel. No. 84 Rengas Condong', '0___-____-____', '-', 'islam', 'menikah', 3, 'Kabid Penataan Lalu Lintas', 5, 4508600, '-', '-', '-', 0, 0, 'Dinas PDK', 'aktif', 'no-photo.png', '2020-12-16 08:16:35', '2020-12-09 04:00:45'),
(10, '19650910 198601 1 001', '-', 'Abri.R, S.Pd', '-', '-', 'Kerinci', '1965-09-10', 'L', 'Jln. Pramuka Muara Bulian', '0___-____-____', '-', 'islam', 'menikah', 3, 'Kasi Pengujian Kendaraan Bermotor', 5, 4699300, '-', '-', '-', 0, 0, '-', 'aktif', 'no-photo.png', '2020-12-16 08:16:35', '2020-12-09 04:47:37'),
(11, '19630305 198503 1 011', '-', 'Ahmad Sobri', '-', '-', 'Mata Gual', '1963-03-05', 'L', 'RT 01 Pasar Baru Muara Bulian Kab. Batang Hari', '0___-____-____', '-', 'islam', 'bujang', 7, 'Penguji Kendaraan Bermotor', 7, 4461800, '-', '-', '-', 0, 0, '-', 'aktif', 'no-photo.png', '2020-12-16 08:16:35', '2020-12-09 06:50:57'),
(12, '19760203 200801 1 002', '-', 'Ahmadul Khoiri', '-', '-', ':Muara Bulian', '1976-02-03', 'L', 'jln. Pemuda Kel. Rengas Condong Kec. Muara Bulian', '0___-____-____', '-', 'islam', 'menikah', 7, 'Bendahara Penerimaan', 11, 2772500, '-', '-', '-', 0, 0, '-', 'aktif', 'no-photo.png', '2020-12-16 08:16:35', '2020-12-09 05:23:38'),
(13, '19740427 200701 1 006', '-', 'KMS. Andi Zaidan', '-', '-', 'Jambi', '1974-04-27', 'L', 'Rantau Kapas Mudo RT 001/-', '0___-____-____', '-', 'islam', 'menikah', 7, 'Staff', 10, 2074700, '-', '-', '-', 0, 0, '-', 'aktif', 'no-photo.png', '2020-12-16 13:06:55', '2020-12-16 13:06:55'),
(14, '19650710 198603 2 008', '430 008 111', 'Yuliana', '-', '', 'JAMBI', '1965-07-10', 'P', 'JALAN SULAWESI NO 11 RT 11 RW 04 PERUMNAS MUARA BULIAN', '0852-4614-6851', 'ubedanayuli@gmail.com', 'islam', 'gadis', 7, 'PELAKSANA', 6, 0, '-', '-', '-', 0, 0, 'DINAS PDK', 'aktif', 'no-photo.png', '2020-12-16 08:17:37', '2020-12-14 02:39:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pensiun`
--

CREATE TABLE `pensiun` (
  `id` int(11) NOT NULL,
  `pegawai_id` varchar(5) COLLATE utf8_bin NOT NULL,
  `tgl_sk` date NOT NULL,
  `arsip` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_gol`
--

CREATE TABLE `riwayat_gol` (
  `id` int(11) NOT NULL,
  `pegawai_id` varchar(25) COLLATE utf8_bin NOT NULL,
  `master_gol_id` varchar(6) COLLATE utf8_bin NOT NULL,
  `no_sk` varchar(150) COLLATE utf8_bin NOT NULL,
  `tmt` date NOT NULL,
  `tgl` date NOT NULL,
  `arsip` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_jab`
--

CREATE TABLE `riwayat_jab` (
  `id` int(11) NOT NULL,
  `pegawai_id` varchar(25) COLLATE utf8_bin NOT NULL,
  `jabatan` varchar(100) COLLATE utf8_bin NOT NULL,
  `master_jabatan_id` varchar(6) COLLATE utf8_bin NOT NULL,
  `tmt` date DEFAULT NULL,
  `tgl_sk` date DEFAULT NULL,
  `tmt_lantik` date DEFAULT NULL,
  `no_sk` varchar(50) COLLATE utf8_bin NOT NULL,
  `unit_k` varchar(50) COLLATE utf8_bin NOT NULL,
  `satuan` varchar(50) COLLATE utf8_bin NOT NULL,
  `arsip` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `riwayat_jab`
--

INSERT INTO `riwayat_jab` (`id`, `pegawai_id`, `jabatan`, `master_jabatan_id`, `tmt`, `tgl_sk`, `tmt_lantik`, `no_sk`, `unit_k`, `satuan`, `arsip`, `created_at`, `updated_at`) VALUES
(1, '14', 'ka', '8', '2020-12-11', '2020-12-11', '2020-12-11', '-', '-', '-', '', '2021-02-18 14:00:42', '2020-12-11 04:04:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gaji_berkala`
--

CREATE TABLE `tbl_gaji_berkala` (
  `id` int(11) NOT NULL,
  `No` varchar(50) COLLATE utf8_bin NOT NULL,
  `pegawai_id` varchar(25) COLLATE utf8_bin NOT NULL,
  `tgl` date NOT NULL,
  `gaji_lama` int(11) NOT NULL,
  `gaji_baru` int(11) NOT NULL,
  `pejabat` varchar(150) COLLATE utf8_bin NOT NULL,
  `tgl_berlaku_L` date NOT NULL,
  `masa_L_tahun` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `masa_L_bulan` int(11) DEFAULT NULL,
  `tgl_no_L` varchar(50) COLLATE utf8_bin NOT NULL COMMENT 'Tanggal dan Normor surat sebelumnya',
  `tgl_berlaku_B` date NOT NULL,
  `masa_kerja_tahun_B` varchar(5) COLLATE utf8_bin NOT NULL,
  `masa_kerja_bulan_B` varchar(5) COLLATE utf8_bin NOT NULL,
  `master_gol_id` varchar(5) COLLATE utf8_bin NOT NULL,
  `tgl_berlaku_S` date NOT NULL COMMENT 'tanggal masa berlaku hingga',
  `arsip` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `tbl_gaji_berkala`
--

INSERT INTO `tbl_gaji_berkala` (`id`, `No`, `pegawai_id`, `tgl`, `gaji_lama`, `gaji_baru`, `pejabat`, `tgl_berlaku_L`, `masa_L_tahun`, `masa_L_bulan`, `tgl_no_L`, `tgl_berlaku_B`, `masa_kerja_tahun_B`, `masa_kerja_bulan_B`, `master_gol_id`, `tgl_berlaku_S`, `arsip`, `created_at`, `updated_at`) VALUES
(1, '1234', '8', '2020-11-03', 3500000, 3700000, 'Kepala Dinas Perhubungan', '2020-11-29', '10', 0, '13 Juni 2020/122345676', '2020-11-04', '12', '00', '5', '2020-11-29', '', '2020-12-17 06:57:14', '2020-11-29 02:33:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penghargaan`
--

CREATE TABLE `tbl_penghargaan` (
  `id` int(11) NOT NULL,
  `pegawai_id` varchar(25) COLLATE utf8_bin NOT NULL,
  `Jenis` varchar(255) COLLATE utf8_bin NOT NULL,
  `no_sk` varchar(255) COLLATE utf8_bin NOT NULL,
  `tgl_sk` date NOT NULL,
  `arsip` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pensiun`
--

CREATE TABLE `tbl_pensiun` (
  `id_pensiun` int(11) NOT NULL,
  `nip` varchar(25) COLLATE utf8_bin NOT NULL,
  `pangkat` varchar(50) COLLATE utf8_bin NOT NULL,
  `TMT` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_prestasi`
--

CREATE TABLE `tbl_prestasi` (
  `NIP` varchar(25) COLLATE utf8_bin NOT NULL,
  `Prestasi` varchar(255) COLLATE utf8_bin NOT NULL,
  `tahun` varchar(4) COLLATE utf8_bin NOT NULL,
  `arsip` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `arsip_gaji_berkala`
--
ALTER TABLE `arsip_gaji_berkala`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `arsip_pegawai`
--
ALTER TABLE `arsip_pegawai`
  ADD PRIMARY KEY (`id_peg`);

--
-- Indeks untuk tabel `diklat_struktural`
--
ALTER TABLE `diklat_struktural`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawai_id` (`pegawai_id`);

--
-- Indeks untuk tabel `dt_kadis`
--
ALTER TABLE `dt_kadis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `dt_keluarga`
--
ALTER TABLE `dt_keluarga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawai_id` (`pegawai_id`);

--
-- Indeks untuk tabel `masakerja`
--
ALTER TABLE `masakerja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_gol`
--
ALTER TABLE `master_gol`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_jabatan`
--
ALTER TABLE `master_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_j_gaji`
--
ALTER TABLE `master_j_gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_pendidikan`
--
ALTER TABLE `master_pendidikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawai_id` (`pegawai_id`);

--
-- Indeks untuk tabel `master_peraturan`
--
ALTER TABLE `master_peraturan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_pns`
--
ALTER TABLE `master_pns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawai_id` (`pegawai_id`),
  ADD KEY `master_gol_id` (`master_gol_id`);

--
-- Indeks untuk tabel `master_teknis`
--
ALTER TABLE `master_teknis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawai_id` (`pegawai_id`);

--
-- Indeks untuk tabel `meninggal`
--
ALTER TABLE `meninggal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawai_id` (`pegawai_id`);

--
-- Indeks untuk tabel `mutasi`
--
ALTER TABLE `mutasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawai_id` (`pegawai_id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `master_jabatan_id` (`master_jabatan_id`,`master_gol_id`);

--
-- Indeks untuk tabel `pensiun`
--
ALTER TABLE `pensiun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `riwayat_gol`
--
ALTER TABLE `riwayat_gol`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawai_id` (`pegawai_id`),
  ADD KEY `master_gol_id` (`master_gol_id`);

--
-- Indeks untuk tabel `riwayat_jab`
--
ALTER TABLE `riwayat_jab`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawai_id` (`pegawai_id`,`master_jabatan_id`);

--
-- Indeks untuk tabel `tbl_gaji_berkala`
--
ALTER TABLE `tbl_gaji_berkala`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawai_id` (`pegawai_id`);

--
-- Indeks untuk tabel `tbl_penghargaan`
--
ALTER TABLE `tbl_penghargaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawai_id` (`pegawai_id`);

--
-- Indeks untuk tabel `tbl_pensiun`
--
ALTER TABLE `tbl_pensiun`
  ADD PRIMARY KEY (`id_pensiun`);

--
-- Indeks untuk tabel `tbl_prestasi`
--
ALTER TABLE `tbl_prestasi`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `NIP` (`NIP`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `arsip_gaji_berkala`
--
ALTER TABLE `arsip_gaji_berkala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `arsip_pegawai`
--
ALTER TABLE `arsip_pegawai`
  MODIFY `id_peg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `diklat_struktural`
--
ALTER TABLE `diklat_struktural`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dt_kadis`
--
ALTER TABLE `dt_kadis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `dt_keluarga`
--
ALTER TABLE `dt_keluarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `masakerja`
--
ALTER TABLE `masakerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `master_gol`
--
ALTER TABLE `master_gol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `master_jabatan`
--
ALTER TABLE `master_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `master_j_gaji`
--
ALTER TABLE `master_j_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT untuk tabel `master_pendidikan`
--
ALTER TABLE `master_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `master_peraturan`
--
ALTER TABLE `master_peraturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `master_pns`
--
ALTER TABLE `master_pns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_teknis`
--
ALTER TABLE `master_teknis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `meninggal`
--
ALTER TABLE `meninggal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mutasi`
--
ALTER TABLE `mutasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pensiun`
--
ALTER TABLE `pensiun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `riwayat_gol`
--
ALTER TABLE `riwayat_gol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `riwayat_jab`
--
ALTER TABLE `riwayat_jab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_gaji_berkala`
--
ALTER TABLE `tbl_gaji_berkala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_penghargaan`
--
ALTER TABLE `tbl_penghargaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_pensiun`
--
ALTER TABLE `tbl_pensiun`
  MODIFY `id_pensiun` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
