-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 09 déc. 2018 à 00:46
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `talktoyou`
--

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`id`, `id_user`, `id_topic`, `message`, `date`) VALUES
(89, 20, 2, 'Mr Macron has appointed Bénédicte Savoy, a French art historian, and Felwine Sarr, a Senegalese writer, to examine how artefacts now in France may be sent to African countries that claim them. I think that Macron is write !!!', '2018-12-06 04:13:04'),
(88, 20, 1, 'varane won everything with the real madrid and the team of frqnce he deserved more', '2018-12-05 23:10:00'),
(87, 18, 1, 'I think he deserves it ! He worked hard and has a great humility', '2018-12-05 23:02:00'),
(86, 18, 2, 'Tom, it\'s not possible to live like that...', '2018-12-06 03:54:38'),
(85, 18, 2, 'No, only european people can take care off this art ! ', '2018-12-06 03:54:16'),
(84, 17, 5, 'Scare about that ! We all going to be Robots ! ', '2018-12-06 03:51:57'),
(83, 17, 4, 'Robin Hood', '2018-12-06 03:51:22'),
(82, 17, 6, 'Apple... Worst company, fuck Apple !', '2018-12-06 03:51:06'),
(81, 17, 3, 'Balmain, top as everything !!!', '2018-12-06 03:50:30'),
(80, 17, 2, 'Off course, each country have to control its cultury ! ', '2018-12-06 03:39:08'),
(79, 17, 1, 'Modric mgl jsuis visionnaire!', '2018-12-05 16:28:11'),
(78, 14, 5, 'I agree with @ArmineNsi', '2018-12-04 14:20:55'),
(77, 13, 5, 'However, this industry have to be secure to keep this area safe.', '2018-12-04 14:19:05'),
(76, 13, 5, 'Tech have to be developp in this industry, we need to find solutions to be faster, and cheaper to help patient !', '2018-12-04 14:15:27'),
(90, 20, 3, 'Fashion has a position as a platform for processing the way of the world. The world is in a mess. In this turbulent and nervy week for women, the question was this: Who had the presence of mind to put forward constructive—hopefully kind and inclusive—statements which could rise above the din?\r\n', '2018-12-05 23:17:14'),
(91, 20, 4, 'ans of the Insidious series started getting goosebumps of anticipation when a fourth installment was announced in 2016, with distributor Sony setting an October 20, 2017 release date — just in time for spooky season. But it wasn\'t long before there were signs of trouble. Insidious: The Last Key was shouldered out of that prime spot by the well-received Happy Death Day, pushed back to January of 2018. ', '2018-12-05 23:18:09'),
(92, 20, 5, 'Three-dimensional (3D) printing has come a long way since its debut 30 years ago and is opening new opportunities in a variety of industries. Riding on the winds of innovation and advancements, 3D printers are set to provide faster prototyping ideas, inventive problem solving and increased cost efficiency', '2018-12-05 23:19:22'),
(93, 20, 6, 'Apple’s playbook is actually pretty predictable: Hardware devices serve as a blank canvas for Apple to deliver its user interface, apps and services, which are the company’s true crown jewels. If there’s any mystery in the strategy, it’s only in the kinds of blank canvas it decides to make.', '2018-12-05 23:20:40'),
(94, 14, 2, '@Nicolas  YES ! Restoring objects of immense artistic and historical value to those that claim ownership is a legal and ethical minefield.', '2018-12-06 04:22:56'),
(95, 14, 1, '@Nicolas NO! It\'s a good thing , The 33-year-old broke Cristiano Ronaldo\'s and Lionel Messi\'s decade-long hold on the prestigious award, becoming the first winner other than Ronaldo or Messi since Brazil\'s Kaká in 2007.', '2018-12-05 23:24:35'),
(96, 14, 3, '@Nicolas The link between the 10 designers on this list is that the young and the senior alike overcame aggression and divisiveness, and brought a sense of cross-generational unity to the fore. Progressive thinking centered on refashioning the Parisian values of tailoring and dressmaking. ', '2018-12-05 23:25:22'),
(98, 14, 4, '@Nicolas On the surface, Proud Mary seemed like an absolute sure thing: it\'s the story of a badass contract killer, played by the immensely talented Taraji P. Henson, who finds herself responsible for the welfare of a young boy after a job goes sideways.\r\n\r\n', '2018-12-05 23:34:24'),
(99, 14, 5, '@nicolas The impacts of 3D printing go beyond its practical benefits. According to The Guardian, the technology is expected to be worth no less than $1.3 billion by 2021 and looks set to disrupt the cost implications of several medical procedures.', '2018-12-05 23:35:28'),
(100, 14, 6, '@Nicolas  With more people shopping online than ever before, the success of the town square strategy is critical to Apple’s continued relevance in a changing space where other well established brands have struggled. Yet even for Apple, the road hasn’t been without bumps. ', '2018-12-05 23:36:26'),
(101, 21, 2, '@stefijohns Laws often prevent European countries from returning them, while conservationists have argued that artefacts could be damaged or stolen if sent to politically unstable countries lacking properly equipped museums.', '2018-12-06 04:41:07'),
(102, 21, 1, 'Modric helped Real Madrid win a third successive Champions League title in May and also captained Croatia to their first World Cup final, being named player of the tournament despite his side losing 4-2 to France. So he don\'t deserve it !!!!! Mitroglou can score anywhere and anytime starfoula', '2018-12-05 23:43:11'),
(103, 21, 3, '@stefijohns There was an overarching positivity in seeing designers enjoying applying themselves to clothes to make people feel good. It took intellectual effort, honed skills, innovation, playfulness, and a refreshing sense of reality. All this came together in places as disparate as Chanel, Louis Vuitton, Paco Rabanne, Junya Watanabe, and Loewe. The last word should go to Pierpaolo Piccioli, who had everyone on their feet applauding the sheer life-enhancing, couture-fabulous inter-generational relatability of his show.', '2018-12-05 23:44:16'),
(104, 21, 4, '@stefijohns Clint Eastwood has a pretty good track record as a director, and an even better one as a director of historical dramas. So, expectations were high for The 15:17 to Paris, the true story of a trio of American soldiers who found themselves in the middle of an attempted terrorist attack on a train while traveling in Europe. \r\n\r\n\r\n', '2018-12-05 23:45:49'),
(105, 21, 5, '@stefijohns  3D printers have successfully recreated body parts as complex as blood vessels, which proves that this technology has a lot of untapped potential. As of today, organoids (mini organs) are already being built by medical professionals. In 2017, a team of biomedical engineers from Pohang University in South Korea, using a 3D printer and living tissue were successful at developing what they called bio-blood-vessels. ', '2018-12-05 23:47:57'),
(108, 15, 6, '@Nicolas Town squares have been revered meeting and trade spaces since ancient times, so it’s no surprise that any changes to their fabric evoke strong feelings from communities. As public commons, these spaces reflect the values, priorities, culture, and preferences of those that occupy them. In a contemporary context, Apple and popular culture are inseparably bound by the ubiquity of iPhones, iPads, and Apple Watches. ', '2018-12-05 23:59:39'),
(107, 15, 1, '@Armine you\'re so right!!!! il love football', '2018-12-05 23:56:36'),
(111, 23, 1, 'It\'s Unfair ! ', '2018-12-06 09:51:27'),
(109, 22, 6, '@Armine est-ce que Touraj a un bon entourage? / Does Touraj have a good entourage?\r\n', '2018-12-06 00:02:41'),
(110, 22, 1, '@Armine est-ce que Touraj a un bon entourage? / Does Touraj have a good entourage?', '2018-12-06 00:03:14'),
(112, 23, 3, 'love that ! ', '2018-12-06 09:52:18');

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(60) NOT NULL,
  `email` varchar(250) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `interest` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `member`
--

INSERT INTO `member` (`id`, `nickname`, `email`, `pass`, `fullname`, `age`, `sex`, `interest`) VALUES
(22, 'Touraj', 'touraj@hotmail.com', '$2y$10$OdQh33DBmZWAl.TwxIwwyexKFidSieoGloKM/m8yKbBnCAzRnuW4S', 'Touraj', 31, 'Male', 'business'),
(20, 'Nicolas', 'nicolas@gmail.com', '$2y$10$ei6AMAdQbKbXa5p8/Biwr.U6hYLi7xu/buZy2ADMdhdASv6MshaSW', 'Nicolas', 21, 'Male', 'sport musique'),
(19, 'PierreAmbezaLeSang', 'izimoney@toz.fr', '$2y$10$PBvZ9Jwm7x.feoMCQ4HO5ONVNNUldTiQZML8.LAWLuJlxM1freaTu', 'Pierre Ambeza', 20, 'Male', 'Sport, Milan AC'),
(18, 'Pierre', 'pierream@hotmail.fr', '$2y$10$K2.Q75kZ9593i2sNRmlBuuWKSruE0RL3fqr0XdD709LEybE1tq1gK', 'Pierre', 20, 'Male', 'Sport'),
(17, 'tom', 'tom@tom.fr', '$2y$10$uiHHJ0O8K429Yy6/L8m3X.VICxq3nafTaboOGt9vM2EIjmxk5eZ3K', 'Tom Chemaly', 20, 'Male', 'Cheating, sport, studying'),
(16, 'Marc', 'marc@yahoo.fr', '$2y$10$wJYMWojtllnJQwup3/1tqO5UjoXc4HMoYkNfmZe0/3juCi1Uu/tk.', 'Marc NASRI SEBDANI', 31, 'Male', 'Sport'),
(15, 'Pankaj', 'pankajtheking@esigetel.net', '$2y$10$ipdvPVD51BtVZWIcZLog5O04w2goIdZtEQBmy2CVb3tKooF/3i8Ym', 'Pankaj Kamthan', 19, 'Male', 'Litterature, mathematics, computer sciences'),
(21, 'Armine', 'arminensi@hotmail.com', '$2y$10$nQCUJyD5.5Ez4XrVwAo4rO6S4mmFKF/15dFM3GTGNxvi7YqZA8Hcu', 'Armine Nasri', 20, 'Male', 'LIFESTYLE SPORT'),
(14, 'stefijohns', 'stefania@efrei.net', '$2y$10$4aZrXAieH9j4ViaFDHyB1u5TyjKoMrsPREzlAAzVIQtagxyTzbEUu', 'Stefania Kukovski', 21, 'Female', 'Sport, Technologies'),
(23, 'Jean', 'jean@yahoo.fr', '$2y$10$7TujzKhBZeq4wdDYuy0GQOPni1Iv6BKAqwnptFneNDAqCX/lM6h8q', 'Jean Valjan', 22, 'Male', 'Sport, Cinema');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
