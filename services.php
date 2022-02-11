<?php
	include 'header.php';
	include 'lib/services.php';
?>
<div class="principal">
	<div class="textContent">
		<div class="fila">
			<div class="titulos">
				<h1 class="scrollAnimation">Services</h1>
				<h2 class="scrollAnimation">What we offer</h2>
			</div>
		</div>
	</div>
	<br><br>
	<ul class="bxslider" id="serviceSlide">
	<?php
		$i = 1;
		foreach ( $servicios as $servicio ) {
			$descripionText = '';
			foreach ( $servicio[ 'descripcion' ] as $descripcion ) {
				$descripionText .= '<p>' . $descripcion . '</p>';
			}
			$classH = ( $i == 1 ) ? ' class="activo"' : '';
			$classContent = ( $i == 1 ) ? ' activo' : '';
			echo
			'<li class="servicioDetalle" id="slideService-' . ( $i - 1 ) . '">
				<div class="flexBox">
					<div class="verticalTitle ' . $servicio[ 'class' ] . '"><h2' . $classH . '>0' . $i . ' ' . $servicio[ 'nombreVertical' ] . '</h2></div>
					<div class="imageService"><img src="images/services/' . $servicio[ 'imagen' ] . '" alt="' . $servicio[ 'nombre' ] . '" loading="lazy"></div>
					<div class="servicioContent' . $classContent . '">
						<h3><div class="fraccion"><span>0' . $i . '</span><span>0' . sizeof( $servicios ) . '</span></div> ' . $servicio[ 'nombre' ] . '</h3>
						<span class="linea"></span>
						' . $descripionText . '
					</div>
				</div>
			</li>';
			$i++;
		}
	?>
	</ul>
</div>
<?php include 'footer.php'; ?>
