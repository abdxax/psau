<?php
session_start();
require "../connection/DB.php";
$db=new DB();

$nams=$db->getNmaeemplo($_SESSION['email'])

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>
<body>

<header>

<?php require "header.php";?>
</header>

<section>
	<div class="container">
		<div class="row">
			<div class="col-4">
				<div class="card">
					<a href="employee.php">
						<div class="card-heading ">
							<i class="fas fa-user"></i>
						</div>
						<div class="card-body">
							 employee
						</div>
					</a>
				</div>
			</div>

			<div class="col-4">
				<div class="card">
					<a href="hostory.php">
						<div class="card-heading ">
							<i class="fas fa-hospital-alt"></i>

						</div>
						<div class="card-body">
                               History of patient 
						</div>
					</a>
				</div>
			</div>

        
        <div class="col-4">
				<div class="card">
					<a href="maintenance.php">
						<div class="card-heading ">
							<i class="fas fa-file-invoice"></i>

						</div>
						<div class="card-body">
							Reports
						</div>
					</a>
				</div>
			</div>


		</div>
	</div>
</section>

<script src="../../js/bootstrap.js"></script>
<script src="../../js/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>
</html>