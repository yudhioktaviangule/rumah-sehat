<?php 
    include_once('../_header.php'); 
    if($auth->level!=='admin'||$auth->level!=='fo'):
    else: ?>
        <script>
            alert("Akses tidak diizinkan")
            window.location.href=`<?=base_url('')?>`;
        </script>
<?php endif; ?>

<div class="row">
<div class="box">
        <h1>Kunjungan</h1>
        <h4>
            <small>Data Kunjungan Pasien</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="<?=base_url('kunjungan')?>/pasien/add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Register Kunjungan Pasien Baru</a>
                <a href="<?=base_url('kunjungan')?>/add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Register Kunjungan Pasien Terdaftar</a>
            </div>
        </h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="pasien">
                <thead>
                    <tr>
                        <th>No. Kunjungan</th>
                        <th>Tanggal</th>
                        <th>Nama Pasien</th>
                        <th>Poli</th>
                        <th>Admin FO</th>
                        <td><i class="glyphicon glyphicon-cog"></i></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = "
                                SELECT  A.tanggal,
                                        A.nomor,
                                        C.nama_poli AS poli, 
                                        B.nama_pasien AS pasien, 
                                        U.nama_user AS user 
                                FROM tb_kunjungan AS A
                                INNER JOIN tb_pasien AS B ON A.id_pasien=B.id_pasien
                                INNER JOIN tb_poliklinik AS C ON A.id_poli=C.id_poli   
                                INNER JOIN tb_user AS U ON A.id_user=U.id_user 
                            ";
                    $sql_pasien = mysqli_query($con, $query) or die (mysqli_error($con));
                    while ($data = mysqli_fetch_assoc($sql_pasien)) { 
                        $p = json_decode(json_encode($data));
                        ?>
                        <tr>
                            <td><?=$p->nomor?>.</td>
                            <td><?=$p->tanggal?>.</td>
                            <td><?=$p->pasien?></td>
                            <td><?=$p->poli?></td>
                            <td><?=$p->user?></td>
                            <td>
                                <a href="del.php?id=<?=$data['id_pasien']?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Menghapus Data?')"><i class="glyphicon glyphicon-trash"></i></a>
                            </td>
                        </tr>
                    <?php    
                    } ?>
                </tbody>
            </table>
        </div> 
        <script>
        $(document).ready(function() {
            $('#pasien').DataTable({
                columnDefs: [
                    {
                        "searchable": true,
                        "orderable": true,
                        "targets": 0
                    },
                    
                    {
                        "searchable": false,
                        "orderable": false,
                        "targets": [1,2,3,4]
                    },

                ]
            });
        });
        </script>
    </div>
<?php include_once('../_footer.php'); ?>