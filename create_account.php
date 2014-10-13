<html>
    <head>
        <title>Administration</title>
    </head>
	<body>
        <link rel="stylesheet" type="text/css" href="create_account.css">
        <link rel="stylesheet" type="text/css" href="index.css"> 
        <div>
            <a href="/news-on-time/index.php">Go to Notice board</a>
        </div>
        <div class="container">
            <div class="col-sm-8">
                <!--img align="center" src="Ashesi_Logo_Black.png" width="90" height="90"></img-->
                <img alt="Admin" img align="center" height="95" id="ashesilogo" src="Ashesi_Logo_Black.png" width="90" title="CreateAccount" style="padding-top: 112px; text-align: center">
                <h2><text align="center"> Create User Account</text></h2>

                <form action="create_account.php" method="post" class="form-horizontal tpad" role="form">
                    <div class="form-group">
                        First Name
            			<input type="text" name="firstname"><br>
                        
                        Last Name
                        <input type="text" name="lastname"><br>

                        Gender
                        <input type ="text" name="gender"><br>
                        
                        User Name
                        <input type="text" name="username"><br>

                        Password
                        <input type="password" name="password"><br>
                        
                        <input type="submit" name="submit" value="Submit"> <!-- onclick="popup()" -->
                    </div>
        		</form>
            </div>
        </div>
    <script>
        function popup(){
            alert("Congratulations!You've successfully created an account");
        }
    </script>
<?php
    include_once("admin_functions.php");
    $obj = new admin();
    
    $obj->connect();

    $firstname = "";
    $lastname = "";
    $password = "";
    $gender = "";
    $username = "";


    if(isset($_REQUEST["firstname"]) && isset($_REQUEST["password"])){

        $firstname = $_REQUEST["firstname"];
        $lastname = $_REQUEST["lastname"];
        $password = $_REQUEST["password"];
        $gender = $_REQUEST["gender"];
        $username = $_REQUEST["username"];
    }

    if(!$obj->insert_account($firstname, $lastname, $gender, $username, $password)){
        echo "didn't insert into database";
    }
?>
    </body>
</html>