-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2020 at 06:57 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `division` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`, `slug`, `division`) VALUES
(1, 'Dhaka', 'dhaka', 1),
(2, 'Gazipur', 'gazipur', 1),
(3, 'Kishoreganj', 'kishoreganj', 1),
(4, 'Manikganj', 'manikganj', 1),
(5, 'Munshiganj', 'munshiganj', 1),
(6, 'Narayanganj', 'narayanganj', 1),
(7, 'Narsingdi', 'narsingdi', 1),
(8, 'Tangail', 'tangail', 1),
(9, 'Faridpur', 'faridpur', 1),
(10, 'Gopalganj', 'gopalganj', 1),
(11, 'Madaripur', 'madaripur', 1),
(12, 'Rajbari', 'rajbari', 1),
(13, 'Shariatpur', 'shariatpur', 1),
(14, 'Rangamati', 'rangamati', 2),
(15, 'Chittagong', 'chittagong', 2),
(16, 'Brahmanbaria', 'brahmanbaria', 2),
(18, 'Comilla', 'comilla', 2),
(19, 'Chandpur', 'chandpur', 2),
(20, 'Lakshmipur', 'lakshmipur', 2),
(21, 'Noakhali', 'noakhali', 2),
(22, 'Feni', 'feni', 2),
(23, 'Khagrachhari', 'khagrachhari', 2),
(24, 'Bandarban', 'bandarban', 2),
(25, 'Cox\'s Bazar', 'cox-s-bazar', 2),
(26, 'Bogura', 'bogura', 3),
(27, 'Chapainawabganj', 'chapainawabganj', 3),
(28, 'Joypurhat', 'joypurhat', 3),
(29, 'Naogaon', 'naogaon', 3),
(30, 'Natore', 'natore', 3),
(31, 'Pabna', 'pabna', 3),
(32, 'Rajshahi', 'rajshahi', 3),
(33, 'Sirajgonj', 'sirajgonj', 3),
(34, 'Bagerhat', 'bagerhat', 4),
(35, 'Chuadanga', 'chuadanga', 4),
(36, 'Jessore', 'jessore', 4),
(37, 'Jhenaidah', 'jhenaidah', 4),
(38, 'Khulna', 'khulna', 4),
(39, 'Kushtia', 'kushtia', 4),
(40, 'Magura', 'magura', 4),
(41, 'Meherpur', 'meherpur', 4),
(42, 'Narail', 'narail', 4),
(43, 'Satkhira', 'satkhira', 4),
(44, 'Barisal', 'barisal', 5),
(45, 'Barguna', 'barguna', 5),
(46, 'Bhola', 'bhola', 5),
(47, 'Jhalokati', 'jhalokati', 5),
(48, 'Patuakhali', 'patuakhali', 5),
(49, 'Pirojpur', 'pirojpur', 5),
(50, 'Rangpur', 'rangpur', 6),
(51, 'Dinajpur', 'dinajpur', 6),
(52, 'Kurigram', 'kurigram', 6),
(53, 'Nilphamari', 'nilphamari', 6),
(54, 'Gaibandha', 'gaibandha', 6),
(55, 'Thakurgaon', 'thakurgaon', 6),
(56, 'Panchagarh', 'panchagarh', 6),
(57, 'Lalmonirhat', 'lalmonirhat', 6),
(58, 'Habiganj', 'habiganj', 7),
(59, 'Moulvibazar', 'moulvibazar', 7),
(60, 'Sunamganj', 'sunamganj', 7),
(61, 'Sylhet', 'sylhet', 7),
(62, 'Mymensingh', 'mymensingh', 8),
(63, 'Netrokona', 'netrokona', 8),
(64, 'Jamalpur', 'jamalpur', 8),
(65, 'Sherpur', 'sherpur', 8);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `map_url` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `div_image1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `div_image2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `div_image3` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id`, `name`, `slug`, `description`, `map_url`, `div_image1`, `div_image2`, `div_image3`) VALUES
(1, 'Dhaka Division', 'dhaka-division', 'Dhaka Division (Bengali: ঢাকা বিভাগ, Ḑhaka Bibhag) is an administrative division within Bangladesh.[2] The capital and largest city is Dhaka. The Division as constituted prior to 2015 covered an area of 31,051 km2,[2] and had a population of 47,424,418 at the 2011 Census. Dhaka Division is bounded by Mymensingh Division to the north, Barisal Division to the south, Chittagong Division to the east and south-east, Sylhet Division to the north-east, Rangpur Division to the north-west, and Rajshahi Division to the west and Khulna Divisions to the south-west.\r\n', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1868798.1049737837!2d89.15899847704846!3d23.818730654140097!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b903f021fd45%3A0x8a43dc744b1367eb!2sDhaka%20Division!5e0!3m2!1sen!2sbd!4v159994774804', 'Dhaka01.jpg', 'Dhaka02.jpg', 'Dhaka03.jpg'),
(2, 'Chittagong Division', 'chittagong-division', 'Chittagong Division is geographically the largest of the eight administrative divisions of Bangladesh. It covers the south-easternmost areas of the country, with a total area of 33,771.18 km2 (13,039.13 sq mi)[2] and a population at the 2011 census of 28,423,019. The administrative division includes mainland Chittagong District, neighbouring districts and the Chittagong Hill Tracts.\r\n\r\nChittagong Division is home to Cox\'s Bazar, the longest natural sea beach in the world.;[3][4] as well as St. Martin\'s Island, Bangladesh\'s sole coral reef.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3776989.515455061!2d89.35434351874837!3d22.41146763585103!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd8ae903a4c7d%3A0xd621c20a33d441f9!2sChittagong%20Division!5e0!3m2!1sen!2sbd!4v160002547', 'Chittagong01.jpg', 'Chittagong02.jpg', 'Chittagong03.jpg'),
(3, 'Rajshahi Division', 'rajshahi-division', 'Rajshahi Division (Bengali: রাজশাহী বিভাগ) is one of the eight first-level administrative divisions of Bangladesh. It has an area of 18,174.4 square kilometres (7,017.2 sq mi)[2] and a population at the 2011 Census of 18,484,858.[3] Rajshahi Division consists of 8 districts, 70 Upazilas (the next lower administrative tier) and 1,092 Unions (the lowest administrative tier). This division is most valuable division of Bangladesh . It has an excellent rail and road communication infrastructure. The divisional capital of Rajshahi is only six-seven hours road journey away from Dhaka, the capital city.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1858298.4925022337!2d87.79564049237263!3d24.537749930943566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e3510ce14e0c51%3A0xa1b1f07f4fb6a859!2sRajshahi%20Division!5e0!3m2!1sen!2sbd!4v160227149', 'Rajshahi01.jpg', 'Rajshahi02.jpg', 'Rajshahi03.jpg'),
(4, 'Khulna Division', 'khulna-division', 'Khulna Division (Bengali: খুলনা বিভাগ) is one of the eight divisions of Bangladesh. It has an area of 22,285 km2 (8,604 sq mi) and a population of 15,563,000 at the 2011 Census (preliminary returns). Its headquarters and largest city is Khulna city in Khulna District.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1881441.2051388887!2d88.14080133956988!3d22.92480767469642!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fe907764b7ffe7%3A0xb72b036c0e35bb11!2sKhulna%20Division!5e0!3m2!1sen!2sbd!4v160227173399', 'Khulna01.jpg', 'Khulna02.jpg', 'Khulna03.jpg'),
(5, 'Barisal Division', 'barisal-division', 'Barisal Division is one of the eight administrative divisions of Bangladesh. Located in the south-central part of the country, it has an area of 13,644.85 km2 (5,268.31 sq mi), and a population of 8,325,666 at the 2011 Census. It is bounded by Dhaka Division on the north, the Bay of Bengal on the south, Chittagong Division on the east and Khulna Division on the west. The administrative capital, Barisal city, lies in the Padma River delta on an offshoot of the Arial Khan River. Barisal division is criss-crossed by numerous rivers that earned it the nickname \'Dhan-Nodi-Khal, Ei tine Borishal\' (rice, river and canal built Barisal).', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d944193.052095888!2d89.88157626144108!3d22.419459607910905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37553407fbece487%3A0x551ccc6958ff9fe2!2sBarisal%20Division!5e0!3m2!1sen!2sbd!4v160227263144', 'Barisal01.jpg', 'Barisal02.jpg', 'Barisal03.jpg'),
(6, 'Rangpur Division', 'rangpur-division', 'Rangpur Division (Bengali: রংপুর বিভাগ)  was formed on 25 January 2010,[1] as Bangladesh\'s 7th division. Before that, it was under Rajshahi Division. The Rangpur division consists of eight districts. Mansingh, commander of Emperor Akbar, conquered part of Rangpur in 1575. Rangpur came completely under the Mughal empire in 1686. Mughalbasa and Mughalhat of Kurigram district still bear marks of the Mughal rule in the region. During the Mughal rule part of Rangpur was under the sarkar of Ghoraghat, and part under the sarkar of Pinjarah.[2] Rangapur Ghoraghat has been mentioned in the Riyaz-us-Salatin. During the early period of the company rule Fakir-Sannyasi Rebellion and peasant rebellion were held in Rangpur.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1837273.2709587382!2d87.9988470585682!3d25.921287564430944!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e34f729a27462f%3A0x3e88b71f77421fc9!2sRangpur%20Division!5e0!3m2!1sen!2sbd!4v16022732277', 'Rangpur01.jpg', 'Rangpur02.jpg', 'Rangpur03.jpg'),
(7, 'Sylhet Division', 'sylhet-division', 'Sylhet Division (Bengali: সিলেট বিভাগ) is the northeastern division of Bangladesh. It is bordered by the Indian states of Meghalaya, Assam and Tripura to the north, east and south respectively, and by the Bangladeshi divisions of Chittagong to the southwest and Dhaka and Mymensingh to the west.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1857566.3603996714!2d90.59184498585961!3d24.58714969301926!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375054d3d270329f%3A0x866f1ac20b3574a9!2sSylhet%20Division!5e0!3m2!1sen!2sbd!4v1602273913302!5m2!1sen!2sbd', 'Sylhet01.jpg', 'Sylhet02.jpg', 'Sylhet03.jpg'),
(8, 'Mymensingh Division', 'mymensingh-division', 'Mymensingh Division (Bengali: ময়মনসিংহ বিভাগ) is one of the eight administrative divisions of Bangladesh. It has an area of 10,485 square kilometres (4,048 sq mi) and a population of 11,370,000 as of the 2011 census. It was created in 2015 from districts previously comprising the northern part of Dhaka Division. Its headquarters are in Mymensingh city in Mymensingh District.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d926881.5422650422!2d89.88007943915888!3d24.842288838960574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37564d8ee3d6c3b9%3A0x87bc5962c691ec87!2sMymensingh%20Division!5e0!3m2!1sen!2sbd!4v1602274091140!5m2!1sen!2sbd', 'Mymensingh01.jpg', 'Mymensingh02.jpg', 'Mymensingh03.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `division_place_types`
--

CREATE TABLE `division_place_types` (
  `id` int(11) NOT NULL,
  `division` int(11) NOT NULL,
  `place` int(11) NOT NULL,
  `types` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `division_place_types`
--

INSERT INTO `division_place_types` (`id`, `division`, `place`, `types`) VALUES
(1, 1, 3, 2),
(2, 2, 2, 1),
(4, 1, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `pl_image1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pl_image2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pl_image3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `map_url` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `highway` text COLLATE utf8_unicode_ci NOT NULL,
  `activities` text COLLATE utf8_unicode_ci NOT NULL,
  `tips` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `money` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `resturl` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `hotelurl` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `storeurl` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `libraurl` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`id`, `name`, `slug`, `description`, `pl_image1`, `pl_image2`, `pl_image3`, `map_url`, `location`, `highway`, `activities`, `tips`, `money`, `resturl`, `hotelurl`, `storeurl`, `libraurl`, `district_id`) VALUES
(1, 'No place', 'no-place', 'No description', 'Noimage.jpg', 'Noimage.jpg', 'Noimage.jpg', 'https://www.google.com/maps/embed?', 'No location', 'No highway  ', 'No activities\r\n', NULL, NULL, 'https://www.google.com/maps/embed?', 'https://www.google.com/maps/embed?', 'https://www.google.com/maps/embed?', 'https://www.google.com/maps/embed?', 1),
(2, 'Cox\'s Bazaar', 'coxs bazaar', 'Cox\'s Bazar (Bengali: কক্সবাজার, pronounced [kɔksbadʒaɾ]) is a city, fishing port, tourism centre and district headquarters in southeastern Bangladesh. It is famous mostly for its long natural sandy beach, and it is infamous for the largest refugee camp in the world. It is located 150 km (93 mi) south of the divisional headquarter city of Chittagong. Cox\'s Bazar is also known by the name Panowa, which translates literally as \"yellow flower\". Another old name was \"Palongkee\".\r\n\r\nThe modern Cox\'s Bazar derives its name from Captain Hiram Cox, an officer of the British East India Company, a Superintendent of Palongkee outpost. To commemorate his role in refugee rehabilitation work, a market was established and named after him.\r\n\r\nThe municipality covers an area of 6.85 km2 (2.64 sq mi) with 27 mahallas and 9 wards and as of 2012 had a population of 51,918.[2] Cox\'s Bazar is connected by road and air with Chittagong.', 'Cox\'sBazar01.jpg', 'Cox\'sBazar02.jpg', 'Cox\'sBazar03.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118830.37497975871!2d91.9328615837798!3d21.45088357869265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30adc7ea2ab928c3%3A0x3b539e0a68970810!2sCox&#39;s%20Bazar!5e0!3m2!1sen!2sbd!4v1600109687221', 'Cox\'s Bazar, Cox\'s Bazar District, Chittagong', 'We don\'t know yet', 'Walking on the beach', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d21010.906186255517!2d91.97085153167251!3d21.419866186183672!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1shotels%20near%20Cox&#39;s%20Bazar!5e0!3m2!1sen!2sbd!4v1601901813919!5m2!1sen!2sbd', 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d14856.950225448696!2d91.97085152884767!3d21.419905682744584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1srestaurants%20near%20Cox&#39;s%20Bazar!5e0!3m2!1sen!2sbd!4v1601903474771!5m2!1sen!2sbd', 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d59427.76183426372!2d91.94458661401062!3d21.420001696515417!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sstore%20near%20Cox&#39;s%20Bazar!5e0!3m2!1sen!2sbd!4v1601903840497!5m2!1sen!2sbd', 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d59427.63770521757!2d91.94458652361024!3d21.42030675780614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1slibraries%20near%20Cox&#39;s%20Bazar!5e0!3m2!1sen!2sbd!4v1601903908207!5m2!1sen!2sbd', 15),
(3, 'Sonargaon', 'sonargaon', 'Sonargaon (Bengali: সোনারগাঁও; also transcribed as Sunārgāon,[1] meaning City of Gold) was a historic administrative, commercial and maritime center in Bengal. Situated in the center of the Ganges delta, it was the seat of the medieval Muslim rulers and governors of eastern Bengal. Sonargaon was described by numerous historic travelers, including Ibn Battuta, Ma Huan, Niccol&ograve; de\' Conti and Ralph Fitch as a thriving center of trade and commerce.\r\nIt was an administrative center of Fakhruddin Mubarak Shah\'s sultanate, the Bengal Sultanate and the Kingdom of Bhati.\r\nIt was the capital city of the ancient kingdom ruled by Isa Khan of Bengal. It is a historical place. It is an example of a Moghul Palace and old museum. &ldquo;The city of Panam&rdquo; is another name of Sonargaon. Panam City and few majestic buildings are the attractive remains of its old glory. Here you can also see Sadarbari, Khasnagar dighi, Dulalpur Nilkuthi, Goaldi Shahi Mosque, Aminpur Moth, Damodardi Moth etc. It is a mix of Indian, European and Mughal architecture. The Folklore Museum is another attraction, which is visited by many people everyday. This Museum of Sonargaon houses a variety of artifacts from all over Bangladesh, representing the many cultural groups that exist in Bangladesh. At Shilpacharya Zainul Folk Art &amp; Craft\'s Museum in Sonargaon, you will find some historical and archeological things. This is a Picnic spot now. There is also have a large Dighi (pond), you can enjoy boat riding and fishing with borsi in this pond.', 'Sonargaon01.jpg', 'Sonargaon02.jpg', 'Sonargaon03.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29238.95763451208!2d90.57970034741183!3d23.644836817037216!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b34a23050595%3A0xe92de4bde15fc703!2sSonargaon!5e0!3m2!1sen!2sbd!4v1482076258953', 'Sonargaon, Narayanganj, Dhaka', 'You can reach that place using bus from Dhaka(Gulistan). This will take you around 1 hour to reach at the place. You have to get down from the bus at Mograpara Crossing.From the crossing, you have to take a rickshaw, and have to tell the puller to drop you at Sonargaon. This will require 20 taka for the lift.', '&bull;	Sight seeing\r\n&bull;	Marketing from local hut', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d29239.271669728256!2d90.58394523873444!3d23.64343124150449!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1srestaurant%20near%20Sonargaon!5e0!3m2!1sen!2sbd!4v1602285454378!5m2!1sen!2sbd', 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d330850.9370668244!2d90.51398429290678!3d23.625091037575693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1shotel%20near%20Sonargaon!5e0!3m2!1sen!2sbd!4v1602285502039!5m2!1sen!2sbd', 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d29238.77876696482!2d90.58209897126082!3d23.645637366720667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sstore%20near%20Sonargaon!5e0!3m2!1sen!2sbd!4v1602285557323!5m2!1sen!2sbd', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3654.734680260872!2d90.59917201448191!3d23.649670998534848!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b34cad04e2a7%3A0xbf80bdcba599241!2sSonargaon%20Folk%20Museum%20Library!5e0!3m2!1sen!2s', 6),
(4, 'Lalbagh Fort', 'lalbagh-fort', 'Lalbagh Fort (also Fort Aurangabad) is an incomplete 17th-century Mughal fort complex that stands before the Buriganga River in the southwestern part of Dhaka, Bangladesh.[1] The construction was started in 1678 AD by Mughal Subahdar Muhammad Azam Shah, who was son of Emperor Aurangzeb and later emperor himself. His successor, Shaista Khan, did not continue the work, though he stayed in Dhaka up to 1688.', 'LalbaghFort01.jpg', 'LalbaghFort02.jpg', 'LalbaghFort03.jpg', 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d20663.209197375116!2d90.38042193667178!3d23.719769207244045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1slalbagh%20fort%20map!5e0!3m2!1sen!2sbd!4v1600640454671!5m2!1sen!2sbd', 'Lalbagh Rd, Dhaka 1211', 'Visiting hours of lalbagh fort \r\nDuring summer season- it mostly opens at 10 AM and closes at 6 PM\r\nDuring winter season- it mostly opens at 9 AM and closes at 5 PM\r\n', 'There are different parts of the area that is open for sight seeing: \r\nThe mosque\r\nThe tomb of Pari bibi\r\nResidence of the governor\r\nThe south gate\r\nSecret tunnels\r\n\r\n', 'Sunday is weekly Holiday.', 'If you journey from Gulistan or any part from Dhaka, you can actually fulfill your whole expense in 500tk', 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d7305.509214113937!2d90.37941182304421!3d23.720455660896345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1srestaurant%20near%20Lalbagh%20Fort%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1602286300671!5m2!1sen!2sbd', 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d29221.82861556619!2d90.37535882772292!3d23.72138487297089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1shotel%20near%20Lalbagh%20Fort%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1602286264038!5m2!1sen!2sbd', 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d29221.845784334553!2d90.37535883883541!3d23.721308263825083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sstore%20near%20Lalbagh%20Fort%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1602286231723!5m2!1sen!2sbd', 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d29221.862953062067!2d90.37535884994792!3d23.721231654628266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1slibrary%20near%20Lalbagh%20Fort%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1602286184248!5m2!1sen!2sbd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `slug`, `views`, `image`, `body`, `published`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tours in Coxsbazaar', 'Tours in Coxsbazaar', 1, '2030779_New Project(10).jpg', 'Tours can change your life perspective. No matter how far or less far you are going.', 1, '2020-10-26 20:19:21', '2020-09-08 22:00:31'),
(2, 1, 'Second post on Tourism', 'second-post-on-tourism', 0, 'Any01.jpg', 'This is the body of the second post on this site', 0, '2020-09-16 18:05:02', '2020-09-11 07:04:36'),
(3, 1, 'How to pack your bag light', 'how-to-pack-your-bag-light', 0, 'bag.jpg', '<p>Packing your bag for tour is no nonsense. If you wanna live in the moment, you shouldn&#39;t get all your focus on packing your bag - while touring. You need to think about it before you live your house and before you step on the road.</p>\r\n', 1, '2020-09-26 20:17:53', '2020-09-20 19:26:04'),
(4, 1, 'Enjoy life with hiking', 'enjoy life with hiking', 0, 'hiking.jpg', 'Hiking is my hobby. I cant wait to tell you all how i\'ve been hiking all my life.', 1, '2020-09-16 18:10:06', NULL),
(7, 1, 'paradise is very fragile', 'paradise-is-very-fragile', 0, 'download.jpg', '<p>Paradise is very fragile, and it seems like it&#39;s only getting worse Down here in Florida We&rsquo;re fighting red toxic tides Mass of fish kills Not to mention hurricanes and rising sea levels</p>\r\n', 1, '2020-09-20 20:47:24', '2020-09-20 20:47:20'),
(26, 4, 'Past the Bushes Cypress Thriving', 'past-the-bushes-cypress-thriving', 0, '92d58361e48734083779a187574866fa.jpg', '&lt;pre&gt;\r\n&lt;code&gt;$intLat = !empty($intLat) ? &amp;quot;&amp;#39;$intLat&amp;#39;&amp;quot; : &amp;quot;NULL&amp;quot;;&lt;/code&gt;&lt;/pre&gt;\r\n', 0, '2020-09-21 21:12:10', '2020-09-21 21:12:10'),
(27, 1, 'Violet bent backwords', 'violet-bent-backwords', 0, '136201154.jpg', '<p><em><strong>Violet Bent Backwards Over the Grass</strong></em>&nbsp;is the title for the upcoming book of poetry by&nbsp;<a href=\"https://lanadelrey.fandom.com/wiki/Lana_Del_Rey\">Lana Del Rey</a>.&nbsp;It is the first official book written by Del Rey. The book will be released September 29, 2020 accompanied by an&nbsp;<a href=\"https://lanadelrey.fandom.com/wiki/Violet_Bent_Backwards_Over_the_Grass_(audiobook)\">audiobook</a>.<a href=\"https://lanadelrey.fandom.com/wiki/Violet_Bent_Backwards_Over_the_Grass_(book)#cite_note-0\">[1]</a><a href=\"https://lanadelrey.fandom.com/wiki/Violet_Bent_Backwards_Over_the_Grass_(book)#cite_note-1\">[2]</a></p>\r\n', 0, '2020-09-21 21:28:16', '2020-09-21 21:28:16'),
(28, 1, 'City Life in Dhaka', 'city-life-in-dhaka', 1, 'd4tbtrv-21463926-b094-41ea-ab58-ba27e5dfe939.jpg', 'When this many people manage to survive in such conditions for so long, it makes you wonder if Dhaka is actually a paradise in disguise and we just haven&#39;t figured it out yet. Sure there are muggers, robbers, thieves, pickpockets, frauds, drug dealers and organised crime, but there are also people who are na&iuml;ve enough to be the victims and we can safely say that at least they aren&#39;t the bad guys. There are so many people in this city that you&#39;ll get lost in a crowd more often than finding yourself lost in a vacant alley. And if you really are lost, you will probably find help. In a way Dhaka is like Hogwarts &ndash; help will always be provided in Dhaka to those who are lucky enough to get it. The others get mugged, obviously.\r\n', 1, '2020-10-26 20:21:02', '2020-10-09 21:36:03'),
(29, 1, 'gfgfjgouoij', 'gfgfjgouoij', 0, 'clouds.gif', '&lt;p&gt;regtgrthrhrth&lt;/p&gt;\r\n', 0, '2020-10-09 21:37:08', '2020-10-09 21:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `post_topic_place`
--

CREATE TABLE `post_topic_place` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `place_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_topic_place`
--

INSERT INTO `post_topic_place` (`id`, `post_id`, `topic_id`, `place_id`) VALUES
(1, 1, 1, 2),
(2, 2, 1, 0),
(3, 3, 5, 0),
(4, 4, 3, 2),
(5, 7, 6, 1),
(19, 28, 1, 4),
(20, 29, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rating_info`
--

CREATE TABLE `rating_info` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `rating_action` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_info`
--

INSERT INTO `rating_info` (`user_id`, `post_id`, `rating_action`) VALUES
(2, 1, 'dislike'),
(2, 3, 'like'),
(2, 4, 'like'),
(4, 3, 'like');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `slug`) VALUES
(1, 'Personal', 'personal'),
(2, 'Review', 'review'),
(3, 'Research', 'research'),
(4, 'Listing', 'listing'),
(5, 'How-to', 'how-to'),
(6, 'Nostalgia', 'nostalgia'),
(7, 'Expert opinion', 'expert opinion'),
(8, 'Blog collections', 'blog collections'),
(9, 'Summer Holiday', 'summer-holiday');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `title`, `slug`, `views`, `image`, `description`) VALUES
(1, 'Old-Dhaka Tours', 'old-dhaka-tours', 2, 'd4tbtrv-21463926-b094-41ea-ab58-ba27e5dfe939.jpg', '<p>Half day Old Dhaka tour lasts for 3/4 hours, an ideal trip for a person having short time between business meeting or has couples of hours before leaving Bangladesh after couples of days official trip. This will be a very brief introduction trip to Old part of Dhaka city. Walking through the heritage and chaotic habitation would give an experience that you have never thought of. Within this short time our guide will try to take you to as many as possible, hence although we have quite a big list of attractions. Key places are Armenian Church, Pink Palace, Sadarghat River front, Star Mosque, Dhakeswari Hindu Temple, Lalbagh Fort, National Parliament Building (from Outside), Curzon Hall. Walk through Shankharia &amp; Tanti Bazar (Hindu Street). This is about 4/5 hours trip, so it could also be started by the afternoon, museum might be closed by then. Better to start 8 O&rsquo;clock in the morning from the Diplomatic zone, depending on the distance of starting point, time could be modified.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Trip Shall Include;</p>\r\n\r\n<p>o Air-conditioned vehicle, and driver.</p>\r\n\r\n<p>o Local English speaking guide.</p>\r\n\r\n<p>o All entrance fees and necessary permits.</p>\r\n\r\n<p>o Bottled water for drinking.</p>\r\n\r\n<p>o All rickshaw and boat rides.</p>\r\n\r\n<p>o All tips except our guide and driver.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&bull; Trip price does not include any expenses of personal nature like &ndash; drink, beverage, or any others.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Some tips to keep in mind;</p>\r\n\r\n<p>- This trip includes some visits to religious places, therefore it is advised to wear long trousers and sleeves. Covering the head by scarf of any women visitor is not mandatory but appreciated.</p>\r\n\r\n<p>- Ahsan Manjil (Pink Palace) Museum closed on Thursday, Friday visiting hours 3 pm to 7 pm and all other days 10:30 am to 5:30 pm (April - September), 9:30 am to 4:30 pm (October to March).</p>\r\n\r\n<p>- Lalbagh Fort closed on Sunday and all other govt. Holidays, Friday prayer break 12:30 pm to 2:30 pm and all other day visiting hours are 10 am to 6 pm (April to September), 9 am to 5 pm (October to March). Ramadan schedule 10 am - 4 pm, prayer break 1pm - 1:30 pm on regular day and Friday 2 pm - 4 pm opens.</p>\r\n\r\n<p>- Liberation war Museum 10 am to 6 pm (April to September), 10 am to 5 pm (October to March) and Ramadan timing is 10am to 3:30 pm. This museum is closed on Sunday. &nbsp;</p>\r\n\r\n<p>- Taking pictures is welcomed and without any financial expectation in general, better to take permission before taking any pictures of any young girls, soldiers and the tribal peoples. It is prohibited to take pictures inside of any museums in the country.&nbsp; &nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&bull; We&rsquo;ll require the full payment in advance in order to confirm the reservation.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `slug`) VALUES
(1, 'Traditional ', 'traditional'),
(2, 'Cultural ', 'cultural'),
(3, 'Modern', 'modern');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('Author','Admin') COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `role`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Sabrina', 'sabrinakhan.saama@gmail.com', 'Admin', 'e10adc3949ba59abbe56e057f20f883e', '2020-09-09 06:52:58', '2020-09-09 06:52:58'),
(2, 'Adnan', 'adnan@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', '2020-09-16 20:27:39', '2020-09-16 20:27:39'),
(3, 'Shadman', 'shadmanhasan@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', '2020-09-16 21:10:00', '2020-09-16 21:10:00'),
(4, 'Auntu', 'Auntu@gmail.com', 'Author', 'e10adc3949ba59abbe56e057f20f883e', '2020-09-19 20:44:38', '2020-09-19 20:44:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `district_ibfk_1` (`division`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `division_place_types`
--
ALTER TABLE `division_place_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `place` (`place`),
  ADD KEY `division` (`division`),
  ADD KEY `division_place_types_ibfk_3` (`types`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post_topic_place`
--
ALTER TABLE `post_topic_place`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_id` (`post_id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `post_topic_place_ibfk_4` (`topic_id`),
  ADD KEY `post_topic_place_ibfk_5` (`place_id`);

--
-- Indexes for table `rating_info`
--
ALTER TABLE `rating_info`
  ADD UNIQUE KEY `UC_rating_info` (`user_id`,`post_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `division_place_types`
--
ALTER TABLE `division_place_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `post_topic_place`
--
ALTER TABLE `post_topic_place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`division`) REFERENCES `division` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `division_place_types`
--
ALTER TABLE `division_place_types`
  ADD CONSTRAINT `division_place_types_ibfk_1` FOREIGN KEY (`division`) REFERENCES `division` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `division_place_types_ibfk_3` FOREIGN KEY (`types`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `division_place_types_ibfk_4` FOREIGN KEY (`place`) REFERENCES `place` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `place`
--
ALTER TABLE `place`
  ADD CONSTRAINT `place_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `post_topic_place`
--
ALTER TABLE `post_topic_place`
  ADD CONSTRAINT `post_topic_place_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `post_topic_place_ibfk_4` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_topic_place_ibfk_5` FOREIGN KEY (`place_id`) REFERENCES `place` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
