<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News on time</title>
    <!-- Favicon -->
    <link rel="icon" type="image/jpg" href="favicon.png">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Important Owl stylesheet -->
    <link rel="stylesheet" href="owl/owl-carousel/owl.carousel.css">
    <!-- Default Owl Theme -->
    <link rel="stylesheet" href="owl/owl-carousel/owl.theme.css">
    <link rel="stylesheet" type="text/css" href="css/news-on-time.css">
    <link rel="stylesheet" type="text/css" href="./jqueryCalendar/jqueryCalendar.css">
  </head>
  <body>

    <script src="js/jquery-1.11.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src-"jqueryCalendar/jquery-ui-1.8.15.custom.min.js"></script>
    <script src="owl/owl-carousel/owl.carousel.js"></script>

    <!-- Get the number of posts in each category -->
    <?php
      include("news_on_time.php");
      $obj = new news();
      if (!$obj->get_all_movies()){
        echo"error";
        exit();
      }

      $numMovies = $obj->get_num_movies();
      $numParties = $obj->get_num_parties();
      $numFoodie = $obj->get_num_foodie();
      $numSports = $obj->get_num_sports();
      $numClubEvents = $obj->get_num_club_events();
      $numOtherEvents = $obj->get_num_other_events();
      $numLost = $obj->get_num_lost();
      $numFound = $obj->get_num_found();
    ?>

    
    <div class="container">
      <!-- Title -->
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="title">News On Time </div>
        </div>
        <div class="col-md-2">
          <div class="container feedbackButton">
            <button class="btn btn-lg btn-info" data-toggle="modal" data-target="#feedback">Give us feedback!</button>
          </div>
        </div>
      </div>
      

      <!-- Carousel -->
      <div class="row">
        <!-- <div class="col-md-2"></div> -->
        <!-- <div class="col-md-8"> -->
          <div class="carouselContainer">
            <center>
              <div id="owl-example" class="owl-carousel">
                <?php
                  $row = $obj->get_todays_events();
                  $row = $obj->fetch();
                  while($row){
                    echo ("<div><img src='".$row["image_path"]."' alt='".$row["category"]."'></div>");
                    $row = $obj->fetch();
                  }
                ?>
              </div>
            </center>
          </div>
        <!-- </div> -->
        <!-- <div class="col-md-2"></div> -->
      </div>

      <!-- Categories -->
      <div class="row">
        <!-- Movies Category -->
        <div class="col-md-3">
          <div class="category thumbnail">
            <!-- <div class="thumbnailHeader">Movie Night</div> -->
            <img src="images/movies.jpg" alt="Movie Night" data-toggle="modal" data-target="#moviesModal">
            <div class="caption">
              <div class="row">
                <div class="col-md-9">
                  <span class="badge"><?php echo ($numMovies) ?></span>
                </div>
                <div class="col-md-3">
                  <button type="submit" class="btn btn-default btn-sm" onclick="addCategory('movies')" data-toggle="modal" data-target="#addModal">
                    <span class="glyphicon glyphicon-plus"></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Parties Category -->
        <div class="col-md-3">
          <div class="category thumbnail">
            <!-- <div class="thumbnailHeader">Parties</div> -->
            <img src="images/parties.jpg" alt="Parties" data-toggle="modal" data-target="#partiesModal">
            <div class="caption">
              <div class="row">
                <div class="col-md-9">
                  <span class="badge"><?php echo ($numParties) ?></span>
                </div>
                <div class="col-md-3">
                  <button type="submit" class="btn btn-default btn-sm" onclick="addCategory('parties')" data-toggle="modal" data-target="#addModal">
                    <span class="glyphicon glyphicon-plus"></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Foodie Category -->
        <div class="col-md-3">
          <div class="category thumbnail">
            <!-- <div class="thumbnailHeader">Foodie Events</div> -->
            <img src="images/foodie.jpg" alt="Foodie Events" data-toggle="modal" data-target="#foodieModal">
            <div class="caption">
              <div class="row">
                <div class="col-md-9">
                  <span class="badge"><?php echo ($numFoodie) ?></span>
                </div>
                <div class="col-md-3">
                  <button type="submit" class="btn btn-default btn-sm" onclick="addCategory('foodie')" data-toggle="modal" data-target="#addModal">
                    <span class="glyphicon glyphicon-plus"></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Sports category -->
        <div class="col-md-3">
          <div class="category thumbnail">
            <!-- <div class="thumbnailHeader">Sports Events</div> -->
            <img src="images/sports.jpg" alt="Sports Events" data-toggle="modal" data-target="#sportsModal">
            <div class="caption">
              <div class="row">
                <div class="col-md-9">
                  <span class="badge"><?php echo ($numSports) ?></span>
                </div>
                <div class="col-md-3">
                  <button type="submit" class="btn btn-default btn-sm" onclick="addCategory('sports')" data-toggle="modal" data-target="#addModal">
                    <span class="glyphicon glyphicon-plus"></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- Club events category -->
        <div class="col-md-3">
          <div class="category thumbnail">
            <!-- <div class="thumbnailHeader">Club Events</div> -->
            <img src="images/club_events.jpg" alt="Club events" data-toggle="modal" data-target="#clubEventsModal">
            <div class="caption">
              <div class="row">
                <div class="col-md-9">
                  <span class="badge"><?php echo ($numClubEvents) ?></span>
                </div>
                <div class="col-md-3">
                  <button type="submit" class="btn btn-default btn-sm" onclick="addCategory('club events')" data-toggle="modal" data-target="#addModal">
                    <span class="glyphicon glyphicon-plus"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Other Events -->
        <div class="col-md-3">
          <div class="category thumbnail">
            <!-- <div class="thumbnailHeader">Other Events</div> -->
            <img src="images/other_events.png" alt="Club events" data-toggle="modal" data-target="#otherEventsModal">
            <div class="caption">
              <div class="row">
                <div class="col-md-9">
                  <span class="badge"><?php echo ($numOtherEvents) ?></span>
                </div>
                <div class="col-md-3">
                  <button type="submit" class="btn btn-default btn-sm" onclick="addCategory('other events')" data-toggle="modal" data-target="#addModal">
                    <span class="glyphicon glyphicon-plus"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Lost Category -->
        <div class="col-md-3">
          <div class="category thumbnail">
            <!-- <div class="thumbnailHeader">Lost</div> -->
            <img src="images/lost.jpg" alt="Lost" data-toggle="modal" data-target="#lostModal">
            <div class="caption">
              <div class="row">
                <div class="col-md-9">
                  <span class="badge"><?php echo ($numLost) ?></span>
                </div>
                <div class="col-md-3">
                  <button type="submit" class="btn btn-default btn-sm" onclick="addTag('lost')" data-toggle="modal" data-target="#addLostAndFoundModal">
                    <span class="glyphicon glyphicon-plus"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Found Category -->
        <div class="col-md-3">
          <div class="category thumbnail">
            <!-- <div class="thumbnailHeader">Found</div> -->
            <img src="images/found.jpg" alt="Found" data-toggle="modal" data-target="#foundModal">
            <div class="caption">
              <div class="row">
                <div class="col-md-9">
                  <span class="badge"><?php echo ($numFound) ?></span>
                </div>
                <div class="col-md-3">
                  <button type="submit" class="btn btn-default btn-sm" onclick="addTag('found')" data-toggle="modal" data-target="#addLostAndFoundModal">
                    <span class="glyphicon glyphicon-plus"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modals -->
    <!-- Movies Modal -->
    <div class="modal fade" id="moviesModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Movie Events</h4>
          </div>
          <div class="modal-body">
            <?php
              $row = $obj->get_all_movies();
              $row = $obj->fetch();
              while($row){
                echo ("<div class='row'><div class='col-md-6'>");
                echo ("<h2>".$row["title"]."</h2>");
                echo ("<img src='".$row["image_path"]."' width=300px height=300px>");
                echo ("</div><div class='col-md-6>'");
                echo ("<span class='text-right'><h3>");
                echo ("</br></br><strong>Date: </strong>".$row["day"]."</br>");
                echo ("<strong>Time: </strong>".$row["time"]."</br>");
                echo ("<strong>Venue: </strong>".$row["venue"]."</br>");
                echo ("</h3></span></br>");
                echo ("<h4>".$row["description"]."</h4></br>");
                echo ("</div></div>");
                $row = $obj->fetch();
              }
            ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Parties Modal -->
    <div class="modal fade" id="partiesModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Party Events</h4>
          </div>
          <div class="modal-body">
            <?php
              $row = $obj->get_all_parties();
              $row = $obj->fetch();
              while($row){
                echo ("<div class='row'><div class='col-md-6'>");
                echo ("<h2>".$row["title"]."</h2>");
                echo ("<img src='".$row["image_path"]."' width=300px height=300px>");
                echo ("</div><div class='col-md-6>'");
                echo ("<span class='text-right'><h3>");
                echo ("</br></br><strong>Date: </strong>".$row["day"]."</br>");
                echo ("<strong>Time: </strong>".$row["time"]."</br>");
                echo ("<strong>Venue: </strong>".$row["venue"]."</br>");
                echo ("</h3></span></br>");
                echo ("<h4>".$row["description"]."</h4></br>");
                echo ("</div></div>");
                $row = $obj->fetch();
              }
            ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Foodie Modal -->
    <div class="modal fade" id="foodieModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Foodie Events</h4>
          </div>
          <div class="modal-body">
            <?php
              $row = $obj->get_all_foodie();
              $row = $obj->fetch();
              while($row){
                echo ("<div class='row'><div class='col-md-6'>");
                echo ("<h2>".$row["title"]."</h2>");
                echo ("<img src='".$row["image_path"]."' width=300px height=300px>");
                echo ("</div><div class='col-md-6>'");
                echo ("<span class='text-right'><h3>");
                echo ("</br></br><strong>Date: </strong>".$row["day"]."</br>");
                echo ("<strong>Time: </strong>".$row["time"]."</br>");
                echo ("<strong>Venue: </strong>".$row["venue"]."</br>");
                echo ("</h3></span></br>");
                echo ("<h4>".$row["description"]."</h4></br>");
                echo ("</div></div>");
                $row = $obj->fetch();
              }
            ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Sports Modal -->
    <div class="modal fade" id="sportsModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Sports Events</h4>
          </div>
          <div class="modal-body">
            <?php
              $row = $obj->get_all_sports();
              $row = $obj->fetch();
              while($row){
                echo ("<div class='row'><div class='col-md-6'>");
                echo ("<h2>".$row["title"]."</h2>");
                echo ("<img src='".$row["image_path"]."' width=300px height=300px>");
                echo ("</div><div class='col-md-6>'");
                echo ("<span class='text-right'><h3>");
                echo ("</br></br><strong>Date: </strong>".$row["day"]."</br>");
                echo ("<strong>Time: </strong>".$row["time"]."</br>");
                echo ("<strong>Venue: </strong>".$row["venue"]."</br>");
                echo ("</h3></span></br>");
                echo ("<h4>".$row["description"]."</h4></br>");
                echo ("</div></div>");
                $row = $obj->fetch();
              }
            ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Club Events Modal -->
    <div class="modal fade" id="clubEventsModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Club Events</h4>
          </div>
          <div class="modal-body">
            <?php
              $row = $obj->get_all_club_events();
              $row = $obj->fetch();
              while($row){
                echo ("<div class='row'><div class='col-md-6'>");
                echo ("<h2>".$row["title"]."</h2>");
                echo ("<img src='".$row["image_path"]."' width=300px height=300px>");
                echo ("</div><div class='col-md-6>'");
                echo ("<span class='text-right'><h3>");
                echo ("</br></br><strong>Date: </strong>".$row["day"]."</br>");
                echo ("<strong>Time: </strong>".$row["time"]."</br>");
                echo ("<strong>Venue: </strong>".$row["venue"]."</br>");
                echo ("</h3></span></br>");
                echo ("<h4>".$row["description"]."</h4></br>");
                echo ("</div></div>");
                $row = $obj->fetch();
              }
            ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Other Events Modal -->
    <div class="modal fade" id="otherEventsModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Other Events</h4>
          </div>
          <div class="modal-body">
            <?php
              $row = $obj->get_all_other_events();
              $row = $obj->fetch();
              while($row){
                echo ("<div class='row'><div class='col-md-6'>");
                echo ("<h2>".$row["title"]."</h2>");
                echo ("<img src='".$row["image_path"]."' width=300px height=300px>");
                echo ("</div><div class='col-md-6>'");
                echo ("<span class='text-right'><h3>");
                echo ("</br></br><strong>Date: </strong>".$row["day"]."</br>");
                echo ("<strong>Time: </strong>".$row["time"]."</br>");
                echo ("<strong>Venue: </strong>".$row["venue"]."</br>");
                echo ("</h3></span></br>");
                echo ("<h4>".$row["description"]."</h4></br>");
                echo ("</div></div>");
                $row = $obj->fetch();
              }
            ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Lost Modal -->
    <div class="modal fade" id="lostModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Lost Items</h4>
          </div>
          <div class="modal-body">
            <?php
              $row = $obj->get_all_lost();
              $row = $obj->fetch();
              while($row){
                echo ("<div class='row'><div class='col-md-6'>");
                echo ("<h2>".$row["item"]."</h2>");
                echo ("<img src='".$row["image_path"]."' width=300px height=300px>");
                echo ("</div><div class='col-md-6>'");
                echo ("<span class='text-right'></br><h4>");
                echo ("</br></br><strong>Where it got lost: </strong>".$row["location"]."</br>");
                echo ("<strong>Person to contact: </strong>".$row["contact_name"]."</br>");
                echo ("<strong>Contact number: </strong>".$row["contact_number"]."</br>");
                echo ("<strong>Contact email: </strong>".$row["contact_email"]."</br></br>");
                echo ("<strong>Details</strong></br>".$row["description"]."</br>");
                echo ("</h4></span>");
                echo ("</div></div>");
                $row = $obj->fetch();
              }
            ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Found Modal -->
    <div class="modal fade" id="foundModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Found Items</h4>
          </div>
          <div class="modal-body">
            <?php
              $row = $obj->get_all_found();
              $row = $obj->fetch();
              while($row){
                echo ("<div class='row'><div class='col-md-6'>");
                echo ("<h2>".$row["item"]."</h2>");
                echo ("<img src='".$row["image_path"]."' width=300px height=300px>");
                echo ("</div><div class='col-md-6>'");
                echo ("<span class='text-right'></br><h4>");
                echo ("</br></br><strong>Where it got lost: </strong>".$row["location"]."</br>");
                echo ("<strong>Person to contact: </strong>".$row["contact_name"]."</br>");
                echo ("<strong>Contact number: </strong>".$row["contact_number"]."</br>");
                echo ("<strong>Contact email: </strong>".$row["contact_email"]."</br></br>");
                echo ("<strong>Details</strong></br>".$row["description"]."</br>");
                echo ("</h4></span>");
                echo ("</div></div>");
                $row = $obj->fetch();
              }
            ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">New post</h4>
          </div>
          <form action="index.php" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="input-group">
                <span class="input-group-addon">Title</span>
                <input type="text" name="title" class="form-control" placeholder="Enter title here">
              </div></br>
              <div class="input-group">
                <span class="input-group-addon">Date</span>
                <input type="text" name="day" class="dateInput"> <!-- name="day" class="form-control"> -->
              </div></br>
              <div class="input-group">
                <span class="input-group-addon">Time</span>
                <input type="time" name="time" class="form-control" placeholder="What time is it happening?">
              </div></br>
              <div class="input-group">
                <span class="input-group-addon">Venue</span>
                <input type="text" name="venue" class="form-control" placeholder="Where is the event happening?">
              </div></br>
              <div class="input-group">
                <span class="input-group-addon">Description</span>
                <textarea name="description" class="form-control" rows="2" placeholder="A short description"></textarea>
              </div></br>
              <div class="input-group">
                <span class="input-group-addon">When should this post START running?</span>
                <input type="text" name="startDate" class="dateInput">
              </div></br>
              <div class="input-group">
                <span class="input-group-addon">When should this post STOP running?</span>
                <input type="text" name="endDate" class="dateInput">
              </div></br>
              <label for="file"><h4>Select a poster image for your post</h4></label>
              <input type="file" name="file" id="file"><br>
              <input type="hidden" id="addCategory" name="category" value="">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" onclick="setDate()">Add</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Add Lost and Found Modal -->
    <div class="modal fade" id="addLostAndFoundModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="lostAndFoundTitle"></h4>
          </div>
          <form action="index.php" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="input-group">
                <span class="input-group-addon">Item</span>
                <input type="text" name="item" class="form-control" placeholder="What did you lose?">
              </div></br>
              <div class="input-group">
                <span class="input-group-addon">Where did you lose it?</span>
                <input type="text" name="location" class="form-control" placeholder="Where was the last time you saw it?">
              </div></br>
              <div class="input-group">
                <span class="input-group-addon">Your name</span>
                <input type="text" name="contact_name" class="form-control" placeholder="Enter your full name">
              </div></br>
              <div class="input-group">
                <span class="input-group-addon">Your phone number</span>
                <input type="text" name="contact_number" class="form-control" placeholder="Enter a number we can reach you on">
              </div></br>
              <div class="input-group">
                <span class="input-group-addon">Your email address</span>
                <input type="email" name="contact_email" class="form-control" placeholder="Enter an email address you check regularly">
              </div></br>
              <div class="input-group">
                <span class="input-group-addon">Details</span>
                <textarea name="description" class="form-control" rows="2" placeholder="A SHORT description of the item you lost"></textarea>
              </div></br>
              <label for="file"><h4>Select a poster image for your post</h4></label>
              <input type="file" name="file" id="file"><br>
              <input type="hidden" id="addTag" name="tag" value="">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Add</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="feedback" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="createAccount">We would love to know what you think</h4>
                </div>
                <iframe src="https://docs.google.com/forms/d/1KFhd_nmsoVHmi9TXdxr50EhVuyka6zb5sDMW6bJjnCE/viewform?embedded=true" width="900" height="500" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
            </div>
        </div>
    </div>

    <!-- Owl Carousel settings and setting of category value for add form -->
    <script type="text/javascript">
      function setDate(){

      }
      function addCategory(category){
        // Sets the category of a post
        document.getElementById("addCategory").value = category;
      }
      function addTag(tag){
        document.getElementById("lostAndFoundTitle").innerHTML = ("Add "+tag+" item");
        document.getElementById("addTag").value = tag;
      }
      // Owl Carousel Settings
      $(document).ready(
        function() {
          $(".dateInput").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd",
            showAnim: "slide"
          });
          $(function(){
            $("#owl-example").owlCarousel(
              {
                slideSpeed : 300,
                paginationSpeed : 400,
                singleItem:true,
                autoPlay:4000,
                navigation:true,
                // stopOnHover:true
              }
            );
          })
        }
      );

    </script>

    <!-- Handles image save to uploads folder and adding post to database -->
    <?php
      if(isset($_REQUEST["title"])){
        $title = $_REQUEST["title"];
        $day = $_REQUEST["day"];
        $time = $_REQUEST["time"];
        $venue = $_REQUEST["venue"];
        $description = $_REQUEST["description"];
        $category = $_REQUEST["category"];
        $start_date = $_REQUEST["startDate"];
        $end_date = $_REQUEST["endDate"];

        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);

        if  (
            (
              ($_FILES["file"]["type"] == "image/gif")
              || ($_FILES["file"]["type"] == "image/jpeg")
              || ($_FILES["file"]["type"] == "image/jpg")
              || ($_FILES["file"]["type"] == "image/pjpeg")
              || ($_FILES["file"]["type"] == "image/x-png")
              || ($_FILES["file"]["type"] == "image/png")
            )
            && in_array($extension, $allowedExts)
          )
        {
          if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
          }
          else {
            if (file_exists("upload/" . $_FILES["file"]["name"])) {
              echo $_FILES["file"]["name"] . " already exists. ";
            }
            else {
              move_uploaded_file($_FILES["file"]["tmp_name"],
              "upload/" . $_FILES["file"]["name"]);
              echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
              $image_path = "upload/" . $_FILES["file"]["name"];
            }
          }
        }
        else {
          echo "Invalid file";
        }

        if(!$obj->add_post($title,$image_path,$venue,$day,$time,$description,$category,$start_date,$end_date)){
          echo "Error. Couldn't insert into database";
          exit();
        }
      }

      if(isset($_REQUEST["item"])){
        $item = $_REQUEST["item"];
        $location = $_REQUEST["location"];
        $contact_name = $_REQUEST["contact_name"];
        $contact_number = $_REQUEST["contact_number"];
        $contact_email = $_REQUEST["contact_email"];
        $description = $_REQUEST["description"];
        $tag = $_REQUEST["tag"];

        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);

        if  (
            (
              ($_FILES["file"]["type"] == "image/gif")
              || ($_FILES["file"]["type"] == "image/jpeg")
              || ($_FILES["file"]["type"] == "image/jpg")
              || ($_FILES["file"]["type"] == "image/pjpeg")
              || ($_FILES["file"]["type"] == "image/x-png")
              || ($_FILES["file"]["type"] == "image/png")
            )
            && in_array($extension, $allowedExts)
          )
        {
          if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
          }
          else {
            if (file_exists("upload/lostAndFound/" . $_FILES["file"]["name"])) {
              echo $_FILES["file"]["name"] . " already exists. ";
            }
            else {
              move_uploaded_file($_FILES["file"]["tmp_name"],
              "upload/lostAndFound/" . $_FILES["file"]["name"]);
              echo "Stored in: " . "upload/lostAndFound/" . $_FILES["file"]["name"];
              $image_path = "upload/lostAndFound/" . $_FILES["file"]["name"];
            }
          }
        }
        else {
          echo "Invalid file";
        }

        if(!$obj->add_lost_and_found($image_path,$item,$description,$location,$tag,$contact_name,$contact_number,$contact_email)){
          echo "Error. Couldn't insert into database";
          exit();
        }
      }
    ?>
  </body>
</html>