<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="robots" content="noindex" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="color-scheme" content="Light only">
	<link href="https://fonts.googleapis.com/css2?family=Averia+Serif+Libre&display=swap" rel="stylesheet" type="text/css" >
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
		font-family: 'Averia Serif Libre', Verdana, Arial, Helvetica, sans-serif;
		width: 600px;
		font-weight: normal;
		background-color: #000;
		margin:0 auto 0 auto;
		padding-bottom:50px;
		text-align:center;
		display:block;
		color: #FFF;
		}
		.email-container a:link,
		.email-container a:hover,
		.email-container a:visited,
		.email-container a:active{
		color:#FFF;
		text-decoration: none;
		}
		.email-header{
			width: 250px;
			padding: 70px 0;
			margin: 0 auto;
			text-align: center;
		}
		.email-header .logo-azulik{
			width: 100%;
			margin-bottom: 70px;
		}
		.email-header .img-azulik{
			width: 90%;
		}
		.email-h1{
			font-family: 'Averia Serif Libre', Verdana;
			font-size: 26px;
			font-weight: normal;
			font-stretch: normal;
			font-style: normal;
			letter-spacing: 2.08px;
			margin-bottom: 40px;
		}
		.email-line{
			width: 23px;
			height: 1px;
			border-top: solid 2px #FFF;
			margin: 34px auto;
		}
		.email-thanks{
			width: 90%;
			font-size: 19px;
  		letter-spacing: 2.17px;
		  font-weight: 300;
		  font-stretch: normal;
		  font-style: normal;
		  line-height: 1.71;
			margin: auto;
		}
		.email-thanks span{
			font-style: italic;
			display:block;
			margin-bottom:40px;
		}
		.email-regards{
			font-family: 'Averia Serif Libre', Verdana;
			font-size: 19px;
			font-weight: normal;
			font-stretch: normal;
			font-style: normal;
			line-height: 1.47;
			letter-spacing: 1.64px;
			margin-bottom: 80px;
		}
		.email-ball{
			margin: 0 auto 100px auto;
			width: 200px;
		}
		.email-ball img {
			width: 100%;
		}
		.email-social{
			margin: 130px auto 34px auto;
			text-align: center;
		}
		.email-social img {
			width: 25px;
		}
		.email-social a {
			width: 25px;
			margin: 0 15px;
		}
		@media screen and (max-width: 700px){
			.email-container{
				width: 100%;
				background-color: #000;
			}
			.email-header{
				padding: 40px 0;
			}
			.email-header .logo-azulik{
				width: 90%;
			}
			.email-thanks{
				width: 98%;
			}
			.email-h1{
				font-size: 20px;
			}
			.email-thanks,
			.email-regards{
				font-size: 18px;
			}
		}
	</style>
</head>

<body paddingwidth="0" paddingheight="0" bgcolor="#d1d3d4" style="padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;" offset="0" toppadding="0" leftpadding="0">
	<div style="background-color:#FFF; width:100%;">
		<div class="email-container">
			<div class="email-header">
				<img src="https://www.roth-architecture.com/images/mail/logo-white.png" class="logo-azulik" title="Roth Architecrure" />
			</div>
			<div class="email-h1">
				Dear <?php echo isset($_REQUEST['name']) ? ucwords($_REQUEST['name']) : 'name'; ?>,
			</div>
			<div class="email-thanks">
				Thank you for getting in touch.<br>
				<span class="italic">Your call is now scheduled.</span><br>
				We look forward to talking with you and we’ll contact you shortly with further details.
			</div>
			<div class="email-line"></div>
			<div class="email-regards">
				Warm regards,
			</div>
			<div class="email-ball">
				<img src="https://www.roth-architecture.com/images/mail/estambre-white.png" />
			</div>
			<div class="email-social">
				<a href="https://www.linkedin.com/company/rotharchitecture"><img src="https://www.roth-architecture.com/images/mail/in-white.png" /></a>
				<a href="https://www.facebook.com/rotharch"><img src="https://www.roth-architecture.com/images/mail/fb-white.png"/></a>
				<a href="https://www.instagram.com/roth_architecture/"><img src="https://www.roth-architecture.com/images/mail/ig-white.png" /></a>
			</div>
		</div>
	</div>
</body>
