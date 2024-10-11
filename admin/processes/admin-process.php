<?php
session_start();
$email = $_POST['email'];
$password = $_POST['password']; 


if($email == "admin@gmail.com" && $password == "admin")
{   
    $_SESSION['admin'] = 'admin';
    header("Location: ../dashboard.php");
}
else
{
    echo "<script>
        alert('Wrong Email or Password');
        window.location.href='../index.php';
        </script>";
}
?>