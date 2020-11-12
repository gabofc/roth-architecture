<?php include 'header.php'; ?>
<div id="pinContainer">
	<div id="slideContainer">
		<section class="panel blue">
			<div class="principal">
				<div class="founderImgTmp scrollAnimation" style="background-image: url( 'images/projects/project.jpg' );"></div>
				<div class="pTop">
					<h1 class="scrollAnimation" id="mainSection">Azulik, 2014</h1>
					<div class="projectDetail">
						<p class="scrollAnimation"><b>Type:</b> Hotel</p>
						<p class="scrollAnimation"><b>Location:</b> Tulum, Quintana Roo, México</p>
						<p class="scrollAnimation"><b>Size:</b> 19700 m2</p>
						<p class="scrollAnimation"><b>Status:</b> Completed</p>
						<p class="scrollAnimation"><b>Year:</b> 2014</p>
						<p class="scrollAnimation"><b>Architect:</b> ROTH ARCHITECTURE</p>
						<span class="scrollAnimation"></span>
					</div>
					<div class="contentText project">
						<p class="scrollAnimation"><b>AZULIK</b> es en la primera obra de Roth Architecture. Este espacio se convirtió en la manifestación material de una travesía creativa inspirada por el intercambio con distintos grupos étnicos que se revela en la priorización del vinculo con la naturaleza</p>
						<p class="scrollAnimation">En su propósito convergen lo comercial y lo cultural, onceptos condensados en un paisajismo que combina vistas al mar con el contacto con la selva y que se asume al cielo como protagonista. Un programa de construcción elevada, desarrollado con la intención de no tocar el suelo o alterar el ecosistema, alojas iniciativas que comprenden propuestas gastronómicas, de wellness y lifestyle</p>
						<p class="scrollAnimation">La estructura fue conceptualizada como una casa del árbol que convoca al juego y al autodescubrimiento. Sus distintos niveles se entretejen en circulaciones suspendidas que genera una experiencia lúdica, la cual se nutre además de los materiales endémicos usados para su construcción</p>
					</div>
				</div>
			</div>
		</section>
		<section class="panel tCenter movilSection">
			<img src="" data-src="images/projects/project.jpg" class="lazyload">
		</section>
		<section class="panel tCenter">
			<img src="" data-src="images/projects/roth-3.jpg" class="lazyload">
		</section>
		<section class="panel tCenter">
			<img src="" data-src="images/projects/roth-1.jpg" class="lazyload">
		</section>
		<section class="panel tCenter">
			<a href="#" class="volverContent vuelveLink"><i class="fas fa-arrow-right"></i><br>Next Project</a>
		</section>
	</div>
</div>
<script type="text/javascript" src="js/modernizr.custom.min.js"></script>
<script type="text/javascript" src="js/TweenMax.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
<script type="text/javascript" src="js/animation.gsap.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script>
<script>
	$( document ).ready( function() {
		if ( $( window ).width() < 950 ) {
			$( '.movilSection' ).show();
		}
		$( window ).scroll(function(event) {
			var posicion = $( this ).scrollTop();
			if ( posicion > 200 && posicion < 300 ) {
				var alturaScrollMagic = $( '.scrollmagic-pin-spacer' ).height();
				var alturaPin = $( '#pinContainer' ).height();
				$( '.scrollmagic-pin-spacer' ).css( 'max-height', alturaScrollMagic + 'px' );
				$( '#pinContainer' ).css( 'max-height', alturaPin + 'px' );
			}
		} );
		var controller = new ScrollMagic.Controller();
		var wipeAnimation = new TimelineMax()
			.to( '#slideContainer', 0.5, { z: -150 } )
			.to( '#slideContainer', 1, { x: '-20%' } )
			.to( '#slideContainer', 0.5, { z: 0 } )
			.to( '#slideContainer', 0.5, { z: -150, delay: 1 } )
			.to( '#slideContainer', 1, { x: '-40%' } )
			.to( '#slideContainer', 0.5, { z: 0 } )
			.to( '#slideContainer', 0.5, { z: -150, delay: 1 } )
			.to( '#slideContainer', 1, { x: '-60%' } )
			.to( '#slideContainer', 0.5, { z: 0 } )
			.to( '#slideContainer', 0.5, { z: -150, delay: 1 } )
			.to( '#slideContainer', 1, { x: '-80%' } )
			.to( '#slideContainer', 0.5, { z: 0 } );
		new ScrollMagic.Scene( {
			container: 'main',
			triggerElement: '#pinContainer',
			triggerHook: 'onLeave',
			duration: '500%'
		} ).setPin( '#pinContainer' ).setTween( wipeAnimation ).addTo( controller );
	} );
</script>
<?php include 'footer.php'; ?>
