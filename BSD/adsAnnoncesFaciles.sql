DELETE FROM advertisements;

/*
	Catégories
	
	1	Véhicule motorisé			
	2	Appareil éléctronique	
	3	Mobilier						
	4	Bijou							
	5	Immobilier					
	6	Décoration					
*/

INSERT INTO `advertisements` (`title`, `category`, `description`, `image`, `price`,`enable`, `Users_id`) VALUES
	('Table basse en marbre', 3, 'Hauteur: 38cm. \n Largeur: 59 cm. \n Longueur: 68 cm. \n Très lourde.', './view/contents/images/table basse en marbre.jpg', 50, 1, 1),
	('VW Golf 8 - 1.5 eTSI mHEV ACT DSG, Style', 1, 'Boîte à vitesses : \t Automatique \n Kilométrage : \t 19 000 \n Dernière expertise : \t Juin 2020 \n Couleur : \t Blanc \n Carrosserie : \t Voiture classique \n Carburant : \t Essence \n Modèle : \t Golf \n Marque : \t VW', './view/contents/images/VW Golf 8.jpg', 29900, 1, 1),
	
	('Support pour projecteur-Formica vintage', 3, 'Support en formica pour projecteur des années 70. \n Negema Bussum Holland. \n Hauteur: 108 cm. \n Largeur: 85 / 30 cm.', './view/contents/images/Support pour projecteur-Formica vintage.jpg', 98, 1, 2),
	('Lave vaisselle Bosch Série 2 SliencePlus', 3, 'Largeur : \t 45 cm \n Longueur : \t 60 cm \n Hauteur : \t 84 cm \n Marque : \t Bosch \n CO₂ économisé : \t 243 kg', './view/contents/images/Lave vaisselle Bosch Série 2 SliencePlus.jpg', 169, 1, 2),
	
	('Garmin fenix 6x sapphire', 4, 'Dimension (diamètre) : \t 51 mm \n Marque : \t Fenix', './view/contents/images/Garmin fenix 6x sapphire.jpg', 600, 1, 3),
	('Mini Cooper Top Zustand', 1, 'Boîte à vitesses : \t Manuelle \n Kilométrage : \t 138 000 \n Dernière expertise : \t Décembre 2020 \n Couleur : \t Rouge \n Carrosserie : \t Limousine \n Carburant : \t Essence \n Modèle : \t Mini \n Marque : \t Mini', './view/contents/images/Mini Cooper Top Zustand.jpg', 4000, 1, 3),
	
	('LCD TV Panasonic TX-L37ETN53', 2, 'Dimension : \t 37 pouces \n Marque : \t Panasonic', './view/contents/images/LCD TV Panasonic TX-L37ETN53.jpg', 193, 1, 4),
	('Cabanon de jardin', 5, '213 x 130 x 173 cm', './view/contents/images/Cabanon de jardin.jpg', 149, 1, 4),
	
	('Samsung Galaxy s8', 2, 'noir, 64 Go', './view/contents/images/Samsung Galaxy s8.jpg', 127, 1, 5),
	('Fontaine Indoor Collection Nature', 6, 'petite fontaine pour Intérieur', './view/contents/images/Fontaine Indoor Collection Nature.jpg', 120, 1, 5);