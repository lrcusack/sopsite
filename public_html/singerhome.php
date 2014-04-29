
<?php session_start(); //continue session
    $currentUser=$_SESSION['username'];
    $currentID=$_SESSION['currentUserID'];
    if(!$currentID){header("Location: index.html");exit;}
    //connect to database
    $conn = mysql_connect("localhost","lrcusack","S3Cr3T.228");
    if (!$conn)
        {echo "Unable to connect to database: " . mysql_error(); 
        exit;}

    $db = mysql_select_db('lrcusack',$conn);
    if (!$db)
	{echo "Unable to find database: " . mysql_error();
	exit;}
	
	$sql = "SELECT * FROM singer WHERE 
                singer_id='$currentID';";
    $result=mysql_query($sql);
            if (!$result) 
            {
                $name = 'SOP Member'; 
        	exit;
            }
    $singer = mysql_fetch_assoc($result);
            extract($singer);
    $name = $singer['singer_name']

    ?>
    <!DOCTYPE html>
<!-- saved from url=(0043)http://getbootstrap.com/examples/offcanvas/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="http://getbootstrap.com/docs-assets/ico/favicon.png">

    <title>Singer Home Page</title>

    <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/offcanvas/offcanvas.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body style="">
    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./index.html">Sons of Pitch</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="aboutus.php">About us</a></li>
           <li><a href="events.php">Performance Schedule</a></li>
           <li><a href="./contactus.php">Contact us</a></li>
           <li><a href="currentsons.php">Current Sons</a></li>
              </ul>
            </li>
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12">
         
          <div class="jumbotron">
            <h1>Welcome <?php echo $name ?></h1>
            <p>Here you'll find all the links you need to manage your profile and interact with the SOP website</p>
          </div>
          <div class="row">
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Event Creation</h2>
              <p>Planning an event? Click here and set up an event that other Sons can chose to attend!</p>
              <p><a class="btn btn-default" href="createperformance.php" role="button">Create Event </a></p>
              
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Monitor Events</h2>
              <p>Want to check an event's status or select events you can attend? Click here to view which singers are attending which events!</p>
              <p><a class="btn btn-default" href="monitorevent.php" role="button">Event Management </a></p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Add Content</h2>
              <p>Have you arranged a song or recorded a performance? Click the apppropriate link below to host it on this website!</p>
              <p><a class="btn btn-default" href="submitsheetmusic.html" role="button">Submit sheet music </a></p>
              <p><a class="btn btn-default" href="submitvideo.html" role="button">Submit video </a></p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Download Sheet Music</h2>
              <p>Click here to find a listing of all downloadable sheet music in pdf format</p>
              <p><a class="btn btn-default" href="sheetmusic.html" role="button">Download Sheet Music </a></p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Account Management</h2>
              <p>Click here to change your public SOP profile or add a new singer!</p>
              <p><a class="btn btn-default" href="editprofile.php" role="button">Edit Profile </a></p>
              <p><a class="btn btn-default" href="newsinger.php" role="button">New Singer </a></p>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->


      <hr>

      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="./contactus.html">Back to top</a></p>
        <p>Sons of Pitch · <a href="">Singer Sign-in</a></p>
      </footer>

    </div><!--/.container-->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./SOP_files/jquery-1.10.2.min.js"></script>
    <script src="./SOP_files/bootstrap.min.js"></script>
    <script src="./SOP_files/offcanvas.js"></script>
  

</body></html>
