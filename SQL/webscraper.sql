-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2019 at 11:41 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webscraper`
--

-- --------------------------------------------------------

--
-- Table structure for table `dexel_scraper`
--

CREATE TABLE `dexel_scraper` (
  `id` int(11) NOT NULL,
  `Brand_name` varchar(10000) NOT NULL,
  `Pattern_name` varchar(10000) NOT NULL,
  `Tyre_size` varchar(10000) NOT NULL,
  `Price` varchar(10000) NOT NULL,
  `Url` varchar(10000) NOT NULL,
  `Scrape_date` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dexel_scraper`
--

INSERT INTO `dexel_scraper` (`id`, `Brand_name`, `Pattern_name`, `Tyre_size`, `Price`, `Url`, `Scrape_date`) VALUES
(1, 'BUDGET', 'BUD', '205/55. 16 V (91)', '46.36', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(2, 'BUDGET', 'BUDGET', '205/55. 16 H (91)', '46.36', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(3, 'BUDGET', 'BUDGET', '205/55. 16 W (91)', '47.52', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(4, 'KINGSTAR', 'ROAD FIT SK10', '205/55. 16 V (91)', '59.36', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(5, 'KINGSTAR', 'ROAD FIT SK10', '205/55. 16 W (91)', '59.74', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(6, 'UNIROYAL', 'RAINSPORT 3', '205/55. 16 H (91)', '63.68', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(7, 'UNIROYAL', 'RAINSPORT 3', '205/55. 16 V (91)', '64.32', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(8, 'UNIROYAL', 'RAINSPORT 3', '205/55. 16 Y (91)', '66.00', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(9, 'HANKOOK', 'K125 VENTUS PRIME 3', '205/55. 16 H (91)', '66.34', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(10, 'HANKOOK', 'KINERGY ECO K425', '205/55. 16 H (91)', '66.34', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(11, 'HANKOOK', 'K125 VENTUS PRIME 3', '205/55. 16 H (91)', '66.34', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(12, 'HANKOOK', 'K125 VENTUS PRIME 3', '205/55. 16 V (91)', '67.41', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(13, 'HANKOOK', 'K125 VENTUS PRIME 3', '205/55. 16 W (94)', '69.06', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(14, 'UNIROYAL', 'RAINSPORT 3', '205/55. 16 V (94)', '69.68', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(15, 'HANKOOK', 'K125 VENTUS PRIME 3', '205/55. 16 W (94)', '70.92', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(16, 'UNIROYAL', 'RAINSPORT 3', '205/55. 16 Y (94)', '71.38', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(17, 'HANKOOK', 'KINERGY 4S H750', '205/55. 16 H (94)', '73.62', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(18, 'YOKOHAMA', 'BLUEARTH-A AE50', '205/55. 16 W (91)', '74.46', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(19, 'DUNLOP', 'SP SPORT BLURESPONSE', '205/55. 16 V (91)', '75.46', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(20, 'DUNLOP', 'FASTRESPONSE', '205/55. 16 V (91)', '75.46', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(21, 'PIRELLI', 'CINTURATO P7', '205/55. 16 V (91)', '75.87', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(22, 'FIRESTONE', 'RHAWK', '205/55. 16 W (91)', '75.91', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(23, 'BUDGET', 'BUDGET', '205/55. 16 H (91)', '76.36', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(24, 'BRIDGESTONE', 'TURANZA ER300', '205/55. 16 V (91)', '76.44', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(25, 'DUNLOP', 'SPORT MAXX RT', '205/55. 16 Y (91)', '76.84', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(26, 'DUNLOP', 'SP SPORT BLURESPONSE', '205/55. 16 W (91)', '76.84', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(27, 'GOODYEAR', 'EFFIGRIP PERFORM', '205/55. 16 H (91)', '77.05', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(28, 'GOODYEAR', 'EFFIGRIP PERFORM', '205/55. 16 V (91)', '77.05', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(29, 'BRIDGESTONE', 'TURANZA ER300', '205/55. 16 H (91)', '77.60', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(30, 'GOODYEAR', 'EFFIGRIP PERFORM', '205/55. 16 W (91)', '78.43', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(31, 'HANKOOK', 'VENTUS PRIME2 K115', '205/55. 16 W (91)', '78.52', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(32, 'BRIDGESTONE', 'TURANZA T001', '205/55. 16 W (91)', '79.50', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(33, 'CONTINENTAL', 'PREMIUMCONTACT 2', '205/55. 16 H (91)', '80.22', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(34, 'CONTINENTAL', 'CONTIECOCONTACT 5', '205/55. 16 H (91)', '80.22', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(35, 'CONTINENTAL', 'PREMIUMCONTACT 5', '205/55. 16 H (91)', '80.22', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(36, 'YOKOHAMA', 'BLUEARTH-A AE50', '205/55. 16 V (94)', '80.23', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(37, 'CONTINENTAL', 'PREMIUMCONTACT 5', '205/55. 16 V (91)', '80.32', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(38, 'CONTINENTAL', 'CONTISPORTCONTACT 2', '205/55. 16 V (91)', '80.32', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(39, 'CONTINENTAL', 'PREMIUMCONTACT 5', '205/55. 16 V (91)', '80.32', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(40, 'CONTINENTAL', 'CONTIECOCONTACT 5', '205/55. 16 V (91)', '80.32', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(41, 'CONTINENTAL', 'CONTIECOCONTACT 5', '205/55. 16 V (91)', '80.32', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(42, 'FIRESTONE', 'RHAWK', '205/55. 16 V (94)', '80.35', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(43, 'HANKOOK', 'ICEPT RS2 W452', '205/55. 16 H (94)', '80.64', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(44, 'BRIDGESTONE', 'POTENZA S-02', '205/55. 16 W (91)', '80.66', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(45, 'BRIDGESTONE', 'DRIVEGUARD', '205/55. 16 W (94)', '80.86', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(46, 'CONTINENTAL', 'PREMIUMCONTACT 2', '205/55. 16 W (91)', '82.03', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(47, 'CONTINENTAL', 'CONTISPORTCONTACT 2', '205/55. 16 W (91)', '82.03', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(48, 'CONTINENTAL', 'CONTIECOCONTACT 5', '205/55. 16 W (91)', '82.03', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(49, 'CONTINENTAL', 'PREMIUMCONTACT 5', '205/55. 16 W (91)', '82.03', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(50, 'CONTINENTAL', 'PREMIUMCONTACT 5', '205/55. 16 W (91)', '82.03', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(51, 'PIRELLI', 'CINTURATO P7', '205/55. 16 V (91)', '83.40', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(52, 'MICHELIN', 'PRIMACY 3', '205/55. 16 V (91)', '84.07', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(53, 'MICHELIN', 'ENERGY SAVER +', '205/55. 16 H (91)', '85.11', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(54, 'MICHELIN', 'ENERGY SAVER +', '205/55. 16 V (91)', '85.11', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(55, 'BRIDGESTONE', 'TURANZA ER300', '205/55. 16 V (91)', '85.29', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(56, 'CONTINENTAL', 'CONTIECOCONTACT 5', '205/55. 16 H (94)', '86.62', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(57, 'PIRELLI', 'CINTURATO P7', '205/55. 16 H (91)', '87.51', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(58, 'PIRELLI', 'CINTURATO P7 BLUE', '205/55. 16 V (91)', '87.81', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(59, 'MICHELIN', 'ENERGY SAVER', '205/55. 16 W (91)', '87.90', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(60, 'PIRELLI', 'CINTURATO P7', '205/55. 16 W (91)', '88.28', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(61, 'PIRELLI', 'CINTURATO P7', '205/55. 16 W (91)', '88.28', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(62, 'PIRELLI', 'CINTURATO P7 BLUE', '205/55. 16 V (91)', '89.04', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(63, 'CONTINENTAL', 'CONTI eCONTACT', '205/55. 16 Q (91)', '89.80', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(64, 'CONTINENTAL', 'CONTIECOCONTACT 5', '205/55. 16 V (94)', '89.98', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(65, 'CONTINENTAL', 'CONTIPREMIUMCONTACT', '205/55. 16 V (91)', '91.99', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(66, 'CONTINENTAL', 'CONTIECOCONTACT 5', '205/55. 16 W (94)', '92.29', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(67, 'CONTINENTAL', 'PREMIUMCONTACT 5', '205/55. 16 W (94)', '92.29', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(68, 'GOODYEAR', 'ULTRAGRIP 9', '205/55. 16 H (91)', '92.68', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(69, 'MICHELIN', 'CROSSCLIMATE+', '205/55. 16 V (94)', '93.08', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(70, 'CONTINENTAL', 'CONTIECOCONTACT 5', '205/55. 16 H (94)', '94.59', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(71, 'PIRELLI', 'CINTURATO P7', '205/55. 16 W (91)', '99.69', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(72, 'GOODYEAR', 'EFFICIENTGRIP', '205/55. 16 V (91)', '99.76', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(73, 'VREDESTEIN', 'SNOWTRAC 5', '205/55. 16 H (91)', '100.04', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(74, 'GOODYEAR', 'ULTRAGRIP 8', '205/55. 16 H (94)', '105.28', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(75, 'MICHELIN', 'PRIMACY 3', '205/55. 16 V (91)', '106.60', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(76, 'MICHELIN', 'PRIMACY 3', '205/55. 16 W (91)', '106.60', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(77, 'MICHELIN', 'PRIMACY 3', '205/55. 16 H (91)', '106.60', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(78, 'GOODYEAR', 'UGRIP PERF 2', '205/55. 16 H (91)', '107.62', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(79, 'CONTINENTAL', 'WINTER TS830 P', '205/55. 16 H (91)', '110.54', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am'),
(80, 'VREDESTEIN', 'WINTRAC XTREME S', '205/55. 16 V (94)', '123.94', 'http://www.dexel.co.uk/shopping/tyre-results?width=205&profile=55&rim=16&speed=.', '16/03/2019 08:55:34 am');

-- --------------------------------------------------------

--
-- Table structure for table `national_scraper`
--

CREATE TABLE `national_scraper` (
  `id` int(11) NOT NULL,
  `Brand_name` varchar(10000) NOT NULL,
  `Pattern_name` varchar(10000) NOT NULL,
  `Tyre_size` varchar(10000) NOT NULL,
  `Price` varchar(10000) NOT NULL,
  `Url` varchar(10000) NOT NULL,
  `Scrape_date` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `national_scraper`
--

INSERT INTO `national_scraper` (`id`, `Brand_name`, `Pattern_name`, `Tyre_size`, `Price`, `Url`, `Scrape_date`) VALUES
(1, 'Budget', 'DISCOUNT', '165/60. 15 H (77)', '50.51', 'https://www.national.co.uk/tyres-search?Width=165&Profile=60&Diameter=15&Rating=H&LoadIndex=77', '16/03/2019 02:05:42 pm'),
(2, 'Yokohama', 'BluEarth AE01', '165/60. 15 H (77)', '58.01', 'https://www.national.co.uk/tyres-search?Width=165&Profile=60&Diameter=15&Rating=H&LoadIndex=77', '16/03/2019 02:05:43 pm'),
(3, 'Continental', 'ContiEcoContact 5', '165/60. 15 H (77)', '77.65', 'https://www.national.co.uk/tyres-search?Width=165&Profile=60&Diameter=15&Rating=H&LoadIndex=77', '16/03/2019 02:05:43 pm');

-- --------------------------------------------------------

--
-- Table structure for table `thetyregroup_scraper`
--

CREATE TABLE `thetyregroup_scraper` (
  `id` int(11) NOT NULL,
  `Brand_name` varchar(10000) NOT NULL,
  `Pattern_name` varchar(10000) NOT NULL,
  `Tyre_size` varchar(10000) NOT NULL,
  `Price` varchar(10000) NOT NULL,
  `Url` varchar(10000) NOT NULL,
  `Scrape_date` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thetyregroup_scraper`
--

INSERT INTO `thetyregroup_scraper` (`id`, `Brand_name`, `Pattern_name`, `Tyre_size`, `Price`, `Url`, `Scrape_date`) VALUES
(1, 'CONTINENTAL', 'PREMIUM CONTACT', '205/55. 16 H (91)', '69.81', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:08 pm'),
(2, 'CONTINENTAL', 'ECOCONTACT 5', '205/55. 16 H (91)', '69.81', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:08 pm'),
(3, 'CONTINENTAL', 'PREMIUM CONTACT', '205/55. 16 H (91)', '69.81', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:08 pm'),
(4, 'CONTINENTAL', 'PREM CONTACT', '205/55. 16 H (91)', '69.81', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:08 pm'),
(5, 'CONTINENTAL', 'PREM CONTACT', '205/55. 16 H (91)', '69.81', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:08 pm'),
(6, 'CONTINENTAL', 'ECOCONTACT 6', '205/55. 16 H (91)', '69.81', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:09 pm'),
(7, 'CONTINENTAL', 'PREMIUM CONTACT', '205/55. 16 V (91)', '69.93', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:09 pm'),
(8, 'CONTINENTAL', 'ECO CONTACT', '205/55. 16 V (91)', '69.93', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:09 pm'),
(9, 'CONTINENTAL', 'PREM CONTACT', '205/55. 16 V (91)', '69.93', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:09 pm'),
(10, 'CONTINENTAL', 'SPT CONTACT', '205/55. 16 V (91)', '69.93', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:09 pm'),
(11, 'CONTINENTAL', 'PREMIUM CONTACT', '205/55. 16 V (91)', '69.93', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:09 pm'),
(12, 'CONTINENTAL', 'PREM CONTACT', '205/55. 16 V (91)', '69.93', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:09 pm'),
(13, 'CONTINENTAL', 'ECOCONTACT 6', '205/55. 16 V (91)', '69.93', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:09 pm'),
(14, 'CONTINENTAL', 'ECO CONTACT', '205/55. 16 V (91)', '69.93', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:09 pm'),
(15, 'CONTINENTAL', 'ECOCONTACT 5', '205/55. 16 V (91)', '69.93', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:09 pm'),
(16, 'CONTINENTAL', 'PREMIUM CONTACT', '205/55. 16 V (91)', '69.93', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:09 pm'),
(17, 'CONTINENTAL', 'PREM CONTACT', '205/55. 16 V (91)', '69.93', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:09 pm'),
(18, 'CONTINENTAL', 'ECOCONTACT 5', '205/55. 16 W (91)', '71.78', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:09 pm'),
(19, 'CONTINENTAL', 'PREMIUM CONTACT', '205/55. 16 Y (91)', '73.29', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:09 pm'),
(20, 'CONTINENTAL', 'PREM CONTACT', '205/55. 16 W (91)', '75.09', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:09 pm'),
(21, 'CONTINENTAL', 'SPORT CONTACT', '205/55. 16 Y (91)', '75.09', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:09 pm'),
(22, 'CONTINENTAL', 'PREM CONTACT', '205/55. 16 W (91)', '75.09', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:09 pm'),
(23, 'CONTINENTAL', 'ECOCONTACT 6', '205/55. 16 W (91)', '75.09', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:09 pm'),
(24, 'CONTINENTAL', 'SPT CONTACT', '205/55. 16 W (91)', '75.09', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:09 pm'),
(25, 'CONTINENTAL', 'PREM CONTACT', '205/55. 16 W (91)', '75.09', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:09 pm'),
(26, 'CONTINENTAL', 'ECOCONTACT 6', '205/55. 16 W (91)', '75.09', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:09 pm'),
(27, 'CONTINENTAL', 'ALL SEASON', '205/55. 16 H ()', '76.06', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:09 pm'),
(28, 'CONTINENTAL', 'ECOCONTACT 6', '205/55. 16 H (94)', '76.70', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:09 pm'),
(29, 'CONTINENTAL', 'ECOCONTACT 5', '205/55. 16 H (94)', '76.70', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:09 pm'),
(30, 'CONTINENTAL', 'ALL SEASON', '205/55. 16 V ()', '78.42', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:09 pm'),
(31, 'CONTINENTAL', 'CONTI .ECONTACT', '205/55. 16 Q ()', '80.14', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:09 pm'),
(32, 'CONTINENTAL', 'ECOCONTACT 6', '205/55. 16 V (94)', '80.34', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:09 pm'),
(33, 'CONTINENTAL', 'ECOCONTACT 5', '205/55. 16 V (94)', '80.34', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:10 pm'),
(34, 'CONTINENTAL', 'PREMIUM CONTACT', '205/55. 16 V ()', '82.51', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:10 pm'),
(35, 'CONTINENTAL', 'PREMIUM CONTACT', '205/55. 16 V ()', '82.51', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:10 pm'),
(36, 'CONTINENTAL', 'ECO CONT', '205/55. 16 H (94)', '85.30', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:10 pm'),
(37, 'CONTINENTAL', 'PREMIUM CONTACT', '205/55. 16 W (94)', '85.84', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:10 pm'),
(38, 'CONTINENTAL', 'ECO CONTACT', '205/55. 16 W (94)', '85.84', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:10 pm'),
(39, 'CONTINENTAL', 'ECOCONTACT 6', '205/55. 16 W (91)', '88.41', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:10 pm'),
(40, 'CONTINENTAL', 'PREMIUM CONTACT', '205/55. 16 W ()', '88.41', 'http://www.thetyregroup.co.uk/tyre-results', '16/03/2019 10:37:10 pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dexel_scraper`
--
ALTER TABLE `dexel_scraper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `national_scraper`
--
ALTER TABLE `national_scraper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thetyregroup_scraper`
--
ALTER TABLE `thetyregroup_scraper`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dexel_scraper`
--
ALTER TABLE `dexel_scraper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `national_scraper`
--
ALTER TABLE `national_scraper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `thetyregroup_scraper`
--
ALTER TABLE `thetyregroup_scraper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
