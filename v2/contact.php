<?php include 'header.php'; ?>

<div class="principal">
	<div class="textContent contacto">
		<h1 class="scrollAnimation">Contact</h1>
		<h2 class="scrollAnimation">Let's Talk</h2>
		<div class="contactoDiv scrollAnimation" id="contactoForm">
			<div class="contactoMuestra">
				<label for="name">Name</label>
				<input type="text" id="name" class="obligatorio">
				<label for="email">Email</label>
				<input type="text" id="email" class="obligatorio email">
				<div class="mitad">
					<div class="campo">
						<label for="phone">Phone</label>
						<input type="text" id="phone" class="obligatorio telefono">
					</div>
					<div class="campo">
						<label for="company">Company</label>
						<input type="company" id="name">
					</div>
				</div>
				<label for="message">Your Message</label>
				<input type="text" id="message" class="obligatorio">
				<a href="#" class="boton noHref" onclick="enviar()">Send message</a>
			</div>
			<div class="agendaDiv">
				<label for="fechaElegida">Elige una fecha</label>
				<input type="hidden" id="fechaElegida">
				<div id="datepicker"></div>
				<label for="horaElegida">Elige una horario</label>
				<select id="horaElegida">
					<option value="9">9:00 - 9:30 hrs</option>
					<option value="9">9:30 - 10:00 hrs</option>
					<option value="9">10:00 - 10:30 hrs</option>
					<option value="9">10:30 - 11:00 hrs</option>
					<option value="9">11:00 - 11:30 hrs</option>
					<option value="9">11:30 - 12:00 hrs</option>
					<option value="9">12:00 - 12:30 hrs</option>
					<option value="9">12:30 - 13:00 hrs</option>
					<option value="9">13:00 - 13:30 hrs</option>
					<option value="9">13:30 - 14:00 hrs</option>
					<option value="9">14:00 - 14:30 hrs</option>
					<option value="9">14:30 - 15:00 hrs</option>
				</select>
			</div>
		</div>
		<span class="linea contacto"></span>
		<div class="infoContacto">
			<h3 class="scrollAnimation">Office</h3>
			<p class="scrollAnimation">Grulla 23</p>
			<p class="scrollAnimation">Codigo Postal 77796</p>
			<p class="scrollAnimation">Francisco Uh May,</p>
			<p class="scrollAnimation">Quintana Roo, México</p>
		</div>
	</div>
</div>
<a href="#" class="noHref scheduleBoton">Schedule a Call</a>
<div class="imgContact scrollAnimation" style="background-image: url( 'images/contact/contacto-1.jpg' )"></div>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
	$( document ).ready( function() {
		$( '#datepicker' ).datepicker();
	} );
</script>
<?php include 'footer.php'; ?>
