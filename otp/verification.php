<?php
session_start();
$token = $_GET['token'];
$conn = mysqli_connect("localhost","bhumit070","Bhum!t070","verification");
$sql = mysqli_query($conn,"select * from tbl_user");

while($row = mysqli_fetch_assoc($sql)){
    if(password_verify($row['email'],$token)){
        $email = $row['email'];
        $flag=1;
        break;
    }
}

if($flag=1){
    echo "You are a now verified user of beeforum : ".$email;
    $sql = mysqli_query($conn , "update tbl_user set isverfied=1 where email = '$email' ") or die(mysqli_error($conn));
} else {
    echo "You are still unverified";
}