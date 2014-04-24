
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
<!-- saved from url=(0050)http://getbootstrap.com/examples/navbar-fixed-top/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="http://getbootstrap.com/docs-assets/ico/favicon.png">

    <title>Events</title>

    <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/navbar-fixed-top/navbar-fixed-top.css" rel="stylesheet">

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
            <li><a href="http://www.gwu.edu/~sop/">Performance Schedule</a></li>
            <li><a href="./contactus.html">Contact us</a></li>
            <li><a href="currentsons.html">Current Sons</a></li>
            <li><a href="http://www.gwu.edu/~sop/sons.html">SOP Alumni</a></li>
              </ul>
            </li>
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Unapproved Events</h1>
        
        <p><br>Click to say that you can attend an event so it can be planned</p>
        <p>
			<?php 
				$timenow = time();
				//query all future approved events
				$query1 = "SELECT * FROM performance WHERE timestamp>$timenow AND approved=0 ORDER BY 'timestamp';";
				$result1 = mysql_query($query1);
				if(mysql_num_rows($result1)==0){
					echo "No upcoming events, stay tuned for more to come!";
					exit;
				}
				while ($row = mysql_fetch_assoc($result1)) {
					//eventually make it so events only appear if not already attending
					$datetime = date('m/d/Y g:ia',$row['timestamp']);
					echo '<div class="panel panel-default">
							<div class="panel-body">
								'. $row['perf_name'] . '
								<br>
								' . $datetime . '
								<br>
								' . $row['location'] . '
								<br>
								Description: ' . $row['description'] . '
								<form action="attendeventprocess.php" method="post">
									<input name="eid" value= ' . $row['perf_id'] . ' type="hidden">
									<input value="Attend Event" type="submit">
								</form>
								<form action="approveeventprocess.php" method="post">
									<input name="eid" value= ' . $row['perf_id'] . ' type="hidden">
									<input value="Approve Event" type="submit">
								</form>
							</div>
						  </div>';
				}
			?>
			
		</p>
      </div>

    </div> <!-- /container -->

	<!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="./index.html">Back to top</a></p>
        <p>Sons of Pitch · <a href="">Singer Sign-in</a></p>
      </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./SOP_files/jquery-1.10.2.min.js"></script>
    <script src="./SOP_files/bootstrap.min.js"></script>
  

</body></html>
