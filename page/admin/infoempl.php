<?php
session_start();
require "../connection/DB.php";
$db=new DB();
//$nams=$db->getNmaeemplo($_SESSION['email']);
if(isset($_GET['fi'])){
$file=$_GET['fi'];
$inf=$db->getPatien($file);
$hosa=$db->getPatienHostroy($file);

if(isset($_GET['eml'])){
$file=$_GET['eml'];
$inf=$db->getpathen($file);
$hosa=$db->getpathen($file);
}
else{

}

}
else{

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
<?php require "header.php";?>s
</header>

<section>
<div class="container">
	<div class="row">
		<div class="col-10">
			<div class="col-12">
				<h4 class="text-center">Employee Information </h4>
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
                               <th>Email:</th>
                                   <td>".$key['email']."</td>
                              </tr>
                              <tr>
                                <th>Phone: </th>
                                <td>".$key['phone']."</td>
                               <th>Job:</th>
                                 <td>".$key['job']."</td>  
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
				<h4 class="text-center">Employee Hostory </h4>
			</div>
			<div class="col-10 offset-1">
				<div class="card">
					<div class="card-body">
						<table class="table">
							<thead>
								<tr>
								<th>Name</th>
								<th>File ON</th>
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
                                    <td>'.$db->getNmaePatien($key['file_on']).'</td>
                                     <td>'.$key['file_on'].'</td>
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