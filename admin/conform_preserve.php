<!DOCTYPE html>
<?php
	require_once 'validate.php';
	require 'name.php';
?>
<html lang = "en">
	<head>
		<title>Hotel Online Reservation</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
	</head>
<body>
	<nav style = "background-color:rgba(0, 0, 0, 0.1);" class = "navbar navbar-default">
		<div  class = "container-fluid">
			<div class = "navbar-header">
				<a class = "navbar-brand" >Hotel Online Reservation</a>
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
				<div class = "alert alert-info">Fill up form</div>
				<?php
					$query = $conn->query("SELECT * FROM `patransaction` NATURAL JOIN `guest` WHERE `transaction_id` = '$_REQUEST[transaction_id]'") or die(mysqli_error());
					$fetch = $query->fetch_array();
				?>
				<br />
				<form method = "POST" enctype = "multipart/form-data" action = "save_form1.php?transaction_id=<?php echo $fetch['transaction_id']?>">
					<div class = "form-inline" style = "float:left;">
						<label>Firstname</label>
						<br />
						<input type = "text" value = "<?php echo $fetch['firstname']?>" class = "form-control" size = "30" disabled = "disabled"/>
					</div>
					<div class = "form-inline" style = "float:left; margin-left:20px;">
						<label>Middlename</label>
						<br />
						<input type = "text" value = "<?php echo $fetch['middlename']?>" class = "form-control" size = "30" disabled = "disabled"/>
					</div>
					<div class = "form-inline" style = "float:left; margin-left:20px;">
						<label>Lastname</label>
						<br />
						<input type = "text" value = "<?php echo $fetch['lastname']?>" class = "form-control" size = "30" disabled = "disabled"/>
					</div>

					<div class = "form-inline" style = "float:left;margin-left:20px;">
						<label>packagetype</label>
						<br />
						<input type = "text" value = "<?php echo $fetch['packagetype']?>" class = "form-control" size = "20" disabled = "disabled"/>
					</div>
					<div class = "form-inline" style = "float:left; margin-left:20px;">
						<label>packageid</label>
						<br />
						<input type = "number" min = "0" max = "999" name = "packageid" value = "<?php echo $fetch['packageid']?>" class = "form-control" required = "required"/>
					</div>
					<div class = "form-inline" style = "float:left; margin-left:20px;">
						<label>offers</label>
						<br />
						<input type = "number" min = "0" max = "99" name = "offers" value = "<?php echo $fetch['offers']?>" class = "form-control"/>
					</div>
					<div class = "form-inline" style = "float:left; margin-left:20px;">
						<label>offercode</label>
						<br />
						<input type = "text" name = "offercode" value = "<?php echo $fetch['offercode']?>" class = "form-control"/>
					</div>

					<div class = "form-inline" style = "float:left; margin-left:20px;">
						<label style = "color:#ff0000;">*offercode = p123</label>
					</div>
					<div class = "form-inline" style = "float:left; margin-left:20px;">
						<label>Cabtype</label>
						<br />
						<input type = "text" name = "cabtype" value = "<?php echo $fetch['cabtype']?>" class = "form-control"/>
					</div>
					<div class = "form-inline" style = "float:left; margin-left:20px;">
						<label>Tariff</label>
						<br />
						<input type = "text" name = "tariff" value = "<?php echo $fetch['tariff']?>" class = "form-control"/>
					</div>
					<div class = "form-inline" style = "float:left; margin-left:20px;">
						<label>Days</label>
						<br />
						<input type = "number" min = "0" max = "99" name = "days" class = "form-control" required = "required"/>
					</div>
					<br style = "clear:both;"/>
					<br />
					<button name = "add_form1" class = "btn btn-primary"><i class = "glyphicon glyphicon-save"></i> Submit</button>
				</form>
			</div>
		</div>
	</div>
	<br />
	<br />
	<div style = "text-align:right; margin-right:10px;" class = "navbar navbar-default navbar-fixed-bottom">
		<label>&copy; Copyright HOR 2017 </label>
	</div>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>	
</html>