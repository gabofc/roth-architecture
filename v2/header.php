<?php
	$http = ( isset( $_SERVER[ 'HTTPS' ] ) ) ? 'https' : 'http';
	$url = $http . '://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'REQUEST_URI' ];
	//$base = $http . '://' . $_SERVER[ 'HTTP_HOST' ];
	$base = $http . '://' . $_SERVER[ 'HTTP_HOST' ] . '/v2/';
	$nombreArchivo = basename( $_SERVER[ 'PHP_SELF' ] );
	$bodyClass = 'general';
	switch ( $nombreArchivo ) {
		case 'index.php': $bodyClass = 'home'; break;
		case 'contact.php': $bodyClass = 'general contact'; break;
		default: $bodyClass = 'general'; break;
	}
?>
<!DOCTYPE html>
<html lang="EN">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Roth Architecture</title>
		<base href="<?php echo $base; ?>" />
		<meta name="viewport" content="width=device-width">
		<meta name="author" content="Roth Architecture">
		<meta name="keywords" content="">
		<meta name="description" content="Roth Architecture is rooted in the unique combination of three fundamental pillars: nature, ancestry and art"/>
		<meta property="og:locale" content="en_MX" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="Roth Architecture - AZULIK" />
		<meta property="og:description" content="Roth Architecture is rooted in the unique combination of three fundamental pillars: nature, ancestry and art" />
		<meta property="og:url" content="<?php echo $base ?>" />
		<meta property="og:site_name" content="Roth Architecture" />
		<meta property="og:image" content="images/logo.svg" />
		<meta property="og:image:secure_url" content="images/logo.svg" />
		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:description" content="Roth Architecture is rooted in the unique combination of three fundamental pillars: nature, ancestry and art" />
		<meta name="twitter:title" content="Roth Architecture - AZULIK" />
		<meta name="twitter:site" content="@RothArchitecture" />
		<meta name="twitter:image" content="images/logo.svg" />
		<meta name="twitter:creator" content="@RothArchitecture" />
		<link rel="shortcut icon" href="images/logo.svg" />
		<link rel="canonical" href="<?php echo $url; ?>" />
		<link href="css/fonts/fontawesome/css/all.min.css" rel="stylesheet">
		<link href="css/jquery.bxslider.css" rel="stylesheet" />
		<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		<script>
			var urlActual = '<?php echo $url; ?>';
			var archivoUsado = '<?php echo $nombreArchivo; ?>';
			var idiomaActual = 'EN';
		</script>
	</head>
	<body class="<?php echo $bodyClass; ?>">
		<div class="capaNegra" onclick="cierraPop()"></div>
		<header>
			<div class="principal">
				<a href="/"><img src="images/logo.svg" class="logoImg"></a>
				<ul class="menu">
					<li><a href="about">About<span></span></a></li>
					<li><a href="founder">Founder<span></span></a></li>
					<li><a href="awards">Awards<span></span></a></li>
					<li><a href="press">Press<span></span></a></li>
					<li><a href="contact">Contact<span></span></a></li>
				</ul>
				<a href="#" class="bMobileCierra"><i class="fas fa-times"></i></a>
				<a href="#" class="bMobile"><i class="fas fa-bars"></i></a>
			</div>
		</header>
		<main>