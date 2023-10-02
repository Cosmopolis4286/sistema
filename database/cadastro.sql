-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2023 a las 14:26:10
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cadastro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `address_emp`
--

CREATE TABLE `address_emp` (
  `id` int(11) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `neighborhood` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `num_hab` int(11) NOT NULL,
  `id_emp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `last name` text NOT NULL,
  `sex` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `id_type` int(11) NOT NULL,
  `num_ident` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parentes_emp`
--

CREATE TABLE `parentes_emp` (
  `id` int(11) NOT NULL,
  `id_emp` int(11) NOT NULL,
  `mother_ name` text NOT NULL,
  `father_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `photos_emp`
--

CREATE TABLE `photos_emp` (
  `id` int(11) NOT NULL,
  `route` text NOT NULL,
  `id_emp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_ident`
--

CREATE TABLE `type_ident` (
  `id_doc` int(11) NOT NULL,
  `info` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `type_ident`
--

INSERT INTO `type_ident` (`id_doc`, `info`) VALUES
(1, 'CPF'),
(2, 'RG'),
(3, 'Carteira Motorista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_sex`
--

CREATE TABLE `type_sex` (
  `id_sex` int(11) NOT NULL,
  `info` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `type_sex`
--

INSERT INTO `type_sex` (`id_sex`, `info`) VALUES
(1, 'Masculino'),
(2, 'Feminino');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `address_emp`
--
ALTER TABLE `address_emp`
  ADD KEY `id_emp` (`id_emp`);

--
-- Indices de la tabla `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sex` (`sex`),
  ADD KEY `id_type` (`id_type`);

--
-- Indices de la tabla `parentes_emp`
--
ALTER TABLE `parentes_emp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_emp` (`id_emp`);

--
-- Indices de la tabla `photos_emp`
--
ALTER TABLE `photos_emp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_emp` (`id_emp`);

--
-- Indices de la tabla `type_ident`
--
ALTER TABLE `type_ident`
  ADD PRIMARY KEY (`id_doc`);

--
-- Indices de la tabla `type_sex`
--
ALTER TABLE `type_sex`
  ADD PRIMARY KEY (`id_sex`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `parentes_emp`
--
ALTER TABLE `parentes_emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `photos_emp`
--
ALTER TABLE `photos_emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `type_ident`
--
ALTER TABLE `type_ident`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `type_sex`
--
ALTER TABLE `type_sex`
  MODIFY `id_sex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `address_emp`
--
ALTER TABLE `address_emp`
  ADD CONSTRAINT `address_emp_ibfk_1` FOREIGN KEY (`id_emp`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`sex`) REFERENCES `type_sex` (`id_sex`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `type_ident` (`id_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `parentes_emp`
--
ALTER TABLE `parentes_emp`
  ADD CONSTRAINT `parentes_emp_ibfk_1` FOREIGN KEY (`id_emp`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `photos_emp`
--
ALTER TABLE `photos_emp`
  ADD CONSTRAINT `photos_emp_ibfk_1` FOREIGN KEY (`id_emp`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
