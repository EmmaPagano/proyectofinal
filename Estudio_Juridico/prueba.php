<?php

$inicio= "2012-01-01";
$fin= "2014-04-01";

$preavisoSi = true;
 
$datetime1 = new DateTime($inicio);
$datetime2 = new DateTime($fin);
 
# obtenemos la diferencia entre las dos fechas
$intervaloDiferencia=$datetime2->diff($datetime1);
 
# obtenemos la diferencia en meses
$intervalMeses=$intervaloDiferencia->format("%m");

# obtenemos la diferencia en años y la multiplicamos por 12 para tener los meses
$intervalAnos = $intervaloDiferencia->format("%y") * 12;


$mesesTotales = $intervalMeses+$intervalAnos;

$anioTotales = $mesesTotales / 12;

$resto = $anioTotales - floor($anioTotales);

if($resto >= 0.25){
    $anioTotales = $anioTotales + 1;
}

echo floor($anioTotales);


if ($preavisoSi) {
    $liquidacion = $anioTotales * $sueldo;
} else {
    $liquidacion = ($anioTotales * $sueldo) + $sueldo;
}


/*
# obtenemos la diferencia en años y la multiplicamos por 12 para tener los meses
$intervalAnos = $intervaloDiferencia->format("%y")*12;
 
echo "hay una diferencia de ".($intervalMeses+$intervalAnos)." meses";
*/
?>