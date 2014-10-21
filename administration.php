<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Administration</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- <link href="css/jasny-bootstrap.min.css" rel="stylesheet" media="screen"> -->
        <link rel="stylesheet" type="text/css" href="css/news-on-time.css">
        <!-- Favicon -->
        <link rel="icon" type="image/jpg" href="favicon.png">
    </head>
    <body>
    <script src="js/jquery-1.11.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="js/jasny-bootstrap.min.js"></script> -->

    <div class="container">
        <!-- Title -->
        <div class="row">
            <div class="title">News On Time</div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="/news-on-time/index.php"><button class="btn btn-lg btn-block btn-primary">Notice Board</button></a>
            </div>
            <div class="col-md-6">
                <button class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#createAccountModal">Create User</button>
            </div>
        </div></br>
        <div class="row">
            <div class="tableArea table-responsive">
                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Time</th>
                            <th>Day</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include_once("admin_functions.php");
                        $obj=new admin();
                        $obj->get_all_posts();
                        $row = $obj->fetch();
                        while($row){
                            echo ("<tr>");
                            echo ("<td>".$row["title"]."</td>");
                            echo ("<td>".$row["category"]."</td>");
                            echo ("<td>".$row["description"]."</td>");
                            echo ("<td>running</td>");
                            echo ("<td>".$row["time"]."</td>");
                            echo ("<td>".$row["day"]."</td>");
                            echo ("<td>Delete post</td>");
                            echo ("</tr>");
                            $row = $obj->fetch();
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="createAccountModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="createAccount">Add User</h4>
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
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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