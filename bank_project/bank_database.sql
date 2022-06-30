-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 31 Mar 2022, 23:58
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
-- Baza danych: `db_mybank`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admins`
--

CREATE TABLE `admins` (
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `permission_lvl` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `admins`
--

INSERT INTO `admins` (`username`, `password`, `permission_lvl`) VALUES
('martyna', '$2y$10$UBPdBQ8xn3pbLQGZYGin2uMjUQISstIfL.HXosyZCEIUu1vRabKfC', 'admin'),
('moderator', '$2y$10$ugrAF6V306R7mE2P21a2d.wzMjL5ud4jKOmm/xATGeEGOA7IoTh.6', 'mod');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bank_acc`
--

CREATE TABLE `bank_acc` (
  `bank_no` varchar(16) NOT NULL,
  `wallet` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `bank_acc`
--

INSERT INTO `bank_acc` (`bank_no`, `wallet`) VALUES
('0265369670661966', 693.25),
('0871929141121666', 234525.52),
('2798755801882411', 658.26),
('2839864622147408', 542.63),
('3597236330969812', 7128.25),
('5924791034738866', 200),
('6302505450331179', 268.26),
('6630829992168050', 69523.36),
('7049143328965650', 200),
('7230217812341844', 5482.32),
('7269178203834266', 2.56),
('7348922271022127', 36025.24),
('7464166774766316', 34335.74),
('8741783922251230', 269688.15),
('8854127106323303', 5985),
('9599530544676408', 345.64);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `pesel` varchar(11) NOT NULL,
  `phone_no` varchar(9) NOT NULL,
  `sex` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `customer`
--

INSERT INTO `customer` (`id`, `name`, `last_name`, `dob`, `pesel`, `phone_no`, `sex`) VALUES
(1, 'Jan', 'Kowalski', '1978-03-09', '78030900987', '123456789', 'M'),
(2, 'Jerzy', 'Dudek', '1996-12-27', '96122700364', '456985237', 'M'),
(3, 'Joanna', 'Adamczyk', '1985-07-03', '85070300562', '852675123', 'K'),
(5, 'Marianna', 'Cieciorka', '2004-01-01', '04010120586', '598741256', 'K'),
(6, 'Jakub', 'Gaduła', '1958-09-23', '58092300576', '521366958', 'M'),
(7, 'Marcin', 'Kiepski', '1981-08-13', '81081300652', '888541269', 'M'),
(8, 'Jadwiga', 'Małorolna', '1995-05-05', '95050500666', '552158633', 'K'),
(9, 'Hanna', 'Radomska', '2000-08-07', '00080720565', '775845521', 'K'),
(10, 'Henryk', 'Wiosenka', '1944-09-25', '44092500221', '996585521', 'M'),
(11, 'Andrzej', 'Mrówka', '1975-03-29', '75032900251', '855214233', 'M'),
(12, 'Anna', 'Deszcz', '1999-02-02', '99020200652', '556254187', 'K'),
(13, 'Irena', 'Klawisz', '1969-02-28', '69022800633', '569555214', 'K'),
(14, 'Marzena', 'Pietruszka', '1981-06-08', '81060800154', '888521366', 'K'),
(15, 'Kamil', 'Ślimak', '1993-11-16', '93111600255', '569663224', 'M'),
(17, 'Martyna', 'Pydzinska', '2002-02-22', '11111111111', '111111111', 'K');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `customer_info`
--

CREATE TABLE `customer_info` (
  `acc_no` varchar(8) NOT NULL,
  `bank_no` varchar(16) NOT NULL,
  `pesel` varchar(11) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `customer_info`
--

INSERT INTO `customer_info` (`acc_no`, `bank_no`, `pesel`, `password`) VALUES
('32449405', '2798755801882411', '00080720565', '$2y$10$WnaN/nJajvIKx7Lhk5vROuhot9fTAVMGoaAAynoJLyQEoYCes.scu'),
('07467958', '9599530544676408', '04010120586', '$2y$10$1pfrfIz5hXlvYgshOamJQeT4V5/5o4S4J/HAyVKoUyjzowvA9lkCq'),
('74892103', '7049143328965650', '11111111111', '$2y$10$mfFhH4.Y11E5b5UBeCzEGuYQ8ZudVLPt/5Hd08jXVF2ptikJJJojO'),
('00138004', '0871929141121666', '44092500221', '$2y$10$nAoSP9tvHzk3f2XtNiDUB.ANi/l43i0v3SmRDFNMmqMsUyaUhCPaS'),
('37811925', '7464166774766316', '58092300576', '$2y$10$MkPiUg2T7PcYTz1LaZhIV.TrNrxoEMHDdTS9vjACoWKeIL2XPN15.'),
('33265488', '2839864622147408', '69022800633', '$2y$10$k01cS5roeE606agc9NGkRuvC2EjVQyvxq2FHXno.p8RTysXPH3zvi'),
('82786224', '8854127106323303', '75032900251', '$2y$10$.uzGYMY4t0LHb/vgwEbP5OVMsk/gNQaO3tZ69e9pYf6x0oyBA9k3W'),
('30289955', '6302505450331179', '78030900987', '$2y$10$QDI6vsRjLussok7qly3CYeI0jnnodfZAEQ0TInghPBo1ShNmXeQr2'),
('75796357', '7269178203834266', '81060800154', '$2y$10$1ys3VZC9bE4aeaYe7i99Iu.skCSGXFzDz/N0dfFyKzAXbTVMBk7jK'),
('05205948', '8741783922251230', '81081300652', '$2y$10$cJShc5H5ETU5XweutqRpO.RIJCkOGyOkqp47ZRuGZ9p8Dpa5BPDOO'),
('37297864', '0265369670661966', '85070300562', '$2y$10$CmqFF2foc6p9Roq8aC0hkejAgPG10UDTKSZrl8V/AVpBq7gphHkYK'),
('77371467', '6630829992168050', '93111600255', '$2y$10$cSVverfOycoCLuAs.tH7qOEyMNJwb72LgC2aEg2Rpi0D7gTMyvV8W'),
('31857830', '7230217812341844', '95050500666', '$2y$10$gcNWispAG1.SuFE6iPiOm.7kZPR4rS7XCbrzMbG.LFMnjfsdHACh6'),
('39874688', '3597236330969812', '96122700364', '$2y$10$/o8b1gBl8LikSONhQkHsjeLHzx9PIUjj0XojOmRl.hCqgE.5uvd9a'),
('73451120', '7348922271022127', '99020200652', '$2y$10$nrhCFJxCCkl2emgyBAejLOa7N.h8l/fh/J03YN/4tLDV55axyiaTO');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `sender` varchar(16) NOT NULL,
  `receiver` varchar(16) NOT NULL,
  `ammount` double NOT NULL,
  `dot` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `sender`, `receiver`, `ammount`, `dot`) VALUES
(1, '3597236330969812', '7269178203834266', 95, '2022-01-02'),
(2, '9599530544676408', '2839864622147408', 455, '2022-01-03'),
(3, '2839864622147408', '0871929141121666', 2000, '2022-01-04'),
(5, '7269178203834266', '6630829992168050', 37, '2022-03-13'),
(6, '7230217812341844', '0265369670661966', 21, '2022-01-17'),
(7, '0265369670661966', '7348922271022127', 521, '2022-01-20'),
(10, '0871929141121666', '3597236330969812', 20, '2022-02-01'),
(13, '7464166774766316', '8854127106323303', 659, '2022-02-03'),
(14, '8741783922251230', '3597236330969812', 35, '2022-03-04'),
(15, '6630829992168050', '3597236330969812', 584, '2022-02-05'),
(16, '7464166774766316', '9599530544676408', 10, '2022-02-11'),
(17, '6302505450331179', '2798755801882411', 199, '2022-02-12'),
(18, '6630829992168050', '9599530544676408', 32, '2022-02-14'),
(19, '7348922271022127', '8854127106323303', 46, '2022-02-17'),
(20, '6302505450331179', '6630829992168050', 63, '2022-02-19'),
(21, '8854127106323303', '9599530544676408', 620, '2022-02-24'),
(22, '6302505450331179', '7464166774766316', 96, '2022-02-25'),
(23, '7269178203834266', '8741783922251230', 284, '2022-02-28'),
(24, '2798755801882411', '3597236330969812', 100, '2022-03-27'),
(25, '2839864622147408', '0265369670661966', 100, '2022-03-28'),
(26, '2798755801882411', '3597236330969812', 50, '2022-03-31'),
(27, '2798755801882411', '3597236330969812', 50, '2022-03-31'),
(28, '2798755801882411', '3597236330969812', 75, '2022-03-31');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`username`);

--
-- Indeksy dla tabeli `bank_acc`
--
ALTER TABLE `bank_acc`
  ADD PRIMARY KEY (`bank_no`);

--
-- Indeksy dla tabeli `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FOREGIN` (`pesel`) USING BTREE;

--
-- Indeksy dla tabeli `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`pesel`),
  ADD KEY `bank_no` (`bank_no`);

--
-- Indeksy dla tabeli `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `FOREGIN` (`sender`,`receiver`) USING BTREE,
  ADD KEY `FK_receiver` (`receiver`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT dla tabeli `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `FK_pesel` FOREIGN KEY (`pesel`) REFERENCES `customer_info` (`pesel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `customer_info`
--
ALTER TABLE `customer_info`
  ADD CONSTRAINT `FK_bank_no` FOREIGN KEY (`bank_no`) REFERENCES `bank_acc` (`bank_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `FK_receiver` FOREIGN KEY (`receiver`) REFERENCES `bank_acc` (`bank_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_sender` FOREIGN KEY (`sender`) REFERENCES `bank_acc` (`bank_no`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
