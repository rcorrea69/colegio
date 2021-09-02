<?php

function formato_fecha_dd_mm_Y($date)
{	
	$fecha = str_replace('/', '-', $date);
    return date('d/m/Y', strtotime($date));
}

function formato_fecha_Y_mm_dd($date)
{	
	$fecha = str_replace('/', '-', $date);
    return date('Y-m-d', strtotime($fecha));
}     
 

?>