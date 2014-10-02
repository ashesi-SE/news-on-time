<?php
	include_once("adb.php");
	
	class news extends adb{
		function posts(){
			adb::adb();
		}
		function get_all_movies(){
			$query = "SELECT * FROM posts WHERE category = 'movies' AND start_date <= CURRENT_DATE() AND end_date >= CURRENT_DATE()";
			return $this->query($query);
		}
		function get_all_parties(){
			$query = "SELECT * FROM posts WHERE category = 'parties' AND start_date <= CURRENT_DATE() AND end_date >= CURRENT_DATE()";
			return $this->query($query);
		}
		function get_all_foodie(){
			$query = "SELECT * FROM posts WHERE category = 'foodie' AND start_date <= CURRENT_DATE() AND end_date >= CURRENT_DATE()";
			return $this->query($query);
		}
		function get_all_sports(){
			$query = "SELECT * FROM posts WHERE category = 'sports' AND start_date <= CURRENT_DATE() AND end_date >= CURRENT_DATE()";
			return $this->query($query);
		}		
		function get_all_club_events(){
			$query = "SELECT * FROM posts WHERE category = 'club events' AND start_date <= CURRENT_DATE() AND end_date >= CURRENT_DATE()";
			return $this->query($query);
		}
		function get_all_other_events(){
			$query = "SELECT * FROM posts WHERE category = 'other events' AND start_date <= CURRENT_DATE() AND end_date >= CURRENT_DATE()";
			return $this->query($query);
		}
		function get_num_movies(){
			$query = "SELECT COUNT(*) FROM posts WHERE category = 'movies' AND start_date <= CURRENT_DATE() AND end_date >= CURRENT_DATE();";
			if(!$this->query($query)){
				return false;
			}
			return $this->fetch();
		}
		function get_num_parties(){
			$query = "SELECT COUNT(*) FROM posts WHERE category = 'parties' AND start_date <= CURRENT_DATE() AND end_date >= CURRENT_DATE();";
			if(!$this->query($query)){
				return false;
			}
			return $this->fetch();
		}
		function get_num_foodie(){
			$query = "SELECT COUNT(*) FROM posts WHERE category = 'foodie' AND start_date <= CURRENT_DATE() AND end_date >= CURRENT_DATE();";
			if(!$this->query($query)){
				return false;
			}
			return $this->fetch();
		}
		function get_num_sports(){
			$query = "SELECT COUNT(*) FROM posts WHERE category = 'sports' AND start_date <= CURRENT_DATE() AND end_date >= CURRENT_DATE();";
			if(!$this->query($query)){
				return false;
			}
			return $this->fetch();
		}
		function get_num_club_events(){
			$query = "SELECT COUNT(*) FROM posts WHERE category = 'club events' AND start_date <= CURRENT_DATE() AND end_date >= CURRENT_DATE();";
			if(!$this->query($query)){
				return false;
			}
			return $this->fetch();
		}
		function get_num_other_events(){
			$query = "SELECT COUNT(*) FROM posts WHERE category = 'other events' AND start_date <= CURRENT_DATE() AND end_date >= CURRENT_DATE();";
			if(!$this->query($query)){
				return false;
			}
			return $this->fetch();
		}
		function add_post($title,$image_path,$description,$category,$start_date,$end_date){
			$query = "INSERT INTO posts SET title='$title', image_path='$image_path', description='$description', category='$category', start_date='$start_date', end_date='$end_date'";
			return $this->query($query);
		}

		function upload_picture(){
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
					//echo "In first child if statement <br>";
			    	echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
			    	return false;
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
				      	return false;
				    }
				    else {
				    	// echo "In second child else statement <br>";
				      	move_uploaded_file($_FILES["file"]["tmp_name"],
				      	"upload/" . $_FILES["file"]["name"]);
				      	return ("upload/" . $_FILES["file"]["name"]);
				      	// echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
				    }
				}
			}
			else {
				// echo "In parent else statement <br>";
				echo "Invalid file";
				return false;
			}
		}
	}
?>