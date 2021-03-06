<?php
session_start();
require "../connection/DB.php";
$db=new DB();
//$user=$db->addUser();

if (isset($_SESSION['email'])) {
	$nams=$db->getNmaeemplo($_SESSION['email']);
	if(isset($_POST['sub'])){
	$name=strip_tags($_POST['name']);
	$phone=strip_tags($_POST['phone']);
	$email=strip_tags($_POST['email']);
	$job=strip_tags($_POST['job']);
	$gender=strip_tags($_POST['gend']);
	$date=date("Y-m-d");
	$user=$db->addUser($name,$phone,$email,$gender,$job,$date);
}
}
else{
	header("location:../login.php");
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
					<h4>Add New Employee</h4>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					
					<div class="card-body ">
						<div class="col-6  xform">
					<form method="POST">
						<div class="form-group row">
							<label for="name" class="col-2">Name  </label>
							<div class="col-7">
								<input type="text" name="name" class="form-control" id="name">
							</div>
						</div>
						<div class="form-group row">
							<label for="phone" class="col-2">phone  </label>
							<div class="col-7">
								<input type="text" name="phone" class="form-control" id="phone">
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-2">email  </label>
							<div class="col-7">
								<input type="email" name="email" class="form-control" id="email">
							</div>
						</div>
						<div class="form-group row">
							<label for="job" class="col-2">Job  </label>
							<div class="col-7">
								<input type="text" name="job" class="form-control" id="job">
							</div>
						</div>
						<div class="form-group row">
							<label for="gender" class="col-2">gender  </label>
							<div class="col-4">
								<select name="gend" class="form-control">
									<option value="m">Male</option>
									<option value="f">Female</option>
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label for="gender" class="col-2"></label>
							<div class="col-7">
								<input type="submit" name="sub" class="btn btn-info btn-block" value="Create Account ">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>
</html>