<?php 
require "../../path.php";
require "../../_assets/libs/vendor/autoload.php";
require $pathApp."/_config/con_mysqli_class.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
$save = false;
if(isset($_POST['add'])):
    $kepesertaan =  autoGenerate($con,'tb_pasien','no_kepesertaan',date("dmY")."-");
    $rekam = autoGenerate($con,'tb_pasien','no_rekam','PK'.date('Ym'));
    $uuid = Uuid::uuid4()->toString();
    $pasien =  $_POST['pasien'];
    $tempat =  $_POST['tempat'];
    $tgl =  $_POST['tgl'];
    $jk =  $_POST['jk'];
    $alamat =  $_POST['alamat'];
    $sep =  $_POST['sep'];
    $jenis =  $_POST['jenis'];
    $sql = "INSERT INTO tb_pasien (
        id_pasien, 
        no_rekam, 
        nama_pasien, 
        tempat_lahir, 
        tgl_lahir, 
        jenis_kelamin, 
        alamat, 
        no_kepesertaan, 
        no_sep, 
        jenis_pasien
    ) VALUES (?,?,?,?,?,?,?,?,?,?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('ssssssssss',$uuid, $rekam, $pasien, $tempat, $tgl, $jk, $alamat, $kepesertaan, $sep,$jenis);
    $stmt->execute();
    $save=true;
endif;
redirect(base_url('pasien/poli.php?pasien='.$uuid));