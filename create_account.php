<html>
	<body>
         <link rel="stylesheet" type="text/css" href="create_account.css"> 
        <div class="container">
            <div class="row">
            <div class="col-sm-8">
                <!--img align="center" src="Ashesi_Logo_Black.png" width="90" height="90"></img-->
                <img alt="Admin" img align="center" height="95" id="ashesilogo" src="Ashesi_Logo_Black.png" width="90" title="CreateAccount" style="padding-top: 112px;">
                <h2><text align="center"> Create User Account</h2></text><hr>

        <form action="create_account.php" method="post" class="form-horizontal tpad" role="form">
        <div class="form-group">
        </div>

            <hr>
            <br>
            First Name<br>
			<input type="text" name="firstname"><br>
            
            Last Name<br>
            <input type="text" name="lastname"><br>
            
            User Name<br>
            <input type="text" name="username"><br>
            
            Password<br>
            <input type="password" name="password"><br>
            
            <input type="submit" name="submit" value="Submit" onclick="popup()">
		</form>
             
    
    </body>
    <script>
        function popup(){
            alert("Congratulations!You've successfully created an account");
        }
    </script>

<?php
include_once("ASH_ACCReg.php");
				$obj = new ASH_ACCReg();
				$obj->connect();
				
				$firstname="";
				if(isset($_REQUEST['firstname'])){
					$firstname=$_REQUEST['firstname'];
				}
				$lastname="";
				if(isset($_REQUEST['lastname'])){
					$lastname=$_REQUEST['lastname'];
				}
                $username="";
                if(isset($_REQUEST['username'])){
					$username=$_REQUEST['username'];
				}
                $password="password";
                if(isset($_REQUEST['password'])){
					$password=$_REQUEST['password'];
				}

		
		if(!$obj->insert_account($firstname,$lastname,$username,$password)){
			exit();
		}
		
?>
                
</html>