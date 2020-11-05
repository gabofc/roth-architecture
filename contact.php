<?php include 'header.php'; ?>
<div class="principal">
	<div class="textContent contacto">
		<h1 class="scrollAnimation">Contact</h1>
		<h2 class="scrollAnimation">Let's Talk</h2>
		<form id="contactoForm" action="contact-send" method="POST" name="contactForm">
			<div class="contactoDiv scrollAnimation">
				<input type="hidden" name="formType" value="contact">
				<label for="name">Name</label>
				<input type="text" id="name" name="name" class="obligatorio" padre="contactoForm" required>
				<label for="email">Email</label>
				<input type="text" id="email" name="email" class="obligatorio email" padre="contactoForm" required>
				<div class="mitad">
					<div class="campo">
						<label for="phone">Phone</label>
						<input type="text" id="code" name="code" placeholder="+" class="obligatorio" maxlength="3" required><input type="number" id="phone" name="phone" class="obligatorio telefono" padre="contactoForm" maxlength="10" required>
					</div>
					<div class="campo">
						<label for="company">Company</label>
						<input type="company" name="company" id="company" padre="contactoForm">
					</div>
				</div>
				<label for="message">Your Message</label>
				<input type="text" id="message" name="message" class="obligatorio" padre="contactoForm" required>
				<input type="submit" value="Send message" class="boton">
			</div>
		</form>
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
<div class="imgContact scrollAnimation" style="background-image: url( 'images/contact/contacto-1.jpg' )">
	<div class="negroGradiente"></div>
</div>
<?php include 'footer.php'; ?>
