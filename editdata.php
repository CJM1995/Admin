<?php
    //require('conn.php');
    $id = $_GET['id'];

    if (isset($_POST['submit'])) {
    	$id = $_POST['id'];
    	$name = $_POST['address'];
    	$phone = $_POST['city'];
    	$mysqli->query("UPDATE `warehouses` SET `address` = '$name', `city` = '$phone' WHERE `warehouse_id`=$id");
    	header("location:view_warehouses.php");
    }

    $members = $mysqli->query("SELECT * FROM `warehouses` WHERE `warehouse_id`='$id'");
    $mem = mysqli_fetch_assoc($members);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Using Bootstrap modal</title>

    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<form method="post" action="editdata.php" role="form">
	<div class="modal-body">
		<div class="form-group">
			<label for="id">ID</label>
			<input type="text" class="form-control" id="id" name="id" value="<?php echo $mem['warehouse_id'];?>" readonly="true"/>

		</div>
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control" id="name" name="name" value="<?php echo $mem['city'];?>" />
		</div>
<!--		<div class="form-group">-->
<!--			<label for="phone">Phone</label>-->
<!--				<input type="text" class="form-control" id="phone" name="phone" value="--><?php //echo $mem['phone'];?><!--" />-->
<!--		</div>-->
<!--		<div class="form-group">-->
<!--			<label for="address">Address</label>-->
<!--			<input type="text" class="form-control" id="address" name="address" value="--><?php //echo $mem['address'];?><!--" />-->
<!---->
<!--		</div>-->
<!--		<div class="form-group">-->
<!--      <label for="email">Email</label>-->
<!--			<input type="text" class="form-control" id="email" name="email" value="--><?php //echo $mem['email'];?><!--" />-->
<!--		</div>-->
		</div>
		<div class="modal-footer">
			<input type="submit" class="btn btn-primary" name="submit" value="Update" />&nbsp;
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</form>
</body>
</html>
