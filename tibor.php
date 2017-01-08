<?php
$con = mysql_connect("localhost","acidvnrt_chebato","matoije45G");
 
	if (!$con)
	{
  	die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("acidvnrt_comics", $con);
	$query = "SELECT * FROM `tibor` WHERE `usr` = 'tibor'";
	$usr = mysql_query($query);
	
	$row = mysql_fetch_array($usr, MYSQL_ASSOC);
	$psss = $row['loggedin'];
	if(strcmp($psss,'1') != 0){
		header("Location: tibor2.php");
		exit;
	}
	
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="css/styles.css">

<title>PAGE TITLE</title>
</head>
<body>
<script>
	function delete_now(commentid){
		var method = "post";
	
		var form = document.createElement("form");
		form.setAttribute("method", method);
		form.setAttribute("action", "delete_selected.php");
	
	
		var hiddenField = document.createElement("input");
		hiddenField.setAttribute("Type", "hidden");
		hiddenField.setAttribute("name","id_comment");
		hiddenField.setAttribute("value",commentid);
		form.appendChild(hiddenField);
		document.body.appendChild(form);
		form.submit();
	}
	function delete_all(){
		var method = "post";
	
		var form = document.createElement("form");
		form.setAttribute("method", method);
		form.setAttribute("action", "delete_selected.php");
	
	
		var hiddenField = document.createElement("input");	
		hiddenField.setAttribute("Type", "hidden");
		hiddenField.setAttribute("name","id_comment");
		hiddenField.setAttribute("value","all");
		form.appendChild(hiddenField);	
		document.body.appendChild(form);
		form.submit();
	}
</script>
	<center><div style='border-style: groove;margin: 3%;color: black;overflow:auto;'>
		<div id='title'>Upload/Edit Form</div>
	
	</div>
	<div style='border-style: groove;margin: 3%;color: black;overflow:auto;'>
		<div>tekst za novo stran:</div><br />
		<form method="post" action="add_page.php" enctype="multipart/form-data">
			<textarea name="spodnji_text" id="spodnji_text"></textarea><br />
			<div>tekst za title v archivu</div>
			<textarea name="title" id="title"></textarea><br />
			<input type="hidden" name="size" value="6500000">
			<input type="file" name="photo"/><br />
			<input TYPE="submit" name="upload" title="add data to the Database" value="submit form" />
		</form>
		
		<?php 
			$con = mysql_connect("localhost","acidvnrt_chebato","matoije45G");
 
			if (!$con)
			{
  			die('Could not connect: ' . mysql_error());
			}
			mysql_select_db("acidvnrt_comments", $con);
			$query = "SELECT * FROM `comments` WHERE `pageId` =1 LIMIT 0 , 30";

			$comments = mysql_query($query);
			echo "<h2> comments: </h2>";
			echo "<div style='border-style: groove;width:400px;height:200px;color: blue;overflow:auto;'>";	

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
  
 			 echo "<div style='margin:1px 0px;float:left' ><input type='image' src='images/upvote.png' id='$commentId' onClick='upvote_now(this.id)' width='20px' height='20px' style='float:left' />- $comment<input type='image' src='images/x.jpg' id='$commentId' onClick='delete_now(this.id)' width='20px' height='20px' style='float:left'margin-bottom:-3; /><br />
      			<div style='margin-left:5px;margin-top:-5px; float:left' id='upvote$commentId'>$commentUpVote</div><br />
    	 		</div><br/><br/><br/>
  			";

		}
		echo "</div>";
		
		mysql_close($con);
		?>
		<input type="button" onClick="delete_all()" name="btn" value="delete all comments" /><br /><br />
		<form action='logout.php' method='post'>
		<input type="submit" name="btnsm" value="Log Out" />
		</form>
	</div>
	<div style='border-style: groove;margin: 3%;color: black;overflow:auto; width: 90%; height:300px;'>
		<center><h2>Update comic</h2></center>
		<center><div>(nujno mora slika ze obstajati!)</div></center><br />
		<form method="post" action="update.php" enctype="multipart/form-data">
			<input type="hidden" name="size" value="6500000">
			<input type="file" name="update"/><br /><br />
			<input TYPE="submit" name="upload" title="add data to the Database" value="Update!" />
		</form>
	</div>
	<div style='border-style: groove;margin: 3%;color: black;overflow:auto; width: 90%; height:300px;'>
		<center><h2>Zbrisi zadnjega</h2></center>
		<center><div>(pobrise zadnji page k je bil uploadan)</div></center><br />
		<form method="post" action="pobrisi_zadnjega.php" enctype="multipart/form-data">
			<input TYPE="submit" name="upload" title="add data to the Database" value="Pobrisi zadnjega!" />
		</form>
	</div><br />
	<form action='logout.php' method='post'>
		<input type="submit" name="btnsm" value="Log Out" />
	</form><br />
</body>