<?php
$refranes=obtenerrefranes();
		
foreach($refranes as $refran){	
	$oracionProverbial=$refran->{'oracionProverbial'};
	echo $oracionProverbial;
	echo "<br>";
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