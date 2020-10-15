<?php include 'header.php'; ?>
<div class="principal">
	<div class="textContent contacto">
		<h1 class="scrollAnimation">Contact</h1>
		<h2 class="scrollAnimation">Let's Talk</h2>
		<div class="contactoDiv scrollAnimation" id="contactoForm">
			<label for="name">Name</label>
			<input type="text" id="name" name="name" class="obligatorio">
			<label for="email">Email</label>
			<input type="text" id="email" name="email" class="obligatorio email">
			<div class="mitad">
				<div class="campo">
					<label for="phone">Phone</label>
					<input type="text" id="phone" name="phone" class="obligatorio telefono">
				</div>
				<div class="campo">
					<label for="company">Company</label>
					<input type="company" name="company" id="name">
				</div>
			</div>
			<label for="message">Your Message</label>
			<input type="text" id="message"  name="message" class="obligatorio">
			<a href="#" class="boton noHref" onclick="enviar()">Send message</a>
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
<a href="#" class="noHref scheduleBoton" onclick="popup( 'agendaPopup', true )">Schedule a Call</a>
<div class="imgContact scrollAnimation" style="background-image: url( 'images/contact/contacto-1.jpg' )"></div>
<?php include 'footer.php'; ?>
