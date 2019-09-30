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
var textoRueda = 500;
var posiciones = 25;
var tl = new TimelineLite();
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
	var logoSize = ventanaSize * 0.045;
	var iconosHeight = ventanaSize * 0.08;
	var iconosWidth = iconosHeight * 2.5;
	console.log( $( window ).width() );
	if ( $( window ).width() > 768 ) {
		var ruedaSize = ventanaSize * 0.65;
		contenidoSize = ruedaSize * 0.80;
		contenidoSize = ( contenidoSize > 400 ) ? 400 : contenidoSize;
		textArea = contenidoSize * 0.30;
		textoRueda = ( textoRueda > 600 ) ? 600 : textoRueda;
		textoRueda = ruedaSize * 0.85;
	} else {
		var ruedaSize = ventanaSize * 0.60;
		textoRueda = ruedaSize * 0.95;
		contenidoSize = ruedaSize * 0.85;
		contenidoSize = ( contenidoSize > 500 ) ? 500 : contenidoSize;
		textArea = contenidoSize * 0.20;
		$( 'svg' ).css( { 'margin-top': '20px' } );
		$( '.contenidoCentro' ).css( { 'margin-top': '10px' } );
		textoRueda = ( textoRueda > 600 ) ? 600 : textoRueda;
	}
	wheel.css( { 'width': ruedaSize, 'height': ruedaSize } );
	symbols.css( { 'width': iconosWidth, 'height': iconosHeight } );
	$( '.logo' ).css( 'height', logoSize + 'px' );
	$( 'svg' ).css( { 'width': textoRueda, 'height': textoRueda } );
	center = ruedaSize / 2;
	radius = ruedaSize * 0.533;
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
			rotation: 360,
			visibility: 'visible'
		} );
	} );
}
function iniciaAnimacion() {
	tl.from( $( '.logo' ), 0.5, { scale: 1.5, autoAlpha: 0, opacity: 0 }, '-=0.5' );
	tl.from( symbols, 0.7, { scale: .5, autoAlpha: 0 }, '+=0.5' );
	tl.from( $( '.contenidoCentro' ), 1, { width: contenidoSize, height: contenidoSize, display: 'block' } );
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
		$( '.contenidoCentro' ).css( { 'width': contenidoSize, 'height': contenidoSize } );
		$( 'svg#textCircle' ).fadeIn( 'slow' );
	} );
}
function contactUs() {
	var contenidoContact = '<div class="contactDiv" id="contacto">';
	contenidoContact += '<h3><span class="bold">Dreamers</span>, do not hesitate to contact us</h3>';
	contenidoContact += '<label for="name" class="italic">Name:</label>';
	contenidoContact += '<div class="input"><input type="text" id="name" class="obligatorio"></div>';
	contenidoContact += '<label for="email" class="italic">Email:</label>';
	contenidoContact += '<div class="input"><input type="email" id="email" class="obligatorio email"></div>';
	contenidoContact += '<label for="message" class="italic">Message:</label>';
	contenidoContact += '<div class="input"><textarea style="height: ' + textArea + 'px" id="message" class="obligatorio"></textarea></div>';
	contenidoContact += '<a href="#" class="enviaForm italic" onclick="enviar()">Send</a>';
	contenidoContact += '</div>';
	if ( $( 'svg#textCircle' ).is( ':visible' ) ) {
		$( '.contenidoCentro' ).css( { 'width': contenidoSize, 'height': contenidoSize } );
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
		ajaxRequest( parametros, 'lib/send.php', respuestaEnviar );
	}
}
function respuestaEnviar( respuesta ) {
	cargando( false );
	datos = JSON.parse( respuesta );
	if ( datos.status == 'Success' ) {
		alerta( '<span class="bold arriba">Sent</span> Thank you for your message' );
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
function abrePagina() {
	if ( !$( '.contenidoCentro' ).is( ':visible' ) ) {
		contactUs();
	} else {
		aboutUs();
	}
}
