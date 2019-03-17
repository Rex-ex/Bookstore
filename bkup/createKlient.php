<?php
$createKlienci ="CREATE TABLE `klienci` (
  `ID_klienta` int(11) NOT NULL,
  `Nazwisko` varchar(60) COLLATE utf8_polish_ci NOT NULL,
  `Imie` varchar(60) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_polish_ci NOT NULL,
  `kod_pocz` varchar(6) COLLATE utf8_polish_ci NOT NULL,
  `miasto` varchar(60) COLLATE utf8_polish_ci NOT NULL,
  `ulica` varchar(60) COLLATE utf8_polish_ci NOT NULL,
  `numer_domu` varchar(20) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;";
?>