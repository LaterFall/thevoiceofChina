<?php require_once('../Connections/webconn.php'); ?>
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
$query_Vote_N = "SELECT name, c_num FROM student";
$Vote_N = mysql_query($query_Vote_N, $webconn) or die(mysql_error());
$row_Vote_N = mysql_fetch_assoc($Vote_N);
$totalRows_Vote_N = mysql_num_rows($Vote_N);

	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>投票系统</title>

</head>
<body>
<table width="1000" height="37" border="0" align="center">
  <tr>
    <td width="455" height="51" bgcolor="#FFFFFF"><h1><strong><em>投票</em></strong><em>管理</em></h1></td>
    <td width="393"><div align="right"> 
      <p><var>
      <?php echo date("Y年n月j日"); ?>
      </var></p>
    </div></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="1000" border="0" align="center">
  <tr>
    <td width="301"><div align="center">学员姓名</div></td>
    <td width="327"><div align="center">当前票数</div></td>
    <td width="358"><div align="center">选择操作</div></td>
  </tr>
  <?php do { ?>
    <tr>
      <td><div align="center">
        <?php if ($totalRows_Vote_N > 0) { // Show if recordset not empty ?>
          <?php echo $row_Vote_N['name']; ?>
          <?php } // Show if recordset not empty ?>
      </div></td>
      <td><div align="center">
        <?php if ($totalRows_Vote_N > 0) { // Show if recordset not empty ?>
          <?php echo $row_Vote_N['c_num']; ?>
          <?php } // Show if recordset not empty ?>
      </div></td>
      <td colspan="5"><div align="center">
        <blockquote>
      <blockquote>      <div align="center"><a href="../voting.php?vid=<?php echo $row_rsVote['name']; ?>" title="我要投票">我要投票</a>&nbsp;<a href="../result.php?vid=<?php echo $row_Vote_N['name']; ?>"">查看结果</a>      
          </div></td>
    </tr>
    <?php } while ($row_Vote_N = mysql_fetch_assoc($Vote_N)); ?>
</table>
<?php if ($totalRows_Vote_N == 0) { // Show if recordset empty ?>
  <table width="450" border="1" align="center">
    <tr>
      <th scope="col">提示信息</th>
    </tr>
    <tr>
      <th width="10" height="179" scope="col"><p>投票已结束或暂时不能投票！</p>
      <p>&nbsp;</p></th>
    </tr>
  </table>
  <?php } // Show if recordset empty ?>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Vote_N);
?>
