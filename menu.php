<? $mouseover = "onmouseover=\"style.backgroundColor='#FFFF00';\" onmouseout=\"style.backgroundColor='#FFFFFF'\"";
?>
<table width="100%" style=" border-collapse:collapse; font-variant:small-caps" border="0">
	<tr>
        <td <?=$mouseover;?> style="text-align:center"><a href="index.php?uid=<?=$_GET[uid]?>">Home</a></td>
		<td <?=$mouseover;?> style="text-align:center"><a href="feedback.php?uid=<?=$_GET[uid]?>">Feedback</a></td>
		<td <?=$mouseover;?> style="text-align:center"><a href="confirmed.php?uid=<?=$_GET[uid]?>">Confirmed Auctions</a></td>
		<td <?=$mouseover;?> style="text-align:center"><a href="available.php?uid=<?=$_GET[uid]?>">Available Auctions</a></td>
		
        <?
	//if ($user[acutioneer_id] == "3" || $user[acutioneer_id] == "4" || $user[acutioneer_id] == "5"){			
        ?>
        <td <?=$mouseover;?> style="text-align:center"><a href="requested.php?uid=<?=$_GET[uid]?>">Request for your Services</a></td>
        <? //}?>
		<td <?=$mouseover;?> style="text-align:center"><a href="logout.php?uid=<?=$_GET[uid]?>">Exit</a></td>
	</tr>
</table>
