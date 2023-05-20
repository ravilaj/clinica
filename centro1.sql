-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2023 a las 02:52:28
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `centro1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `dni_paciente` varchar(10) NOT NULL,
  `dni_medico` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `fecha`, `hora`, `dni_paciente`, `dni_medico`) VALUES
(41, '2023-05-10', '12:00:00', '09123456B', '1111111111'),
(42, '2023-05-10', '12:00:00', '09123456B', '3333333333'),
(44, '2023-05-16', '18:00:00', '02567912A', '3333333333'),
(45, '2023-05-16', '12:00:00', '09123456B', '1111111111'),
(46, '2023-05-16', '12:00:00', '09123456B', '3333333333'),
(47, '2023-05-17', '10:00:00', '09123456B', '1111111111');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `cod_espe` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`cod_espe`, `nombre`) VALUES
(111, 'Dermatologia'),
(222, 'Cardiología'),
(333, 'Otorrinolaringología'),
(444, 'Alergología'),
(555, 'Nutrición'),
(666, 'Pediatría');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historiales_medicos`
--

CREATE TABLE `historiales_medicos` (
  `id` int(11) NOT NULL,
  `dni_paciente` varchar(10) NOT NULL,
  `dni_medico` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `diagnostico` varchar(255) NOT NULL,
  `tratamiento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historiales_medicos`
--

INSERT INTO `historiales_medicos` (`id`, `dni_paciente`, `dni_medico`, `fecha`, `diagnostico`, `tratamiento`) VALUES
(1, '09123456B', '92451028L', '2023-05-15', 'le duele la cabeza', 'descanso, reposo y paracetamol'),
(3, '09123456B', '34671028D', '2023-05-16', 'fua', 'dm'),
(4, '02567912A', '34671028D', '2023-05-16', 'fasfasfas', 'sadf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `cod_especi` int(11) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`nombre`, `apellido`, `dni`, `cod_especi`, `telefono`, `email`, `contraseña`) VALUES
('Médico1', 'Apellido1', '1111111111', 111, '123456789', 'medico1@example.com', 'contraseña1'),
('Médico2', 'Apellido2', '2222222222', 333, '987654321', 'medico2@example.com', 'contraseña2'),
('Médico3', 'Apellido3', '3333333333', 222, '345678901', 'medico3@example.com', 'contraseña3'),
('Mario', 'Álvarez ', '34671028D', 222, '623345023', 'mario@renax.es', '$2y$10$VNdOv5rx8dynVvYf//qnxummfNMP0VEiSNqerFfcambHC41GtaczO'),
('Médico4', 'Apellido4', '4444444444', 444, '456789012', 'medico4@example.com', 'contraseña4'),
('Médico5', 'Apellido5', '5555555555', 555, '567890123', 'medico5@example.com', 'contraseña5'),
('Médico6', 'Apellido6', '6666666666', 666, '678901234', 'medico6@example.com', 'contraseña6'),
('Antonio', 'García Vázquez ', '92451028L', 111, '908345678', 'antonio@gmail.com', '$2y$10$i1ljF4ul3uIYDR.abdII1e2rrOgG6945JGPYlqlIMur3Y6RPvs7ne');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `genero` enum('Hombre','Mujer','Otro') NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`nombre`, `apellidos`, `dni`, `fecha_nacimiento`, `genero`, `direccion`, `telefono`, `email`, `contraseña`) VALUES
('Eric', 'Ruiz', '02567912A', '2002-05-18', 'Hombre', 'Barcelona', '623071236', 'eric@gmail.com', '$2y$10$tu7UngWKgoWFXoH7zrtBpu8OvSW9YBBPMCjG4WxIVOSfx4.M60B6C'),
('Rodrigo', 'Avila', '09123456B', '2003-07-24', 'Hombre', 'Calle Sol', '908345029', 'ro@gmail.com', '$2y$10$mad0xVgfnXxq0D3yUolT8OPdTS4Pb.LXl75b5wLToEy4SKpk82JmW');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE `recetas` (
  `id_receta` int(11) NOT NULL,
  `id_historial` int(11) NOT NULL,
  `medicamento` varchar(255) NOT NULL,
  `dosis` varchar(255) NOT NULL,
  `instrucciones` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recetas`
--

INSERT INTO `recetas` (`id_receta`, `id_historial`, `medicamento`, `dosis`, `instrucciones`) VALUES
(1, 1, 'paracetamol', 'cada 24 horas', 'no morirse'),
(3, 3, 'pop', 'fuerte', 'nada'),
(4, 4, 'asdfaas', 'asdfas', 'sadfas');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dni_paciente` (`dni_paciente`),
  ADD KEY `dni_medico` (`dni_medico`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`cod_espe`);

--
-- Indices de la tabla `historiales_medicos`
--
ALTER TABLE `historiales_medicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dni_paciente` (`dni_paciente`),
  ADD KEY `dni_medico` (`dni_medico`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`dni`),
  ADD KEY `cod_especi` (`cod_especi`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`id_receta`),
  ADD KEY `id_historial` (`id_historial`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `historiales_medicos`
--
ALTER TABLE `historiales_medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
  MODIFY `id_receta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`dni_paciente`) REFERENCES `pacientes` (`dni`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`dni_medico`) REFERENCES `medicos` (`dni`);

--
-- Filtros para la tabla `historiales_medicos`
--
ALTER TABLE `historiales_medicos`
  ADD CONSTRAINT `historiales_medicos_ibfk_1` FOREIGN KEY (`dni_paciente`) REFERENCES `pacientes` (`dni`),
  ADD CONSTRAINT `historiales_medicos_ibfk_2` FOREIGN KEY (`dni_medico`) REFERENCES `medicos` (`dni`);

--
-- Filtros para la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD CONSTRAINT `medicos_ibfk_1` FOREIGN KEY (`cod_especi`) REFERENCES `especialidades` (`cod_espe`);

--
-- Filtros para la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD CONSTRAINT `recetas_ibfk_1` FOREIGN KEY (`id_historial`) REFERENCES `historiales_medicos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
