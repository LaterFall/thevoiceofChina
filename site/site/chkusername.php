<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
	$nc = trim($_GET[nc]);
?>
<?php
	include("Connections/webconn.php");
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>检测用户名是否可用</title>
</head>
<table width="200" height="100" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#eeeeee">
	<tr>
    	<td height="50"> <div align="center">
        <?php
			if($nc=="")
			{
				echo "请输入用户名";
			}
			else
			{
				$sql = mysql_query("select * from user where name = '".$nc."'",$webconn);
				$info = mysql_fetch_array($sql);
				if($info==true)
				{
					echo "对不起，该用户名已被占用";
				}
				else
				{
					echo "恭喜，该用户名没被占用！";
				}
			}
		?>
		</div> </td>
	</tr>
    <tr>
    	<td height="50"> <div align="center"> <input type="button" value="确定" onclick="window.close()" /> </div> </td>
    </tr>
<body>
</body>
</html>