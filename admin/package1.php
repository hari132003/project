<!DOCTYPE html>
<?php
	require_once 'validate.php';
	require 'name.php';
?>
<html lang = "en">
	<head>
		<title>Simple Hotel Online Reservation</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
	</head>
<body>
	<nav style = "background-color:rgba(0, 0, 0, 0.1);" class = "navbar navbar-default">
		<div  class = "container-fluid">
			<div class = "navbar-header">
				<a class = "navbar-brand" >Simple Hotel Online Reservation</a>
			</div>
			<ul class = "nav navbar-nav pull-right ">
				<li class = "dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class = "glyphicon glyphicon-user"></i> <?php echo $name;?></a>
					<ul class="dropdown-menu">
						<li><a href="logout.php"><i class = "glyphicon glyphicon-off"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
	<div class = "container-fluid">	
		<ul class = "nav nav-pills">
						<li ><a href = "home.php">Home</a></li>
			<li><a href = "viewcus.php">viewcus</a></li>
			<li><a href = "account.php">Accounts</a></li>
			<li><a href = "reserve.php">Room Reservation</a></li>
			<li><a href = "room.php">Room</a></li>
			<li><a href ="preserve.php">Package Reservation</a></li>
            <li><a href ="package1.php">Package</a></li>
			<li><a href ="cab1.php">Cab</a></li>
            <li class='active'><a href ="offers.php">Offers</a></li>
            <li><a href ="review.php">Reviews</a></li>

		</ul>	
	</div>
	<br />
	<div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "alert alert-info">Transaction / package</div>
				<a class = "btn btn-success" href = "package.php"><i class = "glyphicon glyphicon-plus"></i> Add package</a>
				<br />
				<br />
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
							<th>packagetype</th>
							<th>packagedetails</th>
						
							<th>offers</th>
							<th>offercode</th>
							<th>chargeinperson</th>
							<th>photo</th>
							<th>Action</th>						

							</tr>
					</thead>
					<tbody>
					<?php
						$query = $conn->query("SELECT * FROM `pack`") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>	
						<tr>
					
							<td><?php echo $fetch['packagetype']?></td>
							<td><?php echo $fetch['packagedetails']?></td>
					
						   <td><?php echo $fetch['offers']?></td>
							<td><?php echo $fetch['offercode']?></td>
							<td><?php echo $fetch['chargeinperson']?></td>
							<td><center><img src = "../photo/<?php echo $fetch['photo']?>" height = "50" width = "50"/></center></td>
							
							<td><center><a class = "btn btn-warning" href = "edit_package.php?packageid=<?php echo $fetch['packageid'];?>"><i class = "glyphicon glyphicon-edit"></i> Edit</a> <a class = "btn btn-danger" onclick = "confirmationDelete(this); return false;" href = "delete_package.php?packageid=<?php echo $fetch['packagetype'];?>"><i class = "glyphicon glyphicon-remove"></i> Delete</a></center></td>
						</tr>
					<?php
						}
					?>	
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<br />
	<br />
	<div style = "text-align:right; margin-right:10px;" class = "navbar navbar-default navbar-fixed-bottom">
		<label></label>
	</div>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
<script src = "../js/jquery.dataTables.js"></script>
<script src = "../js/dataTables.bootstrap.js"></script>	
<script type = "text/javascript">
	function confirmationDelete(anchor){
		var conf = confirm("Are you sure you want to delete this record?");
		if(conf){
			window.location = anchor.attr("href");
		}
	} 
</script>

<script type = "text/javascript">
	$(document).ready(function(){
		$("#table").DataTable();
	});
</script>
</html>