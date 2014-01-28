<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<link href="http://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
<head>
<title>Generador aleatorio de refranes</title>
<style type="text/css">


h1{
  font-family: 'Oleo Script', Helvetica, sans-serif;
  font-size: 30px;
  text-align: center;
  color:   #282828 ;
}

.refran{
  font-family: 'Indie Flower', cursive;
  font-size: 38px;
  color:   #282828 ;
}
.definicion{
  font-family: 'Times New Roman', serif;
  font-size: 18px;
  color:   black;
}
.ejemplo{
  font-family: 'Times New Roman', serif;
  font-size: 18px;
  color:   black;
  font-style:italic;
}
.frecuencia{
                font-family: Consolas, monaco, monospace;
                font-size:400%;
}
 .tipo{
                font-family: Consolas, monaco, monospace;
                font-size:100%;
}
        .nivelA{
                color: Green;
        }
        .nivelB{
                color: Orange ;
        }
        .nivelC{
                color: OrangeRed ;
        }
        .nivelD{
                color: DarkRed ;
        }

</style>
</head>
<body>
<h1>El coleccionista de refranes</h1>

<?php
$refranes=obtenerrefranes();
  	
foreach($refranes as $refran){
  echo "<div style=\"width: 80%; float:left\">";

	$oracionProverbial=$refran->{'oracionProverbial'};
	echo "<span class=\"refran\">".$oracionProverbial."</span>";
	echo "<br>";
	$significado=$refran->{'significado'};
	echo "<span class=\"definicion\">".$significado."</span>";
	echo "<br>";
	$ejemplo=$refran->{'ejemplo'};
	echo "<span class=\"ejemplo\">".$ejemplo."</span>";
	echo "<br>";
    
echo "</div><div style=\"width: 20%; float:right\">";

	$dificultad=$refran->{'dificultad'};
	if($dificultad=="Nivel inicial"){
                        echo "<span class=nivelA><span class=frecuencia>A</span></span></br>";
                        echo "<span class=nivelA><span class=tipo>B&aacute;sico</span></span></br>";
                        }
                        if($dificultad=="Nivel intermedio"){
                        echo "<span class=nivelB><span class=frecuencia>B</span></span></br>";
                        echo "<span class=nivelB><span class=tipo>intermedio</span></span></br>";
                        }
                        if($dificultad=="Nivel avanzado"){
                        echo "<span class=nivelC><span class=frecuencia>C</span></span></br>";
                        echo "<span class=nivelC><span class=tipo>avanzado</span></span></br>";
                        }
                        if($dificultad=="Nativo"){
                        echo "<span class=nivelD><span class=frecuencia>D</span></span></br>";
                        echo "<span class=nivelD><span class=tipo>experto</span></span></br>";
                        }
	echo "<br>";
 echo "</div>";
}



function obtenerrefranes(){
       // Aquí copiamos nuestro Access Token de Apicultur entrecomillado	
       $access_key = "XXXXXXXXXXXXXXXXXXXX";                
                
       // Aquí ponemos la URL de la API a la que queremos llamar
       $url="https://store.apicultur.com/api/refranesaleatorios/1.0.0/";

        /* El código que viene a continuación es el que ejecuta la llamada. No necesitamos entenderlo ni preocuparnos por él*/	
        $ch = curl_init();

        curl_setopt($ch,CURLOPT_HTTPHEADER,array( 'Accept: application/json', 'Authorization: Bearer ' . $access_key ));

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                
        $respuesta = curl_exec($ch);
                
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        
        curl_close($ch);        
    
        switch ($http_status) {
    case '200':
                $obj = json_decode($respuesta);
          break;
    default:
          echo "<br/>Error when getting synonims for the word ".$word;
          echo "<br/>Error:" .$http_status ;
      break;
        }
        
        return $obj;
    }	
?>