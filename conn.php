<?php
$host="localhost";
$user="root";
$pass="";
$dbname="studytracker";

if ((mysqli_connect($host,$user,$pass,$dbname))) {
    $conn = mysqli_connect($host,$user,$pass,$dbname);
}else {
  echo "DATABASE CONNECTION ERROR";
}
date_default_timezone_set("Asia/Dhaka");
 ?>
