<?php

include 'include_mysqli_connect.php';

$admin_ime = $_POST['korisnicko_ime'];
$admin_sifra = $_POST['korisnicka_sifra'];

echo $admin_ime . " " . $admin_sifra . "<br>";

$sql1 = "SELECT admin_ime, admin_sifra FROM admin WHERE admin_ime = '$admin_ime' AND admin_sifra = '$admin_sifra'";

$result = mysqli_query ($connection, $sql1) or die (mysqli_error ($connection));

if (mysqli_num_rows ($result) > 0){
   while ($row = mysqli_fetch_assoc ($result)){
//   	 session_start();
//	 $_SESSION['korisnicko_ime'] = $row['admin_ime'];
//	 $_SESSION['korisnicka_sifra'] = $row['admin_sifra'];
//	 session_unset();
//	 session_destroy();
   	 echo "Ulogovani ste " . $row['admin_ime'] . ", molim vas nastavite sa radom klikom na " . '<a href="slike.php">slike</a>';
	 
   }
}
else{
	echo "Niste ulogovani, molim vas probajte opet!";
}

include 'include_mysqli_close.php';

?>