<?php
	include 'header.php';
	$servicios = array(
		'planning' => array(
			'nombre' => 'Planning',
			'imagen' => 'planning.jpg',
			'descripcion' => array(
				1 => 'We develop integral projects that require the articulation of several levels of strategic planning. We have expertise turning visions into reality and can take care of every step of the process, from urbanization to creative proposals. We foster an interdisciplinary approach to spatial design and engage with all kinds of projects, whether commercial or residential, and offer effective solutions with a vision for real estate value and return on investment. '
			)
		),
		'concept-and-experience-design' => array(
			'nombre' => 'Concept & Experience Design',
			'imagen' => 'concept-experience.jpg',
			'descripcion' => array(
				1 => 'At Roth Architecture we specialize in creating unique design concepts. Based on our three creative pillars -ancestry, nature and art- we deliver unique buildings that work as statements of a project’s identity. We begin from abstract ideas and use them to turn space into an element that encourages interaction with our environment.',
				2 => 'Furthermore, we design integral experiences that go beyond the form or technique and through which people generate intimate bonds with their surroundings. Our spaces are not meant to be used, but felt.'
			)
		),
	);
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
		$i = 1;;
		foreach ( $servicios as $servicio ) {
			$descripionText = '';
			foreach ( $servicio[ 'descripcion' ] as $descripcion ) {
				$descripionText .= '<p>' . $descripcion . '</p>';
			}
			echo
			'<li class="servicioDetalle">
				<h2>0' . $i . ' ' . $servicio[ 'nombre' ] . '</h2>
				<img src="images/services/' . $servicio[ 'imagen' ] . '" alt="' . $servicio[ 'nombre' ] . '">
				<div class="servicioContent">
					<h3><div class="fraccion"><span>0' . $i . '</span><span>0' . sizeof( $servicios ) . '</span></div> ' . $servicio[ 'nombre' ] . '</h3>
					<span class="linea"></span>
					' . $descripionText . '
				</div>
			</li>';
			$i++;
		}
	?>
	</ul>
</div>
<?php include 'footer.php'; ?>
