-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Kwi 2021, 10:32
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `supp_order_food_web`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ofw_admin`
--

CREATE TABLE `ofw_admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `ofw_admin`
--

INSERT INTO `ofw_admin` (`id`, `full_name`, `username`, `password`) VALUES
(32, 'Karol', 'Baczek', '202cb962ac59075b964b07152d234b70'),
(33, 'Mateusz', 'Smak', '202cb962ac59075b964b07152d234b70'),
(34, 'Bary', 'Gagarin', '202cb962ac59075b964b07152d234b70'),
(35, 'Witold', 'Sroda', '202cb962ac59075b964b07152d234b70'),
(36, 'Ala', 'Marik', '202cb962ac59075b964b07152d234b70'),
(37, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ofw_category`
--

CREATE TABLE `ofw_category` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `featured` varchar(10) DEFAULT NULL,
  `active` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `ofw_category`
--

INSERT INTO `ofw_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(59, 'Pizza', 'Food_Category_46.jpg', 'yes', 'yes'),
(60, 'Burger', 'Food_Category_250.jpg', 'yes', 'yes'),
(61, 'Momo', 'Food_Category_326.jpg', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ofw_food`
--

CREATE TABLE `ofw_food` (
  `id` int(11) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `featured` varchar(30) DEFAULT NULL,
  `active` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `ofw_food`
--

INSERT INTO `ofw_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(18, 'Capricossa', 'Delicious Pizza', '25.00', 'Food_Name_3607.jpg', 59, 'yes', 'yes'),
(19, 'Lamp Dumplings', 'Wonderful Dumplings', '19.00', 'Food_Name_9046.jpg', 61, 'yes', 'yes'),
(20, 'Banger King', 'Fast Food', '15.00', 'Food_Name_4764.jpg', 60, 'yes', 'yes'),
(21, 'Pizza Italiana', 'Pizza with chesse', '23.00', 'Food_Name_7822.jpg', 59, 'yes', 'yes'),
(22, 'Burger Chisi', 'Burgerro', '12.00', 'Food_Name_6285.jpg', 60, 'yes', 'yes'),
(24, 'Piergos Banditos', 'Delicious Piergi Polskie', '35.00', 'Food_Name_3943.jpg', 61, 'yes', 'yes');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ofw_order`
--

CREATE TABLE `ofw_order` (
  `id` int(11) NOT NULL,
  `food` varchar(150) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` decimal(5,2) DEFAULT NULL,
  `order_date` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `customer_name` varchar(10) DEFAULT NULL,
  `customer_contact` varchar(30) DEFAULT NULL,
  `customer_email` varchar(30) DEFAULT NULL,
  `customer_address` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `ofw_order`
--

INSERT INTO `ofw_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(14, 'Pizza Italiana', '23.00', 2, '46.00', '2021-04-12 08:19:00pm', 'delivered', 'adsaasd', '123', 'ads@eweq', 'sdaasdasd');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `ofw_admin`
--
ALTER TABLE `ofw_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `ofw_category`
--
ALTER TABLE `ofw_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `ofw_food`
--
ALTER TABLE `ofw_food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indeksy dla tabeli `ofw_order`
--
ALTER TABLE `ofw_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `ofw_admin`
--
ALTER TABLE `ofw_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT dla tabeli `ofw_category`
--
ALTER TABLE `ofw_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT dla tabeli `ofw_food`
--
ALTER TABLE `ofw_food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT dla tabeli `ofw_order`
--
ALTER TABLE `ofw_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `ofw_food`
--
ALTER TABLE `ofw_food`
  ADD CONSTRAINT `ofw_food_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `ofw_category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
