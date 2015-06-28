-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 28, 2015 at 08:02 AM
-- Server version: 5.5.41-0ubuntu0.14.10.1
-- PHP Version: 5.5.12-2ubuntu4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iitd market`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'category 1'),
(2, 'category 2'),
(3, 'category 3');

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE IF NOT EXISTS `listings` (
`listing id` int(11) NOT NULL,
  `title` text NOT NULL,
  `discription` text NOT NULL,
  `price` int(11) NOT NULL,
  `contact` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `user id` int(11) NOT NULL,
  `status` text NOT NULL,
  `image` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`listing id`, `title`, `discription`, `price`, `contact`, `category_id`, `user id`, `status`, `image`, `time`) VALUES
(1, 'asdf', 'discriptionf', 12, '$contactfg', 3, 3, 'live', 'dasdad', '2015-06-26 16:41:41'),
(3, 'asd', 'asdfg', 12, 'dsa', 1, 11, 'live', '', '0000-00-00 00:00:00'),
(4, 'asd', 'asdfg', 12, 'dsa', 1, 11, 'live', '', '0000-00-00 00:00:00'),
(5, 'asdf', 'asdasd', 213, '123qq', 1, 11, 'live', '', '0000-00-00 00:00:00'),
(6, 'ayush', '4:01am 26 june. creaate listings is working', 123, 'asdasd13', 1, 11, 'live', '', '0000-00-00 00:00:00'),
(7, 'qwe', 'asd', 12, 'wda', 1, 11, 'live', '', '0000-00-00 00:00:00'),
(8, 'ayusjvvv', 'mndmnasvvv', 11111, 'aa333', 1, 11, 'live', 'uploads/2015-05-20-220107.jpg', '2015-06-26 17:36:37'),
(9, 'ads', 'asd', 123, 'asdasd123', 1, 11, 'live', '', '2015-06-25 23:58:38'),
(10, 'ads', 'da', 12, 's', 1, 11, 'live', 'uploads/14df4f0d92a19238c5acfd2a36ff89e9.jpg', '2015-06-26 00:13:50'),
(11, 'ads', 'da', 12, 's', 1, 11, 'live', 'uploads/14df4f0d92a19238c5acfd2a36ff89e9.jpg', '2015-06-26 00:16:37'),
(13, 'asdasfgEWwqe', 'asd', 12, 'asdasd123', 1, 11, 'live', 'uploads/2015-02-11-055332.jpg', '2015-06-26 00:22:36'),
(15, 'cool headphones', 'thy are the coolest thing in market.. but i want to sell', 123, '9711717717', 2, 15, 'live', 'uploads/2015-05-20-220107.jpg', '2015-06-26 23:18:58'),
(16, 'qqqqq', 'qqqqq', 1213, 'asda', 2, 15, 'live', '', '2015-06-27 11:41:03'),
(17, '&quot;&quot;&quot;ASdasD&quot;ASD&quot;ASdAS&quot;dAS&quot;DAS&quot;DaSD&quot;ASD&quot;@#$%', '&quot;&quot;&quot;!&quot;&quot;@#&quot;!@#&quot;!@#&quot;!&quot;@&quot;#&quot;', 123, '123qq', 1, 15, 'live', '', '2015-06-28 00:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `name` text,
  `email` varchar(256) DEFAULT NULL,
  `password` text,
  `salt` text,
  `status` text
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `salt`, `status`) VALUES
(2, 'ayush', 'aysuh@b.com', '35a9e381b1a27567549b5f8a6f783c167ebf809f1c4d6a9e367240484d8ce281', 'vpAErGFIjftEdXL+p13jwpDMNSg6Qo68', 'not confirmed'),
(3, 'aayush', 'ayushverma.jewels@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'b8NMeFEFz8jTiRn5bF9cIQpuxuwXdp9K', 'not confirmed'),
(4, 'ayush', 'ayushvermaiitd@gmail.com', '5feceb66ffc86f38d952786c6d696c79c2dbc239dd4e91b46729d73a27fb57e9', 'I4xGFNTomiWlJA8XioSI1oRCcJwc9qNb', 'confirmed'),
(6, 'ayush', 'a@b.com', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'acwMbrljBfwBcpjVOQTB/rubYdpHYs/U', 'confirmed'),
(9, 'ayushv', 'ab@bc.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Jg67Y70pEvan+k8vrnfI6x4XSYm4P8U9', 'not confirmed'),
(11, 'ayushv', 'ab@bcd.com', '5feceb66ffc86f38d952786c6d696c79c2dbc239dd4e91b46729d73a27fb57e9', 'YbpD6bL5XI9N3NHsJeo0fgMUfWHaq2tU', 'confirmed'),
(12, 'qwe', 'abc@abc.com', '5feceb66ffc86f38d952786c6d696c79c2dbc239dd4e91b46729d73a27fb57e9', 'VtO0Q4VTZ9TxlmaMzAf9q8M/OOTxCl/h', 'not confirmed'),
(13, 'ayush', 'ayushv@gk.com', 'd6611623fe9dd6d04fd2e40241298e954015a51f9320e61c189d2a242f0da9ca', 'vWc+U8mRt61PJpA7owGMwBYBUosgdszU', 'not confirmed'),
(14, 'bapu', 'bapu@jamidar.com', 'b69dfc0cf6224eab34ba693ae04422b6059e9ba3ead4de5c74e6105716cf7657', '1gzcxYWMWVWYpIwvrNdjtL4HKR9RfUPX', 'not confirmed'),
(15, 'pearl', 'pearl@v.com', '9446d3772e90c397cae2d42f60f909099bd380a9144c903021e12133b39d0931', 'A7LhxJrnU96F8Wkv437D+PtlxsW6eOxd', 'confirmed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD KEY `id` (`id`);

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
 ADD PRIMARY KEY (`listing id`), ADD KEY `category_id` (`category_id`), ADD KEY `user id` (`user id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`), ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
MODIFY `listing id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `listings`
--
ALTER TABLE `listings`
ADD CONSTRAINT `listings_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
ADD CONSTRAINT `listings_ibfk_2` FOREIGN KEY (`user id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
