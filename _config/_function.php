<?php 

require __DIR__."/../path.php";
require "$pathApp/_assets/libs/vendor/autoload.php";

use Carbon\Carbon;
//$url = base_url('_config/env.txt');
$json_sqlx = file_get_contents(__DIR__.'/env.json',TRUE);

$config = json_decode($json_sqlx,TRUE);

function tgl_indo($tgl) {
    $tanggal = Carbon::parse($tgl)->format('d-m-Y');
    return $tanggal;
}

function base_url($url = null) {
    $base_url  = "http://localhost:8000";
    if($url != null) {
        return $base_url."/".$url;
    } else {
        return $base_url;
    }
}



function dd($var){
    echo "<pre>"; 
    var_dump($var);       
    echo "</pre>"; 
    die();       
}
function redirect($to)
{
    echo "
        <script>
            window.location.href='$to';
        </script>
    ";
}

