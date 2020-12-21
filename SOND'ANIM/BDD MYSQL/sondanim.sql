-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 21 déc. 2020 à 17:59
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sondanim`
--

-- --------------------------------------------------------

--
-- Structure de la table `ami`
--

CREATE TABLE `ami` (
  `ami_id` int(11) NOT NULL,
  `membre1_id` int(11) NOT NULL,
  `membre2_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ami`
--

INSERT INTO `ami` (`ami_id`, `membre1_id`, `membre2_id`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `commentaire_id` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `id_question_id` int(11) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `date_msg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`commentaire_id`, `id_membre`, `id_question_id`, `msg`, `date_msg`) VALUES
(1, 1, 1, 'Le meilleur sondage', '2020-12-21 17:17:20'),
(2, 2, 1, 'Haha', '2020-12-21 17:25:11'),
(3, 2, 2, 'Jinbey peut etre ?', '2020-12-21 17:25:40'),
(4, 2, 4, 'IMPOSSIBLE', '2020-12-21 17:26:02');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `membre_id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(150) NOT NULL,
  `date_membre` date NOT NULL,
  `statut` tinyint(4) DEFAULT '0',
  `image` varchar(10000) NOT NULL,
  `point` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`membre_id`, `nom`, `prenom`, `pseudo`, `email`, `mdp`, `date_membre`, `statut`, `image`, `point`) VALUES
(1, 'Azoulay', 'Karen', 'karen', 'karenazoulay92@gmail.com', '$2y$10$pzQs/FEuQu4tO/NdXGbAFe.8.7qajmkV1wAiMQa1YW88NBFuFWs1.', '2020-12-21', 0, 'https://1.bp.blogspot.com/-gkSxKDtyj30/X2aLBtoOkaI/AAAAAAAAC10/QlbNMVGM9fMN8iBWC-DddqNrTaLKHxCQgCNcBGAsYHQ/w914-h514-p-k-no-nu/jujutsu-kaisen-sukuna-uhdpaper.com-4K-7.2851-wp.thumbnail.jpg', 10),
(2, 'Nathan', 'Nathan', 'nathan', 'nath@gmail', '$2y$10$VbWR4/cLBijRj4z1o/1C1O/.YuKOKvc6SJ3TcO/fgkrz8KHmI2iKu', '2020-12-21', 1, 'https://tse4.mm.bing.net/th?id=OIP.G8w_CVn846SypHcnQNefNgHaEK&pid=Api', 5),
(3, 'raquel', 'raquel', 'raquel', 'raq@gmel', '$2y$10$b/tBXyeWOoi2kNJvRSIlAu5MC0HOygOqH2lmE1eQSkZ2lJ42hh/Bm', '2020-12-21', 0, 'https://gematsu.com/wp-content/uploads/2017/12/My-Hero-Academia-Ones-Justice_Site_12-04-17_002.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `membre_reponse`
--

CREATE TABLE `membre_reponse` (
  `id` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `id_reponse` int(11) NOT NULL,
  `id_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre_reponse`
--

INSERT INTO `membre_reponse` (`id`, `id_membre`, `id_reponse`, `id_question`) VALUES
(1, 2, 1, 1),
(2, 2, 4, 2),
(3, 2, 8, 4),
(4, 1, 10, 5),
(5, 1, 16, 7),
(6, 1, 21, 8),
(7, 1, 12, 6),
(8, 3, 2, 1),
(9, 3, 11, 5),
(10, 3, 12, 6),
(11, 3, 18, 7),
(12, 3, 19, 8),
(13, 3, 8, 4),
(14, 3, 5, 3),
(15, 2, 65, 22),
(16, 2, 48, 17),
(17, 2, 45, 16);

-- --------------------------------------------------------

--
-- Structure de la table `sondage_question`
--

CREATE TABLE `sondage_question` (
  `question_id` int(11) NOT NULL,
  `auteur_membre_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `image_question` varchar(10000) NOT NULL,
  `date_fin` datetime NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sondage_question`
--

INSERT INTO `sondage_question` (`question_id`, `auteur_membre_id`, `type`, `question`, `image_question`, `date_fin`, `point`) VALUES
(1, 1, 3, 'Est-ce que Tanjiro va devenir un dÃ©mon ?', 'https://www.gamenguides.com/wp-content/uploads/2020/04/demon-slayer-kimetsu-no-yaiba-tanjiro-0412.jpg', '2020-12-16 17:16:00', 10),
(2, 1, 2, 'Un nouveau membre va t-il intÃ©grer l\'Ã©quipage ?', 'https://tse1.explicit.bing.net/th?id=OIP.XSBJpj6fhl0HgW0FbfDJvQHaDt&pid=Api', '2021-02-22 17:18:00', 12),
(3, 1, 3, 'Nezuko va t\'elle redevenir humaine ?', 'https://tse3.mm.bing.net/th?id=OIP.BK64RN0u_fokRU8xw60ReAHaEK&pid=Api', '2021-03-26 17:21:00', 5),
(4, 1, 4, 'Gon et Kuria vont-ils se battre contre la brigade fantÃ´me ?', 'https://tse3.mm.bing.net/th?id=OIP.crO9gKjFZir6FQHdlFpoVQHaEK&pid=Api', '2021-02-23 17:23:00', 15),
(5, 2, 4, 'Gon est il un vÃ©ritable humain ?', 'https://tse3.mm.bing.net/th?id=OIP.SPUAYJIZb1yf5U7DlBLCigHaDt&pid=Api', '2021-01-30 17:27:00', 2),
(6, 2, 2, 'Le pays des wa c\'est quoi ?', 'https://tse3.mm.bing.net/th?id=OIP.PpEA55xiJXy_NWldAvwPYgHaD5&pid=Api', '2021-02-22 17:29:00', 15),
(7, 2, 3, 'Un futur coÃ©quipier ?', 'https://static3.cbrimages.com/wordpress/wp-content/uploads/2019/10/Demon-Slayer-Best-Costumes-featured-image.jpg', '2021-02-24 17:30:00', 14),
(8, 2, 1, 'Une nouvelle saison pour le ?', 'https://media.comicbook.com/2018/07/my-hero-academia-1121737-640x320.jpeg', '2021-03-24 17:32:00', 15),
(9, 2, 1, 'Midoria va t\'il faire un autre stage ?', 'https://assets1.ignimgs.com/2019/10/26/my-hero-academia-season-4-episode-66-1572113713202.jpg?width=1280', '2021-03-29 17:33:00', 4),
(10, 3, 1, 'Une nouvelle bataille contre qui ?', 'https://static3.cbrimages.com/wordpress/wp-content/uploads/2020/03/My-Hero-Academia-Heroes-and-Villains.jpg', '2021-01-11 17:43:00', 7),
(11, 3, 1, 'Team super vilain ou super hÃ©ro ?', 'https://static0.cbrimages.com/wordpress/wp-content/uploads/2020/06/quirks-irl-my-hero-academia-featured.jpg', '2021-01-09 17:44:00', 2),
(12, 3, 1, 'Pour quand le retour d\'All Might ?', 'http://cdn.collider.com/wp-content/uploads/2017/10/my-hero-academia-season-3.png', '2021-01-09 17:46:00', 14),
(13, 3, 2, 'Le meilleur perso ?', 'https://tse1.mm.bing.net/th?id=OIP.CBaAg0FqFfSF9gdlEPr3lgHaEK&pid=Api', '2021-01-25 17:46:00', 1),
(14, 3, 2, 'Un futur film ?', 'https://tse4.mm.bing.net/th?id=OIP.fwzxj-3txBhAj7rJOI9SpAHaEK&pid=Api', '2021-02-22 17:48:00', 5),
(15, 3, 1, 'Va t\'il revenir All for one ?', 'https://tse1.mm.bing.net/th?id=OIP.uCY0ga14nG5Zu0swkSQKUAHaDt&pid=Api', '2021-03-16 17:49:00', 2),
(16, 3, 1, 'Est il le frÃ¨re de todoroki ?', 'https://tse1.mm.bing.net/th?id=OIP.ybYgel15Ys3QinnMlojFYgHaDt&pid=Api', '2020-11-18 17:50:00', 5),
(17, 3, 2, 'A quand ce combat ???', 'https://tse1.mm.bing.net/th?id=OIP.5qTF7c15fnUJP-g_9vOxtgHaEK&pid=Api', '2021-02-04 17:51:00', 12),
(18, 3, 3, 'Les dÃ©mons sont au fond gentil ?', 'https://tse4.mm.bing.net/th?id=OIP.ueM0qvGRo8cadROtOCPDgAHaD5&pid=Api', '2021-01-31 17:52:00', 5),
(19, 3, 3, 'Tanjiro va t\'il se marier ?', 'https://tse4.mm.bing.net/th?id=OIP.i7VcDiCAFJDVofJjkaz1ewHaEK&pid=Api', '2021-01-27 17:53:00', 12),
(20, 3, 4, 'La saison prÃ©fÃ©rÃ© ?', 'https://tse1.mm.bing.net/th?id=OIP.lGFpPIDlCF7HNRk4ELMZoAHaES&pid=Api', '2021-01-21 17:55:00', 2),
(21, 3, 4, 'Pourquoi gon porte t-il une canne Ã  pÃ¨che ?', 'https://tse2.mm.bing.net/th?id=OIP.HKsFGh60GdJ_JrFpOnqPTAHaEK&pid=Api', '2021-02-01 17:57:00', 14),
(22, 3, 4, 'MÃ©rite t-elle sa mort ?', 'https://tse4.mm.bing.net/th?id=OIP.txG1pYvl1Po7XwKASWrssAHaEK&pid=Api', '2021-01-08 17:58:00', 10);

-- --------------------------------------------------------

--
-- Structure de la table `sondage_reponse`
--

CREATE TABLE `sondage_reponse` (
  `reponse_id` int(11) NOT NULL,
  `id_question_id` int(11) NOT NULL,
  `choix` varchar(255) NOT NULL,
  `nombre` int(11) NOT NULL DEFAULT '0',
  `resultat` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sondage_reponse`
--

INSERT INTO `sondage_reponse` (`reponse_id`, `id_question_id`, `choix`, `nombre`, `resultat`) VALUES
(1, 1, 'Oui', 1, 1),
(2, 1, 'Non', 1, 1),
(3, 2, 'Oui', 0, NULL),
(4, 2, 'Non', 1, NULL),
(5, 3, 'Oui', 1, NULL),
(6, 3, 'Non', 0, NULL),
(7, 4, 'Oui', 0, NULL),
(8, 4, 'Non', 2, NULL),
(9, 5, 'Oui', 0, NULL),
(10, 5, 'Peut-Ãªtre', 1, NULL),
(11, 5, 'Non', 1, NULL),
(12, 6, 'Un pays trop beau', 2, NULL),
(13, 6, 'A mort kaido', 0, NULL),
(14, 6, 'Mon futur voyage', 0, NULL),
(15, 7, 'Pas de nouveau coÃ©quipier', 0, NULL),
(16, 7, 'Oui, un pilier !', 1, NULL),
(17, 7, 'Oui, un maitre !', 0, NULL),
(18, 7, 'Oui, un dÃ©mon gentil !', 1, NULL),
(19, 8, '10/11', 1, NULL),
(20, 8, '5/12', 0, NULL),
(21, 8, '18/01', 1, NULL),
(22, 8, '20/02', 0, NULL),
(23, 8, '17/05', 0, NULL),
(24, 9, 'Oui', 0, NULL),
(25, 9, 'Non', 0, NULL),
(26, 10, 'Vilain', 0, NULL),
(27, 10, 'Super hÃ©ro', 0, NULL),
(28, 10, 'Etudiant', 0, NULL),
(29, 10, 'Senior', 0, NULL),
(30, 11, 'Vilain !!!', 0, NULL),
(31, 11, 'HÃ©ro bien sur !', 0, NULL),
(32, 12, 'Saison 5', 0, NULL),
(33, 12, 'Saison 7', 0, NULL),
(34, 12, 'Saison 6', 0, NULL),
(35, 12, 'Saison 4', 0, NULL),
(36, 12, 'JAMAIS', 0, NULL),
(37, 13, 'Luffy', 0, NULL),
(38, 13, 'Zoro', 0, NULL),
(39, 13, 'Sanji', 0, NULL),
(40, 14, 'oui', 0, NULL),
(41, 14, 'non', 0, NULL),
(42, 14, 'peut etre', 0, NULL),
(43, 15, 'Oui', 0, NULL),
(44, 15, 'Non', 0, NULL),
(45, 16, 'Oui', 1, 1),
(46, 16, 'Non', 0, 0),
(47, 17, 'Tome 100', 0, NULL),
(48, 17, 'Tome 150', 1, NULL),
(49, 17, 'Tome 90', 0, NULL),
(50, 17, 'Tome 140', 0, NULL),
(51, 18, 'NON NON NON', 0, NULL),
(52, 18, 'Oui je crois...', 0, NULL),
(53, 19, 'OUIIII !!!', 0, NULL),
(54, 19, 'Bien sur que non', 0, NULL),
(55, 20, '1', 0, NULL),
(56, 20, '2', 0, NULL),
(57, 20, '3', 0, NULL),
(58, 20, '4', 0, NULL),
(59, 20, '5', 0, NULL),
(60, 21, 'Pour le kiff', 0, NULL),
(61, 21, 'Il adore pecher', 0, NULL),
(62, 21, 'Pour se donner un style', 0, NULL),
(63, 21, 'Pour sÃ©duire haha', 0, NULL),
(64, 21, 'Pour combattre', 0, NULL),
(65, 22, 'OH QUE OUI', 1, NULL),
(66, 22, 'Non la pauvre...', 0, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ami`
--
ALTER TABLE `ami`
  ADD PRIMARY KEY (`ami_id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`commentaire_id`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`membre_id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `membre_id` (`membre_id`);

--
-- Index pour la table `membre_reponse`
--
ALTER TABLE `membre_reponse`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sondage_question`
--
ALTER TABLE `sondage_question`
  ADD PRIMARY KEY (`question_id`);

--
-- Index pour la table `sondage_reponse`
--
ALTER TABLE `sondage_reponse`
  ADD PRIMARY KEY (`reponse_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ami`
--
ALTER TABLE `ami`
  MODIFY `ami_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `commentaire_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `membre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `membre_reponse`
--
ALTER TABLE `membre_reponse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `sondage_question`
--
ALTER TABLE `sondage_question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `sondage_reponse`
--
ALTER TABLE `sondage_reponse`
  MODIFY `reponse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
