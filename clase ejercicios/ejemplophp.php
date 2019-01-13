<?php

$entero=5;
echo $entero;
echo "<br>";
$decimal=5.45;
echo $decimal;
echo "<br>";
$cientifica=0.1245e2;
echo $cientifica;
echo "<br>";
$dato="hola";
echo $dato;

$boleana_t=true;
$boleana_f=false;

echo "<br>";
echo "El valor verdadero".$boleana_t ."<br>";
echo "El valor de falso".$boleana_f;
echo "<br>";
echo "<br>";

$variable="rojo";
if($variable=="rojo"){
	echo "el color es rojo";
}else{
	echo "el color no es rojo";
}
echo "<br>";
echo "<br>";

$variable2=2;
switch ($variable2) {
	case 1:
		echo "la variable es igual a 1";
		break;
	case 2:
		echo "la variable es igual a 2";
		break;
	case 3:
		echo "la variable es Hola Mundo";
		break;
	
	default:
		echo "CHAO MAMI...";
		break;
}
echo "<br>";
echo "<br>";

for ($i=5; $i<=20 ; $i++){ 
	echo "Hace ".$i." veces que pase por aqui <br>";
}

echo "la operacion ha finalizado";

echo "<br>";
echo "<br>";

$matriz = array("auto","moto","camion","mundo");

foreach ($matriz as $valor) {
	echo $valor."<br>";
}

echo "<br>";
echo "<br>";

$var=0;

while ($var<=10) {
	echo $var." hola <br>";
	$var++;
}

echo "<br>";
echo "<br>";

$var=0;

do{
	echo "Hola";
	echo "<br>";
	$var++;
}while ($var<=3);
echo "ya he finalizado";

echo "<br>";
echo "<br>";

$dato="Mario";
echo "soy una 'cadena' ".$dato."<br>";
echo 'soy una "cadena"';
echo "<br>";
echo "soy una \"cadena\" y estoy obligada";

echo "<br>";
echo "<br>";

echo 3+3;
echo "<br>";
echo 3-2;
echo "<br>";
echo 4*2;
echo "<br>";
echo 20/5;
echo "<br>";
echo 20%6;
echo "<br>";

$primera = 3;
echo "1) ".--$primera;
echo "<br>";
$primera=$primera+1;
echo "2) ".$primera;
echo "<br>";
echo "3) ".$primera++;

echo "<br>";
echo "<br>";

$mi="mi nombre es ";
$nombre="Mario Bugueno ";
$saludos="yo te saludo";

echo $mi.$nombre."y ahora".$saludos;

echo "<br>";
echo "<br>";

$uno=1;
$dos=2;

echo($uno==1 && $dos==2);
echo "<br>";

$tres=3;
$cuatro=4;

echo ($tres==3 || $cuatro==5);
echo "<br>";
$cinco=5;
$seis=6;

echo ($cinco!==$seis);

?>