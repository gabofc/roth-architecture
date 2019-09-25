function ajustaElementos() {
	var nuevaRotacion = 360 - rotacionActual;
	garabatos.each( function() {
		TweenMax.to( $( this ), 0, {
			rotation: nuevaRotacion
		} );
	} );
}
var entrado = '';
var rotacionActual = 0;
const rotationSnap = 360 / 8
var wheel = $( '#wheel' );
var garabatos = $( '.garabato' );
var center = 300;
var radius = 320;
var total = garabatos.length;
var slice = 2 * Math.PI / total;
$( document ).ready(function($) {
	garabatos.each( function( i, garabato ) {
		var angle = i * slice;
		var x = center + radius * Math.sin( angle );
		var y = center - radius * Math.cos( angle );
		TweenLite.set( garabato, {
			xPercent: -50,
			yPercent: -50,
			x: x,
			y: y,
			rotation: 360
		} );
	} );
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
	$( 'a' ).click( function( e ) {
		e.preventDefault();
		return false;
	} );
} );