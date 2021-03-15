<?php 
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $kode = trim(mysqli_real_escape_string($con, $_POST['kode']));
    $diagnosa = trim(mysqli_real_escape_string($con, $_POST['diagnosa']));
    mysqli_query($con, "INSERT INTO tb_diagnosa (id_diagnosa, icd, diagnosa) VALUES ('$uuid', '$kode','$diagnosa')") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
} else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $kode = trim(mysqli_real_escape_string($con, $_POST['kode']));
    $diagnosa = trim(mysqli_real_escape_string($con, $_POST['diagnosa']));
    mysqli_query($con, "UPDATE tb_diagnosa SET icd = '$kode', diagnosa = '$diagnosa' WHERE id_diagnosa = '$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
}
?>