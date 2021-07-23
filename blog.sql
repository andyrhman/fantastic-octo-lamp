-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2021 at 02:31 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `hasil_quiz`
--

CREATE TABLE `hasil_quiz` (
  `id` int(5) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tipe_quiz` varchar(100) NOT NULL,
  `total_pertanyaan` varchar(10) NOT NULL,
  `jawaban_benar` varchar(10) NOT NULL,
  `jawaban_salah` varchar(10) NOT NULL,
  `waktu_ujian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_quiz`
--

INSERT INTO `hasil_quiz` (`id`, `nama_lengkap`, `tipe_quiz`, `total_pertanyaan`, `jawaban_benar`, `jawaban_salah`, `waktu_ujian`) VALUES
(140, 'masamba kenna banjir', 'Bhs Inggris', '6', '6', '0', '2021-07-22'),
(141, 'masamba kenna banjir', 'Sejarah', '0', '0', '0', '2021-07-22'),
(142, 'masamba kenna banjir', 'Matematika SMA', '1', '1', '0', '2021-07-22'),
(143, 'masamba kenna banjir', '<!DOCTYPE html><html><head>  <meta charset=\"UTF-8\">  <meta name=\"viewport\" content=\"width=device-wid', '0', '0', '0', '2021-07-22'),
(144, 'masamba kenna banjir', '<!DOCTYPE html><html><head>  <meta charset=\"UTF-8\">  <meta name=\"viewport\" content=\"width=device-wid', '0', '0', '0', '2021-07-22'),
(145, 'Andy rahman ramadhan', 'Tes 2', '0', '0', '0', '2021-07-22'),
(146, 'masamba kenna banjir', 'Matematika', '0', '0', '0', '2021-07-22'),
(147, 'Andy rahman ramadhan', 'Tes 1', '0', '0', '0', '2021-07-22'),
(148, 'Andy rahman ramadhan', 'Tes 1', '0', '0', '0', '2021-07-22'),
(149, 'Andy rahman ramadhan', 'Tes 1', '0', '0', '0', '2021-07-22'),
(150, 'Andy rahman ramadhan', 'Tes 1', '0', '0', '0', '2021-07-22'),
(151, 'Andy rahman ramadhan', 'Matematika', '0', '0', '0', '2021-07-22'),
(152, 'Andy rahman ramadhan', 'Matematika', '0', '0', '0', '2021-07-22'),
(153, 'Andy rahman ramadhan', 'Matematika', '0', '0', '0', '2021-07-22');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `name`, `description`) VALUES
(1, 'Teknologi', '<p>Sebuah informasi tentang teknologi!</p>'),
(15, 'Sejarah', '<p>Sebuah informasi tentang sejarah</p>'),
(16, 'Fiksi', '<p>Karya fiksi</p>'),
(17, 'Inspirasi', '<p>Kategori tentang inspirasi</p>'),
(18, 'Biografi', '<p>Kategori tentang biografi</p>'),
(19, 'Programming', '<p>Kategori tentang programming!!!!! YOLO</p>'),
(22, 'Ted', '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_quiz`
--

CREATE TABLE `kategori_quiz` (
  `id` int(5) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `waktu_ujian` varchar(5) NOT NULL,
  `publish` tinyint(4) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_quiz`
--

INSERT INTO `kategori_quiz` (`id`, `kategori`, `waktu_ujian`, `publish`, `token`, `created_at`) VALUES
(88, 'Matematika', '1', 1, 'jangandiketahui', '0000-00-00'),
(89, 'Bhs Inggris', '1', 1, 'asd', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id` int(5) NOT NULL,
  `no_pertanyaan` varchar(5) NOT NULL,
  `pertanyaan` varchar(500) NOT NULL,
  `opt1` varchar(100) NOT NULL,
  `opt2` varchar(100) NOT NULL,
  `opt3` varchar(100) NOT NULL,
  `opt4` varchar(100) NOT NULL,
  `jawaban` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `no_pertanyaan`, `pertanyaan`, `opt1`, `opt2`, `opt3`, `opt4`, `jawaban`, `kategori`) VALUES
(25, '1', 'Who is the first president of Indonesia?', 'Jokowi', 'Megawati', 'Soekarno', 'Habibie', 'Soekarno', 'Bhs Inggris'),
(26, '2', 'When did Indonesia declared their independence?', '1920', '1945', '1990', '1944', '1945', 'Bhs Inggris'),
(27, '3', 'Who is the richest man in the world?', 'Bill Gates', 'Jeff Bezos', 'Donald Trump', 'Andy Rahman', 'Jeff Bezos', 'Bhs Inggris'),
(28, '4', 'What is the most famous php framework?', 'Django', 'Codeigniter', 'NodeJs', 'Laravel', 'Laravel', 'Bhs Inggris'),
(29, '5', 'What is the most spoken languange in the world?', 'English', 'Russian', 'Mandarin', 'Japanese', 'English', 'Bhs Inggris'),
(30, '6', 'Find picture of camel', 'opt_images/54213dd99eb87e29567e6c53cc946763007-clock.png', 'opt_images/2f0c96ce298365300b98236ca005c715010-drums.png', 'opt_images/2f0c96ce298365300b98236ca005c715004-camel.png', 'opt_images/2f0c96ce298365300b98236ca005c715017-islam.png', 'opt_images/2f0c96ce298365300b98236ca005c715004-camel.png', 'Bhs Inggris'),
(31, '1', '10 + 2 = ...?', '12', '5', '1', '6', '12', 'Matematika SMA');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `overview` text NOT NULL,
  `publish` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `topic_id`, `title`, `image`, `body`, `overview`, `publish`, `created_at`) VALUES
(35, 75, 17, 'Post Pertama', '1626828812_1624800526_martin-luther-king.jpg', '&lt;p&gt;asd&lt;/p&gt;\r\n', '&lt;p&gt;asd&lt;/p&gt;', 1, '2021-07-21 08:53:32'),
(36, 75, 19, 'Post Kedua', '1626918354_020-pot.png', '&lt;p&gt;asd&lt;/p&gt;\r\n', '&lt;p&gt;ddd&lt;/p&gt;', 1, '2021-07-22 09:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `admin`, `nama_lengkap`, `username`, `email`, `password`, `contact`) VALUES
(10, 0, '', 'tatarann', 'akunanimeke14@gmail.com', '$2y$10$WDphCcQs.xRPU3zTn9OXceVX9joJgVHcqZWLUhQ2yg/KiW6b8Rd9G', '08973983822'),
(11, 1, '', 'admin', 'sss@sssa333.com', '$2y$10$XeE2YrqIcz3Q8W0XMYRxT.xpGvCpLeyikGsMue1HUS4.uzJoTYj6i', '23423423'),
(12, 0, '', 'yolo989', 'sss@sssadsadas.com', '$2y$10$8e9c0VouCNA1wQZrQCjXBujsvp0xY5uouYgrYdLfsUQA.WWR0MOEC', '08973983822');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `admin`, `nama_lengkap`, `username`, `email`, `password`, `created_at`) VALUES
(74, 0, 'masamba kenna banjir', 'tatarann', 'sss@sssa.com', '$2y$10$WmGmwHdD.aCl7n/x5kFiSeJtNnRfQCGDRyNpRFzLlOd6DTMWW9cq2', '2021-07-21 00:47:23'),
(75, 1, 'Andy rahman ramadhan', 'admin', 'andyrahman989@gmail.com', '$2y$10$7fqKbo6wrJl.uheu4C0wvODQrMowJqeJCuI0obG9GrDvMuXcZhGi.', '2021-07-21 00:49:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil_quiz`
--
ALTER TABLE `hasil_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `kategori_quiz`
--
ALTER TABLE `kategori_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_3` (`email`),
  ADD KEY `email_2` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil_quiz`
--
ALTER TABLE `hasil_quiz`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `kategori_quiz`
--
ALTER TABLE `kategori_quiz`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `kategori` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
