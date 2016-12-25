<? 
$con = mysql_connect("localhost","acidvnrt_chebato","matoije45G");
 
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}

$id = 'last';
if($id = $_GET['id']){

	$id = $_GET['id'];
	
	
}else{
	$id = '0';
}
mysql_select_db("acidvnrt_comics", $con);
	$query = "SELECT * FROM `comic` ORDER BY `unikatniStolpec` DESC LIMIT 1";
	$com = mysql_query($query);
	$row = mysql_fetch_array($com, MYSQL_ASSOC);
	$id2 = $row['unikatniStolpec'];
	

$last = "last";
$id3 = $id;
if(strcmp($id,$last) == 0){

	$id3 = $row['unikatniStolpec'];	
}
  
echo "<img id='slika1' src='comic1/$id3.png' width='700px' height='740px'/>
";
echo "<nav>
				<img id='insight'width='260' src='buttons/receive_insight.png'><br />
				<button id='about' onClick=\"window.location.href='Support.html'\"><img width='160' src='buttons/support.png'></button><br />
				<button id='contact' onClick=\"window.location.href='Author.html'\"><img width='160' src='buttons/me.png'></button><br />
				<button id='contact' onClick=\"window.location.href='Rules.html'\"><img width='160' src='buttons/rules.png'></button><br />
				<button id='contact' onClick=\"window.location.href='Comic.html'\"><img width='160' src='buttons/comic.png'></button><br />
				
			
		</nav>";
echo "<center><div>";
if($id != '0'){
	echo "<button id='btnFirst' onClick='goToFirst()'><img width='70' src='buttons/first.png'></button>
	<button id='puscica1' onClick='nextPageLeft()'><img width='70' src='buttons/left.png'></button>";
}else{
	echo "<button id='btnFirst' style='visibility:hidden;' onClick='goToFirst()'><img width='70' src='buttons/first.png'></button>
		<button id='puscica1' style='visibility:hidden;' onClick='nextPageLeft()'><img width='70' src='buttons/left.png'></button>";
}
echo "<button onClick=\"window.location.href='archive.php'\" id='btnArchive'><img width='200' src='buttons/archive.png'></button>";
if($id != 'last'){
	if($id != $id2){
		echo "<button id='puscica2' onClick='nextPageRight()'><img width='70' src='buttons/right.png'></a>
		<button id='btnLast' onClick='goToLast()'><img width='70' src='buttons/last.png'></button>";
	}else{
		echo "<button id='puscica2' style='visibility:hidden;' onClick='nextPageRight()'><img width='70' src='buttons/right.png'></a>
		<button id='btnLast' style='visibility:hidden;' onClick='goToLast()'><img width='70' src='buttons/last.png'></button>";
	}
}else{
	echo "<button id='puscica2' style='visibility:hidden;' onClick='nextPageRight()'><img width='70' src='buttons/right.png'></a>
		<button id='btnLast' style='visibility:hidden;' onClick='goToLast()'><img width='70' src='buttons/last.png'></button>";
}
echo "</div></center>
	<br />";
mysql_close($con);
?>
