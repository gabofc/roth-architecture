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
				1 => 'AZULIK, Roth Architecture\'s first project, is the manifestation of a creative journey inspired by different ethnic groups and the prioritization of the bond between humans and nature.',
				2 => 'Its commercial and cultural purposes are condensed in a landscape design that combines views of the sea and contact with the surrounding jungle. The construction plan, elevated not to disturb the ground ecosystem, houses gastronomic, wellness, and lifestyle initiatives. Conceptualized as a treehouse that invites play and self-discovery, the different levels generate a ludic experience nourished by the endemic materials used for its construction.'
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
				1 => 'One of Azulik\'s most iconic spaces, this restaurant takes guests literally to new heights through wooden structures that tower above the canopy of the forest, creating an atmosphere where we feel like we are floating over the trees.',
				2 => 'The design of the private booths imitates that of birds’ nests and generates the illusion of flight. These private spaces are meant to encourage gatherings and to provide opportunities for contemplation. ',
				3 => 'The spectacular views, the warmth of the wooden structures, and the dim-lit night setting have made Kin Toh a benchmark in Roth Architecture’s design.'
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
				1 => 'Aiming to challenge the paradigms of retail, the store’s design proposal plays with different heights to create a journey inside the salon. Artificial and natural lighting complement the experience of the visitors who progressively discover the space and find different elements that prompt them to interact with their surroundings. ',
				2 => 'Natural elements are the protagonists in the construction of an immersive experience, while they nourish the space with different stimuli. ZAK IK is a space where the boundaries between private and public blur, while it makes us aware of the duality in the limits and possibilities of visual expansion.'
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
				1 => 'Born as a space for interdisciplinary creation, SFER IK is a museum that defies the conventions of contemplative exercises. Contrary to the traditional way of exhibiting art, where stimuli parallel to the artworks are almost entirely absent, SFER IK is an integral experience where all our senses are active.',
				2 => 'The natural contour of the ground creates a sinuous journey that takes us literally up and down as we transit through space. Windows act like canvases, while they provide the galleries with natural light and become an additional stimulus to the contrast, both visual and tactile, generated by the concrete and the bejuco.'
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
				1 => 'Inspired by Japanese aesthetics, Tseen Ja incorporates low tables, natural elements, and the warmth of bejuco wood into its atmosphere. The restaurant also features nests, private areas that, in addition to serving as points of contemplation, form geometric patterns that visually enrich the experience from above. ',
				2 => 'Lighting installations show us the duality between clarity and darkness while hanging bridges add a playful touch to the expression of the structure. The routes that mark the beginning of the experience play with the divergence between the exterior and interior, accentuating the immersive atmosphere of the space.'
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
				1 => 'This space is the conclusion of a creative proposal that was put together as the point of sale of one of the most original eyewear brands in the world. The monochromatic color palette and soft lighting create an atmosphere in which objects are seemingly suspended in their displays.',
				2 => 'The light-and-shadow play turns the pieces exhibited into the protagonists of the composition, while it gives dynamism and visual depth to the gallery. Also, the shape of the space, built as a kind of dome, provides visitors with a panoramic perspective and an immediate understanding of the room.'
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
				1 => 'Respectful of the pre-existing relief of the ground and the energy of the environment, the museum was constructed without blueprints or any prior conception of the building. Thus, everything was put together spontaneously on site. ',
				2 => 'The corrugated floor design is intended for barefoot walking, which allows us to get in touch with the changing textures that represent the four elements: air, fire, earth, and water. The fluidity of the construction required developing a special technique for the use of cement that allowed us to create a structure without columns that is, rather, woven like a basket.'
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
				1 => 'AZULIK Residence was developed with no blueprints or previous drawings of any kind. This freedom reveals its originality and the essence of its most significant challenge: to honor those who came before –the flora, the fauna, and the soil. Its location, completely immersed in the jungle, required finding creative ways to work with concrete and manual labor to avoid destructive heavy machinery.',
				2 => 'Furthermore, we developed an unconventional structure that is not supported by columns or beams but is rather woven like a basket. Thus, the building was planned as a fabric, where interweaving elements are integrated to make up the entire edifice.'
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
				1 => 'Nest\'s is a housing complex that seeks community life and the coexistence of inhabitants with the natural environment. The radial distribution of the program involves a main viewpoint at the center, amenities in the first circumference, and housing modules in the periphery. All housing units are flexible and can be assembled or divided into smaller units with individual access.',
				2 => 'Shared rooftops build common spaces that resemble nests, while sustainable landscape planning, which includes ponds and water mirrors that unify the space, encourages life in contact with the outdoors.'
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
				1 => 'The project located in the community of Francisco Uh May began in 2018 with the construction of SFER IK and a private home, AZULIK Residence. Currently under construction, it contemplates 42 villas, a gastronomic space, and a design center that with exhibition areas, workshops, and offices.',
				2 => 'The complex reaffirms the principles of reconnection with nature by incorporating new green technologies. Meanwhile, its dynamic paths through the jungle are an invitation to discover the space in a progressive way with the purpose of approaching sustainability and art in an unpredictable and memorable fashion.'
			)
		)
	);
?>
