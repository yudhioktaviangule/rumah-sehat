<?php 
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $total = $_POST['total'];
    for ($i=1; $i<=$total; $i++) { 
        $uuid = Uuid::uuid4()->toString();
        $nama = trim(mysqli_real_escape_string($con, $_POST['nama-'.$i]));    
        $sql = mysqli_query($con, "INSERT INTO tb_poliklinik (id_poli, nama_poli) VALUES ('$uuid', '$nama')") or die (mysqli_error($con));
    }
    if($sql) {
        echo "<script>alert('".$total." data berhasil ditambahkan'); window.location='data.php';</script>";
    } else {
        echo "<script>alert('Gagal tambah data, coba lagi'); window.location='generate.php';</script>";
    }

} else if(isset($_POST['edit'])) {
    for ($i=0; $i<count($_POST['id']); $i++) { 
        $id = $_POST['id'][$i];
        $nama = $_POST['nama'][$i];
        mysqli_query($con, "UPDATE tb_poliklinik SET nama_poli = '$nama' WHERE id_poli = '$id'") or die (mysqli_error($con));
    }
    echo "<script>alert('data berhasil ditambahkan'); window.location='data.php';</script>";
}
?>