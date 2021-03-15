<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    require("./_config/config.php");
    $data = file_get_contents('./rumahsakit.sql');
    mysqli_multi_query($con,$data);
    $data = file_get_contents('./mordibilitas.sql');
    mysqli_multi_query($con,$data);

    mysqli_close($con);
?>