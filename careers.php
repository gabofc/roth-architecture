<?php
	include 'header.php';
	include 'lib/careers.php';
?>
<div class="principal">
	<div class="textContent">
		<div class="fila">
			<div class="titulos">
				<h1 class="scrollAnimation">Careers</h1>
				<h2 class="scrollAnimation">Work with Us</h2>
			</div>
		</div>
	</div>
</div>
<div class="banner block" style="background-image: url( 'images/careers/careers.jpg' )">
	<div class="scrollAnimation parrafo">We are constantly looking for talented individuals to join our growing team and help us with various scale projects.</div>
	<div class="scrollAnimation parrafo">Please find here all the career opportunities and positions we have available at the moment.</div>
</div>
<div class="shortMain">
	<div class="fila">
	<?php
		foreach ( $careers as $indice => $carrera ) {
			echo
			'<div class="carreraDiv scrollAnimation">
				<h3>' . $carrera[ 'title' ] . '</h3>
				<a href="career/' . $indice . '" class="carreraBoton">Apply</a>
			</div>';
		}
	?>
	</div>
</div>
<?php include 'footer.php'; ?>
