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
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.10/jquery.lazy.min.js"></script>
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.10/jquery.lazy.plugins.min.js"></script>
		<script>
			var urlActual = '<?php echo $url; ?>';
			var archivoUsado = '<?php echo $nombreArchivo; ?>';
			var idiomaActual = 'EN';
		</script>
	</head>
	<body class="<?php echo $bodyClass; ?>">
		<div class="cargando">
			<i class="fas fa-spinner fa-spin"></i><br>
			<h3></h3>
		</div>
		<div class="capaNegra" onclick="cierraPop()"></div>
		<div class="popup" id="agendaPopup">
			<a class="cierra" onclick="popup( 'agendaPopup', false ); regresaFecha();"><i class="fas fa-times"></i></a>
			<div class="flexBox">
				<div class="horario">
					<img src="images/logo.png">
					<h1>SCHEDULE A CALL</h1>
					<h2>30 MINUTES</h2>
					<select id="timezone" onchange="setTimeZone()">
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
						<div class="horaElige" tiempo="10:00AM">10:00 - 10:30 hrs</div>
						<div class="horaElige" tiempo="10:30AM">10:30 - 11:00 hrs</div>
						<div class="horaElige" tiempo="11:00AM">11:00 - 11:30 hrs</div>
						<div class="horaElige" tiempo="11:30AM">11:30 - 12:00 hrs</div>
						<div class="horaElige" tiempo="12:00PM">12:00 - 12:30 hrs</div>
						<div class="horaElige" tiempo="12:30PM">12:30 - 13:00 hrs</div>
						<div class="horaElige" tiempo="1:00PM">13:00 - 13:30 hrs</div>
						<div class="horaElige" tiempo="1:30PM">13:30 - 14:00 hrs</div>
						<div class="horaElige" tiempo="2:00PM">14:00 - 14:30 hrs</div>
						<div class="horaElige" tiempo="2:30PM">14:30 - 15:00 hrs</div>
					</div>
				</div>
				<div class="lineVertical"></div>
				<div class="fecha">
					<h1>Select Date</h1>
					<div id="datepicker"></div>
				</div>
			</div>
			<form id="agendaForm" action="contact-send" method="POST" name="scheduleForm">
				<div class="contactoDivPop">
					<h1><a href="#" class="noHref regresa" onclick="regresaFecha()"><i class="fas fa-chevron-left"></i></a> Change Date and Time</h1>
					<br>
					<input type="hidden" value="schedule" name="formType">
					<input type="hidden" id="fechaElegida" name="fecha">
					<input type="hidden" id="horaElegida" name="hora">
					<input type="hidden" value="ST -11:00 - American Samoa" id="timeZoneHidden" name="timezone">
					<label for="nameAgenda">Name</label>
					<input type="text" id="nameAgenda" name="name" class="obligatorio" padre="agendaForm" required>
					<label for="emailAgenda">Email</label>
					<input type="text" id="emailAgenda" name="email" class="obligatorio email" padre="agendaForm" required>
					<div class="mitad">
						<div class="campo">
							<label for="phoneAgenda">Phone</label>
							<input type="number" id="codeAgenda" name="code" placeholder="+" maxlength="3" class="obligatorio" required>
							<input type="number" name="phone" id="phoneAgenda" class="obligatorio telefono" padre="agendaForm" maxlength="10" required>
						</div>
						<div class="campo">
							<label for="companyAgenda">Company</label>
							<input type="companyAgenda" id="companyAgenda" name="company" padre="agendaForm">
						</div>
					</div>
					<label for="messageAgenda">Your Message</label>
					<input type="text" id="messageAgenda" name="message" class="obligatorio" padre="agendaForm" required>
					<input id="submitSchedule" type="submit" value="Schedule Call" class="boton">
				</div>
			</form>
		</div>
		<header>
			<div class="principal">
				<a href="/"><img src="images/logo.png" class="logoImg"></a>
				<ul class="menu">
					<li><a href="about">About<span></span></a></li>
					<li><a href="founder">Founder<span></span></a></li>
					<li><a href="awards">Awards<span></span></a></li>
					<li><a href="services">Services<span></span></a></li>
					<li><a href="creative-process">Creative Process<span></span></a></li>
					<li><a href="philosophy">Philosophy<span></span></a></li>
					<li><a href="projects">Projects<span></span></a></li>
					<li><a href="press">Press<span></span></a></li>
					<li><a href="careers">Careers<span></span></a></li>
					<li><a href="contact">Contact<span></span></a></li>
				</ul>
				<a href="#" class="bMobileCierra"><i class="fas fa-times"></i></a>
				<a href="#" class="bMobile"><i class="fas fa-bars"></i></a>
			</div>
		</header>
		<main>
