<?php
	include_once("adb.php");
    
    class admin extends adb {
        function admin(){
           adb::adb();
        }
		
		function get_all_users(){
			$query = "SELECT * FROM users";
			return $this->query($query);
		}
		
		function insert_account($firstname, $lastname, $gender, $username, $password){
            $query = "INSERT INTO users (firstname,lastname, gender, username, passwd) VALUES ('$firstname', '$lastname', '$gender', '$username', MD5('$password'))";
			return $this->query($query);
		}


		function search_by_user($username){
			$query = "SELECT * FROM users WHERE username= '$username'";
			return $this->query($query);
		}

		function get_all_posts(){
			$query = "SELECT * FROM posts";
			return $this->query($query);
		}

		function edit_post(){
			$query - "";
		}

		function get_num_category_posts($category){
			$query = "SELECT count(*) FROM posts WHERE category = '$category'";
			return $this->query($query);
		}
    }
?>
			