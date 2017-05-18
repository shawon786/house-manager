<?php
include_once 'dbconfig.php';
if(isset($_POST['btn-save']))
{
	// variables for input data
	$full_name = $_POST['full_name'];
	$rent_details = $_POST['rent_details'];
	$rent_rate = $_POST['rent_rate'];
	$nid=$_POST['nid'];
	// variables for input data
	
	// sql query for inserting data into database
	$sql_query = "INSERT INTO users(full_name,rent_details,rent_rate,nid) VALUES('$full_name','$rent_details','$rent_rate','$nid')";
	// sql query for inserting data into database
	
	// sql query execution function
	if(mysql_query($sql_query))
	{
		?>
		<script type="text/javascript">
		alert('Renter Added Successfully');
		window.location.href='index.php';
		</script>
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
		alert('error occured while inserting your data');
		</script>
		<?php
	}
	// sql query execution function
}
?>
<!DOCTYPE>
<html>
<head>
<title>House Manager</title>
<link rel="stylesheet" href="includes/style.css" type="text/css" />
</head>
<body>
<center>
<div id="header">
	<div id="content">
    <h2>Add New Renter</h2>
    </div>
</div>
<div id="body">
	<div id="content">
    <form method="post">
    <table align="center">
    <tr>
    <td><input type="text" name="full_name" placeholder="Full Name" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="rent_details" placeholder="House/Flat No & Details" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="rent_rate" placeholder="Monthly Rent Amount" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="nid" placeholder="National ID No" required /></td>
    </tr>
    <tr>
    <td><button type="submit" name="btn-save"><strong>SAVE</strong></button></td>
    </tr>
    <tr>
    <td align="center"><a href="index.php">Go to LIST page</a></td>
    </tr>
    </table>
    </form>
    </div>
</div>

</center>
</body>
</html>