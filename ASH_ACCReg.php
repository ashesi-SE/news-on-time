<?php
	include_once("ASH_ACC.php");
        class ASH_ACCReg extends ASH_ACC {
            function ASH_ACCReg(){
	           ASH_ACC::ASH_ACC();
            }
			
			function get_all_students(){
				$query = "SELECT * FROM user_account";
				return $this->query($query);
			}
			
			function insert_account($firstname,$lastname,$username,$password){
                $query = "INSERT INTO user_account(firstname,lastname,username,password)VALUES('$firstname','$lastname','$username','$password')";
				return $this->query($query);
			}

	
			function search_by_user($username){
				$query = "SELECT * FROM user_account WHERE username=$username";
				return $this->query($query);
			}
        }
?>
			