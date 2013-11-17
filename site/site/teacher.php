<?php
	header('Content-Type:text/html; charset=utf-8');
	session_start();
	if($_SESSION[username]=="")
	{
		echo "<script>alert('请登录后在访问！');history.back();</script>";
		exit;
	}
?>
<table width="766" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
	<td> <?php include("top.php"); ?> </td>
</tr>
</table>
<div align="center">
  <map name="MapMap" id="MapMap">
    <area shape="rect" coords="48,70,244,245" href="#" />
  </map>
  <table width="870" border="1">
    <tr>
      <td width="135"><div align="center">导师</div></td>
      <td width="123"><div align="center">性别</div></td>
      <td width="480"><div align="center">年-月-日</div>
        <div align="center"></div>
        <div align="center"></div></td>
      <td width="104"><div align="center">详细介绍</div></td>
    </tr>
    <?php do { ?>
      <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
      </tr>
      <tr>
      <td><?php echo $row_Teacher_intro['name']; ?></td>
      <td><?php echo $row_Teacher_intro['sex']; ?></td>
      <td><div align="center"><?php echo $row_Teacher_intro['year']; ?>-<?php echo $row_Teacher_intro['month']; ?>-<?php echo $row_Teacher_intro['day']; ?></div></td>
      <td><div align="center"><a href="teacher_description.php?vid=<?php echo $row_Vote_N['name'];?>">介绍</a></div></td>
    </tr>
    <?php } while ($row_Teacher_intro = mysql_fetch_assoc($Teacher_intro)); ?>
  </table>
  <?php
mysql_free_result($Teacher_intro);
?>
</div>
