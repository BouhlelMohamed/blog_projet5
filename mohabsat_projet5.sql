-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 13, 2020 at 04:34 PM
-- Server version: 10.2.31-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mohabsat_projet5`
--

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE `Comments` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Comments`
--

INSERT INTO `Comments` (`id`, `id_user`, `id_post`, `content`, `state`, `created_at`, `update_at`) VALUES
(47, 38, 43, 'On en apprend tous les jours ! ', 0, '2020-03-03 10:27:48', '2020-03-08 11:08:34'),
(52, 29, 61, 'Cool ! ', 0, '2020-03-10 03:14:26', '2020-03-24 19:19:46'),
(53, 59, 52, 'J\'aime ce genre d\'article ! ', 0, '2020-03-24 15:27:24', '2020-03-24 19:20:47'),
(54, 38, 43, 'Bonjour, \r\n\r\nTr&egrave;s bon article ! ', 0, '2020-03-12 14:21:00', '2020-03-24 19:21:21'),
(55, 37, 49, 'Bonjour, \r\n\r\nJ\'aime bien l\'article mais dommage que certains on &eacute;t&eacute; supprim&eacute;s !', 1, '2020-03-16 08:21:00', '2020-03-24 19:22:11'),
(56, 36, 53, 'Good Job ! ', 1, '2020-03-18 07:15:26', '2020-03-24 19:22:49'),
(57, 59, 61, 'Toooop !! ', 1, '2020-03-21 19:17:49', '2020-03-24 19:23:20'),
(58, 34, 51, 'Sympa', 1, '2020-03-23 09:16:23', '2020-03-24 19:23:51'),
(59, 40, 50, 'J\'adore cet article ! ', 1, '2020-03-22 16:16:00', '2020-03-24 19:24:25'),
(60, 29, 49, 'Bonjour, \r\n\r\nJ\'aime bien lire vos articles ! ', 1, '2020-03-10 05:14:26', '2020-03-24 19:25:06'),
(61, 38, 53, 'J\'adore !!!!!! ', 1, '2020-03-08 06:28:18', '2020-03-24 19:25:42'),
(62, 34, 52, 'Bonjour, \r\n\r\nEst-il possible d\'avoir davantage d\'articles de ce genre ! \r\n\r\nTr&egrave;s int&eacute;ressant je trouve. ', 1, '2020-03-18 09:15:00', '2020-03-24 19:27:05'),
(63, 37, 46, 'Je ne comprends strictement rien. ', 1, '2020-03-18 15:32:00', '2020-03-24 19:27:55'),
(64, 36, 53, 'Tr&egrave;s bon article. \r\n\r\nA bientot', 1, '2020-03-21 07:16:09', '2020-03-24 19:28:29'),
(65, 40, 49, 'Bonjour, \r\n\r\nLaravel est un langage front ou pas ? \r\n\r\nMerci &agrave; vous', 1, '2020-03-24 09:15:26', '2020-03-24 19:30:16'),
(66, 28, 54, 'Hello les amis, \r\n\r\nJ\'aime beaucoup. \r\n\r\nIl faudrait que l\'on organise des conf	&eacute;rences sur diff&eacute;rentes th&eacute;matique ! \r\n\r\nA bientot, daniel ', 1, '2020-03-19 12:19:45', '2020-03-24 19:31:29'),
(68, 38, 46, 'Je ne suis pas du tout d\'accord !! ', 1, '2020-03-06 07:18:20', '2020-03-08 10:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `Posts`
--

CREATE TABLE `Posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `chapo` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `id_author` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Posts`
--

INSERT INTO `Posts` (`id`, `title`, `chapo`, `content`, `id_author`, `created_at`, `update_at`) VALUES
(43, 'PHP', 'Mais qu\'est ce que PHP?', 'PHP (officiellement, ce sigle est un acronyme r&eacute;cursif pour PHP Hypertext Preprocessor) est un langage de scripts g&eacute;n&eacute;raliste et Open Source, sp&eacute;cialement con&ccedil;u pour le d&eacute;veloppement d\'applications web. Il peut &ecirc;tre int&eacute;gr&eacute; facilement au HTML.\r\n\r\nBien... mais qu\'est ce que cela veut dire ? \r\n\r\nAu lieu d\'utiliser des tonnes de commandes afin d\'afficher du HTML (comme en C ou en Perl), les pages PHP contiennent des fragments HTML dont du code qui fait &quot;quelque chose&quot; (dans ce cas, il va afficher &quot;Bonjour, je suis un script PHP !&quot;). Le code PHP est inclus entre une balise de d&eacute;but &lt;?php et une balise de fin ?&gt; qui permettent au serveur web de passer en mode PHP.\r\n\r\nCe qui distingue PHP des langages de script comme le Javascript, est que le code est ex&eacute;cut&eacute; sur le serveur, g&eacute;n&eacute;rant ainsi le HTML, qui sera ensuite envoy&eacute; au client. Le client ne re&ccedil;oit que le r&eacute;sultat du script, sans aucun moyen d\'avoir acc&egrave;s au code qui a produit ce r&eacute;sultat. Vous pouvez configurer votre serveur web afin qu\'il analyse tous vos fichiers HTML comme des fichiers PHP. Ainsi, il n\'y a aucun moyen de distinguer les pages qui sont produites dynamiquement des pages statiques.\r\n\r\nLe grand avantage de PHP est qu\'il est extr&ecirc;mement simple pour les n&eacute;ophytes, mais offre des fonctionnalit&eacute;s avanc&eacute;es pour les experts. Ne craignez pas de lire la longue liste de fonctionnalit&eacute;s PHP. Vous pouvez vous plonger dans le code, et en quelques instants, &eacute;crire des scripts simples.\r\n\r\nBien que le d&eacute;veloppement de PHP soit orient&eacute; vers la programmation pour les sites web, vous pouvez en faire bien d\'autres usages. Lisez donc la section Que peut faire PHP ? ou bien le tutoriel d\'introduction si vous &ecirc;tes uniquement int&eacute;ress&eacute; dans la programmation web.', 29, '2020-03-04 12:10:55', '2020-04-08 11:24:25'),
(46, 'Programmation orient&eacute;e objet', 'Cela se complique encore... ou pas ! ', 'Qu\'est ce qu\'un objet? La programmation orient&eacute;e objet est plus naturelle donc plus intuitive. Si c\'est le cas, c\'est parce qu\'elle utilise des entit&eacute;s appel&eacute;es objets. Un objet poss&egrave;de sa propre structure interne qui d&eacute;finit ses propri&eacute;t&eacute;s et son comportement. Si on compare avec le monde r&eacute;el, les objets sont partout autour de nous. Une personne est un objet, une voiture en est un autre, une maison, une &eacute;cole une t&eacute;l&eacute;, un ballon... tous sont des objets. Prenons l\'objet &quot;voiture&quot;. Bien qu\'il en existe plusieurs mod&egrave;les, le fait d\'&eacute;voquer le mot &quot;voiture&quot; fait penser &agrave; des points comme: couleur options puissance du moteur vitesse nombre de rapports de vitesse ... Ces points repr&eacute;sentent les caract&eacute;ristiques (ou propri&eacute;t&eacute;s) de l\'objet voiture. Dans le jargon de la POO on les appelles des attributs. Cependant, une voiture peut aussi entamer des actions, par exemple: Acc&eacute;l&eacute;rer Ralentir Tourner &agrave; droite Tourner &agrave; gauche Reculer ... Vous avez sans doute remarqu&eacute; que j\'ai utilis&eacute; des verbes pour sp&eacute;cifier les actions que peut entreprendre une voiture. L\'ensemble de ces actions constitue le comportement de celle-ci. En POO on les appelles des m&eacute;thodes. Une classe c\'est quoi? Les objets de la POO doivent &ecirc;tre cr&eacute;&eacute;s d\'abord pour pouvoir &ecirc;tre manipul&eacute;s apr&egrave;s. C\'est la classe qui se charge de donner vie aux objets. Une classe est une structure coh&eacute;rente de propri&eacute;t&eacute;s (attributs) et de comportements (m&eacute;thodes). C\'est elle qui contient la d&eacute;finition des objets qui vont &ecirc;tre cr&eacute;&eacute;s apr&egrave;s. En g&eacute;n&eacute;ral on consid&egrave;re une classe comme un moule &agrave; objets. Avec un seul moule on peut cr&eacute;er autant d\'objets que l\'on souhaite.', 28, '2020-03-06 20:07:34', '2020-03-17 18:21:21'),
(49, 'Laravel', 'C\'est quoi ? ', 'Laravel est un framework web open-source &eacute;crit en PHP respectant le principe mod&egrave;le-vue-contr&ocirc;leur et enti&egrave;rement d&eacute;velopp&eacute; en programmation orient&eacute;e objet. Laravel est distribu&eacute; sous licence MIT, avec ses sources h&eacute;berg&eacute;es sur GitHub.', 29, '2020-03-02 08:07:09', '2020-03-24 18:46:30'),
(50, 'Langages de progammation', 'Le top 10 ! ', 'Il existe beaucoup de langages de programmation&hellip; tellement &agrave; vrai dire, qu&rsquo;il en existe au moins un pour chaque lettre de l&rsquo;alphabet !\r\n\r\nLes plus connus sont le JavaScript, Java, Python, C#, PHP, C, C++, Ruby, Swift et l&rsquo;Objective-C.\r\n\r\nQuand on est d&eacute;butant il est difficile de choisir son premier langage. On a peur de &laquo; prendre le mauvais &raquo;.\r\n\r\nDans cet article je vais vous expliquer les crit&egrave;res &agrave; prendre en compte pour choisir son premier langage quand on est d&eacute;butant en programmation.\r\n\r\nEnfin, vous d&eacute;couvrirez pourquoi je conseille d&rsquo;apprendre le JavaScript comme premier langage de programmation.', 36, '2020-02-02 09:49:53', '2020-03-24 18:39:16'),
(51, 'JavaScript vs JAVA et PHP', 'Quoi choisir ?', 'Il est pr&eacute;f&eacute;rable de faire une comparaison entre JavaScript et Java ainsi qu\'entre JavaScript et PHP. Cela vous permettra de reconna&icirc;tre les similitudes et les diff&eacute;rences.\r\n\r\nSimilarit&eacute;s entre JavaScript et Java\r\nBien que ces deux langues soient diff&eacute;rents, il existe des similitudes &agrave; un niveau plus large.\r\n\r\nPOO Concept\r\nLes deux langues suivent le concept POO. Vous &ecirc;tes d&eacute;j&agrave; conscient de l\'utilisation d\'objets en Java. Similaire &agrave; cela, dans JS, les objets sont en relations entre eux.\r\n\r\nDeveloppement Front-End\r\nAlors JavaScript peut &ecirc;tre directement ajout&eacute; au HTML, Java peut &eacute;galement &ecirc;tre utilis&eacute; comme applets Java.\r\n\r\nDiff&eacute;rence entre JavaScript et JAVA\r\nAlors JavaScript peut &ecirc;tre directement ajout&eacute; au HTML, Java peut &eacute;galement &ecirc;tre utilis&eacute; comme applets Java.\r\n\r\nPlateforme d\'utilisation\r\nJava s\'ex&eacute;cute sur JVM (Java Virtual Machine) pour lequel vous avez besoin de JDK ou JRE. Alors que JavaScript fonctionne sur un navigateur Web, donc il n\'est pas n&eacute;cessaire d\'avoir une plate-forme sp&eacute;cifique. Il faut savoir que tous les navigateurs les plus r&eacute;cents supportent JavaScript.\r\n\r\nDisponibilit&eacute;\r\nEn termes de disponibilit&eacute;, Java est disponible partout et est &eacute;galement consid&eacute;r&eacute; comme un langage de programmation ind&eacute;pendant. D\'autre part, JavaScript est limit&eacute; &agrave; &ecirc;tre utilis&eacute; avec HTML et CSS.\r\n\r\nCompilation\r\nJava est un langage compil&eacute; et interpr&eacute;t&eacute; alors que JavaScript est juste un code texte. Cela signifie que le code &eacute;crit pour JS est interpr&eacute;t&eacute; sur diff&eacute;rentes plates-formes.\r\n\r\nConstructeurs\r\nLes constructeurs sont utilis&eacute;s en Java lors de la cr&eacute;ation d\'objets alors que, dans JS, les constructeurs ne sont qu\'une fonction standard.\r\n\r\nSimilarit&eacute;s entre JavaScript et PHP\r\nLa bataille entre JavaScript et PHP est plus importante car ces deux langues sont une partie importante du d&eacute;veloppement Web.\r\n\r\nPort&eacute;e d\'utilisation\r\nPHP (Hypertext Preprocessor), ainsi que JavaScript, sont utilis&eacute;s pour le d&eacute;veloppement web. Leur importance aide le codeur &agrave; construire une interface utilisateur attrayante avec de solides fonctionnalit&eacute;s back-end.\r\n\r\nLangages interpr&eacute;t&eacute;s\r\nPHP et JavaScript sont appel&eacute;s langages interpr&eacute;t&eacute;s (ou scripts). Cela signifie que le code est fait pour fonctionner sur leurs environnements respectifs (navigateur et serveur pour JavaScript et PHP respectivement)\r\n\r\nDiff&eacute;rences entre JavaScript et PHP, Serveur et Client\r\nLes deux langues sont diff&eacute;rentes sur la base de front-end et back-end. Le langage de script JavaScript est un langage frontal (sauf Node.js) tandis que PHP est une langue c&ocirc;t&eacute; serveur.\r\n\r\nConcurrence\r\nEn PHP, le concept de multi-threading est disponible pour traiter plusieurs demandes simultan&eacute;ment. D\'autre part, en JavaScript, le codeur ne sont fournis qu\'avec certaines tactiques comme la boucle d\'&eacute;v&eacute;nement + Node clustering qui aide &agrave; traiter avec le m&ecirc;me.\r\n\r\nPOO\r\nComme d&eacute;j&agrave; mentionn&eacute;, JavaScript utilise les objets et les relations entre eux tout en codant un script. D\'autre part, PHP est un langage proc&eacute;dural orient&eacute; objet.\r\n\r\nCompatibilit&eacute;\r\nJavaScript peut &ecirc;tre int&eacute;gr&eacute; avec HTML, XML et AJAX. D\'autre part, PHP ne peut &ecirc;tre int&eacute;gr&eacute; avec HTML. Il ne peut pas &ecirc;tre utilis&eacute; avec XML. Cependant, il existe d\'autres options pour utiliser la m&ecirc;me chose avec XML.\r\n\r\nConclusion\r\nEn conclusion, la comparaison indique clairement que JavaScript est un peu similaire &agrave; Java et PHP, mais n\'est en aucun cas une alternative &agrave; ces langues. Vous pouvez utiliser JS comme un langage de soutien, mais vous ne pouvez pas en faire le langue de base pour le codage d\'un site internet ou d\'une application.\r\n\r\nLa port&eacute;e de JavaScript s\'am&eacute;liore avec l\'introduction de Node.js, Angular.js et d\'autres scripts. Ainsi, si vous &ecirc;tes un d&eacute;veloppeur web, l\'apprentissage de JavaScript sera toujours un avantage pour vos connaissances et vos comp&eacute;tences.\r\n\r\n', 40, '2019-11-01 14:09:16', '2020-03-24 20:44:06'),
(52, 'HR Technologie ! ', 'Pourquoi les entreprises doivent s\'approprier les nouvelles m&eacute;thodes de recrutement ?', 'Depuis quelques temps d&eacute;j&agrave;, les m&eacute;thodes de recrutement ne se limitent plus au classique envoi de CV-entretien-embauche. Si cela reste souvent de mise, la s&eacute;lection est d&eacute;sormais en partie automatis&eacute;e et s&rsquo;&eacute;tablit par d&rsquo;autres canaux. LinkedIn en a fait une de ses raisons d&rsquo;&ecirc;tre. Facebook s&rsquo;est tout r&eacute;cemment lanc&eacute; dans la course avec un onglet &laquo; job &raquo; sur les pages des entreprises pour pouvoir poster leurs offres d&rsquo;emploi et recevoir les candidatures des utilisateurs. Un autre g&eacute;ant de la tech a annonc&eacute; en septembre concevoir un outil sp&eacute;cialis&eacute; : avec IRIS by Watson, IBM souhaite utiliser le machine learning pour d&eacute;terminer les priorit&eacute;s et la difficult&eacute; &agrave; pourvoir un poste. M&ecirc;me Google pr&eacute;sentait il y a quelques jours son Cloud Jobs API cr&eacute;&eacute; pour &laquo; am&eacute;liorer le processus de recrutement &raquo; en faisant correspondre demandes et offres d&rsquo;emploi. La tendance dans le domaine est donc clairement &agrave; l&rsquo;utilisation d&rsquo;intelligences artificielles.', 34, '2020-02-17 16:07:31', '2020-03-24 18:44:02'),
(53, 'ANGULAR, le framework Google', 'C\'est ici !!!!!!!', 'Il faut diff&eacute;rencier Angular de React par leur logique radicalement diff&eacute;rente : alors qu&rsquo;Angular offre un framework officiel de JavaScript, React est une biblioth&egrave;que qui traite des vues.\r\n\r\nAngular offre de nombreuses solutions et conceptions pr&ecirc;tes &agrave; l&rsquo;emploi. Le framework a connu de multiples transformations au cours de ses diff&eacute;rentes versions. A l&rsquo;heure actuelle, nous en sommes d&eacute;j&agrave; &agrave; sa 6e version (sortie le 3 mai 2018), et la beta de la version 7 se pr&eacute;pare &agrave; sortir tr&egrave;s bient&ocirc;t. Angular 6 reste une continuit&eacute; des versions 2 &agrave; 5, et se distingue de la toute premi&egrave;re version d&rsquo;Angular, que l&rsquo;on appelle AngularJS. En effet, d&egrave;s Angular2, l&rsquo;&eacute;quipe de d&eacute;veloppement a enti&egrave;rement r&eacute;&eacute;crit le framework pour adopter une approche orient&eacute;e composants et utiliser du Typescript.\r\n\r\nAngular donne la possibilit&eacute; de faire des composants en JavaScript. Son approche est plut&ocirc;t modulaire et permet donc &laquo; bootstrapper &raquo; des modules dans une application, en se basant sur du Webpack et surtout sur l&rsquo;usage d&rsquo;observables. La familiarisation avec les observables est donc assez importante pour quiconque souhaite se sp&eacute;cialiser dans le d&eacute;veloppement Angular.\r\n\r\nPour aider &agrave; d&eacute;velopper un projet plus rapidement, Angular est particuli&egrave;rement appr&eacute;ci&eacute; pour son outil CLI tr&egrave;s puissant, qui le rend scalable et permet de g&eacute;n&eacute;rer des skeletons d&rsquo;applications, des classes, services et composants depuis son propre terminal. Angular reste une excellente solution pour programmer des applications web hautement interactives.', 33, '2020-03-07 08:13:29', '2020-03-17 18:21:03'),
(54, 'Symfony', '5 bonnes raisons de l\'utiliser !', 'Pour mieux comprendre ce qu&rsquo;est un framework tel que Symfony, reprenons l&rsquo;histoire depuis le d&eacute;but.\r\n\r\nLe d&eacute;veloppement avant, c&rsquo;&eacute;tait &ccedil;a : des d&eacute;veloppeurs cr&eacute;ant leur propre code et leurs propres librairies de fonctions, chacun de leur c&ocirc;t&eacute;, de mani&egrave;re cloisonn&eacute;e. Avec pour r&eacute;sultat un code parfois mauvais ou encore des probl&egrave;mes de compatibilit&eacute;.\r\n\r\nImaginez alors des centaines de d&eacute;veloppeurs mutualisant leurs comp&eacute;tences et partageant toutes les librairies. Vous comprenez alors le principal int&eacute;r&ecirc;t d&rsquo;un framework open source tel que Symfony : utiliser des briques d&eacute;j&agrave; cr&eacute;&eacute;es et test&eacute;es tout en profitant d&rsquo;un cadre normalisant le code et l&rsquo;architecture.\r\n\r\nLES AVANTAGES\r\ndu framework Symfony\r\n\r\nUn framework, ou cadre de travail en fran&ccedil;ais, est une bo&icirc;te &agrave; outils servant &agrave; cr&eacute;er les fondations, l&rsquo;architecture et les grandes lignes du d&eacute;veloppement d&rsquo;un site web ou d&rsquo;une application. Il est con&ccedil;u pour faciliter la r&eacute;alisation d&rsquo;un projet en prenant en charge les t&acirc;ches r&eacute;currentes et fastidieuses.\r\n\r\n', 33, '2020-03-05 11:22:41', '2020-03-24 18:44:49'),
(61, 'PHP 7 ', 'Enfin', 'Dans cette nouvelle version de PHP, nous avons le droit de d&eacute;couvrir un nouvel op&eacute;rateur. Celui-ci se nomme &quot;spaceship&quot; (car le cr&eacute;ateur trouvait qu\'il ressemblait aux vaisseaux dans Star Wars) et se pr&eacute;sente sous la forme &quot;&lt;=&gt;&quot;. Cet op&eacute;rateur permet de tester deux expressions, comme les op&eacute;rateurs &quot;&lt;&quot;, &quot;&gt;&quot; et &quot;=&quot; mais tout cela en un seul op&eacute;rateur ! En effet, lors d\'une comparaison de deux expressions (sous la forme &quot;expr1 &lt;=&gt; expr2&quot;), cet op&eacute;rateur retourne soit -1, 0 ou 1. Lorsque la comparaison sera vraie pour &quot;&lt;&quot;, cet op&eacute;rateur retournera -1, lorsqu\'elle sera vraie pour &quot;=&quot;, cet op&eacute;rateur retournera 0 et lorsqu\'elle sera vraie pour &quot;&gt;&quot;, cet op&eacute;rateur retournera 1. Dans cette nouvelle version, une autre fonctionnalit&eacute; est ajout&eacute;e, mais celle-ci est appliqu&eacute;e aux fonctions. En effet, nous pouvons maintenant d&eacute;clarer le type de la variable qui sera retourn&eacute;e par les fonctions. Cette d&eacute;claration se fait apr&egrave;s la d&eacute;claration de la fonction et des &eacute;ventuels arguments, plac&eacute;e juste apr&egrave;s ce caract&egrave;re &quot;:&quot;. Si le type retourn&eacute; par la fonction ne correspond au type pr&eacute;cis&eacute;, une erreur appara&icirc;tra. Cela permet de contr&ocirc;ler le type de valeur retourn&eacute; par la fonction pour &eacute;viter des soucis de compatibilit&eacute; avec d\'autres fonctions. Cela peut s\'av&eacute;rer tr&egrave;s utile, cependant cette d&eacute;claration est optionnelle ! Un autre op&eacute;rateur est ajout&eacute; dans cette nouvelle version de PHP. En effet, nous avons le droit &agrave; l\'op&eacute;rateur &quot;??&quot; qui nous permet de gagner du temps ! Cet op&eacute;rateur permet de tester si un &eacute;l&eacute;ment existe. Il s\'utilise en pla&ccedil;ant &quot;??&quot; derri&egrave;re l\'&eacute;l&eacute;ment en question, suivi d\'un autre &eacute;l&eacute;ment qui sera retourn&eacute; si ce premier n\'existe pas. L\'ancienne fa&ccedil;on de proc&eacute;der voulait que l\'on utilise un &quot;isset()&quot; et un &quot;:&quot;, mais cela n\'&eacute;tait pas pratique en comparaison &agrave; ce nouvel op&eacute;rateur Nous avons vu quelques fonctionnalit&eacute;s qui ont &eacute;t&eacute; rajout&eacute;es avec le PHP 7. Ces fonctionnalit&eacute;s permettent, en majorit&eacute;, &agrave; rendre notre code plus compact et plus propre. Il existe encore d\'autres diff&eacute;rences (que vous pouvez voir sur le site officiel PHP) mais celles-ci sont les principales nouveaut&eacute;s. La diff&eacute;rence la plus importante entre le PHP 5 et le PHP 7 restera tout de m&ecirc;me les performances qui sont nettements augment&eacute;es !', 33, '2020-03-17 18:28:42', '2020-03-24 19:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `role` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `state` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `lastName`, `firstName`, `email`, `username`, `mdp`, `role`, `created_at`, `update_at`, `state`) VALUES
(28, 'Daniel', 'Daniel', 'daniel@daniel@.com', 'danou', '$2y$10$foj7c63I0ZGHljXMlpIuP.M0qh3sVPs4.rU940FMnGxuw03ragJja', 0, '2020-02-17 19:50:28', '2020-02-17 19:50:28', 0),
(29, 'Stephanie', 'Stephanie', 'Stephanie', 'Stephanie', '$2y$10$foj7c63I0ZGHljXMlpIuP.M0qh3sVPs4.rU940FMnGxuw03ragJja', 0, '2020-02-18 19:46:22', '2020-02-18 19:46:22', 0),
(33, 'Bouhlel', 'Mohamed', 'mohamed.bouhleel@gmail.com', 'Mohamedbhl', '$2y$10$9em1IDPIZBmQo/DKDGE8EegpIJtVx83FI6Pj.vomnSGmxekzUA3Ba', 0, '2020-03-07 16:48:22', '2020-03-07 16:48:22', 0),
(34, 'Champs', 'Dominique', 'dominique@gmail.com', 'Dom', '$2y$10$x4tZqyjOI9biwY8KiA3tvehi7zKpIKNqn024L5pbJTdQf0LFewB9e', 1, '2020-03-07 16:49:11', '2020-03-07 16:49:11', 1),
(36, 'LeBlanc', 'Jaghued', 'leblanc@gmail.com', 'Jaghued', '$2y$10$vPGzTYlNm0IuBVMPY4F8hO/l6efGe7/3UnUyXdkdHO.hrbwI4iSkO', 1, '2020-03-07 16:50:36', '2020-03-07 16:50:36', 1),
(37, 'Fernandes', 'Gabriel', 'gabriel@hotmail.fr', 'Gabriel', '$2y$10$drP3mWbHsSFxqBtB8L7p8eiHtaLeX06uCGA1rBIXJJPPgVYiejDYy', 0, '2020-03-07 16:51:20', '2020-03-07 16:51:20', 1),
(38, 'Bush', 'Thibault', 'bush.thibault@live.fr', 'Thibault', '$2y$10$EpCLYTF1qhiV2FoExWkQaumFn/WptEMUuLPzP50eAdzKWZanCQp82', 0, '2020-03-07 16:52:00', '2020-03-07 16:52:00', 1),
(40, 'Lodge', 'Pops', 'pops@gmail.com', 'Pops', '$2y$10$7MWEEcM2Lin6/pXJ61L2A.1ocCy/paIBJX2OtTOZTD4qLE3aiOl0e', 1, '2020-03-07 16:54:02', '2020-03-07 16:54:02', 1),
(59, 'Bouhlel', 'Mohamed', 'admin@admin.com', 'admin', '$2y$10$ukoAW.bhjMBlGtIHD0rdYePStuZB3is.QkTWtosF4coY1sxas00li', 1, '2020-03-18 12:08:33', '2020-03-18 12:08:33', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Comments_ibfk_1` (`id_user`),
  ADD KEY `Comments_ibfk_2` (`id_post`);

--
-- Indexes for table `Posts`
--
ALTER TABLE `Posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Posts_ibfk_1` (`id_author`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Comments`
--
ALTER TABLE `Comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `Posts`
--
ALTER TABLE `Posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Comments`
--
ALTER TABLE `Comments`
  ADD CONSTRAINT `Comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Comments_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `Posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Posts`
--
ALTER TABLE `Posts`
  ADD CONSTRAINT `Posts_ibfk_1` FOREIGN KEY (`id_author`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
