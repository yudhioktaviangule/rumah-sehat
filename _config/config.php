<?php
date_default_timezone_set('Asia/Jakarta');
session_start();
include_once "_function.php";
include_once "conn.php";


$con = mysqli_connect($con['host'], $con['user'], $con['pass'], $con['db']);
if(mysqli_connect_errno()) {
    echo mysqli_connect_error();
}

?>