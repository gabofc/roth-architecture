<?php include 'header.php'; ?>
<ul class="bxslider" id="mainSlide">
<?php
	$archivos = scandir( 'images/home/' );
	foreach ( $archivos as $archivo ) {
		$extention = explode('.', $archivo );
		if( !is_dir($archivo) && (end($extention) == 'jpg' || end($extention) == 'jpeg') ){
			echo '<li style="background-image: url( \'images/home/' . $archivo . '\' );"></li>';
		}
	}
?>
</ul>
<div class="sociales">
	<a href="https://www.facebook.com/rotharch" target="_blank"><i class="fab fa-facebook-f"></i></a>
	<a href="https://www.instagram.com/roth_architecture/" target="_blank"><i class="fab fa-instagram"></i></a>
	<a href="https://www.linkedin.com/company/rotharchitecture" target="_blank"><i class="fab fa-linkedin"></i></a>
</div>
<?php include 'footer.php'; ?>
