<?
include 'functions.php';

mysql_connect();
mysql_select_db('intranet');

include 'security.php';
onlineAuctioneer($user[auctioneer_id]);
?>
<style>
body {margin:0px; padding:0px;}
a {text-decoration:none; color:#000099; font-weight:bold;}
a:hover {text-decoration:none; color:#000000; font-weight:bold;}
/*td {border-left:solid; border-right:solid; border-right-width:1px; border-left-width:1px;}*/

</style>
 
<?
include 'menu.php';
?>