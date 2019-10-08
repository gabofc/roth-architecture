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
window.addEventListener( 'orientationchange', function() {
	if ( window.orientation == 90 || window.orientation == 270 || window.orientation == -90 ) {
		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test( navigator.userAgent ) ) {
			$( 'body' ).addClass( 'horizontal' );
			rotate( $( '.mainContainer' ), Math.abs( window.orientation ) );
			setTimeout( function() {
				$( '.mainContainer' ).css( { 'width': $( window ).height() + 'px', 'height': $( window ).width() + 'px' } );
			}, 200 );
		}
	} else {
		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test( navigator.userAgent ) ) {
			$( 'body' ).removeClass( 'horizontal' );
			rotate( $( '.mainContainer' ), 0 );
			setTimeout( function() {
				$( '.mainContainer' ).css( { 'width': $( window ).width() + 'px', 'height': $( window ).height() + 'px' } );
			}, 200 );
		}
	}
} );
$( document ).ready( function() {
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test( navigator.userAgent ) ) {
		$( 'body' ).addClass( 'movil' );
		$( 'body' ).removeClass( 'horizontal' );
		if ( window.orientation == 90 || window.orientation == 270 || window.orientation == -90 ) {
			$( 'body' ).addClass( 'horizontal' );
			rotate( $( '.mainContainer' ), Math.abs( window.orientation ) );
			setTimeout( function() {
				$( '.mainContainer' ).css( { 'width': $( window ).height() + 'px', 'height': $( window ).width() + 'px' } );
			}, 200 );
		}
	} else {
		$( 'body' ).removeClass( 'movil' );
		$( 'body' ).removeClass( 'horizontal' );
	}
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
		if ( $( window ).width() >= 770 && $( window ).height() >= 700 ) {
			$( '.mainContainer' ).fadeOut( 'slow', function() {
				calculaSize();
				acomodaIconos();
				iniciaRueda();
				$( '.mainContainer' ).fadeIn();
			} );
		}
	} );
	$( '.box-link-animado' ).on( 'mouseover', function( e ) {
		var imgAnimada = $( this ).find( '.iconoLista' ).attr( 'animada' );
		if ( imgAnimada == '' ) {
			$( this ).find( '.iconoLista' ).css( 'opacity', 0 );
			$( this ).find( '.comingSoon' ).css( 'opacity', 1 );
		} else {
			console.log( imgAnimada );
			$( this ).find( '.iconoLista' ).fadeOut( 'fast', function() {
				$( this ).attr( 'src', imgAnimada );
				$( this ).fadeIn( 'fast' );
			} );
		}
	} ).on( 'mouseout', function( e ) {
		var imgAnimada = $( this ).find( '.iconoLista' ).attr( 'animada' );
		if ( imgAnimada == '' ) {
			$( this ).find( '.iconoLista' ).css( 'opacity', 1 );
			$( this ).find( '.comingSoon' ).css( 'opacity', 0 );
		} else {
			var imgNormal = $( this ).find( '.iconoLista' ).attr( 'normal' );
			$( this ).find( '.iconoLista' ).fadeOut( 'fast', function() {
				$( this ).attr( 'src', imgNormal );
				$( this ).fadeIn( 'fast' );
			} );
		}
	} );
} );
function calculaSize() {
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test( navigator.userAgent ) ) {
		var anchoVentana = $( window ).width();
		ventanaSize = $( window ).height();
		var logoSize = ventanaSize * 0.05;
		var iconosHeight = ventanaSize * 0.08;
		var iconosWidth = iconosHeight * 2.5;
		var ruedaSize = ventanaSize * 0.65;
		contenidoSize = ruedaSize * 0.78;
		textoRueda = ruedaSize * 0.95;
		if ( ventanaSize < 550 ) {
			contenidoSize = ruedaSize * 0.83;
			textoRueda = ruedaSize * 0.98;
			$( '.contenidoCentro' ).css( 'margin-top', '8%' );
			$( 'svg' ).css( 'margin-top', '3%' );
		}
		textArea = contenidoSize * 0.25;
		textoRueda = ( textoRueda > 600 ) ? 600 : textoRueda;
		contenidoSize = ( contenidoSize > 400 ) ? 400 : contenidoSize;
		wheel.css( { 'width': ruedaSize, 'height': ruedaSize } );
		$( '.contenidoPrincipal' ).css( { 'width': ruedaSize, 'height': ruedaSize } );
		var margenInicial = Math.abs( anchoVentana - ruedaSize ) / 2;
		var margenTexto = Math.abs( margenInicial - 12 );
		$( 'svg' ).css( 'left', '-' + margenTexto + 'px' );
		if ( ventanaSize > 551 && ventanaSize < 650 ) {
			var margenCirculo = Math.abs( margenInicial - 50 );
			margenTexto = margenTexto - 18;
			wheel.css( 'left', '-' + margenCirculo + 'px' );
			$( '.dLogo' ).css( 'left', '-' + margenCirculo + 'px' );
			$( '.contenidoCentro' ).css( 'left', '-' + margenTexto + 'px' );
		} else if ( ventanaSize >= 650 ) {
			wheel.css( 'left', '-' + margenInicial + 'px' );
			$( '.dLogo' ).css( 'left', '-' + margenInicial + 'px' );
			if ( ventanaSize > 750 ) {
				textoRueda = ( textoRueda > 450 ) ? 450 : textoRueda;
				var margenSVG = margenTexto - 25;
				console.log( margenSVG );
				$( 'svg' ).css( 'left', '-' + margenSVG + 'px' );
			}
		}
	} else {
		var ventanaHeight = $( window ).height();
		const maximoSize = ventanaHeight * 0.7;
		ventanaSize = $( window ).height();
		var logoSize = ventanaSize * 0.045;
		logoSize = ( logoSize < 40 ) ? 40 : logoSize;
		var iconosHeight = ventanaSize * 0.08;
		var iconosWidth = iconosHeight * 2.5;
		var ruedaSize = ventanaSize * 0.65;
		ruedaSize = ( ruedaSize > maximoSize ) ? maximoSize : ruedaSize;
		ruedaSize = ( ruedaSize < 490 ) ? 490 : ruedaSize;
		contenidoSize = ruedaSize * 0.80;
		textArea = contenidoSize * 0.25;
		textoRueda = ruedaSize * 0.90;
		textoRueda = ( textoRueda > 650 ) ? 650 : textoRueda;
		contenidoSize = ( contenidoSize > 450 ) ? 450 : contenidoSize;
		contenidoSize = ( contenidoSize < 390 ) ? 390 : contenidoSize;
		var minimoTop = 130 + logoSize;
		$( '.contenidoPrincipal' ).css( { 'width': ruedaSize, 'height': ruedaSize, 'top': minimoTop + 'px', 'bottom': 'initial' } );
	}
	wheel.css( { 'width': ruedaSize, 'height': ruedaSize, 'top': minimoTop + 'px' } );
	$( '.dLogo' ).css( 'width', ruedaSize );
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
		$( '.contenidoCentro' ).css( 'border-radius', '50%' );
		$( 'svg#textCircle' ).fadeIn( 'slow' );
	} );
}
function contactUs() {
	var contenidoContact = '<div class="contactDiv" id="contacto">';
	contenidoContact += '<h3><span class="bold">Dreamers</span>, do not hesitate to contact us</h3>';
	contenidoContact += '<label for="name" class="italic">Name:</label>';
	contenidoContact += '<div class="input"><input type="text" id="name" name="name" autocomplete="off" class="obligatorio"></div>';
	contenidoContact += '<label for="email" class="italic">Email:</label>';
	contenidoContact += '<div class="input"><input type="email" id="email" name="email" autocomplete="off" class="obligatorio email"></div>';
	contenidoContact += '<label for="message" class="italic">Message:</label>';
	contenidoContact += '<div class="textarea"><textarea style="height: ' + textArea + 'px" id="message" name="message" autocomplete="off" class="obligatorio" maxlength="500"></textarea></div>';
	contenidoContact += '<div class="botonContainer"><a href="#" class="enviaForm italic" onclick="enviar()">Send</a></div>';
	contenidoContact += '</div>';
	if ( $( 'svg#textCircle' ).is( ':visible' ) ) {
		$( 'svg#textCircle' ).fadeOut( 'slow', function() {
			$( '.contenidoCentro' ).css( 'border-radius', '50%' );
			$( '.contenidoCentro' ).html( contenidoContact );
			ajustaContacto();
			$( '.contenidoCentro' ).fadeIn( 'slow' );
		} );
	} else {
		$( '.contenidoCentro' ).fadeOut( 'slow', function() {
			$( '.contenidoCentro' ).css( 'border-radius', '50%' );
			$( '.contenidoCentro' ).html( contenidoContact );
			ajustaContacto();
			$( '.contenidoCentro' ).fadeIn( 'slow' );
		} );
	}
	setTimeout( function() {
		cuadroContacto();
	}, 1000 );
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
	var altura = 80;
	$( '.contactDiv h3' ).css( 'width', getSpecificWidth( 50 ) + 'px' );
	$( '.contactDiv' ).children().each( function() {
		var tipoElemento = $( this )[0].nodeName;
		if ( tipoElemento == 'DIV' ) {
			var nuevoTipo = $( this ).children()[0].nodeName;
			if ( nuevoTipo == 'INPUT' ) {
				$( this ).children().css( 'width', getSpecificWidth( altura ) + 'px' );
				altura = altura + 33;
			} else if ( nuevoTipo == 'TEXTAREA' ) {
				altura = altura + textArea;
			} else if ( nuevoTipo == 'A' ) {
				var nuevoAncho = getSpecificWidth( altura );
				if ( $( window ).width() > 770 ) {
					nuevoAncho = nuevoAncho - 30;
				}
				$( this ).css( 'width', nuevoAncho + 'px' );
			}
		} else if ( tipoElemento == 'LABEL' ) {
			var nuevoAncho = getSpecificWidth( altura );
			if ( $( window ).width() > 770 ) {
				nuevoAncho = nuevoAncho + 25;
			} else {
				nuevoAncho = nuevoAncho + 20;
			}
			$( this ).css( 'width', nuevoAncho + 'px' );
			altura = altura + 16;
			if ( ventanaSize >= 650 ) {
				$( this ).css( 'padding-left', '5px' );
			}
		}
	} );
}
function cuadroContacto() {
	$( '.contenidoCentro' ).css( 'border-radius', '0' );
	$( '.contactDiv input, .contactDiv textarea, .contactDiv label, .contactDiv h3, .contactDiv .botonContainer' ).css( 'transition', 'all 0.6s' );
	$( '.contactDiv input, .contactDiv textarea, .contactDiv label, .contactDiv h3, .contactDiv .botonContainer' ).css( 'width', '100%' );
	$( '.contactDiv .botonContainer' ).css( 'padding-right', 0 );
	$( '.contactDiv label' ).css( 'padding-left', 0 );
	$( '.contactDiv textarea' ).css( { 'padding': 0, 'margin': 0 } );
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
function rotate( el, degs ) {
	iedegs = degs/90;
	if ( iedegs < 0 ) {
		iedegs += 4;
	}
	transform = ( degs == 0 ) ? ( 'rotate(' + degs + 'deg)' ) : ( 'rotate(' + degs + 'deg) translate( -40%, -20% )' );
	iefilter = 'progid:DXImageTransform.Microsoft.BasicImage(rotation=' + iedegs + ')';
	styles = {
		transform: transform,
		'-webkit-transform': transform,
		'-moz-transform': transform,
		'-o-transform': transform,
		filter: iefilter,
		'-ms-filter': iefilter
	};
	$( el ).css( styles );
}
//Animations
var azulik_cuisine = lottie.loadAnimation( {
	wrapper: document.getElementById('azulik_cuisine'),
	renderer: 'svg',
	loop: true,
	autoplay: true,
	path: 'animations/azulik_cuisine.json'
} );
var azulik_hotel = lottie.loadAnimation( {
	wrapper: document.getElementById('azulik_hotel'),
	renderer: 'svg',
	loop: true,
	autoplay: true,
	path: 'animations/azulik_hotel.json'
} );
var cenote = lottie.loadAnimation( {
	wrapper: document.getElementById('cenote'),
	renderer: 'svg',
	loop: true,
	autoplay: true,
	path: 'animations/cenote.json'
} );
var zak_ik = lottie.loadAnimation( {
	wrapper: document.getElementById('zak_ik'),
	renderer: 'svg',
	loop: true,
	autoplay: true,
	path: 'animations/zak_ik.json'
} );
var example = lottie.loadAnimation( {
	wrapper: document.getElementById('example'),
	renderer: 'svg',
	loop: true,
	autoplay: true,
	path: 'animations/example.json'
} );
