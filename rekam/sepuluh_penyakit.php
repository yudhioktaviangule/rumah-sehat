<?php include_once('../_header.php'); ?>
<?php include_once('mordib_script.php'); ?>

    <div class="box row">
        <div class="col-md-12"><h1>Lap. 10 Besar Penyakit</h1></div>
        <h4>
            <div class="col-md-12">
                <small>Lap. Data 10 Besar Penyakit</small>
            </div>
       
        </h4>
        
        <div class="col-md-12 table-responsive" id='morbid-data'>
            <h4>LAPORAN 10 BESAR PENYAKIT RAWAT JALAN</h4>
            <table style='width:100%' class="table table-striped table-bordered table-hover" id="pasien" border="1" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th rowspan='2'>No.</th>
                        <th rowspan='2'>ICD</th>
                        <th rowspan='2'>Nama Penyakit</th>
                        <th colspan='2'>Kasus Baru</th>
                        <th rowspan='2'>Jumlah Kasus Baru</th>
                        <th rowspan='2'>Jumlah Kunjungan</th>
                    </tr>
                    <tr>
                        <th>Laki-Laki</th>
                        <th>Perempuan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1; 
                        foreach($data as $key => $value):?>
                            <tr>
                                <td><?=$no++?>.</td>
                                <td><?=$value['icd']?></td>
                                <td><?=$value['diagnosa']?></td>
                                <td><?=$value['in_j']?></td>
                                <td><?=$value['in_k']?></td>
                                <td><?=$value['in_j']+$value['in_k']?></td>
                                <td><?=$value['jmk']?></td>
                            </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div> 
        <div class="col-md-12">
            <div class="pull-right">
                <a href="#" onclick="cetak()" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-print"></i>CETAK</a>
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
            wd.document.title="LAPORAN-10-BESAR-PENYAKIT-<?=md5(date('dmY'))?>";
            wd.print();
        }
    });
</script>