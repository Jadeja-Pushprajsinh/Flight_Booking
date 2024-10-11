<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tms";

$con = mysqli_connect($servername, $username, $password, $dbname);


$id = $_GET['id'];
$packagename = $_POST['packagename'];
$packagelocation = $_POST['packagelocation'];
$packageprice = $_POST['packageprice'];
$packagedetails = $_POST['packagedetails'];
$day = $_POST['day'];
$night = $_POST['night'];

$filename = $_FILES['packageimage']['name'];
$filepath = $_FILES["packageimage"]['tmp_name'];
$packageimageold= $_POST['packageimageold'];

if($filename != '')
{
    $update_filename = $_FILES['packageimage']['name'];
    move_uploaded_file($filepath,'../upload/' . $filename);

    $sql = "UPDATE packages SET  
    packagename='$packagename',
    packagelocation='$packagelocation',
    packageprice='$packageprice',
    packagedetails='$packagedetails',
    `day` ='$day',
    night='$night',
    packageimage='$update_filename'
    WHERE id = $id";

    mysqli_query($con,$sql);
    unlink("../upload/".$packageimageold);
}
else
{
    $sql = "UPDATE packages SET  
    packagename='$packagename',
    packagelocation='$packagelocation',
    packageprice='$packageprice',
    packagedetails='$packagedetails',
    `day` ='$day',
    night='$night'
    WHERE id = $id";

    $data=mysqli_query($con,$sql);
}

if( $_FILES['packageimage']['name'] !='')
{
   // $destfile = '../upload/' . $filename;
    move_uploaded_file($filepath, $destfile);
    unlink("../upload/".$packageimageold);
}

header("Location:../managepackage.php");


?>