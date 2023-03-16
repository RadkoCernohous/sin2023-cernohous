<?php
$serverIP="127.0.0.1";
$username="root";
$dtbsPassword="";
$dtbsName="sin2023-cernohous";
$url = "http://127.0.0.1/sin2023/sin2023-cernohous/index.php"; //Změnit URL
session_start();
$data = $_POST["schovanyKontejner"];

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = mysqli_connect($serverIP, $username, $dtbsPassword, $dtbsName);
$conn->set_charset("utf8mb4");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = 'UPDATE users SET userdata = ? WHERE email= ?';   
$email =$_SESSION["logMail"];
    
    
$statement = $conn->prepare($sql);
$statement->bind_param("ss",$data,$email);
if($statement->execute()){
  //echo "data succesfully saved";
  }
mysqli_close($conn);
session_destroy();


header("Location: ".$url); 

?>