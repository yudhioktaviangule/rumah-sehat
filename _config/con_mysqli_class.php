<?php
require '_function.php';

$sql_details = $config;


$con = new mysqli($sql_details['host'],$sql_details['user'],$sql_details['pass'],$sql_details['db']);
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: " . $con->connect_error;
    die();
}

function autoGenerate($conn,$table,$field='',$pembentuk='')
{
    $sql = "SELECT COUNT($field) AS cfield FROM $table";
    
    $stmt = $conn->prepare($sql) or die("SQL ERROR NUMBER".$conn->errno);
    $stmt->execute();

    $result = $stmt->get_result();
    $fetch = $result->fetch_assoc();
    $data = json_decode(json_encode($fetch))->cfield;
    $data++;
    $isCantGenerate = true;
    $ids = ''; 
    while($isCantGenerate):
        $sql = "SELECT $field FROM $table WHERE $field = ?";
        $ids = $pembentuk.''.sprintf('%04d',$data);
        $stmt2 = $conn->prepare($sql);
        $stmt2->bind_param('s',$ids);
        $stmt2->execute();
        $result = $stmt2->get_result();
        $assoc = $result->fetch_assoc();
        if($assoc==NULL){
            $isCantGenerate=false;        
        }else{
            $data--;
        }
        $stmt2->close();
    endwhile;

    //dd($ids);

    return $ids;
}
?>