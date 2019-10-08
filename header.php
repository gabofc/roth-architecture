<?php
	$http = 'http';
	if ( isset( $_SERVER[ 'HTTPS' ] ) ) {
		$http = 'https';
	}
	$url = $http . '://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'REQUEST_URI' ];
	$base = $http . '://' . $_SERVER[ 'HTTP_HOST' ];
	$nombreArchivo = basename( $_SERVER[ 'PHP_SELF' ] );
	$urlSinPage = explode( '&', $url )[0];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Roth Architecture</title>
		<base href="<?php echo $base; ?>" />
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="canonical" href="<?php echo $base ?>" />
		<meta name="author" content="Roth Architecture">
		<meta name="keywords" content="">
		<meta name="description" content="Roth Architecture - AZULIK"/>
		<meta property="og:locale" content="en_MX" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="Roth Architecture - AZULIK" />
		<meta property="og:description" content="Roth Architecture - AZULIK" />
		<meta property="og:url" content="<?php echo $base ?>" />
		<meta property="og:site_name" content="Roth Architecture" />
		<meta property="og:image" content="https://www.indiewire.com/wp-content/uploads/2019/01/samuel-l-jackson-body-measurements-religion-horoscope-net-worth.jpg?w=1024" />
		<meta property="og:image:secure_url" content="https://www.indiewire.com/wp-content/uploads/2019/01/samuel-l-jackson-body-measurements-religion-horoscope-net-worth.jpg?w=1024" />
		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:description" content="Roth Architecture - AZULIK" />
		<meta name="twitter:title" content="Roth Architecture - AZULIK" />
		<meta name="twitter:site" content="@RothArchitecture" />
		<meta name="twitter:image" content="https://www.indiewire.com/wp-content/uploads/2019/01/samuel-l-jackson-body-measurements-religion-horoscope-net-worth.jpg?w=1024" />
		<meta name="twitter:creator" content="@RothArchitecture" />
		<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		<script type="text/javascript">
			var urlActual = "<?php echo $url; ?>";
			var archivoUsado = "<?php echo $nombreArchivo; ?>";
			var urlSinPage = "<?php echo $urlSinPage; ?>";
		</script>
	</head>
	<body>
