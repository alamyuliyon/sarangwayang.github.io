-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 20, 2023 at 03:42 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sarangwayang`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int NOT NULL,
  `judul` text NOT NULL,
  `slug` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `judul`, `slug`) VALUES
(1, 'Visi', 'Produk terjamin dengan mutu dan kualitas terbaik.'),
(2, 'Misi', 'Melesatarikan bagian dari warisan budaya asli bangsa Indonesia.');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `id_user` varchar(25) NOT NULL,
  `id_invoice` varchar(30) NOT NULL,
  `id_brg` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Triggers `cart`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `cart` FOR EACH ROW BEGIN
	UPDATE product SET stok = stok-NEW.quantity
    WHERE id_brg = NEW.id_brg;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(7, 'Kayu'),
(8, 'Kertas'),
(9, 'Kulit');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kabupaten` int NOT NULL,
  `id_provinsi` int NOT NULL,
  `kabupaten` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id_kabupaten`, `id_provinsi`, `kabupaten`) VALUES
(1, 22, 'Kota Denpasar'),
(2, 17, 'Kabupaten Lebak'),
(3, 17, 'Kabupaten Pandeglang'),
(4, 17, 'Kabupaten Serang'),
(5, 17, 'Kabupaten Tangerang'),
(6, 17, 'Kota Cilegon'),
(7, 17, 'Kota Serang'),
(8, 17, 'Kota Tangerang'),
(9, 17, 'Kota Tangerang Selatan'),
(11, 1, 'Kabupaten Aceh Barat'),
(12, 1, 'Kabupaten Aceh Barat Daya'),
(13, 1, 'Kabupaten Aceh Besar'),
(14, 1, 'Kabupaten Aceh Jaya'),
(15, 1, 'Kabupaten Aceh Selatan'),
(16, 1, 'Kabupaten Aceh Singkil'),
(17, 1, 'Kabupaten Aceh Tamiang'),
(18, 1, 'Kabupaten Aceh Tengah'),
(19, 1, 'Kabupaten Aceh Tenggara'),
(20, 1, 'Kabupaten Aceh Timur'),
(21, 1, 'Kabupaten Aceh Utara'),
(22, 1, 'Kabupaten Bener Meriah'),
(23, 1, 'Kabupaten Bireuen'),
(24, 1, 'Kabupaten Gayo Lues'),
(25, 1, 'Kabupaten Nagan Raya'),
(26, 1, 'Kabupaten Pidie'),
(27, 1, 'Kabupaten Pidie Jaya'),
(28, 1, 'Kabupaten Simeulue'),
(29, 1, 'Kota Banda Aceh'),
(30, 1, 'Kota Langsa'),
(31, 1, 'Kota Lhokseumawe'),
(32, 1, 'Kota Sabang'),
(33, 1, 'Kota Subulussalam'),
(34, 2, 'Kabupaten Asahan'),
(35, 2, 'Kabupaten Batubara'),
(36, 2, 'Kabupaten Dairi'),
(37, 2, 'Kabupaten Deli Serdang'),
(38, 2, 'Kabupaten Humbang Hasundutan'),
(39, 2, 'Kabupaten Karo'),
(40, 2, 'Kabupaten Labuhanbatu'),
(41, 2, 'Kabupaten Labuhanbatu Selatan'),
(42, 2, 'Kabupaten Labuhanbatu Utara'),
(43, 2, 'Kabupaten Langkat'),
(44, 2, 'Kabupaten Mandailing Natal'),
(45, 2, 'Kabupaten Nias'),
(46, 2, 'Kabupaten Nias Barat'),
(47, 2, 'Kabupaten Nias Selatan'),
(48, 2, 'Kabupaten Nias Utara'),
(49, 2, 'Kabupaten Padang Lawas'),
(50, 2, 'Kabupaten Padang Lawas Utara'),
(51, 2, 'Kabupaten Pakpak Bharat'),
(52, 2, 'Kabupaten Samosir'),
(53, 2, 'Kabupaten Serdang Bedagai'),
(54, 2, 'Kabupaten Simalungun'),
(55, 2, 'Kabupaten Tapanuli Selatan'),
(56, 2, 'Kabupaten Tapanuli Tengah'),
(57, 2, 'Kabupaten Tapanuli Utara'),
(58, 2, 'Kabupaten Toba Samosir'),
(59, 2, 'Kota Binjai'),
(60, 2, 'Kota Gunungsitoli'),
(61, 2, 'Kota Medan'),
(62, 2, 'Kota Padangsidempuan'),
(63, 2, 'Kota Pematangsiantar'),
(64, 2, 'Kota Sibolga'),
(65, 2, 'Kota Tanjungbalai'),
(66, 2, 'Kota Tebing Tinggi'),
(67, 3, 'Kabupaten Banyuasin'),
(68, 3, 'Kabupaten Empat Lawang'),
(69, 3, 'Kabupaten Lahat'),
(70, 3, 'Kabupaten Muara Enim'),
(71, 3, 'Kabupaten Musi Banyuasin'),
(72, 3, 'Kabupaten Musi Rawas'),
(73, 3, 'Kabupaten Musi Rawas Utara'),
(74, 3, 'Kabupaten Ogan Ilir'),
(75, 3, 'Kabupaten Ogan Komering Ilir'),
(76, 3, 'Kabupaten Ogan Komering Ulu'),
(77, 3, 'Kabupaten Ogan Komering Ulu Selatan'),
(78, 3, 'Kabupaten Ogan Komering Ulu Timur'),
(79, 3, 'Kabupaten Penukal Abab Lematang Ilir'),
(80, 3, 'Kota Lubuklinggau'),
(81, 3, 'Kota Pagar Alam'),
(82, 3, 'Kota Palembang'),
(83, 3, 'Kota Prabumulih'),
(84, 4, 'Kabupaten Agam'),
(85, 4, 'Kabupaten Dharmasraya'),
(86, 4, 'Kabupaten Kepulauan Mentawai'),
(87, 4, 'Kabupaten Lima Puluh Kota'),
(88, 4, 'Kabupaten Padang Pariaman'),
(89, 4, 'Kabupaten Pasaman'),
(90, 4, 'Kabupaten Pasaman Barat'),
(91, 4, 'Kabupaten Pesisir Selatan'),
(92, 4, 'Kabupaten Sijunjung'),
(93, 4, 'Kabupaten Solok'),
(94, 4, 'Kabupaten Solok Selatan'),
(95, 4, 'Kabupaten Tanah Datar'),
(96, 4, 'Kota Bukittinggi'),
(97, 4, 'Kota Padang'),
(98, 4, 'Kota Padangpanjang'),
(99, 4, 'Kota Pariaman'),
(100, 4, 'Kota Payakumbuh'),
(101, 4, 'Kota Sawahlunto'),
(102, 4, 'Kota Solok'),
(103, 5, 'Kabupaten Bengkulu Selatan'),
(104, 5, 'Kabupaten Bengkulu Tengah'),
(105, 5, 'Kabupaten Bengkulu Utara'),
(106, 5, 'Kabupaten Kaur'),
(107, 5, 'Kabupaten Kepahiang'),
(108, 5, 'Kabupaten Lebong'),
(109, 5, 'Kabupaten Mukomuko'),
(110, 5, 'Kabupaten Rejang Lebong'),
(111, 5, 'Kabupaten Seluma'),
(112, 5, 'Kota Bengkulu'),
(113, 7, 'Kabupaten Bintan'),
(114, 7, 'Kabupaten Karimun'),
(115, 7, 'Kabupaten Kepulauan Anambas'),
(116, 7, 'Kabupaten Lingga'),
(117, 7, 'Kabupaten Natuna'),
(118, 7, 'Kota Batam'),
(119, 7, 'Kota Tanjung Pinang'),
(120, 6, 'Kabupaten Bengkalis'),
(121, 6, 'Kabupaten Indragiri Hilir'),
(122, 6, 'Kabupaten Indragiri Hulu'),
(123, 6, 'Kabupaten Kampar'),
(124, 6, 'Kabupaten Kepulauan Meranti'),
(125, 6, 'Kabupaten Kuantan Singingi'),
(126, 6, 'Kabupaten Pelalawan'),
(127, 6, 'Kabupaten Rokan Hilir'),
(128, 6, 'Kabupaten Rokan Hulu'),
(129, 6, 'Kabupaten Siak'),
(130, 6, 'Kota Dumai'),
(131, 6, 'Kota Pekanbaru'),
(132, 8, 'Kabupaten Batanghari'),
(133, 8, 'Kabupaten Bungo'),
(134, 8, 'Kabupaten Kerinci'),
(135, 8, 'Kabupaten Merangin'),
(136, 8, 'Kabupaten Muaro Jambi'),
(137, 8, 'Kabupaten Sarolangun'),
(138, 8, 'Kabupaten Tanjung Jabung Barat'),
(139, 8, 'Kabupaten Tanjung Jabung Timur'),
(140, 8, 'Kabupaten Tebo'),
(141, 8, 'Kota Jambi'),
(142, 8, 'Kota Sungai Penuh'),
(143, 9, 'Kabupaten Lampung Tengah'),
(144, 9, 'Kabupaten Lampung Utara'),
(145, 9, 'Kabupaten Lampung Selatan'),
(146, 9, 'Kabupaten Lampung Barat'),
(147, 9, 'Kabupaten Lampung Timur'),
(148, 9, 'Kabupaten Mesuji'),
(149, 9, 'Kabupaten Pesawaran'),
(150, 9, 'Kabupaten Pesisir Barat'),
(151, 9, 'Kabupaten Pringsewu'),
(152, 9, 'Kabupaten Tulang Bawang'),
(153, 9, 'Kabupaten Tulang Bawang Barat'),
(154, 9, 'Kabupaten Tanggamus'),
(155, 9, 'Kabupaten Way Kanan'),
(156, 9, 'Kota Bandar Lampung'),
(157, 9, 'Kota Metro'),
(158, 10, 'Kabupaten Bangka'),
(159, 10, 'Kabupaten Bangka Barat'),
(160, 10, 'Kabupaten Bangka Selatan'),
(161, 10, 'Kabupaten Bangka Tengah'),
(162, 10, 'Kabupaten Belitung'),
(163, 10, 'Kabupaten Belitung Timur'),
(164, 10, 'Kota Pangkal Pinang'),
(165, 11, 'Kabupaten Berau'),
(166, 11, 'Kabupaten Kutai Barat'),
(167, 11, 'Kabupaten Kutai Kartanegara'),
(168, 11, 'Kabupaten Kutai Timur'),
(169, 11, 'Kabupaten Mahakam Ulu'),
(170, 11, 'Kabupaten Paser'),
(171, 11, 'Kabupaten Penajam Paser Utara'),
(172, 11, 'Kota Balikpapan'),
(173, 11, 'Kota Bontang'),
(174, 11, 'Kota Samarinda'),
(175, 12, 'Kabupaten Bengkayang'),
(176, 12, 'Kabupaten Kapuas Hulu'),
(177, 12, 'Kabupaten Kayong Utara'),
(178, 12, 'Kabupaten Ketapang'),
(179, 12, 'Kabupaten Kubu Raya'),
(180, 12, 'Kabupaten Landak'),
(181, 12, 'Kabupaten Melawi'),
(182, 12, 'Kabupaten Mempawah'),
(183, 12, 'Kabupaten Sambas'),
(184, 12, 'Kabupaten Sanggau'),
(185, 12, 'Kabupaten Sekadau'),
(186, 12, 'Kabupaten Sintang'),
(187, 12, 'Kota Pontianak'),
(188, 12, 'Kota Singkawang'),
(189, 13, 'Kabupaten Barito Selatan'),
(190, 13, 'Kabupaten Barito Timur'),
(191, 13, 'Kabupaten Barito Utara'),
(192, 13, 'Kabupaten Gunung Mas'),
(193, 13, 'Kabupaten Kapuas'),
(194, 13, 'Kabupaten Katingan'),
(195, 13, 'Kabupaten Kotawaringin Barat'),
(196, 13, 'Kabupaten Kotawaringin Timur'),
(197, 13, 'Kabupaten Lamandau'),
(198, 13, 'Kabupaten Murung Raya'),
(199, 13, 'Kabupaten Pulang Pisau'),
(200, 13, 'Kabupaten Sukamara'),
(201, 13, 'Kabupaten Seruyan'),
(202, 13, 'Kota Palangka Raya'),
(203, 14, 'Kabupaten Balangan'),
(204, 14, 'Kabupaten Banjar'),
(205, 14, 'Kabupaten Barito Kuala'),
(206, 14, 'Kabupaten Hulu Sungai Selatan'),
(207, 14, 'Kabupaten Hulu Sungai Tengah'),
(208, 14, 'Kabupaten Hulu Sungai Utara'),
(209, 14, 'Kabupaten Kotabaru'),
(210, 14, 'Kabupaten Tabalong'),
(211, 14, 'Kabupaten Tanah Bumbu'),
(212, 14, 'Kabupaten Tanah Laut'),
(213, 14, 'Kabupaten Tapin'),
(214, 14, 'Kota Banjarbaru'),
(215, 14, 'Kota Banjarmasin'),
(216, 15, 'Kabupaten Bulungan'),
(217, 15, 'Kabupaten Malinau'),
(218, 15, 'Kabupaten Nunukan'),
(219, 15, 'Kabupaten Tana Tidung'),
(220, 15, 'Kota Tarakan'),
(221, 16, 'Jakarta Barat'),
(222, 16, 'Jakarta Pusat'),
(223, 16, 'Jakarta Selatan'),
(224, 16, 'Jakarta Timur'),
(225, 16, 'Jakarta Utara'),
(226, 16, 'Kepulauan Seribu'),
(227, 18, 'Kabupaten Bandung'),
(228, 18, 'Kabupaten Bandung Barat'),
(229, 18, 'Kabupaten Bekasi'),
(230, 18, 'Kabupaten Bogor'),
(231, 18, 'Kabupaten Ciamis'),
(232, 18, 'Kabupaten Cianjur'),
(233, 18, 'Kabupaten Cirebon'),
(234, 18, 'Kabupaten Garut'),
(235, 18, 'Kabupaten Indramayu'),
(236, 18, 'Kabupaten Karawang'),
(237, 18, 'Kabupaten Kuningan'),
(238, 18, 'Kabupaten Majalengka'),
(239, 18, 'Kabupaten Pangandaran'),
(240, 18, 'Kabupaten Purwakarta'),
(241, 18, 'Kabupaten Subang'),
(242, 18, 'Kabupaten Sukabumi'),
(243, 18, 'Kabupaten Sumedang'),
(244, 18, 'Kabupaten Tasikmalaya'),
(245, 18, 'Kota Bandung'),
(246, 18, 'Kota Banjar'),
(247, 18, 'Kota Bekasi'),
(248, 18, 'Kota Bogor'),
(249, 18, 'Kota Cimahi'),
(250, 18, 'Kota Cirebon'),
(251, 18, 'Kota Depok'),
(252, 18, 'Kota Sukabumi'),
(253, 18, 'Kota Tasikmalaya'),
(254, 19, 'Kabupaten Banjarnegara'),
(255, 19, 'Kabupaten Banyumas'),
(256, 19, 'Kabupaten Batang'),
(257, 19, 'Kabupaten Blora'),
(258, 19, 'Kabupaten Boyolali'),
(259, 19, 'Kabupaten Brebes'),
(260, 19, 'Kabupaten Cilacap'),
(261, 19, 'Kabupaten Demak'),
(262, 19, 'Kabupaten Grobogan'),
(263, 19, 'Kabupaten Jepara'),
(264, 19, 'Kabupaten Karanganyar'),
(265, 19, 'Kabupaten Kebumen'),
(266, 19, 'Kabupaten Kendal'),
(267, 19, 'Kabupaten Klaten'),
(268, 19, 'Kabupaten Kudus'),
(269, 19, 'Kabupaten Magelang'),
(270, 19, 'Kabupaten Pati'),
(271, 19, 'Kabupaten Pekalongan'),
(272, 19, 'Kabupaten Pemalang'),
(273, 19, 'Kabupaten Purbalingga'),
(274, 19, 'Kabupaten Purworejo'),
(275, 19, 'Kabupaten Rembang'),
(276, 19, 'Kabupaten Semarang'),
(277, 19, 'Kabupaten Sragen'),
(278, 19, 'Kabupaten Sukoharjo'),
(279, 19, 'Kabupaten Tegal'),
(280, 19, 'Kabupaten Temanggung'),
(281, 19, 'Kabupaten Wonogiri'),
(282, 19, 'Kabupaten Wonosobo'),
(283, 19, 'Kota Magelang'),
(284, 19, 'Kota Pekalongan'),
(285, 19, 'Kota Salatiga'),
(286, 19, 'Kota Semarang'),
(287, 19, 'Kota Surakarta'),
(288, 19, 'Kota Tegal'),
(289, 20, 'Kabupaten Bantul'),
(290, 20, 'Kabupaten Gunungkidul'),
(291, 20, 'Kabupaten Kulon Progo'),
(292, 20, 'Kabupaten Sleman'),
(293, 20, 'Kota Yogyakarta'),
(294, 21, 'Kabupaten Bangkalan'),
(295, 21, 'Kabupaten Banyuwangi'),
(296, 21, 'Kabupaten Blitar'),
(297, 21, 'Kabupaten Bojonegoro'),
(298, 21, 'Kabupaten Bondowoso'),
(299, 21, 'Kabupaten Gresik'),
(300, 21, 'Kabupaten Jember'),
(301, 21, 'Kabupaten Jombang'),
(302, 21, 'Kabupaten Kediri'),
(303, 21, 'Kabupaten Lamongan'),
(304, 21, 'Kabupaten Lumajang'),
(305, 21, 'Kabupaten Madiun'),
(306, 21, 'Kabupaten Magetan'),
(307, 21, 'Kabupaten Malang'),
(308, 21, 'Kabupaten Mojokerto'),
(309, 21, 'Kabupaten Nganjuk'),
(310, 21, 'Kabupaten Ngawi'),
(311, 21, 'Kabupaten Pacitan'),
(312, 21, 'Kabupaten Pamekasan'),
(313, 21, 'Kabupaten Pasuruan'),
(314, 21, 'Kabupaten Ponorogo'),
(315, 21, 'Kabupaten Probolinggo'),
(316, 21, 'Kabupaten Sampang'),
(317, 21, 'Kabupaten Sidoarjo'),
(318, 21, 'Kabupaten Situbondo'),
(319, 21, 'Kabupaten Sumenep'),
(320, 21, 'Kabupaten Trenggalek'),
(321, 21, 'Kabupaten Tuban'),
(322, 21, 'Kabupaten Tulungagung'),
(323, 21, 'Kota Batu'),
(324, 21, 'Kota Blitar'),
(325, 21, 'Kota Kediri'),
(326, 21, 'Kota Madiun'),
(327, 21, 'Kota Malang'),
(328, 21, 'Kota Mojokerto'),
(329, 21, 'Kota Pasuruan'),
(330, 21, 'Kota Probolinggo'),
(331, 21, 'Kota Surabaya'),
(332, 22, 'Kabupaten Badung'),
(333, 22, 'Kabupaten Bangli'),
(334, 22, 'Kabupaten Buleleng'),
(335, 22, 'Kabupaten Gianyar'),
(336, 22, 'Kabupaten Jembrana'),
(337, 22, 'Kabupaten Karangasem'),
(338, 22, 'Kabupaten Klungkung'),
(339, 22, 'Kabupaten Tabanan'),
(340, 23, 'Kabupaten Bima'),
(341, 23, 'Kabupaten Dompu'),
(342, 23, 'Kabupaten Lombok Barat'),
(343, 23, 'Kabupaten Lombok Tengah'),
(344, 23, 'Kabupaten Lombok Timur'),
(345, 23, 'Kabupaten Lombok Utara'),
(346, 23, 'Kabupaten Sumbawa'),
(347, 23, 'Kabupaten Sumbawa Barat'),
(348, 23, 'Kota Bima'),
(349, 23, 'Kota Mataram');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_berita` int NOT NULL,
  `judul` text NOT NULL,
  `slug` text NOT NULL,
  `id_user` int NOT NULL,
  `isi_berita` text NOT NULL,
  `gambar` text NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_berita`, `judul`, `slug`, `id_user`, `isi_berita`, `gambar`, `tgl_posting`) VALUES
(5, 'Panerus Sejati Rahwana', 'Wibisana kaget saat tahu Dewi tari melahirkan seorang bayi perempuan yang cantik jelita...', 21, 'Wibisana kaget saat tahu Dewi tari melahirkan seorang bayi perempuan yang cantik jelita. Merasa akan ada peristiwa mengerikan yang akan menimpa si bayi. Wibisana lalu meminta ijin kepada Dewi Tari.\r\n\r\nSetelah ijin diperoleh, Wibisana lalu mengambil bayi perempuan tadi. Selepas itu Wibisana meletakkan bayi perempuan itu ke dalam peti dan menghanyutkannya ke sungai Gangga.\r\n\r\nSelepas itu Wibisana berdiri di tengah alun-alun Alengka. Wibisana terlihat sedang merapal sebuah mantra. Selesai membaca mantra Wibasana lantas melepas panah saktinya ke angkasa.\r\n\r\nTak lama kemudian jatuhlah sebongkah mega di hadapannya. Mega itu lalu dibawa dan diserahkan kepada kakaknya, Rahwana.\r\n\r\nRahwana yang kebingungan melihat mega yang diserahkan padanya lantas bertanya kepada Wibisana.\r\n\r\n“Siapakah ini, Adi?” tanya Rahwana.\r\n\r\n“Ini anakmu yang lahir dari rahim Dewi Tari, kakang,” jawab Wibisana.\r\n\r\nTentu saja jawaban Wibisana ini membuat Rahwana marah. Rahwana merasa tidak terima dengan wujud putranya yang hanya berwujud mega.\r\n\r\nSaking marahnya, mega yang disebut sebagai putranya itu lantas dibanting dan diinjak-injak oleh Rahwana. Anehnya setelah dibanting dan diinjak-injak. Mega itu berubah menjadi seorang pemuda raksasa yang gagah.\r\n\r\nRahwana yang tadinya marah berubah menjadi girang bukan kepalang. Singkat cerita pemuda itu diberinama Indrajit dan diangkat Rahwana menjadi putra mahkota di Alengka.\r\n\r\nSementara itu bayi perempuan yang dihanyutkan Wibisana ditemukan Prabu Janaka. Bayi itu dirawat dengan baik dan kemudian diberinama Dewi Sinta.', 'Panerus_Sejati_Rahwana_.jpg', '2023-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_brg` int NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int NOT NULL,
  `stok` int NOT NULL,
  `gambar` text NOT NULL,
  `berat` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_brg`, `nama_brg`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`, `berat`) VALUES
(22, 'Kresna', 'Material terbuat dari kulit kerbau,\r\ngapet tanduk kerbau warna coklat.\r\ntinggi wayang 47 cm\r\nstandar pedalangan gagrak mataraman /jogja\r\nkualitas, tatahan/sunggingan, cat sangat halus, sempurna karena dikerjakan dengan profesional oleh perajin wayang kulit ternama.\r\n\r\nmaaf wayang kulit ini hanya untuk pagelaran wayang bukan untuk mainan.\r\nwayang kulit ini sangat sempurna untuk koleksi interior dan penggemar wayang kulit.', 'Kulit', 1000000, 84, 'kresna2.jpg', 250),
(23, 'Anoman', 'Material terbuat dari kertas duplex,\r\ngapet tanduk kerbau warna coklat.\r\ntinggi wayang 47 cm\r\nstandar pedalangan gagrak mataraman /jogja\r\nkualitas, tatahan/sunggingan, cat sangat halus, sempurna karena dikerjakan dengan profesional oleh perajin wayang ternama.\r\nmaaf wayang kertas ini hanya untuk pagelaran wayang bukan untuk mainan.\r\nwayang kulit ini sangat sempurna untuk koleksi interior dan penggemar wayang kertas.', 'Kertas', 500000, -23, 'anoman1.jpg', 500),
(24, 'Gatot Kaca', 'Material terbuat dari kayu jati.\r\ntinggi wayang 47 cm\r\nstandar pedalangan gagrak mataraman /jogja\r\nkualitas, tatahan/sunggingan, cat sangat halus, sempurna karena dikerjakan dengan profesional oleh perajin wayang ternama.\r\nmaaf wayang kayu ini hanya untuk pagelaran wayang bukan untuk mainan.\r\nwayang kulit ini sangat sempurna untuk koleksi interior dan penggemar wayang kayu.', 'Kayu', 700000, -3, 'gatotkoco2.jpg', 250);

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int NOT NULL,
  `provinsi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `provinsi`) VALUES
(1, 'Nanggroe Aceh Darussalam'),
(2, 'Sumatera Utara'),
(3, 'Sumatera Selatan'),
(4, 'Sumatera Barat'),
(5, 'Bengkulu'),
(6, 'Riau'),
(7, 'Kepulauan Riau'),
(8, 'Jambi'),
(9, 'Lampung'),
(10, 'Bangka Belitung'),
(11, 'Kalimantan Timur'),
(12, 'Kalimantan Barat'),
(13, 'Kalimantan Tengah'),
(14, 'Kalimantan Selatan'),
(15, 'Kalimantan Utara'),
(16, 'DKI Jakarta'),
(17, 'Banten'),
(18, 'Jawa Barat'),
(19, 'Jawa Tengah'),
(20, 'DI Yogyakarta'),
(21, 'Jawa Timur'),
(22, 'Bali'),
(23, 'Nusa Tenggara Barat'),
(24, 'Nusa Tenggara Timur'),
(25, 'Sulawesi Utara'),
(26, 'Sulawesi Barat'),
(27, 'Sulawesi Tengah'),
(28, 'Gorontalo'),
(29, 'Sulawesi Tenggara'),
(30, 'Sulawesi Selatan'),
(31, 'Maluku Utara'),
(32, 'Maluku'),
(33, 'Papua Barat'),
(34, 'Papua'),
(35, 'Papua Selatan'),
(36, 'Papua Tengah'),
(37, 'Papua Pegunungan');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id` int NOT NULL,
  `id_provinsi` int DEFAULT NULL,
  `id_kabupaten` int DEFAULT NULL,
  `raja_ongkir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id`, `id_provinsi`, `id_kabupaten`, `raja_ongkir`) VALUES
(1, 6, 151, '6440a49d6c385e670450d8f96f8e3bb7');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `order_id` varchar(30) NOT NULL,
  `id_user` varchar(5) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `mobile_phone` varchar(15) DEFAULT NULL,
  `id_provinsi` int DEFAULT NULL,
  `id_kabupaten` int DEFAULT NULL,
  `kode_pos` varchar(100) DEFAULT NULL,
  `payment_method` varchar(100) DEFAULT NULL,
  `tracking_id` varchar(30) DEFAULT NULL,
  `biaya` varchar(128) DEFAULT NULL,
  `transaction_time` datetime DEFAULT NULL,
  `payment_limit` datetime DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL,
  `keterangan` text,
  `service` varchar(255) NOT NULL,
  `etd` varchar(255) NOT NULL,
  `subtotal` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `id` int NOT NULL,
  `id_provinsi` int NOT NULL,
  `biaya` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`id`, `id_provinsi`, `biaya`) VALUES
(1, 1, '10000'),
(2, 17, '13000'),
(3, 16, '50000'),
(6, 19, '9000'),
(7, 21, '10000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(16) DEFAULT NULL,
  `alamat` text,
  `dob` date DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `avatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `no_telp`, `alamat`, `dob`, `password`, `level`, `avatar`) VALUES
(20, 'pelanggan', 'pelanggan@gmail.com', '085236762020', 'Bajulan Ngampel Papar Kediri Jawa Timur RT/RW 01/09', '2000-06-23', 'f581c79163ff5e7e17af365c559e9a4f', '2', 'user.png'),
(21, 'admin', 'admin@gmail.com', '085236762626', 'Bajulan Ngampel Papar Kediri Jawa Timur RT/RW 01', NULL, '804f10b991baa697fa6ce5fd7575fb7d', '1', 'user.png'),
(22, 'Customer', 'customer@gmail.com', '08126767891', 'Jl. Keang Risin No. 19', '1991-01-01', 'b23cf2d0fb74b0ffa0cf4c70e6e04926', '2', 'user.png'),
(23, 'Nabila Syakieb', 'nabila@gmail.com', '085156580378', 'Jalan Raya Bintaro Permai, Blok F4 No. 19', '2000-04-14', 'b23cf2d0fb74b0ffa0cf4c70e6e04926', '2', 'user.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id_kabupaten` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=352;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_berita` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_brg` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_provinsi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
