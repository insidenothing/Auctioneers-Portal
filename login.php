<?
session_start();
include 'functions.php';
//db_connect('hwa1.hwestauctions.com','intranet','','');
mysql_connect('hwa1.hwestauctions.com','','');
mysql_select_db ('intranet');

if (($_POST[email] && $_POST[password]) || ($_GET[email] && $_GET[password]) ){
	if ($_POST[email]){ $email = $_POST[email]; }else{ $email = $_GET[email];}
	if ($_POST[password]){ $pass = $_POST[password];}else{$pass = $_GET[password]; }
	$q1 = "SELECT * FROM auctioneers WHERE email = '$email' AND password = '$pass'";		
	$r1 = @mysql_query ($q1) or die(mysql_error());
	if ($data = mysql_fetch_array($r1, MYSQL_ASSOC)){
		$uid = uid($email,$pass);
		$ip=$_SERVER['REMOTE_ADDR'];
		//auctioneer_log("$data[auctioneer] Logged In ($uid)", $data[auctioneer_id]);
		@mysql_query("UPDATE auctioneers SET uid='$uid', uid_date=NOW(), uid_ip='$ip' WHERE email = '$email'");
		//mail('zach@hwestauctions.com',"IN: $data[name]",'');
		header ('Location: index.php?uid='.$uid);
	} else {
		//auctioneer_log("Attempted Login by $email using $pass", 0);
		$error = "Invalid E-Mail Address and/or Password";
	}
}

?>

<br />
<br />


<form method="post">
<table align="center" height="300" style="font-size:24px">
	<? if ($error){?>
	<tr bgcolor="#FFCC33">
		<td colspan="2" align="center"><?=$error;?></td>
	</tr>
	<? }?>	
	<tr>
		<td>E-Mail Address</td>
		<td><input name="email" size="30"></td>
	</tr>	
	<tr>
		<td>Password</td>
		<td><input name="password" type="password"></td>
	</tr>		
	<tr>
		<td colspan="2" align="center"><input type="submit" name="submit" value="Log In"></td>
	</tr>	
	<tr> 
		<td colspan="2" align="center"><a href="password.php">Forgot Password | Request Password</a></td>
	</tr>	
</table>
</form>
<?
include 'footer.php';
?>
<center>
<?
if ($_COOKIE[test]){
echo $_COOKIE[test];
}else{
echo "Cookies Disabled";
error_out('Cookies Disabled');
}
?>
</center>