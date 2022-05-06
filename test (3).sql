-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 06 mai 2022 à 11:53
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `idcommande` int(11) NOT NULL AUTO_INCREMENT,
  `idmenu` int(11) NOT NULL,
  `idutilisateurs` int(11) NOT NULL,
  `datecommande` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `quantite` varchar(255) NOT NULL,
  PRIMARY KEY (`idcommande`),
  KEY `idmenu` (`idmenu`,`idutilisateurs`)
) ENGINE=MyISAM AUTO_INCREMENT=968 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commandefinal`
--

DROP TABLE IF EXISTS `commandefinal`;
CREATE TABLE IF NOT EXISTS `commandefinal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcommande` int(11) NOT NULL,
  `idmenu` int(11) NOT NULL,
  `idutilisateurs` int(11) NOT NULL,
  `quantite` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idcommande` (`idcommande`),
  KEY `idmenu` (`idmenu`),
  KEY `idutilisateurs` (`idutilisateurs`),
  KEY `quantite` (`quantite`)
) ENGINE=MyISAM AUTO_INCREMENT=442 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `img_dir` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `prix` int(255) NOT NULL,
  `taille` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `type` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `ingredient` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=132 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `name`, `img_dir`, `description`, `prix`, `taille`, `type`, `img2`, `ingredient`) VALUES
(9, 'Pizza Pepperoni', 'Images/Menupizza pepperoni.jpg', 'Le pepperoni est un salami épicé d\'origine américaine. En Italie, on l\'appelle salame piccante (salami piquant). C\'est l\'un des ingrédients les plus courants des pizzas aux États-Unis et au Canada, qui y représente souvent plus de 30 % de la garniture moyenne.\r\n\r\nLa pizzeria Horly\'s Pizza, situé dans le centre ville du Havre 76, et plus précisément Rue Augustin Normand, vous propose plus de 24 pizzas à déguster sur place ou à se faire livrer. Parmi les plus commandées, vous trouverez la pizza Pepperoni qui est faite sur une base tomate. Vous trouverez à l\'intérieur de cette pizza :\r\n\r\nBase Tomate\r\nMerguez\r\nMozzarella\r\nPepperonni\r\nOignons, poivrons\r\nTomate confite\r\n\r\nCette pizza vous est proposée en taille Large au prix de 12€ ou en taille enfant au prix de 5€.\r\n', 5, 'M', 'Pizzas', 'Images/pizza_peperoni-598x400.jpg', 'pate a pizza fraiche, peperonie, fromage , huile d\'olive'),
(15, 'Gratin', 'Images/Menugratin.jpg', 'Un gratin est une préparation qui est cuite au four ou dont une partie de la cuisson se passe au four, en utilisant plus particulièrement le gril, ou à la salamandre, de telle sorte qu\'il se forme en surface de la préparation une croûte plus ou moins légère et dorée.\r\n\r\nLe gratin ne suppose pas nécessairement l\'adjonction d\'un quelconque ingrédient pour former la croûte, et, par exemple, la recette traditionnelle du gratin dauphinois ne suppose pas d\'ajout. Il est cependant très commun, pour accentuer la croûte ou la rendre meilleure ou plus épaisse, de saupoudrer le plat que l\'on souhaite gratiner de fromage râpé ou de chapelure.', 8, '', 'francais', '', ''),
(14, 'hamburger de bœuf', 'Images/Menuhumburgeur.jpg', 'Un hamburger (initialement hamburg-er, soit « galette de Hambourg » en allemand, et non pas « galette de jambon » en anglais) ou par aphérèse burger, est un sandwich d\'origine allemande, composé de deux pains de forme ronde (bun) généralement garnis de steak haché (généralement du bœuf) et de crudités, salade, tomate, oignon, cornichon (pickles), et de sauce…\r\n\r\nCe plat célèbre dans le monde entier est, depuis les années 1950, un des emblèmes de la culture et de la cuisine américaine, ainsi que de la restauration rapide (avec les sandwichs, sandwichs américains, hot-dogs, pizzas, kebabs…).', 10, '', 'hamburger', 'Images/2168237.jpg', ''),
(16, 'Lasagnes', 'Images/Menulasagnes.jpg', 'Les lasagnes (lasagna, en italien) sont à la fois des pâtes alimentaires en forme de feuilles rectangulaires, ainsi qu\'une recette de cuisine italienne à base de couches alternées de pâtes lasagnes, parmesan, mozzarella, ou ricotta, et de sauce bolognaise ou sauce béchamel, gratiné au four. Originaires du centre-sud italien, elles sont déclinées sous de multiples variantes dans le monde (légume, épinard, aubergine, pesto, viande, poisson, fruits de mer, ou végétariennes...)2.', 12, '', 'italien', 'Images/lasagnes-de-la-grand-mere-d-emilie-4361.jpg', ''),
(17, 'Pates', 'Images/Menupates.jpg', 'La sauce bolognaise (italien : ragù bolognese, prononcé : [raˈɡu boloɲˈɲeːze] ou ragù alla bolognese) est une recette de sauce traditionnelle de la cuisine italienne, originaire de Bologne en Émilie-Romagne, à base de bœuf haché, sauce tomate, oignon, céleri, carottes, et d\'huile d\'olive. A Bologne, elle est surtout utilisée avec des tagliatelles1, lasagnes, cannellonis, pâtes au four, ou polenta, ainsi que pour des pâtes (en particulier des spaghettis) dans le reste du monde2.', 15, '', 'pates', 'Images/spaghetti-a-la-bolognaise.jpg', ''),
(19, 'Couscous de bœuf', 'Images/605daebab7a095b4a0deac5a8fa1bbbb952a3076fc0bb.jpg', 'Le couscous (en berbère : ⵙⴽⵙⵓ seksu ou ⴽⵙⴽⵙⵓ keskesu1, en arabe maghrébin : الطعام، كسكسي، كسكس، سكسو, seksu, kuskus, kusksi, kesksu, t’am) est d\'une part une semoule de blé dur préparée à l\'huile d\'olive (un des aliments de base traditionnel de la cuisine des pays du Maghreb) et d\'autre part, une spécialité culinaire issue de la cuisine berbère, à base de couscous, de légumes, d\'épices, d\'huile d\'olive et de viande (rouge ou de volaille) ou de poisson.', 10, '', 'couscous', 'Images/couscous-aux-legumes-sousoukitchen.jpg', ''),
(20, 'Kebab de boeuf', 'Images/Menukebab.jpg', 'Le terme kebab ou kébab1, emprunté à l\'arabe : کباب, kabāb2, signifie « grillade », « viande grillée » et désigne différents plats à base de viande grillée dans de nombreux pays ayant généralement fait partie des mondes ottoman et perse (dont l\'Inde du Nord)3,4,5,6.Dans son utilisation francophone, comme dans d\'autres langues occidentales, le terme utilisé seul désigne spécifiquement le sandwich fourré de viande grillée à la broche ou döner kebab popularisé à Berlin, en Allemagne, dans les années 1970.', 10, '', 'Kebab', 'Images/meilleur-kebab-val-doise.jpg', ''),
(21, 'Omelette', 'Images/Menuomelette.jpg', 'L\'omelette est une préparation culinaire à base d\'œufs battus, salée ou sucrée, parfois garnie, fourrée, aromatisée ou flambée traditionnellement cuite à la poêle avec un corps gras.\r\nIl s\'agit d\'un terme générique qui recouvre divers procédés et présentations: cuisson à la poêle d\'un côté et pliage, ou roulage (tamagoyaki), ou des 2 côtés (frittata, tortilla, ejjeh), cuisson au four, au micro-ondes. Il existe deux méthodes de préparation : l\'omelette simple (jaune et blanc d\'œufs battus ensemble) et l\'omelette soufflée (blanc monté en neige séparément).', 4, '', 'francais', 'Images/Chorizo-and-Avocado-Omelette-CMS.jpg', ''),
(22, 'Cordon Bleu', 'Images/Menucordon bleu.jpg', 'Le cordon-bleu est une escalope panée, garnie de fromage et de jambon. Il n’existe pas de recette unique, mais la version classique exige de la viande de veau. La très sérieuse Ordonnance sur les denrées alimentaires s’est même penchée sur la question. Elle précise que s’il s’agit de viande de porc, il faut le déclarer. La farce est normalement composée de jambon cuit. Le fromage, quant à lui, permet un peu plus de liberté: c’est tantôt de l’emmental, tantôt du gruyère.\r\n\r\nQuelques restaurants se sont fait une spécialité de ces escalopes farcies et proposent plusieurs viandes et farces sous le nom de cordon-bleu. A la maison, cuisinières et cuisiniers ne se privent \r\n\r\n', 5, '', 'francais', '', ''),
(73, 'Tacos Mexicain', 'Images/Menutacos mexicain.jpg', '', 0, '', '', '', ''),
(70, 'Mafé', 'Images/Menumafé.jpg', '', 0, '', '', '', ''),
(85, 'Saumon', 'Images/Menusaumon.jpeg', '', 0, '', '', '', ''),
(86, 'Moules', 'Images/MenuMoules.jpg', '', 0, '', 'francais', '', ''),
(66, '18 maki', 'Images/Menusushi.jpg', 'Le sushi (寿司, 鮨, 鮓?) est un plat traditionnel japonais, composé d\'un riz vinaigré appelé shari (舎利?) combiné avec un autre ingrédient appelé neta (寿司ネタ?) qui est habituellement du poisson cru ou des fruits de mer. Cette forme d\'art culinaire est un des emblèmes de la cuisine japonaise dans le monde, alors que sa consommation n\'est qu\'occasionnelle au Japon. Les types de sushis les plus répandus sont les nigirizushi, constitués d\'une boule de shari formée à la main recouverte d\'une tranche de neta, les makizushi qui sont des rouleaux de nori renfermant du shari et d\'autres ingrédients ou le chirashizushi composé de shari recouvert de divers accompagnements. Il ne faut pas confondre les sushis avec les sashimis, un plat japonais constitué de tranches de poisson cru.', 20, '', 'Sushi', 'Images/Journee-internationale-du-sushi.jpg', ''),
(75, 'Cote De Boeuf', 'Images/Menucote de boeuf.jpg', '', 0, '', '', '', ''),
(115, 'Tajine Marocain', 'Images/Menutajine marocain.jpg', 'Le tajine est un plat emblématique de la cuisine au Maghreb, en particulier au Maroc. Il s\'agit à l\'origine d\'un plat berbère : une sorte de ragout, dans lequel les légumes et la viande sont cuits à l\'étouffée. Le mot tajine désigne le plat en terre cuite dans lequel les alimentse mot tajine, lorsqu’il fait référence à la nourriture, désigne donc les aliments e mot tajine, lorsqu’il fait référence à la nourriture, désigne donc les aliments qui ont été cuits dans le plat tajine.   Il existe un très grand nombre de tajines différents, qui contiennent de ou abricots), tout cela avec du', 3, '', '', 'Images/Menuistockphoto-1143191816-1024x1024.jpg', ''),
(116, 'Pizza Au Poulet', 'Images/MenuPizza au poulet.jpg', 'Le pepperoni est un salami épicé d\'origine américaine. En Italie, on l\'appelle salame piccante (salami piquant). C\'est l\'un des ingrédients les plus courants des pizzas aux États-Unis et au Canada, qui y représente souvent plus de 30 % de la garniture moyenne.\r\n\r\nLa pizzeria Horly\'s Pizza, situé dans le centre ville du Havre 76, et plus précisément Rue Augustin Normand, vous propose plus de 24 pizzas à déguster sur place ou à se faire livrer. Parmi les plus commandées, vous trouverez la pizza Pepperoni qui est faite sur une base tomate. Vous trouverez à l\'intérieur de cette pizza :\r\n\r\nBase Tomate\r\nMerguez\r\nMozzarella\r\npoulet\r\nOignons, poivrons\r\nTomate confite\r\n\r\nCette pizza vous est proposée en taille Large au prix de 12€ ou en taille enfant au prix de 5€.', 10, '', 'Pizzas', 'Images/chicken-bbq.3a33b97a501154997e8a3167eca3e8ed.1.jpg', ''),
(117, 'Kebab De Poulet', 'Images/Menukebab-de-poulet.jpg', 'Coupez le blanc de poulet en lamelles.\r\nDans un saladier, mettez les lamelles de poulet, toutes les épices, l’ail râpé, le jus de citron et l’huile d’olive. Mélangez et laissez mariner 2 heures ou toute la nuit.\r\nFaites revenir le poulet avec sa marinade à feu vif dans une poêle jusqu’à cuisson complète.\r\nPréparez la sauce en mélangeant le yaourt avec l’ail râpée, le sel et le poivre.\r\nServir le kebab de poulet dans un pain pita avec des rondelles de tomates et des lamelles d’oignon rouge.\r\nAgrémentez le tout de sauce au yaourt et dégustez avec une salade verte et des frites.', 10, '', 'Kebab', 'Images/Menukebab-de-poulet.jpg', ''),
(118, 'Nigiri Sushi De Saumon', 'Images/Menunigiri sushi de saumon.jpg', 'C\'est à ce moment que le nigiri-zushi fut créé : consistant en un amas de riz oblong surmonté de poisson cru, il est le sushi connu mondialement. Après le séisme de 1923 de Kantō les chefs préparant les nigiri-sushi ont quitté Edo et se sont dispersés dans le Japon, popularisant le plat à travers le pays.Traditionnellement, la sous-espèce de japonica Oryza sativa est utilisée pour la préparation du riz à sushi, l\'important étant d\'avoir un riz rond. Le riz est lavé plusieurs fois ou éventuellement trempé avant la cuisson, pour enlever un excès d\'amidon. Cette étape dépend souvent des habitudes des recettes de différents chefs. Le riz est ensuite cuit avec un morceau de konbu, au Japon souvent dans un cuiseur à riz.', 10, '', 'Sushi', 'Images/Menunigiri sushi de saumon.jpg', ''),
(119, 'Burgeur Au Poulet', 'Images/MenuBurgeur au poulet.jpg', 'Préchauffez le four à 200 °C (400 °F). Placez la grille au centre du four. Tapissez une plaque de cuisson de papier parchemin (ou d’une feuille de cuisson réutilisable).\r\nDans un bol moyen, mélangez le yogourt et la moutarde. Directement au-dessus du bol, à l’aide d’une râpe fine, zestez le demi-citron, puis pressez-le. Poivrez généreusement et mélangez.\r\nRâpez le parmesan.\r\nDans un autre bol, émiettez les flocons de maïs avec les doigts. Incorporez la chapelure et le fromage parmesan.\r\nCoupez les poitrines en deux sur la largeur. Recouvrez les morceaux de poulet d’une feuille de papier parchemin et aplatissez-les en frappant avec un marteau à viande ou une boîte de conserve.\r\nDans l’ordre, enrobez les morceaux de poulet du mélange de yogourt et ensuite de la préparation de chapelure. Déposez-les sur la plaque de cuisson.\r\nFaites cuire au four 30 minutes ou jusqu’à ce que la panure soit dorée et ', 15, '', 'hamburger', 'Images/MenuBurgeur au poulet.jpg', ''),
(120, 'Pizza Au Thon', 'Images/pizza-thon-1000x500.jpg', 'Valeur par défaut', 10, '', 'Pizzas', 'Images/Menupizza au thon.jpg', ''),
(121, 'Pizza Nordique', 'Images/MenuPizza nordique.jpg', 'Valeur par défaut', 10, '', 'Pizzas', 'Images/MenuPizza nordique.jpg', ''),
(122, 'Pizza 4 Fromage', 'Images/Menupizza 4 fromage.jpg', 'Valeur par défaut', 8, '', 'Pizzas', 'Images/Menupizza 4 fromage.jpg', ''),
(123, 'Pizza Au Chevre', 'Images/MenuPizza au chevre.jpg', 'Valeur par défaut', 6, '', 'Pizzas', 'Images/MenuPizza au chevre.jpg', ''),
(124, 'Donuts Au Chocolat', 'Images/Menudonuts au chocolat.jpg', 'Donut, ou doughnut1, littéralement « noix de pâte », veut dire « beignet sucré » en Amérique du Nord (beigne au Canada francophone2, nom masculin, et beignet en Louisiane ainsi que pour les Acadiens3). La version la plus courante est de forme torique, à texture dense, souvent couverte d’un glaçage, qui fut popularisée dans les années 1950 par les chaînes de restauration rapide Dunkin’ Donuts et Krispy Kreme. Au Canada, cette pâtisserie est principalement diffusée par la chaîne Tim Hortons.[réf. nécessaire]\r\n\r\nLes donuts, ou beignes, peuvent parfois être fourrés d’une préparation crémeuse, ce qui les apparente au zeppola italien4, ou encore de confiture.', 3, '', 'donuts', 'Images/1438_w1024h576c1cx1424cy2136.jpg', ''),
(125, 'Donuts Vanille', 'Images/Menudonuts vanille.jpg', 'Que celui qui n’aime pas les donuts lève la main!!!\r\nNon mais je me doute bien que tout le monde n’en raffole pas mais tout de même il faut bien avouer que c’est vraiment trop bon (je n’en mange pas des tonnes mais juste le fait de les décorer ça m’éclate!).\r\nJe n’en avais jamais fait avant et comme \r\n\r\nPour cette recette de donuts j’ai donc feuilleté le livre « New-York les recettes cultes » de Marc Grossman et on y trouve en effet une très chouette recette de « doughnuts »et je m’y suis mise tête baissée.', 2, '', 'donuts', 'Images/produit-donut-vanille.jpg', ''),
(127, 'Glace Chocolat', 'Images/Menuglace chocolat.jpg', 'Valeur par défaut', 3, '', 'glace', 'Images/Menuglace chocolat.jpg', ''),
(128, 'Salade De Riz Au Thon', 'Images/MenuSalade de Riz au thon.jpg', 'Les salades composées sont appréciées toute l\'année en entrée et particulièrement l\'été par hautes températures. Testez cette recette facile et rapide à préparer qui réunit salade verte, oeufs durs, thon, tomates cerises, olives noires et maïs.', 5, '', 'salade', 'Images/i107696-salade-de-riz.jpg', ''),
(129, 'Salade Fruits Rouges', 'Images/Menusalade fruits rouges.jpg', 'Valeur par défaut', 3, '', 'salade-de-fruit', 'Images/Menu000000000000013261_E.jpg', ''),
(130, 'Oeuf A La Coque', 'Images/Menuoeuf-a-la-coque.jpg', 'Valeur par défaut', 3, '', 'oeuf', 'Images/Menuoeuf.jpeg', ''),
(131, 'Mousse Au Chocolat', 'Images/Menumousse au chocolat.png', 'Valeur par défaut', 4, '', 'mousse', 'Images/Menumousse au chocolat.png', '');

-- --------------------------------------------------------

--
-- Structure de la table `notation`
--

DROP TABLE IF EXISTS `notation`;
CREATE TABLE IF NOT EXISTS `notation` (
  `id` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `idmenu` int(11) NOT NULL,
  `idutilisateurs` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idmenu` (`idmenu`),
  KEY `idutilisateurs` (`idutilisateurs`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `img_dir` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `type2` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `name`, `img_dir`, `type`, `type2`) VALUES
(1, 'Pizza', 'Images/Menua0fc4ba355969aa491841847eb63dcc1004740003000-960.jpg', 'Pizzas', 'Plat'),
(2, 'Sushis', 'Images/MenuSushis.jpg', 'Sushi', 'Plat'),
(3, 'Kebab', 'Images/Menukebab.jpg', 'Kebab', 'Plat'),
(4, 'Hamburger', 'Images/Menuhamburger.jpg', 'hamburger', 'Plat'),
(5, 'Couscous', 'Images/MenuCouscous.jpg', 'couscous', 'Plat'),
(6, 'Donuts', 'Images/MenuDonuts.jpg', 'Donuts', 'dessert'),
(7, 'Mousse', 'Images/Menumousse.png', 'mousse', 'dessert'),
(8, 'Glaces', 'Images/Menuglaces.jpg', 'glace', 'dessert'),
(9, 'Salade', 'Images/MenuSalade.jpg', 'salade', 'entre'),
(11, 'Salade De Fruits', 'Images/Menusalade-de-fruits.jpg', 'salade-de-fruit', 'dessert'),
(16, 'Tarte', 'Images/Menutarte.jpg', 'tarte', 'dessert'),
(17, 'Gateau', 'Images/Menugateau.jpg', 'gateau', 'dessert'),
(18, 'Pates', 'Images/MenuPates.png', 'pates', 'plat'),
(19, 'Oeuf', 'Images/Menuoeuf.jpeg', 'oeuf', 'entre');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adresse` varchar(60) NOT NULL,
  `password` text NOT NULL,
  `ip` varchar(20) NOT NULL,
  `token` text NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `argent` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `pseudo`, `email`, `adresse`, `password`, `ip`, `token`, `date_inscription`, `argent`) VALUES
(29, 'Mayassa', 'mayassa@gmail.ccom', '4 rue de la loutre', '$2y$12$liVVuwqKCXDH0KuIfkYjpuv4JoJszCk40HppNH8ty8YfLHGJW0lxC', '::1', '5e2175f8dc1c258d8c6af7b0cd590adf4460d47ff31aa262e37bb32b13a777245c5d0836fedb3ddd9132539e7f4e5bae70e407699e41bd94698260ac5fc94e26', '2022-05-06 13:42:02', 300),
(27, 'Rayan', 'rayan@gmail.com', '6 rue de l\'orange', '$2y$12$raySpHa1E6na.rNYJlQ2JuXfpVEMh8xDLC/FNzCdLkosCnnh198CS', '::1', 'd4109271ceb050345cbbed4aced624dfb59d6f1c1ef1d6c3f4782cbba5cd0066a3b4a7891aa32338f0c3548fe64e7ca0ff97bcd94a27874ae7fc05b757b2527e', '2022-05-06 13:40:31', 200),
(28, 'Walid', 'walid@gmail.com', '5 rue de la ville', '$2y$12$c/ty0mC9fu1mj.DZcK1Ep.5kVKw6fHbOQ2aFAynRBw0iiXmw8trBK', '::1', 'ad67b80fbcb229264086114d00f7373fd4e202f7a3f1cd5ecad141424a3af56f4a0b57e52df0c0bd0cd71fba58ef60ce6ec09fe7786fd0fd3eb1deec21aa2114', '2022-05-06 13:41:29', 100),
(25, 'Farouk', 'farouk@gmail.com', '7 rue de la vallé', '$2y$12$XSZ6Q.rjbbfso3RdphbwGe5fEVseo0B30x6gRIuoa9x1JSB11YSG.', '::1', '244141321b83b8151131bf3b661c3ed490ffaf47b8aeffb3dbff733167d7c7a5e07337419e83e17af539032afa8470cc9ec4d0fccb6f83943302a80084747942', '2022-05-06 13:37:42', 100);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
