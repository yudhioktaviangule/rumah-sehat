<?php 

header("content-type:Application/json");
require_once "../_config/config.php";
$queryString = $_REQUEST;
if(isset($queryString['no'])):
    $par = $queryString['no'];
    $sql = "SELECT * FROM tb_pasien WHERE no_rekam='$par'";
    $qu  = mysqli_query($con,$sql);
    $data = mysqli_fetch_array($qu);
    if($data!=NULL):
        echo json_encode($data);
    else:
        echo json_encode(['error'=>404]);
    endif;
endif;