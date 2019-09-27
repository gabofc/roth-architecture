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
	$( 'svg#textCircle' ).fadeOut( 'slow', function() {
		$( 'svg#formContact' ).fadeIn( 'slow' );
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
function addingDivsPush() {
	var html = '';
	html += '<div class="rellenoLeft" style="width: ' + ( contenidoSize / 2 ) + 'px;"></div>';
	html += '<div class="rellenoRight" style="width: ' + ( contenidoSize / 2 ) + 'px;"></div>';
	for( var i = 1; i <= posiciones; i++ ) {
		var agregadoWidth = getSpecificWidth( i );
		html += '<div class="rellenoLeft" style="width: ' + agregadoWidth + 'px;"></div>';
		html += '<div class="rellenoRight" style="width: ' + agregadoWidth + 'px;"></div>';
	}
	html += '<div class="rellenoLeft" style="width: ' + ( contenidoSize / 2 ) + 'px;"></div>';
	html += '<div class="rellenoRight" style="width: ' + ( contenidoSize / 2 ) + 'px;"></div>';
	return html
}
function getSpecificWidth( posicion ) {
	var hipotenusa = contenidoSize / 2;
	var cateto = hipotenusa - ( posicion * 16 );
	var c = Math.sqrt( Math.pow( hipotenusa, 2 ) - Math.pow( cateto, 2 ) );
	c = ( c * 2 ) + 10;
	var width = ( contenidoSize - c ) / 2;
	return width;
}