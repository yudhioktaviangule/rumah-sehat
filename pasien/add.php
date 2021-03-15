<?php include_once('../_header.php'); ?>

    <div class="box">
    <h1>Pasien</h1>
        <h4>
            <small>Tambah Data Pasien</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="proses.php" method="post">
                    
                    <div class="form-group">
                       <label for="pasien">Nama Pasien</label>
                       <input type="text" name="pasien" id="pasien" class="form-control" required autofocus> 
                    </div>
                    <div class="form-group">
                       <label for="tempat">Tempat Lahir</label>
                       <input type="text" name="tempat" id="tempat" class="form-control" required autofocus> 
                    </div>
                    <div class="form-group">
                       <label for="tgl">Tanggal Lahir</label>
                       <input type="date" name="tgl" id="tgl" class="form-control" required autofocus> 
                    </div>
                    <div class="form-group">
                       <label for="jk">Jenis Kelamin</label>
                       <div>
                           <label class="radio-inline">
                               <input type="radio" name="jk" id="jk" value="Laki-Laki" required> Laki-laki
                           </label>
                           <label class="radio-inline">
                               <input type="radio" name="jk" value="Perempuan"> Perempuan
                           </label>
                       </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                    </div>
                    
                    <div class="form-group">
                       <label for="sep">No. Sep</label>
                       <input type="text" name="sep" id="sep" class="form-control" required autofocus> 
                    </div>
                    
                    <div class="form-group">
                       <label for="jk">Jenis Pasien</label>
                       <div>
                           <label class="radio-inline">
                               <input type="radio" name="jenis" id="jenis" value="bpjs" required> bpjs
                           </label>
                           <label class="radio-inline">
                               <input type="radio" name="jenis" value="non bpjs"> Non bpjs
                           </label>
                       </div>
                    </div>
                    
                    <div class="form-group pull-right">
                        <input type="submit" name="add" value="simpan" class="btn btn-success">
                        <input type="reset" name="reset" value="Reset" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include_once('../_footer.php'); ?>