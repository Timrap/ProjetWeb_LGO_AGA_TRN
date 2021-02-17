<?php
/**
 * @file      lost.php
 * @brief     This view is designed to inform the user when he tries to navigate to an resource who doesn't exist
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 */

$title = 'annoncesfaciles - home';

ob_start();
?>   <!-- Title Page -->
<div id="page" class="container">
	<div class="title">
		<h2>Catégories</h2>
	</div>

	<div class="boxA">
		<div class="box">
			<img src="view/contents/annonce1-passat/1.jpg" width="320" height="180" alt="" />
			<h3>Voitures</h3>
			<p>Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
			<a href="#" class="button">Read More</a>
		</div>
		<div class="box">
			<img src="view/contents/annonce2-iphone/iphone1.jpg" width="320" height="180" alt="" />
			<h3>Smartphones</h3>
			<p>Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
			<a href="#" class="button">Read More</a>
		</div>
	</div>
	<div class="boxB" id="box1">
		<div class="box">
			<img src="view/contents/annonce3-montre/montre1.jpg" width="320" height="180" alt="" />
			<h3>Montres</h3>
			<p>Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
			<a href="#" class="button">Read More</a>
		</div>
		<div class="box">
			<img src="view/contents/annonce4-table/table.jpg" width="320" height="180" alt="" />
			<h3>Tables</h3>
			<p>Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
			<a href="#" class="button">Read More</a>
		</div>
	</div>
	<div class="boxC">
		<div class="box">
			<img src="view/contents/annonce5-ordinateur/ordinateur1.jpg" width="320" height="180" alt="" />
			<h3>Ordinateurs</h3>
			<p>Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
			<a href="#" class="button">Read More</a>
		</div>
		<div class="box">
			<img src="view/contents/annonce6-playstation/playstation1.jpg" width="320" height="180" alt="" />
			<h3>Consoles</h3>
			<p>Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
			<a href="#" class="button">Read More</a>
		</div>

	</div>
</div>
<?php
$content = ob_get_clean();
require 'gabarit.php';
?>