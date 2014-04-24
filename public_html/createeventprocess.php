
	
	<?php 
	
        //start session, initialize user variables, connect to database
		session_start();

		$title = $_POST['title'];
		$date = $_POST['date'];
		$time = $_POST['time'];
		$timestamp = strtotime("$date $time");
		$loc = $_POST['loc'];
		$desc = $_POST['description'];
		
		
		

		
				if(!$timestamp){echo 'Invalid time format, please go back and <a href="createperformance.html">try again</a>'; exit;}
                if(!isset($title)||!isset($loc)||!isset($desc))
                {echo 'You must enter a value for all fields, please go back and <a href="createperformance.html">try again</a>';
                exit;}
                
                $conn = mysql_connect("localhost", "lrcusack", "S3Cr3T.228");
	
		if (!$conn) {
		echo "Unable to connect to DB: " . mysql_error();
		exit;}
	
		if (!mysql_select_db("lrcusack")) {
		echo "Unable to select database: " . mysql_error();
		exit;}
                

                $query1 = "INSERT INTO performance (perf_name,timestamp,location,description) VALUES ('$title','$timestamp','$loc','$desc');";

					$result1 = mysql_query($query1);
					if (!$result1) {
						echo "Unable to connect to DB: " . mysql_error();
						exit;}
					
            
            // */
            header('Location: monitorevent.php');
              
	?>
