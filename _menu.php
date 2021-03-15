<li><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
<?php if($auth->level==='admin'):?>
    <li><a href="<?=base_url('user')?>">Manajemen User</a></li>
    <li><a href="<?=base_url('dokter/data.php')?>">Data Dokter</a></li>
    <li><a href="<?=base_url('poliklinik/data.php')?>">Data Poliklinik</a></li>
<?php endif; ?>
<?php if($auth->level==='admin'||$auth->level=='fo'):?>
    <li><a href="<?= base_url('kunjungan');?>">Data Kunjungan</a></li>
<?php endif;?>
<?php if($auth->level==='admin'||$auth->level=='fo'):?>
    <li><a href="<?=base_url('pasien/data.php')?>">Data Pasien</a></li>
<?php endif; ?>
<?php if($auth->level==='admin'||$auth->level=='dokter'):?>
    <li><a href="<?=base_url('diagnosa/data.php')?>">Data Diagnosa</a></li>
    <li><a href="<?=base_url('rekam/data.php')?>">Rekam Medis</a></li>
<?php endif;?>
<li><a href="<?=base_url('auth/logout.php')?>"><span class="text-danger">Logout</span></a></li>