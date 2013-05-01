<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hitos de Chile - Argentina</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
	<!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
	<div class="container">
		<div class="page-header">
	        	<h1>Hitos Chile - Argentina</h1>
	        	<p>Datos obtenidos desde <a href="http://datos.gob.cl/datasets/ver/2790" target="_blank">Hitos Limítrofes</a></p>
	        	<p>Corresponde al listado disponible de los Hitos Límitrofes, que demarcan la línea límite con Argentina ubicados en las regiones del sur de Chile. Las ubicaciones están con sus coordenadas geográficas exactas y con la descripción del material del que se está hecho el Hito. </p>
	        	<p>Desarrollado en tiempo libre :)</p>
	        	<p><a href="">Obtener el código fuente</a></p>
	      	</div>
		<div class="-row-fluid">
			
			<div class="row-fluid">
				<?php
				include('666.php');
				echo $retorna;
				?>
			</div>
		</div>
	</div>
	<script src="http://code.jquery.com/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>