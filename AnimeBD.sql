-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-03-2020 a las 13:58:20
-- Versión del servidor: 5.7.28
-- Versión de PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `AnimeBD`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anime`
--

CREATE TABLE `anime` (
  `id_anime` int(11) NOT NULL,
  `nom_anime` text NOT NULL,
  `autor_anime` text NOT NULL,
  `data_anime` text NOT NULL,
  `tipus_anime` int(11) NOT NULL,
  `estat_anime` int(11) NOT NULL,
  `sinopsis_anime` text NOT NULL,
  `portada_anime` text NOT NULL,
  `puntuacio_anime` int(11) NOT NULL,
  `genere_anime` int(11) NOT NULL,
  `capitols_anime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `anime`
--

INSERT INTO `anime` (`id_anime`, `nom_anime`, `autor_anime`, `data_anime`, `tipus_anime`, `estat_anime`, `sinopsis_anime`, `portada_anime`, `puntuacio_anime`, `genere_anime`, `capitols_anime`) VALUES
(1, 'Black Clover', 'Yuki Tabata', '2017', 1, 1, 'Asta and Yuno were abandoned at the same church on the same day. Raised together as children, they came to know of the \"Wizard King\"—a title given to the strongest mage in the kingdom—and promised that they would compete against each other for the position of the next Wizard King. However, as they grew up, the stark difference between them became evident. While Yuno is able to wield magic with amazing power and control, Asta cannot use magic at all and desperately tries to awaken his powers by training physically.\r\n\r\nWhen they reach the age of 15, Yuno is bestowed a spectacular Grimoire with a four-leaf clover, while Asta receives nothing. However, soon after, Yuno is attacked by a person named Lebuty, whose main purpose is to obtain Yuno\'s Grimoire. Asta tries to fight Lebuty, but he is outmatched. Though without hope and on the brink of defeat, he finds the strength to continue when he hears Yuno\'s voice. Unleashing his inner emotions in a rage, Asta receives a five-leaf clover Grimoire, a \"Black Clover\" giving him enough power to defeat Lebuty. A few days later, the two friends head out into the world, both seeking the same goal—to become the Wizard King!', '', 7, 4, 127),
(2, 'One Piece', 'Eiichiro Oda', '1999', 1, 1, 'Gol D. Roger was known as the \"Pirate King,\" the strongest and most infamous being to have sailed the Grand Line. The capture and execution of Roger by the World Government brought a change throughout the world. His last words before his death revealed the existence of the greatest treasure in the world, One Piece. It was this revelation that brought about the Grand Age of Pirates, men who dreamed of finding One Piece—which promises an unlimited amount of riches and fame—and quite possibly the pinnacle of glory and the title of the Pirate King.\r\n\r\nEnter Monkey D. Luffy, a 17-year-old boy who defies your standard definition of a pirate. Rather than the popular persona of a wicked, hardened, toothless pirate ransacking villages for fun, Luffy’s reason for being a pirate is one of pure wonder: the thought of an exciting adventure that leads him to intriguing people and ultimately, the promised treasure. Following in the footsteps of his childhood hero, Luffy and his crew travel across the Grand Line, experiencing crazy adventures, unveiling dark mysteries and battling strong enemies, all in order to reach the most coveted of all fortunes—One Piece.\r\n\r\n[Written by MAL Rewrite]', '', 8, 4, 924),
(3, 'Kimetsu no Yaiba', 'Koyoharu Gotoge', '2019 ', 1, 2, 'Ever since the death of his father, the burden of supporting the family has fallen upon Tanjirou Kamado\'s shoulders. Though living impoverished on a remote mountain, the Kamado family are able to enjoy a relatively peaceful and happy life. One day, Tanjirou decides to go down to the local village to make a little money selling charcoal. On his way back, night falls, forcing Tanjirou to take shelter in the house of a strange man, who warns him of the existence of flesh-eating demons that lurk in the woods at night.\r\n\r\nWhen he finally arrives back home the next day, he is met with a horrifying sight—his whole family has been slaughtered. Worse still, the sole survivor is his sister Nezuko, who has been turned into a bloodthirsty demon. Consumed by rage and hatred, Tanjirou swears to avenge his family and stay by his only remaining sibling. Alongside the mysterious group calling themselves the Demon Slayer Corps, Tanjirou will do whatever it takes to slay the demons and protect the remnants of his beloved sister\'s humanity.\r\n\r\n[Written by MAL Rewrite]', '', 9, 4, 26),
(4, 'Steins;gate', '5pb', '2011', 1, 2, 'The self-proclaimed mad scientist Rintarou Okabe rents out a room in a rickety old building in Akihabara, where he indulges himself in his hobby of inventing prospective \"future gadgets\" with fellow lab members: Mayuri Shiina, his air-headed childhood friend, and Hashida Itaru, a perverted hacker nicknamed \"Daru.\" The three pass the time by tinkering with their most promising contraption yet, a machine dubbed the \"Phone Microwave,\" which performs the strange function of morphing bananas into piles of green gel.\r\n\r\nThough miraculous in itself, the phenomenon doesn\'t provide anything concrete in Okabe\'s search for a scientific breakthrough; that is, until the lab members are spurred into action by a string of mysterious happenings before stumbling upon an unexpected success—the Phone Microwave can send emails to the past, altering the flow of history.\r\n\r\nAdapted from the critically acclaimed visual novel by 5pb. and Nitroplus, Steins;Gate takes Okabe through the depths of scientific theory and practicality. Forced across the diverging threads of past and present, Okabe must shoulder the burdens that come with holding the key to the realm of time.\r\n\r\n[Written by MAL Rewrite]', '', 9, 5, 24),
(5, 'Hunter X Hunter', 'Yoshihiro Togashi', '2011', 1, 2, 'Hunter x Hunter is set in a world where Hunters exist to perform all manner of dangerous tasks like capturing criminals and bravely searching for lost treasures in uncharted territories. Twelve-year-old Gon Freecss is determined to become the best Hunter possible in hopes of finding his father, who was a Hunter himself and had long ago abandoned his young son. However, Gon soon realizes the path to achieving his goals is far more challenging than he could have ever imagined.\r\n\r\nAlong the way to becoming an official Hunter, Gon befriends the lively doctor-in-training Leorio, vengeful Kurapika, and rebellious ex-assassin Killua. To attain their own goals and desires, together the four of them take the Hunter Exam, notorious for its low success rate and high probability of death. Throughout their journey, Gon and his friends embark on an adventure that puts them through many hardships and struggles. They will meet a plethora of monsters, creatures, and characters—all while learning what being a Hunter truly means.\r\n\r\n[Written by MAL Rewrite]', '', 9, 4, 148);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estat`
--

CREATE TABLE `estat` (
  `id_estat` int(11) NOT NULL,
  `nom_estat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estat`
--

INSERT INTO `estat` (`id_estat`, `nom_estat`) VALUES
(1, 'En emissio'),
(2, 'Finalitzat');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genere`
--

CREATE TABLE `genere` (
  `id_genere` int(11) NOT NULL,
  `nom_genere` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genere`
--

INSERT INTO `genere` (`id_genere`, `nom_genere`) VALUES
(1, 'Accio'),
(2, 'Ciencia ficcio'),
(3, 'Esports'),
(4, 'Shounen'),
(5, 'Seinen'),
(6, 'Shoujou'),
(7, 'Terror'),
(8, 'Fantasia'),
(9, 'Comedia'),
(10, 'Aventures'),
(11, 'Psicologic'),
(12, 'Isekai'),
(13, 'Slice of life'),
(14, 'Escolars'),
(15, 'Misteri'),
(16, 'Supens'),
(17, 'Yaoi'),
(18, 'Yuri');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipus`
--

CREATE TABLE `tipus` (
  `id_tipus` int(11) NOT NULL,
  `nom_tipus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipus`
--

INSERT INTO `tipus` (`id_tipus`, `nom_tipus`) VALUES
(1, 'TV'),
(2, 'Pelicula'),
(3, 'Especial'),
(4, 'OVA');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`id_anime`),
  ADD KEY `estat` (`estat_anime`),
  ADD KEY `genere` (`genere_anime`),
  ADD KEY `tipus` (`tipus_anime`);

--
-- Indices de la tabla `estat`
--
ALTER TABLE `estat`
  ADD PRIMARY KEY (`id_estat`);

--
-- Indices de la tabla `genere`
--
ALTER TABLE `genere`
  ADD PRIMARY KEY (`id_genere`);

--
-- Indices de la tabla `tipus`
--
ALTER TABLE `tipus`
  ADD PRIMARY KEY (`id_tipus`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anime`
--
ALTER TABLE `anime`
  MODIFY `id_anime` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estat`
--
ALTER TABLE `estat`
  MODIFY `id_estat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `genere`
--
ALTER TABLE `genere`
  MODIFY `id_genere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tipus`
--
ALTER TABLE `tipus`
  MODIFY `id_tipus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anime`
--
ALTER TABLE `anime`
  ADD CONSTRAINT `estat` FOREIGN KEY (`estat_anime`) REFERENCES `estat` (`id_estat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `genere` FOREIGN KEY (`genere_anime`) REFERENCES `genere` (`id_genere`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tipus` FOREIGN KEY (`tipus_anime`) REFERENCES `tipus` (`id_tipus`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
