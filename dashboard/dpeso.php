<?php
session_start();

function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}

$user_id = $_SESSION['user_id'];

include("datos.php");

// Create connection
$conn = new mysqli($host, $usuario, $clave, $base);

$sqlll = "SELECT Week, Peso, Musculo, grasa FROM Weekly WHERE user_id='$user_id' AND Year = '2019' AND Week > '10' ORDER BY Week ASC";

if (mysqli_query($conn, $sqlll)){
    }else{
    echo "Error: " . $sqlll . "<br>" . mysqli_error($conn);
}

$result = mysqli_query($conn, $sqlll);

$data=array();

foreach ($result as $row) {
	$data[] = $row;
}

print json_encode($data);

?>