<?php

$ch = curl_init();
 
curl_setopt($ch, CURLOPT_URL, "https://helloacm.com/api/random/?n=10");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
$output = curl_exec($ch);
$password ="";
for($i=1;$i<9;$i++){
$password[$i]=$output[$i];

}
curl_close($ch);

echo json_encode($password);
?>