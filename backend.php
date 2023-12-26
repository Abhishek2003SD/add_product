<?php
session_start();
include('conection.php');
echo $uid = $_SESSION['orderno'];


echo $pid = $_GET['productid'];
echo $price = $_GET['productPrice'];
echo $orderid = $_GET['oderid'];
echo $qty = $_GET['qty'];

$query = "SELECT * from ordertabel where orderid=$uid and pid=$pid";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0){
    $query = "UPDATE ordertabel set qty='$qty' where orderid=$uid and pid=$pid";
    mysqli_query($conn, $query);
    header("location:home.php?no=$uid");

}else{

    $sql = "INSERT into ordertabel(orderid,pid,price,qty)values('$orderid','$pid','$price','$qty')";
    mysqli_query($conn, $sql);
    header("location:home.php?no=$uid");

}





?>