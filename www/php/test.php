<?php
include 'functions.php';

$j = @file_get_contents('users.json');
// $data = json_decode($j, true);

// if( $j != false && !is_null($data)){
//     foreach($data as $k => $e){
//         echo '<p>'  . $k .' '. $e . '</p>';
//     }
// }
echo $j;
?>