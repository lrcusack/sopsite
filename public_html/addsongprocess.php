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
    
    $part = array(
		1  => $_POST['p1'],
		2  => $_POST['p2'],
		3  => $_POST['p3'],
		4  => $_POST['p4'],
		5  => $_POST['p5'],
		6  => $_POST['p6'],
		7  => $_POST['p7'],
		8  => $_POST['p8'],
		9  => $_POST['p9'],
		10 => $_POST['p10']);
	
	$songname = $_POST['title'];
	$query = "INSERT INTO song (title) VALUES ('$songname')";
	mysql_query($query);
	$query = "SELECT song_id FROM song WHERE title = '$songname';";
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	$songid = $row['song_id'];
	
	
	
	$i=0
	while(isset(part[$i])){
		$vp = $part[$i];
		$query = "INSERT INTO requires (song_id, voicepart) VALUES ($songid,'$vp');";
		mysql_query($query);
		
	}
					
            
            // */
            header('Location: singerhome.php');
              
	?>
