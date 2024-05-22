-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 20 mai 2024 à 21:51
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
(1, 'Un voyage futuriste enfin à la hauteur des attentes', 'Une critique élogieuse de Cyberpunk 2077, malgré ses débuts chaotiques.', '[[\"intro\",\"Lanc\\u00e9 avec fracas et controverses en d\\u00e9cembre 2020, Cyberpunk 2077, d\\u00e9velopp\\u00e9 par CD Projekt Red, a su se relever de ses d\\u00e9buts tumultueux pour devenir un chef-d\\\\\'\\u0153uvre du jeu vid\\u00e9o. Apr\\u00e8s de nombreuses mises \\u00e0 jour et corrections, le jeu brille aujourd\\\\\'hui par sa profondeur narrative, son univers immersif et ses graphismes \\u00e9poustouflants. Voici pourquoi Cyberpunk 2077 m\\u00e9rite enfin les \\u00e9loges qui lui avaient \\u00e9t\\u00e9 promis.\"],[\"part-title\",\"Une narration riche et immersive\"],[\"corpus\",\"La force de Cyberpunk 2077 r\\u00e9side avant tout dans son histoire captivante et ses personnages m\\u00e9morables. Le joueur incarne V, un mercenaire en qu\\u00eate d\\\\\'immortalit\\u00e9 dans la ville dystopique de Night City. La qualit\\u00e9 de l\\\\\'\\u00e9criture, alli\\u00e9e \\u00e0 des performances vocales exceptionnelles, notamment celle de Keanu Reeves dans le r\\u00f4le de Johnny Silverhand, immerge compl\\u00e8tement le joueur. Les qu\\u00eates principales et secondaires sont riches en choix moraux et en cons\\u00e9quences, offrant une exp\\u00e9rience de jeu profond\\u00e9ment personnalis\\u00e9e.\"],[\"image\",[{\"file\":\"C:\\\\Users\\\\Balthazar\\\\AppData\\\\Local\\\\Temp\\\\php239B.tmp\"},\"Night City est de plus en plus r\\u00e9aliste au fil des mises \\u00e0 jour\",\"Photo de Nightcity\",\"-1\"]],[\"part-title\",\"Un monde ouvert \\u00e9poustouflant\"],[\"corpus\",\"Night City, avec ses n\\u00e9ons scintillants et ses quartiers diversifi\\u00e9s, est un personnage \\u00e0 part enti\\u00e8re dans Cyberpunk 2077. Chaque coin de rue, chaque gratte-ciel et chaque ruelle raconte une histoire. L\\\\\'attention aux d\\u00e9tails est remarquable, rendant la ville vivante et cr\\u00e9dible. Les joueurs peuvent passer des heures \\u00e0 explorer, d\\u00e9couvrir des secrets et interagir avec ses habitants vari\\u00e9s, chacun ayant une vie propre et des histoires uniques.\"],[\"part-title\",\"Des am\\u00e9liorations techniques significatives\"],[\"corpus\",\"Le lancement chaotique de Cyberpunk 2077 a \\u00e9t\\u00e9 marqu\\u00e9 par de nombreux bugs et probl\\u00e8mes de performance. Cependant, CD Projekt Red a montr\\u00e9 un engagement sans faille \\u00e0 am\\u00e9liorer le jeu. Les nombreuses mises \\u00e0 jour ont corrig\\u00e9 la plupart des probl\\u00e8mes techniques, offrant une exp\\u00e9rience fluide et stable.\"],[\"image\",[{\"file\":\"C:\\\\Users\\\\Balthazar\\\\AppData\\\\Local\\\\Temp\\\\php239C.tmp\"},\"Les bugs \\u00e9taient omnipr\\u00e9sents lors de la sortie du jeu\",\"Personnage bugg\\u00e9 dans Cyberpunk 2077\",\"-1\"]],[\"corpus\",\"Les graphismes, d\\u00e9j\\u00e0 impressionnants, ont \\u00e9t\\u00e9 optimis\\u00e9s, et les temps de chargement r\\u00e9duits, permettant aux joueurs de se plonger sans interruption dans l\\\\\'univers futuriste du jeu.\"],[\"image\",[{\"file\":\"C:\\\\Users\\\\Balthazar\\\\AppData\\\\Local\\\\Temp\\\\php23AD.tmp\"},\"Le r\\u00e9alisme du jeu est bluffant\",\"V sur sa moto\",\"-1\"]],[\"part-title\",\"Conclusion\"],[\"corpus\",\"Cyberpunk 2077, apr\\u00e8s un d\\u00e9but difficile, a su se r\\u00e9inventer et corriger ses erreurs pour devenir une v\\u00e9ritable \\u0153uvre d\\\\\'art vid\\u00e9oludique. Sa narration immersive, son monde ouvert saisissant et ses am\\u00e9liorations techniques en font un incontournable pour tout amateur de jeux de r\\u00f4le. CD Projekt Red a prouv\\u00e9 que, malgr\\u00e9 des d\\u00e9buts chaotiques, il est possible de redresser la barre et de livrer une exp\\u00e9rience de jeu exceptionnelle.\"]]', 92, '2024-05-20', 3, 1, '[[\"Narration immersive et profonde\",\"Monde ouvert riche et d\\u00e9taill\\u00e9\",\"Performances et graphismes optimis\\u00e9s\"],[\"D\\u00e9but chaotique avec de nombreux bugs\",\"Probl\\u00e8mes techniques initiaux\"]]'),
(2, 'Une ascension vers la perfection vidéoludique', 'Une critique extrêmement positive du jeu Celeste, louant ses nombreux aspects réussis.', '[[\"intro\",\"Celeste, d\\u00e9velopp\\u00e9 par Matt Makes Games, est un chef-d\\\\\'\\u0153uvre du jeu de plateforme ind\\u00e9pendant. Lanc\\u00e9 en 2018, ce jeu a rapidement conquis le c\\u0153ur des joueurs et des critiques par son gameplay impeccable, sa narration touchante et sa direction artistique sublime. Voici pourquoi Celeste m\\u00e9rite tous les \\u00e9loges qu\\\\\'il re\\u00e7oit.\"],[\"part-title\",\"Un gameplay de plateforme exceptionnel\"],[\"corpus\",\"Celeste brille par son gameplay pr\\u00e9cis et exigeant. Les commandes sont intuitives, r\\u00e9pondant au doigt et \\u00e0 l\\\\\'\\u0153il, ce qui est essentiel pour un jeu de plateforme o\\u00f9 la moindre erreur peut \\u00eatre fatale. Les niveaux sont ing\\u00e9nieusement con\\u00e7us, offrant un d\\u00e9fi constant sans jamais devenir injustes. Chaque mort est une le\\u00e7on, chaque obstacle surmont\\u00e9 est une victoire gratifiante. Les m\\u00e9caniques, simples \\u00e0 premi\\u00e8re vue, se combinent de mani\\u00e8re complexe pour offrir une exp\\u00e9rience de jeu enrichissante.\"],[\"image\",[{\"file\":\"C:\\\\Users\\\\Balthazar\\\\AppData\\\\Local\\\\Temp\\\\phpA87C.tmp\"},\"Le gameplay apporte quelque chose de nouveau au genre du plateformer qui commen\\u00e7ait \\u00e0 s\\\\\'essoufler\",\"Jeu celeste dans une grotte\",\"-1\"]],[\"part-title\",\"Une histoire poignante et bien int\\u00e9gr\\u00e9e\"],[\"corpus\",\"Au-del\\u00e0 de son gameplay, Celeste raconte l\\\\\'histoire touchante de Madeline, une jeune femme d\\u00e9termin\\u00e9e \\u00e0 gravir la montagne \\u00e9ponyme tout en luttant contre ses d\\u00e9mons int\\u00e9rieurs. La narration est int\\u00e9gr\\u00e9e de mani\\u00e8re fluide au gameplay, chaque niveau et chaque interaction renfor\\u00e7ant le th\\u00e8me de la lutte personnelle et de la r\\u00e9silience. Les dialogues sont bien \\u00e9crits et les personnages, bien que peu nombreux, sont profond\\u00e9ment attachants. Cette histoire de d\\u00e9passement de soi r\\u00e9sonne avec de nombreux joueurs, ajoutant une couche de profondeur \\u00e9motionnelle au jeu.\"],[\"part-title\",\"Une direction artistique et musicale sublime\"],[\"corpus\",\"L\\\\\'esth\\u00e9tique de Celeste est un autre de ses points forts. Les graphismes en pixel art sont magnifiquement d\\u00e9taill\\u00e9s et color\\u00e9s, cr\\u00e9ant des environnements vari\\u00e9s et m\\u00e9morables. Chaque niveau a son propre style visuel, enrichissant l\\\\\'exp\\u00e9rience de jeu. La bande sonore, compos\\u00e9e par Lena Raine, est tout simplement magnifique. Les m\\u00e9lodies accompagnent parfaitement l\\\\\'action \\u00e0 l\\\\\'\\u00e9cran, ajoutant une dimension \\u00e9motionnelle et immersive au jeu. La musique de Celeste est \\u00e0 la fois apaisante et \\u00e9nergisante, soulignant parfaitement les moments cl\\u00e9s du jeu.\"],[\"part-title\",\"Conclusion\"],[\"corpus\",\"Celeste est un exemple \\u00e9clatant de ce que le jeu ind\\u00e9pendant peut offrir de mieux. Son gameplay exigeant mais juste, sa narration poignante et sa direction artistique en font un jeu inoubliable. Il s\\\\\'agit d\\\\\'une aventure qui marque les esprits et les c\\u0153urs, offrant une exp\\u00e9rience de jeu \\u00e0 la fois technique et \\u00e9motionnelle. Celeste est un must pour tout amateur de jeux de plateforme et de r\\u00e9cits introspectifs.\"]]', 99, '2024-05-20', 3, 2, '[[\"Gameplay pr\\u00e9cis et gratifiant\",\"Narration \\u00e9motive et bien int\\u00e9gr\\u00e9e\",\"Direction artistique magnifique\",\"Bande sonore exceptionnelle\"],[\"Quelques sections tr\\u00e8s difficiles peuvent \\u00eatre frustrantes pour les joueurs casus\"]]'),
(3, 'Une suite controversée à un chef-d\\\'œuvre', 'Une critique mitigée de The Last of Us Part II, comparant ses forces et faiblesses par rapport au pr', '[[\"intro\",\"The Last of Us Part II, d\\u00e9velopp\\u00e9 par Naughty Dog et sorti en 2020, a suscit\\u00e9 de nombreuses discussions et d\\u00e9bats parmi les fans de la s\\u00e9rie. Si le jeu brille par ses graphismes \\u00e9poustouflants et sa jouabilit\\u00e9 am\\u00e9lior\\u00e9e, il a \\u00e9galement divis\\u00e9 les joueurs par ses choix narratifs audacieux. Compar\\u00e9 \\u00e0 l\\\\\'impact monumental du premier opus, The Last of Us Part II est un jeu qui, bien qu\\\\\'ambitieux, ne parvient pas toujours \\u00e0 satisfaire les attentes de tous.\"],[\"part-title\",\"Graphismes et jouabilit\\u00e9 au sommet\"],[\"corpus\",\"Sur le plan technique, The Last of Us Part II est ind\\u00e9niablement impressionnant. Les graphismes sont parmi les plus beaux jamais vus sur PlayStation 4, avec des environnements d\\u00e9taill\\u00e9s, des animations r\\u00e9alistes et une attention m\\u00e9ticuleuse aux d\\u00e9tails. La jouabilit\\u00e9 a \\u00e9t\\u00e9 grandement am\\u00e9lior\\u00e9e, offrant des combats plus fluides, une IA ennemie plus intelligente et des m\\u00e9canismes de furtivit\\u00e9 plus raffin\\u00e9s. L\\\\\'exploration est enrichissante, avec de nombreux secrets \\u00e0 d\\u00e9couvrir et des environnements vari\\u00e9s \\u00e0 parcourir.\"],[\"part-title\",\"Des choix narratifs audacieux et controvers\\u00e9s\"],[\"corpus\",\"L\\\\\'histoire de The Last of Us Part II prend des risques consid\\u00e9rables en brisant les attentes des joueurs. Les d\\u00e9cisions narratives, telles que le traitement des personnages principaux et les changements de perspective, ont divis\\u00e9 les fans. Certains ont salu\\u00e9 ces choix audacieux comme une \\u00e9volution n\\u00e9cessaire et courageuse, tandis que d\\\\\'autres les ont per\\u00e7us comme une trahison des th\\u00e8mes et des personnages \\u00e9tablis dans le premier jeu. Cette polarisation a fortement impact\\u00e9 la r\\u00e9ception du jeu, cr\\u00e9ant une exp\\u00e9rience \\u00e9motionnellement intense mais parfois d\\u00e9routante.\"],[\"image\",[{\"file\":\"C:\\\\Users\\\\Balthazar\\\\AppData\\\\Local\\\\Temp\\\\php74C.tmp\"},\"Des personnages attachants\",\"Ellie et Joel devant des immeubles\",\"-1\"]],[\"part-title\",\"Une profondeur \\u00e9motionnelle in\\u00e9gal\\u00e9e\"],[\"corpus\",\"Malgr\\u00e9 les controverses, The Last of Us Part II parvient \\u00e0 capturer une profondeur \\u00e9motionnelle rarement vue dans les jeux vid\\u00e9o. Les relations entre les personnages sont explor\\u00e9es avec une intensit\\u00e9 brute et sans concession. Les th\\u00e8mes de vengeance, de perte et de r\\u00e9demption sont trait\\u00e9s de mani\\u00e8re poignante, souvent bouleversante. Les performances des acteurs, notamment Ashley Johnson (Ellie) et Laura Bailey (Abby), ajoutent une dimension suppl\\u00e9mentaire \\u00e0 cette profondeur \\u00e9motionnelle, rendant les moments cl\\u00e9s du jeu encore plus puissants.\"],[\"part-title\",\"Conclusion\"],[\"corpus\",\"The Last of Us Part II est un jeu qui ose prendre des risques, tant sur le plan narratif que technique. Si certains aspects, comme les graphismes et la jouabilit\\u00e9, surpassent clairement ceux du premier opus, les choix narratifs divisent profond\\u00e9ment les joueurs. Cette suite, bien que techniquement brillante, n\\\\\'atteint pas toujours l\\\\\'\\u00e9quilibre parfait entre innovation et respect de l\\\\\'h\\u00e9ritage du premier jeu. Malgr\\u00e9 cela, elle reste une exp\\u00e9rience incontournable pour ceux qui cherchent une aventure \\u00e9motionnellement intense et techniquement superbe.\"]]', 65, '2024-05-20', 3, 3, '[[\"Graphismes \\u00e9poustouflants\",\"Jouabilit\\u00e9 am\\u00e9lior\\u00e9e et fluide\"],[\"Choix narratifs divisifs\",\"Perte de certains th\\u00e8mes du premier jeu\",\"Exp\\u00e9rience parfois d\\u00e9routante\"]]'),
(4, 'Une épopée western inoubliable', 'Une critique positive de Red Dead Redemption, célébrant ses nombreuses qualités.', '[[\"intro\",\"Sorti en 2010 par Rockstar Games, Red Dead Redemption est devenu un classique instantan\\u00e9 du jeu vid\\u00e9o. Plong\\u00e9 dans l\\\\\'\\u00e8re de la fin du Far West, ce jeu d\\\\\'action-aventure en monde ouvert offre une exp\\u00e9rience narrative et ludique exceptionnelle. Voici pourquoi Red Dead Redemption est souvent consid\\u00e9r\\u00e9 comme un chef-d\\\\\'\\u0153uvre.\"],[\"part-title\",\"Un monde ouvert vivant et authentique\"],[\"image\",[{\"file\":\"C:\\\\Users\\\\Balthazar\\\\AppData\\\\Local\\\\Temp\\\\php9698.tmp\"},\"Les paysages de RDR2 sont incroyables tout simplement\",\"Paysage de montagne\",\"-1\"]],[\"corpus\",\"Red Dead Redemption se distingue par son monde ouvert vaste et d\\u00e9taill\\u00e9, \\u00e9voquant avec brio l\\\\\'atmosph\\u00e8re du Far West am\\u00e9ricain. Des d\\u00e9serts arides aux villes poussi\\u00e9reuses, chaque recoin de ce monde semble vivant. Les joueurs peuvent interagir avec une multitude de personnages non-joueurs, chacun ayant sa propre routine et histoire. Les \\u00e9v\\u00e9nements al\\u00e9atoires et les qu\\u00eates secondaires enrichissent l\\\\\'immersion, donnant l\\\\\'impression de vivre dans un v\\u00e9ritable western.\"],[\"part-title\",\"Une narration captivante et des personnages m\\u00e9morables\"],[\"corpus\",\"Au c\\u0153ur de Red Dead Redemption se trouve une histoire poignante centr\\u00e9e sur John Marston, un ancien hors-la-loi forc\\u00e9 de traquer ses anciens compagnons pour sauver sa famille. La narration est magistralement \\u00e9crite, m\\u00ealant drame, action et moments de r\\u00e9flexion sur la r\\u00e9demption et la moralit\\u00e9. Les personnages, qu\\\\\'ils soient alli\\u00e9s ou antagonistes, sont richement d\\u00e9velopp\\u00e9s et cr\\u00e9dibles, rendant chaque interaction significative.\"],[\"part-title\",\"Une jouabilit\\u00e9 raffin\\u00e9e et vari\\u00e9e\"],[\"corpus\",\"La jouabilit\\u00e9 de Red Dead Redemption est \\u00e0 la fois vari\\u00e9e et raffin\\u00e9e. Les m\\u00e9caniques de tir sont fluides et intuitives, les s\\u00e9quences de chevauch\\u00e9e \\u00e0 travers les vastes paysages sont exaltantes, et les activit\\u00e9s annexes comme la chasse, le poker et les duels ajoutent de la profondeur au gameplay. Les missions principales et secondaires sont bien con\\u00e7ues, offrant un \\u00e9quilibre parfait entre action et exploration.\"],[\"image\",[{\"file\":\"C:\\\\Users\\\\Balthazar\\\\AppData\\\\Local\\\\Temp\\\\php9699.tmp\"},\"Des armes tr\\u00e8s vari\\u00e9es\",\"Arthur Morgan qui tire \\u00e0 l\\\\\'arc\",\"-1\"]],[\"part-title\",\"Conclusion\"],[\"corpus\",\"Red Dead Redemption n\\\\\'est pas seulement un jeu vid\\u00e9o, c\\\\\'est une immersion totale dans l\\\\\'univers du Far West. Avec son monde ouvert d\\u00e9taill\\u00e9, sa narration captivante et sa jouabilit\\u00e9 vari\\u00e9e, il offre une exp\\u00e9rience de jeu compl\\u00e8te et m\\u00e9morable. Ce chef-d\\\\\'\\u0153uvre de Rockstar Games reste une r\\u00e9f\\u00e9rence incontournable pour tous les amateurs de jeux d\\\\\'action-aventure et de westerns.\"]]', 85, '2024-05-20', 3, 5, '[[\"Monde ouvert vivant et d\\u00e9taill\\u00e9\",\"Narration captivante\",\"Personnages m\\u00e9morables\",\"Jouabilit\\u00e9 vari\\u00e9e et raffin\\u00e9e\"],[\"Quelques missions r\\u00e9p\\u00e9titives\",\"IA ennemie parfois pr\\u00e9visible\"]]'),
(5, 'Une épopée fantastique d\\\'une ampleur inégalée', 'Une critique extrêmement positive du jeu The Witcher 3: Wild Hunt, mettant en lumière ses nombreux a', '[[\"intro\",\"The Witcher 3: Wild Hunt, d\\u00e9velopp\\u00e9 par CD Projekt Red et sorti en 2015, est souvent cit\\u00e9 comme l\\\\\'un des meilleurs jeux de tous les temps. Plongeant les joueurs dans un monde fantastique riche en d\\u00e9tails et en profondeur, ce jeu de r\\u00f4le en monde ouvert offre une exp\\u00e9rience incomparable. Voici pourquoi The Witcher 3: Wild Hunt est une v\\u00e9ritable \\u0153uvre d\\\\\'art vid\\u00e9oludique.\"],[\"part-title\",\"Un monde ouvert vivant et immersif\"],[\"corpus\",\"L\\\\\'un des points forts de The Witcher 3 est son monde ouvert incroyablement vivant et immersif. L\\\\\'univers de The Witcher regorge de d\\u00e9tails, des vastes plaines aux sombres for\\u00eats, chaque r\\u00e9gion respire la vie. Les villes grouillent d\\\\\'activit\\u00e9, les habitants vaquent \\u00e0 leurs occupations, et les paysages sont \\u00e0 couper le souffle. Explorer ce monde est une aventure en soi, avec des d\\u00e9couvertes constantes et des qu\\u00eates secondaires engageantes.\"],[\"part-title\",\"Une histoire \\u00e9pique et des qu\\u00eates captivantes\"],[\"corpus\",\"L\\\\\'histoire de Geralt de Riv, le sorceleur, est une \\u00e9pop\\u00e9e \\u00e9pique qui m\\u00e9lange politique, magie, et drame personnel. Les choix du joueur ont un r\\u00e9el impact sur le d\\u00e9roulement de l\\\\\'histoire, offrant une exp\\u00e9rience narrative profond\\u00e9ment personnalis\\u00e9e. Les qu\\u00eates, qu\\\\\'elles soient principales ou secondaires, sont toutes soigneusement \\u00e9crites et r\\u00e9alis\\u00e9es, avec des personnages complexes et des situations moralement ambigu\\u00ebs. Chaque d\\u00e9cision compte, et les cons\\u00e9quences peuvent \\u00eatre inattendues et significatives.\"],[\"part-title\",\"Un gameplay riche et vari\\u00e9\"],[\"corpus\",\"The Witcher 3 offre un gameplay riche et vari\\u00e9, m\\u00ealant combats dynamiques, alchimie, et exploration. Les combats sont fluides et strat\\u00e9giques, avec une vari\\u00e9t\\u00e9 d\\\\\'ennemis n\\u00e9cessitant diff\\u00e9rentes approches tactiques. L\\\\\'alchimie et la cr\\u00e9ation d\\\\\'objets ajoutent une dimension suppl\\u00e9mentaire \\u00e0 la progression, permettant aux joueurs de personnaliser leur style de jeu. Les activit\\u00e9s annexes, telles que la chasse aux monstres et la collecte de tr\\u00e9sors, prolongent la dur\\u00e9e de vie du jeu de mani\\u00e8re significative.\"],[\"part-title\",\"Conclusion\"],[\"corpus\",\"The Witcher 3: Wild Hunt est bien plus qu\\\\\'un simple jeu vid\\u00e9o, c\\\\\'est une exp\\u00e9rience immersive et inoubliable. Avec son monde ouvert vivant, son histoire \\u00e9pique et ses m\\u00e9caniques de jeu riches, il captive les joueurs d\\u00e8s les premiers instants et ne les l\\u00e2che plus. CD Projekt Red a cr\\u00e9\\u00e9 une v\\u00e9ritable \\u0153uvre d\\\\\'art vid\\u00e9oludique, un chef-d\\\\\'\\u0153uvre qui restera grav\\u00e9 dans la m\\u00e9moire des joueurs pendant des ann\\u00e9es.\"]]', 90, '2024-05-20', 1, 6, '[[\"Monde ouvert vivant et immersif\",\"Histoire \\u00e9pique et qu\\u00eates captivantes\",\"Gameplay riche et vari\\u00e9\",\"Impact des choix du joueur sur le d\\u00e9roulement de l\\\\\'histoire\"],[\"Quelques probl\\u00e8mes techniques au lancement (corrig\\u00e9s par des mises \\u00e0 jour)\",\"Courbe d\\\\\'apprentissage abrupte pour certains joueurs\"]]'),
(6, 'Une aventure ambitieuse avec quelques faiblesses notables', 'Une critique mitigée de The Legend of Zelda: Breath of the Wild, soulignant ses aspects décevants ma', '[[\"intro\",\"The Legend of Zelda: Breath of the Wild, sorti en 2017 sur la console Nintendo Switch, a \\u00e9t\\u00e9 acclam\\u00e9 par de nombreux joueurs et critiques pour son approche novatrice du genre du jeu d\\\\\'aventure en monde ouvert. Cependant, malgr\\u00e9 ses nombreuses qualit\\u00e9s, le jeu pr\\u00e9sente \\u00e9galement certains d\\u00e9fauts qui m\\u00e9ritent d\\\\\'\\u00eatre discut\\u00e9s.\"],[\"part-title\",\"Une exploration riche et immersive\"],[\"corpus\",\"L\\\\\'un des points forts de Breath of the Wild est son monde ouvert vaste et diversifi\\u00e9, encourageant l\\\\\'exploration et la d\\u00e9couverte. Chaque recoin de la carte regorge de secrets \\u00e0 d\\u00e9couvrir, des sanctuaires myst\\u00e9rieux aux paysages majestueux. Les m\\u00e9caniques de grimpe et de paravoile ajoutent une verticalit\\u00e9 passionnante \\u00e0 l\\\\\'exploration, offrant une libert\\u00e9 sans pr\\u00e9c\\u00e9dent aux joueurs. Cette dimension immersive est ind\\u00e9niablement l\\\\\'une des r\\u00e9ussites du jeu.\"],[\"image\",[{\"file\":\"C:\\\\Users\\\\Balthazar\\\\AppData\\\\Local\\\\Temp\\\\php675A.tmp\"},\"La jolie for\\u00eat du Bois des Esprits\",\"For\\u00eat\",\"-1\"]],[\"image\",[{\"file\":\"C:\\\\Users\\\\Balthazar\\\\AppData\\\\Local\\\\Temp\\\\php677B.tmp\"},\"Le vieil homme sera votre premi\\u00e8re rencontre\",\"Vieil Homme\",\"-1\"]],[\"part-title\",\"Un sc\\u00e9nario et des personnages sous-d\\u00e9velopp\\u00e9s\"],[\"corpus\",\"Malgr\\u00e9 son vaste monde ouvert, Breath of the Wild souffre d\\\\\'un sc\\u00e9nario et de personnages relativement sous-d\\u00e9velopp\\u00e9s. L\\\\\'histoire principale est mince, manquant de la profondeur narrative que l\\\\\'on pourrait attendre d\\\\\'un jeu de cette envergure. De m\\u00eame, les personnages, bien que charismatiques, manquent souvent de d\\u00e9veloppement, ce qui rend difficile pour les joueurs de s\\\\\'attacher \\u00e0 eux \\u00e9motionnellement. Cette lacune narrative est particuli\\u00e8rement d\\u00e9cevante dans un jeu de la franchise Zelda, qui est souvent salu\\u00e9 pour ses r\\u00e9cits captivants.\"],[\"part-title\",\"R\\u00e9p\\u00e9titivit\\u00e9 des sanctuaires et des qu\\u00eates secondaires\"],[\"corpus\",\"Une autre critique fr\\u00e9quente adress\\u00e9e \\u00e0 Breath of the Wild est la r\\u00e9p\\u00e9titivit\\u00e9 des sanctuaires et des qu\\u00eates secondaires. Bien que ces \\u00e9l\\u00e9ments ajoutent de la vari\\u00e9t\\u00e9 au jeu, leur conception souvent r\\u00e9p\\u00e9titive peut devenir lassante \\u00e0 la longue. Les joueurs peuvent se retrouver \\u00e0 effectuer des t\\u00e2ches similaires \\u00e0 plusieurs reprises, ce qui diminue l\\\\\'impact de l\\\\\'exploration et de la d\\u00e9couverte.\"],[\"part-title\",\"Conclusion\"],[\"corpus\",\"The Legend of Zelda: Breath of the Wild est un jeu ambitieux qui repousse les limites du genre du jeu d\\\\\'aventure en monde ouvert. Cependant, malgr\\u00e9 ses innovations et son monde captivant, le jeu souffre de certaines lacunes notables, notamment un sc\\u00e9nario sous-d\\u00e9velopp\\u00e9 et une r\\u00e9p\\u00e9titivit\\u00e9 des qu\\u00eates. Bien qu\\\\\'il reste une exp\\u00e9rience incontournable pour les fans de la franchise Zelda et les amateurs de jeux d\\\\\'aventure, il ne parvient pas \\u00e0 atteindre le statut de chef-d\\\\\'\\u0153uvre absolu pour certains joueurs.\"]]', 15, '2024-05-20', 1, 4, '[[\"Exploration riche et immersive\",\"M\\u00e9caniques de jeu novatrices\"],[\"Sc\\u00e9nario sous-d\\u00e9velopp\\u00e9\",\"Personnages manquant de profondeur\",\"R\\u00e9p\\u00e9titivit\\u00e9 des sanctuaires et des qu\\u00eates secondaires\"]]');

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
  `hoursPlayed` int(11) NOT NULL,
  `authorID_comment` bigint(20) UNSIGNED NOT NULL,
  `articleID_comment` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `title`, `content`, `rating`, `creationDate`, `hoursPlayed`, `authorID_comment`, `articleID_comment`) VALUES
(3, 'Super jeu, super critique aussi', 'Je suis complètement d\'accord avec le rédacteur. J\'avais arrêté de jouer au jeu à cause des bugs mais je lui ai donné une seconde chance à la sortie de l\'animé Edgrunners, et j\'ai kiffé', 85, '2024-05-20 23:25:49', 82, 1, 1),
(4, 'Trop dur pour moi', 'J\'ai même pas réussi le premier niveau, j\'ai bien vite abandonné. C\'est une honte d\'exclure des joueurs comme ça', 18, '2024-05-20 23:27:15', 2, 1, 2),
(5, 'Mon jeu préféré !!!', 'Red Dead Redemption est vraiment un jeu qui marque les esprits. L\'univers immersif du Far West, les personnages complexes, l\'histoire riche en rebondissements... tout contribue à créer une expérience de jeu inoubliable. Chaque session de jeu est une aventure à part entière, où l\'on peut se perdre pendant des heures à explorer les vastes étendues de ce monde ouvert magnifiquement réalisé. Rockstar Games a vraiment frappé fort avec ce titre, et même des années après sa sortie, il reste un incontournable pour tous les amateurs de jeux d\'action-aventure.', 100, '2024-05-20 23:28:41', 280, 1, 4),
(6, 'Meilleur que le premier opus', 'Complètement à l\'opposé de l\'article, je préfère le deuxième, j\'ai bien plus été marqué par son histoire !', 85, '2024-05-20 23:30:19', 102, 1, 3),
(7, 'Le meilleur jeu de l\'histoire !!', 'The Witcher 3: Wild Hunt est tout simplement le chef-d\'œuvre ultime du jeu vidéo, et pour moi, c\'est bien plus qu\'un simple jeu. C\'est une expérience de vie. L\'immensité de son monde ouvert, la profondeur de son histoire, la complexité de ses quêtes... tout est absolument époustouflant. Chaque personnage, chaque dialogue, chaque décision a un poids énorme, et cela crée une immersion totale. Je suis tombé amoureux de cet univers dès les premières minutes de jeu, et depuis, aucun autre jeu n\'a réussi à capturer mon imagination de la même manière.', 0, '2024-05-20 23:32:00', 150, 3, 5),
(8, 'Une vraie révolution', 'L\'exploration sans limites, les puzzles ingénieux des sanctuaires, et la beauté époustouflante de son monde ouvert font de chaque moment une véritable aventure. Bien que je ne puisse pas le qualifier de meilleur jeu de tous les temps, il reste néanmoins mon jeu préféré pour son ambiance magique et son gameplay innovant. Breath of the Wild a su capturer mon imagination comme aucun autre jeu ne l\'a fait, et c\'est une expérience que je chérirai toujours', 90, '2024-05-20 23:32:57', 61, 3, 6),
(9, 'Trop de bugs', 'Trop de bugs pour moi, flemme de continuer (je joue sur ps4 aussi)', 42, '2024-05-20 23:34:02', 20, 2, 1),
(10, 'Super jeu, je l\'ai bien tryhard', 'J\'ai fait tous les B side, un vrai chef d\'oeuvre', 90, '2024-05-20 23:35:02', 410, 2, 2),
(11, 'J\'ai adoré moi !!', 'Mon zelda préféré sans hésiter. J\'ai même été un peu déçu par Totk', 95, '2024-05-20 23:38:07', 180, 2, 6),
(12, 'Un peu violent je trouve', 'Bien mais beaucoup trop violent. On peut bruler les pnj c\'est quoi ça !!??? Bon après c\'est PEGI 18 c\'est de ma faute', 60, '2024-05-20 23:39:15', 49, 2, 4);

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
(1, 'Cyberpunk 2077', '2020-12-10', 59.99, 'Le jeu suit l\'histoire de V, mercenaire en pleine ascension dans un monde de guerriers de rue cyber améliorés, netrunners experts en tech et life-hackers issus des entreprises privées. L\'univers du jeu s\'est d\'ailleurs récemment étendu puisqu\'une série Spin off diffusée sur Netflix, Cyberpunk Edgerunners, a vu le jour.'),
(2, 'Celeste', '2018-01-24', 19.99, 'Dans Celeste, le joueur incarne Madeline, une jeune femme qui tente de gravir le mont Celeste. Au cours de son ascension, il est révélé qu\'elle souffre d\'une sévère forme d\'anxiété et de dépression, impliquant qu\'elle doit affronter ses angoisses et son mal-être intérieur pour parvenir au sommet de la montagne.'),
(3, 'The Last of Us Part II', '2020-06-19', 39.99, 'Cinq ans après les événements du premier opus, Ellie et Joel s\'installent dans le Wyoming. La vie en communauté leur apporte une certaine stabilité, malgré la menace que représentent les infectés. Quand un violent incident vient troubler cette paix, Ellie entame une implacable quête de justice.'),
(4, 'The Legend of Zelda : Breath of the Wild', '2017-03-03', 59.99, 'Breath of the Wild propose d\'incarner Link, amnésique, réveillé après un long sommeil d\'une centaine d\'années par une mystérieuse voix qui le guide afin d\'éliminer Ganon, « Le Fléau », et restaurer la paix dans le royaume d\'Hyrule.'),
(5, 'Red Dead Redemption II', '2018-10-26', 49.99, 'L\'histoire se déroule en 1899, dans une représentation fictive des États-Unis, et suit les exploits d\'Arthur Morgan, un hors-la-loi et membre du gang Van der Linde, qui doit faire face au déclin de l\'Ouest tout en tentant de survivre contre les forces gouvernementales, gangs rivaux et autres adversaires.'),
(6, 'The Witcher III : Wild Hunt', '2015-05-18', 29.99, 'Après la mort de ses parents et de sa grand-mère, son pays est ravagé par la guerre. Geralt et Yennefer la prennent alors sous leur aile, à Kaer Morhen, où elle se forme pour devenir sorceleuse. Elle a un fort potentiel magique, grâce à ses origines elfiques. Dans The Witcher 3, Geralt est à sa recherche.');

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
(1, 'FPS'),
(1, 'Open world'),
(1, 'RPG'),
(2, 'Platformer'),
(3, 'Horror'),
(3, 'Survival'),
(3, 'TPS'),
(4, 'Open world'),
(4, 'RPG'),
(5, 'Open world'),
(5, 'RPG'),
(6, 'Open world'),
(6, 'RPG');

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
('PS5', 1),
('Windows', 1),
('Xbox', 1),
('PS5', 2),
('Switch', 2),
('Windows', 2),
('Xbox', 2),
('PC', 3),
('PS5', 3),
('Switch', 4),
('PS5', 5),
('Windows', 5),
('Xbox', 5),
('PC', 6),
('PS5', 6),
('Windows', 6),
('Xbox', 6);

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
('admin', '$2y$10$rz0Hf9p3qc2S7.GnXYi41ukwx14RUMD6.NkoC7k1ZXcF2inq3Lm2W', 'admin@gmail.com', 'Administrateur', 'Mister', 'Admin', '1970-01-01', 'Je suis l\'administrateur de ce site. Je peux rédiger et modifier des articles. Je peux aussi modifier le rôle des utilisateurs et également supprimer leurs commentaires.', 1, 4, 2, '2024-05-20 23:50:13', '2024-05-20 22:12:59'),
('pnj2008', '$2y$10$msD4gJWokkAzfuaSQiAy6.t6ZCpX0C3V1Oc3Yg4hZoY9MWAYrpIkG', 'pnj2008@gmail.com', 'Utilisateur', 'Doe', 'John', '2008-12-02', 'Je suis un simple utilisateur de GameView. Je peux consulter les articles et les commenter. Par contre, si je commente suffisamment les articles, je vais peut-être passer rédacteur !', 2, 4, 0, '2024-05-20 23:43:33', '2024-05-20 22:23:28'),
('the_writer', '$2y$10$Kf9MAa2spyu/kt.G3JjLoukWDtjed4ko7DV2ru4tRpjCb2RAn.ylW', 'writer@gmail.com', 'Éditeur', 'London', 'Jack', '1957-07-28', 'Je suis un rédacteur d\'articles. Je peux créer et modifier des articles. Par contre je ne suis pas administrateur donc je ne peux pas faire de modération', 3, 2, 4, '2024-05-20 23:33:13', '2024-05-20 22:24:25');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `game`
--
ALTER TABLE `game`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
