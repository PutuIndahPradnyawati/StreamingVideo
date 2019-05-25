-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2019 at 02:03 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `videostream`
--

-- --------------------------------------------------------

--
-- Table structure for table `stream`
--

CREATE TABLE `stream` (
  `id_video` int(11) NOT NULL,
  `name_video` varchar(100) NOT NULL,
  `path_video` varchar(100) NOT NULL,
  `path_poster` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `deskripsi_video` varchar(500) NOT NULL,
  `tgl_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stream`
--

INSERT INTO `stream` (`id_video`, `name_video`, `path_video`, `path_poster`, `id_user`, `deskripsi_video`, `tgl_upload`) VALUES
(71, 'coba coba', 'video/rise-1.mp4', 'poster/_r__shield_hero_s_shield_of_wrath_by_blackhook_db0sd0z-2.png', 3, 'asjdh', '2019-05-14'),
(73, 'video baru', 'video/rise-2.mp4', 'poster/_r__shield_hero_s_shield_of_wrath_by_blackhook_db0sd0z-1.png', 3, 's,kdfsjdh', '2019-05-14'),
(74, 'baru banget', 'video/rise-3.mp4', 'poster/_r__shield_hero_s_shield_of_wrath_by_blackhook_db0sd0z-3.png', 3, 'sjdas', '2019-05-14'),
(75, 'Tari kreasi Spendapura Oleh Kadek Sinta pridayani ', 'video/rise-4.mp4', 'poster/IMG_4191.JPG', 6, 'vojasdklakdejkwehjdfna\r\ncabdcjhwesbawde\r\nasdbjhwedbwe', '2019-05-15'),
(76, 'Video Mata Kuliah Jaringan Multimedia - Materi ke-', 'video/rise-5.mp4', 'poster/naofumi-iwatani-hoodie-for-teens-shield-hero-thick-fleece-sweatshirt-zipper257858.jpg', 7, 'sjdhkajshdbujasdnbcsjdh', '2019-05-15'),
(77, 'Yovie, Tulus, Glenn - Adu Rayu (eclat cover ft Ray', 'video/im on my way.mp4', 'poster/IMG_5408.JPG', 6, 'Ngegombal dengan lagu, asedappp\r\n#eclatstory #eclatcover\r\n\r\n- - - - - - - - - - -\r\n\r\nECLAT STORY ARE\r\n\r\n@eclatstoryofficial https://www.instagram.com/eclatstoryo...\r\n@yosua_gunawan https://www.instagram.com/yosua_gunawan/\r\n@willyanggawinata https://www.instagram.com/willyanggaw...\r\n@louisxanderliang https://www.instagram.com/louisxander...\r\n\r\nSPECIAL THANKS TO\r\n\r\n@raynaldowijaya https://www.instagram.com/raynaldowij... & his awesome voice!\r\n@noahutagalung https://www.instagram.com/noahutagalung/', '2019-05-15'),
(78, 'COBA KETIGA', 'video/im on my way-14.mp4', 'poster/IMG20161231190842-4.jpg', 6, 'SUBSCRIBE! \r\n\r\nWe promise itâ€™s gonna be romantic\r\nFeel free to love, share, comment and download the song! \r\nThat would be awesome! :p\r\n\r\n- - - - - - - - - - -\r\n\r\nFor business inquiries:\r\neclatstoryofficial@gmail.com\r\n0817872515', '2019-05-15'),
(79, 'Jaz - Teman Bahagia (eclat acoustic cover)', 'video/lily-2.mp4', 'poster/IMG20161231235749_1.jpg', 10, 'Setia kan ku jaga, hingga di hari tua :)\r\n\r\n- - - - - - - - - - -\r\n\r\nECLAT STORY ARE\r\n@eclatstoryofficial https://www.instagram.com/eclatstoryo...\r\n@yosua_gunawan https://www.instagram.com/yosua_gunawan/\r\n@jeftajasson  https://www.instagram.com/jeftajasson/\r\n@willyanggawinata https://www.instagram.com/willyanggaw...\r\n@claraayusheila  https://www.instagram.com/claraayushe...\r\n@louisxanderliang https://www.instagram.com/louisxander...\r\n\r\n- - - - - - - - - - -\r\n\r\nSUBSCRIBE! \r\n\r\nWe promise itâ€™s go', '2019-05-15'),
(80, 'judul lain', 'video/sweet but psyco-5.mp4', 'poster/DSC00007-2.jpg', 6, 'deskripsi', '2019-05-16'),
(81, 'Sha,msbdjasndjkbasjdbjhsd', 'video/darkside-3.mp4', 'poster/DSC00080-1.jpg', 6, 'deskripsi', '2019-05-16'),
(82, 'Yovie, Tulus, Glenn - Adu Rayu (eclat cover ft Raynaldo Wijaya)', 'video/love someone.mp4', 'poster/DSC00081.jpg', 6, 'deskripsi', '2019-05-16'),
(83, 'Vlog Baru ni Gan', 'video/videoplayback_3.mp4', 'poster/qr-code.png', 12, 'Ini video pertama aku guys, ayo subscribe', '2019-05-21'),
(84, 'coba1', 'video/coba1.mp4', 'poster/run program final.jpg', 13, 'hahahah', '2019-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(64) NOT NULL,
  `email_user` varchar(64) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `path_profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email_user`, `password_user`, `path_profile`) VALUES
(2, 'root', 'admin@gmail.com', 'admin123', ''),
(3, 'Putu Indah Pradnyawati', 'iinpradnya@gmail.com', '12345', ''),
(4, 'dharma', 'dhaem@gmail.com', '12345', ''),
(6, 'Sinta Pridayani', 'sinta@gmail.com', '12345', 'profile/1500931905675.jpg'),
(7, 'wahyu Aprisena', 'wahyu@gmail.com', '12345', 'profile/IMG20161231190842.jpg'),
(8, 'Krisna lalala', 'krisna@gmail.com', '12345', ''),
(9, 'Putu Asri Sri Sutanti', 'ayuk@gmail.com', '12345', ''),
(10, 'Asih Devi Rahmayanti', 'asih@gmail.com', '12345', ''),
(11, 'cahya', 'cahya@gmail.com', '12345', ''),
(12, 'Dharmajaya', 'dharma@gmail.com', '12345', 'profile/S__43983118.jpg'),
(13, 'TRI AYOMI', 'artayoga67@gmail.com', '12345', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stream`
--
ALTER TABLE `stream`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stream`
--
ALTER TABLE `stream`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `stream`
--
ALTER TABLE `stream`
  ADD CONSTRAINT `stream_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
