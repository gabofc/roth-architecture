var entrado = '';
var rotacionActual = 0;
const rotationSnap = 360 / 8
var wheel = $( '#wheel' );
var symbols = $( '.link-icon' );
var center = 300;
var radius = 320;
var total = symbols.length;
var slice = 2 * Math.PI / total;
var textArea = 130;
$( document ).ready( function() {
	calculaSize();
	setTimeout( function() {
		acomodaIconos();
		iniciaAnimacion();
		iniciaRueda();
	}, 500 );
	setTimeout( function() {
		$( '.contenidoCentro' ).css( 'transition', 'initial' );
		aboutUs();
	}, 3200 );
	$( 'a' ).click( function( e ) {
		e.preventDefault();
		return false;
	} );
} );
function calculaSize() {
	var ventanaSize = $( window ).height();
	var logoSize = ventanaSize * 0.06;
	var iconosHeight = ventanaSize * 0.08;
	var iconosWidth = iconosHeight * 2.5;
	var ruedaSize = ventanaSize * 0.65;
	var contenidoSize = ruedaSize * 0.52;
	wheel.css( { 'width': ruedaSize, 'height': ruedaSize } );
	symbols.css( { 'width': iconosWidth, 'height': iconosHeight } );
	$( '.logo' ).css( 'height', logoSize + 'px' );
	$( '.contenidoCentro.mostrado' ).css( { 'width': contenidoSize, 'height': contenidoSize } );
	center = ruedaSize / 2;
	radius = ruedaSize * 0.533;
	textArea = contenidoSize * 0.40;
}
function acomodaIconos() {
	symbols.each( function( i, icons ) {
		var angle = i * slice;
		var x = center + radius * Math.sin( angle );
		var y = center - radius * Math.cos( angle );
		TweenLite.set( icons, {
			xPercent: -50,
			yPercent: -50,
			x: x,
			y: y,
			rotation: 360
		} );
	} );
	
}
function iniciaAnimacion() {
	$( '.contenidoCentro' ).addClass( 'mostrado' );
	$( '.logo' ).fadeIn();
	symbols.each( function( i, icons ) {
		var newIndex = i + 1;
		var delay = 200 * newIndex;
		$( '#link-icon-' + newIndex ).delay( delay ).fadeIn( 2000 );
	} );
}
function ajustaElementos() {
	var nuevaRotacion = 360 - rotacionActual;
	symbols.each( function() {
		TweenMax.to( $( this ), 0, {
			rotation: nuevaRotacion
		} );
	} );
}
function iniciaRueda() {
	if ( typeof Draggable.get( wheel ) != 'undefined' ) {
		Draggable.get( wheel ).kill();
	}
	Draggable.create( wheel, {
		type: 'rotation',
		throwProps: true,
		minimumMovement: 10,
		dragClickables: true,
		onDrag: ajustaElementos,
		allowContextMenu: true,
		snap: ( endValue ) => Math.round(endValue / rotationSnap) * rotationSnap,
		liveSnap: ( value ) => {
			rotacionActual = value;
			return value
		}
	} );
}
function aboutUs() {
	var contenidoAbout = '<p>Roth architecture is rooted in the unique combination of three fundamental pillars: nature, ancestry and art.</p>';
	contenidoAbout += '<p>It distinguishes itself through an idiosyncratic process which embraces the intelligence of the millenary ecological fabric of life and incorporates human technologies from the ancestral wisdom of the hand of the indigenous communities to artificial intelligence.</p>';
	contenidoAbout += '<p>From the unconditional presence to the inspiration of the moment as a collective and the creative flow of nature itself we develop unseen structures akin to living sculptures which prolong the curvature of the earth and open up pathways to new forms of living.</p>';
	contenidoAbout += '<p>Transcending the dichotomy between interior and exterior these interfaces allow for a deep reconnection with oneself, the other and the environment and the search for the significance of being human.</p>';
	$( '.contenidoCentro' ).fadeOut( 'slow', function() {
		$( '.contenidoCentro' ).html( contenidoAbout );
		$( '.contenidoCentro' ).fadeIn( 'slow' );
	} );
}
function contactUs() {
	var contenidoContact = '<div class="contactDiv" id="contacto">';
	contenidoContact += '<h3>Dreamers, do not hesitate to contact us</h3>';
	contenidoContact += '<label for="nombre">Name:</label>';
	contenidoContact += '<input type="text" id="nombre" class="obligatorio">';
	contenidoContact += '<label for="email">Email:</label>';
	contenidoContact += '<input type="email" id="email" class="obligatorio email">';
	contenidoContact += '<label for="mensaje">Message:</label>';
	contenidoContact += '<textarea style="height: ' + textArea + '" id="mensaje" class="obligatorio"></textarea>';
	contenidoContact += '<a href="#" class="enviaForm" onclick="enviar()">Send</a>';
	contenidoContact += '</div>';
	$( '.contenidoCentro' ).fadeOut( 'slow', function() {
		$( '.contenidoCentro' ).html( contenidoContact );
		$( '.contenidoCentro' ).fadeIn( 'slow' );
	} );
}
function enviar() {
	if ( validaTodo( 'contacto' ) ) {
		var parametros = { 'nombre': $( '#nombre' ).val(), 'email': $( '#email' ).val(), 'mensaje': $( '#mensaje' ).val() };
		var respuesta = ajaxRequest( parametros, 'lib/enviar.php', respuestaEnviar );
	}
}
function respuestaEnviar( respuesta ) {
	cargando( false );
	datos = JSON.parse( respuesta );
	if ( datos.status == 'Success' ) {
		alerta( 'Sent, Thank you for your message' )
		vacia( 'contactForm' );
	} else {
		errorCallback();
	}
}
