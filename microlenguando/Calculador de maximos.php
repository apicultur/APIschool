<!DOCTYPE html>
<html>
<head>
<title>Calculador de máximos</title>
<style type="text/css">
h1{
  font-family: Arial, sans-serif;
  font-size: 38px;
  text-align: center;
  color:   #335CAD;
}


</style>
</head>
<body>
<h1>Calculador de máximos</h1>

<?php
$x=7;
$y=10;  
$valormax=maximo($x, $y);
echo $valormax; 

function maximo($x,$y){
	if($x>$y){
		return $x;
	} 
	if($x<$y){
		return $y;
	}
	if($x=$y){
		return "Empate"; 
	}
}

?>
</body>
</html>
