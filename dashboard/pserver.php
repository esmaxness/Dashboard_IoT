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


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    if (isset($_POST['reg_p'])) {

// receive all input values from the form
    $pfecha = mysqli_real_escape_string($conn,$_POST['pfecha']);
    $ppeso = mysqli_real_escape_string($conn,$_POST['ppeso']);
    $pmusculo = mysqli_real_escape_string($conn,$_POST['pmusculo']);
    $pgrasa = mysqli_real_escape_string($conn,$_POST['pgrasa']);


    $sql = "INSERT INTO peso (peso_id,fecha,peso,musculo,porcentajeGrasa, user_id)
    VALUES ('0','$pfecha', '$ppeso', '$pmusculo','$pgrasa','$user_id')";
    
    
    if ($conn->query($sql) === TRUE) {
        echo "alert('New record created successfully')";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
}
$conn->close();

?>
