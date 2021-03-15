<?php 
require_once __DIR__."/../_config/config.php";

$post = $_REQUEST;
$k = [];
$v = [];
foreach($post as $key => $value){
    if($key!='add'):
        $k[] = $key;
        $v[] = "'".mysqli_escape_string($con,$value)."'"; 
    endif;
} 

$implodeKey = implode(',',$k);
$implodeValue = implode(',',$v);
$sql = "INSERT INTO tb_periksa ($implodeKey) VALUES($implodeValue)";

$query = mysqli_query($con,$sql);

mysqli_close($con);
redirect('data.php');
