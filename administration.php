<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Administration</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/jasny-bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/news-on-time.css">
    </head>
	<body>


    <script src="js/jquery-1.11.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jasny-bootstrap.min.js"></script> 
        <div class="container-fluid">
            <!-- Title -->
            <div class="title">News On Time</div>
              <!-- <div class="row-fluid"> -->
                <div class="sidebar">
                  <!--Sidebar content-->

                    <!-- go to notice board button -->
                    <div class="col-md-2"><!-- row-desktop -->
                        <span><a href="/news-on-time/index.php" class="btn btn-success btn-primary">Notice board</a></span>
                    </div>
                    <!-- Create account button -->
                    
                    <div class="col-md-2"> <!-- row-desktop -->
                      <!-- <button type="submit" > -->
                        <span class="btn btn-primary" onclick="addTag('found')" data-toggle="modal" data-target="#createAccountModal">Create New User</span>
                    </div>
                <div class="main-body">
                  <!--Body content-->

                  <table class="table table-striped table-condensed table-hover">
                    <thead>
                        <tr class="info">
                            <th>Name</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Time</th>
                            <th>Day</th>
                            <th></th>
                        </tr>
                    </thead>
<?php
    include_once("admin_functions.php");
    $obj = new admin();
    
    $obj->connect();

    $obj->list_all_posts();


    $row = $obj->fetch();

    while($row){
        echo "<tbody>";
        echo "<tr  class='success'>";
        echo "<td>".$row["title"]."</td>";
        echo "<td>".$row["category"]."</td>";
        echo "<td>".$row["description"]."</td>";
        echo "<td>running</td>";
        echo "<td>".$row["time"]."</td>";
        echo "<td>".$row["day"]."</td>";
        echo "<td>"."Delete post"."</td>";
        echo "</tr>";
        echo "</tbody>";
        $row = $obj->fetch();
    };
        
?>
                  </table>

                </div>
              </div>
        </div>

            <!-- adds a new account to the database -->
            <!-- <div class="add-account-form"> 
                <img align="center" src="Ashesi_Logo_Black.png" width="90" height="90"></img
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
                        
                        <input type="submit" name="submit" value="Submit">
                    </div>
        		</form>
            </div> -->

            <!-- Add New Account Modal -->
            <div class="modal fade" id="createAccountModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="createAccount"></h4>
                  </div>
                  <form action="administration.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                      <div class="input-group">
                        <span class="input-group-addon">First Name</span>
                        <input type="text" name="firstname" class="form-control" placeholder="Enter your first name">
                      </div></br>
                      <div class="input-group">
                        <span class="input-group-addon">Last Name</span>
                        <input type="text" name="lastname" class="form-control" placeholder="Enter your last name">
                      </div></br>
                      <div class="input-group">
                        <span class="input-group-addon">Gender</span>
                        <input type="text" name="gender" class="form-control" placeholder="f / m">
                      </div></br>
                      <div class="input-group">
                        <span class="input-group-addon">User Name</span>
                        <input type="text" name="username" class="form-control" placeholder="Enter a user name">
                      </div></br>
                      <div class="input-group">
                        <span class="input-group-addon">Password</span>
                        <input type="password" name="password" class="form-control" placeholder="Enter a password">
                      </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        <script>
        //     function popup(){
        //         alert("Congratulations!You've successfully created an account");
        //     }
        </script>
<?php
    $firstname = "";
    $lastname = "";
    $password = "";
    $gender = "";
    $username = "";

    if(isset($_REQUEST["firstname"]) && isset($_REQUEST["password"])){

        echo "variables are set";

        $firstname = $_REQUEST["firstname"];
        $lastname = $_REQUEST["lastname"];
        $password = $_REQUEST["password"];
        $gender = $_REQUEST["gender"];
        $username = $_REQUEST["username"];

        if(!$obj->insert_account($firstname, $lastname, $gender, $username, $password)){
            echo "didn't insert into database";
        }
    }

?>
    </body>
</html>