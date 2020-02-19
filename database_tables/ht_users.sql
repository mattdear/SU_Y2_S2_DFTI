-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 19, 2020 at 09:07 AM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ephp039`
--

-- --------------------------------------------------------

--
-- Table structure for table `ht_users`
--

CREATE TABLE `ht_users` (
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `dayofbirth` int(11) DEFAULT NULL,
  `monthofbirth` varchar(255) DEFAULT NULL,
  `yearofbirth` int(11) DEFAULT NULL,
  `balance` float DEFAULT '100',
  `isadmin` int(11) DEFAULT '0',
  `creditcard` varchar(255) DEFAULT NULL,
  `expiry_month` int(11) DEFAULT NULL,
  `expiry_year` int(11) DEFAULT NULL,
  `securitycode` int(11) DEFAULT NULL,
  `mothersmaidenname` varchar(255) DEFAULT NULL,
  `ID` int(11) NOT NULL,
  `used` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_users`
--

INSERT INTO `ht_users` (`username`, `password`, `name`, `dayofbirth`, `monthofbirth`, `yearofbirth`, `balance`, `isadmin`, `creditcard`, `expiry_month`, `expiry_year`, `securitycode`, `mothersmaidenname`, `ID`, `used`) VALUES
('JohnStevenson', 'newyork905', 'John Stevenson', 17, '4', 1969, 100, 1, '1234567890123456', 4, 2016, 475, 'Ellis', 86, 1),
('TimWilson', 'egg882', 'Tim Wilson', 9, '10', 1971, 97.63, 0, '1234567890123456', 9, 2017, 349, 'Palmer', 88, 1),
('ChrisBrock', 'rome872', 'Chris Brock', 26, '8', 1964, 100, 0, '5555666677778888', 7, 2018, 619, 'Palmer', 85, 1),
('KatePalmer', 'cat381', 'Kate Palmer', 14, '5', 1976, 100, 0, '5555666677778888', 8, 2017, 441, 'Stevenson', 84, 1),
('TimStevenson', 'dog576', 'Tim Stevenson', 8, '5', 1965, 100, 0, '1111222233334444', 2, 2017, 954, 'Jones', 83, 1),
('MichelleBrown', 'paris747', 'Michelle Brown', 27, '9', 1963, 100, 0, '6543210987654321', 2, 2016, 142, 'White', 82, 1),
('KateStevenson', 'egg367', 'Kate Stevenson', 17, '5', 1979, 96.42, 0, '1111222233334444', 5, 2016, 995, 'Smith', 81, 1),
('EmilyWatson', 'egg716', 'Emily Watson', 1, '5', 1969, 100, 0, '1234567890123456', 5, 2017, 344, 'Jones', 92, 1),
('TomSmith', 'cake777', 'Tom Smith', 12, '9', 1979, 100, 0, '5555666677778888', 6, 2017, 510, 'Wilson', 90, 1),
('JohnEastman', 'cat537', 'John Eastman', 15, '5', 1968, 100, 0, '6543210987654321', 4, 2018, 165, 'Wilson', 93, 1),
('ChrisPalmer', 'vegas798', 'Chris Palmer', 6, '3', 1966, 100, 0, '1111222233334444', 5, 2018, 319, 'Green', 95, 1),
('JamieStevenson', 'egg578', 'Jamie Stevenson', 12, '11', 1968, 100, 0, '5555666677778888', 3, 2016, 569, 'Watson', 96, 1),
('HenryJones', 'dog841', 'Henry Jones', 16, '10', 1965, 100, 0, '6543210987654321', 3, 2018, 651, 'Palmer', 97, 1),
('MarkWatson', 'vegas584', 'Mark Watson', 27, '12', 1970, 100, 0, '5555666677778888', 12, 2016, 211, 'Stevenson', 98, 1),
('DaveEllis', 'egg101', 'Dave Ellis', 3, '10', 1977, 100, 0, '1234567890123456', 3, 2018, 498, 'Brock', 99, 1),
('RachelWatson', 'paris639', 'Rachel Watson', 18, '2', 1970, 100, 0, '1234567890123456', 7, 2017, 702, 'Jones', 100, 1),
('EdwardWilson', 'cat807', 'Edward Wilson', 2, '10', 1966, 100, 0, '6543210987654321', 6, 2017, 713, 'Smith', 101, 1),
('MichelleWilson', 'newyork406', 'Michelle Wilson', 24, '1', 1971, 100, 0, '1234567890123456', 6, 2018, 180, 'Palmer', 104, 1),
('SarahBrown', 'newyork791', 'Sarah Brown', 1, '7', 1971, 100, 0, '5555666677778888', 9, 2017, 861, 'Black', 105, 1),
('LisaSmith', 'dog832', 'Lisa Smith', 2, '9', 1976, 100, 0, '5555666677778888', 1, 2018, 699, 'Smith', 108, 1),
('TomGreen', 'rome319', 'Tom Green', 18, '12', 1976, 100, 1, '1234567890123456', 6, 2018, 418, 'Smith', 109, 1),
('RachelWhite', 'dog104', 'Rachel White', 19, '8', 1963, 100, 0, '6543210987654321', 10, 2018, 945, 'Eastman', 110, 1),
('TomBrown', 'rome708', 'Tom Brown', 12, '1', 1971, 100, 0, '1111222233334444', 4, 2018, 111, 'Cooper', 112, 1),
('JamieBlack', 'newyork191', 'Jamie Black', 22, '9', 1974, 100, 0, '5555666677778888', 9, 2018, 711, 'Cooper', 114, 1),
('AndyRobertson', 'cake501', 'Andy Robertson', 22, '11', 1970, 100, 0, '5555666677778888', 12, 2016, 349, 'Cooper', 115, 1),
('MarkGreen', 'rome576', 'Mark Green', 1, '12', 1974, 100, 0, '5555666677778888', 3, 2017, 769, 'Ellis', 116, 1),
('TomBrock', 'vegas112', 'Tom Brock', 24, '8', 1976, 100, 0, '1234567890123456', 11, 2018, 102, 'Black', 118, 1),
('LisaEastman', 'paris660', 'Lisa Eastman', 3, '5', 1965, 100, 0, '1234567890123456', 5, 2017, 653, 'Brock', 119, 1),
('LauraGreen', 'cake839', 'Laura Green', 19, '11', 1965, 100, 0, '5555666677778888', 11, 2017, 760, 'Brown', 121, 1),
('KateBrown', 'cat885', 'Kate Brown', 16, '1', 1963, 100, 0, '6543210987654321', 11, 2017, 362, 'Smith', 124, 1),
('AndyBrown', 'ab123', 'Andy Brown', 18, '1', 1973, 100, 1, '1234567890123456', 7, 2018, 730, 'Brock', 126, 1),
('TomBlack', 'rome624', 'Tom Black', 8, '8', 1975, 100, 0, '5555666677778888', 9, 2018, 726, 'Brock', 127, 1),
('MarkRobertson', 'dog732', 'Mark Robertson', 25, '2', 1978, 100, 0, '1111222233334444', 6, 2016, 179, 'Green', 128, 1),
('RachelGreen', 'egg808', 'Rachel Green', 20, '2', 1969, 100, 0, '1111222233334444', 6, 2017, 567, 'Black', 129, 1),
('JimRobertson', 'paris500', 'Jim Robertson', 18, '3', 1968, 100, 0, '5555666677778888', 6, 2018, 614, 'Brown', 130, 1),
('RachelWilson', 'cat303', 'Rachel Wilson', 18, '5', 1969, 100, 0, '1234567890123456', 3, 2018, 569, 'Watson', 131, 1),
('TomWhite', 'dog950', 'Tom White', 15, '3', 1966, 100, 0, '6543210987654321', 9, 2017, 893, 'Brock', 134, 1),
('ChrisSmith', 'cake881', 'Chris Smith', 12, '12', 1967, 100, 0, '5555666677778888', 2, 2016, 253, 'Stevenson', 135, 1),
('MarkPalmer', 'newyork999', 'Mark Palmer', 26, '2', 1970, 100, 0, '1111222233334444', 6, 2018, 517, 'Eastman', 136, 1),
('MichelleEastman', 'paris413', 'Michelle Eastman', 8, '8', 1971, 100, 0, '5555666677778888', 8, 2017, 945, 'White', 137, 1),
('TomWilson', 'vegas404', 'Tom Wilson', 3, '7', 1972, 100, 0, '1111222233334444', 9, 2017, 469, 'Green', 138, 1),
('LisaEllis', 'vegas888', 'Lisa Ellis', 18, '1', 1968, 100, 0, '1111222233334444', 3, 2018, 650, 'Cooper', 139, 1),
('JamieWilson', 'newyork403', 'Jamie Wilson', 1, '4', 1963, 100, 0, '5555666677778888', 2, 2018, 328, 'Stevenson', 140, 1),
('SarahJones', 'cake283', 'Sarah Smith', 17, '5', 1970, 100, 0, '1111222233334444', 2, 2017, 606, 'Jones', 141, 1),
('TimRobertson', 'egg249', 'Tim Robertson', 25, '9', 1964, 100, 0, '5555666677778888', 9, 2017, 624, 'Smith', 143, 1),
('SarahWatson', 'vegas705', 'Sarah Watson', 5, '5', 1977, 100, 0, '1111222233334444', 5, 2017, 480, 'Stevenson', 144, 1),
('SarahBrock', 'dog447', 'Sarah Brock', 4, '3', 1972, 100, 0, '1234567890123456', 2, 2017, 303, 'Watson', 146, 1),
('EmilyBlack', 'newyork867', 'Emily Black', 28, '11', 1972, 100, 0, '6543210987654321', 4, 2016, 786, 'Jones', 147, 1),
('TimBlack', 'newyork371', 'Tim Black', 4, '10', 1978, 100, 0, '6543210987654321', 7, 2018, 272, 'Stevenson', 148, 1),
('TimWhite', 'rome874', 'Tim White', 27, '4', 1968, 100, 0, '1111222233334444', 1, 2018, 890, 'White', 149, 1),
('LauraRobertson', 'vegas430', 'Laura Robertson', 7, '2', 1973, 100, 0, '6543210987654321', 1, 2017, 306, 'Wilson', 150, 1),
('EdwardWhite', 'egg433', 'Edward White', 7, '7', 1968, 94.06, 0, '6543210987654321', 10, 2018, 467, 'Green', 151, 1),
('RachelBlack', 'paris438', 'Rachel Black', 8, '3', 1976, 100, 0, '1234567890123456', 6, 2018, 231, 'Eastman', 152, 1),
('EdwardRobertson', 'egg115', 'Edward Robertson', 17, '1', 1965, 100, 0, '1111222233334444', 6, 2018, 812, 'Wilson', 153, 1),
('HenryRobertson', 'rome968', 'Henry Robertson', 9, '4', 1970, 100, 0, '1234567890123456', 6, 2016, 462, 'Jones', 158, 1),
('JamieJones', 'cat972', 'Jamie Jones', 17, '8', 1975, 100, 0, '6543210987654321', 10, 2018, 522, 'Stevenson', 159, 1),
('SarahGreen', 'cat858', 'Sarah Green', 10, '3', 1965, 100, 0, '1111222233334444', 9, 2016, 342, 'Jones', 161, 1),
('LisaRobertson', 'newyork861', 'Lisa Robertson', 27, '12', 1975, 100, 0, '1234567890123456', 1, 2017, 841, 'Ellis', 162, 1),
('TimWatson', 'cake926', 'Tim Watson', 17, '11', 1971, 100, 0, '6543210987654321', 3, 2017, 976, 'Cooper', 164, 1),
('MarkWhite', 'cat448', 'Mark White', 15, '4', 1977, 100, 0, '1234567890123456', 5, 2017, 649, 'Wilson', 165, 1),
('KateGreen', 'paris232', 'Kate Green', 25, '9', 1968, 100, 0, '1234567890123456', 9, 2018, 600, 'Brock', 166, 1),
('ChrisEastman', 'rome769', 'Chris Eastman', 16, '10', 1971, 100, 0, '5555666677778888', 8, 2017, 300, 'Eastman', 167, 1),
('KateEastman', 'paris700', 'Kate Eastman', 26, '2', 1979, 100, 0, '1111222233334444', 11, 2016, 809, 'Wilson', 168, 1),
('KateJones', 'egg713', 'Kate Jones', 13, '10', 1967, 100, 0, '1234567890123456', 4, 2016, 215, 'Smith', 169, 1),
('JimEllis', 'egg632', 'Jim Ellis', 20, '2', 1963, 100, 0, '5555666677778888', 12, 2017, 701, 'Jones', 170, 1),
('MichelleBlack', 'cake471', 'Michelle Black', 1, '4', 1972, 100, 0, '5555666677778888', 6, 2017, 972, 'White', 171, 1),
('TimBrock', 'paris772', 'Tim Brock', 8, '1', 1963, 100, 0, '1111222233334444', 6, 2017, 159, 'Wilson', 172, 1),
('JimBrown', 'rome743', 'Jim Brown', 21, '7', 1976, 100, 0, '6543210987654321', 9, 2017, 726, 'Brown', 173, 1),
('SarahStevenson', 'paris770', 'Sarah Stevenson', 20, '4', 1972, 100, 0, '1111222233334444', 12, 2016, 118, 'Ellis', 175, 1),
('JamieBrown', 'cake184', 'Jamie Brown', 28, '3', 1978, 99.21, 0, '6543210987654321', 3, 2017, 493, 'Jones', 176, 1),
('TimEllis', 'vegas276', 'Tim Ellis', 28, '12', 1964, 100, 0, '1111222233334444', 8, 2017, 305, 'Watson', 178, 1),
('ChrisEllis', 'paris880', 'Chris Ellis', 25, '11', 1969, 100, 0, '1234567890123456', 5, 2018, 104, 'Watson', 179, 1),
('AndySmith', 'paris962', 'Andy Smith', 19, '12', 1966, 100, 0, '6543210987654321', 8, 2018, 977, 'Ellis', 180, 1),
('JoshSucks', 'aaaaaa', 'Josh Nash', 10, 'Jan', 1998, 100, 0, NULL, NULL, NULL, NULL, NULL, 123533, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ht_users`
--
ALTER TABLE `ht_users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ht_users`
--
ALTER TABLE `ht_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123536;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
