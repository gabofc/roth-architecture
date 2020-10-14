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
<a href="#" class="botonAgenda noHref">Schedule a call</a>
<?php include 'footer.php'; ?>