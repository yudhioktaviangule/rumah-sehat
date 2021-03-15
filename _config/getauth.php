<?php 


$query ='SELECT * from tb_user where id_user=?';
$statement = mysqli_prepare($con,$query);

mysqli_stmt_bind_param($statement,'s',$auth->id_user);
mysqli_stmt_execute($statement);
$result = mysqli_stmt_get_result($statement);
$getData = mysqli_fetch_assoc($result);
$auth = json_decode(json_encode($getData));
