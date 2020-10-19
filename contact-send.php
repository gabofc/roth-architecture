<?php
	/*ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);*/
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\OAuth;
	use League\OAuth2\Client\Provider\Google;
	header( 'Access-Control-Allow-Origin: *' );
	if( !isset( $_REQUEST ) || empty( $_REQUEST )){
		header('location: /');
		exit();
	} else {
		//Thanks page sending
		$include_mail = 'contact-mail.php';
		$thanks_subject = 'Contacto desde Roth Architecture';
		include( $include_mail );
		$bodyContent = ob_get_contents();
		ob_end_clean();
		$form_values['host'] = 'roth-architecture.com';
		$form_values['subject'] = $thanks_subject;
		include 'lib/src/Exception.php';
		include 'lib/src/PHPMailer.php';
		include 'lib/src/SMTP.php';
		include 'lib/src/OAuth.php';
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
		$mail->Subject = $form_values['subject'];
		$mail->addCustomHeader( 'X-Mailer: ' . $form_values['host'] . '/ PHP/' . phpversion(), 'Message-ID: <' . gmdate( 'YmdHs' ) . '@' . $form_values['host'] . '/>', 'Sender: ' . $form_values['host'] . '/', 'Sent: ' . date( 'd-m-Y' ) );
		$mail->From = 'crm@azulik.com';
		$mail->FromName = 'AZULIK Tulum';
		$mail->AddAddress( 'contacto@roth-architecture.com'], 'Roth Contact Form' );
		$mail->AddAddress( 'gfernandez@azulik.com', 'Roth Contact Form' );
		$mail->AddAddress( 'fpires@azulik.com', 'Roth Contact Form' );
		$mail->IsHTML( true );
		$mail->CharSet = 'UTF-8';
		$mail->AltBody = $thanks_subject;
		$mail->Body = $bodyContent;
		if( isset( $_REQUEST['debug'] ) && $_REQUEST['debug'] == 'on' ){
			echo $bodyContent;
			var_dump( $_POST );
			exit();
		} else {
			if( $mail -> Send() ) {
				$status = array( 'status' => 'Success' );
			} else {
				$status = array( 'status' => 'Error', 'mensaje' => $mail->ErrorInfo );
			}
			echo json_encode( $status );
		}
		exit();
	}

?>
