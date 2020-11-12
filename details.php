<?php
	include 'header.php';
	include 'lib/project-list.php';
	$proyecto = $project[ $_REQUEST[ 'nombre' ] ];
	$rutaImg = 'images/projects/' . $_REQUEST[ 'nombre' ] . '/';
	$keys = array_keys( $project );
	$nextProject = null;
	if ( end( $project ) != $project[ $_REQUEST[ 'nombre' ] ] ) {
		$nextProject = $keys[ array_search( $_REQUEST[ 'nombre' ], $keys ) + 1 ];
	}
?>
<div id="pinContainer">
	<div id="slideContainer">
		<section class="panel blue">
			<div class="principal">
				<div class="founderImgTmp scrollAnimation" style="background-image: url( '<?php echo $rutaImg; ?><?php echo $proyecto[ 'image' ]; ?>' );"></div>
				<div class="pTop">
					<h1 class="scrollAnimation" id="mainSection"><?php echo $proyecto[ 'name' ]; ?></h1>
					<div class="projectDetail">
						<p class="scrollAnimation"><b>Type:</b> <?php echo $proyecto[ 'type' ]; ?></p>
						<p class="scrollAnimation"><b>Location:</b> <?php echo $proyecto[ 'location' ]; ?></p>
						<p class="scrollAnimation"><b>Size:</b> <?php echo $proyecto[ 'size' ]; ?></p>
						<p class="scrollAnimation"><b>Status:</b> <?php echo $proyecto[ 'status' ]; ?></p>
						<p class="scrollAnimation"><b>Year:</b> <?php echo $proyecto[ 'year' ]; ?></p>
						<p class="scrollAnimation"><b>Architect:</b> <?php echo $proyecto[ 'architect' ]; ?></p>
						<span class="scrollAnimation"></span>
					</div>
					<div class="contentText project">
					<?php
						foreach ( $proyecto[ 'description' ] as $descripcion ) {
							echo '<p class="scrollAnimation">' . $descripcion . '</p>';
						}
					?>
					</div>
				</div>
			</div>
		</section>
		<section class="panel tCenter movilSection">
			<img src="" data-src="<?php echo $rutaImg; ?><?php echo $proyecto[ 'image' ]; ?>" class="lazyload">
		</section>
		<?php
			$slideCuantos = 2;
			$archivos = scandir( $rutaImg );
			foreach ( $archivos as $imagen ) {
				if ( $imagen != '.' && $imagen != '..' && $imagen != $proyecto[ 'image' ] && $slideCuantos < 5 ) {
					echo
					'<section class="panel tCenter">
						<img src="" data-src="' . $rutaImg . $imagen . '" class="lazyload">
					</section>';
					$slideCuantos++;
				}
			}
		?>
		<?php if ( !is_null( $nextProject ) ) :?>
		<section class="panel tCenter">
			<a href="project/<?php echo $nextProject; ?>" class="volverContent"><i class="fas fa-arrow-right"></i><br>Next Project</a>
		</section>
		<?php endif; ?>
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
