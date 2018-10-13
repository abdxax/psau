<?php
session_start();
require "../connection/DB.php";
$db=new DB();

$nams=$db->getNmaeemplo($_SESSION['email']);
/*if (isset($_GET['subs'])) {
	$file=$_GET['file'];
	header("location:appointment.php?id=".$file."");
}
else{
	echo "string";
}*/
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
			<div class="col-3">
				<ul class="nav navbar-nav">
					<li><a href="registerpatient.php">Register new Patient</a></li>
					<li><a href=""data-toggle="modal" data-target="#myModal">Appointment Booking</a></li>
					<li><a href="hostory.php">History Patient</a></li>
					<li><a href="#">Register new Patient</a></li>
					<li><a href="#">Register new Patient</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>

<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="appointment.php">
        	<div class="form-group">
        		<input type="text" name="file" class="form-control" placeholder="File number">
        	</div>
        	
      
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <input  type="submit"  name="subs"class="btn btn-info"  value="Next"> 
          </form>
      </div>

    </div>
  </div>
</div>


<script src="../../js/jquery.js"></script>
<script src="../../js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>
</html>