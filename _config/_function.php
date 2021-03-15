<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

require __DIR__."/../_assets/libs/vendor/autoload.php";
use Carbon\Carbon;

$json_sqlx = file_get_contents(__DIR__.'/env.json',TRUE);
$config = json_decode($json_sqlx,TRUE);
define('KONFIG',$config);

function tgl_indo($tgl) {
    $tanggal = Carbon::parse($tgl)->format('d-m-Y');
    return $tanggal;
}

function base_url($url = null) {
    $base_url  = KONFIG['app_url'];
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

