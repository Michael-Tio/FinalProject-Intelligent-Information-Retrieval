-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2023 at 05:33 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berita`
--

-- --------------------------------------------------------

--
-- Table structure for table `testing`
--

CREATE TABLE `testing` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date` varchar(45) NOT NULL,
  `original_category` varchar(45) NOT NULL,
  `classification` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testing`
--

INSERT INTO `testing` (`id`, `title`, `date`, `original_category`, `classification`) VALUES
(1, 'Antam Prediksi Harga Emas Naik Tahun Ini Berkat Ancaman Resesi', 'Kamis, 05 Jan 2023 14:45 WIB', 'Ekonomi', 'Ekonomi'),
(2, 'Moody\'s Proyeksi Ekonomi 2023 Melambat, Tapi Tak Resesi', 'Kamis, 05 Jan 2023 07:35 WIB', 'Ekonomi', 'Ekonomi'),
(3, 'IMF Prediksi Sepertiga Ekonomi Dunia Resesi Tahun Ini', 'Senin, 02 Jan 2023 20:42 WIB', 'Ekonomi', 'Ekonomi'),
(4, 'Bangkit dari Tekanan Ekonomi Akibat Pandemi di Tengah Ancaman Resesi', 'Selasa, 27 Des 2022 11:16 WIB', 'Ekonomi', 'Ekonomi'),
(5, 'Krisis Ekonomi Pakistan, Mal dan Pasar Tutup Lebih Awal', 'Rabu, 04 Jan 2023 19:03 WIB', 'Ekonomi', 'Ekonomi'),
(6, 'Benarkah Ekonomi RI \'Genting\' Hingga Perlu Terbit Perppu Cipta Kerja?', 'Selasa, 03 Jan 2023 07:22 WIB', 'Ekonomi', 'Ekonomi'),
(7, 'Serbia Waswas Dunia Makin Suram di 2023, Krisis Parah hingga Konflik', 'Kamis, 05 Jan 2023 07:46 WIB', 'Internasional', 'Ekonomi'),
(8, 'Rupiah Diramal Lesu Sepanjang 2023', 'Selasa, 03 Jan 2023 16:22 WIB', 'Ekonomi', 'Ekonomi'),
(9, 'Covid China Benamkan Harga Minyak ke US$72', 'Kamis, 05 Jan 2023 07:55 WIB', 'Ekonomi', 'Ekonomi'),
(10, 'Nestapa Ekonomi Argentina Meski Sukses Dibawa Messi Juara Piala Dunia', 'Senin, 19 Des 2022 14:57 WIB', 'Ekonomi', 'Ekonomi'),
(11, 'Hadapi Resesi, Pemuda Perindo Bagikan Tips untuk Para Milenial', '05 Januari 2023 20:31 WIB', 'NASIONAL', 'NASIONAL'),
(12, 'Sadar Pentingnya Politik Jadi Alasan Pemudi ini Gabung Pemuda Perindo', '05 Januari 2023 16:38 WIB', 'NASIONAL', 'NASIONAL'),
(13, 'IHSG Diprediksi Kembali ke Level 7.000-an pada Akhir 2023, Cek Saham-Saham Potensial', '05 Januari 2023 10:48 WIB', 'IDXCHANNEL', 'NASIONAL'),
(14, 'Harga Minyak Dunia Anjlok Imbas Meningkatnya Kasus Covid-19 di China', '05 Januari 2023 07:31 WIB', 'ECONOMY', 'NASIONAL'),
(15, 'Sinopsis The Big Short, Christian Bale Prediksi Resesi Ekonomi AS', '04 Januari 2023 22:04 WIB', 'CELEBRITY', 'NASIONAL'),
(16, 'Perppu Cipta Kerja Antisipasi Kondisi Global hingga Resesi Ekonomi', '04 Januari 2023 19:56 WIB', 'ECONOMY', 'NASIONAL'),
(17, 'Outlook 2023, Mengintip Prospek Industri di Tanah Air', '04 Januari 2023 14:22 WIB', 'ECONOMY', 'NASIONAL'),
(18, 'Harga Emas Berjangka Naik Tajam Imbas Kekhawatiran Resesi Ekonomi', '04 Januari 2023 07:00 WIB', 'ECONOMY', 'ECONOMY'),
(19, 'Resesi Masih Mengancam! Gaikindo Tak Pasang Target Tinggi Tahun Ini', '04 Januari 2023 06:09 WIB', 'AUTOS', 'NASIONAL'),
(20, 'Agar Gak Kena Mental, Banyak yang Punya Resolusi Rehat Main Medsos di 2023', '03 Januari 2023 13:35 WIB', 'LIFESTYLE', 'NASIONAL'),
(21, 'Periskop 2023: Ekonomi Indonesia di Tengah Ancaman Resesi', '03 Januari 2023 13:29 WIB', 'ECONOMY', 'NASIONAL'),
(22, 'Warning IMF! Sepertiga Ekonomi Dunia Alami Resesi Tahun Ini', '03 Januari 2023 07:58 WIB', 'ECONOMY', 'NASIONAL'),
(23, 'Resolusi Jokowi di 2023: Semoga Indonesia Tak Kena Imbas Resesi Global', '02 Januari 2023 13:03 WIB', 'ECONOMY', 'NASIONAL'),
(24, 'IHSG Diprediksi Menguat pada 2023 di Tengah Sentimen Negatif Global', '01 Januari 2023 13:55 WIB', 'IDXCHANNEL', 'NASIONAL'),
(25, 'Bukan Amazon atau Tesla, Perusahaan Ini Paling Cuan Sepanjang 2022', '31 Desember 2022 09:13 WIB', 'NEWS', 'NASIONAL'),
(26, 'Sempat Dibanderol USD139/Barel, Harga Minyak 2022 Berakhir di Level USD85/Barel', '31 Desember 2022 08:35 WIB', 'ECONOMY', 'NASIONAL');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `clean_title` varchar(100) NOT NULL,
  `category` varchar(45) NOT NULL,
  `date` varchar(45) NOT NULL,
  `portal` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`id`, `title`, `clean_title`, `category`, `date`, `portal`) VALUES
(115, 'Louis Tomlinson Blakblakan Sempat Iri dengan Kesuksesan Harry Styles', 'louis tomlinson blakblakan sempat iri kesuksesan harry styles', 'CELEBRITY', '11 November 2022 13:29 WIB', 'okezone'),
(116, 'BLACKPINK Dapat Penghargaan Group of the Year dari Variety', 'blackpink penghargaan group of the year variety', 'CELEBRITY', '21 November 2020 17:02 WIB', 'okezone'),
(117, 'Diamuk ARMY BTS, Begini Sosok Ganteng Niall Horan One Direction', 'diamuk army bts begini sosok ganteng niall horan one direction', 'LIFESTYLE', '14 September 2020 14:25 WIB', 'okezone'),
(118, 'Hot Gosip: Isu Dory Harsa Pindah Agama hingga Niall Horan Diamuk Fans BTS', 'hot gosip isu dory harsa pindah agama hingga niall horan diamuk fans bts', 'CELEBRITY', '11 September 2020 07:14 WIB', 'okezone'),
(119, 'Niall Horan Dikritik ARMY BTS, Fans One Direction Bertindak', 'niall horan dikritik army bts fans one direction bertindak', 'CELEBRITY', '10 September 2020 18:22 WIB', 'okezone'),
(120, 'Niall Horan Diamuk ARMY Gegara Belum Dengar Lagu Dynamite BTS', 'niall horan diamuk army gegara dengar lagu dynamite bts', 'CELEBRITY', '10 September 2020 16:11 WIB', 'okezone'),
(121, 'Niall Horan Beberkan Pernah Cedera Ligamen karena Mabuk', 'niall horan beberkan pernah cedera ligamen mabuk', 'CELEBRITY', '19 Agustus 2020 16:33 WIB', 'okezone'),
(122, 'Cerita Niall Horan Alami Cedera Ligamen saat Mabuk', 'cerita niall horan alami cedera ligamen mabuk', 'CELEBRITY', '18 Agustus 2020 23:54 WIB', 'okezone'),
(123, 'One Direction Bersiap Rayakan Anniversary 10 Tahun', 'one direction bersiap rayakan anniversary 10 tahun', 'CELEBRITY', '17 Juli 2020 14:21 WIB', 'okezone'),
(124, 'Ulang Tahun Ke-10, One Direction Bakal Rilis Video Spesial Untuk Fans', 'ulang tahun ke-10 one direction bakal rilis video spesial fans', 'CELEBRITY', '16 Juli 2020 15:20 WIB', 'okezone'),
(125, 'Lockdown Bareng, Niall Horan semakin Dekat dengan Kekasih Barunya', 'lockdown bareng niall horan semakin dekat kekasih barunya', 'CELEBRITY', '09 Juli 2020 13:17 WIB', 'okezone'),
(126, 'Niall Horan dan Keegan Allen Terpergok Tonton Live Instagram Rose BLACKPINK', 'niall horan keegan allen terpergok tonton live instagram rose blackpink', 'CELEBRITY', '09 Juli 2020 11:36 WIB', 'okezone'),
(127, 'Penampilan Niall Horan One Direction Dihentikan di Tengah Jalan, Fans Murka', 'penampilan niall horan one direction dihentikan tengah jalan fans murka', 'CELEBRITY', '29 Juni 2020 22:11 WIB', 'okezone'),
(128, 'Cara Niall Horan Isi Waktu saat Lockdown: Saya Memasak', 'cara niall horan isi waktu lockdown memasak', 'LIFESTYLE', '01 Mei 2020 19:36 WIB', 'okezone'),
(129, 'Lockdown Produktif, Niall Horan Tulis Lagu Cinta', 'lockdown produktif niall horan tulis lagu cinta', 'CELEBRITY', '01 Mei 2020 16:16 WIB', 'okezone'),
(130, 'Liam Payne Ungkap Zayn Malik Tak Ikut Reuni One Direction', 'liam payne ungkap zayn malik tak ikut reuni one direction', 'CELEBRITY', '20 April 2020 11:40 WIB', 'okezone'),
(131, 'Liam Payne: Ada Banyak Alasan Saya Tak Suka Zayn Malik', 'liam payne banyak alasan tak suka zayn malik', 'Hiburan', 'Jumat, 03 Jun 2022 03:26 WIB', 'cnn'),
(132, 'Blake Shelton Resign dari The Voice Usai Season 23', 'blake shelton resign the voice usai season 23', 'Hiburan', 'Rabu, 12 Okt 2022 08:57 WIB', 'cnn'),
(133, 'Niall Horan Sempat Merasa Terpenjara karena Fan 1D', 'niall horan sempat merasa terpenjara fan 1d', 'Hiburan', 'Selasa, 30 Mar 2021 00:04 WIB', 'cnn'),
(134, 'Lagu Baru Hailee Steinfeld Diduga untuk Niall Horan', 'lagu baru hailee steinfeld diduga niall horan', 'Hiburan', 'Selasa, 31 Des 2019 16:33 WIB', 'cnn'),
(135, 'Harry Styles Tercatat Jadi Member One Direction Paling Kaya', 'harry styles tercatat jadi member one direction paling kaya', 'Hiburan', 'Selasa, 20 Apr 2021 06:15 WIB', 'cnn'),
(136, 'Niall Horan Akui Ingin Kumpul Kembali dengan One Direction', 'niall horan akui kumpul one direction', 'Hiburan', 'Jumat, 26 Mei 2017 10:20 WIB', 'cnn'),
(137, 'One Direction Rajai Twitter di Perayaan Ulang Tahun ke-10', 'one direction rajai twitter perayaan ulang tahun ke-10', 'Hiburan', 'Kamis, 23 Jul 2020 15:01 WIB', 'cnn'),
(138, 'Jadi Jawara Tangga Album, Niall Horan Terima Kasih ke Fan', 'jadi jawara tangga album niall horan terima kasih fan', 'Hiburan', 'Senin, 30 Okt 2017 11:00 WIB', 'cnn'),
(139, 'Difoto Saat Tidur, Niall Horan \'One Direction\' Mencak-mencak', 'difoto tidur niall horan one direction mencak-mencak', 'Hiburan', 'Selasa, 02 Agu 2016 19:03 WIB', 'cnn'),
(140, 'Arti Nama Ukkasya, Anak Pertama Zaskia Sungkar-Irwansyah', 'arti nama ukkasya anak pertama zaskia sungkar-irwansyah', 'Hiburan', 'Rabu, 31 Mar 2021 08:03 WIB', 'cnn'),
(141, 'Hadapi Resesi, Pemuda Perindo Bagikan Tips untuk Para Milenial', 'hadapi resesi pemuda perindo bagikan tips milenial', 'NASIONAL', '05 Januari 2023 20:31 WIB', 'okezone'),
(142, 'Sadar Pentingnya Politik Jadi Alasan Pemudi ini Gabung Pemuda Perindo', 'sadar pentingnya politik jadi alasan pemudi gabung pemuda perindo', 'NASIONAL', '05 Januari 2023 16:38 WIB', 'okezone'),
(143, 'IHSG Diprediksi Kembali ke Level 7.000-an pada Akhir 2023, Cek Saham-Saham Potensial', 'ihsg diprediksi level 7 000-an akhir 2023 cek saham-saham potensial', 'IDXCHANNEL', '05 Januari 2023 10:48 WIB', 'okezone'),
(144, 'Harga Minyak Dunia Anjlok Imbas Meningkatnya Kasus Covid-19 di China', 'harga minyak dunia anjlok imbas meningkatnya kasus covid-19 china', 'ECONOMY', '05 Januari 2023 07:31 WIB', 'okezone'),
(145, 'Sinopsis The Big Short, Christian Bale Prediksi Resesi Ekonomi AS', 'sinopsis the big short christian bale prediksi resesi ekonomi as', 'CELEBRITY', '04 Januari 2023 22:04 WIB', 'okezone'),
(146, 'Perppu Cipta Kerja Antisipasi Kondisi Global hingga Resesi Ekonomi', 'perppu cipta kerja antisipasi kondisi global hingga resesi ekonomi', 'ECONOMY', '04 Januari 2023 19:56 WIB', 'okezone'),
(147, 'Outlook 2023, Mengintip Prospek Industri di Tanah Air', 'outlook 2023 mengintip prospek industri tanah air', 'ECONOMY', '04 Januari 2023 14:22 WIB', 'okezone'),
(148, 'Harga Emas Berjangka Naik Tajam Imbas Kekhawatiran Resesi Ekonomi', 'harga emas berjangka naik tajam imbas kekhawatiran resesi ekonomi', 'ECONOMY', '04 Januari 2023 07:00 WIB', 'okezone'),
(149, 'Resesi Masih Mengancam! Gaikindo Tak Pasang Target Tinggi Tahun Ini', 'resesi mengancam gaikindo tak pasang target tinggi tahun', 'AUTOS', '04 Januari 2023 06:09 WIB', 'okezone'),
(150, 'Agar Gak Kena Mental, Banyak yang Punya Resolusi Rehat Main Medsos di 2023', 'gak kena mental banyak punya resolusi rehat main medsos 2023', 'LIFESTYLE', '03 Januari 2023 13:35 WIB', 'okezone'),
(151, 'Periskop 2023: Ekonomi Indonesia di Tengah Ancaman Resesi', 'periskop 2023 ekonomi indonesia tengah ancaman resesi', 'ECONOMY', '03 Januari 2023 13:29 WIB', 'okezone'),
(152, 'Warning IMF! Sepertiga Ekonomi Dunia Alami Resesi Tahun Ini', 'warning imf sepertiga ekonomi dunia alami resesi tahun', 'ECONOMY', '03 Januari 2023 07:58 WIB', 'okezone'),
(153, 'Resolusi Jokowi di 2023: Semoga Indonesia Tak Kena Imbas Resesi Global', 'resolusi jokowi 2023 semoga indonesia tak kena imbas resesi global', 'ECONOMY', '02 Januari 2023 13:03 WIB', 'okezone'),
(154, 'IHSG Diprediksi Menguat pada 2023 di Tengah Sentimen Negatif Global', 'ihsg diprediksi menguat 2023 tengah sentimen negatif global', 'IDXCHANNEL', '01 Januari 2023 13:55 WIB', 'okezone'),
(155, 'Bukan Amazon atau Tesla, Perusahaan Ini Paling Cuan Sepanjang 2022', 'bukan amazon tesla perusahaan paling cuan sepanjang 2022', 'NEWS', '31 Desember 2022 09:13 WIB', 'okezone'),
(156, 'Sempat Dibanderol USD139/Barel, Harga Minyak 2022 Berakhir di Level USD85/Barel', 'sempat dibanderol usd139 barel harga minyak 2022 berakhir level usd85 barel', 'ECONOMY', '31 Desember 2022 08:35 WIB', 'okezone'),
(157, 'Antam Prediksi Harga Emas Naik Tahun Ini Berkat Ancaman Resesi', 'antam prediksi harga emas naik tahun berkat ancaman resesi', 'Ekonomi', 'Kamis, 05 Jan 2023 14:45 WIB', 'cnn'),
(158, 'Moody\'s Proyeksi Ekonomi 2023 Melambat, Tapi Tak Resesi', 'moody s proyeksi ekonomi 2023 melambat tak resesi', 'Ekonomi', 'Kamis, 05 Jan 2023 07:35 WIB', 'cnn'),
(159, 'IMF Prediksi Sepertiga Ekonomi Dunia Resesi Tahun Ini', 'imf prediksi sepertiga ekonomi dunia resesi tahun', 'Ekonomi', 'Senin, 02 Jan 2023 20:42 WIB', 'cnn'),
(160, 'Bangkit dari Tekanan Ekonomi Akibat Pandemi di Tengah Ancaman Resesi', 'bangkit tekanan ekonomi akibat pandemi tengah ancaman resesi', 'Ekonomi', 'Selasa, 27 Des 2022 11:16 WIB', 'cnn'),
(161, 'Krisis Ekonomi Pakistan, Mal dan Pasar Tutup Lebih Awal', 'krisis ekonomi pakistan mal pasar tutup lebih awal', 'Ekonomi', 'Rabu, 04 Jan 2023 19:03 WIB', 'cnn'),
(162, 'Benarkah Ekonomi RI \'Genting\' Hingga Perlu Terbit Perppu Cipta Kerja?', 'benarkah ekonomi ri genting hingga perlu terbit perppu cipta kerja', 'Ekonomi', 'Selasa, 03 Jan 2023 07:22 WIB', 'cnn'),
(163, 'Serbia Waswas Dunia Makin Suram di 2023, Krisis Parah hingga Konflik', 'serbia waswas dunia makin suram 2023 krisis parah hingga konflik', 'Internasional', 'Kamis, 05 Jan 2023 07:46 WIB', 'cnn'),
(164, 'Rupiah Diramal Lesu Sepanjang 2023', 'rupiah diramal lesu sepanjang 2023', 'Ekonomi', 'Selasa, 03 Jan 2023 16:22 WIB', 'cnn'),
(165, 'Covid China Benamkan Harga Minyak ke US$72', 'covid china benamkan harga minyak us 72', 'Ekonomi', 'Kamis, 05 Jan 2023 07:55 WIB', 'cnn'),
(166, 'Nestapa Ekonomi Argentina Meski Sukses Dibawa Messi Juara Piala Dunia', 'nestapa ekonomi argentina meski sukses dibawa messi juara piala dunia', 'Ekonomi', 'Senin, 19 Des 2022 14:57 WIB', 'cnn'),
(183, 'Kaleidoskop 2022: Sederet Kebocoran Data Ulah Bjorka hingga Loliyta', 'kaleidoskop 2022 sederet kebocoran data ulah bjorka hingga loliyta', 'TECHNO', '28 Desember 2022 11:15 WIB', 'okezone'),
(184, 'Pakar Sebut Kominfo dan BSSN Pelanggar Hukum, Buntut Data PeduliLindungi Bocor', 'pakar sebut kominfo bssn pelanggar hukum buntut data pedulilindungi bocor', 'TECHNO', '16 November 2022 11:40 WIB', 'okezone'),
(185, 'Arti Nama Bjorka, Hacker Viral yang Retas Sejumlah Dokumen Negara', 'arti nama bjorka hacker viral retas sejumlah dokumen negara', 'NASIONAL', '11 November 2022 10:33 WIB', 'okezone'),
(186, 'Pertamina Investigasi Dugaan Kebocoran Data MyPertamina oleh Bjorka', 'pertamina investigasi dugaan kebocoran data mypertamina bjorka', 'ECONOMY', '10 November 2022 19:04 WIB', 'okezone'),
(187, 'Hacker Bjorka Kembali Berulah, Kini Ungkap Database MyPertamina', 'hacker bjorka berulah kini ungkap database mypertamina', 'TECHNO', '10 November 2022 13:43 WIB', 'okezone'),
(188, 'Bantah Bjorka, Luhut: Saya Sudah Vaksin Booster 5 Kali', 'bantah bjorka luhut vaksin booster 5 kali', 'ECONOMY', '12 Oktober 2022 14:59 WIB', 'okezone'),
(189, 'Soal Bjorka, Ini Kata Kepala BSSN', 'soal bjorka kata kepala bssn', 'NASIONAL', '07 Oktober 2022 00:26 WIB', 'okezone'),
(190, 'Situs PN Jakpus Kembali Diretas, Hacker Seret Nama Ferdy Sambo dan Puan Maharani', 'situs pn jakpus diretas hacker seret nama ferdy sambo puan maharani', 'NASIONAL', '05 Oktober 2022 12:37 WIB', 'okezone'),
(191, 'Situs PN Jakpus Diserang, Hacker Singgung Kasus Sambo hingga Nyinyir Bjorka', 'situs pn jakpus diserang hacker singgung kasus sambo hingga nyinyir bjorka', 'TECHNO', '05 Oktober 2022 12:32 WIB', 'okezone'),
(192, 'Populer Telco: China Ungkap Serangan Siber AS hingga Cara Baru Ransomware', 'populer telco china ungkap serangan siber as hingga cara baru ransomware', 'TECHNO', '01 Oktober 2022 22:39 WIB', 'okezone'),
(193, 'Hacker Bjorka Kembali Beraksi, Kini Korbannya Kepala BSSN', 'hacker bjorka beraksi kini korbannya kepala bssn', 'TECHNO', '29 September 2022 16:18 WIB', 'okezone'),
(194, 'Remaja Pembobol Situs NASA, Putra Aji, Terkait Bjorka: Pemerintah Harus Lebih Perhatikan Keamanan Si', 'remaja pembobol situs nasa putra aji terkait bjorka pemerintah lebih perhatikan keamanan siber', 'TECHNO', '27 September 2022 10:30 WIB', 'okezone'),
(195, 'Bjorka Jadi Salah Satu Bahasan di Raker Komisi I DPR-Kepala BIN, Apa Hasilnya?', 'bjorka jadi salah satu bahasan raker komisi i dpr-kepala bin apa hasilnya', 'NASIONAL', '26 September 2022 19:05 WIB', 'okezone'),
(196, 'Populer Telco: Kesibukan Hacker Pembobol NASA hingga Medsos yang Digunakan Bjorka', 'populer telco kesibukan hacker pembobol nasa hingga medsos digunakan bjorka', 'TECHNO', '24 September 2022 22:17 WIB', 'okezone'),
(197, '5 Jurusan Kuliah yang Memungkinkan Bisa Jadi Hacker', '5 jurusan kuliah memungkinkan jadi hacker', 'KAMPUS', '23 September 2022 17:18 WIB', 'okezone'),
(198, 'Pemuda Perindo: Jika Tak Ada Perbaikan Sistem Keamanan Siber, Bjorka-Bjorka Lain Akan Terus Muncul', 'pemuda perindo tak perbaikan sistem keamanan siber bjorka-bjorka terus muncul', 'NASIONAL', '22 September 2022 10:16 WIB', 'okezone'),
(199, '10 Kasus Kebocoran Data 2022: Bjorka Dominan, Ramai-ramai Bantah', '10 kasus kebocoran data 2022 bjorka dominan ramai-ramai bantah', 'Teknologi', 'Jumat, 30 Des 2022 15:04 WIB', 'cnn'),
(200, 'Pernyataan Viral Kominfo 2022: Bukan Tugas Kami, Jangan Nyerang', 'pernyataan viral kominfo 2022 bukan tugas jangan nyerang', 'Teknologi', 'Jumat, 30 Des 2022 10:00 WIB', 'cnn'),
(201, '3 Petunjuk Identitas Hacker Bjorka, Apa Saja?', '3 petunjuk identitas hacker bjorka apa', 'Teknologi', 'Rabu, 14 Sep 2022 13:20 WIB', 'cnn'),
(202, 'Suciwati Buka Suara Usai Hacker Bjorka Ungkap Pembunuh Munir', 'suciwati buka suara usai hacker bjorka ungkap pembunuh munir', 'Nasional', 'Rabu, 14 Sep 2022 10:22 WIB', 'cnn'),
(203, 'Kominfo Minta Jangan Nyerang, Hacker Balas \'Stop Being An Idiot\'', 'kominfo minta jangan nyerang hacker balas stop being an idiot', 'Teknologi', 'Rabu, 07 Sep 2022 09:44 WIB', 'cnn'),
(204, 'Hacker Desorden Klaim Bobol Data Anak Usaha Pertamina, Singgung Bjorka', 'hacker desorden klaim bobol data anak usaha pertamina singgung bjorka', 'Teknologi', 'Senin, 19 Sep 2022 06:55 WIB', 'cnn'),
(205, 'Bjorka is Back, Bocorkan 44 Juta Data Diduga Milik MyPertamina', 'bjorka is back bocorkan 44 juta data diduga milik mypertamina', 'Teknologi', 'Kamis, 10 Nov 2022 16:19 WIB', 'cnn'),
(206, 'RUU PDP Final: Bjorka Bisa Kena Denda Rp5 Miliar', 'ruu pdp final bjorka kena denda rp5 miliar', 'Teknologi', 'Jumat, 16 Sep 2022 16:05 WIB', 'cnn'),
(207, 'Anggaran BSSN Naik Jadi Rp624 M, \'Berkah\' Bjorka?', 'anggaran bssn naik jadi rp624 m berkah bjorka', 'Teknologi', 'Sabtu, 24 Sep 2022 07:45 WIB', 'cnn'),
(208, 'Bjorka Kembali Berulah, Sebar Data Kepala BSSN sambil Sindir Anggaran', 'bjorka berulah sebar data kepala bssn sindir anggaran', 'Teknologi', 'Kamis, 29 Sep 2022 12:50 WIB', 'cnn'),
(209, 'Hadapi Resesi, Pemuda Perindo Bagikan Tips untuk Para Milenial', 'hadapi resesi pemuda perindo bagikan tips milenial', 'NASIONAL', '05 Januari 2023 20:31 WIB', 'okezone'),
(210, '27 Proyek Strategis Nasional untuk Kelistrikan Selesai Dibangun', '27 proyek strategis nasional kelistrikan selesai dibangun', 'ECONOMY', '05 Januari 2023 20:19 WIB', 'okezone'),
(211, 'Turunkan Emisi Karbon Lewat Terobosan Energi Terbarukan', 'turunkan emisi karbon lewat terobosan energi terbarukan', 'ECONOMY', '05 Januari 2023 18:18 WIB', 'okezone'),
(212, 'Erick Thohir Targetkan Kontribusi BUMN Capai Rp15.602 Triliun', 'erick thohir targetkan kontribusi bumn capai rp15 602 triliun', 'ECONOMY', '05 Januari 2023 18:06 WIB', 'okezone'),
(213, 'Sadar Pentingnya Politik Jadi Alasan Pemudi ini Gabung Pemuda Perindo', 'sadar pentingnya politik jadi alasan pemudi gabung pemuda perindo', 'NASIONAL', '05 Januari 2023 16:38 WIB', 'okezone'),
(214, 'Bobby Afif Nasution Raih Anugerah Kebudayaan PWI Pusat', 'bobby afif nasution raih anugerah kebudayaan pwi pusat', 'NEWS', '05 Januari 2023 16:10 WIB', 'okezone'),
(215, 'Berdayakan Masyarakat, Politikus Partai Perindo Palu Kembangkan Teknologi Bioflok Budidaya Ikan', 'berdayakan masyarakat politikus partai perindo palu kembangkan teknologi bioflok budidaya ikan', 'NASIONAL', '05 Januari 2023 15:46 WIB', 'okezone'),
(216, 'Ancaman Biologis Mengintai, Alasan Prabowo Inisiasi Fakultas Kedokteran dan Farmasi Militer di Unhan', 'ancaman biologis mengintai alasan prabowo inisiasi fakultas kedokteran farmasi militer unhan', 'NASIONAL', '05 Januari 2023 15:30 WIB', 'okezone'),
(217, 'Kartu Prakerja 2023 Dibuka, Penerima BLT Subsidi Gaji hingga Bansos PKH Bisa Daftar', 'kartu prakerja 2023 dibuka penerima blt subsidi gaji hingga bansos pkh daftar', 'ECONOMY', '05 Januari 2023 15:27 WIB', 'okezone'),
(218, '5 Hal Menarik Tentang Vietnam, Lawan Timnas Indonesia di Semifinal Piala AFF 2022', '5 menarik vietnam lawan timnas indonesia semifinal piala aff 2022', 'NEWS', '05 Januari 2023 15:24 WIB', 'okezone'),
(219, 'PHR Luncurkan Beasiswa Internasional dan Universitas Pertamina Bagi Putra-Putri Riau', 'phr luncurkan beasiswa internasional universitas pertamina putra-putri riau', 'NEWS', '05 Januari 2023 15:02 WIB', 'okezone'),
(220, 'Tiongkok dan Filipina Sepakat Tingkatkan Kerja Sama, Tangani Sengketa Laut Cina Selatan dengan Damai', 'tiongkok filipina sepakat tingkatkan kerja sama tangani sengketa laut cina selatan damai', 'NEWS', '05 Januari 2023 15:01 WIB', 'okezone'),
(221, 'Tekankan Peran Penting Kaum Muda, HT: Generasi Masa Depan Indonesia', 'tekankan peran penting kaum muda ht generasi masa depan indonesia', 'NASIONAL', '05 Januari 2023 13:54 WIB', 'okezone'),
(222, 'Pengumuman! Amazon Akan PHK 18.000 Karyawan', 'pengumuman amazon phk 18 000 karyawan', 'ECONOMY', '05 Januari 2023 11:43 WIB', 'okezone'),
(223, '2022 Tahun yang Luar Biasa, Ini Harapan Sri Mulyani di 2023', '2022 tahun luar biasa harapan sri mulyani 2023', 'ECONOMY', '05 Januari 2023 11:15 WIB', 'okezone'),
(224, 'Duet Maut Bapak dan Anak Jadi Dukun Palsu, Tipu Korban Jutaan Rupiah', 'duet maut bapak anak jadi dukun palsu tipu korban jutaan rupiah', 'NEWS', '05 Januari 2023 10:49 WIB', 'okezone'),
(225, 'Moody\'s Proyeksi Ekonomi 2023 Melambat, Tapi Tak Resesi', 'moody s proyeksi ekonomi 2023 melambat tak resesi', 'Ekonomi', 'Kamis, 05 Jan 2023 07:35 WIB', 'cnn'),
(226, 'Bappebti Proyeksi Aset Kripto Belum Akan Pulih Tahun Ini', 'bappebti proyeksi aset kripto pulih tahun', 'Ekonomi', 'Rabu, 04 Jan 2023 20:01 WIB', 'cnn'),
(227, 'Bidik 1 Juta Peserta, Anggaran Kartu Prakerja 2023 Kurang Rp1,7 T', 'bidik 1 juta peserta anggaran kartu prakerja 2023 kurang rp1 7 t', 'Ekonomi', 'Kamis, 05 Jan 2023 17:39 WIB', 'cnn'),
(228, 'Alasan Lengkap Jokowi Terbitkan Perppu Cipta Kerja', 'alasan lengkap jokowi terbitkan perppu cipta kerja', 'Ekonomi', 'Rabu, 04 Jan 2023 18:46 WIB', 'cnn'),
(229, 'Faisal Basri Sebut Hilirisasi ala Jokowi Ngawur, Cuma Untungkan China', 'faisal basri sebut hilirisasi ala jokowi ngawur cuma untungkan china', 'Ekonomi', 'Kamis, 05 Jan 2023 18:16 WIB', 'cnn'),
(230, 'IMF Prediksi Sepertiga Ekonomi Dunia Resesi Tahun Ini', 'imf prediksi sepertiga ekonomi dunia resesi tahun', 'Ekonomi', 'Senin, 02 Jan 2023 20:42 WIB', 'cnn'),
(231, 'Rupiah Diramal Lesu Sepanjang 2023', 'rupiah diramal lesu sepanjang 2023', 'Ekonomi', 'Selasa, 03 Jan 2023 16:22 WIB', 'cnn'),
(232, '2023, Mendag Zulkifli Optimis Perdagangan Indonesia Tumbuh Positif', '2023 mendag zulkifli optimis perdagangan indonesia tumbuh positif', 'Ekonomi', 'Rabu, 04 Jan 2023 12:41 WIB', 'cnn'),
(233, 'Banyak SPBU Dijual Online di 2023, Diobral Rp30 M Hingga Rp247 M', 'banyak spbu dijual online 2023 diobral rp30 m hingga rp247 m', 'Ekonomi', 'Rabu, 04 Jan 2023 19:25 WIB', 'cnn'),
(234, 'RI Gunakan Biodiesel B35 Mulai 1 Februari 2023', 'ri gunakan biodiesel b35 mulai 1 februari 2023', 'Ekonomi', 'Kamis, 05 Jan 2023 20:55 WIB', 'cnn'),
(235, 'Vaksinasi Dosis Keempat Capai 742.421 Orang di Indonesia', 'vaksinasi dosis keempat capai 742 421 orang indonesia', 'NEWS', '28 November 2022 00:46 WIB', 'okezone'),
(236, 'Kisah Perjuangan Para Penyuluh untuk Melancarkan Vaksinasi Covid-19', 'kisah perjuangan penyuluh melancarkan vaksinasi covid-19', 'NEWS', '25 November 2022 16:42 WIB', 'okezone'),
(237, 'Benjamin Jesty, Pionir Vaksinasi Penyelemat Dunia dari Wabah Mematikan yang Jejaknya Terkubur Sejara', 'benjamin jesty pionir vaksinasi penyelemat dunia wabah mematikan jejaknya terkubur sejarah', 'NEWS', '24 November 2022 14:46 WIB', 'okezone'),
(238, 'Kemenkes: Vaksin Covid-19 Produk Dalam Negeri Dukung Kebutuhan Booster', 'kemenkes vaksin covid-19 produk negeri dukung kebutuhan booster', 'NASIONAL', '11 November 2022 00:33 WIB', 'okezone'),
(239, 'IDI Minta Pemerintah Tidak Gegabah Cabut Pandemi Covid', 'idi minta pemerintah gegabah cabut pandemi covid', 'NASIONAL', '27 September 2022 14:21 WIB', 'okezone'),
(240, 'Pimpinan WHO: Akhir Pandemi Covid-19 di Depan Mata', 'pimpinan who akhir pandemi covid-19 depan mata', 'NEWS', '15 September 2022 08:10 WIB', 'okezone'),
(241, 'Corona Tinggal Kenangan? Selandia Baru Resmi Hapus Pembatasan Covid-19', 'corona tinggal kenangan selandia baru resmi hapus pembatasan covid-19', 'LIFESTYLE', '13 September 2022 13:16 WIB', 'okezone'),
(242, 'Aturan Baru Transportasi Laut, Penumpang Usia di Atas 18 Tahun Wajib Booster', 'aturan baru transportasi laut penumpang usia atas 18 tahun wajib booster', 'ECONOMY', '29 Agustus 2022 18:41 WIB', 'okezone'),
(243, 'Wajib Booster, Yuk Simak Lagi Aturan Lengkap Terbaru Naik Pesawat', 'wajib booster yuk simak aturan lengkap terbaru naik pesawat', 'LIFESTYLE', '29 Agustus 2022 12:00 WIB', 'okezone'),
(244, 'Aturan Naik Pesawat Terbaru Mulai Hari Ini, dari WNI-WNA hingga Anak Kecil', 'aturan naik pesawat terbaru mulai hari wni-wna hingga anak kecil', 'ECONOMY', '29 Agustus 2022 08:30 WIB', 'okezone'),
(245, 'Mahasiswa FK Universitas Brawijaya Ciptakan Vaksin Covid-19 yang Bisa Dihirup', 'mahasiswa fk universitas brawijaya ciptakan vaksin covid-19 dihirup', 'KAMPUS', '22 Agustus 2022 10:44 WIB', 'okezone'),
(246, 'Presiden Jokowi : Indonesia Berhasil Kendalikan Covid-19, Jadi 5 Besar Negara dengan Vaksinasi Terba', 'presiden jokowi indonesia berhasil kendalikan covid-19 jadi 5 besar negara vaksinasi terbanyak', 'NASIONAL', '16 Agustus 2022 11:13 WIB', 'okezone'),
(247, 'Presiden Jokowi : Indonesia Termasuk Negara yang Mampu Hadapi Krisis Global', 'presiden jokowi indonesia termasuk negara mampu hadapi krisis global', 'NASIONAL', '16 Agustus 2022 11:01 WIB', 'okezone'),
(248, '28 RT Zona Merah Covid-19, Wagub DKI Gencarkan Vaksinasi Booster Capai 100 Persen', '28 rt zona merah covid-19 wagub dki gencarkan vaksinasi booster capai 100 persen', 'MEGAPOLITAN', '09 Agustus 2022 13:20 WIB', 'okezone'),
(249, 'Hongkong Mulai Vaksinasi Anak Usia 6 Bulan, Sinovac Jadi Pilihannya', 'hongkong mulai vaksinasi anak usia 6 bulan sinovac jadi pilihannya', 'LIFESTYLE', '04 Agustus 2022 11:06 WIB', 'okezone'),
(250, 'Dinkes DKI Catat 4,6 Juta Orang Telah Vaksinasi Booster', 'dinkes dki catat 4 6 juta orang vaksinasi booster', 'MEGAPOLITAN', '04 Agustus 2022 06:02 WIB', 'okezone'),
(251, 'Menkes Pastikan Vaksin Covid untuk Balita Akan Diberikan Gratis', 'menkes pastikan vaksin covid balita diberikan gratis', 'Nasional', 'Kamis, 05 Jan 2023 16:48 WIB', 'cnn'),
(252, 'Alasan Pemerintah RI Putuskan Tak Tes Covid Turis China', 'alasan pemerintah ri putuskan tak tes covid turis china', 'Nasional', 'Kamis, 05 Jan 2023 08:09 WIB', 'cnn'),
(253, 'Menkes Soal Vaksin Covid Berbayar: Sekarang Masih Gratis', 'menkes soal vaksin covid berbayar sekarang gratis', 'Nasional', 'Kamis, 29 Des 2022 16:22 WIB', 'cnn'),
(254, 'Menkes: Varian Covid Baru Belum Bisa Tembus Sistem Pertahanan RI', 'menkes varian covid baru tembus sistem pertahanan ri', 'Nasional', 'Rabu, 04 Jan 2023 05:35 WIB', 'cnn'),
(255, 'Positif Covid-19 Bertambah 597 Kasus, Pasien Sembuh 665', 'positif covid-19 bertambah 597 kasus pasien sembuh 665', 'Nasional', 'Rabu, 04 Jan 2023 17:44 WIB', 'cnn'),
(256, 'Jadi Biang Kerok Covid AS Meroket, Seperti Apa Gejala Omicron XBB.1.5?', 'jadi biang kerok covid as meroket apa gejala omicron xbb 1 5', 'Gaya Hidup', 'Rabu, 04 Jan 2023 04:30 WIB', 'cnn'),
(257, '8 Tren Traveling yang Diprediksi Booming pada 2023', '8 tren traveling diprediksi booming 2023', 'Gaya Hidup', 'Rabu, 04 Jan 2023 18:15 WIB', 'cnn'),
(258, 'Bandara Juanda Layani 10 Juta Penumpang Sepanjang 2022, Naik 83 Persen', 'bandara juanda layani 10 juta penumpang sepanjang 2022 naik 83 persen', 'Ekonomi', 'Kamis, 05 Jan 2023 05:40 WIB', 'cnn'),
(259, 'RI Buka Suara soal Imbauan Perjalanan ke China Terkait Lonjakan Covid', 'ri buka suara soal imbauan perjalanan china terkait lonjakan covid', 'Internasional', 'Jumat, 30 Des 2022 09:25 WIB', 'cnn'),
(260, 'PPKM Dicabut, Bagaimana Nasib Biaya Perawatan Covid?', 'ppkm dicabut bagaimana nasib biaya perawatan covid', 'Ekonomi', 'Jumat, 30 Des 2022 18:33 WIB', 'cnn'),
(261, 'Francesco Bagnaia Ungkap Valentino Rossi dan Marc Marquez Sosok Pengubah Wajah MotoGP', 'francesco bagnaia ungkap valentino rossi marc marquez sosok pengubah wajah motogp', 'SPORTS', '05 Januari 2023 22:00 WIB', 'okezone'),
(262, 'Hadapi Resesi, Pemuda Perindo Bagikan Tips untuk Para Milenial', 'hadapi resesi pemuda perindo bagikan tips milenial', 'NASIONAL', '05 Januari 2023 20:31 WIB', 'okezone'),
(263, '27 Proyek Strategis Nasional untuk Kelistrikan Selesai Dibangun', '27 proyek strategis nasional kelistrikan selesai dibangun', 'ECONOMY', '05 Januari 2023 20:19 WIB', 'okezone'),
(264, 'Tingkatkan Sistem Kesehatan Masyarakat, Menkes Genjot Inovasi Bioteknologi Genome Sequencing', 'tingkatkan sistem kesehatan masyarakat menkes genjot inovasi bioteknologi genome sequencing', 'LIFESTYLE', '05 Januari 2023 17:40 WIB', 'okezone'),
(265, 'Berdayakan Masyarakat, Politikus Partai Perindo Palu Kembangkan Teknologi Bioflok Budidaya Ikan', 'berdayakan masyarakat politikus partai perindo palu kembangkan teknologi bioflok budidaya ikan', 'NASIONAL', '05 Januari 2023 15:46 WIB', 'okezone'),
(266, 'IHSG Kebakaran, Ditutup Anjlok 2,34% ke Level 6.653', 'ihsg kebakaran ditutup anjlok 2 34 level 6 653', 'IDXCHANNEL', '05 Januari 2023 15:11 WIB', 'okezone'),
(267, 'Aksanawa, Kapal Pencari Korban Kecelakaan Laut Gagasan Mahasiswa ITS', 'aksanawa kapal pencari korban kecelakaan laut gagasan mahasiswa its', 'KAMPUS', '05 Januari 2023 15:05 WIB', 'okezone'),
(268, 'Seleksi Petugas Haji 2023 Dibuka, Ini Syarat dan Cara Daftarnya', 'seleksi petugas haji 2023 dibuka syarat cara daftarnya', 'HAJI', '05 Januari 2023 14:47 WIB', 'okezone'),
(269, 'IPO, Bank Sumut (BSMT) Incar Dana Rp1,49 Triliun', 'ipo bank sumut bsmt incar dana rp1 49 triliun', 'IDXCHANNEL', '05 Januari 2023 13:38 WIB', 'okezone'),
(270, 'IHSG Makin Anjlok, Ternyata Ini Biang Keroknya', 'ihsg makin anjlok ternyata biang keroknya', 'IDXCHANNEL', '05 Januari 2023 13:06 WIB', 'okezone'),
(271, 'Deretan Kampus Jurusan Pendidikan Guru Sekolah Dasar Terbaik Indonesia', 'deretan kampus jurusan pendidikan guru sekolah dasar terbaik indonesia', 'KAMPUS', '05 Januari 2023 12:50 WIB', 'okezone'),
(272, 'Satelit SS-1 Buatan Anak Negeri Bakal Diluncurkan Besok', 'satelit ss-1 buatan anak negeri bakal diluncurkan besok', 'TECHNO', '05 Januari 2023 12:03 WIB', 'okezone'),
(273, 'Genjot Layanan Digital, MNC Bank Manfaatkan Openshift Platform', 'genjot layanan digital mnc bank manfaatkan openshift platform', 'IDXCHANNEL', '05 Januari 2023 11:54 WIB', 'okezone'),
(274, 'Duh! IHSG Sesi I Anjlok 1,73% ke 6.695', 'duh ihsg sesi i anjlok 1 73 6 695', 'IDXCHANNEL', '05 Januari 2023 11:44 WIB', 'okezone'),
(275, '5 Alasan Seseorang Susah untuk Konsisten, Salah Satunya Terlalu Fokus pada Hasil!', '5 alasan seseorang susah konsisten salah satunya terlalu fokus hasil', 'KAMPUS', '05 Januari 2023 11:20 WIB', 'okezone'),
(276, 'Dukung Pengembangan Satelit Nano Karya Anak Bangsa, BRIN Lepas Satelit SS-1 Menuju Orbit', 'dukung pengembangan satelit nano karya anak bangsa brin lepas satelit ss-1 menuju orbit', 'KAMPUS', '05 Januari 2023 10:41 WIB', 'okezone'),
(277, 'IOH Targetkan Integrasi Jaringan Indosat dan Tri Selesai Awal 2023', 'ioh targetkan integrasi jaringan indosat tri selesai awal 2023', 'Teknologi', 'Rabu, 04 Jan 2023 22:30 WIB', 'cnn'),
(278, 'China Ungkap Cara Mendaratkan Astronautnya di Bulan', 'china ungkap cara mendaratkan astronautnya bulan', 'Teknologi', 'Rabu, 04 Jan 2023 16:40 WIB', 'cnn'),
(279, 'Netizen \'Puji\' RK: Benar Bangun Masjid, Cukup Doa Masalah Jabar Beres', 'netizen puji rk benar bangun masjid cukup doa masalah jabar beres', 'Teknologi', 'Kamis, 05 Jan 2023 14:15 WIB', 'cnn'),
(280, 'Kominfo dan Polri Punya MoU, Bisa Saling Tukar Data', 'kominfo polri punya mou saling tukar data', 'Teknologi', 'Rabu, 04 Jan 2023 21:00 WIB', 'cnn'),
(281, 'BRIN Soal Biaya Modifikasi Cuaca: Rp200 Juta Per Hari', 'brin soal biaya modifikasi cuaca rp200 juta per hari', 'Teknologi', 'Selasa, 03 Jan 2023 20:00 WIB', 'cnn'),
(282, 'Benarkah Bulan Picu Peristiwa Banjir Rob?', 'benarkah bulan picu peristiwa banjir rob', 'Teknologi', 'Kamis, 05 Jan 2023 18:15 WIB', 'cnn'),
(283, 'Alasan Windows 7 dan 8 Dipensiunkan saat Masih Punya Jutaan Pengguna', 'alasan windows 7 8 dipensiunkan punya jutaan pengguna', 'Teknologi', 'Kamis, 05 Jan 2023 17:15 WIB', 'cnn'),
(284, '7 Alasan Kenapa Play Store Tidak Bisa Download Aplikasi', '7 alasan play store download aplikasi', 'Teknologi', 'Kamis, 05 Jan 2023 12:00 WIB', 'cnn'),
(285, 'Menengok Proyek Pusat Data Nasional Berusia 8 Pekan, Bedeng Menyambut', 'menengok proyek pusat data nasional berusia 8 pekan bedeng menyambut', 'Teknologi', 'Rabu, 04 Jan 2023 14:40 WIB', 'cnn'),
(286, 'Pakar Temukan Supernova Bisa Rusak Lapisan Ozon, Ancaman untuk Bumi?', 'pakar temukan supernova rusak lapisan ozon ancaman bumi', 'Teknologi', 'Selasa, 03 Jan 2023 10:46 WIB', 'cnn'),
(287, 'Optimis Pariwisata Tetap Tumbuh pada 2023, Sandiaga: Indonesia Kuat Hadapi Guncangan Apapun!', 'optimis pariwisata tetap tumbuh 2023 sandiaga indonesia kuat hadapi guncangan apapun', 'LIFESTYLE', '20 Desember 2022 10:17 WIB', 'okezone'),
(288, 'Sandiaga Harap Buku \'1.500 Inspirasi\' Menciptakan Demokrasi Bersahabat', 'sandiaga harap buku 1 500 inspirasi menciptakan demokrasi bersahabat', 'NEWS', '19 Desember 2022 17:35 WIB', 'okezone'),
(289, 'Sandiaga Isi Kuliah Tamu di Ubaya, Angkat Tema \'Menakar Indonesia ke Depan\'', 'sandiaga isi kuliah tamu ubaya angkat tema menakar indonesia depan', 'NEWS', '19 Desember 2022 17:25 WIB', 'okezone'),
(290, 'Beri Kuliah Umum di Ubaya, Ganjar Pranowo Ingatkan Pentingnya Literasi Digital', 'beri kuliah umum ubaya ganjar pranowo ingatkan pentingnya literasi digital', 'KAMPUS', '21 Mei 2022 10:48 WIB', 'okezone'),
(291, 'Inovatif! Dosen dan Mahasiswa Ubaya Rancang Sepeda dan Motor Listrik', 'inovatif dosen mahasiswa ubaya rancang sepeda motor listrik', 'KAMPUS', '06 April 2022 19:01 WIB', 'okezone'),
(292, 'Mahasiswa Ubaya Meninggal di Gunung Penanggungan Mojokerto', 'mahasiswa ubaya meninggal gunung penanggungan mojokerto', 'KAMPUS', '24 Januari 2022 11:13 WIB', 'okezone'),
(293, 'Mahasiswa Ubaya Bikin Permen Jelly dari Limbah Tempe', 'mahasiswa ubaya bikin permen jelly limbah tempe', 'KAMPUS', '23 Desember 2021 11:12 WIB', 'okezone'),
(294, '6 Perguruan Tinggi Dilibatkan dalam Pengembangan Potensi Surabaya', '6 perguruan tinggi dilibatkan pengembangan potensi surabaya', 'KAMPUS', '10 November 2021 13:35 WIB', 'okezone'),
(295, 'Mahasiswa Ubaya Olah Buah Jamblang Jadi Suplemen Penambah Imun Tubuh', 'mahasiswa ubaya olah buah jamblang jadi suplemen penambah imun tubuh', 'KAMPUS', '13 Oktober 2021 16:05 WIB', 'okezone'),
(296, 'Mahasiswa Asing dari 12 Negara Belajar Aksara Jawa secara Online', 'mahasiswa asing 12 negara belajar aksara jawa online', 'KAMPUS', '08 Juli 2021 10:43 WIB', 'okezone'),
(297, 'Daftar 100 Kampus Negeri dan Swasta di Indonesia Berdasarkan Webometrics 2021', 'daftar 100 kampus negeri swasta indonesia berdasarkan webometrics 2021', 'KAMPUS', '28 Januari 2021 16:21 WIB', 'okezone'),
(298, 'Empat Perguruan Tinggi Sepakati Kuatkan Implementasi Kampus Merdeka', 'empat perguruan tinggi sepakati kuatkan implementasi kampus merdeka', 'KAMPUS', '20 November 2020 13:17 WIB', 'okezone'),
(299, 'Pandemi COVID-19, Aplikasi Ini Mudahkan Siswa Daftar Universitas', 'pandemi covid-19 aplikasi mudahkan siswa daftar universitas', 'TECHNO', '17 April 2020 22:09 WIB', 'okezone'),
(300, 'Antisipasi Korona, Mahasiswa Ubaya Buat Hand Sanitizer dari Lidah Buaya', 'antisipasi korona mahasiswa ubaya buat hand sanitizer lidah buaya', 'KAMPUS', '09 Maret 2020 22:59 WIB', 'okezone'),
(301, 'Mahasiswa Ubaya Bikin Hand Sanitizer Antisipasi Virus Korona', 'mahasiswa ubaya bikin hand sanitizer antisipasi virus korona', 'TECHNO', '07 Maret 2020 16:58 WIB', 'okezone'),
(302, 'Jalani Kemoterapi, Pesan Nadya Valerie untuk Para Pejuang Kanker Bikin Terenyuh', 'jalani kemoterapi pesan nadya valerie pejuang kanker bikin terenyuh', 'LIFESTYLE', '23 Juli 2019 10:23 WIB', 'okezone'),
(303, 'Jejak Sahat Tua Simanjuntak: Senior Golkar di Jatim Kena Cokok KPK', 'jejak sahat tua simanjuntak senior golkar jatim kena cokok kpk', 'Nasional', 'Kamis, 15 Des 2022 15:39 WIB', 'cnn'),
(304, 'Pendaki Mahasiswa Ubaya Meninggal di Gunung Penanggungan', 'pendaki mahasiswa ubaya meninggal gunung penanggungan', 'Nasional', 'Senin, 24 Jan 2022 07:09 WIB', 'cnn'),
(305, 'Ketum Muhammadiyah & Ketum PBNU Singgung Rakyat Kecil Terkait BBM Naik', 'ketum muhammadiyah ketum pbnu singgung rakyat kecil terkait bbm naik', 'Nasional', 'Kamis, 01 Sep 2022 10:00 WIB', 'cnn'),
(306, 'Bupati Yahukimo Klaim Sekolah Jadi Tempat Brimob Atas Izin Pemda', 'bupati yahukimo klaim sekolah jadi tempat brimob atas izin pemda', 'Nasional', 'Senin, 24 Jan 2022 09:01 WIB', 'cnn'),
(307, 'Malioboro Ditarget Steril PKL Akhir Januari, Pedagang Curhat ke DPRD', 'malioboro ditarget steril pkl akhir januari pedagang curhat dprd', 'Nasional', 'Senin, 24 Jan 2022 14:58 WIB', 'cnn'),
(308, 'Nenek 77 Tahun Meninggal Usai Tersengat Lebah di Bali', 'nenek 77 tahun meninggal usai tersengat lebah bali', 'Nasional', 'Senin, 24 Jan 2022 12:14 WIB', 'cnn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `testing`
--
ALTER TABLE `testing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `testing`
--
ALTER TABLE `testing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=309;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
