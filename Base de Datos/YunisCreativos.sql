-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-03-2018 a las 17:08:31
-- Versión del servidor: 5.5.57-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `YunisCreativos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Actividad`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `color` varchar(7) NOT NULL,
  `idEvento` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idEvento` (`idEvento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `Actividad`
--

INSERT INTO `events` (`id`, `title`, `start`, `end`, `color`, `idEvento`) VALUES
(NULL, 'Visita museo', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '#FF0000', 1),
(2, 'Visita parque', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '#FF0000', 2),
(3, 'Visita restaurante', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '#FF0000', 3),
(4, 'Visita museo', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '#FF0000', 4),
(5, 'Visita restaurante', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '#FF0000', 5),
(6, 'Visita museo', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '#FF0000', 6),
(7, 'Visita restaurante', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '#FF0000', 7),
(8, 'Visita parque', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '#FF0000', 8),
(9, 'Visita museo', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '#FF0000', 9),
(10, 'Visita parque', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '#FF0000', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Alergia`
--

CREATE TABLE IF NOT EXISTS `Alergia` (
  `idAlergia` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`idAlergia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `Alergia`
--

INSERT INTO `Alergia` (`idAlergia`, `descripcion`) VALUES
(1, 'paracetamol'),
(2, 'trabajo'),
(3, 'NKA'),
(4, 'limon'),
(5, 'sol'),
(6, 'Pescado'),
(7, 'musica banda'),
(8, 'aspirina'),
(9, 'almendras'),
(10, 'ibuprofeno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `idUsuario` int(11) NOT NULL,
  `idEvento` int(11) NOT NULL,
  `fechaMensaje` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mensaje` varchar(250) NOT NULL,
  PRIMARY KEY (`idUsuario`,`idEvento`),
  KEY `idEvento` (`idEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`idUsuario`, `idEvento`, `fechaMensaje`, `mensaje`) VALUES
(1, 1, '2001-01-17 00:00:00', 'Hola amigos'),
(2, 2, '2002-01-17 00:00:00', 'alguien sabe donde es la comida'),
(3, 3, '2003-01-17 00:00:00', 'Le avisan a roberto que olvido sus lentes en el camion'),
(4, 4, '2004-01-17 00:00:00', 'como estan todos?'),
(5, 5, '2005-01-17 00:00:00', 'donde esta el camion?'),
(6, 6, '2006-01-17 00:00:00', 'a que hora es la visita al museo?'),
(7, 7, '2007-01-17 00:00:00', 'donde estan todos?'),
(8, 8, '2008-01-17 00:00:00', 'cual es el numero de vuelo?'),
(9, 9, '2009-01-17 00:00:00', 'que puerta sale el vuelo?'),
(10, 10, '2010-01-17 00:00:00', 'porque aerolinea regresamos?'),
(11, 11, '2011-01-17 00:00:00', 'hola'),
(12, 12, '2012-01-17 00:00:00', 'que plan hoy'),
(13, 13, '2013-01-17 00:00:00', 'vamos a las chelas'),
(14, 14, '2014-01-17 00:00:00', 'donde es el hotel'),
(15, 15, '2015-01-17 00:00:00', 'ahi va las fotos'),
(16, 16, '2016-01-17 00:00:00', 'que pex'),
(17, 17, '2017-01-17 00:00:00', 'no ma'),
(18, 18, '2018-01-17 00:00:00', 'roberto se perdio'),
(19, 19, '2019-01-17 00:00:00', 'vamos a comer'),
(20, 20, '2020-01-17 00:00:00', 'donde esta el baño');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `con`
--

CREATE TABLE IF NOT EXISTS `con` (
  `idRol` int(11) NOT NULL,
  `idFuncion` int(11) NOT NULL,
  `fechaFuncion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idRol`,`idFuncion`),
  KEY `rol-fun2` (`idFuncion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `con`
--

INSERT INTO `con` (`idRol`, `idFuncion`, `fechaFuncion`) VALUES
(1492, 1810, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Encuesta`
--

CREATE TABLE IF NOT EXISTS `Encuesta` (
  `idEncuesta` int(11) NOT NULL AUTO_INCREMENT,
  `califPromedio` decimal(10,0) NOT NULL,
  PRIMARY KEY (`idEncuesta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `Encuesta`
--

INSERT INTO `Encuesta` (`idEncuesta`, `califPromedio`) VALUES
(1, '10'),
(2, '4'),
(3, '8'),
(4, '10'),
(5, '9'),
(6, '10'),
(7, '7'),
(8, '6'),
(9, '10'),
(10, '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Estado`
--

CREATE TABLE IF NOT EXISTS `Estado` (
  `idEstado` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEstado` varchar(250) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `Estado`
--

INSERT INTO `Estado` (`idEstado`, `nombreEstado`) VALUES
(1, 'Queretaro'),
(2, 'Michoacan'),
(3, 'Jalisco'),
(4, 'Estado de Mexico'),
(5, 'Oaxaca'),
(6, 'Puebla Chiapas'),
(7, 'Baja California'),
(8, 'Yucatan'),
(9, 'Nuevo Leon'),
(10, 'Sonora');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Evento`
--

CREATE TABLE IF NOT EXISTS `Evento` (
  `idEvento` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEvento` varchar(250) NOT NULL,
  `descripcionEvento` varchar(250) NOT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `statusEvento` varchar(50) NOT NULL,
  `idEncuesta` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idCoordinador` int(11) NOT NULL,
  `Ver` tinyint(1) NOT NULL,
  `codigo` varchar(15) NOT NULL,
  PRIMARY KEY (`idEvento`),
  KEY `idEncuesta` (`idEncuesta`),
  KEY `idCliente` (`idCliente`),
  KEY `idCoordinador` (`idCoordinador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `Evento`
--

INSERT INTO `Evento` (`idEvento`, `nombreEvento`, `descripcionEvento`, `fechaCreacion`, `statusEvento`, `idEncuesta`, `idCliente`, `idCoordinador`, `Ver`, `codigo`) VALUES
(1, 'Alamo seguros', 'Lima 2017', '0000-00-00 00:00:00', 'terminado', 1, 1, 1, 1, 'A00121'),
(2, 'Gryc', 'Brasil 2018', '0000-00-00 00:00:00', 'activo', 2, 2, 2, 1, 'B00232'),
(3, 'Metlife', 'Argentina 2016', '0000-00-00 00:00:00', 'terminado', 3, 3, 3, 1, 'C00343'),
(4, 'Seguros Monterrey', 'San Francisco 2015', '0000-00-00 00:00:00', 'terminado', 4, 4, 4, 0, 'D00454'),
(5, 'Alamo seguros', 'Oaxaca 2018', '0000-00-00 00:00:00', 'preparando', 5, 5, 5, 0, 'E00565'),
(6, 'Gryc', 'Puebla 2017', '0000-00-00 00:00:00', 'terminado', 6, 6, 6, 0, 'F00676'),
(7, 'Metlife', 'Guanajuato 2011', '0000-00-00 00:00:00', 'terminado', 7, 7, 7, 0, 'G00787'),
(8, 'Seguros Monterrey', 'Ixtapa 2009', '0000-00-00 00:00:00', 'terminado', 8, 8, 8, 0, 'H00898'),
(9, 'Alamo seguros', 'Cancun 2011', '0000-00-00 00:00:00', 'terminado', 9, 9, 9, 0, 'I00909'),
(10, 'Gryc', 'Roma 2018', '0000-00-00 00:00:00', 'preparando', 10, 10, 10, 0, 'J00212'),
(11, 'Seguros Monterrey', 'Grecia 2010', '0000-00-00 00:00:00', 'activo', 1, 1, 1, 0, 'K00323'),
(12, 'Alamo seguros', 'Marruecos 2015', '0000-00-00 00:00:00', 'terminado', 2, 2, 2, 0, 'L00434'),
(13, 'Gryc', 'Mexico 2013', '0000-00-00 00:00:00', 'terminado', 3, 3, 3, 0, 'Y00275'),
(14, 'Metlife', 'Turkia 2018', '0000-00-00 00:00:00', 'terminado', 4, 4, 4, 0, 'X00219'),
(15, 'Seguros Monterrey', 'China 2010', '0000-00-00 00:00:00', 'terminado', 5, 5, 5, 0, 'O00564'),
(16, 'Alamo seguros', 'Argentina 2018', '0000-00-00 00:00:00', 'preparando', 6, 6, 6, 0, 'N00875'),
(17, 'Gryc', 'Argentina 2019', '0000-00-00 00:00:00', 'preparando', 7, 7, 7, 0, 'M00356'),
(18, 'Seguros Monterrey', 'Brasil 2019', '0000-00-00 00:00:00', 'terminado', 8, 8, 8, 0, 'Z00274'),
(19, 'Alamo seguros', 'Lima 2020', '0000-00-00 00:00:00', 'terminado', 9, 9, 9, 0, 'V00193'),
(20, 'Gryc', 'Las Vegas 2018', '0000-00-00 00:00:00', 'terminado', 10, 10, 10, 0, 'P00364');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventoDiseno`
--

CREATE TABLE IF NOT EXISTS `eventoDiseno` (
  `idDiseno` int(11) NOT NULL,
  `idEvento` int(11) NOT NULL,
  PRIMARY KEY (`idDiseno`,`idEvento`),
  KEY `ev-dis2` (`idEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventoDiseno`
--

INSERT INTO `eventoDiseno` (`idDiseno`, `idEvento`) VALUES
(1, 1),
(10, 1),
(21, 1),
(2, 2),
(5, 2),
(15, 2),
(20, 2),
(11, 3),
(16, 3),
(12, 4),
(17, 4),
(3, 5),
(6, 5),
(14, 6),
(7, 7),
(4, 8),
(8, 9),
(13, 9),
(18, 9),
(9, 10),
(19, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Funcion`
--

CREATE TABLE IF NOT EXISTS `Funcion` (
  `idFuncion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`idFuncion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1835 ;

--
-- Volcado de datos para la tabla `Funcion`
--

INSERT INTO `Funcion` (`idFuncion`, `descripcion`) VALUES
(1810, 'Registrar Evento'),
(1811, 'Modificar Evento'),
(1812, 'Consultar Evento'),
(1813, 'Registrar Actividad'),
(1814, 'Modificar Actividad'),
(1815, 'Consultar Actividad'),
(1816, 'Registrar Usuario'),
(1817, 'Modificar Usuario'),
(1818, 'Eliminar Usuario'),
(1819, 'Participar en Foro'),
(1820, 'Consultar Foro'),
(1821, 'Borrar Evento'),
(1822, 'Borrar Actividad'),
(1823, 'Borrar Usuario'),
(1824, 'Iniciar Sesion'),
(1825, 'Cerrar Sesion'),
(1826, 'Subir Fotos del evento'),
(1827, 'Responder Encuesta de satisfacci?n'),
(1828, 'Consultar promedio de encuesta'),
(1829, 'Actualizar status de actividad'),
(1830, 'Asignar staff a evento'),
(1831, 'Consultar invitados de evento'),
(1832, 'Borrar Invitados de evento'),
(1833, 'Participar en evento'),
(1834, 'Registrar usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Idioma`
--

CREATE TABLE IF NOT EXISTS `Idioma` (
  `idIdioma` int(11) NOT NULL AUTO_INCREMENT,
  `nombreIdioma` varchar(250) NOT NULL,
  PRIMARY KEY (`idIdioma`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `Idioma`
--

INSERT INTO `Idioma` (`idIdioma`, `nombreIdioma`) VALUES
(1, 'Español'),
(2, 'Ingles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ImagenFondo`
--

CREATE TABLE IF NOT EXISTS `ImagenFondo` (
  `idFondo` int(11) NOT NULL AUTO_INCREMENT,
  `ubicacion` varchar(50) NOT NULL,
  `direccionImagen` varchar(250) NOT NULL,
  PRIMARY KEY (`idFondo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `ImagenFondo`
--

INSERT INTO `ImagenFondo` (`idFondo`, `ubicacion`, `direccionImagen`) VALUES
(1, 'Arriba', 'Documentos/Imagenes'),
(2, 'Centro', 'Documentos/Imagenes'),
(3, 'Abajo', 'Documentos/Imagenes'),
(4, 'Derecha', 'Escritorio'),
(5, 'Izquierda', 'Documentos/Imagenes'),
(6, 'Arriba', 'Documentos/Imagenes'),
(7, 'Centro', 'Escritorio'),
(8, 'Abajo', 'Documentos/Imagenes'),
(9, 'Derecha', 'Documentos/Imagenes'),
(10, 'Izquierda', 'Documentos/Imagenes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Invitado`
--

CREATE TABLE IF NOT EXISTS `Invitado` (
  `idInvitado` int(11) NOT NULL AUTO_INCREMENT,
  `fechaNacimiento` date NOT NULL,
  `talla` varchar(5) DEFAULT NULL,
  `idEstado` int(11) NOT NULL,
  PRIMARY KEY (`idInvitado`),
  KEY `idEstado` (`idEstado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `Invitado`
--

INSERT INTO `Invitado` (`idInvitado`, `fechaNacimiento`, `talla`, `idEstado`) VALUES
(1, '0000-00-00', 'M', 10),
(2, '0000-00-00', 'L', 8),
(3, '0000-00-00', 'S', 6),
(4, '0000-00-00', 'S', 2),
(5, '0000-00-00', 'M', 4),
(6, '0000-00-00', 'XL', 3),
(7, '0000-00-00', 'L', 9),
(8, '0000-00-00', 'S', 7),
(9, '0000-00-00', 'M', 8),
(10, '0000-00-00', 'L', 10),
(11, '0000-00-00', 'XL', 2),
(12, '0000-00-00', 'L', 8),
(13, '0000-00-00', 'M', 5),
(14, '0000-00-00', 'S', 6),
(15, '0000-00-00', 'S', 8),
(16, '0000-00-00', 'M', 9),
(17, '0000-00-00', 'XL', 4),
(18, '0000-00-00', 'S', 2),
(19, '0000-00-00', 'M', 8),
(20, '0000-00-00', 'M', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitadoEvento`
--

CREATE TABLE IF NOT EXISTS `invitadoEvento` (
  `idEvento` int(11) NOT NULL,
  `idInvitado` int(11) NOT NULL,
  `fechaUsuarioEvento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idEvento`,`idInvitado`),
  KEY `inv-ev2` (`idInvitado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `invitadoEvento`
--

INSERT INTO `invitadoEvento` (`idEvento`, `idInvitado`, `fechaUsuarioEvento`) VALUES
(1, 1, '0000-00-00 00:00:00'),
(1, 2, '0000-00-00 00:00:00'),
(1, 3, '0000-00-00 00:00:00'),
(1, 4, '0000-00-00 00:00:00'),
(1, 5, '0000-00-00 00:00:00'),
(1, 6, '0000-00-00 00:00:00'),
(1, 7, '0000-00-00 00:00:00'),
(1, 8, '0000-00-00 00:00:00'),
(1, 9, '0000-00-00 00:00:00'),
(1, 10, '0000-00-00 00:00:00'),
(2, 11, '0000-00-00 00:00:00'),
(2, 12, '0000-00-00 00:00:00'),
(2, 13, '0000-00-00 00:00:00'),
(2, 14, '0000-00-00 00:00:00'),
(2, 15, '0000-00-00 00:00:00'),
(2, 16, '0000-00-00 00:00:00'),
(2, 17, '0000-00-00 00:00:00'),
(2, 18, '0000-00-00 00:00:00'),
(2, 19, '0000-00-00 00:00:00'),
(2, 20, '0000-00-00 00:00:00'),
(3, 1, '0000-00-00 00:00:00'),
(3, 2, '0000-00-00 00:00:00'),
(3, 3, '0000-00-00 00:00:00'),
(3, 4, '0000-00-00 00:00:00'),
(3, 5, '0000-00-00 00:00:00'),
(3, 10, '0000-00-00 00:00:00'),
(3, 11, '0000-00-00 00:00:00'),
(3, 12, '0000-00-00 00:00:00'),
(3, 13, '0000-00-00 00:00:00'),
(3, 14, '0000-00-00 00:00:00'),
(4, 1, '0000-00-00 00:00:00'),
(4, 6, '0000-00-00 00:00:00'),
(4, 7, '0000-00-00 00:00:00'),
(4, 8, '0000-00-00 00:00:00'),
(4, 9, '0000-00-00 00:00:00'),
(4, 10, '0000-00-00 00:00:00'),
(4, 15, '0000-00-00 00:00:00'),
(4, 16, '0000-00-00 00:00:00'),
(4, 17, '0000-00-00 00:00:00'),
(4, 18, '0000-00-00 00:00:00'),
(5, 2, '0000-00-00 00:00:00'),
(5, 3, '0000-00-00 00:00:00'),
(5, 4, '0000-00-00 00:00:00'),
(5, 5, '0000-00-00 00:00:00'),
(5, 6, '0000-00-00 00:00:00'),
(5, 7, '0000-00-00 00:00:00'),
(5, 8, '0000-00-00 00:00:00'),
(5, 9, '0000-00-00 00:00:00'),
(5, 10, '0000-00-00 00:00:00'),
(5, 11, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitadoIdioma`
--

CREATE TABLE IF NOT EXISTS `invitadoIdioma` (
  `idUsuario` int(11) NOT NULL,
  `idIdioma` int(11) NOT NULL,
  PRIMARY KEY (`idUsuario`,`idIdioma`),
  KEY `inv-idioma2` (`idIdioma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `invitadoIdioma`
--

INSERT INTO `invitadoIdioma` (`idUsuario`, `idIdioma`) VALUES
(1, 1),
(2, 1),
(4, 1),
(9, 1),
(10, 1),
(12, 1),
(14, 1),
(16, 1),
(18, 1),
(19, 1),
(20, 1),
(3, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(11, 2),
(13, 2),
(15, 2),
(17, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Lugar`
--

CREATE TABLE IF NOT EXISTS `Lugar` (
  `idLugar` int(11) NOT NULL AUTO_INCREMENT,
  `nombreLugar` varchar(250) NOT NULL,
  `calle` varchar(250) NOT NULL,
  `numero` int(11) NOT NULL,
  `colonia` varchar(250) NOT NULL,
  `CP` int(11) NOT NULL,
  `ciudad` varchar(250) NOT NULL,
  `estado` varchar(250) NOT NULL,
  `idPais` int(11) NOT NULL,
  PRIMARY KEY (`idLugar`),
  KEY `idPais` (`idPais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `Lugar`
--

INSERT INTO `Lugar` (`idLugar`, `nombreLugar`, `calle`, `numero`, `colonia`, `CP`, `ciudad`, `estado`, `idPais`) VALUES
(1, 'Torre Eiffel', 'monsier', 5, 'champs eli', 12345, 'paris', 'paris', 1),
(2, 'Hotel mansion paris', 'le matole', 6, 'champs eli', 67890, 'paris', 'paris', 2),
(3, 'Coliseo romano', 'veniche', 80, 'rumeni', 22122, 'roma', 'rm', 3),
(4, 'Empire state', 'street', 978, 'new york', 12121, 'nueva york', 'ny', 4),
(5, 'World trade center', 'bld street', 465, 'new york', 65657, 'nueva york', 'ny', 5),
(6, 'acuario inbursa', 'vista bonita', 544, 'polanco', 65671, 'df', 'df', 6),
(7, 'machu pichu', 'vista hermosa', 33, 'limun', 67657, 'cusco', 'lima', 7),
(8, 'valle sagrado', 'vinel bor', 22, 'cuslen', 65478, 'cusco', 'lima', 8),
(9, 'cristo redentor', 'jans trol', 7, 'relentri', 54858, 'rio de janeiro', 'rio', 9),
(10, 'los arcos', '6 de mayo', 89, 'centror', 54654, 'queretaro', 'queretaro', 10),
(11, 'la perdida', '5 de mayo', 1, 'centro', 58581, 'queretaro', 'queretaro', 11),
(12, 'gracias a dios', '5 de mayo', 22, 'centro', 56856, 'queretaro', 'queretaro', 12),
(13, 'pepe el toro', 'san andres', 567, 'centro', 35451, 'queretaro', 'queretaro', 13),
(14, 'dictatur', '10 de mayo', 446, 'centro', 31454, 'queretaro', 'queretaro', 14),
(15, 'castillo chapultepec', 'reforma', 77, 'del valle', 43253, 'df', 'df', 15),
(16, 'museo soumaya', 'polanco', 167, 'polanco', 35415, 'df', 'df', 16),
(17, 'louvre', 'san manu', 489, 'champs eli', 51253, 'paris', 'paris', 17),
(18, 'museo vicent van muff', 'van mif', 90, 'van musen', 23525, 'amsterdam', 'amsterdam', 18),
(19, 'central park', 'avenue', 233, 'new york', 35359, 'nueva york', 'ny', 19),
(20, 'museo moma', 'avenue street', 123, 'new york', 23550, 'nueva york', 'ny', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pais`
--

CREATE TABLE IF NOT EXISTS `Pais` (
  `idPais` int(11) NOT NULL AUTO_INCREMENT,
  `nombrePais` varchar(250) NOT NULL,
  PRIMARY KEY (`idPais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=196 ;

--
-- Volcado de datos para la tabla `Pais`
--

INSERT INTO `Pais` (`idPais`, `nombrePais`) VALUES
(1, 'Afganist'),
(2, 'Albania'),
(3, 'Alemania'),
(4, 'Andorra'),
(5, 'Angola'),
(6, 'Antigua y Barbuda'),
(7, 'Arabia Saudita'),
(8, 'Argelia'),
(9, 'Argentina'),
(10, 'Armenia'),
(11, 'Australia'),
(12, 'Austria'),
(13, 'Azerbaiy'),
(14, 'Bahamas'),
(15, 'Banglad'),
(16, 'Barbados'),
(17, 'Bar?in'),
(18, 'B?lgica'),
(19, 'Belice'),
(20, 'Ben'),
(21, 'Bielorrusia'),
(22, 'Birmania'),
(23, 'Bolivia'),
(24, 'Bosnia y Herzegovina'),
(25, 'Botsuana'),
(26, 'Brasil'),
(27, 'Brun'),
(28, 'Bulgaria'),
(29, 'Burkina Faso'),
(30, 'Burundi'),
(31, 'But'),
(32, 'Cabo Verde'),
(33, 'Camboya'),
(34, 'Camer?n'),
(35, 'Canad'),
(36, 'Catar'),
(37, 'Chad'),
(38, 'Chile'),
(39, 'China'),
(40, 'Chipre'),
(41, 'Ciudad del Vaticano'),
(42, 'Colombia'),
(43, 'Comoras'),
(44, 'Corea del Norte'),
(45, 'Corea del Sur'),
(46, 'Costa de Marfil'),
(47, 'Costa Rica'),
(48, 'Croacia'),
(49, 'Cuba'),
(50, 'Dinamarca'),
(51, 'Dominica'),
(52, 'Ecuador'),
(53, 'Egipto'),
(54, 'El Salvador'),
(55, 'Emiratos ?rabes Unidos'),
(56, 'Eritrea'),
(57, 'Eslovaquia'),
(58, 'Eslovenia'),
(59, 'Espa?a'),
(60, 'Estados Unidos'),
(61, 'Estonia'),
(62, 'Etiop'),
(63, 'Filipinas'),
(64, 'Finlandia'),
(65, 'Fiyi'),
(66, 'Francia'),
(67, 'Gab?n'),
(68, 'Gambia'),
(69, 'Georgia'),
(70, 'Ghana'),
(71, 'Granada'),
(72, 'Grecia'),
(73, 'Guatemala'),
(74, 'Guyana'),
(75, 'Guinea'),
(76, 'Guinea ecuatorial'),
(77, 'Guinea-Bis'),
(78, 'Hait'),
(79, 'Honduras'),
(80, 'Hungr'),
(81, 'India'),
(82, 'Indonesia'),
(83, 'Irak'),
(84, 'Ir'),
(85, 'Irlanda'),
(86, 'Islandia'),
(87, 'Islas Marshall'),
(88, 'Islas Salom?n'),
(89, 'Israel'),
(90, 'Italia'),
(91, 'Jamaica'),
(92, 'Jap?n'),
(93, 'Jordania'),
(94, 'Kazajist'),
(95, 'Kenia'),
(96, 'Kirguist'),
(97, 'Kiribati'),
(98, 'Kuwait'),
(99, 'Laos'),
(100, 'Lesoto'),
(101, 'Letonia'),
(102, 'L?bano'),
(103, 'Liberia'),
(104, 'Libia'),
(105, 'Liechtenstein'),
(106, 'Lituania'),
(107, 'Luxemburgo'),
(108, 'Madagascar'),
(109, 'Malasia'),
(110, 'Malaui'),
(111, 'Maldivas'),
(112, 'Mal'),
(113, 'Malta'),
(114, 'Marruecos'),
(115, 'Mauricio'),
(116, 'Mauritania'),
(117, 'M?xico'),
(118, 'Micronesia'),
(119, 'Moldavia'),
(120, 'M?naco'),
(121, 'Mongolia'),
(122, 'Montenegro'),
(123, 'Mozambique'),
(124, 'Namibia'),
(125, 'Nauru'),
(126, 'Nepal'),
(127, 'Nicaragua'),
(128, 'N?ger'),
(129, 'Nigeria'),
(130, 'Noruega'),
(131, 'Nueva Zelanda'),
(132, 'Om'),
(133, 'Pa?ses Bajos'),
(134, 'Pakist'),
(135, 'Palaos'),
(136, 'Panam'),
(137, 'Pap?a Nueva Guinea'),
(138, 'Paraguay'),
(139, 'Per?'),
(140, 'Polonia'),
(141, 'Portugal'),
(142, 'Reino Unido'),
(143, 'Rep?blica Centroafricana'),
(144, 'Rep?blica Checa'),
(145, 'Rep?blica de Macedonia'),
(146, 'Rep?blica del Congo'),
(147, 'Rep?blica Democr?tica del Congo'),
(148, 'Rep?blica Dominicana'),
(149, 'Rep?blica Sudafricana'),
(150, 'Ruanda'),
(151, 'Ruman'),
(152, 'Rusia'),
(153, 'Samoa'),
(154, 'San Crist?bal y Nieves'),
(155, 'San Marino'),
(156, 'San Vicente y las Granadinas'),
(157, 'Santa Luc'),
(158, 'Santo Tom? y Pr?ncipe'),
(159, 'Senegal'),
(160, 'Serbia'),
(161, 'Seychelles'),
(162, 'Sierra Leona'),
(163, 'Singapur'),
(164, 'Siria'),
(165, 'Somalia'),
(166, 'Sri Lanka'),
(167, 'Suazilandia'),
(168, 'Sud'),
(169, 'Sud?n del Sur'),
(170, 'Suecia'),
(171, 'Suiza'),
(172, 'Surinam'),
(173, 'Tailandia'),
(174, 'Tanzania'),
(175, 'Tayikist'),
(176, 'Timor Oriental'),
(177, 'Togo'),
(178, 'Tonga'),
(179, 'Trinidad y Tobago'),
(180, 'T?nez'),
(181, 'Turkmenist'),
(182, 'Turqu'),
(183, 'Tuvalu'),
(184, 'Ucrania'),
(185, 'Uganda'),
(186, 'Uruguay'),
(187, 'Uzbekist'),
(188, 'Vanuatu'),
(189, 'Venezuela'),
(190, 'Vietnam'),
(191, 'Yemen'),
(192, 'Yibuti'),
(193, 'Zambia'),
(194, 'Zimbabue'),
(195, 'Wakanda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Plantilla`
--

CREATE TABLE IF NOT EXISTS `Plantilla` (
  `idDiseno` int(11) NOT NULL AUTO_INCREMENT,
  `nombrePlantilla` varchar(250) NOT NULL,
  `colorFondo` int(11) NOT NULL,
  `colorBotones` int(11) NOT NULL,
  PRIMARY KEY (`idDiseno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Volcado de datos para la tabla `Plantilla`
--

INSERT INTO `Plantilla` (`idDiseno`, `nombrePlantilla`, `colorFondo`, `colorBotones`) VALUES
(1, 'MachuPichu', 736036, 559657),
(2, ' Vegas', 559657, 559657),
(3, ' A?o Nuevo', 16711808, 559657),
(4, ' Londres', 16174828, 559657),
(5, ' Egipto', 736036, 559657),
(6, ' Dubai', 559657, 559657),
(7, ' Brasil', 16711808, 736036),
(8, ' Tomorrowland', 16174828, 736036),
(9, 'Campus Party', 736036, 736036),
(10, ' Museo', 559657, 736036),
(11, 'Toronto', 16711808, 736036),
(12, 'Salvatierra', 736036, 736036),
(13, 'Tangamandapio', 559657, 16174828),
(14, 'Cumplea?os', 16711808, 16174828),
(15, 'Banquete Metlife', 736036, 16174828),
(16, 'Banquete Alamos Seguro', 559657, 16711808),
(17, 'Banquete ITESM', 16711808, 16711808),
(18, 'San Francisco', 16174828, 16711808),
(19, 'Roma', 736036, 16711808),
(20, 'Guanajuato', 559657, 16711808),
(21, 'Oaxaca', 16711808, 16711808),
(32, '', 0, 0),
(33, '', 0, 0),
(34, '', 0, 0),
(35, '', 0, 0),
(36, '', 0, 0),
(37, '', 0, 0),
(38, '', 0, 0),
(39, '', 0, 0),
(40, '', 0, 0),
(41, '', 0, 0),
(42, '', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantillaImagen`
--

CREATE TABLE IF NOT EXISTS `plantillaImagen` (
  `idFondo` int(11) NOT NULL,
  `idDiseno` int(11) NOT NULL,
  PRIMARY KEY (`idFondo`,`idDiseno`),
  KEY `plant_img2` (`idDiseno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plantillaImagen`
--

INSERT INTO `plantillaImagen` (`idFondo`, `idDiseno`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Rol`
--

CREATE TABLE IF NOT EXISTS `Rol` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `nombreRol` varchar(250) NOT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1497 ;

--
-- Volcado de datos para la tabla `Rol`
--

INSERT INTO `Rol` (`idRol`, `nombreRol`) VALUES
(1492, 'Director General'),
(1493, 'Coordinador'),
(1494, 'Staff'),
(1495, 'Invitado'),
(1496, 'Usuario no registrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seHaceEn`
--

CREATE TABLE IF NOT EXISTS `seHaceEn` (
  `id` int(11) NOT NULL,
  `idLugar` int(11) NOT NULL,
  PRIMARY KEY (`id`,`idLugar`),
  KEY `act-lugar2` (`idLugar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seHaceEn`
--

INSERT INTO `seHaceEn` (`id`, `idLugar`) VALUES
(2, 1),
(3, 2),
(4, 3),
(5, 4),
(6, 5),
(7, 6),
(8, 7),
(9, 8),
(10, 9),
(11, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `staffEvento`
--

CREATE TABLE IF NOT EXISTS `staffEvento` (
  `idEvento` int(11) NOT NULL,
  `idStaff` int(11) NOT NULL,
  `fechaUsuarioEvento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idEvento`,`idStaff`),
  KEY `staff-ev2` (`idStaff`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `staffEvento`
--

INSERT INTO `staffEvento` (`idEvento`, `idStaff`, `fechaUsuarioEvento`) VALUES
(1, 2, '0000-00-00 00:00:00'),
(1, 3, '2018-03-21 16:33:04'),
(1, 4, '0000-00-00 00:00:00'),
(1, 5, '0000-00-00 00:00:00'),
(1, 6, '0000-00-00 00:00:00'),
(1, 7, '0000-00-00 00:00:00'),
(1, 8, '0000-00-00 00:00:00'),
(1, 9, '0000-00-00 00:00:00'),
(1, 10, '0000-00-00 00:00:00'),
(2, 1, '0000-00-00 00:00:00'),
(2, 2, '0000-00-00 00:00:00'),
(2, 4, '0000-00-00 00:00:00'),
(2, 5, '0000-00-00 00:00:00'),
(2, 6, '0000-00-00 00:00:00'),
(2, 7, '0000-00-00 00:00:00'),
(2, 10, '0000-00-00 00:00:00'),
(2, 11, '0000-00-00 00:00:00'),
(2, 12, '0000-00-00 00:00:00'),
(3, 3, '0000-00-00 00:00:00'),
(3, 4, '0000-00-00 00:00:00'),
(3, 5, '0000-00-00 00:00:00'),
(3, 6, '0000-00-00 00:00:00'),
(3, 8, '0000-00-00 00:00:00'),
(3, 9, '0000-00-00 00:00:00'),
(3, 10, '0000-00-00 00:00:00'),
(3, 12, '0000-00-00 00:00:00'),
(4, 1, '0000-00-00 00:00:00'),
(4, 2, '0000-00-00 00:00:00'),
(4, 3, '0000-00-00 00:00:00'),
(4, 7, '0000-00-00 00:00:00'),
(4, 8, '0000-00-00 00:00:00'),
(4, 9, '0000-00-00 00:00:00'),
(4, 10, '0000-00-00 00:00:00'),
(4, 11, '0000-00-00 00:00:00'),
(4, 14, '0000-00-00 00:00:00'),
(4, 15, '0000-00-00 00:00:00'),
(4, 20, '0000-00-00 00:00:00'),
(5, 1, '0000-00-00 00:00:00'),
(5, 2, '0000-00-00 00:00:00'),
(5, 3, '0000-00-00 00:00:00'),
(5, 4, '0000-00-00 00:00:00'),
(5, 5, '0000-00-00 00:00:00'),
(5, 6, '0000-00-00 00:00:00'),
(5, 10, '0000-00-00 00:00:00'),
(5, 14, '0000-00-00 00:00:00'),
(5, 15, '0000-00-00 00:00:00'),
(5, 16, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiene`
--

CREATE TABLE IF NOT EXISTS `tiene` (
  `idUsuario` int(11) NOT NULL,
  `idRol` int(11) NOT NULL,
  `fechaRol` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idUsuario`,`idRol`),
  KEY `user-rol2` (`idRol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tiene`
--

INSERT INTO `tiene` (`idUsuario`, `idRol`, `fechaRol`) VALUES
(1, 1492, '0000-00-00 00:00:00'),
(2, 1493, '0000-00-00 00:00:00'),
(3, 1494, '0000-00-00 00:00:00'),
(4, 1495, '2018-03-19 20:32:02'),
(5, 1494, '0000-00-00 00:00:00'),
(6, 1494, '0000-00-00 00:00:00'),
(7, 1494, '0000-00-00 00:00:00'),
(8, 1495, '0000-00-00 00:00:00'),
(9, 1495, '0000-00-00 00:00:00'),
(10, 1495, '0000-00-00 00:00:00'),
(11, 1495, '0000-00-00 00:00:00'),
(12, 1494, '0000-00-00 00:00:00'),
(13, 1495, '0000-00-00 00:00:00'),
(14, 1495, '0000-00-00 00:00:00'),
(15, 1495, '0000-00-00 00:00:00'),
(16, 1494, '0000-00-00 00:00:00'),
(17, 1495, '0000-00-00 00:00:00'),
(18, 1495, '0000-00-00 00:00:00'),
(19, 1495, '0000-00-00 00:00:00'),
(20, 1495, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(250) NOT NULL,
  `passwd` varchar(250) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`idUsuario`, `nombreUsuario`, `passwd`, `correo`, `telefono`) VALUES
(1, 'Director General', 'admin', 'admin@hotmail.com', '4661017079'),
(2, 'Coordinador', 'coordi', 'coordi@hotmail.com', '4661017080'),
(3, 'Staff', 'staff', 'staff@hotmail.com', '4661017081'),
(4, 'Invitado', 'invitado', 'invitado@hotmail.com', '4661017082'),
(5, 'Dante', 'waffle123', '3@hotmail.com', '4661017083'),
(6, 'Alex', 'johncena00', '21341@yahoo.mx', '4661017084'),
(7, 'Paulo', 'cenajohn1', 'correoqlo@prodigy.net', '4661017085'),
(8, 'Andr', '123tamarindo', 'bivfsaokds@hotmail.com', '4661017086'),
(9, 'Manuel', 'holaamigos1', 'sadsada@dgmail.com', '4661017087'),
(10, 'Ramona', 'huehuehue3', 'dantemaxflores@gmail.com', '4661017088'),
(11, 'Eugenio', 'xhderbez2', 'otrocorreoqlo@live.com', '4661017089'),
(12, 'Rodrigo', 'qwerty1', 'dasda@hotmail.com', '4661017090'),
(13, 'Kevin', '5ofnovembah', 'rafs@gmail.com', '4661017091'),
(14, 'Carlos', 'c0ntr4s3n4', '1231@yahoo.mx', '4661017092'),
(15, 'Ramon', '0v3rdr1v3', '1@gmail.com', '4661017093'),
(16, 'Abraham', 'k1llb1ll', 'dudemcwaffle@hotmail.com', '4661017094'),
(17, 'Paulina', 'lulz23121', 'correo@gmail.com', '4661017095'),
(18, 'Andrea', 'roca1231321', 'dudemcwaffle@jotmail.com', '4661017096'),
(19, 'Juana', 'hockey', 'correo@gmail.com', '4661017097'),
(20, 'Marisol', 'robertdowneyjr1232131', '1@gmail.com', '4661017098'),
(21, 'Juan Perez', 'juan', 'juanp@gmail.com', '4611233173');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioAlergia`
--

CREATE TABLE IF NOT EXISTS `usuarioAlergia` (
  `idUsuario` int(11) NOT NULL,
  `idAlergia` int(11) NOT NULL,
  PRIMARY KEY (`idUsuario`,`idAlergia`),
  KEY `user-aler2` (`idAlergia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarioAlergia`
--

INSERT INTO `usuarioAlergia` (`idUsuario`, `idAlergia`) VALUES
(1, 1),
(7, 1),
(14, 1),
(2, 2),
(3, 2),
(15, 2),
(9, 3),
(20, 3),
(4, 5),
(8, 5),
(12, 5),
(19, 5),
(16, 6),
(18, 6),
(5, 7),
(10, 8),
(6, 9),
(13, 9),
(11, 10),
(17, 10);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Actividad`
--
ALTER TABLE `events`
  ADD CONSTRAINT `Evento_Actividad` FOREIGN KEY (`idEvento`) REFERENCES `Evento` (`idEvento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat` FOREIGN KEY (`idUsuario`) REFERENCES `Usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`idEvento`) REFERENCES `Evento` (`idEvento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `con`
--
ALTER TABLE `con`
  ADD CONSTRAINT `rol-fun` FOREIGN KEY (`idRol`) REFERENCES `Rol` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rol-fun2` FOREIGN KEY (`idFuncion`) REFERENCES `Funcion` (`idFuncion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Evento`
--
ALTER TABLE `Evento`
  ADD CONSTRAINT `Cliente_Evento` FOREIGN KEY (`idCliente`) REFERENCES `Usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Coord_Evento` FOREIGN KEY (`idCoordinador`) REFERENCES `Usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Encuesta_Evento` FOREIGN KEY (`idEncuesta`) REFERENCES `Encuesta` (`idEncuesta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `eventoDiseno`
--
ALTER TABLE `eventoDiseno`
  ADD CONSTRAINT `ev-dis` FOREIGN KEY (`idDiseno`) REFERENCES `Plantilla` (`idDiseno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ev-dis2` FOREIGN KEY (`idEvento`) REFERENCES `Evento` (`idEvento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Invitado`
--
ALTER TABLE `Invitado`
  ADD CONSTRAINT `est-inv` FOREIGN KEY (`idEstado`) REFERENCES `Estado` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `invitadoEvento`
--
ALTER TABLE `invitadoEvento`
  ADD CONSTRAINT `inv-ev` FOREIGN KEY (`idEvento`) REFERENCES `Evento` (`idEvento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `inv-ev2` FOREIGN KEY (`idInvitado`) REFERENCES `Invitado` (`idInvitado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `invitadoIdioma`
--
ALTER TABLE `invitadoIdioma`
  ADD CONSTRAINT `inv-idioma` FOREIGN KEY (`idUsuario`) REFERENCES `Usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `inv-idioma2` FOREIGN KEY (`idIdioma`) REFERENCES `Idioma` (`idIdioma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Lugar`
--
ALTER TABLE `Lugar`
  ADD CONSTRAINT `Pais_Lugar` FOREIGN KEY (`idPais`) REFERENCES `Pais` (`idPais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `plantillaImagen`
--
ALTER TABLE `plantillaImagen`
  ADD CONSTRAINT `plant_img` FOREIGN KEY (`idFondo`) REFERENCES `ImagenFondo` (`idFondo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `plant_img2` FOREIGN KEY (`idDiseno`) REFERENCES `Plantilla` (`idDiseno`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `seHaceEn`
--
ALTER TABLE `seHaceEn`
  ADD CONSTRAINT `act-lugar` FOREIGN KEY (`id`) REFERENCES `events` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `act-lugar2` FOREIGN KEY (`idLugar`) REFERENCES `Lugar` (`idLugar`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `staffEvento`
--
ALTER TABLE `staffEvento`
  ADD CONSTRAINT `staff-ev` FOREIGN KEY (`idEvento`) REFERENCES `Evento` (`idEvento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `staff-ev2` FOREIGN KEY (`idStaff`) REFERENCES `Usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tiene`
--
ALTER TABLE `tiene`
  ADD CONSTRAINT `user-rol` FOREIGN KEY (`idUsuario`) REFERENCES `Usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user-rol2` FOREIGN KEY (`idRol`) REFERENCES `Rol` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarioAlergia`
--
ALTER TABLE `usuarioAlergia`
  ADD CONSTRAINT `user-aler` FOREIGN KEY (`idUsuario`) REFERENCES `Usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user-aler2` FOREIGN KEY (`idAlergia`) REFERENCES `Alergia` (`idAlergia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;