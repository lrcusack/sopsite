
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

    <title>Contact Sons of Pitch</title>

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
             <li><a href="aboutus.html">About us</a></li>
           <li><a href="events.php">Performance Schedule</a></li>
           <li><a href="./contactus.html">Contact us</a></li>
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
            <h1>SOP What!</h1>
            <p>So you want to get in touch with us? Whether you are looking for music, guest performers, or a place to sing, this page will get you in touch with the right guy.</p>
          </div>
          <div class="row">
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Music Director</h2>
              <p>Looking for an arrangement of ours? Trying to sell us an arrangement? Want to tell us how awesome we sound? Tim's your man. Shoot him an email at <a href="mailto:timking@gwmail.gwu.edu">timking@gwmail.gwu.edu</a></p>
              
              <!--<p><a class="btn btn-default" href="http://getbootstrap.com/examples/offcanvas/#" role="button">View details »</a></p>-->
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Business Manager</h2>
              <p>Do you like money? So does Jack! Email him if you want to talk about it <a href="mailto:jacklinnehan@gwmail.gwu.edu">jacklinnehan@gwmail.gwu.edu</a></p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Publicity Manager</h2>
              <p>Holding an event where you want us to sing? Planning to serenade your little? Want to get our fanbase out to your event? You should talk to Ian, shoot him an email at <a href="mailto:iengel@gwmail.gwu.edu">iengel@gwmail.gwu.edu</a></p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Public Relations Coordinator</h2>
              <p>Coming to DC on tour and want to perform with us? Trying to get a group of studs to perform with you at your school? Liam has nothing better to do with his time; shoot him an email at <a href="mailto:lrcusack@gwmail.gwu.edu">lrcusack@gwmail.gwu.edu</a></p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Webmaster</h2>
              <p>Wait, maybe Liam does have things to do... Well its too late now, bug him if you have complaints about the website. shoot him an email at <a href="mailto:lrcusack@gwmail.gwu.edu">lrcusack@gwmail.gwu.edu</a></p>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->


      <hr>

      <!-- FOOTER -->
      <footer>
       <p class="pull-right"><a href="">Back to top</a></p>
        <p>Sons of Pitch · <a href="singersignin.php">Singer Sign-in</a></p>
      </footer>

    </div><!--/.container-->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./SOP_files/jquery-1.10.2.min.js"></script>
    <script src="./SOP_files/bootstrap.min.js"></script>
    <script src="./SOP_files/offcanvas.js"></script>
  

</body></html>
