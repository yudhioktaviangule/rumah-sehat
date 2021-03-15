<?php include_once('../_header.php'); ?>

    <div class="box">
        <h1>Pasien</h1>
        <h4>
            <small>Data Pasien</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Pasien</a>
            </div>
        </h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="pasien">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>No Rekam Medis</th>
                        <th>Nama Pasien</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>JK</th>
                        <th>Alamat</th>
                        <th>No. Kepesertaan</th>
                        <th>No. Sep</th>
                        
                        <th>Jenis Pasien</th>
                        
                        <td><i class="glyphicon glyphicon-cog"></i></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = "SELECT * FROM tb_pasien";
                    $sql_pasien = mysqli_query($con, $query) or die (mysqli_error($con));
                    while ($data = mysqli_fetch_array($sql_pasien)) { ?>
                        <tr>
                            <td><?=$no++?>.</td>
                            <td><?=$data['no_rekam']?></td>
                            <td><?=$data['nama_pasien']?></td>
                            <td><?=$data['tempat_lahir']?></td>
                            <td><?=tgl_indo($data['tgl_lahir'])?></td>
                            <td><?=$data['jenis_kelamin']?></td>
                            <td><?=$data['alamat']?></td>
                            <td><?=$data['no_kepesertaan']?></td>
                            <td><?=$data['no_sep']?></td>
                            
                            <td><?=$data['jenis_pasien']?></td>
                            
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
                        "searchable": false,
                        "orderable": false,
                        "targets": 12
                    }
                ]
            });
        });
        </script>
    </div>
<?php include_once('../_footer.php'); ?>