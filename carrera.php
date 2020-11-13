<?php
	include 'header.php';
	include 'lib/careers.php';
	$carrera = $careers[ $_REQUEST[ 'nombre' ] ];
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
<div class="banner block" style="background-image: url( 'images/careers/job-position.jpg' )">
	<div class="scrollAnimation parrafo">We are constantly looking for talented individuals to join our growing team and help us with various scale projects.</div>
	<div class="scrollAnimation parrafo">Please find here all the career opportunities and positions we have available at the moment.</div>
</div>
<div class="shortMain carreraDetalle">
	<h3 class="scrollAnimation"><?php echo $carrera[ 'title' ]; ?></h3>
	<span class="linea"></span>
	<?php
		foreach ( $carrera[ 'description' ] as $description ) {
			echo '<p class="scrollAnimation">' . $description . '</p>';
		}
	?>
	<h4 class="scrollAnimation">Requirements and abilities for the position</h4>
	<ul class="listaRequerimientos">
	<?php
		foreach ( $carrera[ 'requirements' ] as $requirements ) {
			echo '<li class="scrollAnimation"><i class="fas fa-check"></i> ' . $requirements . '</li>';
		}
	?>
	</ul>
	<?php if ( isset( $carrera[ 'details' ] ) ) : ?>
	<h4 class="scrollAnimation">Job Details</h4>
	<?php
		foreach ( $carrera[ 'details' ] as $details ) {
			echo '<p class="scrollAnimation">' . $details . '</p>';
		}
	?>
	<?php endif; ?>
	<?php if ( isset( $carrera[ 'apply' ] ) ) : ?>
	<p class="scrollAnimation">To Apply:</p>
	<p class="scrollAnimation"><?php echo $carrera[ 'apply' ]; ?></p>
	<?php endif; ?>
</div>
<?php include 'footer.php'; ?>
