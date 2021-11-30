<?php
	$id = $_POST['id'];
	$nama_depan = $_POST['nama-depan'];
	$nama_belakang = $_POST['nama-belakang'];
	$posisi = $_POST['posisi'];

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://localhost:8080/api/employees',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    // CURLOPT_POSTFIELDS =>"id='$id'&firstName='$nama_depan'&lastName='$nama_belakang'&role='$posisi'",
    CURLOPT_POSTFIELDS =>'{
      "id": "'.$id.'",
      "firstName": "'.$nama_depan.'",
      "lastName": "'.$nama_belakang.'",
      "role": "'.$posisi.'"
    }',
    CURLOPT_HTTPHEADER  => array('Content-Type:application/json'),
  ));

  $response = curl_exec($curl);
  curl_close($curl);
  echo $response;
?>