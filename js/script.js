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
var contenidoSize = 400;
var posiciones = 25;
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
	contenidoSize = ruedaSize * 0.80;
	contenidoSize = ( contenidoSize > 500 ) ? 500 : contenidoSize;
	wheel.css( { 'width': ruedaSize, 'height': ruedaSize } );
	symbols.css( { 'width': iconosWidth, 'height': iconosHeight } );
	$( '.logo' ).css( 'height', logoSize + 'px' );
	$( 'svg' ).css( { 'width': contenidoSize, 'height': contenidoSize } );
	$( '.contenidoCentro' ).css( { 'width': contenidoSize, 'height': contenidoSize } );
	center = ruedaSize / 2;
	radius = ruedaSize * 0.533;
	textArea = contenidoSize * 0.40;
	posiciones = Math.ceil( contenidoSize / 16 );
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
	$( '.contenidoCentro.mostrado' ).css( { 'width': contenidoSize, 'height': contenidoSize } );
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
	$( '.contenidoCentro' ).fadeOut( 'slow', function() {
		$( 'svg#textCircle' ).fadeIn( 'slow' );
	} );
}
function contactUs() {
	var contenidoContact = '<div class="contactDiv" id="contacto">';
	contenidoContact += '<h3>Dreamers, do not hesitate to contact us</h3>';
	contenidoContact += '<label for="name">Name:</label>';
	contenidoContact += '<div class="input"><input type="text" id="name" class="obligatorio"></div>';
	contenidoContact += '<label for="email">Email:</label>';
	contenidoContact += '<div class="input"><input type="email" id="email" class="obligatorio email"></div>';
	contenidoContact += '<label for="message">Message:</label>';
	contenidoContact += '<div class="input"><textarea style="height: ' + textArea + '" id="message" class="obligatorio"></textarea></div>';
	contenidoContact += '<a href="#" class="enviaForm" onclick="enviar()">Send</a>';
	contenidoContact += '</div>';
	if ( $( 'svg#textCircle' ).is( ':visible' ) ) {
		$( 'svg#textCircle' ).fadeOut( 'slow', function() {
			$( '.contenidoCentro' ).html( contenidoContact );
			ajustaContacto();
			$( '.contenidoCentro' ).fadeIn( 'slow' );
		} );
	} else {
		$( '.contenidoCentro' ).fadeOut( 'slow', function() {
			$( '.contenidoCentro' ).html( contenidoContact );
			ajustaContacto();
			$( '.contenidoCentro' ).fadeIn( 'slow' );
		} );
	}
}
function enviar() {
	if ( validaTodo( 'contacto' ) ) {
		var parametros = { 'name': $( '#nombre' ).val(), 'email': $( '#email' ).val(), 'message': $( '#mensaje' ).val() };
		var respuesta = ajaxRequest( parametros, 'lib/send.php', respuestaEnviar );
	}
}
function respuestaEnviar( respuesta ) {
	cargando( false );
	datos = JSON.parse( respuesta );
	if ( datos.status == 'Success' ) {
		alerta( 'Sent, Thank you for your message' )
		vacia( 'contactForm' );
		setTimeout( function() { aboutUs(); }, 3000 );
	} else {
		errorCallback();
		setTimeout( function() { contactUs(); }, 3000 );
	}
}
function ajustaContacto() {
	var altura = 30;
	$( '.contactDiv h3' ).css( 'width', getSpecificWidth( altura ) + 'px' );
	altura = 80;
	$( '.contactDiv' ).children().each( function() {
		var tipoElemento = $( this )[0].nodeName;
		if ( tipoElemento == 'DIV' ) {
			var nuevoTipo = $( this ).children()[0].nodeName;
			if ( nuevoTipo == 'INPUT' ) {
				$( this ).children().css( 'width', getSpecificWidth( altura ) + 'px' );
				altura = altura + 33;
			}
		} else if ( tipoElemento == 'LABEL' ) {
			$( this ).css( 'width', getSpecificWidth( altura ) + 'px' );
			altura = altura + 16;
		}
	} );
}
function getSpecificWidth( altura ) {
	var hipotenusa = contenidoSize / 2;
	var cateto = hipotenusa - altura;
	var c = Math.sqrt( Math.pow( hipotenusa, 2 ) - Math.pow( cateto, 2 ) );
	c = ( c * 2 ) - 30;
	return c;
}
