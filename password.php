<?
//this file will set a user's password and e-mail it to them. will also work for forgotten passwords
include 'functions.php';
db_connect('hwa1.hwestauctions.com','intranet','','');

function mkPass(){
	return rand(1000,9999);
}

if ($_POST[submit]){
	$email = $_POST[email];
	$pass = mkPass();
	$q="SELECT * FROM auctioneers WHERE email = '$email'";
	$r=@mysql_query($q) or die(mysql_error());
	if ($data = mysql_fetch_array($r, MYSQL_ASSOC)){

	
	@mysql_query("UPDATE auctioneers SET password ='$pass' WHERE email = '$email'");
	//portal_log("Password reset for $email", $data[contact_id]);

	$body = "Your new Harvey West Auctioneer Portal password has arrived!<br>
			You can log in at http://www.hwestauctions.com/auctioneer<br>
			E-Mail Address: $email<br>
			Password: $pass<br><br>
			
			Thank you,<br>
			Harvey West Auctioneer Server";
			$subject = "New Harvey West Auctioneer Portal Password";
			$headers  = "MIME-Version: 1.0 \n";
			$headers .= "Content-type: text/html; charset=iso-8859-1 \n";
			$headers .= "From: Patrick McGuire <patrick@mdwestserve.com> \n";
			//$headers .= "Bcc: Zach <zach@hwestauctions.com> \n";
			
			
			
			if (mail($email,$subject,$body,$headers)) {
				echo("<p>Message successfully sent!</p>");
			} else {
				echo("<p>Message delivery failed...</p>");
			}
			
			
		$status = "Your New Password Was Sent To $_POST[email]";
	}else{
		portal_log("$email not found...", 0);

		$status = "$_POST[email] Not Found, Contact Patrick For Help";
	}

}
if ($status){
?>
<h1 align="center"><?=$status?></h1>
<? }?>
<div align="center" style="font-size:20px">Please enter your email address below to have your new password sent.</div> 
<br /><br />
<form method="post">
<table align="center">
	<tr style="font-size:20px">
    	<td>E-Mail Address: </td>
    	<td> <input name="email" size="50"></td>
	</tr>
    <tr>
    	<td colspan="2" align="center"><br /><br /><input type="submit" name="submit" value="Click Here to Send Password" /></td>
    </tr>
</table>
</form><br />
<div align="center" style="font-size:20px">Your password should arrive within 5 minutes.</div>



<br /><br /><center><a href="index.php">LOG IN HERE</a></center>

<?
include 'footer.php';
?>
