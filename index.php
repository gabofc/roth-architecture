<?php include( 'header.php' ); ?>
<?php include( 'lib/icons.php' ); ?>
	<img src="images/logo.png" class="logo">
	<div id="wheel">
		<?php
		$count = 1;
		$path = 'images/icons/';
		foreach( $iconsLinks as $icons ){
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
	<div class="contenidoCentro">
		<img src="images/ants.png" id="intro-image">
	</div>
<?php include( 'footer.php' ); ?>
