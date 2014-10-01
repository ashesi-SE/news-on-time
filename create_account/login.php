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
	$msg="Login";
	if(isset($_REQUEST['username'])){
		//the login form has been submitted
		$username=$_REQUEST['username'];
		$password=$_REQUEST['password'];
		//call login to check username and password
		if(login($username,$password)){
			session_start();	//initiate session for the current login
			loadUserProfile($username);	//load user information into the session
			header("location: create_account.php");	//redirect to home page
			echo "<a href='create_account.php'>click here</a>";	//if redirect fails, provide a link
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
	 <link rel="stylesheet" type="text/css" href="index.css"> 
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
	function login($username, $password){
		//connect to db
		//select db
		//if connection fails, return false
		//query for the $username and $password
		//if the user with the right password is found, 
		//	return true
		//else 
		//	return false
	$database="create_account_db";	//this database has to exist. 
	$user="root";		//the main admin user of mysql
	$passwor="";			//use root password of mysql
	$server="localhost";	//name of the server
	
	$link=mysql_connect($server,$user,$passwor);
	//if result is false, the connection did not open
	if(!$link){	
		echo "Failed to connect to mysql.";
		//display error message from mysql
		echo mysql_error();	
		exit();		//end script
		echo "failed";
	}
	//select the database to work with using the open connection 
	if(!mysql_select_db($database,$link)){
		echo "Failed to select database.";
		//display error message from mysql
		echo mysql_error();	
		exit();	
		return false;
	}
	$dataset = mysql_query("select * from user_account where username='$username' and password = '$password'", $link);
	$result = mysql_fetch_assoc($dataset);
	if($result)
	return true;
	else
	return false;
	
	}
	
	function loadUserProfile($username){
		//load username and other informaiton into the session 
		//the user informaiton comes from the database
		$_SESSION['username']=$username;
		$_SESSION['usertype']=1;
		//permission
	}
?>