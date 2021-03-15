<?php include_once('../_header.php'); ?>

    <div class="box">
    <h1>Rekam Medis</h1>
        <h4>
            <small>Register data Pemeriksaan Pasien</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="row" style='margin-top:15em' id='plh'>
                    <h4>Pilih Jenis Pasien</h4>
                    <button onclick="pasien.baru()" type='button' class="btn btn-block btn-primary">
                        PASIEN BARU
                    </button>
                    <a href="<?= base_url('rekam/rekam_add_form.php') ?>" class="btn btn-block btn-danger">
                        PASIEN LAMA
                    </a>
                </div>
                <form id='pasien-baru' class='' action="proses.php" method="post">
                    <div class="form-group">
                       <label for="rekam">No. Rekam Medis</label>
                       <input type="number" name="rekam" id="rekam" class="form-control" required autofocus> 
                    </div>
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
                       <label for="kepesertaan">No. Kepesrtaan</label>
                       <input type="text" name="kepesertaan" id="kepesertaan" class="form-control" required> 
                    </div>
                    <div class="form-group">
                       <label for="sep">No. Sep</label>
                       <input type="text" name="sep" id="sep" class="form-control" required autofocus> 
                    </div>
                    <div class="form-group">
                       <label for="poli">Poliklinik</label>
                       <select name="poli" id="poli" class="form-control">
                           <option value="">- Pilih -</option>
                           <?php
                            $Sql_poli = mysqli_query($con, "SELECT * FROM tb_poliklinik") or die (mysqli_error($con));
                            while($data_poli = mysqli_fetch_array($Sql_poli)) {
                                echo '<option value="'.$data_poli['id_poli'].'">'.$data_poli['nama_poli'].'</option>';
                            }
                           ?>
                       </select> 
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
                    <div class="form-group">
                       <label for="dokter">Dokter</label>
                       <select name="dokter" id="dokter" class="form-control">
                           <option value="">- Pilih -</option>
                           <?php
                            $Sql_dokter = mysqli_query($con, "SELECT * FROM tb_dokter") or die (mysqli_error($con));
                            while($data_dokter = mysqli_fetch_array($Sql_dokter)) {
                                echo '<option value="'.$data_dokter['id_dokter'].'">'.$data_dokter['nama_dokter'].'</option>';
                            }
                           ?>
                       </select> 
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


    <script>
        class RegisterPasien{
            baru(){
                $("#plh").hide(300,()=>{
                    $("#pasien-baru").show(300);
                })
            }
        }

        $(document).ready(()=>{
            $("#pasien-baru").hide();
            window.pasien = new RegisterPasien()
        });


    </script>