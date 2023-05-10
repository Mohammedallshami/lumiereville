-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10 مايو 2023 الساعة 23:11
-- إصدار الخادم: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lumiere_ville_db-1`
--

-- --------------------------------------------------------

--
-- بنية الجدول `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `proId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `imageURL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `cart`
--

INSERT INTO `cart` (`cartId`, `userId`, `proId`, `name`, `price`, `quantity`, `imageURL`) VALUES
(76, 1, 195, 'Oud Normal', 1.6, 1, ''),
(77, 1, 269, 'Full Moon', 20, 1, 'Full Moon.png'),
(78, 1, 60, 'Bakhoor oud al qamari ', 12, 1, 'IMG-20230507-WA0079.jpg');

-- --------------------------------------------------------

--
-- بنية الجدول `catégories`
--

CREATE TABLE `catégories` (
  `catId` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `catégories`
--

INSERT INTO `catégories` (`catId`, `nom`) VALUES
(1, 'Gamis'),
(2, 'parfums'),
(3, 'Encens'),
(4, 'Oud'),
(5, 'Abaya'),
(6, 'Hijab'),
(7, 'perfume for the air'),
(8, 'Tapis de priere '),
(9, 'Echarpe'),
(10, 'Incense Burner  '),
(11, 'Musk'),
(12, 'mshlh'),
(13, 'briquet '),
(14, 'Porte monnaie'),
(15, 'livre'),
(16, 'Accessoires'),
(18, 'Henna '),
(19, 'bonnet pour homme'),
(20, 'Autres'),
(21, 'veilleuse'),
(22, 'Chapelet'),
(23, 'Qur\'an'),
(24, 'Bukhoor Système'),
(25, 'Savon'),
(26, 'Pure essential oil'),
(27, 'Brûleur Encens'),
(28, 'Kamis'),
(29, 'Coffret Cadeau'),
(30, 'Thobe Emarati'),
(31, 'Bukhour ');

-- --------------------------------------------------------

--
-- بنية الجدول `codebarres`
--

CREATE TABLE `codebarres` (
  `proId` int(11) NOT NULL,
  `codeBarres` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `codebarres`
--

INSERT INTO `codebarres` (`proId`, `codeBarres`) VALUES
(53, '6299122512117'),
(57, '6299122512308'),
(49, '6299122512322'),
(59, '6299122512100'),
(45, '6299122512483'),
(48, '6299122512339'),
(58, '6299122512469'),
(54, '6299122512063'),
(44, '6299122512391'),
(50, '6299122512438'),
(43, '6299122512384'),
(41, '6559122513553'),
(55, '6559122513614'),
(47, '6299122512056'),
(52, '6299122512377'),
(46, '6299122512087'),
(104, '6559122514987'),
(51, '6299122512452'),
(42, '6299122512346'),
(63, '3683080419732'),
(67, '3683080419749'),
(66, '3683080419725'),
(64, '3683080419756'),
(62, '3683080419695'),
(68, '3683080419701'),
(105, '6290102011897'),
(106, '6290102011903'),
(107, '6290102011958'),
(108, '6290102011965'),
(109, '6290102011835'),
(110, '6290102011811'),
(111, '6290102011842'),
(112, '6290102011880'),
(113, '6290102011828'),
(114, '6290102011934'),
(115, '6290102011927'),
(116, '6290102011859'),
(117, '6290102011866'),
(118, '6290102011910'),
(119, '6290102011873'),
(120, '6300020155723'),
(122, '6300020155761'),
(121, '6300020155730'),
(123, '6290102019312'),
(124, '6290102019329'),
(125, '6300020155822'),
(126, '6290102019305'),
(127, '6390902033362'),
(128, '6300020155815'),
(129, '6300020155716'),
(130, '6300020155785'),
(131, '6390902033379'),
(132, '6300020155808'),
(133, '6390902029075'),
(134, '6300020155754'),
(135, '6290102019299'),
(136, '6390902030521'),
(137, '6300020155778'),
(38, '6139132870794'),
(35, '6299122511394'),
(33, '6299122513282'),
(34, '6299122513299'),
(39, '6299122510472'),
(36, '6559122513270'),
(37, '6559122513294'),
(21, '3683080418650'),
(22, '3683080418681'),
(26, '3683080418698'),
(23, '3683080418674'),
(25, '3683080418704'),
(27, '3683080418643'),
(24, '3683080418742'),
(151, '6290102021759'),
(152, '6290102021650'),
(153, '6290102021841'),
(154, '6290102021728'),
(155, '6290102021858'),
(156, '6290102021681'),
(157, '6290102021643'),
(158, '6290102021797'),
(159, '6290102021667'),
(160, '6290102021780'),
(161, '6290102021810'),
(162, '6290102021766'),
(163, '6290102021704'),
(164, '6290102021872'),
(165, '6290102021698'),
(166, '6290102021742'),
(167, '6290102021834'),
(168, '6290102021735'),
(169, '6290102021674'),
(170, '6290102021711'),
(171, '6290102021773'),
(172, '6290102021803'),
(173, '6291100771592'),
(174, '6291100176892'),
(175, 'bokhour made \'n france'),
(176, '3781234567893'),
(178, '6287004471959'),
(179, '6285592022324'),
(180, '6111249590017'),
(103, '6299122510250'),
(186, '4809011164000'),
(188, '894545000836'),
(189, '3021250190027'),
(190, '5412128613201'),
(141, '5060815001017'),
(142, '5060815001048'),
(150, '5060815001567'),
(139, '5060815001581'),
(145, '5060815001642'),
(143, '5060815001789'),
(146, '5060815001895'),
(147, '5060815002045'),
(140, '5060815002243'),
(149, '5060815002496'),
(138, '5060815002267'),
(144, '5060815002571'),
(193, '6969542021451'),
(194, '6940384800473'),
(199, '6290102021865'),
(200, '5060815001130'),
(201, '5060815002939'),
(204, '9782752400741'),
(206, '9782916457284'),
(208, '9782752400130'),
(209, '9782752402127'),
(210, '9782752402134'),
(211, '9782752402141'),
(213, '9782875451569'),
(217, '038013120200'),
(219, '6290102019251'),
(221, '3760181010058'),
(218, '9791091201131'),
(216, '9782752403162'),
(212, '9782356353900'),
(202, '9782848621104'),
(207, '9782910856540'),
(203, '9782752402011'),
(205, '9789947251300'),
(223, '5060815002977'),
(224, '5060815001147'),
(225, '6287019172070'),
(226, '3683080418865'),
(227, '6287019172056'),
(230, '6282345678906'),
(231, '6287019172179'),
(232, '6287019171165'),
(233, '6287019171707'),
(234, '5410853052944'),
(235, 'https?&&oud=saud\'/com&'),
(236, '8955155819033'),
(237, '8420220410076'),
(238, '8955155817077'),
(239, '6954513411348'),
(181, '1234500023491'),
(240, '6972470540307'),
(228, '6287019171059'),
(229, '6645428892888'),
(187, '6944296188292'),
(241, '5025232063031'),
(214, '9791095305002'),
(242, '9782931241004'),
(243, '9782902526345'),
(249, '9632123320355'),
(250, '5060815002953'),
(251, '6290360590868'),
(20, '6291107456348'),
(29, '6291107456355'),
(252, '6217000185642'),
(253, '6213455566784'),
(254, '6213444444338'),
(255, '8691707019031'),
(256, '6214034348784'),
(259, '3760326820900'),
(260, '6219498461215'),
(261, '1234500019197'),
(262, '6299122512353'),
(263, '6953896330123'),
(264, '3683080418766'),
(265, '3663084418740'),
(266, '3683080418780'),
(267, '3663084418726'),
(268, '3683080418711'),
(269, '3663082418773'),
(258, '3683080418728'),
(177, '3683080418773'),
(270, '6559122513621'),
(271, '3683080418759'),
(257, '6013709410463'),
(272, '6287004471942'),
(273, '5060815002144'),
(274, '5060815001109'),
(278, '5060815000522'),
(279, '5060815000447'),
(275, '5060815000355'),
(276, '5060815001307'),
(280, '5060815000195'),
(281, '5060815002878'),
(282, '5060815003295'),
(277, '5060815001666'),
(283, '5060815001116'),
(284, '5060815000454'),
(285, '894545000737'),
(286, '894545000034'),
(287, '6211020206516');

-- --------------------------------------------------------

--
-- بنية الجدول `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nombre` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `opérateurprofils`
--

CREATE TABLE `opérateurprofils` (
  `profileOperatorId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(250) NOT NULL,
  `reset_code` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `opérateurprofils`
--

INSERT INTO `opérateurprofils` (`profileOperatorId`, `name`, `password`, `email`, `reset_code`) VALUES
(1, 'admin', '$2y$10$PeqiBRbuYtPGtTVLzoixqeyxq7gw.8FszGUTjaudxOGMYj/iPL9w.', 'admin@gmail.com', 0),
(2, 'administrator', '4170ac2a2782a1516fe9e13d7322ae482c1bd594', 'mohammedwadei@gmail.com', 0),
(3, 'Lumiere De Ville ', '76c7345857f1ca700496e64334063f86eac85f7e', '', 0),
(9, 'mohammedalarwi', '$2y$10$j061EmUaTpBmxy6dRK9/OeADmwuSSdg4fTdR7l20jpBNSYacOZexm', 'mohammed@gmail.com', 0);

-- --------------------------------------------------------

--
-- بنية الجدول `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `numéroDeTéléphone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `méthode` varchar(50) NOT NULL,
  `adresse` varchar(500) NOT NULL,
  `produitTotal` int(11) NOT NULL,
  `prixTotal` float NOT NULL,
  `placéSur` date NOT NULL,
  `statutDePaiement` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `orders`
--

INSERT INTO `orders` (`orderId`, `userId`, `nom`, `numéroDeTéléphone`, `email`, `méthode`, `adresse`, `produitTotal`, `prixTotal`, `placéSur`, `statutDePaiement`) VALUES
(1, 1, 'lkk', '1111111111', 'mohammed@gmail.com', 'paytm', 'flat no. l;l;l;, 122121, klkl, kjnmml,l,m, lkkll - 123456', 0, 23, '0000-00-00', '');

-- --------------------------------------------------------

--
-- بنية الجدول `produits`
--

CREATE TABLE `produits` (
  `proId` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `prix` float NOT NULL,
  `descriptionCourte` varchar(255) NOT NULL,
  `urlImage1` varchar(255) NOT NULL,
  `urlImage2` varchar(255) NOT NULL,
  `urlImage3` varchar(255) NOT NULL,
  `tva` int(11) NOT NULL,
  `old_price` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `produits`
--

INSERT INTO `produits` (`proId`, `nom`, `catId`, `prix`, `descriptionCourte`, `urlImage1`, `urlImage2`, `urlImage3`, `tva`, `old_price`, `discount`) VALUES
(1, 'Abaya sans voile ', 5, 20, '', '', '', '', 1, '', ''),
(2, 'Abaya avec voile ', 5, 23, '', '1.png', '', '', 1, '', ''),
(3, 'Abaya avec zippee', 5, 15, '', '', '', '', 1, '', ''),
(4, 'Abaya avec capuche ', 5, 15, '', '', '', '', 1, '', ''),
(5, 'Abaya avec jupe 1', 5, 30, '', '', '', '', 1, '', ''),
(6, 'Abaya avec jupe 2', 5, 32, '', '', '', '', 1, '', ''),
(8, 'Robe de priere', 5, 18, '', '', '', '', 1, '', ''),
(9, ' robe de priere avec jupe enfants ', 5, 8, '', '', '', '', 1, '', ''),
(10, 'khimar ', 6, 16, '', '', '', '', 1, '', ''),
(11, 'Khimar jazz ', 6, 15, '', '', '', '', 1, '', ''),
(12, 'Robe de priere avec jupe ', 5, 10, '', '', '', '', 1, '', ''),
(13, 'hijba', 6, 4, '', '', '', '', 1, '', ''),
(14, 'Hijab Mousselin carré', 6, 6, '', '', '', '', 1, '', ''),
(15, 'Hijab jazz ', 6, 7, '', '', '', '', 1, '', ''),
(18, 'Voile strich ', 6, 8, '', '', '', '', 1, '', ''),
(19, 'cagoule ', 6, 3, '', '', '', '', 1, '', ''),
(20, 'Ameer al arab ', 2, 35, '', '1.png', '1.png', '', 1, '', ''),
(21, 'Almaali ', 2, 7, '', '', '', '', 1, '', ''),
(22, 'Almas', 2, 7, '', '', '', '', 1, '', ''),
(23, 'El amakin ', 2, 7, '', '', '', '', 1, '', ''),
(24, 'Sultana', 2, 7, '', '', '', '', 1, '', ''),
(25, 'Jawhara', 2, 7, '', '', '', '', 1, '', ''),
(26, 'Anta omri', 2, 7, '', '', '', '', 1, '', ''),
(27, 'Layali', 2, 7, '', '', '', '', 1, '', ''),
(28, 'Versencia ', 2, 30, '', '20230415_014023-removebg-preview.png', '', '', 1, '', ''),
(29, 'Amerrat al arab ', 2, 35, '', 'perfum.png', '', '', 1, '', ''),
(30, 'Rawah', 2, 15, '', '', '', '', 1, '', ''),
(31, 'Saba ', 2, 15, '', '', '', '', 1, '', ''),
(32, 'Oud ', 2, 18, '', '', '', '', 1, '', ''),
(33, 'Khalise silver ', 2, 15, '', '', '', '', 1, '', ''),
(34, 'khalise gold', 2, 15, '', '', '', '', 1, '', ''),
(35, 'Hareem al sultan ', 2, 15, '', '', '', '', 1, '', ''),
(36, 'Sheikh al arab ', 2, 15, '', '', '', '', 1, '', ''),
(37, 'sheikh al shabaah ', 2, 15, '', '', '', '', 1, '', ''),
(38, 'Aroob al hub', 2, 18, '', '', '', '', 1, '', ''),
(39, 'Sheikh al shuukh ', 2, 15, '', '', '', '', 1, '', ''),
(40, 'Bonnet  ', 6, 2, '', '', '', '', 1, '', ''),
(41, 'Bukhoor Asalah ', 3, 12, '', '', '', '', 1, '', ''),
(42, 'Bukhoor Saba ', 3, 12, '', '', '', '', 1, '', ''),
(43, 'Bukhoor Jawad ', 3, 12, '', '', '', '', 1, '', ''),
(44, 'Bukhoor khalis gold ', 3, 12, '', '', '', '', 1, '', ''),
(45, 'Bukhoor shaika ', 3, 12, '', '', '', '', 1, '', ''),
(46, 'Bukhoor oudah Ma\'al Attar', 3, 12, '', '', '', '', 1, '', ''),
(47, 'Bukhoor jawad al layl ', 3, 12, '', '', '', '', 1, '', ''),
(48, 'Bukhoor rawah ', 3, 12, '', '', '', '', 1, '', ''),
(49, 'Bukhoor Hiba ', 3, 12, '', '', '', '', 1, '', ''),
(50, 'Bukhoor mukhallat khalis ', 3, 12, '', '', '', '', 1, '', ''),
(51, 'Bukhoor oud malaki ', 3, 12, '', '', '', '', 1, '', ''),
(52, 'Bukhoor buraq', 3, 12, '', '', '', '', 1, '', ''),
(53, 'Bukhoor sultan ', 3, 12, '', '', '', '', 1, '', ''),
(54, 'Bukhoor khalis hindi ', 3, 12, '', '', '', '', 1, '', ''),
(55, 'Bukhoor marwah ', 3, 12, '', '', '', '', 1, '', ''),
(56, 'Bukhoor layali dubai ', 3, 12, '', '', '', '', 1, '', ''),
(57, 'Bukhoor asrar al banat ', 3, 12, '', '', '', '', 1, '', ''),
(58, 'Bukhoor oud syofi ', 3, 12, '', '', '', '', 1, '', ''),
(59, 'Bukhoor sheikh al shuukh', 3, 12, '', '', '', '', 1, '', ''),
(60, 'Bakhoor oud al qamari ', 3, 12, '', 'IMG-20230507-WA0079.jpg', 'IMG-20230507-WA0085.jpg', 'IMG-20230507-WA0086.jpg', 1, '', ''),
(61, 'Bakhoor malaki ', 3, 12, '', 'IMG-20230507-WA0088.jpg', 'IMG-20230507-WA0087.jpg', '', 1, '', ''),
(62, 'Bakhoor leilat al jumaa ', 3, 5, '', '', '', '', 1, '', ''),
(63, 'Bakhoor bint a noor ', 3, 5, '', '', '', '', 1, '', ''),
(64, 'Bakhoor leilat a\'zifaf', 3, 5, '', '', '', '', 1, '', ''),
(65, 'Bokhour leilat al khamiss', 3, 5, '', '', '', '', 1, '', ''),
(66, 'Bokhour leilat sebt ', 3, 5, '', '', '', '', 1, '', ''),
(67, 'Bokhour soltana ', 3, 5, '', '', '', '', 1, '', ''),
(68, 'Bakhoor fakhama ', 3, 5, '', '', '', '', 1, '', ''),
(69, 'Bakhoor al ehlam', 3, 8, '', 'IMG-20230507-WA0061.jpg', 'IMG-20230507-WA0064.jpg', '', 1, '', ''),
(70, 'Bakhoor makkah ', 3, 8, '', 'IMG-20230507-WA0071.jpg', '', '', 1, '', ''),
(71, 'Bakhoor rawat  ', 3, 8, '', 'IMG-20230507-WA0062.jpg', '', '', 1, '', ''),
(72, 'Bakhoor al bait al saeed ', 3, 8, '', 'IMG-20230507-WA0034.jpg', 'IMG-20230507-WA0033.jpg', 'IMG-20230507-WA0032.jpg', 1, '', ''),
(73, 'Bakhoor liyali ', 3, 8, '', '', '', '', 1, '', ''),
(74, 'Bakhoor inta roohi ', 3, 8, '', 'IMG-20230507-WA0072.jpg', '', '', 1, '', ''),
(75, 'Bakhoor romancy', 3, 8, '', 'IMG-20230507-WA0024.jpg', 'IMG-20230507-WA0023.jpg', 'IMG-20230507-WA0020.jpg', 1, '', ''),
(76, 'Bakhoor al emarat ', 3, 8, '', 'IMG-20230507-WA0038.jpg', 'IMG-20230507-WA0038.jpg', 'IMG-20230507-WA0039.jpg', 1, '', ''),
(77, 'Bakhoor khyal ', 3, 8, '', 'IMG-20230507-WA0069.jpg', '', '', 1, '', ''),
(78, 'oud al shiokh ', 3, 8, '', '', '', '', 1, '', ''),
(79, 'Bakhoor sadfa ', 3, 8, '', 'IMG-20230507-WA0019.jpg', 'IMG-20230507-WA0018.jpg', 'IMG-20230507-WA0028.jpg', 1, '', ''),
(80, 'Bakhoor Anfas ', 3, 8, '', 'IMG-20230507-WA0008.jpg', 'IMG-20230507-WA0014.jpg', '', 1, '', ''),
(81, 'Bakhoor Samar', 3, 8, '', '', '', '', 1, '', ''),
(82, 'Bakhoor ishaq', 3, 8, '', 'IMG-20230507-WA0005.jpg', 'IMG-20230507-WA0006.jpg', 'IMG-20230507-WA0007.jpg', 1, '', ''),
(83, 'Bakhoor ishaq ', 3, 8, '', 'IMG-20230507-WA0060.jpg', '', '', 1, '', ''),
(84, 'Bakhoor abeer al qiswa ', 3, 5, '', '', '', '', 1, '', ''),
(85, 'Bakhoor oud bahrani ', 3, 5, '', '', '', '', 1, '', ''),
(86, 'Bakhoor lailat liqaa', 3, 5, '', '', '', '', 1, '', ''),
(87, 'Bakhoor salwa ', 3, 5, '', '', '', '', 1, '', ''),
(88, 'Bakhoor al abyad ', 3, 5, '', '', '', '', 1, '', ''),
(89, 'Bakhoor  oud alraâi ', 3, 5, '', '', '', '', 1, '', ''),
(90, 'Bakhoor bint al kalij ', 3, 5, '', '', '', '', 1, '', ''),
(91, 'Bakhoor âsr al shawq', 3, 5, '', '', '', '', 1, '', ''),
(92, 'Bakhoor al kabh', 3, 5, '', '', '', '', 1, '', ''),
(101, 'Floret ', 2, 30, '', '20230415_014025-removebg-preview.png', '', '', 1, '', ''),
(102, 'Lady way ', 2, 30, '', '2.png', '', '', 1, '', ''),
(103, 'Sultan', 2, 18, '', '', '', '', 1, '', ''),
(104, 'Bakhoor Raghabat al Oud', 3, 12, '', '', '', '', 1, '', ''),
(105, 'Malaki', 7, 3, '', '', '', '', 1, '', ''),
(106, 'Oud al Fakhama', 7, 3, '', '', '', '', 1, '', ''),
(107, 'Musk Tahir', 7, 3, '', '', '', '', 1, '', ''),
(108, 'ana al Dhahab', 7, 3, '', '', '', '', 1, '', ''),
(109, 'Jameela', 7, 3, '', '', '', '', 1, '', ''),
(110, 'oud simple', 7, 3, '', '', '', '', 1, '', ''),
(111, 'soul mates', 7, 3, '', '', '', '', 1, '', ''),
(112, 'hayati', 7, 3, '', '', '', '', 1, '', ''),
(113, 'waseemah', 7, 3, '', '', '', '', 1, '', ''),
(114, 'tanaghum', 7, 3, '', '', '', '', 1, '', ''),
(115, 'kalimat', 7, 3, '', '', '', '', 1, '', ''),
(116, 'soul mates', 7, 3, '', '', '', '', 1, '', ''),
(117, 'Pour Oud', 7, 3, '', '', '', '', 1, '', ''),
(118, 'musk al fakhama', 7, 3, '', '', '', '', 1, '', ''),
(119, 'Jadhaab', 7, 3, '', '', '', '', 1, '', ''),
(120, 'Asrar Al Lail', 7, 4, '', '', '', '', 1, '', ''),
(121, 'Intense Oud', 7, 4, '', '', '', '', 1, '', ''),
(122, 'khashab & Oud', 7, 4, '', '', '', '', 1, '', ''),
(123, 'Mutayyem', 7, 4, '', '', '', '', 1, '', ''),
(124, 'Zahoor AlLail', 7, 4, '', '', '', '', 1, '', ''),
(125, 'Ana', 7, 4, '', '', '', '', 1, '', ''),
(126, 'khashab & Oud Aswad', 7, 4, '', '', '', '', 1, '', ''),
(127, 'Alfaris', 7, 4, '', '', '', '', 1, '', ''),
(128, 'Qamar Al Layli', 7, 4, '', '', '', '', 1, '', ''),
(129, 'Angham Al Hub', 7, 4, '', '', '', '', 1, '', ''),
(130, 'lamsat harir', 7, 4, '', '', '', '', 1, '', ''),
(131, 'Musk Tahira', 7, 4, '', '', '', '', 1, '', ''),
(132, 'Naseem Al Lail', 7, 4, '', '', '', '', 1, '', ''),
(133, 'Oud Al Layl', 7, 4, '', '', '', '', 1, '', ''),
(134, 'Khashab & Oud Gold Edition', 7, 4, '', '', '', '', 1, '', ''),
(135, 'Elham', 7, 4, '', '', '', '', 1, '', ''),
(136, 'zahoor Al Lail', 7, 4, '', '', '', '', 1, '', ''),
(137, 'Khashab & Oud', 7, 4, '', '', '', '', 1, '', ''),
(138, 'Musc sheikh', 11, 2, '', '', '', '', 1, '', ''),
(139, 'Musc jakarta ', 11, 2, '', '', '', '', 1, '', ''),
(140, 'Musc sham\'s', 11, 2, '', '', '', '', 1, '', ''),
(141, 'Musc azur ', 11, 2, '', '', '', '', 1, '', ''),
(142, 'Musc bella ', 11, 2, '', '', '', '', 1, '', ''),
(143, 'Musc mayssane ', 11, 2, '', '', '', '', 2, '', ''),
(144, 'Musc ultra ', 11, 2, '', '', '', '', 1, '', ''),
(145, 'Musc lina', 11, 2, '', '', '', '', 1, '', ''),
(146, 'Musc mystic ', 11, 2, '', '', '', '', 1, '', ''),
(147, 'Musc princesse ', 11, 2, '', '', '', '', 1, '', ''),
(149, 'Musc tesnime ', 11, 2, '', '', '', '', 1, '', ''),
(150, 'Musc ismael ', 11, 2, '', '', '', '', 1, '', ''),
(151, ' Musc lovable ', 11, 1, '', '', '', '', 1, '', ''),
(152, 'Musc noir ', 11, 1, '', '', '', '', 1, '', ''),
(153, 'Musc red roses ', 11, 1, '', '', '', '', 1, '', ''),
(154, 'Musc Gold ', 11, 1, '', '', '', '', 1, '', ''),
(155, 'Musc silver ', 11, 1, '', '', '', '', 1, '', ''),
(156, 'Musc godfather ', 11, 1, '', '', '', '', 1, '', ''),
(157, 'Musc Arous ', 11, 1, '', '', '', '', 1, '', ''),
(158, 'Musc oud aswad ', 11, 1, '', '', '', '', 1, '', ''),
(159, 'Musc golden dust ', 11, 1, '', '', '', '', 1, '', ''),
(160, 'Musc choco musk ', 11, 1, '', '', '', '', 1, '', ''),
(161, 'Musc khanjar ', 11, 1, '', '', '', '', 1, '', ''),
(162, 'Musc oud sultan ', 11, 1, '', '', '', '', 1, '', ''),
(163, 'Musc rashida ', 11, 1, '', '', '', '', 1, '', ''),
(164, 'Musc oud arabia ', 11, 1, '', '', '', '', 1, '', ''),
(165, 'Musc umm bilkis ', 11, 1, '', '', '', '', 1, '', ''),
(166, 'Musc attar full', 11, 1, '', '', '', '', 1, '', ''),
(167, 'Musc sultan ', 11, 1, '', '', '', '', 1, '', ''),
(168, 'Musc sandy ', 11, 1, '', '', '', '', 1, '', ''),
(169, 'Musc softer ', 11, 1, '', '', '', '', 1, '', ''),
(170, 'Musc aswad ', 11, 1, '', '', '', '', 1, '', ''),
(171, 'Musc al fursan ', 11, 1, '', '', '', '', 1, '', ''),
(172, 'Musc Bakhoor ', 11, 1, '', '', '', '', 1, '', ''),
(173, 'Bakhoor nasaem ', 3, 5, '', '', '', '', 1, '', ''),
(174, 'Bakhoor nabeel ', 3, 5, '', '', '', '', 1, '', ''),
(175, 'Bakhoor meriam', 3, 5, '', '', '', '', 1, '', ''),
(176, 'Bakhoor thasnim', 3, 5.00378, '', '', '', '', 2, '', ''),
(177, 'Fabuleux', 2, 20, '', 'Fabuleux.png', 'IMG-20230507-WA0145.jpg', '', 1, '', ''),
(178, 'Organic jazan henna ', 18, 15, '', '', '', '', 1, '', ''),
(179, 'Morginga henna ', 18, 15, '', '', '', '', 1, '', ''),
(180, 'Henna sahara tazarine', 18, 6, '', '', '', '', 1, '', ''),
(181, 'Kit Tapis de prière, quran et chapelet', 15, 20, '', '', '', '', 2, '', ''),
(183, 'Abaya 2 piece ', 5, 30, '', '', '', '', 1, '', ''),
(184, 'Abaya avec pantalon ', 5, 30, '', '', '', '', 1, '', ''),
(185, 'Abaya avec ceinture', 5, 20, '', '', '', '', 1, '', ''),
(186, 'briquet  ', 13, 3.6, '', '', '', '', 1, '', ''),
(187, 'briquet ', 13, 3.6, '', '', '', '', 1, '', ''),
(188, 'Miswak', 16, 1, '', '', '', '', 1, '', ''),
(189, 'Gas grand ', 16, 3, '', '', '', '', 1, '', ''),
(190, 'Gas petit ', 16, 2, '', '', '', '', 1, '', ''),
(191, 'cagoule ', 6, 4, '', '', '', '', 1, '', ''),
(192, 'bonnet ', 6, 3, '', '', '', '', 1, '', ''),
(193, 'Digital tasbih ', 16, 7, '', '', '', '', 1, '', ''),
(194, 'Charbon', 16, 1, '', '', '', '', 1, '', ''),
(195, 'Oud Normal', 4, 1.6, '', '', '', '', 1, '', ''),
(196, 'Oud Nature', 4, 3, '', '', '', '', 1, '', ''),
(197, 'Oud Bentley', 4, 3, '', '', '', '', 1, '', ''),
(198, 'Oud Papillon', 4, 3, '', '20230411_012155-removebg-preview.png', '', '', 1, '', ''),
(199, 'Musk', 11, 1, '', '', '', '', 1, '', ''),
(200, 'Musc blanc ', 11, 2, '', '', '', '', 1, '', ''),
(201, 'Royal gold', 11, 2, '', '', '', '', 1, '', ''),
(202, 'Guide hajj et umra Arabe', 15, 10, '', '', '', '', 2, '', ''),
(203, 'Guide hajj et umra ', 15, 8, '', '', '', '', 2, '', ''),
(204, 'Le necteur caheté', 15, 10, '', '', '', '', 2, '', ''),
(205, 'korassat al khat ', 15, 3.5, '', '', '', '', 2, '', ''),
(206, 'Nos pieux prédécesseurs', 15, 15, '', '', '', '', 2, '', ''),
(207, 'Histoire des prophetes ', 15, 15, '', '', '', '', 2, '', ''),
(208, 'Les histoires des prophètes ', 15, 10, '', '', '', '', 2, '', ''),
(209, 'L\'arabe langue vivante tome 1', 15, 10, '', '', '', '', 2, '', ''),
(210, 'L\'arabe longue viante thome 2', 15, 10, '', '', '', '', 2, '', ''),
(211, 'L\'arbabe langue vivante thome 3', 15, 12, '', '', '', '', 2, '', ''),
(212, 'Conseils pour la femme musulmane', 15, 12, '', '', '', '', 2, '', ''),
(213, 'une ame apaisée ', 15, 2.8, '', '', '', '', 2, '', ''),
(214, 'Le Hajj et la Omra ', 15, 5.5, '', '', '', '', 2, '', ''),
(215, 'Droitw et devoirs de la femme en islam', 15, 12, '', '', '', '', 2, '', ''),
(216, 'Arabe basique ', 15, 7, '', '', '', '', 2, '', ''),
(217, 'Qaida noraniya ', 15, 8, '', '', '', '', 2, '', ''),
(218, 'Alif-ba coloriage et ecriture ', 15, 3.95, '', '', '', '', 2, '', ''),
(219, 'Floret ', 2, 30, '', '', '', '', 1, '', ''),
(221, 'Golden River Charcoal Tablets', 16, 1, '', '', '', '', 1, '', ''),
(223, 'Musc Royal Gold', 11, 2, '', '', '', '', 1, '', ''),
(224, 'Musc Blanc', 11, 2, '', '', '', '', 1, '', ''),
(225, 'wateen', 2, 5, '', '', '', '', 1, '', ''),
(226, 'Brume Etoilée', 2, 5, '', '', '', '', 1, '', ''),
(227, 'Wateen Eau de parfum', 2, 5, '', '', '', '', 1, '', ''),
(228, 'Classic Collection Eau de Parfum', 2, 5, '', '', '', '', 1, '', ''),
(229, 'Genis Collection', 2, 5, '', '', '', '', 1, '', ''),
(230, 'Wateen de Collection', 2, 5, '', '', '', '', 1, '', ''),
(231, 'WB Wateen collection EDP', 2, 5, '', '', '', '', 1, '', ''),
(232, 'Classic collection EDP', 2, 5, '', '', '', '', 1, '', ''),
(233, 'Classic Collection (Lady) EDP', 2, 5, '', '', '', '', 1, '', ''),
(234, 'Batterie Panasonic', 20, 3, '', '', '', '', 1, '', ''),
(235, 'Oud Saudi', 3, 25, '', '', '', '', 1, '', ''),
(236, 'Faux ongles', 16, 2, '', '', '', '', 1, '', ''),
(237, 'Faux ongles ', 16, 2, '', '', '', '', 1, '', ''),
(238, 'Faux ongles', 16, 2, '', '', '', '', 1, '', ''),
(239, 'Faux ongles', 16, 2, '', '', '', '', 1, '', ''),
(240, 'Lamp - Qur\'an Speaker', 21, 50, '', '', '', '', 1, '', ''),
(241, 'Batterie Panasonic', 20, 3, '', '', '', '', 1, '', ''),
(242, 'Mes Sourates en couleurs', 15, 10, '', '', '', '', 2, '', ''),
(243, 'Le Coran', 15, 40, '', '', '', '', 2, '', ''),
(244, 'voile soie de medine', 6, 8, '', '', '', '', 1, '', ''),
(245, 'Voile ', 6, 7, '', '', '', '', 1, '', ''),
(246, 'Robe', 5, 15, '', '', '', '', 1, '', ''),
(247, 'Musk Dubai', 11, 2, '', '', '', '', 1, '', ''),
(248, 'Musk Jamed', 11, 2, '', '', '', '', 1, '', ''),
(249, 'Savon 7lb', 25, 12, '', '', '', '', 1, '', ''),
(250, 'Royal Gold', 2, 20, '', '', '', '', 1, '', ''),
(251, 'Ameerat Al Arab Prive Rose', 2, 35, '', '', '', '', 1, '', ''),
(252, 'Beaute de lorient ', 25, 8, '', '', '', '', 1, '', ''),
(253, 'Olive Savon d\'alep', 25, 3, '', '', '', '', 1, '', ''),
(254, 'savon d&#39;alep ', 25, 5, '', 'alep.png', '', '', 1, '', ''),
(255, 'Savon avec Camomille et Huiles Naturelles', 25, 3, '', '15.png', '', '', 1, '', ''),
(256, 'Savon avec Cannelle et Gousses Huilez', 25, 3, '', '20230415_014014-removebg-preview.png', '', '', 1, '', ''),
(257, 'Ajwa Date', 20, 10, '', '', '', '', 1, '', ''),
(258, 'Bois intense', 2, 20, '', 'Bois intense.png', 'IMG-20230507-WA0132.jpg', '', 1, '', ''),
(259, 'Crystal Bacarrat ', 2, 20, '', '', '', '', 1, '', ''),
(260, 'Savon nAn', 25, 10, '', '', '', '', 1, '', ''),
(261, 'Bad', 29, 17, '', '', '', '', 1, '', ''),
(262, 'Asalah', 3, 12, '', '', '', '', 1, '', ''),
(263, 'finger counter ', 20, 1, '', '', '', '', 1, '', ''),
(264, 'Moulaga', 2, 20, '', 'IMG-20230507-WA0139.jpg', 'IMG-20230507-WA0140.jpg', '', 1, '', ''),
(265, 'Love In Paris', 2, 0, '', 'Love In Paris.png', 'love2.jpg', '', 1, '', ''),
(266, 'Rouge Paris', 2, 20, '', 'IMG-20230507-WA0136.jpg', 'IMG-20230507-WA0137.jpg', '', 1, '', ''),
(267, 'Eau De Foudre', 2, 20, '', 'Eau De Foudre.png', 'IMG-20230507-WA0147.jpg', '', 1, '', ''),
(268, 'By Love', 2, 20, '', 'IMG-20230507-WA0141.jpg', 'IMG-20230507-WA0142.jpg', '', 1, '', ''),
(269, 'Full Moon', 2, 20, '', 'Full Moon.png', 'fullmoon2.jpg', 'IMG-20230507-WA0128.jpg', 1, '', ''),
(270, 'Mataf', 31, 12, '', '', '', '', 1, '', ''),
(271, 'Scent Zone', 2, 20, '', 'scent.png', 'IMG-20230507-WA0134.jpg', '', 1, '', ''),
(272, 'Moringa soap', 25, 8, '', '', '', '', 1, '', ''),
(273, 'Sahara', 11, 2, '', '', '', '', 1, '', ''),
(274, 'Black', 11, 2, '', '', '', '', 1, '', ''),
(275, 'boy musc ', 11, 2, '', '', '', '', 1, '', ''),
(276, 'Darajat', 11, 2, '', '', '', '', 1, '', ''),
(277, 'Musc london', 11, 0, '', '', '', '', 1, '', ''),
(278, 'El badr', 11, 0, '', '', '', '', 1, '', ''),
(279, 'delice d\'arabie', 11, 2, '', '', '', '', 1, '', ''),
(280, 'baby musc ', 11, 0, '', '', '', '', 1, '', ''),
(281, 'Queen of ryadh', 11, 2, '', '', '', '', 1, '', ''),
(282, 'El nabil', 11, 2, '', '', '', '', 1, '', ''),
(283, 'Musc black', 11, 2, '', '', '', '', 1, '', ''),
(284, 'delice d\'arabe ', 11, 2, '', '', '', '', 1, '', ''),
(285, 'miswak', 20, 1, '', '', '', '', 2, '', ''),
(286, 'miswak in holder ', 20, 2, '', '', '', '', 1, '', ''),
(287, 'Savon naturel', 25, 3, '', '', '', '', 1, '', '');

-- --------------------------------------------------------

--
-- بنية الجدول `tva`
--

CREATE TABLE `tva` (
  `id` int(11) NOT NULL,
  `index` int(11) NOT NULL,
  `valeur` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `tva`
--

INSERT INTO `tva` (`id`, `index`, `valeur`) VALUES
(1, 0, 0),
(2, 1, 20),
(3, 2, 5);

-- --------------------------------------------------------

--
-- بنية الجدول `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `userId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `reset_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `utilisateurs`
--

INSERT INTO `utilisateurs` (`userId`, `name`, `email`, `number`, `password`, `address`, `reset_code`) VALUES
(1, 'mohammed', 'mohammed@gmail.com', '', '$2y$10$zbgC.xrcEFbhwgmlyEQYd.YsYdr27b3aYhPR/o6Gn0rgGWYYAM6DO', '', 0),
(4, 'alarwi', 'alarwi@gmail.com', '', '$2y$10$TSfe48Y9zrfF7Q8gnKSq3.FuKK72nqFO1ZtI97wNYR62rmBqWyfUm', '', 0),
(6, 'm123', 'mohammedallarwi@gmail.com', '', '$2y$10$GFOQxWxkFvZfRP/VIujIQe8xaOrw7ogokh0ZLyQrTVhUGHXPtbQQ.', '', 0);

-- --------------------------------------------------------

--
-- بنية الجدول `wishlist`
--

CREATE TABLE `wishlist` (
  `Id` int(100) NOT NULL,
  `userId` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `price` int(150) NOT NULL,
  `image` varchar(250) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `proId` (`proId`);

--
-- Indexes for table `catégories`
--
ALTER TABLE `catégories`
  ADD PRIMARY KEY (`catId`),
  ADD KEY `catId` (`catId`),
  ADD KEY `catId_2` (`catId`);

--
-- Indexes for table `codebarres`
--
ALTER TABLE `codebarres`
  ADD KEY `proId` (`proId`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `opérateurprofils`
--
ALTER TABLE `opérateurprofils`
  ADD PRIMARY KEY (`profileOperatorId`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD UNIQUE KEY `userId` (`userId`),
  ADD KEY `orderId` (`orderId`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`proId`),
  ADD KEY `proId` (`proId`),
  ADD KEY `catId` (`catId`),
  ADD KEY `tva` (`tva`);

--
-- Indexes for table `tva`
--
ALTER TABLE `tva`
  ADD PRIMARY KEY (`index`),
  ADD UNIQUE KEY `index_2` (`index`),
  ADD KEY `index` (`index`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `userId` (`userId`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `pid` (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `opérateurprofils`
--
ALTER TABLE `opérateurprofils`
  MODIFY `profileOperatorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `utilisateurs` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`proId`) REFERENCES `produits` (`proId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- القيود للجدول `codebarres`
--
ALTER TABLE `codebarres`
  ADD CONSTRAINT `codebarres_ibfk_1` FOREIGN KEY (`proId`) REFERENCES `produits` (`proId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `utilisateurs` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`catId`) REFERENCES `catégories` (`catId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produits_ibfk_2` FOREIGN KEY (`tva`) REFERENCES `tva` (`index`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `produits` (`proId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `utilisateurs` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
