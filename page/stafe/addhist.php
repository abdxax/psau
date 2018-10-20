<?php
session_start();
require "../connection/DB.php";
$db=new DB();
//$user=$db->addUser();
$nams=$db->getNmaeemplo($_SESSION['email']);
$id='';
if (isset($_GET['file'])) {
	$id=$_GET['file'];
	$info=$db->getPatien($id);
	/*$name;
	$age;
	$fil;
	if ($info->rowCount()==1) {
		foreach ($info as $key ) {
			
		}

	}
	else{
		header("location:index.php?msg=Not found ");
	}
*/

}
if (isset($_POST['sub'])) {
	$dig=$_POST['diagnosis'];
    $plan=$_POST['plan'];
    $recom=$_POST['recomand'];
    $note=$_POST['note'];
      $enl=$_SESSION['email']; 
	$crea=date("Y-m-d");
	$user=$db->addhos($id,$enl,$dig,$plan,$recom,$note,$crea);
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
							<label for="name" class="col-3">diagnosis   </label>
							<div class="col-7">
								<textarea name="diagnosis" class="form-control" rows="5"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label for="file" class="col-3">plan  </label>
							<div class="col-7">
								<textarea name="plan" class="form-control" rows="5"></textarea>
							</div>
						</div>
						
						<div class="form-group row">
							<label for="Age" class="col-3">recomand   </label>
							<div class="col-7">
							<textarea name="recomand" class="form-control" rows="5"></textarea>
							</div>
						</div>
						

						<div class="form-group row">
							<label for="gender" class="col-3">note   </label>
							<div class="col-7">
								<textarea name="note" class="form-control" rows="5"></textarea>
							</div>
						</div>



						<div class="form-group row">
							<label for="gender" class="col-3"></label>
							<div class="col-7">
								<input type="submit" name="sub" class="btn btn-info btn-block" value="Add  ">
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