-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2023 a las 23:41:29
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
-- Base de datos: `project`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `github` varchar(500) NOT NULL,
  `extlink` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`id`, `image`, `title`, `description`, `github`, `extlink`) VALUES
(1, 'happy tails.png', 'Happy Tails - Red social para adoptar mascotas', 'Proyecto en equipo en el que aporté:<br />\r\n                  • Funcionalidades de administrador de la app<br />\r\n                  • Integración de pasarela de pagos Mercado Pago<br />\r\n                  • Mapbox - geolocalización<br />\r\n                  • Formulario de creación de mascota - front y back<br />\r\n                  • Arreglé bugs en general', 'https://github.com/Final-Proyect-PETS', 'https://happytails.vercel.app'),
(2, 'pokefind.png', 'Pokefind - SPA usando PERN', 'Proyecto individual para PC de escritorio usando React, Redux, Express, Sequelize y PostgreSQL. Características:<br /><br />\r\n• Filtrados anidados<br />\r\n• Interacción con la API pública PokeApi<br />\r\n• Ordenamientos<br />\r\n• Búsqueda<br />\r\n• Creación de Pokemon propio en la base de datos SQL.<br />\r\n• Paginado en frontend<br />\r\n• Tarjeta de detalle', 'https://github.com/FerriProg/PI-Pokemon', 'https://pokefind.vercel.app/'),
(3, 'basto.png', 'Bastó Challenge Técnico', 'Este es un challenge que resolví para la empresa Bastó. Es un CRUD para PC de escritorio usando stack MERN con paginado, incluye tests unitarios de backend. Detalles a mejorar: CSS, agregar tests para front, agregar searchbar.', 'https://github.com/FerriProg/basto-technical-challenge', 'http://basto-tc-ferriprog.vercel.app/'),
(4, 'codo.png', 'Codo a Codo - Desafío Front', 'Es un trabajo práctico individual que consistió en replicar una página dada, y luego validar un formulario con javascript. Se utilizó Bootstrap 5.0 y Sweet Alert 2.', 'https://github.com/FerriProg/CAC-javascript', 'https://ferriprog.github.io/CAC-javascript/');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
