<?php

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
  $response = json_decode($response, true);
  //  $response;
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
					<form method="post" action="tambah-data.php" class="d-flex flex-column mb-4">
						<div class="d-flex justify-content-between">
							<div class="form-group">
								<label for="id">ID</label>
								<input type="text" name="id"/>
							</div>
							<div class="form-group">
								<label for="nama-depan">Nama Depan</label>
								<input type="text" name="nama-depan"/>
							</div>
							<div class="form-group">
								<label for="nama-belakang">Nama Belakang</label>
								<input type="text" name="nama-belakang"/>
							</div>
							<div class="form-group">
								<label for="posisi">Posisi</label>
								<select class="form-control" name="pos">
    								<option value="MANAGER">Manager</option>
    								<option value="SECRETARY">Secretary</option>
   									<option value="OFFICE_BOY">Office Boy</option>
    								<option value="JANITOR">Janitor</option>
  								</select>
							</div>
						</div>
						<button class="btn btn-warning align-self-end">Tambah</button>	
					</form>
				
				<table>
						<thead>
							<tr class="table100-head">
								<th>ID</th>
								<th>Nama Depan</th>
								<th>Nama Belakang</th>
								<th>Posisi</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
								$person_list = $response;
								foreach($person_list as $key=>$person): ?>
								<tr>
									 <td><?php echo $person['id']; ?></td>
									 <td><?php echo $person['firstName']; ?></td>
									 <td><?php echo $person['lastName']; ?></td>
									 <td><?php echo $person['role']; ?></td>
									 <td>
										 <a href="edit.php?editid=<?php echo $person['id']; ?>"
										 	class="btn btn-success">Edit</a>
										 <a href="delete.php?deleteid=<?php echo $person['id']; ?>"
										 	class="btn btn-danger">Delete</a>
									 </td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
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