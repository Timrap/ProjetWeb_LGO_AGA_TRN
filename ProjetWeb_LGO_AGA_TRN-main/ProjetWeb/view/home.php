<?php
/**
 * @file      lost.php
 * @brief     This view is designed to inform the user when he tries to navigate to an resource who doesn't exist
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 */

$title = 'Rent A Snow - Lost';

ob_start();
?>   <!-- Title Page -->
<div id="page" class="container">
	<div class="title">
		<h2>Maecenas luctus lectus</h2>
	</div>
	<div class="boxA">
		<div class="box">
			<img src="images/img02.jpg" width="320" height="180" alt="" />
			<h3>Mauris vulputate  </h3>
			<p>Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
			<a href="#" class="button">Read More</a>
		</div>
		<div class="box">
			<img src="images/img05.jpg" width="320" height="180" alt="" />
			<h3>Praesent scelerisque</h3>
			<p>Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
			<a href="#" class="button">Read More</a>
		</div>
	</div>
	<div class="boxB">
		<div class="box">
			<img src="images/img03.jpg" width="320" height="180" alt="" />
			<h3>Donec dictum metus</h3>
			<p>Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
			<a href="#" class="button">Read More</a>
		</div>
		<div class="box">
			<img src="images/img06.jpg" width="320" height="180" alt="" />
			<h3>Nulla luctus eleifend</h3>
			<p>Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
			<a href="#" class="button">Read More</a>
		</div>
	</div>
	<div class="boxC">
		<div class="box">
			<img src="images/img04.jpg" width="320" height="180" alt="" />
			<h3>Integer gravida nibh</h3>
			<p>Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
			<a href="#" class="button">Read More</a>
		</div>
		<div class="box">
			<img src="images/img07.jpg" width="320" height="180" alt="" />
			<h3>Fusce ultrices fringilla</h3>
			<p>Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
			<a href="#" class="button">Read More</a>
		</div>
	</div>
</div>
<div id="welcome" class="container">
	<h2>Welcome to our website</h2>
	<p>This is <strong>Porphyrio</strong>, a free, fully standards-compliant CSS template designed by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>. The photos in this template are from <a href="http://fotogrph.com/"> Fotogrph</a>. This free template is released under the <a href="http://templated.co/license">Creative Commons Attribution</a> license, so you're pretty much free to do whatever you want with it (even use it commercially) provided you give us credit for it. Have fun :) </p>
</div>
<?php
$content = ob_get_clean();
require 'gabarit.php';
?>