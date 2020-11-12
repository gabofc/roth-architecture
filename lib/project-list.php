<?php
	function limpialo( $cadena ) {
		$cadenaLimpia = preg_replace( '[\s+]','-', trim( stripslashes( $cadena ) ) );
		$cadenaLimpia = str_replace( ' ', '-', $cadenaLimpia );
		$cadenaLimpia = str_replace( '#', '', $cadenaLimpia );
		$cadenaLimpia = str_replace( '@', '', $cadenaLimpia );
		$cadenaLimpia = str_replace( '*', '', $cadenaLimpia );
		$cadenaLimpia = str_replace( ',', '', $cadenaLimpia );
		$cadenaLimpia = str_replace( '&', '', $cadenaLimpia );
		$cadenaLimpia = str_replace( '=', '', $cadenaLimpia );
		$cadenaLimpia = str_replace( '(', '', $cadenaLimpia );
		$cadenaLimpia = str_replace( ')', '', $cadenaLimpia );
		$cadenaLimpia = str_replace( '.', '', $cadenaLimpia );
		$cadenaLimpia = str_replace( "''", '', $cadenaLimpia );
		$cadenaLimpia = str_replace( "'", '', $cadenaLimpia );
		$cadenaLimpia = str_replace( '”', '', $cadenaLimpia );
		$cadenaLimpia = str_replace( 'ñ', 'n', $cadenaLimpia );
		$cadenaLimpia = str_replace( 'Ñ', 'N', $cadenaLimpia );
		$cadenaLimpia = str_replace( '"', '', $cadenaLimpia );
		$cadenaLimpia = str_replace( '/', '', $cadenaLimpia );
		$cadenaLimpia = str_replace( '�','', $cadenaLimpia );
		$cadenaLimpia = str_replace( '¿','', $cadenaLimpia );
		$cadenaLimpia = str_replace( '?','', $cadenaLimpia );
		$cadenaLimpia = str_replace( ' ', '-', $cadenaLimpia );
		$cadenaLimpia = str_replace( '°', '', $cadenaLimpia );
		$cadenaLimpia = str_replace(
			array( 'á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú' ),
			array( 'a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U' ),
			$cadenaLimpia
		);
		$cadenaLimpia = str_replace( '--', '-', $cadenaLimpia );
		$cadenaLimpia = str_replace( '--', '-', $cadenaLimpia );
		$cadenaLimpia = strtolower( $cadenaLimpia );
		$cadenaLimpia = mb_substr( $cadenaLimpia, 0, 490, 'UTF-8' );
		return $cadenaLimpia;
	}
	$project = array(
		'azulik' => array(
			'name' => 'AZULIK',
			'type' => 'Hotel',
			'location' => 'Tulum',
			'year' => '2014',
			'size' => '19700 m2',
			'status' => 'Completed',
			'architect' => 'ROTH ARCHITECTURE',
			'image' => 'main-image.jpg',
			'description' => array(
				1 => 'AZULIK es en la primera obra de Roth Architecture. Este espacio sezconvirtió en la manifestación material de una travesía creativa inspirada por el intercambio con distintos grupos étnicos que se revela en la priorización del vínculo con la naturaleza.',
				2 => 'En su propósito convergen lo comercial y lo cultural, conceptos condensados en un paisajismo que combina vistas al mar con el contacto con la selva y que asume al cielo como protagonista. Un programa de construcción elevada, desarrollado con la intención de no tocar el suelo o alterar el ecosistema, alojas iniciativas que comprenden propuestas gastronómicas, de wellness y lifestyle.',
				3 => 'La estructura fue conceptualizada como una casa del árbol que convoca al juego y al autodescubrimiento. Sus distintos niveles se entretejen en circulaciones suspendidas que generan una experiencia lúdica, la cual se nutre además de los materiales endémicos usados para su construcción.'
			),
		),
		'kin-toh' => array(
			'name' => 'KIN TOH',
			'type' => '',
			'location' => 'Tulum',
			'year' => '2014',
			'size' => '',
			'status' => '',
			'architect' => '',
			'image' => 'main-image.jpg',
			'description' => array(
				1 => '',
				2 => '',
				3 => ''
			)
		),
		'zak-ik' => array(
			'name' => 'ZAK IK',
			'type' => '',
			'location' => 'Tulum',
			'year' => '2017',
			'size' => '',
			'status' => '',
			'architect' => '',
			'image' => 'main-image.jpg',
			'description' => array(
				1 => '',
				2 => '',
				3 => ''
			)
		),
		'sfer-ik' => array(
			'name' => 'SFER IK',
			'type' => '',
			'location' => 'Tulum',
			'year' => '2019',
			'size' => '',
			'status' => '',
			'architect' => '',
			'image' => 'main-image.jpg',
			'description' => array(
				1 => '',
				2 => '',
				3 => ''
			)
		),
		'tseen-ja' => array(
			'name' => 'TSEEN JA',
			'type' => '',
			'location' => 'Tulum',
			'year' => '2015',
			'size' => '',
			'status' => '',
			'architect' => '',
			'image' => 'main-image.jpg',
			'description' => array(
				1 => '',
				2 => '',
				3 => ''
			)
		),
		'kuboraum' => array(
			'name' => 'KUBORAUM',
			'type' => '',
			'location' => 'Tulum',
			'year' => '2018',
			'size' => '',
			'status' => '',
			'architect' => '',
			'image' => 'main-image.jpg',
			'description' => array(
				1 => '',
				2 => '',
				3 => ''
			)
		),
		'uh-may' => array(
			'name' => 'SFER IK',
			'type' => '',
			'location' => 'UH MAY',
			'year' => '2018',
			'size' => '',
			'status' => '',
			'architect' => '',
			'image' => 'main-image.jpg',
			'description' => array(
				1 => '',
				2 => '',
				3 => ''
			)
		),
		'azulik-residence' => array(
			'name' => 'AZULIK RESIDENCE',
			'type' => '',
			'location' => 'UH MAY',
			'year' => '2018',
			'size' => '',
			'status' => '',
			'architect' => '',
			'image' => 'main-image.jpg',
			'description' => array(
				1 => '',
				2 => '',
				3 => ''
			)
		),
		'azulik-uh-may' => array(
			'name' => '',
			'type' => '',
			'location' => 'UH MAY',
			'year' => '2019',
			'size' => '',
			'status' => '',
			'architect' => '',
			'image' => 'main-image.jpg',
			'description' => array(
				1 => '',
				2 => '',
				3 => ''
			)
		),
		'nests-selva-zama' => array(
			'name' => 'NEST’S - SELVA ZAMÁ',
			'type' => '',
			'location' => '',
			'year' => '2018',
			'size' => '',
			'status' => '',
			'architect' => '',
			'image' => 'main-image.jpg',
			'description' => array(
				1 => '',
				2 => '',
				3 => ''
			)
		)
	);
?>