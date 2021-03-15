<?php
    require_once './_config/con_mysqli_class.php';
    $sql_details = array(
        'user' => 'yudhi',
        'pass' => '123',
        'db'   => 'db_rs',
        'host' => 'localhost'
    );
    $username = 'yudhi'; 
    $name     = 'Yudhi Oktavian'; 
    $password = sha1('admin'); 
    $ruangan  = '101'; 
    $id_user  = sha1(date('d-m-yHis')); 
    $table = 'tb_user';

    $SQL = "INSERT INTO tb_user(
        id_user,
        nama_user,
        ruangan,
        username,
        password
    ) VALUES(?,?,?,?,?)";
    $statement = $con->prepare($SQL);
    $statement->bind_param('sssss',
        $id_user,
        $name,
        $ruangan,
        $username,
        $password
    );
    $statement->execute();


