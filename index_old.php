<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<title>News on Time</title>
		
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<link rel="stylesheet" type="text/css" href="css/style1.css" />

		
	</head>
	<body>
		<div class="container">
			<header class="codrops-header">
				<h1>Notice Board <span>your campus news hub</span></h1>	
			</header>
			<div class="grid">
				<figure class="effect-zoe">
					<img src="img/1.jpg" alt="img01"/>
					<figcaption>
						<h2>DESTINATION <span>PARTY</span></h2>
						<p>Join us in the woods to drink!</p>
					</figcaption>	
					<section>
					<p><button id="trigger-overlay" type="button">view</button></p>
					</section>
				</figure>

				<figure class="effect-zoe">
					<img src="img/5.jpeg" alt="img05"/>
					<figcaption>
						<h2 onclick="showMovieList();">MOVIE <span>NIGHT</span></h2>
						<p>all gnashers should gather this Friday! </p>
						<!-- <a href="#">View more</a> -->
					</figcaption>			
				</figure>

				<figure class="effect-zoe">
					<img src="" alt=""/>
					<figcaption>
						<h2>LOST <span>AND FOUND</span></h2>
						<p>Find me here!</p></p>
						<!-- <a href="#">View more</a> -->
					</figcaption>			
				</figure>

				<figure class="effect-zoe">
					<img src="img/3.jpg" alt="img03"/>
					<figcaption>
						<h2>SMOOTHS <span>AND SHAKES</span></h2>
						<p>are you thirsty?</p>
						<!--<a href="#">View more</a>-->
					</figcaption>			
				</figure>

				<figure class="effect-zoe">
					<img src="img/4.jpg" alt="img04"/>
					<figcaption>
						<h2>CLUB <span>MEETINGS</span></h2>
						<p>Get a life!</p>
						<a href="#">View more</a>
					</figcaption>			
				</figure>

			</div>
			<!-- open/close -->
		<div class="overlay overlay-hugeinc">
			<button type="button" class="overlay-close">Close</button>
			<nav>
				<ul>
				<!--
					<li><a href="#"></a></li>
					<li><a href="#"></a></li>
					<li><a href="#"></a></li>
					<li><a href="#"></a></li>
					<li><a href="#"></a></li>
				-->
				</ul>
			</nav>
		</div>
		</div ><!-- /container -->
		
		<script src="js/modernizr.custom.js"></script>
		<script src="js/classie.js"></script>
		<script src="js/demo1.js"></script>

		<div id="divMovieList" class="divMovieList">
			<table class="tableList">
				<tr>
					<td class="head">Movies showing</td>
					<td class="head">times</td>
				</tr>

<?php

	//connect to the database
	$link = mysql_connect("localhost", "root", "");

	//if the connection if false
	if (!$link) {
		echo "failed ot connect to mysql";
		//display erro message from mysql
		echo mysql_error();
		exit();
	}

	//select the database to work with using the open connection
	if (!mysql_select_db("dbms_news_on_time", $link)) {
		echo "failed to connect to database";
		//display erro message from mysql
		echo mysql_error();
		exit();
	}

	$database = mysql_query("select * from movies_night", $link);

	// $row = mysql_fetch_assoc($database);

	echo "<tr>";
		echo "<td class='sub'>On replay: Kantata (Season Finale)</td>";
		echo "<td>17:30 GMT</td>";
	echo "</tr>";

	do {
		$row = mysql_fetch_assoc($database);
		echo "<tr>";
			echo "<td class='sub'>$row[movie_name]</td>";
			echo "<td>$row[movie_time]</td>";
		echo "</tr>";
	} while($row);

?>

			</table>
		</div>
		<script type="text/javascript">
			// For Demo purposes only
			[].slice.call( document.querySelectorAll('a[href="#"') ).forEach( function(el) {
				el.addEventListener( 'click', function(ev) { ev.preventDefault(); } );
			} );

			function showMovieList(){
				document.getElementById('divMovieList').style.display = 'inline';
				console.log("movie list is supposed to pop up");
			}

		</script>
		<script src="js/jquery-1.11.0.js"></script>
	</body>
</html>
