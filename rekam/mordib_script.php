<?php 
    $isFiltered = false;
    if(isset($_REQUEST['filter'])):
        $query_date = $_REQUEST['filter'];
        $date       = new DateTime($query_date);
        $date->modify('first day of this month');
        $date_awal  = $date->format('Y-m-d');
        $date->modify('last day of this month');
        $date_akhir  = $date->format('Y-m-d');
        $isFiltered  = true;
    endif;
    $kond1 = $isFiltered ? "WHERE tanggal BETWEEN '$date_awal' AND '$date_akhir'" : "";
    $kond2 = $isFiltered ? "AND tanggal BETWEEN '$date_awal' AND '$date_akhir'" : "";
    $sql   = "SELECT DISTINCT(icd) AS icd,diagnosa,nama_poli,id_poli FROM mordibilitas $kond1";
    
    $query = mysqli_query($con,$sql);
    $rows  = mysqli_num_rows($query);
    $data  = [];
    $i     = 0;
    while($rs = mysqli_fetch_assoc($query)):
        $icd = $rs['icd'];
        $data[$i] = ['icd'=>$icd,'diagnosa'=>$rs['diagnosa'],'id_poli' =>$rs['id_poli'],'nama_poli'=>$rs['nama_poli']];
        $s1_6hari = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(klasifikasi) AS k FROM mordibilitas WHERE klasifikasi='1-6 hari' AND icd='$icd' $kond2"));
        $data[$i]['in_a'] = $s1_6hari['k']==NULL?"":$s1_6hari['k'];
        $s7_28hari = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(klasifikasi) AS k FROM mordibilitas WHERE klasifikasi='7-28 hari' AND icd='$icd' $kond2"));
        $data[$i]['in_b'] = $s7_28hari['k']==NULL? "" : $s7_28hari['k'];
        $s28d_1y = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(klasifikasi) AS k FROM mordibilitas WHERE klasifikasi='28 hari -1 tahun' AND icd='$icd' $kond2"));
        $data[$i]['in_c'] = $s28d_1y['k']==NULL? "" : $s28d_1y['k'];
        $s1y_4y = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(klasifikasi) AS k FROM mordibilitas WHERE klasifikasi='1-4 tahun' AND icd='$icd' $kond2"));
        $data[$i]['in_d'] = $s1y_4y['k']==NULL? "" : $s1y_4y['k'];
        $s5_14y = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(klasifikasi) AS k FROM mordibilitas WHERE klasifikasi='5-14 tahun' AND icd='$icd' $kond2"));
        $data[$i]['in_e'] = $s5_14y['k']==NULL? "" : $s5_14y['k'];
        $s15_24y = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(klasifikasi) AS k FROM mordibilitas WHERE klasifikasi='15-24 tahun' AND icd='$icd' $kond2"));
        $data[$i]['in_f'] = $s15_24y['k']==NULL? "" : $s15_24y['k'];
        $s25_44y = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(klasifikasi) AS k FROM mordibilitas WHERE klasifikasi='25-44 tahun' AND icd='$icd' $kond2"));
        $data[$i]['in_g'] = $s25_44y['k']==NULL? "" : $s25_44y['k'];
        $s45_64 = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(klasifikasi) AS k FROM mordibilitas WHERE klasifikasi='45-64 tahun' AND icd='$icd' $kond2"));
        $data[$i]['in_h'] = $s45_64['k']==NULL? "" : $s45_64['k'];
        $last_umur = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(klasifikasi) AS k FROM mordibilitas WHERE klasifikasi='diatas 65 tahun' AND icd='$icd' $kond2"));
        $data[$i]['in_i'] = $last_umur['k']==NULL? "" : $last_umur['k'];
        $laki = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(icd) AS k FROM mordibilitas WHERE jenis_kelamin='Laki-laki' AND icd='$icd' $kond2"));
        $data[$i]['in_j'] = $laki['k']==NULL? "" : $laki['k'];
        $wn = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(icd) AS k FROM mordibilitas WHERE jenis_kelamin='Perempuan' AND icd='$icd' $kond2"));
        $data[$i]['in_k'] = $wn['k']==NULL? "" : $wn['k'];
        $jmk = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(icd) AS k FROM mordibilitas WHERE icd='$icd' $kond2"));
        $data[$i]['jmk'] = $jmk['k']==NULL? "" : $jmk['k'];
        $i++;
    endwhile;


    $multisort = array_column($data,'jmk');
    array_multisort($multisort,SORT_DESC,$data);
  //  dd($data);
?>
