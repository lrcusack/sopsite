<?php 
	 session_start(); //continue session
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
    

		$eid = $_POST['eid'];

		
				
                if(!isset($eid))
                {echo 'Invalid event, please try again <a href="monitorevents.php">try again</a>';
                exit;}                

                $query1 = "INSERT INTO attending (perf_id,singer_id) VALUES ('$eid','$currentID');";

					$result1 = mysql_query($query1);
					
            
            // */
            header('Location: events.php');
              
	?>
