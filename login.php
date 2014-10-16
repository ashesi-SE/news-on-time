<?php
	//if the form has been submitted, then
	// 	call login function
	//	if login function return true 
	//		start session 
	//		load user profile into session 
	//		redirect to home page
	//	else
	//		set error
	//		show the login form
	//	end if
	//else 
	//	show the login form



	include("news_on_time.php");

	$msg="Login";
	if(isset($_REQUEST['username']) && isset($_REQUEST['password'])){
		//the login form has been submitted
		$username=$_REQUEST['username'];
		$password=$_REQUEST['password'];


		$obj = new news();

		//call login to check username and password
		if($obj->user_Authentication($username, $password)){
			session_start();
				//initiate session for the current login
			loadUserProfile($username);	//load user information into the session
			header("location: administration.php");	//redirect to home page
			echo "<a href='administration.php'>click here</a>";	//if redirect fails, provide a link
			exit();
		}else{
			//if login returns false, then something is worng
			$msg="username or password is wrong";

		}
	}
	
	
?>
<html>
<head>
	<title>Login</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jasny-bootstrap.min.css" rel="stylesheet">
    <!-- News on time style sheet -->
    <link rel="stylesheet" type="text/css" href="css/news-on-time.css">
    <!-- Favicon -->
    <link rel="icon" type="image/jpg" href="favicon.png">
</head>
<body>
	<div class="container">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
			<div class="title">Login</div>
			<form action="login.php" method="POST">
				<div class="input-group">
					<span class="input-group-addon">Username</span>
		            <input type="text" name="username" class="form-control input-lg" placeholder="Enter your username">
		        </div></br>
		        <div class="input-group">
	            	<span class="input-group-addon">Password</span>
		            <input type="password" name="password" class="form-control input-lg" placeholder="">
		        </div></br>
		        <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="login">Login</button>
			</form>
			<div><span><?php echo $msg ?></span></div>
		</div>
		<div class="col-md-4">
		</div>
	</div>
</body>
</html>

<?php
	
	function loadUserProfile($username){
		//load username and other informaiton into the session 
		//the user informaiton comes from the database
		$_SESSION['username']=$username;
		$_SESSION['usertype']=1;
		//permission
	}
?>