<?php
$username="root";
$hostname="localhost";
$pass="";
$database="blood";

$con=mysqli_connect($hostname,$username,$pass,$database);

if($con){
}else{
    echo "D";
}

?>