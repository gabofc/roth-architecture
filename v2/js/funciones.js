function alerta( titulo, mensaje, tipo ) {
	/*swal( titulo, mensaje, tipo );*/
}
function confirmacion( titulo, pregunta ) {
	swal( {
		title: titulo,
		text: pregunta,
		icon: 'warning',
		buttons: [ 'NO', 'SI' ],
		dangerMode: true
	} ).then( ( desicion ) => {
		if ( desicion ) {
			return true;
		} else {
			return false;
		}
	} );
}
function ingresaDato( pregunta, successCallback ) {
	swal( {
		text: pregunta,
		content: 'input',
		button: { 'text': 'Continuar' }
	} ).then( ( input ) => {
		successCallback( input );
	} );
}
function manda( url ) {
	location.href = url;
}
function soloNumeros( e ) {
	var keynum = window.event ? window.event.keyCode : e.which;
	if ( ( 8 === keynum ) || ( 46 === keynum ) || ( 0 === keynum ) ) {
		return true;
	} else {
		return /\d/.test( String.fromCharCode( keynum ) );
	}
}
function validaEmail( email ) {
	var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if ( !expr.test( email ) ) {
		return false;
	}
	else {
		return true;
	}
}
function validaRfc( rfcStr ) {
	var strCorrecta;
	strCorrecta = rfcStr;
	var valid;
	if ( rfcStr.length == 12 ) {
		valid = '^(([A-Z]|[a-z]){3})([0-9]{6})((([A-Z]|[a-z]|[0-9]){3}))';
	} else {
		valid = '^(([A-Z]|[a-z]|\s){1})(([A-Z]|[a-z]){3})([0-9]{6})((([A-Z]|[a-z]|[0-9]){3}))';
	}
	var validRfc = new RegExp( valid );
	var matchArray = strCorrecta.match( validRfc );
	if ( matchArray === null ) {
		return false;
	} else {
		return true;
	}
}
function validaTodo( cual ) {
	desmarca( cual );
	var mal = 0;
	var lleno = false;
	var errorAcumulado = '';
	$( '#' + cual + ' .obligatorio' ).each( function() {
		var clase = $( this ).attr( 'class' );
		if ( '' === $( this ).val() || ( '0' === $( this ).val() && ( clase.indexOf( 'opcion' ) != -1 ) ) || ( !$( this ).is( ':checked' ) && ( clase.indexOf( 'terminos' ) != -1 ) ) ) {
			$( this ).addClass( 'vacio' );
			if( clase.indexOf( 'terminos' ) != -1 ) {
				if ( !$( this ).is( ':checked' ) ) {
					if ( idiomaActual == 'ES' ) {
						errorAcumulado += ( errorAcumulado === '' ) ? 'Debe aceptar los terminos y condiciones' : ', Debe aceptar los terminos y condiciones';
					} else {
						errorAcumulado += ( errorAcumulado === '' ) ? 'You must accept the terms and conditions' : ', You must accept the terms and conditions';
					}
				}
			}
			mal++;
		} else {
			lleno = true;
			if ( clase.indexOf( 'email' ) != -1 ) {
				if ( !validaEmail( $( this ).val() ) ) {
					$( this ).addClass( 'vacio' );
					if ( idiomaActual == 'ES' ) {
						errorAcumulado += ( errorAcumulado === '' ) ? 'Ingrese un formato de email valido' : ', Ingrese un formato de email valido';
					} else {
						errorAcumulado += ( errorAcumulado === '' ) ? 'Enter a valid email format' : ', Enter a valid email format';
					}
					mal++;
				}
			} else if ( clase.indexOf( 'rfc' ) != -1 ) {
				if ( !validaRfc( $( this ).val() ) ) {
					$( this ).addClass( 'vacio' );
					if ( idiomaActual == 'ES' ) {
						errorAcumulado += ( errorAcumulado === '' ) ? 'Ingrese un rfc valido' : ', Ingrese un rfc valido';
					} else {
						errorAcumulado += ( errorAcumulado === '' ) ? 'Enter a valid rfc' : ', Enter a valid rfc';
					}
					mal++;
				}
			} else if ( clase.indexOf( 'telefono' ) != -1 ) {
				var tel = $( this ).val();
				if ( tel.length < 10 ) {
					$( this ).addClass( 'vacio' );
					mal++;
					if ( idiomaActual == 'ES' ) {
						errorAcumulado += ( errorAcumulado === '' ) ? 'El telefono debe contener 10 digitos (incluyendo lada)' : ', El telefono debe contener 10 digitos (incluyendo lada)';
					} else {
						errorAcumulado += ( errorAcumulado === '' ) ? 'The phone number must contain 10 digits (including lada)' : ', The phone number must contain 10 digits (including lada)';
					}
				}
			}
		}
	} );
	if ( mal === 0 ) {
		return true;
	} else {
		if ( !lleno ) {
			if ( idiomaActual == 'ES' ) {
				errorAcumulado += ( errorAcumulado === '' ) ? 'Favor de llenar la informacion solicitada' : ', Favor de llenar la informacion solicitada';
			} else {
				errorAcumulado += ( errorAcumulado === '' ) ? 'Please fill in the requested information' : ', Please fill in the requested information';
			}
		}
		alerta( 'Error', errorAcumulado, 'error' );
		return false;
	}
}
function popup( cual, status ) {
	if ( status ) {
		$( '#' + cual ).addClass( 'popupActivo' );
		$( '.capaNegra' ).fadeIn( 'slow' );
	} else {
		$( '#' + cual ).removeClass( 'popupActivo' );
		$( '.capaNegra' ).fadeOut( 'slow' );
	}
}
function limpiaCadena( cadena ) {
	var regresa = '';
	var resultado = cadena.replace( /[^a-zA-Z 0-9.]+/g, '' );
	for ( var i = 0; i < resultado.length; i ++){
		regresa += ( resultado.charAt(i) == ' ' ) ? '-' : resultado.charAt(i);
	}
	return regresa.toLowerCase();
}
function vacia( cual ) {
	$( '#' + cual + ' input' ).each( function() {
		$( this ).val( '' );
	} );
	$( '#' + cual + ' select' ).each( function() {
		$( this ).val( $( '#' + $( this ).attr( 'id' ) + ' option:first' ).val() );
	} );
	$( '#' + cual + ' textarea' ).each( function() {
		$( this ).val( '' );
	} );
	$( '#' + cual + ' .id' ).val( '0' );
	desmarca( cual );
}
function marca( cual ) {
	desmarca( cual );
	$( '#' + cual + ' .obligatorio' ).each( function() {
		var clase = $( this ).attr( 'class' );
		if ( '' === $( this ).val() || ( '0' === $( this ).val() && ( clase.indexOf( 'opcion' ) != -1 ) ) ) {
			$( this ).addClass( 'vacio' );
		}
	} );
}
function desmarca( cual ) {
	$( '#' + cual + ' .vacio' ).each( function() {
		$( this ).removeClass( 'vacio' );
	} );
}
function cargando( status ) {
	if ( !status ) {
		$( '.cargando' ).fadeOut( "slow" );
		$( '.capaNegra' ).fadeOut( 'slow' );
	} else {
		$( '.cargando' ).fadeIn( 'slow' );
		$( '.capaNegra' ).fadeIn( 'slow' );
	}
}
function ajaxRequest( tipo, parametros, urlCall, successCallback ) {
	$.ajax( {
		type: tipo,
		url: urlCall,
		data: parametros,
		async: true,
		beforeSend: cargando( true ),
		success: function( respuesta ) { successCallback( respuesta ); },
		error: function() { errorCallback(); },
		statusCode: { 404:
			function() {
				cargando( false );
				var mensaje = ( idiomaActual == 'ES' ) ? 'Archivo de peticion no encontrado' : 'Request file not found';
				alerta( 'Error', mensaje, 'error' );
			}
		}
	} );
}
function errorCallback() {
	var mensaje = ( idiomaActual == 'ES' ) ? 'Hubo un problema, intenta de nuevo' : 'There was a problem, try again';
    alerta( 'Error', mensaje, 'error' );
}
function share( tipo, url ) {
	var donde = '';
	if ( 'facebook' === tipo ) {
		donde = 'http://www.facebook.com/sharer.php?u=' + url;
	} else if ( 'twitter' === tipo ) {
		donde = 'http://twitter.com/share?url=' + url;
	} else if ( 'google' === tipo ) {
		donde = 'https://plus.google.com/share?url=' + url;
	} else if ( 'linkedin' === tipo ) {
		donde = 'https://www.linkedin.com/cws/share?url=' + url;
	}
	window.open( donde,'Compartir', 'toolbar=0, status=0, width=650, height=450' );
}
function getVar( cual ) {
	var $_GET = {};
	if ( document.location.toString().indexOf('?') !== -1 ) {
		var query = document.location.toString().replace(/^.*?\?/, '').replace(/#.*$/, '').split('&');
		for( var i = 0, l = query.length; i < l; i++ ) {
			var aux = decodeURIComponent( query[ i ] ).split( '=' );
			$_GET[ aux[0] ] = aux[1];
		}
	} else {
		var sinUrl = document.location.toString().replace( urlSinPage + '&' , '' );
		var variables = sinUrl.split( '&' );
		for ( var e = 0; e < variables.length; e++ ) {
			var partes = variables[ e ].split( '=' );
			$_GET[ partes[0] ] = partes[1];
		}
	}
	return $_GET[ cual ];
}
function checaSesion( parametro ) {
	if ( localStorage.getItem( parametro ) === null || localStorage.getItem( parametro ) === '' || localStorage.getItem( parametro ) === 'null' ) {
		return false;
	} else {
		return true;
	}
}
function seteaSesion( nombre, valor ) {
	localStorage.getItem( nombre, valor );
}
function obtenSesion( parametro ) {
	localStorage.getItem( parametro );
}
function borraSesion( parametro ) {
	localStorage.removeItem( parametro );
}
function numberFormat( nStr ) {
	nStr += '';
	var x = nStr.split('.');
	var x1 = x[0];
	var x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	x2 = ( x2.length > 2 ) ? x2.substr( 0 , 3 ) : x2;
	var numeroFinal = x1 + x2;
	return numeroFinal;
}
function cierraPop() {
	$( '.popup' ).removeClass( 'popupActivo' );
	$( '.capaNegra' ).fadeOut( 'slow' );
}