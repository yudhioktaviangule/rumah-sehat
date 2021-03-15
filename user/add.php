<?php 
    include_once('../_header.php'); 
    if($auth->level=='admin'):
    else: ?>
        <script>
            alert("Akses tidak diizinkan")
            window.location.href=`<?=base_url('')?>`;
        </script>
    <?php endif; ?>

    <div class="box">
    <h1>User</h1>
        <h4>
            <small>Tambah Data User</small>
            <div class="pull-right">
                <a href="<?=base_url().'/user';?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="<?=base_url('user')?>/proses.php" method="post">
                    <div class='form-group'>
                        <label for='nama_user'>Nama</label>
                        <input required type='text' class='form-control' id='nama_user' name='nama_user'>
                    </div>
                    <div class='form-group'>
                        <label for='username'>Username</label>
                        <input required autocomplete="off" type='text' class='form-control' id='username' name='username'>
                    </div>
                    <div class='form-group'>
                        <label for='ruangan'>Ruangan</label>
                        <input required autocomplete='off' type='bunver' class='form-control' id='ruangan' name='ruangan'>
                    </div>
                    <div class='form-group'>
                        <label for='password'>Password</label>
                        <input required autocomplete='off' type='text' class='form-control' id='password' name='password'>
                    </div>
                    <div class='form-group'>
                        <label for='level'>Hak Akses</label>
                        <select required class='form-control' name='level' id='level'>
                            <option value="admin">Administrator</option>
                            <option value="dokter">Dokter</option>
                            <option value="fo">FO</option>
                            <option value="pelaporan">Pelaporan</option>
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