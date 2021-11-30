<?php

  session_start();
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://localhost:8080/api/employees',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);
curl_close($curl);

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $url = "http://localhost:8080/api/employees/".$id;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $response = json_decode($response);

    curl_close($ch);
    echo "Deleted Successfully";
}

?>

