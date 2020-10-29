<?php
$http = ( isset( $_SERVER[ 'HTTPS' ] ) ) ? 'https' : 'http';
$url = $http . '://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'REQUEST_URI' ];
$base = $http . '://' . $_SERVER[ 'HTTP_HOST' ];
$nombreArchivo = basename( $_SERVER[ 'PHP_SELF' ] );
$bodyClass = ( $nombreArchivo == 'index.php' ) ? 'home' : 'general ' . str_replace( '.php', '', $nombreArchivo );
?>
<!DOCTYPE html>
<html lang="EN">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Roth Architecture</title>
		<base href="<?php echo $base; ?>" />
		<meta name="viewport" content="width=device-width">
		<meta name="author" content="Roth Architecture">
		<?php include('lib/opengraph.php'); ?>
		<link rel="shortcut icon" href="images/favicon-black-bg.png" />
		<link rel="icon" type="image/png" href="images/favicon-black-bg.png">
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
		<div class="cargando">
			<i class="fas fa-spinner fa-spin"></i><br>
			<h3>SENDING</h3>
		</div>
		<div class="capaNegra" onclick="cierraPop()"></div>
		<div class="popup" id="agendaPopup">
			<a class="cierra" onclick="popup( 'agendaPopup', false ); regresaFecha();"><i class="fas fa-times"></i></a>
			<div class="flexBox">
				<div class="horario">
					<img src="images/logo.png">
					<h1>SCHEDULE A CALL</h1>
					<h2>30 MINUTES</h2>
					<select id="timezone">
						<option value="ST -11:00 - American Samoa">-11:00 - American Samoa</option>
						<option value="HT -10:00 - Most of the Aleutian Islands">-10:00 - Most of the Aleutian Islands</option>
						<option value="AKT -09:00 - Most of the state of Alaska">-09:00 - Most of the state of Alaska</option>
						<option value="PT -08:00 - Pacific Time zone">-08:00 - Pacific Time zone</option>
						<option value="MT -07:00 - Mountain Time zone">-07:00 - Mountain Time zone</option>
						<option value="CT -06:00 - Central Time zone" selected>-06:00 - Central Time zone</option>
						<option value="ET -05:00 - Eastern Time zone">-05:00 - Eastern Time zone</option>
						<option value="AST -04:00 - The U.S. Virgin Islands">-04:00 - The U.S. Virgin Islands</option>
						<option value="ChT +10:00 - Guam and the Northern Islands">+10:00 - Guam and the Northern Islands</option>
					</select>
					<div class="horarioScroll">
						<div class="horaElige" tiempo="10:00">10:00 - 10:30 hrs</div>
						<div class="horaElige" tiempo="10:30">10:30 - 11:00 hrs</div>
						<div class="horaElige" tiempo="11:00">11:00 - 11:30 hrs</div>
						<div class="horaElige" tiempo="11:30">11:30 - 12:00 hrs</div>
						<div class="horaElige" tiempo="12:00">12:00 - 12:30 hrs</div>
						<div class="horaElige" tiempo="12:30">12:30 - 13:00 hrs</div>
						<div class="horaElige" tiempo="13:00">13:00 - 13:30 hrs</div>
						<div class="horaElige" tiempo="13:30">13:30 - 14:00 hrs</div>
						<div class="horaElige" tiempo="14:00">14:00 - 14:30 hrs</div>
						<div class="horaElige" tiempo="14:30">14:30 - 15:00 hrs</div>
					</div>
				</div>
				<div class="lineVertical"></div>
				<div class="fecha">
					<h1>Select Date</h1>
					<div id="datepicker"></div>
				</div>
			</div>
			<div class="contactoDivPop" id="agendaForm">
				<h1><a href="#" class="noHref regresa" onclick="regresaFecha()"><i class="fas fa-chevron-left"></i></a> Change Date and Time</h1>
				<br>
				<input type="hidden" id="fechaElegida">
				<input type="hidden" id="horaElegida">
				<label for="nameAgenda">Name</label>
				<input type="text" id="nameAgenda" class="obligatorio" padre="agendaForm">
				<label for="emailAgenda">Email</label>
				<input type="text" id="emailAgenda" class="obligatorio email" padre="agendaForm">
				<div class="mitad">
					<div class="campo">
						<label for="phoneAgenda">Phone</label>
						<input type="number" id="codeAgenda" placeholder="+" maxlength="3" class="obligatorio"><input type="number" id="phoneAgenda" class="obligatorio telefono" padre="agendaForm" maxlength="10">
					</div>
					<div class="campo">
						<label for="companyAgenda">Company</label>
						<input type="companyAgenda" id="companyAgenda" padre="agendaForm">
					</div>
				</div>
				<label for="messageAgenda">Your Message</label>
				<input type="text" id="messageAgenda" class="obligatorio" padre="agendaForm">
				<a href="#" class="boton noHref submit" onclick="agendaCita( 2 )">Schedule Call</a>
			</div>
		</div>
		<header>
			<div class="principal">
				<a href="/"><img src="images/logo.png" class="logoImg"></a>
				<ul class="menu">
					<li><a href="/">Home<span></span></a></li>
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
