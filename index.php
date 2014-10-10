<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!-- <meta http-equiv="refresh" content="60"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News on time</title>
    <link rel="icon" type="image/jpg" href="favicon.jpeg">
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
    <!-- Default Theme -->
    <link rel="stylesheet" href="owl/owl-carousel/owl.theme.css">
    <link rel="stylesheet" type="text/css" href="css/news-on-time.css">
  </head>
  <body>
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
    ?>

    <script src="js/jquery-1.11.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="owl/owl-carousel/owl.carousel.js"></script>

    <div class="container">
      <div class="row">
        <div class="pageTitle"><h1>News On Time</h1></div>
      </div>

      <!-- Carousel -->
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div id="owl-example" class="owl-carousel carousel">
            <?php
              $row = $obj->get_todays_events();
              $row = $obj->fetch();
              while($row){
                echo ("<div><img src='".$row["image_path"]."' alt='".$row["category"]."'></div>");
                $row = $obj->fetch();
              }
            ?>
            <!-- <div><img src="images/parties.jpg" alt="Parties"></div>
            <div><img src="images/movies.jpg" alt="Movies"></div>
            <div><img src="images/foodie.jpg" alt="Foodie"></div>
            <div><img src="images/sports.jpg" alt="Sports"></div>
            <div><img src="images/parties.jpg" alt="Parties"></div>
            <div><img src="images/movies.jpg" alt="Movies"></div>
            <div><img src="images/foodie.jpg" alt="Foodie"></div>
            <div><img src="images/sports.jpg" alt="Sports"></div> -->
          </div>
        </div>
        <div class="col-md-2"></div>
      </div>

      <!-- Categories -->
      <div class="row">
        <!-- Movies Category -->
        <div class="col-md-3">
          <div class="category thumbnail">
            <img src="images/movies.jpg" alt="Movie Night">
            <div class="caption">
              <div class="row">
                <div class="col-md-9">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#moviesModal">Movie Night</button>   <span class="badge"><?php echo ($numMovies["COUNT(*)"]) ?></span>
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
            <img src="images/parties.jpg" alt="Parties">
            <div class="caption">
              <div class="row">
                <div class="col-md-9">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#partiesModal">Parties</button>   <span class="badge"><?php echo ($numParties["COUNT(*)"]) ?></span>
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
            <img src="images/foodie.jpg" alt="Foodie Events">
            <div class="caption">
              <div class="row">
                <div class="col-md-9">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#foodieModal">Foodie Events</button>   <span class="badge"><?php echo ($numFoodie["COUNT(*)"]) ?></span>
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
            <img src="images/sports1.jpg" alt="Sports Events">
            <div class="caption">
              <div class="row">
                <div class="col-md-9">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#sportsModal">Sports Events</button>   <span class="badge"><?php echo ($numSports["COUNT(*)"]) ?></span>
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

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">New post</h4>
          </div>
          <form action="index.php" method="post" enctype="multipart/form-data" onSubmit="setTimeout('location.reload(true)',500); return true;">
            <div class="modal-body">
              <div class="input-group">
                <span class="input-group-addon">Title</span>
                <input type="text" name="title" class="form-control" placeholder="Enter title here">
              </div></br>
              <div class="input-group">
                <span class="input-group-addon">Date</span>
                <input type="date" name="day" class="form-control" placeholder="What time is it happening?">
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
                <!-- <input type="text" name="description" class="form-control" placeholder="A short description"> -->
                <textarea name="description" class="form-control" rows="2" placeholder="A short description"></textarea>
              </div></br>
              <!-- <div class="input-group">
                <span class="input-group-addon">Category</span>
                <select name="category" class="form-control">
                  <option>movies</option>
                  <option>parties</option>
                  <option>foodie</option>
                </select>
              </div></br> -->
              <div class="input-group">
                <span class="input-group-addon">Start Run Date</span>
                <input type="date" name="startDate" class="form-control">
              </div></br>
              <div class="input-group">
                <span class="input-group-addon">End Run Date</span>
                <input type="date" name="endDate" class="form-control">
              </div></br>
              <label for="file"><h4>Select a poster image for your post</h4></label>
              <input type="file" name="file" id="file"><br>
              <input type="hidden" id="addCategory" name="category" value="">
              <input type="hidden" id="refresh" onClick="history.go(0)" value="Refresh">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Add</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      function addCategory(category){
        document.getElementById("addCategory").value = category;
      }

      $(document).ready(function() {
       
        $("#owl-example").owlCarousel({
          slideSpeed : 300,
          paginationSpeed : 400,
          singleItem:true,
          autoPlay:4000,
          navigation:true,
          stopOnHover:true

        });
       
      });
    </script>

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
          // echo "In parent if statement <br>";
          if ($_FILES["file"]["error"] > 0) {
            // echo "In first child if statement <br>";
            echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
          }
          else {
            // echo "In first child else statement <br>";
            // echo "Upload: " . $_FILES["file"]["name"] . "<br>";
            // echo "Type: " . $_FILES["file"]["type"] . "<br>";
            // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
            // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
            if (file_exists("upload/" . $_FILES["file"]["name"])) {
              // echo "In second child if statement <br>";
              echo $_FILES["file"]["name"] . " already exists. ";
            }
            else {
              // echo "In second child else statement <br>";
              move_uploaded_file($_FILES["file"]["tmp_name"],
              "upload/" . $_FILES["file"]["name"]);
              echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
              $image_path = "upload/" . $_FILES["file"]["name"];
            }
          }
        }
        else {
          // echo "In parent else statement <br>";
          echo "Invalid file";
        }

        if(!$obj->add_post($title,$image_path,$venue,$day,$time,$description,$category,$start_date,$end_date)){
          echo "Error. Couldn't insert into database";
          exit();
        }
        // echo ("<script type='text/javascript'>$(document).ready({('#refresh').click()});</script>");
        // echo ("<script type='text/javascript'>location.reload(true);</script>");
        
      }
    ?>

  </body>
</html>