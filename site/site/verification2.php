<?php
	header('Content-Type:text/html; charset=utf-8');
	session_start();
?>
<?php
	include("Connections/webconn.php");
	$tmpname = $_POST[name];
	$pwd1 = $_POST[password];
	$pwd = md5($_POST[password]);
	$gender = $_POST[gender];
	$year = $_POST[year];
	$month = $_POST[month];
	$day = $_POST[day];
	if($_POST[question]==1)
  	{
  		$tishi = $_POST[question2];
  	}
	else 
 	{
 		$tishi = $_POST[question];
 	} 
	$huida = $_POST[answer];
	$yanzhengma = $_POST[tmpcode];
	$num = $_POST[num];
	$sql = mysql_query("select * from user where name='".$name."'",$webconn);
	$info = mysql_fetch_array($sql);
	if($info==true)
 	{
   		echo "<script>alert('该用户名已经存在!');history.back();</script>";
   		exit;
 	}
 	else
 	{
		if(strval($num)!=strval($yanzhengma))
		{
			echo "<script>alert('验证码错误!');history.back();</script>";
		}
		else
		{
    		mysql_query("insert into user (name,password,sex,year,month,day,question,answer) values ('$name','$pwd','$gender','$year','$month','$day','$tishi','$huida')",$webconn);
			session_register("name");
			$name=$tmpname;
    		echo "<script>alert('恭喜，注册成功!');window.location='index.php';</script>";
		}
 	}
?>