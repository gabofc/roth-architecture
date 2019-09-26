<?php include( 'header.php' ); ?>
	<img src="images/logo.png" class="logo">
	<div id="wheel">
		<?php
			$path = 'images/icons/';
			$files = array_values(
				array_filter(
					scandir( $path ),
					function( $file ) use ( $path ) {
    					return !is_dir( $path . '/' . $file );
					}
				)
			);
			$icono = 1;
			foreach( $files as $file ) {
				echo
				'<div class="link-icon" id="link-icon-' . $icono . '">
					<a class="box-link" href="#">
						<img src="' . $path . $file . '" class="iconoLista">
						<div class="commingSoon">Comming Soon</div>
					</a>
				</div>';
				$icono++;
			}
		?>
	</div>
	<div class="contenidoCentro">
		<img src="images/ants.png">
	</div>
<?php include( 'footer.php' ); ?>
