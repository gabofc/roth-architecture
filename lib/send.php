<?php
	include 'class.phpmailer.php';
	$dominio = 'azulik.com';
	$asunto = 'Roth\'s Contact Web Form';
	$body = '<h2>Roth\'s Contact Web Form </h2><br><table><tr><th>Field</th><th>Value</th></tr>';
	foreach ($_REQUEST as $param_name => $param_val) {
		if ( strpos( $param_name, '_' ) == false && strpos( $param_name, 'PHP' ) == false ) {
			$valor = ( $param_val == 'undefined' ) ? '' : $param_val;
			$body .= '<tr><td>' . strtoupper( $param_name ) . '</td><td>' . $valor . '</td></tr>';
		}
	}
	$body .= '</table>';
	$mail = new PHPMailer();
	$mail->Host = $dominio . "/";
	$mail->addCustomHeader( "X-Mailer: " . $dominio . "/ PHP/" . phpversion(), "Message-ID: <" . gmdate( 'YmdHs' ) . "@" . $dominio . "/>", "Sender: " . $dominio . "/", "Sent: " . date( 'd-m-Y' ) );
	$mail->From = 'no-reply@' . $dominio;
	$mail->FromName = 'ROTH\'s WEB';
	$mail->Subject = $asunto;
	$mail->AddAddress( 'gfernandez@azulik.com', 'Gabriel Fernandez' );
	$mail->Body = $body;
	$mail->IsHTML( true );
	$mail->CharSet = 'UTF-8';
	$mail->AltBody = $asunto;
	if ( $mail -> Send() ) {
		$status = array( 'status' => 'Success' );
	} else {
		$status = array( 'status' => 'Error', 'error' => $mail->ErrorInfo );
	}
	echo json_encode( $status );
	exit();
?>
