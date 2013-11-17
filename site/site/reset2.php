<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>重置密码</title>
<?php
	include("Connections/webconn.php");
	$name = $_POST[username];
	$sql = mysql_query("select * from user where name='".$name."'",$webconn);
	$info = mysql_fetch_array($sql);
	if($info==false)
	{
		echo "<script>alert('该用户名不存在!');history.back();</script>";
		exit;
	}
?>
<script language="javascript">
function checkquestion(reset2)
{
	if(reset2.answer.value=="")
	{
		alert("请输入提示答案！");
		reset2.answer.select();
		return false;
	}
	else
	{
		if(reset2.answer.value!=reset2.answer2.value)
		{
			alert("提示答案错误！");
			reset2.answer.select();
			return false;
		}
	}
	if(reset2.password.value=="")
	{
		alert("请输入新密码！");
		reset2.password.select();
		return false;
	}
	if(reset2.password2.value=="")
	{
		alert("请输入确认新密码！");
		reset2.password2.select();
		return false;
	}
	if(reset2.password.value!=reset2.password2.value)
	{
		alert("两次密码输入不一致！");
		reset2.password.select();
		return false;
	}
	if(reset2.password.value.length<6)
	{
		alert("注册密码长度应不小于6位!");
		reset2.password.select();
		return false;
	}
}
</script>
<style>
.tbl {
	font-size: 10px;
	width: 30%;
	text-align: right;
	background-color: #abcdeg;
}
</style>
</head>
<body>
<form name="reset2" action="update.php" method="post" onsubmit="return checkquestion(this)">
<table border="0" width="350" align="center">
	<tr>
    	<td class="tbl"> <strong> 密码提示：</strong> </td>
        <td>
        <?php
			echo $info[question];
		?>
        <input type="hidden" value="<?php echo $info[name];?>" name="name">
        <input type="hidden" value="<?php echo $info[answer];?>" name="answer2">
        </td>
    </tr>
    <tr>
    	<td class="tbl"> <strong> 提示答案：</strong> </td>
        <td> <input type="text" name="answer" /> </td>
    </tr>
    <tr>
    	<td class="tbl"> <strong> 新密码：</strong> </td>
        <td> <input type="text" name="password" /> </td>
    </tr>
    <tr>
    	<td class="tbl"> <strong> 确认新密码：</strong> </td>
        <td> <input type="text" name="password2" /> </td>
    </tr>
    <tr>
    	<td> </td>
        <td> <input type="submit" value="提交" /> </td>
    </tr>
</table>
</form>
</body>
</html>