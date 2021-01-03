-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2021 at 12:56 PM
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
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `name`, `value`) VALUES
(1, 'section_1_title', 'What is Steno CMS?'),
(2, 'section_1_content', '<p><strong>Steno CMS</strong> is a <em>lightweight</em> content management system for online blog publication.</p><p>Steno CMS assumes no technical knowledge on the part of the user and takes care of the headaches of creating and maintaining a blog site. Apart from basic operations such as creating, retrieving, updating, and deleting posts (CRUD), it also supports multiple authors to help run the blog site in a collaborative manner. Steno CMS employs a novel tagging system to categorize blog posts for easy and fast navigation.</p>'),
(3, 'show_section_feature', '1'),
(4, 'show_section_2', '1'),
(5, 'section_2_title', 'Meet the Team.'),
(6, 'section_2_content', '<p>The team behind the Steno CMS project is made up of four hardworking individuals from Kashmir. They started Steno CMS as a college project. Their love for technology and aim for making it accessible to more people is what motivated this project.</p><ul><li><strong>Syed Dawar Alvi</strong></li><li><strong>Yunis Bhat</strong></li><li><strong>Muzzamil Hussain</strong><strong>​​​​​​​​</strong></li><li><strong>Najmal Saqib</strong></li></ul><p>&nbsp;</p>');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `about` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `email`, `password`, `is_admin`, `about`) VALUES
(1, 'Dawar', 'dawar@steno.com', '$2y$10$eX7ARkEqBHFSrbShcaUWV.NMkKLGCB6LCJ6uM4ss6wEh/9eRvRj/G', 1, 'Hi, I\'m a BCA student who loves posting tech related stuff to the steno cms blog site. And in his spare time dabbles in 3d modelling and game dev.'),
(2, 'Yunis', 'yunis@steno.com', '$2y$10$4SK8qLGA4iFEx25WUbevJuReeoTxcinZvtisMRKvclqOe4OxPk2OW', 0, 'Author of the site.'),
(3, 'Muzzamill', 'muzzamil@steno.com', '$2y$10$qNYoYGwmF/BbYpHCd.fOZO7YP6K4IW.jCXvJOVQGNWB.Z8mlY5qba', 1, 'Secondary admin of the site');

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
(1, 'help', 0, 0),
(2, 'technology', 1, 0),
(3, 'wallpapers', 1, 0),
(4, 'nature', 0, 0),
(5, 'photography', 0, 1),
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
('instagram', 'https://www.instagram.com/syed_dawar_alvi', 1),
('twitter', 'https://www.twitter.com/assassinex7', 1);

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
(3, 'about', 'About', 'Know the people &amp; the project', 1),
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

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `contents`, `email`, `date`) VALUES
(1, 'Dawar Alvi', 'Test', 'dawar@abc.com', '2020-10-07'),
(2, 'John Doe', 'Lorem ipsum', 'John@abc.com', '2020-10-08'),
(9, 'Muzzamil', 'Hi', 'muzzamil@gmail.com', '2020-11-28'),
(12, 'Guy Ritchie', '&lt;p&gt;Hi, really interested in your content. Keep it up!&lt;/p&gt;', 'guy@mail.com', '2020-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `format` varchar(100) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `online` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `author_id`, `date`, `format`, `views`, `online`) VALUES
(24, 'The Xbox project scorpion launch date announced', 2, '2020-11-27', 'ihtht', 106, 1),
(27, '46 Inspiring Examples of Blogs In 2020', 2, '2021-01-03', 'ihthithit', 7, 1),
(28, '5 Go-to Sites for Your Next Desktop Wallpaper', 1, '2021-01-03', 'ithththththt', 12, 1),
(29, 'A Beginner\'s Guide to Photography', 1, '2021-01-03', 'ithtitithththtihtiht', 16, 1),
(30, 'Incredible Photography Techniques', 1, '2021-01-03', 'ithtihtihtit', 2, 1),
(31, 'How to setup Steno CMS', 3, '2021-01-03', 'ihththththt', 2, 1),
(32, 'Trying and Searching and Wanting', 3, '2021-01-03', 'it', 1, 1),
(33, 'Nature India Photo Contest 2020 open for entries', 3, '2021-01-03', 'itht', 2, 1);

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
(44, 29, 5),
(45, 30, 5),
(47, 32, 4),
(48, 32, 5),
(49, 31, 1),
(50, 31, 2),
(51, 27, 2),
(52, 27, 1),
(53, 28, 3),
(54, 28, 5),
(55, 24, 2),
(56, 24, 6),
(57, 33, 5),
(58, 33, 6);

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
(12, 'The big news', 24),
(13, 'And its sooner than you think', 24),
(14, 'Hi, I’m Yunis and I try every website builder so you don’t have to.', 27),
(15, 'Capture By Lucy', 27),
(16, 'Luisa Ferss', 27),
(17, '1. DRESS YOUR TECH BY DESIGN LOVE FEST', 28),
(18, '2. THE DESKTOP WALLPAPER PROJECT BY THE FOX IS BLACK', 28),
(19, '3. DESKTOP WALLPAPER CALENDARS BY SMASHING MAGAZINE', 28),
(20, '4. SIMPLE DESKTOPS', 28),
(21, '5. GHOSTLY WALLPAPERS', 28),
(22, 'What Is Photography?', 29),
(23, 'A Brief History of Photography and the People Who Made It Succeed', 29),
(24, 'What Camera Do You Need for Photography?', 29),
(25, 'At This Point, What Other Camera Gear and Accessories Do You Need?', 29),
(26, 'The Three Fundamental Camera Settings You Should Know', 29),
(27, 'The First Steps on Your Photographic Journey', 29),
(28, '1. High Speed Photography', 30),
(29, '2. Tilt-Shift Photography', 30),
(30, '3. Black And White Photography', 30),
(31, 'Introduction', 31),
(32, 'Download', 31),
(33, 'Setup the Database', 31),
(34, 'Configuration', 31),
(35, 'Upload', 31),
(36, 'So here we are, announcing the Nature India Photo Contest 2020, expecting that this year’s entries can capture not just the hardships of the COVID-19 pandemic but also the hope of an  infection-free future.', 33);

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
(16, '<p>From the official sources at Microsoft Headquarters we have confirmation that the much anticipated xbox project scorpion will be launched soon.</p>', 24),
(17, '<p>The product is planned to be released in March of 2021.</p>', 24),
(20, '<p>I am the developer, designer and writer behind Site Builder Report. You can read more about my story in&nbsp;<a target=\"_blank\" href=\"https://www.indiehackers.com/businesses/site-builder-report\">an interview with IndieHackers</a>.</p><p>Over the last 8 years I&rsquo;ve written over 150,000 words about website builders&mdash; equal to the size of a large book. In that time Site Builder Report has grown quickly and is now read by 120,000+ people every month.</p><p>My work is supported by earning an affiliate commission when readers buy a tool based on my reviews. I&#39;m committed to honesty and transparency. I only recommend website builders that I believe in. But that being said...</p><p><strong>Read websites like mine with a healthy dose of skepticism</strong>. Affiliate review websites exist in an ethical gray area. For example, Squarespace is my most&nbsp;<a href=\"https://www.sitebuilderreport.com/best-website-builder\">recommended website builder</a>&nbsp;and I&#39;ve had several other companies offer to pay me 4x what Squarespace pays me&mdash; as long as their website builder becomes my most recommended. I always tell them the same thing: I would only do that if I truly believed they had the best product.</p><p>Paying for a good review is common on review websites. So how can trust what you read? My advice is to give websites the sniff test.</p>', 27),
(21, '<p>Lucy is a photographer, a mom and creator of backdrops for photography usage. Visit her blog to read about her life, her family and if you&#39;d like to work with her. All of her backdrops are photos that she herself has taken and then had printed.</p>', 27),
(22, '<p>Luisa Ferss is a fashion blogger first and foremost, but you can find a wide array of topics on her blog. Meditation, travel and quarantine tips just to name a few. Luisa currently resides in Mexico City.</p>', 27),
(23, '<p>If you haven&rsquo;t changed out your desktop wallpaper in a while, it&rsquo;s time to give your eyes something new to feast upon. Only the most creative wallpapers will do for DesignGooders&rsquo; desktops, so we&rsquo;re sharing the sources we&rsquo;re addicted to. (Tip: Choose the screen resolution closest to your current display to get the most out of your new desktop wallpaper. Have fun!)</p>', 28),
(24, '<p>If you&rsquo;re into vibrant colors, watercolor brushstrokes and motivational statements that get the creative juices pumping, drop by&nbsp;<a target=\"_blank\" rel=\"noreferrer\" href=\"http://www.designlovefest.com/\">Design Love Fest</a>&nbsp;for its weekly serving of&nbsp;<a target=\"_blank\" rel=\"noreferrer\" href=\"http://www.designlovefest.com/?s=dress+your+tech\">Dress Your Tech</a>, where artists contribute a collection of wallpapers for the community to download.</p>', 28),
(25, '<p>Every Wednesday, you&rsquo;ll get a new curated wallpaper at&nbsp;<a target=\"_blank\" rel=\"noreferrer\" href=\"http://thefoxisblack.com/category/the-desktop-wallpaper-project/\">The Desktop Wallpaper Project</a>&nbsp;by&nbsp;<a target=\"_blank\" rel=\"noreferrer\" href=\"http://thefoxisblack.com/\">The Fox is Black</a>, a design and culture blog that&rsquo;s been rocking the design world since 2007. Each wallpaper has an interesting story behind its selection and the featured artist.</p>', 28),
(26, '<p><a target=\"_blank\" rel=\"noreferrer\" href=\"http://www.smashingmagazine.com/\">Smashing Magazine</a>&nbsp;readers flock to the site on the first day of each month to grab copies of&nbsp;<a target=\"_blank\" rel=\"noreferrer\" href=\"http://www.smashingmagazine.com/tag/wallpapers/\">the latest desktop wallpaper calendars</a>&nbsp;to start the month right. The wallpapers are designed with different themes and by talented creatives from around the world.</p>', 28),
(27, '<p>Want a beautiful and minimalistic wallpaper free of distraction? You&rsquo;ll love&nbsp;<a target=\"_blank\" rel=\"noreferrer\" href=\"http://simpledesktops.com/\">Simple Desktops</a>&nbsp;by product designer&nbsp;<a target=\"_blank\" rel=\"noreferrer\" href=\"http://tmwtsn.com/\">Tom Watson</a>, a collection of curated desktop wallpapers designed to keep you inspired and focused.</p>', 28),
(28, '<p>Our final pick is an archive of&nbsp;<a target=\"_blank\" rel=\"noreferrer\" href=\"http://ghostly.com/wallpapers\">designer wallpapers</a>&nbsp;curated by the design and cultural blog&nbsp;<a target=\"_blank\" rel=\"noreferrer\" href=\"http://www.ghostly.com/\">Ghostly International</a>. You&rsquo;ll find collections of artistic backgrounds by renowned designers and artists like Michael Cina and Brandon Locher.DesignGooders, we want to see your desktop wallpapers! Post a screenshot in the comments, or tell us which one of these websites you&rsquo;ll be visiting for your next screen candy.</p>', 28),
(29, '<p>This introduction to photography is written for beginners, with several tips and suggestions to take your skills as far as possible. However, writing an introduction to photography is like writing an introduction to words; as amazing and important as it is, photography can be almost limitlessly complex. What separates inspiring photographs from ordinary ones, and how can you improve the quality of your own work? This article lays a foundation to answer to those questions and more.</p>', 29),
(30, '<p>Photography is the art of capturing light with a camera, usually via a digital sensor or film, to create an image. With the right camera equipment, you can even photograph wavelengths of light invisible to the human eye, including UV, infrared, and radio.</p><p>The first permanent photograph was captured in 1826 (some sources say 1827) by Joseph&nbsp;Nic&eacute;phore&nbsp;Ni&eacute;pce in France. It shows the roof of a building lit by the sun. You can see it reproduced below:</p>', 29),
(31, '<p>We&rsquo;ve come a long way since then.</p>', 29),
(32, '<p>The purpose of this article is to introduce the past and present worlds of photography. You will also find some important tips to help you take better photos along the way.</p>', 29),
(33, '<p>Color photography started to become popular and accessible with the release of Eastman Kodak&rsquo;s &ldquo;Kodachrome&rdquo; film in the 1930s. Before that, almost all photos were monochromatic &ndash; although a handful of photographers, toeing the line between chemists and alchemists, had been using specialized techniques to capture color images<strong>&nbsp;</strong>for decades before. You&rsquo;ll find some&nbsp;<a target=\"_blank\" rel=\"noopener noreferrer\" href=\"https://timeline.com/photos-earliest-color-images-f48ea4ae8e9f\">fascinating galleries</a>&nbsp;of photos from the 1800s or early 1900s captured in full color, worth exploring if you have not seen them already.</p><p>These scientist-magicians, the first color photographers, are hardly alone in pushing the boundaries of one of the world&rsquo;s newest art forms. The history of photography has always been a history of people &ndash; artists and inventors who steered the field into the modern era.</p><p>So, below, you&rsquo;ll find a brief introduction to some of photography&rsquo;s most important names. Their discoveries, creations, ideas, and photographs shape our own pictures to this day, subtly or not. Although this is just a brief bird&rsquo;s-eye view, these nonetheless are people you should know before you step into the technical side of photography:</p><p>Joseph Nic&eacute;phore Ni&eacute;pce</p><ul><li><strong>Invention</strong>: The first permanent photograph (&ldquo;View from the Window at Le Gras,&rdquo; shown earlier)</li><li><strong>Where</strong>: France, 1826</li><li><strong>Impact</strong>: Cameras had already existed for centuries before this, but they had one major flaw: You couldn&rsquo;t record a photo with them! They simply projected light onto a separate surface &ndash; one which artists used to create realistic paintings, but not strictly photographs. Ni&eacute;pce solved this problem by coating a pewter plate with, essentially, asphalt, which grew harder when exposed to light. By washing the plate with lavender oil, he was able to fix the hardened substance permanently to the plate.</li><li><strong>Quote</strong>: &ldquo;The discovery I have made, and which I call&nbsp;<em>Heliography,</em>&nbsp;consists in reproducing spontaneously, by the action of light, with gradations of tints from black to white, the images received in the camera obscura.&rdquo; Mic drop.</li></ul><p>Louis Daguerre</p><ul><li><strong>Invention</strong>: The Daguerreotype (first commercial photographic material)</li><li><strong>Where</strong>: France, 1839</li><li><strong>Impact</strong>: Daguerreotypes are images fixed directly to a heavily polished sheet of silver-plated copper. This invention is what really made photography a practical reality &ndash; although it was still just an expensive curiosity to many people at this point. If you&rsquo;ve never seen daguerreotypes in person, you might be surprised to know just how&nbsp;<em>sharp</em>&nbsp;they are.</li><li><strong>Quote</strong>: &ldquo;I have seized the light. I have arrested its flight.&rdquo;</li></ul>', 29),
(34, '<p>Apple&nbsp;<a target=\"_blank\" rel=\"noopener noreferrer\" href=\"https://www.bloomberg.com/graphics/2018-apple-at-one-trillion-market-cap/\">became the world&rsquo;s first trillion dollar company</a>&nbsp;in 2018 largely because of the iPhone &ndash; and what it replaced.</p><p>Alarm clocks. Flashlights. Calculators. MP3 players. Landline phones. GPSs. Audio recorders.</p><p><em>Cameras</em>.</p><p>Many people today believe that their phone is good enough for most photography, and they have no need to buy a separate camera. And you know what? They&rsquo;re not wrong. For most people out there, a dedicated camera is overkill.</p><p>Phones are&nbsp;<em>better</em>&nbsp;than dedicated cameras for most people&rsquo;s needs. They&rsquo;re quicker and easier to use, not to mention their seamless integration with social media. It only makes sense to get a dedicated camera if your phone isn&rsquo;t good enough for the photos you want (like photographing sports or low-light environments) or if you&rsquo;re specifically interested in photography as a hobby.</p><p>That advice may sound crazy coming from a photographer, but it&rsquo;s true. If you have&nbsp;<em>any camera at all</em>, especially a cell phone camera, you have what you need in order to take great photos. And if you have a more advanced camera, like a DSLR or mirrorless camera, what more is there to say? This is the guide for you &ndash; it&rsquo;s time to learn photography.</p>', 29),
(35, '<p><strong>Camera</strong>. If you buy a dedicated camera (rather than a phone), pick one with interchangeable lenses so that you can try out different types of photography more easily. Read reviews, but don&rsquo;t obsess over them, because everything available today is pretty much equally good as its competition. Find a nice deal and move on.</p><p><strong>Lenses</strong>. This is where it counts. For everyday photography, start with a standard zoom lens like a 24-70mm or 18-55mm. For portrait photography, pick a prime lens (one that doesn&rsquo;t zoom) at 35mm, 50mm, or 85mm. For sports, go with a telephoto lens. For macro photography, get a dedicated macro lens. And so on. Lenses matter more than any other piece of equipment because they determine what photos you can take in the first place.</p><p><strong>Post-processing software</strong>. One way or another, you need to edit your photos. It&rsquo;s ok to start with software already on your computer, or software that comes with your camera. But in the long run, a dedicated program will do a better job. Adobe sells Lightroom and Photoshop as a bundle for $10/month, or you can buy standalone software from another company if you prefer; there are tons of options. Whatever you pick, stick with it for a while, and you&rsquo;ll learn it quite well.</p><p>Everything else is optional, but can be very helpful:</p><ol><li><strong>A tripod</strong>. A landscape photographer&rsquo;s best friend. See&nbsp;<a href=\"https://photographylife.com/how-to-choose-and-buy-a-tripod-for-a-dslr-camera\">our comprehensive tripod article</a>.</li><li><strong>Bags</strong>. Get a shoulder bag for street photography, a rolling bag for studio photography, a technical hiking backpack for landscape photography, and so on.</li><li><strong>Memory cards</strong>. Choose something in the 32-64 GB range to start. Get a fast card (measured in MB/second) if you shoot bursts of photos, since your camera&rsquo;s memory will clear faster.</li><li><strong>Extra Batteries</strong>. Get at least one spare battery to start, preferably two. Off-brand batteries are usually cheaper, although they may not last as long or maintain compatibility with future cameras.</li><li><strong>Polarizing filter</strong>. This is a big one, especially for landscape photographers. Don&rsquo;t get a cheap polarizer or it will harm your image quality. We recommend the&nbsp;<a target=\"_blank\" rel=\"noopener noreferrer nofollow sponsored\" href=\"https://www.bhphotovideo.com/c/product/1141525-REG/b_w_1081478_77mm_xs_pro_mc_kaesemann.html/BI/5562/KBID/6400\">B+W Kaesemann filter</a>&nbsp;(of the same thread size as your lens). See our&nbsp;<a href=\"https://photographylife.com/definition/polarizing-filter\">polarizing filter article</a>&nbsp;too.</li><li><strong>Flash</strong>. Flashes can be expensive, and you might need to buy a separate&nbsp;<a rel=\"noopener noreferrer nofollow sponsored\" target=\"_blank\" href=\"https://www.bhphotovideo.com/c/product/1374538-REG/godox_tt685n_thinklite_ttl_flash.html/BI/5562/KBID/6400/DFF/d10-v21-t1-x858127/SID/EZ\">transmitter and receiver</a>&nbsp;if you want to use your flash off-camera.</li><li><strong>Better computer monitor</strong>. Ideally, you&rsquo;d get an&nbsp;<a rel=\"noopener noreferrer nofollow sponsored\" target=\"_blank\" href=\"https://www.bhphotovideo.com/c/product/1090259-REG/dell_u2415_24_ultrasharp_led_monitor.html/BI/5562/KBID/6400\">IPS monitor</a>&nbsp;for editing photos (which we&rsquo;ve also written&nbsp;<a href=\"https://photographylife.com/what-is-ips-monitor\">an article</a>&nbsp;about).</li><li><strong>Cleaning kit</strong>. The top item is a microfiber cloth to keep the front of your lens clean. Also get a&nbsp;<a rel=\"noopener noreferrer nofollow sponsored\" target=\"_blank\" href=\"http://www.bhphotovideo.com/c/product/259157-REG/Giottos_AA1900_Rocket_Air_Blower.html/BI/5562/KBID/6400\">rocket blower</a>&nbsp;to remove dust from your camera sensor more easily.</li><li><strong>Other equipment</strong>. There are countless photography accessories available, from remote shutter releases to GPS attachments to printers and more. Don&rsquo;t worry about these at first; you&rsquo;ll realize over time if you need one.</li></ol>', 29),
(36, '<p>Your camera has dozens of buttons and menu options. If you pick the wrong camera settings, it&rsquo;s possible that your photo won&rsquo;t turn out the way you want. How do you make sense of all these options? And how do you do it quickly in the field?</p><p>It&rsquo;s not easy, but it&rsquo;s easier than you might think. In fact, most of the menu options are things you&rsquo;ll only set one time, then rarely or never touch again. Only a handful of settings need to be changed frequently, and that&rsquo;s what the rest of this Photography Basics guide covers.</p><p>The three most important settings are called shutter speed, aperture, and ISO. All three of them control the brightness of your photo, although they do so in different ways. In other words, each brings its own &ldquo;side effects&rdquo; to an image. So, it&rsquo;s a bit of an art to know exactly how to balance all three for a given photo.</p><ol><li><strong>Shutter speed:</strong>&nbsp;The amount of time your camera sensor is exposed to the world while taking a picture.&nbsp;<a href=\"https://photographylife.com/what-is-shutter-speed-in-photography\">Chapter 2: Shutter Speed</a></li><li><strong>Aperture:</strong>&nbsp;Represents a &ldquo;pupil&rdquo; in your lens that can open and close to let in different amounts of light.&nbsp;<a href=\"https://photographylife.com/what-is-aperture-in-photography\">Chapter 3: Aperture</a></li><li><strong>ISO:</strong>&nbsp;Technically a bit more complex, but similar to the sensitivity of film for taking pictures in different lighting conditions.<strong><em>&nbsp;</em></strong><a href=\"https://photographylife.com/what-is-iso-in-photography\">Chapter 4: ISO</a></li></ol>', 29),
(37, '<p>In photography, the technical and the creative go hand in hand.</p><p>Remember the Ansel Adams quote from earlier? There is nothing worse than a sharp image of a fuzzy concept.&nbsp;<em>If the idea behind a photo is weak, using the right camera settings won&rsquo;t make it better</em>.</p><p>At the same time, camera settings are some of the most important tools you have at your disposal. In a way, every technical choice is really an artistic choice in disguise. These settings&nbsp;<em>are</em>&nbsp;worth learning. Your understanding of photography will improve tenfold when you understand how camera settings work.</p><p>So, the next few chapters of this guide will cover the most important camera settings: shutter speed, aperture, and ISO. Then, we&rsquo;ll dive into the deep end of composition. This is how photos are made.</p>', 29),
(38, '<p>In this post we present useful photographic techniques, tutorials and resources for various kinds of photography. You&rsquo;ll learn how to set up the perfect environment and what techniques, principles and rules of thumbs you should consider when shooting your next perfect photo. This round-up isn&rsquo;t supposed to be the ultimate one &ndash; please feel free to suggest more useful articles in the comments to this post.</p>', 30),
(39, '<p><a href=\"https://www.smashingmagazine.com/2008/11/02/when-time-freezes-50-beautiful-examples-of-freeze-photography/\">Celebration Of High-Speed Photography</a>&nbsp;This post is supposed to provide you with some inspiration of what can be done with high-speed photography. It also showcases some truly stunning slow-motion videos.</p><p><a rel=\"nofollow\" href=\"http://cachefly.oreilly.com/make/strobephotography.pdf\">Home-Made High Speed Photography</a>&nbsp;(PDF) Pictures of high-speed events such as popping balloons, breaking glass, and splashing liquids reveal interesting structures not visible to the naked eye. With this guide you can take your own high-speed photos to captures these ephemeral events. A very detailed tutorial.</p>', 30),
(40, '<p><a rel=\"nofollow\" href=\"http://en.wikipedia.org/wiki/Tilt-shift_photography\">Tilt-shift photography</a>&nbsp;refers to the use of camera movements on small- and medium-format cameras; it usually requires the use of special lenses.</p><p>Tilt-shift actually encompasses two different types of movements: rotation of the lens relative to the image plane, called tilt, and movement of the lens parallel to the image plane, called shift. Tilt is used to control the orientation of the plane of focus (PoF), and hence the part of an image that appears sharp; it makes use of the Scheimpflug principle. Shift is used to change the line of sight while avoiding the convergence of parallel lines, as when photographing tall buildings.</p><p>Another, less cost-intensive technique called&nbsp;<a rel=\"nofollow\" href=\"http://en.wikipedia.org/wiki/Tilt-shift_miniature_faking\">tilt-shift miniature faking</a>&nbsp;is a process in which a photograph of a life-sized location or object is manipulated so that it looks like a photograph of a miniature-scale model.</p><p><a href=\"https://www.smashingmagazine.com/2008/11/beautiful-examples-of-tilt-shift-photography/\">50 Beautiful Examples Of Tilt-Shift Photography</a></p><p><a rel=\"nofollow\" href=\"http://www.tiltshiftphotography.net/photoshop-tutorial.php\">Tilt-Shift Photography Photoshop Tutorial</a>&nbsp;This tutorial was produced using Photoshop CS2 on a PC.</p>', 30),
(41, '<p><a href=\"https://www.smashingmagazine.com/2008/06/beautiful-black-and-white-photography/\">Beautiful Black and White Photography</a>&nbsp;One of the most beautiful inspirational posts on Smashing Magazine, featuring over 50 brilliant works from photographers across the globe.</p>', 30),
(42, '<p><a rel=\"nofollow\" href=\"http://www.slrphotographyguide.com/black-white.shtml\">Black and White Photography Guide</a>&nbsp;This photography technique starts before the shot is even taken. In this article you&rsquo;ll find some quick tips on what to look for to ensure the perfect black and white landscape &ndash; e.g. camera settings for black and white photography and what filters are good for black and white landscapes.</p>', 30),
(43, '<p>In this short guide I will guide you through the process of setting up Steno CMS, so you start blogging with maximum ease. The process may seem a bit involved but we have made it quite easy to follow and in the future plan to make it even easier to setup Steno.</p>', 31),
(44, '<p>You can download Steno CMS for the following GitHub link:<br /><a href=\"https://github.com/DawarAlvi/StenoCMS\">https://github.com/DawarAlvi/StenoCMS</a></p><p>After download unzip the file.</p>', 31),
(45, '<p>In you server&#39;s Cpanel or equivalent dashboard open phpmyadmin then create a new database if there isn&#39;t on already. Then import the steno.sql file provided in the download.<br />&nbsp;</p>', 31),
(46, '<p>Open the file name db_connect.php which is located in the includes folder.</p><p>Make the following changes to the file.</p><ul><li>Change localhost to your website&#39;s url.</li><li>Change root to your database username given to you by your hosting provider.</li><li>Put your database password given to you by your hosting provider inside &quot;&quot;.</li><li>Change steno to your database name which was set up in the previous step.<br />&nbsp;</li></ul>', 31),
(47, '<p>Upload all the files to server except the steno.sql file.</p><p>Your are now ready to start publishing content on your website. Just login from the link in the footer of your website.</p><p>Enjoy.</p>', 31),
(48, '<p>I am sitting on my balcony. It is spring and there is a little bit of heat in the sun. The balcony looks out over a road. The road is usually busy&hellip; an endless stream of trucks and cars but right now there is no traffic. Everyone is self-isolating. The machine has stopped. It feels strange. Peaceful. I can hear different birds&hellip; the wren, the blackbird, the robin. A blue tit is flitting from one branch to the next. Life goes on. I could sit here all day.</p><p>&ldquo;Don&rsquo;t try&rdquo;. Those are the two simple words of advice offered by the poet Charles Bukowski.</p><p>It jars for most people to receive that advice&hellip; especially those of us who want a better world.</p><p>I have been stuck in a cycle of &ldquo;trying&rdquo; for a while now and I see a lot of it in the world</p><p>Trying and searching and wanting.</p><p>Everywhere I look people, including me, are rushing to the next moment.</p><p>I know that 99% of people probably won&rsquo;t resonate with what I&rsquo;m going to say. They might think that I&rsquo;m an idiot and that this piece is a cop out.</p><p>Not trying is seen as the &ldquo;worst&rdquo;.</p><p>It means that you are lazy and you don&rsquo;t care.</p><p>It means that you settle.</p><p>It means that you do nothing.</p><p>It means that you are part of the problem.</p><p>It means that you are helpless.</p><p>Is that really true?</p><p>I don&rsquo;t think so.</p><p>Does the oak tree try?</p><p>No. It just is.</p><p>Does the oak tree do nothing?</p><p>No. It just is.</p><p>Why is it that we humans are always trying and searching and wanting?</p><p>Don&rsquo;t rush. Close your eyes and sit with that question for a moment.</p><p>Why are you always trying and searching and wanting?</p><p>.</p><p>.</p><p>.</p><p>I just sat with it and here&rsquo;s what I feel.</p><p>Maybe you feel differently and that&rsquo;s ok.</p><p>I try and search and want because at the root of it there is a sense that the present moment, &ldquo;now&rdquo;, is not ok.</p><p>There is an underlying restlessness and there is self-centred narcissism that always want&rsquo;s&nbsp;<em>more</em>.</p><p>More knowledge.</p><p>More impact.</p><p>More acknowledgement.</p><p>More people agreeing with me.</p><p>More people telling me I&rsquo;m great.</p><p>More distraction.</p><p>More security.</p><p>This is hard for me to admit but if I&rsquo;m honest whenever I &ldquo;try and search and want&rdquo;, nothing I do is truly selfless.</p><p>There is no love.</p><p>There is always a hidden self-centred motivation. I am part of the problem.</p><p>It&rsquo;s funny because when I don&rsquo;t try. When I am truly open and aware and responsive, everything I do is selfless.</p><p>I just do it.</p><p>.</p><p>.</p><p>.</p><p>Slow down.</p><p>Let go.</p><p>Surrender.</p><p>Just take a breath.</p><p>Open to this moment as it is.</p><p>You are alive.</p><p>Don&rsquo;t&nbsp;<em>try</em>&nbsp;to be present.</p><p>Don&rsquo;t&nbsp;<em>try</em>&nbsp;to still your mind.</p><p>Don&rsquo;t&nbsp;<em>try</em>&nbsp;to change anything.</p><p>What does it&nbsp;<em>feel</em>&nbsp;like when you stop rushing to the next moment?</p><p>Allow&nbsp;<em>this</em>&nbsp;moment to be ok, as it is.</p><p>Don&rsquo;t just read these words.</p><p>Look away from the screen for a moment and see for yourself.</p><p>What do you&nbsp;<strong><em>feel</em></strong>?</p><p>.</p><p>.</p><p>.</p><p>Maybe you feel numb at first?</p><p>Maybe you feel more?</p><p>Maybe you feel sadness?</p><p>A lump in your throat?</p><p>Maybe there is also a feeling of peace and openness and release?</p><p>Maybe you feel insecure and anxious?</p><p>Maybe there is love?</p><p>Right now can you just sit with what is?</p><p>To me it feels like a fist that has been tightly clenched for a long time, slowly opening and softening.</p><p>Maybe, sometimes, something new emerges?</p><p>A new way of seeing things.</p><p>An insight.</p><p>Clarity.</p><p>Wise action.</p><p>You can&rsquo;t&nbsp;<em>try</em>&nbsp;to make something new emerge though!</p><p>I always fall back into that trap.</p><p>Always trying.</p><p>That&rsquo;s what Bukowski meant.</p><p>Get out of the way and stop trying.</p><p>Maybe that&rsquo;s what the world needs right now?</p><p>I have a feeling that if there was less trying and searching and wanting the more beautiful world we imagine would emerge by itself.</p>', 32),
(49, '<p>Amidst the pandemic, we have been a little hesitant to launch our annual photo contest. When the world is grappling with millions of deaths and infections, professionals and families are facing unprecedented challenges, and movement of people is restricted, is it the right time for a photo competition? But as the year comes to an end, various science-led efforts have yielded results globally in the form of vaccines and drugs for COVID-19, signalling hope.</p>', 33),
(50, '<p>Send us pictures of what you think the pandemic represents to you. For many, it has surely been a time of immense suffering &mdash; of disease, death, loss of livelihoods or vocation, uncertainty and mental unrest. The pandemic has offered lessons for most of mankind &mdash; a warning to treat our natural resources well or face the consequences, lessons of hygiene and health, of preparedness, of the importance of global collaborations in science. Scientists, healthcare workers, the media, the elderly, women and children &mdash; all have had their unique share of challenges living through the pandemic.</p><p>We invite entries that reflect challenges or strides in science and healthcare, portray the problems or solutions for citizens, spotlight the &lsquo;new normal&rsquo; or present daily life during the pandemic. We are also interested in your creative take on what the future might look like; or unique stories, for instance, from pandemic-free regions.</p><p>For more ideas on what your photo story could be, do have a look at our coronavirus coverage&nbsp;<a href=\"https://www.natureasia.com/en/nindia/coronavirus\">here</a>.</p><p>Send your entries by&nbsp;<strong>31 December to natureindia@nature.com</strong>. Entries should be in&nbsp;<strong>jpeg format</strong>&nbsp;with your&nbsp;<strong>name and contact details</strong>&nbsp;in the email. Please mention&nbsp;<strong>&ldquo;Nature India Photo Contest 2020&rdquo;</strong>&nbsp;in the subject line of your email. The photograph must be accompanied by a brief caption (please see some photo captions&nbsp;<a href=\"http://blogs.nature.com/indigenus/2020/02/announcing-winners-of-ni-photo-contest-2019.html\">here</a>&nbsp;for reference) explaining the subject of the picture along with the date, time and place it was taken.</p><p>We will accept a maximum of&nbsp;<strong>two entries per person</strong>. The last date for submissions is midnight of December 31, 2020 Indian Standard Time. On social media, please use the hashtag&nbsp;<strong>#NatureIndphoto</strong>&nbsp;to talk about the contest or to check out our latest updates.</p><p><strong>Prizes</strong></p><p>The top three pictures will get cash prizes worth $350, $250, $200. The top 10 finalists will be featured on&nbsp;<strong>Nature India&rsquo;s blog&nbsp;<a href=\"http://blogs.nature.com/indigenus\">Indigenus</a>.&nbsp;</strong></p><p>Entries will be judged for novelty, creativity, quality and print worthiness. Winners will be chosen by a panel of Nature Research editors and photographers. The winner and two runners-up will receive a copy of the&nbsp;<em>Nature India</em>&nbsp;Annual Volume 2020 and a bag of Nature Research goodies. Winning entries also stand a chance of being featured on the cover of one of our forthcoming print publications.</p><p><strong>Eligibility</strong></p><p>The contest is open to all &ndash; any nationality, any occupation, any profession. You may use whatever camera you wish &ndash; even your cell phone &ndash; as long as the photograph you send us is unedited, original, in digital format and of printable quality.&nbsp;Just make sure you are not violating any copyrights. Also, no obscene, provocative, defamatory, sexually explicit, or other inappropriate content please (refer to the contest terms and conditions below).</p><p>The theme for our inaugural photo competition in 2014 was &ldquo;Science &amp; technology in India&rdquo;. Our themes have then covered &ldquo;Patterns&rdquo;, &ldquo;Nature&rdquo;, &ldquo;Grand Challenges&rdquo;, &ldquo;Vector-borne Diseases&rdquo; and &ldquo;Food&rdquo;. We have received some breathtaking entries from across the world all these years. You might want to take a look at the winning entries of the Nature India Photo Contest&nbsp;<a href=\"http://blogs.nature.com/indigenus/2014/09/announcing-winners-of-nature-india-photo-contest.html\">2014</a>,&nbsp;<a href=\"http://blogs.nature.com/indigenus/2015/11/announcing-winners-of-ni-photo-contest-2015.html\">2015</a>,&nbsp;<a href=\"http://blogs.nature.com/indigenus/2016/12/announcing-winners-of-ni-photo-contest-2016.html\">2016,&nbsp;</a><a href=\"http://blogs.nature.com/indigenus/2017/12/announcing-winners-of-ni-photo-contest-2017.html\">2017</a>&nbsp;<a href=\"http://blogs.nature.com/indigenus/2019/01/announcing-the-winners-of-ni-photo-contest-2018.html\">2018</a>&nbsp;and&nbsp;<a href=\"http://blogs.nature.com/indigenus/2020/02/announcing-winners-of-ni-photo-contest-2019.html\">2019</a>&nbsp;for some inspiration and to&nbsp;get an idea of what we look for while selecting winners.</p><p><strong>[TERMS AND CONDITIONS</strong></p><p>Please read these terms and conditions carefully. By entering into this Nature India Annual photo contest (&ldquo;Promotion&rdquo;), you agree that you have read these terms and that you agree to them. Failure to comply with these terms and conditions may result in your disqualification from the Promotion.</p><ol><li>This Promotion is run by Nature Research, a division of Springer Nature Limited a company registered in England with registered number 00785998 and registered office at The Campus, 4 Crinan Street, London N1 9XW (&ldquo;Promoter&rdquo;).</li><li>To enter this Promotion you must be: (a) resident in a country where it is lawful for you to enter; and (b) aged 18 years old or over (or the applicable age of majority in your country if higher) at the time of entry. This Promotion is void in Cuba, Iran, North Korea, Sudan, and Syria and where prohibited or restricted by law.</li><li>This Promotion is not open to directors or employees (or members of their immediate families) of Promoter or any subsidiary of Promoter. Promoter reserves the right to verify the eligibility of entrants.</li><li>The Promotion is open for entries between 00:00 on 06/12/2020 and 23:59 on 31/12/2020 IST.</li><li>No purchase is necessary to enter this prize Promotion and will not increase your chances of winning.</li><li>You can enter this Promotion by emailing natureindia@nature.com</li><li>Only two entries per eligible person. More than two entries will be deemed to be invalid and may lead to disqualification.</li><li>Promoter accepts no responsibility for any entries that are incomplete, illegible, corrupted or fail to reach Promoter by the closing date for any reason. Proof of posting or sending is not proof of receipt. Entries via agents or third parties are invalid. No other form of entry is permitted. Please keep a copy of your entry as we will be unable to return entries or provide copies.</li><li>The prize for the Promotion consists of the following: Three cash awards worth $350, $250 and $200 for the top three entries respectively, a copy of the Nature India Special Annual Volume 2020 and a bag of goodies from Nature Research.</li><li>The prizes shall be awarded as follows: The prize will be decided in three weeks following the close of the Promotion. The winners will be notified via email. Winners will be selected by a four person panel of Nature staff, at least one of which will be independent from the Promotion, based on photographic merit, creativity, photo quality, and impact. Full names of the judging panel will be available on request. Any decision will be final and binding and no further communication will be entered into in relation to it.</li><li>Ownership of entries: for consideration into this Promotion, you must sign a license to publish form granting the intellectual property rights to Nature Research for your image. This may be used in promotional or marketing material in print and online. You confirm that your entry is your own original work, is not defamatory and does not infringe any laws, including privacy laws, whether of the UK or elsewhere, or any rights of any third party, that no other person was involved in the creation of your entry, that you have the right to give Promoter and its respective licensees permission to use it for the purposes specified herein, that you have the consent of anyone who is identifiable in your contribution or the consent of their parent, guardian or carer if they are under 18 (or the applicable age of majority), it is lawful for you to enter and that you agree not to transfer files which contain viruses or any other harmful programs.</li><li>The winner(s) of the Promotion shall be notified by email no more than three weeks after the Promotion closes.</li><li>The winner(s) will be required to confirm acceptance of the prize within ten working days and may be required to complete and return an eligibility form stating their age and residency details, among other details. Promoter will endeavour to ensure that winner(s) receive their prizes within 30 days of the date they confirm acceptance of the prize. If a winner does not accept the prize within ten days of being notified, they will forfeit their prize and Promoter reserves the right to choose another winner(s). Promoter&rsquo;s decision is final and Promoter reserves the right not to correspond on any matter.</li><li>The name, region of residence and likeness of the winners may be used by Promoter for reasonable post-event publicity in any form including on Promoter&rsquo;s website and social media pages at no cost.</li><li>You can find out who has won a prize by checking the Nature India blog website Indigenus (http://blogs.nature.com/indigenus).</li><li>Promoter reserves the right to cancel or amend these Terms and Conditions or change the Prize (to one of equal or greater value) as required by the circumstances. No cash equivalent to the Prize is available.</li><li>All personal data submitted by entrants is subject to and will be treated in a manner consistent with Promoter&rsquo;s Privacy Policy accessible at http://www.nature.com/info/privacy.html. By participating in this Promotion, entrants hereby agree that Promoter may collect and use their personal information and acknowledge that they have read and accepted the Promoter Privacy Policy.</li><li>Promoter may at its sole discretion disqualify any entrant found to be tampering or interfering with the entry process or operation of the website, or to be acting in any manner deemed to be disruptive of or prejudicial to the operation or administration of the Promotion.</li><li>Other than for death or personal injury arising from negligence of the Promoter, so far as is permitted by law, the Promoter hereby excludes all liability for any loss, damage, cost and expense, whether direct or indirect, howsoever caused in connection with the Promotion or any aspect of the Prize. All activities are undertaken at the entrants own risk. Your legal rights as a consumer are not affected.]</li></ol>', 33);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

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
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `post_headings`
--
ALTER TABLE `post_headings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `post_texts`
--
ALTER TABLE `post_texts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

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
