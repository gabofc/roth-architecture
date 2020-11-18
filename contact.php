<?php include 'header.php'; ?>
<div class="principal">
	<div class="textContent contacto">
		<h1 class="scrollAnimation">Contact</h1>
		<h2 class="scrollAnimation">Let's Talk</h2>
		<form id="contactoForm" action="contact-send" method="POST" name="contactForm">
			<div class="contactoDiv scrollAnimation">
				<h3>Fill out the form</h3>
				<div class="linea"></div>
				<input type="hidden" name="formType" value="contact">
				<input type="text" id="name" name="name" class="obligatorio" padre="contactoForm" placeholder="Name" required>
				<input type="text" id="email" name="email" placeholder="Email" class="obligatorio email" padre="contactoForm" required>
				<div class="mitad">
					<div class="campo">
						<input type="text" id="code" name="code" placeholder="Code" placeholder="+" class="obligatorio" maxlength="3" required><input type="number" id="phone" name="phone" placeholder="Phone" class="obligatorio telefono" padre="contactoForm" maxlength="10" required>
					</div>
					<div class="campo">
						<input type="company" name="company" id="company" placeholder="Company" padre="contactoForm">
					</div>
				</div>
				<input type="text" id="message" name="message" placeholder="Your Message" class="obligatorio" padre="contactoForm" required>
				<input type="submit" value="Submit" class="boton">
			</div>
		</form>
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
<div class="imgContact scrollAnimation" style="background-image: url( 'images/contact/contact-main.jpg' )">
	<div class="negroGradiente"></div>
</div>
<?php include 'footer.php'; ?>
