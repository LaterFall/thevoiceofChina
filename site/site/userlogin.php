<?php
	session_start();
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>中国好声音登陆界面</title>
<style>
.tbl {
	font-size: 10px;
	width: 30%;
	text-align: center;
	background-color: #abcdeg;
}
</style>
<script language="javascript">
function check()
{
	if(login.user_name.value=="")
	{
		alert("用户名不能为空！请输入用户名！");
		return false;
	}
	if(login.user_password.value=="")
	{
		alert("密码不能为空！请输入密码！");
		return false;
	}
	if(login.captchcode.value=="")
	{
		alert("验证码不能为空！请输入验证码！");
		return false;
	}
}
</script>
</head>
<body>
<table width="766" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
	<td colspan="2"> <?php include("top.php"); ?> </td>
</tr>
<tr>
	<td width="300"> <table height="400">
	<tr>
		<td width="300"> <?php include("leftmenu.php"); ?> </td>
	</tr>
	</table> </td>
	<td>
<form name="login" action="verification.php" method="post" onsubmit="return check()">
<table border="0" width="350">
	<tr>
		<td class="tb1"> <strong> 用户名：</strong> </td> <td width="30%"> <input type="text" name="user_name" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'" /></td>
    </tr>
    <tr>
    	<td class="tb1"> <strong> 密&nbsp;&nbsp;码：</strong> </td> <td> <input type="text" name="user_password" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'" /> </td>
    </tr>
    <tr>
        <td class="tb1"> <strong> 验证码：</strong> </td> <td> <input name="captchcode" type="text" size="8" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'"/>
        <?php
			$num = intval(mt_rand(100000,999999));
			for($i=0; $i<6; $i++)
			{
				echo "<img src=Images/code/".substr(strval($num),$i,1).".gif>";
			}
		?>
        <input type="hidden" value="<?php echo $num;?>" name="num" />
        </td>
    </tr>
    <tr>
    	<td> </td>
    	<td colspan="2" class="tb1"> <input type="submit" value="登入系统" /> </td>
    </tr>
</table>
<table border="0" width="350">
	<tr>
    	<td class="tbl"> <strong> <a href="userregister.php"> 注册 </a> </strong> </td>
        <td class="tbl"> <strong> <a href="reset.php"> 忘记密码 </a> </strong></td>
    </tr>
</table>
</form>
</td>
</tr>
</table>
</body>
</html>