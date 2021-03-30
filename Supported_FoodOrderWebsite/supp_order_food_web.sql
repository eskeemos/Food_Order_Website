-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 29 Mar 2021, 22:21
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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ofw_order`
--

CREATE TABLE `ofw_order` (
  `id` int(11) NOT NULL,
  `food` varchar(150) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `qty` decimal(10,2) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `order_date` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `customer_name` varchar(10) DEFAULT NULL,
  `customer_contact` varchar(30) DEFAULT NULL,
  `customer_email` varchar(30) DEFAULT NULL,
  `customer_address` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `ofw_category`
--
ALTER TABLE `ofw_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `ofw_food`
--
ALTER TABLE `ofw_food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `ofw_order`
--
ALTER TABLE `ofw_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
