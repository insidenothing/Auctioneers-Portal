<?
include 'header.php';
?><div style="padding:50px; font-size:18px;"><?
if ($_GET[action] == "confirm"){
	if ($_GET[position] == "1"){
		@mysql_query("UPDATE schedule_items SET auctioneer = '$user[available_string]' WHERE schedule_id = '$_GET[id]'");
	}elseif($_GET[position] == "2"){
		@mysql_query("UPDATE schedule_items SET auctioneer2 = '$user[available_string]' WHERE schedule_id = '$_GET[id]'");
	}else{
		@mysql_query("UPDATE schedule_items SET auctioneer3 = '$user[available_string]' WHERE schedule_id = '$_GET[id]'");
	}
echo "Thank You ".$user[name].", <br> You are now listed as available for this auction. It is now on your 'Available Auctions' schedule.";
auctioneer_log("Confirmed service request for auction #$_GET[id]", $user[auctioneer_id]);

$notes = $user[auctioneer].": Confirmed auctioneer service request on ".date('m/d/Y');

} else {
	if ($_GET[position] == "1"){
		@mysql_query("UPDATE schedule_items SET auctioneer = '$user[decline_string]' WHERE schedule_id = '$_GET[id]'");
	}elseif($_GET[position] == "2"){
		@mysql_query("UPDATE schedule_items SET auctioneer2 = '$user[decline_string]' WHERE schedule_id = '$_GET[id]'");
	}else{
		@mysql_query("UPDATE schedule_items SET auctioneer3 = '$user[decline_string]' WHERE schedule_id = '$_GET[id]'");
	}
echo "You have declined this auction.";
auctioneer_log("Declined service request for auction #$_GET[id]", $user[auctioneer_id]);

$notes = $user[auctioneer].": Declined auctioneerservice request on ".date('m/d/Y');
}
addNote($_GET[id],$notes);

?></div><?
include 'footer.php';
?>

