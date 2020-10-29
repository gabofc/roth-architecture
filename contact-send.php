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
		include 'lib/src/Exception.php';
		include 'lib/src/PHPMailer.php';
		include 'lib/src/SMTP.php';
		include 'lib/src/OAuth.php';
		$form_values['host'] = 'roth-architecture.com';

		//Contact data send
		$include_mail = 'contact-mail.php';
		include( $include_mail );
		$subject = $_REQUEST['formType'] == 'contact' ? 'Contacto desde Roth Architecture' : 'New scheduled call request from Roth Architecture';
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
		$mail->AddAddress( 'fpires@azulik.com', 'Roth Contact Form' );
		$mail->IsHTML( true );
		$mail->CharSet = 'UTF-8';
		$mail->AltBody = $subject;
		$mail->Body = $bodyContent;
		if( $mail -> Send() ) {
			$status = array( 'status' => 'Success' );
		} else {
			$status = array( 'status' => 'Error', 'mensaje' => $mail->ErrorInfo );
		}

		//Thanks page sending
		$include_thanks = $_REQUEST['formType'] == 'contact' ? 'contact-thanks.php' : 'contact-schedule.php';
		include( $include_thanks );
		$bodyContent = ob_get_contents();
		ob_end_clean();
		$subject_thanks = $_REQUEST['formType'] == 'contact' ? 'Thank you for getting in touch' : 'Thank you for request a call with us';
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
		if( $mail -> Send() ) {
			$status = array( 'status' => 'Success' );
		} else {
			$status = array( 'status' => 'Error', 'mensaje' => $mail->ErrorInfo );
		}
		echo json_encode( $status );
		exit();
	}
v
?>
