-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 20 mai 2024 à 10:40
-- Version du serveur : 5.7.24
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gameview`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` tinytext NOT NULL,
  `description` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  `rating` float NOT NULL,
  `date` date NOT NULL,
  `authorID_article` bigint(20) UNSIGNED NOT NULL,
  `gameID_article` bigint(20) UNSIGNED NOT NULL,
  `points` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `description`, `content`, `rating`, `date`, `authorID_article`, `gameID_article`, `points`) VALUES
(1, 'Plongée captivante dans les profondeurs de Night City', 'Venez découvrir ce monde, si dur mais si attirant', '[[\"intro\",\"Cyberpunk 2077, malgr\\u00e9 ses d\\u00e9boires notoires, r\\u00e9ussit \\u00e0 capturer l\\\\\'imagination des joueurs avec son immersion narrative saisissante et son esth\\u00e9tique visuelle \\u00e0 couper le souffle. Dans les rues labyrinthiques de Night City, une exp\\u00e9rience cyberpunk inoubliable attend ceux qui osent s\\\\\'aventurer.\"],[\"part-title\",\"Narration Immersive et Choix Moraux\"],[\"corpus\",\"L\\\\\'un des atouts majeurs de Cyberpunk 2077 r\\u00e9side dans sa narration immersive. Chaque coin de rue, chaque personnage, d\\u00e9borde d\\\\\'histoires fascinantes et de dilemmes moraux captivants. Les choix que vous faites ont un r\\u00e9el impact sur le monde qui vous entoure, ajoutant une profondeur \\u00e9motionnelle et une rejouabilit\\u00e9 remarquable.\"],[\"part-title\",\"Esth\\u00e9tique Visuelle et Sonore \\u00c9poustouflante\"],[\"corpus\",\"D\\u00e8s les premiers instants, Cyberpunk 2077 vous enveloppe dans un monde visuellement stup\\u00e9fiant. Night City, avec ses n\\u00e9ons \\u00e9tincelants, ses gratte-ciel imposants et ses ruelles sombres, est une toile de fond parfaite pour l\\\\\'histoire qui se d\\u00e9roule. Ajoutez \\u00e0 cela une bande-son \\u00e9lectrisante qui donne vie \\u00e0 l\\\\\'atmosph\\u00e8re oppressante de la ville, et vous obtenez une exp\\u00e9rience sensorielle inoubliable.\"],[\"part-title\",\"Personnalisation Approfondie et Libert\\u00e9 de Gameplay\"],[\"corpus\",\"La personnalisation de votre personnage dans Cyberpunk 2077 est un v\\u00e9ritable r\\u00e9gal pour les amateurs de jeux de r\\u00f4le. Des choix de comp\\u00e9tences aux modifications cybern\\u00e9tiques, en passant par les options de style vestimentaire, chaque d\\u00e9tail peut \\u00eatre ajust\\u00e9 pour correspondre \\u00e0 votre vision du personnage. De plus, la libert\\u00e9 offerte aux joueurs pour aborder les missions et les rencontres permet une exp\\u00e9rience de jeu v\\u00e9ritablement unique \\u00e0 chaque joueur.\"],[\"part-title\",\"Un Monde Vivant, Malgr\\u00e9 les Fl\\u00e9aux Techniques\"],[\"corpus\",\"Malgr\\u00e9 les probl\\u00e8mes techniques qui ont terni son lancement, Cyberpunk 2077 parvient \\u00e0 offrir un monde vivant et \\u00e9vocateur. Les bugs et les glitches peuvent parfois perturber l\\\\\'immersion, mais une fois qu\\\\\'on se laisse emporter par l\\\\\'histoire et l\\\\\'ambiance, ces d\\u00e9fauts deviennent presque secondaires. Night City respire, palpite, et vous emm\\u00e8ne dans une aventure dont vous ne sortirez pas indemne.\"],[\"part-title\",\"Conclusion\"],[\"corpus\",\"Dans l\\\\\'ensemble, Cyberpunk 2077 est une exp\\u00e9rience captivante pour ceux qui cherchent \\u00e0 plonger dans un univers cyberpunk riche et immersif. Malgr\\u00e9 ses d\\u00e9fauts techniques, le jeu parvient \\u00e0 s\\u00e9duire gr\\u00e2ce \\u00e0 sa narration captivante, son esth\\u00e9tique visuelle \\u00e0 couper le souffle et sa personnalisation approfondie. Si vous \\u00eates pr\\u00eat \\u00e0 pardonner ses imperfections, vous trouverez en Cyberpunk 2077 un voyage inoubliable \\u00e0 travers les rues dangereuses et fascinantes de Night City.\"]]', 75, '2024-05-11', 1, 1, '[[\"Immersion narrative profonde et choix moraux captivants.\",\"Esth\\u00e9tique visuelle saisissante, transportant dans un monde cyberpunk vibrant.\",\"Personnalisation du personnage approfondie et libert\\u00e9 cr\\u00e9ative.\"],[\"Pr\\u00e9sence de bugs perturbant parfois l\\\\\'exp\\u00e9rience immersive.\",\"Performances in\\u00e9gales sur diff\\u00e9rentes plateformes.\"]]'),
(2, 'Grandir par l\\\'épreuve', 'Le platformer récompensé pour son histoire', '{\"1\":[\"intro\",\"Le jeu-vid\\u00e9o est \\u00e0 son meilleur quand il s\\u2019exprime \\u00e0 travers ses propres moyens. Ce mode d\\u2019expression repose sur les interactions du joueur avec un monde fa\\u00e7onn\\u00e9 pour elles : un monde con\\u00e7u pour \\u00eatre vu et cadr\\u00e9, pour \\u00eatre parcouru, pour \\u00eatre r\\u00e9solu, pour \\u00eatre lieu d\\u2019affrontement. En ceci, le genre de la \\u00ab plateforme \\u00bb est un bon candidat \\u00e0 l\\u2019expressivit\\u00e9, le joueur y \\u00e9tant totalement absorb\\u00e9 par le d\\u00e9placement dans un monde construit comme un grand parcours d\\u2019obstacle s\\u00e9quenc\\u00e9 en \\u00ab tableaux \\u00bb. Et ce qui fait de Celeste un chef d\\u2019oeuvre, c\\u2019est qu\\u2019en plus d\\u2019exceller dans cet exercice avec une \\u00e9conomie de moyen qui force l\\u2019admiration, avec ces graphismes en pixel-art \\u00e0 l\\u2019ancienne et son gameplay minimaliste, il embrasse totalement sa dimension narrative et expressive, en racontant mieux qu\\u2019aucun autre jeu notre peur de l\\u2019\\u00e9chec, nos manques de confiance et notre capacit\\u00e9 \\u00e0 les surmonter, via l\\u2019exp\\u00e9rience m\\u00eame que l\\u2019on fait de son d\\u00e9cor.\"],\"2\":[\"part-title\",\"Un \\\\\\\"Rage Game\\\\\\\" cisel\\u00e9\"],\"3\":[\"corpus\",\"Chapeaut\\u00e9 par Matt Thorson, \\u00e0 qui l\\u2019on doit l\\u2019excellent Towerfall, C\\u00e9leste rappelle de prime abord les Super Meat Boy et autre VVVVVV, jeux de plateforme s\\u00e9v\\u00e8res mais justes, o\\u00f9 la grande difficult\\u00e9 des \\u00e9preuves devient surmontable gr\\u00e2ce \\u00e0 des contr\\u00f4les d\\u2019une r\\u00e9activit\\u00e9 \\u00e0 toute \\u00e9preuve et des niveaux minutieusement cisel\\u00e9s. Toutes les phases de Celeste reposent sur le double-saut, orientable dans huit directions (haut, bas, gauche, droite et les diagonales), et \\u00ab rechargeable \\u00bb en retouchant le sol : principe qui module des parcours \\u00e0 la fois a\\u00e9riens et sous constante menace de la chute.\\r\\n\\r\\nOn peut donc braver les airs dans Celeste, mais en veillant bien \\u00e0 ne perdre aucune seconde, \\u00e0 ne g\\u00e2cher aucun geste : chaque tableau est con\\u00e7u comme une suite de parcours tendus par des distances et hauteurs \\u00ab limites \\u00bb \\u00e0 franchir d\\u2019une traite, dans un encha\\u00eenement d\\u2019actions impeccables. A moins d\\u2019\\u00eatre un monstre d\\u2019agilit\\u00e9 et de sans-froid, il sera bien souvent n\\u00e9cessaire d\\u2019apprendre ces s\\u00e9quences par c\\u0153ur et \\u00e0 la dure, au prix d\\u2019un grand nombre de morts que le jeu comptabilise comme s\\u2019il s\\u2019agissait de points obtenus. L\\u2019id\\u00e9e n\\u2019est pas anodine : la chute n\\u2019est pas ici la sanction d\\u2019une erreur de parcours mais, de fa\\u00e7on plus positive, l\\u2019\\u00e9tape n\\u00e9cessaire d\\u2019un difficile apprentissage, celui du franchissement parfait vers lequel chaque tableau nous achemine lentement mais s\\u00fbrement.\"],\"4\":[\"part-title\",\"Un jeu difficile mais g\\u00e9n\\u00e9reux\"],\"5\":[\"corpus\",\"Le jeu offre ses morts comme autant de nouvelles chances, comme une fa\\u00e7on de dire au joueur : \\u00ab Vas y, ce n\\u2019est pas grave, recommence, tu vas y arriver ! \\u00bb ; c\\u2019est l\\u2019expression d\\u2019une g\\u00e9n\\u00e9rosit\\u00e9 et d\\u2019une grande confiance dans nos capacit\\u00e9s de surmontement\\u2026 d\\u2019o\\u00f9 vient d\\u2019ailleurs que l\\u2019on n\\u2019abandonne pas, que l\\u2019on remonte toujours en selle pour finir par go\\u00fbter \\u00e0 cette satisfaction \\u00e0 combustion lente que le jeu nous ressert g\\u00e9n\\u00e9reusement, tableau apr\\u00e8s tableau : d\\u2019une premi\\u00e8re impression de blocage total face \\u00e0 une \\u00e9preuve qui semble infranchissable, trop \\u00e9tir\\u00e9e dans l\\u2019espace, trop serr\\u00e9e dans les timings, on finit \\u00e0 force de tentatives r\\u00e9p\\u00e9t\\u00e9es par r\\u00e9ussir une premi\\u00e8re action, puis une seconde et une troisi\\u00e8me, avant de boucler la s\\u00e9quence compl\\u00e8te et d\\u2019atterrir sur la plateforme tant convoit\\u00e9e. Sentir ainsi sa pratique et sa concentration s\\u2019aff\\u00fbter au fil des essais procure une satisfaction parfois immense, constamment relanc\\u00e9e par le renouvellement des \\u00e9preuves.\\r\\n\\r\\n\\r\\nSi le gameplay en lui-m\\u00eame \\u00e9volue peu, les parcours accueillent en effet de nouveaux gimmicks qui chamboulent notre approche des niveaux : vents changeants qui allongent ou raccourcissent les trajectoires, blocs mu\\u00e9s en plateformes mouvantes lorsqu\\u2019on les percute, surfaces glissant lors du deuxi\\u00e8me saut et autres bumpers qui nous des propulsent tels des billes de flippers sont autant d\\u2019ajouts qu\\u2019il nous faut apprendre \\u00e0 dompter. En les int\\u00e9grant au compte goutte, les niveaux \\u00e9vitent toute r\\u00e9p\\u00e9tition et r\\u00e9forment leur grammaire par variations successives qui mettent en avant de nouveaux modes de franchissements. La gageure de Celeste, c\\u2019est qu\\u2019au final, aucun tableau ne semble g\\u00e2ch\\u00e9, inutile ou d\\u00e9j\\u00e0 jou\\u00e9 : tous sont comme les maillons d\\u2019une grande cha\\u00eene d\\u2019apprentissage, aussi importants que les autres, tous aussi singuliers. C\\u2019est la marque d\\u2019un level-design exemplaire et ma\\u00eetris\\u00e9 de bout en bout.\"],\"6\":[\"part-title\",\"Conclusion\"],\"7\":[\"corpus\",\"D\\u2019une mani\\u00e8re in\\u00e9dite pour le genre, le r\\u00e9cit des progr\\u00e8s de Madeline est racont\\u00e9 par le gameplay et les niveaux m\\u00eames, dont les \\u00e9preuves nous nous font ressentir ce qu\\u2019elle ressent. C\\u2019est dans cette co\\u00efncidence entre phases de jeu et \\u00e9motions exprim\\u00e9es par l\\u2019histoire, dans ce n\\u00e9goce permanent entre angoisses et courage (les n\\u00f4tres comme celles du personnage), dans cette mise \\u00e0 l\\u2019\\u00e9preuve de notre propre r\\u00e9silience que r\\u00e9side la grande r\\u00e9ussite du jeu comme mod\\u00e8le d\\u2019une expression proprement vid\\u00e9o-ludique : une expression par l\\u2019exp\\u00e9rience, par l\\u2019action, par les obstacles surmont\\u00e9s de haute lutte.\"]}', 88, '2020-04-05', 1, 4, '[[\"L\\\\\'exp\\u00e9rience Cyberpunk 2077 sublim\\u00e9e\",\"Les interventions de la Police\",\"La refonte du syst\\u00e8me d\'avantages et des implants\"],[\"L\'IA ennemie toujours perfectible\",\"Le manque de nouveau contenu\"]]'),
(3, 'Titre tje pskdfk', 'Tro kool se jeux', '[[\"intro\",\"quoicoubeh\"],[\"part-title\",\"zefoek\"],[\"corpus\",\"qsfkljqlkfjqlksd\"],[\"part-title\",\"qslkdjqkls\"],[\"corpus\",\"qskd\"]]', 88, '2020-04-05', 1, 3, '[[\"bien\",\"cool\"],[\"ok\",\"pas ouf\"]]'),
(4, 'Apagnan', 'La nouvelle masterclass de Rockstar', '[[\"intro\",\"Quoicoubeh\"],[\"part-title\",\"Test\"],[\"corpus\",\"TESTETSETSTETSTE\"]]', 88, '2024-05-13', 1, 5, '[[\"ok\"],[\"pas ouf\"]]'),
(5, 'The last of us', 'Zombies et tout avec un peu de sang et une histoire stylée je crois', '[[\"intro\",\"Notamment\"]]', 88, '2024-05-13', 1, 6, '[[\"Bon jeu\"],[\"Cher\"]]'),
(6, 'Le jeu le plus vendu de tous les temps', 'Une plongée dans ce jeu mythique qui casse tous les records depuis plus de 10 ans', '[[\"intro\",\"Minecraft, the sandbox game developed by Mojang Studios, has captivated millions of players worldwide since its full release in 2011. Known for its pixelated graphics and limitless creativity, Minecraft allows players to build, explore, and survive in a blocky, procedurally generated 3D world. Its simplistic yet deep gameplay mechanics have made it one of the best-selling video games of all time, fostering a diverse community of players and creators.\\r\\n\\r\\n\"],[\"part-title\",\"The Core Gameplay\"],[\"corpus\",\"At its heart, Minecraft is about breaking and placing blocks. Players navigate a vast, procedurally generated world composed of different types of blocks, such as dirt, stone, water, and lava. The game modes\\u2014Survival, Creative, Adventure, and Spectator\\u2014cater to various play styles.\\r\\n\\r\\nSurvival Mode\\r\\nIn Survival Mode, players must gather resources to build structures and craft tools. They must manage their health and hunger while defending against hostile mobs like zombies, skeletons, and creepers. The challenge of surviving in a dynamic world keeps players engaged as they explore biomes ranging from deserts to forests, mountains to oceans.\\r\\n\\r\\nCreative Mode\\r\\nCreative Mode offers a sandbox experience where players have unlimited resources to build whatever they can imagine without the threat of mobs or the need to gather materials. This mode is particularly popular among those who enjoy large-scale building projects, from recreating famous landmarks to constructing intricate redstone contraptions.\"],[\"part-title\",\"The Community and Mods\"],[\"corpus\",\"One of Minecraft\\u2019s most significant strengths is its community. Players share their creations on platforms like YouTube, Twitch, and Reddit, inspiring others and fostering a collaborative spirit. Additionally, the modding community has produced a vast array of modifications that enhance and alter gameplay, from adding new items and creatures to entirely new dimensions and mechanics.\\r\\n\\r\\nPopular Mods\\r\\nOptifine: Enhances graphics and performance, making the game run smoother.\\r\\nBiomes O\\\\\' Plenty: Introduces a variety of new biomes to explore.\\r\\nTinkers\\\\\' Construct: Adds complex tool crafting mechanics and customization.\\r\\nMods like these extend Minecraft\\u2019s replayability, allowing players to tailor their experiences to their preferences.\"],[\"part-title\",\"The Cultural Impact\"],[\"corpus\",\"Minecraft\\\\\'s cultural impact is undeniable. It has influenced various media, including books, merchandise, and even a dedicated convention known as MineCon. The game\\u2019s music, composed by C418, has also gained acclaim, adding to its atmospheric and immersive experience.\"],[\"part-title\",\"Conclusion\"],[\"corpus\",\"Minecraft\\u2019s blend of simplicity and depth, coupled with its strong community support and endless possibilities for customization, has solidified its place in gaming history. Whether you\\u2019re a player looking to survive in a challenging world, a builder with a grand vision, or an educator seeking innovative teaching methods, Minecraft offers something for everyone. Its enduring popularity is a testament to its ability to adapt and grow, inviting players to continue crafting their own adventures.\"]]', 97, '2024-05-17', 1, 2, '[[\"Personnalisation infinie\",\"Communaut\\u00e9 gigantesque\"],[\"Gatien clique trop vite\",\"Les cheats\"]]');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`name`) VALUES
('Board games'),
('CCG'),
('Fighter'),
('FPS'),
('Horror'),
('Minigames'),
('MMO'),
('MOBA'),
('Open world'),
('Platformer'),
('Puzzle'),
('Racing'),
('RPG'),
('RTS'),
('Sandbox'),
('Shoot\'em up'),
('Simulation'),
('Survival'),
('TPS'),
('Tycoon'),
('Visual novel');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` tinytext NOT NULL,
  `content` text NOT NULL,
  `rating` float NOT NULL,
  `creationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hoursPlayed` time NOT NULL,
  `authorID_comment` bigint(20) UNSIGNED NOT NULL,
  `articleID_comment` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

CREATE TABLE `game` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `releaseDate` date NOT NULL,
  `price` float NOT NULL,
  `synopsis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `game`
--

INSERT INTO `game` (`id`, `title`, `releaseDate`, `price`, `synopsis`) VALUES
(1, 'Cyberpunk 2077', '2020-12-10', 59.99, 'Le jeu suit l\'histoire de V, mercenaire en pleine ascension dans un monde de guerriers de rue cyber améliorés, netrunners experts en tech et life-hackers issus des entreprises privées.'),
(2, 'Minecraft', '2009-11-18', 19.99, 'Minecraft est un jeu de type bac à sable, c\'est à dire qu\'il intègre des “outils” pour façonner son propre univers de jeu.'),
(3, 'The Witcher III : Wild Hunt', '2015-05-18', 39.99, ' Dans un monde ravagé par la guerre, avec la Chasse Sauvage sur vos talons, vous accepterez le contrat le plus important de votre vie : retrouver l\'enfant de la prophétie, une clé et une arme capable de sauver le monde ou de le détruire.'),
(4, 'Celeste', '2018-01-05', 19.99, 'Le joueur incarne Madeline, une jeune femme qui tente de gravir le mont Celeste. Au cours de son ascension, il est révélé qu\'elle souffre d\'une sévère forme d\'anxiété et de dépression, impliquant qu\'elle doit affronter ses angoisses et son mal-être intérieur pour parvenir au sommet de la montagne.'),
(5, 'Red Dead Redemption II', '2018-10-26', 59.99, 'Red Dead Redemption II suit les exploits d\'Arthur Morgan, un hors-la-loi et membre du gang Van der Linde, qui doit faire face au déclin de l\'Ouest tout en tentant de survivre contre les forces gouvernementales, gangs rivaux et autres adversaires.'),
(6, 'The Last of Us Part II', '2020-06-19', 59.99, 'Les évènements de The Last of Us Part II prennent place dans un monde post-apocalyptique, où une pandémie de cordyceps a tué une grande partie de l\'humanité, le reste de la population subsistant tant bien que mal parmi les infectés. Le jeu se déroule en grande partie à Seattle, ainsi qu\'à Jackson et à Santa Barbara.');

-- --------------------------------------------------------

--
-- Structure de la table `gamecategories`
--

CREATE TABLE `gamecategories` (
  `gameID_category` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gamecategories`
--

INSERT INTO `gamecategories` (`gameID_category`, `category`) VALUES
(1, 'RPG'),
(2, 'Sandbox'),
(3, 'RPG'),
(4, 'Platformer'),
(5, 'Open world'),
(6, 'TPS'),
(1, 'Open world');

-- --------------------------------------------------------

--
-- Structure de la table `gameplatforms`
--

CREATE TABLE `gameplatforms` (
  `platform` varchar(25) NOT NULL,
  `gameID_platform` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gameplatforms`
--

INSERT INTO `gameplatforms` (`platform`, `gameID_platform`) VALUES
('PC', 1),
('PS5', 1);

-- --------------------------------------------------------

--
-- Structure de la table `platform`
--

CREATE TABLE `platform` (
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `platform`
--

INSERT INTO `platform` (`name`) VALUES
('Linux'),
('PC'),
('PS5'),
('Switch'),
('Windows'),
('Xbox');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(40) DEFAULT 'Utilisateur',
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `birthdate` date NOT NULL,
  `bio` text,
  `id` bigint(20) UNSIGNED NOT NULL,
  `commentCount` int(11) NOT NULL DEFAULT '0',
  `articleCount` int(11) NOT NULL DEFAULT '0',
  `lastConnection` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accountCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `role`, `name`, `surname`, `birthdate`, `bio`, `id`, `commentCount`, `articleCount`, `lastConnection`, `accountCreation`) VALUES
('JohnDoe_', 'azerty', 'john.doe@gmail.com', 'Éditeur', 'Doe', 'John', '1990-01-01', 'Bonjour, moi c\'est John Doe, j\'aime bien les jeux vidéo !', 1, 0, 5, '2024-05-13 19:44:44', '2024-05-18 15:00:07'),
('010', '$2y$10$PCsdXMvpsnWxCzW5h0cAxuD.c9KpDlDfUNggbIovK8oKH5yJu7S5u', 'nooway@gmail.com', 'Éditeur', 'Owane', 'Ima', '1997-07-29', 'The only 1', 4, 0, 0, '2024-05-20 12:32:36', '2024-05-18 15:00:07');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `gameID_article` (`gameID_article`),
  ADD KEY `authorID_article` (`authorID_article`) USING BTREE;

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`name`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `authorID_comment` (`authorID_comment`),
  ADD KEY `articleID_comment` (`articleID_comment`);

--
-- Index pour la table `game`
--
ALTER TABLE `game`
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `gamecategories`
--
ALTER TABLE `gamecategories`
  ADD KEY `category` (`category`),
  ADD KEY `gameID` (`gameID_category`) USING BTREE;

--
-- Index pour la table `gameplatforms`
--
ALTER TABLE `gameplatforms`
  ADD PRIMARY KEY (`platform`,`gameID_platform`),
  ADD KEY `gameID_platform` (`gameID_platform`);

--
-- Index pour la table `platform`
--
ALTER TABLE `platform`
  ADD PRIMARY KEY (`name`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `game`
--
ALTER TABLE `game`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `authorID_article` FOREIGN KEY (`authorID_article`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `gameID_article` FOREIGN KEY (`gameID_article`) REFERENCES `game` (`id`);

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `articleID_comment` FOREIGN KEY (`articleID_comment`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `authorID_comment` FOREIGN KEY (`authorID_comment`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `gamecategories`
--
ALTER TABLE `gamecategories`
  ADD CONSTRAINT `category` FOREIGN KEY (`category`) REFERENCES `category` (`name`),
  ADD CONSTRAINT `gameID_category` FOREIGN KEY (`gameID_category`) REFERENCES `game` (`id`);

--
-- Contraintes pour la table `gameplatforms`
--
ALTER TABLE `gameplatforms`
  ADD CONSTRAINT `gameID_platform` FOREIGN KEY (`gameID_platform`) REFERENCES `game` (`id`),
  ADD CONSTRAINT `platform` FOREIGN KEY (`platform`) REFERENCES `platform` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
