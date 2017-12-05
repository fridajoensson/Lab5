-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Värd: localhost:8889
-- Tid vid skapande: 05 dec 2017 kl 22:53
-- Serverversion: 5.6.35
-- PHP-version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Databas: `library`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `books`
--

CREATE TABLE `books` (
  `bookid` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `author` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `onloan` tinyint(1) NOT NULL,
  `duedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `books`
--

INSERT INTO `books` (`bookid`, `title`, `author`, `onloan`, `duedate`) VALUES
(1, 'The Hunger Games', 'Suzanne Collins', 1, '0000-00-00'),
(2, 'Harry Potter and the Order of thr Phoneix', 'J.K. Rowling', 0, '0000-00-00'),
(3, 'To Kill a Mockingbird', 'Harper Lee', 1, '0000-00-00'),
(4, 'Pride and Prejudice', 'Jane Austen', 1, '0000-00-00'),
(5, 'Twilight', 'Stephenie Meyer', 1, '0000-00-00'),
(6, 'The Book Thief', 'Markus Zusak', 0, '0000-00-00'),
(7, 'Animal Farmer', 'George Orwell', 0, '0000-00-00'),
(8, 'Gone with the Wind', 'Margaret Mitchell', 0, '0000-00-00'),
(9, 'The Fault in Our Stars', 'John Green', 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Tabellstruktur `login`
--

CREATE TABLE `login` (
  `userid` int(11) NOT NULL,
  `username` char(50) NOT NULL,
  `userpass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `login`
--

INSERT INTO `login` (`userid`, `username`, `userpass`) VALUES
(6, 'jacob', 'f862f167b85d41b225785c70d70808bc7337c1fe'),
(9, 'frida', '63f95bc90efeeeaf33e9dada0bfe114c8e8c08a9');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookid`);

--
-- Index för tabell `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `books`
--
ALTER TABLE `books`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT för tabell `login`
--
ALTER TABLE `login`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;