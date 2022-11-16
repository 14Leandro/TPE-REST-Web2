-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2022 a las 02:20:16
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admin`, `email`, `password`) VALUES
(1, 'leandro@hotmail.com', '$2a$12$wg5gyRssFwAr5MJSt8669.J3vGk5vX9eG1VCOsq2EVxlL31fwB/xu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `name_categoria` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `name_categoria`, `imagen`) VALUES
(79, 'Bundesliga', '1665770813_bundesliga.png'),
(83, 'B Nacional', '1665845487_Primera-B-Nacional.png'),
(84, 'Ligue 1', '1665848867_Ligue 1.jpg'),
(85, 'La Liga', '1665848924_la_liga.png'),
(87, 'Serie A', '1665849003_serieA.png'),
(88, 'Premier League', '1665849700_Premier League.png'),
(91, 'Primera A', '1666040677_primera.png'),
(95, 'Eredivise', '1666042406_Eredivisie.png'),
(97, 'Liga tandilense', 'Tandil.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id_equipo` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `estadio` text NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `nombre`, `estadio`, `imagen`, `id_categoria`) VALUES
(29, 'Paris Saint German', 'Parque de los Príncipes', '', 84),
(30, 'Manchester United', 'Old Trafford', '', 88),
(31, 'Manchester City', 'Etihad Stadium', '', 88),
(36, 'Arsenal', 'Emirates Stadium', 'equipo.jpg', 88),
(37, 'Barcelona', 'Camp Nou', 'equipo.jpg', 85),
(38, 'Real Madrid', 'Santiago Bernabeu', 'equipo.jpg', 85),
(39, 'Atlético de Madrid', 'Cívitas Metropolitano', 'equipo.jpg', 85),
(40, 'Juventus', 'Allianz Stadium', 'equipo.jpg', 87),
(41, 'Milán', 'Stadio Giuseppe Meazza', 'equipo.jpg', 87),
(42, 'Napoli', 'Diego Armando Maradona', 'equipo.jpg', 87),
(43, 'Olympique de Marsella', 'Orange Vélodrome', 'equipo.jpg', 84),
(44, 'Olympique de Lyon', 'Groupama Stadium', 'equipo.jpg', 84),
(45, 'Bayern Múnich', 'Allianz Arena', 'equipo.jpg', 79),
(46, 'Borussia Dortmund', 'Signal Iduna Park', 'equipo.jpg', 79),
(48, 'Ajax', 'Johan Cruijff Arena', 'equipo.jpg', 95),
(49, 'PSV Eindhoven', 'Philips Stadion', 'equipo.jpg', 95),
(50, 'Boca Juniors', 'Alberto J. Armando', 'equipo.jpg', 91),
(51, 'River Plate', 'Monumental', 'equipo.jpg', 91),
(52, 'San Lorenzo', 'Pedro Bidegain', 'equipo.jpg', 91),
(53, 'All Boys', 'Islas Malvinas', 'equipo.jpg', 83),
(54, 'Sacachispas', 'Beto Larrosa', 'equipo.jpg', 83),
(56, 'San Martín Tucumán', 'La Ciudadela', 'equipo.jpg', 83),
(57, 'Talleres', 'Cordoba', 'Talleres.jpg', 91),
(58, 'Liverpool', 'Anfield', 'liverpool-png', 88);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_categoria_2` (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
