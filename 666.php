<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

date_default_timezone_set('America/Santiago');

/** Include PHPExcel_IOFactory */
require_once 'assets/classes/PHPExcel/IOFactory.php';

$objReader = PHPExcel_IOFactory::createReader("Excel2007");
$objReader->setReadDataOnly(true);

$region = (isset($_GET['r'])) ? $_GET['r'] : '';
$n_region = '';

switch ($region) {
	default:
		$file = "assets/docs/Hitos de Chile.xlsx";
		$n_region = "Metropolitana";
		break;
}
$objPHPExcel = $objReader->load($file);

$aData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

$cnt = 1;
$salto = 1;
$retorna = $url = $hito = '';
foreach($aData as $registro) {
	
	if($cnt>1) {
		$corregido_E = str_replace(' ','', $registro['E']);
		$corregido_F = str_replace(' ','', $registro['F']);
		$tipo = '<h2>'.$registro['B'].'</h2>';
		$url = '<p><a href="https://maps.google.com?q='.urlencode('-'.substr($corregido_E,0,-1).',-'.substr($corregido_F,0,-1)).'" target="_blank">ver mapa</a></p>';
		$hito = '<p><span class="label">Tipo</span> '.$registro['C'].'</p>';
		$ereccion = '<p><span class="label">Erección</span> '.$registro['D'].'</p>';
		$minimapa = '<img src="http://maps.googleapis.com/maps/api/staticmap?size=400x400&zoom=8&markers=size:tiny%7Ccolor:blue%7Clabel:C%7C-'.$corregido_E.',-'.$corregido_F.'&sensor=false" class="img-polaroid visible-desktop">';
		$datum = '<p><span class="label">Datum</span> '.$registro['H'].'</p>';
		$observaciones = '<p>'.$registro['L'].'</p>';
		$region = '<p><span class="label">Región</span> '.$registro['I'].'</p>';
		$cota = '<p><span class="label">Cota</span> '.$registro['G'].' (metros desde el suelo) </p>';
		$lat = '<p><span class="label">Lat</span> '.$registro['E'].'</p>';
		$lng = '<p><span class="label">Lng</span> '.$registro['F'].'</p>';
		$el_salto = ($salto == 3) ? '</div><div class="span12">' : '';

		$retorna .= '<div class="span4">'.$tipo./*$minimapa.*/$url.$lat.$lng.$hito.$cota.$ereccion.$datum.$region.$observaciones.'</div>'.$el_salto;

		$salto++;
		if($salto == 4)
			$salto = 1;
	}

	$cnt++;
}