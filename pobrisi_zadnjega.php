<?php
if( $_POST )
{
	$con = mysql_connect("localhost","acidvnrt_chebato","matoije45G");
	mysql_select_db("acidvnrt_comics",$con) or die(mysqli_error()) ;
	
	$target = "comic1/";
	$query = "SELECT `unikatniStolpec` FROM `comic` ORDER BY `unikatniStolpec` DESC LIMIT 0, 1 ";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	
	$unikatniStolpec = $row['unikatniStolpec'];
		
	$unikatniStolpecNew = $unikatniStolpec-1;
	$target = $target . $unikatniStolpec;
	$slika = $unikatniStolpec . ".png";
	$target = $target . ".png";
	$query = "SELECT `unikatniStolpec` FROM `comic` ORDER BY `unikatniStolpec` ASC LIMIT 0, 1";
	mysql_query($query);
	if(unlink ($target)){
		print("slika $slika je uspesno odstranjena\n");
	}else{
		print("samo page je bil odstranjen, saj slike $slika ni bilo mogoce najti!\n ");
	}
	$query = "DELETE FROM `comic` WHERE unikatniStolpec='$unikatniStolpec'";
	
	if(mysql_query($query)){
		print("$unikatniStolpec page je bil uspesno pobrisan");	
		
	}else{
		print("prislo je do napake pri brisanju strani $unikatniStolpec");
	}
	
	$query ="ALTER TABLE `comic` AUTO_INCREMENT = '$unikatniStolpecNew'";
	mysql_query($query);
	mysql_close($con);
}
?>