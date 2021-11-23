-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2021 at 11:54 AM
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
-- Database: `pixwave`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Abstract'),
(2, 'Art'),
(3, 'Animals'),
(4, 'Anime'),
(5, 'Astro'),
(6, 'Black'),
(7, 'Bridge'),
(8, 'Cars'),
(9, 'City'),
(10, 'Cloud'),
(11, 'Dark'),
(12, 'Fashion'),
(13, 'Flowers'),
(14, 'Food'),
(15, 'Macro'),
(16, 'Motorcycles'),
(17, 'Motion'),
(18, 'Music'),
(19, 'Nature'),
(20, 'Others'),
(21, 'People'),
(22, 'Sky'),
(23, 'Sports'),
(24, 'Street'),
(25, 'Technology'),
(26, 'Texture'),
(27, 'Travel');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `site_name` varchar(60) NOT NULL,
  `site_title` varchar(150) NOT NULL,
  `site_desc` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `site_name`, `site_title`, `site_desc`) VALUES
(1, 'PixwaveX', 'PixwaveX - Image Sharing Site', '<b>PixwaveX</b> started with a vision of giving all users a place where users upload and download their pictures taken by mobile phone.');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_id` varchar(20) NOT NULL,
  `image_size` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `visibility` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `image_location` varchar(250) NOT NULL,
  `category` int(50) NOT NULL,
  `views` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `downloads` int(11) NOT NULL,
  `shares` int(11) NOT NULL,
  `downloadable` int(11) NOT NULL,
  `license_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `user_id`, `image_id`, `image_size`, `title`, `visibility`, `time`, `image_location`, `category`, `views`, `likes`, `downloads`, `shares`, `downloadable`, `license_id`) VALUES
(10, 19, '96fbc5671e', 1246557, 'bridge', 1, '2021-05-30 14:23:10', '/upload/images/96fbc5671e.jpg', 7, 14, 5, 0, 0, 0, 0),
(11, 19, 'b9e4e6c0e0', 1885936, 'natural beauty', 2, '2021-06-05 19:11:46', '/upload/images/b9e4e6c0e0.jpg', 19, 20, 2, 0, 0, 0, 1),
(14, 19, '91129aa8a8', 2322875, 'flower', 0, '2021-06-08 10:28:33', '/upload/images/91129aa8a8.jpg', 13, 30, 3, 3, 20, 0, 1),
(19, 19, 'f8b3bbf9f0', 1330362, 'white flower', 0, '2021-06-14 07:05:06', '/upload/images/f8b3bbf9f0.jpg', 13, 36, 1, 0, 113, 0, 0),
(20, 19, '6b3ecf9326', 1049725, 'white snale', 1, '2021-06-14 07:15:05', '/upload/images/6b3ecf9326.jpg', 6, 7, 1, 3, 0, 0, 0),
(21, 23, 'cb32e1958b', 318371, 'Moon Night', 0, '2021-06-24 18:02:02', '/upload/images/cb32e1958b.jpg', 22, 8, 1, 0, 29, 0, 1),
(23, 23, 'c139fe2260', 134514, 'Google', 0, '0000-00-00 00:00:00', '/upload/images/c139fe2260.jpeg', 25, 0, 0, 0, 0, 0, 0),
(25, 23, '3eab1ef850', 171096, 'Sunset', 0, '0000-00-00 00:00:00', '/upload/images/3eab1ef850.jpg', 4, 4, 1, 0, 4, 0, 1),
(30, 23, '427cb6526f', 1246557, 'Skyline', 0, '2021-07-01 18:17:53', '/upload/images/427cb6526f.jpg', 13, 3, 1, 0, 2, 0, 0),
(31, 23, '3d9727e951', 147386, 'dffd', 1, '2021-07-06 09:50:46', '/upload/images/3d9727e951.jpg', 13, 3, 1, 0, 0, 0, 1),
(34, 23, '0b45a9f0ab', 100729, 'America', 0, '2021-07-06 11:29:43', '/upload/images/0b45a9f0ab.jpg', 24, 6, 0, 0, 0, 0, 0),
(38, 23, 'f09bb1105a', 160657, 'Green Grass', 0, '2021-08-18 07:56:01', '/upload/images/f09bb1105a.jpg', 19, 0, 0, 0, 0, 0, 0),
(39, 23, 'e6f7304711', 321043, 'River', 0, '2021-08-18 07:56:45', '/upload/images/e6f7304711.jpg', 19, 0, 0, 0, 0, 0, 0),
(40, 23, 'b7421aec20', 406776, 'Grass Field', 0, '2021-08-18 07:57:13', '/upload/images/b7421aec20.jpg', 19, 0, 0, 0, 0, 0, 0),
(41, 23, '4865855168', 348530, 'Blue Sea', 0, '2021-08-18 08:01:44', '/upload/images/4865855168.jpg', 19, 0, 0, 0, 0, 0, 0),
(42, 23, 'a3a3fb056e', 171096, 'Sunset', 0, '2021-08-18 08:02:21', '/upload/images/a3a3fb056e.jpg', 19, 0, 0, 0, 0, 0, 0),
(43, 23, 'f0de326348', 160151, 'Linux', 0, '2021-08-18 08:02:48', '/upload/images/f0de326348.jpg', 25, 0, 0, 0, 0, 0, 0),
(44, 23, '84416bdb35', 401600, 'Linux Arch', 0, '2021-08-18 08:04:36', '/upload/images/84416bdb35.jpg', 25, 0, 0, 0, 0, 0, 0),
(45, 23, '0451bbadc5', 405834, 'Wolfs White', 0, '2021-08-18 08:05:19', '/upload/images/0451bbadc5.jpg', 3, 0, 0, 0, 0, 0, 0),
(46, 23, 'c4edd762a8', 191520, 'Bird', 0, '2021-08-18 08:06:06', '/upload/images/c4edd762a8.jpg', 3, 2, 1, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `license`
--

CREATE TABLE `license` (
  `id` int(11) NOT NULL,
  `license_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `license`
--

INSERT INTO `license` (`id`, `license_name`) VALUES
(1, 'Rights Managed (RM) License'),
(2, 'Editorial Use License'),
(3, 'Royalty Free License (RF)'),
(4, 'Royalty Free Extended License'),
(5, 'Creative Commons License'),
(6, 'Public Domain');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `image_id`, `user_id`) VALUES
(228, 11, 19),
(230, 14, 19),
(246, 20, 19),
(257, 14, 22),
(269, 11, 23),
(313, 21, 23),
(317, 25, 23),
(319, 31, 23),
(322, 30, 23),
(324, 19, 23),
(325, 14, 23),
(326, 46, 23);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `report_type` int(11) NOT NULL,
  `reporter_id` int(11) NOT NULL,
  `uploader_id` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `image_id`, `report_type`, `reporter_id`, `uploader_id`, `time`, `description`) VALUES
(8, 21, 1, 19, 23, '2021-06-24 19:01:58', 'This is report by Akash');

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total_active_users` int(11) NOT NULL,
  `total_inactive_users` int(11) NOT NULL,
  `today_active_users` int(11) NOT NULL,
  `total_image_upload` int(11) NOT NULL,
  `today_image_upload` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`id`, `date`, `total_active_users`, `total_inactive_users`, `today_active_users`, `total_image_upload`, `today_image_upload`) VALUES
(1, '2021-08-18', 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birth_date` date NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  `register_date` date NOT NULL,
  `last_active` date NOT NULL,
  `country` varchar(32) NOT NULL,
  `city` varchar(60) NOT NULL,
  `zip_code` varchar(11) NOT NULL,
  `email_code` varchar(50) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `cover` varchar(250) NOT NULL,
  `admin` int(11) NOT NULL,
  `role` varchar(30) NOT NULL,
  `ip_address` varchar(150) NOT NULL,
  `total_views` int(11) NOT NULL DEFAULT 0,
  `total_likes` int(11) NOT NULL DEFAULT 0,
  `device_name` varchar(30) NOT NULL,
  `device_model` varchar(30) NOT NULL,
  `apertures` varchar(5) NOT NULL,
  `resolution` varchar(5) NOT NULL,
  `focal_length` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone_no`, `password`, `name`, `gender`, `birth_date`, `active`, `register_date`, `last_active`, `country`, `city`, `zip_code`, `email_code`, `avatar`, `cover`, `admin`, `role`, `ip_address`, `total_views`, `total_likes`, `device_name`, `device_model`, `apertures`, `resolution`, `focal_length`) VALUES
(16, 'uuuuuu', 'uu@uu.uuu', 'N/A', 'MDAwMDA=', 'uuuuu', '', '2021-07-01', 0, '2021-05-21', '2021-06-22', 'India', 'Kolkata', '', '', '', '', 1, 'Viewer', '::1', 0, 0, '', '', '', '', ''),
(17, 'llllll', 'lll@lll.lll', 'N/A', 'MDAwMDA=', 'lllll lllllll', 'Male', '2021-05-19', 0, '2021-12-10', '2021-05-21', 'India', 'Kolkata', '', '', '', '', 1, 'Viewer', '::1', 0, 0, '', '', '', '', ''),
(18, 'yyyyyy', 'yyy@yyy.yyy', 'N/A', 'MDAwMDA=', 'yyyyyy', '', '2021-07-01', 0, '2021-12-03', '2021-05-21', 'India', 'Kolkata', '', '', '', '', 0, 'Viewer', '::1', 0, 0, '', '', '', '', ''),
(19, 'akash.sarkar1489', 'akash@gmail.com', 'N/A', 'MDAwMDA=', 'Akash Sarkar', 'Male', '2000-02-18', 0, '2021-03-02', '2021-06-25', 'India', 'Kolkata', '', '', 'upload/profile/5bd0566798.jpg', '/upload/images/96fbc5671e.jpg', 1, 'Photographer & Uploader', '::1', 107, 12, 'g10', 'g101', '2.3', '56', '3.65'),
(20, 'oooooo', 'oooo@ooo.ooo', 'N/A', 'MDAwMDA=', 'oooooooo', 'Male', '2285-05-05', 0, '2021-05-31', '2021-05-31', 'India', 'Kolkata', '', '', 'img/avatar.png', '', 0, 'Viewer', '::1', 0, 0, 'g10', 'g101', '2.3', '56', '3.65'),
(21, 'qqqqqq', 'qqq@qqq.qqq', 'N/A', 'MDAwMDA=', 'qqqqq qqqqq', '', '0000-00-00', 0, '2021-06-09', '2021-06-11', 'India', 'Kolkata', '', '', 'img/avatar.png', '', 0, 'Viewer', '::1', 0, 0, '', '', '', '', ''),
(22, 'eeeee', 'eee@eee.eee', 'N/A', 'MDAwMDA=', 'eee eeee', '', '0000-00-00', 0, '2021-06-17', '2021-06-20', 'India', 'Kolkata', '', '', 'img/avatar.png', '', 0, 'Viewer', '::1', 0, 0, '', '', '', '', ''),
(23, 'suraj', 'suraj@localhost.com', 'N/A', 'MTIzNDU=', 'Suraj Das', 'Male', '2000-08-20', 0, '2021-06-20', '2021-08-18', 'India', 'Kolkata', '741257', '', 'upload/profile/6f2969b0f6.jpg', '/upload/images/0b45a9f0ab.jpg', 1, 'Viewer', '::1', 22, 4, '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `license`
--
ALTER TABLE `license`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `license`
--
ALTER TABLE `license`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=327;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stats`
--
ALTER TABLE `stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
