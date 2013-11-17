<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_webconn = "localhost";
$database_webconn = "phpmyadmin";
$username_webconn = "root";
$password_webconn = "clqiu";
$webconn = mysql_pconnect($hostname_webconn, $username_webconn, $password_webconn) or die("数据库服务器连接错误".mysql_error()); 
mysql_select_db($database_webconn,$webconn) or die("数据库访问错误".mysql_error());
mysql_query("set names utf8");
?>