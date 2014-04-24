<?php 
	 session_start(); //continue session
    $currentUser=$_SESSION['username'];
    $currentID=$_SESSION['currentUserID'];
    //connect to database
    $conn = mysql_connect("localhost","lrcusack","S3Cr3T.228");
    if (!$conn)
        {echo "Unable to connect to database: " . mysql_error(); 
        exit;}

    $db = mysql_select_db('lrcusack',$conn);
    if (!$db)
	{echo "Unable to find database: " . mysql_error();
	exit;}
    

		$acode = time();
		

		
				
                if(!isset($eid))
                {echo 'Invalid event, please try again <a href="monitorevents.php">try again</a>';
                exit;}                

                $query1 = "INSERT INTO singer (acode) VALUES ('$acode');";

					$result1 = mysql_query($query1);
					
            
            // */
            header('Location: singerhome.html');
              
	?>
