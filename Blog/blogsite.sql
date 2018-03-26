-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2017 at 06:07 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `body` longtext NOT NULL,
  `Date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `body`, `Date`) VALUES
(2, 'Hakkımda', '<p>Herkese Merhabalar</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer aliquet eleifend risus, sit amet vehicula nibh luctus ut. In tempus sodales erat, sodales iaculis ipsum. Donec blandit interdum felis, ut dignissim sapien semper eget. Donec vel dictum nisl, eget sollicitudin nibh. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam dapibus lectus eu sem interdum gravida vitae et felis. Interdum et malesuada fames ac ante ipsum primis in faucibus.In semper odio in augue fermentum, ut efficitur ipsum congue.\r\nPhasellus efficitur, mauris id tincidunt gravida, magna turpis lobortis felis, nec laoreet nunc nulla ac sapien. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras aliquam nulla quis risus vehicula ullamcorper. Praesent sagittis molestie dolor quis varius. Sed ac ex orci.</p>\r\n', 20081117);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `body` longtext NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `date`) VALUES
(1, 'İlk Yazımın Başlığı', '&lt;h1&gt;MAKALELER&lt;/h1&gt;\r\n\r\n&lt;p&gt;Makale yazmak g&amp;uuml;zel bir şeydir. İnsanın yazdık&amp;ccedil;a yazısı gelir &amp;ouml;zellikler yazmaya seviyorsan. Bu kısımda da loremler ipsumlar hvada u&amp;ccedil;uşacak. Uzun uzun yazılar gelecek. hatta ilerleyen zamanda g&amp;ouml;rsel y&amp;uuml;kleme de olacak.&lt;/p&gt;\r\n', 0),
(2, '', '&lt;h2&gt;Herkese Merhabalar;&amp;nbsp;&lt;/h2&gt;\r\n\r\n&lt;p&gt;Bu ikinci yazımız. bundan sonra buralarda loremler ipsumlar havada u&amp;ccedil;uşacak. G&amp;ouml;rseller olacak.&amp;nbsp;consectetur adipiscing elit. Ut ultricies lectus quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius, ipsum id feugiat facilisis, odio nibh blandit turpis, a tristique arcu lorem id erat. In sagittis arcu eu dapibus pulvinar. Mauris porttitor ante non posuere egestas. Mauris convallis tempor augue eget hendrerit. Integer ut purus ac quam aliquet pellentesque vitae ac lorem. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis eleifend metus a metus sodales vestibulum. Phasellus aliquam sapien in diam iaculis tincidunt.&lt;/p&gt;\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `name`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'Ebruesra', 'ebruesra', 'Ebru Esra'),
(3, 'user', 'user', 'user'),
(4, 'Dicle ', '123456', 'Dicle');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
