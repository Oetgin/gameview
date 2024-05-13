-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 13 mai 2024 à 13:32
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
(1, 'Plongée captivante dans les profondeurs de Night City', '', '[[\"intro\",\"Cyberpunk 2077, malgr\\u00e9 ses d\\u00e9boires notoires, r\\u00e9ussit \\u00e0 capturer l\\\\\'imagination des joueurs avec son immersion narrative saisissante et son esth\\u00e9tique visuelle \\u00e0 couper le souffle. Dans les rues labyrinthiques de Night City, une exp\\u00e9rience cyberpunk inoubliable attend ceux qui osent s\\\\\'aventurer.\"],[\"part-title\",\"Narration Immersive et Choix Moraux\"],[\"corpus\",\"L\\\\\'un des atouts majeurs de Cyberpunk 2077 r\\u00e9side dans sa narration immersive. Chaque coin de rue, chaque personnage, d\\u00e9borde d\\\\\'histoires fascinantes et de dilemmes moraux captivants. Les choix que vous faites ont un r\\u00e9el impact sur le monde qui vous entoure, ajoutant une profondeur \\u00e9motionnelle et une rejouabilit\\u00e9 remarquable.\"],[\"part-title\",\"Esth\\u00e9tique Visuelle et Sonore \\u00c9poustouflante\"],[\"corpus\",\"D\\u00e8s les premiers instants, Cyberpunk 2077 vous enveloppe dans un monde visuellement stup\\u00e9fiant. Night City, avec ses n\\u00e9ons \\u00e9tincelants, ses gratte-ciel imposants et ses ruelles sombres, est une toile de fond parfaite pour l\\\\\'histoire qui se d\\u00e9roule. Ajoutez \\u00e0 cela une bande-son \\u00e9lectrisante qui donne vie \\u00e0 l\\\\\'atmosph\\u00e8re oppressante de la ville, et vous obtenez une exp\\u00e9rience sensorielle inoubliable.\"],[\"part-title\",\"Personnalisation Approfondie et Libert\\u00e9 de Gameplay\"],[\"corpus\",\"La personnalisation de votre personnage dans Cyberpunk 2077 est un v\\u00e9ritable r\\u00e9gal pour les amateurs de jeux de r\\u00f4le. Des choix de comp\\u00e9tences aux modifications cybern\\u00e9tiques, en passant par les options de style vestimentaire, chaque d\\u00e9tail peut \\u00eatre ajust\\u00e9 pour correspondre \\u00e0 votre vision du personnage. De plus, la libert\\u00e9 offerte aux joueurs pour aborder les missions et les rencontres permet une exp\\u00e9rience de jeu v\\u00e9ritablement unique \\u00e0 chaque joueur.\"],[\"part-title\",\"Un Monde Vivant, Malgr\\u00e9 les Fl\\u00e9aux Techniques\"],[\"corpus\",\"Malgr\\u00e9 les probl\\u00e8mes techniques qui ont terni son lancement, Cyberpunk 2077 parvient \\u00e0 offrir un monde vivant et \\u00e9vocateur. Les bugs et les glitches peuvent parfois perturber l\\\\\'immersion, mais une fois qu\\\\\'on se laisse emporter par l\\\\\'histoire et l\\\\\'ambiance, ces d\\u00e9fauts deviennent presque secondaires. Night City respire, palpite, et vous emm\\u00e8ne dans une aventure dont vous ne sortirez pas indemne.\"],[\"part-title\",\"Conclusion\"],[\"corpus\",\"Dans l\\\\\'ensemble, Cyberpunk 2077 est une exp\\u00e9rience captivante pour ceux qui cherchent \\u00e0 plonger dans un univers cyberpunk riche et immersif. Malgr\\u00e9 ses d\\u00e9fauts techniques, le jeu parvient \\u00e0 s\\u00e9duire gr\\u00e2ce \\u00e0 sa narration captivante, son esth\\u00e9tique visuelle \\u00e0 couper le souffle et sa personnalisation approfondie. Si vous \\u00eates pr\\u00eat \\u00e0 pardonner ses imperfections, vous trouverez en Cyberpunk 2077 un voyage inoubliable \\u00e0 travers les rues dangereuses et fascinantes de Night City.\"]]', 75, '2024-05-11', 1, 1, '[[\"Immersion narrative profonde et choix moraux captivants.\",\"Esth\\u00e9tique visuelle saisissante, transportant dans un monde cyberpunk vibrant.\",\"Personnalisation du personnage approfondie et libert\\u00e9 cr\\u00e9ative.\"],[\"Pr\\u00e9sence de bugs perturbant parfois l\\\\\'exp\\u00e9rience immersive.\",\"Performances in\\u00e9gales sur diff\\u00e9rentes plateformes.\"]]'),
(2, 'Grandir par l\\\'épreuve', '', '{\"1\":[\"intro\",\"Le jeu-vid\\u00e9o est \\u00e0 son meilleur quand il s\\u2019exprime \\u00e0 travers ses propres moyens. Ce mode d\\u2019expression repose sur les interactions du joueur avec un monde fa\\u00e7onn\\u00e9 pour elles : un monde con\\u00e7u pour \\u00eatre vu et cadr\\u00e9, pour \\u00eatre parcouru, pour \\u00eatre r\\u00e9solu, pour \\u00eatre lieu d\\u2019affrontement. En ceci, le genre de la \\u00ab plateforme \\u00bb est un bon candidat \\u00e0 l\\u2019expressivit\\u00e9, le joueur y \\u00e9tant totalement absorb\\u00e9 par le d\\u00e9placement dans un monde construit comme un grand parcours d\\u2019obstacle s\\u00e9quenc\\u00e9 en \\u00ab tableaux \\u00bb. Et ce qui fait de Celeste un chef d\\u2019oeuvre, c\\u2019est qu\\u2019en plus d\\u2019exceller dans cet exercice avec une \\u00e9conomie de moyen qui force l\\u2019admiration, avec ces graphismes en pixel-art \\u00e0 l\\u2019ancienne et son gameplay minimaliste, il embrasse totalement sa dimension narrative et expressive, en racontant mieux qu\\u2019aucun autre jeu notre peur de l\\u2019\\u00e9chec, nos manques de confiance et notre capacit\\u00e9 \\u00e0 les surmonter, via l\\u2019exp\\u00e9rience m\\u00eame que l\\u2019on fait de son d\\u00e9cor.\"],\"2\":[\"part-title\",\"Un \\\\\\\"Rage Game\\\\\\\" cisel\\u00e9\"],\"3\":[\"corpus\",\"Chapeaut\\u00e9 par Matt Thorson, \\u00e0 qui l\\u2019on doit l\\u2019excellent Towerfall, C\\u00e9leste rappelle de prime abord les Super Meat Boy et autre VVVVVV, jeux de plateforme s\\u00e9v\\u00e8res mais justes, o\\u00f9 la grande difficult\\u00e9 des \\u00e9preuves devient surmontable gr\\u00e2ce \\u00e0 des contr\\u00f4les d\\u2019une r\\u00e9activit\\u00e9 \\u00e0 toute \\u00e9preuve et des niveaux minutieusement cisel\\u00e9s. Toutes les phases de Celeste reposent sur le double-saut, orientable dans huit directions (haut, bas, gauche, droite et les diagonales), et \\u00ab rechargeable \\u00bb en retouchant le sol : principe qui module des parcours \\u00e0 la fois a\\u00e9riens et sous constante menace de la chute.\\r\\n\\r\\nOn peut donc braver les airs dans Celeste, mais en veillant bien \\u00e0 ne perdre aucune seconde, \\u00e0 ne g\\u00e2cher aucun geste : chaque tableau est con\\u00e7u comme une suite de parcours tendus par des distances et hauteurs \\u00ab limites \\u00bb \\u00e0 franchir d\\u2019une traite, dans un encha\\u00eenement d\\u2019actions impeccables. A moins d\\u2019\\u00eatre un monstre d\\u2019agilit\\u00e9 et de sans-froid, il sera bien souvent n\\u00e9cessaire d\\u2019apprendre ces s\\u00e9quences par c\\u0153ur et \\u00e0 la dure, au prix d\\u2019un grand nombre de morts que le jeu comptabilise comme s\\u2019il s\\u2019agissait de points obtenus. L\\u2019id\\u00e9e n\\u2019est pas anodine : la chute n\\u2019est pas ici la sanction d\\u2019une erreur de parcours mais, de fa\\u00e7on plus positive, l\\u2019\\u00e9tape n\\u00e9cessaire d\\u2019un difficile apprentissage, celui du franchissement parfait vers lequel chaque tableau nous achemine lentement mais s\\u00fbrement.\"],\"4\":[\"part-title\",\"Un jeu difficile mais g\\u00e9n\\u00e9reux\"],\"5\":[\"corpus\",\"Le jeu offre ses morts comme autant de nouvelles chances, comme une fa\\u00e7on de dire au joueur : \\u00ab Vas y, ce n\\u2019est pas grave, recommence, tu vas y arriver ! \\u00bb ; c\\u2019est l\\u2019expression d\\u2019une g\\u00e9n\\u00e9rosit\\u00e9 et d\\u2019une grande confiance dans nos capacit\\u00e9s de surmontement\\u2026 d\\u2019o\\u00f9 vient d\\u2019ailleurs que l\\u2019on n\\u2019abandonne pas, que l\\u2019on remonte toujours en selle pour finir par go\\u00fbter \\u00e0 cette satisfaction \\u00e0 combustion lente que le jeu nous ressert g\\u00e9n\\u00e9reusement, tableau apr\\u00e8s tableau : d\\u2019une premi\\u00e8re impression de blocage total face \\u00e0 une \\u00e9preuve qui semble infranchissable, trop \\u00e9tir\\u00e9e dans l\\u2019espace, trop serr\\u00e9e dans les timings, on finit \\u00e0 force de tentatives r\\u00e9p\\u00e9t\\u00e9es par r\\u00e9ussir une premi\\u00e8re action, puis une seconde et une troisi\\u00e8me, avant de boucler la s\\u00e9quence compl\\u00e8te et d\\u2019atterrir sur la plateforme tant convoit\\u00e9e. Sentir ainsi sa pratique et sa concentration s\\u2019aff\\u00fbter au fil des essais procure une satisfaction parfois immense, constamment relanc\\u00e9e par le renouvellement des \\u00e9preuves.\\r\\n\\r\\n\\r\\nSi le gameplay en lui-m\\u00eame \\u00e9volue peu, les parcours accueillent en effet de nouveaux gimmicks qui chamboulent notre approche des niveaux : vents changeants qui allongent ou raccourcissent les trajectoires, blocs mu\\u00e9s en plateformes mouvantes lorsqu\\u2019on les percute, surfaces glissant lors du deuxi\\u00e8me saut et autres bumpers qui nous des propulsent tels des billes de flippers sont autant d\\u2019ajouts qu\\u2019il nous faut apprendre \\u00e0 dompter. En les int\\u00e9grant au compte goutte, les niveaux \\u00e9vitent toute r\\u00e9p\\u00e9tition et r\\u00e9forment leur grammaire par variations successives qui mettent en avant de nouveaux modes de franchissements. La gageure de Celeste, c\\u2019est qu\\u2019au final, aucun tableau ne semble g\\u00e2ch\\u00e9, inutile ou d\\u00e9j\\u00e0 jou\\u00e9 : tous sont comme les maillons d\\u2019une grande cha\\u00eene d\\u2019apprentissage, aussi importants que les autres, tous aussi singuliers. C\\u2019est la marque d\\u2019un level-design exemplaire et ma\\u00eetris\\u00e9 de bout en bout.\"],\"6\":[\"part-title\",\"Conclusion\"],\"7\":[\"corpus\",\"D\\u2019une mani\\u00e8re in\\u00e9dite pour le genre, le r\\u00e9cit des progr\\u00e8s de Madeline est racont\\u00e9 par le gameplay et les niveaux m\\u00eames, dont les \\u00e9preuves nous nous font ressentir ce qu\\u2019elle ressent. C\\u2019est dans cette co\\u00efncidence entre phases de jeu et \\u00e9motions exprim\\u00e9es par l\\u2019histoire, dans ce n\\u00e9goce permanent entre angoisses et courage (les n\\u00f4tres comme celles du personnage), dans cette mise \\u00e0 l\\u2019\\u00e9preuve de notre propre r\\u00e9silience que r\\u00e9side la grande r\\u00e9ussite du jeu comme mod\\u00e8le d\\u2019une expression proprement vid\\u00e9o-ludique : une expression par l\\u2019exp\\u00e9rience, par l\\u2019action, par les obstacles surmont\\u00e9s de haute lutte.\"]}', 88, '2020-04-05', 1, 4, '[[\"L\\\\\'exp\\u00e9rience Cyberpunk 2077 sublim\\u00e9e\",\"Les interventions de la Police\",\"La refonte du syst\\u00e8me d\'avantages et des implants\"],[\"L\'IA ennemie toujours perfectible\",\"Le manque de nouveau contenu\"]]'),
(3, 'Titre tje pskdfk', '', '[[\"intro\",\"quoicoubeh\"],[\"part-title\",\"zefoek\"],[\"corpus\",\"qsfkljqlkfjqlksd\"],[\"part-title\",\"qslkdjqkls\"],[\"corpus\",\"qskd\"]]', 88, '2020-04-05', 1, 3, '[[\"bien\",\"cool\"],[\"ok\",\"pas ouf\"]]'),
(4, 'Apagnan', '', '[[\"intro\",\"Quoicoubeh\"],[\"part-title\",\"Test\"],[\"corpus\",\"TESTETSETSTETSTE\"]]', 88, '2024-05-13', 1, 5, '[[\"ok\"],[\"pas ouf\"]]'),
(5, 'The last of us', '', '[[\"intro\",\"Notamment\"]]', 88, '2024-05-13', 1, 6, '[[\"Bon jeu\"],[\"Cher\"]]');

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
  `creationDate` date NOT NULL,
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
  `photo` mediumblob,
  `role` varchar(40) DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `birthdate` date NOT NULL,
  `bio` text,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `photo`, `role`, `name`, `surname`, `birthdate`, `bio`, `id`) VALUES
('JohnDoe_', 'azerty', 'john.doe@gmail.com', 0x89504e470d0a1a0a0000000d49484452000000c8000000c608060000009752cfee000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000b1300000b1301009a9c180000458649444154785eed7d779c54c795754f4f9e212321944001044209051042016584846c210c128a28833248422233a927273203c3e4044896b55eefb7ebf5b7f65adef5aebfcdc1bb5e879525db4a84c979ce774f3577fce879c0d0d3d3d333f3fe38bff7faf57bf55e55dd53f7deaa5b55aef446c041ff23ab498ef5405a7d27d21aba0cb21a3acf18e9f21cc1e7539966cb89ef7110583804091232eb3b9021c70c116a82d7d29acf1c590d7214f079a643a258dfe320b07008122450b853a5b54f69ea4066531772e5b7477e9f29325a252d8187841172e41c278b83fe81439020219b2d7f1d9023ad7eeaef0e23f1979f21f5df7f7dc648f98fff45f69775c8ae6b83a751cc2c218addfb1c04060e412cc86c6e33c75cf115b205f41b321adb4518bbbce691b4dcdbd4bc91f31439df22e7093ffb4fbcfed1f7f172e50778b1f41056947fd0032f5497e08583655851b00b0b1e7914736e99871be6dc78c6b87ed67558fcc20b78392b1beb7ff237c8a9ab436edb710d25df927e4cbeaba51d490d2dc896eb9e639dc8e4f523720f4d326a1e419268a34cc923fd186a368768f670086241a6b4f0345f121a1b91d1dc014f6db3f73f11244f6d3bd29bc451febc1e5b7efc332c787b1d468d1a8338970bae3017c2e41825c748b70be172ee8b284198cb2df70ae41e03b976c67047c8d12def8a448c2b0cb172ed826997e39af90bf044ee566cfaf14f9176b8d5103c59fc1e1220b3be0b5b8f7520b1b10d699d427c21447ead90a4a10d59420c9a7be972ee5b1e0e1c829c80e476119eda4e235c5b44a0d24490d244a8327ff92b5c7acb1d1839e22cb88f9321423032360ed1e3c7e39ebbeec66bafbc8a94e444a4a426c3e3f1f4c0164f32529392919de841594111de2faf417969d919a3744f0176e5e42271c306dc77df7d088f8df6924dbe8b0422115d1142cac808cc9c311b4fa7e421e3b3df21edcb46644b7e7244abe4750089420a6a40e63b45f29be268105b3804b120b1b6c5db1d2b42b4f1673fc30b85fb71c1d42b111e11e5154011c42ba75d8d3b45309f5bf912aaaa2a50545e8c4365d538587e1015fb2b51555c859ab29ea896ff2a8a4a50515e8a8a2a39afac465959d919635f45298a6b2a515c598e92524149198af6eec3fe82bd484f4fc7a2c50f61dad419183d729cf79ba394306e4c987431beb56a2d5e2baa46f26f7f8bad479b905a279a524cc83cc7d9b78543100bb24483248b9995fe751d6ebcf7019ce58aec6e9d274d3c0f4b1f588c1d79d928ad29c5feaa5269d1ab505572d090a4a8425af7ea6a11dc52945416f74065558d1ce5998a62549796ca7322f015e5678ceaca8328299274cacb05a592ae9c97ed17e215a3a2ac5c508d5dbbb761fdc675b875de6d88898a17ad1229669e1be162de458a868994fc5c7feb2cbc7ae04fc5a7ea1433ac53fc964edb3219ee18360449153382473aae99a22552e49cb67a9ef81c1bc52edf25ff273434e3bdeffc05c68d3d17ae482146bc1b77de792776efde8d8a8a0ad11855c70533b4a1da86df4b14141420333313f3e7cfc7c48913111f1f6fccb1f0f070c48e9c806bee5a888d7ff923e41cab470acd4c31c1b64a43e169ed42526ba739b27b5ac76f8613860f41a472396e607a74c4165fd7d288e4c64ee4cbef9dcd5d58b8790bc65d728938bee1c62479f491c5a8d9be07070f1e44a9b4f8143c92c457184311fc5e12a4b2b2b21bbcce6b3cf2f7fefdfb71c73d77c315ee351da38530f4adee7af575acfacbbf425a179dfc2e641d93b23bda629c780e52da95ed50c6b02188b67e294d5d486d918a178d91210479bea204a3e3c688a04422323c02e75c7421766edf21e653054a2ac4642a2ec68103078c405985309441225849422dc2a312bd5a4c41e6e9809cefdbbd07591999b867c1424484c5787be304f397bf84fcfa0e6c96f2da200e3c3530bbb67dcb75a863d81084da2385f14ca23d76367420eb6803527efa8f387bec3844b0150d8fc134716293b2b3505173c010a4b8b8b4476bec2b8ca1086a3afd5e7e7b515191b9ce739283e724fcc1e272e33bed292d31f95df5e2eb7045bb8d5609734763656a2eb67dfe1572da3a914ced310cc35a86044152eb3bcd08b519a596968e5d9899624b6734b522e968ab09cbc8146cfdc3d7783a290993a64d3136b8db2dc220c75b6fbd157bf6ec3941c8862ba831376edc88e8e868533e61ae08cc9e773732bffa02095286b9752dc86a6cf7967d6d87f828ad3dea6328614810245b90d822e6406333b21b5acd80d8363a99b5a2398e1dc592d7dfc2c87113a4c223ba07ec2800d3a74f477272b2f1330a0b0b6d056638819a8704e1398fcf3fff3ca262c4270b7321ce3d12af9495234948922ea616c7873cf56d2684c6ae4e860a860441121b3b902364c8155224cbefcca60ebcf1e147b8f9d127102f84308ea854f2b87163b072e54ba65b96c2a0a08dbe6fdfbe1e0233dc4052d4d4d498f2507fe5d0818378e685e74df951a3dcfed48bd8f4838fb149889223e6aaa7a1d1b64e860a860441183eb1bea9d338945b8fb5e19d8f7f8a2993a6630cb545b40b23a262b068c9a348484c464549290e72545a2a9fe4501f8382611596e108fa2c2409cb441b0f8edf941696e02ef6780949183673ed830f61ab688e54699412eb6b6deb64a8606838e97fa8c58afd07f0c06b6b30f2ac91def8a7f0488447c4e2ed77d69901360eaaf15822ad637145b569255530784e9258856538a2a4a4a4bbd1e06f73be7f2faaabc4f42a2f436a5a86d1c63152be57de7d2f52db9a912b24b1ad932182414790dc2340426b1b92bfeac0fa864eac2828832b7604225d61de58a49868dc70c30dc8cdcd75043f00504dc2736a986d395b4df9529b9c7de575d8f5fbaf907aacc9f472716e4a46bb98b87543c7711f740449ac17a79c938e8ed4e3e57d5588908a1a111e85d756ae406abac710428941b05b73308d61841ab481e1911aa6b4985dded558fccd87bc8191914294cbae46d2bffc073634b563679bf88162e6dad5dd60c4a023c89626d11e473a4c20e1e46997c31d1186850f2c406575050a8af6a2a6cadbcf4fb0c563a572504caf39383358c781bcd74a517da00639b9f99874ee85466b932437def1003c47eb90c068e821d4b335e808927db40d39b54d262484732f6ebde50e1497961cf733bca3c4ac4c9a0524c78995ebe04ca1e6951285655a5dc95eae62945757e1d557dec43553a6c315edc2d8e83158ff377f87f4da3adbba1b8c08798270ee82a74e8871bc554a6a051e7cf63944468a131e16853d954ef7ec40a3aaa2124f3cf638468c1801973b0c73e6de84ad5f379a40479a5b792d406a73ab19c4f530264e7ee70e9251f990274872430b3cf54dc813db96bfb7fcf0ef45adbb1117138be5cb964b0be738e1030d86d9b39b7ccb962d5e934bfcc208a99fd4bffd37332599d37b391f3fa3aed3443d30709444f1adeb5044c813244b3446b29854194290a4fa2eacccd96e66f3cd9e7d038af732c6c8319f061a34bd18ef45f3f6b2cb2ef3f6260a66cebd173b8e3499e869ce64e422139972cec0514e37b0abef5043e8fb20c7bc71555b3b813dc79a1177f65843903da585de41ade3c1770e060ef4ff4810fa2966905134caf499d7c12dce7bfc98b3f0e0eaf7b0f568b3985cedde805176073b1a2430486d6e372dcf9aefff1057cdbfcf3bed75ea9528afacc0c1b2125454f5ac3007c10509525a5ee6ed2d2c2df39a5c15a558fcd032c446c49b81db73e62dc0cefa76b3e85d06fd49218b5d7d871a428a2039cde2d48919455b952d4ca6688d2d726dd30ffe5ad476b4b16d274c98605a2bdf515f07a105d60b09b37af56a3187679b4968f1a32722fdd3cfb0a1a1dec4cd19b2348bd9d5d425ce7c87ad4c0c34428a208ccae512355cbf966b3cd191cb3fd684abeebd0b23a2a28c73feecb3cfe2fdf7dfefeebad56e4807a105fa232409eb29212101f151710817ed7fcb73cf62c38ffe06a9e293d0714f39dae15da7ab2e34354a4811c474ffb5486b223ec7762187e77f7e8be8316723de1d8dc8d1d158ba64110e1d3a649c42c2d120a10df66cd14f64644341c16e5c3af51271dedd88088fc5939e44ecec106248bda7b68af510a2b315438a20c9a26eb3eadbcc1a4d2fef2d42d4b831c6acbaed9679a6c00b4bff18324272b07572060143135a3f3c9228bbf7159ac66cc99225888f8b311d2ddf78fb1d6c139298f5856b43735c24a408922a3e477a738b1950ba70ca0cb8222371d55557990256756d57190e421fda98d177646cdc79e79d67a2821f7cfb0d647df90576d64afd8bd995d9d289cdad5dd8c625543b07de2f092d0d22e0882b57fc3b7712a7c5baf1e4934f1a726898835de13b181c507f9166f29a356b10151309f7885198f7c2eb665d2eae3293c305b9696a4b23c919a27672124c84144138e691dcd88aace64e8c1b7f3622dc9178f9e5970d394812eb1c0e07830b2407eb915a44fdc7a79f5c8e6857b899f5f9d65ffc25128518d9a249b86e5952532bf24260ac24a4089253278e795d07727ef7f5f13570ddd8b4695377813a1a646840ad81b29a2adc36f726ef227de171c8f8df4f8cc39e58d78594d656e41cb597936022a40892250421defaf31f99c12577585477a83a7b439cb0f5c10b6a7f359515e5c54528395886d52b560941c230e6fc0b4d377fba98d869f51c20b697936022c47c904ed3edf74256be59c02c7c74bc295c928305ea9858430bb40a08d66f444484d1245bfee93f4df42fb7a07008e203b3de52173067f90ab3c8f2e5975e6a48a1e6158f7605ed607042eb95838aefbcf38e99ef3ef1ac4bb0f2fd0fb193cb0bd9c848b0115a4e7aab6810693d6e78e449137375db0db34ef03b5890d6027630b8c1c68f601df338e5d2e9c6b4bee0fc8b91d0d01a12018da1656289ed99fb452de2e246c015e7c6e26f7cabbb301ded31f4a03e097bb678be23771b5c516e3388f85846163c1c40b491936022b434086372feed17182905c4e57b92377b4c411a87ee78815a0bd8c1e0067d0f367cac57a3454aca10173fda580fd7ccbe252416cb1e3082789abc2b5fd0214b6bec40d2d176e41d6943fce44946cdae5fbf1165e5de45971d0c0fecafd88fb757bf8bf809e3cc1e8c09bffc04d9e293523ef2852c5c63d9578efa1b03461006267240c874e7c931f36817ee5ff93ae2232371cfbd77486b5261e63adb15a483a1898aca1294165562d59ab566bf92190bee46426da389cde3002277c2b293a5fec48011249193f685241e46728aad79d3ab6f203a2cdca8d79aea4a141da8c481128720c30d6c14e9934446b8cd56713bbf386c16a3e34ec3693cdac8527f62e04cace3f393d325d3f95f3462ecc59310111e86a997cd40554d354aca4a4f58e3cac1d04745e501b3d7626949212ebd7c1a62c3c3f1c6810f90cde80af6681d5fb8239818308270b3ccbce62e6488ea7c6fcf7e13d61e1616866ddbb6753b6e7685e860e8828ebaf66a65646498c51fe2474463f9f634788e32da771899585ca524e55893092d9971e7bd2672f7e28b2fee1e3c6281395dbbc30fac7382249933678e37e468d4a8e37346821ffe3e600431eb2335b723476ccba8b123e10e8bc633cf3cd33d68c4c2d2ee5d07c3032405bb7e757c64e7ce9d080bf72e2194f3d9efcc346c3b59ea4f0c1841d26bdb8c4d9975a4d56c761f133b0aebd6ad3301892489ce69b62b480743136a31b0eed94872710e9a5971611148fee9df0eaf6e5e6ec0925cdf869caf9b4ccfd575b36e39a105f12d3c07431f6c1859ff047f531ec6c78e33d31eee79e679b347a29d2cf527068c20dce32e4b1cf48c2f3e852b2206b36e99d55d300ac70771f0e8e26570c5c52226260ed975c19fb73e700469e930cbbe3cb36b8f71d01f5cbac8d11c0e7a206d6b3e2e3ae702b85d6148173fc44e96fa1303e783347488930edcf2d0323328b463ef2ec72977d00305152558fed8536686e98abdfbec65a91f316004c9acf712e4ce6f3e8a30c97c619177491f87240eac2816826c4c48447878181e7a6d95ad2cf52706cec46aee327b995ffbd43244b822505052605b400e8637b8387949559989cd72c5c622e7481bd2b9670c65a8d1bb2aa39d7c050a0346102eed92ddd885319326235c7c90e262671f41073dc145b1f7961462fa94a970854520fd93c3c63ce702d82408e5c84ebe02850123c8a623ad48fcc5ff20c68ca04f464db91377e5a0272acb2b50515569d66466776ff6af7e8fecba3643100f35483fcf1919308270b658e28f7f6256d79bbff03e54143b91bb0e7aa2a4c83ba98a0b0872218fdc5fff0e399c8e3bd40992f8751bee7efa4513a4b8c1b3495a8a1adb027230bc6146d5cbcaf1e2f32f9801e5ac5f7d82ac8666b38d5b6a4bd7d021488620a9a913f9dcc8b1b50bf35f900cc78d346104fbc4c6ac2a753488839ea0f660cfe6f2e5cb4dd849f6cf7f812da239321a3bcd1a5afd3d6f3d6804e1de1fec7d20511878e68e084778981b0fdc7f1f8a2b4bc5c4b22f2007c31bd4200c4179411a54b7db8da4bffb19129b45733474999538fb7bafc3a011248b61026dde59841b3ffe1b13c64cac5dfb2e8acab8af9da3411cf484861bbdfdf6db66bed0b3fbf6235d2c91a4ba4eb3c0755a3f2f0d143c13eb682bb29bda8cedf8c49e0293d93163c6988034ee69b7bfd45977d7414f30fc8832b275eb56a3416e7be85bc8103f84fe07e7a9dbc95a2011348270e23dc39539d576e9b6ddc69e9c32658a6da13870a0a079452da2a1ef23c25cb8e6ee7b9002ef1609494dfdbb759b431007210d6a0f3ae9f445de7df75db8dc917089effa765125b68835d2df2bc03b047110d2203948126a12ee4c151535ca8c875c7fc7ddf0883fdbdfb30c1d823808699018562d92bc39c9c80de567d9b61d4290065b790b141c82380869e8d45bd524853585282a2e47b42bda6892fb5e7bc756de0285a011c45307b35a37f7a27b229f93a4bc04711668707046a8a84275650dee9c7f9790c48d51e32e34cbd852b63878c82d3402b9af48f0344803902536a3a7b1034b37790c41a64f9fee10c3c119a1a4948ebb38ec6bd77843e05db1f0d4b721bd15c8aced44aeb152ec65d01f048d20c99281b4fa4e64d4b762e2c59719824c9d3ad5a84dda96cefc7307bd414d4d15f69797627fc15eb34d426c783472ff506b7ab4726bbb90d72e0db19cdbc9a03f081a41123b3a4d784096b03d3ecc8df8f878bcf9e69b862024078f7605e2c081156545fbb0b7b214a5fb8ae18e701992bcb2ef0012da45b64483a488959217c0f8aca011c4acab2a0ccf686e43445c14264c98805dbbbcf3d009f656d81588030756b021d585e52ebbcc6b895c3a7336925ac5bc122b853b9405725f91e039e9cd9dc8aea7a3de0a777438ce3efb6cecd8b1c3645a49e25b180e1cd841e5e5befbee3304891f3f0199ed62a13078d1f8b9f632e80f824690a4ba566489eadbf2e9e7a67b6ee6cc99d8bb776f7738b3431007bd81ca098f5ce87cd224ef864b9b7ffe3f66fd5ec668b133c84e06fd41d00892d9211f5fd781b53fff6f93a1a54b977667d471d01df416daa0aaa9f5fcf3cf9b49776bfffaef4c2f96a7b1c3ec25622783fe206804e1d2f5dc2128f157ff6b08f2d8638f758f923a0471d05b901cd6b13376f4b8c4595ffdfd8f91d52c7226324653de4e06fd41d0089251d78edc2631b1fefb5766eaa412441d2edf8270e0c00e941736a8daa8922051ae28bcf57f3f4646738719304c6b0fdc12a5c123084739c5364cf9d56f0c411e7ffc719359aec76bcdb00307a7830e09b0617de38d37c4517763d55ffe08c90d2d669dac94e31bc40602412308d73062f75bd2bffea7d9f361d9b265282c2ceccea8a3451cf406761ac415e1c6a61fff14a9cdad26942953602783fe206804e13449da872b3ff813d38bc58cd1c462461d8238381358079557ad5a659cf467f7968a8cb5c263d63d08dc24aae09958cd5da6876179799519fddcb469d309ce165b06cdb40307a7821284f2b366cd1ab8c52299fdca5b22672d486eeb426653e0b66a0b1a41a83de840addc5b099764283737b75b4d32a38e0fe2a037d0ee5d6d50cd54dcc83071d4a391fcf5516473145db4889d0cfa83a0fa20e90d5d78717799e99623419859abba74e0e074a0bc7066211b541d2658b4f061448a55f2c69f7ccff4647163583b19f4074135b1b8e4cfaaaaef180df2d65b6f7567daf1411cf41624866a1035cd13133c666c6d65cd41a4b7b6232780fba907d5c4e2329189dfffd810e4e9a79feece2433ee10c4416f6035c52933fcfdee7bebcc4eb82b0e7d1b59cd5e53de4e06fd41d008e2a9eb429e7cf8ba4f7f8d98f068cc9e3ddb648e2a72b8fa20ba6a202b5a41f381ffd1b666ac515e5e9e291b15061e7d9ff14d3754c0efaca9a931635dfa9d9a07d6bbd63f1b4aee6eecfbfce9c06799d69df3ee358efa9b3ff929f2695e350cc271109a570c564c6faa170d1285b8b838ac5ebdda64540bcab700863a2840da93a782c26b9c8a1c1313632255c3c3c3cd71e4c891a6e78fa4a25068a3a2cf8722f8ad4a04e68dc1a92b56acc0dd77df6d1ac8b56bd776cf37d786e174603a9a2641f25d71e54cb8a2c3b1bdbed9acd59bdc3c080992d2d4e58d956968c7a42bae3595be78f162936966d4b72086035470784e625063444747232222c2940f579fd473222a2a0aafbcf2ca09e5a52d73a88182cbbc7130985ae489279e3079888c8c3447129f79e571eedcb9f8ee77bf6b9bcec94092f01d4c3b262a1a23274e426e6d9b59ab9773d4ed64d01f048d20c98ded86205c53f5ea5bee3195ffcd6f7ed314e2702508cd0a0a38c10ae702cd4a062b481225cac5175f8c83070f769b67845ddaa100d62bf3c623c9cdef2721542b5af3476d6297862f344d9617f3be67cf1e635e4dbe6a0eb2eb3a902696caa01c0731b3bc84e124c935f3169a8221419869cdb06f610c7530cf34910836146c34ac82a3b06a1482a616054585c52eed8106bf8d024c1f4ad7b1e2dabad67c1156b2d8a5e30b951536102c376eace38a74e19ddc7de0bacf899c0bd23408434dd88b95d22e9a446cc469b7cf370572f3cd371b15c98cd316f52d8ca10e56b0066ba6a6a6760bcaa940b2cc9a35cbd8ec1494502508c9c17c5d73cd35b6f95090344a7cfa27cc13c16779f44d571b051e0b0a0a70edb5d722223c0cc9bfffc234c2dc336450f662650ab339ab90e70fbcb9c6140e1d51160249c20cfb16c650875634cf5f7bedb51ec273329c7ffef9ddbd5b7642140ad06f8b8d8dedf63b7c61d5983cbff2ca2b4f20bc1df9b5cc78dcb973a7573bb95dc8696832e6557aad7740da57fefc45f00842079d9b2f0abb5f29ad3085c2d6832d21331baa15dd9f60bed50fd9b87163b7b09c0a14a4193366981e213e67976e2880f5c9efa3efd11b8250162eb9e412636af239856fbabc4682f03e1284cf705c2db3bec1acde99213eeea024484a4327b69224729e7ae47077a17de31bdf3085d9db6ebea1049a58ac701e6992d01ef76d55f5dc8a952b571a01611aaa81420d2ae063c78eb5cd83c2ea97dc75d75de659d51027cb1bff5307bd9b20b5f5c67ce74e665c5eca4e06fd41d008e28b4737a4c1151b85f08818e37f54970dbf4d3c2900dad2b2c26fbffd762328eab82a41b407489d751d78239428fd057e23b16fdf3ea4a5a5997792d02ac484dd73fc2edef3c8238f98efd6bc583b1cac7923f2f3f3bbd366b9d8e58defd36f4a4949c1b871e3c4498f44ce5775c7c7d938ada2a7bcf98b0123c8cefa162c4948968271e3b69b66636f45e80e78f5177c858bddb7f42f282cd6969542447f8dc8cacaea161092cafa7c7f817173fa2d146c3ac614642581dd33aa1d694272ec46496fd7c5cb34e9ccf3193eabe9da918ffff13ee63d2929c90ca0c68f1a8f8cb60e438c2d6d9d661f4c3b99f3070346108e8b78fefdbf4cd8494c6c38f6570e3f0d621500157833bf41c841139482636d61698ef25e9aa31494530968a0909d9d8d4b2fbdd47c8b55b8f96e7effc97a1ff95d2ae4cc17c9ad5ac30eebd7afefa135ace7d66baa75b76cd96256e81c37ee3c24b6b4084980f5ed1d5e4d622373fe60c00892da226c6fecc294ebe7c015ed46e1ae3d3d0a63a8c357b859f13c5208b8271fbb3dbff5ad6f99730aa20a108f2a7c5692f5071e78e0816e21b69a47b7dd769bf9068e47d83dc7565e3b20f8bdd48e77de79a7795e49cf23a75ed397d035d2f4797dce9a26a1f9e67f090909183d7a34a2c22291dbd26e168ea306b193377f316004c96c6d435e3db074ef4ec4ba24835b337b14c670002b5c05438f2af43cb20b5c4941df43ef63ab4c21b413a240e299679ee92688928347eda2d76ff605bf8fdfcb7bf4fb7954f3887953938a69f037ffd773decffb7cd3b582e320ec1ae60cd5d53ff93b6c9346375b404d622773fe60c008c2f921b9edc0ab351f980cbebef20d53605a500abb8271103c70621bc35b480a5fff818ebbdd33fd090db1e139c944d38c93a55cd1b1d87db8014994ad638330d4c4179eba0e640a41d6fcf95f99d5de19e149357baa56c941f0c1468ae6140941dfc8ea47688781dd73fd056a548d22204898b1e3c7990953cf6d2b44fad17ae407707be88133b19a8004c18eafeb113d6a82190dbde9a69bba0b9c9a84f02d2007c1c7e6cd9b4fe85553b268b0a9dd33fd0535bf543ed8a83262d815e5c248771cbef9f63a2473431d1b99f3070346102e22a7fdd54b32b69a1680856e1d307434496880260d494127dd4a94f1e3c777fb11c104bf87b241c7dfe040351efad612444671f1860824fffa373de4cd5f0c1841383f24931bc11f6b46dee71d70c548a187b9b061d37a9496d30f294765f9f01b1b09355010d952930cbe26167ff37f6dc834c236d89abfa4b218358555468662e4bb5ef8de9f21b5591ae13a6984c561cfebc3220e03461046f772b97aee1bb25d8832727cac14b80bafbefaaa51db1566e070f8c567851a94007651b9240b7b92d4ece17d2448b0cdae92b2fdf8a0fc7db8c6441a82bcf29d3f3171596c803dad5dd8da8771910123485a7d3b72a941da3b9078ac13175d7eb5597171dad4cb505672bc5b5034895d8138082e488077df7db79b18564dc2495e749cd52fd0fb7dd3e84fd49457a3b4b802916362102556c8ed4f3f83b476980d3d69a9e4dac85f6f316004496f6a37cbd42737b6224dd4e09b351f226ecc1853e895e5c763942a9c6ede500035837184a56e9418ea8b9c7beeb926f45eb588fa0776e9f417aacbaa5055538d258f2c45647804468c192d3eae34c094b33e062e0e18413cad1d66a393bce62e1385e9395a87fb972d852b2a0ac9894952e0250e414200147a1e4900867590144a101d1759b2648931add41c0b7acf96c849716921d29352317ad4784447b99153d7809ca35e3f24a9c1ff719181d3203658b9a3d4ac6f74ffe227f07ee17e144be568abc463205b26a6c78a64c5d3b90c76a50e16b05cd4f1bee28a2b4e20088fd4289c9fa293de78bf922a58e0b7f1dd1c97e1e6b0fca6edc7dacd62d60c7defcb7608214590bcaf8e20222a0c23c2a350f6618db12b5575f3685738fe42d3e5f2438c373a594cd170876a059eb3034509622509a121f8fd5157a703bf4fdf3d6fde3cf33d9edf1e4626e3b3842034e3ede4ad37082982a4d5b762e2b573102f2af28d975f17a1fd63b05ba05b78d51e3413b846d3709cb0d51ba8566059b1c74a09e10bceeee33dbc5709154c30309224654024eb34f5d323486b6c416a3df74ef77f3b8490220877a1caf8e51f10161981d8e81158f8e07ca3de19c9caa306eb0502241dd36361ce9d3bd714b0dd7dc31dda3aeb917e8835264b7bb438314aefb14ba73fc177d20c27346238f30f75468350ae868c894555c8109429d32f872b2202e3c6c599de13ed1909a4162139b44564884ba035d450819a4c2c7fd603f7b7b7ce5121394892b9d2c8683dd9a5d39f50d9609d326e8c044effdd31a341526adbe1691e221a843be1e6b788a9f55f3f476c78b419595fb46811ca2ba5008a4b02ea27700ec275d75d672a99136f06a2620723b80e95751106edf6e5cc3e75e607a22cf95e5a1aaa41d27f7fc46c85906606a387084138e125a9be119b8fb661d623cbe08a769950f882a2bda8fee0102aab03177ab26bd72ed3e3c1790dac584783f40ed4babe0bc12949f81f5b716a1dbb67fb13a722c890f141f26a812d2d4dd829c7e4cf3fc77c71d45dae08ccbfe30e2147050a76076ed6e1f6eddb71d6596799ca1d880a1dac6043e2dd59d64b0cab3ff2e28b2f9a7b1c0dd24fe05ce254c94c6a6d17721a3bb0eeefff45b4489cd1223b0a769a96deae70fc017b5da841684fab6960779f839ec8c8c8e826856a111e299c0365aa0e0b82d8e1e9bd658808772176541c36bdb7ae9b2454e5ac0c168a6f61f5065c499d6112b4a7a9411c1fa477506debdb93c572e498d2400cbab2ee2817ecd0b9e71eefc2e8c99f7e81ecd60e640b41fab26761c813c4d309dc387fa9591c2c6ecc0853012c0c1ed96af8db3d4b0d3271e244b304bf6362f51e2c7396ff85175e780241f49c421aecc646094262b2178b0449fff46bef3888c8506acb100935b10357ca4bf9f56f11cd0a8871994d77a83dfadaf54b0da25d960e417a0f9637f1d24b2f753be75670fffb609babfc1ed6211bbdcb2ebbcc7c47da67b5de6e5eca4f1fb6430879826c3f265aa4a919d1f123e08ef62e30a66a9c04f157b8b98adf39e79cd3dd8be5f820bd83364a1e8fc710c497245cbb8b8d97ddb3fd05d61dbf8bdfc43aa5464b3bdc8aacc656784486121b87c840a11d36d4b621bf0978adea234c9a30d55402d74362c1b0a2fcad8c1d3b76e0820b2e30e931cc84056c779f8313416164a3c446c56a5a11240b47dab944a9ddb3fd09cac2cb2fbf6cbe69d4a851662b84bcfa5664880f92d4eaff5a59214f10ee6d982d4e56567d0732ffdf3f9b3dd6c78e1d8f03259c9b5c849a0aff34082b9a0e1d2b968b12b0d2798d847334cac9c17261f910ec0554625889c23586598e145a7dc6379d40a2a244ccbee2128c3f7b8c59db60eaac59c8afef322be7507eb881acad6cf502214f90948676a4d6b56033335adb8ac9575c6eba7df71616785bb232fb423b1d58695cfc9815fae0830f765fa3f9a65ac9d12a3d6115f6471f7df404629028ecdd1a316284293b9288f72951fa0b159525987fe77d66a7a970694093fee1bf4c14afa7b1cb2c0cd2970d75429e2089a226b3b88c4b17b0f18b46dcf1e45366def186848d282f954af053839004ec7161a59e77de79dd64e0914240f2b133c0f7b9e10e968b0a3c176df335b3b4fb970d0defe57dfd4d909d15fbcd1acf5c406eeaf53720fd582b92eada8df63004b191abde22e409c2b9c55cdc219991be6257aefdc10fcda4aa7befbd17074b0ea0a8dc3f2166a5d1f7603c164972cb2db79809372487b67e8e06b1876a588e412931d4cc2261789e9e9e6eee61795ab54e7fe09dd56b113b221cf39f5b851d5f3420add9bb0d1b376d62f06bfa509951d81b241d6d37aaf4ec31e720657b362a8bfc1b5d670b470dc1ca9b3c79b2a9586e3dc0566fa898582a9c81ce876a5912840eb19244412d72df7df79932e6fdaa490205ede667bafc8ebbe6dc6bc6c9d2ffe117661bb6ac8641b88967a0c005e7c65d70215c6111b8e6aaab5151eeffb609ac4056367b5db472a95958f03a526ff75ca84389c173e62190268eb54c584edceb5ecb8e9a433509d7d152210e6439322d2586fe1e39e16ce397ee6a6a4382680d9a5676b2e30f061d41928fb561ce42a9947037ce8e1b85e272ff0a5f9d719a525c84592b5897e1a75005b26283097eb7f5db79aea4b1c2fa4c6fa1e9b27c980637d76134829244b74820b40cfd7dd7c9a08d18cf598faef808f14bc3a5f16c43b298e19e46ff4d2a5f0c3a82d00fc9f887ff347345e2ddd1d85b5cd0a3007b0b92435b57ad5806e2b14259b1fadf60830aa40a5120a1696b1951d3de78e38ddd9a438f0423a659c66ab206127c3febc7acd7e576e19ce9d799edd732ebb805c210d8a3d06fb4c14caa32a12762666ddd966d5b80a7032b8d05acb15c3a09880388fccd8ae74a1dd667060bd83bc7b00bee0ec523e7be30bfbeb07bf6745062f0790a3fcb283939f98449540a6efe636ded0301be5f4d2c5d759ed6c4b69fff0209875b912b4e79425d93bdecf881c1e783d001939622265a2a44b4c88e5ddb6d0bb237604513ac68ed9ed445d0085eb77b2ed460fd5ecec0b49a395668972c8f146882fb9833dc86bbd132ba79ead4a9983973a6d987908b59b0b7f0a1871e323bebbefefaeb663f779a551c5ca586a0499a939363ab4118ebc6eff337e2da0e951565d8535488375f790391116ee37bbc58f96de471b49cbe473d4c2f969decf883614b10b66c6cfd78a460a95031468bffb385ec0f13a53fc0ee6adae2fc5e3ac72aa09a27ed7ad5eb76b00a381b0b3dea35a6a5c422a9d87b4542315c67dab469b6f3d4f9bc9a6176dfed0faa2b6ba431e05ac15721c62ddf143f06395fd59b850833c5bae072a39c0362273bfe60d01124bb515a8700108415c75697424532b08259a94f3cf144778b3c580842a2330f34a99807abc0ab90db41ef5181b6fea784b0fbcf174a0e4d4fc1e77cf71eec2b4a4aab50b0638ff13b469d7b21de38f091e9d94c2331eadbcda060a6f8a976b2e30f063d4176eef6fa0cfe406d59b6be0b172e344241d06667a552bbd83d176ae0b71234795430ad42ad9ac40e4a8293fd674dc70e7cd69abef5379fa52966f7cdfea2aca21ccf3df71c225d6178ae703f52ea1a91da20c410adc151730f51ebff0c425f0c4a138b051215292da33bac4f04f105ed77562ced70f53fd419e5398964bd3f54a064e677722bbb93690d258295101462dffbadc4b0decb73eb7f0afee67fd67bf53aa313b4fcfc011b31fa30d4926ccc2a7695e3a69b6e343157993ffb0fb37d869d9c040a0e412ce08695141662c3860dddd76943ab2966bd3f54c06f234948e0c4c444e31cd347603e7c855a85f86424f215fe93c1970cbe50b3abafa62acb9ebb48d15463fe1e59f218a247c420cae546ce277f40e291165b3909141c8258c056986b64517838f8c551625ed30aee4b45f7279420fc56250a5b6d0a2749cda3f59c5dd9f45718cd4c42f1c89e29fa5fdc7770c182056084f3adb7de6ab659a646654027a728732518ae81c59e2f928444389909c79eaf43870ef5c95455ff8addf19cef41df83a6f58a9cbdd8d2e875ccede4245070086201058d6018372b9d95cf05e6285414b840f6c6f4174810ebd14a0cfed6731e29b87a5d49c623af11346df43a7f6b63c1735e2328b86ce159361c7f614bbf7bf76e23d8fcbfaf6629d3651a7c37eb245c34c7ad4b1fc786e60ee474722358c7c43a01fd491056bc0a044d14b690d75f7fbdf94f5b67df674201fc6e1ef9ed7a4dcf79d46f57215701d77bf57f157e5eb3a6a9cfea357dd6fa9fd5cfe0350a368ffabffe77a6d034eebfff7ea3951e78f90d641ffe0abbc4194f69e9444e007bacece010c4026d55d9fa71904c9d4f5630afeba8bb55f8f88c350d0781c5be9a5214975761f4b9634df4c45bfff44b787e5f67c2d8d9b5cb2e5e3b3909141c829c043417384784ad16570c5432688ba62d635f7a681c9c1e45fbcb909e966dfc8e1b162dc336f139d8d5afb3053973d04e4e020587201650e8e9c0aac620e8acd317c9ccccecee6a543b9ef7dba5e32070a8a9aac65df7dc893869a8561dfa2e52a4fea93918564272f465b6606fe010c402c661b19746b5028f6fbffdb6d12234b76eb8e106e3b8eaffaa45ac6938082c163ef84db8a263101d1689acba866e39e0820c5934b148168b7c041a0e412ca0c660172f855eb508c9a07bf3519330304f89e110a4ff71d6d9e7c115118dc993a721b1cd3be691493920311a3acca64bbe3212483804b1807e0697d4e458885ea359c5ae4b3aed240983f518de4d72f07ef6f35b09d5df6697be8bef51934f7ff37b78d46fd0ffd45c24f49a3ec3fb7c9fd5ebc1c6c1b212b371eb81f26a145794e082f32e348e39832313ffe713241f095c08496fe110c4020a0d97d46497220586bfb5674b47a94912828b3df83ae8fa8cf55a7fc02adc3acec06b0a7e17c17bf49af57905ff5762e86f05af13becff4270a4bf7a3b258bea3a414174ebf48c8118ebb5f7b0b09fff58959fea9bf1d723b3804f181aefa4e01a360911c56c1a7b3ce55cc499259b3661901b50a527f0b15bf43bf87e0fbf59c82ad5a82f7fa0abe3eafb0a6a3e92bf4baf539df7b028db24355a811edb162c50a134a72d135b39153db8c1ca977ae5292d3cfa3e67670086201058691bc8c65e24097b6c2fc8f02a2c2979a9a6a0610952434c1780fb54d7f1384e9eb77702e3d47fdb9c722a7bd720b648688305c8478e69967b076ed5aac5bb7ce4c765ab3668d89aee5d2add4869c5ecc5da1389f841103cc3b47c179ceb4d9d5ade33cd6b2e82fd4489eb2f3b7226acc6844ba63b1edb35f2387d1b9c737e1ec6f87dc0e838e20d9ecde3b26048960b8bb1bbbf2b7d916b6bfa08050839c4c1894008c5f62cf169d7a0a1aefa7d0ea60a2fe564d644da32fb07e1767fba9c967050737097e1fc333e837b18341273a8d1e3ddacc20e442cf175f7c312ebdf45203ae8c7ef5d5571bf2937473e7ce358b513ffef8e3866c8f3df6189e7efa69734ec271a7a94d9b3619ad4a72b11cd889c1de4096a312d957ab9dac6cabcb0a91919a83a81171181b1d83b4002ebee02f061d413cf56dc8acefc088b878d120ae806ecbc64a644533304f7ffbdea3a0834c679d8248a1e4fc68f557540808feb67bde5f9080d46ed404bec438159434d66b2490420965770f8ffabf4601fbdea7bf7dd360d7f8aa55ab4e4a8a1350b20ff3efb91f2eb10ec69f735ebf8f71f406838e209c2c955edb861131d17085876177c12efbc2f61324882e2067f73f4943adc07392844bee33b295c23067ce9cee7b94184a147dbeaf60bafcb6071e78c0bc939a4185514101f585ef3dbef7d9fd4fd89186d06b7647dffb492a2d0396cdc91a1ede73a5d902dc8d9b1f7d42cc699bfa0f32061d41329b3a907db405b12ea904d1203979fead6a72327056dea94c2c92839a82ad387ff39cad397d110a0343c469d35388ad42614da32fd020c08d1b379e20847d01055a35851d7cfff725c1c94844901cfcaf37655058526a566767bd2ecfdf69969cb593816062f0f9204290cd9f7c6916b00e0b77213737b004612f166d730aa15da5f21a855f43b095309c5fa142c17569e9e8328d93a5d317303dbef36442792a589ff17dde2ebd53bdc3ee79bda6a6985ed732d032f1cd13b1bfb4023124a21064db4fff11d9f5f632104c0c3a82307a73a51430e705448647980125bbc2f607acb8575e7905f3e7cf3724e8adff40538bcfd2dca240d0311e33668c592185e950384828d52c146e7f49c3f7301d6a127edf534f3d65f639b9e38e3bccd80c27375d72c925c6f9e68a23ec911b376e9c59ed840e3a4d32c697d161b79a671462ab501374ee99175feda1e7aa394ea67d789def61d0a75d5e7cb167d76eb3c62e97f2c9fabc1ea9015c00ce5f0c3a826c6907aefdc6c366e7db8993ce434d69e01677a3f0b17786d1bbdacd6b779f2fd8254a6125a83d2880142e0a09d362ba8412c36a7e9d29b4578c8463372c8f4ccb9a26ff3f19f41bf49b78ceefe6916930d68cf921f49cda900bd0b14b982628b525bb89695a726543ce4664b9f1c83d0a5f7df555b396166700f21b3ffcf0c31ef9b0437a669a38e86ed3859fddd019d02544fdc5a023c8d6af0f8be0451a5b75d9e38fa1bc2870e60b058695fbfcf3cf1b41ecad0651215521e40c3bf6dc684bcaae5146096b7abc9ff7f9a6d31bf0397d1f859d69f29cfff1a804b20309a0f7e9f75ad3d5efe37fbc57d3b23ea3efd4e7acd7f43dfa4d4c83a0c6d3fb4f85ecdc2c8449e3c20d7818ad4b7fd34e06828941479035dffb53214704a68b19e1494cea76960301562e5b3db6faace4de6a100a008544055f237e399f9b6606cd142eaec645212838fc667fbf9be9327dbe47859869f23f154ebd97d75550f5a8826cbd8fbf094dc77a4d7feb7f9a0e617d4eafeb39bf51dfc5734de754484d4d31635ba3468c86a759fccd86e0c75ef922e40992d0dc8a0c31abb8eed1c6d666635bb355e668362ba2b742ec0b1516156a82bfd9554b53817e855588ce044c9b42c140466a0fd524c4238f3cd2fd5e7e3feff7f73d831d15156578bfaa06c5fb8b70b0e6009e7bf225e3a0478bdf94f155033c479a6d652298087982b025e1ccb1ec3620f9d7bf3642c6cd23adad985de19f0efa1c8593e9b045a716a0a34ae1e6b90af09982763b9fe53b4860be83da83734d9424b4e9792fefe3fffe127d30e3605535f6974a391facc1ce7d056683d691ae68dcfad872a45283f4f37cf3de605098585942908c637558b476bde935a123a81a8047bbc2ef0db4e52619480a3a96dc879dd755c07d9fe90da81dace7249f924d7786a5234f92904cbc87ceac3e335c50542ce55c538d842d9bcc84a828c153f9db917af828928f4a9ddbc842b011f20461ec55663d90fff551cc7ee0214310f6a450e01476857f3a28b9480efe7ef2c9278dafc07077128384f1376d3ecb34f8bc928dd7e9ab3052955d9fd4540c28a443df176d35985154e675cce7cdbed1f895e7ceb801bb6b1b9109b11a6abb906d230fc146c813840b1293202b3ffa73c48f3adbb4be14280a605f4d2c757029d01c4378f8e187bb2721d93dd35b58c9a124e49160facf3efbac19ad675e66cc9861eeebeb3b07235846679d350e11ae309c7dcdd5c86bee408ad4755e2db0a5a9cd446edbc9443011f20461b873b238e8372e78d00c224d9a34c90893b565f607d667791ec8de303b901c2424c9c823dfc7c8599284dd9ad426bccefb78bf0e3efaa63358515c5184f70f72f665052aabe9971563f444efde821cf44dfdf75fd8d6ff4023f44dacb64e1372306dc6350813276ed9b2654670b495f65788f4b9bea67326508dc27792203c323ff447683a3200d14aa4607c53b0c08950dc4f9279ca484b37c4e0be82df5cbf095bfefbdf066432546f10fa4e7a53ab21c8b533679bb5913817c15af0fe0a91f5b96008a2fa1924097feb3b7964ef16c33e089daca45ad29ac660465549054a2a2acdfc91d9d779279b8d193f11799f8943ded8895c8720fe21a3b1ddac8374d595d719822c5fbe3ca0ad7e20d2e80df81e0a3c7bac4816825a4467237266200942e75daf711cc59ac66046b5688f1d7b7719cd11ed8ec1c88b2fc18e237548ef0276b48b292db0abff8146c813c4cc09686fc7f993af40bcd8aad42014369284c24673c4ae4206239837b6acec4de3d4599a5b4a26bbfb4319ac1f1eb5013a58b51713275e620602478c1f81c4fa56dbfa0e3584be0611277ddb97f5467bb0b783fb76b0f00992432b622880846077b346d592247a9dc76069bb4080da52eb8804cfcacc33753879fab558f5a31f62db57f6f51d6a087982247044f5df7e0377b8375443b76966a10f2681e90d2850ecbd6288ba8692f39a3aec83693091f54372f0bba9e9172c5824a6950b0b5e7f1709878f21ff887d7d871a429e20b91007fda1c50813728c1811d75d01141c16fe507264e993900c3c724c860d02c3e69392928c901176cf8522d4f4e51c7a2ee640c24746c520bdbe1e69751ce7e8df9da102859027c8f36507102582322a7e1c5e78718531370825889a1f4301142a9283e7cc979244272d71c510df674215ea3b2d5dbad4743e4444baf0de473f40e2e14ee41c658cddc00f02f606214510ae77955cdf81cca62e241d6b46e6e116b8e2479a9e8fcdc95b505e1d78879c2423f4b7128fe76ccdf57ab0c1ef20685272d45d67ff71934e6d9dadf79150fc6efd7e3d065ac352e8356dfee67969a594619994576131ca0a8ab079f55a4cbce04233b04bb38afb992fdab801f9622e7b5a80acc67633626e2703a18690224886a8de94c65613c9995fd7820ddfff6b118a088c8d8935536b8bcb03e790abe06845fb5eb35e1f2850f8e877d044993b77ae21083509f710e4ba5c240abf59c1df7c469fd5a39e070a3dcaa6aa18155595a8a97c1f4f2e7e1c178c3dd738e45c37c0e57263fcd46b90f6c96f4cd0697273873484adc894bab6938150434811244b5a958cb60ea43400cb77ec41ece891080f0fc3e34f3e86aa1ab1bf4bfba7c78a02c44a5781e3514d39bbfb8305ab90f35bcc929ca249e8bc932c0c55e1026d7a9f7eb7125cf3d543a0fb00be43cb8a479a8407851cfb8b8b70e9e48b101625a410736ae6ad77e1bd1f7c8ceca375c811426c6814d34a4891d9d22924f1ae9438181052044912f56b22383fff12b1a3c6213a2a023171b12815cd5154d8bb699bbd855568784e738a3d488cb8d5f195812288f5dbf84dd422bca602cfc152ce50244988f8f8784c993205ab57af36838ccc8b955c9a5620a01d05ba801d27aedd7fffc2e3ddf06e5c31ff61bc5dfe01d26a9b916776831252c8915ba6791a3b90268d1fbbee339a077e4186de20a40892d6da891429cc85efacf756bed8b05cff8915c196bd2f95cd3408a6a1da41858e6bd65e74d145260c9defe58204fc9ff6b65d5a03097e17bf99dfce5554b87709cd2e7e37350bc75038a78524d2b9e0bd25faa1a26aecad2e4275b9e4bbac1a15c56276964919954b595572e665050a2b44cb0a491e5ef4a02105f7ee70c5ba70fef9d3b0ee877f8fc45669e842346cc41f841641b8a596b42ce7dd782ba2c3a5d223dc26368902a1b0abd8de80f14defbfffbe695d29f83a8f9cf33f74b5760a1a4d98b4b4b46e02d9a535905082a829c8952039ad974beb683e4812aef6c8c5ec9817e69df93d1d4a7715a2a04c4825e6d23629f79262b95eb81bfbf6ee44d1fe3d282cd881f56f6ec2d2c58fc1152d64343300a93962f1c69ffe2972dbbb90754cb4c5d1c1a11d7a83d072d205f9bff91461ee088c1b310a4f3dfffc092d796f5b423bd054613a142c0a0dbb4e294c1c672031b83a3ae769f01ede4b211cc85eac9341c74394bc4a149ef3bba9fdb8103543e8993f05b5cbe9c0309028579499bcc4e9afb12c9fe3bf89c8f018e35f440a62e4f7c36b1291f1c55124d436224fcc63ae1b902275985037787c8cd321a408e2113cf0d63b52192ebcf8f24a94d5782b5e5bcdbe1044b50f6d66151a2ea4c615ca69e3336dabe3492164cbeb9bce4083f9e0b7910cd672e19164e1b91e396eb264c9122c5ab4a87b4b8453e1ee6fdc83f3275c28651361bad62fbee1662c78f449dcbfec29737cfcf5d55857fd7f90f6f13f21edcbc3c8eae842ead116643673d6a7680f31af52eb5accea9776f53b18115204c9aa6b92962bce544e796505aacbbcbe078596e0b99dd0f4165cf04ced758e4e333dd512ea7caaf620599454a1049603bf4bcb84e7aa19ad65a4fff19c64b1a67132549616212b6f1bcebfec22b8a322b1f5ebe39b66d60b01e4c8318c2d2dad66037f5ecb91df493cb2fbb6b11319e27b70943ca3b667dd0e560c1841de43abd9a994859bdad66cc63ede2bd86b54fa84b3c7a3fad041d392db55e4e9601514a6410122b83c27edf3993367f6786630837924a155f3d9ddd31b941e2a4741f64e4cb9f40ae380671ff5d60f7ba2921ae4bcd3be2e8732068c20b95f790b3eb1beddd8af336e9b075754b4d8b951c8cccbc2bec22233c9c6ae224f079243cd0ecea96097e4e4c9938de6e09ab9248bdd73831524077792a2f6537fc41f549755996ee28b2e9e8ab8a870534f69349b444b70f18ca4ba815fc82dd8183082a475b423a1a11ddb488e1b851cd2624586b9b165d366541ea841459977b753bb8a3c1dd43c2249d8aa72169b3ae5da856bf7dc6005f3f8c20b2f985e2b6a4fbb7b7a839abdd5c8dfbbcd2c24112d4e7bf667870d29b8705f7a6d1732a5aeecea722863e07c908636ec6868c19459b720dcedc27533af475646a6f13dca4a4a5153cd2d06fc13640a0c058544a0c9c15e1d92838369fccdffed9e1bac608340adc89ea8be10e440d941149517e2d947979b06ebf6479fc08ea64e2149ab59553f270416720b36068c20dc90f1f5437f66f6f80873b9b17ef32623bc2515e53854cd15db4bcd4a187615793aa8e6a0e0b07f9fe420b8df1effe75a54becf0c66901cd498ec8050dfcb1f54144b8354518cad9e3c44c684212226de38ea591de2a40b39b2a5ceecea7228a35f08c21e0dc2d3d865e693f31af7164c3bd689fca62e3cf8ce46848d1e87c8d163cd3c8ff49464940931ec2aad37a070900c24065b50ed02e53546bf52701876cdee5cdedb17210a45a839c9fddd172f5edca327abb713add840b1cc78bcf9e69b4da3f2fade62e41f6dc50e2148de3120e158ebf1015d76e57abb7413e5984a07bea95d7cca666c6e6c464a53db19c35327b223481579618f18c75454a6f8ce21b34f3a8991d2d069c8c14ca6d2d16be9424e4b0b6eb8658119e718111583b1234799e5378bf74b0bb8df7fa155a157b38ae7bcc6e9abac64ced0e37dfc5fcd2fdf34063b985f8eaad3cc5abf7ebdc927c77198570abcdd33be504dc473eeb4c5b28b1a33164f67e421a5a5d190624b6dab69fc6872d1794f639dcb9175cc382b4f9db7eeede4e274481282a5b4b49b60461226b3f38f84e02032e3b9acf70703fd431029242eb690562f2411d6b3df7cd3c7ff8c390b169bd1da2ba75d212d15bb628bcd52308525c52620d1b7c27a0b25869ef3a80b45b3d78a1bbff03a2b5f83ecaccf0f76b0d5d732d8ba75abe990b8fcf2cb4d8f14ffeb6d7e951cbc9f8d0ca30b5886f1618c518b466ccc48c44746222e361a53e6cec17269dcf67ff925b28f34234b1c792ef0c7c15ef64cb2713c5398c046211b43e173e43c5bd2a329cef0232e60ce85ccede4ad3fd12f0449e892c26aeb9016a609d9adec1a6cc41d2fbd8c08578c09405cfaf062ec2d2c30955052e2358fca6bfc2708058395ca169082c22e4fdde189cbe9f09a1287ef1a8addbc04073d3ff8e003dc7efbed26f0925bb33172e04cf24bff4c35b0d9522e32cc3bf129ccbb6911434d1886c238ac28b1026ebffd3e2cc8dd85b44fbe40ca274790fae911647c7e0c9edf1e3e63a4fffe2be4d5b70839da444b8926a1df53d781acfa0ed1205e8bc44edefa13a72488d9c85d3400996c46538f0a935bbc6104a9a21db80b90a75932c26e40613defc9fdaa096f242461f2b419183b76bc69c1478ef606d1d981268155b5fb03fa1c1ce7e0e6f83af38e60a4eb505a5bea4cc140cc7befbdb7bb71f007ac1b9a6a5c309c7b2e728b3986d553436954821e4d3c97e5776fc1e70ce43c2e261623478ec439e74ec4ac1b67e3e6bbe7e196fbeec6b35bb78bdc35c3435914a224d5779910975412a859fc5d914322bdb5d3f8451ce0646c18230038baef2bdbbdc5290992220ca60fc1bd3936d7359ab87efa176674555e9e24ff6d6c6843ee6fbec48b99db71ee953310111f01575804dcae708c8c8ec7c8d838c40bb8bc26234c397781ddae37dd7413e6cd9b67faefd9eaf5a555e7b3d75f7fbdf135f80e86aeeb4207264a555a44bbe7862ab4b15162f4a5f1e1b3846a616a2a1e59a6d4da240e2772b183805b60df76db6da65e793c1df47e1e290f575c3ea35b4e4898b811f16292bb0de1b82e41b43b0a57de742796beb5169bfef19fb0ad03c893c63991fe9090c5734c1c7969c4b9af485253a7771e8a98f7598dfeafc1754a82a472d3fe06d118ec0bafedc256f98844d120b9b50d78491cebd9f3bf81f32f1152b0251035ccedb3dcae282c5cb8b0bb52b80744b9e9b6fd63af0acf59c05ae0bca63e84bf603a4c43d361cf0d2b90bf7beba40e15b0c1d00687f9ef4be3a35082303d6b3d6a1df2c872e6f5337d9fa6ade9f2799eb3fede2f97b4c5479dbfe05e44c746192d6320048a1f3f013366dd8c879f5e8117f7ec43da1fbe10b96d31e448a6437fdc24e3545f5fd9ee2d4e4990acfa36719cc4c9162672224c466d1b3c3fff0516bdfa2e26448d370eb72b9a6a32c2cc3fbefeea2bf0e4d34f1887bbb8542aa94c4850536d26f56b81b28095107a6ead507fa0cfb2407924f9e88cab700c370d42812578cebcb31c7cefe92df8bc82bf29b89a9e5ee36fbd87e72c7bd66b6fa0cf9973911bfd6e83529113ca51f17e796f155e79f1558c9b3c0131e3e20c49d8307390d984e547c563d1eab5585df53e72fff73371f61b9029d60dc398a859ece4bb37382541323a812dc7da51206aece55d85e6430c2938ef589cb4ab44252eb8fd1eecd89e877d9249868754574a4b4ed6977905b6b242325ef2c729a02c603d527879bd2f1548580b5b5b1e16b4be73b841cb81e5ca323e41e8ce10be65c874b5acf99b47bec77a5f6feb539f619a04a3284812a64939624405e3c32a4b444b893c71f0b8a2e680e4a90cfbf2f760feedf371fdb5b371f91533442ec30c59dc615e904033eebe074f7ab2f0e677ffca56be7b03970ec01888e3cdee59fa190c4edbd8ec1d087a3633dff4608489a6a09dcf69b09a414233e8c04130400292f43cea6f928a7176dca1989d33ece627494c6fa698ffe79f331519fffd2be4377760735317765ae5fe14706d133258b153ecb6bcc64eecae6bc78bbbb6e30ad110374cbf12e74f9f8cd27dc5a657e8bbdffd2ebefded6f1be79aeaf43bdff98e030741c1871f7ed80394c38f3efaa8fb1e76557fef7bdf3381afcf2e7fc6740a5d327512265f7a09ae9a712db27efaaf481305e02bfb3dd185ff0f644125b27958442b0000000049454e44ae426082, 'éditeur', 'John', 'Doe', '1990-01-01', 'Bonjour, moi c\'est John Doe, j\'aime bien les jeux vidéo !', 1);

-- --------------------------------------------------------

--
-- Structure de la table `userstats`
--

CREATE TABLE `userstats` (
  `userID_stats` bigint(20) UNSIGNED NOT NULL,
  `commentCount` int(11) NOT NULL DEFAULT '0',
  `articleCount` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Index pour la table `userstats`
--
ALTER TABLE `userstats`
  ADD PRIMARY KEY (`userID_stats`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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

--
-- Contraintes pour la table `userstats`
--
ALTER TABLE `userstats`
  ADD CONSTRAINT `userID_stats` FOREIGN KEY (`userID_stats`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;