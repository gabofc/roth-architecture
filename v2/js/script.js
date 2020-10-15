$( document ).ready( function() {
	$( '.linkAnchor' ).click( function( e ) {
		e.preventDefault();
		var target = '#' + $( this ).attr( 'destino' );
		$( 'html, body' ).animate( {
			scrollTop: ( $( target ).offset().top ) - 50
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
	ScrollReveal().reveal(
		'.scrollAnimation',
		{
			delay: 200,
			distance: '20%',
			origin: 'bottom',
			opacity: 0,
			useDelay: 'always',
			viewFactor: 0.1,
			interval: 200
		}
	);
	if ( archivoUsado == 'index.php' ) {
		$( '#mainSlide' ).bxSlider( {
			auto: true,
			pager: false,
			mode: 'fade'
		} );
	}
	$( '#busquedaInput' ).keyup( function() {
		if ( $( this ).val() != '' ) {
			buscadorGeneralSobreHtml( $( this ).val() );
		} else {
			reseteaBusqueda( 'contenidoTabla' );
		}
	} );
} );
function enviar() {
	if ( validaTodo( 'contactoForm' ) ) {
		var parametros = { 'nombre': $( '#nombre' ).val(), 'email': $( '#email' ).val(), 'telefono': $( '#telefono' ).val(), 'mensaje': $( '#mensaje' ).val() };
		ajaxRequest( 'POST', parametros, 'panel/querys/enviar', respuestaEnviar );
	}
}
function respuestaEnviar( respuesta ) {
	cargando( false );
	datos = JSON.parse( respuesta );
	if ( datos.status == 'Success' ) {
		var titulo = ( idiomaActual == 'ES' ) ? 'Éxito' : 'Success';
		var mensaje = ( idiomaActual == 'ES' ) ? 'Enviado con exito, en breve te contactaremos' : 'Sent successfully, we will contact you shortly';
		alerta( titulo, mensaje, 'success' )
		vacia( 'contactForm' );
	} else {
		errorCallback();
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