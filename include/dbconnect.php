<?
include("include/config.php");

$db = mysql_connect("$hostname", "$user","$pass") or die(mysql_error());
mysql_select_db("$database",$db) or die(mysql_error());

?>