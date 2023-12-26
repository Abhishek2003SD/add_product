<?php
include('conection.php');
$ord=$_GET['ord'];
$id=$_GET['id'];


$query = "DELETE from ordertabel where orderid='$ord' and pid='$id'";

$result = mysqli_query($conn,$query);

header("location:home.php?no=$ord");
?>