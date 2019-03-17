<?php
$create = "CREATE TABLE `ksiazki` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;";
?>