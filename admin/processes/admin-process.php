<?php
session_start();
$name = $_POST['name'];
$password = $_POST['password']; 


if($name == "admin" && $password == "admin")
{   
    $_SESSION['admin'] = 'admin';
    header("Location: ../dashboard.php");
}
else
{
    echo "<script>
        alert('Wrong name or Password');
        window.location.href='../index.php';
        </script>";
}
?>