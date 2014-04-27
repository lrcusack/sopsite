
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
    $name = $singer['singer_name'];
    $isadmin = $singer['admin'];

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

    <title>Manage Event</title>

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
        <h1>Manage Event</h1>
        
        <p>
			<?php 
				$eid = $_POST['eid'];
				$query1 = "SELECT * FROM attending a LEFT JOIN singer s ON s.singer_id = a.singer_id AND a.perf_id=$eid;";
				$result1 = mysql_query($query1);
				$query2 = "SELECT * FROM performance WHERE perf_id = $eid;";
				$result2 = mysql_query($query2);
				$row2 = mysql_fetch_assoc($result2);
				$datetime = date('m/d/Y g:ia',$row2['timestamp']);
				echo '<h2>'. $row2['perf_name'] . '</h2><p> ' . '
								<h3>Details</h3>
								' . $datetime . '
								<br>
								' . $row2['location'] . '
								<br>
								' . $row2['description'] . '</p>
								<p><h3>Attending</h3>
								';
				
				
				while ($row = mysql_fetch_assoc($result1)) {
					//eventually make it so events only appear if not already attending
					echo $row['singer_name'];
				}
				
				echo '</p><p><h3>Manage</h3>
				
						<form action="attendeventprocess.php" method="post">
									<input name="eid" value= ' . $eid . ' type="hidden">
									<input value="Attend Event" type="submit">
								</form>
						<form action="approveperformanceprocess.php" method="post">
									<input name="eid" value= ' . $eid . ' type="hidden">
									<input value="Approve Event" type="submit">
								</form>
								</p>';
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
