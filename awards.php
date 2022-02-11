<?php
	include 'header.php';
	include 'lib/awards-list.php';
?>
<div class="principal">
	<div class="textContent">
		<h1>Awards</h1>
		<h2>Prizes & Participation</h2>
	</div>
	<div class="textContent movil">
		<?php
			foreach ( $awards as $index => $award ) {
				$posicion = ( $index % 2 ) ? 'right' : '';
				echo
				'<div class="awardItem ' . $posicion . '">
					<div class="contenido">
						<div class="titulos">
							<h3 class="scrollAnimation">' . $award[ 'title' ] . '</h3>
							<h4 class="scrollAnimation">' . $award[ 'place' ] . '</h4>
						</div>
						<div class="descripcion">
							<span class="scrollAnimation"></span>
							<b class="scrollAnimation">WINNER</b>
							<b class="scrollAnimation">Category: ' . $award[ 'category' ] . '</b>
							<b class="scrollAnimation">Project: ' . $award[ 'project' ] . '</b>
							<p class="scrollAnimation">' . $award[ 'description' ] . '</p>
						</div>
					</div>
					<div class="awardImg scrollAnimation">
						<img src="" data-src="images/awards/' . $award[ 'image' ] . '" class="lazyload" loading="lazy">
						 <a href="' . $award[ 'link' ] . '" target="_blank">Read More</a>
						<div class="linea"></div>
					</div>
				</div>';
			}
		?>
	</div>
</div>
<?php include 'footer.php'; ?>
