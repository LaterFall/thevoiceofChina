<?php
	header('Content-Type:text/html; charset=utf-8');
	include("Connections/webconn.php");
	$username=$_POST[user_name];
	$userpwd=md5($_POST[user_password]);
	$yz=$_POST[captchcode];
	$num=$_POST[num];
	if(strval($yz)!=strval($num))
	{
  		echo "<script>alert('验证码输入错误!');history.go(-1);</script>";
  		exit;
	}
	class chkinput
	{
   		var $name;
   		var $pwd;
   		function chkinput($x,$y)
		{
     		$this->name=$x;
     		$this->pwd=$y;
    	}
   		function checkinput()
		{
     		include("Connections/webconn.php");
     		$sql=mysql_query("select * from user where name='".$this->name."'",$webconn);
     		$info=mysql_fetch_array($sql);
     		if($info==false)
			{
          		echo "<script language='javascript'>alert('不存在此用户！');history.back();</script>";
          		exit;
       		}
      		else
			{
          		if($info[password]==$this->pwd)
            	{
					session_start();
	           		$_SESSION[username]=$info[name];
               		header("location:index.php");
               		exit;
            	}
          		else
				{
             		echo "<script language='javascript'>alert('密码输入错误！');history.back();</script>";
             		exit;
           		}
      		}
   		}
	}
    $obj=new chkinput(trim($username),trim($userpwd));
    $obj->checkinput();
?>
