-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2024 年 1 月 05 日 03:06
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_kadai`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_ecproducts`
--

CREATE TABLE `gs_ecproducts` (
  `id` int(12) NOT NULL,
  `product_name` varchar(256) NOT NULL,
  `img_filename` varchar(256) DEFAULT NULL,
  `category` varchar(128) NOT NULL,
  `discription` varchar(256) NOT NULL,
  `price` int(50) NOT NULL,
  `url` varchar(256) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `gs_ecproducts`
--

INSERT INTO `gs_ecproducts` (`id`, `product_name`, `img_filename`, `category`, `discription`, `price`, `url`, `create_date`, `update_date`) VALUES
(1, 'メルカリのロゴ', 'メルカリ.jpg', 'その他', 'テスト', 100, 'xxxxx', '2023-12-26 14:29:12', '2024-01-05 01:28:31'),
(2, '醤油ラーメン', 'ramen.jpg', '食品', 'ラーメンの説明文をここで追加します。', 1100, 'https://tabelog.com/wakayama/A3002/A300202/30000653/', '2023-12-26 15:44:07', '2024-01-05 01:28:40'),
(3, 'LUSHの入浴剤', 'bathbom.jpg', 'コスメ・香水・美容', 'テストです', 600, 'https://my-best.com/7194', '2023-12-29 06:05:13', '2024-01-05 01:28:57'),
(4, 'みかん', 'みかん.jpg', '食品', 'みかんをアップロードします', 50, 'xxxxxxx', '2024-01-04 12:59:02', '2024-01-05 01:29:09'),
(5, 'おもち', 'おもち.jpg', '食品', '焼いたお餅ですが、これから冷凍します', 150, 'aaaaaa', '2024-01-04 13:00:59', '2024-01-05 01:29:16'),
(6, '山の風景', '山の風景.JPG', 'その他', '説明文です', 0, 'kkkkkkkk', '2024-01-04 13:12:06', '2024-01-05 01:29:31'),
(7, 'コップ', 'コップ.jpg', 'インテリア・住まい・小物', 'ピカチュウのコップです', 500, 'zzzzzzz', '2024-01-04 15:53:46', '2024-01-05 01:29:43');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_ecproducts`
--
ALTER TABLE `gs_ecproducts`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_ecproducts`
--
ALTER TABLE `gs_ecproducts`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
