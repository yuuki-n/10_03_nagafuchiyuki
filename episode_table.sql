-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2019 年 11 月 07 日 15:57
-- サーバのバージョン： 10.4.6-MariaDB
-- PHP のバージョン: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacfd04_03`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `episode_table`
--

CREATE TABLE `episode_table` (
  `id` int(12) NOT NULL,
  `manufacturer` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `product` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(128) COLLATE utf8_unicode_ci DEFAULT 'NULL',
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `episode_table`
--

INSERT INTO `episode_table` (`id`, `manufacturer`, `product`, `image`, `comment`, `indate`) VALUES
(1, 'SONY', 'WF-1000XM3', NULL, 'Bluetoothイヤホンの音切れで悩んでいたバンドマンの友人にプレゼントしました。音質も良くて、曲作りもはかどっているみたいです！', '2019-11-07 00:00:00'),
(2, 'Apple', 'AirPods', NULL, 'ジムに通う父にプレゼントしました。好きなミスチルの曲を聴きながらランニングマシーンを頑張っています。あっという間に1曲聴き終わって走るのが楽しくなってきたみたいです^^', '2019-11-07 00:00:00');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `episode_table`
--
ALTER TABLE `episode_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `episode_table`
--
ALTER TABLE `episode_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
