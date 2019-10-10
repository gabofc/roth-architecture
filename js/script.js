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
var ruedaSize = 600;
var ventanaSize = 0;
var tl = new TimelineLite();
var rotacionTween;
var activeHover = '';
var anchoVentana = 600;
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
		$( 'body' ).removeClass( 'pc' );
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
		$( 'body' ).addClass( 'pc' );
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
		e.stopPropagation();
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
	$( 'body.pc .box-link-animated' ).mouseenter( function() {
		if ( activeHover != $( this ).attr( 'id' ) ) {
			animacionGarabato( '#' + $( this ).attr( 'id' ), 1 );
		}
	} ).mouseleave( function() {
		quitaAnimacion( '#' + $( this ).attr( 'id' ) );
		activeHover = '';
	} );
	$( 'body.movil .box-link-animated' ).on( 'click touchend', function() {
		if ( activeHover != $( this ).attr( 'id' ) ) {
			animacionGarabato( '#' + $( this ).attr( 'id' ), 2 );
		}
	} );
	$( '.linkAbout' ).click( function() {
		contactUs();
	} );
} );
function animacionGarabato( elemento, tipo ) {
	var imgAnimada = $( elemento ).find( '.iconoLista' ).attr( 'animada' );
	if ( imgAnimada == '' ) {
		$( elemento ).find( '.iconoLista' ).css( 'opacity', 0 );
		$( elemento ).find( '.comingSoon' ).css( 'opacity', 1 );
	} else {
		$( elemento ).find( '.iconoLista' ).fadeOut( 'slow', function() {
			$( this ).attr( 'src', imgAnimada );
			$( this ).fadeIn( 'slow' );
		} );
		setTimeout( function() {
			if ( activeHover == elemento ) {
				$( elemento ).find( '.iconoLista' ).css( 'opacity', 0 );
				$( elemento ).find( '.comingSoon' ).delay(3000).css( 'opacity', 1 );
			}
		}, 2500 );
	}
	if ( tipo == 2 ) {
		if ( activeHover != elemento ) {
			quitaAnimacion( activeHover );
		}
	}
	activeHover = elemento;
}
function quitaAnimacion( elemento ) {
	var imgAnimada = $( elemento ).find( '.iconoLista' ).attr( 'animada' );
	if ( imgAnimada == '' ) {
		$( elemento ).find( '.iconoLista' ).css( 'opacity', 1 );
		$( elemento ).find( '.comingSoon' ).css( 'opacity', 0 );
	} else {
		var imgNormal = $( elemento ).find( '.iconoLista' ).attr( 'normal' );
		$( elemento ).find( '.iconoLista' ).css( 'opacity', 1 );
		$( elemento ).find( '.comingSoon' ).css( 'opacity', 0 );
		$( elemento ).find( '.iconoLista' ).fadeOut( 'fast', function() {
			$( this ).attr( 'src', imgNormal );
			$( this ).fadeIn( 'fast' );
		} );
	}
}
function calculaSize() {
	anchoVentana = $( window ).width();
	ventanaSize = $( window ).height();
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test( navigator.userAgent ) ) {
		var logoSize = ventanaSize * 0.05;
		var iconosHeight = ventanaSize * 0.08;
		var iconosWidth = iconosHeight * 2.5;
		ruedaSize = ventanaSize * 0.65;
		contenidoSize = ruedaSize * 0.75;
		textoRueda = ruedaSize * 0.95;
		if ( ventanaSize < 550 ) {
			contenidoSize = ruedaSize * 0.83;
			textoRueda = ruedaSize * 0.98;
		}
		textArea = contenidoSize * 0.25;
		textoRueda = ( textoRueda > 450 ) ? 450 : textoRueda;
		contenidoSize = ( contenidoSize > 320 ) ? 320 : contenidoSize;
		textoRueda = ( ruedaSize < textoRueda ) ? ruedaSize : textoRueda;
		wheel.css( { 'width': ruedaSize, 'height': ruedaSize } );
		var minimoTop = 100 + logoSize;
		$( '.dLogo' ).css( 'width', '100%' );
		if ( ruedaSize > anchoVentana ) {
			var margenLeft = ( ruedaSize - anchoVentana ) / 2;
			$( wheel ).css( 'left', '-' + margenLeft + 'px' );
		}
		if ( textoRueda > anchoVentana ) {
			var margenLeft = ( textoRueda - anchoVentana ) / 2;
			$( 'svg' ).css( 'left', '-' + margenLeft + 'px' );
		}
		var minimoTop = ( ventanaSize > 700 ) ? ( 120 + logoSize ) : ( 100 + logoSize );
		$( '.contenidoPrincipal' ).css( { 'width': ruedaSize, 'height': ruedaSize, 'top': minimoTop } );
		$( '.linkAbout' ).css( 'margin-top', ( textoRueda * 0.9 ) + 'px' );
		if ( ventanaSize > 780 ) {
			$( '.linkAbout' ).css( 'margin-top', ( textoRueda * 0.95 ) + 'px' );
		}
	} else {
		const maximoSize = ventanaSize * 0.7;
		var logoSize = ventanaSize * 0.045;
		logoSize = ( logoSize < 40 ) ? 40 : logoSize;
		var iconosHeight = ventanaSize * 0.10;
		var iconosWidth = iconosHeight * 2.5;
		ruedaSize = ventanaSize * 0.65;
		ruedaSize = ( ruedaSize > maximoSize ) ? maximoSize : ruedaSize;
		ruedaSize = ( ruedaSize < 490 ) ? 490 : ruedaSize;
		contenidoSize = ruedaSize * 0.80;
		if ( ventanaSize < 980 ) {
			contenidoSize = ( contenidoSize > 430 ) ? 430 : contenidoSize;
		}
		textArea = contenidoSize * 0.25;
		textoRueda = contenidoSize + 120;
		textoRueda = ( ruedaSize < textoRueda ) ? ruedaSize : textoRueda;
		if ( ventanaSize < 980 ) {
			textoRueda = ( textoRueda > 650 ) ? 650 : textoRueda;
		}
		var minimoTop = 150 + logoSize;
		$( '.contenidoPrincipal' ).css( { 'width': ruedaSize, 'height': ruedaSize, 'top': minimoTop + 'px', 'bottom': 'initial' } );
		$( '.dLogo' ).css( 'width', ruedaSize );
		$( '.linkAbout' ).css( 'margin-top', ( textoRueda * 0.85 ) + 'px' );
		if ( ventanaSize > 880 ) {
			$( '.linkAbout' ).css( 'margin-top', ( textoRueda * 0.9 ) + 'px' );
		}
	}
	wheel.css( { 'width': ruedaSize, 'height': ruedaSize, 'top': minimoTop + 'px' } );
	$( '.contenidoCentro' ).css( { 'width': contenidoSize, 'height': contenidoSize } );
	$( 'svg' ).css( 'width', textoRueda );
	symbols.css( { 'width': iconosWidth, 'height': iconosHeight } );
	$( '.logo' ).css( 'height', logoSize + 'px' );
	center = ruedaSize / 2;
	radius = ruedaSize * 0.533;
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
	var hormigaSize = contenidoSize * 0.5;
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
		$( '.linkAbout' ).fadeIn( 'slow' );
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
	contenidoContact += '<div class="botonContainer"><a class="enviaForm italic" onclick="enviar()">Send</a></div>';
	contenidoContact += '</div>';
	$( '.linkAbout' ).fadeOut( 'slow' );
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
