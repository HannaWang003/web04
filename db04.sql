-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-10-20 14:42:56
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db04`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc` text NOT NULL,
  `pw` text NOT NULL,
  `pr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `admin`
--

INSERT INTO `admin` (`id`, `acc`, `pw`, `pr`) VALUES
(1, 'admin', '1234', 'a:5:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;}'),
(8, 'root', '5678', 'a:1:{i:0;s:1:\"1\";}'),
(9, 'root1', 'root1', 'a:1:{i:0;s:1:\"2\";}'),
(10, 'root2', 'root2', 'a:1:{i:0;s:1:\"3\";}');

-- --------------------------------------------------------

--
-- 資料表結構 `bottom`
--

CREATE TABLE `bottom` (
  `id` int(10) UNSIGNED NOT NULL,
  `bottom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `bottom`
--

INSERT INTO `bottom` (`id`, `bottom`) VALUES
(1, 'Copyright2024頁尾版權宣告ABC');

-- --------------------------------------------------------

--
-- 資料表結構 `goods`
--

CREATE TABLE `goods` (
  `id` int(10) UNSIGNED NOT NULL,
  `no` text NOT NULL,
  `img` text NOT NULL,
  `big` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` int(11) NOT NULL,
  `spec` text NOT NULL,
  `stock` int(11) NOT NULL,
  `intro` text NOT NULL,
  `sh` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `goods`
--

INSERT INTO `goods` (`id`, `no`, `img`, `big`, `mid`, `name`, `price`, `spec`, `stock`, `intro`, `sh`) VALUES
(10, '929432', '0403.jpg', 14, 15, '手工訂製長夾', 1200, '全牛皮', 2, '手工製作長夾卡片層6*2 鈔票層 *2 零錢拉鍊層 *1 \r\n採用愛馬仕相同的雙針縫法,皮件堅固耐用不脫線 \r\n材質:直革鞣(馬鞍皮)牛皮製作  \r\n手工染色 ', 1),
(11, '987489', '0404.jpg', 14, 15, '兩用式磁扣腰包', 685, '中型', 18, '材質:進口牛皮\r\n顏色:黑色荔枝紋+黑色珠光面皮(黑色縫線)\r\n尺寸:15cm*14cm(高)*6cm(前後)\r\n產地:臺', 1),
(12, '403400', '0405.jpg', 14, 15, '超薄設計男士長款真皮', 800, 'L號', 61, '基本:編織皮革對摺長款零錢包\r\n特色:最潮流最時尚的單品 \r\n顏色:黑色珠光面皮(黑色縫線)\r\n形狀:黑白格編織皮革對摺 ', 1),
(13, '788123', '0406.jpg', 17, 18, '經典牛皮少女帆船鞋', 1000, 'S號', 6, '以傳統學院派風格聞名，創始近百年工藝製鞋精神\r\n共用獨家專利氣墊技術，兼具紐約工藝精神，與舒適跑格靈魂\r\n', 1),
(14, '368465', '0407.jpg', 17, 19, '經典優雅時尚流行涼鞋', 2650, 'LL', 8, '優雅流線方型楦頭設計，結合簡潔線條綴飾，\r\n獨特的弧度與曲線美，突顯年輕優雅品味，\r\n是年輕上班族不可或缺的鞋款！\r\n全新美國運回，現貨附鞋盒', 1),
(15, '761975', '0408.jpg', 20, 22, '寵愛天然藍寶女戒', 28000, '1克拉', 1, '◎典雅設計品味款\r\n◎藍寶為珍貴天然寶石之一，具有保值收藏\r\n◎專人設計製造，以貴重珠寶精緻鑲工製造', 1),
(16, '182251', '0409.jpg', 23, 24, '反折式大容量手提肩背包', 888, 'L號', 15, '特色:反折式的包口設計,釘釦的裝飾,讓簡單的包型更增添趣味性\r\n材質:棉布\r\n顏色:藍色\r\n尺寸:長50cm寬20cm高41cm\r\n產地:日本\r\n', 1),
(20, '637127', '03B12.png', 20, 21, 'aaaaa', 155520, 'adfadf', 50, 'adfaf fwef wf', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `mem`
--

CREATE TABLE `mem` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc` text NOT NULL,
  `pw` text NOT NULL,
  `name` text NOT NULL,
  `tel` text NOT NULL,
  `addr` text NOT NULL,
  `email` text NOT NULL,
  `total` int(11) NOT NULL,
  `regdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `mem`
--

INSERT INTO `mem` (`id`, `acc`, `pw`, `name`, `tel`, `addr`, `email`, `total`, `regdate`) VALUES
(1, 'mem', '1234', 'memNameABCaa', 'memTelCaa', 'memAddrBaa', 'memEmailAaa', 63025, '2024-07-23'),
(10, 'mem01', 'mem01', 'mem01Name', 'mem01Tel', 'mem01Addr', 'mem01Email', 29200, '2024-10-20');

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `no` text NOT NULL,
  `acc` text NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `addr` text NOT NULL,
  `tel` text NOT NULL,
  `cart` text NOT NULL,
  `total` int(11) NOT NULL,
  `orderdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`id`, `no`, `acc`, `name`, `email`, `addr`, `tel`, `cart`, `total`, `orderdate`) VALUES
(4, '20241020371407', 'mem01', 'mem01Name', 'mem01Email', 'mem01Addr', 'mem01Tel', 'a:1:{i:10;s:1:\"3\";}', 3600, '2024-10-20'),
(5, '20241020155449', 'mem01', 'mem01Name', 'mem01Email', 'mem01Addr', 'mem01Tel', 'a:3:{i:11;s:1:\"1\";i:12;s:1:\"3\";i:15;s:1:\"1\";}', 31085, '2024-10-20'),
(6, '20241020992115', 'mem01', 'mem01Name', 'mem01Email', 'mem01Addr', 'mem01Tel', 'a:1:{i:10;s:1:\"1\";}', 1200, '2024-10-20'),
(7, '20241020986917', 'mem01', 'mem01Name', 'mem01Email', 'mem01Addr', 'mem01Tel', 'a:1:{i:15;s:1:\"1\";}', 28000, '2024-10-20');

-- --------------------------------------------------------

--
-- 資料表結構 `th`
--

CREATE TABLE `th` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `big_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `th`
--

INSERT INTO `th` (`id`, `name`, `big_id`) VALUES
(14, '  流行皮件ABC', 0),
(15, '男用皮件DEF', 14),
(16, '女用皮件', 14),
(17, '流行鞋區', 0),
(18, '少女鞋區', 17),
(19, '紳士流行鞋區', 17),
(20, '流行飾品', 0),
(21, '時尚手錶', 20),
(22, '時尚珠寶', 20),
(23, '背包', 0),
(25, '背包', 23),
(26, '測試1', 0),
(27, '測試1-1', 26);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `bottom`
--
ALTER TABLE `bottom`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `mem`
--
ALTER TABLE `mem`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `th`
--
ALTER TABLE `th`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `bottom`
--
ALTER TABLE `bottom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `mem`
--
ALTER TABLE `mem`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `th`
--
ALTER TABLE `th`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
