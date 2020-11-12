<?php
	include 'project-list.php';
	$inArray = array();
	$valoresFiltro = array();
	foreach ( $project as $data ) {
		if ( $data[ $_REQUEST[ 'filtro' ] ] != '' && !in_array( limpialo( $data[ $_REQUEST[ 'filtro' ] ] ), $inArray ) ) {
			$valoresFiltro[] = array( 'nombre' => $data[ $_REQUEST[ 'filtro' ] ], 'valor' => limpialo( $data[ $_REQUEST[ 'filtro' ] ] ) ) ;
			$inArray[] = limpialo( $data[ $_REQUEST[ 'filtro' ] ] );
		}
	}
	if ( empty( $valoresFiltro ) ) {
		$status = array( 'status' => 'Error' );
	} else {
		$status = array( 'status' => 'Success', 'filtro' => $_REQUEST[ 'filtro' ],'valores' => $valoresFiltro );
	}
	echo json_encode( $status );
?>