<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\OAuth;
	use League\OAuth2\Client\Provider\Google;
	header( 'Access-Control-Allow-Origin: *' );
	if( !isset( $_POST ) || empty( $_POST ) || ($_SERVER[ 'HTTP_ORIGIN' ] != 'http://roth.local' && $_SERVER[ 'HTTP_ORIGIN' ] != 'http://roth.architecture' && $_SERVER[ 'HTTP_ORIGIN' ] != 'https://roth-architecture.com' && $_SERVER[ 'HTTP_ORIGIN' ] != 'https://www.roth-architecture.com') ){
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
		if( $_POST['formType']=='contact' ){
			$subject = 'Contacto desde Roth Architecture';
			$fields = array('name', 'email','code', 'phone', 'company', 'message');
		} else if( $_POST['formType']=='schedule' ){
			$subject = 'New scheduled call request from Roth Architecture';
			$fields = array('fecha', 'hora','timezone', 'name', 'email','code', 'phone', 'company', 'message');
		} else if( $_POST['formType']=='career' ){
			$subject = 'New job position submitted';
			$fields = array('job_position', 'email', 'name', 'apellido', 'country', 'mobile', 'salary', 'currency', 'portfolio');
		}

		$verified_fields = TRUE;
		foreach($fields as $values) {
		   if(!isset($_POST[$values]) || empty($_POST[$values])) {
		      $verified_fields = FALSE;
		   }
		}

		if( !$verified_fields ){
			header('location: /');
			exit();
		}

		$bodyContent = ob_get_contents();
		ob_end_clean();
		$form_values['subject'] = $subject;
		$mail = new PHPMailer();
		$mail->isSMTP(true);
		$mail->Mailer = "smtp";
		//$mail->SMTPDebug  = 4;
		$mail->SMTPAuth   = true;
		$mail->SMTPSecure = "tls";
		$mail->Port       = 587;
		$mail->Host       = "smtp.office365.com";
		$mail->Username   = "crm@azulik.com";
		$mail->Password   = "0d00.AzLK.20";
		$mail->Subject = $subject;
		$mail->addCustomHeader( 'X-Mailer: ' . $form_values['host'] . '/ PHP/' . phpversion(), 'Message-ID: <' . gmdate( 'YmdHs' ) . '@' . $form_values['host'] . '/>', 'Sender: ' . $form_values['host'] . '/', 'Sent: ' . date( 'd-m-Y' ) );
		$mail->From = 'crm@azulik.com';
		$mail->FromName = 'Roth Architecture';
		/*if( $_POST['formType']=='contact' ){
			$mail->AddAddress( 'gfernandez@azulik.com', 'Roth Contact Form' );
		} else if( $_POST['formType']=='schedule' ){
			$mail->AddAddress( 'gfernandez@azulik.com', 'Roth Schedule Form' );
		} else if( $_POST['formType']=='career' ){
			$mail->AddAddress( 'gfernandez@azulik.com', 'Roth Carrers Form' );
		}*/
		if( $_POST['formType']=='contact' ){
			$mail->AddAddress( 'contacto@roth-architecture.com', 'Roth Contact Form' );
		} else if( $_POST['formType']=='schedule' ){
			$mail->AddAddress( 'contacto@roth-architecture.com', 'Roth Schedule Form' );
		} else if( $_POST['formType']=='career' ){
			$form_to = $_POST['form_to'] == 'yamila.lamonaco' ? 'yamila.lamonaco@hrperformance.com.ar' : 'careers@roth-architecture.com';
			$mail->AddAddress( $form_to, 'Roth Carrers Form' );
		}
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
		$include_thanks = $_POST['formType'] == 'contact' ? 'contact-thanks.php' : 'contact-schedule.php';
		if( $_POST['formType']=='contact' ){
			$include_thanks = 'contact-thanks.php';
		} else if( $_POST['formType']=='schedule' ){
			$include_thanks = 'contact-schedule.php';
		} else if( $_POST['formType']=='career' ){
			$include_thanks = 'contact-thanks.php';
		}
		include( $include_thanks );
		$bodyContent = ob_get_contents();
		ob_end_clean();
		if( $_POST['formType']=='contact' ){
			$subject_thanks = 'Thank you for getting in touch';
		} else if( $_POST['formType']=='schedule' ){
			$subject_thanks = 'Thank you for request a call with us';
		} else if( $_POST['formType']=='career' ){
			$subject_thanks = 'Thank you for getting in touch';
		}
		$mail = new PHPMailer();
		$mail->isSMTP(true);
		$mail->Mailer = "smtp";
		//$mail->SMTPDebug  = 4;
		$mail->SMTPAuth   = true;
		$mail->SMTPSecure = "tls";
		$mail->Port       = 587;
		$mail->Host       = "smtp.office365.com";
		$mail->Username   = "crm@azulik.com";
		$mail->Password   = "0d00.AzLK.20";
		$mail->Subject = $subject_thanks;
		$mail->addCustomHeader( 'X-Mailer: ' . $form_values['host'] . '/ PHP/' . phpversion(), 'Message-ID: <' . gmdate( 'YmdHs' ) . '@' . $form_values['host'] . '/>', 'Sender: ' . $form_values['host'] . '/', 'Sent: ' . date( 'd-m-Y' ) );
		$mail->From = 'crm@azulik.com';
		$mail->FromName = 'Roth Architecture';
		$mail->AddAddress( $_POST['email'], $_POST['name'] );
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
