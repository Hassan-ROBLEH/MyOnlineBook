-- phpMyAdmin SQL Dump
-- version OVH
-- https://www.phpmyadmin.net/
--
-- Hôte : myonliubiblio.mysql.db
-- Généré le :  jeu. 19 nov. 2020 à 22:22
-- Version du serveur :  5.6.50-log
-- Version de PHP :  7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `myonliubiblio`
--

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `releaseAt` date NOT NULL,
  `imageUrl` varchar(255) NOT NULL,
  `fileUrl` varchar(255) NOT NULL,
  `approved` int(11) DEFAULT '0',
  `idCategory` int(11) DEFAULT NULL,
  `idClient` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`id`, `name`, `description`, `author`, `releaseAt`, `imageUrl`, `fileUrl`, `approved`, `idCategory`, `idClient`) VALUES
(1, 'Le Grand Meaulnes', 'À la fin du XIXe siècle, par un froid dimanche de novembre, un garçon de quinze ans, François Seurel, qui habite auprès de ses parents instituteurs une longue maison rouge - l\'école du village -, attend la venue d\'Augustin que sa mère a décidé de mettre ici en pension pour qu\'il suive le cours supérieur : l\'arrivée du grand Meaulnes à  Sainte-Agathe va bouleverser l\'enfance finissante de François...', 'Alain-Fournier', '1913-01-01', '587.jpg', 'feedbooks_book_587.pdf', 1, 4, 1),
(2, 'Candide, ou l\'Optimisme', 'Candide, ou l\'Optimisme est un conte philosophique de Voltaire paru à  Genève en janvier 1759. Il a été réédité vingt fois du vivant de l\'auteur (plus de cinquante aujourd\'hui) ce qui en fait un des plus grands succès littéraires français. Anonyme en 1759, Candide est attribué à  un certain à Monsieur le Docteur Ralph en 1761, à  la suite du remaniement du texte par Voltaire.', 'Voltaire', '1759-01-01', '3072.jpg', 'feedbooks_book_3072.pdf', 1, 5, 1),
(3, 'L\'Aiguille creuse', 'ArsÃ¨ne Lupin serait-il mort ? Isidore Beautrelet, jeune Ã©tudiant en rhÃ©torique et dÃ©tective amateur gÃ©nial, n\'en croit pas un traÃ®tre mot. Il se lance Ã  la recherche du cÃ©lÃ¨bre gentleman cambrioleur.', 'Maurice Leblanc', '2016-08-02', '1485.jpg', 'feedbooks_book_1485.pdf', 0, 6, 1),
(4, 'Le Rouge et le Noir', 'Au rouge des armes, Julien Sorel prÃ©fÃ¨rera le noir des ordres. Au cours de son ascension sociale, deux femmes se singularisent, comme pour figurer les deux penchants de son caractÃ¨re : Madame de RÃªnal - le rÃªve, l\'aspiration Ã  un bonheur pur et simple - et Mathilde de La Mole - l\'Ã©nergie, l\'action brillante et fÃ©brile.', 'Stendhal', '1830-01-01', '220.jpg', 'feedbooks_book_220.pdf', 1, 4, 1),
(5, 'Alcools', 'De la belle poÃ©sie, rÃ©volutionnaire et moderne, accessible Ã  ceux qui croient ne pas aimer la poÃ©sie...', 'Guillaume Apollinaire', '1913-01-01', '5652.jpg', 'feedbooks_book_5652.pdf', 1, 4, 1),
(6, 'Les Diaboliques', 'Les Diaboliques est un recueil de six nouvelles de Jules Barbey d\'Aurevilly, paru en novembre 1874 Ã  Paris chez l\'Ã©diteur Dentu.\r\n\r\nLe projet de ce recueil de nouvelles devait s\'intituler Ã  l\'origine Ricochets de conversation. Il fallut cependant prÃ¨s de vingt-cinq ans Ã  Barbey pour le voir paraÃ®tre puisqu\'il y travaillait dÃ©jÃ  en 1850 lorsqu\'il fit paraÃ®tre Le dessous de cartes d\'une partie de whist dans le journal La Mode dans un feuilleton en trois parties, La Revue des Deux Mondes l\'ayant refusÃ©. Barbey revint en Normandie Ã  la faveur des Ã©vÃ©nements de la Commune et l\'acheva en 1873.', 'Jules Amédée Barbey d\'Aurevilly', '1874-01-01', '1342.jpg', 'feedbooks_book_1342.pdf', 1, 7, 1),
(7, '20000 lieues sous les mers', 'prÃ©tendent avoir rencontrÃ© un monstre effrayant. Et quand certains rentrent gravement avariÃ©s aprÃ¨s avoir heurtÃ© la crÃ©ature, la rumeur devient certitude. L\'Abraham Lincoln, frÃ©gate amÃ©ricaine, se met en chasse pour dÃ©barrasser les mers de ce terrible danger. Elle emporte notamment le professeur Aronnax, fameux ichthyologue du MusÃ©um de Paris, son domestique, le dÃ©vouÃ© Conseil, et le Canadien Ned Land, Â«roi des harponneursÂ». AprÃ¨s six mois de recherches infructueuses, le 5 novembre 1867, on repÃ¨re ce que l\'on croit Ãªtre un Â«narwal gigantesqueÂ».', 'Jules Verne', '1871-01-01', '1495.jpg', 'feedbooks_book_1495.pdf', 1, 1, 1),
(8, 'Le Monde perdu', 'Quand le jeune journaliste Malone demande Ã  son rÃ©dacteur en chef qu\'un grand reportage lui soit confiÃ©, il se voit conviÃ© le soin d\'interviewer le cÃ©lÃ¨bre, l\'irascible, le mÃ©galomane professeur Challenger. Celui-ci de retour d\'une expÃ©dition en AmÃ©rique du Sud prÃ©tend y avoir trouvÃ© des animaux extraordinaires, mais il est la risÃ©e du monde scientifique. Lors d\'une houleuse confÃ©rence scientifique Ã  laquelle participe le professeur Challenger, une mission est dÃ©cidÃ©e pour vÃ©rifier ses dires. L\'Ã©quipe sera composÃ©e du Pr Summerlee, rival de Challenger, de Lord John Roxton, grand aventurier, et du jeune Malone...', 'Arthur Conan Doyle', '1912-01-01', '5132.jpg', 'feedbooks_book_5132.pdf', 1, 1, 1),
(9, 'Madame Bovary', 'Charles Bovary, aprÃ¨s avoir suivi ses Ã©tudes dans un lycÃ©e de province, s\'Ã©tablit comme officier de santÃ© et se marie Ã  une riche veuve. Ã€ la mort de celle-ci, Charles Ã©pouse une jeune femme, Emma Rouault, Ã©levÃ©e dans un couvent, vivant Ã  la ferme avec son pÃ¨re (un riche fermier, patient du jeune mÃ©decin). Emma se laisse sÃ©duire par Charles et se marie avec lui. FascinÃ©e par ses lectures romantiques, elle rÃªve dâ€™une nouvelle vie, en compagnie de son nouveau mari.', 'Gustave Flaubert', '1857-01-01', '386.jpg', 'feedbooks_book_386.pdf', 1, 4, 1),
(10, 'Le Portrait de Dorian Gray', 'Dorian Gray est un jeune homme d\'une trÃ¨s grande beautÃ©. Son ami artiste peintre Basil Hallward est obsÃ©dÃ© par cette derniÃ¨re et en tire toute son inspiration. Sa fascination pour le jeune homme le mÃ¨ne Ã  faire son portrait, qui se rÃ©vÃ¨le Ãªtre la plus belle Å“uvre qu\'il ait jamais peinte, et qu\'il ne souhaite pas exposer : Â« J\'y ai mis trop de moi-mÃªme Â».', 'Oscar Wilde', '1891-01-01', '1410.jpg', 'feedbooks_book_1410.pdf', 1, 4, 1),
(11, 'Double Assassinat dans la rue Morgue', 'Double assassinat dans la rue Morgue (The Murders in the Rue Morgue dans l\'Ã©dition originale) est une nouvelle d\'Edgar Allan Poe, parue en avril 1841 dans le Graham\'s Magazine, traduite en franÃ§ais d\'abord par Isabelle Meunier puis, en 1856, par Charles Baudelaire dans le recueil Histoires extraordinaires. C\'est la premiÃ¨re apparition du dÃ©tective inventÃ© par Poe, le Chevalier Dupin qui doit faire face Ã  une histoire de meurtre incomprÃ©hensible pour la police.', 'Edgar Allan Poe', '1841-01-01', '493.jpg', 'feedbooks_book_493.pdf', 1, 6, 1),
(12, 'Bilbo le Hobbit', 'La tranquillité de Bilbo est troublée par la venue d\'un magicien et de 13 nains qui n\'ont qu\'une idée : récupérer le trésor volé par Smaug le dragon.', 'Francis Ledoux', '1937-01-01', 'Bilbo_le_Hobbit.jpg', 'feedbooks_book_2200.pdf', 1, 2, 1),
(18, 'titre', 'teste', 'auteur', '2020-09-15', '1416.jpg', 'feedbooks_book_1416.pdf', 0, 3, 1),
(20, 'testé', 'Neuf familles nobles rivalisent pour le contrôle du Trône de Fer dans les sept royaumes de Westeros. Pendant ce temps, des anciennes créatures mythiques oubliées reviennent pour faire des ravages.', 'Alexis', '2020-09-30', 'c5.jpg', 'christopher-rui-cv.pdf', 1, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `shortUrl` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `shortUrl`) VALUES
(1, 'Science Fiction', 'La science-fiction est un genre narratif, principalement un genre littéraire et un genre cinématographique. Il est structuré par des hypothèses sur ce que pourrait être le futur ou ce qu\'aurait pu être le présent voire le passé (planètes éloignées, mondes parallèles, uchronie...), en partant des connaissances actuelles (scientifiques, technologiques, ethnologiques...). Elle se distingue du fantastique qui inclut une dimension inexplicable et de la fantasy qui fait souvent intervenir la magie.', 'sf'),
(2, 'Fantasy', 'La fantasy fait partie des littératures de l\'imaginaire. Dans la fantasy comme dans le merveilleux, le surnaturel est généralement accepté, voire utilisé pour définir les règles d\'un monde imaginaire, et n\'est pas nécessairement objet de doute ou de peur. Cela distingue la fantasy du fantastique où le surnaturel fait intrusion dans les règles du monde habituel, et de l\'horreur où il suscite peur et angoisse. Par extension, à  partir du genre littéraire, on parle aussi de fantasy à  propos d\'illustrations, de bandes dessinées, de films, de jeux, etc.', 'fantasy'),
(3, 'Aventure', 'Centré sur l\'intérêt dramatique, le suspense, parfois au détriment de la vraisemblance, le roman d\'aventure inclut des personnages nombreux mais simplifiés et des références fonctionnelles à  une réalité aussi bien historique que géographique souvent exotique, ce qui le distingue aussi bien du roman d\'analyse psychologique que du roman d\'analyse sociale ou sociologique qui visent une plus grande complexité. Il est également sous-tendu par une morale plutôt schématique qui divisent les hommes en bons et méchants, le héros (généralement vainqueur) défendant le camp du bien, d\'où la place qu\'on lui a fait dans la littérature pour la jeunesse.', 'aventure'),
(4, 'Roman', 'Le roman, d\'abord écrit en vers qui jouent sur des assonances au XIIe siècle avant sa mise en prose au début du XIIIe siècle, se définit aussi par sa destination à  la lecture individuelle, à  la différence du conte ou de l\'épopée qui relèvent à  l\'origine de la transmission orale. Le ressort fondamental du roman est alors la curiosité du lecteur pour les personnages et pour les péripéties, à quoi s\'ajoutera plus tard l’intérêt pour un art d\'écrire. Au fil des derniers siècles, le roman est devenu le genre littéraire dominant avec une multiplicité de sous-genres qui soulignent son caractère polymorphe (à  maintes formes).', 'roman'),
(5, 'Conte', 'Il vise à  distraire ou à  édifier, il porte en lui une force émotionnelle ou philosophique puissante. Depuis la Renaissance, les contes font l\'objet de réécritures, donnant naissance au fil des siècles à  un genre écrit à  part entière. Cependant, il est distinct du roman, de la nouvelle et du récit d\'aventures par l\'acceptation de l\'invraisemblance.', 'conte'),
(6, 'Policier', 'Le drame y est fondé sur l\'attention d\'un fait ou, plus précisément, d\'une intrigue, et sur une recherche méthodique faite de preuves, le plus souvent par une enquête policière ou encore une enquête de détective privé. L\'abréviation policier (pour roman policier) est également utilisée. Le genre policier comporte six invariants : le crime ou délit, le mobile, le coupable, la victime, le mode opératoire et l\'enquête. Le roman policier recouvre beaucoup de types de romans, notamment le roman noir et le roman à  suspense ou thriller.', 'policier'),
(7, 'Nouvelles', 'Une nouvelle est un récit habituellement court. Apparu à  la fin du Moyen Âge, ce genre littéraire était alors proche du roman et d\'inspiration réaliste, se distinguant peu du conte. à partir du XIXe siècle, les auteurs ont progressivement développé d\'autres possibilités du genre, en s\'appuyant sur la concentration de l\'histoire pour renforcer l\'effet de celle-ci sur le lecteur, par exemple par un dénouement surprenant. Les thèmes se sont également élargis : la nouvelle est devenue une forme privilégiée de la littérature fantastique, policière, et de science-fiction.', 'nouvelles');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `editedAt` timestamp NULL DEFAULT NULL,
  `activated` tinyint(1) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `firstName`, `lastName`, `createdAt`, `editedAt`, `activated`, `role`) VALUES
(1, 'admin@test.fr', '$2y$10$SqUHYKB8crmdGJjOPyEh0e/LlnmS4ivzgtsMrr9HVPgZ8IUKtw4dG', 'admin', 'test', '2020-09-11 21:08:35', NULL, 0, 'admin'),
(2, 'login@test.fr', '$2y$10$4E.7RnBk38W9P6PmOWz6Qe6NiFzH8HeW5j9w8.yRxcUtLxawEknBW', 'login', 'test', '2020-09-11 21:09:15', NULL, 0, 'client'),
(3, '', '$2y$10$H29pWUwM2s1c0i6mpiRzwu/mY.eDXzaP/F2HTI/D.ulgb3c99cqKq', 'aaaaa', '', '2020-09-18 10:58:11', NULL, 0, 'client'),
(4, 'hakim.yahi@3wa.io', '$2y$10$K7N6wUKqPG5VnsI3whXgHuRkyngrzcRhf5J6iE6j80yNYkt27g4Jy', '&lt;script&gt;alert(\'test\')&lt;/script&gt;test', '&lt;script&gt;alert(\'test\')&lt;/script&gt;test', '2020-11-19 14:57:56', NULL, 0, 'client');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCategory` (`idCategory`),
  ADD KEY `idClient` (`idClient`),
  ADD KEY `idCategory_2` (`idCategory`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`idClient`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
