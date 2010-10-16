<?

function getLnL($address){
$address = str_replace(' ','+',$address);
$key = "ABQIAAAA8yH4sz3KTLMIhZ9V81HVqBQso08lYJ1q7ZFMltqpfDEr9X0BYxR_WOQKemPMetn4D8Tb4vFgyMtEjA";
   $curl = curl_init();
   curl_setopt ($curl, CURLOPT_URL, "http://maps.google.com/maps/geo?q=$address&output=csv&key=$key");
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   $result = curl_exec ($curl);
   curl_close ($curl);
   $data = explode(',',$result);
   return $data;
}

// watch page load times
function svcLink($file){
mysql_select_db ('core');
if ($file){
	$r=@mysql_query("select filing_status, client_file, state1, packet_id, service_status, timeline from ps_packets where client_file like '%$file%' and state1 = 'MD'");
	while($d=mysql_fetch_array($r,MYSQL_ASSOC)){
		$timeline = $d[timeline];
		if ($d[filing_status] == "FILED WITH COURT" ){ $return .= "<a class=info style='background-color:#00FF00'>$d[packet_id]: FLD<span>$timeline</span></a> ";} 
		elseif($d[filing_status] == "FILED WITH COURT - FBS"){ $return .= "<a class=info style='background-color:#00FF00'>$d[packet_id]: FLD<span>$timeline</span></a> ";}
		elseif($d[filing_status] == "PREP TO FILE"){ $return .= "<a class=info style='background-color:#FFFF00'>$d[packet_id]: PRP<span>$timeline</span></a> ";}
		elseif($d[service_status] == "CANCELLED"){ $return .= "<a class=info style='background-color:#FF0000'>$d[packet_id]: CNC<span>$timeline</span></a> ";}
		elseif($d[packet_id]){ $return .= "<a class=info style='background-color:#000000; color:#FFFFFF;'>$d[packet_id]: SVC<span>$timeline</span></a> ";}
	}
	return $return;
}
mysql_select_db ('intranet');
}



function knownip($ip){
	$q= "SELECT * FROM knownip where ip='$ip'";
	$r = @mysql_query($q) or die(mysql_error());
	$d = mysql_fetch_array($r, MYSQL_ASSOC);
	
	if ($d[name]){
	$name = $d[name];
	}else{
	$name = $ip;
	}
	return $name;
}
function address($name){

$q = "SELECT google FROM county WHERE name='$name'";
$r = @mysql_query($q);
$d = mysql_fetch_array($r, MYSQL_ASSOC);
return $d[google];
}

?>