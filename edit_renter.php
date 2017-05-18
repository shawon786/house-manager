<?php
include_once 'dbconfig.php';
if(isset($_GET['edit_id']))
{
	$sql_query="SELECT * FROM users WHERE user_id=".$_GET['edit_id'];
	$result_set=mysql_query($sql_query);
	$fetched_row=mysql_fetch_array($result_set);
}
if(isset($_POST['btn-update']))
{
	// variables for input 
	$full_name = $_POST['full_name'];
	$rent_details = $_POST['rent_details'];
	$rent_rate = $_POST['rent_rate'];
	$nid=$_POST['nid'];
	// variables for input 
	
	// sql query for update data into database
	$sql_query = "UPDATE users SET full_name='$full_name',rent_details='$rent_details',rent_rate='$rent_rate',nid='$nid' WHERE user_id=".$_GET['edit_id'];
	
	// sql query execution function
	if(mysql_query($sql_query))
	{
		?>
		<script type="text/javascript">
		alert('Info Updated Successfully');
		window.location.href='index.php';
		</script>
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
		alert('error occured while updating Info');
		</script>
		<?php
	}
	// sql query execution function
}
//end of rent updation 

if(isset($_POST['btn-cancel']))
{
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>House Manager</title>
<link rel="stylesheet" href="includes/style.css" type="text/css" />
</head>
<body>
<center>

<div id="header">
	<div id="content">
    <h2>House Manager</h2>
    </div>
</div>

<div id="body">
	<div id="content">
    <form method="post">
    <table align="center">
    <tr>
    <td><input type="text" name="full_name" placeholder="Full Name" value="<?php echo $fetched_row['full_name']; ?>" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="rent_details" placeholder="House/Flat No & Details" value="<?php echo $fetched_row['rent_details']; ?>" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="rent_rate" placeholder="Monthly Rent Amount" value="<?php echo $fetched_row['rent_rate']; ?>" required /></td>
    </tr>
     <tr>
    <td><input type="text" name="nid" placeholder="nid" value="<?php echo $fetched_row['nid']; ?>" required /></td>
    </tr>
    <tr>
    <td>
    <button type="submit" name="btn-update"><strong>UPDATE</strong></button>
    <button type="submit" name="btn-cancel"><strong>Cancel</strong></button>
    </td>
    </tr>
    </table>
    </form>
    </div>
</div>

</center>
</body>
</html>