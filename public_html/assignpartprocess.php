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
    
	$songid = $_POST['songid'];
	$singerid = $_POST['singerid'];
	
	$query1 = "INSERT INTO sings (song_id,singer_id) VALUES ('$songid','$singerid');";

	$result1 = mysql_query($query1);
					
            
            // */
            header('Location: singerhome.php');
              
	?>
