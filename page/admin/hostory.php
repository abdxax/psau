<?php
session_start();
require "../connection/DB.php";
$db=new DB();
$info=$db->getAllPatien();

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
				<div class="col-6">
					<form>
						<input type="number" name="fil" class="form-control" pattern="file number">
						<input type="submit" name="sub" class="btn btn-info " value="Search ">
					</form>
				</div>
			</div>
			<div class="col-3">
				<ul>
					<li>report </li>
				</ul>
			</div>
			<div class="col-9">
				<table class="table">
					<thead>
						<tr>
							<th>ON</th>
							<th>Name</th>
							<th>File ON </th>
							<th>Nation</th>
							<th>age</th>
						</tr>
					</thead>
					<tbody>
						<?php 
                           if ($info->rowCount()<=0) {
                           	echo "<h3>No Patien</h3>";
                           }
                           else{
                           	$on=1;
                           foreach ($info as $key ) {
                           	echo '
                              <tr>
                              <td>'.$on.'</td>
                               <td><a href=info.php?fi='.$key['file_on'].'>'.$key['name'].'</a></td>
                                <td>'.$key['file_on'].'</td>
                                 <td>'.$key['Nation'].'</td>
                                  <td>'.$key['age'].'</td>
                              </tr>
                           	';
                           	$on++;
                           }
                           }
                        
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>

<script src="../../js/bootstrap.js"></script>
<script src="../../js/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>
</html>