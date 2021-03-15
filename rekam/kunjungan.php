<?php include_once('../_header.php'); ?>
<?php include_once('script_kunjungan.php'); ?>

    <div class="box row">
        <div class="col-md-12"><h1>Daftar Kunjungan</h1></div>
     
        
        <div class="col-md-12 table-responsive" id='morbid-data'>
            <h4>Laporan Kunjungan</h4>
            <table>
                <tr>
                    <td style='width:5em'>Bulan</td><td>: <?=$bulan?></td>
                </tr>
                <tr>
                    <td style='width:5em'>Tahun</td><td>: <?=$tahun?></td>
                </tr>
            </table>
            <table style='width:100%' class="table table-striped table-bordered table-hover" id="pasien" border="1" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Jenis Kegiatan</th>
                        <th>Jumlah Kunjungan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1; 
                        foreach($data as $key => $value):
                    ?>
                            <tr>
                                <td><?=$no++?>.</td>
                                <td><?=$value['nama_poli']?></td>
                                <td style='width:10em'>
                                   <div style="text-align:center"><?=$value['jumlah']?></div> 
                                </td>
                            </tr>
                    <?php 
                        endforeach;    
                    ?>
                </tbody>
            </table>
        </div> 
        <div class="col-md-12">
            <div class="pull-right">
                <a href="#" onclick="cetak()" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-print"></i> CETAK</a>
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
            wd.document.title="LAPORAN-KUNJUNGAN-<?=md5(date('dmYHis'))?>";
            wd.print();
        }
    });
</script>