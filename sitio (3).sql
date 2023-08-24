-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-08-2023 a las 19:19:10
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
-- Base de datos: `sitio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capitulosvistos`
--

CREATE TABLE `capitulosvistos` (
  `idCapVis` int(11) NOT NULL,
  `idUsu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `idPeli` int(11) NOT NULL,
  `tituloPeli` varchar(100) NOT NULL,
  `tituloOriginalPeli` varchar(100) NOT NULL,
  `anioPeli` int(4) NOT NULL,
  `duracionPeli` int(10) NOT NULL,
  `clasificacionEdadPeli` int(2) NOT NULL,
  `paisPeli` varchar(100) NOT NULL,
  `generosPeli` varchar(250) NOT NULL,
  `presupuestoPeli` int(11) NOT NULL,
  `ingresosPeli` int(11) NOT NULL,
  `sinopsisPeli` text NOT NULL,
  `repartoPeli` text NOT NULL,
  `direccionPeli` text NOT NULL,
  `escrituraPeli` text NOT NULL,
  `camaraPeli` text NOT NULL,
  `sonidoPeli` text NOT NULL,
  `produccionPeli` text NOT NULL,
  `edicionPeli` text NOT NULL,
  `artePeli` text NOT NULL,
  `efectosVisualesPeli` text NOT NULL,
  `equipoPeli` text NOT NULL,
  `imagenPeli` varchar(255) NOT NULL,
  `notaPeli` decimal(5,0) NOT NULL,
  `estadoPeli` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`idPeli`, `tituloPeli`, `tituloOriginalPeli`, `anioPeli`, `duracionPeli`, `clasificacionEdadPeli`, `paisPeli`, `generosPeli`, `presupuestoPeli`, `ingresosPeli`, `sinopsisPeli`, `repartoPeli`, `direccionPeli`, `escrituraPeli`, `camaraPeli`, `sonidoPeli`, `produccionPeli`, `edicionPeli`, `artePeli`, `efectosVisualesPeli`, `equipoPeli`, `imagenPeli`, `notaPeli`, `estadoPeli`) VALUES
(3, 'Super Mario Bros: La película', 'The Super Mario Bros. Movie', 2023, 200, 0, 'Estados Unidos', 'Animación, Aventuras, Comedia, Fantástico, Infantil', 100000000, 865289031, 'Mientras trabajan en una avería subterránea, los fontaneros de Brooklyn, Mario y su hermano Luigi, viajan por una misteriosa tubería hasta un nuevo mundo mágico. Pero, cuando los hermanos se separan, Mario deberá emprender una épica misión para encontrar a Luigi. Con la ayuda del champiñón local Toad y unas cuantas nociones de combate de la guerrera líder del Reino Champiñón, la princesa Peach, Mario descubre todo el poder que alberga en su interior.', 'sdfgsdfgsdf', 'Michael Jelenic: DirectorAaron Horvath: DirectorPierre Leduc: Co-DirectorFabien Polack: Co-Director', 'Matthew Fogel: GuiónShigeru Miyamoto: Guión, PersonajesNintendo: GuiónMatt Fogel: Guión AdaptadoEd Skudder: Head of Story', 'sdfggsdff', 'Koji Kondo: Compositor de la Música Original, Music ConsultantBrian Tyler: Compositor de la Música OriginalRandy Thom: Sound DesignerJamey Scott: Sound DesignerDaniel Laurie: Supervising Sound EditorJuan Peralta: Mezclador de Re-Grabación de SonidoPete Horner: Mezclador de Re-Grabación de SonidoJasper Randall: ConductorAndree Hsiao-Chu Lin: Apprentice Sound Editor', 'Chris Meledandri: ProductorShigeru Miyamoto: ProductorIllumination Entertainment: Compañía de ProduccionNintendo: Compañía de ProduccionUniversal Pictures: Compañía de ProduccionChristelle Balcon: Co-ProductorRobert Taylor: Productor AsociadoKelly Lake: Productor AsociadoShuntaro Furukawa: Productor EjecutivoLaëtitia Grandjean: Production ManagerToyokazu Nonaka: Consultor de Producción', 'Eric Osmond: EditorHadrien Vial: First Assistant Editor', 'Matthieu Gosselin: Dirección ArtísticaJérémie Droulers: SculptorFrédérick Alves-Cunha: Sculptor', 'Antoine Kinget: AnimationJeff Gabor: AnimationAlexandre Melquiond: AnimationChristian Dan Bejarano: AnimationLuis Velasco: AnimationDavid Hill: AnimationChristophe Delisle: Animation DirectorLudovic Roz: Animation DirectorPierre Avon: Animation SupervisorBenoit Guillaumot: Animation SupervisorBasile Heiderscheid: Animation SupervisorLudovic Savonnière: Animation SupervisorMathieu Ménard: Animation SupervisorNicolas Ménard: Animation SupervisorBruno Scheerens: Animation SupervisorQuentin Piq: Animation Supervisor', 'Nick Meledandri: Creative ConsultantBenjamin Morsberger: Creative ConsultantNatalie Watson: Creative ConsultantLaurent de la Chapelle: In Memory Of', '1685992103_1685004325_126037.jpg', 8, 'Activo'),
(4, 'Guardianes de la galaxia Vol. 3', 'Guardians of the Galaxy Vol. 3', 2023, 150, 12, 'Estados Unidos', 'Acción, Aventuras, Ciencia ficción, Comedia, Drama', 250000000, 528801000, 'La querida banda de los Guardianes se instala en Knowhere. Pero sus vidas no tardan en verse alteradas por los ecos del turbulento pasado de Rocket. Peter Quill, aún conmocionado por la pérdida de Gamora, debe reunir a su equipo en una peligrosa misión para salvar la vida de Rocket, una misión que, si no se completa con éxito, podría muy posiblemente conducir al final de los Guardianes tal y como los conocemos', 'Chris Pratt(Peter Quill / Star-Lord), Zoe Saldaña(Gamora), Bradley Cooper(Rocket (voice)), Dave Bautista(Drax the Destroyer), Karen Gillan(Nebula), Pom Klementieff(Mantis), Vin Diesel(Groot (voice), Sean Gunn(Kraglin / Young Rocket), Chukwudi Iwuji(The High Evolutionary), Will Poulter(Adam Warlock), Maria Bakalova(Cosmo (voice)), Elizabeth Debicki(Ayesha), Sylvester Stallone(Stakar Ogord), Austin Freeman(On-Set Groot / Phlektik Guard), Stephen Blackehart(Steemie Blueliver), Terence Rosemore(Xlomo Smeth), Sarah Alami(Ssssaralami), Jasmine Sunshine Munoz(Hoobtoe), Giovannie Cruz(Orloni Peddler), Nico Santos(Recorder Theel)', 'James Gunn(Director), Lars P. Winther(First Assistant Director), James Edward Tilden(Second Second Assistant Director), Ryan J. Pezdirc(Second Second Assistant Director)', 'James Gunn(Guión), Stan Lee(Personajes), Jack Kirby(Personajes), Larry Lieber(Personajes), Don Heck(Personajes), John Buscema(Personajes), Keith Giffen(Personajes), Sal Buscema(Personajes), Steve Englehart(Personajes), Jim Starlin(Personajes), Bill Mantlo(Personajes), Roger Stern(Personajes), Steve Gan(Personajes), Amanda Sprunger(Other), Chris Reynolds(Other), Dan Abnett(Comic), Andy Lanning(Comic)', 'Henry Braham(Director de Fotografía), Kevin Gentry(Grip), David Iverson(Grip), Christopher TJ McGuire(\"B\" Camera Operator), Thomas Lappin(\"C\" Camera Operator)', 'John Murphy(Compositor de la Música Original), David Acord(Sound Designer, Supervising Sound Editor), Lee Orloff(Sound Mixer), Shaun Farley(Sound Effects Editor), Jeffrey A. Humphreys(Boom Operator), Dave Jordan(Music Supervisor), Doc Kane(ADR Mixer), Christopher Flick(Foley Supervisor)', 'Kevin Feige(Productor), Marvel Studios(Compañía de Produccion), Marvel Entertainment(Compañía de Produccion), Walt Disney Pictures(Compañía de Produccion), Lars P. Winther(Co-Productor), David J. Grant(Co-Productor), Louis D\'Esposito(Productor Ejecutivo), Victoria Alonso(Productor Ejecutivo), Nik Korda(Productor Ejecutivo), Simon Hatt(Productor Ejecutivo), Sara Smith(Productor Ejecutivo), Sarah Halley Finn(Casting)', 'Tatiana S. Riegel(Editor) Fred Raskin(Editor) Greg D\'Auria(Editor)', 'Beth Mickle(Diseño de Producción) Lorin Flemming(Dirección Artística) Zachary Fannin(Dirección Artística) Samantha Avila(Dirección Artística) Brittany Hites(Dirección Artística) Rosemary Brandenburg(Decorados) Marco Rubeo(Set Designer) Anne Porter(Set Designer) Tim Croshaw(Set Designer) Nick S. Cross(Set Designer) Shari Ratliff(Set Designer) Ed Symon(Set Designer) Daniela Medeiros(Set Designer) Vincent Bates(Set Designer) Patrick Dunn-Baker(Set Designer) Chris Sanford(Set Designer) Justin Trudeau(Set Designer) Kristen Jenkins(Set Designer) Kevin Vickery(Set Designer) Silvia Mahapatra(Set Designer) Joseph Ramiro(Set Designer) Kristen B. Adams(Assistant Art Director) Laura C. Cox(Assistant Art Director) Kat Rich(Assistant Art Director) Alan Hook(Supervising Art Director) David E. Scott(Supervising Art Director) Kyle S. Plowden(Set Dresser) Stan J. White(Set Dresser) Zak Howell(Set Dresser) Jana Treadwell(Set Dresser) Chris McGlamery(Set Dresser) Gabrielle McMullan(Set Dresser)', 'Andy Park(Visual Development), Stephane Ceretti(Supervisor de Efectos Visuales), Susan Pickett(Visual Effects Producer)', 'Nicolas Bosc(Dobles), Myke Schwartz(Dobles), Ben Aycrigg(Dobles), Caleb Spillyards(Dobles), Renae Moneymaker(Dobles), Danya Bateman(Dobles), Marie Fink(Dobles), Curtis Lyons(Dobles), Dan Mast(Dobles), Holly Dowell(Dobles), Kirk A. Jenkins(Dobles), Daniel Norris(Dobles), Felix Betancourt(Dobles), Kade Pittman(Dobles), Erika Keck(Dobles), Steven Shelby(Dobles), Wayne Dalglish(Stunt Coordinator), Heidi Moneymaker(Stunt Coordinator), Mike Mignola(Thanks), Bobcat Goldthwait(Thanks), Roy Thomas(Thanks), Dan Abnett(Thanks), Peter David(Thanks), Arnold Drake(Thanks), Chris Claremont(Thanks), Gene Colan(Thanks), Andy Lanning(Thanks), Jim Valentino(Thanks), Jerry Bingham(Thanks), Gil Kane(Thanks), Rick Remender(Thanks), Daniel Acuña(Thanks), Mark Gruenwald(Thanks), Wellinton Alves(Thanks), Mike Friedrich(Thanks), Steve Lightle(Thanks), Donny Cates(Thanks), Timothy Green II(Thanks), Marko Djurdjevic(Thanks), Salvador Larroca(Thanks), Paul Pelletier(Thanks), JC Lee(Thanks), Lee Gunn(Thanks), Paul Azaceta(Thanks), Cory Sm', '12345.JPG', 85, 'Activo'),
(11, 'Guardianes de la galaxia Vol. 3', 'VVCCV', 33, 33, 33, 'SDFSDF', 'DFSSD', 0, 0, 'SDSD', 'SDSD', 'SDSD', 'SDSD', 'SDDS', 'SDSD', 'SDSD', 'SDDSSD', 'SDSD', 'SDSD', 'SDDS', '1685992069_2.jpg', 333, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelisvistas`
--

CREATE TABLE `pelisvistas` (
  `idUsu` int(11) NOT NULL,
  `idPeli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pelisvistas`
--

INSERT INTO `pelisvistas` (`idUsu`, `idPeli`) VALUES
(18, 3),
(32, 4),
(32, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series`
--

CREATE TABLE `series` (
  `idSeri` int(11) NOT NULL,
  `tituloSeri` varchar(100) NOT NULL,
  `tituloOriginalSeri` varchar(100) NOT NULL,
  `anioSeri` int(4) NOT NULL,
  `duracionSeri` int(10) NOT NULL,
  `temporadasTotalesSeri` int(4) NOT NULL,
  `clasificacionEdadSeri` int(2) NOT NULL,
  `paisSeri` varchar(100) NOT NULL,
  `generosSeri` varchar(250) NOT NULL,
  `sinopsisSeri` text NOT NULL,
  `repartoSeri` text NOT NULL,
  `direccionSeri` text NOT NULL,
  `escrituraSeri` text NOT NULL,
  `camaraSeri` text NOT NULL,
  `sonidoSeri` text NOT NULL,
  `produccionSeri` text NOT NULL,
  `edicionSeri` text NOT NULL,
  `arteSeri` text NOT NULL,
  `efectosVisualesSeri` text NOT NULL,
  `equipoSeri` text NOT NULL,
  `imagenSeri` varchar(255) NOT NULL,
  `notaSeri` int(3) NOT NULL,
  `estadoSeri` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `series`
--

INSERT INTO `series` (`idSeri`, `tituloSeri`, `tituloOriginalSeri`, `anioSeri`, `duracionSeri`, `temporadasTotalesSeri`, `clasificacionEdadSeri`, `paisSeri`, `generosSeri`, `sinopsisSeri`, `repartoSeri`, `direccionSeri`, `escrituraSeri`, `camaraSeri`, `sonidoSeri`, `produccionSeri`, `edicionSeri`, `arteSeri`, `efectosVisualesSeri`, `equipoSeri`, `imagenSeri`, `notaSeri`, `estadoSeri`) VALUES
(32, 'The Blacklist', 'The Blacklist', 2010, 42, 10, 10, 'Estados Unidos', 'Drama, Intriga Temas Crimen, Espionaje', 'Serie de TV (2013-2023). 10 temporadas. El criminal más buscado del mundo, Thomas Raymond Reddington (James Spader), se entrega misteriosamente y se ofrece a delatar a todos los que alguna vez han colaborado con él. Su única condición: sólo colaborará con Elisabeth Keen (Megan Boone), una nueva agente del FBI, con quien parece tener alguna conexión que ella desconoce.', ' James Spader (Raymond ', ' Michael W. Watkins (Director), Andrew McCarthy (Director), Steven A. Adelson (Director)', ' Michael W. Watkins (Director), Andrew McCarthy (Director), Steven A. Adelson (Director)', ' Michael W. Watkins (Director), Andrew McCarthy (Director), Steven A. Adelson (Director)', ' Michael W. Watkins (Director), Andrew McCarthy (Director), Steven A. Adelson (Director)', ' Michael W. Watkins (Director), Andrew McCarthy (Director), Steven A. Adelson (Director)', ' Michael W. Watkins (Director), Andrew McCarthy (Director), Steven A. Adelson (Director)', ' Michael W. Watkins (Director), Andrew McCarthy (Director), Steven A. Adelson (Director)', ' Michael W. Watkins (Director), Andrew McCarthy (Director), Steven A. Adelson (Director)', ' Michael W. Watkins (Director), Andrew McCarthy (Director), Steven A. Adelson (Director)', '1685991122_6.jpg', 85, 'Activo'),
(33, 'Superman y Lois', 'Superman & Lois', 2021, 42, 3, 12, 'Estados Unidos', 'Acción, Aventuras, Ciencia ficción', 'Serie de TV (2021- ). 3 temporadas. Sigue a la periodista y al superhéroe más famoso del mundo y los cómics, y cómo lidian él y Lois todo el estrés, las presiones y las complejidades que conlleva ser lo que son y además ser padres trabajadores en la sociedad actual.', ' Tyler Hoechlin (Clark Kent / Superman / Kal-El), Elizabeth Tulloch (Lois Lane), Bitsie Tulloch ', ' Michael W. Watkins (Director), Andrew McCarthy (Director), Steven A. Adelson (Director)', ' Michael W. Watkins (Director), Andrew McCarthy (Director), Steven A. Adelson (Director)', ' Michael W. Watkins (Director), Andrew McCarthy (Director), Steven A. Adelson (Director)', ' Michael W. Watkins (Director), Andrew McCarthy (Director), Steven A. Adelson (Director)', ' Michael W. Watkins (Director), Andrew McCarthy (Director), Steven A. Adelson (Director)', ' Michael W. Watkins (Director), Andrew McCarthy (Director), Steven A. Adelson (Director)', ' Michael W. Watkins (Director), Andrew McCarthy (Director), Steven A. Adelson (Director)', ' Michael W. Watkins (Director), Andrew McCarthy (Director), Steven A. Adelson (Director)', ' Michael W. Watkins (Director), Andrew McCarthy (Director), Steven A. Adelson (Director)', '1685917905_1685917329_4.jpg', 79, 'Activo'),
(34, 'La maravillosa Sra. Maisel', 'The Marvelous Mrs. Maisel', 2017, 57, 5, 16, 'Estados Unidos', 'Comedia', 'TV Series (2017-Actualidad). 4 temporadas. 34 episodios. Manhattan, año 1958. Miriam Midge Maisel (Rachel Brosnahan) es una mujer de la alta sociedad judía neoyorquina cuya vida como esposa y madre da un giro inesperado cuando, tras ser abandonada por su marido, descubre un talento desconocido para la comedia. Midge cambiará entonces su cómoda existencia en el Upper West Side para hacer monólogos.', ' Rachel Brosnahan (Miriam Midge Maisel), Alex Borstein (Susie Myerson), Michael Zegen (Joel Maisel)', ' Michael W. Watkins (Director), Andrew McCarthy (Director), Steven A. Adelson (Director)', ' Michael W. Watkins (Director), Andrew McCarthy (Director), Steven A. Adelson (Director)', ' Michael W. Watkins (Director), Andrew McCarthy (Director), Steven A. Adelson (Director)', ' Michael W. Watkins (Director), Andrew McCarthy (Director), Steven A. Adelson (Director)', ' Michael W. Watkins (Director), Andrew McCarthy (Director), Steven A. Adelson (Director)', ' Michael W. Watkins (Director), Andrew McCarthy (Director), Steven A. Adelson (Director)', ' Michael W. Watkins (Director), Andrew McCarthy (Director), Steven A. Adelson (Director)', ' Michael W. Watkins (Director), Andrew McCarthy (Director), Steven A. Adelson (Director)', ' Michael W. Watkins (Director), Andrew McCarthy (Director), Steven A. Adelson (Director)', '1685918112_5.jpg', 87, 'Activo'),
(40, 'La maravillosa Sra. Maisel', 'The Marvelous Mrs. Maisel', 2013, 22, 3, 16, 'Estados Unidos', 'Comedia', 'ttt', 'tt', 'tt', 'tt', 'tt', 'tt', 'tt', 'tt', 'tt', 'tt', 'tt', '1685995027_Sin título8.png', 6, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporadas`
--

CREATE TABLE `temporadas` (
  `idSeri` int(11) NOT NULL,
  `idCapitulo` int(11) NOT NULL,
  `descripcionTemporada` varchar(10) NOT NULL,
  `numeroCapitulo` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `temporadas`
--

INSERT INTO `temporadas` (`idSeri`, `idCapitulo`, `descripcionTemporada`, `numeroCapitulo`) VALUES
(32, 102, '0', 1),
(32, 103, '0', 2),
(32, 104, '0', 3),
(32, 105, '0', 4),
(32, 106, '0', 5),
(32, 107, '0', 6),
(32, 108, '0', 7),
(32, 109, '0', 8),
(32, 110, '0', 9),
(32, 111, '0', 10),
(32, 112, '0', 11),
(32, 113, '0', 12),
(32, 114, '0', 13),
(32, 115, '0', 14),
(32, 116, '0', 15),
(32, 117, '0', 16),
(32, 118, '0', 17),
(32, 119, '0', 18),
(32, 120, '0', 19),
(32, 121, '0', 20),
(32, 122, '0', 21),
(32, 123, '0', 22),
(32, 124, '1', 1),
(32, 125, '1', 2),
(32, 126, '1', 3),
(32, 127, '1', 4),
(32, 128, '1', 5),
(32, 129, '1', 6),
(32, 130, '1', 7),
(32, 131, '1', 8),
(32, 132, '1', 9),
(32, 133, '1', 10),
(32, 134, '1', 11),
(32, 135, '1', 12),
(32, 136, '1', 13),
(32, 137, '1', 14),
(32, 138, '1', 15),
(32, 139, '1', 16),
(32, 140, '1', 17),
(32, 141, '1', 18),
(32, 142, '1', 19),
(32, 143, '1', 20),
(32, 144, '1', 21),
(32, 145, '1', 22),
(32, 146, '2', 1),
(32, 147, '2', 2),
(32, 148, '2', 3),
(32, 149, '2', 4),
(32, 150, '2', 5),
(32, 151, '2', 6),
(32, 152, '2', 7),
(32, 153, '2', 8),
(32, 154, '2', 9),
(32, 155, '2', 10),
(32, 156, '2', 11),
(32, 157, '2', 12),
(32, 158, '2', 13),
(32, 159, '2', 14),
(32, 160, '2', 15),
(32, 161, '2', 16),
(32, 162, '2', 17),
(32, 163, '2', 18),
(32, 164, '2', 19),
(32, 165, '2', 20),
(32, 166, '2', 21),
(32, 167, '2', 22),
(32, 168, '2', 23),
(32, 169, '3', 1),
(32, 170, '3', 2),
(32, 171, '3', 3),
(32, 172, '3', 4),
(32, 173, '3', 5),
(32, 174, '3', 6),
(32, 175, '3', 7),
(32, 176, '3', 8),
(32, 177, '3', 9),
(32, 178, '3', 10),
(32, 179, '3', 11),
(32, 180, '3', 12),
(32, 181, '3', 13),
(32, 182, '3', 14),
(32, 183, '3', 15),
(32, 184, '3', 16),
(32, 185, '3', 17),
(32, 186, '3', 18),
(32, 187, '3', 19),
(32, 188, '3', 20),
(32, 189, '3', 21),
(32, 190, '3', 22),
(32, 191, '4', 1),
(32, 192, '4', 2),
(32, 193, '4', 3),
(32, 194, '4', 4),
(32, 195, '4', 5),
(32, 196, '4', 6),
(32, 197, '4', 7),
(32, 198, '4', 8),
(32, 199, '4', 9),
(32, 200, '4', 10),
(32, 201, '4', 11),
(32, 202, '4', 12),
(32, 203, '4', 13),
(32, 204, '4', 14),
(32, 205, '4', 15),
(32, 206, '4', 16),
(32, 207, '4', 17),
(32, 208, '4', 18),
(32, 209, '4', 19),
(32, 210, '4', 20),
(32, 211, '4', 21),
(32, 212, '4', 22),
(32, 213, '5', 1),
(32, 214, '5', 2),
(32, 215, '5', 3),
(32, 216, '5', 4),
(32, 217, '5', 5),
(32, 218, '5', 6),
(32, 219, '5', 7),
(32, 220, '5', 8),
(32, 221, '5', 9),
(32, 222, '5', 10),
(32, 223, '5', 11),
(32, 224, '5', 12),
(32, 225, '5', 13),
(32, 226, '5', 14),
(32, 227, '5', 15),
(32, 228, '5', 16),
(32, 229, '5', 17),
(32, 230, '5', 18),
(32, 231, '5', 19),
(32, 232, '5', 20),
(32, 233, '5', 21),
(32, 234, '5', 22),
(32, 235, '6', 1),
(32, 236, '6', 2),
(32, 237, '6', 3),
(32, 238, '6', 4),
(32, 239, '6', 5),
(32, 240, '6', 6),
(32, 241, '6', 7),
(32, 242, '6', 8),
(32, 243, '6', 9),
(32, 244, '6', 10),
(32, 245, '6', 11),
(32, 246, '6', 12),
(32, 247, '6', 13),
(32, 248, '6', 14),
(32, 249, '6', 15),
(32, 250, '6', 16),
(32, 251, '6', 17),
(32, 252, '6', 18),
(32, 253, '6', 19),
(32, 254, '7', 1),
(32, 255, '7', 2),
(32, 256, '7', 3),
(32, 257, '7', 4),
(32, 258, '7', 5),
(32, 259, '7', 6),
(32, 260, '7', 7),
(32, 261, '7', 8),
(32, 262, '7', 9),
(32, 263, '7', 10),
(32, 264, '7', 11),
(32, 265, '7', 12),
(32, 266, '7', 13),
(32, 267, '7', 14),
(32, 268, '7', 15),
(32, 269, '7', 16),
(32, 270, '7', 17),
(32, 271, '7', 18),
(32, 272, '7', 19),
(32, 273, '7', 20),
(32, 274, '7', 21),
(32, 275, '7', 22),
(32, 276, '8', 1),
(32, 277, '8', 2),
(32, 278, '8', 3),
(32, 279, '8', 4),
(32, 280, '8', 5),
(32, 281, '8', 6),
(32, 282, '8', 7),
(32, 283, '8', 8),
(32, 284, '8', 9),
(32, 285, '8', 10),
(32, 286, '8', 11),
(32, 287, '8', 12),
(32, 288, '8', 13),
(32, 289, '8', 14),
(32, 290, '8', 15),
(32, 291, '8', 16),
(32, 292, '8', 17),
(32, 293, '8', 18),
(32, 294, '8', 19),
(32, 295, '8', 20),
(32, 296, '8', 21),
(32, 297, '8', 22),
(32, 298, '9', 1),
(32, 299, '9', 2),
(32, 300, '9', 3),
(32, 301, '9', 4),
(32, 302, '9', 5),
(32, 303, '9', 6),
(32, 304, '9', 7),
(32, 305, '9', 8),
(32, 306, '9', 9),
(32, 307, '9', 10),
(32, 308, '9', 11),
(32, 309, '9', 12),
(32, 310, '9', 13),
(32, 311, '9', 14),
(32, 312, '9', 15),
(32, 313, '9', 16),
(32, 314, '9', 17),
(32, 315, '9', 18),
(32, 316, '9', 19),
(32, 317, '9', 20),
(32, 318, '9', 21),
(32, 319, '9', 22),
(32, 320, '0', 1),
(32, 321, '0', 2),
(32, 322, '0', 3),
(32, 323, '0', 4),
(32, 324, '0', 5),
(32, 325, '0', 6),
(32, 326, '0', 7),
(32, 327, '0', 8),
(32, 328, '0', 9),
(32, 329, '0', 10),
(32, 330, '0', 11),
(32, 331, '0', 12),
(32, 332, '0', 13),
(32, 333, '0', 14),
(32, 334, '0', 15),
(32, 335, '0', 16),
(32, 336, '0', 17),
(32, 337, '0', 18),
(32, 338, '0', 19),
(32, 339, '0', 20),
(32, 340, '0', 21),
(32, 341, '0', 22),
(32, 342, '1', 1),
(32, 343, '1', 2),
(32, 344, '1', 3),
(32, 345, '1', 4),
(32, 346, '1', 5),
(32, 347, '1', 6),
(32, 348, '1', 7),
(32, 349, '1', 8),
(32, 350, '1', 9),
(32, 351, '1', 10),
(32, 352, '1', 11),
(32, 353, '1', 12),
(32, 354, '1', 13),
(32, 355, '1', 14),
(32, 356, '1', 15),
(32, 357, '1', 16),
(32, 358, '1', 17),
(32, 359, '1', 18),
(32, 360, '1', 19),
(32, 361, '1', 20),
(32, 362, '1', 21),
(32, 363, '1', 22),
(32, 364, '2', 1),
(32, 365, '2', 2),
(32, 366, '2', 3),
(32, 367, '2', 4),
(32, 368, '2', 5),
(32, 369, '2', 6),
(32, 370, '2', 7),
(32, 371, '2', 8),
(32, 372, '2', 9),
(32, 373, '2', 10),
(32, 374, '2', 11),
(32, 375, '2', 12),
(32, 376, '2', 13),
(32, 377, '2', 14),
(32, 378, '2', 15),
(32, 379, '2', 16),
(32, 380, '2', 17),
(32, 381, '2', 18),
(32, 382, '2', 19),
(32, 383, '2', 20),
(32, 384, '2', 21),
(32, 385, '2', 22),
(32, 386, '2', 23),
(32, 387, '3', 1),
(32, 388, '3', 2),
(32, 389, '3', 3),
(32, 390, '3', 4),
(32, 391, '3', 5),
(32, 392, '3', 6),
(32, 393, '3', 7),
(32, 394, '3', 8),
(32, 395, '3', 9),
(32, 396, '3', 10),
(32, 397, '3', 11),
(32, 398, '3', 12),
(32, 399, '3', 13),
(32, 400, '3', 14),
(32, 401, '3', 15),
(32, 402, '3', 16),
(32, 403, '3', 17),
(32, 404, '3', 18),
(32, 405, '3', 19),
(32, 406, '3', 20),
(32, 407, '3', 21),
(32, 408, '3', 22),
(32, 409, '4', 1),
(32, 410, '4', 2),
(32, 411, '4', 3),
(32, 412, '4', 4),
(32, 413, '4', 5),
(32, 414, '4', 6),
(32, 415, '4', 7),
(32, 416, '4', 8),
(32, 417, '4', 9),
(32, 418, '4', 10),
(32, 419, '4', 11),
(32, 420, '4', 12),
(32, 421, '4', 13),
(32, 422, '4', 14),
(32, 423, '4', 15),
(32, 424, '4', 16),
(32, 425, '4', 17),
(32, 426, '4', 18),
(32, 427, '4', 19),
(32, 428, '4', 20),
(32, 429, '4', 21),
(32, 430, '4', 22),
(32, 431, '5', 1),
(32, 432, '5', 2),
(32, 433, '5', 3),
(32, 434, '5', 4),
(32, 435, '5', 5),
(32, 436, '5', 6),
(32, 437, '5', 7),
(32, 438, '5', 8),
(32, 439, '5', 9),
(32, 440, '5', 10),
(32, 441, '5', 11),
(32, 442, '5', 12),
(32, 443, '5', 13),
(32, 444, '5', 14),
(32, 445, '5', 15),
(32, 446, '5', 16),
(32, 447, '5', 17),
(32, 448, '5', 18),
(32, 449, '5', 19),
(32, 450, '5', 20),
(32, 451, '5', 21),
(32, 452, '5', 22),
(32, 453, '6', 1),
(32, 454, '6', 2),
(32, 455, '6', 3),
(32, 456, '6', 4),
(32, 457, '6', 5),
(32, 458, '6', 6),
(32, 459, '6', 7),
(32, 460, '6', 8),
(32, 461, '6', 9),
(32, 462, '6', 10),
(32, 463, '6', 11),
(32, 464, '6', 12),
(32, 465, '6', 13),
(32, 466, '6', 14),
(32, 467, '6', 15),
(32, 468, '6', 16),
(32, 469, '6', 17),
(32, 470, '6', 18),
(32, 471, '6', 19),
(32, 472, '7', 1),
(32, 473, '7', 2),
(32, 474, '7', 3),
(32, 475, '7', 4),
(32, 476, '7', 5),
(32, 477, '7', 6),
(32, 478, '7', 7),
(32, 479, '7', 8),
(32, 480, '7', 9),
(32, 481, '7', 10),
(32, 482, '7', 11),
(32, 483, '7', 12),
(32, 484, '7', 13),
(32, 485, '7', 14),
(32, 486, '7', 15),
(32, 487, '7', 16),
(32, 488, '7', 17),
(32, 489, '7', 18),
(32, 490, '7', 19),
(32, 491, '7', 20),
(32, 492, '7', 21),
(32, 493, '7', 22),
(32, 494, '8', 1),
(32, 495, '8', 2),
(32, 496, '8', 3),
(32, 497, '8', 4),
(32, 498, '8', 5),
(32, 499, '8', 6),
(32, 500, '8', 7),
(32, 501, '8', 8),
(32, 502, '8', 9),
(32, 503, '8', 10),
(32, 504, '8', 11),
(32, 505, '8', 12),
(32, 506, '8', 13),
(32, 507, '8', 14),
(32, 508, '8', 15),
(32, 509, '8', 16),
(32, 510, '8', 17),
(32, 511, '8', 18),
(32, 512, '8', 19),
(32, 513, '8', 20),
(32, 514, '8', 21),
(32, 515, '8', 22),
(32, 516, '9', 1),
(32, 517, '9', 2),
(32, 518, '9', 3),
(32, 519, '9', 4),
(32, 520, '9', 5),
(32, 521, '9', 6),
(32, 522, '9', 7),
(32, 523, '9', 8),
(32, 524, '9', 9),
(32, 525, '9', 10),
(32, 526, '9', 11),
(32, 527, '9', 12),
(32, 528, '9', 13),
(32, 529, '9', 14),
(32, 530, '9', 15),
(32, 531, '9', 16),
(32, 532, '9', 17),
(32, 533, '9', 18),
(32, 534, '9', 19),
(32, 535, '9', 20),
(32, 536, '9', 21),
(32, 537, '9', 22),
(33, 538, '0', 1),
(33, 539, '0', 2),
(33, 540, '0', 3),
(33, 541, '0', 4),
(33, 542, '0', 5),
(33, 543, '0', 6),
(33, 544, '0', 7),
(33, 545, '0', 8),
(33, 546, '0', 9),
(33, 547, '0', 10),
(33, 548, '0', 11),
(33, 549, '0', 12),
(33, 550, '0', 13),
(33, 551, '0', 14),
(33, 552, '0', 15),
(33, 553, '1', 1),
(33, 554, '1', 2),
(33, 555, '1', 3),
(33, 556, '1', 4),
(33, 557, '1', 5),
(33, 558, '1', 6),
(33, 559, '1', 7),
(33, 560, '1', 8),
(33, 561, '1', 9),
(33, 562, '1', 10),
(33, 563, '1', 11),
(33, 564, '1', 12),
(33, 565, '1', 13),
(33, 566, '1', 14),
(33, 567, '1', 15),
(33, 568, '2', 1),
(33, 569, '2', 2),
(33, 570, '2', 3),
(33, 571, '2', 4),
(33, 572, '2', 5),
(33, 573, '2', 6),
(33, 574, '2', 7),
(33, 575, '2', 8),
(33, 576, '2', 9),
(33, 577, '2', 10),
(33, 578, '2', 11),
(33, 579, '2', 12),
(33, 580, '2', 13),
(34, 581, '0', 1),
(34, 582, '0', 2),
(34, 583, '0', 3),
(34, 584, '0', 4),
(34, 585, '0', 5),
(34, 586, '0', 6),
(34, 587, '0', 7),
(34, 588, '0', 8),
(34, 589, '1', 1),
(34, 590, '1', 2),
(34, 591, '1', 3),
(34, 592, '1', 4),
(34, 593, '1', 5),
(34, 594, '1', 6),
(34, 595, '1', 7),
(34, 596, '1', 8),
(34, 597, '1', 9),
(34, 598, '1', 10),
(34, 599, '2', 1),
(34, 600, '2', 2),
(34, 601, '2', 3),
(34, 602, '2', 4),
(34, 603, '2', 5),
(34, 604, '2', 6),
(34, 605, '2', 7),
(34, 606, '2', 8),
(34, 607, '3', 1),
(34, 608, '3', 2),
(34, 609, '3', 3),
(34, 610, '3', 4),
(34, 611, '3', 5),
(34, 612, '3', 6),
(34, 613, '3', 7),
(34, 614, '3', 8),
(34, 615, '4', 1),
(34, 616, '4', 2),
(34, 617, '4', 3),
(34, 618, '4', 4),
(34, 619, '4', 5),
(34, 620, '4', 6),
(34, 621, '4', 7),
(34, 622, '4', 8),
(34, 623, '4', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsu` int(11) NOT NULL,
  `nombreUsu` varchar(50) NOT NULL,
  `usuarioUsu` varchar(33) NOT NULL,
  `contraseniaUsu` varchar(15) NOT NULL,
  `correoUsu` varchar(50) NOT NULL,
  `rolUsu` enum('Administrador','Miembro') CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estadoUsu` enum('Activo','Inactivo') CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsu`, `nombreUsu`, `usuarioUsu`, `contraseniaUsu`, `correoUsu`, `rolUsu`, `estadoUsu`) VALUES
(17, 'Admin', 'Admin', 'Admin', 'Admin@gmail.com', 'Administrador', 'Activo'),
(18, 'Miembro', 'Miembro', 'Miembro', 'Miembro@gmail.com', 'Administrador', 'Activo'),
(32, 'Victor', 'Victor', '123', 'manuloquendo@gmail.com', 'Miembro', 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `capitulosvistos`
--
ALTER TABLE `capitulosvistos`
  ADD PRIMARY KEY (`idCapVis`),
  ADD KEY `idUsuario` (`idUsu`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`idPeli`);

--
-- Indices de la tabla `pelisvistas`
--
ALTER TABLE `pelisvistas`
  ADD KEY `idUsu` (`idUsu`),
  ADD KEY `idPeli` (`idPeli`);

--
-- Indices de la tabla `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`idSeri`);

--
-- Indices de la tabla `temporadas`
--
ALTER TABLE `temporadas`
  ADD PRIMARY KEY (`idCapitulo`),
  ADD KEY `idSeri` (`idSeri`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `idPeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `series`
--
ALTER TABLE `series`
  MODIFY `idSeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `temporadas`
--
ALTER TABLE `temporadas`
  MODIFY `idCapitulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=648;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `capitulosvistos`
--
ALTER TABLE `capitulosvistos`
  ADD CONSTRAINT `capitulosvistos_ibfk_2` FOREIGN KEY (`idUsu`) REFERENCES `usuarios` (`idUsu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `capitulosvistos_ibfk_3` FOREIGN KEY (`idCapVis`) REFERENCES `temporadas` (`idCapitulo`);

--
-- Filtros para la tabla `pelisvistas`
--
ALTER TABLE `pelisvistas`
  ADD CONSTRAINT `pelisvistas_ibfk_1` FOREIGN KEY (`idPeli`) REFERENCES `peliculas` (`idPeli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pelisvistas_ibfk_2` FOREIGN KEY (`idUsu`) REFERENCES `usuarios` (`idUsu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `temporadas`
--
ALTER TABLE `temporadas`
  ADD CONSTRAINT `temporadas_ibfk_1` FOREIGN KEY (`idSeri`) REFERENCES `series` (`idSeri`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
