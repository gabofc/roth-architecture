<?php
	include 'lib/project-list.php';
	$proyecto = $project[ $_REQUEST[ 'nombre' ] ];
	$rutaImg = 'images/projects/' . $_REQUEST[ 'nombre' ] . '/';
	$keys = array_keys( $project );
	$nextProject = null;
	if ( end( $project ) != $project[ $_REQUEST[ 'nombre' ] ] ) {
		$nextProject = $keys[ array_search( $_REQUEST[ 'nombre' ], $keys ) + 1 ];
	}
?>
<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
<div id="myContainer">
	<div class="scroll" id="section0">
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
    </div>
    <div class="section" id="section1">
    <?php
    	$i = 1;
		$archivos = scandir( $rutaImg );
		foreach ( $archivos as $imagen ) {
			$extention = explode( '.', $imagen );
			if ( !is_dir( $imagen ) && ( end( $extention ) == 'jpg' || end( $extention ) == 'jpeg' ) ) {
				echo
				'<div class="scroll" id="slide' . $i . '">
					<img src="' . $rutaImg . $imagen . '">
				</div>';
				$i++;
			}
		}
	?>
	<?php if ( !is_null( $nextProject ) ) :?>
		<div class="scroll" id="slide<?php echo $i; ?>">
			<a href="project/<?php echo $nextProject; ?>" class="volverContent"><i class="fas fa-arrow-right"></i><br>Next Project</a>
		</div>
	<?php endif; ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/jquery.jInvertScroll.js"></script>
<script>
	$( document ).ready( function() {
		var elem = $.jInvertScroll(['.scroll'],        // an array containing the selector(s) for the elements you want to animate
            {
            height: 6000,                   // optional: define the height the user can scroll, otherwise the overall length will be taken as scrollable height
            onScroll: function(percent) {   //optional: callback function that will be called when the user scrolls down, useful for animating other things on the page
                console.log(percent);
            }
        });

        $(window).resize(function() {
          if ($(window).width() <= 768) {
            elem.destroy();
          }
          else {
            elem.reinitialize();
          }
        });
	} );
</script>
