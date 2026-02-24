<?php
require_once "autoload.php";
$miGameStop=new GestorVideojuego();

for($i=1;$i<=25;$i++){//terror
    $terror=new Terror(($i*2)+1,"Resident Evil $i","survival");
    $miGameStop->anyadir($terror);
}

for($i=1;$i<=25;$i++){//accion
    $accion=new Accion($i*2,"Call of duty $i","a distancia");
    $miGameStop->anyadir($accion);
}

var_dump($miGameStop);

$miGameStop->actualizarTerror(3,"Resident evil The Darkside Umbrella Chronicles of Evil Wesker Revenge 3D","psicológico");
$miGameStop->actualizarAccion(2,"Mamahuevo llegaron los gringos","cuerpo a cuerpo");

$miGameStop->eliminar(51);
$miGameStop->eliminar(50);

var_dump($miGameStop);
?>