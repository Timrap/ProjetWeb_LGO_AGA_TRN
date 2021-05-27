DELETE FROM users;

INSERT INTO `users` (`firstName`, `lastName`, `mail`, `type`, `passwordHash`) VALUES
	('Rapin', 'Timothée', 'timothee.rapin@cpnv.ch', 2, '$2y$10$ZFNfBI4L7syajgcl4ya0u.MhrjQD4LztnHVm04vSGCptboc6gzs.a'),
	('Gatto', 'Luca', 'gatto.luca24@gmail.com', 2, '$2y$10$eyo8U7xX/yJIZC6WPbbvde1Lat/ZFzj8YqhFvN9EOI85Pg8QQrad.'),
	('Sébastien', 'Moraz', 'Sebastien.MORAZ@cpnv.ch', 0, '$2y$10$411b/eBMwpwxU/gjBNxdMeBe6G7ly1Xj.bJUlDpc2nxXJnhhhMAuG'),
	('Enzo', 'Nonnenmacher', 'Enzo.NONNENMACHER@cpnv.ch', 0, '$2y$10$pfM.x6s49F88elf8rcRHRuEvpxrYbo62YEmQL3HIdd2LFaOrluwne'),
	('Kevin', 'Gomes', 'kevin.GOMES@cpnv.ch', 0, '$2y$10$ulgx1tc0zBFJmfWTu0O1KOKz4FFAKanmPR8VlpI1OuNIWy6gSCZ12'),
	('Nolan', 'Evard', 'nolan.EVARD@cpnv.ch', 0, '$2y$10$sx99eTUQgdDF4MIZo5Qel.kdB8wuT2/D3KFrXTIBTgd4.K0a3MMYi'),
	('Antoine', 'Roulin', 'antoine.ROULIN@cpnv.ch', 0, '$2y$10$7IEnUoV5nj434S6bJLkpEe19mpwhs4azolrtqOC/7F30kMLzZc/ru'),
	('Kevin', 'Vaucher', 'kevin.VAUCHER@cpnv.ch', 0, '$2y$10$HcA/azoMlVjEDAfQwACBi.joIAlsCbCbbjdoaA4xnC7RNh218i7Tm');