<?php require_once('Connections/webconn.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_webconn, $webconn);
$query_Teacher_intro = "SELECT * FROM teacher";
$Teacher_intro = mysql_query($query_Teacher_intro, $webconn) or die(mysql_error());
$row_Teacher_intro = mysql_fetch_assoc($Teacher_intro);
$totalRows_Teacher_intro = mysql_num_rows($Teacher_intro);

   session_start();
   include("Connections/webconn.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
.tb1 {
	font-size: 10px;
	background-color: #abcdeg;
}
.tb2 {
	font-size: 10px;
	width: 70%;
	background-color: #abcdeg;
}
</style>
</head>
<body>
<table width="766" border="1" align="center" cellpadding="0" cellspacing="0">
<tr>
    <td colspan="3" valign="bottom"> <table width="766" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
    	<td width="224" height="83">&nbsp;  </td>
        <td align="right"> <p>&nbsp;  </p> <table height="20" border="0" align="center" cellpadding="0" cellspacing="0">
        <form name="form" method="post" action="serchorder.php">
        <tr>
			<td width="81" height="30" align="right">&nbsp;  </td>
			<td width="500" height="30" valign="middle" class="tb1"> <div align="left"> &nbsp; <span> &nbsp;输入关键词：</span>
			<input type="text" name="name" size="25" class="inputcss" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'">
			<input name="submit" type="submit" value="搜索">
			<input name="button" type="button" onClick="javascript:window.location='highsearch.php';" value="高级搜索">
			</div> </td>
        </tr>
        </form>
        </table> </td>
	</tr>
    </table> </td>
</tr>
<tr>
	<td width="568" height="32" bgcolor="#FFFFFF" class="tb2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="index.php"> 首　　页 </a> &nbsp; | &nbsp; <a href="match.php"> 赛事信息 </a> &nbsp; | &nbsp; <a href="teacher.php"> 导师信息 </a> &nbsp; | &nbsp; <a href="student.php"> 学员信息 </a>&nbsp; | &nbsp; <a href="vote.php"> 在线投票 </a> </td>
    <td width="200" align="center" bgcolor="#FFFFFF">
    <?php
		if($_SESSION[username]!="")
		{
			echo "用户:$_SESSION[username]欢迎您";
		}
		else
		{
			echo "未登录";
		}
	?>
    </td>
    <td width="77" bgcolor="#FFFFFF" align="center"> 
	<?php
		if($_SESSION[username]!="")
		{
	    	echo "<a href='exit.php'>注销离开</a>";
		}
	?>
    </td>
</tr>
</table>
<div align="center">
  <map name="Map">
    <area shape="rect" coords="48,70,244,245" href="#">
  </map>
</div>
