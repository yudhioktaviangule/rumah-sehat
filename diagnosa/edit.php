<?php include_once('../_header.php'); ?>

    <div class="box">
    <h1>Diagnosa</h1>
        <h4>
            <small>Edit Data Kode Diagnosa</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <?php
                $id = @$_GET['id'];
                $sql_diagnosa = mysqli_query($con, "SELECT * FROM tb_diagnosa WHERE id_diagnosa = '$id'") or die (mysqli_error($con));
                $data = mysqli_fetch_array($sql_diagnosa);
                ?>
                <form action="proses.php" method="post">
                    <div class="form-group">
                       <label for="kode">Kode ICD-10</label>
                       <input type="hidden" name="id" value="<?=$data['id_diagnosa']?>">
                       <input type="text" name="kode" id="kode" value="<?=$data['icd']?>" class="form-control" required autofocus> 
                    </div>
                    <div class="form-group">
                        <label for="diagnosa">Diagnosa</label>
                        <textarea name="diagnosa" id="diagnosa" class="form-control" required><?=$data['diagnosa']?></textarea>
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" name="edit" value="simpan" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include_once('../_footer.php'); ?>