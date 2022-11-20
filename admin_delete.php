<?php
	$id=$_GET['id'];
	$table=$_GET['table'];
	include('DBMS/db.php');
	mysqli_query($conn,"delete from `$table` where ID='$id'");
	header('location: admin_panel.php');
?>