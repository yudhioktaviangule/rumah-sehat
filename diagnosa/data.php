<?php include_once('../_header.php'); ?>

    <div class="box">
        <h1>Diagnosa</h1>
        <h4>
            <small>Data kode Diagnosa</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Kode Diagnosa</a>
            </div>
        </h4>
        <div style="margin-bottom: 20px;">
            <form class="form-inline" action="" method="post">
                <div class="form-group">
                    <input type="text" name="pencarian" class="form-control" placeholder="Pencarian">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode ICD-10</th>
                        <th>Diagnosa</th>
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $batas = 5;
                    $hal = @$_GET['hal'];
                    if(empty($hal)) {
                        $posisi = 0;
                        $hal = 1;
                    } else {
                        $posisi = ($hal - 1) * $batas;
                    }
                    $no = 1;
                    if($_SERVER['REQUEST_METHOD'] == "POST") {
                        $pencarian = trim(mysqli_real_escape_string($con, $_POST['pencarian']));
                        if($pencarian != '') {
                            $sql = "SELECT * FROM tb_diagnosa WHERE icd LIKE '%$pencarian%'";
                            $query = $sql;
                            $queryjml = $sql;
                        } else {
                            $query = "SELECT * FROM tb_diagnosa LIMIT $posisi, $batas";
                            $queryjml = "SELECT * FROM tb_diagnosa";
                            $no = $posisi + 1;
                        }
                    } else {
                        $query = "SELECT * FROM tb_diagnosa LIMIT $posisi, $batas";
                        $queryjml = "SELECT * FROM tb_diagnosa";
                        $no = $posisi + 1;
                    }
                    
                    $sql_diagnosa = mysqli_query($con, $query) or die (mysqli_error($con));
                    if(mysqli_num_rows($sql_diagnosa) > 0) {
                        while($data = mysqli_fetch_array($sql_diagnosa)) { ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data['icd']?></td>
                                <td><?=$data['diagnosa']?></td>
                                <td class="text-center">
                                    <a href="edit.php?id=<?=$data['id_diagnosa']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="del.php?id=<?=$data['id_diagnosa']?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        echo "<tr><td colspan=\"4\" align=\"center\">Data tidak ditemukan</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
        if(@$_POST['pencarian'] == '' ) { ?>
            <div style="float: left;">
                <?php
                $jml = mysqli_num_rows(mysqli_query($con, $queryjml));
                echo "Jumlah Data : <b>$jml</b>";
                ?>
            </div>
            <div style="float: right;">
                <ul class="pagination pagination-sm" style="margin:0">
                    <?php
                        $jml_hal = ceil($jml / $batas);
                        for ($i=1; $i <= $jml_hal; $i++) { 
                            # code...
                            if($i != $hal) {
                                echo "<li><a href=\"?hal=$i\">$i</a></li>";
                            } else {
                                echo "<li class=\"active\"><a>$i</a></li>";
                            }
                        }
                    ?>
                </ul>
            </div>
            <?php
            
        } else { 
            echo "<div style=\"float: left;\">";
            $jml = mysqli_num_rows(mysqli_query($con, $queryjml));
            echo "Data Hasil Pencarian: <b>$jml</b>";
            echo "</div>";
        }
        ?>
    </div>

<?php include_once('../_footer.php'); ?>