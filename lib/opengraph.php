<?php
  $og_page = isset( $nombreArchivo ) && $nombreArchivo != '' ? $nombreArchivo : 'index.php';
	$og = array(
		'index.php' => array(
			'keywords' => '',
			'description' => 'Roth Architecture is a studio that confirms the link between human creation and nature, taking up ancestral knowledge to generate spaces for coexistence en elevation.',
  		'title' => 'Roth Architecture',
      'image' => 'azulik.jpg'
		),
		'about.php' => array(
			'keywords' => '',
			'description' => 'Roth Architecture creates organic structures that open our understanding to a deep connection with oneself, with others and with nature.',
  		'title' => 'About Us',
      'image' => 'about.jpg'
		),
		'founder.php' => array(
			'keywords' => '',
			'description' => 'Founder of AZULIK, SFER IK, and Enchanting Transformation, Roth creates architecture that challenges conventions and calls for play, surprise, and attention.',
  		'title' => 'Founder',
      'image' => 'founder.jpg'
		),
		'awards.php' => array(
			'keywords' => '',
			'description' => 'Roth Architecture has received many awards for its groundbreaking design, recognized by some of the top publications and organizations around the world. ',
  		'title' => 'Awards',
      'image' => 'awards.jpg'
		),
		'press.php' => array(
			'keywords' => '',
			'description' => 'Media coverage about Roth Architecture’s groundbreaking design. Articles, press releases and commentary in some of the world’s most prominent media outlets.',
  		'title' => 'Press',
      'image' => 'press.jpg'
		),
		'contact.php' => array(
			'keywords' => '',
			'description' => 'Get in touch. At Roth Architecture we want to hear from you and together keep creating spaces that link ancestral knowledge, art, and nature.',
  		'title' => 'Contact Us',
      'image' => 'contact.jpg'
		),
		'projects.php' => array(
			'keywords' => '',
			'description' => 'These are the projects where our vision comes to life. We create spaces that integrate with the environment and that can host a wide range of initiatives.',
  		'title' => 'Projects',
      'image' => 'azulik-share.jpg'
		),
		'philosophy.php' => array(
			'keywords' => '',
			'description' => 'Three axes support our philosophy: nature, art and ancestry. We reconnect the inhabitants of our spaces with themselves, with others and with the environment. ',
  		'title' => 'Philosophy',
      'image' => 'azulik-share.jpg'
		),
		'creative-process.php' => array(
			'keywords' => '',
			'description' => 'Our architecture is a confirmation of the organic systems present in nature. We integrate the environment to our creative process and adapt to the ecosystem.',
  		'title' => 'Creative Process',
      'image' => 'azulik-share.jpg'
		),
		'careers.php' => array(
			'keywords' => '',
			'description' => 'Career opportunities at Roth Architecture. Get in touch and be part of a creative team that reconnects people with themselves, with nature and with the environment.',
  		'title' => 'Careers',
      'image' => 'azulik-share.jpg'
		),
		'news.php' => array(
			'keywords' => '',
			'description' => 'News and the latest from Roth Architecture. Stay tuned to the cutting edge of architecture and get the latest developments of all our projects.',
  		'title' => 'News',
      'image' => 'azulik-share.jpg'
		),
		'services.php' => array(
			'keywords' => '',
			'description' => 'Roth Architecture provides a wide range of services for a variety of clients. Our creative proposals can host all kinds of projects and adapt to any number of environments. ',
  		'title' => 'Services',
      'image' => 'azulik-share.jpg'
		),
	);
	$og_page = isset( $og[ $og_page ] ) ? $og_page : 'index.php';
?>
<meta name="keywords" content="">
<meta name="description" content="<?php echo $og[$og_page]['description']; ?>"/>
<meta property="og:locale" content="en_MX" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Roth Architecture<?php echo $og_page == 'index.php' ? '' : ' - ' . $og[$og_page]['title']; ?>" />
<meta property="og:description" content="<?php echo $og[$og_page]['description']; ?>" />
<meta property="og:url" content="<?php echo $url; ?>" />
<meta property="og:site_name" content="Roth Architecture<?php echo $og_page == 'index.php' ? '' : ' - ' . $og[$og_page]['title']; ?>" />
<meta property="og:image" content="<?php echo $base.'/images/og/'.$og[$og_page]['image']; ?>" />
<meta property="og:image:secure_url" content="<?php echo $base.'/images/og/'.$og[$og_page]['image']; ?>" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:description" content="<?php echo $og[$og_page]['description']; ?>" />
<meta name="twitter:title" content="Roth Architecture<?php echo $og_page == 'index.php' ? '' : ' - ' . $og[$og_page]['title']; ?>" />
<meta name="twitter:site" content="@RothArchitecture" />
<meta name="twitter:image" content="<?php echo $base.'/images/og/'.$og[$og_page]['image']; ?>" />
<meta name="twitter:creator" content="@RothArchitecture" />
