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
	<a href="https://www.facebook.com/Azulikofficial/" target="_blank"><i class="fab fa-facebook-f"></i></a>
	<a href="https://www.linkedin.com/company/rotharchitecture" target="_blank"><i class="fab fa-linkedin"></i></a>
	<a href="https://twitter.com/Azulikofficial" target="_blank"><i class="fab fa-twitter"></i></a>
</div>
<?php include 'footer.php'; ?>
