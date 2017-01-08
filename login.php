<? 
if( $_POST )
{
	$con = mysql_connect("localhost","acidvnrt_chebato","matoije45G");
 
	if (!$con)
	{
  	die('Could not connect: ' . mysql_error());
	}
	$username = $_POST['username'];
	$password = $_POST['password'];
	mysql_select_db("acidvnrt_comics", $con);
	$query = "SELECT * FROM `tibor` WHERE `usr` = '$username'";
	$usr = mysql_query($query);
	
	$row = mysql_fetch_array($usr, MYSQL_ASSOC);
	$psss = $row['pss'];
	
	if(strcmp($password,$psss) == 0){
		$query = "UPDATE `acidvnrt_comics`.`tibor` SET `loggedin` = '1' WHERE `usr` = '$username';";
		mysql_query($query);
		header("Location: tibor.php");
		exit;
	}else{
		echo "<div>username or password wasn't correct</div>";
	}
	mysql_close($con);
}
?>	