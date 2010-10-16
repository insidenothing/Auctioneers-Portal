<?
include 'header.php';
auctioneer_log("Loaded 'Feedback'", $user[auctioneer_id]);


if ($_POST[submit]){
$headers  = "MIME-Version: 1.0 \n";
$headers .= "Content-type: text/html; charset=iso-8859-1 \n";
$headers .= "From: $_POST[name] <$_POST[email]> \n";
$headers .= "Cc: HWA Archive <hwa.archive@gmail.com> \n";
auctioneer_log("Sent IT Dept Email", $user[auctioneer_id]);


mail("Zach <zach@hwestauctions.com>","Extranet Interface Feedback",addslashes($_POST[message]),$headers);


echo "<h3 align='center'>Thank you, your message has been sent.</h3>";
}
?>


<form method="post">
<input type="hidden" name="name" value="<?=$user[name]?>">
<input type="hidden" name="email" value="<?=$user[email]?>">
<table align="center">
	<tr>
		<td>To:</td>
		<td><strong><em>I.T. Department</em></strong></td>
	</tr>		
	<tr>
		<td>From:</td>
		<td><strong><em><?=$user[name]?> &lt;<?=$user[email]?>&gt;</em></strong></td>
	</tr>		
	<tr>
		<td>Subject:</td>
		<td><strong><em>Extranet Interface Feedback</em></strong></td>
	</tr>		
	<tr>
		<td colspan="2"><textarea cols="75" rows="8" name="message"></textarea></td>
	</tr>		
	<tr>
		<td colspan="2" align="right"><input type="submit" name="submit" value="Send" /></td>
	</tr>		
</table>


<?
include 'footer.php';
?>
