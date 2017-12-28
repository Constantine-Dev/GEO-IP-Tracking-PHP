<html>
<head>
<title>Demo</title>
</head>
<body onLoad()="iptrack.php">



<table border="1" style="display:none;">
  <tr>
    <td width="150">目標IP</td>
    <td width="90%" name="targetip"><?php echo $targetip = $_SERVER['REMOTE_ADDR']; ?></td>
  </tr>
  <tr>
    <td>登入Port</td>
    <td><?php echo $remote_port = $_SERVER['REMOTE_PORT']; ?></td>
  </tr>
  <td>服務Port</td>
    <td><?php echo $services_port = $_SERVER['SERVER_PORT']; ?></td>
  </tr>
  <tr>
    <td>登入時間</td>
    <td>
		<?php 
			date_default_timezone_set("Asia/Hong_Kong");
			echo $accessdatetime = date("Y-m-d H:i:s");
	 	?>
     </td>
  </tr>
  <tr>
    <td>登入軟件</td>
    <td><?php echo $user_agent = $_SERVER['HTTP_USER_AGENT']; ?></td>
  </tr>
  <tr>
    <td>登入代理</td>
    <td></td>
  </tr>
  
  <tr>
    <td>伺服器IP</td>
    <td><?php echo $server_addr = $_SERVER['SERVER_ADDR']; ?></td>
  </tr>
  <tr>
    <td>目標語言</td>
    <td><?php echo $language = $_SERVER['HTTP_ACCEPT_LANGUAGE']; ?><br></td>
  </tr>
  <tr>
    <td>GEO Location's</td>
    <td></td>
  </tr>
  <tr>
    <td align="center">
    <form action="#">
      <input type="submit" name="submit" id="submit" value="SUBMIT" />
    </form>
    </td>
    <td>&nbsp;</td>
  </tr>
  
</table>
<?php
$servername = "localhost";
$username = "db_uname";
$password = "db_password";
$dbname = "db_name";
$dbtable = "db_table";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO `$dbtable` (`ID`, `target_ip`, `targetaccess_port`, `targetserver_port`, `access_time`, `user_agent`, `redirect_remote_user`, `server_address`, `target_language`, `geo_local`) VALUES 

                                 (NULL, '$targetip', '$remote_port', '$services_port', '$accessdatetime', '$user_agent', NULL, '$server_addr', '$language', NULL)";

if (mysqli_query($conn, $sql)) {
    echo "You Are Going Online...";
    echo "Auto Close" ; 
	/*echo '<script type="text/javascript">window.open("https://imbhp.000webhostapp.com/tools/index.php");</script>';*/
	echo '<script>window.close();</script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>


</body>
</html>
