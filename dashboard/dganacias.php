<?php
session_start();

$user_id = $_SESSION['user_id'];

include("datos.php");

// Create connection
$conn = new mysqli($host, $usuario, $clave, $base);

$sql = "SELECT t1.Week, t1.Year, t1.peso - COALESCE(t2.peso, t1.peso) AS GananciaPeso, t1.musculo - COALESCE(t2.musculo,t1.musculo) AS GananciaMusculo, t1.grasa - COALESCE(t2.grasa, t1.grasa) AS GananciaGrasa, t1.user_id  FROM Weekly t1 LEFT JOIN Weekly t2 ON t1.Week = t2.Week + 1 WHERE t1.user_id='$user_id' AND t2.user_id='$user_id' AND t1.YEAR='2019' ORDER BY t1.Year, t1.Week";

//$sqlll = "SELECT Week, Peso, Musculo, grasa FROM Weekly WHERE user_id='$user_id' AND Year = '2019' AND Week > '10' ORDER BY Week ASC";

if (mysqli_query($conn, $sql)){
    }else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$result = mysqli_query($conn, $sql);

$data=array();

foreach ($result as $row) {
	$data[] = $row;
}

print json_encode($data);

?>