-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-02-2023 a las 19:08:25
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficio`
--

CREATE TABLE `oficio` (
  `id` int(30) NOT NULL,
  `N_P` int(20) NOT NULL,
  `No_Oficio` varchar(50) NOT NULL,
  `Intancia_Re` varchar(50) NOT NULL,
  `Asunto` varchar(300) NOT NULL,
  `Fecha_Re` date NOT NULL,
  `Responsable_At` varchar(30) NOT NULL,
  `Firma` varchar(30) NOT NULL,
  `Solicitante` varchar(30) NOT NULL,
  `Tema` varchar(30) NOT NULL,
  `Tipo_Rec` varchar(30) NOT NULL,
  `Fecha_T` date NOT NULL,
  `Turnado_A` varchar(50) NOT NULL,
  `img` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `oficio`
--

INSERT INTO `oficio` (`id`, `N_P`, `No_Oficio`, `Intancia_Re`, `Asunto`, `Fecha_Re`, `Responsable_At`, `Firma`, `Solicitante`, `Tema`, `Tipo_Rec`, `Fecha_T`, `Turnado_A`, `img`) VALUES
(23, 1, '1', 'CNDH', 'un solicitud sobre nuevo puedo para alguno de sus compañeros al que vea mas conveniente para el puesto', '2023-01-31', 'Matr. Adrian', 'Ing.Rodrigo', 'coordinador ', 'nuevos lugares de trabajo', 'Electronico', '2023-01-25', 'Leticia', 'Imagen de WhatsApp 2023-01-30 a las 10.33.51.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `id` int(30) NOT NULL,
  `No` int(20) NOT NULL,
  `Dirigido` varchar(80) NOT NULL,
  `Remitente` varchar(80) NOT NULL,
  `Asunto` varchar(450) NOT NULL,
  `fecha_Entr` date NOT NULL,
  `Instruccion` varchar(450) NOT NULL,
  `Fecha_Res` date NOT NULL,
  `Estatus` varchar(15) NOT NULL,
  `Prioridad` varchar(20) NOT NULL,
  `Reporte_Acc` varchar(30) NOT NULL,
  `Observaciones` varchar(300) NOT NULL,
  `img` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`id`, `No`, `Dirigido`, `Remitente`, `Asunto`, `fecha_Entr`, `Instruccion`, `Fecha_Res`, `Estatus`, `Prioridad`, `Reporte_Acc`, `Observaciones`, `img`) VALUES
(27, 31, 'Lic.Sara', 'Concanaco', 'un solicitud sobre nuevo puedo para alguno de sus compañeros al que vea mas conveniente para el puesto', '2023-01-30', 'reportar al mesto Adrian', '2023-01-31', 'En proceso ', 'Alta', 'Atender la solicitud', 'ninguna', 'Imagen de WhatsApp 2023-01-30 a las 10.33.51.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `permiso` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `pass`, `permiso`) VALUES
(1, 'Adrian', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(8, 'Sara', 'e10adc3949ba59abbe56e057f20f883e', 2),
(11, 'Claudia', '885f58a1458f6d7c9377911bbbce6070', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `oficio`
--
ALTER TABLE `oficio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `oficio`
--
ALTER TABLE `oficio`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
