<?php
include("Connections/webconn.php");
$a = "";
$vid = "";
//if ( !isset ( $_SESSION ) ) session_start();
//if ( isset ( $_POST["btnVoting"] ) ) {
  $a = $_POST["button"];
  $vid = $_POST["hidVoteId"];
  if ( !isset ( $_SESSION["IsVoted"] ) ) {
    $link = mysql_connect ( "localhost", "root", "clqiu" ) or die ( mysql_error() );
    mysql_select_db ( "student" );
    for ( $i = 0; $i < count ( $a ); $i++ ) {
      mysql_query("UPDATE student SET c_num=c_num+1 where name='".$vid."'",$webconn);
      //echo $sql . "<br>"  ;
	}
  }
//  $_SESSION["IsVoted"] = true;
//}
header ( "Location: result.php?vid={$vid}" );
?>