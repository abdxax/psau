-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13 أكتوبر 2018 الساعة 23:53
-- إصدار الخادم: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psua`
--

-- --------------------------------------------------------

--
-- بنية الجدول `appointment`
--

CREATE TABLE `appointment` (
  `file_on` int(11) NOT NULL,
  `appo_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `createat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `appointment`
--

INSERT INTO `appointment` (`file_on`, `appo_at`, `status`, `createat`) VALUES
(112, '0000-00-00 00:00:00', 'new', '2018-10-12 21:00:00'),
(112, '2018-10-17 21:00:00', 'new', '2018-10-12 21:00:00');

-- --------------------------------------------------------

--
-- بنية الجدول `file`
--

CREATE TABLE `file` (
  `id_file` int(11) NOT NULL,
  `file_on` int(11) NOT NULL,
  `Title` text COLLATE utf8_unicode_ci NOT NULL,
  `path` text COLLATE utf8_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email_employee` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `history`
--

CREATE TABLE `history` (
  `file_on` int(11) NOT NULL,
  `email_emp` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `diagnosis` text COLLATE utf8_unicode_ci NOT NULL,
  `plan` text COLLATE utf8_unicode_ci NOT NULL,
  `recomand` text COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `history`
--

INSERT INTO `history` (`file_on`, `email_emp`, `diagnosis`, `plan`, `recomand`, `note`, `create_at`, `update_at`) VALUES
(112, '', 'sdsd', 'dsdsdsd', 'dsdsds', 'sdsdsds', '2018-10-11 14:30:55', '0000-00-00 00:00:00'),
(112, 'a@psua.com', 'sdsd', 'sdsds', 'dsdsd', 'dsds', '2018-10-11 23:38:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- بنية الجدول `info`
--

CREATE TABLE `info` (
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `job` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `info`
--

INSERT INTO `info` (`email`, `name`, `phone`, `job`, `gender`, `create_at`, `update_at`) VALUES
('a@psua.com', 'as', '0568508989', 'sssss', 'm', '2018-10-11 14:37:39', '0000-00-00 00:00:00'),
('ssss@sssx.k', 'Ali', '0568088', 'aaaaa', 'm', '2018-10-10 21:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- بنية الجدول `patien`
--

CREATE TABLE `patien` (
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `file_on` int(11) NOT NULL,
  `Nation` text COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fil` text COLLATE utf8_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `patien`
--

INSERT INTO `patien` (`name`, `file_on`, `Nation`, `age`, `gender`, `fil`, `create_at`, `update_at`) VALUES
('sdadasda', 34343, '34', 0, 'm', '../../file/sdadasda_IBRAHIM ABDULLAH-ALZAMEL.pdf', '2018-10-12 21:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- بنية الجدول `user`
--

CREATE TABLE `user` (
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pass` text COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `user`
--

INSERT INTO `user` (`email`, `pass`, `role`, `status`, `create_at`, `update_at`) VALUES
('a@psua.com', '123', 2, 'active', '2018-10-13 13:11:24', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`,`file_on`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patien`
--
ALTER TABLE `patien`
  ADD PRIMARY KEY (`file_on`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
