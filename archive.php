<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="css/styles.css">

<title>Acid Flowers</title>
</head>
<body>
<center><h2>Archive</h2>

<?

$con = mysql_connect("localhost","acidvnrt_chebato","matoije45G");
 
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("acidvnrt_comics", $con);
$query = "SELECT * FROM `comic`";
$neki = mysql_query($query);
while($row = mysql_fetch_array($neki, MYSQL_ASSOC)){
	$unikat = $row['unikatniStolpec'];
	$title = $row['title'];
	
	echo "<a href='index2.php?id=$unikat'>$title</a><br /><br />";
	

}

mysql_close($con);
?>
</center>
</body>