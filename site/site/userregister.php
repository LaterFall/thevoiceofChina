<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>中国好声音注册</title>
<style>
.tbl {
	font-size: 10px;
	width: 30%;
	text-align: right;
	background-color: #abcdeg;
}
.tb2 {
	font-size: 10px;
	width: 30%;
	text-align: center;
	background-color: #abcdeg;
}
</style>
<script language="javascript">
function chknc(nc)
{
	window.open("chkusername.php?nc="+nc,"newframe","width=200,height=10,left=500,top=200,menubar=no,toolbar=no,location=no,scrollbars=no,location=no");
}
</script>
<script language="javascript">
function chkinput(info)
{
	if(info.name.value=="")
	{
		alert("请输入用户名!");
		info.name.select();
		return(false);
	}
	if(info.password.value=="")
	{
	 	alert("请输入注册密码!");
	 	info.password.select();
		return(false);
	}
    if(info.password2.value=="")
	{
		alert("请输入确认密码!");
		info.password2.select();
	 	return(false);
	}	
	if(info.password.value.length<6)
	{
	 	alert("注册密码长度应不小于6位!");
	 	info.password.select();
	 	return(false);
	}	
	if(info.password.value!=info.password2.value)
	{
		alert("两次密码输入不同!");
	 	info.password.select();
	 	return(false);
	}
   	if(info.gender.value==0)
	{
		alert("请选择性别!");
	 	return(false);
	}
  	if(info.year.value==0)
	{
	 	alert("请输入出生年份!");
	 	return(false);
	}
  	if(info.month.value==0)
	{
	 	alert("请输入出生月份!");
	 	return(false);
	}
  	if(info.day.value==0)
	{
	 	alert("请输入出生天数!");
	 	return(false);
	}
  	if((info.question.value==0)&&(info.question2.value==""))
	{
	 	alert("请选择或输入密码提示!");
	 	info.question2.select();
	 	return(false);
	}
   	if(info.answer.value=="")	
    {
	 	alert("请输入密码提示答案!");
	 	info.answer.select();
	 	return(false);
	}
	if(info.tmpcode.value=="")
	{
		alert("请输入验证码!");
		info.tmpcode.select();
		return (false);
	}
 	return(true);
}
</script>
</head>
<body>
<form name="info" action="verification2.php" method="post" onsubmit="return chkinput(this)">
<table border="0">
	<tr>
    	<td class="tbl"> <strong> 用户名：</strong> </td> <td> <input name="name" type="text"  style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'"/>
        <input name="button1" type="button" onclick="chknc(info.name.value)" value="查看用户名是否已用"> </td>
    </tr>
	<tr>
    	<td class="tbl"> <strong> 密&nbsp;&nbsp;码：</strong> </td> <td> <input name="password" type="text"  style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'"/> </td>
    </tr>
    <tr>
    	<td class="tbl"> <strong> 确认密码：</strong> </td> <td> <input name="password2" type="text"  style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'"/> </td>
    </tr>
    <tr>
    	<td class="tbl"> <strong> 性别：</strong> </td>
        <td>
        	<select name="gender">
            <option selected value=0> 请选择性别 </option>
            <option value="男">男</option>
            <option value="女">女</option>
            </select>
    </tr>
    <tr>
    	<td class="tbl"> <strong> 生日：</strong> </td>
        <td>
        	<select name="year">
            <option selected value=0> 年 </option>
            <?php
				for($i=1950;$i<2050;$i++)
				{
					echo '<option value='.$i.'>'.$i.'</option>';
				}
			?>
            </select>
            <select name="month">
            <option selected value=0> 月 </option>
            <?php
				for($i=1;$i<13;$i++)
				{
					echo '<option value='.$i.'>'.$i.'</option>';
				}
			?>
            </select>
            <select name="day">
            <option selected value=0> 日 </option>
            <?php
				for($i=1;$i<32;$i++)
				{
					echo '<option value='.$i.'>'.$i.'</option>';
				}
			?>
            </select>
        </td>
    </tr>
    <tr>
    	<td class="tbl"> <strong> 密码提示：</strong> </td>
        <td>
        	<select name="question">
            <option selected value=0>请选择问题</option>
            <option value="您的生日">您的生日</option>
            <option value="你的爱好">你的爱好</option>
            <option value="您母亲的名字">您母亲的名字</option>
            <option value="您父亲的名字">您父亲的名字</option>
            <option value="您最喜欢的花">您最喜欢的花</option>
            </select>
        	<strong> 其他：</strong> <input name="question2" type="text"  style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'"/>
        </td>
    </tr>
    <tr>
    	<td class="tbl"> <strong> 提示答案：</strong> </td>
        <td> <input type="text" name="answer"  style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'"/> </td>
    </tr>
    <tr>
    	<td class="tbl"> <strong> 验证码：</strong> </td> <td> <input name="tmpcode" type="text" size="6" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'"/>
        <?php
			$num = intval(mt_rand(100000,999999));
			for($i=0; $i<6; $i++)
			{
				echo "<img src=Images/code/".substr(strval($num),$i,1).".gif>";
			}
		?>
        <input type="hidden" value="<?php echo $num;?>" name="num">
        </td>
    </tr>
</table>
<table border="0">
    <tr>
    	<td width="166"> <input type="submit" value="提交" /> </td>
        <td width="166"> <input type="reset" value="重置" /> </td>
    </tr>
</table>
<form>
</body>
</html>