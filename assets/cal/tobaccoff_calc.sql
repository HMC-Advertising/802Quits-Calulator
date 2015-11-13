-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: tff-prd.tmts.local
-- Tiempo de generación: 19-07-2012 a las 18:20:24
-- Versión del servidor: 5.0.95
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tobaccoff_calc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `UserID` varchar(50) NOT NULL,
  `AgeStarted` varchar(4) NOT NULL,
  `CurrentAge` varchar(4) NOT NULL,
  `AveragePacks` varchar(10) NOT NULL,
  `CurrentPrice` varchar(10) NOT NULL,
  `MoneySpent` varchar(10) NOT NULL,
  `TrueCost` varchar(10) character set latin1 collate latin1_spanish_ci NOT NULL,
  `SixMonths` varchar(10) character set latin1 collate latin1_spanish_ci NOT NULL,
  `OneYear` varchar(10) NOT NULL,
  `FiveYears` varchar(10) NOT NULL,
  `TenYears` varchar(10) NOT NULL,
  `TwentyYears` varchar(10) character set latin1 collate latin1_spanish_ci NOT NULL,
  `UpdatedDate` date NOT NULL,
  PRIMARY KEY  (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Reports';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
