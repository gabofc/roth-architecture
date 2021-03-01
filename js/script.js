$( document ).ready( function() {
	$( '.linkAnchor' ).click( function( e ) {
		e.preventDefault();
		var target = '#' + $( this ).attr( 'destino' );
		$( 'html, body' ).animate( {
			scrollTop: ( $( target ).offset().top ) - 50
		}, 800 );
	} );
	$( '.vuelveLink' ).click( function( e ) {
		e.preventDefault();
		$( 'html, body' ).animate( {
			scrollTop: ( $( 'header' ).offset().top ) - 50
		}, 800 );
	} );
	$( '.noHref' ).click( function( e ) {
		e.preventDefault();
		e.stopPropagation();
	} );
	$( '.bMobile' ).click( function( e ) {
		e.preventDefault();
		$( '.logoImg, .botonAgenda, .bMobile' ).fadeOut();
		setTimeout( function() {
			$( '.menu' ).addClass( 'abierto' );
			setTimeout( function() { $( '.bMobileCierra' ).addClass( 'abierto' ); }, 500 );
		}, 300 );
	} );
	$( '.bMobileCierra' ).click( function( e ) {
		e.preventDefault();
		$( '.bMobileCierra' ).removeClass( 'abierto' );
		setTimeout( function() {
			$( '.menu' ).removeClass( 'abierto' );
			setTimeout( function() {
				$( '.logoImg, .botonAgenda, .bMobile' ).fadeIn();
			}, 500 );
		}, 300 );
	} );
	$( '#timezone' ).val( 'America/Cancun' ).trigger( 'change' );
	ScrollReveal().reveal( '.scrollAnimation', {
		delay: 200,
		distance: '20%',
		origin: 'bottom',
		opacity: 0,
		useDelay: 'always',
		viewFactor: 0.1,
		interval: 200
	} );
	if ( archivoUsado == 'index.php' ) {
		$( '#mainSlide' ).bxSlider( {
			auto: true,
			pager: false,
			controls: false,
			mode: 'fade'
		} );
	} else if ( archivoUsado == 'about.php' ) {
		$( window ).scroll( function () {
			var posicion = $( this ).scrollTop();
			var alturaTotal = $( document ).height() - $( 'footer' ).height() - 100 - 50;
			var porcentajeActual = ( posicion * 100 ) / alturaTotal;
			$( '.scrollBarPosition span' ).css( 'height', ( porcentajeActual + 5 ) + '%' );
			var alturaTope = 96 + $( 'main' ).height() - $( 'footer' ).height();
			var topInicial = $( '.scrollBarPosition' ).css( 'top' );
			var topNuevo = alturaTope + $( '.scrollBarPosition' ).height();
			if ( posicion >= alturaTope ) {
				$( '.scrollBarPosition' ).css( 'position', 'absolute' );
				$( '.scrollBarPosition' ).css( 'top', ( alturaTope + 280 ) + 'px' );
			} else {
				$( '.scrollBarPosition' ).css( 'position', 'fixed' );
				$( '.scrollBarPosition' ).css( 'top', '280px' );
			}
		} );
	} else if ( archivoUsado == 'philosophy.php' ) {
		if ( $( window ).width() <= 903 ) {
			if ( $( '.prePhilUno' ).length == 0 ) {
				var html = $( '.philImgUno' ).html();
				$( '.barraNegra .fila' ).prepend( '<div class="prePhilUno">' + html + '</div>')
			}
		} else {
			if ( $( '.prePhilUno' ).length > 0 ) {
				$( '.prePhilUno' ).remove();
			}
		}
		$( window ).resize( function () {
			if ( $( window ).width() <= 903 ) {
				if ( $( '.prePhilUno' ).length == 0 ) {
					var html = $( '.philImgUno' ).html();
					$( '.barraNegra .fila' ).prepend( '<div class="prePhilUno">' + html + '</div>')
				}
			} else {
				if ( $( '.prePhilUno' ).length > 0 ) {
					$( '.prePhilUno' ).remove();
				}
			}
		} );
	} else if ( archivoUsado == 'services.php' ) {
		$( '#serviceSlide' ).bxSlider( {
			auto: false,
			pager: false,
			infiniteLoop: false,
			hideControlOnEnd: true,
			mode: 'fade',
			nextText: 'NXT',
			prevText: 'PRV',
			onSlideAfter: function( slideElement, oldElement, newElement ) {
				if ( $( window ).width() > 1148 ) {
					$( '#slideService-' + newElement + ' .verticalTitle h2' ).addClass( 'activo' );
					$( '#slideService-' + oldElement + ' .verticalTitle h2' ).removeClass( 'activo' );
					$( '#slideService-' + newElement + ' .servicioContent' ).addClass( 'activo' );
					$( '#slideService-' + oldElement + ' .servicioContent' ).removeClass( 'activo' );
				}
			}
		} );
	}
	$( '#busquedaInput' ).keyup( function() {
		if ( $( this ).val() != '' ) {
			buscadorGeneralSobreHtml( $( this ).val() );
		} else {
			reseteaBusqueda( 'contenidoTabla' );
		}
	} );
	$( '#datepicker' ).datepicker( {
		minDate: 0,
		onSelect: function( dateText ) {
			$( '#fechaElegida' ).val( dateText );
			agendaCita( 1 );
		}
	} );
	$( '.horaElige' ).click( function( e ) {
		$( '#horaElegida' ).val( $( this ).attr( 'tiempo' ) );
		$( '.horaElige' ).removeClass( 'marcada' );
		$( this ).addClass( 'marcada' );
		agendaCita( 1 );
	} );
	$( 'input, textarea' ).keypress( function( e ) {
		var elementoPadre = $( this ).attr( 'padre' );
		var funcionEjecuta = $( '#' + elementoPadre + ' .submit' ).attr( 'onclick' );
		var keynum = window.event ? window.event.keyCode : e.which;
		if ( keynum == 13 ) {
			console.log( 'Enter' );
			console.log( elementoPadre );
			console.log( funcionEjecuta );
			eval( funcionEjecuta );
		}
	} );
	$( '.lazyload' ).Lazy();
	$( '.campoDescarga' ).click( function() {
		$( '#' + $( this ).attr( 'campo' ) ).click();
	} );

} );
function enviar() {
	if ( validaTodo( 'contactoForm' ) ) {
		/*var parametros = { 'name': $( '#name' ).val(), 'email': $( '#email' ).val(), 'countryCode': $( '#code' ).val(), 'phone': $( '#phone' ).val(), 'company': $( '#company' ).val(), 'message': $( '#message' ).val(), 'formType': 'contact' };
		ajaxRequest( 'POST', parametros, 'contact-send', respuestaEnviar );*/
		$( '#contactoForm' ).submit();
	}
}
function respuestaEnviar( respuesta ) {
	cargando( false );
	datos = JSON.parse( respuesta );
	if ( datos.status == 'Success' ) {
		var titulo = ( idiomaActual == 'ES' ) ? 'Éxito' : 'Success';
		var mensaje = ( idiomaActual == 'ES' ) ? 'Enviado con exito, en breve te contactaremos' : 'Sent successfully, we will contact you shortly';
		alerta( titulo, mensaje, 'success' )
		vacia( 'contactoForm' );
	} else {
		alerta( 'Error', datos.mensaje, 'error' );
	}
}
function buscadorGeneralSobreHtml( busca ) {
	console.log( 'Busqueda de ' + busca );
	if ( busca != '' ) {
		var destruye = false;
		$.each( $( '.pressItem' ), function( indiceTR, datoTR ) {
			var elementoThis = $( this );
			var oculta = true;
			$.each( $( this ).find( 'span, h3, p' ), function( indice, dato ) {
				var query = dato.innerHTML;
				query = query.toUpperCase();
				if ( query.indexOf( busca.toUpperCase() ) != -1 ) {
					oculta = false;
				}
			} ) ;
			if ( oculta ) {
				elementoThis.hide();
			} else {
				elementoThis.show();
				destruye = true;
			}
		} );
		if ( destruye ) {
			console.log( 'destruyendo' )
			ScrollReveal().destroy();
		}
	} else {
		console.log( 'vacio reseteando' );
		reseteaBusqueda( elemento );
	}
}
function reseteaBusqueda( elemento ) {
	$( '.pressItem' ).show();
	ScrollReveal().reveal(
		'.scrollAnimation',
		{
			delay: 200,
			distance: '20%',
			origin: 'bottom',
			opacity: 0,
			useDelay: 'always',
			viewFactor: 0.1,
			interval: 200,
			scale: 1.02
		}
	);
}
function agendaCita( paso ) {
	if ( paso == 1 ) {
		if ( $( '#fechaElegida' ).val() != '' && $( '#horaElegida' ).val() != '' ) {
			console.log( 'pasando a paso 2' );
			$( '.popup .flexBox' ).slideToggle( 'fast', function() {
				$( '.contactoDivPop' ).slideToggle();
				$( '.popup' ).addClass( 'datos' );
			} );
		}
	} else {
		console.log( 'finalizando a paso 2' );
		if ( validaTodo( 'agendaForm' ) ) {
			$( '#timeZoneHidden' ).val( $( '#timezone' ).val() );
			var parametros = { 'date': $( '#fechaElegida' ).val(), 'time': $( '#horaElegida' ).val(), 'name': $( '#nameAgenda' ).val(), 'email': $( '#emailAgenda' ).val(), 'countryCode': $( '#codeAgenda' ).val(), 'phone': $( '#phoneAgenda' ).val(), 'company': $( '#companyAgenda' ).val(), 'message': $( '#messageAgenda' ).val(), 'timezone': $( '#timezone' ).val(), 'formType':'schedule' };
			ajaxRequest( 'POST', parametros, 'contact-send', respuestaAgenda );
		}
	}
}
function regresaFecha() {
	$( '.contactoDivPop' ).slideToggle( 'fast', function() {
		$( '.popup .flexBox' ).slideToggle();
		$( '.popup' ).removeClass( 'datos' );
		$( '#horaElegida' ).val( '' );
		$( '#fechaElegida' ).val( '' );
		$( '.horaElige' ).removeClass( 'marcada' );
	} );
}
function respuestaAgenda( respuesta ) {
	datos = JSON.parse( respuesta );
	if ( datos.status == 'Success' ) {
		cargando( false );
		var mensaje = ( idiomaActual == 'ES' ) ? 'Agendado con exito, en breve te contactaremos' : 'Successfully scheduled, we will contact you shortly';
		alerta( '', mensaje, 'success' )
		popup( 'agendaPopup', false );
		vacia( 'agendaForm' );
		regresaFecha();
	} else {
		$( '.cargando' ).fadeOut( "slow" );
		console.log( 'mensaje ' + datos.mensaje );
		alerta( 'Error', datos.mensaje, 'error' );
	}
}
function setTimeZone() {
	$( '#timeZoneHidden' ).val( $( '#timezone' ).val() );
}
function valoresFiltro( filtro ) {
	ajaxRequest( 'POST', { 'filtro': filtro }, 'lib/filtros', respuestaFiltros );
}
function respuestaFiltros( respuesta ) {
	cargando( false );
	datos = JSON.parse( respuesta );
	if ( datos.status == 'Success' ) {
		var i = 1;
		var filtroList = '<a class="noHref filtrosLinks" id="filtroSelector-' + i + '" onclick="filtra( \'all\', \'all\', ' + i + ' )">All</a>';
		$.each( datos.valores, function( indice, valor ) {
			i++;
			filtroList += '<a class="noHref filtrosLinks" id="filtroSelector-' + i + '" onclick="filtra( \'' + datos.filtro + '\', \'' + valor.valor + '\', ' + i + ' )">' + valor.nombre + '</a>';
		} );
		$( '.selectorFiltro' ).html( filtroList );
		if ( !$( '.selectorFiltro' ).is( ':visible' ) ) {
			$( '.selectorFiltro' ).slideToggle();
		}
		$( '.filtro ' ).removeClass( 'activo' );
		$( '.filtro[filtro="' + datos.filtro + '"]' ).addClass( 'activo' );
	} else {
		alerta( '', 'The selected filter doesn\'t have values', 'error' );
	}
}
function filtra( filtro, valor, indice ) {
	$( '.filtrosLinks' ).removeClass( 'marcado' );
	$( '#filtroSelector-' + indice ).addClass( 'marcado' );
	if ( filtro != 'all' ) {
		$( '.proyecto[' + filtro + '="' + valor + '"]' ).show();
		$( '.proyecto[' + filtro + '!="' + valor + '"]' ).hide();
	} else {
		$( '.proyecto' ).show();
	}
}
function validaArchivo( campo ) {
	var formatosPermitidos = [ 'doc', 'pdf', 'docx', 'xls', 'xlsx' ];
	var file = $( '#' + campo ).prop( 'files' );
	console.log( file[0][ 'name' ] );
	var fileName = file[0][ 'name' ];
	var filePart = fileName.split( '.' );
	var extension = filePart[ filePart.length - 1 ];
	var continua = false;
	for ( var i = 0; i < formatosPermitidos.length; i++ ) {
		if ( formatosPermitidos[ i ] == extension ) {
			continua = true;
			break;
		}
	}
	if ( continua ) {
		$( '.campoDescarga[campo="' + campo + '"] span' ).html( fileName );
	} else {
		alerta( '', 'The file must to be a PDF or Word file', 'error' );
		$( '#' + campo ).val( '' );
	}
}