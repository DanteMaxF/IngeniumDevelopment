-- Versión de PHP :  5.5.12
-- Base de datos :  `calendar`

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- Estructura de la tabla `events`

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- Contenido de la tabla `events`

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`) VALUES
(1, 'Evento 1', '#40E0D0', '2018-01-01 00:00:00', '0000-00-00 00:00:00'),
(2, 'Evento 2', '#FF0000', '2018-01-07 00:00:00', '2018-01-10 00:00:00'),
(3, 'Evento 3', '#0071c5', '2018-01-09 00:00:00', '0000-00-00 00:00:00'),
(4, 'Evento 4', '#40E0D0', '2018-01-11 00:00:00', '2018-01-13 00:00:00'),
(5, 'Evento 5', '#000', '2018-01-12 00:00:00', '2018-01-12 00:00:00'),
(6, 'Evento 6', '#0071c5', '2018-01-12 00:00:00', '0000-00-00 00:00:00'),
(7, 'Evento 7', '#0071c5', '2018-01-12 00:00:00', '0000-00-00 00:00:00'),
(8, 'Evento 8', '#0071c5', '2018-01-12 00:00:00', '0000-00-00 00:00:00'),
(9, 'Evento 9', '#FFD700', '2018-01-14 00:00:00', '2018-01-14 00:00:00'),
(10, 'Evento 10', '#008000', '2018-01-28 00:00:00', '0000-00-00 00:00:00');
