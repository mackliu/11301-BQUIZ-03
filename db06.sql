-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-07-16 05:46:49
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db06`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movies`
--

CREATE TABLE `movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `level` int(1) NOT NULL,
  `length` int(10) NOT NULL,
  `ondate` date NOT NULL,
  `publish` text NOT NULL,
  `director` text NOT NULL,
  `trailer` text NOT NULL,
  `poster` text NOT NULL,
  `intro` text NOT NULL,
  `sh` int(1) NOT NULL,
  `rank` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `movies`
--

INSERT INTO `movies` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `trailer`, `poster`, `intro`, `sh`, `rank`) VALUES
(1, '院線1', 1, 120, '2024-07-16', '發行商1', '導演1', '03B01v.mp4', '03B01.png', '院線片1的劇情簡介', 1, 1),
(2, '院線02', 1, 120, '2024-07-16', '發行商02', '導演02', '03B02v.mp4', '03B02.png', '院線片02的劇情簡介院線片02的劇情簡介院線片02的劇情簡介院線片02的劇情簡介院線片02的劇情簡介院線片02的劇情簡介', 1, 2),
(3, '院線03', 2, 120, '2024-07-17', '發行商03', '導演03', '03B03v.mp4', '03B03.png', '院線片03的劇情簡介院線片03的劇情簡介院線片03的劇情簡介院線片03的劇情簡介院線片03的劇情簡介院線片03的劇情簡介', 1, 3),
(4, '院線04', 3, 120, '2024-07-18', '發行商04', '導演04', '03B04v.mp4', '03B04.png', '院線片04的劇情簡介院線片04的劇情簡介院線片04的劇情簡介院線片04的劇情簡介院線片04的劇情簡介院線片04的劇情簡介', 1, 4),
(5, '院線05', 4, 120, '2024-07-19', '發行商05', '導演05', '03B05v.mp4', '03B05.png', '院線片05的劇情簡介院線片05的劇情簡介院線片05的劇情簡介院線片05的劇情簡介院線片05的劇情簡介院線片05的劇情簡介', 1, 5),
(6, '院線06', 1, 120, '2024-07-15', '發行商06', '導演06', '03B06v.mp4', '03B06.png', '院線片06的劇情簡介院線片06的劇情簡介院線片06的劇情簡介院線片06的劇情簡介院線片06的劇情簡介院線片06的劇情簡介', 1, 6),
(7, '院線07', 2, 120, '2024-07-14', '發行商07', '導演07', '03B07v.mp4', '03B07.png', '院線片07的劇情簡介院線片07的劇情簡介院線片07的劇情簡介院線片07的劇情簡介院線片07的劇情簡介院線片07的劇情簡介', 1, 7),
(8, '院線08', 3, 120, '2024-07-13', '發行商08', '導演08', '03B08v.mp4', '03B08.png', '院線片08的劇情簡介院線片08的劇情簡介院線片08的劇情簡介院線片08的劇情簡介院線片08的劇情簡介院線片08的劇情簡介', 1, 8),
(9, '院線09', 4, 120, '2024-07-17', '發行商09', '導演09', '03B09v.mp4', '03B09.png', '院線片09的劇情簡介院線片09的劇情簡介院線片09的劇情簡介院線片09的劇情簡介院線片09的劇情簡介院線片09的劇情簡介', 1, 9),
(10, '院線10', 1, 120, '2024-07-18', '發行商10', '導演10', '03B10v.mp4', '03B10.png', '院線片10的劇情簡介院線片10的劇情簡介院線片10的劇情簡介院線片10的劇情簡介院線片10的劇情簡介院線片10的劇情簡介', 1, 10),
(11, '院線11', 1, 120, '2024-07-16', '發行商11', '導演11', '03B11v.mp4', '03B11.png', '院線片11的劇情簡介院線片11的劇情簡介院線片11的劇情簡介院線片11的劇情簡介院線片11的劇情簡介院線片11的劇情簡介', 1, 11),
(12, '院線12', 1, 120, '2024-07-19', '發行商12', '導演12', '03B12v.mp4', '03B12.png', '院線片12的劇情簡介院線片12的劇情簡介院線片12的劇情簡介院線片12的劇情簡介院線片12的劇情簡介院線片12的劇情簡介', 1, 12);

-- --------------------------------------------------------

--
-- 資料表結構 `posters`
--

CREATE TABLE `posters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `img` text NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL,
  `ani` int(10) UNSIGNED NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `posters`
--

INSERT INTO `posters` (`id`, `name`, `img`, `rank`, `ani`, `sh`) VALUES
(2, '哥吉拉', '03A01.jpg', 5, 1, 1),
(4, '?', '03A03.jpg', 1, 3, 1),
(5, '?', '03A05.jpg', 6, 2, 1),
(6, '?', '03A07.jpg', 8, 1, 1),
(7, '123123', '03A08.jpg', 7, 3, 1),
(8, '預告片2', '03A02.jpg', 9, 1, 1),
(9, '預告片4', '03A04.jpg', 10, 1, 1),
(10, '預告片6', '03A06.jpg', 11, 1, 1),
(11, '預告片9', '03A09.jpg', 12, 2, 1),
(12, 'fadfasdf', 'Brandon Ingram.jpg', 2, 2, 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `posters`
--
ALTER TABLE `posters`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `posters`
--
ALTER TABLE `posters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
