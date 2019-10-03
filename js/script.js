var entrado = '';
var rotacionActual = 0;
const rotationSnap = 360 / 8
var wheel = $( '#wheel' );
var symbols = $( '.link-icon' );
var center = 300;
var radius = 320;
const total = symbols.length;
const slice = 2 * Math.PI / total;
var textArea = 130;
var contenidoSize = 400;
var textoRueda = 500;
var posiciones = 25;
var ventanaSize = 0;
var tl = new TimelineLite();
var rotacionTween;
$( document ).ready( function() {
	calculaSize();
	setTimeout( function() {
		acomodaIconos();
		iniciaAnimacion();
		iniciaRueda();
	}, 500 );
	setTimeout( function() {
		aboutUs();
	}, 3200 );
	$( 'a' ).click( function( e ) {
		e.preventDefault();
		return false;
	} );
	$( document ).keydown( function( event ) {
		if ( event.ctrlKey == true && ( event.which == '107' || event.which == '109' || event.which == '173' || event.which == '61' || event.which == '187' || event.which == '189' ) ) {
			event.preventDefault();
		}
	} );
	$( window ).resize( function() {
		if ( $( window ).width() > 768 ) {
			$( '.mainContainer' ).fadeOut( 'slow', function() {
				calculaSize();
				ajustaContacto();
				acomodaIconos();
				iniciaRueda();
				$( '.mainContainer' ).fadeIn();
			} );
		}
	} );
} );
function calculaSize() {
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test( navigator.userAgent ) ) {
		var anchoVentana = $( window ).width();
		ventanaSize = $( window ).height();
		var logoSize = ventanaSize * 0.045;
		var iconosHeight = ventanaSize * 0.08;
		var iconosWidth = iconosHeight * 2.5;
		var ruedaSize = ventanaSize * 0.60;
		contenidoSize = ruedaSize * 0.78;
		textArea = contenidoSize * 0.25;
		textoRueda = ruedaSize * 0.95;
		textoRueda = ( textoRueda > 600 ) ? 600 : textoRueda;
		contenidoSize = ( contenidoSize > 400 ) ? 400 : contenidoSize;
		wheel.css( { 'width': ruedaSize, 'height': ruedaSize } );
		$( '.contenidoPrincipal' ).css( { 'width': ruedaSize, 'height': ruedaSize } );
		$( '.contenidoPrincipal, .link-icon' ).addClass( 'movil' );
		wheel.addClass( 'movil' );
		var margenCirculo = Math.abs( anchoVentana - ruedaSize ) / 2;
		console.log( margenCirculo );
		wheel.css( 'left', '-' + margenCirculo + 'px' );
		if ( ventanaSize > 720 ) {
			var margenSVG = margenCirculo * 0.65;
			$( 'svg' ).css( 'left', '-' + margenSVG + 'px' );
		}
	} else {
		var ventanaHeight = $( window ).height();
		var maximoSize = ventanaHeight * 0.7;
		ventanaSize = ( $( window ).width() > 768 ) ? $( window ).height() : ( window.screen.height - 105 );
		var logoSize = ventanaSize * 0.045;
		var iconosHeight = ventanaSize * 0.08;
		var iconosWidth = iconosHeight * 2.5;
		var ruedaSize = ventanaSize * 0.65;
		ruedaSize = ( ruedaSize > maximoSize ) ? maximoSize : ruedaSize;
		contenidoSize = ruedaSize * 0.80;
		textArea = contenidoSize * 0.25;
		textoRueda = ruedaSize * 0.90;
		textoRueda = ( textoRueda > 650 ) ? 650 : textoRueda;
		contenidoSize = ( contenidoSize > 450 ) ? 450 : contenidoSize;
		var minimoTop = 130 + logoSize;
		$( '.contenidoPrincipal' ).css( { 'width': ruedaSize, 'height': ruedaSize, 'top': minimoTop + 'px', 'bottom': 'initial' } );
	}
	wheel.css( { 'width': ruedaSize, 'height': ruedaSize, 'top': minimoTop + 'px' } );
	$( '.contenidoCentro' ).css( { 'width': contenidoSize, 'height': contenidoSize } );
	symbols.css( { 'width': iconosWidth, 'height': iconosHeight } );
	$( '.logo' ).css( 'height', logoSize + 'px' );
	$( 'svg' ).css( { 'width': textoRueda, 'height': textoRueda } );
	center = ruedaSize / 2;
	radius = ruedaSize * 0.533;
	posiciones = Math.ceil( contenidoSize / 16 );
}
function acomodaIconos() {
	if ( typeof rotacionTween != 'undefined' ) {
		rotacionTween.kill();
		setTimeout( function() {
			wheel.css( 'transform', 'initial' );
		}, 100 );
	}
	symbols.each( function( i, icons ) {
		var angle = i * slice;
		var x = center + radius * Math.sin( angle );
		var y = center - radius * Math.cos( angle );
		rotacionTween = TweenLite.set( icons, {
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
	var hormigaSize = contenidoSize * 0.7;
	tl.from( $( '.logo' ), 0.5, { scale: 1.5, autoAlpha: 0, opacity: 0 }, '-=0.5' );
	tl.from( symbols, 0.7, { scale: .5, autoAlpha: 0 }, '+=0.5' );
	tl.from( $( '#intro-image' ), 1, { width: hormigaSize } );
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
	var extraClass = '';
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test( navigator.userAgent ) ) {
		extraClass = ' movil';
	}
	var contenidoContact = '<div class="contactDiv ' + extraClass + '" id="contacto">';
	contenidoContact += '<h3><span class="bold">Dreamers</span>, do not hesitate to contact us</h3>';
	contenidoContact += '<label for="name" class="italic">Name:</label>';
	contenidoContact += '<div class="input"><input type="text" id="name" name="name" autocomplete="off" class="obligatorio"></div>';
	contenidoContact += '<label for="email" class="italic">Email:</label>';
	contenidoContact += '<div class="input"><input type="email" id="email" name="email" autocomplete="off" class="obligatorio email"></div>';
	contenidoContact += '<label for="message" class="italic">Message:</label>';
	contenidoContact += '<div class="textarea"><textarea style="height: ' + textArea + 'px" id="message" name="message" autocomplete="off" class="obligatorio"></textarea></div>';
	contenidoContact += '<a href="#" class="enviaForm italic" onclick="enviar()">Send</a>';
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
	var altura = 45;
	$( '.contactDiv h3' ).css( 'width', getSpecificWidth( altura ) + 'px' );
	altura = 80;
	$( '.contactDiv' ).children().each( function() {
		var tipoElemento = $( this )[0].nodeName;
		if ( tipoElemento == 'DIV' ) {
			var nuevoTipo = $( this ).children()[0].nodeName;
			if ( nuevoTipo == 'INPUT' ) {
				$( this ).children().css( 'width', getSpecificWidth( altura ) + 'px' );
				altura = altura + 33;
			} else if ( nuevoTipo == 'TEXTAREA' ) {
				altura = altura + textArea;
			}
		} else if ( tipoElemento == 'LABEL' ) {
			var nuevoAncho = getSpecificWidth( altura );
			if ( $( window ).width() > 768 ) {
				nuevoAncho = nuevoAncho + 25;
			} else {
				nuevoAncho = nuevoAncho + 20;
			}
			$( this ).css( 'width', nuevoAncho + 'px' );
			altura = altura + 16;
		} else if ( tipoElemento == 'A' ) {
			var nuevoAncho = getSpecificWidth( altura );
			if ( $( window ).width() > 768 ) {
				nuevoAncho = nuevoAncho - 30;
			}
			$( this ).css( 'width', nuevoAncho + 'px' );
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
