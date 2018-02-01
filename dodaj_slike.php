<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>


<form action="" method="POST" enctype="multipart/form-data">
      <input type="file" name="fileToUpload" accept="uploads/*" onclick="changeText(event)" onchange="loadPicture(event)"> <br>
      <input type="submit" value="Dodaj sliku">
</form>

<br>
<img id="showPicture">

<p id="changeText">

<?php

include 'include_mysqli_connect.php';


$target_dir = "uploads/";

if (!empty ($_FILES["fileToUpload"]["name"])){
   echo "fileToUpload " . $_FILES["fileToUpload"]["name"] . "<br>";
$target_file = $target_dir . basename ($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

       	$picture_name = basename ($_FILES['fileToUpload']['name']);
        echo "The file ". $picture_name . " has been uploaded.";
	

	$sql1 = "INSERT INTO slike (slike_ime) VALUES ('$picture_name')";
	$result = mysqli_query ($connection, $sql1);
	if ($result){
	   echo "New record created successfully!";
	}
	else{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	

    }
     else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}//end of first if (!empty ($_FILES["fileToUpload"]["name"]){

include 'include_mysqli_close.php';

?>

</p>

<script>

var loadPicture = function (event) {
	 var getPicture = document.getElementById ('showPicture');
	 getPicture.src = URL.createObjectURL (event.target.files[0]);
};

var removeText = function (event){
    document.getElementById('changeText').text = "";
};

</script>

</body>
</html>