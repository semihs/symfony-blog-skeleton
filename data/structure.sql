CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(1024) COLLATE utf8_turkish_ci NOT NULL,
  `slug` varchar(1024) COLLATE utf8_turkish_ci NOT NULL,
  `content` text COLLATE utf8_turkish_ci NOT NULL,
  `date_of_creation` datetime NOT NULL,
  `date_of_modification` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug_2` (`slug`),
  ADD KEY `slug` (`slug`),
  ADD KEY `date_of_creation` (`date_of_creation`),
  ADD KEY `date_of_modification` (`date_of_modification`);

ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;