<?php include 'header.php'; ?>
<ul class="bxslider" id="mainSlide">
<?php
	$archivos = scandir( 'images/home/' );
	foreach ( $archivos as $archivo ) {
		if ( $archivo != '.' && $archivo != '..' && $archivo != '...') {
			echo '<li style="background-image: url( \'images/home/' . $archivo . '\' );"></li>';
		}
	}
?>
</ul>
<div class="sociales">
	<a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
	<a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
	<a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
</div>
<?php include 'footer.php'; ?>
