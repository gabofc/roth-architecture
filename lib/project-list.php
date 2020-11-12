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
			'type' => 'Restaurant',
			'location' => 'Tulum',
			'year' => '2014',
			'size' => '850 m2',
			'status' => 'Completed',
			'architect' => 'ROTH ARCHITECTURE',
			'image' => 'main-image.jpg',
			'description' => array(
				1 => 'Uno de los espacios icónicos gracias a su diseño que apela a la experiencia en las alturas por medio de una atmósfera suspendida y una travesía de elevación para el usuario.',
				2 => 'La propuesta replica los nidos de las aves y con base en esa idea, genera la sensorialidad del vuelo, adaptándola a la escala humana.',
				3 => 'Los espacios privados, son al mismo tiempo un centro de reunión y de contemplación, las redes suspendidas incitan a la interacción con el espacio y las escaleras obligan al usuario a prestar atención.',
				4 => 'Con vistas compartidas a la selva y el mar, la calidez de las estructuras de madera, el diseño icónico de los accesos y la ambientación nocturna a media luz han hecho de Kin Toh, un referente del diseño de Roth Architecture.'
			)
		),
		'zak-ik' => array(
			'name' => 'ZAK IK',
			'type' => 'Retail',
			'location' => 'Tulum',
			'year' => '2017',
			'size' => '380 m2',
			'status' => 'Completed',
			'architect' => 'ROTH ARCHITECTURE',
			'image' => 'main-image.jpg',
			'description' => array(
				1 => 'Buscando desafiar la experiencia del retail, la propuesta consistió en generar recorridos por medio de juegos de diferentes alturas al interior. Las luces artificiales y naturales empatan con la travesía del usuario que va descubriendo el espacio progresivamente y encontrando en él distintos elementos que le permiten interactuar: ya sea un columpio o una pared que invita a ser escalada. Los elementos naturales: agua, árboles y luz natural, son protagónicos en la construcción de la experiencia y la configuración del espacio, nutriendo de más estímulos.',
				2 => 'ZAK IK se presenta como un espacio en el que los límites de lo privado y lo público son difusos, con una dualidad flexible entre lo que acota y lo que permite la expansión visual.'
			)
		),
		'sfer-ik' => array(
			'name' => 'SFER IK',
			'type' => 'Culture',
			'location' => 'Tulum',
			'year' => '2017',
			'size' => '490 m2',
			'status' => 'Completed',
			'architect' => 'ROTH ARCHITECTURE',
			'image' => 'main-image.jpg',
			'description' => array(
				1 => 'Nacido como un espacio convocado al arte, SFER IK es un museïon que desafía todas las convenciones en la experiencia contemplativa del espectador. Contrario a la forma tradicional de exponer el arte, en la cual los estímulos paralelos a las piezas son prácticamente nulos, en SFER IK la experiencia es envolvente e integral: participan todos los sentidos.',
				2 => 'El movimiento topográfico del suelo, ofrece un relieve natural que permite una trayectoria de elevación y descenso al recorrer el espacio. Las vistas a la naturaleza por medio de ventanas juegan como lienzos verdes que circulan al lugar y proveen de luz, además de ser un estímulo compartido con el contraste que genera el concreto junto al bejuco tanto en lo visual como en lo sensorial al caminar el suelo.'
			)
		),
		'tseen-ja' => array(
			'name' => 'TSEEN JA',
			'type' => 'Restaurant',
			'location' => 'Tulum',
			'year' => '2015',
			'size' => '340 m2',
			'status' => 'Completed',
			'architect' => 'ROTH ARCHITECTURE',
			'image' => 'main-image.jpg',
			'description' => array(
				1 => 'Inspirados en la estética Japonesa, Tseen Ja incorpora a su atmósfera mesas bajas, presencia de elementos naturales como el agua, y la calidez de la madera en forma de bejuco.',
				2 => 'Ofreciendo áreas para un ambiente más privado, cuenta con nidos que además de servir como puntos de contemplación, fungen como juegos geométricos que visualmente enriquecen la experiencia desde las alturas. La dualidad entre la penumbra y la luz se hace presente gracias a los juegos de luces artificiales y la parte lúdica se expresa por medio de puentes colgantes. Los recorridos que marcan el inicio de la experiencia - como el tunel de ingreso- juegan con la divergencia entre el exterior e interior, haciendo muy perceptible la atmósfera envolvente del lugar.'
			)
		),
		'kuboraum' => array(
			'name' => 'KUBORAUM',
			'type' => 'Retail',
			'location' => 'Tulum',
			'year' => '2018',
			'size' => '85 m2',
			'status' => 'Completed',
			'architect' => 'ROTH ARCHITECTURE',
			'image' => 'main-image.jpg',
			'description' => array(
				1 => 'Un espacio que exigía la fusión de dos propuestas creativas muy fuertes: el punto de exhibición y venta de una de las marcas de eyewear más originales del mundo. La atmósfera se generó desde una propuesta monocromática con luces tenues, en la que los objetos se encuentran suspendidos, de esta forma el usuario tiene una perspectiva panorámica y una comprensión inmediata del espacio. Hay un juego de penumbras intencional para volver a las piezas exhibidas son las protagonistas por medio de una dinámica de profundidad visual.'
			)
		),
		'uh-may' => array(
			'name' => 'SFER IK',
			'type' => 'Culture',
			'location' => 'UH MAY',
			'year' => '2018',
			'size' => '1700 m2',
			'status' => 'Completed',
			'architect' => 'ROTH ARCHITECTURE',
			'image' => 'main-image.jpg',
			'description' => array(
				1 => 'Al caminar sobre las formas preexistentes de la naturaleza entramos en resonancia con los patrones. La energía sigue a la forma y la forma determina la función. Así, entramos en sinergia con el modelo de desarollo que la naturaleza creó para ese lugar.',
				2 => 'El Museiön se realizó sin planos. Sin una idea previa al construir, de forma tal que sucede espontáneamente en el lugar. El diseño del piso sigue la forma de la naturaleza, es todo ondulado, se recorre de forma descalza y las texturas cambian en representación de los cuatro elementos: aire, fuego, tierra y agua. Los materiales de la construcción exigieron diseñar una técnica de uso del cemento.',
				3 => 'Sin columnas, todo se trabajó siguiendo la lógica de la forma, como se construye un cesto.'
			)
		),
		'azulik-residence' => array(
			'name' => 'AZULIK RESIDENCE',
			'type' => 'Residential',
			'location' => 'UH MAY',
			'year' => '2018',
			'size' => '3200 m2',
			'status' => 'Completed',
			'architect' => 'ROTH ARCHITECTURE',
			'image' => 'main-image.jpg',
			'description' => array(
				1 => 'El entendimiento de AZULIK Residence, como proyecto arquitectónico y conceptualmente, está fundamentalmente vinculado a la noción de la arquitectura textil. La edificación desde la premisa del tejido, es decir, la comprensión de cada parte para lograr la integración en la totalidad. Elaborada en un símil de la creación de una cesta, la estructura se mantiene por la forma. No hay una estructura portante; es gracias a la forma que se confiere esa cualidad.',
				2 => 'Para la gestación de AZULIK Residence no hubo planos, ni croquis, ni dibujos previos de ningún tipo. Esa libertad es indudablemente una de las características que revelan su originalidad y también la esencia de sus desafíos más significativos: el respeto a los que llegaron antes – la flora, la fauna y el suelo.',
				3 => 'Dentro de los desafíos técnicos más visibles se encuentra el impedimento a usar maquinaria pesada, ya que está implicaba la tala de árboles. El resultado derivó en un trabajo manual y una ligera modificación al proceso de hacer concreto. La ubicación absolutamente inmersa en la selva ha exigido encontrar formas creativas que aligeren y vuelvan más resistente al concreto dentro de una estructura no convencional que no es sostenida por columnas ni vigas, sino tejida como un cesto: una evocación a la arquitectura textil.'
			)
		),
		'azulik-uh-may' => array(
			'name' => 'AZULIK UH MAY HOTEL',
			'type' => 'Hotel',
			'location' => 'UH MAY',
			'year' => '2019',
			'size' => '10 Has',
			'status' => 'In progress',
			'architect' => 'ROTH ARCHITECTURE',
			'image' => 'main-image.jpg',
			'description' => array(
				1 => 'El proyecto ubicado en la comunidad de Francisco Uh May, comenzó en el año 2018, con la construcción de SFER IK y una vivienda privada. Actualmente en proceso de construcción, contempla la realización de 42 villas, un espacio gastronómico y un centro de diseño que comprende áreas de exposición, workshops y oficinas. Desafiando y buscando innovar en la experiencia recreativa y el sector turístico, reafirma los principios de reconexión con la naturaleza incorporando nuevas tecnologías como drones, controles inteligentes de espacios, entre otros.',
				2 => 'Recorridos dinámicos y descubrimiento del espacio de forma progresiva comparten el propósito con la sustentabilidad, el arte y las experiencias memorables fuera de lo predecible.'
			)
		),
		'nests-selva-zama' => array(
			'name' => 'NEST’S - SELVA ZAMÁ',
			'type' => 'Residential',
			'location' => 'Tulum',
			'year' => '2018',
			'size' => '29500 m2',
			'status' => 'Project',
			'architect' => 'ROTH ARCHITECTURE',
			'image' => 'main-image.jpg',
			'description' => array(
				1 => 'Nest\'s es un complejo habitacional que busca la vida en comunidad, la convivencia de los habitantes mediante el uso de espacios comunes vinculados a partir del entorno natural. La distribución radial del programa supone un mirador principal en el centro, amenidades en la primer circunferencia, y módulos habitacionales en la periferia. Las construcciones residenciales son dinámicas gracias a la rotación de la planta y al tratamiento topográfico de las losas horizontales. Todas las unidades de vivienda son flexibles, permiten ensamblarse entre sí o dividirse en unidades de menor tamaño con acceso individual. En las azoteas se comparten espacios de uso común que actúan como nidos. El respeto hacia el entorno no sólo consiste en preservar la selva endémica, sino en fomentar la vida al aire libre mediante un planeamiento paisajístico sustentable, que incluye espejos de agua que unifican al espacio.'
			)
		)
	);
?>