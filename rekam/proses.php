<?php 
    require __DIR__."/../pasien/proses_act.php";
    if($save):
        $id = mysqli_insert_id($con);
        redirect(base_url('rekam/rekam_add_form.php'));
    endif;
    