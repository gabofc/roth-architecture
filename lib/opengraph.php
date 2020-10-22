<?php
  $og_page = isset( $nombreArchivo ) && $nombreArchivo != '' ? $nombreArchivo : 'index.php';
	$og = array(
		'index.php' => array(
			'keywords' => '',
			'description' => 'Roth Architecture is a studio that confirms the link between human creation and nature, taking up ancestral knowledge to generate spaces for coexistence en elevation.',
  		'title' => 'Roth Architecture',
      'image' => 'azulik-share.jpg'
		),
		'about.php' => array(
			'keywords' => '',
			'description' => 'Roth Architecture creates organic structures that open our understanding to a deep connection with oneself, with others and with nature.',
  		'title' => 'About Us',
      'image' => 'azulik-share.jpg'
		),
		'founder.php' => array(
			'keywords' => '',
			'description' => 'Founder of AZULIK, SFER IK, and Enchanting Transformation, Roth creates architecture that challenges conventions and calls for play, surprise, and attention.',
  		'title' => 'Founder',
      'image' => 'azulik-share.jpg'
		),
		'awards.php' => array(
			'keywords' => '',
			'description' => 'Roth Architecture has received many awards for its groundbreaking design, recognized by some of the top publications and organizations around the world. ',
  		'title' => 'Awards',
      'image' => 'azulik-share.jpg'
		),
		'press.php' => array(
			'keywords' => '',
			'description' => 'Media coverage about Roth Architecture’s groundbreaking design. Articles, press releases and commentary in some of the world’s most prominent media outlets.',
  		'title' => 'Press',
      'image' => 'azulik-share.jpg'
		),
		'contact.php' => array(
			'keywords' => '',
			'description' => 'Get in touch. At Roth Architecture we want to hear from you and together keep creating spaces that link ancestral knowledge, art, and nature.',
  		'title' => 'Contact Us',
      'image' => 'azulik-share.jpg'
		),
	);
?>
<meta name="keywords" content="">
    <meta name="description" content="<?php echo $og[$og_page]['description']; ?>"/>
    <meta property="og:locale" content="en_MX" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Roth Architecture<?php echo $og_page == 'index.php' ? '' : ' - ' . $og[$og_page]['title']; ?>" />
    <meta property="og:description" content="<?php echo $og[$og_page]['description']; ?>" />
    <meta property="og:url" content="<?php echo $base ?>" />
    <meta property="og:site_name" content="Roth Architecture<?php echo $og_page == 'index.php' ? '' : ' - ' . $og[$og_page]['title']; ?>" />
    <meta property="og:image" content="<?php echo $base.'/images/og/'.$og[$og_page]['image']; ?>" />
    <meta property="og:image:secure_url" content="<?php echo $base.'/images/og/'.$og[$og_page]['image']; ?>" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="<?php echo $og[$og_page]['description']; ?>" />
    <meta name="twitter:title" content="<?php echo $og[$og_page]['title']; ?>" />
    <meta name="twitter:site" content="@RothArchitecture" />
    <meta name="twitter:image" content="<?php echo $base.'/images/og/'.$og[$og_page]['image']; ?>" />
    <meta name="twitter:creator" content="@RothArchitecture" />
