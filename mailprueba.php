<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\OAuth;
	use League\OAuth2\Client\Provider\Google;
	include 'lib/src/Exception.php';
	include 'lib/src/PHPMailer.php';
	include 'lib/src/SMTP.php';
	include 'lib/src/OAuth.php';
	$status = array( 'status' => 'Empty' );
	if ( isset( $_REQUEST[ 'mail' ] ) ) {
		$dominio = 'deorno.com.mx';
		$mail = new PHPMailer();
		$mail->isSMTP( true );
		$mail->SMTPDebug = 2;
		$mail->Mailer = 'smtp';
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'ssl';
		$mail->Port = 465;
		$mail->Host = 'smtp.gmail.com';
		$mail->Username = 'deornocommx@gmail.com';
		$mail->Password = 'W3b$servic3s';
		$mail->SetFrom( 'store@deorno.com.mx', 'Ecommerce Deorno' );
		$mail->AddAddress( $_REQUEST[ 'mail' ], $_REQUEST[ 'nombre' ] );
		$mail->AddReplyTo( 'ecommerce@deorno.com', 'Atencion Deorno' );
		$mail->addCustomHeader(
			'X-Mailer: ' . $dominio . '/ PHP/' . phpversion(),
			'Message-ID: <' . gmdate( 'YmdHs' ) . '@' . $dominio . '/>',
			'Sender: ' . $dominio . '/',
			'Sent: ' . date( 'd-m-Y' ),
			'Organization: Deorno',
			'Content-Transfer-encoding: 8bit'
		);
		$mail->Subject = $_REQUEST[ 'asunto' ];
		$mail->msgHTML( $_REQUEST[ 'mensaje' ] );
		$mail->AltBody = 'HTML messaging not supported';
		if( $mail->Send() ) {
			$status[ 'status'] = 'Success';
		} else {
			$status[ 'status'] = 'Error';
			$status[ 'mailError' ] = $mail->ErrorInfo;
		}
	} else {
		$status[ 'status'] = 'Mail';
	}
	echo json_encode( $status );
	exit();
?>
