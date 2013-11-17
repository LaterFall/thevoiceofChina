<?php require_once('Connections/webconn.php'); ?>
<?php require_once('Connections/webconn.php'); ?>
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

$maxRows_teacher_des = 10;
$pageNum_teacher_des = 0;
if (isset($_GET['pageNum_teacher_des'])) {
  $pageNum_teacher_des = $_GET['pageNum_teacher_des'];
}
$startRow_teacher_des = $pageNum_teacher_des * $maxRows_teacher_des;

$colname_teacher_des = "-1";
if (isset($_GET['vid'])) {
  $colname_teacher_des = $_GET['vid'];
}
mysql_select_db($database_webconn, $webconn);
$query_teacher_des = sprintf("SELECT * FROM teacher WHERE name = %s", GetSQLValueString($colname_teacher_des, "text"));
$query_limit_teacher_des = sprintf("%s LIMIT %d, %d", $query_teacher_des, $startRow_teacher_des, $maxRows_teacher_des);
$teacher_des = mysql_query($query_limit_teacher_des, $webconn) or die(mysql_error());
$row_teacher_des = mysql_fetch_assoc($teacher_des);

if (isset($_GET['totalRows_teacher_des'])) {
  $totalRows_teacher_des = $_GET['totalRows_teacher_des'];
} else {
  $all_teacher_des = mysql_query($query_teacher_des);
  $totalRows_teacher_des = mysql_num_rows($all_teacher_des);
}
$totalPages_teacher_des = ceil($totalRows_teacher_des/$maxRows_teacher_des)-1;

$colname_Teacher_des = "-1";
if (isset($_GET['vid'])) {
  $colname_Teacher_des = $_GET['vid'];
}
mysql_select_db($database_webconn, $webconn);
$query_Teacher_des = sprintf("SELECT * FROM teacher WHERE name = %s", GetSQLValueString($colname_Teacher_des, "text"));
$Teacher_des = mysql_query($query_Teacher_des, $webconn) or die(mysql_error());
$row_Teacher_des = mysql_fetch_assoc($Teacher_des);
$totalRows_Teacher_des = mysql_num_rows($Teacher_des);

mysql_select_db($database_webconn, $webconn);
$query_Teacher_desc = "SELECT * FROM teacher";
$Teacher_desc = mysql_query($query_Teacher_desc, $webconn) or die(mysql_error());
$row_Teacher_desc = mysql_fetch_assoc($Teacher_desc);
$totalRows_Teacher_desc = mysql_num_rows($Teacher_desc);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
.tb1 {	font-size: 10px;
	background-color: #abcdeg;
}
.tb2 {	font-size: 10px;
	width: 70%;
	background-color: #abcdeg;
}
</style>
</head>

<body>
<table width="766" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3" valign="bottom"><table width="766" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="224" height="83">&nbsp;</td>
        <td align="right"><p>&nbsp; </p>
          <table height="20" border="0" align="center" cellpadding="0" cellspacing="0">
            <form action="serchorder.php" method="post" name="form" id="form">
              <tr>
                <td width="81" height="30" align="right">&nbsp;</td>
                <td width="500" height="30" valign="middle" class="tb1"><div align="left"> &nbsp; <span> &nbsp;输入关键词：</span>
                  <input type="text" name="name" size="25" class="inputcss" style="background-color:#e8f4ff " onmouseover="this.style.backgroundColor='#ffffff'" onmouseout="this.style.backgroundColor='#e8f4ff'" />
                  <input name="submit" type="submit" value="搜索" />
                  <input name="button" type="button" onclick="javascript:window.location='highsearch.php';" value="高级搜索" />
                </div></td>
              </tr>
            </form>
          </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="568" height="32" bgcolor="#FFFFFF" class="tb2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="index.php"> 首　　页 </a> &nbsp; | &nbsp; <a href="match.php"> 赛事信息 </a> &nbsp; | &nbsp; <a href="teacher.php"> 导师信息 </a> &nbsp; | &nbsp; <a href="student.php"> 学员信息 </a>&nbsp; | &nbsp; <a href="vote.php"> 在线投票 </a></td>
    <td width="200" align="center" bgcolor="#FFFFFF"><?php
		if($_SESSION[username]!="")
		{
			echo "用户:$_SESSION[username]欢迎您";
		}
		else
		{
			echo "未登录";
		}
	?></td>
    <td width="77" bgcolor="#FFFFFF" align="center"><?php
		if($_SESSION[username]!="")
		{
	    	echo "<a href='exit.php'>注销离开</a>";
		}
	?></td>
  </tr>
</table>
<p>&nbsp;</p>
<form action="teacher.php"  id="form1" name="form1" method="post" onsubmit="return checkFormData()">
  <div align="center">
    <table width="993" border="1">
      <tr bgcolor="#FFFFFF">
        <td width="410"><img src="Images/1.jpg" alt="" width="410" height="345" longdesc="teacher_description.php" align="middle" /></td>
        <td>&nbsp;
          <table border="0">
            <tr>
              <td width="25"><div align="center">姓名</div></td>
              <td width="136"><?php echo $row_Teacher_desc['name']; ?></td>
              <td width="37">性别</td>
              <td width="124"><?php echo $row_Teacher_desc['sex']; ?></td>
              <td width="72">出生日期</td>
              <td width="182"><?php echo $row_Teacher_desc['year']; ?>-<?php echo $row_Teacher_desc['month']; ?>-<?php echo $row_Teacher_desc['day']; ?></td>
            </tr>
            <?php do { ?>
              <tr>
                <td colspan="6"><div align="center"></div>                  <div align="center"></div></td>
              </tr>
              <?php } while ($row_Teacher_desc = mysql_fetch_assoc($Teacher_desc)); ?>
        </table></td>
      </tr>
    </table>
  </div>
</form>
&nbsp;&nbsp;&nbsp;&nbsp;
</body>
</html>
<?php
mysql_free_result($teacher_des);

mysql_free_result($Teacher_des);

mysql_free_result($Teacher_desc);
?>
