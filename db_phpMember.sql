-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 16 Mar 2018, 17:09:34
-- Sunucu sürümü: 5.7.17
-- PHP Sürümü: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `db_phpMember`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `login_tokens`
--

CREATE TABLE `login_tokens` (
  `tokenID` int(11) UNSIGNED NOT NULL,
  `token` char(64) NOT NULL,
  `userID` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `userID` int(11) UNSIGNED NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `email`, `created_at`) VALUES
(3, 'admin', '$2y$10$PQ09tA7TTgKT47Mmmro0wuMSGcrZDH0CowdYI9fFbjggqZjTrBGQu', 'admin@admin.com', '2018-03-09 20:36:33'),
(4, 'berkay', '$2y$10$gFVQ5PB617ma2Yi/uKpVhOjXXkGJoeCPs1GjXverrSp6gmoEtb7c.', 'berkay@berkayozcan.com.tr', '2018-03-10 13:45:42');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `login_tokens`
--
ALTER TABLE `login_tokens`
  ADD PRIMARY KEY (`tokenID`),
  ADD UNIQUE KEY `token` (`token`),
  ADD KEY `userID` (`userID`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `login_tokens`
--
ALTER TABLE `login_tokens`
  MODIFY `tokenID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `login_tokens`
--
ALTER TABLE `login_tokens`
  ADD CONSTRAINT `login_tokens_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
