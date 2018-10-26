<?php 
session_start();
require "../connection/DB.php";
$db=new DB();
$msg="";
if (isset($_SESSION['email'])) {
	$nams=$db->getNmaeemplo($_SESSION['email']);
	if (isset($_POST['sub'])) {
		$pass=strip_tags($_POST['pass']);
		$pass2=strip_tags($_POST['pass2']);
		if ($pass==$pass2) {
			$db->updatePass(md5($pass),$_SESSION['email']);
		}
		else{
			header("location:newEmployee.php?msg=false");
		}
	}
	if (isset($_GET['msg'])) {
		$msg="<div class='alert alert-danger'>The password is not equal  </div>";
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
				<?php echo $msg;?>
				<div class="col-6 offset-3">
					<form method="POST">
						<div class="form-group">
							<input type="password" name="pass" class="form-control" placeholder="New password">
						</div>
						<div class="form-group">
							<input type="password" name="pass2" class="form-control" placeholder="Password Agen">
						</div>
						<div class="form-group">
							<input type="submit" name="sub" class="btn btn-info" value="Save">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
</body>
</html>