<?php
session_start();
require "../connection/DB.php";
$db=new DB();
//$nams=$db->getNmaeemplo($_SESSION['email']);
/*if (isset($_SESSION['email'])) {
	$user=$db->getAlluser();
$nams=$db->getNmaeemplo($_SESSION['email']);
if(isset($_GET['fi'])){
$file=$_GET['fi'];
$inf=$db->getPatien($file);
$hosa=$db->getPatienHostroy($file);
}
else{

}
}

else{
	header("location:../login.php");
}*/
if (isset($_SESSION['email'])) {
	$nams=$db->getNmaeemplo($_SESSION['email']);
if(isset($_GET['fi'])){
$file=$_GET['fi'];
$inf=$db->getPatien($file);
$hosa=$db->getPatienHostroy($file);
$srt=$db->getPatien($file);
$resu=$srt->fetch();
if ($resu<=0) {
	
     
	header("location:hostory.php?msg=false");
}

}
else{

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
		<div class="col-10">
			<div class="col-12">
				<h4 class="text-center">Patien Information </h4>
			</div>
			<div class="col-10 offset-1">
				<div class="card">
					<div class="card-body">
						<?php 
						foreach ($inf as $key ) {
							echo "<table class=table>
                              <tr>
                                <th>Name: </th>
                                <td>".$key['name']."</td>
                               <th>File On:</th>
                                   <td>".$key['file_on']."</td>
                              </tr>
                              <tr>
                                <th>Nation: </th>
                                <td>".$key['Nation']."</td>
                               <th>Age:</th>
                                   <td>".$key['age']."</td>
                              </tr>
							</table>";
						}

						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<section>
	<div class="container">
	<div class="row">
		<div class="col-10">
			<div class="col-12">
				<h4 class="text-center">Patien Hostory </h4>
			</div>
			<div class="col-10 offset-1">
				<div class="card">
					<div class="card-body">
						<table class="table">
							<thead>
								<tr>
								<th>employy</th>
								<th>diagnosis</th>
								<th>plan</th>
								<th>recomand</th>
								<th>Note</th>
								<th>Attach </th>
								 <th>Day</th>
								</tr>
							</thead>

							<tbody>
								<?php 
                                  if ($hosa->rowCount()<=0) {
                                  	echo "<h4>NO HISTORY</h4>";
                                  }
                                  else{
                                  	foreach ($hosa as $key ) {
                                  		echo '
                                          <tr>
                                    <td>'.$key['name'].'</td>
                                     <td>'.$key['diagnosis'].'</td>
                                      <td>'.$key['plan'].'</td>
                                       <td>'.$key['recomand'].'</td>
                                        <td>'.$key['note'].'</td>
                                         <td></td>
                                          <td>'.$key['create_at'].'</td>
                                          </tr>
                                  		';
                                  	}
                                  }
                                
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>

<!--<section>
	<div class="container">
		<div class="row">
			<div class="col-10">
				<div class="col-12">
					<h4 class="text-center">Patien Information </h4>
				</div>
				<div class="col-10 offset-1">
					<div class="card ">
						<div class="card-body">
							<?php 
                             /* foreach ($inf as $key ) {
                              	echo '
                               
                                  <table class=table>
                                  <tr>
                                   <th>Name</th>
                                   <td>'.$key['name'].'</td>
                                   <th>File On:</th>
                                   <td>'.$key['file_on'].'</td>
                                  </tr>
                                  <tr>
                                    <th>Nation:</th>
                                   <td>'.$key['Nation'].'</td>
                                   <th>Age</th>
                                   <td>'.$key['age'].'</td>
                                  </tr>
                                  </tabel>
                              	';
                              }
                           */
							?>
						</div>
					</div>
				</div>
			</div>
           
		</div>
	</div>
</section>-->



<script src="../../js/bootstrap.js"></script>
<script src="../../js/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>
</html>