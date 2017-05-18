<?php
include_once 'dbconfig.php';

// delete condition
if(isset($_GET['delete_id']))
{
	$sql_query="DELETE FROM users WHERE user_id=".$_GET['delete_id'];
	mysql_query($sql_query);
	header("Location: $_SERVER[PHP_SELF]");
}
// delete condition

?>
<!DOCTYPE html>
<html>
<head>
<title>House Manager</title>
<link rel="stylesheet" href="includes/style.css" type="text/css" />

<script type="text/javascript">
function edt_id(id)
{
	if(confirm('Sure to edit ?'))
	{
		window.location.href='edit_renter.php?edit_id='+id;
	}
}
function delete_id(id)
{
	if(confirm('Sure to Delete ?'))
	{
		window.location.href='index.php?delete_id='+id;
	}
}
</script>

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
    <h1>Renter List</h1>
    <table>
    <tr>
    <th>Full Name</th>
    <th>Rent Details</th>
    <th>Monthly Rent Rate</th>
    <th>NID</th>
    <th colspan="2">Operations</th>
    </tr>
    <?php
	$sql_query="SELECT * FROM users";
	$result_set=mysql_query($sql_query);
	if(mysql_num_rows($result_set)>0)
	{
        while($row=mysql_fetch_row($result_set))
		{
		?>
            <tr>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
            <td><?php echo $row[3]; ?></td>
            <td><?php echo $row[4]; ?></td>
            <td align="center"><a href="javascript:edt_id('<?php echo $row[0]; ?>')"><img src="includes/b_edit.png" align="EDIT" /></a></td>
            <td align="center"><a href="javascript:delete_id('<?php echo $row[0]; ?>')"><img src="includes/b_drop.png" align="DELETE" /></a></td>
            </tr>
        <?php
		}
	}
	else
	{
		?>
        <tr>
        <td colspan="5">No Renter Found !</td>
        </tr>
        <?php
	}
	?>
    </table>
        <h1><a href="add_renter.php">Add New Renter</a></h1>

    </div>
</div>

</center>
</body>
</html>