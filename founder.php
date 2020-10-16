<?php include 'header.php'; ?>
<div id="pinContainer">
	<div id="slideContainer">
		<section class="panel blue">
			<div class="principal">
				<h1 class="scrollAnimation" id="mainSection">Roth</h1>
				<h2 class="scrollAnimation">Founder</h2>
				<div class="contentText">
					<p class="scrollAnimation italica">"…an architecture that considers sustainable ways of life that allow nature to breathe. We must go out of our conceptual and physical cave and reintegrate with our natural environs.”</p>
					<p class="scrollAnimation">CEO and Founder of AZULIK and President of the Foundation Enchanting Transformation</p>
					<p class="scrollAnimation">Founder of AZULIK, SFER IK, and Enchanting Transformation, Roth is the creative leader of Roth Architecture. Inspired by organic forms and ecosystem balance, his architectural proposal challenges conventional structures and calls for play, surprise, and attention.</p>
					<p class="scrollAnimation">For the last ten years, Roth has fostered an ongoing dialogue with indigenous and contemporary communities to promote the exchange of ideas and knowledge. With each project, he promotes the preservation of local culture and the recovery of the knowledge and values ​​of ancestral wisdom to promote different forms of interaction with the environment and its protection.</p>
					<p class="scrollAnimation">This effort converges with the urge to explore, through art, the conceptualization of the human essence and our connection with the planet.</p>
				</div>
				<img src="images/founder/founder-01.jpg" class="founderImgTmp scrollAnimation">
			</div>
		</section>
		<section class="panel tCenter">
			<img src="images/founder/founder-02.jpg">
		</section>
		<section class="panel tCenter">
			<img src="images/founder/founder.jpg">
		</section>
		<section class="panel tCenter">
			<a href="#" class="volverContent vuelveLink"><i class="fas fa-arrow-left"></i><br>Return</a>
		</section>
		<section class="panel tCenter"></section>
	</div>
</div>
<script type="text/javascript" src="js/modernizr.custom.min.js"></script>
<script type="text/javascript" src="js/TweenMax.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
<script type="text/javascript" src="js/animation.gsap.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script>
<script>
	$( document ).ready( function() {
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
