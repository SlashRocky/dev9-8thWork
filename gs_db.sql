-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018 年 2 月 02 日 04:18
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
-- テーブルの構造 `gs_book_table`
--

CREATE TABLE `gs_book_table` (
  `no` int(11) NOT NULL,
  `userId` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `bookId` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `regiDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_book_table`
--

INSERT INTO `gs_book_table` (`no`, `userId`, `bookId`, `title`, `url`, `comment`, `regiDate`) VALUES
(1, '1', 'Jb3GNmCzcIoC', 'こころ', 'http://books.google.com/books/content?id=Jb3GNmCzcIoC&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE73OdrwA09xGJdFjrnQje2tjReGxKjEMAr_zXEFUV-ES5T4RcI_96b7gdmWdtDcoBiCurmiosBR2B_FLvENZL-oJpmFUqGmaz6wjj8si5CB-hICb5i21YcM--NC4_m7S_i2zRo3X&source=gbs_api', '夏目漱石 -- 慶応3年1月5日(新暦2月9日)江戸牛込馬場下横町に生まれる。本名は夏目金之助。帝国大学文科大学(東京大学文学部)を卒業後、東京高等師範学校、松山中学、第五高等学校などの教師生活を経て、1900年イギリスに留学する。帰国後、第一高等学校で教鞭をとりながら、1905年処女作「吾輩は猫である」を発表。1906年「坊っちゃん」「草枕」を発表。1907年教職を辞し、朝日新聞社に入社。そして「虞美人草」「三四郎」などを発表するが、胃病に苦しむようになる。1916年12月9日、「明暗」の連載途中に胃潰瘍で永眠。享年50歳であった。(青空文庫図書カードより)', '2018-02-01 22:33:42');

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
(1, 'i_wanna_feel_my_soul', 'potatowater972', '轟 政明', 'i_wanna_feel_my_soul@yahoo.co.jp', 'テスト', '2017-11-28 11:31:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_book_table`
--
ALTER TABLE `gs_book_table`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_book_table`
--
ALTER TABLE `gs_book_table`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
