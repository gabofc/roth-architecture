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
		<meta name="viewport" content="width=device-width">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="author" content="Roth Architecture">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<link rel="stylesheet" href="css/general.css">
		<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
		<script type="text/javascript">
			var urlActual = "<?php echo $url; ?>";
			var archivoUsado = "<?php echo $nombreArchivo; ?>";
			var urlSinPage = "<?php echo $urlSinPage; ?>";
		</script>
	</head>
	<body>
