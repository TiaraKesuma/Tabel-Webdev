<?php
  $update = false;
  if(isset($_GET['editid'])){
    $id = $_GET['editid'];
    $update = true;
  }
  function get_web_page($url) {
      $options = array(
          CURLOPT_RETURNTRANSFER => true,   // return web page
          CURLOPT_HEADER         => false,  // don't return headers
          CURLOPT_FOLLOWLOCATION => true,   // follow redirects
          CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
          CURLOPT_ENCODING       => "",     // handle compressed
          CURLOPT_USERAGENT      => "test", // name of client
          CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
          CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
          CURLOPT_TIMEOUT        => 120,    // time-out on response
      ); 
  
      $ch = curl_init($url);
      curl_setopt_array($ch, $options);
  
      $content  = curl_exec($ch);
  
      curl_close($ch);
  
      return $content;
    }
    $response = get_web_page("http://localhost:8080/api/employees/".$id);
    $resArr = array();
    $resArr = json_decode($response);
    $Arr = get_object_vars($resArr);
    $firstName = $Arr['firstName'];
    $lastName = $Arr['lastName'];
    $role = $Arr['role'];

    if(isset($_POST['update'])){
      $id = $_POST['id'];
      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      $role = $_POST['role'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table V01</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<form method="post" action="localhost:8080/api/employees" class="d-flex flex-column mb-4">
            			<input type="hidden" name="id" value = "<?php echo $id; ?>">
						<div class="d-flex justify-content-between">
							<div class="form-group">
								<label for="id">ID</label>
								<input type="text" name="id", value="<?php echo $id?>"/>
							</div>
							<div class="form-group">
								<label for="nama-depan">Nama Depan</label>
								<input type="text" name="nama-depan", value="<?php echo $firstName; ?>"/>
							</div>
							<div class="form-group">
								<label for="nama-belakang">Nama Belakang</label>
								<input type="text" name="nama-belakang", value="<?php echo $lastName; ?>"/>
							</div>
							<div class="form-group">
								<label for="posisi">Posisi</label>
								<input type="text" name="posisi", value="<?php echo $role; ?>"/>
							</div>
						</div>
						<button type = "submit" class="btn btn-info align-self-end" name="update">Update</button>	
					</form>
          </div>
			</div>
		</div>
	</div>
<!--===============================================================================================-->	
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>