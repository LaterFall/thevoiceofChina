<?php
	header('Content-Type:text/html; charset=utf-8');
	session_start();
    include("Connections/webconn.php");
    $password = md5($_POST[password]);
	$name = $_POST[name];
	mysql_query("update user set password='".$password."' where name = '".$name."'",$webconn);
	header("location:userlogin.php");
?>