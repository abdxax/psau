<?php
session_start();
require "../connection/DB.php";
$db=new DB();
$user=$db->getAlluser();

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

</header>

<section>
	<div class="container">
		<div class="row">
			<div class="col-12">
				
			</div>
			<div class="col-12">
				
			</div>
			<div class="col-3">
				<ul class="nav navbar-nav">
					<li><a href="#">Add new employee</a></li>
					
					<!--<li><a href="#">Add new Machine</a></li>-->
				</ul>
			</div>

			<div class="col-8">
				<!-- about machine-->
				<div class="col-9">
					<table class="table">
						<thead>
							<tr>
							<th>name</th>
							<th>email</th>
							<th>phone </th>
							<th>gender</th>
							<th>Job title </th>

							</tr>
						</thead>

						<tbody>
							<?php 
                                foreach ($user as $key ) {
                                	echo '
                                         <tr>
                                          <td>'.$key['name'].'</td>
                                         </tr>
                                	';
                                }
							?>
						</tbody>
						
					</table>
				</div>
               <!-- about operation-->
				<div class="col-9">
					<table class="table">
						<tr>
							<th>name</th>
							<td></td>
							<th>name</th>
							</tr>
						<tr>
							<th>name</th>
							<td></td>
							<th>name</th>
							<td></td>
						</tr>
					</table>
				</div>
				<!-- about Last maintenance-->
				<div class="col-9">
					<div class="card">
						<div class="card-heading">
							<h5>Last maintenance </h5>
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