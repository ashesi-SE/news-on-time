<?php
//Saving the uploaded file
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if 	(
		(
			($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/jpg")
			|| ($_FILES["file"]["type"] == "image/pjpeg")
			|| ($_FILES["file"]["type"] == "image/x-png")
			|| ($_FILES["file"]["type"] == "image/png")
		)
		//&& ($_FILES["file"]["size"] < 20000)
		&& in_array($extension, $allowedExts)
	)
{
	// echo "In parent if statement <br>";
	if ($_FILES["file"]["error"] > 0) {
		echo "In first child if statement <br>";
    	echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  	}
  	else {
  		// echo "In first child else statement <br>";
	    // echo "Upload: " . $_FILES["file"]["name"] . "<br>";
	    // echo "Type: " . $_FILES["file"]["type"] . "<br>";
	    // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
	    // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
	    if (file_exists("upload/" . $_FILES["file"]["name"])) {
	    	// echo "In second child if statement <br>";
	      	echo $_FILES["file"]["name"] . " already exists. ";
	    }
	    else {
	    	// echo "In second child else statement <br>";
	      	move_uploaded_file($_FILES["file"]["tmp_name"],
	      	"upload/" . $_FILES["file"]["name"]);
	      	echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
	    }
	}
}
else {
	// echo "In parent else statement <br>";
	echo "Invalid file";
}
?>