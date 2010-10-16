<?
if (!$_GET[uid]){
	if (!$_POST[uid]){
	auctioneer_log("Security Active :: UID Not Found", 0);
	header ('Location: login.php');
}}
if ($_GET[uid]){
	$q1 = "SELECT * FROM auctioneers WHERE uid = '$_GET[uid]'";		
	$r1 = @mysql_query ($q1) or die(mysql_error());
	$user = mysql_fetch_array($r1, MYSQL_ASSOC);
}
?>