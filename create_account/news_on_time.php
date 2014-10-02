<?php
	include_once("adb.php");
	
	class posts extends adb{
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
			$query = "SELECT COUNT(*) FROM posts WHERE category = 'foodies' AND start_date <= CURRENT_DATE() AND end_date >= CURRENT_DATE();";
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
         function user_Authentication($username,$password){
         
         $query="SELECT * FROM users where username=$username and passwd=$password";
         
		}




		function add_post($image_path,$description,$category,$start_date,$end_date){
			$query = "INSERT INTO posts SET image_path='$image_path', description='$description', category='$category', start_date='$start_date', end_date='$end_date'";
			return $this->query($query);
		}
	}
?>