<?php 

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