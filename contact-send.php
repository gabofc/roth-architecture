<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\OAuth;
	use League\OAuth2\Client\Provider\Google;
	header( 'Access-Control-Allow-Origin: *' );
	var_dump($_SERVER);
	if( !isset( $_REQUEST ) || empty( $_REQUEST ) || ($_SERVER[ 'HTTP_HOST' ] != 'roth.local' && $_SERVER[ 'HTTP_HOST' ] != 'roth.architecture' && $_SERVER[ 'HTTP_HOST' ] != 'roth-architecture.com') ){
		header('location: /');
		exit();
	} else {
		include 'lib/src/Exception.php';
		include 'lib/src/PHPMailer.php';
		include 'lib/src/SMTP.php';
		include 'lib/src/OAuth.php';
		$form_values['host'] = 'roth-architecture.com';

		//Contact data send
		$include_mail = 'contact-mail.php';
		include( $include_mail );
		if( $_REQUEST['formType']=='contact' ){
			$subject = 'Contacto desde Roth Architecture';
		} else if( $_REQUEST['formType']=='schedule' ){
			$subject = 'New scheduled call request from Roth Architecture';
		} else if( $_REQUEST['formType']=='career' ){
			$subject = 'New job position submitted';
		}
		$bodyContent = ob_get_contents();
		ob_end_clean();
		$form_values['subject'] = $subject;
		$mail = new PHPMailer();
		$mail->isSMTP(true);
		$mail->Mailer = "smtp";
		//$mail->SMTPDebug  = 4;
		$mail->SMTPAuth   = true;
		$mail->SMTPSecure = "ssl";
		$mail->Port       = 465;
		$mail->Host       = "smtp.gmail.com";
		$mail->Username   = "crm@azulik.com";
		$mail->Password   = "Cancun70";
		$mail->Subject = $subject;
		$mail->addCustomHeader( 'X-Mailer: ' . $form_values['host'] . '/ PHP/' . phpversion(), 'Message-ID: <' . gmdate( 'YmdHs' ) . '@' . $form_values['host'] . '/>', 'Sender: ' . $form_values['host'] . '/', 'Sent: ' . date( 'd-m-Y' ) );
		$mail->From = 'crm@azulik.com';
		$mail->FromName = 'Roth Architecture';
		$mail->AddAddress( 'contacto@roth-architecture.com', 'Roth Contact Form' );
		$mail->AddAddress( 'gfernandez@azulik.com', 'Roth Contact Form' );
		//$mail->AddAddress( 'fpires@azulik.com', 'Roth Contact Form' );
		$mail->IsHTML( true );
		$mail->CharSet = 'UTF-8';
		$mail->AltBody = $subject;
		$mail->Body = $bodyContent;
		if ( $_FILES ) {
			foreach ( $_FILES as $file => $array ) {
				$mail->AddAttachment( $_FILES[ $file ][ 'tmp_name' ], $_FILES[ $file ][ 'name' ] );
			}
		}
		if( $mail -> Send() ) {
			$status = array( 'status' => 'Success' );
		} else {
			$status = array( 'status' => 'Error', 'mensaje' => $mail->ErrorInfo );
		}
		//Thanks page sending
		$include_thanks = $_REQUEST['formType'] == 'contact' ? 'contact-thanks.php' : 'contact-schedule.php';
		if( $_REQUEST['formType']=='contact' ){
			$include_thanks = 'contact-thanks.php';
		} else if( $_REQUEST['formType']=='schedule' ){
			$include_thanks = 'contact-schedule.php';
		} else if( $_REQUEST['formType']=='career' ){
			$include_thanks = 'contact-thanks.php';
		}
		include( $include_thanks );
		$bodyContent = ob_get_contents();
		ob_end_clean();
		if( $_REQUEST['formType']=='contact' ){
			$subject_thanks = 'Thank you for getting in touch';
		} else if( $_REQUEST['formType']=='schedule' ){
			$subject_thanks = 'Thank you for request a call with us';
		} else if( $_REQUEST['formType']=='career' ){
			$subject_thanks = 'Thank you for getting in touch';
		}
		$mail = new PHPMailer();
		$mail->isSMTP(true);
		$mail->Mailer = "smtp";
		//$mail->SMTPDebug  = 4;
		$mail->SMTPAuth   = true;
		$mail->SMTPSecure = "ssl";
		$mail->Port       = 465;
		$mail->Host       = "smtp.gmail.com";
		$mail->Username   = "crm@azulik.com";
		$mail->Password   = "Cancun70";
		$mail->Subject = $subject_thanks;
		$mail->addCustomHeader( 'X-Mailer: ' . $form_values['host'] . '/ PHP/' . phpversion(), 'Message-ID: <' . gmdate( 'YmdHs' ) . '@' . $form_values['host'] . '/>', 'Sender: ' . $form_values['host'] . '/', 'Sent: ' . date( 'd-m-Y' ) );
		$mail->From = 'crm@azulik.com';
		$mail->FromName = 'Roth Architecture';
		$mail->AddAddress( $_REQUEST['email'], $_REQUEST['name'] );
		//$mail->AddAddress( 'rfadanelli@azulik.com', 'Rox' );
		//$mail->AddAddress( 'fadanelli.artdesign@gmail.com', 'Rox' );
		$mail->IsHTML( true );
		$mail->CharSet = 'UTF-8';
		$mail->AltBody = $subject_thanks;
		$mail->Body = $bodyContent;
		include 'header.php';
		if( $mail -> Send() ) {
			echo
			'<div class="principal">
				<h1 class="scrollAnimation">Thank you!</h1>
				<h2 class="scrollAnimation">Your message was sent successfully, we will contact you shortly</h2>
			</div>';
		} else {
			echo
			'<div class="principal">
				<h1 class="scrollAnimation">Error</h1>
				<h2 class="scrollAnimation">' . $mail->ErrorInfo . '</h2>
			</div>';
		}
		include 'footer.php';
	}
?>
