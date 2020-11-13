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
<div class="shortMain carreraDetalle padCar">
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
	<p class="scrollAnimation">To Apply:</p>
	<?php if ( isset( $carrera[ 'apply' ] ) ) : ?>
	<p class="scrollAnimation"><?php echo $carrera[ 'apply' ]; ?></p>
	<?php endif; ?>
	<form class="fila carreraForm" id="carreraForm" action="contact-send" method="POST">
		<div class="fila">
			<div class="campo">
				<label for="email">Email</label>
				<input type="text" id="email" name="email" required>
			</div>
		</div>
		<div class="campo">
			<label for="name">First Name</label>
			<input type="text" id="name" name="name" required>
		</div>
		<div class="campo">
			<label for="apellido">Last Name </label>
			<input type="text" id="apellido" name="apellido" required>
		</div>
		<div class="campo">
			<label for="country">Country</label>
			<input type="text" id="country" name="country" required>
		</div>
		<div class="campo">
			<label for="mobile">Mobile</label>
			<input type="text" id="mobile" name="mobile" required>
		</div>
		<div class="campo">
			<label for="salary">Current Salary</label>
			<input type="text" id="salary" name="salary" required>
		</div>
		<div class="campo">
			<label for="currency">Salary Currency</label>
			<input type="text" id="currency" name="currency" required>
		</div>
		<div class="campo">
			<label for="letter">Covering Letter</label>
			<a href="#" class="campoDescarga">Select a file <i class="fas fa-download"></i></a>
			<input type="file" id="letter" name="letter" required>
			<span>File size should be no more than 8Mb</span>
		</div>
		<div class="campo">
			<label for="curriculum">CV upload</label>
			<a href="#" class="campoDescarga">Select a file <i class="fas fa-download"></i></a>
			<input type="file" id="curriculum" name="curriculum" required>
			<span>File size should be no more than 8Mb</span>
		</div>
		<div class="campo">
			<label for="portfolio">Portfolio link </label>
			<input type="text" id="portfolio" name="portfolio" required>
			<span>You can upload your portfolio through a service like WeTransfer, Dropbox or Drive.</span>
		</div>
		<div class="full">
			<input type="submit" value="Submit Application">
		</div>
	</form>
</div>
<?php include 'footer.php'; ?>
