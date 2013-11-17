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

$colname_Vote_c = "-1";
if (isset($_GET['vid'])) {
  $colname_Vote_c = $_GET['vid'];
}
mysql_select_db($database_webconn, $webconn);
$query_Vote_c = sprintf("SELECT * FROM student WHERE name = %s", GetSQLValueString($colname_Vote_c, "text"));
$Vote_c = mysql_query($query_Vote_c, $webconn) or die(mysql_error());
$row_Vote_c = mysql_fetch_assoc($Vote_c);
$totalRows_Vote_c = mysql_num_rows($Vote_c);

$colname_Result_r = "-1";
if (isset($_GET['vid'])) {
  $colname_Result_r = $_GET['vid'];
}
mysql_select_db($database_webconn, $webconn);
$query_Result_r = sprintf("SELECT * FROM student WHERE name = %s ORDER BY c_num ASC", GetSQLValueString($colname_Result_r, "text"));
$Result_r = mysql_query($query_Result_r, $webconn) or die(mysql_error());
$row_Result_r = mysql_fetch_assoc($Result_r);
$totalRows_Result_r = mysql_num_rows($Result_r);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<table width="1000" height="37" border="0" align="center">
  <tr>
    <td width="455" height="51" bgcolor="#FFFFFF"><h1><strong>在线投票</strong></h1></td>
    <td width="393"><div align="right">
      <p>首页</p>
    </div></td>
    <td width="393"><div align="right"> <em>
     <?php echo date("Y年n月j日"); ?>
    </em> </div></td>
  </tr>
</table>
<table width="800" border="1" align="center" height="100">
  <tr>
    <th scope="col">学员</th>
    <th scope="col"><div align="center">得票数</div></th>
  </tr>
  <tr>
    <td><div align="center"><?php echo $row_Result_r['name']; ?></div></td>
    <td><img src="graph.php?width=<?php echo 200 * $row_Result_r['name']; ?>&amp;text=<?php echo $row_Result_r['c_num'] . " 票"; ?>" alt="票数" align="middle" /></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Vote_c);

mysql_free_result($Result_r);
?>
