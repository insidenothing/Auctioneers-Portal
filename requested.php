<?
include 'header.php';
$todays_date = date("Y-m-d"); 
$today = strtotime($todays_date); 
auctioneer_log("Viewing Requested Schedule", $user[auctioneer_id]);
$q="SELECT * FROM schedule_items WHERE (auctioneer='$user[requested_string]' OR auctioneer2='$user[requested_string]' OR auctioneer3='$user[requested_string]') AND item_status = 'On Schedule' AND sale_date >= '$todays_date' ORDER BY sale_date, sort_time";
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
        <td>Actions</td>
	</tr>
<? while ($d=mysql_fetch_array($r, MYSQL_ASSOC)){?>
<?
		$expiration_date = strtotime($d[sale_date]); 
		if ($expiration_date > $today) { 
?>
	<tr>
    	<td><?=$d[sale_date]?></td>
    	<td><?=$d[sale_time]?></td>
    	<td><?=$d[court]?></td>
    	<td><?=id2attorneys($d[attorneys_id])?></td>
    	<td><?=$d[auctioneer]?></td>
    	<td><?=$d[auctioneer2]?>&nbsp;</td>
    	<td><?=$d[auctioneer3]?>&nbsp;</td>
        <?
        
		if ($d[auctioneer] == $user[requested_string]){
		$pos = "1";
        }
		if ($d[auctioneer2] == $user[requested_string]){
		$pos = "2";
        }
		if ($d[auctioneer3] == $user[requested_string]){
		$pos = "3";
        }
        ?>
        <td><a href="confirm.php?position=<?=$pos?>&id=<?=$d[schedule_id]?>&action=confirm&uid=<?=$_GET[uid]?>">[confirm]</a> <a href="confirm.php?position=<?=$pos?>&id=<?=$d[schedule_id]?>&action=decline&uid=<?=$_GET[uid]?>">[decline]</a></td>
	</tr>
<? 
		}
	}
 ?>
</table>
<?
include 'footer.php';
?>



