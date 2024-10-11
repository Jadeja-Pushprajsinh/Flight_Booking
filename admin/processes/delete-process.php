<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tms";

$con = mysqli_connect($servername, $username, $password, $dbname);

$id = $_GET['id'];

$sql="delete  from packages where id=$id";
$data=mysqli_query($con,$sql);

header("Location:../managepackage.php");


?>