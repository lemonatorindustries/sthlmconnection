-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Värd: localhost
-- Tid vid skapande: 04 apr 2018 kl 17:25
-- Serverversion: 5.5.52-MariaDB
-- PHP-version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `sthlmconnection`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `assignees`
--

CREATE TABLE IF NOT EXISTS `assignees` (
  `assignee_id` int(11) NOT NULL,
  `assignees_level` int(2) NOT NULL DEFAULT '0',
  `assignee_name` varchar(50) NOT NULL,
  `assignee_phone` varchar(20) NOT NULL,
  `assignee_email` varchar(50) NOT NULL,
  `assignee_available` tinyint(1) NOT NULL DEFAULT '0',
  `assignee_line_busy` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `assignees`
--

INSERT INTO `assignees` (`assignee_id`, `assignees_level`, `assignee_name`, `assignee_phone`, `assignee_email`, `assignee_available`, `assignee_line_busy`) VALUES
(1, 0, 'SupportPerson1', '39', 'supportperson1@callcenter.se', 1, 0),
(2, 0, 'SupportPerson2', '40', 'supportperson2@callcenter.se', 1, 1),
(3, 0, 'Teknikansvarig', '10', 'teknikansvarig@callcenter.se', 1, 1),
(4, 0, 'Projektledare', '20', 'projektledare@callcenter.se', 1, 1),
(5, 0, 'SupportPerson3', '41', 'supportperson3@callcenter.se', 0, 0);

-- --------------------------------------------------------

--
-- Tabellstruktur `ticket_info`
--

CREATE TABLE IF NOT EXISTS `ticket_info` (
  `id` int(11) NOT NULL,
  `ticket_info_id` int(6) NOT NULL,
  `ticket_description` text,
  `ticket_status` varchar(20) DEFAULT NULL,
  `ticket_assignee` int(11) DEFAULT NULL,
  `ticket_action` varchar(20) DEFAULT NULL,
  `ticket_need_escalation` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `ticket_info`
--

INSERT INTO `ticket_info` (`id`, `ticket_info_id`, `ticket_description`, `ticket_status`, `ticket_assignee`, `ticket_action`, `ticket_need_escalation`) VALUES
(1, 18546, 'Kunden vill ha hjälp att förkorta protonkabelsddförlängaren!', 'unassigned', 1, '', 3),
(2, 97699, 'Kunden ringde igen och undrar om en tekniker skall komma.\r\nHar bokat tekniker.', 'in_progress', 1, 'Skicka tekniker', 4),
(3, 18546, 'Kunden vill ha hjälp att förkorta protonkabelsddförlängaren!', 'unassigned', 1, '', 3),
(9, 37568, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam. In scelerisque sem at dolor. Maecenas mattis. Sed convallis tristique sem. Proin ut ligula vel nunc egestas porttitor. Morbi lectus risus, iaculis vel, suscipit quis, luctus non, massa. Fusce ac turpis quis ligula lacinia aliquet. Mauris ipsum. Nulla metus metus, ullamcorper vel, tincidunt sed, euismod in, nibh. Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante. Sed lacinia, urna non tincidunt mattis, tortor neque adipiscing diam, a cursus ipsum ante quis turpis. Nulla facilisi. Ut fringilla. Suspendisse potenti. Nunc feugiat mi a tellus consequat imperdiet. Vestibulum sapien. Proin quam. Etiam ultrices. Suspendisse in justo eu magna luctus suscipit. Sed lectus. Integer euismod lacus luctus magna. Quisque cursus, metus vitae pharetra auctor, sem massa mattis sem, at interdum magna augue eget diam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi lacinia molestie dui. Praesent blandit dolor. Sed non quam. In vel mi sit amet augue congue elementum. Morbi in ipsum sit amet pede facilisis laoreet. Donec lacus nunc, viverra nec.', 'In Progress', 44, 'Laga', 6),
(12, 62757, 'Test.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse mollis ultricies lacus, ac congue nisi malesuada et. Etiam varius venenatis luctus. In sollicitudin leo nec sapien posuere bibendum. Suspendisse id enim mattis, placerat felis nec, volutpat purus. Aenean eu arcu lacinia, sollicitudin lacus et, placerat eros. In libero quam, luctus in enim non, feugiat rutrum orci. Donec venenatis lorem ac lorem cursus faucibus. Mauris commodo rhoncus libero, ut porta ante facilisis sed...\r\n\r\nMorbi tempor, leo a sollicitudin rutrum, leo erat consectetur mi, in eleifend dui tortor a nulla. Suspendisse placerat egestas condimentum. Sed et est quis massa vehicula iaculis. Maecenas a tellus scelerisque, luctus metus ut, volutpat nulla. Fusce pharetra pellentesque purus, eu bibendum turpis scelerisque id. Etiam rutrum nunc non massa porta ultrices eget vel enim. Nulla dui lectus, dapibus non neque nec, pulvinar commodo ligula. Proin sit amet felis sed sem varius egestas. Vestibulum consectetur vitae urna et commodo. In hac habitasse platea dictumst. Quisque mi risus, egestas sed bibendum eu, iaculis et nisi. Nunc libero dolor, pulvinar et eros sed, sollicitudin lacinia dolor. Morbi massa tellus, tincidunt non urna sed, commodo ornare lorem. Proin mi turpis, blandit ullamcorper justo et, feugiat imperdiet eros. Etiam finibus diam ut nisl consectetur fermentum. Cras laoreet convallis convallis.\r\n\r\nEtiam sed est augue. Nulla ultrices sollicitudin tellus et iaculis. Integer id nisi id est convallis dignissim vitae a erat. Etiam mattis mauris in tellus tempus, viverra sodales quam cursus. Quisque vel ex iaculis, tempor dui a, euismod justo. Vestibulum nec massa id enim imperdiet posuere. Ut rutrum suscipit sem, a venenatis eros mollis non. Suspendisse cursus orci dignissim enim viverra vestibulum. Donec gravida quam eget nunc scelerisque, ac auctor nulla aliquam. Etiam vestibulum sem nulla, eu tempor nibh tristique sed. Vestibulum non commodo velit. In faucibus lorem orci, nec aliquam magna posuere ut. Interdum et malesuada fames ac ante ipsum primis in faucibus.\r\n\r\nDuis maximus lectus dapibus libero finibus, at porttitor nibh ultricies. Cras lacinia arcu lorem, eget commodo justo fermentum id. Sed at luctus nisl, in maximus velit. Nam ac auctor lectus. Vestibulum tortor ante, scelerisque ac mollis eu, eleifend ac neque. Duis malesuada velit sit amet arcu ultrices, sed semper ', 'In Progress', 3, '4', 3),
(13, 341102, 'test', '', 0, '', 0);

-- --------------------------------------------------------

--
-- Tabellstruktur `ticket_reporters`
--

CREATE TABLE IF NOT EXISTS `ticket_reporters` (
  `ticket_id` int(6) NOT NULL,
  `ticket_reporter_phone` varchar(20) NOT NULL,
  `ticket_reporter_name` varchar(50) NOT NULL,
  `ticket_reporter_email` varchar(50) NOT NULL,
  `ticket_created_datetime` datetime DEFAULT NULL,
  `ticket_last_updated_datetime` datetime DEFAULT NULL,
  `ticket_info_id` int(6) NOT NULL,
  `ticket_status` varchar(20) NOT NULL DEFAULT 'Unassigned'
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `ticket_reporters`
--

INSERT INTO `ticket_reporters` (`ticket_id`, `ticket_reporter_phone`, `ticket_reporter_name`, `ticket_reporter_email`, `ticket_created_datetime`, `ticket_last_updated_datetime`, `ticket_info_id`, `ticket_status`) VALUES
(1, '0709262905', 'Jens', 'jens@lemonator.se', '2018-04-04 05:16:28', '2018-04-04 17:46:58', 18546, 'unassigned'),
(3, '123456789', 'Nisse i Skogen', 'malva@lemonator.se', '2018-04-04 13:52:55', '2018-04-04 14:48:04', 37568, 'in_progress'),
(9, '12345', 'Elis ', 'elis@lemonator.se', '2018-04-04 14:48:04', '2018-04-04 19:19:04', 97699, 'in_progress'),
(21, '98765432122', 'Kungen', 'kungen@royalcourt.se', '2018-04-04 15:44:47', '2018-04-04 09:23:29', 34167, 'closed');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `assignees`
--
ALTER TABLE `assignees`
  ADD PRIMARY KEY (`assignee_id`);

--
-- Index för tabell `ticket_info`
--
ALTER TABLE `ticket_info`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `ticket_reporters`
--
ALTER TABLE `ticket_reporters`
  ADD PRIMARY KEY (`ticket_id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `assignees`
--
ALTER TABLE `assignees`
  MODIFY `assignee_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT för tabell `ticket_info`
--
ALTER TABLE `ticket_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT för tabell `ticket_reporters`
--
ALTER TABLE `ticket_reporters`
  MODIFY `ticket_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
