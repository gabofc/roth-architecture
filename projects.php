<?php
	include 'header.php';
	include 'lib/project-list.php';
?>
<div class="principal">
	<div class="textContent">
		<div class="fila">
			<div class="titulos">
				<h1 class="scrollAnimation">Projects</h1>
				<h2 class="scrollAnimation">Our Work</h2>
			</div>
		</div>
	</div>
</div>
<div class="filtros scrollAnimation">
	<div class="filtro" onclick="valoresFiltro( 'status' )" filtro="status">Status <i class="fas fa-chevron-down"></i></div>
	<div class="filtro" onclick="valoresFiltro( 'location' )" filtro="location">Location <i class="fas fa-chevron-down"></i></div>
	<div class="filtro" onclick="valoresFiltro( 'type' )" filtro="type">Type <i class="fas fa-chevron-down"></i></div>
</div>
<div class="selectorFiltro"></div>
<div class="proyectos">
<?php
	foreach ( $project as $indice => $proyecto ) {
		$rutaImg = 'images/projects/' . $indice . '/' . $proyecto[ 'image' ];
		if ( file_exists( $rutaImg ) ) {
			$style = ( $proyecto[ 'initial' ] ) ? '' : 'style="display: none;"';
			echo
			'<div class="proyecto scrollAnimation" status="' . limpialo( $proyecto[ 'status' ] ) . '" location="' . limpialo( $proyecto[ 'location' ] ) . '" type="' . limpialo( $proyecto[ 'type' ] ) . '" onclick="manda( \'project/' . $indice . '\' )" ' . $style . '>
				<img src="' . $rutaImg . '" alt="' . $proyecto[ 'name' ] . '">
				<div class="proyectoInfo">
					<h2>' . $proyecto[ 'name' ] . '</h2>
					<p>' . $proyecto[ 'location' ] . ', ' . $proyecto[ 'year' ] . '</p>
				</div>
			</div>';
		}
	}
?>
</div>
<?php include 'footer.php'; ?>
