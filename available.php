<?
include 'header.php';
$todays_date = date("Y-m-d"); 
$today = strtotime($todays_date); 
auctioneer_log("Viewing Available Schedule", $user[auctioneer_id]);
$q="SELECT * FROM schedule_items WHERE (auctioneer='$user[available_string]' OR auctioneer2='$user[available_string]' OR auctioneer3='$user[available_string]' ) AND item_status = 'ON SCHEDULE' AND sale_date >= '$todays_date' ORDER BY sale_date, sort_time ";
$r=@mysql_query($q) or die(mysql_error());
?>
<style>
td{border-bottom:solid; border-bottom-width:1px;}
</style>
<table width="100%" cellspacing="0">
	<tr>
    	<td>Date</td>
    	<td>Time</td>
    	<td>County</td>
    	<td>Attorney</td>
    	<td>Auctioneer(s)</td>
    	<td>&nbsp;</td>
    	<td>&nbsp;</td>
	</tr>
<? while ($d=mysql_fetch_array($r, MYSQL_ASSOC)){?>
<?
		$expiration_date = strtotime($d[sale_date]); 
		if ($expiration_date > $today) { 
?>
	<tr>
    	<td><?=$d[sale_date]?></td>
    	<td><?=$d[sale_time]?></td>
    	<td><?=$d[county]?></td>
    	<td><?=id2attorneys($d[attorneys_id])?></td>
    	<td><?=$d[auctioneer]?></td>
    	<td><?=$d[auctioneer2]?>&nbsp;</td>
    	<td><?=$d[auctioneer3]?>&nbsp;</td>
	</tr>
<? 
		}
	}
 ?>
</table>
<?
include 'footer.php';
?>



