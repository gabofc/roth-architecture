<?php include( 'header.php' ); ?>
<?php include( 'lib/icons.php' ); ?>
	<img src="images/logo.png" class="logo" onclick="contactUs()">
	<div id="wheel">
		<?php
			$count = 1;
			$path = 'images/icons/';
			foreach( $iconsLinks as $icons ) {
				echo
				'<div class="link-icon" id="link-icon-' . $count . '">
					<a class="box-link" href="' . $icons[2] . '">
						<img src="' . $path . $icons[1] . '" class="iconoLista" alt="' . $icons[0] . '">
						<div class="commingSoon">Comming Soon</div>
					</a>
				</div>';
				$count ++;
			}
		?>
	</div>
	<svg viewBox="0 0 100 100" id="textCircle">
		<circle r="48" cx="50" cy="50"/>
		<foreignObject id="text" width="100" height="100">
			<div class="shape shape-left"></div>
			<div class="shape shape-right"></div>
			<div class="text">
				Roth architecture is rooted in the unique combination of three fundamental pillars: nature, ancestry and art.<br>
				It distinguishes itself through an idiosyncratic process which embraces the intelligence of the millenary ecological fabric of life and incorporates human technologies from the ancestral wisdom of the hand of the indigenous communities to artificial intelligence.<br>
				From the unconditional presence to the inspiration of the moment as a collective and the creative flow of nature itself we develop unseen structures akin to living sculptures which prolong the curvature of the earth and open up pathways to new forms of living.<br>
				Transcending the dichotomy between interior and exterior these interfaces allow for a deep reconnection with oneself, the other and the environment and the search for the significance of being human.
			</div>
		</foreignObject>
	</svg>
	<svg viewBox="0 0 100 100" id="formContact">
		<circle r="48" cx="50" cy="50"/>
		<foreignObject id="text" width="100" height="100">
			<div class="shape shape-left"></div>
			<div class="shape shape-right"></div>
			<div class="text contactDiv" id="contacto">
				<h3>Dreamers, do not hesitate to contact us</h3>
				<label for="nombre">Name:</label>
				<div class="tCenter"><input type="text" id="nombre" class="obligatorio"></div>
				<label for="email">Email:</label>
				<div class="tCenter"><input type="email" id="email" class="obligatorio email"></div>
				<label for="mensaje">Message:</label>
				<div class="tCenter"><textarea id="mensaje" class="obligatorio" spellcheck="false"></textarea></div>
				<a href="#" class="enviaForm" onclick="enviar()">Send</a>
			</div>
		</foreignObject>
	</svg>
	<div class="contenidoCentro">
		<img src="images/ants.png" id="intro-image">
	</div>
<?php include( 'footer.php' ); ?>
