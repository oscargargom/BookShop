-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-05-2022 a las 10:13:38
-- Versión del servidor: 8.0.13-4
-- Versión de PHP: 7.2.24-0ubuntu0.18.04.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `8JkSo36oKE`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(100) NOT NULL,
  `flat` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `pin_code` int(11) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`id`, `name`, `number`, `email`, `method`, `flat`, `street`, `city`, `state`, `country`, `pin_code`, `total_products`, `total_price`) VALUES
(1, 'oscar', '666999888', 'oscar@gmail.com', 'cash on delivery', 'C/Rosales Nº25 ', 'Casa 8', 'Ecija', 'Sevilla', 'España', 41400, 'Prueba (1) , prueba23r2434 (1) , El arte de amar (1) , prueba3 (1) ', '50'),
(2, 'asdf', '668889999', 'asdfa@gmail.com', 'credit cart', 'dsf', 'asd', 'sdf', 'asdf', 'sdf', 3453, 'El principito (2) , El arte de amar (1) ', '36'),
(3, 'sdfadsdf', '23432', 'dafsdf@gmail.com', 'paypal', 'sdfsd', 'fas', 'adsfas', 'adsfas', 'sdfasdf', 1233, 'Juego de tronos (1) , El arte de amar (1) ', '24'),
(4, 'dfsdf', '23524234', 'dsfasdf@gmail.com', 'cash on delivery', 'dfasdf', 'adsfa', 'asdfsa', 'asdfsa', 'asdfasf', 13123, 'Juego de tronos (1) , El arte de amar (1) ', '24'),
(5, 'Oscar', '666000888', 'prueba@gmail.com', 'cash on delivery', 'C/Imaginaria', 'C/Imaginaria 2', 'Ecija', 'Sevilla', 'España', 4100, 'Juego de tronos (1) , Palabras radiantes (1) , Nacidos de la bruma (1) , El arte de amar (1) , Mi historia (1) ', '61'),
(6, 'dsaf', '32342423432', 'adfads@gmail', 'contra-reembolso', 'asfd', 'ads', 'asdf', 'asdf', 'fasd', 2344, 'Juego de tronos (1) , Palabras radiantes (1) , Nacidos de la bruma (1) , El arte de amar (1) , Mi historia (1) ', '61'),
(7, 'sdfasdf', '3445435', 'sdfasfd@gmail.com', 'Contra-reembolso', 'adfa', 'adfasf', 'asdfas', 'asfdaf', 'adsfa', 4303, 'Juego de tronos (1) , Palabras radiantes (1) , Nacidos de la bruma (1) , El arte de amar (1) , Mi historia (1) ', '61');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(16, 'El arte de amar', '12.99', 'libro02.jpg'),
(21, 'Juego de tronos', '12.99', 'libro03.jpg'),
(23, 'Mi historia', '14.99', 'libro05.jpg'),
(25, 'El camino de los reyes', '9', 'king.jpg'),
(26, 'Palabras radiantes', '9', 'radiantes.jpg'),
(27, 'Nacidos de la bruma', '11', 'mistborn.jpg'),
(28, 'Cien años de soledad', '4', 'libro04.jpg'),
(29, 'El principito', '10', 'libro01.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'admin'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombreCompleto` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `telefono` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombreCompleto`, `username`, `email`, `telefono`, `password`, `rol_id`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', '666000666', '$2y$10$ah2CEah9qHjW1HOTyi/ETu7WiVFdliUYMN4O4xDsgjNMlFiuiR6dm', 1),
(2, 'usuario', 'usuario', 'usuario@usuario.com', '777000777', '$2y$10$ykHo4jqeVza9Fb.k.xxxvedtPM.xc56mRTzqka81ghoAgvvG/U606', 2),
(15, 'usuarioPrueba', 'UsuarioPrueba', 'usuarioPrueba@gmail.com', '123445656', '$2y$10$QhrLjfAfTrXBPig0K1v5geqfiKXPwTINYo0SHNqqKOcoFmxzwubR.', 2),
(16, 'prueba1', 'prueba1', 'prueba1@gmail.com', '666888999', '$2y$10$i20F0P.Kfz49VCb5X1nPGehy6J86zW4VE0EhRsSWVFO8y1.NDI87y', 2),
(20, 'Pilar Martín Carmona ', 'Pilaruki', 'Pilarmartcar@gmail.com', '658722263', '$2y$10$LFIvfCsP/pPl1yxyoYSwtusyKRgz4tjmVRJ4ud.S1/SGN8EEi02Wq', 2),
(21, 'asdf', 'asdf', 'asdf@gmail.com', '234234', 'asdf', 2),
(22, 'pruebaproyecto', 'pruebaproyecto', 'pruebaproyecto@gmail.com', '666999000', '$2y$10$XDVQw/U5DERKwxATHNV1EeIJmDBQXY/7lvFyjaVD1kTCDWT4UOsi6', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarios_ibfk_1` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
