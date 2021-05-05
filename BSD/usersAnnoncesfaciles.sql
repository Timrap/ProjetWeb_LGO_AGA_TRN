-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           8.0.21 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Listage des données de la table annoncesfaciles.users : ~0 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`idUsers`, `Firstname`, `Lastname`, `Mail`, `Type`, `PasswordHash`) VALUES
	(2, 'Gatto', 'Luca', 'gatto.luca24@gmail.com', 3, '$2y$10$eyo8U7xX/yJIZC6WPbbvde1Lat/ZFzj8YqhFvN9EOI85Pg8QQrad.'),
	(3, 'Sébastien', 'Moraz', 'Sebastien.MORAZ@cpnv.ch', 0, '$2y$10$411b/eBMwpwxU/gjBNxdMeBe6G7ly1Xj.bJUlDpc2nxXJnhhhMAuG'),
	(4, 'Enzo', 'Nonnenmacher', 'Enzo.NONNENMACHER@cpnv.ch', 0, '$2y$10$pfM.x6s49F88elf8rcRHRuEvpxrYbo62YEmQL3HIdd2LFaOrluwne'),
	(5, 'Kevin', 'Gomes', 'kevin.GOMES@cpnv.ch', 0, '$2y$10$ulgx1tc0zBFJmfWTu0O1KOKz4FFAKanmPR8VlpI1OuNIWy6gSCZ12'),
	(6, 'Nolan', 'Evard', 'nolan.EVARD@cpnv.ch', 0, '$2y$10$sx99eTUQgdDF4MIZo5Qel.kdB8wuT2/D3KFrXTIBTgd4.K0a3MMYi'),
	(7, 'Antoine', 'Roulin', 'antoine.ROULIN@cpnv.ch', 0, '$2y$10$7IEnUoV5nj434S6bJLkpEe19mpwhs4azolrtqOC/7F30kMLzZc/ru'),
	(8, 'Kevin', 'Vaucher', 'kevin.VAUCHER@cpnv.ch', 0, '$2y$10$HcA/azoMlVjEDAfQwACBi.joIAlsCbCbbjdoaA4xnC7RNh218i7Tm');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
