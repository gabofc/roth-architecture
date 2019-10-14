		<script src="js/functions.js?v=<?php echo time(); ?>"></script>
		<script src="js/tween-max.js"></script>
		<script src="js/dragable.js"></script>
		<script src="js/script.js?v=<?php echo time(); ?>"></script>
		<script>
		var preloadImages = new Array();

		<?php
			$countPreload = 0;
			foreach( $iconsLinks as $icons ) {
				$imgAnimada = ( $icons[2] != '' ) ? $path . $icons[2] : '';
				echo ( $icons[2] != '' ) ? 'preloadImages['.$countPreload.'] = "' . $path . $icons[1] . '";' : '';
				$countPreload ++;
			}
		?>

		var loadedimages = new Array();
		for(var i=0; i<preloadImages.length; i++) {
			loadedimages[i] = new Image();
			loadedimages[i].src = preloadImages[i];
		}
		</script>
	</body>
</html>
