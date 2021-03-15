<?php include_once('../_header.php'); ?>
<?php include_once('mordib_script.php'); ?>

    <div class="box row">
        <div class="col-md-12"><h1>Morbiditas</h1></div>
        <h4>
            <div class="col-md-12">
                <small>Filter Data Morbiditas</small>
            </div>
            <div class="col-md-6">
                <form action="" method="POST">
                    <div class="input-group">
                        <input type="date" class="form-control" name="filter">
                        <div class="input-group-btn">
                            <button class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </h4>
        
        <div class="col-md-12 table-responsive" id='morbid-data'>
            <h4>Data Keadaan Morbiditas Pasien Rawat Jalan</h4>
            <table style='width:100%' class="table table-striped table-bordered table-hover" id="pasien" border="1" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th rowspan='2'>No.</th>
                        <th rowspan='2'>ICD</th>
                        <th rowspan='2'>Gol. Sebab Penyakit</th>
                        <th colspan='9'>Jumlah Kasus</th>
                        <th colspan='2'>Kasus</th>
                        <th rowspan='2'>Jumlah Kunjungan</th>
                    </tr>
                    <tr>
                        
                        
                        <th>1-6hr</th>
                        <th>7-28hr</th>
                        <th>28hr < 1th</th>
                        <th>1th-4th</th>
                        <th>5th-14th</th>
                        <th>15th-24th</th>
                        <th>25th-44th</th>
                        <th>45th-64th</th>
                        <th>>65th</th>
                        <th>L</th>
                        <th>P</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1; 
                        foreach($data as $key => $value):
                    ?>
                            <tr>
                                <td><?=$no++?>.</td>
                                <td><?=$value['icd']?></td>
                                <td><?=$value['diagnosa']?></td>
                                <td><?=$value['in_a']?></td>
                                <td><?=$value['in_b']?></td>
                                <td><?=$value['in_c']?></td>
                                <td><?=$value['in_d']?></td>
                                <td><?=$value['in_e']?></td>
                                <td><?=$value['in_f']?></td>
                                <td><?=$value['in_g']?></td>
                                <td><?=$value['in_h']?></td>
                                <td><?=$value['in_i']?></td>
                                <td><?=$value['in_j']?></td>
                                <td><?=$value['in_k']?></td>
                                <td><?=$value['jmk']?></td>
                            </tr>
                    <?php 
                        endforeach;    
                    ?>
                </tbody>
            </table>
        </div> 
        <div class="col-md-12">
            <div class="pull-right">
                <a href="#" onclick="cetak()" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-print"></i> Morbiditas</a>
                <a href="sepuluh_penyakit.php<?=$isFiltered ? "?filter=".$query_date:'' ?>"  class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-print"></i> Lap. 10 Besar Penyakit</a>
                <a href="kunjungan.php<?=$isFiltered ? "?filter=".$query_date:'' ?>"  class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-print"></i> Kunjungan</a>
            </div>
        </div>
    </div>
<?php include_once('../_footer.php'); ?>
<script>
    $(document).ready(()=>{
        window.cetak=()=>{
            let content = $("#morbid-data").html();
            let wd = window.open("about:blank", "newWin", "width="+screen.availWidth+",height="+screen.availHeight)
            wd.document.write(`<h3>RUMAH SAKIT BELUM TAU APA NAMANYA</h3>${content}`);
            wd.document.title="LAPORAN-MORBIDITAS-<?=md5(date('dmY'))?>";
            wd.print();
        }
    });
</script>