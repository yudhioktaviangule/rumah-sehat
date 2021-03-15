<?php include_once('../_header.php'); ?>

    <div class="box">
        <div class="col-md-12">
            <h1>Rekam Medis</h1>
            <h4>
                <small>Data Rekam Medis</small>
                <div class="pull-right">
                    <a href="" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-refresh"></i></a>
                    <a href="rekam_add.php" class="btn btn-primary btn-sm">
                        <i class="glyphicon glyphicon-plus"></i> Data Pemeriksaan
                    </a>
                    <a href="mordibilitas.php" class="btn btn-success btn-sm">
                        <i class="glyphicon glyphicon-print"></i> Rekap Morbiditas
                    </a>
                    
                </div>
            </h4>
            <br>
        </div>
        <div class="col-md-12">
            <div class="table-responsive">
                
                <table class="table table-striped table-bordered table-hover" id="pasien">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>No Rekam Medis</th>
                            <th>Nama Pasien</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Poliklinik</th>
                            <th>Diagnosa</th>
                            <th>Dokter</th>
                            <th>tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = "SELECT 
                                        PRKS.tindakan,
                                        PRKS.tanggal,
                                        PSN.no_rekam,
                                        PSN.nama_pasien,
                                        PSN.tempat_lahir,
                                        PSN.tgl_lahir,
                                        PSN.jenis_kelamin,
                                        PSN.alamat,
                                        DKT.nama_dokter,
                                        DKT.spesialis,
                                        DGS.icd,
                                        DGS.diagnosa,
                                        POLI.nama_poli
                                FROM tb_periksa AS PRKS
                                INNER JOIN tb_pasien AS PSN ON PRKS.id_pasien = PSN.id_pasien
                                INNER JOIN tb_dokter AS DKT ON PRKS.id_dokter = DKT.id_dokter
                                INNER JOIN tb_poliklinik AS POLI ON PRKS.id_poli = POLI.id_poli
                                INNER JOIN tb_diagnosa AS DGS ON PRKS.id_diagnosa = DGS.id_diagnosa

                        ";
                        $sql_pasien = mysqli_query($con, $query) or die (mysqli_error($con));
                        while ($data = mysqli_fetch_array($sql_pasien)) { ?>
                            <tr>
                                <td><?=$no++?>.</td>
                                <td><?=$data['no_rekam']?></td>
                                <td><?=$data['nama_pasien']?></td>
                                <td><?=$data['tempat_lahir']?></td>
                                <td><?=tgl_indo($data['tgl_lahir'])?></td>
                                <td><?=$data['nama_poli']?></td>
                                <td><?=$data['diagnosa']?></td>
                                <td><?=$data['nama_dokter']?></td>
                                <td><?=$data['tindakan']?></td>
                            </tr>
                        <?php    
                        } ?>
                    </tbody>
                </table>
            </div> 
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