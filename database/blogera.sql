-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2021 at 08:06 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogera`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `email_ocperson` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `comment_text`, `email_ocperson`, `status`) VALUES
(41, 23, 'nice post', 'nadeem77599@gmail.com', 1),
(42, 23, 'great post', 'nadeem77599@gmail.com', 1),
(43, 22, 'this post is related to wordpress', 'nadeem77599@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `author`, `image`, `view`) VALUES
(21, 'Standing Alone with purpose', 'Pages are what people tend to think of as &ldquo;regular web pages.&rdquo; They are\r\nintended to be (relatively) static and can stand alone and still have context and\r\nmeaning. The best examples of pages are the About Me and Contact pages. If\r\nyou get to those pages on a site, they make sense all on their own. They don&rsquo;t\r\nneed any other pieces of content for context or to make sense. Pages can&rsquo;t be\r\nassigned to a category or tag, and although pages do have published dates and\r\nauthors, you can&rsquo;t look at all pages in a list (easily) using either of those. Pages\r\naren&rsquo;t just boring old content, though. They have tricks of their own&mdash;page templates. Page templates are used to do things like have content without sidebars,\r\nhave a Page that displays Posts, and many other cool things we&rsquo;ll see throughout this chapter and book. The catch is that Page templates are defined by the\r\ntheme you&rsquo;re using. Some themes have lots of Page templates; others only one\r\n(the default one). Pages were developed as a response to WordPress users who\r\nwanted content that could stand alone outside of the stream of blog posts and\r\nmaintain a place in the site. We all wanted Contact and About pages that we\r\ncould keep outside of the flow of posts and be used for content that didn&rsquo;t match\r\nup nicely with what a blog post was or is. Pages were also the first things to be\r\npulled into the early ways we handled menus. The reasoning is that we wanted\r\npeople to read our posts, but the pages were the extra information (About,\r\nContact, Downloads, Hiring) that visitors wanted to know as well. Then people\r\nwanted to use WordPress to make &ldquo;traditional websites&rdquo; and things got really\r\ninteresting, but that&rsquo;s a story for Chapter 17, &ldquo;Advanced WordPress Settings and\r\nUses.&rdquo; Now what if you&rsquo;d like content that looks, works, and behaves like a post,\r\nbut not in the stream of blog posts? Content that is contextually linked, but as\r\nyou create more content, it doesn&rsquo;t clutter up your stream of carefully crafted blog\r\nposts? That is why and how Custom Post Types were developed and added to\r\nWordPress.', 'nadeem', '9.jpg', 12),
(22, ' Pulling Posts Out of the Blog Stream', 'WordPress 3.0 (Thelonious) didn&rsquo;t just bring in menus, new admin interfaces,\r\nand other changes; WordPress 3.0 also introduced Custom Post Types to the\r\nWordPress community. Custom Post Types are pieces of content that work and\r\nbehave like posts, but they don&rsquo;t appear in your &ldquo;regular&rdquo; stream of posts. For\r\nexample, you want to add testimonials, happy customers gushing about you\r\nand your company, to your site. It makes sense to have those as posts because\r\nyou can easily put all testimonials in a Testimonials category and point visitors\r\nto something like http://abgwp.trishusseyc.om/archive/testimontials (or just\r\n/testimonials if you use WordPress SEO and set it up to do that&mdash;see Chapter 7,\r\n&ldquo;Setting Up Your WordPress Site the Right Way: SEO, Social Media, and More&rdquo;).', 'nadeem', '12.jpg', 32),
(23, 'Styling Posts in New Ways', 'WordPress 3.1 (Reinhardt) brought in a new way to style posts: Post Formats. Post\r\nFormats are designed to allow theme designers to provide ways to offer quick,\r\nstyled ways of presenting content. Formats such as asides, quotes, images (where\r\nthe entire Post is a single image), and image galleries are some of the default Post\r\nFormats WordPress starts with (themes and plugins can create their own, as well).\r\nYou can read the (somewhat geeky) explanation on the WordPress Codex (http://\r\ncodex.wordpress.org/Post_Formats), but essentially, Post Formats created a standardized way to let WordPress users have a similar experience as Tumblr (www.\r\nTumblr.com), which is a hosted blogging service that focuses on the idea of post\r\nformats as a way to style content in different ways. So if you have a quote you&rsquo;d\r\nlike to share, it might have a nice big quote mark image at the top; maybe the\r\ntext is in a nice italic font, and there is space at the bottom for who said the sage\r\nwords. Photo galleries, asides, even Twitterlike status updates&mdash;each has a style\r\nthat reflects and displays that content in the best way possible. The important', 'nadeem', '11.jpg', 47),
(24, 'post format      ', '&lt;p&gt;When Tumblr came onto the scene in 2007, it turned the blogging world on its head. Instead of focusing on posts as posts, Tumblr looked at each type of content and developed styles to match and reflect the content. So, yes, Text (a post in the WordPress world) is pretty straightforward, but the way Tumblr styled quotes, pictures, updates (like Twitter tweets), and other content was quite interesting and appealing to people. In 2011, WordPress 3.1 first included Post Formats as a way to appeal and keep up with the Tumblr phenomenon. By officially codifying Post Formats into the WordPress core, it made it easier for theme developers to take advantage of, making certain kinds of posts look different from others just by letting users click an option button in the Post Editor. The standard Post Formats are as follows: &amp;bull; Aside &amp;bull; Gallery &amp;bull; Link &amp;bull; Image &amp;bull; Quote &amp;bull; Status &amp;bull; Video &amp;bull; Audio &amp;bull; Chat&lt;/p&gt;\r\n', 'nadeem', '14.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`) VALUES
(4, 'nadeem77599@gmail.com', 'nadeem mughal', '$2y$10$eqsE1cJOSrxW1oIPg3gQSuFrWMoFHm5olkrKqZOYxZyzUT7vaq8fm'),
(8, 'asad@gmail.com', 'asad', '$2y$10$RhsHVKTBUFVPoKBBGUkJi.HRI5.qJu.uqwaswRBiWWAhu83cyt91y'),
(9, 'jhon@gmail.com', 'jhon', '$2y$10$GupI1.3i7BsRdBbaAMcSy.b5YzCxiSKabtIGLslRoLbQEMT9KqGou'),
(10, 'dream@gmail.com', 'dream', '$2y$10$3oMWJD0UIOxADUi/iHo8j.J9tfJWtjf9nZjQQ/6YwgsoUGI2pbJ8K'),
(11, 'abc@gmail.com', 'abc', '$2y$10$criM0uLKPM0ts.JxLCJUdOxbCVcaMXzboLnowBoVp4sRhH2qIrsyu'),
(12, 'doctor@gmail.com', 'doctor', '$2y$10$4AZ9G2raDGGedBSV2TYM3elshlXshqISEj5KEfwv1FXHuI1qhOd9W'),
(13, 'cm@gmail.com', 'cm', '$2y$10$9IVpyG4X6EEARapXkbrjHeCnujDLGvGMqxLV2EcTNITzECT0QtqvS'),
(14, 'xyz@gmail.com', 'xyz', '$2y$10$ukxEqd4HrzKHsrJC/JpJ1uvVCwFQtOyM3bSfd35XEfWqsjauMQjJ6'),
(15, 'habib@gmail.com', 'habib', '$2y$10$/./91g6GE16qYEMEavTBfujpMI6TrZ8e6woucIxrFqM7xTaZEWUVW'),
(16, 'aslam@gmail.com', 'aslam', '$2y$10$w06uzeolxMen4lLwx9jF6.4kOD7Imh4/CE7Du4O/AaVL6ormU7RJa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
