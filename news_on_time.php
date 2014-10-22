<?php
	include_once("adb.php");
	
	class news extends adb{
		function news(){
			adb::adb();
		}
		function get_all_posts(){
			$query = "SELECT * FROM posts;";
		}
		function get_todays_events(){
			$query = "SELECT * FROM posts WHERE day = CURRENT_DATE()";
			return $this->query($query);
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
		function get_all_lost(){
			$query = "SELECT * FROM lost_and_found WHERE tag='lost';";
			return $this->query($query);
		}
		function get_all_found(){
			$query = "SELECT * FROM lost_and_found WHERE tag='found';";
			return $this->query($query);
		}
		function get_num_movies(){
			$query = "SELECT COUNT(*) FROM posts WHERE category = 'movies' AND start_date <= CURRENT_DATE() AND end_date >= CURRENT_DATE();";
			if(!$this->query($query)){
				return false;
			}
			return $this->fetch()["COUNT(*)"];
		}
		function get_num_parties(){
			$query = "SELECT COUNT(*) FROM posts WHERE category = 'parties' AND start_date <= CURRENT_DATE() AND end_date >= CURRENT_DATE();";
			if(!$this->query($query)){
				return false;
			}
			return $this->fetch()["COUNT(*)"];
		}
		function get_num_foodie(){
			$query = "SELECT COUNT(*) FROM posts WHERE category = 'foodie' AND start_date <= CURRENT_DATE() AND end_date >= CURRENT_DATE();";
			if(!$this->query($query)){
				return false;
			}
			return $this->fetch()["COUNT(*)"];
		}
		function get_num_sports(){
			$query = "SELECT COUNT(*) FROM posts WHERE category = 'sports' AND start_date <= CURRENT_DATE() AND end_date >= CURRENT_DATE();";
			if(!$this->query($query)){
				return false;
			}
			return $this->fetch()["COUNT(*)"];
		}
		function get_num_club_events(){
			$query = "SELECT COUNT(*) FROM posts WHERE category = 'club events' AND start_date <= CURRENT_DATE() AND end_date >= CURRENT_DATE();";
			if(!$this->query($query)){
				return false;
			}
			return $this->fetch()["COUNT(*)"];
		}
		function get_num_other_events(){
			$query = "SELECT COUNT(*) FROM posts WHERE category = 'other events' AND start_date <= CURRENT_DATE() AND end_date >= CURRENT_DATE();";
			if(!$this->query($query)){
				return false;
			}
			return $this->fetch()["COUNT(*)"];
		}
		function get_num_lost(){
			$query="SELECT COUNT(*) FROM lost_and_found WHERE tag='lost';";
			if(!$this->query($query)){
				return false;
			}
			return $this->fetch()["COUNT(*)"];
		}
		function get_num_found(){
			$query="SELECT COUNT(*) FROM lost_and_found WHERE tag='found';";
			if(!$this->query($query)){
				return false;
			}
			return $this->fetch()["COUNT(*)"];
		}
		function add_post($title,$image_path,$venue,$day,$time,$description,$category,$start_date,$end_date){
			$query = "INSERT INTO posts SET title='$title', image_path='$image_path', venue='$venue', day='$day', time='$time', description='$description', category='$category', start_date='$start_date', end_date='$end_date'";
			return $this->query($query);
		}
		function add_lost_and_found($image_path,$item,$description,$location,$tag,$contact_name,$contact_number,$contact_email){
			$query = "INSERT INTO lost_and_found SET image_path='$image_path',item='$item',description='$description',location='$location',tag='$tag',contact_name='$contact_name',contact_number='$contact_number',contact_email='$contact_email';";
			return $this->query($query);
		}
        function user_Authentication($username,$password){
        	$query="SELECT IF((SELECT passwd FROM users WHERE username='$username')=MD5('$password'),true,false) AS 'results'";
        	if($this->query($query)){
				if($this->fetch()["results"] == '1'){
					return true;
				}
				else{
					return false;
				}
			}
         
		}

		
	}
?>