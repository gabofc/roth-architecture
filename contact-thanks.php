<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="robots" content="noindex" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="https://fonts.googleapis.com/css2?family=Averia+Serif+Libre&family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
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
		background-color: #FFF;
		}
		.email-container{
		font-family: 'Roboto Mono', Verdana, Arial, Helvetica, sans-serif;
		width: 600px;
		font-weight: normal;
		background-color: #e3e3e3;
		margin:0 auto 0 auto;
		padding-bottom:50px;
		text-align:center;
		display:block;
		}
		.email-container a:link,
		.email-container a:hover,
		.email-container a:visited,
		.email-container a:active{
		color:#000;
		text-decoration: none;
		}
		.email-header{
			padding: 70px 0;
		}
		.email-header .logo-azulik{
			width: 250px;
			margin-bottom: 70px;
		}
		.email-header .img-azulik{
			width: 90%;
		}
		.email-h1{
			font-family: 'Averia Serif Libre', Verdana;
			font-size: 25px;
			font-weight: bold;
			font-stretch: normal;
			font-style: normal;
			line-height: 1.52;
			letter-spacing: 2.08px;
		}
		.email-line{
			width: 23px;
			height: 1px;
			border-top: solid 2px #000000;
			margin: 34px auto;
		}
		.email-thanks{
			width: 430px;
		  font-size: 14px;
		  font-weight: 300;
		  font-stretch: normal;
		  font-style: normal;
		  line-height: 1.71;
		  letter-spacing: 1.35px;
			margin: auto;
			text-transform: uppercase;
		}
		.email-ball{
			margin: 40px auto;
		}
		.email-ball img {
			width: 110px;
		}
		.email-regards{
			font-family: 'Averia Serif Libre', Verdana;
			font-size: 17px;
			font-weight: bold;
			font-stretch: normal;
			font-style: normal;
			line-height: 1.47;
			letter-spacing: 1.64px;
		}
		.email-social{
			margin: 130px auto 34px;
		}
		.email-social img {
			width: 25px;
			margin: 0 15px;
		}
		@media screen and (max-width: 600px){
			.email-container{
				width: 98%;
			}
			.email-thanks{
				width: 90%;
			}
		}
	</style>
</head>

<body paddingwidth="0" paddingheight="0" bgcolor="#FFF" style="padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;" offset="0" toppadding="0" leftpadding="0">
	<div class="email-container">
		<div class="email-header">
			<img src="https://www.roth-architecture.com/images/mail/logo-black.png" class="logo-azulik" title="Roth Architecrure" />
			<img src="https://www.roth-architecture.com/images/mail/azulik-image.jpg" class="img-azulik" title="Roth Architecture" />
		</div>
		<div class="email-h1">
			Dear <?php echo isset($_REQUEST['name']) ? ucwords($_REQUEST['name']) : 'name'; ?>,<br>Thank you for getting in touch.
		</div>
		<div class="email-line"></div>
		<div class="email-thanks">
			We have received your message and will get back to you shortly. Should you have any additional queries, please send us a new message via our contact form.
		</div>
		<div class="email-ball">
			<img src="https://www.roth-architecture.com/images/mail/estambre-black.png" />
		</div>
		<div class="email-regards">
			Warm regards,
		</div>
		<div class="email-social">
			<a href="https://www.linkedin.com/company/rotharchitecture"><img src="https://www.roth-architecture.com/images/mail/in-black.png" /></a>
			<a href="https://www.facebook.com/rotharch"><img src="https://www.roth-architecture.com/images/mail/fb-black.png" /></a>
			<a href="https://www.instagram.com/roth_architecture/"><img src="https://www.roth-architecture.com/images/mail/ig-black.png" /></a>
		</div>
	</div>
</body>
