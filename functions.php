<? 




// this is important code 
function hardLog($str,$type){
	if ($type == "user"){
		$log = "/logs/user.log";
	}
	// this is important code 
	if ($log){
		error_log("[".date('h:iA m/d/y')."] [".$_COOKIE[userdata][name]."] [".$_SERVER["REMOTE_ADDR"]."] [".trim($str)."]\n", 3, $log);
	}
	// this is important code 
}
// this is important code 
include 'functions-conversion.php';
include 'functions-database.php';
include 'functions-design.php';
include 'functions-search.php';
include 'functions-email.php';
include 'functions-calendar.php';
include 'functions-compression.php';
include 'functions-this2that.php';
include 'functions-list.php';
include 'functions-ps.php';
function washURI($uri){
	$uri=str_replace('portal//var/www/dataFiles/auction/packets','PACKETS',$uri); // tempest uploads
	$uri=str_replace('portal//data/auction/packets','PACKETS',$uri); // delta uploads
	$uri=str_replace('alpha.mdwestserve.com','mdwestserve.com',$uri);
	$uri=str_replace('mdwestserve.com','hwa1.hwestauctions.com',$uri);
	$uri = str_replace('http://portal.hwestauctions.com//data/auction/packets/','http://hwestauctions.com/PACKETS/',$uri); 

	return $uri;
}
?>