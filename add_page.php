<?php
if( $_POST )
{
	$con = mysql_connect("localhost","acidvnrt_chebato","matoije45G");
	mysql_select_db("acidvnrt_comics",$con) or die(mysqli_error()) ;
	$target = "comic1/";
	$target = $target . basename( $_FILES['photo']['name']);
	$tekst = mysql_real_escape_string($_POST['spodnji_text']);
	$title = mysql_real_escape_string($_POST['title']);
	$nameOfFile = basename( $_FILES['photo']['name']);
	
	
	$query = "INSERT INTO `acidvnrt_comics`.`comic` (`idcomica`, `slika`, `sHeader`,`unikatniStolpec`,`title`) VALUES ('1','$nameOfFile',
        '$tekst', NULL,'$title');";
	
	mysql_query($query);
	

	// Writes the photo to the server
	if(move_uploaded_file($_FILES['photo']['tmp_name'], $target))
	{

	// Tells you if its all ok
	
	echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded, and your information has been added to the directory";
	}
	else {

	// Gives and error if its not
	echo "Sorry, there was a problem uploading your file.";
	}
	
	mysql_close($con);
}
?>