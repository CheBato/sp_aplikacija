<?

$con = mysql_connect("localhost","acidvnrt_chebato","matoije45G");
 
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}
 
mysql_select_db("acidvnrt_comics", $con);

$id = '0';
if($id = $_GET['id']){

	$id = $_GET['id'];
	
	
}

mysql_select_db("acidvnrt_comics", $con);
$query = "SELECT * FROM `comic` ORDER BY `unikatniStolpec` DESC LIMIT 1";
	
$aliJeZadni = mysql_query($query);
$row = mysql_fetch_array($aliJeZadni, MYSQL_ASSOC);
$zadni = $row['unikatniStolpec'];

if(strcmp($id,"last") == 0 || $zadni == '0'){
	$query = "SELECT * FROM `comic` ORDER BY `unikatniStolpec` DESC LIMIT 1";
 
}else{
	$query = "SELECT * FROM `comic` WHERE `slika` LIKE '$id.png'";
}


$com = mysql_query($query);
if($com === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}

// Please remember that  mysql_fetch_array has been deprecated in earlier
// versions of PHP.  As of PHP 7.0, it has been replaced with mysqli_fetch_array.  

$row = mysql_fetch_array($com, MYSQL_ASSOC);

  
  $header = $row['sHeader'];
  $header = htmlspecialchars($row['sHeader'],ENT_QUOTES);
  echo "<div style='border-style:none;width:800px;margin-bottom:2px;height:150px;color: black;'>";
  echo "<h2 id='msg'>$header</h2>";
  echo "</div><br/>";
  



mysql_close($con);

?>