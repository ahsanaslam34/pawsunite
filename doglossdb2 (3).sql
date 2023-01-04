-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2023 at 05:17 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doglossdb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user`, `pass`, `company`) VALUES
(1, 'admin', '$2y$10$SFZ0f0F9K.8KjR5WmOnebOOcAfRDmGcU0EFGDTDKcHpN45k7GADRC', 'Dog Loss');

-- --------------------------------------------------------

--
-- Table structure for table `breeds`
--

CREATE TABLE `breeds` (
  `id` int(11) NOT NULL,
  `des` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `breeds`
--

INSERT INTO `breeds` (`id`, `des`) VALUES
(1, 'Affenpinscher'),
(2, 'Afghan Hound'),
(3, 'Aidi'),
(4, 'Airedale Terrier'),
(5, 'Akita'),
(6, 'Akita cross'),
(7, 'Alaskan Klee Kai'),
(8, 'Alaskan Malamute'),
(9, 'American Bulldog'),
(10, 'American Cocker Spaniel'),
(11, 'American Mastiff'),
(12, 'American Staffordshire Bull Terrier'),
(13, 'American Toy Terrier'),
(14, 'Anatolian Shepherd Dog'),
(15, 'Anglo-Francais de Petit Venerie'),
(16, 'Australian Cattle Dog'),
(17, 'Australian Kelpie'),
(18, 'Australian Shepherd'),
(19, 'Australian Silky Terrier'),
(20, 'Australian Terrier'),
(21, 'Azawakh'),
(22, 'Balkan Hound'),
(23, 'Barbet'),
(24, 'Bas Rouge'),
(25, 'Basenji'),
(26, 'Basset Artesian Normand'),
(27, 'Basset Bleu de Gascogne'),
(28, 'Basset Fauve de Bretagne'),
(29, 'Basset Hound'),
(30, 'Bavarian Mountain Hound'),
(31, 'Beagle'),
(32, 'Beagle cross'),
(33, 'Bearded Collie'),
(34, 'Beauceron'),
(35, 'Bedlington Terrier'),
(36, 'Belgian Shepherd (Tervuren)'),
(37, 'Belgian Shepherd Dog (Groenendael)'),
(38, 'Belgian Shepherd Dog (Laekenois)'),
(39, 'Belgian Shepherd Dog (Malinois)'),
(40, 'Bergamasco'),
(41, 'Bernese Mountain Dog'),
(42, 'Bichon Frise'),
(43, 'Bird'),
(44, 'Bloodhound'),
(45, 'Bolognese'),
(46, 'Border Collie'),
(47, 'Border Terrier'),
(48, 'Border Terrier Cross'),
(49, 'Borzoi'),
(50, 'Boston Terrier'),
(51, 'Bouvier des Flandres'),
(52, 'Boxer'),
(53, 'Boxer cross'),
(54, 'Bracco Italiano'),
(55, 'Briard'),
(56, 'Brittany'),
(57, 'Bruno Jura Laufhund'),
(58, 'Bull Terrier: Miniature'),
(59, 'Bulldog'),
(60, 'Bulldog Cross'),
(61, 'Cairn Terrier'),
(62, 'Canaan Dog'),
(63, 'Canarian'),
(64, 'Cane Corso'),
(65, 'Cat'),
(66, 'Catahoula Leopard Dog'),
(67, 'Catalan Sheepdog'),
(68, 'Cavalier King Charles Spaniel '),
(69, 'Cesky Terrier'),
(70, 'Chesapeake Bay Retriever'),
(71, 'Chihuahua'),
(72, 'Chihuahua Cross'),
(73, 'Chinese Crested'),
(74, 'Chinook'),
(75, 'Chow Chow'),
(76, 'Cirneco Dell\'Etna'),
(77, 'Clumber Spaniel'),
(78, 'Cocker Spaniel'),
(79, 'Cockerpoo'),
(80, 'Collie Cross'),
(81, 'Corgi Cross'),
(82, 'Coton de Tulear'),
(83, 'Cross Breed'),
(84, 'Curly Coated Retriever '),
(85, 'Czesky Fousek'),
(86, 'Dachshund'),
(87, 'Dachshund Cross'),
(88, 'Dachshund Teckle'),
(89, 'Dachshund: Miniature'),
(90, 'Dalmatian'),
(91, 'Dandie Dinmont Terrier'),
(92, 'Deerhound'),
(93, 'Doberman'),
(94, 'Doberman Cross'),
(95, 'Dogue de Bordeaux'),
(96, 'Dutch Shepherd Dog'),
(97, 'English Bull Terrier'),
(98, 'English Setter'),
(99, 'English Springer Spaniel'),
(100, 'English Toy Terrier'),
(101, 'Entlebucher Mountain Dog'),
(102, 'Eskimo Dog'),
(103, 'Estrela Mountain dog'),
(104, 'Eurasier'),
(105, 'Fell Terrier'),
(106, 'Fen Terrier'),
(107, 'Field Spaniel'),
(108, 'Finnish Hound'),
(109, 'Finnish Lapphund'),
(110, 'Finnish Spitz '),
(111, 'Flat-coated Retriever'),
(112, 'Fox Terrier'),
(113, 'Foxhound'),
(114, 'French Bulldog'),
(115, 'German Longhaired Pointer'),
(116, 'German Pinscher'),
(117, 'German Shepherd Cross'),
(118, 'German Shepherd Dog'),
(119, 'German Shorthaired Pointer'),
(120, 'German Spitz: Giant'),
(121, 'German Spitz: Klein'),
(122, 'German Spitz: Mittel'),
(123, 'German Wirehaired Pointer'),
(124, 'Glen of Imaal Terrier'),
(125, 'Golden Retriever'),
(126, 'Gordon Setter'),
(127, 'Grand Basset Griffon Vendeen'),
(128, 'Grand Bleu de Gascogne'),
(129, 'Great Dane'),
(130, 'Great Swiss Mountain Dog'),
(131, 'Greenland Dog'),
(132, 'Greyhound'),
(133, 'Griffon'),
(134, 'Griffon Bruxellois'),
(135, 'Hamiltonstovare'),
(136, 'Harrier'),
(137, 'Havanese'),
(138, 'Horse'),
(139, 'Hound type'),
(140, 'Hovawart'),
(141, 'Hungarian Kuvasz'),
(142, 'Hungarian Vizsla'),
(143, 'Hungarian Wirehaired Vizsla'),
(144, 'Husky Cross'),
(145, 'Ibizan Hound'),
(146, 'Inuit'),
(147, 'Irish Red and White Setter'),
(148, 'Irish Setter'),
(149, 'Irish Terrier'),
(150, 'Irish Water Spaniel'),
(151, 'Irish Wolfhound'),
(152, 'Italian Greyhound'),
(153, 'Italian Hound'),
(154, 'Italian Spinone'),
(155, 'Italiano Volpino'),
(156, 'Jack Russell Terrier'),
(157, 'Jack Russell Terrier Cross'),
(158, 'Japanese Chin'),
(159, 'Japanese Spitz'),
(160, 'Japenese Akita Unu'),
(161, 'Keeshond'),
(162, 'Kelpie Australian'),
(163, 'Kerry Blue Terrier'),
(164, 'King Charles Spaniel'),
(165, 'Komondor'),
(166, 'Kooikerhondje'),
(167, 'Korean Jindo'),
(168, 'Korthal'),
(169, 'Korthals Griffon'),
(170, 'Kyi Leo'),
(171, 'Labradoodle'),
(172, 'Labrador Cross'),
(173, 'Labrador Retriever'),
(174, 'Lagotto Romagnolo'),
(175, 'Lakeland Terrier'),
(176, 'Lancashire Heeler'),
(177, 'Landseer'),
(178, 'Large Munsterlander'),
(179, 'Leonberger'),
(180, 'Lhasa Apso'),
(181, 'Lowchen'),
(182, 'Lucas Terrier'),
(183, 'Lurcher'),
(184, 'Maltese'),
(185, 'Manchester Terrier'),
(186, 'Maremma Sheepdog'),
(187, 'Mastiff'),
(188, 'Mastiff cross'),
(189, 'Mexican Hairless'),
(190, 'Neapolitan Mastiff'),
(191, 'New Zealand Huntaway'),
(192, 'Newfoundland'),
(193, 'Norfolk Terrier'),
(194, 'Norwegian Buhund'),
(195, 'Norwegian Elkhound '),
(196, 'Norwich Terrier'),
(197, 'Nova Scotia Duck Tolling Retriever'),
(198, 'Nuthall Terrier'),
(199, 'Old English Sheepdog'),
(200, 'Olde English Bulldog'),
(201, 'Otterhound'),
(202, 'Papillon'),
(203, 'Parrot'),
(204, 'Parson Russell Terrier'),
(205, 'Patterdale Cross'),
(206, 'Patterdale Terrier'),
(207, 'Pekingese'),
(208, 'Petit Basset Griffon Vendeen'),
(209, 'Pharoah Hound'),
(210, 'Pinscher: Miniature'),
(211, 'Pit Bull Terrier'),
(212, 'Plott Hound'),
(213, 'Plummer Terrier'),
(214, 'Pointer'),
(215, 'Pointer cross'),
(216, 'Polish Hound'),
(217, 'Polish Lowland Sheepdog'),
(218, 'Pomeranian'),
(219, 'Poodle cross'),
(220, 'Poodle: Miniature'),
(221, 'Poodle: Standard'),
(222, 'Poodle: Toy'),
(223, 'Portuguese Podengo'),
(224, 'Portuguese Pointer'),
(225, 'Portuguese Water Dog'),
(226, 'Posavac Hound'),
(227, 'Presa Canario '),
(228, 'Pug'),
(229, 'Puli'),
(230, 'Pumi'),
(231, 'Pyrenean Mastiff'),
(232, 'Pyrenean Mountain Dog'),
(233, 'Pyrenean Sheepdog'),
(234, 'Rhodesian Ridgeback'),
(235, 'Rottweiler'),
(236, 'Rottweiler Cross'),
(237, 'Rough Collie'),
(238, 'Russian Black Terrier'),
(239, 'Russian Toy Terrier'),
(240, 'Saarloos Wolfhound'),
(241, 'Saluki'),
(242, 'Samoyed'),
(243, 'Schipperke'),
(244, 'Schnauzer: Giant'),
(245, 'Schnauzer: Minature'),
(246, 'Schnauzer: Standard'),
(247, 'Scottish Terrier'),
(248, 'Sealyham Terrier'),
(249, 'Segugio Italiano'),
(250, 'Setter Cross'),
(251, 'Shar Pei'),
(252, 'Shar Pei Cross'),
(253, 'Sheltie '),
(254, 'Shetland Sheepdog'),
(255, 'Shiba Inu'),
(256, 'Shih Tzu'),
(257, 'Shih Tzu cross'),
(258, 'Siberian Husky'),
(259, 'Skye Terrier'),
(260, 'Sloughi'),
(261, 'Slovakian Rough Haired Pointer'),
(262, 'Small Munsterlander'),
(263, 'Smooth Collie'),
(264, 'Soft Coated Wheaten Terrier'),
(265, 'Spaniel Cross'),
(266, 'Spanish Greyhound'),
(267, 'Spanish Mastiff'),
(268, 'Spanish Water Dog'),
(269, 'Sprocker'),
(270, 'St. Bernard'),
(271, 'Stabyhound'),
(272, 'Staffordshire Bull Terrier'),
(273, 'Staffordshire Bull Terrier Cross'),
(274, 'Sussex Spaniel'),
(275, 'Swedish Elkhound '),
(276, 'Swedish Lapphund'),
(277, 'Swedish Vallhund'),
(278, 'Terrier Cross'),
(279, 'Tervuren'),
(280, 'Tibetan Mastiff'),
(281, 'Tibetan Spaniel'),
(282, 'Tibetan Terrier'),
(283, 'Trail Hound'),
(284, 'Turkish Kangal Dog'),
(285, 'Unknown'),
(286, 'Utonagan'),
(287, 'Victorian Bulldog'),
(288, 'Weimaraner'),
(289, 'Welsh Collie'),
(290, 'Welsh Corgi (Cardigan)'),
(291, 'Welsh Corgi (Pembroke)'),
(292, 'Welsh Sheepdog'),
(293, 'Welsh Springer Spaniel'),
(294, 'Welsh Terrier'),
(295, 'West Highland White Terrier'),
(296, 'Whippet'),
(297, 'Yorkshire Terrier'),
(298, 'Yorkshire Terrier Cross'),
(299, 'Yugoslavian Mountain Hound');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `pet_type` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `breed` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `date_loss` varchar(255) DEFAULT NULL,
  `where_loss` varchar(255) DEFAULT NULL,
  `identification_marks` varchar(255) DEFAULT NULL,
  `tagged` varchar(255) DEFAULT NULL,
  `microchipped` varchar(255) DEFAULT NULL,
  `tattoed` varchar(255) DEFAULT NULL,
  `other` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `active_status` int(11) DEFAULT NULL,
  `is_featured` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `pet_type`, `status`, `gender`, `breed`, `age`, `color`, `region`, `postcode`, `date_loss`, `where_loss`, `identification_marks`, `tagged`, `microchipped`, `tattoed`, `other`, `image`, `active_status`, `is_featured`, `user_id`, `date`) VALUES
(1, 'test', 'Dog', 'Found', 'male', 'Aidi', '23', 'black', 'Southern Ireland', '755525', '2022-12-30', 'kkkkmmm', 'test 121', 'yes', 'no', 'yes', NULL, '20221230143932-181273_a.jpg', 1, NULL, 1, NULL),
(2, 'Dog 2', 'Dog', 'Rainbow Bridge', 'male', 'Aidi', '25', 'Red', 'North East', '755525', '2022-12-17', 'abcd', 'test 12', 'no', 'no', 'no', 'Crowfoot Kennels Dog Rescue - This dog was found in the Minninglow carpark at Pikehall. It’s micro chipped but the details are out of date. If anyone recognise this dog please get in touch. Contact 01283 585510 or crowfootkennelsrescue@gmail.com', '20221230150154-d1.jpg', 1, 1, 1, NULL),
(3, 'Dog 3', 'Dog', 'Lost', 'male', 'Aidi', '23', 'black', 'East Anglia', '755525', '2023-01-01', 'abcd', 'test 12', 'yes', 'yes', 'yes', 'Crowfoot Kennels Dog Rescue - This dog was found in the Minninglow carpark at Pikehall. It’s micro chipped but the details are out of date. If anyone recognise this dog please get in touch. Contact 01283 585510 or crowfootkennelsrescue@gmail.com', '20230102122504-d1.jpg', 1, NULL, 1, NULL),
(4, 'Dog 4', NULL, 'Lost', 'male', 'Aidi', '23', 'black', 'Scotland', '755525', '2023-01-01', 'abcd', NULL, NULL, NULL, NULL, 'Crowfoot Kennels Dog Rescue - This dog was found in the Minninglow carpark at Pikehall. It’s micro chipped but the details are out of date. If anyone recognise this dog please get in touch. Contact 01283 585510 or crowfootkennelsrescue@gmail.com', '20230102122814-181273_a.jpg', 1, NULL, 1, NULL),
(5, 'Dog 6', NULL, 'Found', 'male', 'Aidi', '23', 'black', 'East Anglia', '755525', '2023-01-02', 'abcd', NULL, NULL, NULL, NULL, 'Crowfoot Kennels Dog Rescue - This dog was found in the Minninglow carpark at Pikehall. It’s micro chipped but the details are out of date. If anyone recognise this dog please get in touch. Contact 01283 585510 or crowfootkennelsrescue@gmail.com', '20230102123124-181273_a.jpg,20230102123124-d1.jpg,20230102123124-im2.jpg', 1, NULL, 1, NULL),
(6, 'Dog 7', 'Dog', 'Found', 'male', 'Akita', '25', 'black', 'Scotland', '755525', '2023-01-03', 'abcd', 'test 12', 'yes', 'no', 'yes', 'testing', '20230103102802-d1.jpg,20230103102802-im2.jpg', 1, 2, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `contact`, `address`, `country`, `postcode`, `region`, `status`) VALUES
(1, 'John Cedric', 'user1@mail.com', '$2y$10$C1iuWCPB3ZrDDsppzxVjDuTsavtmM7VUa1lXUqiy4zotVSM1ATOwO', '923235421', 'House', 'Pakistan', '75552', 'AAA', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `breeds`
--
ALTER TABLE `breeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `breeds`
--
ALTER TABLE `breeds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
