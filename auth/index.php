<?php
	session_start();
	include("../FCT.php");
	$token = $_GET['token'];
	$sql="select * from users where usertoken='{$token}'";
	$res=mysql_query($sql);
	// echo $sql;
	// $row=mysql_fetch_array($res);
	// print_r($row);
	if (mysql_num_rows($res)>0) {
		echo ("Auth: 1\n");
		echo ("Messages: Allow Access\n");
		exit;
	}
	else
	{
		echo ("Auth: 0\n");
		echo ("Messages: No Access\n");
		exit;
	}
?>