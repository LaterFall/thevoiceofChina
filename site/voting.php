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

$currentPage = $_SERVER["PHP_SELF"];

$colname_Vote_c = "-1";
if (isset($_GET['vid'])) {
  $colname_Vote_c = $_GET['vid'];
}
mysql_select_db($database_webconn, $webconn);
$query_Vote_c = sprintf("SELECT * FROM student WHERE name = %s", GetSQLValueString($colname_Vote_c, "text"));
$Vote_c = mysql_query($query_Vote_c, $webconn) or die(mysql_error());
$row_Vote_c = mysql_fetch_assoc($Vote_c);
$totalRows_Vote_c = mysql_num_rows($Vote_c);

$maxRows_Vote_C = 4;
$pageNum_Vote_C = 0;
if (isset($_GET['pageNum_Vote_C'])) {
  $pageNum_Vote_C = $_GET['pageNum_Vote_C'];
}
$startRow_Vote_C = $pageNum_Vote_C * $maxRows_Vote_C;

$colname_Vote_C = "-1";
if (isset($_GET['vid'])) {
  $colname_Vote_C = $_GET['vid'];
}
mysql_select_db($database_webconn, $webconn);
$query_Vote_C = sprintf("SELECT * FROM student WHERE name = %s", GetSQLValueString($colname_Vote_C, "text"));
$query_limit_Vote_C = sprintf("%s LIMIT %d, %d", $query_Vote_C, $startRow_Vote_C, $maxRows_Vote_C);
$Vote_C = mysql_query($query_limit_Vote_C, $webconn) or die(mysql_error());
$row_Vote_C = mysql_fetch_assoc($Vote_C);

if (isset($_GET['totalRows_Vote_C'])) {
  $totalRows_Vote_C = $_GET['totalRows_Vote_C'];
} else {
  $all_Vote_C = mysql_query($query_Vote_C);
  $totalRows_Vote_C = mysql_num_rows($all_Vote_C);
}
$totalPages_Vote_C = ceil($totalRows_Vote_C/$maxRows_Vote_C)-1;

$queryString_Vote_C = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Vote_C") == false && 
        stristr($param, "totalRows_Vote_C") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Vote_C = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Vote_C = sprintf("&totalRows_Vote_C=%d%s", $totalRows_Vote_C, $queryString_Vote_C);
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
    <td width="393"><div align="right">
      <em>
     <?php echo date("Y年n月j日"); ?></em>
    </div></td>
  </tr>
</table>
<form action="addcount.php" method="post" name="form1" id="form1" onsubmit="return checkFormData()">
  <table border="1" align="center">
    <tr>
      <td height="50" colspan="3"><div align="center"><?php echo $row_Vote_C['name']; ?></div></td>
    </tr>
    <?php do { ?>
      <tr>
        <td width="145" height="60"><div align="center"><?php echo $row_Vote_C['c_num']; ?></div></td>
        <td width="196"><div align="center"><?php echo $row_Vote_C['current']; ?></div></td>
        <td width="218"><div align="center"><?php echo $row_Vote_C['song']; ?></div></td>
      </tr>
      <tr>
        <td height="100" colspan="3"><div align="center">
          <input name="hidVoteId" type="hidden" id="hidVoteId" value="<?php echo $_GET["vid"]; ?>" />
          <input type="submit" name="button" id="button"onclick="result(<?php echo $_GET["vid"]; ?>);"  value="提交" />&nbsp;
          <input type="button" name="button2" id="button2"onclick="result(<?php echo $_GET["vid"]; ?>);" value="查看结果" />
            </div>
        </label></td>
      </tr>
      <?php } while ($row_Vote_C = mysql_fetch_assoc($Vote_C)); ?>
  </table>
</form>
<h1>&nbsp;</h1>
</body>
</html>
<?php
mysql_free_result($Vote_c);

mysql_free_result($Vote_C);
?>
