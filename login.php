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
    <!-- <link rel="stylesheet" type="text/css" href="css/news-on-time.css"> -->
</head>
<body>
	<div id="container">
		<form action="login.php" method="POST">
		<table align="center" width="80%">
			<tr>
				<td width="30%"></td>
				<td colspan="2" align="center"><span><?php echo $msg ?></span></td>
				<td width="30%"></td>
			</tr>
			<tr>
				<td width="30%"></td>
				<td>username</td>
				<td><input type="text" name="username"></td>
				<td width="30%"></td>
			</tr>
			<tr>
				<td width="30%"></td>
				<td>password</td>
				<td><input type="password" name="password"></td>
				<td  width="30%"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="submit" value="login"></td>
				<td></td>
			</tr>
		<table>
	</form>
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