<?php
function conectarBase ($host,$usuario,$clave,$base){
	$conn = new mysqli($host,$usuario,$clave,$base);

	if ($conn->connect_error) {
	    echo "Fallo al Conectar a Mysql";
	    return false;
	} 
}
?>
