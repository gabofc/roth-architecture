<?php
	$http = 'http';
	if ( isset( $_SERVER[ 'HTTPS' ] ) ) {
		$http = 'https';
	}
	$url = $http . '://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'REQUEST_URI' ];
	$base = $http . '://' . $_SERVER[ 'HTTP_HOST' ];
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
		<meta name="description" content="Roth Architecture is rooted in the unique combination of three fundamental pillars: <i>nature, ancestry and art"/>
		<meta property="og:locale" content="en_MX" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="Roth Architecture - AZULIK" />
		<meta property="og:description" content="Roth Architecture is rooted in the unique combination of three fundamental pillars: <i>nature, ancestry and art" />
		<meta property="og:url" content="<?php echo $base ?>" />
		<meta property="og:site_name" content="Roth Architecture" />
		<meta property="og:image" content="images/shared-image.jpg" />
		<meta property="og:image:secure_url" content="images/shared-image.jpg" />
		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:description" content="Roth Architecture is rooted in the unique combination of three fundamental pillars: <i>nature, ancestry and art" />
		<meta name="twitter:title" content="Roth Architecture - AZULIK" />
		<meta name="twitter:site" content="@RothArchitecture" />
		<meta name="twitter:image" content="images/shared-image.jpg" />
		<meta name="twitter:creator" content="@RothArchitecture" />
		<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
		<?php if( isset( $_GET[ 'grid' ] ) && $_GET[ 'grid' ] == 'on' ) { ?><link rel="stylesheet" href="css/grid.css?v=<?php echo time(); ?>"><?php } ?>
		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		<link rel="apple-touch-icon" sizes="57x57" href="images/favicons/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="images/favicons/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="images/favicons/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="images/favicons/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="images/favicons/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="images/favicons/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="images/favicons/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="images/favicons/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="images/favicons/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192" href="images/favicons/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="images/favicons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="images/favicons/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="images/favicons/favicon-16x16.png">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="images/favicons/ms-icon-144x144.png">
	</head>
	<body>
