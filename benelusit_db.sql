-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 24 Ağu 2022, 12:21:01
-- Sunucu sürümü: 10.5.17-MariaDB
-- PHP Sürümü: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `benelusit_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_group` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `last_login` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `password`, `admin_group`, `status`, `last_login`, `created_at`) VALUES
(4, 'Ege', 'Altundağ', 'egealtundag@gmail.com', '611a24ee3123d7e45458ea782dfacc292cd39b71ab57efc3d56c9de4dc51c30f47edea5e', 4, 1, '2022-05-09 02:25:13', '2022-05-09 02:25:13'),
(10, 'Volkan', 'Ador', 'volkanador@gmail.com', '8843028fefce50a6de50acdf064ded271f82ea75c5cc526729e2d581aeb3aeccfef4407e', 4, 1, '2022-08-22 01:31:30', '2022-08-22 01:31:30');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin_groups`
--

CREATE TABLE `admin_groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `group_auths` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `admin_groups`
--

INSERT INTO `admin_groups` (`id`, `group_name`, `group_auths`, `created_at`) VALUES
(4, 'ADMIN', '1,2,3,4,5,6,7,8,9,10,11', '2022-03-02 14:07:14');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `banka_bilgileri`
--

CREATE TABLE `banka_bilgileri` (
  `id` int(11) NOT NULL,
  `banka_adi` varchar(255) NOT NULL,
  `sube` varchar(255) NOT NULL,
  `iban` varchar(255) NOT NULL,
  `sahip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `banka_bilgileri`
--

INSERT INTO `banka_bilgileri` (`id`, `banka_adi`, `sube`, `iban`, `sahip`) VALUES
(1, 'ZIRAAT BANKASI', 'ANKARA', 'TR810001001683753476245004', 'TR810001001683753476245004');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(266) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `blog_cat` int(11) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_desc` text NOT NULL,
  `blog_cover` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `ask` varchar(255) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `game_desc` text NOT NULL,
  `game_platform` varchar(255) NOT NULL,
  `game_cover` varchar(255) NOT NULL,
  `game_categori` varchar(255) NOT NULL,
  `game_kind` varchar(255) NOT NULL,
  `game_official_web` varchar(255) NOT NULL,
  `game_url` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `games`
--

INSERT INTO `games` (`id`, `game_name`, `game_desc`, `game_platform`, `game_cover`, `game_categori`, `game_kind`, `game_official_web`, `game_url`, `created_at`) VALUES
(58, 'FIFA 22', 'Turnuvalar Ultimate Team (FUT) modunda düzenlenecek olup ilk üç oyuncu (takım) ödül kazanacaktır.,\nHer turnuvanın en iyi 3 golü Youtube hesabımızda açıklanacak ve bu üç gol sahipleri ekstra gem kazanacaklar,\nAyrıca her 10 turnuvada 1 kez olmak üzere toplanacak puanlarla birlikte oluşan listede ilk 10\'da bulunan kullanıcılar sıralarına göre ekstra gem kazanacaklar,\n\n', '8,12,13,14', '1650228009_2022-04-17.jpg', '14,15', '11', 'https://www.ea.com/games/fifa/fifa-22', 'https://benelusit.com/game.php?id=58', '2022-04-17 23:40:21'),
(59, 'PlayerUnknown\'s Battlegrounds', 'Turnuvanın hangi haritada oynanacağı turnuva sekmesinde belirtilecektir. Solo oyun modunda ilk 10\'a kalan oyuncular, Duo oyun modunda ilk 5\'e kalan takımlar ve Squad modunda ilk 3\'e kalan takımlar ödül kazanacaktır. Her turnuvanın en iyi 3 oyun anı Youtube kanalımızda paylaşılacak olup bu üç oyunu gerçekleştiren oyuncunun bakiyesine ekstra Gem yüklenecektir, Ayrıca her 10 turnuvada 1 kez olmak üzere toplanacak puanlarla birlikte oluşan listede ilk 10\'da bulunan kullanıcılar sıralarına göre ekstra gem kazanacaklar.', '8,12,13', '1650228828_2022-04-17.jpg', '19,20,21', '3,8', 'https://na.battlegrounds.pubg.com/', 'https://benelusit.com/game.php?id=59', '2022-04-17 23:53:49'),
(60, 'League of Legends', '1v1 turnuvalar Sonsuz Uçurum haritas?nda, 5v5 turnuvalar ise Sihirdar Vadisi haritas?nda oynanacakt?r. 1v1 turnuvalarda 100 minyon, ilk kule ya da ilk kan kurallar? geçerli olacak, sihirdar vadisinde ise nexusun dü?mesi maç? kazand?racakt?r.\n?ki turnuvada da ilk üç oyuncu ve ilk üç tak?m ödül kazanacakt?r. Her turnuva sonunda en iyi 3 oyun Youtube kanal?m?zdan yay?nlanacak ve bu en iyi hareketin sahibi oyuncu ya da tak?mlar ekstra Gem kazanacakt?r. Ayr?ca her 10 turnuvada 1 kez olmak üzere toplanacak puanlarla birlikte olu?an listede ilk 10\'da bulunan kullan?c?lar s?ralar?na göre ekstra gem kazanacaklar.', '8', '1650229200_2022-04-18.jpg', '14,18', '9', 'https://www.leagueoflegends.com/', 'https://benelusit.com/game.php?id=60', '2022-04-18 00:00:36'),
(61, 'Rocket League', 'Turnuvalarda cross-platforma izin verilecektir. Final harici tüm maçlar best of 1 iken final maç? best of 3 ?eklinde oynanacakt?r. ?lk üç s?raya giren kullan?c?lar ya da tak?mlar ödül kazanacakt?r.\nHer turnuvan?n en iyi 3 golü ve en iyi üç kurtar??? Youtube hesab?m?zdan aç?klanacak ve bu üç gol ve kurtar?? sahipleri ekstra gem kazanacaklard?r.\n', '8,12,13', '1650229573_2022-04-18.jpg', '14,15,16', '11', 'https://www.rocketleague.com/', 'https://benelusit.com/game.php?id=61', '2022-04-18 00:06:59'),
(62, 'Fall Guys', 'Bu oyunda cross-platforma izin verilecektir. Oyunu kazanan kullan?c? büyük ödülü kazan?rken final etab?na kalan kullan?c? say?s? 10\'dan az ise finale kalan her kullan?c?n?n kat?l?m ücretini iade edilecek, 10\'dan fazla ise kat?l?m ücretinin yar?s? iade edilecektir.', '8,12,13', '1650229868_2022-04-18.jpg', '21', '13', 'https://www.fallguys.com/en-US', 'https://benelusit.com/game.php?id=62', '2022-04-18 00:11:10'),
(63, 'Teamfight Tactics', '32 oyuncunun kat?ld??? TFT turnuvas?nda ilk lobilerinde ilk 2ye kalan oyuncular final lobisine kal?r. Bu lobiyi ilk 3 s?rada tamamlayan oyuncular ödülün sahibi olur. Final lobisinde herhangi bir 4 ya da 5 gold de?erindeki ?ampiyonu 3 level yapan kullan?c?lar ekstra gem kazan?r.', '8,15', '1650230350_2022-04-18.jpg', '21', '15', 'https://teamfighttactics.leagueoflegends.com/tr-tr/', 'https://benelusit.com/game.php?id=63', '2022-04-18 00:19:14'),
(64, 'Valorant', 'Valorant', '8', '1650230386_2022-04-18.jpg', '18', '3', 'https://playvalorant.com/tr-tr/', 'https://benelusit.com/game.php?id=64', '2022-04-18 00:19:49'),
(65, 'CS:GO', '16 olan tak?m?n bir üst tura geçece?i CS:GO turnuvas?nda ilk 3 tak?m ödül kazanacakt?r. Her turnuvan?n en iyi 3 hareketi Youtube hesab?m?zda aç?klanacak ve bu üç hareketin sahipleri ekstra gem kazanacaklard?r. Ayr?ca her 10 turnuvada 1 kez olmak üzere toplanacak puanlarla birlikte olu?an listede ilk 10\'da bulunan kullan?c?lar s?ralar?na göre ekstra gem kazanacaklar.', '8', '1650230539_2022-04-18.jpg', '18', '3', 'https://blog.counter-strike.net/', 'https://benelusit.com/game.php?id=65', '2022-04-18 00:22:23'),
(66, 'PlayerUnknown\'s Battlegrounds Mobile', 'Turnuvan?n hangi haritada oynanaca?? turnuva sekmesinde belirtilecektir. Solo oyun modunda ilk 10\'a kalan oyuncular, Duo oyun modunda ilk 5\'e kalan tak?mlar ve Squad modunda ilk 3\'e kalan tak?mlar ödül kazanacakt?r. Her turnuvan?n en iyi 3 oyun an? Youtube kanal?m?zda payla??lacak olup bu üç oyunu gerçekle?tiren oyuncunun bakiyesine ekstra Gem yüklenecektir. Ayr?ca her 10 turnuvada 1 kez olmak üzere toplanacak puanlarla birlikte olu?an listede ilk 10\'da bulunan kullan?c?lar s?ralar?na göre ekstra gem kazanacaklar.', '15', '1650230633_2022-04-18.jpg', '19,21,22', '3,8', 'https://www.pubgmobile.com/tr/home.shtml', 'https://benelusit.com/game.php?id=66', '2022-04-18 00:23:54'),
(67, 'Hearthstone', 'Güncel desteler ile oynanacak olan Hearthstone turnuvas?nda tüm oyunlar best of 3 ?eklinde oynanacakt?r. ?lk 3\'e kalan oyuncu ödül kazanacakt?r.', '8,15', '1650230724_2022-04-18.jpg', '21', '15', 'https://playhearthstone.com/en-us', 'https://benelusit.com/game.php?id=67', '2022-04-18 00:25:26'),
(68, 'Kafa Topu 2 ', 'Tüm maçlar best of 1 oynanacak olup ilk üç s?ray? kazanan oyuncular ödül kazanacakt?r.', '15', '1650230796_2022-04-18.jpg', '14', '11', '-', 'https://benelusit.com/game.php?id=68', '2022-04-18 00:26:37');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `game_categories`
--

CREATE TABLE `game_categories` (
  `id` int(11) NOT NULL,
  `categori_name` varchar(255) NOT NULL,
  `categori_desc` text DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `game_categories`
--

INSERT INTO `game_categories` (`id`, `categori_name`, `categori_desc`, `created_at`) VALUES
(14, '1v1', '', '2022-03-13 13:35:12'),
(15, '2v2', '', '2022-03-13 13:36:17'),
(16, '3v3', '', '2022-03-13 13:36:45'),
(17, '4v4', '', '2022-03-13 13:37:14'),
(18, '5v5', '', '2022-03-13 13:37:19'),
(19, 'Squad', '', '2022-03-13 13:39:56'),
(20, 'Duo', '', '2022-03-13 13:40:06'),
(21, 'Solo', '', '2022-03-13 13:41:07'),
(22, 'Team', '', '2022-03-13 13:42:52');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `game_gallery`
--

CREATE TABLE `game_gallery` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `pic_url` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `game_kinds`
--

CREATE TABLE `game_kinds` (
  `id` int(11) NOT NULL,
  `kind_name` varchar(255) NOT NULL,
  `kind_desc` text DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `game_kinds`
--

INSERT INTO `game_kinds` (`id`, `kind_name`, `kind_desc`, `created_at`) VALUES
(3, 'FPS', '', '2022-01-15 18:33:57'),
(4, 'MMO', '', '2022-01-15 18:34:03'),
(5, 'RPG', '', '2022-01-15 18:34:08'),
(6, 'MMORPG', '', '2022-01-15 18:34:14'),
(8, 'TPS', '', '2022-01-15 18:34:44'),
(9, 'MOBA', '', '2022-01-15 18:34:56'),
(10, 'OPEN WORLD', '', '2022-01-15 18:35:11'),
(11, 'SPOR', '', '2022-02-28 01:27:42'),
(12, 'PLATFORM', '', '2022-02-28 02:11:49'),
(13, 'BATTLE ROYALE', '', '2022-02-28 02:11:58'),
(15, 'SIRA TABANLI STRATEJI', '', '2022-03-13 13:34:41');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `game_maps`
--

CREATE TABLE `game_maps` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `map_name` varchar(255) NOT NULL,
  `map_cover` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `game_maps`
--

INSERT INTO `game_maps` (`id`, `game_id`, `map_name`, `map_cover`, `created_at`) VALUES
(32, 58, 'Standart', '1650230910_2022-04-18.jpg', '2022-04-18 00:28:31'),
(33, 61, 'Champion\'s Field', '1650230943_2022-04-18.jpg', '2022-04-18 00:29:05'),
(34, 59, 'Erangel', '1650230966_2022-04-18.png', '2022-04-18 00:29:33'),
(35, 59, 'Miramar', '1650230990_2022-04-18.png', '2022-04-18 00:32:05'),
(36, 59, 'Sanhok', '1650231136_2022-04-18.jpg', '2022-04-18 00:32:32'),
(37, 59, 'Vikendi', '1650231180_2022-04-18.jpg', '2022-04-18 00:33:01'),
(39, 66, 'Erangel', '1650231231_2022-04-18.png', '2022-04-18 00:33:52'),
(40, 66, 'Miramar', '1650231257_2022-04-18.png', '2022-04-18 00:34:21'),
(41, 66, 'Sanhok', '1650231310_2022-04-18.jpg', '2022-04-18 00:35:13'),
(42, 66, 'Vikendi', '1650231329_2022-04-18.jpg', '2022-04-18 00:35:34'),
(43, 63, 'Standart', '1650231467_2022-04-18.jpg', '2022-04-18 00:37:49'),
(44, 67, 'Standart', '1650231511_2022-04-18.png', '2022-04-18 00:38:32'),
(45, 60, 'Sihirdar Vadisi', '1650231538_2022-04-18.jpg', '2022-04-18 00:39:01'),
(46, 60, 'Sonsuz Uçurum', '1650231553_2022-04-18.jpg', '2022-04-18 00:39:18'),
(47, 62, 'Standart', '1650231614_2022-04-18.jpg', '2022-04-18 00:40:16'),
(48, 65, 'Dust 2', '1650231653_2022-04-18.png', '2022-04-18 00:40:55'),
(49, 68, 'Standart', '1650231736_2022-04-18.jpg', '2022-04-18 00:42:17'),
(50, 64, 'IceBox', '1650231760_2022-04-18.jpg', '2022-04-18 00:42:41');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `game_platforms`
--

CREATE TABLE `game_platforms` (
  `id` int(11) NOT NULL,
  `platform_name` varchar(255) NOT NULL,
  `platform_desc` text DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `game_platforms`
--

INSERT INTO `game_platforms` (`id`, `platform_name`, `platform_desc`, `created_at`) VALUES
(8, 'PC', NULL, '2022-03-13 13:43:38'),
(12, 'PLAYSTATION 4', NULL, '2022-03-13 13:44:31'),
(13, 'PLAYSTATION 5', NULL, '2022-03-13 13:44:42'),
(14, 'XBox', NULL, '2022-03-13 13:45:19'),
(15, 'Mobil', NULL, '2022-03-13 13:45:31');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gem_packages`
--

CREATE TABLE `gem_packages` (
  `id` int(11) NOT NULL,
  `gem_name` varchar(255) NOT NULL,
  `gem_adet` int(11) NOT NULL,
  `gem_fiyat` int(11) NOT NULL,
  `gem_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `gem_packages`
--

INSERT INTO `gem_packages` (`id`, `gem_name`, `gem_adet`, `gem_fiyat`, `gem_link`) VALUES
(9, '100 Gem', 100, 10, 'https://shopier.com/11505649'),
(10, '200 Gem', 200, 20, 'https://shopier.com/11505674'),
(11, '500 Gem', 500, 50, 'https://shopier.com/11505692'),
(12, '1000 Gem', 1000, 100, 'https://shopier.com/11505752');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odeme_bildirimi`
--

CREATE TABLE `odeme_bildirimi` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `paket` int(11) NOT NULL,
  `gonderen` varchar(255) NOT NULL,
  `tutar` varchar(255) NOT NULL,
  `tarih` varchar(255) NOT NULL,
  `saat` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `odeme_bildirimi`
--

INSERT INTO `odeme_bildirimi` (`id`, `user`, `paket`, `gonderen`, `tutar`, `tarih`, `saat`, `status`, `created_at`) VALUES
(1, 6, 1, 'Alihan Öztürk', '100', '10.10.10', '10:10', 0, '2022-02-27 00:00:00'),
(2, 6, 2, 'Alihan Öztürk', '100', '10.10.10', '10:10', 2, '2022-02-27 00:00:00'),
(3, 27, 2, 'ABC EFG', '100', '13/03/2022', '14.42', 2, '2022-03-13 14:41:12');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `seo_settings`
--

CREATE TABLE `seo_settings` (
  `id` int(11) NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `seo_desc` varchar(255) NOT NULL,
  `seo_tag` varchar(255) NOT NULL,
  `seo_lang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `seo_settings`
--

INSERT INTO `seo_settings` (`id`, `seo_title`, `seo_desc`, `seo_tag`, `seo_lang`) VALUES
(1, 'Benelusit', '', '', 'tr-TR');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `shop_basket`
--

CREATE TABLE `shop_basket` (
  `id` int(11) NOT NULL,
  `sessid` varchar(255) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `shop_basket`
--

INSERT INTO `shop_basket` (`id`, `sessid`, `urun_id`, `price`, `created_at`) VALUES
(9, '739e20rq347ob4adkj6pifstiq3232', 3, 250, '2022-02-26 14:30:52'),
(12, '739e20rq347ob4adkj6pifstiq123', 2, 200, '2022-02-26 14:31:14'),
(28, 'cvoqh4fh6843vptvj4l9uc6j13', 2, 200, '2022-02-27 23:11:28'),
(29, 'cvoqh4fh6843vptvj4l9uc6j13', 3, 250, '2022-02-27 23:13:02'),
(31, 'c67d619294c6e791c73fd98efd3b91ed', 6, 2147483647, '2022-02-28 21:03:05'),
(32, 'bf256047f2a6c036c8ca302a466d8bcf', 21, 190, '2022-03-01 22:56:16'),
(33, 'bf256047f2a6c036c8ca302a466d8bcf', 21, 190, '2022-03-01 22:56:17'),
(34, 'bf256047f2a6c036c8ca302a466d8bcf', 21, 190, '2022-03-01 22:56:18'),
(35, 'bf256047f2a6c036c8ca302a466d8bcf', 21, 190, '2022-03-01 22:56:19'),
(38, '8c1c26532b03866f68ec31d21882d612', 7, 310, '2022-03-03 00:29:32'),
(39, '4863bc837402c2757866a90b998970a7', 7, 310, '2022-03-06 13:18:41'),
(42, '53591a754844836d69b401f45c5aa16b', 7, 310, '2022-03-28 17:19:05'),
(44, '252944a1ec276b63d3062fb55e9b5d45', 7, 400, '2022-04-21 13:35:49'),
(45, '2352c20ee988b1bdc3a5aef300653ff9', 6, 200, '2022-04-21 15:33:30'),
(47, '3b51fdd038bab8f803b1df7fe1dd203b', 39, 9000, '2022-04-25 21:08:58'),
(55, 'e6d224d1dde1491dc3d694666c77e4de', 9, 870, '2022-05-10 13:06:35'),
(56, '7946a8294f6a269f4a8ea469951f310c', 9, 870, '2022-05-27 15:16:28'),
(58, '35b221ad8dfa4ff84a418867623ac1f5', 8, 650, '2022-06-13 10:30:15'),
(59, '9aa59fe03df6e833d906921d62c4836b', 16, 880, '2022-06-13 14:18:23'),
(60, '9aa59fe03df6e833d906921d62c4836b', 15, 500, '2022-06-13 14:18:26'),
(61, '9aa59fe03df6e833d906921d62c4836b', 15, 500, '2022-06-13 14:19:27'),
(62, '0d10a396ebce4107d58b608bdbdfb4e5', 6, 200, '2022-06-13 21:30:07'),
(63, '0d10a396ebce4107d58b608bdbdfb4e5', 7, 400, '2022-06-13 21:30:24'),
(64, 'fa2c229043dbf6f71184910d2bfce960', 7, 400, '2022-06-14 00:37:01'),
(65, 'fa2c229043dbf6f71184910d2bfce960', 8, 650, '2022-06-14 00:37:03'),
(66, '1723a27970c6e05e7d99f06c0653fe93', 7, 400, '2022-06-14 23:06:06'),
(67, 'bd4ca41db4fc252180a1eaa4bd823b88', 7, 400, '2022-08-06 17:03:01'),
(68, 'fd9703330ba5a6eb1dc741f992a1d07d', 7, 400, '2022-08-06 20:26:56');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `shop_categories`
--

CREATE TABLE `shop_categories` (
  `id` int(11) NOT NULL,
  `main_cat` int(11) NOT NULL DEFAULT 0,
  `cat_name` varchar(255) NOT NULL,
  `cat_desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `shop_categories`
--

INSERT INTO `shop_categories` (`id`, `main_cat`, `cat_name`, `cat_desc`) VALUES
(18, 0, 'ELEKTRONIK', ''),
(19, 18, 'OYUN KONSOLU', ''),
(20, 18, 'KULAKLIK', ''),
(21, 18, 'KLAVYE', ''),
(22, 18, 'MOUSE', ''),
(23, 18, 'FIFA POINTS', ''),
(24, 18, 'STEAM POINTS', ''),
(25, 18, 'RIOT POINTS TR', ''),
(26, 18, 'FIFA POINTS', ''),
(27, 18, 'OYUNCU KOLTUGU', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `shop_order`
--

CREATE TABLE `shop_order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_list` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `shop_order`
--

INSERT INTO `shop_order` (`id`, `user_id`, `order_list`, `status`, `created_at`) VALUES
(6, 33, '{\"urunler\":[\"7\"]}', 0, '2022-06-12 21:06:36');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `shop_product`
--

CREATE TABLE `shop_product` (
  `id` int(11) NOT NULL,
  `p_cat` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_desc` text NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `shop_product`
--

INSERT INTO `shop_product` (`id`, `p_cat`, `p_name`, `p_desc`, `p_price`, `p_pic`) VALUES
(6, 26, '250 FIFA POINTS ', 'PS4 & PS5 versiyonlari için geçerlidir.', 200, '1646155989_2022-03-01.jpg'),
(7, 26, '500 FIFA POINTS', 'PS4 & PS5 versiyonlari için geçerlidir.', 400, '1646156083_2022-03-01.jpg'),
(8, 26, '750 FIFA POINTS', 'PS4 & PS5 versiyonlari için geçerlidir.', 650, '1646156173_2022-03-01.jpg'),
(9, 23, '1050 FIFA POINTS', 'PS4 & PS5 versiyonlari için geçerlidir.', 870, '1646156212_2022-03-01.png'),
(10, 23, '1600 FIFA POINTS', 'PS4 & PS5 versiyonlari için geçerlidir.', 1300, '1646156270_2022-03-01.jpg'),
(11, 26, '2200 FIFA POINTS', 'PS4 & PS5 versiyonlari için geçerlidir.', 1700, '1646156304_2022-03-01.jpg'),
(12, 26, '4600 FIFA POINTS', 'PS4 & PS5 versiyonlari için geçerlidir.', 3500, '1646156321_2022-03-01.jpg'),
(13, 26, '12000 FIFA POINTS', 'PS4 & PS5 versiyonlari için geçerlidir.', 8500, '1646156343_2022-03-01.jpg'),
(14, 25, '400 RP', 'Türkiye sunucusu için geçerlidir.', 250, '1646162194_2022-03-01.jpg'),
(15, 25, '805 RP', 'Türkiye sunucusu için geçerlidir.', 500, '1646162261_2022-03-01.jpg'),
(16, 25, '1770 RP', 'Türkiye sunucusu için geçerlidir.', 880, '1646162381_2022-03-01.jpg'),
(17, 25, '3620 RP', 'Türkiye sunucusu için geçerlidir.', 1750, '1646162708_2022-03-01.jpg'),
(18, 25, '6450 RP', 'Türkiye sunucusu için geçerlidir.', 3250, '1646162443_2022-03-01.jpg'),
(19, 25, '9620 RP', 'Türkiye sunucusu için geçerlidir.', 4500, '1646162605_2022-03-01.jpg'),
(20, 25, '12800 RP', 'Türkiye sunucusu için geçerlidir.', 6700, '1646162650_2022-03-01.jpg'),
(21, 24, 'Steam 20 TL Cüzdan Kodu', 'Steam Cüzdan Kodu', 190, '1646164398_2022-03-01.jpg'),
(22, 24, 'Steam 50 TL Cüzdan Kodu', 'Steam Cüzdan Kodu', 490, '1646164483_2022-03-01.jpg'),
(23, 24, 'Steam 100 TL Cüzdan Kodu', 'Steam Cüzdan Kodu', 990, '1646164500_2022-03-01.jpg'),
(24, 24, 'Steam 200 TL Cüzdan Kodu', 'Steam Cüzdan Kodu', 1990, '1646164520_2022-03-01.jpg'),
(25, 21, 'MSI Vigor GK 20', 'MSI VIGOR GK20 RGB TÜRKÇE KLAVYE', 5100, '1646249019_2022-03-02.jpg'),
(26, 21, 'CORSAIR K68 Cherry MX Red', 'Corsair K68 Cherry MX Red Türkçe Mekanik Klavye', 11500, '1646249033_2022-03-02.jpg'),
(27, 21, 'ASUS ROG Claymore II ROG RX Red OPTICAL', 'ASUS ROG Claymore II ROG RX Red Optical Switch Türkçe RGB Mekanik Kablosuz Gaming Klavye', 45500, '1646249200_2022-03-02.jpg'),
(28, 21, 'Razer Ornata v2', 'Razer Ornata V2 Hibrid Mecha Membran Türkçe RGB Gaming Klavye', 14500, '1646249240_2022-03-02.jpg'),
(29, 21, 'Razer Blackwidow v3', 'Razer Blackwidow V3 Green Switch Türkçe RGB Mekanik Gaming Klavye', 11500, '1646249316_2022-03-02.jpg'),
(30, 21, 'Steelseries Apex 7', 'SteelSeries Apex 7 Türkçe RGB Mekanik Gaming Klavye', 29000, '1646249336_2022-03-02.jpg'),
(31, 21, 'ASUS ROG Strix Flare Cherry MX Red Switch', 'ASUS ROG STRIX Flare Cherry MX Red Switch Türkçe RGB Mekanik Gaming Klavye', 18000, '1646250045_2022-03-02.jpg'),
(32, 21, 'ASUS ROG Strix Scope RX', 'ASUS ROG STRIX Scope RX Türkçe Optik Mekanik Gaming Klavye', 21000, '1646250126_2022-03-02.jpg'),
(33, 21, 'ASUS TUF Gaming K7', 'ASUS TUF Gaming K7 Optik Türkçe RGB Mekanik Gaming Klavye', 21000, '1646250154_2022-03-02.jpg'),
(34, 21, 'ASUS TUF Gaming RA04 K1', 'ASUS TUF GAMING RA04 K1 Mekanik Hisli Türkçe RGB Gaming Klavye', 8900, '1646250177_2022-03-02.jpg'),
(35, 21, 'Logitech G G512 GX Blue Switch', 'Logitech G G512 GX Blue Switch Türkçe Siyah Mekanik Gaming Klavye', 20200, '1646250208_2022-03-02.jpg'),
(36, 21, 'Logitech G213', 'Logitech G213 Türkçe RGB Gaming Klavye', 8000, '1646250242_2022-03-02.jpg'),
(37, 21, 'Apple Magic Keyboard ', 'Say?sal Tu? Tak?ml? Magic Keyboard - Türkçe Q Klavye - Gümü? Rengi', 17000, '1646250996_2022-03-02.jpg'),
(38, 22, 'Logitech G G102 Siyah RGB ', 'Logitech G G102 Siyah RGB Gaming Mouse', 3200, '1646252350_2022-03-02.jpg'),
(39, 22, 'Steelseries Rival 650 RGB Wireless', 'Steelseries Rival 650 RGB Kablosuz Gaming Mouse', 9000, '1646252383_2022-03-02.jpg'),
(40, 22, 'Steelseries Rival 600 RGB', 'Steelseries Rival 600 RGB Gaming Mouse', 5900, '1646252413_2022-03-02.jpg'),
(41, 22, 'Razer Basilisk v3 RGB Siyah ', 'Razer Basilisk V3 RGB Siyah Kablolu Gaming Mouse', 10500, '1646252441_2022-03-02.jpg'),
(42, 22, 'ASUS ROG Chakram Core RGB ', 'ASUS ROG CHAKRAM CORE RGB Gaming Mouse', 14500, '1646252464_2022-03-02.jpg'),
(43, 22, 'ASUS ROG Strix Impact II ', 'ASUS ROG STRIX ?mpact II Gaming Mouse', 7000, '1646252482_2022-03-02.jpg'),
(44, 22, 'Steelseries Aerox 3 RGB ', 'SteelSeries Aerox 3 RGB ', 5000, '1646252508_2022-03-02.jpg'),
(45, 22, 'Steelseries Aerox 3 RGB', 'SteelSeries Aerox 3 RGB Gaming Mouse', 4000, '1646252529_2022-03-02.jpg'),
(46, 22, 'Steelseries Rival 3 RGB ', 'Steelseries Rival 3 RGB Gaming Mouse', 3000, '1646252577_2022-03-02.jpg'),
(47, 22, 'ASUS ROG Pugio II RGB Wireless', 'ASUS ROG Pugio II RGB Kablosuz Gaming Mouse', 10000, '1646252596_2022-03-02.jpg'),
(48, 22, 'Razer Viper Mini RGB ', 'Razer Viper Mini RGB Gaming Mouse', 2000, '1646252619_2022-03-02.jpg'),
(49, 20, 'Apple Airpods (3. Nesil)', 'Apple Airpods (3. Nesil)', 27000, '1646254431_2022-03-02.jpg'),
(50, 20, 'Apple Airpods (2.Nesil)', 'Apple AirPods ve Sarj Kutusu (2.Nesil)', 20000, '1646254523_2022-03-02.jpg'),
(51, 20, 'Apple Airpods Max', 'Apple AirPods Max (Renk Seçenekleri Mevcut)', 90000, '1646254543_2022-03-02.jpg'),
(52, 20, 'Steelseries Arctis 1 Kablolu ', 'SteelSeries Arctis 1 Kablolu Siyah Oyuncu Kulakl???', 5000, '1646254638_2022-03-02.jpg'),
(53, 20, 'Steelseries Arctis 5 RGB 7.1 Surround', 'Steelseries Arctis 5 RGB 7.1 Surround', 16500, '1646254656_2022-03-02.jpg'),
(54, 20, 'Steelseries Arctis 9  Bluetooth ', 'SteelSeries Arctis 9 PC Kablosuz Bluetooth Siyah Oyuncu Kulakl???', 32000, '1646290811_2022-03-03.jpg'),
(55, 20, 'Razer BlackShark V2 X', 'Razer BlackShark V2 X', 4500, '1646254735_2022-03-02.jpg'),
(56, 20, 'MSI Immerse GH 20 ', 'MSI IMMERSE GH20 Siyah Mikrofonlu Gaming Kulakl?k', 7000, '1646254769_2022-03-02.jpg'),
(57, 20, 'Razer Kraken X Lite', 'Razer Kraken X Lite', 4000, '1646254788_2022-03-02.jpg'),
(58, 20, 'Steelseries Arctis Prime Stereo', 'SteelSeries Arctis Prime Stereo', 14000, '1646254819_2022-03-03.jpg'),
(59, 20, 'ASUS ROG Delta RGB 7.1 HI-RES', 'ASUS ROG Delta RGB 7.1 Hi-Res Oyuncu Kulakl???', 32000, '1646254929_2022-03-03.jpg'),
(60, 20, 'ASUS ROG Strix Fusion Wireless', 'ASUS ROG Strix Fusion Wireless Oyuncu Kulakl???', 20000, '1646254985_2022-03-03.jpg'),
(61, 27, 'MSI MAG CH130', 'MSI MAG CH130 I FABRIC Gri/Siyah Oyuncu Koltu?u', 46500, '1646326815_2022-03-03.jpg'),
(62, 27, 'MSI MAG CH120 X', 'MSI MAG CH120 X Siyah/K?rm?z? Oyuncu Koltu?u', 55000, '1646326867_2022-03-03.jpg'),
(63, 27, 'Razer Iskur X', 'Razer Iskur X Siyah/Ye?il Oyuncu Koltu?u', 30000, '1646326948_2022-03-03.jpg'),
(64, 27, 'Razer Enki X', 'Razer Enki X Siyah/Ye?il Oyuncu Koltu?u', 63000, '1646327075_2022-03-03.jpg'),
(65, 27, 'Rampage KL-R47', 'Rampage KL-R47 Camuflage Serisi', 28000, '1646327189_2022-03-03.jpg'),
(66, 27, 'Rampage KL-R25 Crown', 'Rampage KL-R25 Crown Serisi', 39000, '1646327254_2022-03-03.jpg'),
(67, 27, 'ASUS ROG Chariot RGB', 'ASUS ROG Chariot RGB Siyah Oyuncu Koltu?u', 128000, '1646327327_2022-03-03.jpg'),
(68, 27, 'ASUS ROG Chariot Core', 'ASUS ROG Chariot Core Siyah Oyuncu Koltu?u', 109000, '1646327350_2022-03-03.jpg'),
(69, 19, 'Playstation 5 825 GB', 'Playstation 5 825 GB Türkçe Menü', 150000, '1646388174_2022-03-04.jpg'),
(70, 19, 'Playstation 4 Slim 1 TB', 'Playstation 4 Slim 1 TB Türkçe Menü', 60000, '1646388259_2022-03-04.jpg'),
(71, 19, 'Microsoft Xbox Series S 512GB', 'MICROSOFT Xbox Series S 512GB', 63000, '1646388303_2022-03-04.jpg'),
(72, 19, 'Microsoft Xbox Series X', 'MICROSOFT Xbox Series X', 125000, '1646388360_2022-03-04.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `shop_settings`
--

CREATE TABLE `shop_settings` (
  `id` int(11) NOT NULL,
  `min_shop_price` int(11) NOT NULL,
  `min_shop_number` int(11) NOT NULL,
  `login_required` int(11) NOT NULL,
  `tournament_required` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `shop_settings`
--

INSERT INTO `shop_settings` (`id`, `min_shop_price`, `min_shop_number`, `login_required`, `tournament_required`) VALUES
(1, 100, 3, 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `team_captain` int(11) NOT NULL,
  `team_logo` varchar(255) DEFAULT NULL,
  `team_mascot` varchar(255) DEFAULT NULL,
  `team_tag` varchar(255) NOT NULL,
  `team_slogan` varchar(255) NOT NULL,
  `team_desc` text DEFAULT NULL,
  `team_point` int(11) NOT NULL DEFAULT 0,
  `team_status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `teams`
--

INSERT INTO `teams` (`id`, `team_name`, `team_captain`, `team_logo`, `team_mascot`, `team_tag`, `team_slogan`, `team_desc`, `team_point`, `team_status`, `created_at`) VALUES
(9, 'ABC', 33, NULL, NULL, 'ABC', 'ABC', NULL, 0, 1, '2022-06-12 22:33:59'),
(10, '123123123', 38, NULL, NULL, '[123123]', '1ler2ler3ler', NULL, 0, 1, '2022-06-14 01:01:13'),
(11, 'denemne', 39, NULL, NULL, 'DENEME', '1ler2ler3ler', NULL, 0, 1, '2022-07-08 01:26:46');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `team_applications`
--

CREATE TABLE `team_applications` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `team_applications`
--

INSERT INTO `team_applications` (`id`, `team_id`, `user_id`, `status`, `created_at`) VALUES
(7, 10, 38, 1, '2022-06-14 01:01:40'),
(8, 9, 41, 1, '2022-08-07 14:17:36');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `team_members`
--

CREATE TABLE `team_members` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_position` int(11) NOT NULL,
  `user_inviting` int(11) NOT NULL,
  `membership_status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `team_members`
--

INSERT INTO `team_members` (`id`, `team_id`, `user_id`, `user_position`, `user_inviting`, `membership_status`, `created_at`) VALUES
(6, 9, 33, 1, 33, 2, '2022-06-12 22:33:59'),
(9, 11, 39, 1, 39, 2, '2022-07-08 01:26:46');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `team_positions`
--

CREATE TABLE `team_positions` (
  `id` int(11) NOT NULL,
  `position_name` varchar(255) NOT NULL,
  `position_auth` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `team_positions`
--

INSERT INTO `team_positions` (`id`, `position_name`, `position_auth`) VALUES
(1, 'Lider', '1,2,3'),
(2, 'Yardımcı Lider', '1,2,3'),
(3, 'Üye', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `team_ranks`
--

CREATE TABLE `team_ranks` (
  `id` int(11) NOT NULL,
  `rank_name` varchar(255) NOT NULL,
  `rank_picture` varchar(255) NOT NULL,
  `rank_point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `team_ranks`
--

INSERT INTO `team_ranks` (`id`, `rank_name`, `rank_picture`, `rank_point`) VALUES
(2, 'Level 1', '1648552914_2022-03-29.png', 10),
(3, 'Level 2', '1648552928_2022-03-29.png', 300),
(4, 'Level 3', '1648552943_2022-03-29.png', 1000),
(5, 'Level 4', '1648552958_2022-03-29.png', 2000),
(6, 'Level 5', '1648552986_2022-03-29.png', 3000);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `departman` int(11) NOT NULL,
  `konu` varchar(255) NOT NULL,
  `aciliyet` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ticket_chat`
--

CREATE TABLE `ticket_chat` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tournaments`
--

CREATE TABLE `tournaments` (
  `id` int(11) NOT NULL,
  `tournament_name` varchar(255) NOT NULL,
  `tournament_desc` text NOT NULL,
  `tournament_game` int(11) NOT NULL,
  `tournament_type` int(11) NOT NULL,
  `tournament_match_type` int(11) NOT NULL,
  `tournament_participants` int(11) NOT NULL,
  `tournament_tour` int(11) NOT NULL,
  `current_tour` int(11) NOT NULL DEFAULT 1,
  `tournament_pay` int(11) NOT NULL,
  `tournament_winner_number` int(11) NOT NULL,
  `tournament_reg_date` date NOT NULL,
  `tournament_start_date` date NOT NULL,
  `tournament_start_time` time NOT NULL,
  `tournament_map` int(11) NOT NULL,
  `rules` varchar(255) NOT NULL,
  `rewards` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 2 COMMENT '1 açık - 2 başlatma bekliyor - 3 başlatıldı (oynanıyor) - 4 tamamlandı (kazanan bekliyor) - 5 tamamlandı (bitti)',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tournaments`
--

INSERT INTO `tournaments` (`id`, `tournament_name`, `tournament_desc`, `tournament_game`, `tournament_type`, `tournament_match_type`, `tournament_participants`, `tournament_tour`, `current_tour`, `tournament_pay`, `tournament_winner_number`, `tournament_reg_date`, `tournament_start_date`, `tournament_start_time`, `tournament_map`, `rules`, `rewards`, `status`, `created_at`) VALUES
(40, 'Rocket League 1v1', '1V1 Roket', 61, 1, 2, 64, 6, 6, 100, 1, '2022-06-12', '2022-06-13', '15:00:00', 33, 'abc', 'abbbc', 6, '2022-06-12 21:02:41'),
(41, 'Deneme ABC', 'Deneme', 58, 1, 2, 64, 6, 1, 100, 1, '2022-06-14', '2022-06-20', '20:00:00', 32, 'Kural deneme', 'Ödül Deneme', 4, '2022-06-14 01:11:27');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tournament_recourses`
--

CREATE TABLE `tournament_recourses` (
  `id` int(11) NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tournament_recourses`
--

INSERT INTO `tournament_recourses` (`id`, `tournament_id`, `user_id`, `status`, `created_at`) VALUES
(62, 40, 36, 2, '2022-06-12 00:00:00'),
(63, 40, 37, 2, '2022-06-12 00:00:00'),
(64, 41, 33, 1, '2022-06-14 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tournament_rewards`
--

CREATE TABLE `tournament_rewards` (
  `id` int(11) NOT NULL,
  `reward_name` varchar(255) NOT NULL,
  `reward_desc` text NOT NULL,
  `reward_pic` varchar(255) NOT NULL,
  `reward_code` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tournament_rules`
--

CREATE TABLE `tournament_rules` (
  `id` int(11) NOT NULL,
  `rule_name` varchar(255) NOT NULL,
  `rule_desc` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tournament_tours`
--

CREATE TABLE `tournament_tours` (
  `id` int(11) NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `tournament_tour` int(11) NOT NULL,
  `tournament_current_tour` int(11) NOT NULL DEFAULT 1,
  `tournament_winner` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tour_no` int(11) NOT NULL,
  `gamer_no` int(11) NOT NULL,
  `team_no` int(11) NOT NULL,
  `tour_match` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tournament_tours`
--

INSERT INTO `tournament_tours` (`id`, `tournament_id`, `tournament_tour`, `tournament_current_tour`, `tournament_winner`, `user_id`, `tour_no`, `gamer_no`, `team_no`, `tour_match`, `status`, `created_at`) VALUES
(29, 40, 6, 1, 0, 36, 0, 0, 0, '', 0, '0000-00-00 00:00:00'),
(30, 40, 6, 1, 0, 37, 0, 0, 0, '', 0, '0000-00-00 00:00:00'),
(31, 40, 6, 1, 0, 36, 0, 0, 0, '', 0, '0000-00-00 00:00:00'),
(32, 40, 6, 1, 0, 37, 0, 0, 0, '', 0, '0000-00-00 00:00:00'),
(33, 40, 6, 2, 0, 37, 0, 0, 0, '', 0, '0000-00-00 00:00:00'),
(34, 40, 6, 3, 0, 36, 0, 0, 0, '', 0, '0000-00-00 00:00:00'),
(35, 40, 6, 4, 0, 36, 0, 0, 0, '', 0, '0000-00-00 00:00:00'),
(36, 40, 6, 5, 0, 36, 0, 0, 0, '', 0, '0000-00-00 00:00:00'),
(37, 40, 6, 6, 0, 37, 0, 0, 0, '', 0, '0000-00-00 00:00:00'),
(38, 40, 7, 7, 1, 37, 0, 0, 0, '', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tournament_user_list`
--

CREATE TABLE `tournament_user_list` (
  `id` int(11) NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `user_list` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tournament_user_list`
--

INSERT INTO `tournament_user_list` (`id`, `tournament_id`, `user_list`) VALUES
(9, 15, '27'),
(10, 16, '27'),
(11, 20, '29,29,29,29,29,29,29,29'),
(12, 28, '27'),
(13, 29, '30,27'),
(16, 40, '36,37');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_birthdate` date DEFAULT NULL,
  `user_phone` varchar(255) DEFAULT NULL,
  `user_country` varchar(255) DEFAULT NULL,
  `user_city` varchar(255) DEFAULT NULL,
  `user_rank` int(11) DEFAULT NULL,
  `user_point` int(11) NOT NULL,
  `user_gem` int(11) NOT NULL,
  `user_status` int(11) NOT NULL,
  `user_token` varchar(255) NOT NULL,
  `user_key` varchar(255) NOT NULL,
  `email_verify` int(11) DEFAULT 1,
  `phone_verify` int(11) DEFAULT 0,
  `steam` varchar(255) NOT NULL,
  `playstation` varchar(255) NOT NULL,
  `shop_permission` int(11) NOT NULL,
  `tournament_num` int(11) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `user_firstname`, `user_lastname`, `user_birthdate`, `user_phone`, `user_country`, `user_city`, `user_rank`, `user_point`, `user_gem`, `user_status`, `user_token`, `user_key`, `email_verify`, `phone_verify`, `steam`, `playstation`, `shop_permission`, `tournament_num`, `last_login`, `created_at`) VALUES
(32, 'Test2', 'test2@test2.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Test2', 'Test2', '1994-01-01', '5355353535', 'Türkiye', 'İstanbul', NULL, 9999, 9999, 2, 'c454552d52d55d3ef56408742887362b', '81dc9bdb52d04dc20036dbd8313ed055', 1, 0, 'Test2', 'Test2', 0, 0, NULL, '2022-05-08 22:26:00'),
(33, 'ealtundag', 'egealtundag@gmail.com', '91d4d7740f64a4889b8e064672d429ae', 'Ege', 'Altundağ', '1997-08-14', '5343238893', 'Türkiye', 'Ankara', NULL, 0, 0, 2, '7fff821a291323b25e90074ff4d618ca', '91d4d7740f64a4889b8e064672d429ae', 1, 0, 'ealtundag1', 'ALCHSafari', 1, 2, NULL, '2022-05-09 02:28:05'),
(34, 'deneme', 'deneme@gmail.com', '91d4d7740f64a4889b8e064672d429ae', 'deneme1', 'deneme2', '1997-02-14', '0123456789', 'Türkiye', 'ankara', NULL, 0, 0, 2, '8f10d078b2799206cfe914b32cc6a5e9', '91d4d7740f64a4889b8e064672d429ae', 1, 0, 'abc', 'abc', 0, 2, NULL, '2022-05-09 23:40:00'),
(36, 'Test', 'test@test.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Test', 'Test', '1994-01-01', '5355555554', 'Türkiye', 'İstanbul', NULL, 999, 899, 2, '0cbc6611f5540bd0809a388dc95a615b', '81dc9bdb52d04dc20036dbd8313ed055', 1, 0, 'hophop20', 'hophop20', 0, 1, NULL, '2022-06-12 21:49:42'),
(37, 'abcdef', 'ababa@gmail.com', '91d4d7740f64a4889b8e064672d429ae', 'abc', 'eefef', '1997-05-10', '5355353535', 'çankaya', 'ankara', NULL, 0, 400, 2, 'e80b5017098950fc58aad83c8c14978e', '91d4d7740f64a4889b8e064672d429ae', 1, 0, 'abcefg', 'abdgagaa', 0, 1, NULL, '2022-06-12 23:03:27'),
(38, '123123', 'ef.doga@gmail.com', '4297f44b13955235245b2497399d7a93', 'Eflatun', 'Aydın', '1993-11-08', '1231231231', 'Türkiye', 'Ankara', NULL, 0, 100, 2, '4297f44b13955235245b2497399d7a93', '4297f44b13955235245b2497399d7a93', 1, 0, 'scff', '', 0, 0, NULL, '2022-06-14 00:37:12'),
(39, '123', 'im.natur3@gmail.com', '202cb962ac59075b964b07152d234b70', 'Eflatun', 'Aydın', '2022-07-08', '5351072311', 'Turkey', 'Ankara', NULL, 0, 0, 2, '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', 1, 0, 'scff', '', 0, 0, NULL, '2022-07-08 01:21:33'),
(40, 'efef', 'ef.doga11@gmail.com', '5c65892744ee1d7dcbffd02159ccbd06', 'Eflatun', 'Aydın', NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '81b480ac3b458cf7c6aa88552ebeb0a0', '5c65892744ee1d7dcbffd02159ccbd06', 1, 0, '', '', 0, 0, NULL, '2022-07-17 17:26:20'),
(41, 'testtest', 'testtest@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Test', 'Test', NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '05a671c66aefea124cc08b76ea6d30bb', '25d55ad283aa400af464c76d713c07ad', 1, 0, '', '', 0, 0, NULL, '2022-08-01 15:40:52'),
(42, 'volkan', 'volkanozer@gmail.com', 'ed2b1f468c5f915f3f1cf75d7068baae', '<script>alert(\"selam\");</script>', 'özer', NULL, NULL, NULL, NULL, NULL, 0, 0, 2, '544936f56df1cb0f4864148e5b13f240', 'ed2b1f468c5f915f3f1cf75d7068baae', 1, 0, '', '', 0, 0, NULL, '2022-08-22 01:29:47');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_ranks`
--

CREATE TABLE `user_ranks` (
  `id` int(11) NOT NULL,
  `level` int(11) DEFAULT NULL,
  `rank_name` varchar(255) NOT NULL,
  `rank_picture` varchar(255) NOT NULL,
  `rank_point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `user_ranks`
--

INSERT INTO `user_ranks` (`id`, `level`, `rank_name`, `rank_picture`, `rank_point`) VALUES
(3, 1, 'Level 1', '1648406667_2022-03-27.png', 10),
(4, 2, 'Level 2', '1648406703_2022-03-27.png', 300),
(5, 3, 'Level 3', '1648406739_2022-03-27.png', 1000),
(6, 4, 'Level 4', '1648406756_2022-03-27.png', 2000),
(7, 5, 'Level 5', '1648552973_2022-03-29.png', 3000);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_settings`
--

CREATE TABLE `user_settings` (
  `id` int(11) NOT NULL,
  `user_login_permission` int(11) NOT NULL,
  `user_register_permission` int(11) NOT NULL,
  `user_starting_point` int(11) NOT NULL,
  `user_starting_gem` int(11) NOT NULL,
  `max_incorrect_login` int(11) NOT NULL,
  `points_earned_per_tournament` int(11) NOT NULL,
  `points_earned_per_tour` int(11) NOT NULL,
  `gem_earned_per_tournament` int(11) NOT NULL,
  `gem_earned_per_tour` int(11) NOT NULL,
  `max_faul_suspend` int(11) NOT NULL,
  `max_faul_banned` int(11) NOT NULL,
  `force_tc_entry` int(11) NOT NULL,
  `force_phone_entry` int(11) NOT NULL,
  `force_email_entry` int(11) NOT NULL,
  `force_birthday_entry` int(11) NOT NULL,
  `force_email_verify` int(11) NOT NULL,
  `force_phone_verify` int(11) NOT NULL,
  `min_age_register` int(11) NOT NULL,
  `min_age_join_torunaments` int(11) NOT NULL,
  `max_age_register` int(11) NOT NULL,
  `max_age_join_tournament` int(11) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `user_settings`
--

INSERT INTO `user_settings` (`id`, `user_login_permission`, `user_register_permission`, `user_starting_point`, `user_starting_gem`, `max_incorrect_login`, `points_earned_per_tournament`, `points_earned_per_tour`, `gem_earned_per_tournament`, `gem_earned_per_tour`, `max_faul_suspend`, `max_faul_banned`, `force_tc_entry`, `force_phone_entry`, `force_email_entry`, `force_birthday_entry`, `force_email_verify`, `force_phone_verify`, `min_age_register`, `min_age_join_torunaments`, `max_age_register`, `max_age_join_tournament`, `last_update`) VALUES
(1, 1, 1, 0, 0, 5, 100, 50, 10, 0, 5, 15, 0, 1, 1, 1, 1, 0, 15, 15, 100, 100, '2022-05-12 18:14:54');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `admin_groups`
--
ALTER TABLE `admin_groups`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `banka_bilgileri`
--
ALTER TABLE `banka_bilgileri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `game_categories`
--
ALTER TABLE `game_categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `game_gallery`
--
ALTER TABLE `game_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `game_kinds`
--
ALTER TABLE `game_kinds`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `game_maps`
--
ALTER TABLE `game_maps`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `game_platforms`
--
ALTER TABLE `game_platforms`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gem_packages`
--
ALTER TABLE `gem_packages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `odeme_bildirimi`
--
ALTER TABLE `odeme_bildirimi`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `seo_settings`
--
ALTER TABLE `seo_settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `shop_basket`
--
ALTER TABLE `shop_basket`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `shop_categories`
--
ALTER TABLE `shop_categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `shop_order`
--
ALTER TABLE `shop_order`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `shop_product`
--
ALTER TABLE `shop_product`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `shop_settings`
--
ALTER TABLE `shop_settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `team_applications`
--
ALTER TABLE `team_applications`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `team_positions`
--
ALTER TABLE `team_positions`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `team_ranks`
--
ALTER TABLE `team_ranks`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ticket_chat`
--
ALTER TABLE `ticket_chat`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tournament_recourses`
--
ALTER TABLE `tournament_recourses`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tournament_rewards`
--
ALTER TABLE `tournament_rewards`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tournament_rules`
--
ALTER TABLE `tournament_rules`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tournament_tours`
--
ALTER TABLE `tournament_tours`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tournament_user_list`
--
ALTER TABLE `tournament_user_list`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user_ranks`
--
ALTER TABLE `user_ranks`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user_settings`
--
ALTER TABLE `user_settings`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `admin_groups`
--
ALTER TABLE `admin_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Tablo için AUTO_INCREMENT değeri `game_categories`
--
ALTER TABLE `game_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tablo için AUTO_INCREMENT değeri `game_gallery`
--
ALTER TABLE `game_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `game_kinds`
--
ALTER TABLE `game_kinds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `game_maps`
--
ALTER TABLE `game_maps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Tablo için AUTO_INCREMENT değeri `game_platforms`
--
ALTER TABLE `game_platforms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `gem_packages`
--
ALTER TABLE `gem_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `odeme_bildirimi`
--
ALTER TABLE `odeme_bildirimi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `shop_basket`
--
ALTER TABLE `shop_basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Tablo için AUTO_INCREMENT değeri `shop_categories`
--
ALTER TABLE `shop_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Tablo için AUTO_INCREMENT değeri `shop_order`
--
ALTER TABLE `shop_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `shop_product`
--
ALTER TABLE `shop_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Tablo için AUTO_INCREMENT değeri `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `team_applications`
--
ALTER TABLE `team_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `team_positions`
--
ALTER TABLE `team_positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `team_ranks`
--
ALTER TABLE `team_ranks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `ticket_chat`
--
ALTER TABLE `ticket_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Tablo için AUTO_INCREMENT değeri `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Tablo için AUTO_INCREMENT değeri `tournament_recourses`
--
ALTER TABLE `tournament_recourses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Tablo için AUTO_INCREMENT değeri `tournament_rewards`
--
ALTER TABLE `tournament_rewards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `tournament_rules`
--
ALTER TABLE `tournament_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `tournament_tours`
--
ALTER TABLE `tournament_tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Tablo için AUTO_INCREMENT değeri `tournament_user_list`
--
ALTER TABLE `tournament_user_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Tablo için AUTO_INCREMENT değeri `user_ranks`
--
ALTER TABLE `user_ranks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
