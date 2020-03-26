<?php
session_start();

$user_id = $_SESSION['user_id'];

include("datos.php");

// Create connection
$conn = new mysqli($host, $usuario, $clave, $base);

$sql = "select MONTH(fecha) as Month, YEAR(fecha) as Year, AVG(peso) as Peso, AVG(musculo) as Musculo, AVG(peso*porcentajeGrasa/100) as grasa, user_id as user_id 
FROM peso
WHERE user_id = '$user_id'
GROUP BY user_id,Month, Year
ORDER BY Year, Month;
";

//$sqlll = "SELECT Week, Peso, Musculo, grasa FROM Weekly WHERE user_id='$user_id' AND Year = '2019' AND Week > '10' ORDER BY Week ASC";

if (mysqli_query($conn, $sql)){
    }else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$result = mysqli_query($conn, $sql);

$data_mensual=array();

foreach ($result as $row) {
	$data_mensual[] = $row;
}

print json_encode($data_mensual);

?>