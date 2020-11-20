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
<ul class="bxslider" id="proyectoSlide">
	<li>
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
	</li>
	<?php
		$i = 1;
		$archivos = scandir( $rutaImg );
		foreach ( $archivos as $imagen ) {
			$extention = explode( '.', $imagen );
			if ( !is_dir( $imagen ) && ( end( $extention ) == 'jpg' || end( $extention ) == 'jpeg' ) && $imagen != $proyecto[ 'image' ] ) {
				$sizes = list( $width, $height ) = getimagesize( $rutaImg . $imagen );
				$classImg = ( $sizes[ 0 ] >= $sizes[ 1 ] ) ? 'ancho' : 'alto';
				echo '<li id="slide-' . $i . '"><div class="imgSlide"><img src="" data-src="' . $rutaImg . $imagen . '" class="lazyload ' . $classImg . '"></div></li>';
				$i++;
			}
		}
	?>
	<?php if ( !is_null( $nextProject ) ) :?>
	<li><a href="project/<?php echo $nextProject; ?>" class="volverContent"><i class="fas fa-arrow-right"></i><br>Next Project</a></li>
	<?php endif; ?>
</ul>
<script>
	var activaMovimiento = true;
	var slideInicio = true;
	var slideFinal = false;
	var scrollActivo = false;
	var statusScroll = 0;
	$( document ).ready( function() {
		var slide = $( '#proyectoSlide' ).bxSlider( {
			auto: false,
			pager: false,
			infiniteLoop: false,
			controls: false,
			mode: 'horizontal',
			onSlideAfter: function( slideElement, oldElement, newElement ) {
				if ( ( newElement + 1 ) == slide.getSlideCount() ) { slideFinal = true;
				} else { slideFinal = false; }
				if ( newElement == 0 ) { slideInicio = true;
				} else { slideInicio = false; }
			},
			onSlideBefore: function( slideElement, oldElement, newElement ) {
				console.log( 'activando a ' + newElement );
				console.log( 'desactivando a ' + oldElement );
				$( '#slide-' + newElement + ' img' ).addClass( 'activo' );
				$( '#slide-' + oldElement + ' img' ).removeClass( 'activo' );
			}
		} );
		window.addEventListener( 'wheel', function( e ) {
			if ( e.deltaY < 0 ) {
				statusScroll = 0;
			} else if ( e.deltaY > 0 ) {
				statusScroll = 1;
			}
		} );
		$( window ).scroll( function( e ) {
			if ( $( this ).scrollTop() >= 167 && statusScroll == 1 && !slideFinal ) {
				$( this ).scrollTop( 167 );
				if ( activaMovimiento ) {
					activaMovimiento = false;
					slide.goToNextSlide();
					setTimeout( function() { activaMovimiento = true; }, 1800 );
				}
			}
			if ( $( this ).scrollTop() < 167 && statusScroll == 0 && !slideInicio ) {
				$( this ).scrollTop( 167 );
				if ( activaMovimiento ) {
					activaMovimiento = false;
					slide.goToPrevSlide();
					setTimeout( function() { activaMovimiento = true; }, 1800 );
				}
			}
		} );
	} );
</script>
<?php include 'footer.php'; ?>
