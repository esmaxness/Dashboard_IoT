<?php
// Incluimos los datos de conexión y las funciones:
include("datos.php");
include("funciones.php");

// Usamos esas variables:

$conn = new mysqli($host, $usuario, $clave, $base);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
 

	// Aquí irá el resto
	//Validamos que hayan llegado estas variables, y que no esten vacias:
	if (isset($_POST["fecha"], $_POST["peso"], $_POST["musculo"], $_POST["porcentajeGrasa"]) and $_POST["porcentajeGrasa"] !="" and $_POST["fecha"]!="" and $_POST["musculo"]!="" and $_POST["peso"]!="" ){

	//traspasamos a variables locales, para evitar complicaciones con las comillas:
	$fecha = $_POST["fecha"];
	$peso = $_POST["peso"];
	$musculo = $_POST["musculo"];
	$porcentajeGrasa = $_POST["porcentajeGrasa"];

	//Preparamos la orden SQL
	$consulta = "INSERT INTO peso (id,fecha,peso,musculo,porcentajeGrasa) VALUES ('0','$fecha','$peso','$musculo','$porcentajeGrasa')";

	//Aqui ejecutaremos esa orden
		if ($conn->query($consulta) === TRUE){
			echo "<p>Registro agregado.</p>";
		} else {
			echo "<p>No se agregó... Error:".$sql."<br>".$conn->error;
		}

	} else {

		echo '<p>Por favor, complete el <a href="formulario.html">formulario</a></p>';
	}
}
?>
