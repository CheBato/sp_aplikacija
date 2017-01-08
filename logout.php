<?
if( $_POST )
{
	$con = mysql_connect("localhost","acidvnrt_chebato","matoije45G");
 
	if (!$con)
	{
  	die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("acidvnrt_comics", $con);
	$query = "UPDATE `acidvnrt_comics`.`tibor` SET `loggedin` = '0' WHERE `usr` = 'tibor'";
	mysql_query($query);
	mysql_close($con);
	header("Location: index.php");
}
?>