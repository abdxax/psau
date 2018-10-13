<?php
session_start();
require "../connection/DB.php";
$db=new DB();
//$user=$db->addUser();
$nams=$db->getNmaeemplo($_SESSION['email']);

if (isset($_GET['file'])) {
	$id=$_GET['file'];
	$info=$db->getPatien($id);
	$name;
	$age;
	$fil;
	if ($info->rowCount()==1) {
		foreach ($info as $key ) {
			$name=$key['name'];
			$fil=$key['file_on'];
			$age=$key['age'];
		}

	}
	else{
		header("location:index.php?msg=Not found ");
	}

}
if (isset($_POST['sub'])) {
	$date=$_POST['next'];

	$crea=date("Y-m-d");
	$user=$db->addappoyt($fil,$date,$crea);
}


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
			<div class="col-12">
				<div class="text-center">
					<h4>Appointment Booking</h4>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					
					<div class="card-body ">
						<div class="col-6  xform">
					<form method="POST" enctype="multipart/form-data">
						<div class="form-group row">
							<label for="name" class="col-3">Name  </label>
							<div class="col-7">
								<input type="text" name="name" class="form-control" id="name" value=<?php echo $name;?>>
							</div>
						</div>
						<div class="form-group row">
							<label for="file" class="col-3">File Number  </label>
							<div class="col-7">
								<input type="number" name="files" class="form-control" id="file" value=<?php echo $fil;?>>
							</div>
						</div>
						
						<div class="form-group row">
							<label for="Age" class="col-3">Age  </label>
							<div class="col-7">
								<input type="number" name="Age" class="form-control" id="job"value=<?php echo $age;?>>
							</div>
						</div>
						

						<div class="form-group row">
							<label for="gender" class="col-3">Date  </label>
							<div class="col-7">
								<input type="date" name="next" id="datepicker" class="form-control">
							</div>
						</div>



						<div class="form-group row">
							<label for="gender" class="col-3"></label>
							<div class="col-7">
								<input type="submit" name="sub" class="btn btn-info btn-block" value="Add Appointment ">
							</div>
						</div>


					</form>
				</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</section>

<script src="../../js/bootstrap.js"></script>
<script src="../../js/jquery.js"></script>
<script src="../../js/dem.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>
</html>