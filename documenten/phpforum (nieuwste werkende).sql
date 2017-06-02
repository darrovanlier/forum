-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2017 at 01:06 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpforum`
--

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) UNSIGNED NOT NULL,
  `author` varchar(24) NOT NULL,
  `topic_id` int(11) UNSIGNED NOT NULL,
  `context` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `author`, `topic_id`, `context`, `created_at`) VALUES
(1, 'admin', 1, 'LOLOL DIT IS EEN REPLY VOOR TOPIC 1', '2017-06-02 09:23:27'),
(2, 'admin', 2, 'LOLOL DIT IS EEN REPLY VOOR TOPIC ', '2017-06-02 09:23:32'),
(3, 'admin', 3, 'LOLOL DIT IS EEN REPLY VOOR TOPIC 3', '2017-06-02 09:23:38'),
(4, 'admin', 4, 'LOLOL DIT IS EEN REPLY VOOR TOPIC 4', '2017-06-02 09:23:43'),
(5, 'admin', 5, 'LOLOL DIT IS EEN REPLY VOOR TOPIC 5', '2017-06-02 09:23:50'),
(6, 'admin', 3, 'LOLOL DIT IS EEN REPLY VOOR TOPIC 33', '2017-06-02 09:23:55'),
(7, 'admin', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam malesuada vel tellus eu eleifend. Praesent dictum tincidunt elit ac interdum. Curabitur ultrices laoreet nunc, eget cursus neque accumsan quis. Curabitur varius sem et nisi tempus mollis eu eget erat. In congue quam eu aliquet convallis. Donec pharetra condimentum tempus. Nullam dictum ligula quam, quis ornare mauris varius eget. Praesent ', '2017-06-02 19:29:19'),
(8, 'admin', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam malesuada vel tellus eu eleifend. Praesent dictum tincidunt elit ac interdum. Curabitur ultrices laoreet nunc, eget cursus neque accumsan quis. Curabitur varius sem et nisi tempus mollis eu eget erat. In congue quam eu aliquet convallis. Donec pharetra condimentum tempus. Nullam dictum ligula quam, quis ornare mauris varius eget. Praesent viverra mauris at ex rutrum, nec fringilla nisl commodo. Curabitur quis lacinia ligula, nec fringilla tortor. Fusce sit amet nibh eu risus aliquet posuere dignissim vel dolor. Nullam facilisis massa sed elit accumsan, et scelerisque est condimentum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam gravida vitae sapien sollicitudin dignissim. Donec vulputate erat mauris, ultricies consectetur ex tempor vel. Aenean nulla velit, mattis vitae ullamcorper vel, ultricies at purus. Pellentesque malesuada tincidunt congue.', '2017-06-02 19:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` int(11) UNSIGNED NOT NULL,
  `author` varchar(24) NOT NULL,
  `title` varchar(24) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `author`, `title`, `description`, `created_at`) VALUES
(1, 'admin', 'Test1', 'Dit is een test thema', '2017-06-02 08:29:38'),
(2, 'admin', 'Test4', 'Dit is nog eent est', '2017-06-02 08:29:51'),
(4, 'admin', 'Moi gemar', 'JOOo', '2017-06-02 09:11:45');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) UNSIGNED NOT NULL,
  `author` varchar(24) NOT NULL,
  `title` varchar(24) NOT NULL,
  `context` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `theme_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `author`, `title`, `context`, `created_at`, `theme_id`) VALUES
(1, 'admin', 'Test voor theme1', 'Test voor theme1Test voor theme1Test voor theme1', '2017-06-02 09:00:10', 1),
(2, 'admin', 'Test voor theme1agahahah', 'Test voor theme1 sfafsagagha', '2017-06-02 09:00:20', 1),
(3, 'admin', 'Test voor theme 2', 'Test voor theme 2Test voor theme 2Test voor theme 2Test voor theme 2Test voor theme 2Test voor theme 2', '2017-06-02 09:00:34', 2),
(4, 'admin', 'Test voor theme 2,hshsh', 'Test voor theme 2Test voor theme 2Test voor theme 2Test voor theme 2', '2017-06-02 09:00:47', 2),
(5, 'admin', 'Test voor gemar ding', 'afsasfasfasfasf', '2017-06-02 09:23:06', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(24) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `user`, `admin`, `created_at`) VALUES
(1, 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 'darrovanlier@gmail.com', 1, 1, '2017-05-11 14:00:10'),
(2, 'ttt', '0602611a56f977501462561aacb2f3d57af108c43f5983bc73f26de2129c30fa3aa12da49cd144e800b9a0c378e60c2ec858475aed4579067985ea1bed2f3fb1', 'tt@GG.NL', 1, 1, '2017-05-12 12:28:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`author`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`author`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`author`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
