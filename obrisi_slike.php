<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<?php

include 'include_mysqli_connect.php';

if (!empty ($_POST['slike_ime'])){
   $slike_ime = $_POST['slike_ime'];

   $sql2 = "DELETE FROM slike WHERE slike_ime = '$slike_ime'";
   if (mysqli_query ($connection, $sql2)){
      $path = "uploads/" . $slike_ime; 
      if (unlink ($path)){
      	 echo "Obrisana slika " . $path . "<br>";
      }
      echo "Obrisali ste sliku " . $slike_ime . ", nastavite sa " . "<a href=''>" . "brisanjem slika" . "</a>";
   }
}

$sql1 = "SELECT slike_ime FROM slike";
$result = mysqli_query ($connection, $sql1) or die (mysqli_error ($connection));

echo "<form action='' method='POST'>";
echo "<select id='slike_id' name='slike_ime'>";
    if (mysqli_num_rows ($result) > 0){
       while ($row = mysqli_fetch_assoc ($result)){
       	     echo "<option value='" . $row['slike_ime'] . "'>" . $row['slike_ime'] . "</option>";
       }
    }
echo "</select>";
echo "<input type='submit' value='Obrisi sliku'>";
echo "</form>";

include 'include_mysqli_close.php';

?>
	
<img id="slika" src=""/>

<script>
document.getElementById("slike_id").selectedIndex = -1;

var promeniSliku = function () { 
    document.getElementById('slika').src =  "uploads/"+ this.options[this.selectedIndex].value;
}

var slike = document.getElementById('slike_id');
slike.addEventListener('change', promeniSliku, false);
</script>

</body>
</html>