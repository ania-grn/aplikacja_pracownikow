-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Cze 2024, 14:14
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `aplikacja`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE `pracownicy` (
  `ID` int(11) NOT NULL,
  `Imie` varchar(20) NOT NULL,
  `Nazwisko` varchar(30) NOT NULL,
  `Wiek` int(3) NOT NULL,
  `Staz` int(3) NOT NULL,
  `Stanowisko` varchar(30) NOT NULL,
  `Wydzial` varchar(30) NOT NULL,
  `Pensja` int(20) NOT NULL,
  `Data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `pracownicy`
--

INSERT INTO `pracownicy` (`ID`, `Imie`, `Nazwisko`, `Wiek`, `Staz`, `Stanowisko`, `Wydzial`, `Pensja`, `Data`) VALUES
(1, 'Anastazja', 'Kaczmarek', 16, 69, 'Naczelny idiota', 'Inne', 0, '2024-05-27'),
(2, 'Kinga', 'Rizzwoźna', 23, 2, 'Edger', 'Inne', 20, '2024-05-27'),
(3, 'Wiktor', 'Zdziarski', 50, 12, 'Księgowy', 'Finanse', 5320, '2024-06-03'),
(4, 'Witold', 'Korpal', 43, 7, 'Dyrektor', 'Dyrekcja', 12600, '2024-06-03'),
(5, 'Ludwik', 'Kapuściński', 37, 5, 'Informatyk', 'Dział IT', 15000, '2024-06-03'),
(6, 'Dagmara', ' Jaskuła', 36, 10, 'Sekretarka', 'Biuro', 3500, '2024-06-03'),
(7, 'Nikola ', 'Ferdyn', 25, 3, 'Kierowca', 'Zaopatrzenie', 8630, '2024-06-03'),
(8, 'Klaudia ', 'Jakubowska', 52, 20, 'Kierownik', 'Kadry', 6730, '2024-06-03'),
(9, 'Czesław ', 'Płomiński', 45, 13, 'Pracownik', 'Produkcja', 3470, '2024-06-03'),
(10, 'Olga ', 'Pachowicz', 23, 1, 'Doradca ds. social mediów', 'Inne', 5340, '2024-06-03');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
