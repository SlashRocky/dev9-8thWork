-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018 年 2 月 01 日 10:35
-- サーバのバージョン： 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE `gs_user_table` (
  `id` int(12) NOT NULL,
  `loginId` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `loginPw` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `naiyou` text COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `loginId`, `loginPw`, `name`, `email`, `naiyou`, `indate`) VALUES
(1, '', '', '鏑木', 'test5@test.jp', '内容', '2017-11-28 11:31:50'),
(2, '', '', 'テスト太郎', 'testtaro@gmail.com', 'testtesttest', '2017-11-30 17:19:03'),
(3, '', '', 'aaaaaa', 'dddddddd', 'gg', '2017-11-30 17:20:22'),
(4, '', '', 'aaaaaa', 'dddddddd', 'gg', '2017-11-30 17:20:22'),
(5, '', '', 'aaaaaa', 'dddddddd', 'gg', '2017-11-30 17:20:24'),
(6, '', '', 'aaaaaa', 'dddddddd', 'gg', '2017-11-30 17:20:25'),
(7, '', '', 'aaaaaa', 'dddddddd', 'gg', '2017-11-30 17:20:26'),
(8, '', '', 'aaaaaa', 'dddddddd', 'gg', '2017-11-30 17:20:26'),
(9, '', '', 'aaaaaa', 'dddddddd', 'gg', '2017-11-30 17:20:27'),
(10, '', '', 'aaaaaa', 'dddddddd', 'gg', '2017-11-30 17:20:27'),
(11, '', '', 'やまざき', 'test@test.jp', 'kyou \r\n', '2017-12-05 09:25:58'),
(12, '', '', 'Yamazaki Daisuke', 'php.yamazaki@gmail.com', 'aaaaaaa', '2017-12-06 11:31:54'),
(13, '', '', 'Yamazaki Daisuke', 'php.yamazaki@gmail.com', 'aaaaaaaaaa', '2017-12-06 11:32:36'),
(14, '', '', 'Yamazaki Daisuke', 'ddddddd', 'dddddddddd', '2017-12-06 11:32:59'),
(15, '', '', 'yamaza', 'php.yamazaki@gmail.com', 'aaaaaa', '2017-12-07 12:32:44'),
(16, '', '', 'aaaaaa', 'php.yamazaki@gmail.com', 'aaaaaaaa', '2017-12-07 12:33:00'),
(17, '', '', '轟政明', 'good.luck.my.love.20120909@gmail.com', '生きろ！', '2018-01-27 18:16:43'),
(18, '', '', '愛飢雄', 'aiueo@gmail.com', '愛に飢えてます', '2018-01-31 14:53:59'),
(19, 'dorami', 'doramidesu', 'doraemon', 'doraemon@gmail.com', 'test', '2018-02-01 08:35:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
