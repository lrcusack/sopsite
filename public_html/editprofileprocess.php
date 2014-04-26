

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
    
    
        //start session, initialize user variables, connect to database
		//session_start();
		$impath = "uploads/" . $_FILES["file"]["name"];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$name = $fname . ' ' . $lname;
		$gyear = intval($_POST['gyear']);
		$vpart = $_POST['vpart'];
		$htown = $_POST['htown'];
		$profile = $_POST['profiletext'];
		$emailaddr = $_POST['email'];

                
                //build queries to check if there was an existing user with that
                //username, and another to create a new user
                
				$query2="UPDATE singer SET singer_name='$name',singer_email='$emailaddr',bio='$profile',hometown='$htown',imagepath='$impath',voice_part='$vpart',grad_year='$gyear' WHERE singer_id='$currentID';";
				
	
                //check if username already exists
					$result1 = mysql_query($query1);
					if(mysql_num_rows($result1)==1)
					{   echo 'Username already exists, please go back and <a href="singersignup.html">try again</a>';
					exit;}
				//check for valid acode
					$result3 = mysql_query($query3);
					if(mysql_num_rows($result3)==0){
						echo 'Invalid activation code, please <a href="singersignup.html">try again</a>';
						exit;}
				//upload file 
				
					$allowedExts = array("gif", "jpeg", "jpg", "png");
					
					
					$temp = explode(".", $_FILES["file"]["name"]);
					$extension = end($temp);
					
					if ((($_FILES["file"]["type"] == "image/gif")
					|| ($_FILES["file"]["type"] == "image/jpeg")
					|| ($_FILES["file"]["type"] == "image/jpg")
					|| ($_FILES["file"]["type"] == "image/pjpeg")
					|| ($_FILES["file"]["type"] == "image/x-png")
					|| ($_FILES["file"]["type"] == "image/png"))
					&& ($_FILES["file"]["size"] < 5000000)
					&& in_array($extension, $allowedExts)){
					
						if ($_FILES["file"]["error"] > 0){
							echo "File error -> Return Code: " . $_FILES["file"]["error"] . '<br> Please <a href="singersignup.html">try again</a>';
							exit;
						}
						else{
							
							if (file_exists($impath)){
								echo $impath . ' already exists. <a href="singersignup.html">try again</a> with a different file name';
								exit;
							}
							else{
								move_uploaded_file($_FILES["file"]["tmp_name"], $impath);
								//echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
							}
						}
					}
					else{
					
						echo 'Invalid image file, please <a href="singersignup.html">try again</a>';
						exit;
					}
					
                
                //add new user to User table
                $result2=  mysql_query($query2);
	
		if (!$result2) 
                    {
                    echo "Could not successfully add user. Error: " . mysql_error() . '<br>Please <a href="singersignup.html">try again</a>'; 
                    exit;}
                 
                    //run query1 again to get new user info
            $result3=  mysql_query($query1);
                    
            //set session variables, essentially log in here
            $_SESSION['username']=$username;
            $_SESSION['pw']=$pw;
            $row = mysql_fetch_assoc($result3);
            $_SESSION['currentUserID']=$row['singer_id'];
            mysql_freeresult($result1);
            mysql_freeresult($result2);
            mysql_freeresult($result3);
            
            // */
            header('Location: singerhome.html');
              
	?>
