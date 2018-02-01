<!DOCTYPE html>
<html>
<head>
<style>
div.gallery {
    margin: 10px;
    border: 1px solid #ccc;
    float: left;
    width: 200px;
    height: 250px;
}

div.gallery:hover {
    border: 1px solid #777;
}

div.gallery img {
    width: 200px;
    height: 200px;
}

div.desc {
    width: 200px;
    height: 40px;
    padding-left: 5px;
    padding-top: 3px;
    overflow: hidden;
    max-width: 191px;
}

</style>
</head>
<body>

 <ul>
  <li><a href="dodaj_slike.php">Dodaj slike</a></li>
  <li><a href="obrisi_slike.php">Obrisi slike</a></li>
  <li><a href="promeni_slike.php">Promeni slike</a></li>
</ul> 


<?php
	
$dirname = "uploads/";
$images = glob ($dirname . "*.jpg");

foreach ($images as $image){
?>
	<div class="gallery">
	     <a target="_blank" href="<?php echo $image; ?>">
  	     	<img src="<?php echo $image; ?>">
	     </a>
	     <div class="desc"><?php echo basename($image, ".jpg"); ?></div>
	</div> 
</body>
</html>
<?php
}

?>
