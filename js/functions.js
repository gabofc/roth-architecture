function validaEmail( email ) {
	var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if ( !expr.test( email ) ) {
		return false;
	}
	else {
		return true;
	}
}
function validaTodo( cual ) {
	desmarca( cual );
	var mal = 0;
	var lleno = false;
	var errorAcumulado = ''
	$( '#' + cual + ' .obligatorio' ).each( function() {
		var clase = $( this ).attr( 'class' );
		if ( '' === $( this ).val() ) {
			$( this ).addClass( 'vacio' );
			$( this ).parent().after( '<label class="error">Please fill this field</label>' );
			mal++;
		} else {
			lleno = true;
			if ( clase.indexOf( 'email' ) != -1 ) {
				if ( !validaEmail( $( this ).val() ) ) {
					$( this ).addClass( 'vacio' );
					$( this ).parent().after( '<label class="error">Please add a valid email address</label>' );
					mal++;
				}
			}
		}
	} );
	if ( mal == 0 ) {
		return true;
	} else {
		return false;
	}
}
function vacia( cual ) {
	$( '#' + cual + ' input' ).each( function() {
		$( this ).val( '' );
	} );
	$( '#' + cual + ' textarea' ).each( function() {
		$( this ).val( '' );
	} );
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
	$( '.error' ).remove();
}
function cargando( status ) {
	if ( !status ) {
		$( '.contactDiv a' ).html( 'Send' );
	} else {
		$( '.contactDiv a' ).html( 'Sending ...' );
	}
}
function ajaxRequest( parametros, urlCall, successCallback ) {
	$.ajax( {
		type: 'POST',
		url: urlCall,
		data: parametros,
		async: true,
		beforeSend: cargando( true ),
		success: function( respuesta ) { successCallback( respuesta ); },
		error: function() { errorCallback(); },
		statusCode: { 404:
			function() {
				cargando( false );
				var mensaje = 'Request file not found';
    			alerta( mensaje, 'error' );
			}
		}
	} );
}
function errorCallback() {
	var mensaje = 'There was a problem, try again';
    alerta( mensaje, 'error' );
}
function alerta( mensaje ) {
	$( '.contenidoCentro' ).fadeOut( 'slow', function() {
		$( '.contenidoCentro' ).html( '<p class="centrado">' + mensaje + '</p>' );
		$( '.contenidoCentro' ).fadeIn( 'slow' );
	} );
}