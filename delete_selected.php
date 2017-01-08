<?
if( $_POST )
{


	$con = mysql_connect("localhost","acidvnrt_chebato","matoije45G");
 
	if (!$con)
	{
  	die('Could not connect: ' . mysql_error());
	}
 	$id = $_POST['id_comment'];
	mysql_select_db("acidvnrt_comments", $con);
	
	if($id != 'all'){
		$query = "DELETE FROM `comments` WHERE `id` = '$id'";
		mysql_query($query);
		mysql_select_db("acidvnrt_upvotes", $con);
		$query = "DELETE FROM `upvotes` WHERE `commentId` = '$id'";
		mysql_query($query);
	}else{
		$query = "TRUNCATE TABLE `comments`";
		mysql_query($query);
		$query = "ALTER TABLE `comments` AUTO_INCREMENT = 1";
		mysql_select_db("acidvnrt_upvotes", $con);
		$query = "TRUNCATE TABLE `upvotes`";
		mysql_query($query);
	}
	
	
	$previousPage = $_SERVER["HTTP_REFERER"];
  	header('Location: '.$previousPage);
  	mysql_close($con);
}	
?>	