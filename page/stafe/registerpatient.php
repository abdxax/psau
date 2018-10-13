<?php
session_start();
require "../connection/DB.php";
$db=new DB();
//$user=$db->addUser();
$nams=$db->getNmaeemplo($_SESSION['email']);
/*if (isset($_POST['sub'])) {
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$job=$_POST['job'];
	$gender=$_POST['gend'];
	$date=date("Y-m-d");
	$user=$db->addUser($name,$phone,$email,$gender,$job,$date);
}
*/
if (isset($_FILES['file'])) {
	//print_r($_FILES['file']);
	$fname=$_FILES['file']['name'];
	$ftype=$_FILES['file']['type'];
	$tmp=$_FILES['file']['tmp_name'];
	$size=$_FILES['file']['size'];
    //$file_ext=strtolower(end());
    
     $explod= explode('.',$fname);
     //print_r($explod) ;
       $end=strtolower($explod[1]);
      echo $end;
	$exc=array("pdf","jpg","png");
if (in_array($end,$exc)) {
	echo $size."<br/>";
	if ($size<=409600) {
		$name=$_POST['name'];
		$files=$_POST['files'];
		$Nation=$_POST['Nation'];
		$Age=$_POST['Age'];
		$gender=$_POST['gend'];
		$date=date("Y-m-d");
		$path="../../file/".$name."_".$fname;
		if (move_uploaded_file($tmp, $path)) {
			if($db->addPate($name,$files,$Age,$Nation,$gender,$path,$date)){
				header("location:index.php");
			}
			else{
				echo "string";
			}

		}else{
			echo "string 1";
		}
	}
	else{
echo "string 2";
	}
}
else{
echo "string 3";
}
	
}
else if (isset($_POST['sub'])){
	$name=$_POST['name'];
		$files=$_POST['files'];
		$Nation=$_POST['Nation'];
		$Age=$_POST['Age'];
		$gender=$_POST['gend'];
		$date=date("Y-m-d");
		if($db->addPate($name,$files,$Age,$Nation,$gender,"-",$date)){
				header("location:index.php");
			}
			else{
				echo "string";
			}
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
					<h4>Add New Patient</h4>
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
								<input type="text" name="name" class="form-control" id="name">
							</div>
						</div>
						<div class="form-group row">
							<label for="file" class="col-3">File Number  </label>
							<div class="col-7">
								<input type="number" name="files" class="form-control" id="file">
							</div>
						</div>
						<div class="form-group row">
							<label for="Nation" class="col-3">Nation  </label>
							<div class="col-7">
								<select name="Nation" class="form-control">
									<option>SA</option>
									<option>SA</option>
									<option>SA</option>
									<option>SA</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="Age" class="col-3">Age  </label>
							<div class="col-7">
								<input type="number" name="Age" class="form-control" id="job">
							</div>
						</div>
						<div class="form-group row">
							<label for="gender" class="col-3">gender  </label>
							<div class="col-4">
								<select name="gend" class="form-control">
									<option value="m">Male</option>
									<option value="f">Female</option>
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label for="gender" class="col-3">Upload File  </label>
							<div class="col-7">
								<input type="file" name="file" class="form-control">
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