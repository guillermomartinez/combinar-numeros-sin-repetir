<?php
function format_period($resta)
{	
	$horas = (int)($resta/60/60);
	$minutos = (int)($resta/60)-$horas*60;
	$segundos = (int)$resta-$horas*60*60-$minutos*60;
	$milisegundos = $resta - (int)$resta;
	$milisegundos = substr($milisegundos,strpos($milisegundos,".")+1,5);		
	return str_pad($horas,2,"0",STR_PAD_LEFT).':'.str_pad($minutos,2,"0",STR_PAD_LEFT).':'.str_pad($segundos,2,"0",STR_PAD_LEFT).' '.$milisegundos;  
}
$n1 = 123456789;
//$n1 = 987653142;
$count=0;
$tiempo_ini = microtime(true);
$r = true;
$result = '';
while ($r) {
	if($n1>999999999){
		$r = false;
		continue;
	}
	$buscar = (string)$n1;	
	if( substr_count($buscar,"1")==0 || substr_count($buscar,"2")==0 || substr_count($buscar,"3")==0 || substr_count($buscar,"4")==0 || substr_count($buscar,"5")==0 || substr_count($buscar,"6")==0 || substr_count($buscar,"7")==0 || substr_count($buscar,"8")==0 || substr_count($buscar,"9")==0 ){		
		$n1++;
		continue;
	}		
	//
	$numeros = preg_split('//', (string)$n1, -1, PREG_SPLIT_NO_EMPTY);
		$p=0;
		$a = $numeros[$p];
		$b = $numeros[$p+1];
		$c = $numeros[$p+2];
		$d = $numeros[$p+3];
		$e = $numeros[$p+4];
		$f = $numeros[$p+5];
		$g = $numeros[$p+6];
		$h = $numeros[$p+7];
		$i = $numeros[$p+8];			
		$total = 2 * $c + 2 * $e + 2*$g + $a + $b + $d + $f + $h + $i;		
		if($total==52 && $a+$b+$c==13 && $c+$d+$e==13 && $e+$f+$g==13 && $g+$h+$i==13){
			$result1 = "--Begin encontrado--\n";
			$result1 .= "A=$a, B=$b, C=$c, D=$d, E=$e, F=$f, G=$g, H=$h, I=$i\n";
			$result1 .= '2 * $c + 2 * $e + 2 * $g + $a + $b + $d + $f + $h + $i'."\n";
			$result1 .= "2 * $c + 2 * $e + 2 * $g + $a + $b + $d + $f + $h + $i"."\n";
			$result1 .= "--End encontrado--\n";			
			$result .= $result1;
			echo $result1;
			//$r =false;
		}
	//
	$n1++;
	//$count++; if($count==10000) $r =false;
	if($n1>999999999) $r = false;
	$resta = (microtime(true) - $tiempo_ini);
	echo ($n1 - 1).' - total:'.$total.' - '.format_period($resta),"\n";
}
echo $result;