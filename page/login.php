<?php
session_start();
require "connection/DB.php";

if (isset($_POST['subm'])) {
	$eml=strip_tags($_POST['email']);
	$pass=strip_tags($_POST['pass']);
	$pass=md5($pass);
	$db=new DB();
	$db->login($eml,$pass);
}
$msg="";
if (isset($_GET['msg'])) {
	$msg="<div class='alert alert-danger'>The email or Password Not correct </div>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body class="bod">

<header>
<div class="container">
	<div class="row">
		
			<div class="col-12 ">
				<?php echo $msg; ?>
		      <img src="../page/logo.jpg" class="logo-login">
	        </div>

	        <div class="col-6 offset-3">
	        	<div class="card border-light mb-3 cardx">
	        		<div class="card-header">
	        			<h3 class="text-center">
	        				Login
	        			</h3>
	        		</div>
	        		<div class="card-body">
	        			<form method="POST">
	        				<div class="form-group">
	        					<input type="email" name="email" class="form-control xz" placeholder="Email">
	        				</div>
	        				<div class="form-group">
	        					<input type="Password" name="pass" class="form-control" placeholder="Password">
	        				</div>
	        				<div class="form-group">
	        					<input type="submit" name="subm" class="btn btn-primary btns" value="Login">
	        				</div>
	        			</form>
	        		</div>
	        	</div>
	        </div>


	</div>

</div>
</header>

<footer>
	<div class="text-center">
		<p>Developer :Abdulrahman ALJarallah</p>
	</div>
</footer>


<script src="../js/bootstrap.js"></script>
<script src="../js/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>
</html>