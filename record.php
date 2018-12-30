<?php
	$REMOTE_ADDR = $_SERVER['REMOTE_ADDR']; 
	$REMOTE_HOST = $_SERVER['REMOTE_HOST']; 
	$REMOTE_PORT = $_SERVER['REMOTE_PORT']; 
	$REMOTE_USER = $_SERVER['REMOTE_USER']; 
	$HTTP_USER_AGENT = $_SERVER['HTTP_USER_AGENT'];

	//RECORD TIMES
	$timezone = date_default_timezone_get();
	$datetimes = date('Y/n/d H:i:s');
	$accesstimes = $timezone . ' ' . $datetimes;

	//getlocations - get from the geo.php data
	$location = $_GET['geos'];

	//DB connection change your info and create the following table
  $dbhost = 'localhost';
	$dbname = 'target_data';
	$dbtable = 'targetinfo';
	$dbuname = 'root';
	$dbpwd = 'password';

	$conn = mysqli_connect($dbhost, $dbuname, $dbpwd, $dbname);
		if ($conn) {
			$insert = "INSERT INTO `targetinfo` (`id`, `targetip`, `target_remote_host`, `target_remote_port`, `target_remote_user`, `target_user_agent`, `target_request_time`, `target_locations`) VALUES (NULL, '$REMOTE_ADDR', '$REMOTE_HOST', '$REMOTE_PORT', '$REMOTE_USER', '$HTTP_USER_AGENT', '$accesstimes', '$location')";
			mysqli_query($conn, $insert);
		} else {
			echo "ERROR: " + mysql_error($insert);
		}
	mysqli_close($conn);
	?>
