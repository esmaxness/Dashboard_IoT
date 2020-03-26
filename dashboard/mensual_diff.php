<?php
session_start();

$user_id = $_SESSION['user_id'];

include("datos.php");

// Create connection
$conn = new mysqli($host, $usuario, $clave, $base);

$sql = "SELECT t1.Month, t1.Year, t1.peso - COALESCE(t2.peso, t1.peso) AS GananciaPeso, t1.musculo - COALESCE(t2.musculo,t1.musculo) AS GananciaMusculo, t1.grasa - COALESCE(t2.grasa, t1.grasa) AS GananciaGrasa, t1.user_id as user_id 
FROM (
	select MONTH(fecha) as Month, YEAR(fecha) as Year, AVG(peso) as peso, AVG(musculo) as musculo, AVG(peso*porcentajeGrasa/100) as grasa, user_id as user_id 
	FROM peso
	WHERE user_id = '$user_id'
	GROUP BY Year, Month
	ORDER BY Year, Month) 
	
	t1 LEFT JOIN 

	(select MONTH(fecha) as Month, YEAR(fecha) as Year, AVG(peso) as peso, AVG(musculo) as musculo, AVG(peso*porcentajeGrasa/100) as grasa, user_id as user_id 
	FROM peso
	WHERE user_id = '$user_id'
	GROUP BY Year, Month
	ORDER BY Year, Month) t2 ON t1.Month = t2.Month + 1 
ORDER BY t1.Year, t1.Month";

//$sqlll = "SELECT Week, Peso, Musculo, grasa FROM Weekly WHERE user_id='$user_id' AND Year = '2019' AND Week > '10' ORDER BY Week ASC";

if (mysqli_query($conn, $sql)){
    }else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$result = mysqli_query($conn, $sql);

$data_men=array();

foreach ($result as $row) {
	$data_men[] = $row;
}

print json_encode($data_men);

?>