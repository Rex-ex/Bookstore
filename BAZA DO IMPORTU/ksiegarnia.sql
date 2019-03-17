-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Cze 2017, 22:04
-- Wersja serwera: 10.1.21-MariaDB
-- Wersja PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `ksiegarnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gry`
--

CREATE TABLE `gry` (
  `ID_gry` int(6) NOT NULL,
  `ilosc` int(5) NOT NULL,
  `tytul` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `wydawnictwo` varchar(60) COLLATE utf8_polish_ci NOT NULL,
  `kategoria` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `rok_wydania` varchar(4) COLLATE utf8_polish_ci NOT NULL,
  `cena` float NOT NULL,
  `promocja` varchar(2) COLLATE utf8_polish_ci NOT NULL,
  `nowosc` tinyint(1) NOT NULL,
  `grafika` varchar(60) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `gry`
--

INSERT INTO `gry` (`ID_gry`, `ilosc`, `tytul`, `wydawnictwo`, `kategoria`, `rok_wydania`, `cena`, `promocja`, `nowosc`, `grafika`) VALUES
(1, 3, 'Alias', 'Tactic', 'Planszowe', '2015', 66.84, '28', 0, 'a.jpg'),
(2, 31, 'Party Time', 'Albi', 'Planszowe', '2012', 60.79, '31', 0, 'b.jpg'),
(3, 25, 'Wsiąść do Pociągu: Europa', 'Rebel', 'Planszowe', '2015', 113.98, '36', 0, 'c.jpg'),
(4, 105, 'Kotostrofa', 'Rebel', 'Podróżne', '2016', 34.37, '24', 1, 'd.jpg'),
(5, 57, 'Gobblety Gra', 'Foxgames', 'Logiczne', '2015', 50.41, '37', 0, 'e.jpg'),
(6, 98, 'Memo Labirynty', 'Babaryba', 'Edukacyjne', '2016', 30.87, '32', 1, 'f.jpg'),
(7, 7, 'Palce w pralce', 'Rebel', 'Karciane', '2015', 32.93, '27', 0, 'g.jpg'),
(8, 25, 'Bohater do wynajęcia', 'Portal Games', 'Karciane', '2017', 33.52, '33', 1, 'h.jpg'),
(9, 9, 'Kostka Rubika 2x2', 'TM Toys', 'Logiczne', '2016', 21.99, '0', 1, 'i.jpg'),
(10, 254, 'Wszechświat Quiz', 'Alexander', 'Edukacyjne', '2013', 13.99, '0', 0, 'j.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `ID_klienta` int(11) NOT NULL,
  `Nazwisko` varchar(60) COLLATE utf8_polish_ci NOT NULL,
  `Imie` varchar(60) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_polish_ci NOT NULL,
  `kod_pocz` varchar(6) COLLATE utf8_polish_ci NOT NULL,
  `miasto` varchar(60) COLLATE utf8_polish_ci NOT NULL,
  `ulica` varchar(60) COLLATE utf8_polish_ci NOT NULL,
  `numer_domu` varchar(20) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`ID_klienta`, `Nazwisko`, `Imie`, `email`, `kod_pocz`, `miasto`, `ulica`, `numer_domu`) VALUES
(1, 'Jackowiak', 'Andżelika', 'angela@wp.pl', '88-969', 'Kraków', 'Bydgoska', '3/99'),
(2, 'Marecki', 'Adam', 'amar123@op.pl', '42-280', 'Częstochowa', 'Admiralska', '86/7'),
(3, 'Urbański', 'Jacek', 'urbaneq@wp.pl', '62-800', 'Kalisz', 'Ułańska', '3/4'),
(4, 'Piechocki', 'Mateusz', 'piechu9933@gmail.com', '00-123', 'Warszawa', '3-go Maja', '6/13'),
(5, 'Józefiak', 'Paweł', 'mauris111@gmail.com', '61-162', 'Poznań', 'os. Piastowskie', '78/132'),
(6, 'Jakubowski ', 'Wiesław', 'wijakubek@op.pl', '61-829', 'Poznań', 'Podgórna', '39/6'),
(7, 'Miszczyk', 'Olga', 'miszczolga@wp.pl', '51-109', 'Wrocław', 'Bałtycka', '1/3'),
(8, 'Parska', 'Natalia', 'natu345@wp.pl', '80-177', 'Gdańsk', 'Chabrowa', '12'),
(9, 'Brońska', 'Magdalena', 'brosia2222@gmail.com', '87-100', 'Toruń', 'Kopernika', '7/9'),
(10, 'Smuszka', 'Ilona', 'ilonasmuszka@gmail.com', '22-540', 'Białystok', 'Zabłąkanych', '9');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ksiazki`
--

CREATE TABLE `ksiazki` (
  `ID_ksiazki` int(6) NOT NULL,
  `ilosc` int(5) NOT NULL,
  `tytul` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `autor` varchar(60) COLLATE utf8_polish_ci NOT NULL,
  `kategoria` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `rok_wydania` varchar(4) COLLATE utf8_polish_ci NOT NULL,
  `ISBN` varchar(13) COLLATE utf8_polish_ci NOT NULL,
  `cena` float NOT NULL,
  `promocja` varchar(2) COLLATE utf8_polish_ci NOT NULL,
  `nowosc` tinyint(1) NOT NULL,
  `grafika` varchar(60) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `ksiazki`
--

INSERT INTO `ksiazki` (`ID_ksiazki`, `ilosc`, `tytul`, `autor`, `kategoria`, `rok_wydania`, `ISBN`, `cena`, `promocja`, `nowosc`, `grafika`) VALUES
(1, 7, 'Cisza', 'Kagge Erling', 'Poradniki', '2017', '9788328706521', 18.4, '0', 1, '1.jpg'),
(2, 13, 'Spokój jest rozwiązaniem\r\nJak stosować kontemplację do rozwiązywania życiowych problemów', 'Park Keith', 'Poradniki', '2014', '9788363965396', 18.2, '0', 0, '2.jpg'),
(3, 21, 'Czas Żniw\r\nThe Bone Season', 'Shannon Samantha', 'Fantastyka', '2013', '9788379240821', 22.6, '0', 0, '3.jpg'),
(4, 6, 'Baśniobór', 'Brandon Mull', 'Literatura młodzieżowa', '2011', '9788377478622', 19.9, '37', 0, '4.jpg'),
(5, 34, 'Milczenie', 'Endo Shusaku', 'Powieść', '2017', '9788324043330', 25, '15', 0, '5.jpg'),
(6, 21, 'Najmroczniejszy sekret', 'Alex Marwood', 'Kryminał', '2017', '9788379857623', 25.69, '27', 1, '6.jpg'),
(7, 14, 'Zabójca z sąsiedztwa', 'Marwood Alex', 'Kryminał', '2016', '9788379857692', 25.69, '27', 0, '7.jpg'),
(8, 24, 'Python Podstawy nauki o danych', 'Boschetti Alberto', 'Informatyka', '2017', '9788328334236', 69.62, '10', 0, '8.jpg'),
(9, 33, 'Imperium burz', 'Maas Sarah J.', 'Fantastyka', '2017', '9788328037304', 31.97, '37', 1, '9.jpg'),
(10, 48, 'Kroniki Archeo Sekret Wielkiego Mistrza\r\nTom III', 'Stelmaszyk Agnieszka', 'Literatura młodzieżowa', '2014', '9788326500206', 17.94, '40', 0, '10.jpg');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `gry`
--
ALTER TABLE `gry`
  ADD PRIMARY KEY (`ID_gry`);

--
-- Indexes for table `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`ID_klienta`);

--
-- Indexes for table `ksiazki`
--
ALTER TABLE `ksiazki`
  ADD PRIMARY KEY (`ID_ksiazki`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `gry`
--
ALTER TABLE `gry`
  MODIFY `ID_gry` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `ID_klienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  MODIFY `ID_ksiazki` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
