<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table border="1" width="210" cellpadding="0" cellspacing="0">
<tr>
	<td align="center" height="50"> <input type="button" value=" 用户登陆 " onClick="javascript:window.location='userlogin.php';" /> </td>
	<td align="center" height="50"> <input type="button" value="管理员登陆" onClick="javascript:window.location='adminlogin.php';" /> </td>
</tr>
<tr>
	<td align="center" height="50"> <input type="button" value=" 学员登陆 " onClick="javascript:window.location='userlogin.php';" /> </td>
    <td align="center" height="50"> <input type="button" value=" 导师登陆 " onClick="javascript:window.location='userlogin.php';" /> </td>
</tr>
<tr>
	<td colspan="2" align="center">
<?php
	if(!empty($_GET))
	{
    	$year = $_GET['year'];
    	$month = $_GET['month'];
	}
	if(empty($year))
	{
    	$year = date('Y');
	}
	if(empty($month))
	{
    	$month = date('m');
	}
	$start_weekday = date('w',mktime(0,0,0,$month,1,$year));
	$days = date('t',mktime(0,0,0,$month,1,$year));
	$week = array('日','一','二','三','四','五','六');
	$i = 0;
	$k = 1;
	$j = 0;
	echo '<table border = "1">';
	echo '<tr><td colspan = 7 style = "text-align:center">'.$year.'年'.$month.'月'.'</td></tr>';
	echo '<tr>';
	for($i = 0;$i < 7;$i++)
	{
    	echo '<td>'.$week[$i].'</td>';
	}
	echo '</tr>';
	echo '<tr>';
	for($j = 0;$j < $start_weekday;$j++)
	{
    	echo '<td style="color:#FFFFFF">'.$j.'</td>';
	}
	while($k <= $days)
	{
    	if($k == date('d') && $year == date('Y') && $month == date('m'))
		{
        	echo '<td style="color:red">'.$k.'</td>';
    	}
		else
		{
        	echo '<td>'.$k.'</td>';
    	}
    	if(($j+1) % 7 == 0)
		{
        	echo '</tr><tr>';
    	}
    	$j++;
    	$k++;
	}
	while($j % 7 != 0)
	{
    	echo '<td style="color:#FFFFFF">'.$j.'</td>';
    	$j++;
	}
	echo '</tr>';
	echo '<tr>';
	echo '<td colspan = 6 style = "text-align:center">';
	echo '<form name = "myform" method = "GET">';
	echo '<select name = year >';
	for($start_year = 1970;$start_year<2039;$start_year++)
	{
 		echo '<option value ='. $start_year.'>'.$start_year.'</option>';
	}
	echo '</select>'.'年';
	echo '<select name = month>';
	for($start_month = 1;$start_month<=12;$start_month++)
	{
 		echo '<option value = '.$start_month.'>'.$start_month.'</option>';
	}
	echo '</select>';
	echo '月';
	echo '<input type = "submit" name = "search" value = "查询">';
	echo '</form>';
	echo '<td>';
	echo '<form name = "myform2" method = "GET">';
	$year = date('Y');
	$month = date('m');
	echo '<input type = "submit" value = "当前">';
	echo '</form>';
	echo '</td>';
	echo '</tr>';
	echo '</table>';
?>
    </td>
</tr>
</table>