symfony-blog-skeleton
=====================

A Symfony project created on September 9, 2016, 5:22 pm.

This project needed npm, bower and some gulp components for assets

Run the following lines

- cd /path/to/project-dir
- npm install
- bower install
- npm install gulp
- gulp



Theme Based Gulp compile
- gulp default-theme
- gulp backend-theme


Endpoints
---------

- /blog
- /blog/{slug}
- /admin/blog
- /admin/blog/add
- /admin/blog/{id}/edit
- /admin/blog/{id}/delete

Security
--------
Http basic authentication in memory users, look at the app/config/security.yml


Run The Following Sql
---------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(1024) COLLATE utf8_turkish_ci NOT NULL,
  `slug` varchar(1024) COLLATE utf8_turkish_ci NOT NULL,
  `content` text COLLATE utf8_turkish_ci NOT NULL,
  `date_of_creation` datetime NOT NULL,
  `date_of_modification` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `slug`, `content`, `date_of_creation`, `date_of_modification`) VALUES
(1, 'How to hello world with python (Edited)', 'how-to-hello-world-with-python-edited', '<ol>\r\n<li>\r\n		Make a python file for example ex1.py\r\n	</li>\r\n<li>\r\n		and put the following lines\r\n	</li>\r\n</ol>\r\n<pre class="brush: python; title: ; notranslate" title="">\r\nprint "This line has been printed"\r\n</pre>\r\n<p>\r\n	…and run ex1.py check output \r\n</p>', '2016-09-11 12:28:11', '2016-09-11 11:54:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug_2` (`slug`),
  ADD KEY `slug` (`slug`),
  ADD KEY `date_of_creation` (`date_of_creation`),
  ADD KEY `date_of_modification` (`date_of_modification`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;