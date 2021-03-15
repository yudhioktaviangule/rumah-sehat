<?php
    if(isset($_REQUEST['filter'])):
        $query_date = $_REQUEST['filter'];
    else:
        $query_date=date('Y-m-d');    
    endif;
    $date       = new DateTime($query_date);
    $date->modify('first day of this month');
    $date_awal  = $date->format('Y-m-d');
    $bulan  = $date->format('F');
    $tahun  = $date->format('Y');
    $date->modify('last day of this month');
    $date_akhir = $date->format('Y-m-d');
    $isFiltered = true;
    $kond1 = $isFiltered ? "WHERE tanggal BETWEEN '$date_awal' AND '$date_akhir'" : "";
    $kond2 = $isFiltered ? "AND tanggal BETWEEN '$date_awal' AND '$date_akhir'" : "";
    $sql    = "SELECT DISTINCT(id_poli) as id_poli,nama_poli FROM mordibilitas $kond1";
    $query  = mysqli_query($con,$sql);
    $groups = [];
    $i      = 0;
    if(mysqli_num_rows($query)>0):
        while($rs = mysqli_fetch_assoc($query)):
            $decode     = json_decode(json_encode($rs));
            $groups[$i] = $rs;
            $sql    = "SELECT COUNT(id_poli) as pl FROM mordibilitas WHERE id_poli = '$decode->id_poli' $kond2";
            $qjml   = mysqli_query($con,$sql);
            $jumlah = mysqli_fetch_array($qjml);
            $groups[$i]['jumlah']=$jumlah[0];
            $i++;
        endwhile; 
    endif;
    $data      = $groups;
    $multisort = array_column($data,'jumlah');
    array_multisort($multisort,SORT_DESC,$data);
?>
