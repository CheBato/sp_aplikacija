<?

$con = mysql_connect("localhost","acidvnrt_chebato","matoije45G");
 
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}
$id = '0';
if($id = $_GET['id']){

	$id = $_GET['id'];
	
	
}
$ip = $_SERVER['REMOTE_ADDR'];
mysql_select_db("acidvnrt_upvotes",$con);
$query = "SELECT * FROM `upvotes` WHERE `userIp` = '$ip'";
$rekt = mysql_query($query);
$upvotalJe = 0;
if($row = mysql_fetch_array($rekt, MYSQL_ASSOC)){

	$upvotanId = $row['commentId'];
	$upvotalJe = 1;
}else{
	$upvotanId = 'false';
}
mysql_select_db("acidvnrt_comics", $con);
$query = "SELECT * FROM `comic` ORDER BY `unikatniStolpec` DESC LIMIT 1";
	
$aliJeZadni = mysql_query($query);
$row = mysql_fetch_array($aliJeZadni, MYSQL_ASSOC);
$zadni = $row['unikatniStolpec'];
$alreadyIp = '0';
mysql_select_db("acidvnrt_comments",$con);
$query = "SELECT * FROM `comments` WHERE `ipaddr` ='$ip'";
$nQuery = mysql_query($query);
if($alObst = mysql_fetch_array($nQuery, MYSQL_ASSOC)){
	$alreadyIp = $alObst['ipaddr'];	
}



if($zadni == $id || strcmp($id,"last") == 0 || $zadni == '0'){	 
if(strcmp($ip,$alreadyIp) != 0){
		if($upvotalJe == 0){
			echo "<h2>Tell our hero what to do next</h2>";
			echo "<form action='manage_comments.php' method='post' name='addcomment'>
			Comment:<br />
			<textarea name='comment' id='comment' maxlength='150' required></textarea><br />
			<input type='submit' value='Submit' />
			</form><br />";
	}
} 
	mysql_select_db("acidvnrt_comments", $con);

	
	$query = "SELECT * FROM `comments` WHERE `pageId` =1 LIMIT 0 , 30";

	$comments = mysql_query($query);
	echo "<h2>Or upvote someone else's suggestion</h2>";
	echo "<div style='border-color: black;border-style:groove;width:600px;height:400px;color: black;overflow:auto;'>";	

	// Please remember that  mysql_fetch_array has been deprecated in earlier
	// versions of PHP.  As of PHP 7.0, it has been replaced with mysqli_fetch_array.  

	while($row = mysql_fetch_array($comments, MYSQL_ASSOC))
	{
  
		$commentUpVote = $row['upvotes'];
		$commentId = $row['id'];
		$comment = $row['comment'];
		$commentUpVote = htmlspecialchars($row['upvotes'],ENT_QUOTES);
		$commentId = htmlspecialchars($row['id'],ENT_QUOTES);
		$comment = htmlspecialchars($row['comment'],ENT_QUOTES);
  		if($upvotanId == $commentId){
  		echo "<div style='margin:1px 0px;float:left' ><input type='image' src='images/upvote2.png' id='$commentId' onClick='upvote_now(this.id)' width='20px' height='20px' style='float:left' />- $comment<br />
      		<div style='margin-left:5px;margin-top:-5px; float:left' id='upvote$commentId'>$commentUpVote</div><br />
    	 	</div><br/><br/><br/>
  		";
  		}else{
 		 echo "<div style='margin:1px 0px;float:left' ><input type='image' src='images/upvote.png' id='$commentId' onClick='upvote_now(this.id)' width='20px' height='20px' style='float:left' />- $comment<br />
      		<div style='margin-left:5px;margin-top:-5px; float:left' id='upvote$commentId'>$commentUpVote</div><br />
    	 	</div><br/><br/><br/>
  		";
		}
	}
	echo "</div>";
	

}
echo "<script>function openInNewTab(url){
	var win = window.open(url, '_blank');
	win.focus();
}</script>";
echo "<br/><button id='donate' onClick=\"openInNewTab('https://www.patreon.com/tiborbolha')\"><img width='260' height='100' src='buttons/donate.png'></button>";

mysql_close($con);

?>
