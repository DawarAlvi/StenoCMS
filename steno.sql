-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2020 at 04:10 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `steno`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `display_name` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(30) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `about` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `username`, `display_name`, `email`, `password`, `is_admin`, `about`) VALUES
(1, 'dawar', 'Dawar', 'abc@gmail.com', 'test', 1, 'The admin of the website.'),
(2, 'yunis', 'Yunis Bhat', 'yb@gmail.com', 'test', 0, 'Author of the website.');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `show_on_homepage` tinyint(1) NOT NULL DEFAULT 0,
  `show_on_navbar` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `show_on_homepage`, `show_on_navbar`) VALUES
(1, 'help', 1, 1),
(2, 'technology', 1, 0),
(3, 'wallpapers', 0, 0),
(4, 'nature', 0, 0),
(5, 'photography', 0, 0),
(6, 'science', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `homepage`
--

CREATE TABLE `homepage` (
  `id` int(11) NOT NULL,
  `section` varchar(30) NOT NULL,
  `show` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `homepage`
--

INSERT INTO `homepage` (`id`, `section`, `show`) VALUES
(1, 'popular', 1),
(2, 'categories', 1),
(3, 'latest', 1);

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `name` varchar(30) NOT NULL,
  `url` varchar(60) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`name`, `url`, `enabled`) VALUES
('facebook', 'https://www.facebook.com', 1),
('instagram', 'https://www.instagram.com', 1),
('twitter', 'https://www.twitter.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `main_pages`
--

CREATE TABLE `main_pages` (
  `id` int(11) NOT NULL,
  `page_name` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `caption` varchar(60) NOT NULL,
  `show_on_nav` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_pages`
--

INSERT INTO `main_pages` (`id`, `page_name`, `title`, `caption`, `show_on_nav`) VALUES
(1, 'home', 'Steno', 'Minimal CMS For Bloggers', 1),
(2, 'categories', 'Categories', 'Find Something You Like', 1),
(3, 'about', 'About', 'Know the people & the project', 1),
(4, 'contact', 'Contact', 'Get in touch with us', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender` varchar(30) NOT NULL,
  `contents` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `author_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `format` varchar(30) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `online` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `author_id`, `date`, `format`, `views`, `online`) VALUES
(1, 'Every great journey starts with a single step', 1, '2020-05-18', 'htit', 100, 1),
(2, 'Getting started', 2, '2020-07-17', 'htht', 200, 1),
(3, 'Wallpaper Collection 2020', 1, '2020-09-25', 'ht', 50, 1),
(4, 'Beautiful landscapes', 2, '2020-10-03', 'ii', 553, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `post_id`, `category_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(5, 3, 2),
(6, 3, 3),
(7, 4, 4),
(8, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `post_headings`
--

CREATE TABLE `post_headings` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_headings`
--

INSERT INTO `post_headings` (`id`, `content`, `post_id`) VALUES
(1, 'Welcome the steno cms', 1),
(2, 'Installation', 2),
(3, 'Making changes', 2),
(5, 'The most awesome collection of wallpapers 2020', 3);

-- --------------------------------------------------------

--
-- Table structure for table `post_texts`
--

CREATE TABLE `post_texts` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_texts`
--

INSERT INTO `post_texts` (`id`, `content`, `post_id`) VALUES
(1, 'They say every great journey starts with a single step. So we would like to welcome you to your first step towards making an awesome blog site.', 1),
(2, 'We are excited to get you up and running. Check out the posts under \"help\" section to know more.\r\nGood luck ;)', 1),
(3, 'Upload the files you downloaded from the Steno cms GitHub page to the server.', 2),
(4, 'Login to the cms using the link in the footer or append \'/cms\' to the url of your site.', 2),
(6, 'Here you\'ll find the most awesome and in-depth collection of technology related wallpapers anywhere on the internet.', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage`
--
ALTER TABLE `homepage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `main_pages`
--
ALTER TABLE `main_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_ibfk_1` (`author_id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `post_headings`
--
ALTER TABLE `post_headings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `post_texts`
--
ALTER TABLE `post_texts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `homepage`
--
ALTER TABLE `homepage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `main_pages`
--
ALTER TABLE `main_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post_headings`
--
ALTER TABLE `post_headings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post_texts`
--
ALTER TABLE `post_texts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD CONSTRAINT `post_categories_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_headings`
--
ALTER TABLE `post_headings`
  ADD CONSTRAINT `post_headings_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_texts`
--
ALTER TABLE `post_texts`
  ADD CONSTRAINT `post_texts_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
