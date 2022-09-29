<?php
$dblocal="localhost:3307";
$dbuser="vtca";
$dbpass="vtcacademy";
$dbname="tien_vu_asm";
$con=mysqli_connect($dblocal,$dbuser,$dbpass,$dbname);
//$conn=mysqli_connect('localhost', 'root', '', 'mydbphp');
if($con){
    mysqli_query($con,"SET NAMES 'UTF8'");
    if(!isset($_SESSION)) { 
        session_start(); 
      } 
}else{
    echo "Kết nối thất bại!".mysqli_connect_error();
}

?>