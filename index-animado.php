<?php include( 'header.php' ); ?>
<?php include( 'lib/icons.php' ); ?>
<div class="mainContainer">
	<div class="dLogo"><img src="images/logo.png" class="logo agrandado" onclick="abrePagina()"></div>
	<div id="wheel">
		<?php
			$count = 1;
			$path = 'images/icons/';
			foreach( $iconsLinks as $icons ) {
				$imgAnimada = ( $icons[2] != '' ) ? $path . $icons[2] : '';
				echo
				'<div class="link-icon" id="link-icon-' . $count . '">
					<a class="box-link-animado" href="' . $icons[3] . '">
						<img src="' . $path . $icons[1] . '" normal="' . $path . $icons[1] . '" animada="' . $imgAnimada . '" class="iconoLista" alt="' . $icons[0] . '">
						<div class="comingSoon">coming soon</div>
					</a>
				</div>';
				$count ++;
			}
		?>
	</div>
	<div class="contenidoPrincipal">
		<svg viewBox="0 0 100 100" id="textCircle">
			<circle r="48" cx="50" cy="50"/>
			<foreignObject id="text" width="100" height="100">
				<div class="shape shape-left"></div>
				<div class="shape shape-right"></div>
				<div class="text">
					<p><b>Roth Architecture</b> is rooted in the unique combination of three fundamental pillars: <i>nature, ancestry and art</i>.</p>
					<p>It distinguishes itself through an idiosyncratic process which embraces the intelligence of the millenary ecological fabric of life and incorporates human technologies from the ancestral wisdom of the hand of the indigenous communities to artificial intelligence.</p>
					<p>From the unconditional presence to the inspiration of the moment as a collective and the creative flow of nature itself we develop unseen structures akin to living sculptures which prolong the curvature of the earth and open up pathways to new forms of living.</p>
					<p>Transcending the dichotomy between interior and exterior these <i>interfaces</i> allow for a deep reconnection with oneself, the other and the environment and the search for the significance of being human.</p>
				</div>
			</foreignObject>
		</svg>
		<div class="contenidoCentro">
			<img src="images/ants.png" id="intro-image">
		</div>
	</div>
</div>
<?php include( 'footer.php' ); ?>
