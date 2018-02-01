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
-- テーブルの構造 `gs_book_table`
--

CREATE TABLE `gs_book_table` (
  `no` int(12) NOT NULL,
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
(2, '', 'MA5ADwAAQBAJ', 'ドラえもんまんがセレクション アート！スペシャル', 'http://books.google.com/books/content?id=MA5ADwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE71-t-zfN9sanHGqVRvgmjDe4eE3hcOnVDPWXNI_0kmdag-roGkOFOeZlwuXXZ607zrDrCIvJCyulnp3b9GTn-N1Uit-krbIl750e1_YPwciJzCN05pKsKC7jwnkEK8sB_ty1-sO&source=gbs_api', '話題のアート展「THEドラえもん展　TOKYO　2017」開催を記念して、<br>アートにちなんだ「ドラえもん」＆藤子F作品の爆笑傑作選！！<br><br>「ドラえもん」を中心に、「エスパー魔美」「チンプイ」「<wbr>パーマン」<br>「新オバケのQ太郎」なども加え、<wbr>アートにまつわる短編漫画27話を収録。<br>巻頭・巻末カラーや本文記事では、<wbr>会場で撮影した参加アーチストの写真、<br>コメントなどを使い「THEドラえもん展」の見どころを紹介。<wbr>300ページたっぷり楽しめます！<br>最新「ドラえもん」情報も満載。この年末年始の「ドラえもん」<wbr>を何倍にも楽しむ決定版です！！', '2018-01-25 16:15:54'),
(3, '', 'MA5ADwAAQBAJ', 'ドラえもんまんがセレクション アート！スペシャル', 'http://books.google.com/books/content?id=MA5ADwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE71-t-zfN9sanHGqVRvgmjDe4eE3hcOnVDPWXNI_0kmdag-roGkOFOeZlwuXXZ607zrDrCIvJCyulnp3b9GTn-N1Uit-krbIl750e1_YPwciJzCN05pKsKC7jwnkEK8sB_ty1-sO&source=gbs_api', '話題のアート展「THEドラえもん展　TOKYO　2017」開催を記念して、<br>アートにちなんだ「ドラえもん」＆藤子F作品の爆笑傑作選！！<br><br>「ドラえもん」を中心に、「エスパー魔美」「チンプイ」「<wbr>パーマン」<br>「新オバケのQ太郎」なども加え、<wbr>アートにまつわる短編漫画27話を収録。<br>巻頭・巻末カラーや本文記事では、<wbr>会場で撮影した参加アーチストの写真、<br>コメントなどを使い「THEドラえもん展」の見どころを紹介。<wbr>300ページたっぷり楽しめます！<br>最新「ドラえもん」情報も満載。この年末年始の「ドラえもん」<wbr>を何倍にも楽しむ決定版です！！', '2018-01-25 16:16:07'),
(4, '11111', 'kbA2DwAAQBAJ', 'ドラゴンボールZ アニメコミックス 4 超サイヤ人だ孫悟空', 'http://books.google.com/books/content?id=kbA2DwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE70jeeObFAxgPGxvB72aa-HCPU-6xar8u-ReppB9fbhMTlksfDzLz6JqOCeh8_6mEWFx_SpOX_cS9MCI1C8-ZUIarohXwe0_oEefynTCzQBAFQQJgRKa-IY5B22SinfWwqrS1DyT&source=gbs_api', '【フルカラー版！】平和な地球に凶悪な異星人スラッグが突如、<wbr>襲来。<wbr>ドラゴンボールによって若さを取り戻したスラッグの野望を打ち砕<wbr>くために、孫悟空たち最強のZ戦士が総力を結集するが…!!　\'91年の春に劇場公開され、<wbr>大好評を博した長編オリジナル作が、<wbr>ついに待望の電子書籍アニメコミックス化!!　劇場版のワイドな迫力をオールカラー完全収録版にぎっしり詰め込<wbr>んだ超ホットな充実作だぞっ!!', '2018-02-01 17:52:03'),
(5, '<br />\n<b>Notice</b>:  Undefined', 'VrTcGvxJGCUC', 'ドラゴンの谷嵐を越えて', 'http://books.google.com/books/content?id=VrTcGvxJGCUC&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE707zN8jwk2dpGr0T33TtI_nsijtiKv-S8cuHCTABVL2HNqIwrL20IhdAxQ2U85w_iCmLpEG-EivVd6_Tz1-xjP8m1FBJvRmOJIrUPUny0FQ1D2qdX7ev3ZQQDxRv3K3Sz9-Z3Ak&source=gbs_api', '父親に飛ぶ許しをもらったカーラと愛竜スカイダンサーは、競技会で連続優勝を続け、幸せな毎日をすごしていた。一方、親友のブリーナは、自分や愛竜ムーンフライトの病気で競技に出場すらできず、警備隊に入るという夢に、一歩も近づけないでいた。あせりをつのらせたブリーナは、警備隊に入れる実力があることを示そうと無断で狩りを行い、事故にあってしまう。それが原因で絆がこわれたブリーナとムーンフライト。そして、ブリーナとカーラの友情にもきれつが入り始めた...。', '2018-02-01 17:57:16'),
(6, '', 'cFOhFTUXzRMC', 'ドラえもん学', 'http://books.google.com/books/content?id=cFOhFTUXzRMC&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE71UWzYk2Ne2Uu23_jJS7TtAA0Z-8gBLlWnT55TZ0Kf3-GvyK6dJYYtbpSufPLd1hLkVEbQreA9xCzLHmxvcCB-howxlpsHFKnBhjvzlnFqw6h9QQg59BB4HrcsnNlgA7AI9cOcz&source=gbs_api', '詳細なデータに基づき、<wbr>国民的アイドルの誕生秘話と作品の妙味を活字だけで追う意欲作。<wbr>ドラえもんがコミュニケーションの潤滑油に。 【PHP研究所】', '2018-02-01 18:00:33'),
(7, '19', 'u-rKAwAAQBAJ', '殺人鬼　——逆襲篇', 'http://books.google.com/books/content?id=u-rKAwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE72FETzqKWspb1u5k_IoF-i1kfA8UoPYSvDTuqlVGMieSbZAg7n1jCZaP50DYIBeuf40mh3x0LAsqMPN8HTVAQr-rvLIXuIRMPw8lbUeZO9Ey0sctB41TF5KVBt2E8FS2o5TgvJA&source=gbs_api', '伝説の『殺人鬼』ふたたび！　……蘇った殺戮の化身は山を降り、麓の街へ。いっそう凄惨さを増した地獄の饗宴にただ一人立ち向かうのは、ある「能力」を持った少年・真実哉！　……はたして対決の行方は?!', '2018-02-01 18:12:29'),
(8, '19', 'dF4KPwAACAAJ', '十角館の殺人', 'http://books.google.com/books/content?id=dF4KPwAACAAJ&printsec=frontcover&img=1&zoom=1&imgtk=AFLRE71Ns0sPQK15onmk3zeQI36XLAWxJKR2Ea8ChKBUGlbp5sLLBNcPoINQwu9Rlbc-TTGhh6VnG7qn5-8v0O2fSa46Y8F64e7yXEGAjcyccDFAQAeWHoiR51J2jQWFE3f526TQWP6K&source=gbs_api', '十角形の奇妙な館を訪れた大学ミステリ研の七人。彼らを襲う連続殺人の謎。結末に待ち受ける“衝撃の一行”とは?本格ミステリの名作がYA!に登場。', '2018-02-01 18:15:13'),
(9, '19', 'DJ5yDgAAQBAJ', 'ABC 〜AAA Book Chronicle〜', 'http://books.google.com/books/content?id=DJ5yDgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE70FmS-1-D5BUfoPMj7s7Otw4BL9kxE8arp8ERq16NCCMQUKgLkShS0HCoowTasnfJ-BQhLBlppnGau7HxMwI4DEsKB7Ivfu1CYTwjRVsZf51j2nxXo2yrLTGkgCgoshsXlgLeIS&source=gbs_api', '「AAA」デビュー7周年のメモリアルブック！<wbr>富士急ハイランドや沖縄でのファンミーティングでの最新特写や、<wbr>個人インタビューに全国ライブツアーの完全密着など、<wbr>彼らの歴史をすべてまとめた豪華版写真集になっています！<wbr>デビュー時の初々しい姿も必見！<br>撮影：小林ばく', '2018-02-01 18:15:51'),
(10, '19', 'dF4KPwAACAAJ', '十角館の殺人', 'http://books.google.com/books/content?id=dF4KPwAACAAJ&printsec=frontcover&img=1&zoom=1&imgtk=AFLRE70XDf9_53tSCLkiu3SMmsM7l_crMzS_2svVTIpShyIEzDruKuxZg5RmxLEFy-ngNGgliXC5clfI-4bvLlbsiLQJzb-K9dfWTxr4kBIW8n7tDhWF07C6q-phxBTRIaMqs_nrRxcG&source=gbs_api', '十角形の奇妙な館を訪れた大学ミステリ研の七人。彼らを襲う連続殺人の謎。結末に待ち受ける“衝撃の一行”とは?本格ミステリの名作がYA!に登場。', '2018-02-01 18:16:53'),
(11, '19', '78eqBQAAQBAJ', '十角館の殺人〈新装改訂版〉', 'http://books.google.com/books/content?id=78eqBQAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE70Ve2GVAN-CBndVXn7ZKi4p5cefKIQkqKOcwahKxIED97rjk_av2vdnT62brVx-K6Su-7QstOr2PnMtcE_yBA7DC_grVbi6j5Im2WW7s_Q2EOT_Nb0vGmBIUc8n-37CVIfgghgH&source=gbs_api', '十角形の奇妙な館が建つ孤島・<wbr>角島を大学ミステリ研の７人が訪れた。館を建てた建築家・<wbr>中村青司は、半年前に炎上した青屋敷で焼死したという。<wbr>やがて学生たちを襲う連続殺人。ミステリ史上最大級の、<wbr>驚愕の結末が読者を待ち受ける！<br>１９８７年の刊行以来、<wbr>多くの読者に衝撃を与え続けた名作が新装改訂版で登場。（<wbr>講談社文庫）', '2018-02-01 18:20:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_book_table`
--
ALTER TABLE `gs_book_table`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_book_table`
--
ALTER TABLE `gs_book_table`
  MODIFY `no` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
