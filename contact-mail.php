<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="robots" content="noindex" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:400,300,500,700">
	<style>
		*{
		padding:0;
		margin:0;
		}
		body {
		padding-top: 0 !important;
		padding-bottom: 0 !important;
		padding-top: 0 !important;
		padding-bottom: 0 !important;
		margin:0 !important;
		width: 100% !important;
		-webkit-text-size-adjust: 100% !important;
		-ms-text-size-adjust: 100% !important;
		-webkit-font-smoothing: antialiased !important;
		font-family: 'Roboto', sans-serif;
		background-color: #ccc
		}
		.email-container{
		font-family: Roboto, Verdana, Arial, Helvetica, sans-serif;
		font-weight: normal;
		background-color: #CCC;
		margin:0 auto 0 auto;
		padding-bottom:50px;
		text-align:left;
		display:block;
		}
		.email-container a:link,
		.email-container a:hover,
		.email-container a:visited,
		.email-container a:active{
		color:#869424;
		}
		.email-header{
		background-color:#466176;
		height:250px;
		width:100%;
		}
		.email-body{
		width:700px;
		font-size: 12px;
		background-color: #FFF;
		padding:15px;
		border:1px solid dotted;
		margin:0px auto 0 auto;
		border: 1px dotted #616161;
		box-shadow: 0px 10px 15px #888888;
		}
		.email-body table{
		font-size: 12px;
		font-family: 'Roboto', sans-serif;
		}
		.email-body p{
		margin-bottom:15px;
		}
		.email-body ul, .email-body ol {
		padding-left: 35px;
		margin-bottom:15px;
		}
		.email-body .email-fecha{
		text-align:right;
		font-weight:bold;
		}
		.email-body .email-mensaje{
		margin:15px 0;
		}
		.email-body .email-mensaje span{
		width:150px;
		font-weight: bold;
		display: inline-block;
		}
		.email-body .email-footer{
		text-align:center;
		}
		@media screen and (max-width: 650px){
			.email-header{
				height:150px;
			}
			.email-body{
				width:85%;
				font-size: 12px;
				background-color: #FFF;
				padding:15px;
				border:1px solid dotted;
				margin:-100px auto 0 auto;
				border: 1px dotted #616161;
				box-shadow: 0px 10px 15px #888888;
			}
		}
	</style>
</head>

<body paddingwidth="0" paddingheight="0" bgcolor="#d1d3d4" style="padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;" offset="0" toppadding="0" leftpadding="0">
	<div class="email-container">
		<div class="email-body">
			<div class="email-content">
				<p class="email-destinatario"><strong>Contacto de Roth</strong>:</p>
				<div class="email-mensaje">
					<?php foreach ($_REQUEST as $key => $post) {
						echo '<span id="'. $key .'">'. $key .'</span> '. $post .'<br>';
					}?>
					<?php if( $_REQUEST['formType'] == 'schedule' ){
						$formated_date = explode("/", $_REQUEST['fecha']);
						$new_date = $formated_date[2]."-".$formated_date[0]."-".$formated_date[1]." ".$_REQUEST['hora'];
						$url = '?location='.$_REQUEST['code'].' '.$_REQUEST['phone'].'&description='.$_REQUEST['message'].'&dtstart='.$new_date.'&summary=Scheduled call with '.$_REQUEST['name'];
						//echo '<br><a href="https://roth-architecture.com/download-schedule'.$url.'">DOWNLOAD ICS CALENDAR</a>';
					}?>
				</div>
			</div>
		</div>
	</div>
</body>
